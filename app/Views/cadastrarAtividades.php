<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<style>
    h2 {
        color: #007BFF;
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

    #hora {
        width: 100px;
        float: left;
        margin-top: -49px;
        margin-left: 220px;
    }

    .data {
        width: 200px;
    }

    .data1 {
        width: 200px;
        margin-top: -74px;
        margin-left: 420px;
    }

    #hora2 {
        width: 100px;
        float: right;
        margin-right: 340px;
        margin-top: -49px;
    }

    #certificado {
        width: 200px;
        float: right;
        margin-right: 50px;
        margin-top: -49px;
    }

    .eventos,
    #user {
        margin-left: 150px;
    }

    #navbarNav {
        font-size: 16px;
    }

    .inicio {
        margin-left: 40px;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }
</style>

<main>
    <?php
    if (
        isset($_SESSION['id']) &&
        $_SESSION['type'] == 0
    ) {
    ?>
        <div class="container">


            <div>
                <?php
                if (session()->get("success")) {
                ?>
                    <h3><?= session()->get("success") ?></h3>
                <?php
                }
                if (session()->get("error")) {
                ?>
                    <h3><?= session()->get("error") ?></h3>
                <?php
                }
                ?>
                <div class="mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">Cadastro de Atividade</h2>
                            <?php
                            foreach ($data as $key => $evento) {
                            } ?>
                            <form class="form-signin" name='form1' method="POST">
                                <div class="form-group">
                                    <div class="form-label-group" required>
                                        <script>
                                            $("#selectEvent").on("change", function() {

                                                idEventoJs = $("#selectEvent").val();
                                                alert(idEventoJs);
                                                $.ajax({});

                                            });
                                        </script>
                                        <select id="selectEvent" name="selectEvent" class="form-control" required onchange="atribuir(this)">
                                            <option selected disabled>Eventos</option>
                                            <?php
                                            foreach ($data as $key => $evento) {
                                                echo "<option value='" . $evento['id'] . "' title='" . $evento['dtInicio'] . "|" . $evento['dtFim'] . "'>" . $evento['id'] . " - " . $evento['titulo'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" maxlength="60" minilength="3" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <textarea type="text" name="atividade" id="summernote" class="form-control" placeholder="Atividade" autofocus required></textarea>
                                    </div>
                                </div>
                                <div class="form-group  data" id="inicial">
                                    <div class="form-label-group">
                                        <label for="">Inicial :</label>
                                        <input  type="date" name="datainicial" id="dtAgenda" min="
                                <?php foreach ($data as $key => $evento) {
                                   
                                    echo date_format(new DateTime($evento['dtInicio']), "Y-m-d");
                                    
                                } ?>" max="
                                <?php foreach ($data as $key => $evento) {
                                    
                                    echo date_format(new DateTime($evento['dtFim']), "Y-m-d");
                                   
                                } ?>" class="form-control"  required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="form-label-group">
                                        <input  type="time" name="hinicial" id="hora" class="form-control"" required />
                                    </div>
                                </div>
                                <div class="form-group data1" id="final">
                                    <div class="form-label-group">
                                        <label for="">Final:</label>
                                        <input type="date" name="datafinal" id="dtAgenda1" min="
                                    <?php foreach ($data as $key => $evento) {
                                        // if ($evento['id'] == 21) {
                                        echo date_format(new DateTime($evento['dtInicio']), "Y-m-d");
                                        // }
                                    } ?>" max="  
                                    <?php foreach ($data as $key => $evento) {
                                        // if ($evento['id'] == 21) {
                                        echo date_format(new DateTime($evento['dtFim']), "Y-m-d");
                                        // }
                                    } ?>"  class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="time" name="hfinal" id="hora2" class="form-control"  required />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group" required>
                                        <select id="certificado" name="certificado" class="form-control" >
                                            <option selected disabled>Certificado</option>
                                            <option value="1">Gera certificado</option>
                                            <option value="2">Não gera certificado</option>
                                        </select>
                                    </div>
                                </div>

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
    $(document).ready(function() {
        $('#summernote').summernote();
    });


    

    function atribuir(elem) {
        var datas = elem.options[elem.selectedIndex].getAttribute("title").split("|");
        var dtINI = document.getElementById("dtAgenda");
        var dtFIM = document.getElementById("dtAgenda1");
        
        var min = new Date(datas[0]);
        min = (min.getFullYear() + "-" + adicionaZero(((min.getMonth() + 1))) + "-" + adicionaZero((min.getDate())));

        var max = new Date(datas[1]);
        max = (max.getFullYear() + "-" + adicionaZero(((max.getMonth() + 1))) + "-" + adicionaZero((max.getDate())));

        dtINI.setAttribute("min", min);
        dtINI.setAttribute("max", max);
        dtFIM.setAttribute("min", min);
        dtFIM.setAttribute("max", max);
    }

    function adicionaZero(numero) {
        if (numero <= 9)
            return "0" + numero;
        else
            return numero;
    }
</script>