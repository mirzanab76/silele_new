

<?php
 include('../koneksi.php');
// menyimpan data kedalam variabel
    $id_user   = $_POST['id_user'];
    $nama      = $_POST['nama'];
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    $email     = $_POST['email'];
// query SQL untuk insert data
$query="UPDATE user SET username='$username',password='$password',nama='$nama',email='$email' where id_user='$id_user'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
//header("location:profil.php");
echo "<script>alert('Data berhasil ditambahkan!');window.location='profil.php';</script>";
?>