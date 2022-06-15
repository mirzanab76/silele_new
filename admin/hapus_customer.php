<?php
include '../koneksi.php';

    $id = @$_GET['id_pelanggan'];

    $sql = $koneksi -> query ("DELETE FROM pelanggan WHERE id_pelanggan='".$id."'");

    header("location: datacustomer.php");

?>

<script type="text/javascript">
    window.location.href="datacustomer.php";

</script>




