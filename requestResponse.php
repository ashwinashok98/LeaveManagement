<?php
include("connect.php");
session_start();
if(isset($_SESSION['uname']) and $_SESSION['udesignation']=='faculty')
{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>APPROVE REQUESTS</title>
    </head>
    <body>
        <h3>welcome to approve or reject requests</h3>
        <?php
            $requestQuery ="SELECT * FROM leaveapplication WHERE facultyApproval='anusha' and leaveStatus=0 ";
            $requestAll = mysqli_query($connect, $requestQuery);
            if (!$requestAll)
            {
                echo(mysqli_error($connect));
            }
            if(mysqli_num_rows($requestAll) > 0)
            {
                while($row_request= mysqli_fetch_array($requestAll))
                {
            ?>
                <form action="#" method="post">
            <?php
                    echo "<input type='hidden' name='app_id' value='".$row_request['application_id']."'>";
                    echo "<input type='hidden' name='user_id' value='".$row_request['user_id']."'>";
                    echo "<input type='submit' name='Accept' value='Accept'>";
                    echo "&nbsp<input type='submit' name='Reject' value='Reject'>";
                    echo "<br><br>";
            ?>
                </form>
            <?php
                }
        ?>
    </form>
        <?php
            }
            else{
                echo "no records found";
            }
         ?>
    </body>
</html>
<?php
    if(isset($_POST['Accept'])){
        $app_id = $_POST['app_id'];
        $user_id = $_POST['user_id'];
        $updateLeaveStatus = "update leaveapplication set leaveStatus=1 where application_id='$app_id'";
        $updateLeave = mysqli_query($connect, $updateLeaveStatus);
        $getMail = "select * from user where user_id='$user_id'";
        $Mail = mysqli_query($connect, $getMail);
        $user_mail = mysqli_fetch_assoc($Mail);

        $subject="Regarding your leave application";
        $message = "hai \nyour leave application has been Approved.\nThankyou.";
        if(mail($user_mail['email'],$subject,$message))
        {
            echo "<script>alert('mail sent');</script>";
        }
    }
    if(isset($_POST['Reject'])){
        $app_id = $_POST['app_id'];
        $user_id = $_POST['user_id'];
        $getMail = "select * from user where user_id='$user_id'";
        $Mail = mysqli_query($connect, $getMail);
        $user_mail = mysqli_fetch_assoc($Mail);
        $subject="Regarding your leave application";
        $message = "hai \nyour leave application has been rejected.\nAny queries you can meet your class teacher rearding issue.\nThankyou.";
        if(mail($user_mail['email'],$subject,$message))
        {
            echo "<script>alert('mail sent');</script>";
        }
    }
?>
<?php
}
else
{
    echo '<script>window.location.href = "./login.php";</script>';
}
?>
