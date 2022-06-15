<?php
    include('../../koneksi.php');

    $id = $_POST['id_metode'];
    $metode = $_POST['metode'];
    $norek = $_POST['norek'];
    $atasnama = $_POST['atas_nama'];
    $gambar = $_FILES['gambar']['name'];

    if($gambar != ""){
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../../metode/'.$nama_gambar_baru);

            $query = "UPDATE metode_bayar SET metode='$metode', norek='$norek', atas_nama='$atasnama', gambar='$nama_gambar_baru'";
            $query .= "WHERE id_metode='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='pembayaran.php';</script>";
            }
            }else{
                echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='edit_metode.php';</script>";
            }
        }else{
            $query = "UPDATE metode_bayar SET metode='$metode', norek='$norek', atas_nama='$atasnama'";
            $query .= "WHERE id_metode='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='pembayaran.php';</script>";
            }
        }
    
?>