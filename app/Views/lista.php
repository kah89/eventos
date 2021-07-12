<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
h1, th{
    color: #007BFF;
    text-align: left;
    margin-top: 20px;
    font: caption;
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
                            <th scope="col">Data</th> <!-- abrir um popup ou card  / BD dt inicio-->
                            <th scope="col">Certificado</th> <!-- check box / BD tipo-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $ativ){
                            // var_dump($ativ);exit;
                               echo '<tr><td>'. $ativ['id'].'</td><td>'.$ativ['titulo'].'</td><td>'.$ativ['dtInicio'].'</td>
                              
                               <td id="tipo">'.$ativ['tipo'].'</td>

                               </tr>';

                        } ?>
                    </tbody> 
                </table>
            </div>    
        </div>    
    </div>
</main>