<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Options;
use App\Models\UserModel;
use App\Models\EventoModel;

define('DOMPDF_ENABLE_AUTOLOAD', false);
define("DOMPDF_ENABLE_REMOTE", true);

require_once APPPATH . 'ThirdParty' . DIRECTORY_SEPARATOR . 'dompdf' . DIRECTORY_SEPARATOR . 'autoload.inc.php';

class PdfController extends Controller
{

    public function verCertificado()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $id = session()->get('id');
            $usuarios =  new UserModel();
           
            if ($user = $usuarios->find($id)) {
                $data = [
                    'nome' => $user['firstname'],
                    'sobrenome' => $user['lastname']
                ];

               echo view('certificado', $data);
            } 
        }
    }

        //---------------------------------------------------------------------------------------------
    
    
        public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $id = session()->get('id');
            $usuarios =  new UserModel();
           
            if ($user = $usuarios->find($id)) {
                $data = [
                    'nome' => $user['firstname'],
                    'sobrenome' => $user['lastname']
                ];

                $html = view('certificado', $data);
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $pdf = new \Dompdf\Dompdf($options);
                $pdf->loadHtml($html);
                $pdf->setPaper('A4', 'landscape');
                $pdf->set_option('isRemoteEnabled', TRUE);
                $pdf->render();
                ob_clean();
                header("Content-Type: application/pdf");
                $pdf->stream("certificado.pdf", array("Attachment" => 1));
                exit;
            } else {
                return redirect()->to(base_url(''));
            }
        }
    }

    //---------------------------------------------------------------------------------------------
   
   
    public function emitirCertificado()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            if ($this->request->getMethod(true) == 'POST') {
                $text = $this->request->getVar('textCertificado');

               
                $data  = [
                    'text' => $text
                ];

                $html = view('certificadoEmpty', $data);

                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);

                $pdf = new \Dompdf\Dompdf($options);
                $pdf->loadHtml($html);
                $pdf->setPaper('A4', 'landscape');
                $pdf->set_option('isRemoteEnabled', TRUE);
                $pdf->render();
                ob_clean();
                header("Content-Type: application/pdf");
                $pdf->stream("certificado.pdf", array("Attachment" => 1));
                exit;
            }
        }
    }
}
