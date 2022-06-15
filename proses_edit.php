<?php
session_start();

include '../koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['ubah_foto'])){
    $foto_profil = $_FILES['foto_profil']['name'];
    $nama_foto = $_FILES['foto_profil']['tmp_name'];
    $foto_baru = date('dmYHis').$foto_profil;
    $path = "../profil/".$foto_baru;

    if(move_uploaded_file($foto_profil, $path)){
        $query = "SELECT * FROM pelangan WHERE id_pelanggan='".$id_pelanggan."'";
        $resutl = mysqli_query($query);
        $data = mysqli_fetch_array($resutl);

        if(is_file("../profil/".$data['foto_profil']))
            unlink("../profil/".$data['foto_profil']);

        $query = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password', foto_profil='$foto_baru' WHERE id_pelanggan='$id_pelanggan' ";
        $resutl = mysqli_query($query);
        
        if($sql){
            header("location: profil.php");
        }else{
            echo "maaf terjadi kesalahan upload data ke database.";
            echo "<br><a href='profil.php'>Kembali ke form</a>";
        }
    }else{
        echo "<script>alert('maaf gambar gagal dimuat');window.location='edit_profil.php.php</script>";
    }
}else{
    $query = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password' WHERE id_pelanggan='$id_pelanggan' ";
    $resutl = mysqli_query($query);

    if($resutl){
        header("location: profil.php");
    }else{
        echo "maaf terjadi kesalahan upload data ke database.";
        echo "<br><a href='profil.php'>kembali ke form</a>";
    }
}
?>