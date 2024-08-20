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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">รายการสั่งซื้อ</p>
                    <h5 class="font-weight-bolder">
                        ทั้งหมด: <?php echo htmlspecialchars($totalQuantity); ?> รายการ
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนเงินที่ได้รับ</p>
                    <h5 class="font-weight-bolder">
                        ทั้งหมด: <?php echo htmlspecialchars($totalAmountSum); ?> บาท
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนสินค้า</p>
                    <h5 class="font-weight-bolder">
                    ทั้งหมด: <?php echo htmlspecialchars($totalProduct); ?> ชิ้น
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">จำนวนผู้ใช้งาน</p>
                    <h5 class="font-weight-bolder">
                        ทั้งหมด: <?php echo htmlspecialchars($totalUser); ?> คน
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
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
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
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