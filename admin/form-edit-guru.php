<?php

include("../database.php");

if (!isset($_GET['id'])) {
    header('Location: list-guru.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM guru WHERE id_guru=$id limit 1";
$query = mysqli_query($db, $sql);
$guru = mysqli_fetch_array($query);

if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan....");
}

if (isset($_POST['simpan'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $mapel = $_POST['mapel'];
    $no_telp = $_POST['no_telp'];

    if ($password != $guru['password']) {
        $hash_password = hash("sha256", $password);
    } else {
        $hash_password = $guru['password'];
    }

    $sql = "UPDATE guru SET username='$username', password='$hash_password', nama='$nama'
        , mapel='$mapel', no_telp='$no_telp' WHERE id_guru='$id'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: list-guru.php');
    } else {
        die("Gagal menyimpan perubahan....");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
    <?php include "css.php"; ?>
</head>

<body>
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Edit Data Guru</h2>
        <a href="list-guru.php" class="btn btn-success">Lihat Data</a>
        <hr>
        <form action="" method="POST">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $guru['id_guru'] ?>" />
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control mt-2 mb-4" value="<?php echo $guru['username'] ?>" placeholder="Isikan Username" required>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control mt-2 mb-4" value="<?php echo $guru['password'] ?>" placeholder="Isikan Password" required>
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control mt-2 mb-4" value="<?php echo $guru['nama'] ?>" placeholder="Isikan Nama" required>
                <label for="mapel">Mapel</label>
                <input type="text" name="mapel" class="form-control mt-2 mb-4" value="<?php echo $guru['mapel'] ?>" placeholder="Isikan Mapel" required>
                <label for="no_hp">No HP</label>
                <input type="text" name="no_telp" class="form-control mt-2 mb-4" value="<?php echo $guru['no_telp'] ?>" placeholder="Isikan No Telp" required>
                <div class="form-inline">
                    <input type="submit" class="btn btn-success" value="Simpan" name="simpan">
                </div>
            </fieldset>
        </form>
</body>

</html>