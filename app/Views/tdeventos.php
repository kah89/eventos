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
        /* display: none; */
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


    #p1 {
        margin-top: 10px;
    }

    #p2 {
        margin-top: -10px;
    }

    .card {
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

    .encerradoTitle {
        background-color: #C0C0C0 !important;
    }

    .encerrado {
        background-color: #C0C0C0 !important;
    }

    .encerrado:hover {
        background-color: #0b3e7a !important;
    }

    .session {
        margin-left: 270px;
        text-transform: uppercase;
    }

    .menu{
        margin-left: 270px;
    }
    
    .nav2{
        margin-left: 80px;
        margin-right:  80px ;
    }
   
    [data-tooltip] {
        position: relative;
        font-weight: bold;

    }

    [data-tooltip]:after {
        display: none;
        position: absolute;
        top: -80px;
        margin-left: -30px;
        left: 30px;
        padding: 10px;
        border-radius: 3px;
        left: calc(100% + 2px);
        content: attr(data-tooltip);
        width: 100px;
        background-color: #FF6347;
        color: black;
    }

    [data-tooltip]:hover:after {
        display: block;
    }
</style>
<script>
    $msg = "";
</script>

<main id="t3-content">
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

                foreach ($data as $key => $evento) {
                    if ($evento['dtFim'] > date("Y-m-d")) {
            ?>


                        <div class="card card-trip__thumbnail col-12 col-sm-12 col-lg-4                     
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
                                    <strong> Público-alvo: </strong></br>
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
                                    </br>
                                    <strong>Carga horária:</strong> <?php echo $evento['certificado']; ?> horas</br>
                                    <?php
                                    if ($evento['tipo'] == '1') {

                                        echo '<strong> Evento: </strong> Exclusivo';
                                    }
                                    ?>
                                    </br>
                                    Restam apenas<strong> <?php echo $evento['vagas']; ?> </strong>vagas.
                                </div>
                            </div>

                            <div class="card-footer text-muted" id="card-footer">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <a type="button" id="sobremodal" class=" cad2 btn btn-primary" data-toggle="modal" data-target="#sobreModal<?php echo $evento['id'] ?>">
                                            Informações
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active cad2" id="btn" href="<?php echo base_url("/inicio/listaEvento") . "/" . $evento['id'] ?>">Atividades</a>
                                    </li>
                                    <li class="nav-item">
                                        <?php
                                        if (session()->get('type') == 2 && session()->get('estado') == 26) {
                                            $destinado = 3;
                                        } else if (session()->get('type') == 2) {
                                            $destinado = 2;
                                        } else if (session()->get('type') == 1) {
                                            $destinado = 1;
                                        } else {
                                            $destinado = 4;
                                        }

                                        if ($evento['inscrito'] == "Sim") {
                                            echo '<button type="button" class="btn btn-primary cad1" id="btn" disabled>Inscrito</button>';
                                        } else if ((int)$evento['vagas'] <= 0) {
                                            echo '<button class="btn btn-primary cad2" id="btn"  disabled>Esgotado </button>';
                                        } else if ($evento['Expirado'] == 'Sim') {
                                            echo '<button type="button" class="btn btn-primary cad1" id="btn" disabled>Encerrado</button>';
                                        } else if (!(in_array($destinado, json_decode($evento['destinado'])))) {
                                            echo '<button class="btn btn-primary cad2" id="btn"  disabled><span data-tooltip="Evento restrito ao público-alvo">Inscreva-se</span></button>';
                                        } else if ($evento['Expirado'] == 'Não') {
                                            echo '<button class="btn btn-primary cad2" id="btn" data-toggle="modal" data-target="#inscrevaModal" onclick="preenchermodal(' . $evento['id'] . ');">Inscreva-se</button>';
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    <?php
                    }
                }



                foreach ($data as $key => $evento) {
                    if ($evento['dtFim'] < date("Y-m-d")) {
                    ?>


                        <div class="card card-trip__thumbnail col-4                    
                        <?php
                        $destinos = json_decode($evento['destinado']);
                        foreach ($destinos as $detinado) {
                            echo " destinado" . $detinado;
                        }
                        ?>">
                            <div class="card-header encerradoTitle" id="card-header" style="background-color: <?php echo $evento['corPrimaria'] ?>;">
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
                                    <strong>Carga horária:</strong> <?php echo $evento['certificado']; ?> horas</br>
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
                                        <a type="button" id="sobremodal" class=" cad2 btn btn-primary encerrado" data-toggle="modal" data-target="#sobreModal<?php echo $evento['id'] ?>">
                                            Informações
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active cad2 encerrado" id="btn" href="<?php echo base_url("/inicio/listaEvento") . "/" . $evento['id'] ?>">Atividades</a>
                                    </li>
                                    <li class="nav-item">
                                        <?php

                                        echo '<button type="button" class="btn btn-primary cad1 encerrado" id="btn" disabled>Encerrado</button>';

                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
                echo "<h3>Nenhum evento cadastrado!</h3>";
            }

            ?>
        </div>

    </div>



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

    <!-- Modal Aviso  -->
    <button id='modalInfoTrigger' data-toggle="modal" data-target="#myModal" style="display:none"></button>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background: url('<?= base_url('/public/img/logo2.jpg') ?>'); background-size: cover; color: #000000; font-size: 13px; padding: 25px; padding-top: 122px;">
                    <p style="color:white;">Bem-vindo à pIataforma de eventos virtuais do CRF-SP! </p><br>
                    <p style="color:white;">Essa plataforma é uma solução simples para que você participe de eventos do CRF-SP de forma <i>on line</i> e síncrona, o que permite acompanhá-los de qualquer lugar e interagindo com os ministrantes por meio de perguntas e considerações!</p><br>
                    <p style="color:white;">Basta se cadastrar apenas uma única vez e você terá acesso às atividades de acordo com a categoria que você pertencer.</p><br><br>

                    <p style="color:white;"><strong>Observação importante</strong>: os eventos virtuais do CRF-SP também fornecem <strong>certificado de participação</strong>, porém, para isso, é necessário que você:</p>
                    <ul style="color:white;">
                        <li>Esteja inscrito no evento</li>
                        <li>Efetue login na plataforma no dia do evento no link (<a href="https://www.crfsp.org.br/eventos" target="_blank" style="color: #fff;" rel="noopener"><strong>clique aqui</strong></a>), informando e-mail e senha.</li>
                        <li>Assistir o evento de forma síncrona (no dia e horário do evento, ao vivo). </li>
                    </ul><br><br>

                    <p style="color:white;">Obs. O certificado será disponibilizado apenas aos participantes de forma síncrona. Somente assistir a gravação dos eventos que forem disponibilizados posteriormente, não dará direito ao certificado.</p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
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

    <script>
        function preenchermodal(id) {
            var link = '<?php echo (base_url('inicio/inscreverEvento/') . "/"); ?>';
            document.getElementById("btnConfirmaInscricao").href = link + id;
        }

        function atribuir() {
            var select = document.getElementById('selectUser');
            var user = select.options[select.selectedIndex].value;


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

        // $('#modalInfoTrigger').click();
    </script>
</main>