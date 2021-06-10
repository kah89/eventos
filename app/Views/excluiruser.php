<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
h1, th{
    color: #007BFF;
    text-align: left;
    margin-top: 20px;
    font: caption;
}
.fa-trash{
    margin-left: 20%;
}
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <h1 style="text-align: center; font-size:30px">Usuários</h1>

                <table class="table table-hover" id="atividades">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th> 
                            <th scope="col">Nível</th> 
                            <th scope="col">Ações</th> <!-- botão-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $evento){
                               echo '<tr><td>'. $evento['id'].'</td><td>'.$evento['firstname'].'</td><td>'.$evento['lastname'].'</td><td>'.$evento['type'].'</td><td><a href="editaruser"><i class="fa fa-edit" style="color: blue"></a></i><a href="users/deletar/'.$evento['id'].'"><i class="fa fa-trash"  style="color: red"></a></i></td></tr>';
                        } ?>
                    </tbody>
                </table>
            </div>    
        </div>    
    </div> 
</main>