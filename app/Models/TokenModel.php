<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = 'password_reset';
    protected $allowedFields = [ 'token','user_id'];



}
