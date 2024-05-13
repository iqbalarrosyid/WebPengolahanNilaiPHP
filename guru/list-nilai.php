<?php
include("../database.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $db->prepare("DELETE FROM nilai WHERE id_nilai = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    header('Location: list-nilai.php');
  } else {
    die("gagal menghapus...");
  }
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Nilai</title>
    <?php include "css.php"; ?>
  </head>

  <body>
    <?php include "navbar-ds.php"; ?>
    <div id="main-content" class="p-4 p-md-5 pt-5">
      <div class="card mb-2">
        <div class="card-body shadow">
          <h2>Data Nilai</h2>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-body shadow">
          <h5><?php echo $_SESSION['nama_guru'] ?></h5>
          <h5><?php echo $_SESSION['mapel'] ?></h5>
          <a href="form-daftar-nilai.php" class="btn btn-success mb-3 mt-3">Tambah Data</a>
          <br />
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Tugas</th>
                  <th scope="col">UTS</th>
                  <th scope="col">UAS</th>
                  <th scope="col">Rata-rata</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT id_nilai, nama, kelas, tugas, uts, uas, (tugas + uts + uas) / 3 AS rata_rata FROM nilai a LEFT JOIN siswa b ON a.id_siswa=b.id_siswa WHERE id_guru='$_SESSION[id_guru]'";
                $query = mysqli_query($db, $sql);

                $no = 0;
                while ($nilai = mysqli_fetch_array($query)) {
                  echo "<tr>";
                  $no++;
                ?>
                  <td><?php echo $no ?></td>
                  <td><?php echo $nilai['nama'] ?></td>
                  <td><?php echo $nilai['kelas'] ?></td>
                  <td><?php echo $nilai['tugas'] ?></td>
                  <td><?php echo $nilai['uts'] ?></td>
                  <td><?php echo $nilai['uas'] ?></td>
                  <td><?php echo number_format($nilai['rata_rata'], 2) ?></td>
                  <td>
                    <a href="form-edit-nilai.php?id=<?php echo $nilai['id_nilai'] ?>" class="btn btn-warning">Edit</a>
                    <a href="list-nilai.php?id=<?php echo $nilai['id_nilai'] ?>" class="btn btn-danger">Hapus</a>
                  </td>

                <?php
                }
                ?>
              </tbody>
            </table>
          </div>

          <p>Total data: <?php echo mysqli_num_rows($query) ?></p>
        </div>
      </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>

  </html>
<?php }
?>