<!DOCTYPE html>
<html lang="en">

<head>
  <title>Datta Able - Alert</title>


  <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
  <meta name="author" content="Codedthemes" />

  <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="./assets/fonts/fontawesome/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="./assets/plugins/animation/css/animate.min.css">

  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>





  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Alerts</h5>
        <div class="card-header-right">
          <div class="btn-group card-option">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="feather icon-more-horizontal"></i>
            </button>
            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
              <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
              <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
              <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
              <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card-block">
        <div class="">
          <button type="button" class="btn btn-primary sweet-basic">Basic</button>
          <button type="button" class="btn btn-success sweet-success">Success</button>
          <button type="button" class="btn btn-warning sweet-warning">warning</button>
          <button type="button" class="btn btn-danger sweet-error">error</button>
          <button type="button" class="btn btn-info sweet-info">info</button>
          <button type="button" class="btn btn-primary sweet-multiple">Success or Cancel</button>
          <button type="button" class="btn btn-primary sweet-prompt">Prompt</button>
          <button type="button" class="btn btn-primary sweet-ajax">Ajax</button>
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
  </section>
  <div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


  <script src="./assets/js/vendor-all.min.js"></script>
  <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/pcoded.min.js"></script>
  <script src="./assets/js/menu-setting.min.js"></script>

  <script>
   $('.sweet-basic').on('click', function() {
        swal('Hello world!');
    });
  </script>
</body>

</html>
<script>
var str2DOMElement = function(html) {
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
                        var view = 11;
                        $.ajax({
                            url: "showincharge.php",
                            method: "POST",
                            data: {
                                view: view
                            },
                            dataType: "json",
                            success: function(data) {
                                var out = data.output;

                                var markup = out;
                                 var el = str2DOMElement(markup);
                                swal(el);


                            }
                        });
                    });

</script>
