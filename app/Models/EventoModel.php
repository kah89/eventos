<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'titulo', 'created_at', 'imagem', 'resumo', 'dtInicio', 'dtFim', 'userCreated', 'assinatura', 'tipo', 'certificado', 'destinado', 'limite', 'corPrimaria', 'corSecundaria'];


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

        $array = array('idUser' => $idUser, 'idEvento' => $idEvento);
        $q = $this->db->table('usuario_evento')->select('idUser, idEvento')->where($array);

        if ($q->countAllResults() < 1) {
            if ($count < $limite) {
                if ($this->verificaInscricao($data)) {
                    if ($this
                        ->db
                        ->table('usuario_evento')
                        ->insert($data)
                    ) {
                        $result = "Inscrição efetuada com sucesso!";
                    } else {
                        $result = "Erro ao efetuar inscrição";
                    }
                } else {
                    // $result = "Não é possivel inscrever nesse evento pois
                    //  conflita com outro evento ou este evento não é destinado para seu usuario.";
                    $result = "Erro ao efetuar inscrição";
                }
            } else {
                $result = "Limite de inscrições para este evento atingido!";
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


    //---------------------------------------------------------------------------------------------

    // Verifica se a inscrição é valida de acordo com os criterios do evento
    public function verificaInscricao($data = null)
    {
        $q = $this->select('*')->where('id=' . $data['idEvento'])->get(1)->getRowArray();

        //Verifica se a data de um evento que é exclusivo conflita com a data de outros eventos.
        if ($q['tipo'] == 2) {
            if ($a = $this->inscritoEventoExclusivo($data['idUser'])) {
                foreach ($a as $eventosInscritos) {
                    if (!($q['dtInicio'] < $eventosInscritos['dtInicio'] && $q['dtFim'] < $eventosInscritos['dtInicio']) || ($q['dtInicio'] > $eventosInscritos['dtInicio'] && $eventosInscritos['dtFim'] < $q['dtInicio'])) {
                        return false;
                    }
                }
            }
        } else {
            if ($a = $this->inscritoTodosEvento($data['idUser'])) {
                foreach ($a as $eventosInscritos) {
                    if (
                        !(($q['dtInicio'] < $eventosInscritos['dtInicio'] && $q['dtFim'] < $eventosInscritos['dtInicio'])
                            ||
                            ($q['dtInicio'] > $eventosInscritos['dtInicio'] && $eventosInscritos['dtFim'] < $q['dtInicio']))
                    ) {
                        return false;
                    }
                }
            }
        }



        // Verifica se o evento é destinado para determinado usuario 
        /*
        Tipos de evento : 1 evento para estudantes
                          2 evento somente para farmaceuticos
                          3 evento somente para farmaceuticos de SP
        */
        if (in_array("2", json_decode($q['destinado'])) && in_array("1", json_decode($q['destinado']))) {
            if (session()->get('type') == 1 || session()->get('type') == 2 || session()->get('type') == 0) {
                return true;
            } else {
                return false;
            }
        }
        if (in_array("2", json_decode($q['destinado']))) {
            if (session()->get('type') == 2 || session()->get('type') == 0) {
                return true;
            }
        }

        if (in_array("3", json_decode($q['destinado']))) {
            if (session()->get('type') == 2 && session()->get('estado') == '26' || session()->get('type') == 0) {
                return true;
            }
        }
        if (in_array("1", json_decode($q['destinado']))) {
            if (session()->get('type') == 1 || session()->get('type') == 0) {
                return true;
            }
        }
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

        // var_dump($limite['limite']);exit;
        $limite = (int)$limite['limite'];
        $count = (int)$count['count'];
        $result =   $limite - $count;
        return $result;
    }

    //------------------------------------------------------------------------------ 

    public function inscritoEventoExclusivo($idUser = null)
    {

        $result = $this
            ->select('*')
            ->join('usuario_evento', 'eventos.id = usuario_evento.idEvento')
            ->where('eventos.tipo', 1)
            ->where('usuario_evento.idUser', $idUser)->get()->getResultArray();
        return $result;
    }

    //------------------------------------------------------------------------------

    public function inscritoTodosEvento($idUser = null)
    {
        $result = $this
            ->select('*')
            ->join('usuario_evento', 'eventos.id = usuario_evento.idEvento')
            ->where('usuario_evento.idUser', $idUser)->get()->getResultArray();
        return $result;
    }

    //------------------------------------------------------------------------------

    public function teste($idUser = null, $idEvento = null)
    {
        $q = $this->select('*')->where('id=' . $idEvento)->get(1)->getRowArray();
        //Verifica se a data de um evento que é exclusivo conflita com a data de outros eventos.
        if ($q['tipo'] == 2) {
            if ($a = $this->inscritoEventoExclusivo($idUser)) {
                foreach ($a as $eventosInscritos) {
                    if (!($q['dtInicio'] < $eventosInscritos['dtInicio'] && $q['dtFim'] < $eventosInscritos['dtInicio']) || ($q['dtInicio'] > $eventosInscritos['dtInicio'] && $eventosInscritos['dtFim'] < $q['dtInicio'])) {
                        return false;
                    }
                }
            }
        } else {
            if ($a = $this->inscritoTodosEvento($idUser)) {
                foreach ($a as $eventosInscritos) {
                    if (
                        !(($q['dtInicio'] < $eventosInscritos['dtInicio'] && $q['dtFim'] < $eventosInscritos['dtInicio'])
                            ||
                            ($q['dtInicio'] > $eventosInscritos['dtInicio'] && $eventosInscritos['dtFim'] < $q['dtInicio']))
                    ) {
                        return false;
                    }
                }
            }
        }
        if (Date($q['dtFim']) < date("Y-m-d H:i:s")) {
            return false;
        }

        if (in_array("2", json_decode($q['destinado'])) && in_array("1", json_decode($q['destinado']))) {
            if (!(session()->get('type') == 1 || session()->get('type') == 2 || session()->get('type') == 0)) {
                return false;
            }
        }
        if (in_array("2", json_decode($q['destinado']))) {
            if (!(session()->get('type') == 2 || session()->get('type') == 0)) {
                return false;
            }
        }
        if (in_array("3", json_decode($q['destinado']))) {
            if (!(session()->get('type') == 2 && session()->get('estado') == '26' || session()->get('type') == 0)) {
                return false;
            }
        }
        if (in_array("1", json_decode($q['destinado']))) {
            if (!(session()->get('type') == 1 || session()->get('type') == 0)) {
                return false;
            }
        }
        $jaInscrito = $this
            ->select('*')
            ->join('usuario_evento', 'eventos.id = usuario_evento.idEvento')
            ->where('usuario_evento.idUser', $idUser)
            ->where('eventos.id', $idEvento)
            ->get()->getResultArray();
        if (count($jaInscrito) > 0) {
            return false;
        }
        return true;
    }

    //------------------------------------------------------------------------------

    public function eventosDisponiveis($idUser = null, $destinado = null)
    {
        $query = 'SELECT eventos.id, eventos.titulo, eventos.tipo, eventos.destinado, eventos.resumo, eventos.imagem, eventos.assinatura, eventos.dtInicio, eventos.dtFim, eventos.limite, eventos.corPrimaria, eventos.corSecundaria from eventos 
        LEFT JOIN usuario_evento 
        ON usuario_evento.idEvento = eventos.id 
        LEFT JOIN users 
        ON usuario_evento.idUser = users.id        
        WHERE eventos.id NOT IN (SELECT idEvento from usuario_evento 
        WHERE usuario_evento.idUser = ';

        $query .= $idUser . ')
        AND eventos.dtFim > NOW()        
        AND  eventos.limite > ( 
        SELECT COUNT(idUser) AS inscritos FROM usuario_evento WHERE usuario_evento.idEvento = eventos.id)';

        if (count($destinado) > 1) {
            $query .= 'AND (INSTR(eventos.destinado, "' . $destinado[0] . '") ';
            for ($i = 1; $i <= count($destinado) - 1; $i++) {
                $query .= 'OR INSTR(eventos.destinado, "' . $destinado[$i] . '")';
            }
            $query .= ') ';
        } else {
            $query .= 'AND INSTR(eventos.destinado, "' . $destinado[0] . '") ';
        }


        $q = $this->db->query($query);

        return $q->getResultArray();
    }

    //------------------------------------------------------------------------------

    public function getEventos($userID)
    {
        $query = "SELECT eventos.* 
        ,IF((SELECT idEvento FROM  usuario_evento  WHERE idEvento = eventos.id AND idUser = " . $userID . ")>0, 'Sim', 'Não') AS inscrito 	 
        ,IF(eventos.dtFim > NOW(), 'Não', 'Sim') AS Expirado 	 
        ,IF( eventos.limite > (SELECT COUNT(idUser) AS inscritos FROM usuario_evento WHERE usuario_evento.idEvento = eventos.id), 'Não', 'Sim') AS limiteExcedido
        , (eventos.limite - (SELECT COUNT(usuario_evento.idEvento) as totalInscritos FROM  usuario_evento 
         WHERE idEvento = eventos.id)) AS vagas  
             FROM eventos 	 	     	 
             left join usuario_evento on eventos.id = usuario_evento.idEvento	 
         GROUP BY  eventos.id
         ORDER BY Expirado, dtFim, dtInicio";
        $q = $this->db->query($query);

        return $q->getResultArray();
    }
}
