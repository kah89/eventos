<?= $this->extend('default') ?>

<?= $this->section('content') ?>

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

    .cad,
    #cad1 {
        width: 40px;
        background-color: #008CBA;
        font-size: 12px;
        border-radius: 8px;
        border: 2px solid;
        text-align: center;
        margin-left: -5px;
    }


    .cad:hover {
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

        .menuUser {
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
                            echo '<tr><td>' . $atividade['id'] . '</td><td>' . $atividade['titulo'] . '</td><td class="datainicial">' . date_format(new DateTime($atividade['dtInicio']), "d/m/Y H:i") . '</td><td class="datafinal">' . date_format(new DateTime($atividade['dtFim']), "d/m/Y H:i") . '</td>';
                            echo '<td>';
                            $inscrito = false;
                            foreach ($users as $userEvento) {
                                if (($userEvento['idUser'] == $_SESSION['id']) && ($userEvento['idEvento'] == $atividade['idEvento'])) {
                                    $inscrito = true;
                                }
                            }

                            if ($inscrito == true) {

                                echo '<a class="btn btn-primary cad" id="cad' . $key . '" href= ' . base_url('/atividades/inscreverAtividade') . "/" . $atividade['id'] . ' onclick="inscreverAtividade(' . $atividade['id'] . ');"  role="button" style="display: none;">Ir</a>';
                                echo '
                                    <span id="countdown' . $key . '"  class="timer"></span>';
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


        function toISOFormat(dateTimeString) {
            // Primeiro, dividimos a data completa em duas partes:
            const [date, time] = dateTimeString.split(' ');
            // Dividimos a data em dia, mês e ano:
            const [DD, MM, YYYY] = date.split('/');
            // Dividimos o tempo em hora e minutos:
            const [HH, mm] = time.split(':');
            // Retornamos a data formatada em um padrão compatível com ISO:
            return `${YYYY}-${MM}-${DD}T${HH}:${mm}`;
        }

        function contador() {
            var x = document.getElementsByClassName("datainicial");
            // var dtfim = new Date('<?php echo $datafinal; ?>');

            for (i = 0; i < x.length; i++) {
                data = toISOFormat(x[i].innerHTML);
                var dtInicial = new Date(data);
                var dtAtual = new Date();
                var seconds = (Date.parse(dtInicial) / 1000) - (Date.parse(dtAtual) / 1000);

                document.getElementById('countdown' + i).innerHTML = timer(seconds);

                if (seconds <= 0) {
                    document.getElementById('countdown' + i).innerHTML = '';
                    document.getElementById('cad' + i).style.display = "block";
                } else {
                    seconds--;
                }

                if (i == (x.length-1)) {
                    var y = document.getElementsByClassName("datafinal");
                    dtfim = new Date(toISOFormat(y[i].innerHTML));                    
                    if (dtfim < dtAtual) {
                        clearInterval(countdownTimer);
                    } 
                }

            }
        }


        function timer(seconds) {
            var days = Math.floor(seconds / 24 / 60 / 60);
            var hoursLeft = Math.floor((seconds) - (days * 86400));
            var hours = Math.floor(hoursLeft / 3600);
            var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
            var minutes = Math.floor(minutesLeft / 60);
            var remainingSeconds = seconds % 60;

            function pad(n) {
                return (n < 10 ? "0" + n : n);
            }

            return (pad(days)) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
        }

        var countdownTimer = setInterval(contador, 1000);
    </script>
</main>
<?= $this->endSection() ?>