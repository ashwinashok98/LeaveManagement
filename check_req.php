<?php

session_start();
if(isset($_SESSION['uname']) )
{
  $uid=$_SESSION['uid'];
  $uname=$_SESSION['uname'];
  
  include('connect.php');
  $query = "SELECT * FROM leaveapplication where facultyApproval = '".$_SESSION['uname']."' and leaveStatus=0";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        
        $req=1;
        $data = array(
            'changes' =>$req,
            
        );
        echo json_encode($data);
    }
    else{
        $req=0;
        $data = array(
            'changes' =>$req,
            
        );

    }

}
?>