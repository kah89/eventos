<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEvento extends Model
{
    protected $table = 'usuario_evento';
    protected $returnType     = 'array';
    protected $allowedFields = ['idUser', 'idEvento'];

    public function buscarEvento($idUser = null)
    {
        $result = $this->db->query('SELECT eventos.* FROM eventos left join usuario_evento on eventos.id = usuario_evento.idEvento
            WHERE usuario_evento.idEvento IS null ');         
        return $result;
    }
      
}