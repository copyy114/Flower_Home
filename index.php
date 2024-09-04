<?php include('header.php'); ?> 

<!-- <style>
  .container{
    background-color: #fff2f3;
  }
</style> -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/flower-vdo.png");'>
            <a href="assets/VDO/VDO.mp4" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

          <div class="content"> 
              <h3><strong>Flower's Home </strong> บริการรับจัดช่อดอกไม้ ส่งดอกไม้ครบวงจร </h3>

              <p class="fst-italic">
              Flowers speak louder than words ให้ดอกไม้สื่อแทนความรู้สึกดี ๆ และเติมเต็มช่วงเวลาที่แสนพิเศษให้น่าจดจำยิ่งขึ้น
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i>
                  ร้านดอกไม้ Flower's Home  เป็นร้านขายดอกไม้ ให้บริการรับจัดดอกไม้ ช่อดอกไม้ กระเช้าดอกไม้ ดอกไม้รหรับเทศกาล โอกาสพิเศษ วันสำคัญต่างๆ 
              </li>
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

    <!-- ======= member Section ======= -->
    <section id="member" class="chefs">
      <div class="container">

        <div class="section-title">
          <h2 style="font-family: Kanit, sans-serif;" >สมาชิก <span>ในกลุ่ม</span></h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic">
                <div class="pic_edit"><img src="assets/img/member/member-1.jpg" class="img-fluid" alt=""></div>
              </div>
              <div class="member-info">
                <h4>น.ส.ณิชากร ไพบูลย์</h4>
                <span>เทคโนโลยีสารสนเทศ</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/member/member-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>น.ส.ฐิติพน กรอบเพ็ชร</h4>
                <span>เทคโนโลยีสารสนเทศ</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/member/member-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>น.ส.สุภิสรา บุญนุ้ย</h4>
                <span>เทคโนโลยีสารสนเทศ</span>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End member Section -->

    <!-- ======= comment Section ======= -->
    <section id="comment" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/ออย.jpg" class="testimonial-img" alt="">
                <h3>ญาณัจฉรา ชูเล็ก</h3>
                <h4>ชื่อเล่นออย</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  ชิ้นงานดูดี น่าชื่นชม เยี่ยมมม สุดยอดมากก เก่งสุด ดอกไม้สวยสุดๆ
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End comment item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/ฟู.jpg" class="testimonial-img" alt="">
                <h3>ณัชปฏิภาณ  พิกุลศรี</h3>
                <h4>ชื่อเล่นฟูจิ</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  ความก้าวหน้าเล็กๆ น้อยๆ ในแต่ละวัน นำมาซึ่งผลลัพธ์ที่ยิ่งใหญ่
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End comment item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/นาว.jpg" class="testimonial-img" alt="">
                <h3>ฐิติรัตน์ ชูเพชร</h3>
                <h4>ชื่อเล่นมะนาว</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  ห่อหุ้มตัวเองด้วยความแกร่ง อุ้มตัวเองด้วยความมั่นใจ และก้าวต่อไปให้ถึงจุดหมาย
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End comment item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/โด.jpg" class="testimonial-img" alt="">
                <h3>กมลรัตน์ สุขเกษม</h3>
                <h4>ชื่อเล่นโดนัท</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  ผู้หญิงทุกคนเป็นผู้หญิงทำงาน… มีเพียงไม่กี่คนเท่านั้นที่ได้รับเงินเดือน (ประชด) 
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End comment item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/นัท.jpg" class="testimonial-img" alt="">
                <h3>นันทิยา ขาวสังข์</h3>
                <h4>ชื่อเล่นนัท</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  ไม่มีอะไรได้มาง่ายๆ ต้องขยันและอดทนเท่านั้น! 
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End comment item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End comment  Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 style="font-family: Kanit, sans-serif;" ><span>ติดต่อ</span> เรา</h2>
          <!-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
       <hr>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=7.61557797015850,100.0809003208509+(My%20Business%20Name)&amp;t=k&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
            <div class="container mt-5">

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 
  <?php include('footer.php'); ?> 
