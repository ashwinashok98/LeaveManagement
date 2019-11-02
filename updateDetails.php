<?php

// include("./connect.php");
// $id=$_POST['uid'];
// $desig=$_POST['desig'];
// $name=$_POST['name'];
// $email=$_POST['email'];
// $dep=$_POST['dep'];
$output.='';

// $stmt1 = $con->prepare("UPDATE user SET name=? email=? department=? where user_id=? ");
// $stmt1->bind_param('ssss',$name ,$email,$dep,$id);
// $stmt1->execute();

// $query = "UPDATE user SET name=".$name." email=".$email." department=".$dep." where user_id=".$id." ";
// $result = mysqli_query($connect, $query);

$output.='Details Updated';

$data = array(
    'output' => $output,
    
);
echo json_encode($data);
?>