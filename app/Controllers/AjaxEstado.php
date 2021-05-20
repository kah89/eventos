<?php 

namespace App\Controllers;
use App\Models\EstadoModel;

class AjaxEstado extends BaseController
{
	public function getEstados()
	{
        
        $estados = new EstadoModel();
        echo $estados->selectEstados();
	}

	//--------------------------------------------------------------------

}