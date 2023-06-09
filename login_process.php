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

// Mendapatkan data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa kecocokan username dan password
$query = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    // Jika username dan password cocok, arahkan ke halaman baru
    header("Location: dashboard.php");
} else {
    // Jika username dan password tidak cocok, kembali ke halaman login
    echo "Username atau password salah";
}

$conn->close();
?>
