<?php

namespace App\Controllers;

use App\Models\AtividadeModel;
use CodeIgniter\Controller;
use Dompdf\Options;
use App\Models\UserModel;
use App\Models\EventoModel;

define('DOMPDF_ENABLE_AUTOLOAD', false);
define("DOMPDF_ENABLE_REMOTE", true);

require_once APPPATH . 'ThirdParty' . DIRECTORY_SEPARATOR . 'dompdf' . DIRECTORY_SEPARATOR . 'autoload.inc.php';

class PdfController extends Controller
{

    public function index ($user = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            helper(['form']);
            $uri = current_url(true);
            $evento_id = $uri->getSegment(3);
            $model =  new EventoModel();
            $newmodel = new AtividadeModel();
            $userModel = new UserModel();
            $horasTotalEvento = $newmodel->horasEvento($evento_id);
        
            $firstnameUser = session()->get('firstname');
            $lastnameUser = session()->get('lastname');

        

            //var_dump($horasTotalEvento);exit;
            
            if ( $model) {
                $data = [
                    'title' => 'Vizualição de Certificado',
                    'data' => $model->find($evento_id),
                    'horas' => $horasTotalEvento,
                    'minutos' => $horasTotalEvento,
                    'user' => $userModel->findall(),
                    'firstname' => $firstnameUser,
                    'lastname' => $lastnameUser,

                ];
        
                
                // var_dump($data['user']);
                // exit;
                
                echo view('certificadoVizualizacao', $data);
            }
        }
        // $uri = current_url(true);
        // $idEvent = $uri->getSegment(4);
        // $model = new EventoModel();
        // if (!session()->get('isLoggedIn')) {
        //         return redirect()->to(base_url('eventosonline/eventos/'));
        //     }
        // $data = [
        //     'title' => 'Certificado',
        //     'data' => $model->find($idEvent),
        // ];
        
         
        // //var_dump($data);exit;
        // echo view('certificadoVizualizacao',$data);
    }

    //---------------------------------------------------------------------------------------------


    public function gerarCertificado ($user = null)
    {

        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            helper(['form']);
            $uri = current_url(true);
            $evento_id = $uri->getSegment(4);
            // var_dump($evento_id);exit;
            $model = new EventoModel();
            $newmodel = new AtividadeModel();

            $horasTotalEvento = $newmodel->horasEvento($evento_id);

            if ( $model) {
                $data = [
                    'title' => 'Certificado',
                    'data' => $model->find($evento_id),
                    'horas' => $horasTotalEvento,
                    'minutos' => $horasTotalEvento,
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname']
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
                exit;
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
