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


                                <div class="col-xl-4 col-md-6">
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
                                
                                <div class="col-xl-4 col-md-6">
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
  $(document).ready(function(){  
      $('#student_excel_file').change(function(){  
           $('#export_student_excel').submit();  
      }); 
      $('#teacher_excel_file').change(function(){  
           $('#export_teacher_excel').submit();  
      });

      $('#export_teacher_excel').on('submit', function(event){ 
          
           event.preventDefault();  
           $.ajax({  
                url:"uploadExcel.php",  
                method:"POST",  
                data:new FormData(this),
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#result').html(data);  
                     $('#teacher_excel_file').val('');  
                }  
           });  
      });  
      $('#export_student_excel').on('submit', function(event){ 
          
          event.preventDefault();  
          $.ajax({  
               url:"uploadExcel.php",  
               method:"POST",  
               data:new FormData(this),
               contentType:false,  
               processData:false,  
               success:function(data){  
                    $('#result').html(data);  
                    $('#student_excel_file').val('');  
               }  
          });  
     });  
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