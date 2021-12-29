<?php
session_start();
$koneksi = new mysqli("localhost","root", "", "cafe_astory"); 
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- jQuery library -->
    <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- Popper JS -->
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <!-- Latest compiled JavaScript -->
    <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
    max-width: 100%;
    position: relative;
    margin: auto;
    }


    /* Number text (1/3 etc) */
    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    }

    .active {
    background-color: #717171;
    }

    /* Fading animation */
    .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 2.5s;
    animation-name: fade;
    animation-duration: 2.5s;
    }

    @-webkit-keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
    }

    @keyframes fade {
    from {opacity: .4}
    to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
    .text {font-size: 11px}
    }
    .navbar-custom {
            background-color: #faece5;
        }
</style>
    </head>
    <body>
    <?php include 'menu.php';?>
        <!-- slide show -->
        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="img/1.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="img/2.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="img/3.png" style="width:100%">
            </div>

        </div>
        <br>

        <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        </div>

        <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
        </script>

        <section class="konten">
            <div class="container">
                <h1>PILIHAN MENU MAKANAN DAN MINUMAN</h1>
                <div class="row">
                    <?php $ambil = $koneksi->query("SELECT * FROM produk"); 
                        while ($perproduk = $ambil->fetch_assoc()) {?>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                <img src="foto_produk/<?php echo $perproduk["foto_produk"] ?>" width=200px>
                                    <div class="caption">
                                        <h3><?php echo $perproduk['nama_produk'];?></h3>
                                        <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                                        <a href="detail1.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-info">Detail Produk</a>
                                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>
                    <?php }?>
                </div>
            </div>
        </section>
        <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Jangan lupa untuk berkunjung ke Cafe A Story!</p>
        <h3>Our Contact</h3><br>
        Lokasi : Jl. Soekarno Hatta No. 201 Malang Jawa Timur<br>
        Telepon : +6289131211222 <br>
        Email   : cafeastory@gmail.com <br>
        Website : www.cafeastory.com <br><br>
           <h4> &copy; 2021, All Right Reserved</h4>
        </div>
    </body>
</html>