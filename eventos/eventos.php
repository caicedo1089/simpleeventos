<?php

$status = "No se ha subido ningún archivo";
//echo var_dump($_POST);
if ($_POST["action"] == "upload" && $_POST["token"] == "eirkdfmkfndfnv") {
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];

    if ($archivo != "" && $tipo == "text/plain" && $archivo == "eventos.txt") {
        //guardamos el archivo a la carpeta files
        $destino = $archivo;
        if (copy($_FILES['archivo']['tmp_name'],'../'.$destino)) {
            $status = "Archivo subido <b>".$archivo."</b> subido con ÉXITO";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }
}

?>
<html>
<head>
	<title>Subiendo Eventos Rosario</title>
</head>
<body>
<h1>Subiendo Eventos Rosario</h1>

<div>
	<h3>Estatus: <?=$status?></h3>
</div>

<div>
<h3>Formulario para subir Eventos</h3>

<form action="eventos.php" method="post" enctype="multipart/form-data">
	<p>
		<label for="archivo">Seleccione el archivo:</label>
		<input name="archivo" type="file" size="35" />
	</p>
	<p>
		<label for="token">Token de Seguridad</label>
		<input name="token" type="text" size="14" />
	</p>
	<input name="action" type="hidden" value="upload" />
	<input name="enviar" type="submit" value="Subir Archivo de Eventos" />  
</form>
</div>

</body>