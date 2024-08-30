<?php 
    include('..\Owner\config\header-owner.php'); 
    include('..\data\conn.php'); // รวมไฟล์เชื่อมต่อฐานข้อมูล
    
?>

<section id="product">
    <div class="container text-center ">
        <h1>เพิ่มข้อมูลสินค้า</h1>
        <form action="addproduct.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">ชื่อสินค้า</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="file" class="col-sm-3 control-label">รูปภาพ</label>
                    <div class="col-sm-9">
                        <input type="file" name="img_path" id="file" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="description" class="col-sm-3 control-label">รายละเอียด</label>
                    <div class="col-sm-9">
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="prev_price" class="col-sm-3 control-label">ราคาเดิม</label>
                    <div class="col-sm-9">
                        <input type="number" name="prev_price" id="prev_price" class="form-control" step="0.01"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="current_price" class="col-sm-3 control-label">ราคาโปรโมชั่น</label>
                    <div class="col-sm-9">
                        <input type="number" name="current_price" id="current_price" class="form-control" step="0.01"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="type_shop" class="col-sm-3 control-label">ประเภทสินค้า</label>
                    <div class="col-sm-9">
                        <select name="type_shop" id="type_shop" class="form-control" required>
                            <option value="flower_25">ดอกไม้ราคา 25</option>
                            <option value="expensive_flowers">ดอกไม้ราคาแพง</option>
                            <option value="bunch_of_flowers">ช่อดอกไม้</option>
                            <option value="flower_vase">แจกันดอกไม้</option>
                            <option value="flower_basket">กระเช้าดอกไม้</option>
                            <option value="bouquet_of_money">ช่อเงิน</option>
                            <option value="price_of_flowers">ดอกไม้จับราคา</option>
                            <option value="flower_wrapping_pape">กระด่าษห่อดอกไม้</option>
                            <option value="other_equipment">อุปกรณ์อื่นๆ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="เพิ่ม">
                </div>
                <div class="col-6">
                    <input type="reset" name="btn_insert" class="btn btn-success" value="ยกเลิก">
                </div>

            </div>
        </form>


        <hr>
        <!-- table edit,delete,view -->
        <?php

            include('..\data\conn.php'); // รวมไฟล์เชื่อมต่อฐานข้อมูล
            include('..\config\functions.php'); // รวมไฟล์ที่มีฟังก์ชัน

            // กำหนดจำนวนรายการต่อหน้า
            $items_per_page = 3;

            // ตรวจสอบการคลิกปุ่ม "ยกเลิก" เพื่อรีเซ็ตค่าการค้นหา
            if (isset($_POST['reset'])) {
                // รีเซ็ตค่าการค้นหา
                $search = '';
                // แสดงหน้าจอใหม่หลังจากรีเซ็ต
                $_GET['search'] = $search;
            } else {
                // ดึงค่าการค้นหาจาก POST หรือ GET
                $search = isset($_POST['search']) ? $_POST['search'] : (isset($_GET['search']) ? $_GET['search'] : '');
            }

            // ดึงหมายเลขหน้าปัจจุบันจาก GET
            $page = getPageNumber();

            // คำนวณค่า offset จากหน้าปัจจุบัน
            $offset = ($page - 1) * $items_per_page;

            // ดึงจำนวนรายการทั้งหมด
            $total_items = getTotalItems($conn, $search);

            // คำนวณจำนวนหน้าทั้งหมด
            $total_pages = ceil($total_items / $items_per_page);

            // ดึงข้อมูลสินค้าตามค่าค้นหาและหน้าปัจจุบัน
            $result = getProducts($conn, $search, $items_per_page, $offset);
            
            ?>
        <h2>รายการสินค้า</h2>
 
        <!-- ฟอร์มค้นหา -->
        <form action="manage_product.php" method="POST">
            <label for="search">ค้นหา ประเภทสินค้า :</label>

                <select name="search" id="search" class="form-control">
                    <option value="">เลือกข้อมูลค้นหา...</option>
                    <option value="flower_25" <?php if ($search=='flower_25' ) echo 'selected' ; ?>>ดอกไม้ราคา 25
                    </option>
                    <option value="expensive_flowers" <?php if ($search=='expensive_flowers' ) echo 'selected' ; ?>
                        >ดอกไม้ราคาแพง</option>
                    <option value="bunch_of_flowers" <?php if ($search=='bunch_of_flowers' ) echo 'selected' ; ?>
                        >ช่อดอกไม้</option>
                    <option value="flower_vase" <?php if ($search=='flower_vase' ) echo 'selected' ; ?>>แจกันดอกไม้
                    </option>
                    <option value="flower_basket" <?php if ($search=='flower_basket' ) echo 'selected' ; ?>
                        >กระเช้าดอกไม้</option>
                    <option value="bouquet_of_money" <?php if ($search=='bouquet_of_money' ) echo 'selected' ; ?>
                        >ช่อเงิน</option>
                    <option value="price_of_flowers" <?php if ($search=='price_of_flowers' ) echo 'selected' ; ?>
                        >ดอกไม้จับราคา</option>
                    <option value="flower_wrapping_pape" <?php if ($search=='flower_wrapping_pape' ) echo 'selected' ;
                        ?>>กระดาษห่อดอกไม้</option>
                    <option value="other_equipment" <?php if ($search=='other_equipment' ) echo 'selected' ; ?>
                        >อุปกรณ์อื่นๆ</option>
                </select>
 
            <div class="row">
                <div class="col-9">
                    <input type="submit" value="ค้นหา">
                </div>
                <div class="col-3 btn-danger">
                <input type="submit" name="reset" value="คืนค่า" class="btn btn-danger">
                </div>
            </div>
        </form>
        <br>
        <table>
            <tr>
                <th>ชื่อสินค้า</th>
                <th>รูปภาพ</th>
                <th>รายละเอียด</th>
                <th>ราคาเดิม</th>
                <th>ราคาโปรโมชั่น</th>
                <th>ประเภทสินค้า</th>
                <th>Actions</th>
            </tr>
            <?php renderProductTable($result); ?>
        </table>

        <!-- Pagination -->
        <?php renderPagination($page, $total_pages, $search); ?>

        <?php
                // ปิดการเชื่อมต่อฐานข้อมูล
                $conn->close();
                ?>


    </div>
</section>

<?php include('..\footer.html'); ?>