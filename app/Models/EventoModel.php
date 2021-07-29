<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'titulo', 'created_at', 'imagem', 'resumo', 'dtInicio', 'dtFim', 'userCreated', 'assinatura', 'tipo', 'limite'];

    /**
     * Recebe como parâmetro o idUser e o idEvento e os insere no banco, registrando que a atividade X foi concluída pelo usuário Y na data e hora atual
     */
    public function inscricaoEvento($idUser = null, $idEvento = null, $limitePessoas = null)
    {

        $data = [
            'idUser' => $idUser,
            'idEvento'    => $idEvento
        ];

        // var_dump($idEvento);exit;
        $count = $this
            ->db->table('usuario_evento')
            ->select('count(usuario_evento.idEvento) as total')
            ->where('idEvento', $idEvento)->get(1)->getRowArray();


        $array = array('idUser' => $idUser, 'idEvento' => $idEvento);
        $q = $this->db->table('usuario_evento')->select('idUser, idEvento')->where($array);
        if ($q->countAllResults() < $limitePessoas) {
            if ($count < 1) {
                if ($this
                    ->db
                    ->table('usuario_evento')
                    ->insert($data)
                ) {
                    $result = "Inscrição efetuada com sucesso!";
                }
            }else {
                $result = "Limite de inscrições atingido!";
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

    // Função para restringir quem pode se inscrever no evento de acordo com o tipo de usuario
    public function verificaInscricao($tipo = null)
    {
        /*
            Tipo de usuario 
                Farmaceutico / SP = 1
                Todos os farmaceuticos = 2
                Estudantes = 3
        */
    }
}
