<?php
include "../database.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Spetaq | Guru</title>
  <?php include "css.php" ?>
</head>

<body>
  <?php include "navbar-ds.php"; ?>

  <div class="p-4" id="main-content">
    <div class="card mt-5">
      <div class="card-body shadow">
        <h4>Selamat datang <?php echo $_SESSION['nama_guru'] ?></h4>
        <p>
          Sebagai Guru, anda dapat mengolah data nilai siswa, baik menambah, menghapus, dan mengedit.
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>