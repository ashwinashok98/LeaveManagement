<?php

include('connect.php');
?>
<html>
<body>
  <select>
  <option value="NULL">select a faculty</option>
  <?php

  $teachers_sql = "SELECT name FROM user WHERE designation='faculty'";
  $teachers_result = mysqli_query($connect, $teachers_sql);
  $trail = $teachers_result;
  if (mysqli_num_rows($teachers_result) > 0) {
    while ($teacher = mysqli_fetch_array($teachers_result)) {
      ?>
      <option value=<?php echo $teacher['name']; ?>><?php echo $teacher['name']; ?></option>
  <?php
    }
  }
  ?>
</select>


</body>

</html>