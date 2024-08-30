<?php
function displayProducts($conn, $type_shops, $currentPage = 1, $itemsPerPage = 3, $search = '') {
    // Convert the array to a string of placeholders for the SQL query
    $placeholders = implode(',', array_fill(0, count($type_shops), '?'));

    // Step 1: Count total items for pagination with search
    $countSql = "SELECT COUNT(*) AS totalItems FROM tbproduct WHERE type_shop IN ($placeholders)";
    if (!empty($search)) {
        $countSql .= " AND name LIKE ?";
    }
    
    $countStmt = $conn->prepare($countSql);
    $types = str_repeat('s', count($type_shops)); 
    $params = $type_shops;

    if (!empty($search)) {
        $types .= 's';
        $params[] = '%' . $search . '%';
    }
    
    $countStmt->bind_param($types, ...$params);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $totalItems = $countResult->fetch_assoc()['totalItems'];

    // Calculate the total number of pages
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Calculate the OFFSET value
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Step 2: Fetch data with LIMIT, OFFSET, and search
    $sql = "SELECT id, name, description, prev_price, current_price, img_path 
            FROM tbproduct 
            WHERE type_shop IN ($placeholders)";
    
    if (!empty($search)) {
        $sql .= " AND name LIKE ?";
    }

    $sql .= " LIMIT ? OFFSET ?";
    
    $stmt = $conn->prepare($sql);
    $typesWithLimitOffset = $types . 'ii';
    $paramsWithLimitOffset = array_merge($params, [$itemsPerPage, $offset]);
    $stmt->bind_param($typesWithLimitOffset, ...$paramsWithLimitOffset);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
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

    // Step 3: Display pagination controls with limited page numbers
    echo '<nav aria-label="Page navigation">';
    echo '<ul class="pagination justify-content-center">';

    // "ไปหน้าแรกสุด" button
    if ($currentPage > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=1&search=' . urlencode($search) . '">ไปหน้าแรกสุด</a></li>';
    }

    // Previous page button
    if ($currentPage > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '&search=' . urlencode($search) . '">ก่อนหน้า</a></li>';
    }

    // Determine the start and end page numbers to display
    $startPage = max(1, $currentPage - 1);
    $endPage = min($startPage + 2, $totalPages);

    // Adjust start page if at the end
    if ($endPage - $startPage < 2) {
        $startPage = max(1, $endPage - 2);
    }

    // Page number buttons
    for ($i = $startPage; $i <= $endPage; $i++) {
        if ($i == $currentPage) {
            echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '&search=' . urlencode($search) . '">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '&search=' . urlencode($search) . '">' . $i . '</a></li>';
        }
    }

    // Next page button
    if ($currentPage < $totalPages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '&search=' . urlencode($search) . '">ถัดไป</a></li>';
    }

    // "ไปหน้าท้ายสุด" button
    if ($currentPage < $totalPages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $totalPages . '&search=' . urlencode($search) . '">ไปหน้าท้ายสุด</a></li>';
    }

    echo '</ul>';
    echo '</nav>';

    $stmt->close();
    $countStmt->close();
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
        function getSearchTerm() {
            return isset($_POST['search']) ? $_POST['search'] : '';
        }
        
        function getPageNumber() {
            return isset($_GET['page']) ? (int)$_GET['page'] : 1;
        }
        
        function getTotalItems($conn, $search) {
            $sql_count = "SELECT COUNT(*) as total FROM tbproduct";
            if ($search !== '') {
                $sql_count .= " WHERE type_shop LIKE ?";
            }
            $stmt_count = $conn->prepare($sql_count);
            if ($search !== '') {
                $search_param = "%$search%";
                $stmt_count->bind_param("s", $search_param);
            }
            $stmt_count->execute();
            $result_count = $stmt_count->get_result();
            $row_count = $result_count->fetch_assoc();
            return $row_count['total'];
        }
        
        function getProducts($conn, $search, $items_per_page, $offset) {
            $sql = "SELECT id, name, description, prev_price, current_price, img_path, type_shop, date_created, date_updated FROM tbproduct";
            
            if ($search !== '') {
                $sql .= " WHERE type_shop LIKE ?";
                $sql .= " LIMIT ? OFFSET ?";
                $search_param = "%$search%";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sii", $search_param, $items_per_page, $offset);
            } else {
                $sql .= " LIMIT ? OFFSET ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $items_per_page, $offset);
            }
            
            $stmt->execute();
            return $stmt->get_result();
        }
        
        function renderProductTable($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td><img src='..\uploaded_files/" . $row["img_path"] . "' alt='Product Image'></td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["prev_price"] . "</td>";
                    echo "<td>" . $row["current_price"] . "</td>";
                    
                    // เพิ่มเงื่อนไขที่นี่
                    if ($row["type_shop"] == 'flower_25') {
                        echo "<td>ดอกไม้ราคา 25</td>";
                    } 
                    elseif ($row["type_shop"] == 'expensive_flowers') {
                        echo "<td>ดอกไม้ราคาแพง</td>";
                    }
                    elseif ($row["type_shop"] == 'bunch_of_flowers') {
                        echo "<td>ช่อดอกไม้</td>";
                    }
                    elseif ($row["type_shop"] == 'flower_vase') {
                        echo "<td>แจกันดอกไม้</td>";
                    }
                    elseif ($row["type_shop"] == 'flower_basket') {
                        echo "<td>กระเช้าดอกไม้</td>";
                    }
                    elseif ($row["type_shop"] == 'bouquet_of_money') {
                        echo "<td>ช่อเงิน</td>";
                    }
                    elseif ($row["type_shop"] == 'price_of_flowers') {
                        echo "<td>ดอกไม้จับราคา</td>";
                    }
                    elseif ($row["type_shop"] == 'flower_wrapping_pape') {
                        echo "<td>กระด่าษห่อดอกไม้</td>";
                    }
                    elseif ($row["type_shop"] == 'other_equipment') {
                        echo "<td>อุปกรณ์อื่นๆ</td>";
                    }
                
                    
                    echo "<td>
                            <a href='edit.php?id=" . $row["id"] . "'><i class='fas fa-edit' style='font-size:20px;color:blue'></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('คุณแน่ใจว่าต้องการลบผู้ใช้รายนี้?');\"><i class='fas fa-times-circle' style='font-size:20px;color:red'></i></a>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>ไม่มีสินค้า...</td></tr>";
            }
        }
        
        
        function renderPagination($page, $total_pages, $search) {
            echo '<div class="pagination">';
        
            // ปุ่มไปหน้าแรกสุด
            if ($page > 1) {
                echo '<a href="?page=1' . ($search ? '&search=' . urlencode($search) : '') . '">หน้าแรกสุด</a>';
            } else {
                echo '<span class="disabled">หน้าแรกสุด</span>';
            }
        
            // ปุ่มย้อนกลับ
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . ($search ? '&search=' . urlencode($search) : '') . '">&laquo; ย้อนกลับ</a>';
            } else {
                echo '<span class="disabled">&laquo; ย้อนกลับ</span>';
            }
        
            // การกำหนดช่วงหน้า
            $start = max(1, $page - 1); // เริ่มต้นจากหน้าปัจจุบันลบ 1
            $end = min($total_pages, $start + 2); // สิ้นสุดที่หน้าเริ่มต้นบวก 2 (รวมเป็น 3 หน้า)
        
            for ($i = $start; $i <= $end; $i++) {
                if ($i == $page) {
                    echo '<span class="active">' . $i . '</span>';
                } else {
                    echo '<a href="?page=' . $i . ($search ? '&search=' . urlencode($search) : '') . '">' . $i . '</a>';
                }
            }
        
            // ปุ่มถัดไป
            if ($page < $total_pages) {
                echo '<a href="?page=' . ($page + 1) . ($search ? '&search=' . urlencode($search) : '') . '">ถัดไป &raquo;</a>';
            } else {
                echo '<span class="disabled">ถัดไป &raquo;</span>';
            }
        
            // ปุ่มไปหน้าท้ายสุด
            if ($page < $total_pages) {
                echo '<a href="?page=' . $total_pages . ($search ? '&search=' . urlencode($search) : '') . '">หน้าท้ายสุด</a>';
            } else {
                echo '<span class="disabled">หน้าท้ายสุด</span>';
            }
        
            echo '</div>';
        }
        // จำนวนรายการต่อหน้า
        $items_per_page = 3;
        $search = getSearchTerm();
        $page = getPageNumber();
        $offset = ($page - 1) * $items_per_page;
        $total_items = getTotalItems($conn, $search);
        $total_pages = ceil($total_items / $items_per_page);
        $result = getProducts($conn, $search, $items_per_page, $offset);
?>
