<?php
session_start();
include("conn.php");
include("./header_option.php");


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
?>


<div class="container container-edit-new">
    <h2>รายการ ยืนยันการสั่งซื้อสินค้า</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
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
                        $filePath = 'uploaded_files/' . $fileName;
      
                        // Use currentPrice if available, otherwise use prevPrice
                        $displayPrice = $currentPrice > 0 ? $currentPrice : $prevPrice;
                        $formattedPrice = number_format($displayPrice, 2);
                        $quantity = intval($_SESSION['cart'][$id]);
                        $itemTotal = $displayPrice * $quantity;
                        $total += $itemTotal;
                        ?>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"> ซื่อสินค้า : <?php echo $name; ?></h5>
                                <small><?php echo number_format($quantity); ?> x ฿<?php echo $formattedPrice; ?></small>
                            </div>
                            <p class="mb-1">รายละเอียด : <?php echo $description; ?></p>
                            <small>ราคา : <?php echo number_format($itemTotal, 2); ?> บาท</small>
                        </div>
                    <?php endwhile; ?>
                </div>
                <h4 class="mt-4">ราคารวมทั้งสิ้น : <?php echo number_format($total, 2); ?> บาท</h4>
            <?php else: ?>
                <p>No products found in the cart.</p>
            <?php endif; ?>
        </div>

        <style>
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
        </style>
        <div class="col-md-4">
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
                    <textarea class="form-control" id="address" name="address" rows="3" ></textarea>
                </div>
                <div class="form-group">
                    <label for="phone"><font size="2" color="#FF0000">*</font> โทรศัพท์ : </label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <input type="hidden" name="total" value="<?php echo number_format($total, 2); ?>">
                <div class="row w-100">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">วางคำสั่งซื้อ</button>
                    </div>
                    <div class="col-6">
                        <button type="reset" class="btn btn-primary">ยกเลิก</button>
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
