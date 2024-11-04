<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

// ตรวจสอบการส่งข้อมูล
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $role = $_POST['role'] === 'b' ? 'b' : 'u'; // บังคับให้เพิ่มสิทธิ์เป็น 'b' ถ้าถูกแบน

    $sql = "UPDATE user SET firstname = ?, lastname = ?, gender = ?, email = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstname, $lastname, $gender, $email, $role, $id]);

    header("Location: user.php?message=แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว");
    exit();
}
?>
