<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
h1, th{
    color: #007BFF;
    text-align: left;
    margin-top: 20px;
    font: caption;
}
.fa-bell{
    margin-left: 30px;
}


</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">
        <div class="row">
            <div class="col-12"> 
                <h1 style="text-align: center; font-size:30px">Atividades</h1>

                <table class="table table-hover" id="atividades">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Data</th> <!-- abrir um popup ou card  / BD dt inicio-->
                            <th scope="col" >Certificado</th> <!-- check box / BD tipo-->
                            <th scope="col" >Ação</th> <!-- check box / BD tipo-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $key => $evento){
                               echo '<tr><td>'. $evento['id'].'</td><td>'.$evento['titulo'].'</td><td>'.$evento['dtInicio'].'</td><td>'.$evento['tipo'].'</td>
                               <td><a class="btn btn-primary" href='.base_url('Atividade')."/".$evento['id'].' role="button">Ir </a></td></tr>';
                        } ?>
                    </tbody>
                </table>
            </div>    
        </div>    
    </div>
</main>
<script>
function funcao()
{
var x;
//recebemos o valor do botão pressionado ok ou cancelar em uma variavel
var r=confirm("Lembrar dessa atividade!");
if (r==true)
  {
  x="você pressionou OK!";
  }
else
  {
  x="Você pressionou Cancelar!";
  }
document.getElementById("demo").innerHTML=x;
}
</script> 

<script>
	function novoAlerta() {
		const txtDataEvento = document.querySelector('#dataEvento').value;
		const txtHoraEvento = document.querySelector('#horaEvento').value;
		const hoje = new Date();
		const dataEvento = Date.parse(txtDataEvento + ' ' + txtHoraEvento);
		const diff = parseInt(dataEvento - hoje.getTime());
		
		setTimeout(function() {
			alert('Hora do evento!');
		}, diff);
	}
</script>