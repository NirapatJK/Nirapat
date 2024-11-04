<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

// ตรวจสอบว่ามี ID ของหมวดหมู่หรือไม่
if (!isset($_POST['id'])) {
    header("Location: category.php");
    exit();
}

$id = $_POST['id'];
$categoryName = $_POST['categoryName'];

// อัปเดตข้อมูลหมวดหมู่
$sql = "UPDATE category SET name = :name WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $categoryName);
$stmt->bindParam(':id', $id);
$stmt->execute();

// ส่งกลับไปยังหน้า category.php พร้อมกับข้อความแจ้งเตือน
header("Location: category.php?message=แก้ไขหมวดหมู่เรียบร้อยแล้ว");
?>
