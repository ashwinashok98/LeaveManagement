<!DOCTYPE html>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <body>
       <?php
       include('connect.php');

            $id="acp123123";
            $state=substr($id,0,3);
            echo($state);
            $id=substr($id,3);
            echo($id);
            $query1="SELECT name from `user`,`leaveapplication` WHERE user.user_id='16bt6cs013'";
    $result1 = mysqli_query($connect, $query1);
    $s=mysqli_fetch_array($result1);
    $name=$s['name'];
    var_dump($name);
    echo($name);
            

       ?>
</body>
</html>
<script>
$(document).ready(function() {
        $(":button").click(function(e) {
        e.preventDefault();
        var t = $(this).attr('id');
        
        if ( t == 'button_1'){
            $(this).attr("disabled", true);
            $(this).text("Request Sent");
            $("#button_2").hide();
        }   
        
        $.ajax({
            type: 'POST',
            url: 'test2.php',
            data:{ id: $(this).val()} // getting filed value in serialize form
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

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



<script>
    $(document).ready(function () {
        
        $("#form").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();

            //disable the submit button
            if (this.id == '#btnAccept') {
            $("#btnAccept").attr("disabled", true);
            }
            $("#btnDeny").prop('value', 'Save'); //versions newer than 1.6


            //disable a normal button
            $("#btnTest").attr("disabled", true);

            return true;

        });
    });
</script>

</body>
</html>

-->