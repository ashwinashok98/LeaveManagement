<?php

include("./connect.php");
$id=$_POST['uid'];
$desig=$_POST['desig'];
$name=$_POST['name'];
$email=$_POST['email'];
$mob=$_POST['mobile'];
$dep=$_POST['dep'];
$output='';

$stmt1 = $connect->prepare("UPDATE user SET name=?, email=?, department=?,mobile=? where user_id=? ");
$stmt1->bind_param('sssis',$name ,$email,$dep,$mob,$id);
$stmt1->execute();

// $query = "UPDATE user SET name=".$name." email=".$email." department=".$dep." where user_id=".$id." ";
// $result = mysqli_query($connect, $query);
echo '<script>alert("Update done!");window.location.href = "./indexAdmin.php";</script>';
$output.='Details Updated';

$data = array(
    'output' => $output,
    'uid'=>$id,
    'name'=>$name,
    
);
echo json_encode($data);
?>