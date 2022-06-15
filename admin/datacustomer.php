<?php
session_start();

include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Silele</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/silele.png" type="image/x-icon"/>
	<link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
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
							<img src="../assets/img/silele.png" alt="..." class="avatar-img rounded-circle">
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
										<a href="profil.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="../index.php">
											<span class="link-collapse">Log Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item ">
							<a href="index.php">
								<i class="fas fa-home"></i>
								<p>Menu Utama</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Fitur</h4>
						</li>
                        
						<li class="nav-item active">
							<a href="datacustomer.php">
								<i class="fas fa-address-book"></i>
								<p>Daftar Customer</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu1">
								<i class="fas fa-cog"></i>
								<p>Kelola</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu1">
								<ul class="nav nav-collapse">
									<li>
										<a href="produk/produk.php">
                                            <i class="fas fa-layer-group"></i>
											<span">Produk</span>
										</a>
									</li>
									<li>
										<a href="pembayaran/pembayaran.php">
											<i class="fas fa-credit-card"></i>
											<span>Metode</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>

						<li class="nav-item ">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-wallet"></i>
								<p>Menu Transaksi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a href="menu_transaksi/transaksi/index.php">
                                            <i class="fas fa-shopping-basket"></i>
											<span">Transaksi</span>
										</a>
									</li>
									<li>
										<a href="menu_transaksi/pengeluaran/index.php">
											<i class="fas fa-money-check-alt"></i>
											<span>Pengeluaran</span>
										</a>
									</li>
									<li>
										<a href="menu_transaksi/rekapitulasi/index.php">
											<i class="fas fa-receipt"></i>
											<span >Rekapitulasi</span>
										</a>
									</li>
								</ul>
							</div>
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
                                             <i class="fas fa-money-check-alt"></i>
											<span>Pengeluaran</span>
										</a>
									</li>
									<li>
										<a href="#">
                                            <i class="fas fa-receipt"></i>
											<span >Rekapitulasi</span>
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
						<h2 class="">Data Customer</h2>
					<div class="page-header">
						<h4 class="page-title">Customer</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="datacustomer.php">Data Customer</a>
							</li>
						</ul>
					</div>
							
								<!-- Advanced Tables -->
								<div class="panel panel-default">
									
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Kecamatan</th>
														<th>Alamat Lengkap</th>
														<th>No Telp</th>
														<th>Foto Profil</th>
													</tr>

												</thead>
												<tbody>

                                    	<?php

                                    		$no = 1;

                                    		//$sql = $koneksi->query ("SELECT * FROM pelanggan");

											$sql = $koneksi->query("SELECT * FROM pelanggan INNER JOIN kecamatan ON pelanggan.isi_kecamatan=kecamatan.id_kecamatan");

                                    		while ($data=$sql -> fetch_assoc()) {
                                    			
                                    		

                                    	?>

                                    	<tr>
                                    		<td><?php echo $no++?></td>
                                            <td><?php echo $data['nama'];?></td>
                                    		<td><?php echo $data['alamat'];?></td>
											<td><?php echo $data['kecamatan'];?></td>
                                    		<td><?php echo $data['no_telp'];?></td>
											<td><img src="../profil/<?php echo $data['foto_profil'];?>" width="120px" height="100px" ></td>
                                    	</tr>

                                    	<?php  } ?>
                                    </tbody>


                                </table>		
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<!--<script src="../assets/js/plugin/datatables/datatables.min.js"></script> --->
	<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>

	<!-- Bootstrap Notify -->


	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script src="../assets/js/demo.js"></script>
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
</body>
</html>