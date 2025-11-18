<?php
require_once "DB.php";  

class DosenDetail {

    public function all() {
        $conn = DB::connect();// Mengambil koneksi database

        // Query mengambil semua data dosen detail dan join dengan tabel dosen untuk mendapatkan nama dosen
        $sql = "SELECT dosen_detail.*, dosen.name AS dosen_name 
                FROM dosen_detail 
                JOIN dosen ON dosen.id = dosen_detail.dosen_id";

        return $conn->query($sql);// Menjalankan query dan mengembalikan hasil
    }

    public function find($id) {
        $conn = DB::connect();// Mendapatkan koneksi database
        $sql = "SELECT * FROM dosen_detail WHERE id=$id";  // Query mencari detail berdasarkan id
        return $conn->query($sql)->fetch_assoc(); // Mengembalikan satu baris sebagai array asosiatif
    }

    public function create($data) {
        $conn = DB::connect(); // Mengambil koneksi database

        $dosen_id = $data['dosen_id'];// Mengambil dosen_id dari form
        $alamat = $data['alamat']; // Mengambil alamat dari form
        $keahlian = $data['keahlian'];// Mengambil keahlian dari form

        // Query untuk menyimpan data baru ke tabel dosen_detail
        $sql = "INSERT INTO dosen_detail (dosen_id, alamat, keahlian)
                VALUES ('$dosen_id', '$alamat', '$keahlian')";

        return $conn->query($sql);   // Menjalankan query insert
    }

    public function updateData($id, $data) {
        $conn = DB::connect();// Mendapatkan koneksi database
        $dosen_id = $data['dosen_id'];

        $alamat = $data['alamat'];// Mengambil data alamat baru
        $keahlian = $data['keahlian'];  // Mengambil data keahlian baru

        // Query untuk memperbarui data dosendetail berdasarkan id
        $sql = "UPDATE dosen_detail 
                SET alamat='$alamat', keahlian='$keahlian',
                    dosen_id='$dosen_id'
                WHERE id='$id'";

        return $conn->query($sql);  // Menjalankan query update
    }

    public function delete($id) {
        $conn = DB::connect();  // Mendapatkan koneksi database
        $sql = "DELETE FROM dosen_detail WHERE id=$id";  // Query menghapus data
        return $conn->query($sql); // Menjalankan query delete
    }
}
