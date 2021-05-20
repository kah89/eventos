<style>

h5{
    color: #007BFF;
}

</style>
<main>
<div class="container">
    <div class="row">
    <?php if($data){ 
        ?>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Cadastro de Evento </h5> <!-- utilizar a tabela eventos-->
                    <form class="form-signin" method="post">
                        <div class="form-group">
                            <div  class="mb-3">
                                <input class="form-control" type="file" id="formFile" value=<?php echo $evento['imagem']?> required> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo" value=<?php echo $evento['titulo']?> required autofocus  >
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="resumo" id="resumo" class="form-control" maxlength="200" placeholder="Resumo" value=<?php echo $evento['resumo']?>  required ></textarea>
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
        <?php 
        }
    ?>
    </div>
</div>
</main>