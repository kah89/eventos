<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model

{

    protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
        'id',
        'firstname', 
        'lastname', 
        'email', 
        'password', 
        'updated_at', 
        'pais', 
        'estado', 
        'cidade', 
        'uf', 
        'crf', 
        'cpf', 
        'telefone', 
        'celular', 
        'type'
    ];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = ['beforeInsert'];
	protected $afterInsert          = [];
	protected $beforeUpdate         = ['beforeUpdate'];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


    // protected $table = 'users';
    // protected $allowedFields = ['id','firstname', 'lastname', 'email', 'password', 'updated_at', 'pais', 'estado', 'cidade', 'uf', 'crf', 'cpf', 'telefone', 'celular', 'type'];
    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

     //-----------------------------------------------------------------------------------------------------

     
    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

     //-----------------------------------------------------------------------------------------------------


    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

 //-----------------------------------------------------------------------------------------------------


    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    //-----------------------------------------------------------------------------------------------------


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

      //------------------------------------------------------------------------------

    // public function relatorioEvento($id = null)
    // {
    //     $result = $this
    //         ->select('users.id, concat(users.firstname," ", users.lastname) as nome, users.email, atividade_evento.idEvento, eventos.titulo, pais.nome as pais, estado.nome as estado, users.`type`, group_concat(usuario_atividade.idAtividade) as atividadesconcluidas, usuario_evento.created_at AS "dtInscricao", certificado.created_at AS "dataCertificado"')
    //         ->join('usuario_atividade', 'users.id = usuario_atividade.idUser', 'left')
    //         ->join('atividade_evento', 'usuario_atividade.idAtividade = atividade_evento.id', 'left')
    //         ->join('eventos', 'atividade_evento.idEvento =  eventos.id', 'left')
    //         ->join('usuario_evento', 'usuario_evento.idEvento =  eventos.id', 'left')
    //         ->join('estado', 'users.estado = estado.id', 'left')
    //         ->join('certificado', 'certificado.idUser = users.id AND certificado.idEvento = eventos.id', 'left')
    //         ->join('pais', 'users.pais = pais.id')
    //         ->where('eventos.id', $id)
    //         ->groupBy('users.id')
    //         ->get()->getResultArray();
            
    //     var_dump($result);exit;
    //     return $result;
    // }
}
