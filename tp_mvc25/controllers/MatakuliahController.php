<?php

require_once __DIR__ . '/../models/Matakuliah.php';
require_once __DIR__ . '/../views/MatakuliahView.php';
require_once __DIR__ . '/../models/Dosen.php';

class MatakuliahController {

    // Properti untuk menyimpan objek model Matakuliah dan Dosen
    private $model;
    private $dosenModel;

    public function __construct() {
        // Membuat objek Matakuliah saat controller dibuat
        $this->model = new Matakuliah();
        // Membuat objek Dosen untuk mengambil data dosen (dropdown)
        $this->dosenModel = new Dosen();
    }

    public function index() {
        // Mengambil semua data matakuliah
        $data = $this->model->all();
        // Menampilkan data matkul melalui view list()
        MatakuliahView::list($data);
    }

    public function createForm() {
        // Mengambil data dosen untuk ditampilkan di dropdown saat create
        $lecturers = $this->dosenModel->all(); 
        
        // Mengirim data dosen ke view create()
        MatakuliahView::create([
            'dosen' => $lecturers
        ]);
    }

    public function store() {
        // Mengirim semua data form POST ke model untuk disimpan
        $this->model->create($_POST);
    }

    public function editForm($id) {

        // Mengambil 1 data matakuliah berdasarkan id
        $mk = $this->model->find($id);

        // Mengambil semua dosen untuk dropdown edit
        $dosen = $this->dosenModel->all();

        // Mengirim data matkul dan data dosen ke view edit()
        MatakuliahView::edit([
            'mk' => $mk,
            'dosen' => $dosen
        ]);
    }

    public function update($id) {
        // Mengirim data POST ke model untuk mengupdate matkul
        $this->model->updateData($id, $_POST);
    }

    public function delete($id) {
        // Menghapus matakuliah berdasarkan id
        $this->model->delete($id);
    }
}
