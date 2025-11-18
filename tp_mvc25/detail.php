<?php

include_once("views/Template.php"); 
include_once("models/DB.php"); 
include_once("controllers/DosenDetailController.php");

$detail = new DosenDetailController(); // Membuat objek controller detail dosen

//tambah
if (isset($_POST['add'])) { // Jika form tambah dikirim 
    $detail->store(); // Jalankan method store untuk menyimpan data baru
    header("location:detail.php"); // Kembali ke halaman detail

// hapus
} else if (!empty($_GET['id_hapus'])) { // Jika URL memiliki parameter idhapus
    $id = $_GET['id_hapus']; // Ambil ID yang akan dihapus
    $detail->delete($id); // Panggil method delete
    header("location:detail.php"); // Redirect

// edit
} else if (!empty($_GET['id_edit'])) { // Jika URL punya parameter id edit
    $id = $_GET['id_edit']; // Ambil ID yang akan diedit
    $detail->editForm($id); // Tampilkan form edit

// update
} else if (isset($_POST['edit'])) { // Jika form update dikirim
    $id = $_POST['id']; 
    $detail->update($id); // Jalankan method update
    header("location:detail.php"); // Redirect

// tambah
} else if (isset($_GET['add'])) { // Jika user klik tombol tambahkan data
    $detail->createForm(); // Tampilkan form tambah data

// list
} else { // Default: tampilan list data
    $detail->index(); // Tampilkan list data detail dosen
}
