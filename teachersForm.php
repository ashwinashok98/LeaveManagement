<html>

<head>
</head>

<body>
    <form action="teachersForm.php" method="post">
        fromDate: <input type="date" name="fromDate">
        <br>
        toDate: <input type="date" name="toDate">
        <br>
        <input type="submit" name="submit" value="Apply leave">
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

    $from = $_POST['fromDate'];
    $todate =  strtotime($_POST['toDate']);
    $fromdate =  strtotime($_POST['fromDate']);
    $days = (abs($todate - $fromdate)/60/60/24);
    echo "<script>window.open('table.php?days=$days','_self')</script>";

}

?>