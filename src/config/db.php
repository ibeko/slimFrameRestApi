<?php 

class Db 
{
	private $dbuser ="bekir";
	private $dbpass ="";
	private $dbname ="course_coupons";
	private $dbhost ="localhost";

	public function connect()
	{
		$mysql_connection = "mysql:host=$this->dbhost;dbname=$this->dbname;charset=utf8";
		$connection = new PDO($mysql_connection,$this->dbuser,$this->dbpass);

		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $connection;
	}
}