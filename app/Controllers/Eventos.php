<?php

namespace App\Controllers;

use App\Models\AtividadeModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\EventoModel;


class Eventos extends BaseController
{

    use ResponseTrait;



    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new EventoModel();
            $data = [
                'title' => 'Eventos',
                'data' => $model->findAll(),
            ];

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
            $idEvento = $uri->getSegment(5);
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
            $uri = current_url(true);
            $idEvento = $uri->getSegment(5);


            $msg = $model->certificado($idUser, $idEvento);
            $session = session();
            $session->setFlashdata('success', $msg);


            $pdf = new PdfController();
            echo $pdf->gerarCertificado();
            return redirect()->to(base_url('listarEventosUser'));
        }
    }


    //------------------------------------------------------------------------------


    // lista todos eventos por ussuario
    public function listarEventosUser()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new EventoModel();
            $eventosM = $model
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
            // var_dump($eventos );exit;

            $data = [
                'title' => 'Lista de eventos cadastrados',
                'data' => $eventos
            ];

            // $atividade = new Atividades();
            // $this->function->verificarConclusao();
            // var_dump($atividade);exit;

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
            $model = new AtividadeModel();
            $data = [
                'title' => 'Lista atividades cadastradas',
                'data' => $model->where(['idEvento' => $id])->findAll()

                //'data' => $model->where(['idEvento' => $id])
                // ->select('*')
                // ->join('usuario_atividade','usuario_atividade.idAtividade = atividade_evento.id')
                // ->where('usuario_atividade.idUser', 1)
                // ->findAll()
            ];
            // var_dump($data);exit;      


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
                'title' => 'Cadastre-se',
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
            $evento_id = $uri->getSegment(4);
            $model = new EventoModel();
            $result = $model->find($evento_id);

            $data = [
                'title' => 'Editar evento',
            ];


            helper(['form']);

            if ($this->request->getMethod() == 'post') {

                //VALIDAÇÕES
                $rules = [
                    'titulo' => 'trim|required|min_length[3]|max_length[60]',
                    'imagem' => 'uploaded[profile_image]', 'mime_in[profile_image,image/jpg,image/jpeg,image/gif,image/png]', 'max_size[profile_image,4096]',
                    'resumo' => 'trim|required|min_length[100]|max_length[500]',
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
                        ];

                        if ($model->save($newData)) {
                            $session = session();
                            $session->setFlashdata('success', 'Seu evento' . " (" . "ID" . $result['id'] . " - " . $result['titulo'] . ") " .  ' foi alterado com sucesso!');
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
            if ($imageFile->move(WRITEPATH . '../public/img', $nome)) {
                return $nome;
            } else {
                return false;
            }
        }
    }


    //------------------------------------------------------------------------------


    // deleta um eventos

    public function alterareventos() //tras a lista de eventos
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
            echo view('alterareventos');
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
            $product_id = $uri->getSegment(5); //verifica em qual campo esta o ID
            $model = new EventoModel();
            $result = $model->find($product_id);
            if ($result["imagem"]) { //verifica se tem uma imagem cadatrastrada junto com esse ID e se não houver img não acontece nada
                $filePath = "./public/img/" . $result["imagem"];
            } else {
                $filePath = "";
            }

            if (file_exists($filePath)) {  //faz a exclusão do arquivo no banco e na pasta de img
                if (unlink($filePath)) {
                    $model->delete($product_id);
                    $session = session();
                    $session->setFlashdata('success', 'Seu evento' . " (" . $result['titulo'] . ") " .  ' foi excluido com sucesso!');
                    return redirect()->to(base_url("alterarEventos"));
                } else {
                    echo "Não foi possivel excluir, verifique permissões!";
                }
            } else {
                echo "O arquivo" . $filePath . " não existe";
            }
        }
    }
}
