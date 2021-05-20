<?php

namespace App\Libraries;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


defined('BASEPATH') or exit('No direct script access allowed');

class Phpmailer_Lib {
    public function __construct()
    {
        log_message('Debug','PHPMailer class is loaded');
    }

    public function load(){
        require_once __DIR__ . '../ThirdParty/PHPMailer/Exception.php';
        require_once __DIR__ . '../ThirdParty/PHPMailer/PHPMailer.php';
        require_once __DIR__ . '../ThirdParty/PHPMailer/SMTP.php';        
        
        $mail = new PHPMailer;
        return $mail;
    }
}