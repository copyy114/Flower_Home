<?php session_start();?>
<?php include('header.html'); ?>

<main id="main">

  <!-- ======= Gallery Section ======= -->
  <section id="flower_25" >
    <div class="container">
      <div class="section-title">
        <h2 style="font-family: Kanit, sans-serif;">ดอกไม้จับราคา</h2>
        <hr>
      </div>
      <form method="get" action="">
          <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="ค้นหาสินค้า" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button class="btn btn-primary" type="submit">ค้นหา</button>
          </div>
        </form>
      <div class="row">

      <?php
        include("conn.php");
        include("functions.php");

        // รับค่าการค้นหาจากฟอร์ม
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // รับค่าหน้าปัจจุบันจาก URL หรือค่าเริ่มต้นเป็น 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // ประเภทสินค้า
        $type_shops = ['price_of_flowers'];

        // เรียกฟังก์ชันแสดงสินค้า
        displayProducts($conn, $type_shops, $currentPage, 6, $search);

        $conn->close();
      ?>
      </div>
    </div>
  </section><!-- End Chefs Section -->

  <!-- ======= Contact Section ======= -->

</main><!-- End #main -->

<?php include('footer.html'); ?>
