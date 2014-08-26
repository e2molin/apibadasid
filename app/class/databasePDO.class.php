<?php
class DatabasePDO extends PDO
{
 
    //nombre base de datos
    private $dbname = "badasid";
    //nombre servidor
    private $host = "sbdignmad650";
    //nombre usuarios base de datos
    private $user = "consulta";
    //password usuario
    private $pass = ".consulta";
    //puerto postgreSql
    private $port = 5432;
    private $DBconexion;
 
    //creamos la conexión a la base de datos prueba
    public function __construct()
    {
        try {
 
            $this->DBconexion = parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");
 
        } catch(PDOException $e) {
 
            echo  $e->getMessage();
 
        }
 
    }
 
    //función para cerrar una conexión pdo
    public function close_con()
    {
 
        $this->DBconexion = null;
 
    }
 
}