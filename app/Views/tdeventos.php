<style>
h2{
    color: #007BFF;
    text-align: center;
    margin-top: 30px;
}
.resumo{
    margin-top: 10px;
}
.card-title{
    margin-top: -15px;
    
}

</style>

<div class="container">
	   <h2>Eventos</h2>
    <div class="row">
    
    <?php 
    // var_dump($data);exit;
    if(count($data)>0){ 
        foreach($data as $key => $evento){
        ?>
        <div class="col-sm-4">
            <div class="card card-signin my-5">
                <div class="card-body card">
                    <h5 class="card-title"><?php echo $evento['titulo']?></h5> <!-- puxar o título via php -->
                    <img src="<?php echo base_url("/public/img")."/".$evento['imagem']?>" alt="" width="100%">
                    <p class="card-text resumo"><?php echo $evento['resumo']?></p> <!-- puxar o resumo via php -->
                    <a href="<?php echo $evento['id']?>" class="btn btn-primary">Veja mais</a>
                </div>
            </div>
        </div>
       <?php 
        }
    } else{
        echo "<h2>Nenhum evento cadastrado!</h2>";
    }
    
    ?>
    </div>
</div>