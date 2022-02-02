<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
    protected $table = 'pais';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'nome_pt'];

    
    /**
     * Monta um select de options com os estados cadastrados
     */
    public function selectPaises()
    {
        $options = "<option value=''>Selecione o Pais</option>";
        $paises = $this    
        ->orderBy('nome_pt')   
        ->findAll();

        foreach ($paises as $pais) {            
            $options .= "<option value='{$pais['id']}'>{$pais['nome_pt']}</option>".PHP_EOL;
        }
        
        return $options;
    }
}
