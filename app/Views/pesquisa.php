<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<style>
    input {
        margin-left: 10px;
        margin-right: 10px;
    }

    textarea {
        height: 150px;
        width: 100%;
    }
</style>
<main>
    <div class="container">
        <h1>AVALIAÇÃO DE EVENTOS TÉCNICOS</h1>

        <p>Queremos saber, em poucos minutos, como você avalia o evento realizado pelo CRF-SP. Por favor, responda as perguntas abaixo.</p>
        </br></br>

        <form class="form-signin" name='form2' method="POST">
            <h2>Campos não obrigatórios:</h2>
            <div class="questao">
                <h3>Gênero</h3>
                <label>
                    <input type="radio" name="genero" value="1">Masculino </label></br>
                <label>
                    <input type="radio" name="genero" value="2">Feminino </label></br>
                <label>
                    <input type="radio" name="genero" value="3">Mulher Transexual </label></br>
                <label>
                    <input type="radio" name="genero" value="4">Travesti </label></br>
                <label>
                    <input type="radio" name="genero" value="5">Homem Transexual </label></br>
                <label>
                    <input type="radio" name="genero" value="6">Não binário </label></br>
                <label>
                    <input type="radio" name="genero" value="7">Outro </label></br>
            </div>
            </br></br>

            <div class="questao">
                <h3>Maior de 60 anos?</h3>
                <label>
                    <input type="radio" name="maior60" value="1">Sim </label></br>
                <label>
                    <input type="radio" name="maior60" value="2">Não </label>
            </div>
            </br></br>

            <div class="questao">
                <h3>Portador de necessidades especiais?</h3>
                <label>
                    <input type="radio" name="portador" value="1">Sim </label></br>
                <label>
                    <input type="radio" name="portador" value="2">Não </label>
            </div>
            </br></br>

            <div class="questao">
                <h3>Você é inscrito no CRF-SP?</h3>
                <label>
                    <input type="radio" name="inscrito" value="1">Sim </label></br>
                <label>
                    <input type="radio" name="inscrito" value="2">Não </label>
            </div>
            <hr>
            </br>

            <h2>Avaliação</h2>
            <div class=" oculto">
                <div class="questao">
                    <h3>Qual a sua forma de participação? </h3>
                    <label>
                        <input type="radio" name="forma" value="1" required>Presencial</label></br>
                    <label>
                        <input type="radio" name="forma" value="2" required>On-line</label>
                </div>
            </div>
            </br></br>

            <div class=" oculto">
                <div class="questao">
                    <h3>Qual a atividade deseja avaliar?</h3>
                    <select id="atividade" name="atividade" class="form-control" required>
                        <option selected="selected">Selecione a atividade</option>
                    </select>

                </div>
            </div>
            </br></br>

            <div class=" oculto">
                <div class="questao">
                    <h3>Informe o município em que foi realizado o evento:</h3>
                    <select name="cidades" class="form-control">
                        <option selected="selected">Selecione o município</option>
                        <?php
                        foreach ($cidades as $key => $cidade) {
                            if ($cidade['uf'] == '26') {
                                echo "<option  value='" . $cidade['id'] . "' >" . $cidade['nome'] . "</option>";
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>
            </br></br>



            <div class=" oculto">
                <div class="questao">
                    <h3>Em que data participou/concluiu esta atividade?</h3>
                </div>
                <input id="date" type="date" name="data" required>
            </div>
            </br></br>


            <div class=" oculto">
                <div class="questao">
                    <h2>Avalie seu grau de satisfação com relação à(ao):</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Muito satisfeito</th>
                                <th>Satisfeito</th>
                                <th>Neutro</th>
                                <th>Insatisfeito</th>
                                <th>Muito insatisfeito</th>
                                <th>Não tenho condições de avaliar</th>
                            </tr>
                        </thead>

                        <br />
                        <h4>Ministrante/palestrante:</h4>
                        <tbody>
                            <tr class="tipo_1">
                                <td>Conduta</td>
                                <td class="center"><label><input type="radio" name="a" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="a" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="a" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="a" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="a" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="a" value="6" required></label></td>
                            </tr>
                            <tr class="tipo_1">
                                <td>Abordagem</td>
                                <td class="center"><label><input type="radio" name="b" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="b" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="b" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="b" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="b" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="b" value="6" required></label></td>
                            </tr>
                            <tr class="tipo_1">
                                <td>Conhecimento teórico</td>
                                <td class="center"><label><input type="radio" name="c" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="c" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="c" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="c" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="c" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="c" value="6" required></label></td>
                            </tr>
                            <tr class="tipo_1">
                                <td>Experiência prática</td>
                                <td class="center"><label><input type="radio" name="d" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="d" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="d" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="d" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="d" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="d" value="6" required></label></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Muito satisfeito</th>
                                <th>Satisfeito</th>
                                <th>Neutro</th>
                                <th>Insatisfeito</th>
                                <th>Muito insatisfeito</th>
                                <th>Não tenho condições de avaliar</th>
                            </tr>
                        </thead>

                        <br />
                        <h4>Material:</h4>
                        <tbody>
                            <tr class="tipo_2">
                                <td>Conteúdo técnico</td>
                                <td class="center"><label><input type="radio" name="e" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="e" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="e" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="e" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="e" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="e" value="6" required></label></td>
                            </tr>
                            <tr class="tipo_2">
                                <td>Forma de apresentação</td>
                                <td class="center"><label><input type="radio" name="f" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="f" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="f" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="f" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="f" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="f" value="6" required></label></td>
                            </tr>
                            <tr class="tipo_2">
                                <td>Objetividade</td>
                                <td class="center"><label><input type="radio" name="g" value="1" required></label></td>
                                <td class="center"><label><input type="radio" name="g" value="2" required></label></td>
                                <td class="center"><label><input type="radio" name="g" value="3" required></label></td>
                                <td class="center"><label><input type="radio" name="g" value="4" required></label></td>
                                <td class="center"><label><input type="radio" name="g" value="5" required></label></td>
                                <td class="center"><label><input type="radio" name="g" value="6" required></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </br></br>

            <div class=" oculto">
                <div class="questao">
                    <h3>Caso queira se manifestar especificamente sobre os itens avaliados anteriormente referente ao ministrante/palestrante e material, favor descrever: </h3>
                    <textarea name="manifestacao" id="manifestacao" cols="30" rows="10"></textarea>
                </div>
            </div>
            </br></br>

            <div class=" oculto">
                <div class="questao">
                    <h3>Suporte e adequação das instalações físicas para a realização do evento:</h3>
                    <label>
                        <input type="radio" name="suporte" value="1" required>Atendimento</label>
                    </br>
                    <label>
                        <input type="radio" name="suporte" value="2" required>Infraestrutura</label>
                </div>
            </div>
            </br></br>

            <div class=" oculto">
                <div class="questao">
                    <h3>Se quiser registrar uma sugestão, elogio ou reclamação acesse a Ouvidoria </h3>
                    <p><a href="https://falabr.cgu.gov.br/publico/SP/Manifestacao/RegistrarManifestacao" target="_blank"> clique aqui </a></p>
                </div>
            </div>


            <div id="msg"></div>

            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enviar</button>

        </form>
    </div>
</main>

<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    }
    $msg = <?php echo "'" . $msg . "'"; ?>;
    if ($msg) {
        toastr.info($msg);
    }

    const atividades = JSON.parse(JSON.stringify(<?php echo $atividades; ?>));
    console.log(atividades);

    $('input[type=radio][name=forma]').on('change', function() {
        var forma = $('input[type=radio][name=forma]:checked').val();

        if (forma == 1) {
            opt = "";
            Object.entries(atividades).forEach(([keys, atividade]) => {
                if (atividade['forma'] == 1) {
                    opt += "<option value='" + atividade['id'] + "' data-date='" + atividade['data'] + "' data-city='" + atividade['municipio'] + "'>" + atividade['titulo'] + " - " + atividade['data'] + "</option>";
                }
            });
            $('#atividade').html(opt);
        } else {
            opt = "";
            Object.entries(atividades).forEach(([keys, atividade]) => {
                if (atividade['forma'] == 2) {
                    opt += "<option value='" + atividade['id'] + "' data-date='" + atividade['data'] + "' data-city='" + atividade['municipio'] + "'>" + atividade['titulo'] + " - " + atividade['data'] + "</option>";
                }
            });
            $('#atividade').html(opt);
        }
    });

    // $('input[type=radio][name=forma]').on('change', function() {
    //     var forma = $('input[type=radio][name=forma]:checked').val();

    //     $.post('<?= base_url() . "/atividadesForma" ?>', {
    //         forma: forma
    //     }, function(data) {
    //         $('#atividade').html(data);
    //     });

    // });

    $('#atividade').on('change', function() {
        var selected = $(this).find('option:selected');
        var data = selected.data('date');
        var municipio = selected.data('city');

        const d = new Date(data);
        data = d.getFullYear() + '-' + (d.getMonth() + 1).toString().padStart(2, '0') + '-' + d.getDate().toString().padStart(2, '0');

        if(data){
            $('#date').val(data);
            $('#date').prop("disabled", true);
        }
    });


    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?= $this->endSection() ?>