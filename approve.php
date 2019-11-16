
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
            $two=2;
            $one=1;
            $stmt = $connect->prepare( "UPDATE leaveapplication SET notification_status = ?, leaveStatus=?   WHERE application_id = ?");
            $stmt->bind_param("iii",$two,$one,$id);
            $stmt->execute();//Updating leave status and notification status


            $getDetails = $connect->prepare("select * from leaveapplication l , user u where l.user_id= u.user_id And application_id =?");
            $getDetails->bind_param("i", $id);
            $getDetails->execute();
            $Details = $getDetails->get_result();
            $user_detail = $Details->fetch_assoc();//getting the details of the user who is applying leave

            $update_leave_status= 'UPDATE user SET LeaveTaken = LeaveTaken+1 , balanceLeave=balanceLeave-1   WHERE user_id = $user_detail["user_id"] ';
            mysqli_query($connect,  $update_leave_status);

           

            
            $leave_query= $connect->prepare("select * from leaveapplication where application_id = ? ");
            $leave_query->bind_param("i",$id);
            $leave_query->execute();
            $leave_sub = $leave_query->get_result();
            $leave_sub_res = $leave_sub->fetch_assoc();

           
            $subject="Regarding your leave application";
            $message = "Your leave [ID:".$id."] application ".$leave_sub_res['subjectOfLeave']." has been Approved by ".$uname.".\n \n Leave Taken:".$user_detail['LeaveTaken']."\n Leave Balance:".$user_detail['balanceLeave']." \nThankyou.";
            if(mail($user_detail['email'],$subject,$message))
            {
                echo '<script src="./assets/plugins/sweetalert/js/sweetalert.min.js"></script>';
                echo" <script>swal('Mail Sent', '', 'success');</script>";
            }
        }
        if($state=="rej")
        {
            $two=2;
            $mone=-1;

            $stmt = $connect->prepare( "UPDATE leaveapplication SET notification_status = ?, leaveStatus=?   WHERE application_id = ?");
            $stmt->bind_param("iii",$two,$mone,$id);
            $stmt->execute();//Updating leave status and notification status

            $getDetails = $connect->prepare("select * from leaveapplication l , user u where l.user_id= u.user_id And application_id =?");
            $getDetails->bind_param("i", $id);
            $getDetails->execute();
            $Details = $getDetails->get_result();
            $user_detail = $Details->fetch_assoc();//getting the details of the user who is applying leave

            $leave_query= $connect->prepare("select * from leaveapplication where application_id = ? ");
            $leave_query->bind_param("i",$id);
            $leave_query->execute();
            $leave_sub = $leave_query->get_result();
            $leave_sub_res = $leave_sub->fetch_assoc();//Get leave Application Details for leave id

            $subject="Regarding your leave application";
            $message = "Your leave [ID:".$id."] application ".$leave_sub_res['subjectOfLeave']." has been Rejected by ".$uname.".\n \n Leave Taken:".$user_detail['LeaveTaken']."\n Leave Balance:".$user_detail['balanceLeave']." \nThankyou.";
            if(mail($user_detail['email'],$subject,$message))
            {
                echo "<script>alert('mail sent');</script>";
            }
        }
        
        
        


       
    }
}
    
    

    
?>