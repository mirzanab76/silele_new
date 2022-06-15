<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$q = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
$r = mysqli_fetch_array ($q);

$q2 = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username='$username' and password='$password'");
$row = mysqli_fetch_array ($q2);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['level'] = 'admin';
    header('location:admin/index.php');
}elseif(mysqli_num_rows($q) == 1){
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['level'] = 'kasir';
    header('location:kasir/index.php');
}elseif (mysqli_num_rows($q2) == 1) {
    $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    header('location:pelanggan/index.php');
}else {
    //echo "Login Gagal";
    echo "<script>alert('Maaf anda gagal login');window.location='index.php';</script>";
}
?>