<?php
include("database.php");

// Mendapatkan data dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$hash_password = hash("sha256", $password);

// Mencari user di tabel admin
$result = $db->query("SELECT * FROM admin WHERE username = '$username' AND password = '$hash_password'");
if ($result->num_rows > 0) {
    // Jika user adalah admin, arahkan ke halaman admin
    header('Location: admin/dashboard.php');
    exit; // Menambahkan exit untuk menghentikan skrip setelah pengalihan
}

// Mencari user di tabel guru
$result = $db->query("SELECT * FROM guru WHERE username = '$username' AND password = '$hash_password'");
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Mengambil data user
    // Menyimpan data ke dalam session
    $_SESSION['nama_guru'] = $user['nama']; // Menggunakan 'nama_guru' bukan 'nama'
    $_SESSION['id_guru'] = $user['id_guru'];
    $_SESSION['mapel'] = $user['mapel'];
    // Jika user adalah guru, arahkan ke halaman guru
    header('Location: guru/dashboard.php');
    exit; // Menambahkan exit untuk menghentikan skrip setelah pengalihan
}

// Mencari user di tabel siswa
$result = $db->query("SELECT * FROM siswa WHERE username = '$username' AND password = '$hash_password'");
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Mengambil data user
    // Menyimpan data ke dalam session
    $_SESSION['id_siswa'] = $user['id_siswa'];
    $_SESSION['nama_siswa'] = $user['nama']; // Menggunakan 'nama_siswa' bukan 'nama'
    $_SESSION['kelas'] = $user['kelas'];
    // Jika user adalah siswa, arahkan ke halaman siswa
    header('Location: siswa/dashboard.php');
    exit; // Menambahkan exit untuk menghentikan skrip setelah pengalihan
}


// Jika user tidak ditemukan di ketiga tabel, tampilkan pesan error
echo "Username atau password salah!";
