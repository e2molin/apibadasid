<?php
	require_once 'app/libs/managerProvincias.php';
	$provincias = new Provincias();
//$blog = new blog();
//if (isset($_POST['grabar']) and $_POST['grabar']=='si')
//{
//    $blog->nueva_sesion();
//}else{
//}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registro de usuarios</title>
		
    </head>
    <body>
		Provincia 28<br/>
		<?php $provincias->getProvinciaByNombre("[aá]");?>
		<hr/>
		Provincia 28<br/>
		<?php $provincias->getProvinciaByINE(28);?>
		<hr/>
        Listado de provincias<br/>
		<?php $provincias->getAllProvincias();?>
		<hr/>

	</body>
</html>