<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

// ตรวจสอบว่ามี ID ของหมวดหมู่หรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ลบหมวดหมู่
    $sql = "DELETE FROM category WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // ส่งกลับไปยังหน้า category.php พร้อมกับข้อความแจ้งเตือน
    header("Location: category.php?message=ลบหมวดหมู่เรียบร้อยแล้ว");
}
?>
