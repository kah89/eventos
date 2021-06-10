<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script> -->

<style>
h5
{
    color: #007BFF;
    text-align: center;
}
#blah
{
    margin-top: 15px;
    margin-left: 30px;
}
/* .tox .tox-statusbar 
{
background-color: #fff;
border-top: #fff;
color: #fff;
}
.tox .tox-statusbar__path {
display: none;
}
.tox .tox-statusbar__text-container {
display: none;
}
.tox .tox-menubar {
display: none;
} */

</style>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Alteração de Evento</h5> <!-- utilizar a tabela eventos-->
                    <form class="form-signin" method="post">
                        <div class="form-group">
                            <div  class="mb-3">
                                <input class="form-control" onchange="readURL(this);"   type="file" name="profile_image" id="formFile" accept="image/*"  readonly="true"  required autofocus  > 
                                <img id="blah"  alt="imagem" />      
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo"  required autofocus>
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="resumo" id="resumo" class="form-control" maxlength="200" placeholder="Resumo"   required></textarea>
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
</main>

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