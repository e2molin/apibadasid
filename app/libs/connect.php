<?php
if(!defined("SPECIALCONSTANT")) die("Acceso denegado");

function getConnection(){
	
	try{
		$db_username="badasid";
		$db_password="sidbada";
		$connection=new PDO("pgsql:host=localhost;dbname=badasid;",$db_username,$db_password);
		$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//$connection->query('SET NAMES utf8'); 
		//$connection->query('SET CHARACTER SET utf8'); 
		//$connection -> exec("set names utf8");
		//$connection -> exec("SET CLIENT_ENCODING TO 'UTF8'");
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
	
	return $connection;

}

/*
require_once '../class/datasetPDO.class.php';
function getConnection(){
	$connection = new DatabasePDO();
	return $connection; 
 }
*/

?>