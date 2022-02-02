<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAcesso extends Model
{
    protected $table = 'log_acesso';    
    protected $returnType     = 'array';

    protected $allowedFields = ['idUser', 'dataAcesso'];

    /**
     * retorna todos os acesso de um determinado usuário
     */
    /*public function getByUser($idUser)
    {
        $data = $this
            ->where('idUser', $idUser)
            ->get();

        return $data;
    }*/

      
}
