<style>

h5{
    color: #007BFF;
}

#blah{
    margin-top: 15px;
    margin-left: 30px;
}

</style>
<script>

</script>


<div class="container">
    <div class="row">
  

        
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                <?php if (session('msg')) : ?>
                    <div class="alert alert-info alert-dismissible">
                        <?= session('msg') ?>
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    </div>
                <?php endif ?>
                    <h5 class="card-title text-center">Cadastro de Evento </h5> <!-- utilizar a tabela eventos-->
                    <form class="form-signin"  method="post" enctype="multipart/form-data" >  
                        <div class="form-group">
                            <div  class="mb-3">
                                <input class="form-control" onchange="readURL(this);"  value = " <? = $forEdit ['preview_image'];?> "  type="file" name="profile_image" id="file" accept="image/*"  required autofocus  > 
                                <img id="blah"  alt="imagem" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                 <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título"  maxlength="60"  minilength="3" required autofocus>
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="resumo" id="resumo" class="form-control"  minilength="100" maxlength="200" placeholder="Resumo"  required autofocus ></textarea>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-md btn-primary  text-uppercase" id="uploadbutton" type="submit" >Cadastrar</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>



