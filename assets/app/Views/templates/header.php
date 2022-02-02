<!doctype html>
<html lang="pt-Br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="theme-color" content="#0a346d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0a346d">
    <meta name="msapplication-navbutton-color" content="#0a346d">

    <!-- Bootstrap CSS -->

    <link rel="icon" href="<?= base_url() ?>/public/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

        .nav1 {
            margin-left: 50px;
            color: #fff;
        }

        #user {
            color: #B5B5B5;
            text-transform: uppercase;
        }

        #mostrar {
            display: none;
        }

        #passar_mouse:hover #mostrar {
            display: block;
        }

        a.disabled {
            pointer-events: none;
            cursor: default;
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
                    <ul class="navbar-nav mr-auto inicio">
                        <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                            <a class="nav-link" href="<?= base_url('eventos') ?>"><i class="fa fa-home"></i> Início</a>
                        </li>
                        <!-- <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/eventos/profile"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Conta</a>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item dropdown nav1 eventos">
                            <a class="nav-link" href="<?= base_url('eventos') ?>"></i>Eventos</a>
                            <!--DB eventos -->
                        </li>
                        <li class="nav-item dropdown nav1">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Listar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url('listarEventosUser') ?>">Eventos</a>
                                <!--DB eventos -->
                                <a class="dropdown-item" href="<?= base_url('listarAtividades') ?>">Atividades</a>
                                <!--DB atividade_evento -->
                            </div>
                        </li>
                        <?php
                        if (
                            isset($_SESSION['id']) &&
                            $_SESSION['type'] == 0
                        ) {
                        ?>
                            <li class="nav-item dropdown nav1">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastrar
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url('cadastrarEventos') ?>">Eventos</a>
                                    <!--DB eventos -->
                                    <a class="dropdown-item" href="<?= base_url('cadastrarAtividades') ?>">Atividades</a>
                                    <!--DB atividade_evento -->
                                    <a class="dropdown-item" href="<?= base_url('cadastrarUser') ?>">Usuários</a>
                                    <!--DB users -->
                                </div>
                            </li>
                            <li class="nav-item dropdown nav1">
                                <a onclick="funcao1()" class=" nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Alterações
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= base_url('alterarEventos') ?>">Eventos</a>
                                    <!--DB eventos -->
                                    <a class="dropdown-item" href="<?= base_url('alterarAtividades') ?>">Atividades</a>
                                    <!--DB atividade_evento -->
                                    <a class="dropdown-item" href="<?= base_url('alterarUser') ?>">Usuários</a>
                                    <!--DB users -->
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0" id="user">
                        <li class="nav-item dropdown nav1">
                            <a class="nav-link dropdown-toggle fa fa-sign-out" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php

                                echo $_SESSION['firstname'];
                                // echo session_start(['firstname']);

                                ?>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo base_url('editarUser') . '/' . $_SESSION['id'] ?>">Editar</a>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">Sair</a>
                            </div>
                    </ul>
                </div>
            </div>
        </nav>

    <?php
    endif;
    ?>
    <!-- <script>
        let mensagem = document.querySelector(".mensagem") ;

// mostra a mensagem
function showMessage(){   
   mensagem.style.display = "block";   
 }
// esconde a mensagem
function hideMessage(){
  mensagem.style.display = "none"; 
}

    </script> -->
    <!-- <script>
function funcao1()
{
alert("Você não tem permissão!");
}
</script> -->