<?php
include ("config.php");
$dbname = new database();
$conn = $dbname->getConnection();

if (isset($_GET['id'])) {
    // Ambil ID dari query string
    $id = $_GET['id'];
// Menghapus data dari table User
$sql = "DELETE FROM customer WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data User berhasil dihapus <br>";
} else {
    echo "Error deleting record: " . $conn->error;
}
} else {
    die("Akses dilarang...");
}

?>