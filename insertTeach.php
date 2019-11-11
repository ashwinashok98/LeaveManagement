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
        $days = (abs(strtotime($toDate) - strtotime($fromDate))/60/60/24);
        $flag="";

        if(isset($_POST["incharge"]))
        {
            $flag="incharge";
            $incharge = $_POST["incharge"];
                $query = "
                INSERT INTO leaveapplication (user_id,fromDate,toDate,subjectOfLeave,reason,typeLeave,inchargeFaculty,hodStatus,notification_status)
                VALUES ('$id', '$fromDate','$toDate','$subject','$reason','$leave_type','$incharge',1,4)";
                mysqli_query($connect, $query);
        }
        else{
            $flag="table";

            $query = "
            INSERT INTO leaveapplication (user_id,fromDate,toDate,subjectOfLeave,reason,typeLeave,inchargeFaculty,hodStatus,notification_status)
            VALUES ('$id', '$fromDate','$toDate','$subject','$reason','$leave_type','D_faculty',1,4)";
            mysqli_query($connect, $query);

            $get_ApplicationId_query = "select application_id from leaveapplication WHERE subjectOfLeave='$subject' and reason='$reason' and fromDate='$fromDate' and toDate='$toDate'";
            $application_Id = mysqli_query($connect, $get_ApplicationId_query);

            if (mysqli_num_rows($application_Id) > 0) {
                if($row_application_id = mysqli_fetch_array($application_Id)) {
                    $got_id = $row_application_id['application_id'];
                }
            }

            for ($d = 1; $d <= $days+1; $d++) {
                $p1 = $_POST['teach'.(string)$d.(string)1];
                $p2 = $_POST['teach'.(string)$d.(string)2];
                $p3 = $_POST['teach'.(string)$d.(string)3];
                $p4 = $_POST['teach'.(string)$d.(string)4];
                $p5 = $_POST['teach'.(string)$d.(string)5];
                $p6 = $_POST['teach'.(string)$d.(string)6];
                $p7 = $_POST['teach'.(string)$d.(string)7];

                $s1 = $_POST['sem'.(string)$d.(string)1];
                $s2 = $_POST['sem'.(string)$d.(string)2];
                $s3 = $_POST['sem'.(string)$d.(string)3];
                $s4 = $_POST['sem'.(string)$d.(string)4];
                $s5 = $_POST['sem'.(string)$d.(string)5];
                $s6 = $_POST['sem'.(string)$d.(string)6];
                $s7 = $_POST['sem'.(string)$d.(string)7];

                $p1 = $p1."-".$s1;
                $p2 = $p2."-".$s2;
                $p3 = $p3."-".$s3;
                $p4 = $p4."-".$s4;
                $p5 = $p5."-".$s5;
                $p6 = $p6."-".$s6;
                $p7 = $p7."-".$s7;

                $insert_details_query = "insert into managefaculty
                VALUES($got_id,$d,'$p1','$p2','$p3','$p4','$p5','$p6','$p7')";
                if(mysqli_query($connect, $insert_details_query)){
                    echo "<script>alert('insert success');</script>";
                }

            }
        }
        echo '<script>window.location.href = "./index.php";</script>';
}
?>
