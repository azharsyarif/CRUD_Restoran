<?php
class Employee{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function menampilkan_data_employee(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM `employee`");
        while($d = $data->fetch_array()){
        $hasil[] = $d;
        }
        return $hasil;
    }
}

include ("config.php");
$dbname = new database();
$conn = $dbname->getConnection();
$employee = new Employee($conn);
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
		<th>ID employee</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
        <th>Gaji</th>
	</tr>
	<?php
	foreach($employee->menampilkan_data_employee() as $b){
	?>
	<tr>
		<td><?php echo $b['id_employee']; ?></td>
		<td><?php echo $b['nama_depan']; ?></td>
        <td><?php echo $b['nama_belakang']; ?></td>
		<td><?php echo $b['jabatan']; ?></td>
        <td><?php echo $b['alamat']; ?></td>
        <td><?php echo $b['email']; ?></td>
        <td><?php echo $b['nomor_tlp']; ?></td>
        <td><?php echo $b['gaji']; ?></td>

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


