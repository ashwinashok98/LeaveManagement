<?php
session_start();
if(isset($_SESSION['uname']) )
{

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
   <form method="post" id="leave_form" action="./insert.php">
    <div class="form-group">
     <label>Enter Subject</label>
     <input type="text" name="subject" id="subject" class="form-control" required>
    </div>
    <div class="form-group">
     <label>Enter Reason</label>
     <textarea name="reason" id="reason" class="form-control" rows="5" required></textarea>
    </div>
    <div class="form-group">
     <label>Enter Leave Type</label>
     <input type ="text" name="type" id="type" class="form-control" required>
    </div>
    <div class="form-group">
     <label>Enter From Date</label>
     <input type="date" name="fromDate" id="fromDate" class="form-control" required>
     <label>Enter To Date</label>
     <input type="date" name="toDate" id="toDate" class="form-control" required>
    </div>
    
    <div class="form-group">
     <label>Enter Incharge</label>
     <input type="text" name="incharge" id="incharge" class="form-control" value="NULL"required>
    </div>
    

    <div class="form-group">
     <label>Enter faculty name</label>
     <input type ="text" name="name" id="name" class="form-control"required>
    </div>
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="Post" required>
    </div>
   </form><br><br>

   <form method="post" id="logout" action="logout.php">
      <div class="form-group">
       <input type="submit" name="logout" id="logout" class="btn btn-info" value="Logout" />
      </div>
   </form>

   
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

<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
