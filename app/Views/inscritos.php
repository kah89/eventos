<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<style>
    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    .inscritos {
        max-width: 72%;
        margin-left: 200px;
        padding: 20px;
    }
</style>
<script>
    //gerar arquivo em excel
    $(document).ready(function() {
        $('#inscritos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
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

        <div class="bg-white inscritos">

            <a href="<?= base_url('alterarEventos') ?>">Voltar</a>
            <p style="text-align: right;">Total de Inscritos: <?php echo count($users); ?></p>

            <table class="table" id="inscritos">

                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Id Evento</th>
                        <th>Titulo</th>
                        <th>País</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Atividades</th>
                        <th>Data Cert.</th>
                        <th>Data Inscri.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $ativ1 = 0;
                    // $ativ2 = 0;
                    // $ativ12 = 0;
                    foreach ($users as $usuario) :

                        if ($usuario['type'] == 2) {
                            $cat = "Farmacêutico";
                        } else if ($usuario['type'] == 1) {
                            $cat = "Estudante";
                        } else {
                            $cat = "Administrador";
                        }

                        // if ($usuario['atividadesconcluidas'] == "2") {
                        //     $ativ2 = $ativ2 + 1;
                        // } else if ($usuario['atividadesconcluidas'] == "1") {
                        //     $ativ1 = $ativ1 + 1;
                        // }
                        // if ($usuario['atividadesconcluidas'] == "1,2") {
                        //     $ativ12 = $ativ12 + 1;
                        // }



                        echo "<tr>" .
                            "<td>" . $usuario['id'] . "</td>" .
                            "<td>" . $usuario['nome'] . "</td>" .
                            "<td>" . $usuario['email'] . "</td>" .
                            "<td>" . $usuario['idEvento'] . "</td>" .
                            "<td>" . $usuario['titulo'] . "</td>" .
                            "<td>" . $usuario['pais'] . "</td>" .
                            "<td>" . $usuario['estado'] . "</td>" .
                            // "<td>" . $usuario['type']."</td>" .
                            "<td>" . $cat . "</td>" .
                            "<td>" . $usuario['atividadesconcluidas'] . "</td>" .
                            "<td>";
                        if ($usuario['dataCertificado']) {
                            echo date_format(date_create($usuario['dataCertificado']), 'd/m/Y H:i:s') . "</td>";
                        } else {
                            echo "</td>";
                        }
                        echo "<td>" . date_format(date_create($usuario['dtInscricao']), 'd/m/Y H:i:s') . "</td>" . "</tr>";
                    endforeach;
                    // $ativ1 = $ativ1 + $ativ12;
                    // $ativ2 = $ativ2 + $ativ12;

                    ?>
                </tbody>
            </table>
            <p style="text-align: right;">Total de Inscritos que assistiram todas atividades: <?php echo $inscritos; ?></p>
            
            <p style="text-align: right;">Total de Inscritos que geraram certificados: <?php echo $certificado['total']; ?></p>

        </div>
    <?php
    } else {
        // return redirect()->to(base_url('eventos'));
        echo "<h3>Não tem permissão para acessar essa página!</h3>";
    }
    ?>
</main>
<script>
    // $(document).ready(function() {
    //     $('#inscritos').DataTable({
    //         paging: false
    //     });
    // });
</script>