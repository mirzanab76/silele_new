<?php
include '../../../koneksi.php';

    $id = @$_GET['id_pengeluaran'];

    $sql = $koneksi -> query ("DELETE FROM pengeluaran WHERE id_pengeluaran='".$id."'");

    header("location: index.php");

?>

<script type="text/javascript">
    window.location.href="index.php";

</script>




