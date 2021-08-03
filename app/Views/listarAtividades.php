<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    th {
        color: #007BFF;
        text-align: left;
        margin-top: 20px;
        font: caption;
    }

    h2 {
        color: #007BFF;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    #cad,
    #cad1 {
        width: 40px;
        background-color: #008CBA;
        font-size: 12px;
        border-radius: 8px;
        border: 2px solid;
        text-align: center;
        margin-left: -5px;
    }

    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">

        <div class="row">
            <div class="col-12">
                <h2 style="text-align: center; font-size:30px">Atividades</h2>
                <?php if ($data) { ?>
                    <table class="table table-hover" id="atividades">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Data</th> <!-- abrir um popup ou card  / BD dt inicio-->
                                <th scope="col">Certificado</th> <!-- check box / BD tipo-->
                                <th scope="col">Ação</th> <!-- check box / BD tipo-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $key => $atividade) {
                                if ($atividade['tipo'] == '1') {
                                    $tipo = 'Sim';
                                } else {
                                    $tipo = 'Não';
                                }
                                echo '<tr><td>' . $atividade['id'] . '</td><td>' . $atividade['titulo'] . '</td><td>' . $atividade['dtInicio'] . '</td><td>' . $tipo . '</td>

                               ';

                                if (date($atividade['dtFim']) > date("Y-m-d H:i:s")) {
                                    echo '<td><a class="btn btn-primary" id="cad" href= ' . base_url('/atividades/inscreverAtividade') . "/" . $atividade['id'] . ' onclick="inscreverAtividade(' . $atividade['id'] . ');"  role="button" >Ir </a></td></tr>';
                                } else {
                                    echo '<td><a type="button" id="cad" class=" cad btn btn-primary" data-toggle="modal" data-target="#sobreModal">
                                    Ir
                                </a></td></tr>';
                                }
                            }
                            ?>

                        </tbody>
                    </table>
            </div>
        </div>

        <div class="modal fade" data-backdrop="static" id="sobreModal" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sobreModalLabel">Atividade</h5>
                        <button type="button" class="close cad" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       Infelizmente está atividade já encerrou!
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    <?php

                } else {
                    echo "<h3>Não esta cadastrado em nenhum atividade!</h3>";
                }

    ?>
    </div>
</main>
<script>
    function inscreverAtividade($id) {
        var link = '<?php echo (base_url("/atividades/inscreverAtividade") . "/");  ?>';
        document.getElementById("cad").href = link + $id;

    }
</script>