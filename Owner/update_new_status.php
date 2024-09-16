<?php
// update_new_status.php
header('Content-Type: application/json');

// ปิดการแสดงผล error และ warning บนหน้าเว็บ
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

// รวมไฟล์เชื่อมต่อฐานข้อมูล
include('../data/conn.php');  // ปรับเส้นทางตามโครงสร้างไดเรกทอรีของคุณ

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_item_id'])) {
    $order_item_id = intval($_POST['order_item_id']);
    
    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit();
    }

    // เตรียมและดำเนินการ SQL statement
    $sql = "UPDATE order_items SET is_new = FALSE WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $order_item_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Update failed']);
    }

    // ปิดการเชื่อมต่อ statement และฐานข้อมูล
    $stmt->close();
    $conn->close();
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit();
}
?>
