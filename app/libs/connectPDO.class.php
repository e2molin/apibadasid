<?php
class ConnectPDO
{
  private static $instancia;
  private $dbh;

  private function __construct()
  {
	try{
		$this->dbh = new PDO("pgsql:host=sbdignmad650;dbname=badasid;","consulta",".consulta");
		$this->dbh->exec("SET CHARACTER SET utf8");
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		
	}catch(PDOException $e){
		print "Error: ".$e->getMessage();
		die();
	}
  }


  
    public static function singleton()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }

   public function prepare($sql)
  {
	return $this->dbh->prepare($sql);

  }

  public function __clone()
  {
	trigger_error('La clonación no está permitida!',E_USER_ERROR);
  }

}
?>


 
