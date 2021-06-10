<!doctype html>
<html lang="pt-Br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="theme-color" content="#0a346d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0a346d">
    <meta name="msapplication-navbutton-color" content="#0a346d">
    <link rel="icon" href="<?= base_url() ?>/public/favicon.ico" type="image/ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <title><?php echo $title ?></title>
    <style>
        .bg-custom {
            background-image: linear-gradient(15deg, #0a346d 0%, #1598ef 100%);
        }

        body {
            min-height: 100vh;
            position: relative;
            margin: 0;
            padding-bottom: 100px;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        footer {
            position: absolute;
            bottom: 0;
            height: 100px;
        }

        main {
            padding: 45px 0;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #0a346d;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #1598ef;
        }
        .nav1{
            margin-left: 50px;
            color: #fff;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ST5941BK0S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ST5941BK0S');
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php $uri = service('uri'); ?>
    <?php if (session()->get('isLoggedIn')) : ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info bg-custom" role="navigation">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                            <a class="nav-link" href="dashboard"><i class="fa fa-home"></i> Início</a>
                        </li>
                        <!-- <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/eventos/profile"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Conta</a>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item dropdown nav1">
                            <a class="nav-link" href="<?= base_url('eventos') ?>"></i>Eventos</a> <!--DB eventos -->
                        </li>
                    <li class="nav-item dropdown nav1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Listar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('listareventos') ?>">Eventos</a><!--DB eventos -->
                        <a class="dropdown-item" href="<?= base_url('listarativ') ?>">Atividades</a><!--DB atividade_evento -->
                        </div>
                    </li>
                    <li class="nav-item dropdown nav1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastrar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('cadevento') ?>">Eventos</a><!--DB eventos -->
                        <a class="dropdown-item" href="<?= base_url('cadativ') ?>">Atividades</a><!--DB atividade_evento -->
                        <a class="dropdown-item" href="<?= base_url('caduser') ?>">Usuários</a><!--DB users -->
                        </div>
                    </li>
                    <li class="nav-item dropdown nav1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Alterações
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('excluirevent') ?>">Eventos</a><!--DB eventos -->
                        <a class="dropdown-item" href="<?= base_url('excluirativ') ?>">Atividades</a><!--DB atividade_evento -->
                        <a class="dropdown-item" href="<?= base_url('excluiruser') ?>">Usuários</a><!--DB users -->
                        </div>
                        
                    </li>
                    <!-- <li class="nav-item dropdown nav1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Editar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('editaruser') ?>">Usuário</a> <!--DB users -->
                        <!-- <a class="dropdown-item" href="<?= base_url('editareventos') ?>">Eventos</a> <!--DB eventos -->
                        <!-- <a class="dropdown-item" href="<?= base_url('editarativ') ?>">Atividades</a>DB atividade_evento -->
                        <!-- </div> -->
                    <!-- </li>  -->
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
    endif;
    ?>