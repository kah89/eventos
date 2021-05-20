<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'titulo', 'created_at', 'imagem', 'resumo'];

  

}
