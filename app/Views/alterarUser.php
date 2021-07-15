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
        margin-left: 10%;
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
                               <a href=' . base_url('users/deletar') . "/" . $user['id'] . '><i class="fa fa-trash"  style="color: red"></a></i></td></tr>';
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
<script>
    //script para criar paginação
    // var dados = $user;
    // var tamanhoPagina = 30;
    // var pagina = 0;

    // function paginar() {
    //     $('table > tbody > tr').remove();
    //     var tbody = $('table > tbody');
    //     for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) * tamanhoPagina; i++) {
    //         tbody.append(
    //             $('<tr>')
    //             .append($('<td>').append(dados[i][0]))
    //             .append($('<td>').append(dados[i][1]))
    //         )
    //     }
    //     $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
    // }

    // function ajustarBotoes() {
    //     $('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
    //     $('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
    // }

    // $(function() {
    //     $('#proximo').click(function() {
    //         if (pagina < dados.length / tamanhoPagina - 1) {
    //             pagina++;
    //             paginar();
    //             ajustarBotoes();
    //         }
    //     });
    //     $('#anterior').click(function() {
    //         if (pagina > 0) {
    //             pagina--;
    //             paginar();
    //             ajustarBotoes();
    //         }
    //     });
    //     paginar();
    //     ajustarBotoes();
    // });
</script>