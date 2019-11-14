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
<title>Confirm password</title>
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
                    <form  action="updatePassword.php" method="post">
                    <input type="hidden" name="email" value="<?php echo $email;?>">
                    <input type="hidden" name="t" value="<?php echo $token;?>">

                    <h3 class="mb-4">Change Password</h3>
                    <div class="input-group mb-3">
                    <input type="password" name="pass1" class="form-control" placeholder="Password">
                    </div>
                    <div class="input-group mb-4">
                    <input type="password" name="pass2" class="form-control" placeholder="Confirm Password">
                        </div>
                    
                        
                    
                    <input type="submit" name="submit" class="btn btn-primary mb-4 shadow-2" value="Confirm">
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
}
else{
    echo '<script>window.location.href = "404.html";</script>';
}
?>
<?php
}
else {
    echo '<script>window.location.href = "login.html";</script>';
    echo '<script>window.location.href = "404.html";</script>';
}

?>
