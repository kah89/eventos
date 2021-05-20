<?php 
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\EventoModel;


class Eventos extends BaseController
{

    use ResponseTrait;

    

    public function index()
    {
        $model = new EventoModel();
        $data = [
            'title' => 'I Fórum de Tecnologias na Área Farmacêutica',
            'data' => $model->findAll(),
        ];
        
        echo view('templates/header', $data);
        echo view('tdeventos');        
        echo view('templates/footer');        
    }
 

    //------------------------------------------------------------------------------


    // lista todos eventos
    public function listar()
    {
        $model = new EventoModel();
        $data = [
            'title' => 'I Fórum de Tecnologias na Área Farmacêutica',
            'data' => $model->findAll(),
        ];

        echo view('templates/header', $data);
        echo view('listeventos');        
        echo view('templates/footer');        
    }


    //------------------------------------------------------------------------------

    
    // lista um eventos
    // public function show($id = null)
    // {
    //     $model = new EventoModel();
    //     $data = $model->getWhere(['id' => $id])->getResult();

    //     if($data){
    //         return $this->respond($data);
    //     }
        
    //     return $this->failNotFound('Nenhum evento encontrado com id '.$id);        
    // }
 

    //------------------------------------------------------------------------------


    // adiciona um eventos
    public function cadeventos()
    // {
    //     $model = new EventoModel();
    //     $data = $this->request->getJSON();

    //     if($model->insert($data)){
    //         $response = [
    //             'status'   => 201,
    //             'error'    => null,
    //             'messages' => [
    //                 'success' => 'Eventos salvos'
    //             ]
    //         ];
    //         return $this->respondCreated($response);
    //     }

    //     return $this->fail($model->errors());
    // }

    {
        $data = [
            'title' => 'Cadastre-se',
            'data' => '$this->request->getJSON()',
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'titulo' => 'required|min_length[3]|max_length[40]',
                'imagem' => 'required',
                'resumo' => 'required|min_length[100]|max_length[200]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //salva no BD
                $model =  new EventoModel();

                $newData = [
                    'titulo' => $this->request->getVar('titulo'),
                    'imagem' => $this->request->getVar('imagem'),
                    'resumo' => $this->request->getVar('resumo'),
                ];
                // var_dump($newData); exit;

                if ($model->save($newData)) {
                        $session = session();
                        $session->setFlashdata('success', 'Seu evento foi cadastrado com sucesso!');
                        return redirect()->to(base_url());
                }else {
                    echo "Erro ao salvar";
                    exit;
                }
            }
        }

        echo view('templates/header', $data);
        echo view('cadevento');
        echo view('templates/footer');
    }


    //------------------------------------------------------------------------------
    

    // atualiza um eventos
    public function update($id = null)
    {
        $model = new EventoModel();
        $data = $this->request->getJSON();
        
        if($model->update($id, $data)){
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Eventos atualizados'
                    ]
                ];
                return $this->respond($response);
            };

            return $this->fail($model->errors());
        }
 

        //------------------------------------------------------------------------------


    // deleta um eventos
    public function delete($id = null)
    {
        $model = new EventoModel();
        $data = $model->find($id);
        
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Eventos removidos'
                ]
            ];
            return $this->respondDeleted($response);
        }
        
        return $this->failNotFound('Nenhum evento encontrado com id '.$id);        
    }
}