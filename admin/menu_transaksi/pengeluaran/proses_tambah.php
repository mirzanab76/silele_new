<?php
    include('../../../koneksi.php');

                                  
	$nama = $_POST['nama_pengeluaran'];
	$nominal = $_POST['nominal'];
	$tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

		
	$query = "INSERT INTO pengeluaran (nama_pengeluaran, keterangan, nominal, tanggal) VALUES ('$nama','$keterangan', '$nominal', '$tanggal')";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    }else{
        echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
    }
    
    
	                            
                            
?>
