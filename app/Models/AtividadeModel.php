<?php

namespace App\Models;

use CodeIgniter\Model;

class AtividadeModel extends Model
{
    protected $table = 'atividade_evento';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id', 'idEvento', 'titulo', 'tipo', 'dtInicio', 'dtFim', 'created_at', 'descricao', 'atividade', 'userCreated'];

    /**
     * Recebe como parâmetro o idUser e o idAtividade e os insere no banco, registrando que a atividade X foi concluída pelo usuário Y na data e hora atual
     */

    public function inscricaoAtividade($idUser = null, $idAtividade = null)
    {

        $data = [
            'idUser' => $idUser,
            'idAtividade'    => $idAtividade
        ];

        $array = array('idUser' => $idUser, 'idAtividade' => $idAtividade);
        $q = $this->db->table('usuario_atividade')->select('idUser, idAtividade')->where($array);
        if ($q->countAllResults() < 1) {
            if ($this
                ->db
                ->table('usuario_atividade')
                ->insert($data)
            ) {
                $result = "Inscrição efetuada com sucesso!";
            }
        } else {
            $result = "Inscrição já foi efetuada!";
        }
        return $result;
    }

    
    public function verificarConclusao($idUser, $idEvento)
    {
        $result = "";
        $query = $this
            ->select('count(id) as total')
            ->where('idEvento', $idEvento)
            ->where('atividade_evento.tipo', 1)
            ->first();

        $totalAtividadesEvento = $query['total'];

        $query2 = $this
            ->select('count(usuario_atividade.idUser) as total')
            ->join('usuario_atividade', 'atividade_evento.id = usuario_atividade.idAtividade and atividade_evento.idEvento = ' . $idEvento)
            ->where('usuario_atividade.idUser', $idUser)
            ->where('atividade_evento.tipo', 1)
            ->first();
        // var_dump($idUser);
        // var_dump($idEvento);exit;

        $totalAtividadesConcluidas = $query2['total'];

        if ($totalAtividadesEvento <= $totalAtividadesConcluidas) {
            $result = "Concluiu todas as atividades.";
        } else {
            $result = "Não concluiu todas as atividades.";
        }

        if ($totalAtividadesEvento == 0) {
            $result = "Evento não gera certificado.";
        }

        return $result;
    }

    //--------------------------------------------------------------------------------------------------------------------

    public function horasEvento($idEvento)
    {

        $horasEvento = $this


            ->select('SUM(HOUR(TIMEDIFF(dtInicio, dtFim))) AS horas, SUM(minute(TIMEDIFF(dtInicio, dtFim))) AS minutos')
            ->where('idEvento', $idEvento)
            ->where('atividade_evento.tipo', 1)
            ->first();

        return $horasEvento;
    }
}
