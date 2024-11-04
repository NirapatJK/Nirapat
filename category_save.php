<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

// ตรวจสอบว่ามีการส่งข้อมูลหมวดหมู่หรือไม่
if (isset($_POST['categoryName'])) {
    $categoryName = $_POST['categoryName'];

    // เพิ่มหมวดหมู่ใหม่ลงในฐานข้อมูล
    $sql = "INSERT INTO category (name) VALUES (:name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $categoryName);
    $stmt->execute();

    // ส่งกลับไปยังหน้า category.php พร้อมกับข้อความแจ้งเตือน
    header("Location: category.php?message=เพิ่มหมวดหมู่เรียบร้อยแล้ว");
}
?>

