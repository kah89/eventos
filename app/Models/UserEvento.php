<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEvento extends Model
{
    protected $table = 'usuario_evento';
    protected $returnType     = 'array';
    protected $allowedFields = ['idUser', 'idEvento'];

    
      
}