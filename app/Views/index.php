<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" type="text/css" href="/style.css" />

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <a href="#" class="logo">Raja Laundry</a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="<?= base_url();?>">Home</a></li>
            <li><a href="<?= base_url();?>masuk">Masuk</a></li>
        </ul>
    </header>
    
    <!--        Home Start       -->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Selamat Datang</h1>
            <h2>di Raja Laundry. <br> Kami Siap Antar Jemput.</h2>
        </div>

        <div class="home-img">
            <img src="/assets/img/welcome.jpg">
        </div>
    </section>

    <!--        About Start       -->
    <section class="about" id="about">
        <div class="about-img">
            <img src="/assets/img/fotoraja.jpg">
        </div>

        <div class="about-text">
            <span>Tentang Kami</span>
            <p>Raja Laundry yang berlokasi di Gg. Kedondong RT.05/RW.016, No.49, Kota Depok, 
                Jawa Barat 16423 merupakan bisnis yang bergerak dibidang jasa pencucian pakaian.</p>
        </div>
    </section>

    <!--        Service Start       -->
    <section class="services" id="services">
        <div class="heading">
            <span>Our Services</span>
            <h2>We Provide Best Quality</h2>
        </div>

        <div class="service-container">
            <div class="s-box">
                <img src="/assets/img/kiloan.png">
                <h3>Laundry Kiloan</h3>
                <p></p>
            </div>

        <div class="s-box">
            <img src="/assets/img/satuan.png">
            <h3>Laundry Satuan</h3>
            <p></p>
        </div>

        <div class="s-box">
            <img src="/assets/img/karpet.png">
            <h3>Laundry Karpet</h3>
            <p></p>
            </div>

        <div class="s-box">
                <img src="/assets/img/gordyn.png">
                <h3>Laundry Gordyn</h3>
                <p></p>
            </div>
        </div>
    </section>

        <!--        Menu Start       -->
        <section class="menu" id="menu">
            <div class="heading">
                <span>Our Pricelist</span>
                <h2>Harga Kaki Lima, Kualitas Bintang Lima.</h2>
            </div>
    
            <div class="menu-container">
                <div class="box">
                    <div class="box-img">
                        <img src="/assets/img/cucisetrikaicon.png">
                    </div>
                    <h2>Cuci</h2>
                    <h3>Express / 2 Hari / 3 Hari</h3>
                    <span>Rp.7000 / Rp. 7500 / Rp. 8000</span>
                    <i class="bx bx-cart-alt"></i>
                </div>
    
                <div class="box">
                    <div class="box-img">
                        <img src="/assets/img/setrikaicon.png">
                    </div>
                    <h2>Setrika</h2>
                    <h3>Express / 2 Hari / 3 Hari</h3>
                    <span>Rp. 5500 / Rp. 6000 / Rp. 6500</span>
                    <i class="bx bx-cart-alt"></i>
                </div>
    
                <div class="box">
                    <div class="box-img">
                        <img src="/assets/img/carpeticon.png">
                    </div>
                    <h2>Karpet</h2>
                    <h3>Express / 2 Hari / 3 Hari</h3>
                    <span>Rp. 5500 / Rp. 6000 / Rp. 6500</span>
                    <i class="bx bx-cart-alt"></i>
                </div>

                <div class="box">
                    <div class="box-img">
                        <img src="/assets/img/gordynicon.png">
                    </div>
                    <h2>Gordyn</h2>
                    <h3>Express / 2 Hari / 3 Hari</h3>
                    <span>Rp. 5500 / Rp. 6000 / Rp. 6500</span>
                    <i class="bx bx-cart-alt"></i>
                </div>
            </div>
        </section>    

    <!--        Footer Start       -->
    <section id="contact">
        <div class="footer">
            <div class="main">
                <div class="col">
                    <h4>Alamat</h4>
                    <ul>
                        <li><a href="#">Jl. Margonda Raya, Gg. Kedondong, Kp. Stangkle
                            RT.05/RW.06, No.49</a></li>
                    </ul>
                </div>

            <div class="col">
                <h4>Kontak Kami</h4>
                <ul>
                    <li><a href="#">+6282114955228</a></li>
                    <li><a href="#">ajihakim02@gmail.com</a></li>
                </ul>
            </div>

            <div class="col">
                <h4>Information</h4>
                <div class="social">
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bx-map'></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Javascript -->
    <script type"text/javascript" src="/script.js"></script>
    
</body>
</html>