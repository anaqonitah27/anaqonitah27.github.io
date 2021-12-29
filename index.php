<?php $koneksi = new mysqli("localhost","root", "", "cafe_astory"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="admin.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">HOME</span>
				</a>
			</li>
			<li>
				<a href="index.php?halaman=produk">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">PRODUK</span>
				</a>
			</li>
			<li>
				<a href="index.php?halaman=pembelian">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">PEMBELIAN</span>
				</a>
			</li>
			<li>
				<a href="index.php?halaman=pelanggan">
					<i class='bx bxs-group' ></i>
					<span class="text">PELANGGAN</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
				<a href="index.php?halaman=logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
		
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<h4></h4>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman']=="produk") {
                        include 'produk.php';
                    }elseif ($_GET['halaman']=="pembelian") {
                        include 'pembelian.php';
                    }elseif ($_GET['halaman']=="pelanggan") {
                        include 'pelanggan.php';
                    }elseif ($_GET['halaman']=="detail") {
                        include 'detail.php';
                    }elseif ($_GET['halaman']=="tambahproduk") {
                        include 'tambahproduk.php';
                    }elseif ($_GET['halaman']=="hapusproduk") {
                        include 'hapusproduk.php';
                    }elseif ($_GET['halaman']=="editproduk") {
                        include 'editproduk.php';
                    }elseif ($_GET['halaman']=="logout") {
                        include 'logout.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
		
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
</body>
</html>
