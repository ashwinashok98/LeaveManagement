<?php
session_start();
if (isset($_SESSION['uname'])) {
    $uid = $_SESSION['uid'];
    include("connect.php");

?>
<?php

if($_SESSION['desig']=='hod'){

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

    <body style="overflow-x:hidden;height:100%;">

        <!-- [ Header ] start -->
        <header class="navbar  pcoded-header navbar-expand-lg navbar-light header-lightblue mgd-10" style="margin-left:0px;width: calc(100% - 0px)">

            <div class="collapse navbar-collapse">
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

        <!-- [ Main Content ] start -->
        <div class="main-container mgt-10 mgl-10 mgr-10">
            <div class="wrapper mgl-10">
                <div class="content">
                    <div class="inner-content">
                        <!-- [ breadcrumb ] start -->

                        <!-- [ breadcrumb ] end -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- [ Main Content ] start -->
                                <div class="row mgl-10">


                                    <div class="col-xl-8 col-md-6">
                                        <div class="card Recent-Users">
                                            <div class="card-header">
                                                <h5>Recent Leave Requests</h5>
                                            </div>
                                            <div class="card-block px-0 py-3">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="res1">
                                                        <!--[Ajax call for Recent Users ] -->

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--[ Recent Users ] end-->

                                    <!-- [ statistics year chart ] start -->
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card card-event">
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center">
                                                    <div class="col">
                                                        <h5 class="m-0">Upcoming Holiday</h5>
                                                    </div>

                                                </div>
                                                <h2 class="mt-3 f-w-300">10th OCT<sub class="text-muted f-14">Diwali</sub>
                                                </h2>
                                                <h6 class="text-muted mt-4 mb-0">9.00 p.m - Diwali Party </h6>
                                                <i class="fab fa-angellist text-c-purple f-50"></i>
                                            </div>
                                       
                                    </div>
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-lg" style="width:90%">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title">Details</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body detailRes" id="detailRes">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Modal end-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <footer class="bg-info text-white mt-4" >
    <div class="container-fluid py-3"style="overflow-x:hidden;background-color:#23B7E5">
        <div class="row" >
            <div class="col-md-3">
                <h5 style="color:white">JGI LEAVE MANAGER</h5></div>
            <div class="col-md-3">Contact Developer</div>
            <div class="col-md-3">Social</div>
            <div class="col-md-3"><a href="https://www.jainuniversity.ac.in/" style="color:white">https://www.jainuniversity.ac.in/</a></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"><i class="fa fa-phone" aria-hidden="true"></i>+91 8660030006</div>
            <div class="col-md-3"><span class="iconify" data-icon="fe-facebook" data-inline="false"></span>
            
            
        
            <span class="iconify" data-icon="simple-icons:instagram" data-inline="false"></span>
            <span class="iconify" data-icon="fa:linkedin-square" data-inline="false"></span></div>
        </div>
        <div class="row">
            <div class="col-md-3"><small>Developed by Ashwin.K.A Nikhil.L Bhargavi.S Karishma.K</small></div>
            <div class="col-md-3"><i class="fa fa-envelope" aria-hidden="true"></i> ashwinashok98@gmail.com</div>
            <div class="col-md-3"></div>
            <div class="col-md-3 text-right small align-self-end">©2019 JGI.</div>
        </div>
        
    </div>
</footer>
    </body>
    </html>



        <!-- Required Js -->
        <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
            <script src="assets/js/vendor-all.min.js"></script>
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/pcoded.min.js"></script>
            <script>
                 function detail_show(clicked_id)
            {
                call_incharge(clicked_id);
            }
            function call_incharge(clicked_id)
            {

                    var t = clicked_id;


                     $.ajax({
                         url: "showincharge.php",
                         method: "POST",
                         data: {
                             id: t
                         },
                         dataType: "json",
                         success: function(data) {
                             var out = data.output;


                             $('#detailRes').html(data.output);


                         }
                     });
            }
                $(document).ready(function() {


                    function load_unseen_notification(view = '') {
                        $.ajax({
                            url: "fetch.php",
                            method: "POST",
                            data: {
                                view: view
                            },
                            dataType: "json",
                            success: function(data) {
                                $('.drop-noti').html(data.notification);
                                load_unseen_requests();
                                if (data.unseen_notification > -1) {
                                    $('.count').html(data.unseen_notification);
                                }
                            }
                        });
                    }

                    function load_unseen_requests(view = '') {
                        $.ajax({
                            url: "req_dis.php",
                            method: "POST",
                            data: {
                                view: view
                            },
                            dataType: "json",
                            success: function(data) {
                                $('#res1').html(data.output);


                            }
                        });
                    }
                    function check_requests() {
                    $.ajax({
                        url: "check_req_hod.php",
                        method: "POST",
                        data: {},
                        dataType: "json",
                        success: function(data) {
                            if (data.changes > 0) {
                                load_unseen_requests();
                            }


                        }
                    });
                }


                load_unseen_notification();
                load_unseen_requests();
                check_requests();


                    $(document).on('click', '.dropdown-toggle-noti', function() {
                        $('.count').html('');
                        load_unseen_notification('yes');
                    });

                    setInterval(function() {
                        load_unseen_notification();

                    }, 2000);

                });
                $(document).on('click', '.leave-button', function() {
                    var t = $(this).attr('id');
                    var user_id = $(this).closest("form").attr('id');
                    var rej = "rej" + user_id;
                    var acp = "acp" + user_id;;

                    if (t == acp) {
                        $(this).attr("disabled", true);
                        $(this).text("Accepted");
                        $("#" + rej).hide();
                        var app_id = acp;

                    }
                    if (t == rej) {
                        $(this).attr("disabled", true);
                        $(this).text("Rejected");
                        $("#" + acp).hide();
                        var app_id = rej;

                    }

                    $.ajax({
                            type: 'POST',
                            url: 'approveHod.php',
                            data: {
                                id: app_id
                            } // getting filed value in serialize form
                        })
                        .done(function(data) { // if getting done then call.

                            // show the response



                        })
                        .fail(function() { // if fail then getting message



                        });

                    // to prevent refreshing the whole page page
                    return false;

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
