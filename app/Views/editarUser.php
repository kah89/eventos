<style>
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem
    }


    .card-signin {
        border: 0;
        border-radius: 0rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1)
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem
    }

    .form-label-group input {
        height: auto
    }

    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x)
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out
    }

    .form-control:focus {
        box-shadow: 10px 0px 0px 0px #ffffff !important
    }

    h2 {
        color: #007BFF;
    }

    #cad {
        width: 200px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;
    }

    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<script type="text/javascript">
    $(function() {
        $('#paises').on('keyup change', function() {
            var id = $('#paises').val();

            $.post('<?= base_url() . "/estado" ?>', {
                id_estado: id
            }, function(data) {
                if (id == 1) {
                    $('#estados').html(data);
                    $('#estados').removeAttr('disabled');

                    var exteriorCidade = '<option>Selecione o estado acima</option>'
                    $('#cidades').html(exteriorCidade);
                    $('#estados').attr('required', 1);
                    $('#cidades').attr('required', 1);

                } else {
                    var exteriorEstado = '<option>País estrangeiro não precisa informar o estado</option>'
                    $('#estados').html(exteriorEstado);
                    $('#estados').attr('disabled', 'disabled');

                    var exteriorCidade = '<option>País estrangeiro não precisa informar a cidade</option>'
                    $('#cidades').html(exteriorCidade);
                    $('#cidades').attr('disabled', 'disabled');

                    $('#estados').attr('required', 0);
                    $('#cidades').attr('required', 0);
                }
            });
        });


        $('#estados').on('keyup change', function() {
            var id_estado = $('#estados').val();
            var idPais = $('#paises').val();

            $.post('<?= base_url() . "/cidade" ?>', {
                id_estado: id_estado
            }, function(data) {
                if (idPais == 1) {
                    $('#cidades').html(data);
                    $('#cidades').removeAttr('disabled');
                } else {
                    var exteriorCidade = '<option>País estrangeiro não precisa informar a cidade</option>'
                    $('#cidades').html(exteriorCidade);
                    $('#cidades').attr('disabled', 'disabled');
                }
            });
        });

        $("#telefone").mask("(00) 0000-0000");
        $("#celular").mask("(00) 0000-00009");
        $("#cpf").mask("000.000.000-00");

        $('#categoria').change(function() {
            if ($('#categoria').val() != 2) {
                $("#farmaceutico").css("display", "none");

                if ($("#uf").prop('required')) {
                    $("#uf").prop('required', false);
                }
                if ($("#crf").prop('required')) {
                    $("#crf").prop('required', false);
                }
            } else {
                $("#farmaceutico").css("display", "block");
                if (!$("#uf").prop('required')) {
                    $("#uf").prop('required', true);
                }
                if (!$("#crf").prop('required')) {
                    $("#crf").prop('required', true);
                }
            }

        });


    });
</script>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Alteração de Usuários</h2>
                        <?php if (session()->get('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->get('success'); ?>
                            </div>
                        <?php endif;  ?>
                        <form class="form-signin" method="post">

                            <div class="form-label-group">
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" autofocus value="<?= $firstname ?>">
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="sobrenome" name="sobrenome" class="form-control" placeholder="Sobrenome" value="<?= $lastname ?>">
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?>">
                            </div>
                            <div class="form-label-group">
                                <select id="paises" name="paises" class="form-control" placeholder="Selecione o país" required style="height: calc(1.5em + .75rem + 14px);" required>
                                    <?php
                                    // var_dump($paises);exit;
                                    foreach ($paises as $key => $pais) {                                    
                                        if ($pais['id'] == $data['pais']) {
                                            echo "<option value='" . $pais['id'] . "' selected='selected' >" . $pais['nome_pt'] . "</option>";
                                        } else {
                                            echo "<option value='" . $pais['id'] . "'>" . $pais['nome_pt'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <select id="estados" name="estados" class="form-control" style="height: calc(1.5em + .75rem + 14px);" disabled value="<?= $estado ?>">
                                    <option>Selecione o estado acima</option>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <select id="cidades" name="cidades" class="form-control" style="height: calc(1.5em + .75rem + 14px);" disabled value="<?= $cidade ?>">
                                    <option>Selecione o cidade acima</option>
                                </select>
                            </div>
                            <div class="form-label-group">
                            <select id="categoria" name="categoria" class="form-control" style="height: calc(1.5em + .75rem + 14px);" value="<?= $type ?>">
                        
                               
                                <?php
                                 $ehAdmin = (isset($_SESSION['id']) && $_SESSION['type'] == 0); {
                                    
                                }

                                foreach ($data as $key => $result) {
                                    $selecionado = $data['type'] == $id;
                                    if ($selecionado) {
                                        $type = $result['type'];
                                    }
                                }

                               
                                if ($type == 0) {
                                    echo '<option value="0">Administrador</option>';
                                }else if ($type == 1) {
                                    echo '<option value="1"  selected="selected">Estudante de Farmácia</option>';
                                    echo '<option value="2" >Farmacêutico</option>';
                                } else if ($type == 2) {
                                    echo '<option value="1" >Estudante de Farmácia</option>';
                                    echo '<option value="2" selected="selected">Farmacêutico</option>';
                                }
                                ?>

                            </select>

                            </div>
                            <div class="form-label-group" id="farmaceutico" style="display: none">
                                <div class="row justify-content-between" style="width: 100%;margin: 0;">
                                    <select id="uf" name="uf" class="form-control col-3" style="height: calc(1.5em + .75rem + 14px);" value="<?= $uf ?>">
                                        <?php echo $options_uf; ?>
                                    </select>
                                    <input type="number" id="crf" name="crf" class="form-control col-8" placeholder="CRF" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?= $crf ?>">
                                </div>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" value="<?= $telefone ?>">
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="celular" name="celular" class="form-control" placeholder="Celular" value="<?= $celular ?>">
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF" value="<?= $cpf ?>">
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="senha_confirmacao" name="senha_confirmacao" class="form-control" placeholder="Confirme a Senha" required>
                            </div>
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-md btn-primary  text-uppercase" id="cad" type="submit">Alterar</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>