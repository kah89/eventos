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

        $model =  new AtividadeModel();
        $data = [
            'title' => 'Atividade',
            'data' => $model->findAll(),
        ];
        echo view('templates/header', $data);
        echo view('atividades');
        echo view('templates/footer');
        
    }

    //------------------------------------------------------------------------------

    public function inscreverAtividade()
    {
        $model = new AtividadeModel();
        $data = [
            'title' => 'Listar Atividades',
            'data' => $model
                ->select('*')
                ->join('usuario_atividade', 'usuario_atividade.idAtividade = atividade_evento.id')
                ->where('usuario_atividade.idUser', session()->get('id'))
                ->findAll()
        ];

        echo view('templates/header', $data);
        echo view('atividades');
        echo view('templates/footer');
        
    // $model = new EventoModel();
    // $idUser = session()->get('id');
    // $uri = current_url(true);
    // $idEvento = $uri->getSegment(5); 
    // $msg = $model->inscricaoEvento($idUser,$idEvento);
    // $session = session();
    // $session->setFlashdata('success', $msg);
    // return redirect()->to(base_url('eventos'));
     

    }
    

    //------------------------------------------------------------------------------


    public function cadativ()
    {
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
                'descricao' => 'max_length[60]',
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
                // var_dump($newData);exit;

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


    //--------------------------------------------------------------------


    public function editativ()
    {
        $uri = current_url(true);
        $ativ_id = $uri->getSegment(4);
        $model = new AtividadeModel();

        $result = $model->find($ativ_id);

        $data = [
            'title' => 'Editar evento',
        ];


        // var_dump($data); exit;
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'titulo' => 'min_length[3]|max_length[60]',
                'descricao' => 'min_length[10]|max_length[60]',
            ];


            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //salva no BD
                $newData = [
                    'id' => $ativ_id, //sem esse campo não sabe qual ID deve alterar e acaba fazendo um insert
                    'titulo' => $this->request->getVar('titulo'),
                    'tipo' => $this->request->getVar('certificado'),
                    'dtInicio' => $this->request->getVar('data'),
                    'atividade' => $this->request->getVar('atividade'),
                ];

                if ($model->save($newData)) {
                    $session = session();
                    $session->setFlashdata('success', 'Sua atividade ');
                    $session->setFlashdata('success', 'Sua atividade' . "  (" . $result['titulo'] . ") " .  'foi alterada com sucesso!');
                    return redirect()->to(base_url('excluirativ'));
                } else {
                    echo "Erro ao editar";
                    exit;
                }
            }
        }
        echo view('templates/header', $data);
        echo view('editativ', $result);
        echo view('templates/footer');
    }


    //--------------------------------------------------------------------

    
    // lista todas atividades por ussuario de acordo com o evento cadastrado
    public function listativ()
    {
        $model = new AtividadeModel();
        $data = [
            'title' => 'Lista de Atividades',
            'data' => $model
                ->select('*')
                ->join('usuario_evento','usuario_evento.idEvento = atividade_evento.idEvento')
                ->where('usuario_evento.idUser', session()->get('id'))
                ->findAll()
        ];
        // var_dump($data);exit;
        
        echo view('templates/header', $data);
        echo view('listativ');
        echo view('templates/footer');
    }







    //--------------------------------------------------------------------


    public function excluirativ()
    {
        $model = new AtividadeModel();
        $data = [
            'title' => 'Excluir Atividade',
            'data' => $model->findAll(),
        ];
        echo view('templates/header', $data);
        echo view('excluirativ');
        echo view('templates/footer');
    }

    public function deletar($id = null)
    {

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
