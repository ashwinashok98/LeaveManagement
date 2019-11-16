<?php
session_start();
if (isset($_SESSION['uname'])) {
    $uid = $_SESSION['uid'];
    include("connect.php");
?>

<?php
if($_SESSION['desig']=='admin' ){

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
        <header class="navbar  pcoded-header navbar-expand-lg navbar-light header-lightblue mgb-10" style="margin-left:0px;width: calc(100% - 0px)">

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="pdr-10"><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                    <li class="nav-item dropdown">
                        <a class="mb-1" href="logout.php">Logout</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">

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
                                <ul class="pro-body">
                                <li><a href="./confirmEmail.php" class="dropdown-item"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
                                
                            </ul>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <!-- [ Header ] end -->


        <div class="main-container mgt-10">
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
                                                        <td> <i class="fa fa-spinner fa-pulse fa-2x fa-fw load_stud" aria-hidden="true" style="color:#E2D02A;display:none;"></i></td>
                                                    </label>
                                                </form>
                                               
                                                    <div id="result_student_excel"></div>


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
                                                        <td> <i class="fa fa-spinner fa-pulse fa-2x fa-fw load_teach" aria-hidden="true" style="color:#E2D02A;display:none;"></i></td>
                                                    </label>
                                                </form>
                                                <div id="result_teacher_excel"></div>
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


                                        <

                                        <!-- [ Main Content ] end -->

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
                                                    $('.load_teach').show();
                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "uploadExcel.php",
                                                        method: "POST",
                                                        data: new FormData(this),
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(data) {
                                                            $('#result_teacher_excel').html(data);
                                                            $('#teacher_excel_file').val('');
                                                            $('.load_teach').hide();
                                                        }
                                                    });
                                                });
                                                $('#export_student_excel').on('submit', function(event) {
                                                    $('.load_stud').show();
                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "uploadExcel.php",
                                                        method: "POST",
                                                        data: new FormData(this),
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(data) {
                                                            $('#result_student_excel').html(data);
                                                            $('#student_excel_file').val('');
                                                            $('.load_stud').hide();
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
        echo '<script>window.location.href = "404.html";</script>';
    }
?>

<?php

} else {
    echo '<script>window.location.href = "./login.html";</script>';
}
?>
