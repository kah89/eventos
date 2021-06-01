<?php 
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\AtividadeModel;

class Atividades extends BaseController
{

    use ResponseTrait;

    public function cadativ()
     { 
        helper(['form', 'url']);

        $model = new AtividadeModel();
        $data = [
            'title' => 'Cadastrar atividade',
            // 'data' => $model->findAll(),
        ];


        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'titulo' => 'trim|required|min_length[3]|max_length[60]',
                'conteudo' => 'trim|required|min_length[10]|max_length[60]',
                'certificado' => 'trim|required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;


            } else {

                //salva no BD
                $model =  new AtividadeModel();

                $newData = [
                    'titulo' => $this->request->getVar('titulo'),
                    'descricao' => $this->request->getFile('conteudo'),
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