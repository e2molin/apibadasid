<?php
require_once("../libs/connectPDO.class.php");

class Provincias
{
  public function __contruct(){
	$this->dbh = Connect::singleton();

	
  }

  /*
  ** @desc: Obtiene todas las provincias
  */
  public function getAllProvs(){
	try{
	  $query = $this->dbh->prepare("SELECT * FROM PROVINCIAS");
	  $query->execute();
	  if($query->rowCount() > 0)
	  {
		return $query->fetchAll();
	  }
	  $this->dbh=null;
	}catch (PDOException $e){
	  echo $e->getMessage();
	}
  }

  /*
  ** @desc: Obtiene la provincia cuyo código INE pedimos
  ** $id: parámetro con el código INE de la provincia
  */
  public function getProvById($id){
	try{
	  $query= $this->dbh->prepare(
		'SELECT * FROM PROVINCIAS WHERE idprovincia=?'
	  );
	  $query->bindParam(1,$id,PDO::PARAM_INT);
	  $query->execute();
	  if($query->rowCount() === 1)
	  {
		return $query->fetchAll();
	  }
	  $this->dbh=null;
	}catch (PDOException $e){
	  echo $e->getMessage();
	}
  }

  
  
}


?>