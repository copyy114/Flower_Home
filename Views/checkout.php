<?php
session_start();
include('../data/conn.php');
include('../header-footer/header_option.php');

// Function to get product data
function getProductData($conn, $pids) {
    if (empty($pids)) return [];
    
    $ids = implode(',', array_map('intval', $pids));
    $sql = "SELECT id, name, description, prev_price, current_price, img_path FROM tbproduct WHERE id IN ($ids)";
    return $conn->query($sql);
}

// Redirect to cart.php if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

// Get product IDs from the cart
$pids = array_keys($_SESSION['cart']);
$result = getProductData($conn, $pids);

// Calculate total
$total = 0;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the payment
    $payment_status = 'completed'; // This should be determined based on actual payment processing
    $slip_image = ''; // This should be handled properly with file upload

    if (isset($_FILES['payment_slip']) && $_FILES['payment_slip']['error'] == 0) {
        $upload_dir = '../uploaded_files/payment_slips/';
        $file_name = uniqid() . '_' . $_FILES['payment_slip']['name'];
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['payment_slip']['tmp_name'], $file_path)) {
            $slip_image = $file_name;
        }
    }

    if ($payment_status == 'completed') {
        // Update order status in the database
        $order_id = uniqid(); // Generate a unique order ID
        $order_date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['username'] ?? 0; // Assuming you have user sessions

        // Insert order into database
        $sql = "INSERT INTO orders (order_id, user_id, total_amount, order_date, payment_status, payment_slip) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sidiss", $order_id, $user_id, $total, $order_date, $payment_status, $slip_image);
        $stmt->execute();

        // Clear the cart
        unset($_SESSION['cart']);

        // Redirect to a thank you page
        header('Location: thank_you.php?order_id=' . $order_id);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการสั่งซื้อและชำระเงิน</title>
    <script>
        // ตรวจสอบว่ามีการอัปโหลดสลิปชำระเงินก่อนกดวางคำสั่งซื้อ
        function validateForm() {
            var paymentSlip = document.getElementById("payment_slip").files.length;
            if (paymentSlip == 0) {
                alert("กรุณาอัปโหลดสลิปการชำระเงินก่อนทำการสั่งซื้อ");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        // ทำให้ปุ่ม 'วางคำสั่งซื้อ' ใช้การไม่ได้หากยังไม่ได้อัปโหลดสลิป
        function checkSlipUploaded() {
            var submitButton = document.getElementById("place_order_button");
            var paymentSlip = document.getElementById("payment_slip").files.length;

            if (paymentSlip > 0) {
                submitButton.disabled = false; // Enable button
            } else {
                submitButton.disabled = true; // Disable button
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>ยืนยันการสั่งซื้อและชำระเงิน</h2>
        <hr>
        <div class="row">
            <div class="col-12">
                <?php if ($result && $result->num_rows > 0): ?>
                    <h4>รายการสินค้า :</h4>
                    <div class="list-group">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <?php
                            $id = htmlspecialchars($row["id"]);
                            $name = htmlspecialchars($row["name"]);
                            $description = htmlspecialchars($row["description"]);
                            $prevPrice = (float) htmlspecialchars($row["prev_price"]);
                            $currentPrice = (float) htmlspecialchars($row["current_price"]);
                            $fileName = htmlspecialchars($row["img_path"]);
                            $filePath = '../uploaded_files/' . $fileName;

                            $displayPrice = $currentPrice > 0 ? $currentPrice : $prevPrice;
                            $quantity = intval($_SESSION['cart'][$id]);
                            $itemTotal = $displayPrice * $quantity;
                            $total += $itemTotal;
                            ?>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">ชื่อสินค้า : <?php echo $name; ?></h5>
                                    <small><?php echo number_format($quantity); ?> x ฿<?php echo number_format($displayPrice, 2); ?></small>
                                </div>
                                <p class="mb-1">รายละเอียด : <?php echo $description; ?></p>
                                <small>ราคา : ฿<?php echo number_format($itemTotal, 2); ?></small>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <h4 class="mt-4">ราคารวมทั้งสิ้น : ฿<?php echo number_format($total, 2); ?></h4>
                <?php else: ?>
                    <p>ไม่พบสินค้าในตะกร้า</p>
                <?php endif; ?>
            </div>
            <div class="col-8">
                <style>
                    .qr-code{
                        display: block;
        margin-left: 15%;
        margin-right: auto;
        margin-bottom: 10px;
        max-width: auto;
        height: auto;
                    }
                </style>
                <h4>ชำระเงิน</h4>
                <div class="qr-code">
                    <!-- ใส่ QR Code สำหรับการชำระเงินที่นี่ -->
                    <img src="../assets/img/qr_code_image.png" alt="QR Code สำหรับชำระเงิน">
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="payment_slip">อัปโหลดสลิป:</label>
                        <input type="file" class="form-control-file" id="payment_slip" name="payment_slip" onchange="checkSlipUploaded();" required>
                    </div>                  
                </form>
            </div>
            <div class="col-4">
                <h4>รายละเอียด ผู้สั่งชื้อ</h4>
                <form action="place_order.php" method="POST">
                    <div class="form-group">
                        <label for="name"><font size="2" color="#FF0000">*</font> ชื่อ : </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">อีเมล : </label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address">ที่อยู่ : </label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone"><font size="2" color="#FF0000">*</font> โทรศัพท์ : </label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <input type="hidden" name="total" value="<?php echo number_format($total, 2); ?>">
                    <div class="row w-100">
                        <div class="col-6">
                            <button type="submit" id="place_order_button" class="btn btn-primary" disabled>วางคำสั่งซื้อ</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
