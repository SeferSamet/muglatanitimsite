<?php
$host = 'localhost';
$user_name = 'root';
$password = '';
$database = 'db_iletisim';


$conn = new mysqli($host, $user_name, $password, $database);

if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}
?>
