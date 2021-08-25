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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <title><?php echo $title ?></title>
    <style>
        header {
            background-color: #fff;
            max-height: 100px;
        }

        .bg-custom {
            background-image: linear-gradient(15deg, #092e48 0%, #00557a 100%);
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


        @media only screen and (max-width: 990px) {
            .logo-img {
                width: 80%;
                margin-top: -70px;
            }
        }

        #anchorpt1 {
            margin-left: 800px;
            margin-top: 20px;
        }

        .anchor {
            margin-left: 20px;
        }

        .logo-img {
            width: 80%;
            margin-top: -70px;
        }
    </style>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ST5941BK0S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ST5941BK0S');

        function abrirConteudo() {

            var urlAtual = document.location.href;
            if (urlAtual.includes("#")) {
                urlAtual = urlAtual.substr(0, urlAtual.indexOf('#')) + "#t3-content";
            } else {
                urlAtual = urlAtual + "#t3-content";
            }

            window.location.replace(urlAtual);

        }


        function abrirMenu() {

            var urlAtual = document.location.href;
            if (urlAtual.includes("#")) {
                urlAtual = urlAtual.substr(0, urlAtual.indexOf('#')) + "#menuanchor";
            } else {
                urlAtual = urlAtual + "#menuanchor";
            }

            window.location.replace(urlAtual);

        }


        function abrirRodape() {

            var urlAtual = document.location.href;
            if (urlAtual.includes("#")) {
                urlAtual = urlAtual.substr(0, urlAtual.indexOf('#')) + "#rodape";
            } else {
                urlAtual = urlAtual + "#rodape";
            }

            window.location.replace(urlAtual);

        }


        function contraste() {
            var body = document.getElementsByTagName('body');
            if (body[0].style.backgroundColor == "black") {
                window.location.reload(true);
            } else {

                for (var i = 0; i < body.length; i++) {
                    body[i].style.backgroundColor = "black";
                }

                var divs = document.getElementsByTagName('div');
                for (var i = 0; i < divs.length; i++) {
                    divs[i].style.backgroundColor = "black";
                    divs[i].style.color = "yellow";
                }
                var navs = document.getElementsByTagName('nav');
                for (var i = 0; i < navs.length; i++) {
                    navs[i].style.backgroundColor = "black";
                    navs[i].style.color = "yellow";
                }
                var header = document.getElementsByTagName('header');
                for (var i = 0; i < header.length; i++) {
                    header[i].style.backgroundColor = "black";
                    header[i].style.color = "yellow";
                }
                var footer = document.getElementsByTagName('footer');
                for (var i = 0; i < footer.length; i++) {
                    footer[i].style.backgroundColor = "black";
                    footer[i].style.color = "yellow";
                }

                var as = document.getElementsByTagName('a');
                for (var i = 0; i < as.length; i++) {
                    as[i].style.backgroundColor = "black";
                    as[i].style.color = "yellow";
                }
                var ps = document.getElementsByTagName('p');
                for (var i = 0; i < ps.length; i++) {
                    ps[i].style.backgroundColor = "black";
                    ps[i].style.color = "yellow";
                }
                var ps = document.getElementsByTagName('h1');
                for (var i = 0; i < ps.length; i++) {
                    ps[i].style.backgroundColor = "black";
                    ps[i].style.color = "yellow";
                }
                var is = document.getElementsByTagName('i');
                for (var i = 0; i < is.length; i++) {
                    is[i].style.color = "yellow";
                }
                var spans = document.getElementsByTagName('span');
                for (var i = 0; i < spans.length; i++) {
                    spans[i].style.backgroundColor = "black";
                    spans[i].style.color = "yellow";
                }
                var iframes = document.getElementsByTagName('iframe');
                for (var i = 0; i < iframes.length; i++) {
                    iframes[i].style.backgroundColor = "white";
                    iframes[i].style.color = "yellow";
                }
                var tables = document.getElementsByTagName('table');
                for (var i = 0; i < tables.length; i++) {
                    tables[i].style.backgroundColor = "black";
                    tables[i].style.color = "yellow";
                }
                var tbodys = document.getElementsByTagName('tbody');
                for (var i = 0; i < tbodys.length; i++) {
                    tbodys[i].style.backgroundColor = "black";
                    tbodys[i].style.color = "yellow";
                }
                var trs = document.getElementsByTagName('tr');
                for (var i = 0; i < trs.length; i++) {
                    trs[i].style.backgroundColor = "black";
                    trs[i].style.color = "yellow";
                }
                var tds = document.getElementsByTagName('td');
                for (var i = 0; i < tds.length; i++) {
                    tds[i].style.backgroundColor = "black";
                    tds[i].style.color = "yellow";
                }
                var button = document.getElementsByClassName('socialList_item');
                for (var i = 0; i < button.length; i++) {
                    button[i].style.backgroundColor = "black";
                    button[i].style.color = "yellow";
                }
            }
        }
    </script>
</head>


<header id="t3-header">
    <div class="row">
        <div class="col-12">
            <div class="site-anchor " style="margin-top: -5px;margin-bottom: 5px;">
                <div class="custom">
                    <div class="row">
                        <div id="anchorpt1" class="col-12 col-md-6">
                            <a accesskey="1" href="javascript:void(0);" class="anchor acess" title="conteudo" onclick="abrirConteudo()">
                                ir para conteudo <span>1</span>
                            </a>
                            <a accesskey="2" href="javascript:void(0);" class="anchor acess" title="menu" onclick="abrirMenu()">
                                ir para menu <span>2</span>
                            </a>
                            <a accesskey="3" href="javascript:void(0);" class="anchor acess" title="rodapé" onclick="abrirRodape()">
                                ir para rodapé <span>3</span>
                            </a>
                            <a accesskey="4" href="javascript:void(0);" class="anchor acess" title="contraste" onclick="contraste();" id="contrasteLink">
                                alto contraste <span>4</span>
                            </a>
                            <a accesskey="5" href="<?= base_url('acessibilidade'); ?>" class="anchor acess " title="acessibilidade">
                                acessibilidade <span>5</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-sm-3 logo">
            <div class="logo-image">
                <a href="<?= base_url('inicio'); ?>"title="CRF-SP - Conselho Regional de Farmácia do Estado de São Paulo">
                    <img class="logo-img" src="<?= base_url('public/img/logo.png'); ?>"  alt="CRF-SP - Conselho Regional de Farmácia do Estado de São Paulo" />
                </a>
            </div>
        </div>
        <div class="col-9 col-sm-9 header-utils">
            <div class="social-icons ">
                <div vw class="enabled">
                    <div vw-access-button class="active"></div>
                    <div vw-plugin-wrapper>
                        <div class="vw-plugin-top-wrapper"></div>
                    </div>
                </div>
                <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
                <script>
                    new window.VLibras.Widget('https://vlibras.gov.br/app');
                </script>
            </div>
        </div>
    </div>
</header>

<body class="d-flex flex-column min-vh-100">
    <?php $uri = service('uri'); ?>
    <?php if (session()->get('isLoggedIn')) : ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-info bg-custom" role="navigation">
            <div class="container" id="menuanchor">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">


                    <?php
                    if (
                        isset($_SESSION['id']) &&
                        $_SESSION['type'] == 0
                    ) {
                    ?><ul class="navbar-nav mr-auto" id="inicio">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('inicio'); ?>">Inicio</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto menu ">
                            <li class="nav-item dropdown ">
                                <a class="nav-link evento" href="<?= base_url('alterarEventos') ?>">Eventos</a>
                            </li>
                            <li class="nav-item dropdown nav2 ">
                                <a class="nav-link" href="<?= base_url('alterarAtividades') ?>">Atividades</a>
                            </li>
                            <li class="nav-item dropdown  ">
                                <a class="nav-link user" href="<?= base_url('alterarUser') ?>">Usuários</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav mr-auto  session">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle fa fa-sign-out" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    echo $_SESSION['firstname'];
                                    ?>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url('editarUser') . '/' . $_SESSION['id'] ?>">Editar</a>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">Sair</a>
                                </div>
                        </ul>
                    <?php
                    } else {
                    ?>
                        <ul class="navbar-nav mr-auto" id="inicio">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('inicio'); ?>">Inicio</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto menu">
                            <li class="nav-item dropdown ">
                                <!-- <a class="nav-link" href="<?= base_url('inscrevase') ?>">Inscreva-se</a> -->
                            </li>
                            <li class="nav-item dropdown nav2 ">
                                <a class="nav-link" href="<?= base_url('listarEventosUser') ?>">Minhas inscrições</a>
                            </li>
                            <!-- <li class="nav-item dropdown  ">
                                <a class="nav-link" href="<?= base_url('listarAtividades') ?>">Atividades</a>
                            </li> -->
                        </ul>

                        <ul class="navbar-nav mr-auto session">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle fa fa-sign-out" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    echo $_SESSION['firstname'];
                                    ?>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo base_url('editarUser') . '/' . $_SESSION['id'] ?>">Editar</a>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">Sair</a>
                                </div>
                        </ul>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </nav>

    <?php
    endif;
    ?>