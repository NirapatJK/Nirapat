<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <?php
      $login = $_POST['login'];
      $pwd = $_POST['pwd'];
    ?>
    <h1 style="text-align: center;">Webboard Joe</h1>
    <hr>
    <div style="text-align: center;">
    <?php
    if ($login == 'admin' && $pwd == 'ad1234')
       echo "ยินดีต้อนรับสู่ admin";
    else if ($login == 'member' && $pwd == 'mem1234')
       echo "ยินดีต้อนรับสู่ member";
    else
       echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
    ?>
    </div> 
    <div style="text-align: center;">
    <a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>