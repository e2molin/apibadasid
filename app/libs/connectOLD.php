<?php

if(!defined("SPECIALCONSTANT")) die("Acceso denegado");

function getConnection(){
	
	try{
		$db_username="consulta";
		$db_password=".consulta";
		$connection=new PDO("pgsql:host=sbdignmad650;dbname=badasid;",$db_username,$db_password);
		$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $connection; 

	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
	
	return $connection;

}
?>