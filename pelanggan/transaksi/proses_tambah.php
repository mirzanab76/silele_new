<?php
session_start();

include '../../koneksi.php';


    

    
    if(isset($_POST['addprod'])){
            $ui = $_SESSION['id_pelanggan'];
            
    $id_produk = $_GET['id_produk'];
            $cek = mysqli_query($koneksi,"select * from cart where id_pelanggan='$ui' and status='order'");
            $liat = mysqli_num_rows($cek);
            $liat2 = mysqli_fetch_assoc($cek);
            $orderid = $liat2['orderid'];

            if ($liat>0) {
                $cekisi = mysqli_query($koneksi,"select * from detailorder where id_produk='$id_produk' and orderid='$orderid'");
                $liatlg = mysqli_num_rows($cekisi);
                $jmlh = 0;
                while ($banyak = mysqli_fetch_array($cekisi)) {
                    $jmlh += floatval($banyak['qty']);
                }
                if ($liatlg>0) {
                    $i=1;
                    $baru = $jmlh + $i;
                    $update = mysqli_query($koneksi,"update detailorder set qty='$baru' where orderid='$orderid' and id_produk='$id_produk'");
                    if ($update) {
                        echo "<div class='alert alert-success'>
                        Barang sudah pernah dimasukkan ke keranjang, jumlah akan ditambahkan
                        </div>
                        <meta http-equiv='refresh' content='1; url= detail_order.php?id_produk=".$id_produk."'/>";
                    }else {
                        echo "<div class='alert alert-success'>
                        Berhasil menambah ke keranjang
                        </div>
                        <meta http-equiv='refresh' content='1; url= detail_order.php?id_produk=".$id_produk."'/>";
                    }
                }else {
                    $tambah = mysqli_query($koneksi,"insert into detailorder (orderid,id_produk,qty) values ('$orderid','$id_produk','1')");
                if ($tambah) {
                    echo "<div class='alert alert-success'>
                    Berhasil menambah ke keranjang
                    </div>
                    <meta http-equiv='refresh' content='1; url= detail_order.php?id_produk=".$id_produk."'/>";
                }else {
                    echo "<div class='alert alert-warning'>
                    Gagal 
                    </div>
                    <meta http-equiv='refresh' content='1; url= detail_order.php?id_produk=".$id_produk."'/>";
                }
            }
            }else {
                $ai = crypt(rand(22,999),time());
                $bikin = mysqli_query($koneksi,"insert into cart (orderid, id_pelanggan)values ('$ai','$ui')");
                if ($bikin) {
                    $tambahuser = mysqli_query($koneksi,"insert into detailorder (orderid,id_produk,qty) values ('$orderid','$id_produk','1')");
                    if ($tambahuser) {
                        echo "<div class='alert alert-success'>
                        Berhasil menambahkan ke keranjang
                        </div>
                        <meta http-equiv='refresh' content='1; url= detail_order.php?id_produk=".$id_produk."'/>";
                    }else {
                        echo "<div class='alert alert-watning'>
                        Gagal menambahkan ke keranjang
                        </div>
                        <meta http-equiv='refresh' content='1; url= detail_order.php?id_produk=".$id_produk."'/>";
                    }
                }else {
                    //echo "Gagal bikin keranjang";
                }
            }
        }

    
?>