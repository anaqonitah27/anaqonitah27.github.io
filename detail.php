<link rel="stylesheet" href="css/bootstrap.min.css" /> 
 <!-- jQuery library -->
 <script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <!-- Popper JS -->
 <script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
 <!-- Latest compiled JavaScript -->
 <script
src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan where
    pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<pre><?php print_r($detail);?></pre>
<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
    <?php echo $detail['telepon_pelanggan']; ?> <br>
    Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
    Total : <?php echo $detail['total_pembelian']; ?> <br>
</p>

<table class="table table-striped table-bordered table-responsive-md">
    <thead class="thead-dark"> 
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor = 1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk join produk ON pembelian_produk.id_produk = produk.id_produk
        WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['jumlah'];?></td>
            <td>
                <?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
            </td>
        </tr>
        <?php $nomor++;?>
    <?php }?>
    </tbody>
</table>