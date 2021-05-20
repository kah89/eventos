<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use DbConnPDO;

class Chat extends Controller
{
    public function index()
    {
        echo view('chat');
    }
}
