
<?php
session_start();
if(isset($_SESSION['uname']) )
{
  $uid=$_SESSION['uid'];
  $uname=$_SESSION['uname'];
  
  include('connect.php');
  if(isset($_POST['id']))
  {
        $state=substr($_POST['id'],0,3);
        $id=substr($_POST['id'],3);
        if($state=="acp")
        {
            $update_query = "UPDATE leaveapplication SET notification_status = 6, leaveStatus=1  WHERE application_id = '".$id."'";
            mysqli_query($connect, $update_query);
            $getMail = "select * from user where user_id='$user_id'";
            $Mail = mysqli_query($connect, $getMail);
            $user_mail = mysqli_fetch_assoc($Mail);
            $leave_query="select * from leaveapplication where application_id = '".$id."'";
            $leave_sub = mysqli_query($connect, $leave_query);
            $leave_sub_res = mysqli_fetch_assoc($leave_sub);
            $subject="Regarding your leave application";
            $message = "Your leave application ".$leave_sub_res['subjectOfLeave']." has been Approved.\nThankyou.";
            if(mail($user_mail['email'],$subject,$message))
            {
                echo "<script>alert('mail sent');</script>";
            }
        }
        if($state=="rej")
        {
            $update_query = "UPDATE leaveapplication SET notification_status = 6, leaveStatus=-1 WHERE application_id = '".$id."'";
            mysqli_query($connect, $update_query);
            $getMail = "select * from user where user_id='$user_id'";
            $Mail = mysqli_query($connect, $getMail);
            $user_mail = mysqli_fetch_assoc($Mail);
            $leave_query="select * from leaveapplication where application_id = '".$id."'";
            $leave_sub = mysqli_query($connect, $leave_query);
            $leave_sub_res = mysqli_fetch_assoc($leave_sub);
            $subject="Regarding your leave application";
            $message = "Your leave application ".$leave_sub_res['subjectOfLeave']." has been Rejected.\nThankyou.";
            if(mail($user_mail['email'],$subject,$message))
            {
                echo "<script>alert('mail sent');</script>";
            }
        }
        
        
        


       
    }
}
    
    

    
?>