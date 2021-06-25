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
    }

    #tabela thead th:nth-child(1) {
        width: 100px;
    }

    #tabela input {
        color: navy;
        width: 100%;
    }
    .pagination{
        margin-left: 80%;
    }
</style>
<script>
    $(function() {
        $("#tabela input").keyup(function() {
            var index = $(this).parent().index();
            var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
            var valor = $(this).val().toUpperCase();
            $("#tabela tbody tr").show();
            $(nth).each(function() {
                if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                    $(this).parent().hide();
                }
            });
        });

        $("#tabela input").blur(function() {
            $(this).val("");
        });
    });
</script>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12" id="divConteudo">
                <h1 style="text-align: center; font-size:30px">Usuários</h1>
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
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">Nível</th>
                            <th scope="col">Ações</th> <!-- botão-->
                        </tr>
                        <tr>
                            <th><input type="text" id="txtColuna1" /></th>
                            <th><input type="text" id="txtColuna2" /></th>
                            <th><input type="text" id="txtColuna3" /></th>
                            <th><input type="text" /></th>
                            <th><input type="text" disabled /></th>
                           
                        </tr>
                        <!-- <nav aria-label="Navegação de página exemplo">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Anterior">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Anterior</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Próximo">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Próximo</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $evento) {
                            echo '<tr><td>' . $evento['id'] . '</td><td>' . $evento['firstname'] . '</td><td>' . $evento['lastname'] . '</td><td>' . $evento['type'] . '</td>
                               <td><a href=' . base_url('editaruser') . "/" . $evento['id'] . '><i class="fa fa-edit" style="color: blue"></a></i>
                               <a href=' . base_url('users/deletar') . "/" . $evento['id'] . '><i class="fa fa-trash"  style="color: red"></a></i></td></tr>';
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>