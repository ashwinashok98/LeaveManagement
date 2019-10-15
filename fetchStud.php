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
        $update_query = "UPDATE leaveapplication SET notification_status = 3 WHERE notification_status=2 and user_id = '".$uid."'";
        
        mysqli_query($connect, $update_query);
        
        
    }
    $query = "SELECT * FROM leaveapplication where notification_status=3 and user_id = '".$uid."' ORDER BY application_id DESC LIMIT 5";
    $result = mysqli_query($connect, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $output .= '
        <li>
        <a href="leave_sheet_stud.php">
        <strong>';
        if($row['leaveStatus']==1)
        {
            $output.='A  </strong>'.$row["subjectOfLeave"].'<br />';
        }
        if($row['leaveStatus']==-1)
        {
            $output.='R  </strong>'.$row["subjectOfLeave"].'<br />';
        }
        
        
        $output.='</a>
                </li>';
      }
    }
    else{
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
    $status_query = "SELECT * FROM leaveapplication WHERE notification_status=2 and  user_id = '".$uid."'";
    $result_query = mysqli_query($connect, $status_query);
    $count = mysqli_num_rows($result_query);
    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );
    echo json_encode($data);
  }
}
