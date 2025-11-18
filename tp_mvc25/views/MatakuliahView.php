<?php
class MatakuliahView { // Class view untuk halaman matakuliah

    public static function list($data) { // Method untuk menampilkan halaman list matkul
        extract(['data' => $data]); // Mengubah array $data menjadi variabel $data untuk dipakai di template
        include __DIR__ . '/../templates/matkul.php'; // Memuat template matkul.php dari folder templates
    }

    public static function create($data) { // Method untuk menampilkan form create matkul
        extract($data); 
        include __DIR__ . '/../templates/matkul.php'; // Memuat template matkul.php
    }

    public static function edit($data) { // Method untuk menampilkan form edit matkul
        extract($data); // Menghasilkan variabel $mk (data matkul) dan $dosen (list dosen)
        include __DIR__ . '/../templates/matkul.php'; // Memuat template matkul.php
    }
}
