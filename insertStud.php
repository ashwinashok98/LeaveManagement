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

        $stmt2 = $connect->prepare("INSERT INTO leaveapplication(user_id,fromDate,toDate,subjectOfLeave,reason,FacultyApproval) VALUES (?,?,?,?,?,?)");
        
        $stmt2->bind_param('ssssss', $id, $fromDate,$toDate,$subject,$reason,$name);
        $stmt2->execute();

        echo '<script>window.location.href = "./indexStud.php";</script>';
    
}
?>