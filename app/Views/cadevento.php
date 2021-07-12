<style>
    h2 {
        color: #007BFF;
    }

    #blah {
        margin-top: 15px;
        margin-left: 30px;

    }

    #uploadbutton {
        width: 200px;
        background-color: #008CBA;
        font-size: 12px;
        padding: 12px 28px;
        border-radius: 8px;
        border: 2px solid;
       
    }
    #uploadbutton:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }


    .data{
        width: 200px;
        float: left ;
    }

    .data1{
        width: 200px;
        margin-left: 400px;
        margin-top: -85px; 
    }
    #hora {
        width: 100px;
        margin-left: 220px;
        margin-top: 48px; 
    }

    #hora1 {
        width: 100px;
        margin-left: 620px;
        margin-top: -55px; 
    }
    
    .card-signin {
        border: 0;
        border-radius: 0rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1)
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem
    }

    .card-signin .card-body {
        padding: 2rem
    }

    .form-signin {
        width: 100%
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 0rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s
    }

    .form-control:focus {
        box-shadow: 10px 0px 0px 0px #ffffff !important
    }


    /* #link{
        margin-left: 180px;
        margin-top: -54px;
    } */
</style>

<script language='Javascript'>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //Janeiro é 0, então somamos + 1 para trabalhar com calendário conhecido
    var yyyy = today.getFullYear();
    // Data de hoje mais 5 dias
    dd = dd + 5;
    //se for maior que dia 30 vai para o proximo mês
    if (dd > 30) {
        dd = dd - 30;
        mm = mm + 1;
    }
    //se for maior que 12 vai para o proximo ano
    if (mm > 12) {
        mm = 1;
        yyyy = yyyy + 1;
    }
    // Se for menor que 10 formatamos com um zero na frente Ex: de 9 para 09
    if (dd < 10) {
        dd = '0' + dd;
    }
    // Se for menor que 10 formatamos com um zero na frente Ex: de 9 para 09
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementsByClassName("dtAgenda").setAttribute("min", today);
    today = dd + '/' + mm + '/' + yyyy;
    var div = document.getElementById("divDtFutura");
    div.innerText = today;
</script>

<main>
    <div class="container">
        <div class="message_box">
            <?php
            if (isset($success) && strlen($success)) {
                echo '<div class="success">';
                echo '<p>' . esc($success) . '</p>';
                echo '</div>';
            }

            if (isset($error) && strlen($error)) {
                echo '<div class="error">';
                echo '<p>' . esc($error) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <div >
            <div class=" mx-auto">
                <div class="card">
                    <div class="card-body">
                        <?php if (session('msg')) : ?>
                            <div class="alert alert-info alert-dismissible">
                                <?= session('msg') ?>
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        <?php endif ?>
                        <h2 class="card-title text-center">Cadastro de Evento </h2> <!-- utilizar a tabela eventos-->
                        <form class="form-signin" id="file" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="file"></label>
                                    <input class="form-control" onchange="readURL(this);" type="file" name="profile_image" id="file" accept="image/*" readonly="true" required autofocus>
                                    <img id="blah" alt="imagem" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título" maxlength="60" minilength="3" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <textarea name="resumo" id="resumo" class="form-control" minilength="100" maxlength="500" placeholder="Resumo" required autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 data" id="inicial">
                                <div class="form-label-group">
                                    <label for="">Inicial :</label>
                                    <input type="date" name="datainicial" id="dtAgenda" min="2017-04-01" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="time" name="hinicial" id="hora" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group col-sm-6 data1" id="final">
                                <div class="form-label-group">
                                    <label for="">Final:</label>
                                    <input type="date" name="datafinal" id="dtAgenda1" min="2017-04-01" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="time" name="hfinal" id="hora1" class="form-control" required />

                                </div>
                            </div>
                            <div class="form-group">
                                <?php if (isset($validation)) : ?>
                                    <div class="alert alert-danger" roles="alert">
                                        <?= $validation->listErrors(); ?>
                                    </div>
                                <?php endif; ?>


                                <button class="btn btn-primary  text-uppercase" name="file_upload" value="Upload File" id="uploadbutton" type="submit">Cadastrar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>