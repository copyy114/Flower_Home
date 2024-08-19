<?php
    function displayProducts($conn, $type_shops) {
        // Convert the array to a string of placeholders for the SQL query
        $placeholders = implode(',', array_fill(0, count($type_shops), '?'));
        
        // Define the SQL query to fetch records based on multiple type_shop values
        $sql = "SELECT id, name, description, prev_price, current_price, img_path FROM tbproduct WHERE type_shop IN ($placeholders)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters dynamically based on the number of type_shop values
        $types = str_repeat('s', count($type_shops)); // String of 's' for each type_shop
        $stmt->bind_param($types, ...$type_shops);

        // Execute the query
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if there are any results
        if ($result && $result->num_rows > 0) {
            // Fetch and display each row of data
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row["id"]);
                $fileName = htmlspecialchars($row["img_path"]);
                $filePath = 'uploaded_files/' . $fileName;
                $name = htmlspecialchars($row["name"]);
                $description = htmlspecialchars($row["description"]);
                $prevPrice = (float) htmlspecialchars($row["prev_price"]);
                $currentPrice = (float) htmlspecialchars($row["current_price"]);

                $formattedCurrentPrice = number_format($currentPrice, 2);
                $formattedPrevPrice = number_format($prevPrice, 2);

                if ($currentPrice == 0) {
                    $formattedDiscount = "ไม่มีส่วนลด";
                    $priceDisplay = '<p><i class="fa-solid fa-baht-sign"></i>' . $formattedPrevPrice . '</p>';
                } else {
                    if ($prevPrice > 0) {
                        $discount = $prevPrice - $currentPrice;
                        if ($discount > 0) {
                            $formattedDiscount = "ส่วนลด " . number_format($discount, 2) . " บ.";
                            $priceDisplay = '<p><i style="color:red;" class="fa-solid fa-baht-sign">' . $formattedCurrentPrice . '</i>&nbsp;&nbsp; <del><i class="fa-solid fa-baht-sign"></i>' . $formattedPrevPrice . '</del></p>';
                        } else {
                            $formattedDiscount = "ไม่มีส่วนลด";
                            $priceDisplay = '<p><i style="color:red;" class="fa-solid fa-baht-sign">' . $formattedCurrentPrice . '</i>&nbsp;&nbsp; <i class="fa-solid fa-baht-sign"></i>' . $formattedPrevPrice . '</p>';
                        }
                    } else {
                        $formattedDiscount = "";
                        $priceDisplay = '<p><i style="color:red;" class="fa-solid fa-baht-sign">' . $formattedCurrentPrice . '</i></p>';
                    }
                }

                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '    <div class="member">';
                echo '        <div class="member_edit">';
                echo '            <div><img src="' . $filePath . '" class="img-fluid" alt="Product Image"></div>';
                echo '            <div class="row">';
                echo '                <div class="col-6 text-center">';
                echo '                    <h5 style="color:white;background-color:red;border-radius:15px;padding:5px;margin-top:5%;">' . $formattedDiscount . '</h5>';
                echo '                </div>';
                echo '            </div>';
                echo '            <div class="row">';
                echo '                <div class="col-12">';
                echo '                    <div class="text_left">';
                echo '                        <p>' . $name . '</p>';
                echo '                        <p>' . $description . '</p>';
                echo '                        ' . $priceDisplay;
                echo '                    </div>';
                echo '                </div>';
                echo '            <div class="row">';
                echo '                <div class="col-12 text_left">';
                echo '                    <a href="cart.php?action=add&id=' . $id . '" class="btn btn-primary">  <i class="fas fa-shopping-cart"></i> สั่งซื้อ</a>';
                echo '                </div>';
                echo '                </div>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<p>ไม่มีสินค้ามาแสดง.</p>';
        }

        $stmt->close();
    }

    // ส่วนข้อหน้า Dashborad
    function getTotalQuantity($conn) {
        $sql = "SELECT SUM(quantity) AS total_quantity FROM order_items";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total_quantity'];
        } else {
            return 0;
        }
    }

    function getTotalAmount($conn) {
        $sql = "SELECT SUM(total_amount) AS total_amount_sum FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total_amount_sum'];
        } else {
            return 0;
        }
    }
    function getTotalProduct($conn) {
    $sql = "SELECT COUNT(*) AS total_product FROM tbproduct";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // เอาข้อมูลจากผลลัพธ์
            $row = $result->fetch_assoc();
            return $row['total_product'];
        } else {
            return 0;
    }
    }
    function getTotalUser($conn) {
        $sql = "SELECT COUNT(*) AS total_user FROM Users";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // เอาข้อมูลจากผลลัพธ์
                $row = $result->fetch_assoc();
                return $row['total_user'];
            } else {
                return 0;
        }
        }
?>