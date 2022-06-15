<?php
session_start();

include '../../koneksi.php';

$ui = $_SESSION['id_pelanggan'];
$cari = mysqli_query($koneksi,"select * from cart where id_pelanggan='$ui' and status!='order'");
while($fetc = mysqli_fetch_array($cari)){
    $orderid = $fetc['orderid'];
}
$itungtrans = mysqli_query($koneksi,"select count(id_detail) as jumlahtrans from detailorder where orderid='$orderid'");
$itungtrans2 = mysqli_fetch_assoc($itungtrans);
$itungtrans3 = $itungtrans2['jumlahtrans'];

if (isset($_POST["update"])) {
    $kode = $_POST['idproduknya'];
    $jumlah = $_POST['jumlah'];
    //$q1 = mysqli_query($koneksi,"update detailorder set qty='$jumlah' where id_produk='$kode' and orderid='$orderid'");
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
	} 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Silele</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/silele.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
    
    <link rel="stylesheet" href="../assets/css/style1.css">
	<style>
       
        .kotak{
            height: 100 px;
            background-color: red;
            margin-bottom: 20px;
            margin-top: 20px;
            
        }
        .card{
            width: 12 rem;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 5px;
            margin-left: 5px;
            border-radius: 5px;
            backdrop-filter: blur(14px);
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);

        }
        .movies_box{
            width:300px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            box-shadow: 2px 2px 30px rgba(0,0,0,2);
            margin: 20px;
            border-radius: 5px;
            overflow: hidden;
            width: 200px;
            justify-content: space-between;
            align-items: center;
            border-top: 3px solid #292929;
        }
        .movies_img{
          width: 100%;
          height: 275px;
          position: relative;
        }
        .movies_img img{
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
        .movies_box a{
          text-align: center;
          display: block;
          font-weight: 600;
          display: -webkit-box;
          max-width: 80%;
          -webkit-line-clamp: vertical;
          text-overflow: ellipsis;
          overflow: hidden;
          color: #3a3a3a;
          margin: 20px;
          color: aliceblue;
        }
        .movies_box:hover{
            transform: translateY(-10px);
            transition: all ease 0.2s;
        }
        .movies_text strong{
          margin : 0px;
          justify-content: center;
          align-items: center;
          font-size: medium;

        }
        .movies_text p{
            margin: 0px;
            align-items: center;
            justify-content: center;
        }
        
        .movies_text span{
            margin-left: 10px;
            margin-right: 10px;
            
        }
        #movies-list{
            display: flex;
            margin : 20px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        label{
            font-size: medium;
            color: black;
        }

    </style>
</head>
<body data-background-color="dark">

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				
                </nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2 avatar-xl">
							<?php

                                    		$no = 1;
                                            ///$tampilPeg    =mysqli_query("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                            ///$peg    =mysqli_fetch_array($tampilPeg);{

                                    		$sql = $koneksi->query ("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");

                                           // $sql = $koneksi -> query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

                                    		while ($data=$sql -> fetch_assoc()) {
                                    			
                                    		

                                    	?>
											<img src="../../profil/<?php echo $data['foto_profil'];?>" class="avatar-img rounded-circle">
											<?php } ?>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<p>&nbsp</p>
									<span class="caret "><p></p></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="../profil.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="../../index.php">
											<span class="link-collapse">Log Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item ">
							<a href="../index.php">
								<i class="fas fa-home"></i>
								<p>Menu Utama</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<!-- <h4 class="text-section">Fitur</h4> -->
						</li>
                        <li class="nav-item ">
							<a href="../transaksi/keranjang.php">
								<i class="fas fa-shopping-cart"></i>
								<p>Keranjang</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="../riwayat/index.php">
								<i class="fas fa-box-open"></i>
								<p>Data Order</p>
							</a>
						</li>

						
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-wallet"></i>
								<p>Menu Transaksi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a href="#">
                                            <i class="fas fa-shopping-basket"></i>
											<span">Transaksi</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Pengeluaran</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Rekapitulasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="mt-0 mb-4">
						

                        <div class="page-header">
						<h2 class="text-white pb-2">Detail Order</h2>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="index.php">Data Order</a>
							</li>
                            <li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Detail Order</a>
							</li>
						</ul>
                        </div>
					</div>
					
								<!-- Advanced Tables -->
								<div class="panel panel-default">
									
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>No</th>
														<th>Produk</th>
														<th>Nama Produk</th>
														<th>Jumlah</th>
														<th>Harga Satuan</th>
													</tr>

												</thead>
												<tbody>

                                            <?php
                                            $no = 1;

                                            $brg = mysqli_query($koneksi,"select * from detailorder d, produk p where orderid='$orderid' and d.id_produk=p.id_produk order by d.id_produk asc");
                                            //while ($r = $brg->fetch_assoc()) {
                                            while($r=mysqli_fetch_array($brg)){
                                                $total = $r['qty'] * $r['harga'];

                                                $result = mysqli_query($koneksi,"select sum(d.qty*p.harga) as count from detailorder d, produk p where orderid='$orderid' and d.id_produk=p.id_produk order by d.id_produk asc");
                                                $row = mysqli_fetch_assoc($result);
                                                $cekrow = mysqli_num_rows($result);
                                                $count = $row['count'];
                                            ?>

                                            <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= ucwords($r['nama_produk']) ?></td>
                                            <td ><a href="detail_order.php?id_produk=<?php echo $r['id_produk'] ?>">
                                                    <img src="../../produk/<?php echo $r['foto_produk'] ?>" width="100px" height="100px" /></a></td>
                                            <td><?= ucwords ($r['qty'] )?></td>
                                            <td>Rp. <?php echo number_format ($r['harga'])?></td>
                                    
                                            </tr>
                                            <?php   
                                            }
                                            ?>
                                            </tbody>
                                           
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								
                                    </tbody>


                                </table>		
					</div>					
				</div>
			</div>
            <div>	
				<div >
					<h4>Total Harga</h4>
					<ul>
						<?php 
						$brg=mysqli_query($koneksi,"select * from detailorder d, produk p where orderid='$orderid' and d.id_produk=p.id_produk order by d.id_produk ASC ");
						$no=1;
						$subtotal = 0;
						while($b=mysqli_fetch_array($brg)){
						$hrg = $b['harga'];
						$qtyy = $b['qty'];
						$totalharga = $hrg * $qtyy;
						$subtotal += $totalharga
						?>
						<li><?php echo $b['nama_produk']?><i> - </i> <span>Rp<?php echo number_format($totalharga) ?> </span></li>
						<?php
						}
						?>
						<li>Total <i> - </i> <span>Rp<?php echo number_format($subtotal) ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
			
		</div>
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->


	<!-- jQuery Vector Maps -->
	<script src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo.js"></script>
	<script src="../../assets/js/demo.js"></script>
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
		function hapusBarang(id) {
            Swal.fire({
                title: 'Hapus Barang',
                background: '#f8fafc',
                icon: 'warning',
                text: 'Yakin Hapus Barang Ini ?',
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#dc2626',
            }).then(result => {
                if(result.isConfirmed){
                    window.location.href = 'cart.php?idproduknya='+id
                }
            })
            return false;
        }
</script>
<?php
	echo "
    <script>
        function alertSuccess() {
            Swal.fire({
                width: 350,
                icon: 'success',
                title: 'Sukses',
                text: '".$_SESSION['alertSuccess']."',
                showConfirmButton: false,
                timer: 3000
            });
        }
        function alertInfo() {
            Swal.fire({
                width: 350,
                icon: 'info',
                title: 'Info',
                text: '".$_SESSION['alertInfo']."',
                showConfirmButton: false,
                timer: 3000
            });
        }
        function alertError() {
            Swal.fire({
                width: 350,
                icon: 'error',
                title: 'Gagal',
                text: '".$_SESSION['alertError']."',
                showConfirmButton: false,
                timer: 3000
            });
        }
    </script>";
?>
</body>
</html>