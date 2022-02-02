<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    h1 {
        text-align: center;
        margin-top: 30px;
        color: #007BFF;
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


    .card {
        padding: 5px;
        border-width: medium;
        border-radius: 10px;
        max-width: 370px;
        margin: 5px;
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


    .card-text {
        /* max-width: 90ch; */
        /* width: 20em;  */
        /* max-width: 300px; */
        margin-top: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    img {
        max-height: 200px;
    }
</style>
<main>
    <div class="container">
        <h1>Eventos</h1>
        <?php if (session()->get('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
                    <?php } elseif (session()->get('info')) { ?>
                        <div class="alert alert-info" role="alert">
                            <?= session()->get('info'); ?>
                        </div>

                    <?php } ?>
        <div class="row">

            <?php
            // var_dump($data);exit;
            if (count($data) > 0) {
                foreach ($data as $key => $evento) {
            ?>

                    <div class="card col-4">
                        <div class="card-header" id="card-header">
                            <h4 class="card-title"><?php echo $evento['titulo'] ?></h4>
                        </div>
                        <div class="card-body">
                            <img src="<?php echo base_url("/public/img") . "/" . $evento['imagem'] ?>" alt="" width="100%">
                            <p class="card-text"><?php echo $evento['resumo']; ?></p>
                            <p> <strong>Data:</strong> <?php echo date_format(new DateTime($evento['dtInicio']), "d-m-Y"); ?> até <?php echo date_format(new DateTime($evento['dtFim']), "d-m-Y"); ?></p>
                            <p> <strong>Quantidade de inscrição:</strong> <?php echo $evento['limite']; ?></p>
                            <p> Restam apenas<strong> <?php echo $evento['vagas']; ?> </strong>vagas.</p>
                        </div>
                        <div class="card-footer text-muted" id="card-footer" >
                            <ul class="nav nav-pills ">
                                <li class="nav-item">
                                    <button type="button" id="sobremodal" class=" cad2 btn btn-primary" data-toggle="modal" data-target="#sobreModal<?php echo $evento['id'] ?>" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px ">
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
                                                    <?php echo $evento['resumo'];  ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary cad2" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="cad2" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " href="<?php echo base_url("/eventos/listaEvento") . "/" . $evento['id'] ?>">Atividades</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    if (Date($evento['dtFim']) >  date("Y-m-d H:i:s")) {
                                        echo '<button class="btn btn-primary cad2" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " href="#" data-toggle="modal" data-target="#inscrevaModal" id="Btn" onclick="preenchermodal(' . $evento['id'] . ');">Inscreva-se</button>';
                                    } else {
                                        echo '<button type="button" class="btn btn-primary cad1" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " data-toggle="modal" data-target="#desativado" disabled >Inscreva-se</button>';
                                    }
                                    ?>
                                </li>
                            </ul>
                            <?php
                            // echo $evento['dtFim'];
                            // echo date("Y-m-d H:i:s");
                            ?>
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

                    <!-- Modal Inscreva-se encerrado -->
                    <div class="modal fade" data-backdrop="static" id="desativado" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sobreModalLabel">Atividade</h5>
                                    <button type="button" class="close cad" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Infelizmente este evento já encerrou!
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

            // function sobremodal(id) {
            //     var link = '<?php echo (base_url("/certificadoVizualizacao") . "/");  ?>';
            //         document.getElementById("vizualizar").href = link + $id;
            // }
        </script>
    </div>
</main>