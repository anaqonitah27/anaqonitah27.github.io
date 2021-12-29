<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <h2>Ubah Produk</h2>
        <?php
        $ambil = $koneksi->query("SELECT * FROM produk where id_produk = '$_GET[id]'");
        $pecah = $ambil->fetch_assoc();
        ?>
        <pre><?php print_r($pecah);?></pre>
        <form enctype="multipart/form-data" method="post">
        <div class="form-group">
        <label for="nama">Nama</label><br>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama..." id="nama"><br><br>
            <label for="harga">Harga (Rp)</label><br>
            <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga..." id="harga" value="<?php echo $pecah['harga_produk']?>"><br><br>
            <label for="formFile" class="form-label">Ganti Foto Produk</label><br>
            <img src="foto_produk/<?php echo $pecah["foto_produk"] ?>"width=200px><br><br>
            <input type="file" name="foto" value="<?php echo $pecah['foto_produk']?>"><br><br>
            <label >Deskripsi produk</label><br>
            <textarea name="deskripsi" cols="30" rows="10" class="form-control" value="<?php echo $pecah['deskripsi_produk']?>"?></textarea><br><br>
            <button class="btn btn-success" name="change">Ubah</button>
            <a class="btn btn-info" href="index.php?halaman=produk">Kembali</a>
        </div>
        </form>
        <?php
        if (isset($_POST['change'])) {
            $nama = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "foto_produk/".$nama);
            $koneksi->query("UPDATE `produk` SET `nama_produk`='$_POST[nama]',`harga_produk`='$_POST[harga]',`foto_produk`='$nama',`deskripsi_produk`='$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
            }else {
                $koneksi->query("UPDATE `produk` SET `nama_produk`='$_POST[nama]',`harga_produk`='$_POST[harga]',`foto_produk`='$nama',`deskripsi_produk`='$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
            }
            echo "<script>alert('Data berhasil diubah');</script>";
            echo "<script>location='index.php?halaman=produk';</script>";
        }
        ?>
        </body>
</html>