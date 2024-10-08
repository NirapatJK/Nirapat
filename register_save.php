<?php
session_start();
$login = $_POST['login'];
$passwd = sha1($_POST['pwd']);
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
//$sql = "INSERT INTO user (login, password, name, gender, email, role) VALUES ('$login', '$passwd', '$name', '$gender', '$email', 'm')";
$sql="SELECT * FROM user where login= '$login'";
$result=$conn->query($sql);
if($result->rowCount()==1){
    $_SESSION['add_login']="error";
}else{
    $sql1="INSERT INTO user (login, password, name, gender, email, role) VALUES ('$login', '$passwd', '$name', '$gender', '$email', 'm')";
    $conn->exec($sql1);
    $_SESSION['add_login']="success";
}
$conn = null;
header("location:register.php");
die();
//$conn->exec($sql);
//$conn = null;
//header("location:login.php");
?>