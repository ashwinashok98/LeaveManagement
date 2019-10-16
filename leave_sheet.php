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
           
            $rejid='rej'.$row["application_id"];
            $acpid="acp".$row["application_id"];
            $output .= '
            <li>
            <a href="#">
            <strong>'.$row["subjectOfLeave"].'</strong><br>
            <small><em>'.$row["reason"].'</em></small>
            <form id='.$row["application_id"].'>';
            if($row['leaveStatus']==1)
            {
                $output.='<button id='.$acpid.' value='.$acpid.' name="accpt" disabled >Accepted</button></a>
                </li></form>';
            }
            if($row['leaveStatus']==-1)
            {
                $output.='<button id='.$rejid.' value='.$rejid.' name="reject" disabled >Rejected</button></a>
                </li></form>';
            }
            if($row['leaveStatus']==0)
            {
                $output.='<button id='.$acpid.' value='.$acpid.' name="accpt">Accept</button>
                <button id='.$rejid.' value='.$rejid.' name="reject">Reject</button>
                </form><br></a>
                </li>';
            }
            
           
            
            
            
        }
        echo($output);
        
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
    echo '<script>window.location.href = "./login.html";</script>';
}

?>
<script>
$(document).ready(function() {
        $(":button").click(function(e) {
        e.preventDefault();
        var t = $(this).attr('id');
        var user_id = $(this).closest("form").attr('id');
        var rej="rej"+user_id;
        var acp="acp"+user_id;
        
        if ( t == acp){
            $(this).attr("disabled", true);
            $(this).text("Accepted");
            $("#"+rej).hide();
            var app_id=acp;
            
        }
        if ( t == rej){
            $(this).attr("disabled", true);
            $(this).text("Rejected");
            $("#"+acp).hide();
            var app_id=rej;
            
        }    
        
        $.ajax({
            type: 'POST',
            url: 'approve.php',
            data:{ id: app_id} // getting filed value in serialize form
        })
        .done(function(data){ // if getting done then call.

            // show the response
           
            $('#result').html(data);

        })
        .fail(function() { // if fail then getting message

            // just in case posting failed
            alert( "Posting failed." );

        }); 

        // to prevent refreshing the whole page page
        return false;

        });
    });

</script>
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
