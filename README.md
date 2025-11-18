# TP8DPBO2425C2
TUGAS PRAKTIKUM 8

Janji:
Saya Nisrina Safinatunnajah dengan NIM 2410093 mengerjakan Tugas Praktikum 8 dalam mata kuliah DPBO untuk keberkahanNya maka saya
tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

Sistem ini mengelola tiga entitas utama, yaitu Dosen, DosenDetail, dan Matakuliah, yang saling terhubung melalui relasi berbasis foreign key. Pada bagian model, setiap entitas memiliki class masing-masing di folder models yang bertanggung jawab untuk berkomunikasi dengan database melalui operasi CRUD dan menjalankan query JOIN jika diperlukan. Model Dosen menangani penyimpanan data dosen seperti nama, NIDN, nomor telepon, dan tanggal bergabung. Model DosenDetail menyimpan detail tambahan seperti dosen_id, alamat, dan keahlian, sementara Model Matakuliah mengatur data mata kuliah sekaligus menghubungkannya dengan dosen pengampu melalui kolom dosen_id. Setiap model memiliki method seperti all(), find(), create(), updateData(), dan delete() yang dipanggil oleh controller sesuai kebutuhan alur program.

Pada bagian controller, program ini memiliki tiga controller utama yang masing-masing mengatur logika alur untuk Dosen, DosenDetail, dan Matakuliah. Setiap controller berfungsi sebagai penghubung antara input dari pengguna (melalui form di browser), data dari model, dan tampilan yang akan ditampilkan di halaman. Controller membaca parameter GET seperti add, id_edit, dan id_hapus untuk menentukan mode halaman apakah sedang menampilkan list, form tambah, atau form edit. Begitu juga dengan permintaan POST dari form. Controller juga menangani kebutuhan relasi, misalnya ketika membuat detail dosen atau mata kuliah, controller mengambil daftar dosen terlebih dahulu dari model Dosen untuk ditampilkan sebagai dropdown di form.

Bagian view program ini bersifat sangat sederhana karena hanya bertugas memuat file template yang berada di folder templates. View tidak melakukan proses manipulasi HTML secara manual, melainkan hanya menerima data dari controller menggunakan extract() dan kemudian mengirimnya ke file template yang sesuai seperti dosen.php, detail.php, atau matkul.php. Template tersebut berisi keseluruhan struktur HTML termasuk Bootstrap, tabel list data, serta form create dan edit. 

penjelasan alur:
Alur kerja program dimulai ketika pengguna membuka salah satu file utama seperti dosen.php, detail.php, atau matkul.php. File tersebut bertugas mendeteksi parameter dari URL, misalnya ketika pengguna menekan tombol “Add”, “Edit”, atau “Delete”. Berdasarkan parameter tersebut, file utama menentukan mode halaman apakah sedang menampilkan daftar data, form tambah, atau form edit. kemudian memanggil method controller yang sesuai. Controller lalu menghubungi model untuk mengambil data yang diperlukan. Misalnya, pada mode list, controller akan memanggil method all() untuk mengambil seluruh data dan mengirimnya ke view. Pada mode create dan edit, controller mengambil data tertentu dari model dan mengirimkannya ke template untuk ditampilkan sebagai nilai default di dalam form.

Ketika pengguna mengisi form dan menekan submit, data dikirim ke controller melalui method POST. Controller akan melakukan validasi sederhana dan meneruskan data tersebut ke model menggunakan method create() atau updateData(). Model kemudian menjalankan query SQL untuk menyimpan atau memperbarui data di database. Jika tindakan berhasil, controller akan mengarahkan kembali ke mode list agar perubahan langsung terlihat. Pada fitur yang melibatkan relasi seperti DosenDetail dan Matakuliah, controller juga mengambil daftar dosen dari model Dosen untuk ditampilkan dalam bentuk dropdown, sehingga pengguna dapat memilih dosen yang tepat saat membuat atau mengedit data.

Dokumentasi:
[![dokumentasi](https://img.youtube.com/vi/FU0MVLtbFwA/0.jpg)](https://youtu.be/FU0MVLtbFwA)
