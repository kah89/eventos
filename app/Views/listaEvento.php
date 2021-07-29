<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
h1, th{
    color: #007BFF;
    text-align: left;
    margin-top: 20px;
    font: caption;
}
#cad,
    #cad1 {
        width: 40px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 11px 23px;
        border-radius: 8px;
        border: 2px solid;
        text-align: center;
        margin-left: -5px;
    }

    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
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
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   foreach ($data as $key => $atividade) {
                                if ($atividade['tipo'] == '1') {
                                    $tipo = 'Sim';
                                } else {
                                    $tipo = 'Não';
                                }
                                echo '<tr><td>' . $atividade['id'] . '</td><td>' . $atividade['titulo'] . '</td><td>' . $atividade['dtInicio'] . '</td><td>' . $tipo . '</td>

                               ';

                                if (date($atividade['dtFim']) > date("Y-m-d H:i:s")) {
                                    echo '<td><a class="btn btn-primary" id="cad" href= ' . base_url('/atividades/inscreverAtividade') . "/" . $atividade['id'] . ' onclick="inscreverAtividade(' . $atividade['id'] . ');"  role="button" >Ir </a></td></tr>';
                                } else {
                                    echo '<td><a type="button" id="cad" class=" cad btn btn-primary" data-toggle="modal" data-target="#sobreModal">
                                    Ir
                                </a></td></tr>';
                                }
                            }?>
                    </tbody> 
                </table>
            </div>    
        </div>    
    </div>
</main>