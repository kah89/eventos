<?php 

namespace App\Controllers;
use App\Models\CidadeModel;

class AjaxCidade extends BaseController
{
	public function getCidades()
	{
		// $id_estado = $this->input->post('id_estado');
		$id_estado = service('request')->getPost('id_estado');

        $cidades = new CidadeModel();
        echo $cidades->selectCidades($id_estado);
	}

	//--------------------------------------------------------------------

}