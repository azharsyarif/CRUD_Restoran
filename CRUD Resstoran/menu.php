<?php
class Menu{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function menampilkan_data_menu(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM `menu`");
        while($d = $data->fetch_array()){
        $hasil[] = $d;
        }
        return $hasil;
    }
}

include ("config.php");
$dbname = new database();
$conn = $dbname->getConnection();
$menu = new Menu($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Menu</title>
</head>
<body>
<h3>Data menu</h3>

<table border="1">
	<tr>
		<th>ID Menu</th>
		<th>Nama Menu</th>
		<th>Jenis Menu</th>
        <th>ID_Paket</th>
	</tr>
	<?php
	foreach($menu->menampilkan_data_menu() as $b){
	?>
	<tr>
		<td><?php echo $b['id_menu']; ?></td>
		<td><?php echo $b['nama_menu']; ?></td>
        <td><?php echo $b['jenis_menu']; ?></td>
		<td><?php echo $b['id_paket']; ?></td>
		<td>
		<a href="Edit/edit-menu.php?id=<?php echo $b['id'];?>">Edit</a>
			<a href="hapus-menu.php?id=<?php echo $b['id']; ?>">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
</body>
</html>


