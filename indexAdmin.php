<?php
session_start();
if (isset($_SESSION['uname'])) {
    $uid = $_SESSION['uid'];
    include("connect.php");

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
        <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
        <meta name="author" content="CodedThemes" />

        <!-- Favicon icon -->
        <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
        <!-- fontawesome icon -->
        <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
        <!-- animation css -->
        <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
        <!-- vendor css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- user css-->
        <link rel="stylesheet" href="assets/css/user-style.css">

    </head>

    <body>

        <!-- [ Header ] start -->
        <header class="navbar header navbar-expand-lg navbar-light">

            <div class="navbar header navbar-expand-lg navbar-light navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="pdr-10"><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                    <li class="nav-item dropdown">
                        <a class="mb-1" href="logout.php">Logout</a>

                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="pdr-10">
                        <div class="dropdown">
                            <span class="label label-pill label-danger count" style="border-radius:20px;"> </span>
                            <a class="dropdown-toggle dropdown-toggle-noti" href="javascript:" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                            <div class="dropdown-menu dropdown-menu-right notification drop-noti">


                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown drp-user">
                            <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon feather icon-settings"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo ($_SESSION['uname']) ?></span>
                                    <a href="logout.php" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                               
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- [ Header ] end -->


        <div class="main-container">
            <div class="wrapper">
                <div class="pcoded-content">
                    <div class="inner-content">
                        <!-- [ breadcrumb ] start -->

                        <!-- [ breadcrumb ] end -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- [ Main Content ] start -->
                                <div class="row">


                                    <div class="col-xl-6 col-md-6">
                                        <div class="card Update-Student">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Upload Student File</h5>
                                                <form method="post" id="export_student_excel">
                                                    <label class="btn btn-lg btn-primary btn-block text-uppercase">
                                                        Select Excel
                                                        <input type="file" name="student_excel_file" id="student_excel_file" style="display: none;">
                                                    </label>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="card Update-Teacher">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Upload Teacher File</h5>
                                                <form method="post" id="export_teacher_excel">
                                                    <label class="btn btn-lg btn-primary btn-block text-uppercase">
                                                        Select Excel
                                                        <input type="file" name="teacher_excel_file" id="teacher_excel_file" style="display: none;">
                                                    </label>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <br><br>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card Update-Student">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Update Students</h5>
                                                <form class="form-inline" method="post" id="studID">
                                                    <div class="form-group mb-2">

                                                        <label for="Id" class="sr-only">User ID</label>
                                                        <input type="text" class="form-control" id="stud_id" name="stud_id" placeholder="User ID" required>
                                                    </div>
                                                    <pre> </pre>
                                                    <input type="submit" class="btn btn-primary mb-2" value="Show details">
                                                </form>

                                            </div>
                                            <div class="card-block table-border-style">
                                                <form class="form-inline" id="details" method="post" action="updateDetails.php">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover" id="stud-res">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="card Update-Teacher">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Update Teacher</h5>
                                                <form class="form-inline" method="post" id="teachID">
                                                    <div class="form-group mb-2">

                                                        <label for="Id" class="sr-only">User ID</label>
                                                        <input type="text" class="form-control" id="teach_id" name="teach_id" placeholder="User ID" required>
                                                    </div>
                                                    <pre> </pre>
                                                    <input type="submit" class="btn btn-primary mb-2" value="Show details">
                                                </form>


                                            </div>
                                            <div class="card-block table-border-style">
                                                <form class="form-inline" id="details" method="post" action="updateDetails.php">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover" id="teach-res">
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </form>
                                                <!--<div class="form-group mb-2" id="update_res">
                        
                                            </div>-->
                                            </div>



                                        </div>



                                        <!--[ Recent Users ] end-->


                                        <div class="row d-flex align-items-center">
                                            <div class="col-auto">
                                                <div class="card-block">
                                                    <div id="result"></div>
                                                </div>
                                            </div>

                                        </div>


                                        <!-- [ Main Content ] end -->
                                        <!-- <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5> LEAVE FORM</h5>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form method="post" id="leave_form" action="./insertStud.php">
                                                            <div class="form-group">
                                                                <label>Mentor</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Mentor">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Faculty
                                                                    substitute</label>
                                                                <select class="form-control" name="name" id="name"
                                                                    required>
                                                                    <option disabled selected>Select Teacher</option>
                                                                    <option>Shilpa Das</option>
                                                                    <option>Shilpa KS</option>
                                                                    <option>anusha</option>
                                                                    <option>Vivek V</option>
                                                                    <option>Bleh whatevs</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="fromDate">From-Date</label>
                                                                <input type="date" class="form-control" name="fromDate"
                                                                    id="fromDate" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="toDate">To-Date</label>
                                                                <input type="date" class="form-control" name="toDate"
                                                                    id="toDate" required>
                                                            </div>



                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label>Subject</label>
                                                            <input type="text" class="form-control" name="subject"
                                                                id="subject" placeholder="Subject" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="reason">Reason for absence</label>
                                                            <textarea class="form-control" name="reason" id="reason"
                                                                rows="5" required></textarea>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary" value="Submit"
                                                            name="post" id="post">
                                                        </form>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                                    -->
                                        <!-- Required Js -->
                                        <script src="assets/js/vendor-all.min.js"></script>
                                        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
                                        <script src="assets/js/pcoded.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('#student_excel_file').change(function() {
                                                    $('#export_student_excel').submit();
                                                });
                                                $('#teacher_excel_file').change(function() {
                                                    $('#export_teacher_excel').submit();
                                                });


                                                $('#export_teacher_excel').on('submit', function(event) {

                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "uploadExcel.php",
                                                        method: "POST",
                                                        data: new FormData(this),
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(data) {
                                                            $('#result').html(data);
                                                            $('#teacher_excel_file').val('');
                                                        }
                                                    });
                                                });
                                                $('#export_student_excel').on('submit', function(event) {

                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "uploadExcel.php",
                                                        method: "POST",
                                                        data: new FormData(this),
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(data) {
                                                            $('#result').html(data);
                                                            $('#student_excel_file').val('');
                                                        }
                                                    });
                                                });
                                                $('#teachID').on('submit', function(event) {
                                                    var tid = $("#teach_id").val();
                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "showDetails.php",
                                                        method: "POST",
                                                        data: {
                                                            Id: tid,
                                                            desig: "faculty"
                                                        },
                                                        dataType: "json",
                                                        success: function(data) {
                                                            $('#teach-res').html(data.output);
                                                            alert("success")


                                                        }
                                                    });
                                                });
                                                $('#studID').on('submit', function(event) {

                                                    var sid = $("#stud_id").val();
                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "showDetails.php",
                                                        method: "POST",
                                                        data: {
                                                            Id: sid,
                                                            desig: "student"
                                                        },
                                                        dataType: "json",
                                                        success: function(data) {
                                                            $('#stud-res').html(data.output);

                                                        }
                                                    });

                                                });
                                                //  $('#details').on('submit', function(event){ 
                                                //     var uid=$("#uid").val();
                                                //     var name=$("#name").val();
                                                //     var dep=$("#dep").val();
                                                //     var email=$("#email").val();
                                                //     var desig=$("#desig").val();
                                                //     event.preventDefault();  
                                                //       $.ajax({  
                                                //            url:"showDetails.php",  
                                                //            method:"POST",  
                                                //            data:{Id:'123',desig:"faculty"},
                                                //            dataType: "json", 
                                                //            success:function(data){  
                                                //             $('#stud-res').html(data.output);

                                                //            }
                                                //       }); 

                                                //    });
                                            });
                                        </script>

    </body>

    </html>
<?php

} else {
    echo '<script>window.location.href = "./login.html";</script>';
}
?>