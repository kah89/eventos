<style>
    .menu {
        margin: 5px;
    }

    h2 {
        text-align: center;
        padding: 40px;
        color: #007BFF;
    }

    p {
        font-size: 25px;
        margin: 20px;
    }
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <?php
        if (count($data) > 0) {
        ?>
            <div>
                <h2>Título: <?php echo " " . $data['titulo'] ?></h2>
            </div>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url("eventos") ?>">Eventos</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url("listarAtividades") ?>">Lista-Atividades</a></li>
                    <li class="active breadcrumb-item">Atividade</li>
                </ol>
            </div>
            <div>
                <p> <?php 
                echo $data['atividade'] = htmlspecialchars_decode($data['atividade']); 
                ?></p>
                
            </div>
        <?php

        } else {
            echo "<h2>Nenhuma atividade cadastrada!</h2>";
        }

        ?>
    </div>
</main>