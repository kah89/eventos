<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    h1 {
        color: #007BFF;
        text-align: left;
        margin-top: 20px;
        font: caption;
    }

    th {
        color: white;
        text-align: left;
        margin-top: 20px;
        font: caption;
    }

    .fa-trash {
        margin-left: 20%;
    }

    #tabela tbody tr {
        border: solid 1px;
        height: 30px;
        cursor: pointer;
    }

    #tabela thead {
        background: #0174DF;
        border: solid 2px;
        opacity: 0.7;
    }

    #tabela thead th:nth-child(1) {
        width: 100px;
    }

    #tabela input {
        color: navy;
        width: 100%;
    }

</style>
<script>
    
$(document).ready(function() {
        $('#tabela').DataTable({
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
        }
        });
    });
</script>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12" id="divConteudo">
                <h1 style="text-align: center; font-size:30px">Eventos</h1>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if (count($data) > 0) { ?>
                    <table class="table table-hover" id="tabela">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Resumo</th>
                                <th scope="col">Ações</th> <!-- botão-->
                            </tr>
                            
                    </thead>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $evento) {
                                echo '<tr><td>' . $evento['id'] . '</td><td>' . $evento['titulo'] . '</td><td>' . $evento['resumo'] . '</td>
                               <td><a href=' . base_url('editeventos') . "/" . $evento['id'] . '  ><i class="fa fa-edit" style="color: blue"></a></i>
                               <a href=' . base_url('eventos/deletar') . "/" . $evento['id'] . '><i class="fa fa-trash"  style="color: red"></a></i></td></tr>';
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</main>