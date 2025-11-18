<?php
class DB {
    private static $instance = null;   

    public static function connect() {  // Method untuk membuat atau mengambil koneksi database
        if (self::$instance === null) { // Mengecek apakah koneksi belum dibuat
            $servername = "localhost";  // Host database
            $username = "root";// Username MySQL
            $password = "";            
            $db_name = "tp_mvc25";// Nama database yang akan digunakan

            // Membuat koneksi baru menggunakan mysqli
            self::$instance = new mysqli($servername, $username, $password, $db_name);

            // Mengecek apakah terjadi error saat koneksi
            if (self::$instance->connect_error) {
                die("Connection failed: " . self::$instance->connect_error); // Menghentikan program jika gagal
            }
        }

        return self::$instance; 
    }
}
