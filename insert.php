<?php
session_start();
if(isset($_SESSION['uname']))
{
        include("connect.php");
        $id=$_SESSION['uid'];
        $subject = $_POST["subject"];
        $reason =  $_POST["reason"];
        $leave_type=$_POST["type"];
        $fromDate = $_POST["fromDate"];
        $toDate =  $_POST["toDate"];
        $incharge = $_POST["incharge"];
        $name=$_POST["name"];

        $query = "
        INSERT INTO leaveapplication (user_id,fromDate,toDate,subjectOfLeave,reason,typeLeave,inchargeFaculty,FacultyApproval)
        VALUES ('$id', '$fromDate','$toDate','$subject','$reason','$leave_type',' $incharge',' $name')";
        mysqli_query($connect, $query);
        echo '<script>window.location.href = "./index.php";</script>';
    
}
?>