<?php
session_start();
include 'conn.php'; // เชื่อมต่อฐานข้อมูล

// การตรวจสอบการเข้าสู่ระบบ
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    // ป้องกัน SQL Injection
    $username = $conn->real_escape_string($username);

    // คำสั่ง SQL สำหรับตรวจสอบข้อมูลผู้ใช้
    $sql = "SELECT * FROM users WHERE username = ? AND user_type = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("การเตรียมคำสั่ง SQL ล้มเหลว: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $userType);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // ตรวจสอบรหัสผ่านที่เข้ารหัส
        if ($password === $row['password']) {
            // บันทึกวันที่และเวลาเข้าสู่ระบบ
            $update_sql = "UPDATE users SET last_login = NOW() WHERE username = ?";
            $update_stmt = $conn->prepare($update_sql);
            if ($update_stmt === false) {
                die("การเตรียมคำสั่ง SQL อัปเดตล้มเหลว: " . $conn->error);
            }
            $update_stmt->bind_param("s", $username);
            $update_stmt->execute();
            $update_stmt->close();

            // เก็บข้อมูลในเซสชัน
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $userType;
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['loggedin'] = true; // เพิ่มบรรทัดนี้

            // เปลี่ยนเส้นทางไปยังหน้าแดชบอร์ดตามประเภทผู้ใช้
            if ($userType === 'customer') {
                header("Location: index.php");
            } elseif ($userType === 'owner') {
                header("Location: dashborad.php");
            }
            exit();
        } else {
            $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower's Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/logoheader.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/31da23dcf7.js" crossorigin="anonymous"></script>
 
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sarabun:ital,wght@0,300;1,100&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif !important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff2f3;

        }
      .container-edit-new{
            margin-top: 5% ;

      }
   
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="reset"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #ff2d00;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input[type="reset"]:hover {
            background-color: #cf2500;
        }
        .form-group {
            margin-bottom: 12px;
        }
        .message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }
            button {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 4px;
            background-color: #039c4b;
            font-size: 16px;
            cursor: pointer;
        }
            button:hover {
                background-color: #037e3c;
            }
            a {
                color: aliceblue;
            }
            a:hover{
                color: aliceblue;
            }
            button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
          }
          button[type="reset"] {
              width: 100%;
              padding: 10px;
              border: none;
              border-radius: 4px;
              background-color: #ff2d00;
              color: white;
              font-size: 16px;
              cursor: pointer;
          }
          button[type="submit"]:hover {
              background-color: #0056b3;
          }
          button[type="reset"]:hover {
              background-color: #cf2500;
          }
     
 
    </style>
</head>
<body>

<div class="container container-edit-new">
    <h1>เข้าสู่ระบบ</h1>
    <?php if (isset($error)) { echo "<div class='message'>$error</div>"; } ?>
    <form method="POST" action="">
    <div class="form-group">
            <div class="row">
                <div class="col-9">
                    <div class=""><label for="fname">ชื่อผู้ใช้:</label></div>
                </div>    
                <div class="col-3">
                    <div class="mb-2"><button ><a href="./register_user.php">ลงทะเบียน</a></button></div>
                </div>
            </div>
            <input type="text" id="username" name="username" required>
        </div>
   
        <div class="form-group">
            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="user_type">ประเภทผู้ใช้:</label>
            <select id="user_type" name="user_type" required>
                <option value="customer">ลูกค้า</option>
                <option value="owner">เจ้าของร้าน</option>
            </select>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" name="login">เข้าสู่ระบบ</button>
            </div>
            <div class="col-6">
                <button type="reset" name="login">ยกเลิก</button>
            </div>
        </div>

    </form>
</div>

</body>
</html>
