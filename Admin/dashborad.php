<?php  
    include('..\Admin\config\header-admin.php'); 
    include('..\data\conn.php'); // รวมไฟล์เชื่อมต่อฐานข้อมูล 
    include('..\config\functions.php'); // รวมไฟล์ที่มีฟังก์ชัน
    
    // เรียกใช้งานฟังก์ชันเพื่อหาผลรวม
    $totalQuantity = getTotalQuantity($conn);
    $totalAmountSum = getTotalAmount($conn);
    $totalProduct = getTotalProduct($conn);
    $totalUser = getTotalUser($conn);
    


// ดึงข้อมูลผู้ใช้สำหรับตาราง
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

    ?>

<section id="dashborad">
  <div class="container">
    <main class="main-content position-relative border-radius-lg ">
      <div class="container-fluid py-4 bg-admin">
        <div class="row">
        <div class="col-xl-5 col-md-6 mb-4"></div>
          <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="manage_user.php" class="text-decoration-none">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         User
                        </div>
                        <div class="h20 mb-0 font-weight-bold text-gray-800">
                         เพิ่มข้อมูลผู้เข้าใช้งาน
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        </div>
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="container container-edit ">
            <?php 
            if ($result->num_rows > 0) {
                echo "<h1>ข้อมูลผู้ใช้</h1>";
                echo "<table border='1'>";
                echo "<tr><th>ชื่อ</th><th>วันเวลาเข้าสู่ระบบล่าสุด</th><th>ดูข้อมูล</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['last_login']) . "</td>";
                    echo "<td>
                           <a href='manage_user.php'><i class='fa fa-eye' style='font-size:20px;color:green'></i></a>

                        </td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "ไม่มีข้อมูลผู้ใช้";
            }

            $conn->close();
            ?>
        </div>
    </div>
  </div>



  </div>
  </main>
  </div>

</section>


<?php include('..\footer.html'); ?>