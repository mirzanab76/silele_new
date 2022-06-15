<?php
include '../../../koneksi.php';


 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">





  </head>


  <!--ini awal content-->
  <h3><p class="text-center mt-4">Data Pengeluaran </p></h3>

    <center><table class=" mt-4" width="1000px" border="1">
        <tr>
       <td><center>No</td>
   		 <td><center>Nama Pengeluaran</td>
       <td><center>Tanggal</td>
   		 <td><center>Harga Barang</td>
         </tr>
         

         <?php
                $no = 1;

                
				$sql = $koneksi->query("SELECT * FROM pengeluaran" );
                while ($data=$sql -> fetch_assoc()) {
                $tanggal = $data['tanggal'];	
                
                
                                    		

        	  ?>
            <tr>
            <td><center><?php echo $no++?></td>
            <td><center><?php echo $data['nama_pengeluaran'] ?></td>
            <td><center><?php echo date("d/m/Y", strtotime($tanggal));?></td>
            <td>Rp.<?php echo number_format($data['nominal']) ?></td>
  <?php
  }
    ?>
<center><table class=" mt-4" width="1000px" border="1">
<td>Total</td>
                                        <?php
                                            $sql = $koneksi->query("SELECT SUM(nominal)
                                            FROM pengeluaran");
                                            while ($data1=$sql-> fetch_assoc()){
                                                ?>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo "Rp." . number_format($data1['SUM(nominal)']) ;?></td>
                                            
                                            <?php }
                                        ?>


    <?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= Data_pengeluaran.xls");
    ?>




    <!--ini akhir content bosq-->

        <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
      </body>
    </html>