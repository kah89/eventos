<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<style>
  h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }
    .eventos,
    #user {
        margin-left: 190px;
    }

    #navbarNav {
        font-size: 15px;
    }
</style>
<main>
<?php
    if (
        isset($_SESSION['id']) &&
        $_SESSION['type'] == 0
    ) {
    ?>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <form method="post" action="<?= base_url('/PdfController/emitirCertificado'); ?>">
                    <div class="form-group">
                        <label for="textCertificado">Texto do Certificado</label>
                        <textarea type="text" name="atividade" id="summernote" class="form-control" placeholder="Atividade" autofocus> </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Emitir</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    }else{
        // return redirect()->to(base_url('eventos'));
       echo "<h3>Não tem permissão para acessar essa página!</h3>";
    }
    ?>
</main>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>