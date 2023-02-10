<?php
class Transaction{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function menampilkan_data_transaction(){
        $hasil = array();
        $data = $this->conn->query("SELECT * FROM `transaction`");
        while($d = $data->fetch_array()){
        $hasil[] = $d;
        }
        return $hasil;
    }
}

include ("config.php");
$dbname = new database();
$conn = $dbname->getConnection();
$transaction = new Transaction($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Transaction</title>
</head>
<body>
<h3>Data Transaction</h3>

<table border="1">
	<tr>
		<th>ID Customer</th>
		<th>ID_Paket</th>
		<th>ID_Employee</th>
        <th>transaction date</th>
	</tr>
	<?php
	foreach($transaction->menampilkan_data_transaction() as $b){
	?>
	<tr>
		<td><?php echo $b['id_customer']; ?></td>
		<td><?php echo $b['id_paket']; ?></td>
        <td><?php echo $b['id_employee']; ?></td>
		<td><?php echo $b['transaction_date']; ?></td>
		<td>
		<a href="Edit/edit-transaction.php?id=<?php echo $b['id'];?>">Edit</a>
			<a href="hapus-transaction.php?id=<?php echo $b['id']; ?>">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
</body>
</html>


