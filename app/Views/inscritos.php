<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
  h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }
</style>
<main>
    <?php
    if (
        isset($_SESSION['id']) &&
        $_SESSION['type'] == 0
    ) {
    ?>
        <div class="container bg-white" style="padding-bottom: 10em;">
            <div class="row">
                <div class="col-12">
                    <p style="text-align: right;">Total de Inscritos: <?php echo count($users); ?></p>

                    <table class="table table-hover" id="inscritos">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">País</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Atividades</th>
                                <th scope="col">Data Inscri.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ativ1 = 0;
                            $ativ2 = 0;
                            $ativ12 = 0;
                            foreach ($users as $usuario) :

                                if ($usuario['type'] == 2) {
                                    $cat = "Farmacêutico";
                                } else {
                                    $cat = "Estudante";
                                }

                                if ($usuario['atividadesconcluidas'] == "2") {
                                    $ativ2 = $ativ2 + 1;
                                } else if ($usuario['atividadesconcluidas'] == "1") {
                                    $ativ1 = $ativ1 + 1;
                                }
                                if ($usuario['atividadesconcluidas'] == "1,2") {
                                    $ativ12 = $ativ12 + 1;
                                }



                                echo "<tr>" .
                                    "<td>" . $usuario['id'] . "</td>" .
                                    "<td>" . $usuario['nome'] . "</td>" .
                                    "<td>" . $usuario['email'] . "</td>" .
                                    "<td>" . $usuario['pais'] . "</td>" .
                                    "<td>" . $usuario['estado'] . "</td>" .
                                    // "<td>" . $usuario['cidade']."</td>" .
                                    "<td>" . $cat . "</td>" .
                                    "<td>" . $usuario['atividadesconcluidas'] . "</td>" .
                                    "<td>" . date_format(date_create($usuario['created_dt']), 'd/m/Y H:i:s') . "</td>";
                            endforeach;
                            $ativ1 = $ativ1 + $ativ12;
                            $ativ2 = $ativ2 + $ativ12;

                            ?>
                        </tbody>
                    </table>
                    <p style="text-align: right;">Total de Inscritos que assistiram a atividade 1: <?php echo ($ativ1); ?></p>
                    <p style="text-align: right;">Total de Inscritos que assistiram a atividade 2: <?php echo ($ativ2); ?></p>
                    <p style="text-align: right;">Total de Inscritos que assistiram ambas as atividades: <?php echo ($ativ12); ?></p>
                </div>
            </div>
        </div>
    <?php
    }else{
        // return redirect()->to(base_url('eventos'));
       echo "<h3>Não tem permissão para acessar essa página!</h3>";
    }
    ?>
</main>
<script>
    $(document).ready(function() {
        $('#inscritos').DataTable({
            paging: false
        });
    });
</script>