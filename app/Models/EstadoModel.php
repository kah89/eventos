<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadoModel extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'nome', 'uf', 'pais'];

    /**
     * Monta um select de options com os estados cadastrados
     */
    public function selectEstados()
    {
        $options = "<option value=''>Selecione o Estado</option>";
        $estados = $this    
        ->orderBy('nome')   
        ->findAll();

        foreach ($estados as $estado) {            
            $options .= "<option value='{$estado['id']}'>{$estado['nome']}</option>";
        }

        return $options;
    }

        /**
     * Monta um select de options com os estados cadastrados
     */
    public function selectUF()
    {
        $options = "<option value=''>UF</option>";
        $estados = $this    
        ->orderBy('uf')   
        ->findAll();

        foreach ($estados as $estado) {            
            $options .= "<option value='{$estado['id']}'>{$estado['uf']}</option>";
        }

        return $options;
    }
}
