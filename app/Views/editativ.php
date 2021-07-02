<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<style>
    .card-signin {
        border: 0;
        border-radius: 0rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1)
    }
    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem
    }

    .card-signin .card-body {
        padding: 2rem
    }

    .form-signin {
        width: 100%
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 0rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem
    }

    .form-control:focus {
        box-shadow: 10px 0px 0px 0px #ffffff !important
    } 
    #cad {
        width: 300px;
        margin-left: 50px;
    }

    #res:hover {
        background-color: red;
    }

    #ed:hover {
        background-color: #daf87d;
    }

    h5 {
        color: #007BFF;
        text-align: center;
    }

    .btn {
        margin-left: 58px;
    }

    #data {
        width: 180px;
        margin-left: -26px;
    }

    #certificado {
        margin-left: -15px;
    }

    #hora1 {
        width: 100px;
        float: right;
        margin-left: 205px;
        margin-top: -50px;
    }

    #hora {
        width: 100px;
        float: right;
        margin-left: 205px;
        margin-top: -54px;
    }
</style>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Alteração de Atividade</h5>
                        <?php if (session()->get('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->get('success'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="form-signin" method="post">
                           
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" value="<?= $titulo ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <div id="summernote" name="atividade" autofocus>
                                        <p> Atividade: </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 data" id="inicial">
                                <div class="form-label-group">
                                    <label for="">Inicial :</label>
                                    <input type="date" name="datainicial" id="dtAgenda" min="2017-04-01" class="form-control" value="<?php echo date_format(new DateTime($dtInicio), "Y-m-d"); ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="time" name="hinicial" id="hora" class="form-control" value="<?php echo date_format(new DateTime($dtInicio), "H:i"); ?>" required />
                                </div>
                            </div>
                            <div class="form-group col-sm-6 data" id="final">
                                <div class="form-label-group">
                                    <label for="">Final:</label>
                                    <input type="date" name="datafinal" id="dtAgenda1" min="2017-04-01" value="<?php echo date_format(new DateTime($dtFim), "Y-m-d"); ?>" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="time" name="hfinal" id="hora1" class="form-control" value="<?php echo date_format(new DateTime($dtFim), "H:i"); ?>" required />

                                </div>
                            </div>
                            <div class="form-group col-sm-7">
                                <div class="form-label-group">
                                    <select id="certificado" name="certificado" class="form-control" value="<?= $tipo ?>">
                                        <option selected disabled>Certificado</option>
                                        <option value="1">Gera certificado</option>
                                        <option value="2">Não gera certificado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-md btn-primary  text-uppercase" id="cad" type="submit">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>