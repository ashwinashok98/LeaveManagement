<?php
session_start();
if(isset($_SESSION['uname']) )
{
    $uid=$_SESSION['uid'];
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
    <meta name="description"
        content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>


    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Leave Manager</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i
                            class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="mb-1" href="logout.php">Logout</a>

                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                    <span class="label label-pill label-danger count" style="border-radius:20px;"> </span>
                        <a class="dropdown-toggle dropdown-toggle-noti" href="javascript:" data-toggle="dropdown"><i
                                class="icon feather icon-bell"></i></a>
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
                                <span><?php echo($_SESSION['uname']) ?></span>
                                <a href="logout.php" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i>
                                        Settings</a></li>
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a></li>
                                <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My
                                        Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i>
                                        Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">


                                <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Recent Leave Requests</h5>
                                        </div>
                                        <div class="card-block px-0 py-3" style="overflow:auto;max-height:1000px;">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <?php

                                                            $query = "SELECT * FROM leaveapplication where user_id = '".$_SESSION['uid']."' ORDER BY application_id DESC";
                                                            $result = mysqli_query($connect, $query);
                                                            $output = '';
                                                            if(mysqli_num_rows($result) > 0)
                                                            {
                                                            while($row = mysqli_fetch_array($result))
                                                            {
                                                                 $output.='<tr class="unread">
                                                                <td><img class="rounded-circle" style="width:40px;"
                                                                        src="assets/images/user/avatar-1.jpg"
                                                                        alt="activity-user"></td>
                                                                <td>

                                                                    <h6 class="mb-1">'.$row["subjectOfLeave"].'</h6>
                                                                    <p class="m-0" style="max-width:500px;margin: auto;">'.$row["reason"].'</p>
                                                                </td>
                                                                <td>
                                                                    <h6 class="text-muted"><i
                                                                                class="fas fa-circle text-c-green f-10 m-r-15"></i>'.$row["fromDate"].'</h6><h6 class="text-muted"><i
                                                                            class="fas fa-circle text-c-red f-10 m-r-15"></i>'.$row["toDate"].'</h6>
                                                                </td>
                                                                <td>';
                                                                        if($row['leaveStatus']==1)
                                                                        {
                                                                            $output.='<button class="label theme-bg text-white f-15" disabled >Accepted</button></a>
                                                                            </li></form>';
                                                                        }
                                                                        if($row['leaveStatus']==-1)
                                                                        {
                                                                            $output.='<button class="label theme-bg2 text-white f-15" disabled >Rejected</button></a>
                                                                            </li></form>';
                                                                        }
                                                                        if($row['leaveStatus']==0)
                                                                        {
                                                                            $output.='<button class="label theme-bg text-white f-15" disabled >Pending..</button>
                                                                            
                                                                            </form><br></a>
                                                                            </li>';
                                                                        }
                                                                $output.='</td>
                                                            </tr>';
                                                        }
                                                        echo($output);
                                                        }
                                                        else{
                                                            $output.='<tr class="unread">
                                                            
                                                            <td>

                                                                <h6 class="mb-1">No Requests Made</h6>
                                                                
                                                            </td>
                                                        
                                                            </tr>';
                                                            echo($output);
                                                        }
                                                        ?>
                                                        
                                                    </tbody>
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
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-zap f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">23</h3>
                                                    <span class="d-block text-uppercase">LEAVES TAKEN</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-zap f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">30</h3>
                                                    <span class="d-block text-uppercase">LEAVES LEFT</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- [ Main Content ] end -->
                                <div class="row">
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

            <!-- Required Js -->
            <script src="assets/js/vendor-all.min.js"></script>
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/js/pcoded.min.js"></script>
            <script>
                $(document).ready(function () {

                    function load_unseen_notification(view = '') {
                        $.ajax({
                            url: "fetchStud.php",
                            method: "POST",
                            data: { view: view },
                            dataType: "json",
                            success: function (data) {
                                $('.drop-noti').html(data.notification);

                                if (data.unseen_notification > -1) {
                                    $('.count').html(data.unseen_notification);
                                }
                            }
                        });
                    }

                    load_unseen_notification();



                    $(document).on('click', '.dropdown-toggle-noti', function () {
                        $('.count').html('');
                        load_unseen_notification('yes');
                    });

                    setInterval(function () {
                        load_unseen_notification();;
                    }, 2000);

                });
            </script>

</body>

</html>
<?php

}
else
{
    echo '<script>window.location.href = "./login.html";</script>';
}

?>