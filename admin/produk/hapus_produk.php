<?php
include '../../koneksi.php';

    $id = @$_GET['id_produk'];

    $sql = $koneksi -> query ("DELETE FROM produk WHERE id_produk='".$id."'");

    header("location: produk.php");

?>

<script type="text/javascript">
    window.location.href="produk.php";

</script>




