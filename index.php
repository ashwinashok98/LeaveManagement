<?php
session_start();
if (isset($_SESSION['uname'])) {
    $uid = $_SESSION['uid'];
    include "connect.php";
?>
<?php

if($_SESSION['desig']=='faculty'){

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


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
                                            <div class="card-block px-0 py-3" style="overflow:auto;max-height:1000px;">
                                                <div class="bs-example">
                                                    <ul id="myTab" class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a href="#s_req" class="nav-link active" data-toggle="tab">Student Requests</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#t_req" class="nav-link" data-toggle="tab">Your Requests</a>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="s_req">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover" id="res1">
                                                                    <!--[Ajax call for Recent Users ] -->
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="t_req">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover" id="res2">
                                                                    <!--[Ajax call for Recent Users ] -->
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>

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
                                                        <h3 class="f-w-300">1</h3>
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
                                                        <h3 class="f-w-300">11</h3>
                                                        <span class="d-block text-uppercase">LEAVES LEFT</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="card Recent-Users">
                                            <div class="card-header">
                                                <h5>LEAVE FORM</h5>
                                            </div>
                                            <form method="post" id="leave_form" action="insertTeach.php">
                                                <div class="card-block px-0 py-3">
                                                    <div class="table-responsive">
                                                        <div class="card-body">

                                                            <div class="row">
                                                                <div class="col-lg-6">

                                                                    <div class="form-group">
                                                                        <label>Subject</label>
                                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="fromDate">From-Date</label>
                                                                        <input type="date" class="form-control" name="fromDate" id="fromDate" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="toDate">To-Date</label>
                                                                        <input type="date" class="form-control" name="toDate" id="toDate" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="type">Leave Type</label>
                                                                        <select class="form-control mb-3" id="type" name="type">
                                                                            <option disabled selected value="">Leave Type</option>
                                                                            <option value="Casual Leave">Casual Leave</option>
                                                                            <option value="Duty Leave">Duty Leave</option>
                                                                            <option value="Compensation Leave">Compensation Leave</option>
                                                                            <option value="SCL">SCL</option>
                                                                            <option value="UW">UW</option>

                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="incharge_check">In-Charge Arrangement</label>
                                                                        <select class="form-control" name="incharge_check" id="incharge_check" required>
                                                                            <option disabled selected>Select</option>
                                                                            <option value="P_incharge">Person Incharge</option>
                                                                            <option value="D_incharge">Detailed Incharge</option>
                                                                        </select>
                                                                        <br>
                                                                        <div class="form-group" id="hid_p_incharge" style="display:none">
                                                                            <label for="Incharge">Faculty
                                                                                substitute</label>
                                                                            <select class="form-control" name="incharge" id="incharge" required>
                                                                                <option disabled selected value="NULL">Select Teacher</option>
                                                                                <?php

                                                                                    $teachers_sql = "SELECT name FROM user WHERE designation='faculty'";
                                                                                    $teachers_result = mysqli_query($connect, $teachers_sql);
                                                                                    $trail = $teachers_result;
                                                                                    if (mysqli_num_rows($teachers_result) > 0) {
                                                                                        while ($teacher = mysqli_fetch_array($teachers_result)) {
                                                                                            ?>
                                                                                        <option value="<?php echo $teacher['name']; ?>"><?php echo $teacher['name']; ?></option>
                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                            </select>


                                                                        </div>


                                                                    </div>



                                                                </div>
                                                                <div class="col-lg-6">



                                                                    <div class="form-group">
                                                                        <label for="reason">Reason for absence</label>
                                                                        <textarea class="form-control" name="reason" id="reason" rows="9" required></textarea>
                                                                    </div>


                                                                </div>
                                                                <div class="col-lg-8">
                                                                    <div class="form-group" id="hid_d_incharge" style="display:none">
                                                                        <div id="table-res"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <input type="submit" class="btn btn-primary" value="Submit" name="post" id="post">

                                                                </div>
                                                            </div>



                                                        </div>

                                                        </table>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>


                                    <!-- [ Main Content ] end -->
                                    <!-- Modal info -->
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

            function sendDate() {

                if ($("#fromDate").val() == "") {
                    alert("Fill From Date");
                    return;
                }
                var fromdate = $('#fromDate').val();
                var todate = $('#toDate').val();

                $.ajax({
                    url: "teachersForm.php",
                    method: "POST",
                    data: {
                        from: fromdate,
                        to: todate
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#table-res').html(data.output);



                    }
                });

            }
            $('#fromDate').on('change', function() {
                if ($("#toDate").val() != "" && $("#toDate").val() != "") {

                    sendDate();
                }

            });
            $('#toDate').on('change', function() {
                if ($("#toDate").val() != "" && $("#toDate").val() != "") {

                    sendDate();
                }
            });
            $('#incharge_check').on('change', function() {
                // alert( this.value ); // or $(this).val()
                var fromdate = $('#fromDate').val();
                //var dat=strtotime(fromdate);
                // alert( dat );

                if (this.value == "P_incharge") {
                    $('#hid_p_incharge').show();
                    $('#hid_d_incharge').hide();
                } else {
                    $('#hid_p_incharge').hide();
                    $('#hid_d_incharge').show();
                    sendDate();
                }
            });

            $(document).ready(function() {
                /* var str2DOMElement = function(html) {
                     var frame = document.createElement('iframe');
                     frame.style.display = 'none';
                     document.body.appendChild(frame);
                     frame.contentDocument.open();
                     frame.contentDocument.write(html);
                     frame.contentDocument.close();
                     var el = frame.contentDocument.body.firstChild;
                     document.body.removeChild(frame);
                     return el;
                 }




                 $('.sweet-basic').on('click', function() {
                     var view = '';
                     $.ajax({
                         url: "fetch.php",
                         method: "POST",
                         data: {
                             view: view
                         },
                         dataType: "json",
                         success: function(data) {
                             var out = data.notification;

                             // var markup = '<div class="card-block table-border-style"><div class="table-responsive"><table class="table table-hover"><thead>     <tr>           <th>#</th>  <th>First Name</th>    <th>Last Name</th>      <th>Username</th></tr> </thead> <tbody>  <tr>  <th scope="row">1</th>          <td>Mark</td>       <td>Otto</td>       <td>@mdo</td>      </tr> </tbody>  </table>  </div>  </div>';
                             // var el = str2DOMElement(markup);

                             swal(str2DOMElement(out));


                         }
                     });
                 });*/
                 $('.info-dis').on('click', function() {
                    var t = $(this).attr('id');

                    alert(t);
                     $.ajax({
                         url: "showincharge.php",
                         method: "POST",
                         data: {
                             id: t
                         },
                         dataType: "json",
                         success: function(data) {
                             var out = data.output;


                             $('#detailRes').html("hello");


                         }
                     });
                 });

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
                            check_requests();
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
                            $('#res2').html(data.output1);


                        }
                    });
                }

                function check_requests() {
                    $.ajax({
                        url: "check_req.php",
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
                    check_requests();

                }, 2000);


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
                            url: 'approve.php',
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
