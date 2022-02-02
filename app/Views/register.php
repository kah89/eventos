<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem
    }

    body {
        background: linear-gradient(to right, #0a346d, #1598ef)
    }

    .card-signin {
        border: 0;
        border-radius: 0rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1)
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem
    }

    .card-signin .card-body {
        padding: 2rem
    }

    .form-signin {
        width: 100%
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 0rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s
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

    .btn-google {
        color: white;
        background-color: #ea4335
    }

    .btn-facebook {
        color: white;
        background-color: #3b5998
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
                    $("#estados").val('26');
                    $("#estados").trigger("change");

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
                    if(id_estado == 26){
                        $("#cidades").val('5270');
                    }
                } else {
                    var exteriorCidade = '<option>País estrangeiro não precisa informar a cidade</option>'
                    $('#cidades').html(exteriorCidade);
                    $('#cidades').attr('disabled', 'disabled');
                }
            });
        });

        $("#paises").val('1');
        $("#paises").trigger("change");

        $("#telefone").mask("(00) 0000-0000");
        $("#celular").mask("(00) 0000-00000");
        $("#cpf").mask("000.000.000-00");

        $('#categoria').change(function() {
            if ($('#categoria').val() == 1) {
                $("#farmaceutico").css("display", "none");
                $("#uf").attr('required', 0);
                $("#crf").attr('required', 0);
            } else {
                $("#farmaceutico").css("display", "block");
                $("#uf").attr('required', 1);
                $("#crf").attr('required', 1);
            }
        });

        $('#senha, #senha_confirmacao').on('keyup', function() {
            if ($('#senha').val() == $('#senha_confirmacao').val()) {
                $('#message').html('Senhas válidas').css('color', 'green');
            } else
                $('#message').html('Senhas não batem').css('color', 'red');
        });

        

    });

  
    function validar(){
        if  ($('#message').text() != 'Senhas válidas'){
            returnToPreviousPage();
    return false;
        }else{
            return true;
        }
    }
</script>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Cadastre-se</h5>
                        <form id="myForm" class="form-signin" method="post" onsubmit="return validar();"> 
                            <div class="form-label-group">
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="sobrenome" name="sobrenome" class="form-control" placeholder="Sobrenome" required>
                            </div>
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-label-group">
                                <select id="paises" name="paises" class="form-control" placeholder="Selecione o país" required style="height: calc(1.5em + .75rem + 14px);">
                                    <?php echo $options_paises; ?>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <select id="estados" name="estados" class="form-control" style="height: calc(1.5em + .75rem + 14px);" disabled>
                                    <option>Selecione o país acima</option>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <select id="cidades" name="cidades" class="form-control" style="height: calc(1.5em + .75rem + 14px);" disabled>
                                    <option>Selecione o estado acima</option>
                                </select>
                            </div>
                            <div class="form-label-group">
                                <select id="categoria" name="categoria" class="form-control" style="height: calc(1.5em + .75rem + 14px);">
                                    <option value="1">Estudante de Farmácia</option>
                                    <option value="2">Farmacêutico</option>
                                    <option value="4">Outros profissionais</option>
                                </select>
                            </div>
                            <div class="form-label-group" id="farmaceutico" style="display: none">
                                <div class="row justify-content-between" style="width: 100%;margin: 0;">
                                    <select id="uf" name="uf" class="form-control col-3" style="height: calc(1.5em + .75rem + 14px);">
                                        <?php echo $options_uf; ?>
                                    </select>
                                    <input type="number" id="crf" name="crf" class="form-control col-8" placeholder="CRF" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone">
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="celular" name="celular" class="form-control" placeholder="Celular">
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF">
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" minlength="8" required>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="senha_confirmacao" name="senha_confirmacao" class="form-control" placeholder="Confirme a Senha" minlength="8" required>
                                <span id='message'></span>
                            </div>

                            <!-- <div class="custom-control custom-checkbox mb-3"> -->
                            <div class="row">
                                <!-- <input type="checkbox" class="custom-control-input" id="termos" name="termos" required style="z-index: 9;"> -->
                                <input type="checkbox" class="col-1" id="termos" name="termos" required style="margin-top: 7px;margin-left: 7px;margin-right: -7px;">
                                <label for="concordo" class="col-11">Estou de acordo com os <a href="http://farmaceuticosp.com.br/eventos/public/Termo de Consentimento para tratamento de dados pessoais.pdf" target="_blank">Termo de Consentimento para tratamento de dados pessoais</a></label>
                                <!-- <label class="custom-control-label" for="concordo">Estou de acordo com o <a href="http://farmaceuticosp.com.br/encontro/public/Termo de consentimento para tratamento de dados pessoais_XXI Encontro Paulista de Farmaceuticos.pdf" target="_blank">Termo de Consentimento para tratamento de dados pessoais</a></label> -->
                            </div>

                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
                            <hr class="my-4">
                        </form>
                    </div>
                    <div class="mx-auto">
                        Já é cadastrado? <a href="<?= base_url(''); ?>">Acesse</a>
                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>