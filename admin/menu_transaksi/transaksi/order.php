<?php 
session_start();
include '../../../koneksi.php';
$orderid = $_GET['orderid'];
$liatcust = mysqli_query($koneksi,"select * from pelanggan p, kecamatan k, cart c where orderid='$orderid' and p.id_pelanggan=c.id_pelanggan and p.isi_kecamatan=k.id_kecamatan");
$checkdb = mysqli_fetch_array($liatcust);
date_default_timezone_set("Asia/Bangkok");

if(isset($_POST['verifikasi']))
	{
		$updatestatus = mysqli_query($koneksi,"update cart set status='TerVerifikasi' where orderid='$orderid'");
		$del =  mysqli_query($koneksi,"delete from konfirmasi where orderid='$orderid'");
		$stok =  mysqli_query($koneksi,"update produk p, detailorder d SET p.stok = p.stok- d.qty WHERE d.orderid= '$orderid'; ");
		
		if($stok){
			echo " <div class='alert alert-success'>
			<center>Pembayaran TerVerifikasi.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= index.php'/> ";
		}
		
	};

if(isset($_POST['kirim']))
	{
		$updatestatus = mysqli_query($koneksi,"update cart set status='Pengiriman' where orderid='$orderid'");
		$del =  mysqli_query($koneksi,"delete from konfirmasi where orderid='$orderid'");
		
		if($updatestatus&&$del){
			echo " <div class='alert alert-success'>
			<center>Pesanan dikirim.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= index.php'/> ";
		}
		
	};


if(isset($_POST['batal']))
	{
		$updatestatus = mysqli_query($koneksi,"update cart set status='Pembatalan' where orderid='$orderid'");
		$del =  mysqli_query($koneksi,"delete from konfirmasi where orderid='$orderid'");
		
		if($updatestatus&&$del){
			echo " <div class='alert alert-success'>
			<center>Pesanan dibatalkan.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= index.php'/> ";
		}
		
	};


if(isset($_POST['selesai']))
	{
		$updatestatus = mysqli_query($koneksi,"update cart set status='Selesai' where orderid='$orderid'");
		
		if($updatestatus){
			echo " <div class='alert alert-success'>
			<center>Transaksi diselesaikan.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= index.php'/> ";
		}
		
	};

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Silele</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../../assets/img/silele.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../../assets/css/demo.css">
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
            border-radius: 2px;
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
        .movies_text{
            margin-top: 10px;
        }
        .movies_text p{

            margin: 0px;
            align-items: center;
            justify-content: center;
        }
        .movies_text button{
            margin: 10px;

            font-size: medium;
            justify-content: center;
            align-items: center;
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
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						
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
							<img src="../../../assets/img/silele.png" alt="..." class="avatar-img rounded-circle">
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
										<a href="../../profil.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="../../../index.php">
											<span class="link-collapse">Log Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item ">
							<a href="../../index.php">
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
							<a href="../../datacustomer.php">
								<i class="fas fa-address-book"></i>
								<p>Daftar Customer</p>
							</a>
						</li>

						<li class="nav-item ">
							<a data-toggle="collapse" href="#menu">
								<i class="fas fa-cog"></i>
								<p>Kelola</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="menu">
								<ul class="nav nav-collapse">
									<li>
										<a href="../../produk/produk.php">
                                            <i class="fas fa-layer-group"></i>
											<span">Produk</span>
										</a>
									</li>
									<li>
										<a href="../../pembayaran/pembayaran.php">
											<i class="fas fa-credit-card active"></i>
											<span>Metode</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>

						<li class="nav-item active">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-wallet"></i>
								<p>Menu Transaksi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a href="index.php">
                                            <i class="fas fa-shopping-basket"></i>
											<span">Transaksi</span>
										</a>
									</li>
									<li>
										<a href="../pengeluaran/index.php">
											<i class="fas fa-money-check-alt"></i>
											<span>Pengeluaran</span>
										</a>
									</li>
									<li>
										<a href="../rekapitulasi/index.php">
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
					</div>
					
						<h2 class="text-white pb-2">Data Transaksi </h2>
                        <div>
                            <span>Kode Order: #<b><?php echo $orderid ?><br>
                            <p><?php echo $checkdb['nama']; ?> (<?php echo $checkdb['alamat']?> ,&nbsp;&nbsp; <?php echo $checkdb['kecamatan'];?>)</p>
								<p>Waktu order : <?php echo $checkdb['tanggal']; ?></p>
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
														<th>Jumlah</th>
														<th>Harga</th>
														<th>Total</th>
													<tr>                                                    

												</thead>
												<tbody>


                                                <?php
      
                                                $no = 1;
												//$brg = mysqli_query($koneksi,"SELECT * from cart c, pelanggan p where c.id_pelanggan=p.id_pelanggan and status!='order' and status!='selesai' order by idcart asc");
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
                                                <td><?= ucwords ($r['qty'] )?></td>
                                                <td>Rp. <?php echo number_format ($r['harga'])?></td>
                                                <td>Rp. <?php echo number_format($total)?></td>
                                    	
                                                </tr>
                                                <?php   
                                                }
                                                ?>
                                                </tbody>
                                                <tfoot>
											<tr>
												<th colspan="4" style="text-align:right">Total:</th>
												<th>Rp<?php 
												
												$result1 = mysqli_query($koneksi,"SELECT SUM(d.qty*p.harga) AS count FROM detailorder d, produk p where orderid='$orderid' and d.id_produk=p.id_produk order by d.id_produk ASC");
												$cekrow = mysqli_num_rows($result1);
												$row1 = mysqli_fetch_assoc($result1);
												$count = $row1['count'];
												if($cekrow > 0){
													echo number_format($count);
													} else {
														echo 'No data';
													}?></th>
											</tr>
										</tfoot>
										</table>
                                        </div>
			<div class="content">
				<div class="page-inner">
					<div class="mt-0 mb-4">
					</div>
									<?php
									
									if($checkdb['status']=='membayar'){
										$ambilinfo = mysqli_query($koneksi,"select * from konfirmasi where orderid='$orderid'");
										while($tarik=mysqli_fetch_array($ambilinfo)){		
										$met = $tarik['payment'];
										$namarek = $tarik['namarekening'];
										$tglb = $tarik['tglbayar'];

										echo '
										Informasi Pembayaran
									<div class="data-tables ">
									<table id="dataTable2" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>Metode</th>
												<th>Pemilik Rekening</th>
												<th>Tanggal Pembayaran</th>
												
											</tr></thead><tbody>
											<tr>
											<td>'.$met.'</td>
											<td>'.$namarek.'</td>
											<td>'.$tglb.'</td>
											</tr>
											</tbody>
										</table>
									</div>
									<br><br>
                                    
									<form method="post">
									<input type="submit" name="verifikasi" class="form-control btn btn-success" value="Verifikasi" \>
									<br><br>
									<input type="submit" name="batal" class="form-control btn btn-danger" value="Batalkan" \>
									</form>
									';
									
									
									}
									} elseif ($checkdb['status']=='TerVerifikasi') {
										echo '
									<form method="post">
									<input type="submit" name="kirim" class="form-control btn btn-success" value="Mengirim Pesanan" \>
									</form>
									';
									} elseif ($checkdb['status']=='Pengiriman') {
										echo '
									<form method="post">
									<input type="submit" name="selesai" class="form-control btn btn-success" value="Selesaikan" \>
									</form>
									';
									}elseif ($checkdb['status']=='Pembatalan') {
										echo '
									<form method="post">
									</form>
									';
									}elseif ($checkdb['status']=='Selesai') {
										echo '
									<form method="post">
									</form>
									';
									}elseif ($checkdb['status']=='order') {
										echo '
									<form method="post">
									</form>
									';
									}else {
										echo '
										<form method="post">
									<input type="submit" name="batal" class="form-control btn btn-danger" value="Batalkan" \>
									</form>
									';
									}
									?>
									<br>
                                </div>
      
	  


		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../../assets/js/core/popper.min.js"></script>
	<script src="../../../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../../../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../../../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../../../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->


	<!-- jQuery Vector Maps -->
	<script src="../../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../../../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../../assets/js/setting-demo.js"></script>
	<script src="../../../assets/js/demo.js"></script>
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