<?php
include('..\Owner\config\header-owner.php'); 
include('..\data\conn.php');
include('..\config\functions.php'); // รวมไฟล์ที่มีฟังก์ชัน

// การกำหนดค่าพื้นฐานสำหรับการแบ่งหน้า
$items_per_page = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page > 0 ? $page : 1;

// คำนวณค่าเริ่มต้นและค่าจบของรายการในหน้า
$offset = ($page - 1) * $items_per_page;

// ตรวจสอบว่ามีการส่งคำค้นหาหรือไม่
$name_query = isset($_GET['name']) ? $_GET['name'] : "";
$description_query = isset($_GET['description']) ? $_GET['description'] : "";
$type_shop_query = isset($_GET['type_shop']) ? $_GET['type_shop'] : "";

// อัปเดตสินค้าแนะนำเมื่อมีการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รีเซ็ต is_recommended ทั้งหมดเป็น FALSE ก่อน
    $conn->query("UPDATE tbproduct SET is_recommended = FALSE");

    // อัปเดตสินค้าที่ถูกเลือกให้เป็นสินค้าแนะนำ
    if (!empty($_POST['recommended_products'])) {
        foreach ($_POST['recommended_products'] as $product_id) {
            $stmt = $conn->prepare("UPDATE tbproduct SET is_recommended = TRUE WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
        }
        $Recommended_message = "<div style='color:green;'>ปักหมุดสินค้าเป็น สินค้าแนะนำแล้ว...</div>";
    } else {
        // แสดงข้อความเมื่อไม่มีการเลือกสินค้าแนะนำ
        $Recommended_message = "<div style='color:red;'>เลิกปักหมุดสินค้าเป็น สินค้าแนะนำแล้ว....</div>";
    }
}

// สร้างคำสั่ง SQL สำหรับค้นหาข้อมูลและแบ่งหน้า
$sql = "SELECT * FROM tbproduct WHERE 
        name LIKE ? AND 
        description LIKE ? AND 
        type_shop LIKE ?
        LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);
$search_name = "%" . $name_query . "%";
$search_description = "%" . $description_query . "%";
$search_type_shop = "%" . $type_shop_query . "%";
$stmt->bind_param("sssii", $search_name, $search_description, $search_type_shop, $items_per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();

// ดึงข้อมูลสำหรับ dropdown ของ type_shop
$type_shop_sql = "SELECT DISTINCT type_shop FROM tbproduct";
$type_shop_result = $conn->query($type_shop_sql);

// คำนวณจำนวนหน้าทั้งหมด
$total_sql = "SELECT COUNT(*) AS total FROM tbproduct WHERE 
              name LIKE ? AND 
              description LIKE ? AND 
              type_shop LIKE ?";
$total_stmt = $conn->prepare($total_sql);
$total_stmt->bind_param("sss", $search_name, $search_description, $search_type_shop);
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_row = $total_result->fetch_assoc();
$total_items = $total_row['total'];
$total_pages = ceil($total_items / $items_per_page);
$total_stmt->close();


$type_shop_map = getTypeShopMap(); // เรียกใช้ฟังก์ชันและรับ array การแมป
?>
<section id="product">
    <h1>จัดการสินค้าแนะนำ <p class="fa fa-star "></p></h1>
    <div class="container text-center ">

        <form method="GET" action="is_Recommend.php">
            <label for="name">ชื่อสินค้า:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name_query); ?>">

            <label for="description">รายการสินค้า:</label>
            <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description_query); ?>">

            <label for="type_shop">ประเภทสินค้า:</label>
            <select id="type_shop" name="type_shop">
                <option value="">-- ค้นหาด้วยประเภทสินค้า --</option>
                <?php
                while ($row = $type_shop_result->fetch_assoc()) {
                    $type_shop_value = $row['type_shop'];
                    $display_name = isset($type_shop_map[$type_shop_value]) ? $type_shop_map[$type_shop_value] : $type_shop_value;
                    $selected = ($type_shop_query == $type_shop_value) ? "selected" : "";
                    echo "<option value=\"" . htmlspecialchars($type_shop_value) . "\" $selected>" . htmlspecialchars($display_name) . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="ค้นหา">
        </form>
        <hr>
        <table>
            <tr>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
                <th>ประเภทสินค้า</th>
                <th>สินค้าแนะนำ</th>
            </tr>
            <?php
            error_reporting(0);
            echo $Recommended_message;
            if ($result->num_rows > 0) {
                echo "<form method='POST' action='is_Recommend.php'>";

                while($row = $result->fetch_assoc()) {
                    $type_shop_value = $row['type_shop'];
                    $type_shop_display = isset($type_shop_map[$type_shop_value]) ? $type_shop_map[$type_shop_value] : $type_shop_value;
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td><img src='..\uploaded_files/" . htmlspecialchars($row['img_path']) . "' alt='Product Image' width='100'></td>";
                    echo "<td>" . htmlspecialchars($type_shop_display) . "</td>";
                    echo "<td><input type='checkbox' name='recommended_products[]' value='" . htmlspecialchars($row['id']) . "' " . ($row['is_recommended'] ? "checked" : "") . "></td>";
                    echo "</tr>";
                }
                echo "<div class=\"row\">";
                echo "<div class=\"col-4\"></div>";
                echo "<div class=\"col-4\">";
                echo "<input type='submit' value='อัพเดทสินค้าแนะนำ'>";
                echo "</div>";
                echo "<div class=\"col-4\"></div>";
                echo "</div>";
                echo "<br>";
                echo "</form>";
            } else {
                echo "<tr><td colspan='5'>ไม่มีสินค้า....</td></tr>";
            }
            ?>
        </table>

        <div class='pagination'>
            <?php
            if ($page > 1) {
                echo "<a href='is_Recommend.php?page=1&name=" . urlencode($name_query) . "&description=" . urlencode($description_query) . "&type_shop=" . urlencode($type_shop_query) . "'>First</a>";
                echo "<a href='is_Recommend.php?page=" . ($page - 1) . "&name=" . urlencode($name_query) . "&description=" . urlencode($description_query) . "&type_shop=" . urlencode($type_shop_query) . "'>Previous</a>";
            } else {
                echo "<a class='disabled'>First</a>";
                echo "<a class='disabled'>Previous</a>";
            }

            if ($page < $total_pages) {
                echo "<a href='is_Recommend.php?page=" . ($page + 1) . "&name=" . urlencode($name_query) . "&description=" . urlencode($description_query) . "&type_shop=" . urlencode($type_shop_query) . "'>Next</a>";
                echo "<a href='is_Recommend.php?page=" . $total_pages . "&name=" . urlencode($name_query) . "&description=" . urlencode($description_query) . "&type_shop=" . urlencode($type_shop_query) . "'>Last</a>";
            } else {
                echo "<a class='disabled'>Next</a>";
                echo "<a class='disabled'>Last</a>";
            }
            ?>
        </div>

    </div>
</section>
<?php include('..\footer.html'); ?>
