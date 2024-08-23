<?php
include '../conn.php'; // รวมการเชื่อมต่อฐานข้อมูล

$pageName = 'default'; // เปลี่ยนชื่อเพจตามที่ต้องการ

try {
    $stmt = $db->prepare("SELECT * FROM pages WHERE page_name = ?");
    if (!$stmt->execute([$pageName])) {
        echo "Query execution failed.";
        print_r($stmt->errorInfo()); // แสดงข้อมูลข้อผิดพลาดของ query
    }
    $page = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($page !== false) {
        if ($page) {
            echo "Page Name: " . htmlspecialchars($page['page_name']) . "<br>";
            echo "Content: " . htmlspecialchars($page['content']);
        } else {
            echo "Page not found.";
        }
    } else {
        echo "Query failed or no result found.";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
