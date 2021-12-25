<?php

session_start();
include 'include/connection.php';

$adminMail = $_POST['email'] ?? NULL;
$adminPass = $_POST['password'] ?? NULL;
$log = $_POST['log'] ?? NULL;







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>تسجيل الدخول</title>

    <style>
    .login {
        width: 350px;
        margin: 80px auto;
    }

    .login h5 {
        color: #555;
        margin-bottom: 10px;
        text-align: center;
    }

    .login button {
        margin-right: 80px;
    }
    </style>
</head>

<body>


    <div class="login">
        <?php
        if (isset($log)) {
            if (empty($adminMail) || empty($adminPass)) {
                echo "<div class='alert alert-danger'>"  . "الرجاء إدخال البريد الإلكترونى وكلمة السر" . "</div>";
            } else {
                $query = "SELECT * FROM `admin` WHERE email='$adminMail' AND password = '$adminPass' ";

                $res = mysqli_query($conn, $query);

                $row = mysqli_fetch_assoc($res);

                if (in_array($adminMail, $row) && in_array($adminPass, $row)) {
                    echo "<div class='alert alert-success'>"  . "مرحبا سيتم تحويلك إلى لوحة التحكم" . "</div>";
                    $_SESSION['id'] = $row['id'];
                    header("REFRESH:2;url=categories.php");
                } else {
                    echo "<div class='alert alert-danger'>"  . "البيانات غير متطابقة" . "</div>";
                }
            }
        }

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <h5>تسجيل الدخول</h5>
            <div class="form-group">
                <label for="mail">البريد الإلكترونى</label>
                <input type="text" name="email" id="mail" placeholder="أدخل البريد الإلكترونى" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">كلمة المرور</label>
                <input type="text" name="password" id="pass" placeholder="أدخل كلمة المرور" class="form-control">
            </div>
            <button class="btn btn-custom" name="log">تسجيل الدخول</button>
        </form>
    </div>

    <!-- JQUERY  -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/44c61da6d8.js" crossorigin="anonymous"></script>
    <!-- BOOSTRAP JS -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>