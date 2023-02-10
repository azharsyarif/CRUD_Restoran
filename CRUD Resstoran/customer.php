<?php
class Customer{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function menampilkan_data_customer(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM `customer`");
        while($d = $data->fetch_array()){
        $hasil[] = $d;
        }
        return $hasil;
    }
}

include ("config.php");
$dbname = new database();
$conn = $dbname->getConnection();
$customer = new Customer($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Customer</title>
</head>
<body>
<h3>Data Customer</h3>

<table border="1">
	<tr>
		<th>ID Customer</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
	</tr>
	<?php
	foreach($customer->menampilkan_data_customer() as $b){
	?>
	<tr>
		<td><?php echo $b['id_customer']; ?></td>
		<td><?php echo $b['nama_depan']; ?></td>
        <td><?php echo $b['nama_belakang']; ?></td>
        <td><?php echo $b['alamat']; ?></td>
        <td><?php echo $b['email']; ?></td>
        <td><?php echo $b['nomor_tlp']; ?></td>

		<td>
		<a href="Edit/edit-customer.php?id=<?php echo $b['id'];?>">Edit</a>
			<a href="hapus_customer.php?id=<?php echo $b['id']; ?>">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
</body>
</html>


