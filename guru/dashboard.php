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
    <?php include "../button.php"; ?>
    <div class="card mt-5">
      <div class="card-body shadow">
        <h4>Selamat datang <?php echo $_SESSION['nama_guru'] ?></h4>
        <p>
          Sebagai Guru, anda dapat mengolah data nilai siswa, baik menambah, menghapus, dan mengedit.
        </p>
      </div>
    </div>
  </div>


  <script src="../bs/js/bootstrap.js"></script>
  <script src="../script.js"></script>
</body>

</html>