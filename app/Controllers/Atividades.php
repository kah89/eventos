<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\AtividadeModel;
use App\Models\EventoModel;
use Exception;

class Atividades extends BaseController
{

    use ResponseTrait;

    // Carrega a pagina de uma atividade cadastrada 
    // NECESSARIO ESTAR CADASTRADO EM UM EVENTO QUE TENHA UMA ATIVIDADE
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $uri = current_url(true);
            $idAtividade = $uri->getSegment(3);
            $model = new AtividadeModel();
            $modelEvento = new EventoModel();
            $idEvento = $model->select('idEvento')->where('id',$idAtividade)->get(1)->getRowArray()['idEvento'];
            
            $eventoatual = $modelEvento->select('corSecundaria, corPrimaria ')->where('id = ' . $idEvento)->find()[0];
            

            $data = [
                'title' => 'Atividade',
                'data' => $model->find($idAtividade),
                'color' => $eventoatual['corPrimaria'],
                'colorSecundaria' => $eventoatual['corSecundaria'],
            ];


            //var_dump($data);exit;
            echo view('templates/header', $data);
            echo view('atividades');
            echo view('templates/footer');
        }
    }
    //------------------------------------------------------------------------------


    // Inscreve em uma Atividade de um Evento
    // NECESSARIO ESTAR CADASTRADO EM UM EVENTO
    public function inscreverAtividade()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model = new AtividadeModel();
            $idUser = session()->get('id');
            $uri = current_url(true);
            $idAtividade = $uri->getSegment(4);
            $msg = $model->inscricaoAtividade($idUser, $idAtividade);
            $session = session();
            $session->setFlashdata('success', $msg);
            return redirect()->to(base_url('atividades/') . "/" . $idAtividade);
        }
    }


    //------------------------------------------------------------------------------

    // Cadastra a atividade para um evento
    public function cadastrarAtividades()
    {
        // Verifica de o usuario está logado * Presente em todas as funções
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            helper(['form', 'url']);
            $model1 = new AtividadeModel();
            $model = new EventoModel();
            $atividades = $model1->findall();
            $eventos = $model->findall();
            $data = [
                'title' => 'Cadastrar atividade',
                'data' =>  $eventos,
                'atividade' => $atividades,
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
                        'userCreated' => session()->get('id'),
                    ];

                    $newData['atividade'] = htmlspecialchars($newData['atividade'], ENT_QUOTES, 'UTF-8');


                    if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Sua atividade foi cadastrada com sucesso!');

                        return redirect()->to(base_url('alterarAtividades'));
                    } else {
                        echo "Erro ao salvar";
                        exit;
                    }
                }
            }
            echo view('templates/header', $data);
            echo view('cadastrarAtividades', $data);
            echo view('templates/footer');
        }
    }


    //--------------------------------------------------------------------

    // Edita uma atividade de um evento
    public function editarAtividades()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            $uri = current_url(true);
            $ativ_id = $uri->getSegment(3);
            $model = new AtividadeModel();
            $model1 = new EventoModel();
            $atividades = $model->find($ativ_id);
            $eventos = $model1->findall();

            $data = [
                'title' => 'Editar atividade',
                'data' => $eventos,
                'ativ' =>  $atividades,
            ];

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
                    //Atualiza no BD
                    $newData = [
                        'id' => $ativ_id, //sem esse campo não sabe qual ID deve alterar e acaba fazendo um insert
                        'titulo' => $this->request->getVar('titulo'),
                        'tipo' => $this->request->getVar('certificado'),
                        'dtInicio' => date($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial')),
                        'dtFim' => date($this->request->getVar('datafinal') . ' ' . $this->request->getVar('hfinal')),
                        'atividade' => $this->request->getVar('atividade'),
                        'hora' => date('H:i:s', strtotime($this->request->getVar('datainicial') . ' ' . $this->request->getVar('hinicial'))),
                        'userCreated' => session()->get('id'),
                    ];

                    if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Sua atividade ');
                        $session->setFlashdata('success', 'Sua atividade' . "  ("  . $atividades['titulo'] . ") " .  'foi alterada com sucesso!');
                        return redirect()->to(base_url('alterarAtividades'));
                    } else {
                        echo "Erro ao editar";
                        exit;
                    }
                }
            }
            echo view('templates/header', $data);
            echo view('editarAtividades', $atividades);
            echo view('templates/footer');
        }
    }


    //--------------------------------------------------------------------


    // Lista todas as atividades de todos os eventos que o usuário está cadastrado 
    public function listarAtividades()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
           
            $modelEvento = new EventoModel();
            $model = new AtividadeModel();

            $idEvento = $model->select('idEvento')->findall();


            // $eventoatual = $modelEvento->select('corSecundaria, corPrimaria ')->where('id = '.$idEvento)->find();
           
            $data = [
                'title' => 'Lista de Atividades',
                // 'color' => $eventoatual['corPrimaria'],
                // 'colorSecundaria' => $eventoatual['corSecundaria'],
                'data' => $model
                    ->select('*')
                    ->join('usuario_evento', 'usuario_evento.idEvento = atividade_evento.idEvento')
                    ->where('usuario_evento.idUser', session()->get('id'))                    
                    ->findAll()
                
            ];

            echo view('templates/header', $data);
            echo view('listarAtividades');
            echo view('templates/footer');
        }
    }







    //--------------------------------------------------------------------


    public function alterarAtividades() //lista das atividades
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {


            $model = new AtividadeModel();
            $data = [
                'title' => 'Alterar Atividades',
                'data' => $model->findAll(),
            ];


            echo view('templates/header', $data);
            echo view('alterarAtividades');
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
            $ativ_id = $uri->getSegment(4);
            $model = new AtividadeModel();
            $result = $model->find($ativ_id);

            try {
                if ($ativ_id) {
                    $model->delete($ativ_id);
                    $session = session();
                    $session->setFlashdata('success', 'Sua atividade' . "  (" . $result['titulo'] . ") " .  'foi excluida com sucesso!');
                    return redirect()->to(base_url("alterarAtividades"));
                } else {
                    echo "A atividade" . $result . " não existe";
                }
            } catch (Exception $e) {
                $session = session();
                if ($e->getCode() == 1451) {
                    $session->setFlashdata('danger', 'Sua atividade' . "  (" . $result['titulo'] . ") " . 'não pode ser excluída, pois possui vinculos no sistema!');
                } else {
                    $session->setFlashdata('danger', 'Sua atividade' . "  (" . $result['titulo'] . ") " . 'não pode ser excluida!');
                }
                return redirect()->to(base_url("alterarAtividades"));
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
