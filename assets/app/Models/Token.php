<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = 'password_reset';
    protected $allowedFields = ['id', 'token', 'created_at'];

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function create(string $string)
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }

    public function getAll()
    {
        $data = $this
            ->db
            ->table('users a')
            ->select('*')
            ->join('estado b', 'b.id = a.estado')
            ->get();

        return $data;
    }
}
