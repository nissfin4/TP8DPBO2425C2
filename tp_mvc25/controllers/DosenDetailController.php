<?php
require_once __DIR__ . '/../models/DosenDetail.php';   
require_once __DIR__ . '/../views/DosenDetailView.php';
require_once __DIR__ . '/../models/Dosen.php';        

class DosenDetailController {

    private $model;// Menyimpan instance model DosenDetail
    private $dosenModel;// Menyimpan instance model Dosen (untuk dropdown dosen)

    public function __construct() {
        $this->model = new DosenDetail();// Membuat objek model DosenDetail
        $this->dosenModel = new Dosen();// Membuat objek model Dosen untuk relasi
    }

    public function index() {
        $data = $this->model->all(); // Mengambil semua data detail dosen
        DosenDetailView::list($data); // Menampilkan data ke view
    }

    public function createForm() {
        $lecturers = $this->dosenModel->all();// Mengambil semua data dosen untuk dropdown
        DosenDetailView::create(['dosen' => $lecturers]); // Menampilkan form create beserta list dosen
    }

    public function store() {
        $this->model->create($_POST);  // Menyimpan data baru dari form (POST) ke database
    }

    public function editForm($id) {
        $data = $this->model->find($id);// Mengambil data detail dosen berdasarkan ID
        $lecturers = $this->dosenModel->all(); // Mengambil semua dosen untuk dropdown
        DosenDetailView::edit(['d' => $data, 'dosen' => $lecturers]); // Menampilkan form edit
    }

    public function update($id) {
        $this->model->updateData($id, $_POST); // Memperbarui data berdasarkan ID dengan input baru
    }

    public function delete($id) {
        $this->model->delete($id); // Menghapus data detail dosen berdasarkan ID
    }
}
