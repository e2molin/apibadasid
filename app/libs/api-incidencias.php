<?php
require_once("connectPDO.class.php");

class Incidencias
{
	public function __construct()
	{
		$this->dbh = ConnectPDO::singleton();
	}

	/**
	* @desc - obtiene todos los resultados
	*/
	public function getAllIncidencias()
	{
		try
		{
			$query = $this->dbh->prepare("SELECT * FROM incidencias order by idincidencia");

			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query->fetchAll();
			}
			$this->dbh = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	/**
	* @desc - obtiene un artículo y sus uploads
	*/
	public function incidenciaById($id)
	{
		try
		{
			$query = $this->dbh->prepare("SELECT * FROM incidencias WHERE idincidencia=?");
			$query->bindParam(1, $id, PDO::PARAM_INT);
			$query->execute();
			if($query->rowCount() === 1)
			{
				return $query->fetchAll();
			}
			$this->dbh = null;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}