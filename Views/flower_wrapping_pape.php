<?php session_start();?>
<?php include('..\header-footer\header_view.php');  ?>



<main id="main">

  <!-- ======= Gallery Section ======= -->
  <section id="flower_25" >
    <div class="container">
      <div class="section-title">
        <h2 style="font-family: Kanit, sans-serif;">กระด่าษห่อดอกไม้</h2>
        <hr>
      </div>
      <?php include('..\config\search.php');  ?>

      <div class="row">

      <?php
        include('..\data\conn.php');
        include('..\config\functions.php'); // รวมไฟล์ที่มีฟังก์ชัน


        // รับค่าการค้นหาจากฟอร์ม
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // รับค่าหน้าปัจจุบันจาก URL หรือค่าเริ่มต้นเป็น 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // ประเภทสินค้า
        $type_shops = ['flower_wrapping_pape'];

        // เรียกฟังก์ชันแสดงสินค้า
        displayProducts($conn, $type_shops, $currentPage, 8, $search);

        $conn->close();
      ?>
   
      </div>
    </div>
  </section><!-- End Chefs Section -->

  <!-- ======= Contact Section ======= -->

</main><!-- End #main -->

<?php include('..\header-footer\footer.php'); ?>
