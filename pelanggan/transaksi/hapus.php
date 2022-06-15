<?php
include '../../koneksi.php';

    $id = @$_GET['idcard'];
    $ic = @$_GET['orderid'];

    $sql = $koneksi -> query ("DELETE FROM cart WHERE idcart='".$id."' and orderid='".$ic."'");

    header("location: keranjang.php");

?>

<script type="text/javascript">
    window.location.href="keranjang.php";

</script>