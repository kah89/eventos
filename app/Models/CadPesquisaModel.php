<?php

namespace App\Models;

use CodeIgniter\Model;

class CadPesquisaModel extends Model
{
    protected $table = 'cad_Pesquisa';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'titulo', 'data', 'temas', 'forma', 'municipio'];

      /**
     * Monta um select de options com os estados cadastrados
     */
    public function selectAtividade($forma = null)
    {

        
        $options = "<option value=''>Selecione a Atividade</option>";
        $atividades = $this
            ->where('forma', $forma)
            ->orderBy('titulo')
            ->findAll();

        foreach ($atividades as $atividade) {
            $options .= "<option value='{$atividade['id']}'>{$atividade['titulo']}</option>";
        }
 
        return $options;
    }
}