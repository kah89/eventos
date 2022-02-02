<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>


<style>
    body {

        background-color: #F5F5F5;
    }

    h2 {
        color: #092e48;
    }

    #cad {
        width: 200px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;
    }

    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .data {
        width: 200px;
    }

    .forma {
        width: 30%;
        margin-top: -45px;
        margin-left: 20%;
    }

    .cidades {
        width: 30%;
        margin-top: -49px;
        float: right;
        margin-right: 14%;
    }



    @media only screen and (min-width: 1400px) {
        .session {
            margin-left: 250px;
            text-transform: uppercase;
        }

        .menu {
            margin-left: 250px;
        }

        .nav2 {
            margin-left: 70px;
            margin-right: 70px;
        }

    }



    @media (max-width: 650px) {

        .data {
            width: 200px;
        }

        #cad {
            width: 200px;
            background-color: #008CBA;
            font-size: 12px;
            padding: 12px 28px;
            border-radius: 8px;
            border: 2px solid;
            margin-top: 100px;
        }
    }
</style>
<script>
    $msg = "";
</script>

<main id="t3-content">
    <?php
    if (
        isset($_SESSION['id']) &&
        $_SESSION['type'] == 0
    ) {
    ?>
        <div class="row">
            <div class="container">
                <?php if (session()->get('success')) { ?>
                    <script>
                        $msg = '<?= session()->get('success'); ?>';
                    </script>
                <?php } ?>
                <div class="mx-auto ">
                    <div class="card">
                        <div class="card-body">
                            <!-- <a href="<?= base_url('alterarAtividades') ?>">Voltar</a> -->
                            <h2 class="card-title text-center col-12">Cadastro de Pesquisa</h2>
                            </br></br>

                            <form class="form-signin" name='form1' method="POST">

                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="titulo" name="titulo" class="form-control col-12" placeholder="Titulo" maxlength="60" minilength="3" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-label-group" required>
                                        <select id="temas" name="temas" class="form-control">
                                            <option selected disabled>Temas</option>
                                            <option value="1">Campanha de saúde</option>
                                            <option value="2">Capacitação</option>
                                            <option value="3">Curso</option>
                                            <option value="4">Fiscalização Orientativa</option>
                                            <option value="5">Encontro</option>
                                            <option value="6">Fórum</option>
                                            <option value="7">Palestra;o</option>
                                            <option value="8">Seminário</option>
                                            <option value="9">Simpósio</option>
                                            <option value="10">Trilha de aprendizagem</option>
                                            <option value="11">Webinar</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group data" id="inicial">
                                    <div class="form-label-group">
                                        <label for="">Data evento:</label>
                                        <input id="date" type="date" name="data">
                                    </div>
                                </div>

                                <div class="form-group forma">
                                    <div class="form-label-group" required>
                                        <select id="forma" name="forma" class="form-control">
                                            <option selected disabled> forma de participação</option>
                                            <option value="1">Presencial</option>
                                            <option value="2">On-line</option>
                                        </select>
                                    </div>
                                </div>

                                <div class=" oculto cidades">
                                    <div class="questao">
                                        <select id="cidades" name="cidades" class="form-control">
                                            <option selected="selected">Selecione o município</option>
                                            <?php
                                            foreach ($cidades as $key => $cidade) {
                                                if ($cidade['uf'] == '26') {
                                                    echo "<option  value='" . $cidade['id'] . "' >" . $cidade['nome'] . "</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                </br></br>

                                <div class="form-group">
                                    <?php if (isset($validation)) : ?>
                                        <div class="alert alert-danger" roles="alert">
                                            <?= $validation->listErrors(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <button class="btn btn-primary  text-uppercase" id="cad" type="submit">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<h3>Não tem permissão para acessar essa página!</h3>";
    }
    ?>
</main>
<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    }

    if ($msg) {
        toastr.info($msg);
    }

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?= $this->endSection() ?>