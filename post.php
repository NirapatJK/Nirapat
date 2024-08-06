<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard Joe</h1>
    <hr>
    <div style="text-align: center;">
        ต้องการดูกระทู้หมายเลข <?php echo $_GET['id']?><br>
    </div>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr>
            <td colspan="2" style="background-color: #6cd2fe; text-align:left">แสดงความคิดเห็น</td></tr>
        <tr>
        <div style="text-align: center;">
        <?php 
          if (($_GET['id'] % 2) == 0)
            echo "เป็นกระทู้หมายเลขคู่";
          else
            echo "เป็นกระทู้หมายเลขคี่"; 
          ?> 
        </div>  
            <td colspan="2" align="center"> <textarea name=""></textarea></td></tr> 
        <tr>
            <td colspan="2" align="center"> <input type="submit" value="ส่งข้อความ"></td></tr>   
        </tr>
    </table>
    <div style="text-align: center;">
    <a href="index.php">กลับไปหน้าหลัก</a>
    </div>

</body>
</html>