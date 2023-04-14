<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Rappidx</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><strong>elite</strong>hospital</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <!-- <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li> -->
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">


                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="plugins/images/users/d1.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Dr. Steave</b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i>  Account Setting</a></li>
                            <li><a href="login.html"><i class="fa fa-power-off"></i>  Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar" style="background:#ffd647">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li> <a href="index.html" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Admin</span></a> </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Orders <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="doctor-schedule.html">All Orders</a> </li>
                            <li> <a href="book-appointment.html">Today Orders</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="doctors.html">Client Register</a> </li>
                            <li> <a href="add-doctor.html">All Clients</a> </li>
                            <li> <a href="edit-doctor.html">Website Request</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Employee <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="patients.html">Employee Register</a> </li>
                            <li> <a href="add-patient.html">All Employee</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Reports <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="payment-report.html">Closures</a></li>
                            <li> <a href="income-report.html">MIS</a></li>
                            <li> <a href="sales-report.html">Return POD's</a></li>
                            <li> <a href="sales-report.html">Daily Summary</a></li>
                        </ul>
                    </li>
                    <li> <a href="widgets.html" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu">Pincode Services</span></a> </li>
                    <li> <a href="widgets.html" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">NDR Management</span></a> </li>
                    <li> <a href="widgets.html" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Order Tracking</span></a> </li>





                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->




























    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
