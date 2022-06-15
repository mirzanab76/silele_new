<?php
$koneksi = mysqli_connect("localhost","root","","db_silele");

if(mysqli_connect_error()){
    echo "Koneksi gagal : " .mysqli_connect_error();
}
?>