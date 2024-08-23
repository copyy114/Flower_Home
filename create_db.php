<?php
// กำหนดเส้นทางไปยังไฟล์ฐานข้อมูล
$file = __DIR__ . '/data/pages.db';

try {
    // เชื่อมต่อกับฐานข้อมูล SQLite
    $db = new PDO('sqlite:' . $file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // สร้างตารางถ้ายังไม่มี
    $createTableQuery = "CREATE TABLE IF NOT EXISTS pages (
        page_name TEXT PRIMARY KEY,
        content TEXT
    );";
    $db->exec($createTableQuery);

    echo "Database and table created successfully.";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
