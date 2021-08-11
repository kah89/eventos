<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificadoModel extends Model
{
    protected $table = 'certificado';
    protected $returnType     = 'array';
    protected $allowedFields = ['idUser', 'idEvento', 'firstname', 'lastname'];

    
      
}