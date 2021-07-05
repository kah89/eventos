<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    
    th {
        color: #007BFF;
        text-align: left;
        margin-top: 20px;
        font: caption;
    }
    h5 {
        color: #007BFF;
        font-size: 25px;
    }

    #cad {
        width: 40px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;
        text-align: center;
    }
    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12">
                <h5 style="text-align: center; font-size:30px">Atividades</h5>

                <table class="table table-hover" id="atividades">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Data</th> <!-- abrir um popup ou card  / BD dt inicio-->
                            <th scope="col">Certificado</th> <!-- check box / BD tipo-->
                            <th scope="col">Ação</th> <!-- check box / BD tipo-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $evento) {
                            echo '<tr><td>' . $evento['id'] . '</td><td>' . $evento['titulo'] . '</td><td>' . $evento['dtInicio'] . '</td><td>' . $evento['tipo'] . '</td>
                               <td><a class="btn btn-primary" id="cad" href=' . base_url('/atividades/inscreverAtividade') . "/" . $evento['id'] .' role="button" >Ir </a></td></tr>';
                        } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- <script>
        function veratividade(id) {
            var link = document.getElementById("confirmar").href;
            document.getElementById("confirmar").href = link + id;
        }
    </script> -->