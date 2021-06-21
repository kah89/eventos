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
                    'titulo' => $this->request->getVar('titulo'),
                    'descricao' => $this->request->getFile('descricao'),
                    'tipo' => $this->request->getVar('certificado'),
                ];
                // var_dump($newData); exit;

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
         $data = [
             'title' => 'Editar Atividade',
         ];
         echo view('templates/header', $data);
         echo view('editativ', $data);
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
         echo view('listativ', $data);
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
    
 
 
}