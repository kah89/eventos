<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'titulo', 'created_at', 'imagem', 'resumo', 'dtInicio', 'dtFim', 'userCreated','assinatura', 'tipo' , 'estado' , 'destinado'];

    /**
     * Recebe como parâmetro o idUser e o idEvento e os insere no banco, registrando que a atividade X foi concluída pelo usuário Y na data e hora atual
     */
    public function inscricaoEvento($idUser = null, $idEvento = null)
    {

        $data = [
            'idUser' => $idUser,
            'idEvento'    => $idEvento
        ];

        $array = array('idUser' => $idUser, 'idEvento' => $idEvento);
        $q = $this->db->table('usuario_evento')->select('idUser, idEvento')->where($array);
        if ($q->countAllResults() < 1) {
            if ($this
                ->db
                ->table('usuario_evento')
                ->insert($data)
            ) {
                $result = "Inscrição efetuada com sucesso!";
            }
        } else {
            $result = "Inscrição já foi efetuada!";
        }
        return $result;
    }


//---------------------------------------------------------------------------------------------
    
public function certificado($idUser = null, $idEvento = null, $firstnameUser = null, $lastnameUser = null)
{

    $data = [
        'idUser' => $idUser,
        'idEvento'  => $idEvento,
        'firstname' => $firstnameUser,
        'lastname' => $lastnameUser,
    ];

    $array = array('idUser' => $idUser, 'idEvento' => $idEvento);
    $q = $this->db->table('certificado')->select('*')->where($array);
    if ($q->countAllResults() < 1) {
        if ($this
            ->db
            ->table('certificado')
            ->insert($data)
        ) {
            $result = "Certificado gerado com sucesso!";
        }
    } else {
        $result = $this->db->table('certificado')->select('*')->where($array)->get()->getResultArray();        
    }
    return $result;
}

}