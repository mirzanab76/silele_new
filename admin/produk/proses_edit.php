<?php
    include('../../koneksi.php');

    $id = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskipsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $foto_produk = $_FILES['foto_produk']['name'];

    if($foto_produk != ""){
        $ekstensi_diperbolehkan = array('png','jpg');
        $x = explode('.', $foto_produk);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_produk']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$foto_produk;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, '../../produk/'.$nama_gambar_baru);

            $query = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskipsi', stok='$stok', harga='$harga', foto_produk='$nama_gambar_baru'";
            $query .= "WHERE id_produk='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='produk.php';</script>";
            }
            }else{
                echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='edit_produk.php';</script>";
            }
        }else{
            $query = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskipsi', stok='$stok', harga='$harga'";
            $query .= "WHERE id_produk='$id'";
            $result = mysqli_query($koneksi, $query);

            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
            }else{
                echo "<script>alert('Data berhasil ditambahkan!');window.location='produk.php';</script>";
            }
        }
    
?>