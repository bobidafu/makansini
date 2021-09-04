<?php
class Database
{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

		//Database handler
	private $dbh;
	private $error;
	private $stmt;

	function __construct()
	{
			//Set DSN
			//A connection string which includes the host, databasename
		$dsn = 	'mysql:host='.$this->host . ';dbname='.$this->dbname;

			//Set Options
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

			//PDO instance
		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

		//Need to find values that we are working with
	public function bind($param, $value, $type = null){
			//Check if $type is null
		if(is_null($type)){
			switch (true) {
				case is_int($value):
				$type = PDO::PARAM_INT;
				break;

				case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;

				case is_null($value):
				$type = PDO::PARAM_NULL;
				break;

				default:
				$type = PDO::PARAM_STR;
				break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		return $this->stmt->execute();
	}

	//When we fetch the data from the database,
	//We are returning it as a result set
	//This method is responsible for fetching more than one value
	public function resultSet(){
		$this->execute();

		//fetchALL, you can fetch it as an array or etc.
		//This scenario, we fetch it am object
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//Responsible for fetching only a SINGULAR value
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
}
?>