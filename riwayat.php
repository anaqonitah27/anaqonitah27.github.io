<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])){
    echo"<script> alert('Silahkan Login Terlebih Dahulu!');</script>";
    echo"<script> location='loginCust.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>
    <section class=riwayat>
        <div class="conntainer">
            <center><h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]?></h3></center>
            <table class="table table-bordered table-striped table-responsive-md">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor=1;
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    $ambil = $connect->query("SELECT * FROM pembelian WHERE id_pelanggan = $id_pelanggan");
                    while ($pecah=$ambil->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["tanggal_pembelian"]?></td>
                        <td><?php echo $pecah["status_pembelian"]?></td>
                        <td>Rp.<?php echo number_format($pecah["total_pembelian"])?></td>
                        <td>
                            <a href="nota1.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
                            <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"];?>" class="btn btn-success" >Pembayaran</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>