<?php
/*
- Clase para obtener datos de provincias
*/
require_once 'datasetPDO.class.php';
class Municipios{	
	
	public function __construct()
    {
		//Función constructora de la clase
 
    }
	
	public function getAllMunicipios(){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataNormal("SELECT idmuni,nombremunicipio,to_char(codine, 'FM00009'::text)as codine,to_char(codgeo, 'FM00009'::text)as codgeo FROM municipiosactuales");
	
		if ($filas->rowCount() > 0) {
					while($fila = $filas->fetch())
					{
							echo $fila["idmuni"]." - ".$fila["nombremunicipio"]." # ".$fila["codine"]." # ".$fila["codgeo"]."<br/>";
					}
		}else{
					echo 'No existen datos';
		}

	}

	public function getMunicipioByINE($ine){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataNormal("SELECT idmuni,nombremunicipio,to_char(codine, 'FM00009'::text)as codine,to_char(codgeo, 'FM00009'::text)as codgeo FROM municipiosactuales WHERE codine=".$ine);
	
		if ($filas->rowCount() > 0) {
					while($fila = $filas->fetch())
					{
							echo $fila["idmuni"]." - ".$fila["nombremunicipio"]." # ".$fila["codine"]." # ".$fila["codgeo"]."<br/>";
					}
		}else{
					echo 'No existen datos';
		}

	}
	
	public function getMunicipioByNombre($nombre){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataNormal("SELECT idmuni,nombremunicipio,to_char(codine, 'FM00009'::text)as codine,to_char(codgeo, 'FM00009'::text)as codgeo FROM municipiosactuales WHERE nombremunicipio ilike '%".$nombre."%' order by idmuni");
	
		if ($filas->rowCount() > 0) {
					while($fila = $filas->fetch())
					{
							echo $fila["idmuni"]." - ".$fila["nombremunicipio"]." # ".$fila["codine"]." # ".$fila["codgeo"]."<br/>";
					}
		}else{
					echo 'No existen datos';
		}

	}

	public function getJSONAllMunicipios(){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataJSON("SELECT nombremunicipio,to_char(codine, 'FM00009'::text)as codine FROM municipiosactuales order by idmuni");
		echo $filas;

	}

	public function getJSONMunicipioByNombre($nombre){
	
		$dataset = new DatasetPDO();
		$filas = $dataset->getDataJSON("SELECT nombremunicipio,to_char(codine, 'FM00009'::text)as codine FROM municipiosactuales WHERE nombremunicipio ilike '%".$nombre."%' order by idmuni");
		echo $filas;

	}


	
}	
?>