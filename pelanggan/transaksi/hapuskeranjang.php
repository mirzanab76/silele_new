<?php
session_start();

include '../../koneksi.php';

$ui = $_SESSION['id_pelanggan'];
$cari = mysqli_query($koneksi,"select * from cart where id_pelanggan='$ui' and status='order'");
while($fetc = mysqli_fetch_array($cari)){
    $orderid = $fetc['orderid'];
}
$itungtrans = mysqli_query($koneksi,"select count(id_detail) as jumlahtrans from detailorder where orderid='$orderid'");
$itungtrans2 = mysqli_fetch_assoc($itungtrans);
$itungtrans3 = $itungtrans2['jumlahtrans'];

if (isset($_POST["update"])) {
    $kode = $_POST['idproduknya'];
    $jumlah = $_POST['jumlah'];
    $q1 = mysqli_query($koneksi,"update detailorder set qty='$jumlah' where id_produk='$kode' and orderid='$orderid'");
    if ($q1) {
        echo "Berhasil Update Cart
		<meta http-equiv='refresh' content='1; url= keranjang.php'/>";
	} else {
		echo "Gagal update cart
		<meta http-equiv='refresh' content='1; url= keranjang.php'/>";
	}
}if(isset($_GET['idproduknya'])){
	$kode = $_GET['idproduknya'];
	$q2 = mysqli_query($koneksi, "delete from detailorder where id_produk='$kode' and orderid='$orderid'");
	if ($q2) {
		$_SESSION['alertSuccess'] = 'Hapus Barang Berhasil';
	}
}if (isset($_POST["delete"])) {
    $kode = $_POST['idproduknya'];
    $jumlah = $_POST['jumlah'];
    $q1 = mysqli_query($koneksi,"delete from detailorder where id_produk='$kode' and orderid='$orderid'");
    if ($q1) {
        $_SESSION['alertSuccess'] = 'Hapus Barang Berhasil';
        header("location: keranjang.php");
	} 
}

?>
<script type="text/javascript">
    window.location.href="keranjang.php";

</script>