<?php 
@ini_set('display_errors', '0');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Flower's Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/logoheader.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/31da23dcf7.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sarabun:ital,wght@0,300;1,100&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Updated: May 16 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 11:00 AM - 23:00 PM</span></i>
    </div>
  </section> -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.php">Flower's Home <i class="fa-brands fa-pagelines"></i></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">หน้าแรก</a></li>
          <li><a class="nav-link scrollto" href="#best-seller">สินค้าขายดี</a></li>
          <li><a class="nav-link scrollto" href="#member">สมาชิก</a></li>

          <!-- <li><a class="nav-link scrollto" href="#gallery">แกลอรี่</a></li> -->
          <li class="dropdown"><a href="#"><span>สั่งซื้อสินค้า</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>ดอกไม้</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="Views/flower_25.php" href="#flower_25">ดอกไม้ราคา 25</a></li>
                  <li><a href="expensive_flowers.php">ดอกไม้ราคาแพง</a></li>

                </ul>
              </li>
              <li><a href="bunch_of_flowers.php">ช่อดอกไม้</a></li>
              <li><a href="flower_vase.php">แจกันดอกไม้</a></li>
              <li><a href="flower_basket.php">กระเช้าดอกไม้</a></li>
              <li><a href="bouquet_of_money.php">ช่อเงิน</a></li>
              <li><a href="price_of_flowers.php">ดอกไม้จับราคา</a></li>
              <li><a href="flower_wrapping_pape.php">กระด่าษห่อดอกไม้</a></li>
              <li><a href="other_equipment.php">อุปกรณ์อื่นๆ</a></li>

            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#promotion">โปรโมชั่น</a></li>
          <li><a class="nav-link scrollto" href="#gallery">แกลอรี่</a></li>
          <li><a class="nav-link scrollto" href="#contact">ติดต่อ</a></li>
          <li class="dropdown"><a href="#"><span>ตั้งค่าผู้ใช้</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <style>
                  .edit-session-user {
                    background: #e6e6e6;
                    color: #FFF;
                    font-size: 15px;
                    background-color: rgb(228, 64, 201);
                    padding: 10px;
                    border-radius: 8px;

                  }
                </style>
                <h5 class="container">
                  <?php
                      @ini_set('display_errors', '0');
                      $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'ผู้ใช้';

                      echo '<div class="edit-session-user">';
                      echo 'สวัสดี ' . htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
                      echo '</div>';
                      ?>
                </h5>

                <?php $isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;?>

                <h5 class="container">
                  <div>
                    <?php
                                if ($isLoggedIn) {
                                    echo '<a href="logout.php" class="btn btn-success" style="color: white;">ออกจากระบบ<i class="fas fa-sign-out"></i></a>';
                                } else {
                                    echo '<a href="login.php" class="btn btn-danger" style="color: white;">เข้าสู่ระบบ <i class="fas fa-sign-in"></i></a>';
                                }
                              ?>

                  </div>
                </h5>

              </li>
              <li>

              </li>

            </ul>
          </li>





          <style>
            .cart {
              background-color: #ffffff;
              /* พื้นหลังของเมนูตะกร้า */
              color: #000000;
              /* สีของข้อความในเมนูตะกร้า */
              padding: 15px;
              border-radius: 20px;
              /* มุมโค้ง */
              margin-bottom: 0;
            }

            /* สไตล์สำหรับจำนวนสินค้าตะกร้า */
            #cart_count {
              background-color: #e95ba2;
              /* พื้นหลังของจำนวนสินค้า */

              border-radius: 5px;
              padding: 5px 15px;
              margin-left: 10px;
              font-weight: bold;
            }
          </style>
          <li>
            <a href="cart.php" class="nav-item nav-link active">
              <h5 class="px-5 cart">
                <i class="fas fa-shopping-cart"></i>
                <?php
                    if (isset($_SESSION['cart'])){
                        $count = 0;
                        foreach($_SESSION['cart'] as $v){
                            $count += $v;
                        }
                        echo "<span id=\"cart_count\" class=\"text-light\">$count</span>";
                    } else {
                        echo "<span id=\"cart_count\" class=\"text-light\">0</span>";
                    }
                    ?>
                สินค้า
              </h5>
            </a>
          </li>


        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> -->

    </div>
  </header><!-- End Header -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>


        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-11.jpg);">

          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-22.jpg);">

          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-33.jpg);">

          </div>

        </div>


        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->