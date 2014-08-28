<?php
require_once("connectPDO.class.php");

class CartoVersions
{
	public function __construct()
	{
		$this->dbh = ConnectPDO::singleton();
	}

	/**
	* @desc - obtiene todos los resultados
	*/
	public function getAllCartoVersions()
	{
		try
		{
			$query = $this->dbh->prepare("select * from geoschema.versions");

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
	public function getVersionById($idversion)
	{
		try
		{
			$query = $this->dbh->prepare("select * from geoschema.versions WHERE idversion=?");
			$query->bindParam(1, $idversion, PDO::PARAM_INT);
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