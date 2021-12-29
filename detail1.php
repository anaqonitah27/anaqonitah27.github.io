<?php include 'koneksi.php'; 
session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CafeA Story | Detail</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background-color: #FFEDC7;
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>
    <section class="konten">
        <div class="container">
            <h1>Detail Produk</h1><br>

            <?php 
            $ambil = $connect-> query("SELECT * FROM produk WHERE id_produk = '$_GET[id]' ");
            $detail = $ambil->fetch_assoc();
            ?>
            <!-- <pre><?php print_r($detail);?></pre> -->

            <div class="row">
                <div class="col-md-6">
                    <img src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail['nama_produk'];?></h2>
                    <h3>Rp. <?php echo number_format($detail['harga_produk']); ?></h3>
                    <h4><?php echo $detail['deskripsi_produk']; ?></h4>

                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" name="beli">Beli Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['beli'])){
                        //Mendapatkan jumlah yang diinputkan
                        $jumlah = $_POST['jumlah'];

                        //Memasukkan ke keranjang belanja
                        $_SESSION['keranjang'][$_GET['id']]=$jumlah;

                        echo"<script>alert('Produk Telah Masukkan Ke dalam Keranjang');</script>";
                        echo"<script>location='keranjang.php';</script>";
                    }
                    ?>
                    <a href="homeCust.php" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html> 