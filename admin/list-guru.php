<?php
include("../database.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $db->prepare("DELETE FROM guru WHERE id_guru = ?");
  $stmt->bind_param('i', $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    header('Location: list-guru.php');
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
    <title>List Guru</title>
    <?php include "css.php"; ?>
  </head>

  <body>
    <?php include "navbar-ds.php"; ?>
    <div id="main-content" class="p-4 p-md-5 pt-5">
      <div class="card mb-2">
        <div class="card-body shadow">
          <h2>Data Guru</h2>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body shadow">
          <a href="form-daftar-guru.php" class="btn btn-success mb-3 mt-3">Tambah Data</a>
          <br />
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Username</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Mapel</th>
                  <th scope="col">No Telp</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM guru";
                $query = mysqli_query($db, $sql);

                $no = 0;
                while ($guru = mysqli_fetch_array($query)) {
                  echo "<tr>";
                  $no++;
                ?>
                  <td><?php echo $no ?></td>
                  <td><?php echo $guru['username'] ?></td>
                  <td><?php echo $guru['nama'] ?></td>
                  <td><?php echo $guru['mapel'] ?></td>
                  <td><?php echo $guru['no_telp'] ?></td>
                  <td>
                    <a href="form-edit-guru.php?id=<?php echo $guru['id_guru'] ?>" class="btn btn-warning">Edit</a>
                    <a href="list-guru.php?id=<?php echo $guru['id_guru'] ?>" class="btn btn-danger">Hapus</a>
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
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </html>
<?php
}
?>