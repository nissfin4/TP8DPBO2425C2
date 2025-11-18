<?php
class DosenDetailView { // Mendefinisikan kelas view untuk halaman detail dosen

    public static function list($data) { // Method untuk menampilkan mode list
        include "templates/detail.php";
    }

    public static function create($data) { // Method untuk menampilkan form create detail dosen
        extract($data);
        include __DIR__ . '/../templates/detail.php'; // Memuat template detail.php dari folder templates
    }

    public static function edit($data) { // Method untuk menampilkan form edit detail dosen
        extract($data); 
        include __DIR__ . '/../templates/detail.php'; // Memuat template detail.php
    }

}
