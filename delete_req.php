<?php
session_start();
if(isset($_SESSION['uname']))
{
        include("connect.php");
        $id=$_POST['id'];
        
       
             $query = " DELETE FROM leaveapplication WHERE application_id=".$id." ";
             mysqli_query($connect, $query);

       
       
        
      

}