<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    h1 {
        text-align: center;
        margin-top: 30px;
        color: #092e48;
    }

    h4 {
        text-align: center;
        margin-top: 20px;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    .resumo {
        margin-top: 10px;
        font-size: 25px;
    }




    .card {
        padding: 5px;
        border-width: medium;
        border-radius: 10px;
        max-width: 370px;
        margin: 5px;
        box-shadow: -11px 7px 8px -4px darkgrey;
        margin-bottom: 21px;
    }

    .card-title {
        text-align: center;
        margin-top: 5px;
    }

    .card-text {
        margin-top: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card-body {
        min-height: 450px;
    }

    .card-footer {
        margin-top: -30px;
    }



    .cad2,
    #cad2,
    .cad1 {
        background-color: #008CBA;
        font-size: 12px;
        padding: 10px 22px;
        border-radius: 8px;
        border: 2px solid;
    }

    .cad2:hover,
    #cad2:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }



    img {
        max-height: 200px;
        width: 100%;
        height: 100%;
    }

    .image {
        border: 2px solid #fff;
        width: 100%;
        height: 184px;
        overflow: hidden
    }

    .image img {
        width: 100%;
        height: 300;
        transition: all 2s ease-in-out
    }

    .image:hover img {
        transform: scale(2, 2);
        cursor: pointer
    }



    .destinado {
        float: left;
        display: none;
    }

    .show {
        display: block;
    }

    /* .btn {

    } */

    .btn:hover {

        border-radius: 8px;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .btn.active {
        background-color: #666;
        color: white;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    #btn,
    #sobremodal,
    #cad2 {
        margin-left: 5px;
        margin-top: 10px;
        text-align: center;
        height: 40px
    }

    .eventos{
        margin-left: 190px;
    }

    .session{
        margin-left: 190px;
    }
</style>
<script>
    $msg = "";
</script>
<main>
    <div class="container">
        <h1>Eventos</h1>
        <?php if (session()->get('success')) { ?>
            <script>
                $msg = '<?= session()->get('success'); ?>';
            </script>
        <?php } ?>
        <div class="row">

            <?php
            // var_dump($data);exit;
            if (count($data) > 0) {
                foreach ($data as $key => $evento) {
                    $destinos = json_decode($evento['destinado']);

            ?>
                    <div class="card col-4 destinado eventCard">

                        <div class="card-header" id="card-header" style="background-color: <?php echo $evento['corPrimaria'] ?>;">
                            <h4 class="card-title"><?php echo $evento['titulo'] ?></h4>
                        </div>

                        <div class="card-body">
                            <div class="image">
                                <img src="<?php echo base_url("/public/img") . "/" . $evento['imagem'] ?>" alt="" width="100%">
                            </div>
                            <p> <strong>Data:</strong> <?php echo date_format(new DateTime($evento['dtInicio']), "d-m-Y"); ?> até <?php echo date_format(new DateTime($evento['dtFim']), "d-m-Y"); ?></p>
                            <p> <strong>Quantidade de inscrição:</strong> <?php echo $evento['limite']; ?></p>
                            <p><strong> Evento destinado: </strong>
                                <?php foreach ($destinos as $destinado) {
                                    if ($destinado == "2") {
                                        echo "Farmacêuticos | ";
                                    }
                                    if ($destinado == "3") {
                                        echo "Farmacêuticos de São Paulo |";
                                    }
                                    if ($destinado == "1") {
                                        echo "Estudante | ";
                                    }
                                } ?></p>
                                <p><strong> Evento: </strong>
                                <?php
                                if ($evento['tipo'] == '1') {

                                    echo 'Exclusivo';
                                } else {
                                    echo 'Não exclusivo';
                                }
                                ?>

                            </p>
                            <p id="p2"> Restam apenas<strong> <?php echo $evento['vagas']; ?> </strong>vagas.</p>
                        </div>
                        <div class="card-footer text-muted" id="card-footer">
                            <ul class="nav nav-pills ">
                                <li class="nav-item">
                                    <button type="button" id="sobremodal" class=" cad2 btn btn-primary" data-toggle="modal" data-target="#sobreModal<?php echo $evento['id'] ?>">
                                        Sobre
                                    </button>

                                    <!-- Modal sobre -->
                                    <div class="modal fade" data-backdrop="static" id="sobreModal<?php echo $evento['id'] ?>" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="sobreModalLabel">Sobre</h5>
                                                    <button type="button" class="close cad2" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo $evento['resumo']; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary cad2" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" id="cad2" href="<?php echo base_url("/inicio/listaEvento") . "/" . $evento['id'] ?>">Atividades</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    if (session()->get('type') == 2 && session()->get('estado') == 26) {
                                        $destinado = 3;
                                    } else if (session()->get('type') == 2) {
                                        $destinado = 2;
                                    } else {
                                        $destinado = 1;
                                    }

                                    if ($evento['inscrito'] == "Sim") {
                                        echo '<button type="button" class="btn btn-primary cad1" id="btn" disabled>Inscrito</button>';
                                    } else if ((int)$evento['vagas'] <= 0) {
                                        echo '<button class="btn btn-primary cad2" id="btn"  disabled>Esgotado </button>';
                                    } else if ($evento['Expirado'] == 'Sim') {
                                        echo '<button type="button" class="btn btn-primary cad1" id="btn" disabled>Encerrado</button>';
                                    } else if (!(in_array($destinado, json_decode($evento['destinado'])))) {
                                        echo '<button class="btn btn-primary cad2" id="btn"  disabled>Inscreva-se</button>';
                                    } else if ($evento['Expirado'] == 'Não') {
                                        echo '<button class="btn btn-primary cad2" id="btn" data-toggle="modal" data-target="#inscrevaModal" onclick="preenchermodal(' . $evento['id'] . ');">Inscreva-se</button>';
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Modal Inscreva-se -->
                    <div class="modal fade" data-backdrop="static" id="inscrevaModal" tabindex="-1" role="dialog" aria-labelledby="inscrevaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="inscrevaModalLabel">Inscreva-se</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Confirma a sua inscrição?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cad" data-dismiss="modal">Fechar</button>
                                    <a href="#" class="btn btn-primary cad" id="btnConfirmaInscricao">Confirma</a>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Modal evento inscrito -->
                    <div class="modal fade" data-backdrop="static" id="eventoinscrito" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sobreModalLabel">Olá <?= session()->get('firstname') ?>,</h5>
                                    <button type="button" class="close cad" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Você ja se inscreveu para esse evento !
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cad" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal limite evento -->
                    <div class="modal fade" data-backdrop="static" id="limite" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sobreModalLabel">Olá <?= session()->get('firstname') ?>,</h5>
                                    <button type="button" class="close cad" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Infelizmente este evento já atingiu o limite máximo de participante!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cad" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "<h3>Nenhum evento disponivel para inscrição!</h3>";
            }

            ?>

        </div>
        <script>
            function preenchermodal(id) {
                var link = '<?php echo (base_url('eventos/inscreverEvento/') . "/"); ?>';
                document.getElementById("btnConfirmaInscricao").href = link + id;
            }

            function atribuir() {
                var select = document.getElementById('selectUser');
                var user = select.options[select.selectedIndex].value;


            }

            filterSelection("all")

            function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("destinado");
                if (c == "all") c = "";
                // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
                for (i = 0; i < x.length; i++) {
                    w3RemoveClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                }
            }

            // Show filtered elements
            function w3AddClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {
                        element.className += " " + arr2[i];
                    }
                }
            }

            // Hide elements that are not selected
            function w3RemoveClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arr1.join(" ");
            }

            // Add active class to the current control button (highlight it)
            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }



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
        </script>
    </div>

</main>
<?= $this->endSection() ?>