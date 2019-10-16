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
    
    $output = ' <div class="noti-head">
    <h6 class="d-inline-block m-b-0">Notifications</h6>
    <div class="float-right">
        
    </div>
</div>';
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
        {
          $query1="SELECT name from `user`,`leaveapplication` WHERE user.user_id = '".$row['user_id']."'";
    
          $result1 = mysqli_query($connect, $query1);
          $s=mysqli_fetch_array($result1);
          $student_name=$s['name'];
        $output .= '
       
                            <ul class="noti-body">
                                
                                <li class="notification">
                                    <div class="media">
                                        
                                        <div class="media-body">
                                            <p><strong><h6><b>'.$student_name.'</b></h6></strong></p>
                                              <p>Leave Request</p>
                                              <p>'.$row["subjectOfLeave"].'</p>';
                                            
                                            $output.='
                                        </div>
                                    </div>
                                </li>
                              </ul>
                            </div>';
        
      }
    }
    
    else{
        $output .= '
        <ul class="noti-body">
            
            <li class="notification">
                <div class="media">
                    
                    <div class="media-body">
                        <p><strong>No Notification Found</strong></p>           
                       
                    </div>
                </div>
            </li>
          </ul>
        </div>';
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