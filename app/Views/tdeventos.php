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
        min-height: 500px;
    }

    .card-footer {
        margin-top: -30px;
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

    .cad2,
    #btn,
    .cad1 {
        background-color: #008CBA;
        font-size: 12px;
        padding: 8px 15px;
        border-radius: 8px;
        border: 2px solid;
        color: white;
    }

    .cad2:hover,
    #btn:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }


    img {
        max-height: 200px;
        width: 100%;
        height: 100%;
    }

    .image {
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
        transform: scale(1.2, 1.2);
        /* cursor: pointer */
    }

    .destinado {
        float: left;
        display: none;
    }

    .show {
        display: block;
    }

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
    #sobremodal {
        margin-left: 5px;
        margin-top: 10px;
        text-align: center;
        height: 40px;
        color: white;
    }

    .info {
        background: black;
        color: #fff;
        position: absolute;
        top: 30px;
        left: 240px;
        padding: 4px 8px;
        font-family: Quicksand, sans-serif;
        font-weight: 700;
        line-height: 20px;
        transform: rotate(45deg);
        overflow: visible;
        width: 160px;
        text-align: center;
    }

    .info::after {
        content: "";
        position: absolute;
        z-index: 1;
        top: -15px;
        right: -18px;
        width: 50px;
        height: 30px;
        transform: rotate(45deg);
        background-color: #F5F5F5;
    }

    .info::before {
        content: "";
        position: absolute;
        top: -45px;
        right: 142px;
        width: 20px;
        height: 100px;
        transform: rotate(45deg);
        background-color: #f5f5f5;
    }

    #myBtnContainer,
    #a-inscritos {
        z-index: 7;
    }

    #a-inscritos {
        /* margin-top: -40px;
        margin-left: 450px; */
    }

    #p1 {
        margin-top: 10px;
    }

    #p2 {
        margin-top: -10px;
    }

    .card.eventCard {
        border: none;
        box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
    }

    .card,
    .card-body {
        padding: 0;
    }

    .info::before {
        content: "";
        position: absolute;
        top: -70px;
        right: 99px;
        width: 21px;
        height: 137px;
        transform: rotate(45deg);
        background-color: #f4f4f4;
    }

    .info::after {
        content: "";
        position: absolute;
        z-index: 1;
        top: -15px;
        right: -19px;
        width: 50px;
        height: 30px;
        transform: rotate(45deg);
        background-color: #F5F5F5;
    }

    .info {
        background: black;
        color: #fff;
        position: absolute;
        top: 20px;
        left: 278px;
        padding: 4px 10px;
        font-family: Quicksand, sans-serif;
        font-weight: 700;
        line-height: 13px;
        transform: rotate(45deg);
        overflow: visible;
        width: 123px;
        text-align: center;
        font-size: 11px;
    }

    .eventInfo {
        padding: 1em;
    }

    #btn:hover,
    .btn:hover {
        box-shadow: none;
        background-color: #0b3e7a;
    }

    a.btn.btn-outline-info:hover {
        color: white !important;
    }
</style>
<script>
    $msg = "";
</script>
<main>
    <div class="container">
        <h1>Eventos</h1>
        <br><br>
        <?php if (session()->get('success')) { ?>
            <script>
                $msg = '<?= session()->get('success'); ?>';
            </script>
        <?php } ?>
        <div id="a-inscritos" style="text-align: end; margin-bottom: 20px;">
            <?php
            if (
                isset($_SESSION['id']) &&
                $_SESSION['type'] == 0
            ) {
            ?>
                <a class="btn btn-outline-info" href="<?= base_url('listarEventosUser') ?>" style="color:#092e48; "></i> Eventos inscritos</a>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <?php
            if (count($data) > 0) {
                rsort($data);
                foreach ($data as $key => $evento) {

            ?>
                    <div class="card card-trip__thumbnail col-4 destinado eventCard                    
                        <?php
                        $destinos = json_decode($evento['destinado']);
                        foreach ($destinos as $detinado) {
                            echo " destinado" . $detinado;
                        }
                        ?>">

                        <div class="card-header" id="card-header" style="background-color: <?php echo $evento['corPrimaria'] ?>;">
                            <h4 class="card-title"><?php echo $evento['titulo'] ?></h4>
                        </div>

                        <div class="card-body">
                            <div class="image">
                                <img src="<?php echo base_url("/public/img") . "/" . $evento['imagem'] ?>" alt="" width="100%">
                                <div class="info" id=txt>
                                    <span> <?php
                                            if ((int)$evento['vagas'] <= 0) {
                                                echo 'Esgotado';
                                            } else if ((Date($evento['dtInicio']) > date("Y-m-d H:i:s")) && (Date($evento['dtFim']) > date("Y-m-d H:i:s"))) {
                                                echo ' Próx. Evento';
                                            } else if (((Date($evento['dtInicio'])) > date("Y-m-d H:i:s") && (Date($evento['dtFim'])) > date("Y-m-d H:i:s"))
                                                || ((Date($evento['dtInicio'])) < date("Y-m-d H:i:s") && (Date($evento['dtFim'])) > date("Y-m-d H:i:s"))
                                            ) {
                                                echo 'Aberto';
                                            } else {
                                                echo 'Encerrado';
                                            }
                                            ?></span>
                                </div>

                            </div>
                            <div class='eventInfo'>
                                <strong>Data:</strong> <?php echo date_format(new DateTime($evento['dtInicio']), "d/m/Y"); ?> até <?php echo date_format(new DateTime($evento['dtFim']), "d/m/Y"); ?><br>
                                <strong>Quantidade de inscrição:</strong> <?php echo $evento['limite']; ?><br>
                                <strong> Evento destinado: </strong></br>
                                <?php foreach ($destinos as $detinado) {
                                    if ($detinado == "2") {
                                        echo "Farmacêuticos inscritos em outros estados; " . '</br>';
                                    }
                                    if ($detinado == "3") {
                                        echo "Farmacêutico inscrito no CRF-SP;" . '</br>';
                                    }
                                    if ($detinado == "1") {
                                        echo "Estudantes de Farmácia; " . '</br>';
                                    }
                                    if ($detinado == "4") {
                                        echo "Outros profissionais; " . '</br>';
                                    }
                                } ?>
                                <br>
                                <strong>Carga horária:</strong> <?php echo $evento['certificado']; ?> horas
                                <?php
                                if ($evento['tipo'] == '1') {

                                    echo '<strong> Evento: </strong> Exclusivo';
                                }
                                ?>
                                <br>
                                Restam apenas<strong> <?php echo $evento['vagas']; ?> </strong>vagas.
                            </div>
                        </div>

                        <div class="card-footer text-muted" id="card-footer">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a type="button" id="sobremodal" class=" cad2 btn btn-primary" data-toggle="modal" data-target="#sobreModal<?php echo $evento['id'] ?>">
                                        Informações
                                    </a>

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
                                    <a class="nav-link active cad2" id="btn" href="<?php echo base_url("/eventos/listaEvento") . "/" . $evento['id'] ?>">Atividades</a>
                                </li>
                                <li class="nav-item">

                                    <?php
                                    if ($eventoUser) {
                                        echo '<button type="button" class="btn btn-primary cad1" id="btn" data-toggle="modal" data-target="#eventoinscrito">Informação</button>';
                                    } else if ((int)$evento['vagas'] <= 0) {
                                        echo '<button class="btn btn-primary cad2" id="btn"  data-toggle="modal" data-target="#limite" id="Btn">esgotado </button>';
                                    } else if (((Date($evento['dtInicio'])) > date("Y-m-d H:i:s") && (Date($evento['dtFim'])) > date("Y-m-d H:i:s"))
                                        || ((Date($evento['dtInicio'])) < date("Y-m-d H:i:s") && (Date($evento['dtFim'])) > date("Y-m-d H:i:s"))
                                    ) {
                                        echo '<button class="btn btn-primary cad2" id="btn"  data-toggle="modal" data-target="#inscrevaModal" id="Btn" onclick="preenchermodal(' . $evento['id'] . ');">Inscreva-se</button>';
                                    } else if ((Date($evento['dtFim'])) < date("Y-m-d H:i:s")) {
                                        echo '<button type="button" class="btn btn-primary cad1" id="btn" data-toggle="modal" data-target="#desativado" disabled>Encerrado</button>';
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
                                    <h5 class="modal-title" id="inscrevaModalLabel">Olá <?= session()->get('firstname') ?>, </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Confirma a sua inscrição?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cad" data-dismiss="modal">Fechar</button>
                                    <a class="btn btn-primary cad" id="btnConfirmaInscricao">Confirma</a>

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
                echo "<h3>Nenhum evento cadastrado!</h3>";
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