<?php
require_once __DIR__ . '/../models/Dosen.php';      
require_once __DIR__ . '/../views/DosenView.php';   

class DosenController {

    private $model;// Property untuk menyimpan instance model Dosen

    public function __construct() {
        $this->model = new Dosen();// Membuat objek Dosen ketika controller diinisialisasi
    }

   //read
    public function index() {
        $data = $this->model->all();// Mengambil semua data dosen dari model
        DosenView::list($data);// Menampilkan data ke view dalam bentuk list
    }

    public function createForm() {
        DosenView::create(); // Menampilkan form untuk menambah data dosen
    }

   
    public function store() {
        $this->model->create($_POST);// Mengirim data dari form post ke model untuk disimpan
    }

    
    public function editForm($id) {
        $d = $this->model->find($id); // Mengambil data dosen berdasarkan id
        DosenView::edit($d);// Menampilkan form edit dengan data dosen tersebut
    }

    public function update($id) {
        $this->model->updateData($id, $_POST); // Mengirim data baru untuk memperbarui data dosen
    }

   
    public function delete($id) {
        $this->model->delete($id);// Menghapus data dosen berdasarkan id
    }
}
