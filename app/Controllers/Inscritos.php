<?php

namespace App\Controllers;

use App\Models\UserModel;

class Inscritos extends BaseController
{
    public function index()
    {
        $usuarios =  new UserModel();
        $users = $usuarios
        ->select("users.id, concat(users.firstname,' ', users.lastname) as nome, users.email, pais.nome as pais, estado.nome as estado, users.`type`, group_concat(usuario_atividade.idAtividade) as atividadesconcluidas, users.created_dt")
        ->join("usuario_atividade", "users.id = usuario_atividade.idUser",'left')
        ->join("estado", "users.estado = estado.id",'left')
        ->join("pais", "users.pais = pais.id")
        ->groupBy("users.id")
        ->findAll();
       
        $data = [
            'title' => 'Lista de Inscritos do I Fórum de Tecnologias na Área Farmacêutica',
            'users' => $users,

        ];

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            echo view('templates/header', $data);
            echo view('inscritos');
            echo view('templates/footer');
        }
    }

    public function emitirCertificado()
    {
        $data = [
            'title' => 'Emissão de Certificados',
        ];

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            echo view('templates/header', $data);            
            echo view('emitirCertificado');
            echo view('templates/footer');
        }
    }



    //--------------------------------------------------------------------

}
