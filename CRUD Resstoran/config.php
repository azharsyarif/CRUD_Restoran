<?php 

class database{
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'restoran';
	private $conn;

	public function __construct() {
	$this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
	if ($this->conn->connect_error) {
		die("Koneksi gagal: " . $this->conn->connect_error);
	}
	}

	public function getConnection() {
	    return $this->conn;
	}

} 

?>