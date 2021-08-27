<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<script src="https://rawgit.com/HugoGiraudel/Countdown.js/master/countdown.js"></script>
<style>
    h1,
    th {
        color: #092e48;
        text-align: left;
        margin-top: 20px;
        font: caption;
    }

    #cad,
    #cad1 {
        width: 40px;
        background-color: #008CBA;
        font-size: 12px;
        border-radius: 8px;
        border: 2px solid;
        text-align: center;
        margin-left: -5px;
    }


    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .timer {
        color: red;
        margin-top: -15px;
    }

    @media only screen and (min-width: 1200px) {
        .session {
            margin-left: 260px;
            text-transform: uppercase;
        }

        .menu {
            margin-left: 260px;
        }

        .nav2 {
            margin-left: 70px;
            margin-right: 70px;
        }

        .menuUser{
            margin-left: 260px;
        }

        .sessionUser {
            margin-left: 260px;
            text-transform: uppercase;
    }
    }
</style>
<main id="t3-content">
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                <a href="<?= base_url('inicio') ?>">Voltar</a>
                <h1 style="text-align: center; font-size:30px">Atividades</h1>

                <table class="table table-hover" id="atividades">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Data Início</th>
                            <th scope="col">Data Término</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $atividade) {
                            if ($atividade['tipo'] == '1') {
                                $tipo = 'Sim';
                            } else {
                                $tipo = 'Não';
                            }
                            echo '<tr><td>' . $atividade['id'] . '</td><td>' . $atividade['titulo'] . '</td><td>' . date_format(new DateTime($atividade['dtInicio']), "d/m/Y  - H:i") . '</td><td>' . date_format(new DateTime($atividade['dtFim']), "d/m/Y  - H:i") . '</td>';
                            echo '<td>';
                            $inscrito = false;
                            foreach ($users as $userEvento) {
                                if (($userEvento['idUser'] == $_SESSION['id']) && ($userEvento['idEvento'] == $atividade['idEvento'])) {
                                    $inscrito = true;
                                }
                            }

                            if ($inscrito == true) {

                                echo '<a class="btn btn-primary" id="cad" href= ' . base_url('/atividades/inscreverAtividade') . "/" . $atividade['id'] . ' onclick="inscreverAtividade(' . $atividade['id'] . ');"  role="button" style="display:none;" >Ir</a>';
                                echo '
                                    <span id="countdown" class="timer"></span>';
                            } else {
                                echo '<a class="btn btn-primary" id="cad1" data-toggle="modal" data-target="#sobreModal">Ir</a>';
                            }
                            echo  '</td></tr>';
                        }

                        ?>

                    </tbody>
                </table>


            </div>
        </div>
        <div class="modal fade" data-backdrop="static" id="sobreModal" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sobreModalLabel">Atividade</h5>
                        <button type="button" class="close cad" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Infelizmente você não esta inscrito nesse evento!
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function inscreverAtividade($id) {
            var link = '<?php echo (base_url("/atividades/inscreverAtividade") . "/");  ?>';
            document.getElementById("cad").href = link + $id;
        }


        var upgradeTime =
            <?php
             
            $timestamp = strtotime($data[0]['dtInicio']) - strtotime(date("d-m-Y H:i:s"));
           
            echo "$timestamp";
            ?>;

        var seconds = upgradeTime;
        
        function timer() {
            var days = Math.floor(seconds / 24 / 60 / 60);
            var hoursLeft = Math.floor((seconds) - (days * 86400));
            var hours = Math.floor(hoursLeft / 3600);
            var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
            var minutes = Math.floor(minutesLeft / 60);
            var remainingSeconds = seconds % 60;

            function pad(n) {
                return (n < 10 ? "0" + n : n);
            }
            document.getElementById('countdown').innerHTML = pad(days) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
            if (seconds <= 0) {
                clearInterval(countdownTimer);
                document.getElementById('countdown').innerHTML = '';
                document.getElementById('cad').style.display = "block";

            } else {
                seconds--;
            }
        }
        timer();
        var countdownTimer = setInterval('timer()', 1000);
    </script>
</main>