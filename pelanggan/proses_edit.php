<?php
    include('../koneksi.php');

    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kecamatan = $_POST['isi_kecamatan'];
    $foto_profil = $_FILES['foto_profil']['name'];

    if($foto_profil != ""){
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $foto_profil);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_profil']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$foto_profil;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../profil/'.$nama_gambar_baru);

            $query = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password',isi_kecamatan='$kecamatan', foto_profil='$nama_gambar_baru'";
            $query .= "WHERE id_pelanggan='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='profil.php';</script>";
            }
            }else{
                echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='edit_foto.php';</script>";
            }
        }else{
            $query = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', isi_kecamatan='$kecamatan' , password='$password'";
            $query .= "WHERE id_pelanggan='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='profil.php';</script>";
            }
        }
    
?>