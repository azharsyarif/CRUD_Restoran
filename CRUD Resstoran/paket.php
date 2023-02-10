<?php
class Paket{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function menampilkan_data_paket(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM `paket`");
        while($d = $data->fetch_array()){
        $hasil[] = $d;
        }
        return $hasil;
    }
}

include ("config.php");
$dbname = new database();
$conn = $dbname->getConnection();
$paket = new paket($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Employee</title>
</head>
<body>
<h3>Data Employeen</h3>

<table border="1">
	<tr>
		<th>ID Paket</th>
		<th>Harga Paket</th>

	</tr>
	<?php
	foreach($paket->menampilkan_data_paket() as $b){
	?>
	<tr>
		<td><?php echo $b['id_paket']; ?></td>
		<td><?php echo $b['harga_paket']; ?></td>


		<td>
		<a href="Edit/edit-employee.php?id=<?php echo $b['id'];?>">Edit</a>
			<a href="hapus-employee.php?id=<?php echo $b['id']; ?>">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
</body>
</html>


