
<?php

session_start();
if(isset($_SESSION['uname']) )
{
  $uid=$_SESSION['uid'];
  $uname=$_SESSION['uname'];
  
  include('connect.php');

  
    
    $output = '';
    $output.="<tbody>";
    $query = "SELECT * FROM leaveapplication where user_id = '".$_SESSION['uid']."' ORDER BY application_id DESC";
    $result = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $orifrom=$row['fromDate'];
            $orito=$row['toDate'];
            $t_from = strtotime($orifrom);
            $t_to = strtotime($orito);
            $new_from = date("d-m-Y", $t_from);
            $new_to = date("d-m-Y", $t_to);


                $output.='<tr class="unread">
                     <td><img class="rounded-circle" style="width:40px;"
                    src="assets/images/user/avatar-1.jpg"
                    alt="activity-user"></td>
            <td>

                <h6 class="mb-1">'.$row["subjectOfLeave"].'</h6>
                <p class="m-0" style="max-width:400px;margin: auto; word-wrap: break-word;white-space: initial">'.$row["reason"].'</p>
            </td>
            <td>
                <h6 class="text-muted"><i
                            class="fas fa-circle text-c-green f-10 m-r-15"></i>'. $new_from.'</h6><h6 class="text-muted"><i
                        class="fas fa-circle text-c-red f-10 m-r-15"></i>'.$new_to.'</h6>
            </td>
            <td>';
                    if($row['leaveStatus']==1)
                    {
                        $output.='<button class="label theme-bg text-white f-15" disabled >Accepted</button></a>
                        </li></form>';
                    }
                    if($row['leaveStatus']==-1)
                    {
                        $output.='<button class="label theme-bg2 text-white f-15" disabled >Rejected</button></a>
                        </li></form>';
                    }
                    if($row['leaveStatus']==0)
                    {
                        $output.='<button class="label theme-bg text-white f-15" disabled >Pending..</button>
                        
                        </form><br></a>
                        </li> <td><button class="label label-danger text-white f-15 delete-button" id='.$row['application_id'].'>Delete</button></a></td>';
                    }
             $output.='</td>
            
             
             </tr></tbody>';
        }

    }
else{
    $output.='<tr class="unread">
    
    <td>

        <h6 class="mb-1">No Requests Made</h6>
        
    </td>

    </tr></tbody>';
    
    }
    $data = array(
        'output' => $output,
        
    );
    echo json_encode($data);
}
else{
    echo '<script>window.location.href = "./";</script>';
}
?>