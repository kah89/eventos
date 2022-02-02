<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Login!</title>
    <style>
        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem
        }

        body {
            background: linear-gradient(to right, #0a346d, #1598ef)
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

        .form-label-group {
            position: relative;
            margin-bottom: 1rem
        }

        .form-label-group input {
            height: auto
        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x)
        }

        .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out
        }

        .form-control:focus {
            box-shadow: 10px 0px 0px 0px #ffffff !important
        }

        .btn-google {
            color: white;
            background-color: #ea4335
        }

        .btn-facebook {
            color: white;
            background-color: #3b5998
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Entrar</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                                <!-- <label for="inputEmail">Email</label> -->
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                                <!-- <label for="inputPassword">Senha</label> -->
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                            <hr class="my-4">
                            <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit">
                                <i class="fa fa-google" aria-hidden="true"></i> Entrar com o Google
                            </button> -->
                            <?php if (isset($fb_login_url)) : ?>
                                <a class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit" href='<?= $fb_login_url; ?>'>
                                    <i class="fa fa-facebook" aria-hidden="true"></i> Entrar com o Facebook
                                </a>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="mx-auto">
                        Não tem uma conta? <a href="#">Registre-se</a>
                        <br /><br />
                    </div>
                </div>
            </div>


            <?php if (session()->has('userdata')) :
                $uinfo = session()->get('userdata');
            ?>
                <div class="card">
                    <img src='<?= $uinfo['profile_pic']; ?>' height="100" width="100">
                    <p>ID:<?= $uinfo['userid']; ?></p>

                    <p>Bem vindo <?= $uinfo['user_name']; ?></p>
                    <p><?= $uinfo['email']; ?></p>
                    <a href='<?= base_url(); ?>/login/logout'>Logout</a>
                </div>
            <?php
            endif;
            ?>


        </div>
    </div>
    <!-- <div class="container">
        <div class="row">

            <div class="col align-self-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>                            
                            <button type="submit" class="btn btn-primary float-right">Entrar</button>
                        </form>
                        <br><br><br>
                        <?php if (isset($fb_login_url)) : ?>
                            <a class="btn btn-primary" href='<?= $fb_login_url; ?>'><i class="fa fa-facebook" aria-hidden="true"></i> Entrar com Facebook</a>
                        <?php endif; ?>
                        
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

                <?php if (isset($fb_login_url)) : ?>
                <div class="card">
                    <h1><a href='<?= $fb_login_url; ?>'>Login com Facebook</a></h1>
                    <?php else :
                    if (session()->has('userdata')) :
                        $uinfo = session()->get('userdata');
                    ?>
                        <img src='<?= $uinfo['profile_pic']; ?>' height="100" width="100">
                        <p>ID:<?= $uinfo['userid']; ?></p>

                        <p>Bem vindo <?= $uinfo['user_name']; ?></p>
                        <p><?= $uinfo['email']; ?></p>
                        <a href='<?= base_url(); ?>/login/logout'>Logout</a>
                    <?php
                    endif;
                    ?>
                    </div>
                <?php
                endif;
                ?>
            </div>

        </div>
    </div> -->



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>