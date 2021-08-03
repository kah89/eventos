<style>
    h2 {
        color: #007BFF;
    }

    #uploadbutton {
        width: 200px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;
    }

    #uploadbutton:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }


    #blah {
        margin-top: 15px;
        margin-left: 350px;
    }


    .data {
        width: 200px;
        float: left;
    }

    .data1 {
        width: 200px;
        margin-left: 350px;
    }

    #hora {
        width: 100px;
        float: left;
        margin-top: 32px;
    }

    #hora1 {
        width: 100px;
        float: right;
        margin-right: 415px;
        margin-top: -54px;
    }

    #assinatura {
        width: 200px;
        float: right;
        margin-right: -330px;
        margin-top: -54px;
    }

    .radio {
        float: right;
        margin-top: -105px;
        margin-right: 170px;
    }

    #estado {
        width: 200px;
        float: right;
        margin-right: 503px;
        margin-top: -49px;
    }

    .checkbox {
        margin-top: 10px;
        margin-left: 15px;
    }

    #limite {
        width: 200px;
        float: right;
        margin-right: 503px;
        margin-top: -105px;

    }

    .favcolor {
        width: 80px;
        float: right;
        margin-top: -87px;
    }

    .favcolor1 {
        width: 80px;
        float: right;
        margin-top: 15px;
    }
</style>
<main>
    <div class="container">
        <div class="message_box">
            <?php
            if (isset($success) && strlen($success)) {
                echo '<div class="success">';
                echo '<p>' . esc($success) . '</p>';
                echo '</div>';
            }

            if (isset($error) && strlen($error)) {
                echo '<div class="error">';
                echo '<p>' . esc($error) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <div>
            <div class=" mx-auto">
                <div class="card ">
                    <div class="card-body">
                        <?php if (session('msg')) : ?>
                            <div class="alert alert-info alert-dismissible">
                                <?= session('msg') ?>
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        <?php endif ?>
                        <h2 class="card-title text-center">Alteração de Evento</h2> <!-- utilizar a tabela eventos-->
                        <?php if (session()->get('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->get('success'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="form-signin" id="file" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="mb-3">
                                    <input class="form-control" onchange="readURL(this);" type="file" name="profile_image" id="formFile" accept="image/*" readonly="true" required autofocus>
                                    <img id="blah" type="file" alt="imagem" src="<?php echo base_url("public/img") . "/" . $imagem ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo" required autofocus value="<?= $titulo ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <textarea name="resumo" id="resumo" class="form-control" minilength="100" maxlength="1000" placeholder="Resumo" required><?= $resumo ?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 data" id="inicial">
                                <div class="form-label-group">
                                    <label for="">Inicial :</label>
                                    <input type="date" name="datainicial" id="dtAgenda" min="2017-04-01" class="form-control" value="<?php echo date_format(new DateTime($dtInicio), "Y-m-d"); ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="time" name="hinicial" id="hora" value="<?php echo date_format(new DateTime($dtInicio), "H:i"); ?>" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group col-sm-6 data1" id="final">
                                <div class="form-label-group">
                                    <label for="">Final:</label>
                                    <input type="date" name="datafinal" id="dtAgenda1" min="2017-04-01" value="<?php echo date_format(new DateTime($dtFim), "Y-m-d"); ?>" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="time" name="hfinal" id="hora1" class="form-control" value="<?php echo date_format(new DateTime($dtFim), "H:i"); ?>" required />

                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="form-label-group favcolor">
                                        <label for="">Primaria:</label>
                                        <input type="color" id="favcolor" name="favcolor" value="<?= $corPrimaria ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group favcolor1">
                                        <label for="">Secundaria:</label>
                                        <input type="color" id="favcolor" name="favcolor1" value="<?= $corSecundaria ?>" class="form-control" />
                                    </div>
                                </div>
                            <div class="form-group col-sm-7">
                                <div class="form-label-group">

                                    <select id="assinatura" name="assinatura" class="form-control">
                                        <?php
                                        foreach ($data as $key => $result) {
                                            $selecionado = $data['assinatura'] == $id;
                                            if ($selecionado) {
                                                $assinatura = $result['assinatura'];
                                            }
                                        }
                                        if ($assinatura == 1) {
                                            echo '<option value="1" id="1" selected="selected">Marcos</option>';
                                            echo '<option value="2" id="2">Assinatura1</option>';
                                            echo '<option value="3" id="3">Assinatura2</option>';
                                        } else if ($assinatura == 2) {
                                            echo '<option value="1" id="1">Marcos</option>';
                                            echo '<option value="2" id="2" selected="selected">Assinatura1</option>';
                                            echo '<option value="3" id="3">Assinatura2</option>';
                                        } else {
                                            echo '<option value="1" id="1">Marcos</option>';
                                            echo '<option value="2" id="2" >Assinatura1</option>';
                                            echo '<option value="3" id="3" selected="selected">Assinatura2</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group checkbox" name="destinado">
                                <label for="">Destinado:</label>
                                <div class="form-label-group" required>
                                    <?php
                                    foreach ($data as $key => $result) {
                                        $selecionado = $data['destinado'] == $id;
                                        if ($selecionado) {
                                            $destinado = $result['destinado'];
                                        }
                                    }
                                    
                                    if (in_array("1", json_decode($destinado))) {
                                        echo '<input type="checkbox" id="checkbox1" name="destinado" value="1" checked="checked">
                                        <label for="checkbox1">Estudantes </label><br>';
                                    } else {
                                        echo '<input type="checkbox" id="checkbox1" name="destinado" value="1">
                                        <label for="checkbox1">Estudantes </label><br>';
                                    }
                                    if (in_array("2", json_decode($destinado))) {
                                        echo '<input type="checkbox" id="checkbox2" name="destinado" value="2" checked="checked">
                                        <label for="checkbox2">Farmacêuticos</label><br>';
                                    } else {
                                        echo '<input type="checkbox" id="checkbox2" name="destinado" value="2">
                                        <label for="checkbox2">Farmacêuticos</label><br>';
                                    }
                                    if (in_array("3", json_decode($destinado))) {
                                        echo '<input type="checkbox" id="checkbox3" name="destinado" value="3" checked="checked">
                                        <label for="checkbox3">Farmacêuticos SP</label>';
                                    } else {
                                        echo '<input type="checkbox" id="checkbox3" name="destinado" value="3">
                                        <label for="checkbox3">Farmacêuticos SP</label>';
                                    }

                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label-group" required>
                                    <select id="estado" name="estado" class="form-control">
                                        <option selected disabled>Estado:</option>

                                        <?php
                                        foreach ($data as $key => $result) {
                                            $selecionado = $data['estado'] == $id;
                                            if ($selecionado) {
                                                $estado = $result['estado'];
                                            }
                                        }
                                        if ($estado == 26) {
                                            echo '<option value="26"  selected="selected">São Paulo</option>';
                                            echo '<option value="100" >Todos</option>';
                                        } else {
                                            echo '<option value="26" >São Paulo</option>';
                                            echo '<option value="100" selected="selected">Todos</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group radio">
                                <div class="form-check" name="tipo" required>
                                    <label class="evento" for="">Evento:</label><br>
                                    <!-- <input class="form-check-input " type="radio" id="radio1" name="radio" value="1">
                                    <label class="form-check-label " for="radio1">Exclusivo</label><br>
                                    <input class="form-check-input " type="radio" id="radio2" name="radio" value="2">
                                    <label class="form-check-label" for="radio2">Não exclusivo</label><br> -->
                                    <?php
                                    foreach ($data as $key => $result) {
                                        $selecionado = $data['tipo'] == $id;
                                        if ($selecionado) {
                                            $tipo = $result['tipo'];
                                        }
                                    }
                                    if ($tipo == 1) {
                                        echo '<input class="form-check-input " type="radio" id="radio1" name="radio" value="1" checked="checked">
                                              <label class="form-check-label " for="radio1">Exclusivo</label><br>';
                                        echo '<input class="form-check-input " type="radio" id="radio2" name="radio" value="2">
                                              <label class="form-check-label" for="radio2">Não exclusivo</label><br>';
                                    } else if ($tipo == 2) {
                                        echo '<input class="form-check-input " type="radio" id="radio1" name="radio" value="1">
                                              <label class="form-check-label " for="radio1">Exclusivo</label><br>';
                                        echo '<input class="form-check-input " type="radio" id="radio2" name="radio" value="2" checked="checked">
                                              <label class="form-check-label" for="radio2">Não exclusivo</label><br>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="limite" name="limite" class="form-control" placeholder="Limite de pessoas" value="<?= $limite ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php if (isset($validation)) : ?>
                                    <div class="alert alert-danger" roles="alert">
                                        <?= $validation->listErrors(); ?>
                                    </div>
                                <?php endif; ?>
                                <button class="btn btn-md btn-primary  text-uppercase" name="file_upload" value="Upload File" id="uploadbutton" type="submit">Alterar</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>