<?php
session_start();
if(isset($_SESSION['id'])){
  header("location:index.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <!--<h1 style="text-align: center;">Webboard Joe</h1>
    <hr>
    <div style="text-align: center;">-->
    <?php
     $login = $_POST["login"];
     $pwd = $_POST["pwd"];
     $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
     $sql="SELECT * FROM user where login= '$login' and password=sha1('$pwd')";
     $result=$conn->query($sql);
     if($result->rowCount()==1){
      $data=$result->fetch(PDO::FETCH_ASSOC);
      $_SESSION['username']=$data['login'];
      $_SESSION['role']=$data['role'];
      $_SESSION['user_id']=$data['id'];
      $_SESSION['id']=session_id();
      header("location:index.php");
      die();
     }else{
      $_SESSION['error']="error";
      header("location:index.php");
      die(); 
     }
     $conn = null;
     ?>
    <!--if ($_POST["login"] == 'admin' && $_POST["pwd"] == 'ad1234'){
        $_SESSION['username']="admin";
        $_SESSION['role']="a";
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
        //echo "ยินดีต้อนรับสู่ admin";
     }
     else if ($_POST["login"] == 'member' && $_POST["pwd"] == 'mem1234'){
             $_SESSION['username']="member";
             $_SESSION['role']="m";
             $_SESSION['id']=session_id();
             header("location:index.php");
             die();
            //echo "ยินดีต้อนรับสู่ member";
     }         
     else{
         $_SESSION['error']='error';
         header("location:login.php");
         die();
       //echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
     }  
    ?>
    </div> 
    <div style="text-align: center;">
    <a href="index.php">กลับไปหน้าหลัก</a>
    </div>-->
</body>
</html>