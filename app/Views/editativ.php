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
#hora1, #hora{
    width: 100px;
    /* float: right; */
    margin-left: 205px;
        margin-top: -54px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Alteração de Atividade</h5>
                    <?php if (session()->get('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
                    <?php endif; ?> 
                    <form class="form-signin" method="post">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" value="<?=$titulo?>"  required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group"><!--DB atividade_evento (descrição) -->
                                <textarea name="descricao" id="conteudo" class="form-control" maxlength="200" placeholder="Conteúdo"  required><?=$descricao?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group"><!--DB atividade_evento (descrição) -->
                                <textarea name="atividade" id="atividade" class="form-control" maxlength="200" placeholder="Atividade"  required><?=$atividade?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 data" id="inicial">
                            <div class="form-label-group">
                            <label for="" >Inicial :</label>
                                 <input type="date" name="datainicial" id="dtAgenda" min="2017-04-01" class="form-control" value="<?=$dtInicio?>"  required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="time" name="hinicial" id="hora"  class="form-control"  required />
                            </div>
                        </div>
                        <div class="form-group col-sm-6 data" id="final" >
                            <div class="form-label-group">
                                <label for="" >Final:</label>
                                <input type="date" name="datafinal" id="dtAgenda1" min="2017-04-01" value="<?=$dtFim?>" class="form-control" required />
                            </div>
                         </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="time" name="hfinal" id="hora1"  class="form-control"  required />
                                
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