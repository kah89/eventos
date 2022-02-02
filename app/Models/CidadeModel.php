<?php

namespace App\Models;

use CodeIgniter\Model;

class CidadeModel extends Model
{
    protected $table = 'cidade';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = ['id', 'nome', 'uf'];

    /**
     * Monta um select de options com os estados cadastrados
     */
    public function selectCidades($id_estado = null)
    {
        $options = "<option value=''>Selecione a Cidade</option>";
        $cidades = $this
            ->where('uf', $id_estado)
            ->orderBy('nome')
            ->findAll();

        foreach ($cidades as $cidade) {
            $options .= "<option value='{$cidade['id']}'>{$cidade['nome']}</option>";
        }

        return $options;
    }

}
