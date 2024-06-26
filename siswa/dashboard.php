<?php
include "../database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Spetaq | Siswa</title>
  <?php include "css.php" ?>
</head>

<body>
  <?php include "navbar-ds.php"; ?>

  <div class="p-4" id="main-content">
    <div class="card mt-5">
      <div class="card-body shadow">
        <h4>Selamat datang <?php echo $_SESSION['nama_siswa'] ?></h4>
        <p>
          Sebagai Siswa, anda dapat melihat nilai anda mulai dari nilai tugas, UTS, UAS, dan rata-ratanya.
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>