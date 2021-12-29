<html>
    <head>
<link rel="stylesheet" href="admin.css">
    </head>
    <body>
	<div class="left">
		<h1>Dashboard Cafe A Story</h1>				
	</div>
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<?php $ambil = $koneksi->query("Select * From pembelian"); 
						$row = mysqli_num_rows($ambil);
						echo '<h3>'.$row.'<h3>';
						?>
						<p>Transaksi</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php $ambil = $koneksi->query("Select * From pelanggan"); 
						$row = mysqli_num_rows($ambil);
						echo '<h3>'.$row.'<h3>';
						?>
						<p>Pelanggan</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<?php
						$ambil = $koneksi->query("Select sum(total_pembelian) as sum from pembelian");
						$sum = mysqli_fetch_assoc($ambil);
						echo '<h3>'."Rp.".number_format($sum['sum']).'<h3>';
						?>
						<p>Total Pendapatan</p>
					</span>
				</li>
			</ul>
			
    </body>
</html>
