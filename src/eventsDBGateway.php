<?php
namespace HBEventsCalendar;

use PDO;

class eventsDBGateway
{
	
	protected $dbh;
	
	protected $table;
	
	public function __construct($dbname, $host, $dbuser, $dbpass)
	{
		$dsn = "mysql:dbname=$dbname;host=$host";

		try
		{
			$dbh = new PDO($dsn, $dbuser, $dbpass);
		}
		catch (PDOException $e)
		{
			echo 'Connection failed: ' . $e->getMessage();
		}
		
		$this->dbh = $dbh;
	}
	
	public function setTableName($tableName)
	{
		$this->table = (string)$tableName;
	}
	
	public function fetchAll()
	{
		$query = "SELECT * FROM `{$this->table}` WHERE 1=1";
		$stmt = $this->dbh->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;

	}
	
	public function getEvent($id)
	{
		$query = "SELECT * FROM `{$this->table}` WHERE `id` = :id";
		$stmt = $this->dbh->prepare($query);
		$stmt->execute([
			':id' => $id,
			]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}
	
	public function get($where, $whereParams)
	{
		$query = "SELECT * FROM `{$this->table}` WHERE {$where}";
		$stmt = $this->dbh->prepare($query);
		$stmt->execute($whereParams);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;		
	}
	
	public function setEvent($title, $start, $url = null, $end = null)
	{
		$query = "INSERT INTO `{$this->table}`(`title`, `start`, `url`, `end`) VALUES (:title, :start, :url, :end)";
		
		$stmt = $this->dbh->prepare($query);
		$stmt->execute([
			':title' => $title,
			':start' => $start,
			':url' => $url,
			':end' => $end
			]);
		$lastId = $this->dbh->lastInsertId();
		
		return $lastId;
	}
	
}