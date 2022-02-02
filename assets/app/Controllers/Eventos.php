<?php

namespace App\Controllers;

use App\Models\AtividadeModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\EventoModel;
use App\Models\UserEvento;
use Exception;

class Eventos extends BaseController
{

    use ResponseTrait;



    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            // var_dump("HEY");exit;
            $model = new EventoModel();
            $eventos = $model->findAll();
            $allevents = array();
            
            foreach ($eventos as $evento) {
                $evento['vagas'] = $model->quantidadeVagas($evento['id']);
                array_push($allevents, $evento);
            }
            $data = [
                'title' => 'Eventos',
                'data' => $allevents,
                'colorSecundaria' => $evento['corSecundaria'],
            ];
            
            // var_dump($data ['colorSecundaria']);exit;

            echo view('templates/header', $data);
            echo view('tdeventos');
            echo view('templates/footer');
        }
    }

    //------------------------------------------------------------------------------

    public function inscreverEvento()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new EventoModel();
            $idUser = session()->get('id');
            $uri = current_url(true);
            $idEvento = $uri->getSegment(4);
            $msg = $model->inscricaoEvento($idUser, $idEvento);
            $session = session();
            $session->setFlashdata('success', $msg);
            return redirect()->to(base_url('eventos'));
        }
    }


    //------------------------------------------------------------------------------


    public function gerarCertificado()
    {

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new EventoModel();
            $idUser = session()->get('id');
            $firstnameUser = session()->get('firstname');
            $lastnameUser = session()->get('lastname');
            $uri = current_url(true);
            $idEvento = $uri->getSegment(4);
        }


        $session = session();
        $msg = $model->certificado($idUser, $idEvento, $firstnameUser, $lastnameUser);

        if ($msg[0]['firstname']) {
            $user['firstname'] = $msg[0]['firstname'];
            $user['lastname'] = $msg[0]['lastname'];
            $session->setFlashdata('info', 'Certificado já foi gerado, não é possivel alterar mais os dados!');
        } else {
            $user['firstname'] = $firstnameUser;
            $user['lastname'] = $lastnameUser;
            $session->setFlashdata('success', 'Certificado gerado com sucesso!');
        }

        $pdf = new PdfController();
        echo $pdf->gerarCertificado($user);

        $session->set('firstname',  $firstnameUser);
        $session->set('lastname', $lastnameUser);

        return redirect()->to(base_url('listarEventosUser'));
    }


    //------------------------------------------------------------------------------


    // lista todos eventos por ussuario
    public function listarEventosUser()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $modelEvento = new EventoModel();
            $eventosM = $modelEvento
                ->select('*')
                ->join('usuario_evento', 'usuario_evento.idEvento = eventos.id')
                ->where('usuario_evento.idUser', session()->get('id'))
                ->findAll();

            $eventos = [];

            foreach ($eventosM as $evento) {
                $atividadeM = new AtividadeModel();
                $evento['certificado'] = $atividadeM->verificarConclusao(session()->get('id'), $evento['id']);
                array_push($eventos, $evento);
            }
            $eventoatual = $evento['corSecundaria, corPrimaria']->where('id = ' . $evento['id'])->find();
            // var_dump($eventoatual);exit;

            $data = [
                'title' => 'Lista de eventos ',
                'data' => $eventos,
                // 'color' => $eventoatual['corPrimaria'],
                // 'colorSecundaria' => $eventoatual['corSecundaria'],
           ];


            echo view('templates/header', $data);
            echo view('listarEventosUser');
            echo view('templates/footer');
        }
    }





    //------------------------------------------------------------------------------


    // lista as atividades do evento selecionado 
    public function listaEvento($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $uri = current_url(true);
            $idEvento = $uri->getSegment(4);

            $atividadeModel = new AtividadeModel();
            $userModel = new UserEvento();
            $modelEvento = new EventoModel();
            $eventoatual = $modelEvento->select('corSecundaria, corPrimaria ')->where('id = ' . $idEvento)->find()[0];
            
            $data = [
                'title' => 'Lista de atividades ',
                'data' => $atividadeModel->where('idEvento = ' . $idEvento)->findAll(),
                'users' => $userModel->findAll(),
                'color' => $eventoatual['corPrimaria'],
                'colorSecundaria' => $eventoatual['corSecundaria'],
                'colorFH' => $eventoatual['corPrimaria'],
                'colorSecundariaFH' => $eventoatual['corSecundaria'],
            ];


            echo view('templates/header', $data);
            echo view('listaEvento');
            echo view('templates/footer');
        }
    }


    //------------------------------------------------------------------------------


    // adiciona um eventos
    public function cadastrarEventos()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            helper(['form', 'url']);

            $model = new EventoModel();
            $data = [
                'title' => 'Cadastrar eventos',
                // 'data' => $model->findAll(),
            ];

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'titulo' => 'trim|required|min_length[3]|max_length[60]',
                    'imagem' => 'uploaded[profile_image]', 'mime_in[profile_image,image/jpg,image/jpeg,image/gif,image/png]', 'max_size[profile_image,4096]',
                    'resumo' => 'trim|required|min_length[100]|max_length[1000]',
                ];
                // echo './public/img';exit;
                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD

                    $model =  new EventoModel();
                    $uploadImagem = $this->upload_image($this->request->getFile('profile_image'));
                    if ($uploadImagem) {
                        $newData = [
                            'titulo' => $this->request->getVar('titulo'),
                            'imagem' => $uploadImagem,
                            'resumo' => $this->request->getVar('resumo'),
                            'dtInicio' => date($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial')),
                            'dtFim' => date($this->request->getVar('datafinal') . ' ' . $this->request->getVar('hfinal')),
                            'hora' => date('H:i:s', strtotime($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial'))),
                            'userCreated' => session()->get('id'),
                            'assinatura' => $this->request->getVar('assinatura'),
                            'tipo' => $this->request->getVar('tipo'),
                            'estado' => $this->request->getVar('estado'),
                            'limite' => $this->request->getVar('limite'),
                            'destinado' => json_encode($this->request->getVar('destinado')),
                            'corPrimaria' => $this->request->getVar('favcolor'),
                            'corSecundaria' => $this->request->getVar('favcolor1'),
                        ];

                        if ($model->save($newData)) {
                            $session = session();
                            $session->setFlashdata('success', 'Seu evento foi cadastrado com sucesso!');
                            return redirect()->to(base_url('eventos'));
                        } else {
                            echo "Erro ao salvar";
                            exit;
                        }
                    } else {
                        echo "Erro no upload";
                        exit;
                    }
                }
            }

            echo view('templates/header', $data);
            echo view('cadastrarEventos');
            echo view('templates/footer');
        }
    }


    public function upload_image($imagem)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $imageFile = $imagem;
            $nome = md5(uniqid()) . '_' . time() . '.jpg';
            if ($imageFile->move(WRITEPATH . '../public/img', $nome)) {
                return $nome;
            } else {
                return false;
            }
        }
    }


    //------------------------------------------------------------------------------


    // atualiza um eventos

    public function editarEventos()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $uri = current_url(true);
            $evento_id = $uri->getSegment(3);
            $model = new EventoModel();
            $result = $model->find($evento_id);

            $data = [
                'title' => 'Editar evento',
                'data' => $result,
            ];

            helper(['form']);

            if ($this->request->getMethod() == 'post') {

                //VALIDAÇÕES
                $rules = [
                    'titulo' => 'trim|required|min_length[3]|max_length[60]',
                    'imagem' => 'uploaded[profile_image]', 'mime_in[profile_image,image/jpg,image/jpeg,image/gif,image/png]', 'max_size[profile_image,4096]',
                    'resumo' => 'trim|required|min_length[100]|max_length[1000]',
                ];

                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $uploadImagem = $this->carregamento_image($this->request->getFile('profile_image'));
                    if ($uploadImagem) {
                        $newData = [
                            'id' => $evento_id,
                            'titulo' => $this->request->getVar('titulo'),
                            'imagem' => $uploadImagem,
                            'resumo' => $this->request->getVar('resumo'),
                            'dtInicio' => date($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial')),
                            'dtFim' => date($this->request->getVar('datafinal') . ' ' . $this->request->getVar('hfinal')),
                            'hora' => date('H:i:s', strtotime($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial'))),
                            'userCreated' => session()->get('id'),
                            'assinatura' => $this->request->getVar('assinatura'),
                            'tipo' => $this->request->getVar('tipo'),
                            'limite' => $this->request->getVar('limite'),
                            'destinado' => $this->request->getVar('destinado'),
                            'estado' => $this->request->getVar('estado'),
                            'corPrimaria' => $this->request->getVar('favcolor'),
                            'corSecundaria' => $this->request->getVar('favcolor1'),

                        ];

                        if ($model->save($newData)) {
                            $session = session();
                            $session->setFlashdata('success', 'Seu evento' . " (" . $result['titulo'] . ") " .  ' foi alterado com sucesso!');
                            return redirect()->to(base_url('eventos'));
                        } else {
                            echo "Erro ao salvar";
                            exit;
                        }
                    } else {
                        echo "Erro no upload";
                        exit;
                    }
                }
            }

            echo view('templates/header', $data);
            echo view('editarEventos', $result);
            echo view('templates/footer');
        }
    }


    //------------------------------------------------------------------------------


    public function carregamento_image($imagem)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $imageFile = $imagem;
            $nome = md5(uniqid()) . '_' . time() . '.jpg';
            if ($imageFile->move(ROOTPATH . 'public/img/', $nome)) {
                return $nome;
            } else {
                return false;
            }
        }
    }


    //------------------------------------------------------------------------------


    // deleta um eventos

    public function alterarEventos() //tras a lista de eventos
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new EventoModel();
            $data = [
                'title' => 'Alterar eventos',
                'data' => $model->findAll(),
            ];
            echo view('templates/header', $data);
            echo view('alterarEventos');
            echo view('templates/footer');
        }
    }


    //------------------------------------------------------------------------------

    public function deletar()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            $uri = current_url(true);
            $product_id = $uri->getSegment(4); //verifica em qual campo esta o ID
            $model = new EventoModel();
            $result = $model->find($product_id);

            try {
                if ($result["imagem"]) { //verifica se tem uma imagem cadatrastrada junto com esse ID e se não houver img não acontece nada
                    $filePath = "./public/img/" . $result["imagem"];
                } else {
                    $filePath = "";
                }

                if (file_exists($filePath)) {  //faz a exclusão do arquivo no banco e na pasta de img
                    if (unlink($filePath)) {
                        $model->delete($product_id);
                        $session = session();
                        $session->setFlashdata('success', 'Seu evento' . " (" . $result['titulo'] . ") " .  ' foi excluído com sucesso!');
                        return redirect()->to(base_url("alterarEventos"));
                    } else {
                        echo "Não foi possivel excluir, verifique permissões!";
                    }
                } else {
                    echo "O arquivo" . $filePath . " não existe";
                }
            } catch (Exception $e) {
                $session = session();
                if ($e->getCode() == 1451) {
                    $session->setFlashdata('danger', 'Seu evento' . "  (" . $result['titulo'] . ") " . 'não pode ser excluído, pois possui vinculos no sistema!');
                } else {
                    $session->setFlashdata('danger', 'Seu evento' . "  (" . $result['titulo'] . ") " . 'não pode ser excluído!');
                }
                return redirect()->to(base_url("alterarEventos"));
            }
        }
    }
}
