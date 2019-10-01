<?php
session_start();
if(isset($_SESSION['uname']) )
{
    $uid=$_SESSION['uid'];
    include("connect.php");

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Notification using PHP Ajax Bootstrap</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br /><br />
    <div class="container-fluid">
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Leave Application::<?php echo($_SESSION['uname']); ?></a>
     </div>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
    </div>
   </nav>
   <br />
   <?php

        $query = "SELECT * FROM leaveapplication where facultyApproval = '".$_SESSION['uname']."' ORDER BY application_id DESC";
        $result = mysqli_query($connect, $query);
        $output = '';
        if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_array($result))
        {
            
            $output .= '
            <li>
            <a href="#">
            <strong>'.$row["subjectOfLeave"].'</strong><br/>
            <small><em>'.$row["reason"].'</em></small>
            
            </a>
            </li>
            ';
            
        }
        echo($output);
        echo('<button class="btn btn-primary" type="submit">accept</button>');
        }
        else{
            $output .= '
            <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
        }

   ?>
   
    </div>
 </body>
</html>
<?php

}
else
{
    echo '<script>window.location.href = "http://localhost/ash/login.php";</script>';
}

?>