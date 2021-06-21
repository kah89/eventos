<style>
#cad, #ed{
    margin-left: 2px;
}
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
    text-align: center; 
}
.btn{
    margin-left: 58px;
}
#data{
        width: 180px;
        margin-left: -26px;
    }

#certificado{
    margin-left: -15px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Alteração de Atividade</h5>
                    <form class="form-signin" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" value="<?=$titulo?>"  required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group"><!--DB atividade_evento (descrição) -->
                                <textarea name="descricao" id="conteudo" class="form-control" maxlength="200" placeholder="Conteúdo" value="<?=$descricao?>" required></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-5 data">
                            <div class="form-label-group">
                                <input type="text" id="data" name="data" class="form-control" placeholder="Data" value="<?=$dtInicio?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group col-sm-7 certi">
                            <div class="form-label-group"><!--DB atividade_evento (tipo) -->
                                <select id="certificado" name="certificado" class="form-control" style="height: calc(1.5em + .75rem + 14px);" value="<?=$tipo?>">
                                    <option value="1">Gera certificado</option>
                                    <option value="2">Não gera certificado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-md btn-primary  text-uppercase" id="cad" type="submit">Alterar</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>