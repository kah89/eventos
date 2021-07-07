<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificadoModel extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [];

    /**
     * Monta um select de options com os estados cadastrados
     */
    
}