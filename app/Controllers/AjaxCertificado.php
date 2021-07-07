<?php 

namespace App\Controllers;
use App\Models\CertificadoModel;

class AjaxCertificado extends BaseController
{
	public function getCertificado()
	{
		// $id_estado = $this->input->post('id_estado');
		$id_evento = service('request')->getPost('id_evento');

        $certificado = new CertificadoModel();
        echo $certificado->selectCidades($id_evento);
	}

	//--------------------------------------------------------------------

}