<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAtividade extends Model
{
    protected $table = 'usuario_atividade';
    protected $returnType     = 'array';
    protected $allowedFields = ['idUser', 'idEvento'];

    
      
}