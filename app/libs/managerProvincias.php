<?php
/*
- Clase para obtener datos de provincias
*/
require_once '../class/datasetPDO.class.php';
class Provincias{	
	
	public function __construct()
    {
		//Función constructora de la clase
 
    }
	
	public function getAllProvincias(){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataNormal("SELECT idprovincia,nombreprovincia,capitalprovincia FROM provincias");
	
		if ($filas->rowCount() > 0) {
					while($fila = $filas->fetch())
					{
							echo $fila["idprovincia"]." - ".$fila["nombreprovincia"]." # ".$fila["capitalprovincia"]."<br/>";
					}
		}else{
					echo 'No existen datos';
		}

	}

	public function getProvinciaByINE($ine){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataNormal("SELECT idprovincia,nombreprovincia,capitalprovincia FROM provincias WHERE idprovincia=".$ine);
	
		if ($filas->rowCount() > 0) {
					while($fila = $filas->fetch())
					{
							echo $fila["idprovincia"]." - ".$fila["nombreprovincia"]." # ".$fila["capitalprovincia"]."<br/>";
					}
		}else{
					echo 'No existen datos';
		}

	}
	
	public function getProvinciaByNombre($nombre){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataNormal("SELECT idprovincia,nombreprovincia,capitalprovincia FROM provincias WHERE nombreprovincia ilike '%".$nombre."%' order by idprovincia");
	
		if ($filas->rowCount() > 0) {
					while($fila = $filas->fetch())
					{
							echo $fila["idprovincia"]." - ".$fila["nombreprovincia"]." # ".$fila["capitalprovincia"]."<br/>";
					}
		}else{
					echo 'No existen datos';
		}

	}

	public function getJSONAllProvincias(){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataJSON("SELECT nombreprovincia as nameprovin FROM provincias order by idprovincia");
		echo $filas;

	}

	public function getJSONProvinciaByNombre($nombre){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataJSON("SELECT nombreprovincia as nameprovin FROM provincias WHERE nombreprovincia ilike '%".$nombre."%' order by idprovincia");
		echo $filas;

	}

}	
?>

