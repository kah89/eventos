<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    h2 {
        color: #007BFF;
        margin-top: 20px;
    }


    thead {
        color: white;
        text-align: center;
        margin-top: 20px;
        font: caption;
    }

    .fa-trash {
        margin-left: 20%;
    }

    #certificado {
        text-align: center;

    }

    #tabela {
        width: 100%;
        border: solid 2px;
        text-align: left;
        border-collapse: collapse;
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

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
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
    <?php
    if (
        isset($_SESSION['id']) &&
        $_SESSION['type'] == 0
    ) {
    ?>

        <div class="container bg-white" style="padding-bottom: 10em;">
            <div class="row">
                <div class="col-12" id="divConteudo">
                    <h2 style="text-align: center; font-size:30px">Atividades</h2>
                    <?php if (session()->get('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success'); ?>
                        </div>
                    <?php } elseif (session()->get('danger')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get('danger'); ?>
                        </div>

                    <?php } ?>
                    <table class="table table-hover" id="tabela">
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
                            <?php foreach ($data as $key => $evento) {
                                echo '<tr><td>' . $evento['id'] . '</td><td>' . $evento['titulo'] . '</td><td>' . $evento['dtInicio'] . '</td><td>' . $evento['tipo'] . '</td>
                               <td><a href=' . base_url('editarAtividades') . "/" . $evento['id'] . '><i class="fa fa-edit" style="color: blue"></a></i>
                               <a href=' . base_url('atividades/deletar') . "/" . $evento['id'] . '><i class="fa fa-trash"  style="color: red"></a></i></td></tr>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    } else {
        // return redirect()->to(base_url('eventos'));
        echo "<h3>Não tem permissão para acessar essa página!</h3>";
    }
    ?>
</main>