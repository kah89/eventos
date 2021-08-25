<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>


    h4 {
        text-align: center;
        margin-top: 20px;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    .card-title {
        text-align: center;
        margin-top: 5px;
    }

    .card-body {
        min-height: 350px;
        padding: 0;
    }

    #encerramento{
        margin-top: 15px;
    }

    .card-footer {
        margin-top: -30px;
    }

    .card {
        padding: 0;
        border-width: medium;
        max-width: 370px;
        margin: 5px;
        margin-bottom: 21px;
        border: none;
        box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
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
   
    
   
</style>
<main id="t3-content">
    <div class="container" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col">
                <h2 style="text-align: center; font-size:30px" title="Eventos"> Eventos </h2>
            </div>
        </div>
        <div class="row">
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
                <?php foreach ($data as $key => $evento) {
                    $htm =
                        '<div class="card card-trip__thumbnail col-12 col-sm-12 col-lg-4 ">'
                        . '<div class="card-header" id="card-header" style="background-color:' .  $evento['corPrimaria'] . '">'
                        . '<h4 class="card-title" >' . $evento['titulo'] . '</h4>'
                        . '</div>'
                        .  '<div class="card-body">'

                        . '<img  src="' .  base_url("/public/img") . "/" . $evento['imagem'] . '" alt="imagem proncipal do evento" width="100%">'

                        . '<p id="encerramento"> <strong>Evento encerra:</strong> ' . date_format(new DateTime($evento['dtFim']), "d-m-Y") . ' ' . 'às' . ' ' . date_format(new DateTime($evento['dtFim']), "h:i") . ' ' . 'horas.</p>'
                        . '</div>'
                        . '<div class="card-footer text-muted" id="card-footer" >'
                        . '<ul class="nav nav-pills ">'

                        . '<li class="nav-item">'
                        . '<a class="nav-link active"   id="cad2"  href="' . base_url("inicio/listaEvento") . "/" . $evento['id'] . '">Ingressar</a>'
                        . '</li>';

                    '<li class="nav-item" >';
                    if ($evento['Expirado'] == 'Sim') {
                        $htm .= '<a  data-toggle="modal"';
                        if ($evento['certificado'] == 'Evento não gera certificado.') {
                            $htm .= 'data-target="#certificadoModalN"'
                                . ' class="nav-link active btn1" id="cad2"" >Info</a>';
                        } else if ($evento['certificado'] == 'Não concluiu todas as atividades.') {
                            $htm .= 'data-target="#certificadoModalNC"'
                                . ' class="nav-link active btn1" id="cad2" >Info</a>';
                        } else {
                            $htm .= 'data-target="#certificadoModal"'
                                . 'onclick="setarCampos(' . $evento['id'] . ');"  class="nav-link active btn1" id="cad2">Gerar</a>';
                        }
                    }

                    $htm .= '</li></ul>'
                        . '</div>'
                        . '</div>';

                    echo $htm;
                }
                ?>

        </div>
    </div>
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
                <p style="text-align: justify;"> Antes de emitir o certificado, clique no link abaixo e confira se o seu nome está correto. Caso queira alterar, clique no canto superior direito no seu nome e clique em editar.</p>
                <a href="" target="_blank" id="vizualizar">vizualização do certificado</a>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label box" for="flexCheckDefault">
                        Declaro para os devidos fins que participei desse evento e não poderei alterar os dados após a emissão do certificado.
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
        </div>
    </div>
</div>

<!-- Modal atividade não realizada -->
<div class="modal fade" data-backdrop="static" id="sobreModal" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="certificadoModalN" style="text-align: center;"> Aviso </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="text-align: justify;"> Infelizmente Atividade já encerrou!</p>
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
        var link = '<?php echo (base_url("/inicio/gerarCertificado") . "/");  ?>';
        document.getElementById("btnEmitir").href = link + $id;
    }

    function inscreverAtividade($id) {
        var link = '<?php echo (base_url("/atividades/inscreverAtividade") . "/");  ?>';
        document.getElementById("cad").href = link + $id;

    }
    //-----------------------------------------------------------------------------
</script>
</main>