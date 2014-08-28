<?php
require_once("provincias.php");
$provincia=new Provincias();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Prueba de conexión a Database con PDO en clases</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="text-center text-muted">Lista de Provincias</h1><hr/>
			<?php
			//Operador ternario
			foreach(isset($_GET["id"]) ? $provincia->getProvById($_GET["id"]) : $provincia->getAllProvs() as $provincia)
			{
			?>
				<div class="col-md-6 col-md-offset-3">
					<h1 class="text-muted"><?php echo $provincia["nombreprovincia"]?><h1>
				<div>
			
			<?php
			}
			?>
		</div>
	</div>
	
</body>
</html>
