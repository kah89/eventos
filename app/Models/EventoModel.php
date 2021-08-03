<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'titulo', 'created_at', 'imagem', 'resumo', 'dtInicio', 'dtFim', 'userCreated', 'assinatura', 'tipo', 'estado', 'destinado', 'limite', 'corPrimaria', 'corSecundaria'];


    /**
     * Recebe como parâmetro o idUser e o idEvento e os insere no banco, registrando que a atividade X foi concluída pelo usuário Y na data e hora atual
     */
    public function inscricaoEvento($idUser = null, $idEvento = null)
    {
        $limite = $this
            ->select('limite')
            ->where('id', $idEvento)->get(1)->getRowArray();

        $data = [
            'idUser' => $idUser,
            'idEvento'  => $idEvento,
        ];

        $count = $this
            ->db->table('usuario_evento')
            ->select('count(usuario_evento.idEvento) as count')
            ->where('idEvento', $idEvento)->get(1)->getRowArray();


        $limite = (int)$limite['limite'];
        $count = (int)$count['count'];

        //var_dump($limite); var_dump($count);var_dump(($count < $limite));exit;
        $array = array('idUser' => $idUser, 'idEvento' => $idEvento);
        $q = $this->db->table('usuario_evento')->select('idUser, idEvento')->where($array);

        if ($q->countAllResults() < 1) {
            if ($count < $limite) {
                if ($this
                    ->db
                    ->table('usuario_evento')
                    ->insert($data)
                ) {
                    $result = "Inscrição efetuada com sucesso!";
                }
            } else {
                $result = "Limite de inscrições para este evento atingido!";
            }
        } else {
            $result = "Inscrição já foi efetuada!";
        }
        // var_dump($result);exit;
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


    //---------------------------------------------------------------------------------------------

    // Função para restringir quem pode se inscrever no evento de acordo com o tipo de usuario
    public function verificaInscricao($tipo = null)
    {
        /*
            Tipo de usuario 
                Farmaceutico/SP = 3
                Todos os farmaceuticos = 2
                Estudantes = 1
        */
    }

    //---------------------------------------------------------------------------------------------
    public function quantidadeVagas($idEvento = null)
    {
        $limite = $this
            ->select('limite')
            ->where('id', $idEvento)->get(1)->getRowArray();
      
        $count = $this
            ->db->table('usuario_evento')
            ->select('count(usuario_evento.idEvento) as count')
            ->where('idEvento', $idEvento)->get(1)->getRowArray();

        $limite = (int)$limite['limite'];
        $count = (int)$count['count'];

        $result =   $limite - $count;

        return $result;
    }
}
