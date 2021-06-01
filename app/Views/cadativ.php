<style>

#res:hover{
    background-color:red;
}
#ed:hover{
    background-color:#daf87d;
}
.data{
    float: right;
}
h5{
    color: #007BFF;
}
</style>
<script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].data.value = data;
                  return true;
              }
         }
</script>
<div class="container">
    <div class="row">
    <?php
        if(session()->get("success")){
            ?>
            <h3><?= session()->get("success") ?></h3>
            <?php
        }
        if(session()->get("error")){
            ?>
            <h3><?= session()->get("error") ?></h3>
            <?php
        }
        ?>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Cadastro de Atividade</h5>
                    <form class="form-signin" method="post">
                        <div class="form-group">
                            <div class="form-label-group"> 
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" maxlength="60"  minilength="3"  required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="conteudo" id="conteudo" class="form-control" maxlength="200" placeholder="Conteúdo" maxlength="60"  minilength="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-5 data">
                            <div class="form-label-group">
                                <input type="text" id="data" name="data" class="form-control" placeholder="Data" OnKeyUp="mascaraData(this);" maxlength="10" required autofocus>
                            </div>
                        </div>
                        <div class="form-group col-sm-7 certi">
                            <div class="form-label-group">
                                <select id="certificado" name="certificado" class="form-control" style="height: calc(1.5em + .75rem + 14px);">
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


