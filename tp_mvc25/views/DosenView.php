<?php
Class DosenView { // Mendefinisikan class view untuk halaman dosen

    public static function list($data) { // Method untuk menampilkan halaman list dosen
        extract(['data' => $data]); // Mengubah array menjadi variabel $data
        include __DIR__ . '/../templates/dosen.php'; // Memuat template dosen.php
    }

    public static function create($data = []) { // Method untuk menampilkan form create dosen
        extract($data); // Mengubah isi array menjadi variabel-variabel agar bisa dipakai di template
        include __DIR__ . '/../templates/dosen.php'; // Memuat template dosen.php
    }

    public static function edit($data) { // Method untuk menampilkan form edit dosen
        extract(['d' => $data]); // Data dosen dimasukkan ke variabel $d agar template bisa menggunakannya
        include __DIR__ . '/../templates/dosen.php'; // Memuat template dosen.php
    }
}
