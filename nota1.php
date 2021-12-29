<?php
$koneksi = new mysqli("localhost","root","","cafe_astory");
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CafeA Story | Nota</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'menu.php';?>
    <section class="konten">
        <div class="container">
            <h2>Nota Pembelian</h2>
            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
            ON pembelian.id_pelanggan  = pelanggan.id_pelanggan
            WHERE pembelian.id_pembelian = '$_GET[id]'");
            $detail = $ambil->fetch_assoc();

            $ambil1 = $koneksi->query("SELECT * FROM pembelian JOIN ongkir 
            ON pembelian.id_ongkir  = ongkir.id_ongkir
            WHERE pembelian.id_pembelian = '$_GET[id]'");
            $detail1 = $ambil1->fetch_assoc();

            ?>

            <pre><?php print_r($detail); ?></pre>

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?> </strong><br>
                    Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
                    Total &nbsp;&nbsp;&nbsp;&nbsp; : Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong>Nama : <?php echo $detail['nama_pelanggan']; ?> </strong><br>
                    Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
                    Email : <?php echo $detail['email_pelanggan']; ?>
                </div>
                <div class="col-md-4">
                    <h3>Ongkir</h3>
                    <strong> No. Ongkir : <?php echo $detail1['id_ongkir']; ?> </strong><br>
                    Kab. / Kota : <?php echo $detail1['nama_kota']; ?> <br>
                    Tarif : <?php echo $detail1['tarif']; ?> <br>
                </div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center"> No. </th>
                        <th class="text-center"> Nama Produk </th>
                        <th class="text-center"> Harga Produk </th>
                        <th class="text-center"> Jumlah </th>
                        <th class="text-center"> SubHarga </th>
                    </tr>
                </thead>
                <tbody>
                <?php $nomor = 1;
                $take = $koneksi->query("SELECT * FROM pembelian JOIN pembelian_produk 
                ON pembelian.id_pembelian  = pembelian_produk.id_pembelian JOIN produk ON pembelian_produk.id_produk = produk.id_produk
                WHERE pembelian.id_pembelian = '$_GET[id]'");
                ?>
                <?php while ($pecah = $take->fetch_assoc()){ ?>
                    
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                        <td><?php echo $pecah['jumlah']; ?></td>
                        <td>Rp. <?php echo $pecah['harga_produk'] * $pecah['jumlah']; ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 alert alert-success">
                    <p>Silahkan Lakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                        <strong>BANK MANDIRI 123-456-789 AN. ANA QONITAH</strong><br>
                        <strong>BANK BRI 789-456-123 AN. ANNISA AULIA</strong>
                    </p><br>
                    <a href="pembayaran.php?id=<?php echo $detail["id_pembelian"];?>" class="btn btn-success" >Pembayaran</a>
                </div>

            </div>
        </div>
    </section>
</body>
</html>