<?php  
    include('..\Owner\config\header-owner.php'); 
    include('..\data\conn.php'); // รวมไฟล์เชื่อมต่อฐานข้อมูล 
    include('..\config\functions.php'); // รวมไฟล์ที่มีฟังก์ชัน
    
    // เรียกใช้งานฟังก์ชันเพื่อหาผลรวม
    $totalQuantity = getTotalQuantity($conn);
    $totalAmountSum = getTotalAmount($conn);
    $totalProduct = getTotalProduct($conn);
    $totalUser = getTotalUser($conn);
    
    $conn->close();


  ?>

<section id="dashborad">
  <div class="container">
    <main class="main-content position-relative border-radius-lg ">
      <div class="container-fluid py-4 bg-admin">
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      รายการสั่งซื้อ</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">ทั้งหมด: <?php echo htmlspecialchars($totalQuantity); ?> ชิ้น</div>
                  </div>
                  <div class="col-auto">
                  <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      จำนวนเงินที่ได้รับ</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">ทั้งหมด: <?php echo htmlspecialchars($totalAmountSum); ?> บาท</div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-solid fa-baht-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
          <a href="manage_product.php" class="text-decoration-none">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">จำนวนสิ้นค้า
                    </div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">ทั้งหมด: <?php echo htmlspecialchars($totalProduct); ?> รายการ</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
          <a href="is_Recommend.php" class="text-decoration-none">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">สินค้าแนะนำ
                    </div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">จัดการสินค้าแนะนำ</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-star fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
      </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">รายการสั่งซื้อ</h6>
          </div>
        </div>
        <div class="table-responsive">
        <?php
          include('..\data\conn.php');

          // กำหนดจำนวนรายการต่อหน้า
        // กำหนดจำนวนรายการต่อหน้า
        $items_per_page = 5;
          
        // ดึงหน้าปัจจุบันจาก URL parameter หรือตั้งเป็น 1 ถ้าไม่มี
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        // คำนวณ OFFSET สำหรับ SQL query
        $offset = ($current_page - 1) * $items_per_page;
        
        // SQL query เพื่อนับจำนวนรายการทั้งหมด
        $count_sql = "SELECT COUNT(*) as total FROM order_items";
        $count_result = $conn->query($count_sql);
        $total_items = $count_result->fetch_assoc()['total'];
        
        // คำนวณจำนวนหน้าทั้งหมด
        $total_pages = ceil($total_items / $items_per_page);
        
        // SQL query หลักพร้อม LIMIT และ OFFSET, เรียงลำดับตาม order_items.id ล่าสุด

$sql = "SELECT 
          oi.id AS order_item_id,
          o.id AS order_id,
          o.name AS buyer_name,
          p.id AS product_id,
          p.name AS product_name,
          -- p.product_price AS price,
          oi.quantity,
          oi.is_new
      FROM 
          order_items oi
      JOIN 
          orders o ON oi.order_id = o.id
      JOIN 
          tbproduct p ON oi.product_id = p.id
      ORDER BY oi.id DESC
      LIMIT $items_per_page OFFSET $offset";

try {
  $result = $conn->query($sql);

  if ($result) {
      if ($result->num_rows > 0) {
          echo '<table class="table align-items-center">';
          echo '<tbody>';
          
          $row_number = ($current_page - 1) * $items_per_page + 1;
          
          while($row = $result->fetch_assoc()) {
              $row_class = $row_number == 1 ? 'table-primary' : '';
              $new_badge = $row['is_new'] ? '<span class="badge bg-success new-badge" data-id="' . $row['order_item_id'] . '">ใหม่</span>' : '';
              
              echo "<tr class='$row_class'>
                      <td class='w-30'>
                        <div class='d-flex px-2 py-1 align-items-center'>
                          <div class='ms-4'>
                            <p class='text-xs font-weight-bold mb-0'>รายการที่ $row_number $new_badge</p>
                            <h6 class='text-sm mb-0'>" . htmlspecialchars($row["product_name"]) . "</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class='text-center'>
                          <p class='text-xs font-weight-bold mb-0'>ราคา:</p>

                        </div>
                      </td>
                      <td>
                        <div class='text-center'>
                          <p class='text-xs font-weight-bold mb-0'>จำนวน:</p>
                          <h6 class='text-sm mb-0'>" . $row["quantity"] . " ชิ้น</h6>
                        </div>
                      </td>
                      <td>
                        <div class='text-center'>
                          <p class='text-xs font-weight-bold mb-0'>ผู้สั่งซื้อ:</p>
                          <h6 class='text-sm mb-0'>" . htmlspecialchars($row["buyer_name"]) . "</h6>
                        </div>
                      </td>
                    </tr>";
              
              $row_number++;
          }
          
          echo '</tbody>';
          echo '</table>';

            // แสดงปุ่มนำทาง
                    echo '<div class="pagination">';
                    
                    // ปุ่มไปหน้าแรก
                    echo '<a href="?page=1" class="btn btn-sm btn-primary' . ($current_page == 1 ? ' disabled' : '') . '">หน้าแรก</a>';
        
                    // ปุ่มตัวเลขหน้า
                    $start_page = max(1, $current_page - 1);
                    $end_page = min($total_pages, $start_page + 2);
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        echo '<a href="?page=' . $i . '" class="btn btn-sm ' . ($i == $current_page ? 'btn-info' : 'btn-primary') . '">' . $i . '</a>';
                    }
        
                    // ปุ่มไปหน้าถัดไป
                    if ($current_page < $total_pages) {
                        echo '<a href="?page=' . ($current_page + 1) . '" class="btn btn-sm btn-primary">หน้าถัดไป</a>';
                    }
        
                    // ปุ่มไปหน้าสุดท้าย
                    echo '<a href="?page=' . $total_pages . '" class="btn btn-sm btn-primary' . ($current_page == $total_pages ? ' disabled' : '') . '">หน้าสุดท้าย</a>';
        
                    echo '</div>';
      } else {
          echo "ไม่พบข้อมูล";
      }
  } else {
      throw new Exception("เกิดข้อผิดพลาดในการดึงข้อมูล");
  }
} catch (Exception $e) {
  echo "เกิดข้อผิดพลาด: " . htmlspecialchars($e->getMessage());
  error_log("Database error: " . $e->getMessage());
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.new-badge').forEach(function(badge) {
      badge.addEventListener('click', function() {
          var orderId = this.getAttribute('data-id');
          fetch('update_new_status.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: 'order_item_id=' + orderId
          })
          .then(response => response.json())
          .then(data => {
              console.log('Server response:', data);  // เพิ่ม log
              if (data.success) {
                  this.style.display = 'none';
                  // เพิ่มการ refresh หน้าเว็บ
                  setTimeout(() => {
                      location.reload();
                  }, 500);  // รอ 500ms ก่อน refresh เพื่อให้ผู้ใช้เห็นการเปลี่ยนแปลง
              } else {
                  console.error('Update failed:', data.message);
              }
          })
          .catch((error) => {
              console.error('Error:', error);
          });
      });
  });
});
</script>
        </div>
      </div>
    </div>
    <!-- <div class="col-lg-5">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">#</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-mobile-button text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">ยังไม่แสดง</h6>

                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                    class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-tag text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">    
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                    class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>


          </ul>
        </div>
      </div>
    </div> -->
  </div>



  </div>
  </main>
  </div>

</section>


<?php include('..\header-footer\footer.php'); ?>
