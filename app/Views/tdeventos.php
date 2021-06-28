<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    h2 {
        color: #007BFF;
        text-align: center;
        margin-top: 30px;
    }

    .resumo {
        margin-top: 10px;
    }

    .card-title {
        text-align: center;
    }

    .active {
        margin-left: 5px;
        margin-top: 10px;
        text-align: center;
    }

    /* .nav-pills{
        margin-bottom: 0;
        position: ;
    } */
    .card {
        padding: 5px;
        border-width: medium;
        border-radius: 10px;
        max-width: 370px;
        margin: 5px;
    }

    .card-title {
        text-align: center;
        margin-top: 5px;
    }
</style>

<div class="container">
    <h2>Eventos</h2>
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success'); ?>
        </div>
    <?php endif; ?>
    <div class="row">

        <?php
        // var_dump($data);exit;
        if (count($data) > 0) {
            foreach ($data as $key => $evento) {
        ?>

                <div class="card col-4">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $evento['titulo'] ?></h5>
                    </div>
                    <div class="card-body">
                        <img src="<?php echo base_url("/public/img") . "/" . $evento['imagem'] ?>" alt="" width="100%">
                        <p class="card-text"><?php echo $evento['resumo'] ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <ul class="nav nav-pills ">
                            <li class="nav-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $evento['id'] ?>" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px ">
                                    Sobre
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $evento['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $evento['id'] ?> - <?php echo  $evento['titulo'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <?php echo $evento['resumo'] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " href="<?php echo base_url("/eventos/lista") . "/" . $evento['id'] ?>">Atividades</a>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-primary" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " href="#" data-toggle="modal" data-target="#inscrevaModal" onclick="preenchermodal(<?php echo $evento['id']; ?>);">
                                    Inscreva-se
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

        <?php
            }
        } else {
            echo "<h2>Nenhum evento cadastrado!</h2>";
        }

        ?>

        <!-- Modal Inscreva-se -->
        <div class="modal fade" id="inscrevaModal" tabindex="-1" role="dialog" aria-labelledby="inscrevaModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <a href="<?php echo base_url('eventos/inscrverEvento/') . "/"; ?>" class="btn btn-primary" id="btnConfirmaInscricao">Confirma</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function preenchermodal(id) {
            var link = document.getElementById("btnConfirmaInscricao").href;
            document.getElementById("btnConfirmaInscricao").href = link + id;
        }
    </script>
    <script>
        function sobremodal(resumo) {
            var texto = document.getElementsByName("sobreModal");
            document.getElementById("sobreModal") = resumo
        }
    </script>
</div>