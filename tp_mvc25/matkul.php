<?php

include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/MatakuliahController.php");

// Membuat objek controller untuk Matakuliah
$mk = new MatakuliahController();


// Jika tombol tambah ditekan 
if (isset($_POST['add'])) {
    // Jalankan fungsi store untuk menyimpan data baru
    $mk->store();
    // Redirect kembali ke halaman daftar matkul
    header("location:matkul.php");

// Jika parameter id hapus ada (hapus data)
} else if (!empty($_GET['id_hapus'])) {
    // Ambil ID yang akan dihapus
    $id = $_GET['id_hapus'];
    // Jalankan fungsi delete
    $mk->delete($id);
    // Redirect ke halaman utama
    header("location:matkul.php");

// Jika user membuka form edit
} else if (!empty($_GET['id_edit'])) {
    // Ambil ID yang akan diedit
    $id = $_GET['id_edit'];
    // Tampilkan form edit melalui controller
    $mk->editForm($id);

// Jika tombol edit (update) ditekan
} else if (isset($_POST['edit'])) {
    // Ambil ID dari form
    $id = $_POST['id'];
    // Jalankan update data
    $mk->update($id);
    // Redirect ke halaman daftar
    header("location:matkul.php");

// Jika user membuka form tambah
} else if (isset($_GET['add'])) {
    // Tampilkan form tambah
    $mk->createForm();

// Jika tidak ada aksi apa pun maka tampilkan daftar Matakuliah
} else {
    $mk->index();
}
