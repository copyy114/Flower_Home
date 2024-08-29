

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
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sarabun:ital,wght@0,300;1,100&display=swap" rel="stylesheet">

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
  <style>
    body{
      font-family: "Kanit", sans-serif !important;

    }

  </style>
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
          <li><a class="nav-link scrollto active" href="index.php" href="#hero">หน้าแรก</a></li>
          <li><a class="nav-link scrollto" href="#about">สินค้าขายดี</a></li>
          <li><a class="nav-link scrollto" href="#chefs">สมาชิก</a></li>

          <!-- <li><a class="nav-link scrollto" href="#gallery">แกลอรี่</a></li> -->
          <li class="dropdown"><a href="#"><span>สั่งซื้อสินค้า</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>ดอกไม้</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="flower_25.php" href="#flower_25">ดอกไม้ช่อ 25 บาท</a></li>
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
              <hr>
              <li><a href="add.php">เพิ่มข้อมูล</a></li>

            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#events">โปรโมชั่น</a></li>
          <li><a class="nav-link scrollto" href="#gallery">แกลอรี่</a></li>
          <li><a class="nav-link scrollto" href="#contact">ติดต่อ</a></li>
          <li class="dropdown"><a href="#"><span>ตั้งค้าผู้ใช้</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                <style>
                  .edit-session-user{
                  background: #e6e6e6;
                  color: #FFF; 
                  font-size: 15px; 
                  background-color: rgb(228, 64, 201);
                  padding : 10px;
                    border-radius: 8px;

                  }
               </style>
                    <h5 class="container-fluid">
                      <?php
                      @ini_set('display_errors', '0');
                      $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'ผู้ใช้';

                      echo '<div class="edit-session-user">';
                      echo 'สวัสดี ' . htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
                      echo '</div>';
                      ?>
                  </h5>
              
                <?php $isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;?>
                 
                  <h5 class="container-fluid">
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
    background-color: #ffffff; /* พื้นหลังของเมนูตะกร้า */
    color: #000000; /* สีของข้อความในเมนูตะกร้า */
    padding: 15px;
    border-radius: 20px; /* มุมโค้ง */
    margin-bottom: 0;
}

/* สไตล์สำหรับจำนวนสินค้าตะกร้า */
#cart_count {
    background-color: #e95ba2; /* พื้นหลังของจำนวนสินค้า */

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
    <style>
        .container{
            margin-top: 10% ;
            background-color:#ffdee0 ;
            padding: 20px;
            border-radius: 20px;
        }
        .price-details{
          padding: 10px; 
        }

      .container-edit-new{
            margin-top: 7% ;

      }
      .container-nbg {
            /* margin-top: 5% ; */
            padding: 20px;
            border-radius: 20px;
        }
        .container-edit{
            /* margin-top: 10% ; */
            background-color:#ffdee0 ;
            padding: 20px;
            border-radius: 20px;
        }
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    img {
        max-width: 100px; /* ปรับขนาดรูปภาพให้เหมาะสม */
        height: auto;
    }

        
        body {
  font-family: "Kanit", sans-serif !important;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        form .form-edit {
           
            border-radius: 8px;
            background-color: #000;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #ff2d00;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input[type="reset"]:hover {
            background-color: #cf2500;
        }
        
        .form-group {
            margin-bottom: 12px;
        }
        .message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

</style>