<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
h1, th{
    color: #007BFF;
    text-align: left;
    margin-top: 20px;
    font: caption;
}
.fa-bell{
    margin-left: 30px;
}

</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <h1 style="text-align: center; font-size:30px">Atividades</h1>

                <table class="table table-hover" id="atividades">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Conteúdo</th> <!-- abrir um popup ou card  / BD descrição-->
                            <th scope="col">Data</th> <!-- abrir um popup ou card  / BD dt inicio-->
                            <th scope="col">Certificado</th> <!-- check box / BD tipo-->
                            <th scope="col">Lembretes</th> <!-- check box / BD tipo-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $evento){
                               echo '<tr><td>'. $evento['id'].'</td><td>'.$evento['titulo'].'</td><td>'.$evento['descricao'].'</td><td>'.$evento['dtInicio'].'</td><td>'.$evento['tipo'].'</td><td><a href="#'.$evento['id'].'"><i class="fa fa-bell"  style="color: coral"></a></i></td></tr>';
                        } ?>
                    </tbody>
                </table>
            </div>    
        </div>    
    </div>
</main>