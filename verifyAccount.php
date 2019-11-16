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
  //$2y$10$VPdsbHC1XYkgp0.629QWq.Cu4.gzvcn6kuRLuxctTItkSXBa56eLq
  $row = mysqli_fetch_assoc($result);
  if(password_verify($password, $row['password'])/*$password==$row['password']*/)
  {

  
  
    //password valid
    $uquery = "SELECT * FROM user where user_id = '".$uid."'" ;
    $uresult = mysqli_query($connect, $uquery);
    $urow = mysqli_fetch_assoc($uresult);

    $_SESSION['uname'] =$urow['name'];
    $_SESSION['uid']=$urow['user_id'];
    $_SESSION['desig']=$urow['designation'];
    if($urow['designation']=="faculty")
    {
      echo '<script>window.location.href = "./index.php";</script>';
    }
    if( $urow['designation']=="hod")
    {
      echo '<script>window.location.href = "./indexH.php";</script>';
    }
    if( $urow['designation']=="admin")
    {
      echo '<script>window.location.href = "./indexAdmin.php";</script>';
    }
    else
    {
      echo '<script>window.location.href = "./indexStud.php";</script>';
    }
    

  }

  else
  {
    echo '<script language="javascript">';
  echo 'alert("Wrong Password")';
  echo '</script>';
      echo '<script>window.location.href = "./login.html";</script>';

  }
}
else
{
  echo '<script language="javascript">';
  echo 'alert("User Not Found")';
  echo '</script>';
  echo '<script>window.location.href = "./login.html";</script>';
}
