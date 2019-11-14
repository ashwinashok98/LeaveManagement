<?php
include("connect.php");
use phpmailer\PHPMailer\PHPMailer;
require_once "phpmailer/PHPMailer.php";
require_once "phpmailer/Exception.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<head>
    <title>Reset password</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-mail auth-icon"></i>
                    </div>
                    <form action="#" method="post">
                    <h3 class="mb-4">Reset Password</h3>
                    <div class="input-group mb-3">
                    <input type="email" name="c_mail" class="form-control" placeholder="Email">
                        
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mb-4 shadow-2" value="Reset">
                    </form>
                    
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

</body>
</html>
            
        
<?php

if(isset($_POST['submit'])){
    $mail_address = $_POST["c_mail"];
    //Generating a random token
    $s = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
    $s = str_shuffle($s);
    $token = substr($s,0,12);
    $today = date("d-m-Y");

    $url = "localhost/LeaveManagement/confirmPassword.php?m=$mail_address&t=$token";

    $mail = new PHPMailer();
    $mail->setFrom("nikhi013@gmail.com");
    $mail->addAddress($mail_address);
    $mail->Subject = "RESET YOUR PASSWORD xD";
    $mail->isHTML(true);
    $mail->Body ="click link below to reset password<br><br>
    <a href=$url>RESET PASSWORD</a><br><BR>thankyou
    ";
    if($mail->send()){
        
        echo '<script language="javascript">';
        echo 'alert("MAIL SENT")';
        echo '</script>';

        $insert_query = "INSERT into resetpassword(email,token,token_expiry) values('$mail_address','$token',DATE_ADD(NOW(),INTERVAL 5 MINUTE))";
        if(mysqli_query($connect, $insert_query)){
            echo "inserted";
        }else{
            echo "failed to insert";
        }
    }
    else{
        echo "god doesnot exist";
    }

}
?>
