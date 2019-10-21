
<?php

session_start();
if(isset($_SESSION['uname']) )
{
  $uid=$_SESSION['uid'];
  $uname=$_SESSION['uname'];
  
  include('connect.php');

    $output = '';
    $output.='<tbody>';
        $query = "SELECT * FROM leaveapplication where facultyApproval = '".$uname."' ORDER BY application_id DESC";
        $result = mysqli_query($connect, $query);
        
        if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_array($result))
        {
            $rejid='rej'.$row["application_id"];
            $acpid="acp".$row["application_id"];
                $output.='<tr class="unread">
            <td><img class="rounded-circle" style="width:40px;"
                    src="assets/images/user/avatar-1.jpg"
                    alt="activity-user"><br>Lingam nikhil</td>
            <td>

                <h6 class="mb-1">'.$row["subjectOfLeave"].'</h6>
                <p class="m-0" style="max-width:500px;margin: auto;">'.$row["reason"].'</p>
            </td>
            <td>
                <h6 class="text-muted"><i
                            class="fas fa-circle text-c-green f-10 m-r-15"></i>'.$row["fromDate"].'</h6><h6 class="text-muted"><i
                        class="fas fa-circle text-c-red f-10 m-r-15"></i>'.$row["toDate"].'</h6>
            </td>
            <td><form id='.$row["application_id"].'>';
                    if($row['leaveStatus']==1)
                    {
                        $output.='<button class="label theme-bg text-white f-15 " id='.$acpid.' value='.$acpid.' name="accpt" disabled disabled >Accepted</button></a>
                        </li></form>';
                    }
                    if($row['leaveStatus']==-1)
                    {
                        $output.='<button class="label theme-bg2 text-white f-15 " id='.$rejid.' value='.$rejid.' name="reject" disabled >Rejected</button></a>
                        </li></form>';
                    }
                    if($row['leaveStatus']==0)
                    {
                        $output.='<button class="label theme-bg text-white f-15 leave-button" id='.$acpid.' value='.$acpid.' name="accpt" >Accept</button></a>';
                        
                        $output.='<button class="label theme-bg2 text-white f-15 leave-button" id='.$rejid.' value='.$rejid.' name="reject" >Reject</button></a>
                        </li></form>
                        
                        </a>
                        ';
                    }
            $output.='</td>
        </tr></tbody>';
        
    }
    
    }
    else{
        $output.='<tr class="unread">
        
        <td>

            <h6 class="mb-1">No Requests Recieved</h6>
            
        </td>
    
        </tr></tbody>';
       
    }
    $data = array(
        'output' => $output,
        
    );
    echo json_encode($data);
}
?>
    
