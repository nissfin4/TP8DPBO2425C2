<?php
require_once "DB.php";   // Memuat file koneksi database

class Matakuliah {

    public function all() {
        $conn = DB::connect();// Mengambil koneksi database

        // Query untuk mengambil semua data matakuliah dan join dosen untuk mendapatkan nama dosen pengampu
        $sql = "SELECT matakuliah.*, dosen.name AS dosen_name 
                FROM matakuliah 
                JOIN dosen ON dosen.id = matakuliah.dosen_id";

        return $conn->query($sql);// Menjalankan query dan mengembalikan hasil
    }

    public function find($id)
    {
        $conn = DB::connect();  

        $sql = "SELECT * FROM matakuliah WHERE id=$id";  // Query untuk mengambil satu data matakuliah berdasarkan id
        $result = $conn->query($sql);  // Menjalankan query

        return $result->fetch_assoc(); 
                                      
    }

    public function create($data) {
        $conn = DB::connect();// Mengambil koneksi database

        $dosen_id = $data['dosen_id'];// Mengambil dosen_id dari form
        $nama_mk = $data['nama_mk']; // Mengambil nama mata kuliah dari form
        $sks = $data['sks'];// Mengambil jumlah SKS dari form

        // Query untuk menyimpan data matakuliah baru
        $sql = "INSERT INTO matakuliah (dosen_id, nama_mk, sks)
                VALUES ('$dosen_id', '$nama_mk', '$sks')";

        return $conn->query($sql);// Menjalankan query insert
    }

    public function updateData($id, $data) {
        $conn = DB::connect();// Mengambil koneksi database
        $dosen_id = $data['dosen_id'];
        $nama_mk = $data['nama_mk'];// Mengambil nama MK baru
        $sks = $data['sks'];// Mengambil SKS baru

        // Query update data matakuliah berdasarkan ID
        $sql = "UPDATE matakuliah 
                SET nama_mk='$nama_mk', sks='$sks',
                 dosen_id='$dosen_id'
                WHERE id='$id'";

        return $conn->query($sql);// Menjalankan query update
    }

    public function delete($id) {
        $conn = DB::connect(); // Mengambil koneksi database
        $sql = "DELETE FROM matakuliah WHERE id=$id";  // Query menghapus matakuliah berdasarkan id
        return $conn->query($sql); // Menjalankan query delete
    }
}
