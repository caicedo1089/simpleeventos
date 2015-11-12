<?php 
	date_default_timezone_set('America/Caracas');
	
	//Desplegamos los eventos
	$eventos = array();
	$hoy = new DateTime("now");
	
	$fp = fopen("eventos.txt", "r");
	while(!feof($fp)) {
		$linea = fgets($fp);
		$elevento = explode("###", $linea);
		$fecha = new DateTime($elevento[0]);
		$contenido = $elevento[1];
		$eventos[] = array( (int)(date_diff($hoy, $fecha)->format('%R%a')), $contenido);
	}
	fclose($fp);
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Desplegando Eventos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="row">
	<div class="col-sm-12">
		  <div class="col-sm-12">
			<h4 id="titulo_noticias"><strong>Desplegando Eventos</strong></h4>
		  </div>	
		  <div id="wrap_noticias_parroquiales" class="col-sm-12">
			<table id="noticias_parroquiales" class="table-striped">
				<?php 
					foreach($eventos as $evento){
						if($evento[0] >= 0)
							echo '<tr><td>',$evento[1],'</td></tr>';
					}
				?>
			</table>										
		  </div>
	</div>
</div>

</body>
</html>