<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'usuario_atividade';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['idUser', 'idAtividade'];
}