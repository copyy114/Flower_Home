<?php 
include('header-out.php'); 
include('conn.php');

$message = ''; // ตัวแปรสำหรับเก็บข้อความสถานะ

// ตรวจสอบการส่งฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];

    // เช็คการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ตรวจสอบว่า username ซ้ำหรือไม่
    $sql_check = "SELECT id FROM users WHERE username=?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $message = "ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว กรุณาเลือกชื่อผู้ใช้ใหม่";
    } else {
        // เข้ารหัสรหัสผ่าน


        // สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูล
        $sql_insert = "INSERT INTO users (fname, username, user_type, password) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssss", $fname, $username, $user_type, $password);

        // Execute และตรวจสอบการสำเร็จ
        if ($stmt_insert->execute()) {
            $message = "เพิ่มข้อมูลผู้ใช้สำเร็จ!";
        } else {
            $message = "เกิดข้อผิดพลาด: " . $stmt_insert->error;
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
}

// ดึงข้อมูลผู้ใช้สำหรับตาราง
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . $conn->error);
}
?>
        <div class="container container-edit-new">

    <h1>ลงทะเบียนเข้าใช้งานระบบ</h1>
    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <div class="form-group">
        <div class="row">
            <div class="col-9">
                <div class=""><label for="fname">ชื่อ:</label> </div>
            </div>
            <div class="col-3">

                <div class="mb-2"><button ><a href="logout.php">ย้อนกลับ</a></button></div>
            </div>
            </div>

            <input type="text" id="fname" name="fname" required>
        </div>

        <div class="form-group">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" id="username" name="username" required>
        </div>
            <input type="hidden" id="user_type" name="user_type" value="customer">
        <div class="form-group">
            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="row">
            <div class="col-6">
                <input type="submit" value="ลงทะเบียน">
            </div>
            <div class="col-6">
                <input type="reset" value="ยกเลิก">
            </div>
           
        </div>
    </form>
   
    </div>
