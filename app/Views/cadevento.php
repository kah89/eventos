<style>

h5{
    color: #007BFF;
}

</style>

<div class="container">
    <div class="row">
    <!-- <?php 
    //  //var_dump($data); exit;
    // // if(is_array($data) || is_object($data)){
    // if(count($data)>0){

    // // if($data == ""){ 
    //     foreach($data as $key => $evento){
    //         // $evento = $data;
            
        ?> -->
        
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Cadastro de Evento </h5> <!-- utilizar a tabela eventos-->
                    <form class="form-signin" method="post" action="<?php echo base_url('Eventos/cadeventos');?>" enctype = "multipart / form-data" >  
                        <div class="form-group">
                            <div  class="mb-3">
                                    <input class="form-control" type="file" name="file" id="formFile"  required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                 <input type="text" id="titulo" name="titulo" class="form-control" placeholder="titulo"  required autofocus  >
                            </div>  
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea name="resumo" id="resumo" class="form-control" maxlength="200" placeholder="Resumo"  required ></textarea>
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
