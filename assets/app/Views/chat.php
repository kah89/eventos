<!doctype html>
<html lang="en">

<head>
    <title>Chat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body>

    <div id="conteudo" class="container">        
        <div id="log">
            <span class="long-content">&nbsp;</span>
        </div>
        
        <form name="form_message" id="form_message" method="post" action="<?= base_url().'/public/chat/set_message.ajax.php'?>">
            <input name="nickname" type="hidden" id="nickname" value="<?= session()->get('firstname') ?>">
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Insira sua mensagem"></textarea>
            </div>
            <button id="btn_send" type="submit" name="enviar" class="btn btn-primary">Enviar</button>            
        </form>       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</body>
<script>
    'use strict';
    $(document).ready(function() {
        getMessages();

        function getMessages() {
            $('.long-content').empty();
            var msg_error = 'Ocorreu um erro...';
            var msg_timeout = 'O servidor não está a responder';
            var message = '';
            $.ajax({
                url: '<?= base_url()."/public/chat/get_messages.ajax.php"?>',
                dataType: "json",
                error: function(xhr, status, error) {
                    if (status === "timeout") {
                        message = msg_timeout;
                        alert(message);
                    } else {
                        message = msg_error;
                        alert(message + ': ' + error);
                    }
                },
                success: function(response) {
                    $.each(response, function(i, item) {
                        $('.long-content').prepend('<p><b>' + item.FromNickname + '</b>: ' + item.Message + '<i style="float:right;">' + item.MessageDate + '</i></p>');
                    });
                    setTimeout(getMessages, 2000);
                },
                timeout: 7000
            });
        }

        // submeter formulário pela função sendForm()
        $('#form_message').on('submit', function(e) {
            e.preventDefault();
            sendForm();
        });

        function sendForm() {
            var msg_error = 'Ocorreu um erro..';
            var msg_timeout = 'O servidor não está a responder';
            var message = '';
            var form = $('#form_message');
            $.ajax({
                data: form.serialize(),
                url: form.attr('action'),
                type: form.attr('method')
            })
            $('#message').val('');
        }

    });
</script>

</html>