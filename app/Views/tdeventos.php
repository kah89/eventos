<style>
    h2 {
        color: #007BFF;
        text-align: center;
        margin-top: 30px;
    }

    .resumo {
        margin-top: 10px;
    }

    .card-signin {
        margin-top: -15px;
        min-height: 85%;
    }

    .card-title {
        text-align: center;
    }

    .active {
        margin-left: 5px;
        margin-top: 10px;
        text-align: center;
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
                <div class="col-sm-4">
                    <div class="card card-signin my-5">
                        <div class="card-body card">

                            <h5 class="card-title"><?php echo $evento['titulo'] ?></h5> <!-- puxar o título via php -->
                            <img src="<?php echo base_url("/public/img") . "/" . $evento['imagem'] ?>" alt="" width="100%">
                            <p class="card-text resumo"><?php echo $evento['resumo'] ?></p> <!-- puxar o resumo via php -->

                            <ul class="nav nav-pills ">
                                <li class="nav-item">
                                    <!-- Botão Modal Sobre -->
                                    <button class="btn btn-primary" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " href="#" data-toggle="modal" data-target="#sobreModal">
                                        Sobre
                                    </button>
                                    
                                    <!-- Modal Sobre -->
                                    <div class="modal fade" id="sobreModal" tabindex="-1" role="dialog" aria-labelledby="sobreModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="sobreModalLabel">Sobre</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >
                                                    <p><?php echo $evento['resumo'] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo base_url("/eventos/lista") . "/" . $evento['id'] ?>">Atividades</a>
                                </li>
                                <li class="nav-item">
                                    <!-- Botão Modal inscreva-se -->
                                    <button class="btn btn-primary" style="margin-left: 5px; margin-top: 10px; text-align: center; height: 40px " href="#" data-toggle="modal" data-target="#inscrevaModal">
                                        Inscreva-se
                                    </button>
                                    
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
                                                    <button type="button" href="#" class="btn btn-primary">Confirma</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h2>Nenhum evento cadastrado!</h2>";
        }

        ?>
    </div>
</div>