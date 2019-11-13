<?php
include("connect.php");
use phpmailer\PHPMailer\PHPMailer;
require_once "phpmailer/PHPMailer.php";
require_once "phpmailer/Exception.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>confirm Email Address</title>
    </head>
    <body>
        <h1>Enter Registered email address</h1>
        <p>A link will be sent to your gmail.click to reset your password.</p>
        <form action="#" method="post">
            confirm email:
            <input type="email" name="c_mail" placeholder="Enter Registered Mail_id">
            <input type="submit" name="submit" value="reset">
        </form>
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
        echo "link to reset password has been sent";
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
