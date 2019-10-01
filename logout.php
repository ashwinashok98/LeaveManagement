<?php
session_start();
session_destroy();
 echo '<script>window.location.href = "http://localhost/ash/login.php";</script>';
?>	