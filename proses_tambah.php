<?php
    include('koneksi.php');

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $kecamatan = $_POST['isi_kecamatan'];
    $foto_profil = $_FILES['foto_profil']['name'];

    if($password == $cpassword){
        $query = "SELECT * FROM pelanggan WHERE username='$username'";
        $result = mysqli_query($koneksi, $query);
    
        if($foto_profil != ""){
            $ekstensi_diperbolehkan = array('png','jpg');
            $x = explode('.', $foto_profil);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['foto_profil']['tmp_name'];
            $angka_acak = rand(1, 999);
            $nama_gambar_baru = $angka_acak.'-'.$foto_profil;

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
             move_uploaded_file($file_tmp, 'profil/'.$nama_gambar_baru);

                if(!$result->num_rows > 0) {
                    $query = "INSERT INTO pelanggan (nama, alamat, no_telp, username, password, isi_kecamatan, foto_profil) VALUES ('$nama', '$alamat', '$no_telp', '$username', '$password','$kecamatan', '$nama_gambar_baru' )";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                            die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error    ($koneksi));
                        }else{
                            echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
                        }
                        }else{
                            echo "<script>alert('maaf username sudah terpakai');window.location='register1.php';</script>";
                        }
                        }else{
                            echo "<script>alert('ekstensi gambar hanya bisa jpg dan png');window.location='register1.php';</script>";
                        }
                    
                }else{
                    $query = "INSERT INTO pelanggan(nama, alamat, no_telp, username, password)     VALUES ('$nama', '$alamat', '$no_telp', '$username', '$password')";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                            die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                        }else{
                            echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
                        }
                        }
                        }else{
                            echo "<script>alert('Maaf username sudah terpakai');window.location='register1.php';</script>";
                        }
                    
                
                
    
?>

