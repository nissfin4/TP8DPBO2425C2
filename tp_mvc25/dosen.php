<?php

include_once("views/Template.php"); 
include_once("models/DB.php"); 
include_once("controllers/DosenController.php"); 

$dosen = new DosenController(); // Membuat objek controller dosen

// TAMBAH
if (isset($_POST['add'])) { // Jika tombol submit "add" diklik
    $dosen->store(); // Proses menyimpan data dosen baru
    header("location:dosen.php"); // Redirect kembali ke halaman dosen

// HAPUS
} else if (!empty($_GET['id_hapus'])) { // Jika URL mengandung parameter id hapus
    $id = $_GET['id_hapus']; // Ambil ID dosen yang akan dihapus
    $dosen->delete($id); // Jalankan fungsi delete
    header("location:dosen.php"); // Redirect ke halaman list

// FORM EDIT
} else if (!empty($_GET['id_edit'])) { // Jika URL mengandung id edit
    $id = $_GET['id_edit']; // Ambil ID yang akan diedit
    $dosen->editForm($id); // Tampilkan form edit

// UPDATE
} else if (isset($_POST['edit'])) { // Jika tombol submit "edit" diklik
    $id = $_POST['id']; // Ambil ID dari input hidden pada form edit
    $dosen->update($id); // Jalankan fungsi update
    header("location:dosen.php"); // Redirect ke halaman dosen

// FORM TAMBAH
} else if (isset($_GET['add'])) { // Jika user klik tombol Add
    $dosen->createForm(); // Tampilkan form tambah dosen

// LIST
} else { //jika tidak ada aksi lain
    $dosen->index(); // Tampilkan daftar dosen
}
