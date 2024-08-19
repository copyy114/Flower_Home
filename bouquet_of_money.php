<?php session_start();?>
<?php include('header.html'); ?>

<main id="main">

  <!-- ======= Gallery Section ======= -->
  <section id="flower_25" >
    <div class="container">
      <div class="section-title">
        <h2 style="font-family: Kanit, sans-serif;">ช่อเงิน</h2>
        <hr>
      </div>

      <div class="row">
      <?php
        include("conn.php");
        include("functions.php");

        $type_shops = ['bouquet_of_money'];
        displayProducts($conn, $type_shops);

        $conn->close();
      ?>
      </div>
    </div>
  </section><!-- End Chefs Section -->

  <!-- ======= Contact Section ======= -->

</main><!-- End #main -->

<?php include('footer.html'); ?>
