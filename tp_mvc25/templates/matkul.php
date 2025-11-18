<?php
$mode = "list"; 

if (isset($_GET['add'])) { 
    $mode = "create"; 
} else if (!empty($mk)) { 
    $mode = "edit"; // mode berubah menjadi edit
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Matakuliah</title> <!-- Judul halaman -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsif -->

    <!-- Bootstrap kamu -->
    <link rel="stylesheet" href="bootstrap.min.css"> <!-- File CSS bootstrap -->
    <script src="jquery.min.js"></script> <!-- Library jQuery -->
    <script src="popper.min.js"></script> <!-- Library popper untuk dropdown bootstrap -->
    <script src="bootstrap.min.js"></script> <!-- File JS bootstrap -->
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Navbar utama -->
    <div class="container-fluid">
      <a class="navbar-brand" href="matkul.php">Matakuliah</a> 
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="dosen.php">Dosen</a></li> <!-- Link ke halaman dosen -->
          <li class="nav-item"><a class="nav-link" href="detail.php">Detail</a></li> <!-- Link ke detail -->
          <li class="nav-item"><a class="nav-link active" href="matkul.php">Matkul</a></li> <!-- Link aktif -->
        </ul>
      </div>
    </div>
</nav>

<div class="container my-4"> <!-- Container utama untuk konten -->

<?php if ($mode == "list") { ?> <!-- Jika mode list, tampilkan tabel -->

    <div class="col-2 my-3">
        <a class="btn btn-primary" href="matkul.php?add=1">Add Matkul</a> <!-- Tombol tambah data -->
    </div>

    <table class="table"> <!-- Tabel daftar matkul -->
      <thead>
        <tr>
          <th>ID</th>
          <th>Dosen ID</th>
          <th>Nama Matakuliah</th>
          <th>SKS</th>
          <th>Actions</th> <!-- Kolom aksi -->
        </tr>
      </thead>

      <tbody>
        <?php foreach ($data as $row) { ?> <!-- Looping semua data matkul -->
        <tr>
            <td><?= $row['id'] ?></td> <!-- Tampilkan ID -->
            <td><?= $row['dosen_id'] ?></td> <!-- Tampilkan dosen ID -->
            <td><?= $row['nama_mk'] ?></td> <!-- Tampilkan nama matkul -->
            <td><?= $row['sks'] ?></td> <!-- Tampilkan SKS -->

            <td>
                <a class='btn btn-success' href='matkul.php?id_edit=<?= $row['id'] ?>'>Edit</a> <!-- Tombol edit -->
                <a class='btn btn-danger' href='matkul.php?id_hapus=<?= $row['id'] ?>'>Delete</a> <!-- Tombol hapus -->
            </td>
        </tr>
        <?php } ?> <!-- Tutup foreach -->
      </tbody>
    </table>

<?php } ?> <!-- Tutup mode list -->


<?php if ($mode == "create") { ?> <!-- Jika mode create, tampilkan form create -->

<div class="col-lg-6 m-auto">

    <form method="post" action="matkul.php"> 
      <br><br>
      <div class="card">

        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create Matakuliah </h1> <!-- Judul form -->
        </div><br>

       <label>Dosen pengampu</label>
<select name="dosen_id" class="form-control" required> <!-- Dropdown untuk pilih dosen -->
    <?php foreach ($dosen as $d): ?> <!-- Loop semua dosen -->
        <option value="<?= $d['id'] ?>"><?= $d['name'] ?> (NIDN: <?= $d['nidn'] ?>)</option> <!-- Isi option -->
    <?php endforeach; ?>
</select>

        <label>Nama Matkul:</label>
        <input type="text" name="nama_mk" class="form-control" required> <br> <!-- Input nama matkul -->

        <label>SKS:</label>
        <input type="number" name="sks" class="form-control" required> <br> <!-- Input SKS -->

        <button class="btn btn-success" type="submit" name="add">Submit</button><br> <!-- Tombol submit -->
        <a class="btn btn-info" href="matkul.php">Cancel</a><br> <!-- Kembali -->
      </div>
    </form>

</div>

<?php } ?> <!-- Tutup mode create -->


<?php if ($mode == "edit") { ?> <!-- Jika mode edit, tampilkan form edit -->

<div class="col-lg-6 m-auto">

    <form method="post" action="matkul.php"> <!-- Form kirim POST -->
      <br><br>
      <div class="card">

        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Edit Matakuliah </h1> <!-- Judul form -->
        </div><br>

        <input type="hidden" name="id" value="<?= $mk['id'] ?>"> <br>

        <label>Dosen Pengampu</label>
<select name="dosen_id" class="form-control" required> <!-- Dropdown dosen -->
    <?php foreach ($dosen as $d): ?> <!-- Loop dosen -->
        <option value="<?= $d['id'] ?>"
            <?= $mk['dosen_id'] == $d['id'] ? 'selected' : '' ?>> <!-- Select jika dosen sama -->
            <?= $d['name'] ?> (NIDN: <?= $d['nidn'] ?>)
        </option>
    <?php endforeach; ?>
</select>

        <label>NAMA MATKUL:</label>
        <input type="text" name="nama_mk" class="form-control" value="<?= $mk['nama_mk'] ?>" required> <br> <!-- Input nama matkul -->

        <label>SKS:</label>
        <input type="number" name="sks" class="form-control" value="<?= $mk['sks'] ?>" required> <br> <!-- Input SKS -->

        <button class="btn btn-success" type="submit" name="edit">Submit</button><br> <!-- Tombol edit -->
        <a class="btn btn-info" href="matkul.php">Cancel</a><br> <!-- Kembali -->

      </div>
    </form>

</div>

<?php } ?> <!-- Tutup mode edit -->

</div> <!-- Tutup container -->
</body>
</html>
