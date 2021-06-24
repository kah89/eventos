<style>
h2{
    color: #007BFF;
    text-align: center;
    margin-top: 30px;
}
.resumo{
    margin-top: 10px;
}
.card-signin{
    margin-top: -15px;
    min-height: 85%;
}
.card-title{
    text-align: center;
}
.active {
    margin-left: 5px;
    margin-top: 10px;
    text-align: center;
}


</style>

<div class="container">
	   <h2>Eventos</h2>
       <?php if (session()->get('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
        <?php endif; ?> 
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
                
                <ul class="nav nav-pills ">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url("/eventos/lista")."/". $evento['id']?>">Atividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inscreva-se</a>                        
                    </li>
                </ul>
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