<?php
include("../database.php");

if (isset($_GET['id'])) {
    $id_nilai = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM nilai WHERE id_nilai = ?");
    $stmt->bind_param('i', $id_nilai);
    $stmt->execute();
    $result = $stmt->get_result();
    $nilai = $result->fetch_assoc();

    if ($nilai) {
        $stmt_siswa = $db->prepare("SELECT * FROM siswa WHERE id_siswa = ?");
        $stmt_siswa->bind_param('i', $nilai['id_siswa']);
        $stmt_siswa->execute();
        $result_siswa = $stmt_siswa->get_result();
        $siswa = $result_siswa->fetch_assoc();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Nilai</title>
            <?php include "css.php"; ?>
        </head>

        <body>
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Edit Data Nilai</h2>
                <a href="list-nilai.php" class="btn btn-success">Lihat Data</a>
                <hr>
                <form action="form-edit-nilai.php" method="POST">
                    <fieldset>
                        <input type="hidden" name="id_nilai" value="<?php echo $nilai['id_nilai']; ?>">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama_siswa" class="form-control mt-2 mb-4" value="<?php echo $siswa['nama']; ?>" readonly>
                        <label for="nama">Tugas</label>
                        <input type="text" name="tugas" class="form-control mt-2 mb-4" value="<?php echo $nilai['tugas']; ?>" required>
                        <label for="nama">UTS</label>
                        <input type="text" name="uts" class="form-control mt-2 mb-4" value="<?php echo $nilai['uts']; ?>" required>
                        <label for="no_hp">UAS</label>
                        <input type="text" name="uas" class="form-control mt-2 mb-4" value="<?php echo $nilai['uas']; ?>" required>
                        <div class="form-inline">
                            <input type="submit" class="btn btn-success" value="Simpan" name="simpan">
                        </div>
                    </fieldset>
                </form>
            </div>
            <script src="../bs/js/bootstrap.js"></script>
        </body>

        </html>

<?php
    } else {
        die("Data nilai tidak ditemukan.");
    }
} elseif (isset($_POST['simpan'])) {
    $id_nilai = $_POST['id_nilai'];
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    $stmt = $db->prepare("UPDATE nilai SET tugas=?, uts=?, uas=? WHERE id_nilai=?");
    $stmt->bind_param('sssi', $tugas, $uts, $uas, $id_nilai);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: list-nilai.php');
    } else {
        die("Gagal mengedit nilai.");
    }
} else {
    die("Akses dilarang.");
}
?>