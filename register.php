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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function OnBlurPwd(){
            let pwd1 = document.getElementById("pwd1");
            let pwd2 = document.getElementById("pwd2");
            if(pwd1.value !== pwd2.value){
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                pwd1.value="";
                pwd2.value="";
            }
        }
    </script>
</head>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard Joe</h1>
    <?php include "nav.php";?>
    <div class="row mt-4">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <?php
                if(isset( $_SESSION['add_login'])){
                    if($_SESSION['add_login']=="error"){
                        echo "<div class= 'alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                    }else{
                        echo "<div class= 'alert alert-success'>เพิ่มบัญชีเรียบร้อยแล้ว</div>"; 
                    }
                    unset($_SESSION['add_login']);
                } 
            ?>
            <!--<div class="row mt-4">-->
            <!--<div class="col-sm-10 col-md-8 col-lg-6 mx-auto">-->
            <div class="card border-primary mt-4">      
              <h5 class="card-header bg-primary text-white">เข้าสู่ระบบ</h5>
              <div class="card-body"> 
              <form action="register_save.php" method="post">
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="login">ชื่อบัญชี :</label>
                    <div class="col-lg-9">
                        <input id="login" type="text" name="login" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="pwd">รหัสผ่าน :</label>
                    <div class="col-lg-9">
                        <input id="pwd1" type="password" name="pwd" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="pwd">ใส่รหัสผ่านซ้ำ :</label>
                    <div class="col-lg-9">
                        <input id="pwd2" type="password" name="pwd2" class="form-control" onblur="OnBlurPwd()" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="name">ชื่อ-นามสกุล :</label>
                    <div class="col-lg-9">
                        <input id="name" type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="gender">เพศ :</label>
                    <div class="col-lg-9">
                    <div class="form-check">
                        <input type="radio" name="gender" value="m" class="form-check-input" required>
                        ชาย <br>   
                        <input type="radio" name="gender" value="f" class="form-check-input" required>
                        หญิง <br>
                        <input type="radio" name="gender" value="o" class="form-check-input" required>
                        อื่นๆ <br>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="email">อีเมล :</label>
                    <div class="col-lg-9">
                        <input id="email" type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm me-2">
                            <i class="bi bi-save"></i> สมัครสมาชิก
                        </button>
                    </div>   
                </div>
               </div>
              </form>
           </div>
           </div>
           <!--</div>-->
           <!--</div>-->
           </div>
        </div>
    </div>
</body>
</html>

<!--<h1 style="text-align: center;">สมัครสมาชิก</h1>
    <hr>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" style="background-color: #6CD2FE;">กรอกข้อมูล</td></tr>
        <tr><td>ชื่อบัญชี:</td><td><input type="text" name = "name account"></td></tr>
        <tr><td>รหัสผ่าน:</td><td><input type="password" name = "password account"></td></tr>
        <tr><td>ชื่อ-นามสกุล:</td><td><input type="text" name = "Full name"></td></tr>
        <tr><td>เพศ:</td><td>
            <form>
                <input type="radio" name="gender" value="ชาย">
                ชาย<br>
                <input type="radio" name="gender" value="หญิง">
                หญิง<br>
                <input type="radio" name="gender" value="อื่นๆ">
                อื่นๆ<br>
            </form></td></tr>
        <tr><td>อีเมล:</td><td><input type="text" name = "email"></td></tr>
        <tr><td colspan="2" align="center"><input type ="submit" value="สมัครสมาชิก"></td></tr>
    </table>
    <br>
    <div style="text-align: center;">
         <a href="index.php">กลับไปหน้าหลัก</a>
    </div>-->