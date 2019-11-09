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
        $flag="";
       
        if(isset($_POST["incharge"]))
        {
            $flag="incharge";
            $incharge = $_POST["incharge"];
            $query = "
            INSERT INTO leaveapplication (user_id,fromDate,toDate,subjectOfLeave,reason,typeLeave)
            VALUES ('$id', '$fromDate','$toDate','$subject','$reason','$leave_type')";
            mysqli_query($connect, $query);
        }
        else{
            $flag="table";
            $days = $_POST["day"];
            for ($d = 1; $d <= $days; $d++) {

                $p1 = $_POST['teach' . (string) $d . (string) 1];
                $p2 = $_POST['teach' . (string) $d . (string) 2];
                $p3 = $_POST['teach' . (string) $d . (string) 3];
                $p4 = $_POST['teach' . (string) $d . (string) 4];
                $p5 = $_POST['teach' . (string) $d . (string) 5];
                $p6 = $_POST['teach' . (string) $d . (string) 6];
                $p7 = $_POST['teach' . (string) $d . (string) 7];

                $sem_p1 = $_POST['sem' . (string) $d . (string) 1];
                $sem_p2 = $_POST['sem' . (string) $d . (string) 2];
                $sem_p3 = $_POST['sem' . (string) $d . (string) 3];
                $sem_p4 = $_POST['sem' . (string) $d . (string) 4];
                $sem_p5 = $_POST['sem' . (string) $d . (string) 5];
                $sem_p6 = $_POST['sem' . (string) $d . (string) 6];
                $sem_p7 = $_POST['sem' . (string) $d . (string) 7];
                
            }
            $query = "
            INSERT INTO leaveapplication (user_id,fromDate,toDate,subjectOfLeave,reason,typeLeave)
            VALUES ('$id', '$fromDate','$toDate','$subject','$reason','$leave_type')";
            mysqli_query($connect, $query);
        }
        

        
        echo '<script>window.location.href = "./index.php";</script>';

}
?>