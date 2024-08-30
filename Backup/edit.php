<?php include('header-admin.php'); 
    include ('conn.php');


// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่ามี ID ที่ต้องการแก้ไขหรือไม่
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // เตรียมคำสั่ง SQL เพื่อดึงข้อมูล
    $sql = "SELECT * FROM tbproduct WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // ดึงข้อมูลจากฐานข้อมูล
        $row = $result->fetch_assoc();
        $name = htmlspecialchars($row['name']);
        $img_path = htmlspecialchars($row['img_path']);
        $description = htmlspecialchars($row['description']);
        $prev_price = htmlspecialchars($row['prev_price']);
        $current_price = htmlspecialchars($row['current_price']);
        $type_shop = htmlspecialchars($row['type_shop']);
    } else {
        die("No record found.");
    }
    $stmt->close();
} else {
    die("ID is not set.");
}

$conn->close();
?>


<div class="container text-center container-edit-new">

    <!-- Form for Edit Product -->
    <?php if (isset($id)): ?>
    <h2>แก้ไขข้อมูลรายการสินค้า</h2>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <div class="form-group row">

</div>


        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">ชื่อสินค้า:</label>
            <div class="col-sm-9">
                
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
        </div>
<style>
    .img-fluid{
        width: auto;
        height: 340px;
    }
    </style>
        <div class="form-group row">
            <label for="img_path" class="col-sm-3 col-form-label">รูป:</label>
            <div class="col-sm-9">
                 <!-- แสดงภาพที่อัปโหลด -->
        <?php if (!empty($img_path)) : ?>
            <img src="uploaded_files/<?php echo htmlspecialchars($img_path); ?>" class="img-fluid mt-2" alt="Uploaded Image" required>
        <?php endif; ?>

        <!-- ฟิลด์การอัปโหลดไฟล์ -->
        <input type="file" id="img_path" name="img_path" class="form-control mt-2">

        <!-- ฟิลด์เก็บข้อมูลภาพเดิม -->
        <input type="hidden" name="oldfile" value="<?php echo htmlspecialchars($img_path); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">รายละเอียด:</label>
            <div class="col-sm-9">
                <textarea id="description" name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="prev_price" class="col-sm-3 col-form-label">ราคาเดิม:</label>
            <div class="col-sm-9">
                <input type="number" id="prev_price" name="prev_price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($prev_price); ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="current_price" class="col-sm-3 col-form-label">ราคาโปรโมชั่น:</label>
            <div class="col-sm-9">
                <input type="number" id="current_price" name="current_price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($current_price); ?>" required>
            </div>
        </div>

        <div class="form-group row">
    <label for="type_shop" class="col-sm-3 col-form-label">ประเภท:</label>
    <div class="col-sm-9">
        <select id="type_shop" name="type_shop" class="form-control" required>
            <option value="flower_25" <?php echo (htmlspecialchars($type_shop) == 'flower_25') ? 'selected' : ''; ?>>ดอกไม้ราคา 25</option>
            <option value="expensive_flowers" <?php echo (htmlspecialchars($type_shop) == 'expensive_flowers') ? 'selected' : ''; ?>>ดอกไม้ราคาแพง</option>
            <option value="bunch_of_flowers" <?php echo (htmlspecialchars($type_shop) == 'bunch_of_flowers') ? 'selected' : ''; ?>>ช่อดอกไม้</option>
            <option value="flower_vase" <?php echo (htmlspecialchars($type_shop) == 'flower_vase') ? 'selected' : ''; ?>>แจกันดอกไม้</option>
            <option value="flower_basket" <?php echo (htmlspecialchars($type_shop) == 'flower_basket') ? 'selected' : ''; ?>>กระเช้าดอกไม้</option>
            <option value="bouquet_of_money" <?php echo (htmlspecialchars($type_shop) == 'bouquet_of_money') ? 'selected' : ''; ?>>ช่อเงิน</option>
            <option value="price_of_flowers" <?php echo (htmlspecialchars($type_shop) == 'price_of_flowers') ? 'selected' : ''; ?>>ดอกไม้จับราคา</option>
            <option value="flower_wrapping_pape" <?php echo (htmlspecialchars($type_shop) == 'flower_wrapping_pape') ? 'selected' : ''; ?>>กระด่าษห่อดอกไม้</option>
            <option value="other_equipment" <?php echo (htmlspecialchars($type_shop) == 'other_equipment') ? 'selected' : ''; ?>>อุปกรณ์อื่นๆ</option>
        </select>
    </div>
</div>

    <div class="row">
        <div class="col-6">
            <input type="submit" class="btn btn-success" value="ยืนยันการแก้ไข">
        </div>
        <div class="col-6">
            <input type="reset" class="btn btn-success" value="ยกเลิก">
        </div>
    </div>


    </form>
    <?php else: ?>

    <?php endif; ?>

</div>

<?php include('footer.html'); ?> 
