<?php

namespace App\Models;

use CodeIgniter\Model;

class PesquisaModel extends Model
{
    protected $table = 'pesquisa';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['genero', '60anos', 'especiais', 'crf-sp', 'atividade', 'participacao', 'data', 'municipio',  'conduta', 
    'abordagem', 'conhecimento', 'experiencia', 'conteudo', 'apresentacao', 'objetividade', 'manifestacao', 'suporte'];

    
}