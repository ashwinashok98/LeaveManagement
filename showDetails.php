<?php

$id = $_POST["Id"];
$desig = $_POST["desig"];
include "./connect.php";

$output = '';

$query = "SELECT * FROM User where user_id = '".$id."' and designation  = '".$desig."' ";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $output .= '
                <tr>
                  <td><b>UserID</b></td>
                  <td>' . $row['user_id'] . '<input type="text" class="form-control" id="uid" name="uid" value="' . $row['user_id'] . '" hidden></td>
                  <td> <input type="text" class="form-control" id="desig" name="desig" value="' . $desig . '" hidden ></td>

                </tr>
                <tr>
                  <td><b>Name</b></td>
                  <td> <input type="text" class="form-control" id="name" name="name" value="' . $row['name'] . '" required></td>

                </tr>
                <tr>
                  <td><b>Email</b></td>
                  <td><input type="text" class="form-control" id="email" name="email" value="' . $row['email'] . '" required></td>

                </tr>
                <tr>
                  <td><b>Mobile</b></td>
                  <td><input type="text" class="form-control" id="mobile" name="mobile" value="' . $row['mobile'] . '" required></td>

                </tr>
                <tr>
                  <td><b>Department</b></td>
                  <td><input type="text" class="form-control" id="dep" name="dep" value="' . $row['department'] . '"required ></td>

                </tr>
                <tr>
                <td>

                <input type="submit" class="btn btn-primary mb-2" value="Update details">
                </td>
                </tr>

                    ';
} else {
  if ($desig == "faculty") {
    $output .= 'Enter vaild teacher ID';
  }

  if ($desig == "student") {
    $output .= 'Enter vaild student ID';
  }
}

$data = array(
  'output' => $output,

);
echo json_encode($data);
