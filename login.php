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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function password_show_hide(){
            let pwd = document.getElementById("pwd");
            let show_eye = document.getElementById("show_eye");
            let hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove('d-none');
            if(pwd.type == 'password'){
                pwd.type='text';
                show_eye.style.display="none";
                hide_eye.style.display="block";
            }else{
                pwd.type='password';
                show_eye.style.display="block";
                hide_eye.style.display="none";
            }
        }
    </script>
</head>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard Joe</h1>
    <?php include "nav.php";?>
    <div class="row mt-4">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
            <?php
                if(isset($_SESSION['error'])){
                    echo "<div class= 'alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                    unset($_SESSION['error']);
                }
            ?>
    <div class="card mt-4">
        <h5 class="card-header">เข้าสู่ระบบ</h5>
         <div class="card-body">
            <form action="verify.php" method="post">
                <div class="form-group">
                    <label for="login" class="form-label">Login:</label>
                    <input id="login" type="text" class="form-control" name="login">
                </div>
                <div class="form-group mt-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <div class="input-group">
                        <input id="pwd" type="password" class="form-control" name="pwd">
                        <span class="input-group-text" onclick="password_show_hide()">
                            <i class="b1 bi-eye-fill" id="show_eye"></i>
                            <i class="b1 bi-eye-slash-fill d-none" id="hide_eye"></i>
                        </span>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm me-2">Login</button>
                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--<form action="verify.php" method="post">
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" style="background-color: #6CD2FE;">เข้าสู่ระบบ</td></tr>
        <tr><td>Login</td><td><input type="text" name="login"></td></tr>
        <tr><td>Password</td><td><input type="password" name="pwd"></td></tr>
        <tr><td colspan="2" align="center"><input type ="submit" value="Login"></td></tr>
    </table>
    </form>-->
    <br>
    <div style="text-align: center;">
        ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a>
    </div>
    </div>
</body>
</html>