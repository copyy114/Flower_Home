<?php
include '../conn.php'; // รวมการเชื่อมต่อฐานข้อมูล

class PageModel
{
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function getPage($pageName)
    {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE page_name = ?");
        $stmt->execute([$pageName]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePage($pageName, $content)
    {
        $stmt = $this->db->prepare("UPDATE pages SET content = ? WHERE page_name = ?");
        $stmt->execute([$content, $pageName]);
    }

    public function renamePage($oldName, $newName)
    {
        // ตรวจสอบว่ามีชื่อเพจที่ใหม่แล้วหรือไม่
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM pages WHERE page_name = ?");
        $stmt->execute([$newName]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Page name already exists.");
        }

        // เปลี่ยนชื่อเพจ
        $stmt = $this->db->prepare("UPDATE pages SET page_name = ? WHERE page_name = ?");
        $stmt->execute([$newName, $oldName]);
    }
}
