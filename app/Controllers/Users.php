<?php

namespace App\Controllers;

use App\Models\EstadoModel;
use App\Models\PaisModel;
use App\Models\UserModel;
use App\Models\TokenModel;
use App\Models\LogAcesso;
use DateTime;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/SMTP.php");
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/OAuth.php");

class Users extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'I Fórum de Tecnologias na Área Farmacêutica',
        ];

        helper(['form']);

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

                $acesso->save($data );
                
                return redirect()->to('dashboard');
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
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
    }
    //--------------------------------------------------------------------

    public function sendEmail($user)
    {
        $mail = new PHPMailer(true);

        try {
            //above is where you actually instantiate PHPMailer class and i can do this due to declaration above and location of PHPMailer directory
            $mail->isSMTP();
            $mail->Timeout = 20;
            $mail->SMTPDebug = 0;

            $mail->Port = 587;
            $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
            // $mail->SMTPSecure = 'ssl';
            $mail->SMTPSecure = 'tls';
            $mail->isHTML(true);

            $mail->Host = 'cloud.farmaceuticosp.com.br';
            $mail->Username = "contato@farmaceuticosp.com.br";
            $mail->Password = "crf6933@";

            $to = $user['email'];


            $mail->setFrom($mail->Username, 'Eventos CRF');
            $mail->addAddress($to, $user['firstname']);
            //Set the subject line
            $mail->Subject = 'Inscrição efetuada!';
            $mail->CharSet = 'UTF-8';


            $message = "
            Prezado(a) " . $user['firstname'] . ",<br><br>\n
            Confirmamos sua inscrição no I Fórum de Tecnologia na Área Farmacêutica <br><br>\n
            Informamos que, para que se receba o certificado de participação no evento, o interessado deverá:<br>\n
            1) Estar inscrito no evento <br>\n
            2) Logar, nos dias do evento no link ".base_url()." (o mesmo que se inscreveu), informando e-mail e senha, que funcionará como  lista de presença virtual<br>\n            
            3) Participar do evento on line<br><br>\n            
             
            Solicitamos, ainda, que não divulguem o link gerado pelo YouTube após entrar no evento, evitando que participantes não inscritos assistam o evento sem identificação e, consequentemente, sem direito ao certificado de participação. <br><br>\n
           
            Login: " . $user['email'] . "<br>
            Senha: " . $user['password'] . "<br><br>

            Atenciosamente,\n<br>
            Conselho Regional de Farmácia do Estado de São Paulo<br>
            eventos@crfsp.org.br<br>
            (11) 3067.1450 <br>
            www.crfsp.org.br";

            $mail->Body = $message;

            $mail->send();

            return true;
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
            exit;
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
            exit;
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
                echo "<a href='".base_url()."' style='background-color: #007bff;color: white;padding: 11px;border-radius: 12px;font-size: larger;font-weight: bold;text-decoration: none;font-family: sans-serif;'>Início</a>";           
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
            echo "<a href='".base_url()."' style='background-color: #007bff;color: white;padding: 11px;border-radius: 12px;font-size: larger;font-weight: bold;text-decoration: none;font-family: sans-serif;'>Início</a>";           
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
            $mail = new PHPMailer(true);

            try {
                //above is where you actually instantiate PHPMailer class and i can do this due to declaration above and location of PHPMailer directory
                $mail->isSMTP();
                $mail->Timeout = 20;
                $mail->SMTPDebug = 0;

                $mail->Port = 587;
                $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                // $mail->SMTPSecure = 'ssl';
                $mail->SMTPSecure = 'tls';
                $mail->isHTML(true);

                $mail->Host = 'cloud.farmaceuticosp.com.br';
                $mail->Username = "contato@farmaceuticosp.com.br";
                $mail->Password = "crf6933@";

                $to = $user['email'];


                $mail->setFrom($mail->Username, 'Fórum de Tecnologia');
                $mail->addAddress($to, $user['firstname']);
                //Set the subject line
                $mail->Subject = 'Recuperação de Senha';
                $mail->CharSet = 'UTF-8';

                $message = "
                Prezado(a) " . $user['firstname'] . ",<br><br>\n
                A recuperação de Senha foi solicitada. <br><br>\n
                Acesse o link ".base_url()."/recuperacao/$hashtoken para redefinir sua senha. <br>O link irá expirar em 15 minutos.<br>
                Atenciosamente,\n<br><br>
                
                Conselho Regional de Farmácia do Estado de São Paulo<br>
                eventos@crfsp.org.br<br>
                (11) 3067.1450 <br>
                www.crfsp.org.br";

                $mail->Body = $message;

                $mail->send();

                return true;
            } catch (phpmailerException $e) {
                echo $e->errorMessage(); //Pretty error messages from PHPMailer
                exit;
            } catch (Exception $e) {
                echo $e->getMessage(); //Boring error messages from anything else!
                exit;
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
                }
                else{
                    echo "<h1>Esse email não está cadastrado em nossa base de dados!</h1>";
                    echo "<a href='".base_url()."' style='background-color: #007bff;color: white;padding: 11px;border-radius: 12px;font-size: larger;font-weight: bold;text-decoration: none;font-family: sans-serif;'>Entre!</a>";
                    exit;
                }
            }
        }

        echo view('templates/header', $data);
        echo view('recuperacao', $data);
        echo view('templates/footer');

    }
     //--------------------------------------------------------------------

    //  public function tdeventos()
    //  {
    //      $data = [
    //          'title' => 'Eventos',
    //      ];
    //       echo view('templates/header', $data);
    //      echo view('tdeventos', $data);
    //      echo view('templates/footer');
    //  }

     //--------------------------------------------------------------------

    public function edituser()
    {
        $data = [
            'title' => 'Editar Usuário',
        ];
         echo view('templates/header', $data);
        echo view('edituser', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function editativ()
    {
        $data = [
            'title' => 'Editar Atividade',
        ];
         echo view('templates/header', $data);
        echo view('editativ', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function editeventos()
    {
        $data = [
            'title' => 'Editar Evento',
        ];
         echo view('templates/header', $data);
        echo view('editeventos', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function listeventos()
    {
        $data = [
            'title' => 'Listar Eventos',
        ];
         echo view('templates/header', $data);
        echo view('listeventos', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function listativ()
    {
        $data = [
            'title' => 'Listar Atividades',
        ];
         echo view('templates/header', $data);
        echo view('listativ', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------
    // public function cadeventos()
    // {
    //     $data = [
    //         'title' => 'Cadastrar Evento',
    //     ];
    //      echo view('templates/header', $data);
    //     echo view('cadevento', $data);
    //     echo view('templates/footer');
    // }


    //--------------------------------------------------------------------

    public function cadativ()
    {
        $data = [
            'title' => 'Cadastrar Atividade',
        ];
         echo view('templates/header', $data);
        echo view('cadativ', $data);
        echo view('templates/footer');
    }
    
    //--------------------------------------------------------------------
    public function caduser()
    {
        $data = [
            'title' => 'Cadastrar Usuário',
        ];
         echo view('templates/header', $data);
        echo view('caduser', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function excluirevent()
    {
        $data = [
            'title' => 'Excluir evento',
        ];
         echo view('templates/header', $data);
        echo view('excluirevent', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------
    public function excluirativ()
    {
        $data = [
            'title' => 'Excluir Atividade',
        ];
         echo view('templates/header', $data);
        echo view('excluirativ', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function excluiruser()
    {
        $data = [
            'title' => 'Excluir Usuário',
        ];
         echo view('templates/header', $data);
        echo view('excluiruser', $data);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
