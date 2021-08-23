
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
    h2 {
        color: #092e48;
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
    $msg = "";
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
                    <a class="btn btn-primary  text-uppercase" id="cad" type="submit" href="<?= base_url('cadastrarUser') ?>">Cadastrar</a>

                    <?php if (session()->get('success')) { ?>
                        <script>
                            $msg = '<?= session()->get('success'); ?>';
                        </script>
                    <?php } ?>
                    <table class="table table-hover display" id="tabela">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Nível</th>
                                <th>Ações</th> <!-- botão-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $user) {
                                 if ($user['type'] == '0') {
                                    $type = 'Administrador';
                                }else if ($user['type'] == '1') {
                                    $type = 'Estudante';
                                } else if ($user['type'] == '2'){
                                    $type = 'Farmacêutico';
                                } else {
                                    $type = 'Outro profissional ';
                                }
                                echo '<tr><td>' . $user['id'] . '</td><td>' . $user['firstname'] . '</td><td>' . $user['lastname'] . '</td><td>' . $type. '</td>
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
        echo "<h3>Não tem permissão para acessar essa página!</h3>";
    }
    ?>
</main>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
            }
        });
    });

        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        }

        if ($msg) {
            toastr.info($msg);
        }
    
</script>