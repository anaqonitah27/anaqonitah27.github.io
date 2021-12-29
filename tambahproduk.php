<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <h2>Tambah Produk</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="nama">Nama</label><br>
    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." id="nama"><br><br>
    <label for="harga">Harga (Rp)</label><br>
    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga..." id="harga"><br><br>
    <label>Deskripsi</label><br>
    <textarea name="deskripsi" cols="30" rows="10" class="form-control"></textarea><br><br>
    <label for="formFile" class="form-label">Foto</label><br>
    <input class="form-control" type="file" id="formFile" name="foto"><br><br>
    <button class="btn btn-success" name="save">Simpan</button>
    </div>
</form>
<?php
if (isset($_POST['save'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "foto_produk/".$nama);
    $koneksi->query("INSERT INTO produk (nama_produk,harga_produk,foto_produk,deskripsi_produk)
    VALUES('$_POST[nama]','$_POST[harga]','$nama','$_POST[deskripsi]')");

    echo "<script> alert('Data Tersimpan');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?> 
    </body>
</html>
