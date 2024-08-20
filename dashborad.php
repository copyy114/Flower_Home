<?php 
    include('header-admin.php'); 
    include('conn.php'); // รวมไฟล์เชื่อมต่อฐานข้อมูล
    include('functions.php'); // รวมไฟล์ที่มีฟังก์ชัน
    
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
            <a href="manage_user.php" class="text-decoration-none">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        จำนวนผู้ใช้งาน
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        ทั้งหมด: <?php echo htmlspecialchars($totalUser); ?> คน
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-group fa-2x text-gray-300"></i>
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
          <table class="table align-items-center ">
            <tbody>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="./assets/img/icons/flags/GB.png" alt="รูป">
                    </div>
                    <div class="ms-4">
                      <p class="text-xs font-weight-bold mb-0">รายละเอียด</p>
                      <h6 class="text-sm mb-0">ดอกไม่กุหลาบ</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">ราคา:</p>
                    <h6 class="text-sm mb-0">1000</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">จำนวน:</p>
                    <h6 class="text-sm mb-0">3 ชิ้น</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <p class="text-xs font-weight-bold mb-0">ผู้สั่งซื้อ:</p>
                    <h6 class="text-sm mb-0">xxx</h6>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
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
                  <!-- <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span> -->
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
                  <!-- <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                      <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span> -->
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
    </div>
  </div>



  </div>
  </main>
  </div>

</section>


<?php include('footer.html'); ?>