<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

<style>
    h2 {
        color: #007BFF;
        margin-top: 20px;
    }


    th {
        color: white;
        margin-top: 20px;
    }

    .fa-edit {
        margin-left: 30%;
    }

    .fa-trash {
        margin-left: 10px;
        margin-right: 10px;
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

    .pagination {
        margin-left: 80%;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    #cad {
        width: 100px;
        background-color: #008CBA;
        font-size: 12px;
        border-radius: 8px;
        border: 2px solid;
        float: right;
        margin: 10px;
    }

    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
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

    // $(function() {
    //     $("#tabela input").keyup(function() {
    //         var index = $(this).parent().index();
    //         var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
    //         var valor = $(this).val().toUpperCase();
    //         $("#tabela tbody tr").show();
    //         $(nth).each(function() {
    //             if ($(this).text().toUpperCase().indexOf(valor) < 0) {
    //                 $(this).parent().hide();
    //             }
    //         });
    //     });

    //     $("#tabela input").blur(function() {
    //         $(this).val("");
    //     });
    // });
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
                    <h2 style="text-align: center; font-size:30px">Usuários</h2>
                    <a class="btn btn-primary  text-uppercase" id="cad" type="submit" href="<?= base_url('cadastrarUser') ?>" >Cadastrar</a>
                   
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
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Nível</th>
                                <th>Ações</th> <!-- botão-->
                            </tr>
                            <!-- <tr>
                            <th><input type="text" id="txtColuna1" /></th>
                            <th><input type="text" id="txtColuna2" /></th>
                            <th><input type="text" id="txtColuna3" /></th>
                            <th><input type="text" /></th>
                            <th><input type="text" disabled /></th>

                        </tr>
                        <nav aria-label="Navegação de página exemplo">

                            <button id="anterior" disabled>&lsaquo; Anterior</button>
                            <span id="numeracao"></span>
                            <button id="proximo" disabled>Próximo &rsaquo;</button>

                        </nav> -->
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $user) {
                                echo '<tr><td>' . $user['id'] . '</td><td>' . $user['firstname'] . '</td><td>' . $user['lastname'] . '</td><td>' . $user['type'] . '</td>
                               <td><a href=' . base_url('editarUser') . "/" . $user['id'] . '><i class="fa fa-edit" style="color: blue"></a></i>
                               <a href=' . base_url('users/deletar') . "/" . $user['id'] . '><i class="fa fa-trash"  style="color: red"></a></i>
                               </td></tr>';
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
