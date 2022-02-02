<main>
    <style>
        video {
            /* override other styles to make responsive */
            width: 100% !important;
            height: auto !important;
        }

        #log {
            height: 390px;
            border: 1px solid #ececec;
            padding: 4px;
            overflow: auto;
        }

        .msg {
            padding: 2px;
            border-bottom: 1px solid #ececec;
            margin: 0px;
        }
    </style>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-inicio-tab" data-toggle="tab" href="#nav-inicio" role="tab" aria-controls="nav-inicio" aria-selected="true">1º dia</a>
                <a class="nav-link" id="nav-evento1-tab" data-toggle="tab" href="#nav-evento1" role="tab" aria-controls="nav-evento1" aria-selected="false">2º dia</a>
                <a class="nav-link" id="nav-certificado-tab" data-toggle="tab" href="#nav-certificado" role="tab" aria-controls="nav-certificado" aria-selected="false">Certificado</a>
            </div>
        </nav>
        <div class="tab-content row" id="nav-tabContent">
            <div class="tab-pane col fade show active" id="nav-inicio" role="tabpanel" aria-labelledby="nav-inicio-tab">
                <p id="waiter" style="color: black;font-size: 3em;text-align: center;margin-top: 14%;"></p>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <iframe id="video" style="display: none;margin: auto;width: 100%;" width="1019" height="573" src="https://www.youtube.com/embed/UTLriLUJr3E?autoplay=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>

                </div>
            </div>
            <div class="tab-pane col fade" id="nav-evento1" role="tabpanel" aria-labelledby="nav-profile-tab">
                <p id="waiter2" style="color: black;font-size: 3em;text-align: center;margin-top: 14%;"></p>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-12">
                        <iframe id="video2" style="display: none;margin: auto;width: 100%;" width="1019" height="573" src="https://www.youtube.com/embed/UTLriLUJr3E?autoplay=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
            <div class="tab-pane col fade" id="nav-certificado" role="tabpanel" aria-labelledby="nav-certificado-tab">
                <div id="certficado_indisponivel">
                    <p style="color: black;font-size: 3em;text-align: center;margin-top: 14%;">
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
                        <a id="certBtn" href="" class="btn btn-success" style="cursor: no-drop; pointer-events: none;">Emita aqui seu certificado!</a>
                    </div>

                </div>
            </div>
            <!-- <div id="chatBox" class="col-4" style="display: none; margin-top:10px;">
                <div id="log">
                    <div class="long-content">&nbsp;</div>
                </div>
                <br>
                <form name="form_message" id="form_message" method="post" action="<?= base_url() . '/public/chat/set_message.ajax.php' ?>">
                    <input name="iduser" type="hidden" id="iduser" value="<?= session()->get('id') ?>">
                    <input name="nickname" type="hidden" id="nickname" value="<?= session()->get('firstname') ?> <?= session()->get('lastname') ?>">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="3" placeholder="Insira sua mensagem"></textarea>
                    </div>
                    <button id="btn_send" type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                </form>
            </div> -->
        </div>
    </div>
    <script>
        //Hora de inicio do Evento
        var horaEvento = new Date("Mar 30, 2021 18:30:00").getTime();
        var dia1 = false;
        var dia2 = false;

        //Contagem regressiva Evento
        var x = setInterval(function() {

            // Dia e Hora atual
            var now = new Date().getTime();

            var inicio = horaEvento - now;

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


        }, 1000);

        //Hora de inicio do Evento
        var horaEvento2 = new Date("Mar 31, 2021 18:30:00").getTime();
        //Hora de término
        var horaTerminoEvento2 = new Date("Mar 31, 2021 22:00:00").getTime();

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
                document.getElementById("certificado_pane").style.display = "block";
                document.getElementById("certficado_indisponivel").style.display = "none";
            } else {
                document.getElementById("certificado_pane").style.display = "none";
                document.getElementById("certficado_indisponivel").style.display = "block";

            }
        }, 1000);

        // 'use strict';
        // $(document).ready(function() {
        //     getMessages();

        //     function getMessages() {
        //         $('.long-content').empty();
        //         var msg_error = 'Ocorreu um erro...';
        //         var msg_timeout = 'O servidor não está a responder';
        //         var message = '';
        //         $.ajax({
        //             url: '<?= base_url() . "/public/chat/get_messages.ajax.php" ?>',
        //             dataType: "json",
        //             error: function(xhr, status, error) {
        //                 if (status === "timeout") {
        //                     message = msg_timeout;
        //                     alert(message);
        //                 } else {
        //                     message = msg_error;
        //                     alert(message + ': ' + error);
        //                 }
        //             },
        //             success: function(response) {
        //                 $.each(response, function(i, item) {
        //                     $('.long-content').prepend('<div class="msg row"><div class="col-9"><b>' + item.FromNickname + '</b><br> ' + item.Message + '</div><div class="col-3"><i style="float:right;">' + item.MessageDate + '</i></div></div>');
        //                 });
        //                 setTimeout(getMessages, 2000);
        //             },
        //             timeout: 7000
        //         });
        //     }

        //     // submeter formulário pela função sendForm()
        //     $('#form_message').on('submit', function(e) {
        //         e.preventDefault();
        //         sendForm();
        //     });

        //     function sendForm() {
        //         var msg_error = 'Ocorreu um erro..';
        //         var msg_timeout = 'O servidor não está a responder';
        //         var message = '';
        //         var form = $('#form_message');
        //         $.ajax({
        //             data: form.serialize(),
        //             url: form.attr('action'),
        //             type: form.attr('method')
        //         })
        //         $('#message').val('');
        //     }




        // });

        $('.form-check-input').on('change', function() {
            if (this.checked) {
                //Do stuff
                $("#certBtn").prop("disabled", false);
                $("#certBtn").attr('href', 'certificado').css({
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

        // $('a[data-toggle="tab"]').on('click', function(e) {
        //     if (e.target.hash === "#nav-certificado") {
        //         document.getElementById("chatBox").style.display = "none";
        //     } else if (e.target.hash === "#nav-inicio") {
        //         if (dia1 == true) {
        //             document.getElementById("chatBox").style.display = "block";
        //         }
        //     } else {
        //         if (dia2 == true) {
        //             document.getElementById("chatBox").style.display = "block";
        //         } else {
        //             document.getElementById("chatBox").style.display = "none";
        //         }
        //     }
        // });
    </script>
</main>