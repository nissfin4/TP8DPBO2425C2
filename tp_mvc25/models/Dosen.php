<?php
require_once "DB.php";   

class Dosen {

    public function all() {
        $conn = DB::connect();// Mendapatkan koneksi database
        $sql = "SELECT * FROM dosen"; // Query untuk mengambil semua data dosen
        return $conn->query($sql);// Menjalankan query dan mengembalikan hasil
    }

    public function find($id) {
        $conn = DB::connect();// Mendapatkan koneksi database
        $sql = "SELECT * FROM dosen WHERE id=$id"; // Query untuk mencari dosen berdasarkan ID
        $result = $conn->query($sql); // Menjalankan query
        return $result->fetch_assoc();  
    }

    public function create($data) {
        $conn = DB::connect(); // Mendapatkan koneksi database

        $name = $data['name'];// Mengambil field name dari data POST
        $nidn = $data['nidn'];// Mengambil field nidn
        $phone = $data['phone'];// Mengambil field phone
        $join_date = $data['join_date'];   // Mengambil field join_date

        // Query untuk menambahkan data baru ke tabel dosen
        $sql = "INSERT INTO dosen (name, nidn, phone, join_date)
                VALUES ('$name', '$nidn', '$phone', '$join_date')";
                
        return $conn->query($sql); // Menjalankan query insert
    }

    public function updateData($id, $data) {
        $conn = DB::connect(); // Mendapatkan koneksi database

        $name = $data['name']; // Mengambil nilai name dari form
        $nidn = $data['nidn']; // Mengambil nilai nidn
        $phone = $data['phone'];// Mengambil nilai phone
        $join_date = $data['join_date'];// Mengambil nilai join_date

        // Query untuk memperbarui data dosen berdasarkan ID
        $sql = "UPDATE dosen SET 
                name='$name', 
                nidn='$nidn', 
                phone='$phone',
                join_date='$join_date'
                WHERE id='$id'";

        return $conn->query($sql);// Menjalankan query update
    }

    public function delete($id) {
        $conn = DB::connect();// Mendapatkan koneksi database
        $sql = "DELETE FROM dosen WHERE id=$id";// Query untuk menghapus data dosen berdasarkan ID
        return $conn->query($sql);// Menjalankan query delete
    }
}
