<?php
session_start();
if(isset($_SESSION['uname']))
{
        include("connect.php");
        $id=$_SESSION['uid'];
        $subject = $_POST["subject"];
        $reason =  $_POST["reason"];
        $fromDate = $_POST["fromDate"];
        $toDate =  $_POST["toDate"];
        $name=$_POST["name"];

        $query = "
        INSERT INTO leaveapplication (user_id,fromDate,toDate,subjectOfLeave,reason,FacultyApproval)
        VALUES ('$id', '$fromDate','$toDate','$subject','$reason','$name')";
        mysqli_query($connect, $query);
        echo '<script>window.location.href = "./indexStud.php";</script>';
    
}
?>