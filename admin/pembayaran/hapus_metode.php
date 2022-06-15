<?php
include '../../koneksi.php';

    $id = @$_GET['id_metode'];

    $sql = $koneksi -> query ("DELETE FROM metode_bayar WHERE id_metode='".$id."'");

    header("location: pembayaran.php");

?>

<script type="text/javascript">
    window.location.href="pembayaran.php";

</script>




