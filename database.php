<?php
// File: koneksi/database.php

$host = "localhost";
$username = "root";
$password = "";
$database = "DB_LATIHAN_PBO_TI1C_IFATFEBRIANSYAH";

try {
    // Membuat koneksi ke database menggunakan PDO
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    // Mengatur mode error PDO ke Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menampilkan pesan jika koneksi gagal
    die("Koneksi ke database gagal: " . $e->getMessage());
}