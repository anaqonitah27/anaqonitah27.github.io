<h2>Hapus produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk where id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto_produk = $pecah['foto_produk'];

if (file_exists("foto_produk/$foto")) {
    unlink("foto_produk/$foto_produk");
}
$koneksi->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");

echo "<script>alert('Apakah anda Yakin akan menghapus produk?');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>