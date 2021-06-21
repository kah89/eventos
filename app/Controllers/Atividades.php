<?php 
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\AtividadeModel;
use App\Models\EventoModel;

class Atividades extends BaseController
{

    use ResponseTrait;

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
                'descricao' => 'min_length[10]|max_length[60]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;


            } else {

                //salva no BD
                $model =  new AtividadeModel();

                $newData = [
                    'idEvento' => (int)$this->request->getVar('selectEvent'),
                    'titulo' => $this->request->getVar('titulo'),
                    'descricao' => $this->request->getVar('descricao'),
                    'tipo' => (int)$this->request->getVar('certificado'),
                    'dtInicio' => $this->request->getVar('data'),

                ];
                var_dump($newData); 

                if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Sua atividade foi cadastrada com sucesso!');
                        return redirect()->to(base_url());
                }else {
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
                    'descricao' => $this->request->getVar('descricao'),
                ];

            if ($model->save($newData)) {
                    $session = session();
                    $session->setFlashdata('success', 'Sua atividade foi alterada com sucesso!');
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
 

     public function listativ()
     {
        $model = new AtividadeModel();
         $data = [
             'title' => 'Listar Atividades',
             'data' => $model->findAll(),
         ];

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

        if ($ativ_id) {
            $model->delete($ativ_id);
            return redirect()->to(base_url("excluirativ"));
        } else {
            echo "O usuário" . $result . " não existe";
        }
    }
    
 
 
}