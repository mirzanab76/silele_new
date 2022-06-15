<?php
include('../koneksi.php');

    if(isset($_GET['id_pelanggan'])){
        $id_pelanggan = $_GET['id_pelanggan'];
        $query = "SELECT * FROM pelanggan WHERE id_pelanggan= '$id_pelanggan'";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die("query error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);
        if(!count($data)){
           echo "<script>alert('data tidak ditemukan pada tabel.');window.location='profil.php';</script>";
        }
    }else{
        echo "<script>alert('masukkan id yang ingin di edit');window.location='profil.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Silele</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

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
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2 avatar-xl">
							<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
					<ul class="nav nav-danger">
						<li class="nav-item active">
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
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#produk">
								<i class="fas fa-layer-group"></i>
								<p>Produk</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="produk">
								<ul class="nav nav-collapse">
									<li>
										<a href="components/avatars.html">
											<span class="sub-item">Produk</span>
										</a>
									</li>
									<li>
										<a href="components/avatars.html">
											<span class="sub-item">Ulasan Produk</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						
						
										
						
						<li class="nav-item">
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
											<span>Transaksi</span>
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
											<span>Rekapitulasi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h2 class="text-white pb-2">Menu profil</h2>
					</div>
					
					<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Username</th>
                                            <th>Password</th>
											<th>Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$no = 1;
                                            ///$tampilPeg    =mysqli_query("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                            ///$peg    =mysqli_fetch_array($tampilPeg);{

                                    		$sql = $koneksi->query ("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");

                                    		while ($data=$sql -> fetch_assoc()) {
                                    			
                                    		

                                    	?>

                                    	<tr>
                                    		<td><?php echo $no++?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                            <td><?php echo $data['no_telp'];?></td>
                                    		<td><?php echo $data['username'];?></td>
                                    		<td><?php echo $data['password'];?></td>
											<td>
                                    			<a href="edit_profil.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>" class="btn btn-secondary">EDIT</a>
                                    			
                                    		</td>
                                    	</tr>

                                    	<?php  } ?>
                                    </tbody>


                                </table>																																																																																																																												

					

								
					
				</div>
			</div>
			
		</div>

		<div id="wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">

					<?php
						$page = @$_GET['page'];
						$aksi = @$_GET['aksi'];

						if($page == "")
					?>
					</div>
				</div>
			</div>
		</div>
		
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
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

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