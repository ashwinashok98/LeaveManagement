<?php
if(isset($_GET['t']) and isset($_GET['m']))
{
include("connect.php");
$email = $_GET['m'];
$token = $_GET['t'];

$verify_url = "SELECT * from resetpassword where token='$token' and token_expiry>NOW()";
$rows = mysqli_query($connect, $verify_url);
if(mysqli_num_rows($rows)>0){

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form  action="updatePassword.php" method="post">
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="t" value="<?php echo $token;?>">
            new password: <input type="password" name="pass1" ><br>
            confirm password:<input type="password" name="pass2" >
            <input type="submit" name="submit">
        </form>
    </body>
</html>
<?php
}
else{
    echo "<h3>link expired</h3><br><h4>try again.</h4>";
}
?>
<?php
}
else {
    echo '<script>window.location.href = "login.html";</script>';
    echo '<script>window.location.href = "404.html";</script>';
}

?>
