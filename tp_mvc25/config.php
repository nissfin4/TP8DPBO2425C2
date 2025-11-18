<?php
$servername = "localhost";
$username = "root";     
$password = "";            
$db_name = "tp_mvc25";// Nama database yang akan digunakan

// Membuat koneksi ke MySQL menggunakan objek mysqli
$conn = new mysqli($servername, $username, $password, $db_name);

// Mengecek apakah koneksi gagal
if ($conn->connect_error) { 
    die("Connection failed" . $conn->connect_error); // Hentikan eksekusi dan tampilkan pesan error
}
