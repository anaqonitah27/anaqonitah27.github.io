<h2>Halaman produk</h2>
</style>
<!-- Menyisipkan bootstrap -->
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
<table class="table table-striped table-bordered table-responsive-md">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
            <td> <img src="foto_produk/<?php echo $pecah["foto_produk"] ?>" width=200px></td>
            <td>
                <a class="btn btn-info" href="index.php?halaman=editproduk&id=<?php echo $pecah['id_produk'];?>">Ubah</a>
                <a class="btn btn-danger" href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" onclick="return confirm('Apakah Anda yakin Akan Menghapus Data Ini?')">Hapus</a>
            </td>
        </tr>
        <?php $nomor++?>
    <?php }?>
    </tbody>
</table>
<a class="btn btn-primary" href="index.php?halaman=tambahproduk">Tambah Produk</a>
