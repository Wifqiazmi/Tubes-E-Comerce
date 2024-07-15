<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>fvvki Clothing</title>
   <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />

   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <link rel="stylesheet" href="fontawesome-free/css/all.css" />
   <link rel="stylesheet" href="css/venom-button.min.css" />

   <link rel="stylesheet" href="css/swiper-bundle.min.css" />
   <link rel="stylesheet" href="css/owl.carousel.min.css" />

   <link rel="stylesheet" href="css/lightgallery.css" />
   <link rel="stylesheet" href="css/aos.css" />

   <link rel="stylesheet" href="css/tailwind.css" />
   <link rel="stylesheet" href="css/main.css" />
</head>

<?php

@include 'config.php';

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if (mysqli_num_rows($select_cart) > 0) {
      $message[] = 'ditambahkan keranjang';
   } else {
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'produk berhasil di tambahkan';
   }
}

?>

<?php

$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
$row_count = mysqli_num_rows($select_rows);

?>

<body class="home" id="home">
   <!-- Header Section Begin -->
   <header class="header">
      <div class="container">
         <div class="row justify-content-center" id="mainNav">
            <div class="col-xl-2 col-lg-2 col-sm-12 items-center justify-center">
               <div class="header__logo">
                  <a href="./index.php"><img class="icon__logo" src="./images/logo.png" alt="" /></a>
               </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-10">
               <nav class="header__menu">
                  <ul>
                     <li class="nav_menu active"><a href="#home">Beranda</a></li>
                    <!-- <li class="nav_menu"><a href="admin.php">add products</a></li> -->
                     <li class="nav_menu"><a href="#products">Produk</a></li>
                     <li class="nav_menu"><a href="#galery">Galeri</a></li>
                     <li class="nav_menu"><a href="#testimoni">Ulasan</a></li>
                     <li class="nav_menu"><a href="#contact">Kontak</a></li>
                  </ul>
               </nav>
            </div>
            <div class="col-lg-2">
               <div class="header__right">
                  <ul class="header__right__widget">
                     <li>
                        <a href="cart.php" style="position: relative;">
                           Keranjang <i class="fas fa-shopping-cart"></i><span style="position: absolute; top: -9px; right: -9px; background-color: #e8492c; color: white; width: 18px; height: 18px; border-radius: 50%; text-align: center; line-height: 16px; font-size: 13px;"><?php echo $row_count; ?></span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>

         </div>

      </div>
      </div>
      </div>
      <div class="canvas__open">
         <i class="fa fa-bars"></i>
      </div>
      </div>
   </header>
   <!-- Header Section End -->

   <!-- Menu Mobile Section Begin -->
   <section class="nav">
      <div class="icon active js-scroll-trigger">
         <a href="#home">
            <i class="fas fa-home"></i>
            <p>Beranda</p>
         </a>
      </div>
      <div class="icon">
         <a href="#products">
            <i class="fas fa-images"></i>
            <p>Produk</p>
         </a>
      </div>
      <div class="icon">
         <a href="#galery">
            <i class="fas fa-chalkboard"></i>
            <p>Galeri</p>
         </a>
      </div>
      <div class="icon">
         <a href="#contact">
            <i class="fas fa-phone"></i>
            <p>Kontak</p>
         </a>
   </section>
   <!-- Menu Mobile Section Start -->

   <!-- Banner Section Begin -->
   <section class="py-4 banner set-bg" data-setbg="images/banner-3.jpg">
      <div class="container mx-auto justity-center items-center p-6">
         <h1 class="banner__text text-center"></h1>
         <div class="lg:w-2/3 mx-auto justity-center items-center">
            <div class="justity-center">
               <div class="swiper-container">
                  <div class="swiper-wrapper">
                     <div class="swiper-slide" style="background-image: url(./images/banner/banner-4.jpg)"></div>
                     <div class="swiper-slide" style="background-image: url(./images/banner/banner-5.jpg)"></div>
                     <div class="swiper-slide" style="background-image: url(./images/banner/banner-7.jpg)"></div>
                     <div class="swiper-slide" style="background-image: url(./images/banner/banner-4.jpg)"></div>
                     <div class="swiper-slide" style="background-image: url(./images/banner/banner-5.jpg)"></div>
                     <div class="swiper-slide" style="background-image: url(./images/banner/banner-7.jpg)"></div>
                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
                  <!-- Add Arrows -->
                  <!-- <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div> -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Banner Section End -->

   <!-- Services Section Begin -->
   <section class="services spad">
      <div class="container">
         <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
               <div class="row info__panel">
                  <div class="col-lg col-md-3 mb-3">
                     <div class="services__item">
                        <i class="fa fa-car"></i>
                        <div class="services__text">
                           <h6>Free Ongkir</h6>
                           <p>Kami sering mengadakan promo free ongkir se-Indonesia.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg col-md-3  mb-3">
                     <div class="services__item">
                        <i class="fas fa-money-bill"></i>
                        <div class="services__text">
                           <h6>Harga terjangkau</h6>
                           <p>Solusi hemat untuk kebutuhanmu! Nikmati harga terjangkau</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg col-md-3  mb-3">
                     <div class="services__item">
                        <i class="fas fa-cogs"></i>
                        <div class="services__text">
                           <h6>Kualitas bahan</h6>
                           <p>bahan adem/tidak panas,nyerap keringat nyaman dipakai</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Services Section End -->

   <!-- Discount Section Begin -->
   <section class="discount">
      <div class="container">
         <div class="row">
            <div class="line">
               <h1 class="text-center">Flash <span>Sale</span></h1>
               <div class="underline"></div>
            </div>
            <div class="col-md-6 p-0">
               <div class="discount__pic">
                  <img src="images/discount-1.jpg" alt="" />
               </div>
            </div>
            <div class="col-md-6 p-0">
               <div class="discount__text">
                  <div class="discount__text__title">
                     <span>Discount</span>
                     <h2>Event 2024</h2>
                     <h5><span>Sale</span> 50%</h5>
                  </div>
                  <div class="discount__countdown" id="countdown-time">
                     <!-- <div class="countdown__item">
                  <span>22</span>
                  <p>Days</p>
                </div> -->
                     <div class="countdown__item">
                        <span>18</span>
                        <p>Hour</p>
                     </div>
                     <div class="countdown__item">
                        <span>46</span>
                        <p>Min</p>
                     </div>
                     <div class="countdown__item">
                        <span>05</span>
                        <p>Sec</p>
                     </div>
                  </div>
                  <a href="#products">Checkout Sekarang</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Discount Section End -->

   <!-- Products Section Begin -->
   <section class="products" id="products">
      <div class="container">
         <div class="row">
            <div class="line">
               <h1 class="text-center">BEST<span> Produk</span></h1>
               <div class="underline"></div>
            </div>
         </div>

         <div class="row property__gallery justify-content-center">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if (mysqli_num_rows($select_products) > 0) {
               while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                     <div class="product__item" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-sine">
                        <a href="product_detail.php?product_id=<?php echo $fetch_product['id']; ?>"> <!-- Tambahkan hyperlink di sini -->
                           <div class="product__item__pic set-bg" data-setbg="uploaded_img/<?php echo $fetch_product['image']; ?>"></div>
                        </a> <!-- Penutup hyperlink -->
                        <ul class="product__hover">
                           <li>
                              <form action="" method="post">
                              <button type="submit" class="btn" name="add_to_cart" style="background-color: #e8492c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Masukan Keranjang</button>
                                 <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                 <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                 <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                              </form>
                           </li>
                        </ul>
                        <div class="product__item__text">
                           <div class="product__card__name">
                              <h6><a href="#"><?php echo $fetch_product['name']; ?></a></h6>
                              <div class="rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                              </div>
                           </div>
                           <div class="product__price">Rp. <?php echo $fetch_product['price']; ?>0</div>
                        </div>
                     </div>

                  </div>
            <?php
               };
            };
            ?>
         </div>
      </div>

      <!-- Products Section End -->

      <!-- Instagram Begin -->
      <div class="instagram" id="galery">
         <div class="container-fluid">
            <div class="row">
               <div class="line">
                  <h1 class="text-center">Galeri<span> Produk</span></h1>
                  <div class="underline"></div>
               </div>
            </div>
            <div class="row d-flex justify-content-center demo-gallery">
               <ul id="lightgallery" class="list-unstyled">
                  <li class="col-lg-2 col-md-4 col-sm-4 p-0" data-src="images/product/insta-1.jpg" data-sub-html="<h4>Huta Case Custom</h4><p>Pesan Sekarang Juga.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                     <a href="">
                        <img class="img-responsive" src="images/product/insta-1.jpg" alt="Thumb-1" />
                     </a>
                  </li>
                  <li class="col-lg-2 col-md-4 col-sm-4 p-0" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="images/product/insta-2.jpg" data-sub-html="<h4>Huta Case Custom</h4><p>Pesan Sekarang Juga.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                     <a href="">
                        <img class="img-responsive" src="images/product/insta-2.jpg" alt="Thumb-1" />
                     </a>
                  </li>
                  <li class="col-lg-2 col-md-4 col-sm-4 p-0" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="images/product/insta-3.jpg" data-sub-html="<h4>Huta Case Custom</h4><p>Pesan Sekarang Juga.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                     <a href="">
                        <img class="img-responsive" src="images/product/insta-3.jpg" alt="Thumb-1" />
                     </a>
                  </li>
                  <li class="col-lg-2 col-md-4 col-sm-4 p-0" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="images/product/insta-4.jpg" data-sub-html="<h4>Huta Case Custom</h4><p>Pesan Sekarang Juga.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                     <a href="">
                        <img class="img-responsive" src="images/product/insta-4.jpg" alt="Thumb-1" />
                     </a>
                  </li>
                  <li class="col-lg-2 col-md-4 col-sm-4 p-0" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="images/product/insta-5.jpg" data-sub-html="<h4>Huta Case Custom</h4><p>Pesan Sekarang Juga.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                     <a href="">
                        <img class="img-responsive" src="images/product/insta-5.jpg" alt="Thumb-1" />
                     </a>
                  </li>
                  <li class="col-lg-2 col-md-4 col-sm-4 p-0" data-responsive="img/1-375.jpg 375, img/1-480.jpg 480, img/1.jpg 800" data-src="images/product/insta-6.jpg" data-sub-html="<h4>Huta Case Custom</h4><p>Pesan Sekarang Juga.</p>" data-pinterest-text="Pin it1" data-tweet-text="share on twitter 1">
                     <a href="">
                        <img class="img-responsive" src="images/product/insta-6.jpg" alt="Thumb-1" />
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Instagram End -->

      <!-- Review Start -->
      <div class="instagram" id="testimoni">
         <div class="container-fluid">
            <div class="row">
               <div class="line">
                  <h1 class="text-center">Ulasan<span> Pembeli</span></h1>
                  <div class="underline"></div>
               </div>
               <article id="testimoni">
                  <section>
                     <div class="top-testimoni">
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p> Kaosnya sangat nyaman dan kualitas bahannya sangat bagus, Sangat puas dengan pembeliannya!</p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Wifqi</h3>
                           </figcaption>
                        </figure>
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p>kaosnya keren banget dan sangat pas di badan, Warna tidak luntur setelah dicuci.</p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Rizal</h3>
                           </figcaption>
                        </figure>
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p>Pelayanan cepat dan kaosnya sesuai dengan yang di gambar, Sangat merekomendasikan
                                 </p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Budi</h3>
                           </figcaption>
                        </figure>
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p>Bahannya lembut dan adem, sangat cocok untuk sehari-hari, Ukurannya juga pas
                                 </p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Aulia</h3>
                           </figcaption>
                        </figure>
                     </div>
                     <div class="top-testimoni">
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p> Ini kaos favorit saya sekarang, Sangat nyaman dan kualitasnya top, Pengiriman juga cepat</p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Ayu</h3>
                           </figcaption>
                        </figure>
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p>Harga terjangkau dengan kualitas yang luar biasa, Sudah beberapa kali beli di sini dan selalu puas</p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Cecep</h3>
                           </figcaption>
                        </figure>
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p>Saya sangat puas dengan kaos ini, Bahan sangat lembut dan ukuran sesuai dengan yang diharapkan. </p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Puput</h3>
                           </figcaption>
                        </figure>
                        <figure class="testimoni">
                           <figcaption>
                              <blockquote>
                                 <p>Produk ini benar-benar luar biasa, Kaosnya sangat nyaman dan sangat keren.
                                 </p>
                              </blockquote>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <h3>Gibran</h3>
                           </figcaption>
                        </figure>
                     </div>
            </div>
   </section>
   </div>
   </article>

   <!-- Review End -->

   <!-- Contact Section Begin -->
   <section class="contact spad" id="contact">
      <div class="container">
         <div class="row">
            <div class="line">
               <h1 class="text-center">Kontak<span> Person</span></h1>
               <div class="underline"></div>
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
               <div class="contact__content">
                  <div class="contact__address">
                     <h5>Kontak info</h5>
                     <ul>
                        <li>
                           <h6><i class="fa fa-map-marker"></i> Address</h6>
                           <p> Jl. DI Pandjaitan
                              Purwokerto Selatan, Purwokerto Selatan, Banyumas
                              Kode Pos 50142</p>
                        </li>
                        <li>
                           <h6><i class="fa fa-phone"></i> Phone</h6>
                           <p>0857 2233 1911</p>
                        </li>
                        <li>
                           <h6><i class="far fa-envelope"></i> Gmail</h6>
                           <p>wifqiazmi5279@gmail.com</p>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6">

               <div class="contact__form">
                  <h5>KIRIM PESAN</h5>
                  <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                     <strong>Pesan anda berhasil dikirim.</strong>
                  </div>
                  <form id="signupForm1" name="casecontact" method="post">
                     <div class="shadow overflow-hidden card-form sm:rounded-md">
                        <div class="px-4 py-5 sm:p-6">
                           <div class="grid grid-cols-4 gap-6">
                              <div class="col-span-6 sm:col-span-4">
                                 <label for="name" class="block text-sm font-medium text-white">Nama Lengkap</label>
                                 <input type="text" name="nama" id="name" autocomplete="given-name" class=" form-control mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required />

                              </div>

                              <div class="col-span-6 sm:col-span-4">
                                 <label for="email" class="block text-sm font-medium text-white">Email</label>
                                 <input type="email" name="email" id="email" autocomplete="email" class="form-control mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required />
                              </div>

                              <div class="col-span-6 sm:col-span-4">
                                 <label for="pesan" class="block text-sm font-medium text-white">Pesan</label>
                                 <div class="mt-1">
                                    <textarea id="pesan" name="pesan" rows="3" class="form-control shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" required></textarea>
                                    <div class="invalid-feedback">
                                       Please enter a message in the textarea.
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <div class="px-4 py-3 text-left sm:px-6">
                              <button type="submit" class="site-btn btn-kirim">Kirim pesan</button>

                              <button class="site-btn btn-loading d-none" type="button" disabled>
                                 <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                 Loading...
                              </button>
                           </div>
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Contact Section End -->


   <!-- Footer Section Begin -->
   <footer class="footer">
      <div class="container">
         <div class="row justify-content-evenly">
            <div class="col-lg-4 col-md-6 col-sm-7">
               <div class="footer__about">
                  <p>PAYMENT PARTNERS</p>
                  <div class="footer__payment">
                     <a href="#"><img src="images/payment-1.png" alt="" /></a>
                     <a href="#"><img src="images/payment-2.png" alt="" /></a>
                     <a href="#"><img src="images/payment-3.png" alt="" /></a>
                     <a href="#"><img src="images/payment-4.png" alt="" /></a>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-5">
               <div class="footer__widget">
                  <p><a href="https://saweria.co/ramsonrjg" target="blank">Kirim dukungan </a></p>
                  <div class="footer__logo">
                     <img src="images/saweria.jpg" alt="" />
                  </div>
               </div>
            </div>

            <div class="col-lg-4 col-md-8 col-sm-8">
               <div class="footer__newslatter">
                  <h6>Kontak E-mail</h6>
                  <form action="" target="blank">
                     <input type="text" placeholder="Email" />
                     <button type="submit" class="site-btn"> <a href="https://www.youtube.com/channel/UCVTCKVQf3deWY7g9WcC3Dzg?sub_confirmation=1" target="blank">Subscribe</a> </button>
                  </form>
                  <div class="footer__social">
                     <a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook"></i></a>
                     <a href="https://youtu.be/LWn7vo1TlBw?si=NdX-Tp2UZ01wub_l" target="blank"><i class="fab fa-youtube"></i></a>
                     <a href="https://www.instagram.com/wifqiazmi/" target="blank"><i class="fab fa-instagram"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               <div class="footer__copyright__text">
                  <p>
                     Copyright &copy;
                     <script>
                        document.write(new Date().getFullYear());
                     </script>
                     | made with by <a href="https://github.com/wifqiazmi" target="_blank">wifqiazmi</a> <i class="fab fa-github" aria-hidden="true" style="color: white;"></i>

                  </p>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- Footer Section End -->

   <!-- WA -->
   <div class="wa" id="myDiv"></div>

   <!-- Js Plugins -->
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/swiper-bundle.min.js"></script>
   <script src="js/anime.min.js"></script>
   <script src="js/venom-button.min.js"></script>
   <script src="js/lightgallery.js"></script>
   <script src="js/lg-pager.js"></script>
   <script src="js/lg-autoplay.js"></script>
   <script src="js/lg-fullscreen.js"></script>
   <script src="js/lg-zoom.js"></script>
   <script src="js/lg-share.js"></script>
   <script src="js/jquery.countdown.min.js"></script>
   <script src="js/jquery.validate.js"></script>
   <script src="js/aos.js"></script>
   <script>
      lightGallery(document.getElementById('lightgallery'));
   </script>
   <script src="js/main.js"></script>

   <script>
      AOS.init();





      /*------------------
          CountDown
      --------------------*/
      // For demo preview start
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      if (mm == 12) {
         mm = '01';
         yyyy = yyyy + 1;
      } else {
         mm = parseInt(mm) + 1;
         mm = String(mm).padStart(2, '0');
      }
      var timerdate = mm + '/' + dd + '/' + yyyy;
      // For demo preview end


      // Uncomment below and use your date //

      /* var timerdate = "2020/12/30" */

      $("#countdown-time").countdown(timerdate, function(event) {
         $(this).html(event.strftime("<div class='countdown__item'><span>%D</span> <p>Day</p> </div>" + "<div class='countdown__item'><span>%H</span> <p>Hour</p> </div>" + "<div class='countdown__item'><span>%M</span> <p>Min</p> </div>" + "<div class='countdown__item'><span>%S</span> <p>Sec</p> </div>"));
      });
   </script>

</body>

</html>