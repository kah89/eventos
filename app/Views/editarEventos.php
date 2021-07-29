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
        margin-left: 400px;
    }

    #hora {
        width: 100px;
        float: left;
        margin-top: 32px;
    }

    #hora1 {
        width: 100px;
        float: right;
        margin-right: 370px;
        margin-top: -54px;
    }

    #assinatura {
        width: 200px;
        float: right;
        margin-right: -400px;
        margin-top: -54px;
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
                            <div class="form-group">
                                <?php if (isset($validation)) : ?>
                                    <div class="alert alert-danger" roles="alert">
                                        <?= $validation->listErrors(); ?>
                                    </div>
                                <?php endif; ?>
                                <button class="btn btn-md btn-primary  text-uppercase" name="file_upload" value="Upload File" id="uploadbutton" type="submit">Alterar</button>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="limite" name="limite" class="form-control" placeholder="Limite de pessoas" required autofocus>
                                </div>
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