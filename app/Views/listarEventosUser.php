<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    h2 {
        color: #007BFF;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    #certificadoModalNC,
    #certificadoModalN {
        color: red;
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

    .emitir {
        width: 200px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;

    }

    .cad {
        width: 80px;
        height: 40px;
        background-color: #008CBA;
        font-size: 12px;
        border-radius: 8px;
        color: #fff !important;
        border: 2px solid;
    }

    .emitir:hover,
    .cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    #p {
        /* max-width: 90ch; */
        /* width: 20em;  */
        max-width: 700px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    #flexCheckDefault:checked ~ .box {
    color: red;
    text-align: justify;
}
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <h2 style="text-align: center; font-size:30px">Eventos </h2>
                <?php if (session()->get('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                <?php } else if (session()->get('info')) { ?>
                    <div class="alert alert-info" role="alert">
                        <?= session()->get('info'); ?>
                    </div>
                <?php } ?>
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

                                $htm = '<tr><td>' . $evento['id'] . '</td><td>' . $evento['titulo'] . '</td><td id="p">' . $evento['resumo'] . '</td>                           
                              <td>';

                                    $htm .= '<a data-toggle="modal"';
                                    if ($evento['certificado'] == 'Evento não gera certificado.') {
                                        if (Date($evento['dtFim']) >  date("Y-m-d H:i:s")) {
                                            $htm .= 'data-target="#certificadoModalN"';
                                            $htm .= 'role="button" class="btn btn-primary cad disabled" >Info</a>';
                                        } else {
                                            $htm .= 'data-target="#certificadoModalN"';
                                            $htm .= 'role="button" class="btn btn-primary cad" >Info</a>'; 
                                        }
                                    } else if ($evento['certificado'] == 'Não concluiu todas as atividades.') {
                                        if (Date($evento['dtFim']) >  date("Y-m-d H:i:s")) {
                                            $htm .= 'data-target="#certificadoModalNC"';
                                            $htm .= 'role="button" class="btn btn-primary cad disabled" >Info</a>';
                                        } else {
                                            $htm .= 'data-target="#certificadoModalNC"';
                                            $htm .= 'role="button" class="btn btn-primary cad" >Info</a>'; 
                                        }
                                    } else {
                                        if (Date($evento['dtFim']) >  date("Y-m-d H:i:s")) {
                                            $htm .= 'data-target="#certificadoModal"';
                                            $htm .= 'onclick="setarCampos(' . $evento['id'] . ');" role="button" class="btn btn-primary cad disabled">Gerar</a>';
                                        } else {
                                            $htm .= 'data-target="#certificadoModal"';
                                            $htm .= 'onclick="setarCampos(' . $evento['id'] . ');" role="button" class="btn btn-primary cad ">Gerar</a>';  
                                        }
                                    }
                                    $htm .= '</td></tr>';


                                    echo ($htm);
                              

                            }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    <?php
                } else {
                    echo "<h3>Não esta cadastrado em nenhum evento!</h3>";
                }
    ?>
    </div>
    <!-- Modal vizualização do pré-certificado -->
    <div class="modal fade " data-backdrop="static" id="certificadoModal" tabindex="-1" role="dialog" aria-labelledby="certificadoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificadoModalLabel" style="text-align: center;">Olá <?= session()->get('firstname') ?>, bem-vindo(a)! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: justify;"> Se os dados estiverem corretos, basta somente emitir. Caso precise editar volte e vá no editar do seu usuário.</p>
                    <a href="" target="_blank" id="vizualizar">vizualização do certificado</a>
                    <!-- <p style="text-align: justify;"><strong>lembrando que após a emissão não pode ser alterados os dados!</strong></p> -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label box" for="flexCheckDefault">
                            Declaro para os devidos fins que participei desse evento e estou ciente que não poderei alterar os dados após ser feita emissão.
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button href='#' type="button" class="btn btn-secondary" id="cad" data-dismiss="modal" onclick="document.location.reload(true)">Fechar</button>
                    <a href="#" class="btn btn-primary emitir disabled" id="btnEmitir">Emita aqui seu certificado!</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal não concluiu todas as atividades -->
    <div class="modal fade" data-backdrop="static" id="certificadoModalNC" tabindex="-1" role="dialog" aria-labelledby="certificadoModalNC" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificadoModalNC" style="text-align: center;">Olá <?= session()->get('firstname') ?>, </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: justify;"> Infelizmente não é possivel gerar certificado para esse evento, pois todas as atividades não foram concluídas.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cad" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal não gera certificado -->
    <div class="modal fade" data-backdrop="static" id="certificadoModalN" tabindex="-1" role="dialog" aria-labelledby="certificadoModalN" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificadoModalN" style="text-align: center;">Olá <?= session()->get('firstname') ?>, </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: justify;"> Infelizmente esse evento não gera certificado!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cad" data-dismiss="modal">Fechar</button>
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

        //-----------------------------------------------------------------------------
        function setarCampos($id) {
            var link = '<?php echo (base_url("/certificadoVizualizacao") . "/");  ?>';
            document.getElementById("vizualizar").href = link + $id;
            var link = '<?php echo (base_url("/eventos/gerarCertificado") . "/");  ?>';
            document.getElementById("btnEmitir").href = link + $id;
        }
        //-----------------------------------------------------------------------------
    </script>
</main>