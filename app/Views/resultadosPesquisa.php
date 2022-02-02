<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container">
    <h1 style="text-align: center;">AVALIAÇÃO DE EVENTOS TÉCNICOS</h1>
    <h2>Campos não obrigatórios:</h2>
    <div id="Gênero"></div>
    <hr>
    <div id="60anos"></div>
    <hr>
    <div id="especiais"></div>
    <hr>
    <div id="crfsp"></div>
    <hr>
    <hr>
    <h2>Avaliação:</h2>
    <div id="participacao"></div>
    <hr>
    <h3>Ministrante/palestrante:</h3>
    <div id="conduta"></div>
    <hr>
    <div id="abordagem"></div>
    <hr>
    <div id="conhecimento"></div>
    <hr>
    <div id="experiencia"></div>
    <hr>
    <h3>Ministrante/palestrante:</h3>
    <div id="conteudo"></div>
    <hr>
    <div id="apresentacao"></div>
    <hr>
    <div id="objetividade"></div>
    <hr>

</div>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(Gênero);

    function Gênero() {

        var Gênero = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['masculino', <?php echo $resultado['masculino']; ?>],
            ['feminino', <?php echo $resultado['feminino']; ?>],
            ['mulherTransexual', <?php echo $resultado['mulherTransexual']; ?>],
            ['travesti', <?php echo $resultado['travesti']; ?>],
            ['homemTransexual', <?php echo $resultado['homemTransexual']; ?>],
            ['naoBinario', <?php echo $resultado['naoBinario']; ?>],
            ['outro', <?php echo $resultado['outro']; ?>],


        ]);

        var options = {
            title: 'Gênero'
        };

        var chart = new google.visualization.PieChart(document.getElementById('Gênero'));

        chart.draw(Gênero, options);
    }


    google.charts.setOnLoadCallback(anos);

    function anos() {

        var anos = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['sim', <?php echo $resultado['sim']; ?>],
            ['não', <?php echo $resultado['nao']; ?>],
            ['não marcou nada', <?php echo $resultado['nenhum']; ?>],

        ]);

        var options = {
            title: 'Maior de 60 anos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('60anos'));

        chart.draw(anos, options);
    }

    google.charts.setOnLoadCallback(especiais);

    function especiais() {

        var especiais = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['sim', <?php echo $resultado['sim']; ?>],
            ['não', <?php echo $resultado['nao']; ?>],
            ['não marcou nada', <?php echo $resultado['nenhum']; ?>],

        ]);

        var options = {
            title: 'Portador de necessidades especiais'
        };

        var chart = new google.visualization.PieChart(document.getElementById('especiais'));

        chart.draw(especiais, options);
    }

    google.charts.setOnLoadCallback(crfsp);

    function crfsp() {

        var crfsp = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['sim', <?php echo $resultado['sim']; ?>],
            ['não', <?php echo $resultado['nao']; ?>],
            ['não marcou nada', <?php echo $resultado['nenhum']; ?>],

        ]);

        var options = {
            title: 'Você é inscrito no CRF-SP'
        };

        var chart = new google.visualization.PieChart(document.getElementById('crfsp'));

        chart.draw(crfsp, options);
    }

    google.charts.setOnLoadCallback(participacao);

    function participacao() {

        var participacao = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['presencial', <?php echo $resultado['presencial']; ?>],
            ['online', <?php echo $resultado['online']; ?>],

        ]);

        var options = {
            title: 'Qual a sua forma de participação?'
        };

        var chart = new google.visualization.PieChart(document.getElementById('participacao'));

        chart.draw(participacao, options);
    }

    google.charts.setOnLoadCallback(conduta);

    function conduta() {

        var conduta = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
            ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
            ['Neutro', <?php echo $resultado['neutro']; ?>],
            ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
            ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
            ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

        ]);

        var options = {
            title: 'Conduta'
        };

        var chart = new google.visualization.PieChart(document.getElementById('conduta'));

        chart.draw(conduta, options);
    }


    google.charts.setOnLoadCallback(abordagem);

    function abordagem() {

        var abordagem = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
            ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
            ['Neutro', <?php echo $resultado['neutro']; ?>],
            ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
            ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
            ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

        ]);

        var options = {
            title: 'Abordagem'
        };

        var chart = new google.visualization.PieChart(document.getElementById('abordagem'));

        chart.draw(abordagem, options);
    }


    google.charts.setOnLoadCallback(conhecimento);

    function conhecimento() {

        var conhecimento = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
            ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
            ['Neutro', <?php echo $resultado['neutro']; ?>],
            ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
            ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
            ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

        ]);

        var options = {
            title: 'Conhecimento teórico'
        };

        var chart = new google.visualization.PieChart(document.getElementById('conhecimento'));

        chart.draw(conhecimento, options);
    }


    google.charts.setOnLoadCallback(experiencia);

function experiencia() {

    var experiencia = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
        ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
        ['Neutro', <?php echo $resultado['neutro']; ?>],
        ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
        ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
        ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

    ]);

    var options = {
        title: 'Experiência prática'
    };

    var chart = new google.visualization.PieChart(document.getElementById('experiencia'));

    chart.draw(experiencia, options);
}


google.charts.setOnLoadCallback(conteudo);

function conteudo() {

    var conteudo = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
        ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
        ['Neutro', <?php echo $resultado['neutro']; ?>],
        ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
        ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
        ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

    ]);

    var options = {
        title: 'Conteúdo técnico'
    };

    var chart = new google.visualization.PieChart(document.getElementById('conteudo'));

    chart.draw(conteudo, options);
}


google.charts.setOnLoadCallback(apresentacao);

function apresentacao() {

    var apresentacao = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
        ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
        ['Neutro', <?php echo $resultado['neutro']; ?>],
        ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
        ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
        ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

    ]);

    var options = {
        title: 'Forma de apresentação'
    };

    var chart = new google.visualization.PieChart(document.getElementById('apresentacao'));

    chart.draw(apresentacao, options);
}


google.charts.setOnLoadCallback(objetividade);

function objetividade() {

    var objetividade = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Muito satisfeito', <?php echo $resultado['muitoSatisfeito']; ?>],
        ['Satisfeito', <?php echo $resultado['satisfeito']; ?>],
        ['Neutro', <?php echo $resultado['neutro']; ?>],
        ['Insatisfeito', <?php echo $resultado['insatisfeito']; ?>],
        ['Muito insatisfeito', <?php echo $resultado['muitoInsatisfeito']; ?>],
        ['Não Avaliar', <?php echo $resultado['naoAvaliar']; ?>],

    ]);

    var options = {
        title: 'Objetividade'
    };

    var chart = new google.visualization.PieChart(document.getElementById('objetividade'));

    chart.draw(objetividade, options);
}
</script>
<?= $this->endSection() ?>