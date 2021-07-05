<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    h5 {
        color: #007BFF;
        font-size: 25px;
    }
    th {
        color: #007BFF;
        text-align: center;
        margin-top: 20px;
        font: caption;
    }

    #vizualizar {
        margin-left: 120px;
        margin-bottom: 10px;
    }

    .emitir{
        width: 200px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;

    }

    #cad {
        width: 100px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;
    }
    .emitir:hover, #cad:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <h5 style="text-align: center; font-size:30px">Eventos </h5>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if (count($data) > 0) { ?>
                    <table class="table table-hover " id="atividades">
                        <thead>
                            <tr>
                                <th scope="col2">ID</th>
                                <th scope="col4">Titulo</th>
                                <th scope="col6">Resumo</th>
                                <th scope="col">Certificado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $evento) {
                                echo '<tr><td>' . $evento['id'] . '</td><td>' . $evento['titulo'] . '</td><td>' . $evento['resumo'] . '</td>
                               <td><a class="btn btn-primary" id="cad" href="#" data-toggle="modal" data-target="#certificadoModal" onclick="preenchermodal(' . $evento['id'] . ');" role="button">Gerar</a></td></tr>';
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>

                <!-- Modal vizualização do pré-certificado -->
                <div class="modal fade" id="certificadoModal" tabindex="-1" role="dialog" aria-labelledby="certificadoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="certificadoModalLabel" style="text-align: center;">Olá <?= session()->get('firstname') ?>, bem-vindo(a)! </br> Seu certificado do evento já está disponível.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="text-align: justify;"> Se os dados estiverem corretos, basta somente emitir. Caso precise editar volte e vá no editar do seu usuário.</p>
                                <a href="<?php echo base_url("/pdfController/verCertificado") ?>" target="_blank" id="vizualizar">vizualização do certificado</a>
                                <!-- <p style="text-align: justify;"><strong>lembrando que após a emissão não pode ser alterados os dados!</strong></p> -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Declaro para os devidos fins que participei desse evento e estou ciente que não poderei alterar os dados após ser feita emissão.
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="cad" data-dismiss="modal">Fechar</button>
                                <a href="<?= base_url("/eventos/gerarCertificado")."/" ?>" class="btn btn-primary emitir disabled" id="btnEmitir">Emita aqui seu certificado!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('.form-check-input').on('change', function() {
                    if (this.checked) {
                        //Do stuff
                        $("#btnEmitir").removeClass("disabled");              

                    } else {
                        $("#btnEmitir").addClass("disabled");                      

                    }
                });              

                function preenchermodal(id) {
                    var link = document.getElementById("btnEmitir").href;
                    document.getElementById("btnEmitir").href = link + id;
                }
            </script>
            </script>
        </div>
    </div>
</main>