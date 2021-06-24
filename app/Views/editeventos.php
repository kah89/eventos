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
#hora1, #hora{
        width: 100px;
        /* float: right; */
        margin-left: 205px;
        margin-top: -54px;
    }

</style>
<div class="container">
    <div class="message_box">
			<?php
				if (isset($success) && strlen($success)) {
					echo '<div class="success">';
					echo '<p>' . esc($success) . '</p>';
					echo '</div>';
				}

				if (isset($error) && strlen($error)) {
					echo '<div class="error">';
					echo '<p>' . esc($error) . '</p>';
					echo '</div>';
				}
			?>
	</div>
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
                    <h5 class="card-title text-center">Alteração de Evento</h5> <!-- utilizar a tabela eventos-->
                    <?php if (session()->get('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
                    <?php endif; ?> 
                    <form class="form-signin"  id="file"   method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <div  class="mb-3">
                                <input class="form-control" onchange="readURL(this);"   type="file" name="profile_image" id="formFile" accept="image/*"  readonly="true"  required autofocus> 
                                <img id="blah" type="file" alt="imagem" src="<?php echo base_url("public/img") ."/".$imagem ?>"/>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="form-label-group">
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo"  required autofocus value="<?=$titulo?>">
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="resumo" id="resumo" class="form-control" maxlength="200" placeholder="Resumo"   required><?=$resumo?></textarea>
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
                        <div class="form-group">
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-md btn-primary  text-uppercase" name="file_upload" value="Upload File" id="uploadbutton"  type="submit">Alterar</button> 
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