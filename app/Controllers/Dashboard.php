<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'I Fórum de Tecnologias na Área Farmacêutica',
        ];

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            echo view('templates/header', $data);
            /*echo view('dashboard');*/
            echo view('evento');
            echo view('templates/footer');
        }
    }

    public function teste()
    {
        $data = [
            'title' => 'I Fórum de Tecnologias na Área Farmacêutica',
        ];

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            echo view('templates/header', $data);
            /*echo view('dashboard');*/
            echo view('teste');
            echo view('templates/footer');
        }
    }

    public function concluirAtividade()
    {
        $id_user = service('request')->getPost('id_user');
        $id_atividade = service('request')->getPost('id_atividade');    

        $atividade = new \App\Models\AtividadeModel();
        echo $atividade->concluirAtividade($id_user,$id_atividade);                
    }

    public function verificarConclusao()
    {
        $id_user = service('request')->getPost('id_user');
        $id_evento = service('request')->getPost('id_evento');
        
        $atividade = new \App\Models\AtividadeModel();
        echo $atividade->verificarConclusao($id_user,$id_evento);                
    } 

    //--------------------------------------------------------------------

}
