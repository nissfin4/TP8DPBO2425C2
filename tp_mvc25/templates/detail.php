<?php

$mode = "list";


if (isset($_GET['add'])) {
    $mode = "create";

} else if (!empty($d)) {
    $mode = "edit"; // Mode edit
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Dosen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Memuat file bootstrap dan JS lokal -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="detail.php">Detail</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="dosen.php">Dosen</a></li>
          <li class="nav-item"><a class="nav-link active" href="detail.php">Detail</a></li>
          <li class="nav-item"><a class="nav-link" href="matkul.php">Matkul</a></li>
        </ul>
      </div>
    </div>
</nav>

<div class="container my-4">

<?php if ($mode == "list") { ?>  
<!-- MODE LIST Menampilkan tabel data detail dosen -->

    <div class="col-2 my-3">
        <a class="btn btn-primary" href="detail.php?add=1">Add New Detail</a> <!-- Tombol tambah data -->
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Dosen ID</th>
          <th>Alamat</th>
          <th>Keahlian</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

        <!-- Looping data detail dosen -->
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['dosen_id'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['keahlian'] ?></td>
            <td>
                <!-- Tombol edit dan delete -->
                <a class='btn btn-success' href='detail.php?id_edit=<?= $row['id'] ?>'>Edit</a>
                <a class='btn btn-danger' href='detail.php?id_hapus=<?= $row['id'] ?>'>Delete</a>
            </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>

<?php } ?>  <!-- END MODE LIST -->


<?php if ($mode == "create") { ?>  
<!-- MODE CREATE Form tambah detail -->

<div class="col-lg-6 m-auto">

    <form method="post" action="detail.php"> <!-- Form kirim POST -->
      <br><br>
      <div class="card">

        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create Detail </h1>
        </div><br>

        <!-- Dropdown dosen -->
        <label>Dosen</label>
        <select name="dosen_id" class="form-control" required>
        <?php foreach ($dosen as $d): ?> <!-- List semua dosen -->
        <option value="<?= $d['id'] ?>"><?= $d['name'] ?> (NIDN: <?= $d['nidn'] ?>)</option>
        <?php endforeach; ?>
        </select>

        <!-- Input alamat -->
        <label> Alamat: </label>
        <input type="text" name="alamat" class="form-control" required> <br>

        <!-- Input keahlian -->
        <label> Keahlian: </label>
        <input type="text" name="keahlian" class="form-control" required> <br>

        <button class="btn btn-success" type="submit" name="add">Submit</button><br>
        <a class="btn btn-info" href="detail.php">Cancel</a><br>

      </div>
    </form>

</div>

<?php } ?>   <!-- END MODE CREATE -->


<?php if ($mode == "edit") { ?>  
<!-- MODE EDIT: Form edit detail -->

<div class="col-lg-6 m-auto">

    <form method="post" action="detail.php"> <!-- Form kirim POST -->
      <br><br>
      <div class="card">

        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Edit Detail </h1>
        </div><br>

      
        <input type="hidden" name="id" value="<?= $d['id'] ?>"> <br>

        <!-- Dropdown dosen -->
        <label>Dosen</label>
        <select name="dosen_id" class="form-control" required>
            <?php foreach ($dosen as $ds): ?>
                <option value="<?= $ds['id'] ?>" 
                    <?= isset($d) && $d['dosen_id'] == $ds['id'] ? 'selected' : '' ?>>
                    <?= $ds['name'] ?> (<?= $ds['nidn'] ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Alamat lama -->
        <label> Alamat: </label>
        <input type="text" name="alamat" value="<?= $d['alamat'] ?>" class="form-control"> <br>

        <!-- Keahlian lama -->
        <label> Keahlian: </label>
        <input type="text" name="keahlian" value="<?= $d['keahlian'] ?>" class="form-control"> <br>

        <button class="btn btn-success" type="submit" name="edit">Submit</button><br>
        <a class="btn btn-info" href="detail.php">Cancel</a><br>

      </div>
    </form>

</div>

<?php } ?>

</div>

</body>
</html>
