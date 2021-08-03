<?php

namespace App\Controllers;

use App\Models\EstadoModel;
use App\Models\PaisModel;
use App\Models\UserModel;
use App\Models\TokenModel;
use App\Models\LogAcesso;
use DateTime;
use Exception;

class Users extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'Login',
        ];

        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'email' => 'required|min_length[6]|max_length[100]|valid_email',
                'senha' => 'required|min_length[8]|max_length[255]|validateUser[email,senha]',
            ];

            $errors = [
                'senha' => [
                    'validateUser' => 'e-mail ou senha não conferem'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model =  new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);
                $acesso =  new LogAcesso();
                $data = [
                    'idUser' => $user['id'],
                ];

                $acesso->save($data);

                return redirect()->to('eventos');
            }
        }

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }
    //--------------------------------------------------------------------


    private function chat()
    {
        $id = session()->get('id');
        $name = session()->get('firstname');
    }
    //--------------------------------------------------------------------


    private function setUserSession($user)
    {
        $model =  new UserModel();
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'type' => $user['type'],
            'estado' => $user['estado'],
            'isLoggedIn' => true,
            'data' => $model->findAll(),
        ];

        session()->set($data);


    }
    //--------------------------------------------------------------------

    public function sendEmail($user)
    {
        $mail = \Config\Services::email();

        $config['protocol'] = 'mail'; // or 'smtp'
        $config['mailType'] = 'html'; // or 'text'
        $config['SMTPHost'] = 'cloud.farmaceuticosp.com.br';
        $config['SMTPUser'] = 'contato@farmaceuticosp.com.br';
        $config['SMTPPass'] = 'crf6933@';
        // $config['SMTPCrypto'] = 'tls'; // 'ssl' or 'tls'
        // $config['SMTPPort'] = 587;

        $mail->initialize($config);

        $to = $user['email'];
        $mail->setFrom($mail->SMTPUser, 'Eventos CRF');
        $mail->setTo($to, $user['firstname']);
        $mail->setSubject('Inscrição Efetuada...');

        $message = "
            Prezado(a) " . $user['firstname'] . ",<br><br>\n
            Confirmamos sua inscrição no Workshop Judicialização da Saúde <br><br>\n
            Informamos que, para que se receba o certificado de participação no evento, o interessado deverá:<br>\n
            1) Estar inscrito no evento <br>\n
            2) Logar, nos dias do evento no link " . base_url() . " (o mesmo que se inscreveu), informando e-mail e senha, que funcionará como  lista de presença virtual<br>\n            
            3) Participar do evento on line<br><br>\n            
             
            Solicitamos, ainda, que não divulguem o link gerado pelo YouTube após entrar no evento, evitando que participantes não inscritos assistam o evento sem identificação e, consequentemente, sem direito ao certificado de participação. <br><br>\n
           
            Login: " . $user['email'] . "<br>
            Senha: " . $user['password'] . "<br><br>

            Atenciosamente,\n<br>
            Conselho Regional de Farmácia do Estado de São Paulo<br>
            eventos@crfsp.org.br<br>
            (11) 3067.1450 <br>
            www.crfsp.org.br";

        $mail->setMessage($message);
        // $mail->Body = $message;

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }


    //--------------------------------------------------------------------

    public function novasenha($token)
    {

        $modeltoken =  new TokenModel();
        $tk = $modeltoken->where('token', $token)->find();
        if ($tk) {
            $hoje = new DateTime(date("Y-m-d H:i:s"));
            $dataexpiracao = new DateTime($tk[0]['created_at']);

            $dataexpiracao->modify('+8 hours');
            $hoje->modify('+3 hours'); //Gambiarra por conta do horario do servidor que está atrasado 3 horas
            $hoje = $hoje->format('Y-m-d H:i:s');
            $dataexpiracao = $dataexpiracao->format('Y-m-d H:i:s');

            if ($dataexpiracao < $hoje) {
                echo "<h1>Token expirado!</h1>";
                echo "<a href='" . base_url() . "' style='background-color: #007bff;color: white;padding: 11px;border-radius: 12px;font-size: larger;font-weight: bold;text-decoration: none;font-family: sans-serif;'>Início</a>";
            } else {
                $data = [
                    'title' => 'Nova Senha',
                ];
                helper(['form']);

                if ($this->request->getMethod() == 'post') {
                    //VALIDAÇÕES
                    $rules = [
                        'senha' => 'required|min_length[8]|max_length[255]',
                        'senha_confirmacao' => 'matches[senha]',
                    ];

                    if (!$this->validate($rules)) {
                        $data['validation'] = $this->validator;
                    } else {

                        $modeluser =  new UserModel();
                        $user = $modeluser->where('id', $tk[0]['user_id'])->find();

                        $newData = [

                            'password' => $this->request->getVar('senha'),
                        ];

                        if ($modeluser->update($user[0]["id"], $newData)) {
                            $session = session();
                            $session->setFlashdata('success', 'Sua senha foi atualizada com sucesso!');
                            return redirect()->to(base_url());
                        } else {
                            echo "Erro ao salvar";
                            exit;
                        }
                    }
                }

                echo view('templates/header', $data);
                echo view('novasenha', $data);
                echo view('templates/footer');
            }
        } else {
            echo "<h1>Token inválido!</h1>";
            echo "<a href='" . base_url() . "' style='background-color: #007bff;color: white;padding: 11px;border-radius: 12px;font-size: larger;font-weight: bold;text-decoration: none;font-family: sans-serif;'>Início</a>";
        }
    }
    //--------------------------------------------------------------------

    public function recuperarSenha($user)
    {
        $modeltoken =  new TokenModel();
        $hashtoken = str_replace('/', '', password_hash($user['email'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT));

        $novo = [
            'token' => $hashtoken,
            'user_id' => $user['id'],
        ];

        if ($modeltoken->save($novo)) {

            $mail = \Config\Services::email();
            $config['SMTPPort'] = 587;
            $config['SMTPTimeout'] = 20;
            $config['SMTPHost']  = 'cloud.farmaceuticosp.com.br';
            $config['SMTPUser'] = "contato@farmaceuticosp.com.br";
            $config['SMTPPass'] = "crf6933@";
            $config['mailType'] = 'html';

            $mail->initialize($config);

            $to = $user['email'];
            $mail->setFrom($mail->SMTPUser, 'Eventos CRF');
            $mail->setTo($to, $user['firstname']);
            $mail->setSubject('Recuperação de Senha...');

            $message = "
                Prezado(a) " . $user['firstname'] . ",<br><br>\n
                A recuperação de Senha foi solicitada. <br><br>\n
                Acesse o link " . base_url() . "/recuperacao/$hashtoken para redefinir sua senha. <br>O link irá expirar em 15 minutos.<br>
                Atenciosamente,\n<br><br>
                
                Conselho Regional de Farmácia do Estado de São Paulo<br>
                eventos@crfsp.org.br<br>
                (11) 3067.1450 <br>
                www.crfsp.org.br";

            $mail->setMessage($message);
            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        } else {
            echo "Erro ao gerar token!";
            exit;
        }
    }
    //--------------------------------------------------------------------

    public function register()
    {
        $paisModel = new PaisModel();
        $paises = $paisModel->selectPaises();

        $estadoModel = new EstadoModel();
        $uf = $estadoModel->selectUF();

        $data = [
            'options_paises' => $paises,
            'options_uf' => $uf,

            'title' => 'Inscreva-se',
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'nome' => 'required|min_length[3]|max_length[20]',
                'sobrenome' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
                'senha' => 'required|min_length[8]|max_length[255]',
                'senha_confirmacao' => 'matches[senha]',
                'termos' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //salva no BD
                $model =  new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('nome'),
                    'lastname' => $this->request->getVar('sobrenome'),
                    'email' => $this->request->getVar('email'),
                    'pais' => $this->request->getVar('paises'),
                    'estado' => $this->request->getVar('estados'),
                    'cidade' => $this->request->getVar('cidades'),
                    'type' => (int) $this->request->getVar('categoria'),
                    'uf' => $this->request->getVar('uf'),
                    'crf' => $this->request->getVar('crf'),
                    'telefone' => $this->request->getVar('telefone'),
                    'celular' => $this->request->getVar('celular'),
                    'cpf' => $this->request->getVar('cpf'),
                    'password' => $this->request->getVar('senha'),
                ];

                // var_dump($newData); exit;

                if ($model->save($newData)) {
                    if ($this->sendEmail($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Sua inscrição foi recebida com sucesso!');
                        return redirect()->to(base_url());
                    } else {
                        echo "Erro ao enviar email";
                        exit;
                    }
                } else {
                    echo "Erro ao salvar";
                    exit;
                }
            }
        }

        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer');
    }

    //--------------------------------------------------------------------

    public function recuperacaoSenha()
    {
        $data = [
            'title' => 'Recuperação de Senha',
        ];

        helper(['form']);


        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[100]|valid_email',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $email = $this->request->getVar('email');

                $model =  new UserModel();
                $user = $model->where('email', $email)->find();

                if ($user[0] != NULL) {
                    if ($this->recuperarSenha($user[0])) {
                        $session = session();
                        $session->setFlashdata('success', 'Um e-mail de redefinição foi enviado!');
                        return redirect()->to(base_url());
                    } else {
                        echo "Erro ao enviar email";
                        exit;
                    }
                } else {
                    echo "<h1>Esse email não está cadastrado em nossa base de dados!</h1>";
                    echo "<a href='" . base_url() . "' style='background-color: #007bff;color: white;padding: 11px;border-radius: 12px;font-size: larger;font-weight: bold;text-decoration: none;font-family: sans-serif;'>Entre!</a>";
                    exit;
                }
            }
        }

        echo view('templates/header', $data);
        echo view('recuperacao', $data);
        echo view('templates/footer');
    }

    //--------------------------------------------------------------------

    public function editarUser()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $uri = current_url(true);
            $usuario_id = $uri->getSegment(3);
            $model = new UserModel();
            $result = $model->find($usuario_id);

            $paisModel = new PaisModel();
            $paises = $paisModel->selectPaises();

            $estadoModel = new EstadoModel();
            $uf = $estadoModel->selectUF();

            $data = [
                'title' => 'Editar Usuário', 
                'options_paises' => $paises,
                'paises' => $paisModel->findall(),
                'options_uf' => $uf,
                'data' =>  $result,
            ];
            // var_dump($data['data']);exit;

            // var_dump($data); exit;
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'senha' => 'required|min_length[8]|max_length[255]',
                    'senha_confirmacao' => 'matches[senha]',
                ];


                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $newData = [
                        'id' => $usuario_id, //sem esse campo não sabe qual ID deve alterar e acaba fazendo um insert
                        'firstname' => $this->request->getVar('nome'),
                        'lastname' => $this->request->getVar('sobrenome'),
                        'email' => $this->request->getVar('email'),
                        'pais' => $this->request->getVar('paises'),
                        'estado' => $this->request->getVar('estados'),
                        'cidade' => $this->request->getVar('cidades'),
                        'type' => (int) $this->request->getVar('categoria'),
                        'uf' => $this->request->getVar('uf'),
                        'crf' => $this->request->getVar('crf'),
                        'telefone' => $this->request->getVar('telefone'),
                        'celular' => $this->request->getVar('celular'),
                        'cpf' => $this->request->getVar('cpf'),
                        'password' => $this->request->getVar('senha'),
                    ];



                    if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'O usuário' . " ("  . $result['firstname'] . ") " .  'foi alterado com sucesso!');
                        return redirect()->to(base_url('logout'));
                    } else {
                        echo "Erro ao salvar";
                        exit;
                    }
                }
            }

            echo view('templates/header', $data);
            echo view('editarUser', $result);
            echo view('templates/footer');
        }
    }


    //--------------------------------------------------------------------


    public function cadastrarUser()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $paisModel = new PaisModel();
            $paises = $paisModel->selectPaises();

            $estadoModel = new EstadoModel();
            $uf = $estadoModel->selectUF();

            $data = [
                'options_paises' => $paises,
                'options_uf' => $uf,

                'title' => 'Cadastrar Usuário',
            ];
            // var_dump($data); exit;
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'nome' => 'required|min_length[3]|max_length[20]',
                    'sobrenome' => 'required|min_length[3]|max_length[100]',
                    'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
                    'senha' => 'required|min_length[8]|max_length[255]',
                    'senha_confirmacao' => 'matches[senha]',
                ];


                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $model =  new UserModel();


                    $newData = [
                        'firstname' => $this->request->getVar('nome'),
                        'lastname' => $this->request->getVar('sobrenome'),
                        'email' => $this->request->getVar('email'),
                        'pais' => $this->request->getVar('paises'),
                        'estado' => $this->request->getVar('estados'),
                        'cidade' => $this->request->getVar('cidades'),
                        'type' => (int) $this->request->getVar('categoria'),
                        'uf' => $this->request->getVar('uf'),
                        'crf' => $this->request->getVar('crf'),
                        'telefone' => $this->request->getVar('telefone'),
                        'celular' => $this->request->getVar('celular'),
                        'cpf' => $this->request->getVar('cpf'),
                        'password' => $this->request->getVar('senha'),
                    ];



                    if ($model->save($newData)) {
                        if ($this->sendEmail($newData)) {
                            $session = session();
                            $session->setFlashdata('success', 'O usuario foi criado com sucesso!');
                            return redirect()->to(base_url('alteraruser'));
                        } else {
                            echo "Erro ao enviar email";
                            exit;
                        }
                    } else {
                        echo "Erro ao salvar";
                        exit;
                    }
                }
            }
            echo view('templates/header', $data);
            echo view('cadastrarUser', $data);
            echo view('templates/footer');
        }
    }



    //--------------------------------------------------------------------
    public function alterarUser()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new UserModel();
            $data = [
                'title' => 'Alterar Usuários',
                'data' => $model->findAll(),
            ];

            echo view('templates/header', $data);
            echo view('alterarUser');
            echo view('templates/footer');;
        }
    }


    //--------------------------------------------------------------------

    public function deletar($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $uri = current_url(true);
            $user_id = $uri->getSegment(4);
            $model = new UserModel();
            $result = $model->find($user_id);
            // 
            try {
                if ($user_id) {
                    $model->delete($user_id);
                    $session = session();
                    $session->setFlashdata('success', 'O usuário' . "  (" . $result['firstname'] . ")  " . 'foi excluido com sucesso!');
                    return redirect()->to(base_url("alterarUser"));
                } else {
                    echo "O usuário" . $result . " não pode ser excluido";
                }
            } catch (Exception $e) {
                $session = session();
                if ($e->getCode() == 1451) {
                    $session->setFlashdata('danger', 'Seu usuário' . "  (" . $result['firstname'] . ")  " . 'não pode ser excluído, pois possui vinculos no sistema!');
                } else {
                    $session->setFlashdata('danger', 'Seu usuário' . "  (" . $result['firstname'] . ")  " . 'não pode ser excluido!');
                }
                return redirect()->to(base_url("alterarUser"));
            }
        }
    }

    //--------------------------------------------------------------------

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
