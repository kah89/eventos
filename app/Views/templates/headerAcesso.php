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
</head>
