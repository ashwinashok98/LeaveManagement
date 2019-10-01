<?php
session_start();
if(isset($_SESSION['uname']) )
{
  $uid=$_SESSION['uid'];
  $uname=$_SESSION['uname'];
  
  include('connect.php');
  if(isset($_POST['view'])){

    if($_POST["view"] != '')
    {
        $update_query = "UPDATE leaveapplication SET notification_status = 1 WHERE notification_status=0 and facultyApproval = '".$uname."'";
        mysqli_query($connect, $update_query);
        var_dump($update_query);
    }
    $query = "SELECT * FROM leaveapplication where facultyApproval = '".$uname."' ORDER BY application_id DESC LIMIT 5 ";
    $result = mysqli_query($connect, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $output .= '
        <li>
        <a href="leave_sheet.php">
        <strong>'.$row["subjectOfLeave"].'</strong><br />
        
        </a>
        </li>
        ';
      }
    }
    else{
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
    $status_query = "SELECT * FROM leaveapplication WHERE notification_status=0 and  facultyApproval = '".$uname."'";
    $result_query = mysqli_query($connect, $status_query);
    $count = mysqli_num_rows($result_query);
    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );
    echo json_encode($data);
  }
}
