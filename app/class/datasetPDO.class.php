<?php
require_once("databasePDO.class.php");
class DatasetPDO
{
 
    private $con;
    public function __construct()
    {
        
        //en $this->con tenemos la conexión con la bd pruebas
        $this->con = new DatabasePDO();
 
    }
	
	
	public function getDataNormal($querySQL){
	
        try{
            
            $query = $this->con->prepare($querySQL);
            $query->execute();
			$this->con->close_con();
			return $query;
        
        } catch(PDOException $e) {
 
            echo  $e->getMessage();
 
        }

	}

	public function getDataJSON($querySQL){
	
        try{
            
            $query = $this->con->prepare($querySQL);
            $query->execute();
			$results=$query->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			$this->con->close_con();
			return $json;
        
        } catch(PDOException $e) {
 
            echo  $e->getMessage();
 
        }

	}	
	
	   
    //creamos una tabla con postgreSql
    public function create_table()
    {
        
        try{
            //SERIAL equivale a auto_increment en mysql
			/*
            $query = $this->con->prepare('CREATE TABLE IF NOT EXISTS users(
                                            id SERIAL,
                                            nombre varchar(100),
                                            apellidos varchar(100),
                                            fecha_registro date,
                                            primary key(id)
                                         );');
            
            $query->execute();
            //cerramos la conexión con la bd
            $this->con->close_con();
			*/
        } catch(PDOException $e) {
 
            echo  $e->getMessage();
 
        }
    }
    
    //insertamos usuarios en una tabla con postgreSql
    public function inserta_data($nombre,$apellidos,$fecha_registro)
    {
        
        try{
            /*
            $query = $this->con->prepare('INSERT INTO users (nombre,apellidos,fecha_registro) values (?,?,?)');
            $query->bindParam(1,$nombre);
            $query->bindParam(2,$apellidos);
            $query->bindParam(3,$fecha_registro);
            $query->execute();
            $this->con->close_con();
        */
        } catch(PDOException $e) {
 
            echo  $e->getMessage();
 
        }
    }
 
 
}