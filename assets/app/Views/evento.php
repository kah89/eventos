<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-inicio-tab" data-toggle="tab" href="#nav-inicio" role="tab" aria-controls="nav-inicio" aria-selected="true">1º dia</a>
                <a class="nav-link" id="nav-evento1-tab" data-toggle="tab" href="#nav-evento1" role="tab" aria-controls="nav-evento1" aria-selected="false">2º dia</a>
                <a class="nav-link" id="nav-certificado-tab" data-toggle="tab" href="#nav-certificado" role="tab" aria-controls="nav-certificado" aria-selected="false" onclick="verificarConclusao();">Certificado</a>
            </div>
        </nav>
        <div class="tab-content row" id="nav-tabContent">
            <div class="tab-pane col fade show active" id="nav-inicio" role="tabpanel" aria-labelledby="nav-inicio-tab">
                <p id="waiter" style="color: black;font-size: 3em;text-align: center;margin-top: 14%;"></p>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div id="video" style="display: none;text-align: center;">
                            <p style="color: black;font-size: 3em;text-align: center;margin-top: 14%;">
                                Acompanhe a live.
                            </p>
                            <a class="btn btn-success" onclick="concluirAtividade(1);">Assista</a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="tab-pane col fade" id="nav-evento1" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p id="waiter2" style="color: black;font-size: 3em;text-align: center;margin-top: 14%;"></p>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <div id="video2" style="display: none;text-align: center;">
                            <p style="color: black;font-size: 3em;text-align: center;margin-top: 14%;">
                                Acompanhe a live.
                            </p>
                            <a class="btn btn-success" onclick="concluirAtividade(2);">Assista</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane col fade" id="nav-certificado" role="tabpanel" aria-labelledby="nav-certificado-tab">
                <div id="certficado_indisponivel">
                    <p id="certificadoMsg" style="color: black;font-size: 3em;text-align: center;margin-top: 14%;">
                        O Certificado estará disponível após a conclusão do evento.
                    </p>
                </div>
                <div id="certificado_pane" class="col-12" style="padding: 40px;display:none;">
                    <h1>Olá <?= session()->get('firstname') ?>, bem-vindo!</h1>
                    <p>Seu certificado do evento já está disponível.</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Declaro para os devidos fins que participei do I Fórum de Tecnologias na Área Farmacêutica no dia 30/03/2021 e dessa forma solicito a emissão do meu certificado.
                        </label>
                    </div>
                    <br><br>
                    <div class="text-right">
                        <a id="certBtn" onclick="concluirAtividade(3);" class="btn btn-success" style="cursor: no-drop; pointer-events: none;">Emita aqui seu certificado!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Hora de inicio do Evento
        var horaEvento = new Date("May 09, 2021 13:30:00").getTime();
        var fimEvento = new Date("May 09, 2021 22:06:00").getTime();
        var dia1 = false;
        var dia2 = false;

        //Contagem regressiva Evento
        var x = setInterval(function() {

            // Dia e Hora atual
            var now = new Date().getTime();

            var inicio = horaEvento - now;
            var fim = fimEvento - now;

            // Time calculations for days, hours, minutes and seconds
            var daysE = Math.floor(inicio / (1000 * 60 * 60 * 24));
            var hoursE = Math.floor((inicio % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutesE = Math.floor((inicio % (1000 * 60 * 60)) / (1000 * 60));
            var secondsE = Math.floor((inicio % (1000 * 60)) / 1000);

            // Exibindo contagem regressiva do evento
            document.getElementById("waiter").innerHTML = "O evento começará em " + daysE + "d " + hoursE + "h " +
                minutesE + "m " + secondsE + "s ";

            //document.getElementById("waiter").innerHTML = "O evento começará em " + hoursE + "h " +
            //  minutesE + "m " + secondsE + "s ";

            // Se chegar a hora do evento, oculta o contador e exibe o video
            if (inicio < 0) {
                clearInterval(x);
                document.getElementById("video").style.display = "block";
                // document.getElementById("chatBox").style.display = "block";
                dia1 = true;
                document.getElementById("waiter").style.display = "none";
            }

            // Se chegar a hora do evento, oculta o contador e exibe o video
            if (fim < 0) {
                clearInterval(x);
                document.getElementById("video").style.display = "none";
                // document.getElementById("chatBox").style.display = "block";
                dia1 = true;
                document.getElementById("waiter").style.display = "block";
                document.getElementById("waiter").innerHTML = "Esta atividade já foi finalizada!";
            }


        }, 1000);

        //Hora de inicio do Evento
        var horaEvento2 = new Date("May 10, 2021 17:00:00").getTime();
        //Hora de término
        var horaTerminoEvento2 = new Date("May 10, 2021 22:00:00").getTime();

        //Contagem regressiva Evento
        var x2 = setInterval(function() {

            // Dia e Hora atual
            var now2 = new Date().getTime();

            var inicio2 = horaEvento2 - now2;
            var fim2 = horaTerminoEvento2 - now2;

            // Time calculations for days, hours, minutes and seconds
            var daysE2 = Math.floor(inicio2 / (1000 * 60 * 60 * 24));
            var hoursE2 = Math.floor((inicio2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutesE2 = Math.floor((inicio2 % (1000 * 60 * 60)) / (1000 * 60));
            var secondsE2 = Math.floor((inicio2 % (1000 * 60)) / 1000);

            // Exibindo contagem regressiva do evento
            document.getElementById("waiter2").innerHTML = "O evento começará em " + daysE2 + "d " + hoursE2 + "h " +
                minutesE2 + "m " + secondsE2 + "s ";

            //document.getElementById("waiter").innerHTML = "O evento começará em " + hoursE + "h " +
            //  minutesE + "m " + secondsE + "s ";

            // Se chegar a hora do evento, oculta o contador e exibe o video
            if (inicio2 < 0) {
                clearInterval(x);
                document.getElementById("video2").style.display = "block";
                document.getElementById("waiter2").style.display = "none";
                dia2 = true;

            }

            if (fim2 < 0) {
                
                document.getElementById("video2").style.display = "none";
                document.getElementById("waiter2").style.display = "block";
                document.getElementById("waiter2").innerHTML = "Esta atividade já foi finalizada!";
            } else {
                document.getElementById("certificado_pane").style.display = "none";
                document.getElementById("certficado_indisponivel").style.display = "block";

            }
        }, 1000);

        $('.form-check-input').on('change', function() {
            if (this.checked) {
                //Do stuff
                $("#certBtn").prop("disabled", false);
                $("#certBtn").attr('href', '<?= base_url("/certificado") ?>').css({
                    'cursor': 'pointer',
                    'pointer-events': 'auto',
                    'color': 'white'
                });

            } else {
                $("#certBtn").prop("disabled", true);
                $("#certBtn").attr('href', '').css({
                    'cursor': 'no-drop',
                    'pointer-events': 'none'
                });

            }
        });

        function concluirAtividade(atividade) {
            $.post('<?= base_url("/concluirAtividade") ?>', {
                id_user: <?= session()->get('id') ?>,
                id_atividade: atividade
            }, function(result) {
                if (atividade == 1) {
                    window.location.href = "https://www.youtube.com/watch?v=J977CnHZUgk";
                } else if (atividade == 2) {
                    window.location.href = "https://www.youtube.com/watch?v=vM-4Lp6xx5A";
                }
            });
        }

        function verificarConclusao() {
            $.post('<?= base_url("/verificarConclusao") ?>', {
                id_user: <?= session()->get('id') ?>,
                id_evento: 1
            }, function(result) {
                if (result == 'true') {
                    document.getElementById("certificado_pane").style.display = "block";
                    document.getElementById("certficado_indisponivel").style.display = "none";                    
                } else {
                    document.getElementById("certificadoMsg").innerHTML = "O Evento foi concluído e não identificamos sua participação em todas as atividades!";
                }
            });

        }
    </script>
</main>