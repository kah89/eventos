<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\AtividadeModel;
use App\Models\EventoModel;
use Exception;

class Atividades extends BaseController
{

    use ResponseTrait;


    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $uri = current_url(true);
            $idAtividade = $uri->getSegment(4);
            $model = new AtividadeModel();
            $data = [
                'title' => 'Atividade',
                'data' => $model->find($idAtividade),
            ];


            //var_dump($data);exit;
            echo view('templates/header', $data);
            echo view('atividades');
            echo view('templates/footer');
        }
    }
    //------------------------------------------------------------------------------

    public function inscreverAtividade()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new AtividadeModel();
            $idUser = session()->get('id');
            $uri = current_url(true);
            $idAtividade = $uri->getSegment(5);
            $msg = $model->inscricaoAtividade($idUser, $idAtividade);
            $session = session();
            $session->setFlashdata('success', $msg);
            return redirect()->to(base_url('atividades/') . "/" . $idAtividade);
        }
    }


    //------------------------------------------------------------------------------


    public function cadativ()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            helper(['form', 'url']);

            $model = new EventoModel();
            $data = [
                'title' => 'Cadastrar atividade',
                'data' => $model->findAll(),
            ];


            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'titulo' => 'min_length[3]|max_length[60]',
                    'atividade' => 'min_length[10]',
                ];

                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {

                    //salva no BD
                    $model =  new AtividadeModel();

                    $newData = [
                        'idEvento' => (int)$this->request->getVar('selectEvent'),
                        'titulo' => $this->request->getVar('titulo'),
                        'tipo' => (int)$this->request->getVar('certificado'),
                        'atividade' => $this->request->getVar('atividade'),
                        'dtInicio' => date($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial')),
                        'dtFim' => date($this->request->getVar('datafinal') . ' ' . $this->request->getVar('hfinal')),
                        'hora' => date('H:i:s', strtotime($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial'))),

                    ];

                    $newData['atividade'] = htmlspecialchars($newData['atividade'], ENT_QUOTES, 'UTF-8');


                    //var_dump($newData);exit;
                    if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Sua atividade foi cadastrada com sucesso!');

                        return redirect()->to(base_url('excluirativ'));
                    } else {
                        echo "Erro ao salvar";
                        exit;
                    }
                }
            }
            echo view('templates/header', $data);
            echo view('cadativ', $data);
            echo view('templates/footer');
        }
    }


    //--------------------------------------------------------------------


    public function editativ()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            $uri = current_url(true);
            $ativ_id = $uri->getSegment(4);
            $model = new AtividadeModel();
            $model1 = new EventoModel();

            $result = $model->find($ativ_id);

            $data = [
                'title' => 'Editar evento',
                'data' => $model1->findall(),
            ];

            $dataAtiv = [
                'title' => 'Editar evento',
                'data' => $model->findall(),
            ];


            // var_dump($data); exit;
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES
                $rules = [
                    'titulo' => 'min_length[3]|max_length[60]',
                    'atividade' => 'min_length[10]',
                ];


                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    //salva no BD
                    $newData = [
                        'id' => $ativ_id, //sem esse campo não sabe qual ID deve alterar e acaba fazendo um insert
                        'titulo' => $this->request->getVar('titulo'),
                        'tipo' => $this->request->getVar('certificado'),
                        'dtInicio' => $this->request->getVar('datainicial'),
                        'dtFim' => $this->request->getVar('datafinal'),
                        'atividade' => $this->request->getVar('atividade'),
                    ];

                    if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Sua atividade ');
                        $session->setFlashdata('success', 'Sua atividade' . "  (" . "ID " . $result['id'] . " - " . $result['titulo'] . ") " .  'foi alterada com sucesso!');
                        return redirect()->to(base_url('excluirativ'));
                    } else {
                        echo "Erro ao editar";
                        exit;
                    }
                }
            }
            echo view('templates/header', $data);
            echo view('editativ', $result, $dataAtiv);
            echo view('templates/footer');
        }
    }


    //--------------------------------------------------------------------


    // lista todas atividades por ussuario de acordo com o evento cadastrado
    public function listativ()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            $model = new AtividadeModel();
            $data = [
                'title' => 'Lista de Atividades',
                'data' => $model
                    ->select('*')
                    ->join('usuario_evento', 'usuario_evento.idEvento = atividade_evento.idEvento')
                    ->where('usuario_evento.idUser', session()->get('id'))
                    ->findAll()
            ];
            // var_dump($data);exit;

            echo view('templates/header', $data);
            echo view('listativ');
            echo view('templates/footer');
        }
    }







    //--------------------------------------------------------------------


    public function excluirativ() //lista das atividades
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {


            $model = new AtividadeModel();
            $data = [
                'title' => 'Excluir Atividade',
                'data' => $model->findAll(),
            ];


            echo view('templates/header', $data);
            echo view('excluirativ');
            echo view('templates/footer');
        }
    }


    //--------------------------------------------------------------------


    public function deletar($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            $uri = current_url(true);
            $ativ_id = $uri->getSegment(5);
            $model = new AtividadeModel();
            $result = $model->find($ativ_id);

            try {
                if ($ativ_id) {
                    $model->delete($ativ_id);
                    $session = session();
                    $session->setFlashdata('success', 'Sua atividade' . "  (" . $result['titulo'] . ") " .  'foi excluida com sucesso!');
                    return redirect()->to(base_url("excluirativ"));
                } else {
                    echo "O usuário" . $result . " não existe";
                }
            } catch (Exception $e) {
                $session = session();
                if ($e->getCode() == 1451) {
                    $session->setFlashdata('danger', 'Sua atividade' . "  (" . $result['titulo'] . ") " . 'não pode ser excluída, pois possui vinculos no sistema!');
                } else {
                    $session->setFlashdata('danger', 'Sua atividade' . "  (" . $result['titulo'] . ") " . 'não pode ser excluida!');
                }
                return redirect()->to(base_url("excluirativ"));
            }
        }
    }

    //--------------------------------------------------------------------

    public function verificarConclusao()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            $idUser = session()->get('id');
            $uri = current_url(true);
            $idEvento = $uri->getSegment(4);
            // $id_user = service('request')->getPost($idUser);
            // $id_evento = service('request')->getPost($idEvento);
            // var_dump($idUser); exit;
            $atividade = new \App\Models\AtividadeModel();
            echo $atividade->verificarConclusao($idUser, $idEvento);
        }
    }
}
