<html>

<head>
    <title>Certificado</title>
    <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400|Oxygen:400,700" rel="stylesheet">


    <style>
        body {
            background-color: #fff;
            -webkit-print-color-adjust: exact;
            /* print-color-adjust: exact; */
        }

        p,
        span,
        ul,
        li,
        a,
        label,
        div,
        section,
        article {
            font-family: 'Oxygen', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Roboto', sans-serif;
        }

        #conteudo-certificado {
            width: 1055px;
            height: 670px;
            overflow: hidden;
            position: relative;
        }

        #conteudo-certificado>img {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 10;
            width: 100%;
        }

        #conteudo-certificado>section {
            position: absolute;
            top: 240px;
            left: 50px;
            right: 50px;
            z-index: 100;
        }

        #conteudo-certificado>section>p {
            font-size: 26px;
            font-style: italic;
            margin-bottom: 25px;
        }

        #conteudo-certificado>section>p.data {
            font-size: 24px;
            font-style: italic;
            text-align: right;
            padding-top: 30px;
            padding-right: 240px;
        }

        @media print {

            * {
                -webkit-print-color-adjust: exact;
            }

            body {
                background-color: #FFF;
            }
        }

        article{
            background-image: url(./public/img/certificadoProibido.jpg);
        }
        
    </style>
</head>

<body>
    <article id="conteudo-certificado" >
        <section>          
            <p>Certificamos que <strong><?php echo $_SESSION['firstname']." "; ?><?php echo $_SESSION['lastname']; ?></strong></p>
            <p>Participou do: "<strong> </strong>"</p>
            <p>Com carga horária de <strong>8 horas.</strong></p>
            <p class="data">Realizado nos dias 30 e 31 de março de 2021 em São Paulo - SP.</p>
     
        </section>
    </article>
</body>

</html>