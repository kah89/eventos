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
#certificado{
        text-align: center;
    }
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <h1 style="text-align: center; font-size:30px">Atividades</h1>
                <?php if (session()->get('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
                <?php } elseif(session()->get('danger')) {?>
                    <div class="alert alert-danger" role="alert">
                            <?= session()->get('danger'); ?>
                        </div>

                    <?php } ?> 
                <table class="table table-hover" id="atividades">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Data</th> 
                            <th scope="col">Certificado</th> 
                            <th scope="col">Ações</th> <!-- botão-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $evento){
                               echo '<tr><td>'. $evento['id'].'</td><td>'.$evento['titulo'].'</td><td>'.$evento['dtInicio'].'</td><td>'.$evento['tipo'].'</td>
                               <td><a href='.base_url('editativ')."/".$evento['id'].'><i class="fa fa-edit" style="color: blue"></a></i>
                               <a href='.base_url('atividades/deletar')."/".$evento['id'].'><i class="fa fa-trash"  style="color: red"></a></i></td></tr>';
                        } ?>
                    </tbody>
                </table>
            </div>    
        </div>    
    </div>
</main>