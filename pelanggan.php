<h2>Halaman pelanggan</h2>
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
</head>
<table class="table table-striped table-bordered table-responsive-md">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Telepon Pembelian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td>
                <a class="btn btn-danger" href="#">Hapus</a>
            </td>
        </tr>
        <?php $nomor++?>
    <?php }?>
    </tbody>
</table>