<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    
    protected $allowedFields = ['id','firstname', 'lastname', 'email', 'password', 'updated_at', 'pais', 'estado', 'cidade', 'uf', 'crf', 'cpf', 'telefone', 'celular', 'type'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
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
