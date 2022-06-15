<?php
    include('../../koneksi.php');

    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $foto_produk = $_FILES['foto_produk']['name'];

    if($foto_produk != ""){
        $ekstensi_diperbolehkan = array('png','jpg','jpeg');
        $x = explode('.', $foto_produk);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_produk']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$foto_produk;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../../produk/'.$nama_gambar_baru);

            $query = "INSERT INTO produk (nama_produk, deskripsi, stok, harga, foto_produk) VALUES ('$nama','$deskripsi', '$stok', '$harga', '$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='produk.php';</script>";
            }
            }else{
                echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='tambah_produk.php';</script>";
            }
        }else{
            $query = "INSERT INTO produk (nama_produk,deskripsi, stok, harga) VALUES ('$nama',$deskripsi', '$stok', '$harga')";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='produk.php';</script>";
            }
        }
    
?>

