<?php
// config.php
session_start();

$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'latihan1'
];

// Koneksi database
$conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['db_name']);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>