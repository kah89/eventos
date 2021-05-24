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
    // {  // (erro) não há dados para insert 
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
   

    {

        $model = new EventoModel();
        $data = [
            'title' => 'Cadastre-se',
            // 'data' => $model->findAll(),
        ];

        helper(['form', 'url']);

        if ($this->request->getMethod() == 'post') {
            //VALIDAÇÕES
            $rules = [
                'titulo' => 'trim|required|min_length[3]|max_length[60]',
                'imagem' => 'uploaded[file]|max_size[file,1024]|ext_in[file,jpg,jpeg,docx,pdf],',
                'resumo' => 'trim|required|min_length[100]|max_length[200]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                //salva no BD
                $model =  new EventoModel();

                $newData = [
                    'titulo' => $this->request->getVar('titulo'),
                    'imagem' => $this->request->getFile('imagem'),
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

    // adiciona uma imagem
    // function upload() { 
    //     helper(['form', 'url']);
         
    //     $database = \Config\Database::connect();
    //     $db = $database->table('eventos');
    
    //     $input = $this->validate([
    //         'file' => [
    //             'uploaded[file]',
    //             'mime_in[file,image/jpg,image/jpeg,image/png]',
    //             'max_size[file,1024]',
    //         ]
    //     ]);
    
    //     if (!$input) {
    //         print_r('Escolha um arquivo valido');
    //     } else {
    //         $img = $this->request->getFile('file');
    //         $img->move(WRITEPATH . 'uploads');
    
    //         $data = [
    //            'name' =>  $img->getName(),
    //            'type'  => $img->getClientMimeType()
    //         ];
    
    //         $save = $db->insert($data);
    //         print_r('Arquivo carregado com sucesso');        
    //     }
    // }

    // public function fileUpload(){

    //     // Validation
    //     $input = $this->validate([
    //        'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,jpg,jpeg,docx,pdf],'
    //     ]);
   
    //     if (!$input) { // Not valid
    //         $data['validation'] = $this->validator; 
    //         return view('users',$data); 
    //     }else{ // Valid
   
    //         if($file = $this->request->getFile('file')) {
    //            if ($file->isValid() && ! $file->hasMoved()) {
    //               // Get file name and extension
    //               $name = $file->getName();
    //               $ext = $file->getClientExtension();
   
    //               // Get random file name
    //               $newName = $file->getRandomName(); 
   
    //               // Store file in public/uploads/ folder
    //               $file->move('../public/uploads', $newName);
   
    //               // File path to display preview
    //               $filepath = base_url()."/uploads/".$newName;
   
    //               // Set Session
    //               session()->setFlashdata('message', 'Uploaded Successfully!');
    //               session()->setFlashdata('alert-class', 'alert-success');
    //               session()->setFlashdata('filepath', $filepath);
    //               session()->setFlashdata('extension', $ext);
   
    //            }else{
    //               // Set Session
    //               session()->setFlashdata('message', 'File not uploaded.');
    //               session()->setFlashdata('alert-class', 'alert-danger');
   
    //            }
    //         }
   
    //     }
   
    //     return redirect()->route('/'); 
    //   }

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