<style>
    #res:hover {
        background-color: red;
    }

    #ed:hover {
        background-color: #daf87d;
    }

    .data {
        float: right;
    }

    h5 {
        color: #007BFF;
    }

    #dtAgenda{
        width: 180px;
        margin-left: -26px;
    }

    #certificado{
        margin-left: -15px;
    }
    
</style>

<script language='Javascript'>
 var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //Janeiro é 0, então somamos + 1 para trabalhar com calendário conhecido
    var yyyy = today.getFullYear();
    // Data de hoje mais 5 dias
    dd = dd + 5;
    //se for maior que dia 30 vai para o proximo mês
    if(dd > 30){
      dd = dd - 30;
      mm = mm+1;
    }
    //se for maior que 12 vai para o proximo ano
    if(mm > 12){
      mm = 1;
      yyyy = yyyy + 1;
    }
    // Se for menor que 10 formatamos com um zero na frente Ex: de 9 para 09
    if(dd < 10){
      dd = '0' + dd;
    }
    // Se for menor que 10 formatamos com um zero na frente Ex: de 9 para 09
    if(mm < 10){
      mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("dtAgenda").setAttribute("min", today);
    today = dd + '/' + mm + '/' + yyyy;
    var div = document.getElementById("divDtFutura");
    div.innerText =  today ;
</script>
<div class="container">
    <div class="row">
        <?php
        if (session()->get("success")) {
        ?>
            <h3><?= session()->get("success") ?></h3>
        <?php
        }
        if (session()->get("error")) {
        ?>
            <h3><?= session()->get("error") ?></h3>
        <?php
        }
        ?>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Cadastro de Atividade</h5>
                    <form class="form-signin" method="post" name='form1'>
                        <div class="form-group">
                            <div class="form-label-group" required>
                                <select id="inputState" class="form-control" required>
                                    <option selected disabled >Eventos</option>
                                    <?php
                                    foreach ($data as $key => $evento) {
                                        echo "<option>".$evento['id'] . " - " . $evento['titulo']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" maxlength="60" minilength="3" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="descricao" id="descricao" class="form-control" maxlength="200" placeholder="Descrição" maxlength="60" minilength="10"  ></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-5 data">
                            <div class="form-label-group">
                                <input type="date" name="data" id="dtAgenda" min="2017-04-01" class="form-control" required />
                                
                            </div>
                        </div>
                        <div class="form-group col-sm-7 certi">
                            <div class="form-label-group">
                                <select id="certificado" name="certificado" class="form-control" style="height: calc(1.5em + .75rem + 14px);" >
                                    <option selected disabled>Certificado</option>
                                    <option value="1">Gera certificado</option>
                                    <option value="2">Não gera certificado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-md btn-primary  text-uppercase" id="cad" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
