<?php

include("connect.php");

session_start();

$uid=$_POST['uid'];
$password=$_POST['pass'];

$query = "SELECT *  FROM login WHERE user_id = '".$uid."'";

$result = mysqli_query($connect, $query);


$data = array();

if(mysqli_num_rows($result) > 0)
{
  $row = mysqli_fetch_assoc($result);
 
  if ($password==$row['password']) {

    //password valid
    $uquery = "SELECT * FROM user where user_id = '".$uid."'" ;
    $uresult = mysqli_query($connect, $uquery);
    $urow = mysqli_fetch_assoc($uresult);

    $_SESSION['uname'] =$urow['name'];
    $_SESSION['uid']=$urow['user_id'];
    
    echo '<script>window.location.href = "http://localhost/ash/index.php";</script>';

    }

  else 
  {
    echo '<script language="javascript">';
  echo 'alert("Wrong Password")';
  echo '</script>';
      echo '<script>window.location.href = "http://localhost/ash/login.php";</script>';

  }
}
else 
{
  echo '<script language="javascript">';
  echo 'alert("User Not Found")';
  echo '</script>';
  echo '<script>window.location.href = "http://localhost/ash/login.php";</script>';
}
