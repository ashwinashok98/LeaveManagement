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
    $output = '
    <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                
                            </div>';

    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $output .= '
        
                            <ul class="noti-body">
                                
                                <li class="notification">
                                    <div class="media">
                                        
                                        <div class="media-body">
                                            <p><strong>';
                                            if($row['leaveStatus']==1)
                                            {
                                                $output.=''.$row["subjectOfLeave"].'</strong></p>
                                                <p>Request Accepted</p>';
                                            }
                                            if($row['leaveStatus']==-1)
                                            {
                                              $output.=''.$row["subjectOfLeave"].'</strong></p>
                                              <p>Request Denied</p>';
                                            }
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
