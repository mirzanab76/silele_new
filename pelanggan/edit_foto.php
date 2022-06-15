<?php
include('../koneksi.php');

    if(isset($_GET['id_pelanggan'])){
        $id_pelanggan = $_GET['id_pelanggan'];
        $query = "SELECT * FROM pelanggan WHERE id_pelanggan= '$id_pelanggan'";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);
        if(!count($data)){
           echo "<script>alert('data tidak ditemukan pada tabel.');window.location='profil.php';</script>";
        }
    }else{
        echo "<script>alert('masukkan id yang ingin di edit');window.location='profil.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Gambar</title>
    <style type="text/css">
        *{
            font-family: "trebuchet MS";
        }
        h1{
            text-transform: uppercase;
            color: salmon;
        }
        .base{
            width: 400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
        }
        label{
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input{
            padding:6px;
            width:100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        button{
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 12px;
            border: 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <center><h1>edit <?php echo $data['nama'] ?></h1></center>
    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nama</label>
            <input type="text" name="nama" autofokus="" value="<?php echo $data['nama'] ?>"/>
            <input type="hidden" name="id_pelanggan" autofokus=""  value="<?php echo $data['id_pelanggan'] ?>"/>
        </div>
        <div>
            <label>alamat</label>
            <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>"/>
        </div>
        <div>
            <label>no telp </label>
            <input type="text" name="no_telp" required="" value="<?php echo $data['no_telp'] ?>"/>
        </div>
        <div>
            <label>username </label>
            <input type="text" name="username" required="" value="<?php echo $data['username'] ?>"/>
        </div>
        <div>
            <label>password</label>
            <input type="text" name="password" required="" value="<?php echo $data['password'] ?>"/>
        </div>
        <div>
            <label>Gambar Profil</label>
            <img src="../profil/<?php echo $data['foto_profil'];?>" style="width:120px; float:left; margin-button:5px;">
            <input type="file" name="foto_profil" />
            <i style="float: left; font-size:11px; color:red;">abaikan jika tidak mengubah foto</i>
        </div>
        <div>
            <button type="submit">Simpan Produk</button>
        </div>
    </section>
    </<form>
</body>
</html>