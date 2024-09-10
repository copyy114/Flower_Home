<?php include('header.php'); ?> 


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/ปก.png");'>
            <a href="assets/VDO/VDO.mp4" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

          <div class="content"> 
              <h3><strong>การเดินทางไปร้าน</strong> Flower's Home  </h3>

              <p class="fst-italic">
              Flowers speak louder than words ให้ดอกไม้สื่อแทนความรู้สึกดี ๆ และเติมเต็มช่วงเวลาที่แสนพิเศษให้น่าจดจำยิ่งขึ้น
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i>
                  ใครที่เดินทางมาจาก จังหวัดตรัง ต้องผ่านวิทยาลัยเทคนิคพัทลุง เจอสี่เเยกไฟเเดงโคลีเซียม เเล้วให้เลี้ยวขวาตรงไปได้เลย ขับตรงยาวไปก็จะเจอกับร้านเครื่องเขียนที่อยู่ฝั่งซ้ายมือ เเละขวามือก็จะเจอกับร้าน Flower's Home 
                <!-- <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li> -->
                <!-- <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li> -->
              </ul>
             
            </div>

          </div>

        </div>
   
      </div>
    
    </section><!-- End About Section -->

    <!-- ======= best-seller Section ======= -->
    <section id="best-seller" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>สินค้า<span>ขายดี</span></h2>
          <p>ทางร้านเราขอแนะนำลูกค้า สำหรับสินค้าที่เป็นที่นิยมของทางร้าน..</p>
        </div>
        <div class="row">
          <?php
            include('data\conn.php');
            include('config\functions.php'); // รวมไฟล์ที่มีฟังก์ชัน
            displayRecommendedProducts($conn);
            $conn->close();
          ?>
        </div>
      </div>
    </section><!-- End best-seller Section -->
    
    <!-- ======= promotion Section ======= -->
    <section id="promotion" class="events">
      <div class="container">

        <div class="section-title">
          <h2>โปร<span>โม</span>ชั่น</h2>
        </div>

        <div class="events-slider swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/ร้าน.png" class="img-fluid img-fluid-edit-promotion" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>เเนะนำหน้าร้าน</h3>
                  <div class="price"> 
                    <p><span>฿189</span></p>
                  </div>
                  <p class="fst-italic">
                   ร้าน อุปกรณ์เครื่องเขียน และ ร้านดอกไม้flower's home
                  </p>
                  
                  
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/โปรโมชั่น1.png" class="img-fluid img-fluid-edit-promotion" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>โปรโมชั่น</h3>
                  <div class="price">
                    <p><span>฿290</span></p>
                  </div>
                  <p class="fst-italic">
                    สำหรับโปรโมชั้น โปรวันเเม่ ใครสนใจก็รีบมาสั่งน๊า 
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i> ดอกไม้ช่อเงิน ใบ20.</li>
                    <li><i class="bi bi-check-circle"></i> ดอกไม้ช่อเงิน ใบ50.</li>
                    <li><i class="bi bi-check-circle"></i> ดอกไม้ช่อเงิน ใบ100.</li>
                  </ul>
                  <p>
                   หมดโปร 12 สิงหาคม 2567 เท่านั้น!!!
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="assets/img/เเจกัน.png" class="img-fluid img-fluid-edit-promotion" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>ช่อดอกไม้ เเจกัน</h3>
                  <div class="price">
                    <p><span>฿350</span></p>
                  </div>
                  <p class="fst-italic">
                    ใครสนใจเเจกกันดอกไม้สวยๆสามารถกดลงตะกร้า หรือเดินทางไปดูที่ร้าน flower's Home
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circle"></i>เเจกันดอกไม้ สีขาว.</li>
                    <li><i class="bi bi-check-circle"></i> เเจกันดอกไม้ สีเเดง-สีขาว.</li>
                    <li><i class="bi bi-check-circle"></i> เเจกันดอกไม้ สีเเดง.</li>
                  </ul>
          
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End promotion Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2 style="font-family: Kanit, sans-serif;">แหล่ง <span>แกลอรี่</span></h2>
        </div>

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก1.jpg" class="gallery-lightbox">
                <img src="assets/img/ก1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก2.jpg" class="gallery-lightbox">
                <img src="assets/img/ก2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก3.jpg" class="gallery-lightbox">
                <img src="assets/img/ก3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก4.jpg" class="gallery-lightbox">
                <img src="assets/img/ก4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก5.jpg" class="gallery-lightbox">
                <img src="assets/img/ก5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก6.jpg" class="gallery-lightbox">
                <img src="assets/img/ก6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก7.jpg" class="gallery-lightbox">
                <img src="assets/img/ก7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/ก9.jpg" class="gallery-lightbox">
                <img src="assets/img/ก9.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

   
   

  </main><!-- End #main -->

 
  <?php include('footer.php'); ?> 
