<?php

session_start();



extract($_REQUEST);

include "config/dbcon.php";





// echo $param;

?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rappidx- User Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/reppidxlogoicon.png' /> -->
</head>


<body>
    <!-- <div class="loader"></div> -->
    <div id="app">

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg">

            </div>

            <nav class="navbar navbar-expand-lg main-navbar sticky">

                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto" action="summary_s.php" method="Get">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search AWB numbers" aria-label="Search" data-width="200" name="cateis">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>

                                    </button>
                                </div>

                            </form>

                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <div class="buttons ">

                        <a href="#" class="btn btn-icon icon-left btn-primary " style="background-color:#4d4dff;border-radius: 5%;"><i class="fa fa-bolt" style="font-size: 17px;"></i> Balance ₹ 0</a>
                        <a href="#" class="btn btn-icon icon-left btn-primary " style="background-color: #ffff00 ;color:black;border-radius: 5%;"><i class="fa fa-whatsapp" style="font-size: 17px;"></i>&nbsp;Rappidx</a>

                        <button type="button" class="btn " style="background-color:#00cc00;
                      border-radius: 5%;" data-toggle="modal" data-target="#basicModal"><i class="fa fa-exclamation" style="font-size: 17px;"></i>&nbsp;Recharge
                        </button>

                    </div>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                                    </span> <span class="dropdown-item-desc"> Template update is
                                        available now! <span class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                                    </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                            Sugiharto</b> are now friends <span class="time">10 Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
												fa-check"></i>
                                    </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                        moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                            Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
                                    </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                        clean it! <span class="time">17 Hours Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Welcome to Otika
                                        template! <span class="time">Yesterday</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <!--    <div class="dropdown-title">Hello Sarah Smith</div>-->
                            <!--    <a href="profile.html" class="dropdown-item has-icon"> <i class="far-->
                            <!--fa-user"></i> Profile-->
                            <!--    </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>-->
                            <!--      Activities-->
                            <!--    </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>-->
                            <!--      Settings-->
                            <!--    </a>-->
                            <div class="dropdown-divider"></div>
                            <a href="Logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <div class="text-right" style="margin-top: 5%;margin-left:20%;margin-bottom:-7%">
                <i class="fa fa-envelope"></i> <strong>Email:</strong>
                customersupport@rappidx.com&nbsp; &nbsp; &nbsp; &nbsp;
                <i class="fa fa-phone"></i> <strong>Connect us at:</strong> +91 9289013918
            </div>
            <?php include_once("sidebar.php");   ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="col-12">

                                <div class="card">
                                    <?php
                                    $cateis = $_GET['cateis'];
                                    // echo "$cateis";



                                    $singleproquery = "SELECT * FROM spark_single_order
                                                WHERE (`orderno` LIKE '%" . $cateis . "%' ) OR (`Awb_Number` LIKE '%" . $cateis . "%'  ) ";
                                    // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number` LIKE '$cateis%' ORDER BY `Single_Order_Id` DESC LIMIT 1";

                                    $singleproqueryr = mysqli_query($conn, $singleproquery);

                                    while ($row  = mysqli_fetch_assoc($singleproqueryr)) {



                                    ?>

                                        <div class="card-header">
                                            <h4>Orders Shipment Summary</h4>

                                            <div class="card-header-form">

                                            </div>


                                        </div>
                                        <hr>
                                        <div class="card-header-form">
                                            <div class=" text-right " style="margin-right:2% ;">
                                                <a href="#" class="btn btn-outline-primary">&nbsp;Cancel &nbsp;</i></a>
                                                <a href="#" class="btn btn-outline-primary">&nbsp;Print &nbsp;</i></a>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="">
                                                    <div class="card-header">
                                                        <h4>Order</h4>
                                                    </div>
                                                    <table class="table table-sm">

                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Order Number :</th>
                                                                <td><?php echo $row['orderno']; ?></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>AWB Number :</th>
                                                                <td><?php echo $row['Awb_Number']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Date :</th>
                                                                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>Order Type :</th>
                                                                <td><?php echo $row['Order_Type']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>Order Status :</th>
                                                                <td><?php echo $row['order_status1']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>Courier :</th>
                                                                <td><?php echo $row['awb_gen_by']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-5 my-5">
                                                <div class="">

                                                    <table class="table table-sm">
                                                        <div class="card-header">
                                                            <h4></h4>
                                                        </div>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Declarest Weight :</th>
                                                                <td><?php echo $row['Actual_Weight']; ?></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Physical Weight :</th>
                                                                <td><?php echo $row['Actual_Weight']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Dimension :</th>
                                                                <td><?php echo $row['Length']; ?> x <?php echo $row['Width']; ?> x <?php echo $row['Height']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th> Volumetric Weight :</th>
                                                                <td>45KG</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card-header">
                                                <h4>Shipping Information</h4>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="">
                                                    <div class="card-header">
                                                        <h4>Delivery Address</h4>

                                                    </div>
                                                    <table class="table table-sm">

                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Name :</th>
                                                                <td><?php echo $row['pickup_name']; ?></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>Address :</th>
                                                                <td><?php echo $row['pickup_address']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>Mobile :</th>
                                                                <td><?php echo $row['pickup_mobile']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row"></th>
                                                                <th>City :</th>
                                                                <td><?php echo $row['pickup_city']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>State :</th>
                                                                <td><?php echo $row['pickup_state']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>Country :</th>
                                                                <td>INDIA</td>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th>Pincode :</th>
                                                                <td><?php echo $row['pickup_pincode']; ?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <!-- <div class="col-md-3">
                                            <div class="">
                                                <div class="card-header">
                                                    <h4>Pickup Address</h4>
                                                </div>
                                                <table class="table table-sm">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"></th>
                                                            <th>Warehouse Name :</th>
                                                            <td>hello</td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row"></th>
                                                            <th>Address :</th>
                                                            <td>Bangalore</td>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th>Mobile :</th>
                                                            <td>7845963215</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"></th>
                                                            <th>City :</th>
                                                            <td>Bangalore</td>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th>State :</th>
                                                            <td>Bangalore</td>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th>Country :</th>
                                                            <td>INDIA</td>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th>Pincode :</th>
                                                            <td>110011</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                         </div> -->
                                        </div>
                                        <div class="row">
                                            <div class="card-body">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr style="color: blueviolet;">
                                                            <th scope="col"></th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Value</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <th scope="row"></th>
                                                            <td><?php echo $row['Item_Name']; ?></td>
                                                            <td><?php echo $row['Quantity']; ?></td>
                                                            <td><?php echo $row['Total_Amount']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                </div>



                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <div class="card ">
                                    <div class="card-header">
                                        <h4>Order Tracking/Real Time</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="col-md-12 table-responsive">

                                                    <?php

                                                    // if(isset($TrackOrder)){



                                                    // echo $airwaybillnumber;

                                                    // echo $TrackOrder;

                                                    $airwaybillnumber = trim($cateis);



                                                    $query = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$airwaybillnumber'";

                                                    $queryr = mysqli_query($conn, $query);

                                                    $res = mysqli_fetch_assoc($queryr);

                                                    if (mysqli_num_rows($queryr)) {
                                                        $couriername = $res['awb_gen_by'];
                                                    }



                                                    if ($couriername == "XpressBees") {

                                                        // Xpressbee Tracking Order

                                                        $curl = curl_init();

                                                        curl_setopt_array($curl, array(

                                                            CURLOPT_URL => 'http://xbclientapi.xbees.in/TrackingService.svc/GetBulkShipmentStatus',

                                                            CURLOPT_RETURNTRANSFER => true,

                                                            CURLOPT_ENCODING => '',

                                                            CURLOPT_MAXREDIRS => 10,

                                                            CURLOPT_TIMEOUT => 0,

                                                            CURLOPT_FOLLOWLOCATION => true,

                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                                                            CURLOPT_CUSTOMREQUEST => 'POST',

                                                            CURLOPT_POSTFIELDS => '{

    "XBkey": "dSsID3156mssewRrPSkspKSq",

    "AWBNo": "' . $airwaybillnumber . '"

  }',

                                                            CURLOPT_HTTPHEADER => array(

                                                                'Content-Type: application/json',

                                                                'Cookie: ASP.NET_SessionId=kmsvx415s43bx0nrtxnny2ai'

                                                            ),

                                                        ));

                                                        $response = curl_exec($curl);

                                                        $response1 = json_decode($response, true);

                                                        curl_close($curl);

                                                        // echo "<pre>";

                                                        // print_r($response1);

                                                        // exit();

                                                        // echo $response;

                                                        $rtmsg = $response1['GetBulkShipmentStatus'][0]["ReturnMessage"];

                                                        $crtlocation = $response1['GetBulkShipmentStatus'][0]["CurrentLocation"];

                                                        $status = $response1['GetBulkShipmentStatus'][0]["Status"];

                                                        $ordertype = $response1['GetBulkShipmentStatus'][0]["OrderType"];

                                                        $finaldestination = $response1['GetBulkShipmentStatus'][0]["FinalDestinationName"];

                                                        $StatusDate = $response1['GetBulkShipmentStatus'][0]["StatusDate"];

                                                        // echo $response1['GetBulkShipmentStatus'][0]["StatusCode"];

                                                        // echo $response1['GetBulkShipmentStatus'][0]["LastAttemptStatus"];

                                                        // echo $response1['GetBulkShipmentStatus'][0]["NetPayment"];

                                                        // echo $response1['GetBulkShipmentStatus'][0]["OrderNo"];

                                                        // echo $response1['GetBulkShipmentStatus'][0]["DeliveryDate"];

                                                        // echo $response1['GetBulkShipmentStatus'][0]["DeliveryTime"];

                                                        // Xpressbee Tracking Order

                                                    } elseif ($couriername == "Shadowfax") {

                                                        // ShadowFax Tracking Order

                                                        $curl = curl_init();



                                                        curl_setopt_array($curl, array(

                                                            CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v2/clients/bulk_track/?format=json',

                                                            CURLOPT_RETURNTRANSFER => true,

                                                            CURLOPT_ENCODING => '',

                                                            CURLOPT_MAXREDIRS => 10,

                                                            CURLOPT_TIMEOUT => 0,

                                                            CURLOPT_FOLLOWLOCATION => true,

                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                                                            CURLOPT_CUSTOMREQUEST => 'POST',

                                                            CURLOPT_POSTFIELDS => '{

 "awb_numbers": ["' . $airwaybillnumber . '"]

 }',

                                                            CURLOPT_HTTPHEADER => array(

                                                                'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9',

                                                                'Content-Type: application/json'

                                                            ),

                                                        ));



                                                        $response = curl_exec($curl);

                                                        $response1 = json_decode($response, true);

                                                        curl_close($curl);

                                                        // echo $response;

                                                        // echo "<pre>";

                                                        // print_r($response1);

                                                        // exit();

                                                        // echo "<br><br>";

                                                        $paymenttype = $response1["data"][0]["payment_mode"];

                                                        $statusdisplay = $response1["data"][0]["status_display"];

                                                        $stausshow = $response1["data"][0]["status"];

                                                        $destinationcity = $response1["data"][0]["delivery_details"]["city"];

                                                        $destinationstate = $response1["data"][0]["delivery_details"]["state"];

                                                        // print_r($response1["data"][0]["tracking_details"]);

                                                        // print_r($response1);



                                                        $ttrackno = count($response1["data"][0]["tracking_details"]);

                                                        if ($ttrackno) {

                                                            $ttrackno = $ttrackno - 1;

                                                            // print_r($response1["data"][0]["tracking_details"][$ttrackno]);

                                                            $shadowlocationtime = $response1["data"][0]["tracking_details"][$ttrackno]['created'];

                                                            $shadowlocation = $response1["data"][0]["tracking_details"][$ttrackno]['location'];

                                                            $shadowstausid = $response1["data"][0]["tracking_details"][$ttrackno]['status_id'];

                                                            $shadowstatus = $response1["data"][0]["tracking_details"][$ttrackno]['status'];

                                                            $shadowremark = $response1["data"][0]["tracking_details"][$ttrackno]['remarks'];

                                                            $shadowawbno = $response1["data"][0]["tracking_details"][$ttrackno]['awb_number'];
                                                        }



                                                        // ShadowFax Tracking Order

                                                    } elseif ($couriername == "DTDC") {

                                                        // DTDC Tracking Order



                                                        $curl = curl_init();

                                                        curl_setopt_array($curl, array(

                                                            CURLOPT_URL => 'https://blktracksvc.dtdc.com/dtdc-api/rest/JSONCnTrk/getTrackDetails',

                                                            CURLOPT_RETURNTRANSFER => true,

                                                            CURLOPT_ENCODING => '',

                                                            CURLOPT_MAXREDIRS => 10,

                                                            CURLOPT_TIMEOUT => 0,

                                                            CURLOPT_FOLLOWLOCATION => true,

                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                                                            CURLOPT_CUSTOMREQUEST => 'POST',

                                                            CURLOPT_POSTFIELDS => '{

  "trkType":"cnno",

  "strcnno":"' . $airwaybillnumber . '",

  "addtnlDtl":"Y"

  }',

                                                            CURLOPT_HTTPHEADER => array(

                                                                'X-Access-Token: GL2467_trk:a27546321b097cde8b9f2f2bb8da69cf',

                                                                'Content-Type: application/json',

                                                                'Cookie: JSESSIONID=8D69770585A7DC4A53FCB129CEE674E6'

                                                            ),

                                                        ));



                                                        $response = curl_exec($curl);

                                                        $response1 = json_decode($response, true);

                                                        curl_close($curl);

                                                        // echo $response;

                                                        $paymenttype = $response1["trackHeader"]["strCNProdCODFOD"];

                                                        $stausshow = $response1["trackHeader"]["strStatus"];

                                                        $response1["trackHeader"]["strExpectedDeliveryDate"];

                                                        $dtdcawbno = $response1["trackHeader"]["strShipmentNo"];

                                                        $ttrackno = count($response1["trackDetails"]);

                                                        if ($ttrackno) {

                                                            $ttrackno = $ttrackno - 1;

                                                            $dtdcstatuscode = $response1["trackDetails"][$ttrackno]['strCode'];

                                                            $dtdcstatus = $response1["trackDetails"][$ttrackno]['strAction'];

                                                            $dtdccrtlocation = $response1["trackDetails"][$ttrackno]['strOrigin'];

                                                            $dtdcnextdestination = $response1["trackDetails"][$ttrackno]['strDestination'];

                                                            $dtdcupdatedate = $response1["trackDetails"][$ttrackno]['strActionDate'];

                                                            $dtdcreceiver = $response1["trackDetails"][$ttrackno]['sTrRemarks'];
                                                        }





                                                        $dtdcawbdetaos = array();

                                                        for ($i = 0; $i < $ttrackno + 1; $i++) {

                                                            $i;

                                                            // $strCode = $response1["trackDetails"][$i]['strCode'];

                                                            $strAction = $response1["trackDetails"][$i]['strAction'];

                                                            // $strManifestNo = $response1["trackDetails"][$i]['strManifestNo'];

                                                            $strOrigin = $response1["trackDetails"][$i]['strOrigin'];

                                                            // $strOriginCode = $response1["trackDetails"][$i]['strOriginCode'];

                                                            $strDestination = $response1["trackDetails"][$i]['strDestination'];

                                                            // $strDestinationCode = $response1["trackDetails"][$i]['strDestinationCode'];

                                                            $strActionDate = $response1["trackDetails"][$i]['strActionDate'];

                                                            $strActionTime = $response1["trackDetails"][$i]['strActionTime'];

                                                            $sTrRemarks = $response1["trackDetails"][$i]['sTrRemarks'];



                                                            $dated = substr($strActionDate, 0, 2);

                                                            $datem = substr($strActionDate, 2, 2);

                                                            $datey = substr($strActionDate, 4, 4);

                                                            $timeh = substr($strActionTime, 0, 2);

                                                            $timem = substr($strActionTime, 2, 4);

                                                            $datetime = $dated . "/" . $datem . "/" . $datey . "&ensp;" . $timeh . ":" . $timem;



                                                            $dtdcawbdetaos[] = array($datetime, $strOrigin, $strDestination, $strAction, $sTrRemarks);

                                                            // $dtdcawbdetaos[] = array($strAction,$strOrigin,$strDestination,$strActionDate,$strActionTime,$sTrRemarks);

                                                        }







                                                        // echo "<pre>";

                                                        // print_r($response1);

                                                        // exit();

                                                        // echo "<br><br>";



                                                        // DTDC Tracking Order

                                                    } elseif ($couriername == "Delhivery") {

                                                        // Delhivery Tracking Order



                                                        $curl = curl_init();

                                                        curl_setopt_array($curl, array(

                                                            CURLOPT_URL => "https://track.delhivery.com/api/v1/packages/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3&waybill=" . $airwaybillnumber . "",

                                                            CURLOPT_RETURNTRANSFER => true,

                                                            CURLOPT_ENCODING => '',

                                                            CURLOPT_MAXREDIRS => 10,

                                                            CURLOPT_TIMEOUT => 0,

                                                            CURLOPT_FOLLOWLOCATION => true,

                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                                                            CURLOPT_CUSTOMREQUEST => 'GET',

                                                        ));



                                                        $response = curl_exec($curl);

                                                        $response1 = json_decode($response, true);

                                                        curl_close($curl);



                                                        // echo "<pre>";

                                                        // echo $response;

                                                        // print_r($response1);

                                                        // print_r($response1["ShipmentData"][0]["Shipment"]);

                                                        // print_r($response1["ShipmentData"][0]["Shipment"]);



                                                        $DelhiveryAWB = $response1["ShipmentData"][0]["Shipment"]["AWB"];

                                                        $PaymentType = $response1["ShipmentData"][0]["Shipment"]["OrderType"];

                                                        $DelhiveryDestination = $response1["ShipmentData"][0]["Shipment"]["Destination"];

                                                        $DelhiveryStatusCode = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusCode'];

                                                        $DelhiveryLastLocat = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusLocation'];

                                                        $DelhiveryScanDateTime = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusDateTime'];







                                                        $ttrackno = count($response1["ShipmentData"][0]["Shipment"]["Scans"]);

                                                        $delhiveryawbdetaos = array();

                                                        for ($i = 0; $i < $ttrackno; $i++) {

                                                            // $ScanDateTime = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["ScanDateTime"];

                                                            // $ScanType = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["ScanType"];

                                                            $StatusDateTime = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["StatusDateTime"];

                                                            $ScannedLocation = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["ScannedLocation"];

                                                            $Scan = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["Scan"];

                                                            $Instructions = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["Instructions"];

                                                            // $StatusCode = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["StatusCode"];

                                                            $dated = substr($StatusDateTime, 8, 2);

                                                            $datem = substr($StatusDateTime, 5, 2);

                                                            $datey = substr($StatusDateTime, 0, 4);

                                                            $timehms = substr($StatusDateTime, 11, 8);

                                                            // echo ":";

                                                            // echo $timem = substr($StatusDateTime,14,2);

                                                            // echo ":";

                                                            // echo $times = substr($StatusDateTime,16,3);

                                                            $datetime = $dated . "/" . $datem . "/" . $datey . "&ensp;" . $timehms;



                                                            // $delhiveryawbdetaos[] = array($ScanDateTime,$ScanType,$Scan,$StatusDateTime,$ScannedLocation,$Instructions,$StatusCode);

                                                            $delhiveryawbdetaos[] = array($datetime, $ScannedLocation, $Scan, $Instructions);
                                                        }





                                                        // echo "<pre>";

                                                        // print_r($response1);

                                                        // exit();



                                                        // $orginname = $response1["ShipmentData"][0]["Shipment"]["Origin"];

                                                        // $PickUpDate = $response1["ShipmentData"][0]["Shipment"]["PickUpDate"];

                                                        // $ReferenceNo = $response1["ShipmentData"][0]["Shipment"]["ReferenceNo"];





                                                        // Delhivery Tracking Order

                                                    } elseif ($couriername == "Ekart") {

                                                        // Ekart Tracking Order





                                                        $ekarttokens = "SELECT * FROM `api_tokens` WHERE `couriername`='Ekart'";

                                                        $ekarttoken = mysqli_query($conn, $ekarttokens);

                                                        $ekarttoke = mysqli_fetch_assoc($ekarttoken);

                                                        $beartokn = $ekarttoke['tokenno'];

                                                        // echo "working";





                                                        $curl = curl_init();



                                                        curl_setopt_array($curl, array(

                                                            CURLOPT_URL => 'https://api.ekartlogistics.com/v2/shipments/track',

                                                            CURLOPT_RETURNTRANSFER => true,

                                                            CURLOPT_ENCODING => '',

                                                            CURLOPT_MAXREDIRS => 10,

                                                            CURLOPT_TIMEOUT => 0,

                                                            CURLOPT_FOLLOWLOCATION => true,

                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                                                            CURLOPT_CUSTOMREQUEST => 'POST',

                                                            CURLOPT_POSTFIELDS => '{

      "tracking_ids": [

          "' . $airwaybillnumber . '"

      ]

  }',

                                                            CURLOPT_HTTPHEADER => array(

                                                                "Content-Type: application/json",

                                                                "HTTP_X_MERCHANT_CODE: RPX",

                                                                "Authorization: " . $beartokn . ""

                                                            ),

                                                        ));



                                                        $response = curl_exec($curl);

                                                        $ekrtawbstat = json_decode($response, true);

                                                        curl_close($curl);

                                                        // echo $ekrtawbstat;







                                                        // echo "<pre>";

                                                        // print_r($ekrtawbstat);



                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['status'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['event_date'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['event_date_iso8601'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['city'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['description'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['public_description'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['history'][0]['cs_notes'];

                                                        // echo $ekrtawbstat[$airwaybillnumber]['shipment_type'];



                                                        // echo "<br>";

                                                        // if($ekrtawbstat['unauthorised']){

                                                        //     echo $ekrtawbstat['unauthorised'];

                                                        // }else{

                                                        //   print_r($ekrtawbstat);

                                                        // }







                                                        $ordertype = $ekrtawbstat[$airwaybillnumber]['shipment_type'];

                                                        $StatusDateTime = $ekrtawbstat[$airwaybillnumber]['history'][0]['event_date'];



                                                        $dated = substr($StatusDateTime, 8, 2);

                                                        $datem = substr($StatusDateTime, 5, 2);

                                                        $datey = substr($StatusDateTime, 0, 4);

                                                        $timehms = substr($StatusDateTime, 11, 8);

                                                        $StatusDate = $dated . "/" . $datem . "/" . $datey . "&ensp;" . $timehms;



                                                        $status = $ekrtawbstat[$airwaybillnumber]['history'][0]['status'];

                                                        $statusremark = $ekrtawbstat[$airwaybillnumber]['history'][0]['public_description'];

                                                        $finaldestination = $ekrtawbstat[$airwaybillnumber]['history'][0]['city'];







                                                        // Ekart Tracking Order

                                                    } else {
                                                    }





                                                    // }

                                                    ?>























                                                    <style>
                                                        .white-box {

                                                            padding: 12px !important;

                                                            border-radius: 10px;

                                                            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;

                                                        }

                                                        .fontweigh {

                                                            font-weight: 900 !important;

                                                        }
                                                    </style>

                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>







                                                    <?php

                                                    if ($couriername == "XpressBees") {

                                                    ?>

                                                        <!-- Xpressbee -->

                                                        <table class="table white-box fontweigh" style="border-radius:20px">

                                                            <thead style="background-color:#243c4f;color:#60baaf">

                                                                <tr>

                                                                    <th style="border-right:1px solid #41AEAF;">Shipping ID</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Type</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Status</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Current Location</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Status_Date/Time</th>

                                                                    <th style="">Destination</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $airwaybillnumber ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;;color:#1c1d3e"><?= $ordertype ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $status ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $crtlocation ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $StatusDate ?></td>

                                                                    <td style="color:#1c1d3e"><?= $finaldestination ?></td>

                                                                </tr>

                                                            </tbody>

                                                        </table>

                                                        <!-- Xpressbee -->

                                                    <?php

                                                    } elseif ($couriername == "Shadowfax") {

                                                    ?>

                                                        <!-- ShadowFax -->

                                                        <table class="table white-box fontweigh" style="border-radius:20px">

                                                            <thead style="background-color:#243c4f;color:#60baaf">

                                                                <tr>

                                                                    <th style="border-right:1px solid #41AEAF;">Shipping ID</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Type</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Status</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Current Location</th>

                                                                    <th style="border-right:1px solid #41AEAF;">Status_Date/Time</th>

                                                                    <th>Destination</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowawbno ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= ucwords($paymenttype) ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowstatus ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowlocation ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowlocationtime ?></td>

                                                                    <td style="color:#1c1d3e"><?= $destinationcity ?>/<?= $destinationstate ?></td>

                                                                </tr>

                                                            </tbody>

                                                        </table>

                                                        <!-- ShadowFax -->

                                                    <?php

                                                    } elseif ($couriername == "DTDC") {

                                                    ?>

                                                        <!-- DTDC -->

                                                        <table class="table white-box fontweigh" style="border-radius:20px">

                                                            <thead style="background-color:#243c4f;color:#60baaf">

                                                                <tr>

                                                                    <th style="border-right:1px solid #41AEAF">Shipping ID</th>

                                                                    <th style="border-right:1px solid #41AEAF">Type</th>

                                                                    <th style="border-right:1px solid #41AEAF">Status</th>

                                                                    <th style="border-right:1px solid #41AEAF">Current Location</th>

                                                                    <th style="border-right:1px solid #41AEAF">Status_Date/Time</th>

                                                                    <th style="border-right:1px solid #41AEAF">Destination</th>

                                                                    <th style=""></th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdcawbno ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= ucwords($paymenttype) ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdcstatus ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdccrtlocation ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e">

                                                                        <?php

                                                                        echo substr($dtdcupdatedate, 0, 2);

                                                                        echo "-";

                                                                        echo substr($dtdcupdatedate, 2, 2);

                                                                        echo "-";

                                                                        echo substr($dtdcupdatedate, 4, 4);

                                                                        ?>

                                                                    </td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdcnextdestination ?></td>

                                                                    <td style="color:#1c1d3e"><span id="dtdcview" style="cursor:pointer" class="btn btn-primary active">VIEW</span></td>

                                                                </tr>

                                                            </tbody>

                                                        </table>





                                                        <script>
                                                            $(document).ready(function() {

                                                                $("#dtdcdetails").hide();

                                                                $("#dtdcview").click(function() {

                                                                    $("#dtdcdetails").toggle(1000);

                                                                });

                                                            });
                                                        </script>



                                                        <div class="col-md-12  text-center" id="dtdcdetails">

                                                            <br>

                                                            <div class="col-md-12 text-center">

                                                                <center>

                                                                    <table class="table table-striped table-bordered table-hover white-box fontweigh" style="border-radius:20px">

                                                                        <thead style="background-color:#60BAAF;color:black">

                                                                            <tr>

                                                                                <th style="border-color:#1c1d3e">Date/Time</th>

                                                                                <th style="border-color:#1c1d3e">Current_Location</th>

                                                                                <th style="border-color:#1c1d3e">Next_Location</th>

                                                                                <th style="border-color:#1c1d3e">Order_Status</th>

                                                                                <th style="border-color:#1c1d3e">Remarks</th>

                                                                            </tr>

                                                                        </thead>

                                                                        <tbody>

                                                                            <?php

                                                                            foreach ($dtdcawbdetaos as $dtdckey => $dtdckeyval) {

                                                                                echo "<tr>";

                                                                                foreach ($dtdckeyval as $dtdckey => $dtdcval) {

                                                                                    // echo "Key : ".$dtdckey."&ensp;&ensp;"."Value : ".$dtdcval." &ensp;---<br>";

                                                                                    echo "<td style='border-color:#1c1d3e;color:#1c1d3e'>" . $dtdcval . "</td>";
                                                                                }

                                                                                echo "</tr>";
                                                                            }

                                                                            ?>

                                                                        </tbody>

                                                                    </table>

                                                                </center>

                                                            </div>

                                                        </div>





                                                        <!-- DTDC -->

                                                    <?php

                                                    } elseif ($couriername == "Delhivery") {

                                                    ?>

                                                        <!-- Delhivery -->

                                                        <table class="table white-box fontweigh" style="border-radius:20px">

                                                            <thead style="background-color:#243c4f;color:#60baaf">

                                                                <tr>

                                                                    <th style="border-right:1px solid #41AEAF">Shipping ID</th>

                                                                    <th style="border-right:1px solid #41AEAF">Type</th>

                                                                    <th style="border-right:1px solid #41AEAF">Status</th>

                                                                    <th style="border-right:1px solid #41AEAF">Current Location</th>

                                                                    <th style="border-right:1px solid #41AEAF">Status_Date/Time</th>

                                                                    <th style="border-right:1px solid #41AEAF">Destination</th>

                                                                    <th style=""></th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryAWB ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= ucwords($PaymentType) ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryStatusCode ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryLastLocat ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e">

                                                                        <?php

                                                                        echo substr($DelhiveryScanDateTime, 0, 10);

                                                                        echo "&ensp;";

                                                                        echo substr($DelhiveryScanDateTime, 11, 8);

                                                                        ?>

                                                                    </td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryDestination ?></td>

                                                                    <td style="color:#1c1d3e"><span id="delhiveryview" style="cursor:pointer" class="btn btn-primary active">VIEW</span></td>

                                                                </tr>

                                                            </tbody>

                                                        </table>





                                                        <script>
                                                            $(document).ready(function() {

                                                                $("#delhiverydetails").hide();

                                                                $("#delhiveryview").click(function() {

                                                                    $("#delhiverydetails").toggle(1000);

                                                                });

                                                            });
                                                        </script>



                                                        <div class="col-md-12 text-center" id="delhiverydetails">

                                                            <div class="col-md-12 text-center">

                                                                <table class="table table-striped table-bordered table-hover white-box fontweigh" style="border-radius:20px">

                                                                    <thead style="background-color:#60BAAF;color:black">

                                                                        <tr>

                                                                            <th style="border-color:#1c1d3e">Date/Time</th>

                                                                            <th style="border-color:#1c1d3e">Current_Location</th>

                                                                            <th style="border-color:#1c1d3e">Order_Status</th>

                                                                            <th style="border-color:#1c1d3e">Remarks</th>

                                                                        </tr>

                                                                    </thead>

                                                                    <tbody>

                                                                        <?php

                                                                        foreach ($delhiveryawbdetaos as $keyvalue) {

                                                                            echo "<tr>";

                                                                            foreach ($keyvalue as $delkey => $delvalue) {

                                                                                // echo "Key : ".$delkey."&ensp;&ensp;"."Value : ".$delvalue." &ensp;---<br>";

                                                                                echo "<td style='border-color:#1c1d3e;color:#1c1d3e'>" . $delvalue . "</td>";
                                                                            }

                                                                            echo "</tr>";
                                                                        }

                                                                        ?>

                                                                    </tbody>

                                                                </table>

                                                            </div>

                                                        </div>







                                                        <!-- Delhivery -->

                                                    <?php

                                                    } elseif ($couriername == "Ekart") {

                                                    ?>

                                                        <!-- Ekart -->

                                                        <table class="table white-box fontweigh" style="border-radius:20px">

                                                            <thead style="background-color:#243c4f;color:#60baaf">

                                                                <tr>

                                                                    <th style="border-right:1px solid #41AEAF;color:#fff"><?= $foril ?>.Shipping_ID</th>

                                                                    <th style="border-right:1px solid #41AEAF;color:#fff">Type</th>

                                                                    <th style="border-right:1px solid #41AEAF;color:#fff">Status</th>

                                                                    <th style="border-right:1px solid #41AEAF;color:#fff">Remark</th>

                                                                    <th style="border-right:1px solid #41AEAF;color:#fff">Last_Status</th>

                                                                    <th style="color:#fff">Destination</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $airwaybillnumber ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;;color:#1c1d3e"><?= $ordertype ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $status ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $statusremark ?></td>

                                                                    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $StatusDate ?></td>

                                                                    <td style="color:#1c1d3e"><?= $finaldestination ?></td>

                                                                </tr>

                                                            </tbody>

                                                        </table>

                                                        <!-- Ekart -->

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <center>
                                                            <h1 style="color:#60baaf">AWB Number Not Found</h1>
                                                        </center>

                                                    <?php

                                                    }

                                                    ?>







                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- recharge model  -->



    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/page/chart-amchart.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>