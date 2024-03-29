
<?php

session_start();
if (isset($_SESSION['uname']))
 {
    $uid = $_SESSION['uid'];
    $uname = $_SESSION['uname'];

    include('connect.php');

    $output = '';
    $output .= '<tbody>';
    $output1 = '';
    $output1 .= '<tbody>';
    $output2 = '';
    $output2 .= '<tbody>';
    if ($_SESSION['desig'] != 'hod') {
        $query = "SELECT * FROM leaveapplication where facultyApproval = '" . $uname . "' ORDER BY application_id DESC";//student leave req
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $query1 = "SELECT name from `user`,`leaveapplication` WHERE user.user_id = '".$row['user_id']."'";

                $result1 = mysqli_query($connect, $query1);
                $s = mysqli_fetch_array($result1);
                $name = $s['name'];

                $rejid = 'rej' . $row["application_id"];
                $acpid = "acp" . $row["application_id"];

                $orifrom=$row['fromDate'];
                $orito=$row['toDate'];
                $t_from = strtotime($orifrom);
                $t_to = strtotime($orito);
                $new_from = date("d-m-Y", $t_from);
                $new_to = date("d-m-Y", $t_to);


                $output .= '<tr class="unread">
            <td><img class="rounded-circle" style="width:40px;"
                    src="assets/images/user/avatar-1.jpg"
                    alt="activity-user"><br>'.$name.'</td>
                    <td>

                    <h6 class="mb-1">'.$row["subjectOfLeave"].'</h6>
                    <p class="m-0" style="max-width:400px;margin: auto; word-wrap: break-word;white-space: initial">'.$row["reason"].'</p>
                </td>
            <td>
                <h6 class="text-muted"><i
                            class="fas fa-circle text-c-green f-10 m-r-15"></i>' . $new_from . '</h6><h6 class="text-muted"><i
                        class="fas fa-circle text-c-red f-10 m-r-15"></i>' . $new_to . '</h6>
            </td>
            <td><form id=' . $row["application_id"] . '>';
                if ($row['leaveStatus'] == 1) {
                    $output .= '<button class="label theme-bg text-white f-15 " id=' . $acpid . ' value=' . $acpid . ' name="accpt" disabled disabled >Accepted</button></a>
                        </li></form>';
                }
                if ($row['leaveStatus'] == -1) {
                    $output .= '<button class="label theme-bg2 text-white f-15 " id=' . $rejid . ' value=' . $rejid . ' name="reject" disabled >Rejected</button></a>
                        </li></form>';
                }
                if ($row['leaveStatus'] == 0) {
                    $output .= '<button class="label theme-bg text-white f-15 leave-button" id=' . $acpid . ' value=' . $acpid . ' name="accpt" >Accept</button></a>';

                    $output .= '<button class="label theme-bg2 text-white f-15 leave-button" id=' . $rejid . ' value=' . $rejid . ' name="reject" >Reject</button></a>
                        </li></form>
                        
                        </a>
                        ';
                }
                $output .= '</td>
            </tr></tbody>';
            }
        } else {
            $output .= '<tr class="unread">
        
        <td>

            <h6 class="mb-1">No Requests</h6>
            
        </td>
    
        </tr></tbody>';
        }
        $query = "SELECT * FROM leaveapplication where user_id='".$uid."' ORDER BY application_id DESC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $orifrom=$row['fromDate'];
                $orito=$row['toDate'];
                $t_from = strtotime($orifrom);
                $t_to = strtotime($orito);
                $new_from = date("d-m-Y", $t_from);
                $new_to = date("d-m-Y", $t_to);
                $output1 .= '<tr class="unread">
                <td><img class="rounded-circle" style="width:40px;"
               src="assets/images/user/avatar-1.jpg"
               alt="activity-user"></td>
               <td>

               <h6 class="mb-1">'.$row["subjectOfLeave"].'</h6>
               <p class="m-0" style="max-width:400px;margin: auto; word-wrap: break-word;white-space: initial">'.$row["reason"].'</p>
           </td>
             <td>
           <h6 class="text-muted"><i
                       class="fas fa-circle text-c-green f-10 m-r-15"></i>' . $new_from . '</h6><h6 class="text-muted"><i
                   class="fas fa-circle text-c-red f-10 m-r-15"></i>' . $new_to . '</h6>
       </td>
       <td> <button type="button" class="label label-info text-white f-15" data-toggle="modal" data-target="#myModal" id='.$row['application_id'].' onClick="detail_show(this.id)">INFO</button></td>
       
       <td>';
                if ($row['leaveStatus'] == 1) {
                    $output1 .= '<button class="label theme-bg text-white f-15" disabled >Accepted</button></a>
                   </li></form>';
                }
                if ($row['leaveStatus'] == -1) {
                    $output1 .= '<button class="label theme-bg2 text-white f-15" disabled >Rejected</button></a>
                   </li></form>';
                }
                if ($row['leaveStatus'] == 0) {
                    $output1 .= '<button class="label label-warning theme-bg3 text-white f-15" disabled >Pending..</button>
                   
                   </form><br></a>
                   </li><td><button class="label label-danger text-white f-15 delete-button" id='.$row['application_id'].'>Delete</button></a></td>';
                }
                $output1 .= '</td>
        </tr></tbody>';
            }
        } else {
            $output1 .= '<tr class="unread">
        
        <td>

            <h6 class="mb-1">No Requests</h6>
            
        </td>
    
        </tr></tbody>';
        }
    }
    if ($_SESSION['desig'] == 'hod') {
        $query = "SELECT * FROM leaveapplication where  hodStatus=1 ORDER BY application_id DESC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $query1 = "SELECT name from `user`,`leaveapplication` WHERE user.user_id = '".$row['user_id']."'";

                $result1 = mysqli_query($connect, $query1);
                $s = mysqli_fetch_array($result1);
                $name = $s['name'];
                $orifrom=$row['fromDate'];
                $orito=$row['toDate'];
                $t_from = strtotime($orifrom);
                $t_to = strtotime($orito);
                $new_from = date("d-m-Y", $t_from);
                $new_to = date("d-m-Y", $t_to);
                
                $rejid = 'rej' . $row["application_id"];
                $acpid = "acp" . $row["application_id"];
                $output .= '<tr class="unread">
            <td><img class="rounded-circle" style="width:40px;"
                    src="assets/images/user/avatar-1.jpg"
                    alt="activity-user"><br>'.$name.'</td>
            <td>

                <h6 class="mb-1">' . $row["subjectOfLeave"] . '</h6>
                <p class="m-0" style="max-width:400px;margin: auto; word-wrap: break-word;white-space: initial">' . $row["reason"] . '</p>
            </td>
            <td>
                <h6 class="text-muted"><i
                            class="fas fa-circle text-c-green f-10 m-r-15"></i>' .  $new_from . '</h6><h6 class="text-muted"><i
                        class="fas fa-circle text-c-red f-10 m-r-15"></i>' . $new_to . '</h6>
            </td>
            <td> <button type="button" class="label label-info text-white f-15" data-toggle="modal" data-target="#myModal" id='.$row['application_id'].' onClick="detail_show(this.id)">INFO</button></td>
            <td><form id=' . $row["application_id"] . '>';
            
                if ($row['leaveStatus'] == 1) {
                    $output .= '<button class="label theme-bg text-white f-15 " id=' . $acpid . ' value=' . $acpid . ' name="accpt" disabled disabled >Accepted</button></a>
                        </li></form>';
                }
                if ($row['leaveStatus'] == -1) {
                    $output .= '<button class="label theme-bg2 text-white f-15 " id=' . $rejid . ' value=' . $rejid . ' name="reject" disabled >Rejected</button></a>
                        </li></form>';
                }
                if ($row['leaveStatus'] == 0) {
                    $output .= '<button class="label theme-bg text-white f-15 leave-button" id=' . $acpid . ' value=' . $acpid . ' name="accpt" >Accept</button></a>';

                    $output .= '<button class="label theme-bg2 text-white f-15 leave-button" id=' . $rejid . ' value=' . $rejid . ' name="reject" >Reject</button></a>
                        </li></form>
                        
                        </a>
                        ';
                }
                $output .= '</td>
            </tr></tbody>';
            }
        } 
        
        else {
            $output .= '<tr class="unread">
        
        <td>

            <h6 class="mb-1">No Requests </h6>
            
        </td>
    
        </tr></tbody>';
        }
                
    }
    //<!--------------------------------Substitution----------------------------------------!>

      
        $query = "SELECT * FROM `managefaculty` , leaveapplication where managefaculty.application_id=leaveapplication.application_id and leaveapplication.leaveStatus=1 ORDER BY leaveapplication.application_id DESC";
        $result = mysqli_query($connect, $query);
        $output2.='<tr class="unread"><th>Date</th><th class>08.45 to 09.35</th>
        <th class>09.35 to 10.25</th>
        <th class>10.40 to 11.30</th>
        <th class>11.30 to 12.20</th>
        <th class>12.20 to 1.10</th>
        <th class>01.50 to 02.40</th>
        <th class>02.40 to 03.30</th></tr>';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

                $output2.='<tr>';
                if (strpos($row['period1'], $uname) !== false || strpos($row['period2'], $uname) !== false || strpos($row['period3'], $uname) !== false || strpos($row['period4'], $uname) !== false || strpos($row['period5'], $uname) !== false || strpos($row['period6'], $uname) !== false || strpos($row['period7'], $uname) !== false)
                {
                    $ori=$row['date'];
                    $t= strtotime($ori);
                    $newdate = date("d-m-Y", $t);
                    $output2.='<td>'.$newdate.'</td>';
                    if (strpos($row['period1'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period1'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }   

//<!--------------------------------Substitution----------------------------------------!>
                    if (strpos($row['period2'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period2'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }  
              //<!--------------------------------Substitution----------------------------------------!>      
                    
                    if (strpos($row['period3'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period3'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }  

//<!--------------------------------Substitution----------------------------------------!>
                    if (strpos($row['period4'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period4'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }  

//<!--------------------------------Substitution----------------------------------------!>
                    if (strpos($row['period5'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period5'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }  

//<!--------------------------------Substitution----------------------------------------!>
                    if (strpos($row['period6'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period6'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }  

//<!--------------------------------Substitution----------------------------------------!>
                    if (strpos($row['period7'], $uname) !== false)   
                    {
                        $output2.='<td>'.$row['period7'].'</td>';
                    }
                    else
                    {
                         $output2.='<td>---</td>';
                    }  
                }
                
                $output2.='</tr>';
            }
        }
        else{
            $output2 .= '<tr class="unread">
        
        <td>

            <h6 class="mb-1">No Requests </h6>
            
        </td>
    
        </tr></tbody>';
        }
        

               
    


    $data = array(
        'output' => $output,
        'output1' => $output1,
        'output2' => $output2,

    );
    echo json_encode($data);
}
?>
    
