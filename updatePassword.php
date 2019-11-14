<?php
include("connect.php");
    if(isset($_POST['submit']))
    {
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $email = $_POST['email'];
        $token = $_POST["t"];

        //Delete the token form database
        $get_mail_query = "DELETE from resetpassword where token='$token'";
        mysqli_query($connect, $get_mail_query);

        //get user id to update password in login table
        $get_id = "SELECT user_id from user where email='$email'";
        $id = mysqli_query($connect, $get_id);
        if(mysqli_num_rows($id)>0){
            if($row = mysqli_fetch_array($id)){
                $uid = $row['user_id'];
                $update_password="UPDATE login set password='$pass1' where user_id='$uid'";
                if(mysqli_query($connect, $update_password)){
                    echo "<script>alert('reset successfull');</script>";
                    echo '<script>window.location.href = "login.html";</script>';
                }
            }
        }else{
            echo "error in fetching user_id";
        }
    }
    else{
        echo "<script>alert('wrong details entered');</script>";
        echo '<script>window.location.href = "login.html";</script>';
    }

?>
