<?php
//require_once '../class/datasetPDO.class.php';

if(!defined("SPECIALCONSTANT")) die("Acceso denegado");


//Con use($app) tenemos acceso a este objeto desde dentro de la función
$app->get("/provincias/",function() use($app){

	try{
		$connection=getConnection();
		$dbh=$connection->prepare("SELECT nombreprovincia from provincias");
		$dbh->execute();
		$provins=$dbh->fetchAll();
		$connection=null;
		
		$app->response->headers->set("Content-type","application/json;charset=utf-8");
		$app->response->status(200);
		$app->response->body(json_encode($provins));
		
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}


});

$app->get("/countries/",function() use($app){

	try{
		$connection=getConnection();
		$dbh=$connection->prepare("SELECT nombreprovincia as name ,idprovincia as population  from provincias");
		$dbh->execute();
		$countries=$dbh->fetchAll();
		$connection=null;
		
		$app->response->headers->set("Content-type","application/json;charset=utf-8");
		$app->response->status(200);
		$app->response->body(json_encode($countries));
		
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}


});


$app->get("/provincia/:id",function($id) use($app){

	try{
		$connection = new DatabasePDO();
		$dbh=$connection->prepare("SELECT * from provincias where idprovincia=?");
		$dbh->bindParam(1,$id);
		$dbh->execute();
		$provin=$dbh->fetchObject();
		$connection=null;
		
		$app->response->headers->set("Content-type","application/json");
		$app->response->status(200);
		$app->response->body(json_encode($provin));
		
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}


});

/*
$app->post("/books/",function() use($app){

	$provincia=$app->request->post("provincia");
	$codine=$app->request->post("codine");
	$capital=$app->request->post("capital");
	
	try{
		$connection = new DatabasePDO();
		$dbh=$connection->prepare("INSERT INTO provincias VALUES(null,?,?,?,NOW()");
		$dbh->bindParam(1,$provincia);
		$dbh->bindParam(2,$codine);
		$dbh->bindParam(3,$capital);
		$dbh->execute();
		$bookId=$connection->lastInsertId();
		$connection=null;
		$app->response->headers->set("Content-type","application/json");
		$app->response->status(200);
		$app->response->body(json_encode($books));
		
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
});

*/
/*
$app->put("/books/",function() use($app){

	$provincia=$app->request->put("provincia");
	$codine=$app->request->put("codine");
	$capital=$app->request->put("capital");
	$idprovincia=$app->request->put("idprovincia");
	
	try{
		$connection = new DatabasePDO();
		$dbh=$connection->prepare("UPDATE provincias SET nombre=?,codine=?,capital=? WHERE idprovincia=?");
		$dbh->bindParam(1,$provincia);
		$dbh->bindParam(2,$codine);
		$dbh->bindParam(3,$capital);
		$dbh->bindParam(4,$idprovincia);
		$dbh->execute();
		$connection=null;
		$app->response->headers->set("Content-type","application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("res"->1)));
		
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}

});


$app->delete("/book/:id",function($id) use($app){

	try{
		$connection=getConnection();
		$dbh=$connection->prepare("DELETE FROM provincias WHERE idprovincia=?");
		$dbh->bindParam(1,$id);
		$dbh->execute();
		$connection=null;
		$app->response->headers->set("Content-type","application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("res"->1)));
		
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}

});
*/



?>