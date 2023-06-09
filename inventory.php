<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Insert data
if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $insertQuery = "INSERT INTO inventory (nama, harga, stok) VALUES ('$nama', '$harga', '$stok')";
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Delete data
if (isset($_POST['delete'])) {
    $nama = $_POST['nama'];

    $deleteQuery = "DELETE FROM inventory WHERE nama = '$nama'";
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $deleteQuery . "<br>" . $conn->error;
    }
}

// Ambil data inventory
$selectQuery = "SELECT * FROM inventory";
$result = $conn->query($selectQuery);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    $inventoryList = array();
    while ($row = $result->fetch_assoc()) {
        $inventoryList[] = $row;
    }
} else {
    $inventoryList = [];
}

$conn->close();
?>
