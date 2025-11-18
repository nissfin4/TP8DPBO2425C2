<?php

$mode = "list"; 

if (isset($_GET['add'])) { 
    $mode = "create"; // ubah mode jadi create
} else if (!empty($d)) { 
    $mode = "edit"; // ubah mode jadi edit
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dosen</title> <!-- Judul halaman -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsif -->

    <!-- Bootstrap kamu -->
    <link rel="stylesheet" href="bootstrap.min.css"> <!-- CSS bootstrap -->
    <script src="jquery.min.js"></script> <!-- jQuery -->
    <script src="popper.min.js"></script> <!-- Popper.js -->
    <script src="bootstrap.min.js"></script> <!-- JS Bootstrap -->
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- Navbar -->
    <div class="container-fluid">
      <a class="navbar-brand" href="dosen.php">Dosen</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="dosen.php">Home</a></li> <!-- Menu Home -->
          <li class="nav-item"><a class="nav-link" href="detail.php">Detail</a></li> <!-- Menu Detail -->
          <li class="nav-item"><a class="nav-link" href="matkul.php">Matkul</a></li> <!-- Menu Matkul -->
        </ul>
      </div>
    </div>
</nav>

<div class="container my-4"> <!-- Container utama -->

<?php if ($mode == "list") { ?> <!-- Jika mode list, tampilkan tabel -->

    <div class="col-1 my-3">
        <a class="btn btn-primary" href="dosen.php?add=1">Add New</a> <!-- Tombol tambah data -->
    </div>

    <table class="table"> <!-- Tabel data dosen -->
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>NIDN</th>
          <th>phone</th>
          <th>Join Date</th>
          <th>Actions</th> <!-- Kolom aksi -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) { ?> 
        <tr>
            <th><?= $row['id'] ?></th> <!-- Tampilkan ID -->
            <td><?= $row['name'] ?></td> <!-- Tampilkan nama -->
            <td><?= $row['nidn'] ?></td> <!-- Tampilkan NIDN -->
            <td><?= $row['phone'] ?></td> <!-- Tampilkan phone -->
            <td><?= $row['join_date'] ?></td> <!-- Tampilkan join date -->
            <td>
                <a class='btn btn-success' href='dosen.php?id_edit=<?= $row['id'] ?>'>Edit</a> <!-- Tombol edit -->
                <a class='btn btn-danger' href='dosen.php?id_hapus=<?= $row['id'] ?>'>Delete</a> <!-- Tombol delete -->
            </td>
        </tr>
        <?php } ?> 
      </tbody>
    </table>

<?php } ?> <!-- End mode list -->


<?php if ($mode == "create") { ?> <!-- Jika mode create, tampilkan form create -->

<div class="col-lg-6 m-auto"> 
    <form method="post" action="dosen.php"> 
      <br><br>
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create Dosen </h1> <!-- Judul -->
        </div><br>

        <label> Name: </label>
        <input type="text" name="name" class="form-control" required> <br> <!-- Input nama -->

        <label> NIDN: </label>
        <input type="text" name="nidn" class="form-control" required> <br> <!-- Input NIDN -->

        <label> phone: </label>
        <input type="text" name="phone" class="form-control" required> <br> <!-- Input phone -->

        <label> Join Date: </label>
        <input type="date" name="join_date" class="form-control" required> <br> <!-- Input tanggal join -->

        <button class="btn btn-success" type="submit" name="add">Submit</button><br> <!-- Tombol submit -->
        <a class="btn btn-info" href="dosen.php">Cancel</a><br> <!-- Tombol cancel -->
      </div>
    </form>
</div>

<?php } ?> <!-- End mode create -->


<?php if ($mode == "edit") { ?> <!-- Jika mode edit, tampilkan form edit -->

<div class="col-lg-6 m-auto"> 
    <form method="post" action="dosen.php">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Dosen </h1> <!-- Judul -->
        </div><br>

        <input type="hidden" name="id" value="<?= $d['id'] ?>" class="form-control"> <br> <!-- Hidden ID -->

        <label> Name: </label>
        <input type="text" name="name" value="<?= $d['name'] ?>" class="form-control"> <br> <!-- Input nama -->

        <label> NIDN: </label>
        <input type="text" name="nidn" value="<?= $d['nidn'] ?>" class="form-control"> <br> <!-- Input NIDN -->

        <label> Phone: </label>
        <input type="text" name="phone" value="<?= $d['phone'] ?>" class="form-control"> <br> <!-- Input phone -->

        <label> Join Date: </label>
        <input type="date" name="join_date" value="<?= $d['join_date'] ?>" class="form-control"> <br> <!-- Input join date -->

        <button class="btn btn-success" type="submit" name="edit">Submit</button><br> <!-- Tombol update -->
        <a class="btn btn-info" href="dosen.php">Cancel</a><br> <!-- Tombol cancel -->
      </div>
    </form>
</div>

<?php } ?> <!-- End mode edit -->

</div> 
</body>
</html>
