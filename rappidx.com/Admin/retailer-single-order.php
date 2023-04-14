<?php
include "Layout_Header-retailer.php";
?>

<!-- Header -->
<?php
include "retailer-header.php";
?>
<!-- Header -->


<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <!-- Tobpar -->
      <?php
      include "retailer-header-topbar.php";
      ?>
      <!-- Tobpar -->

      <div class="main-sidebar sidebar-style-2">

        <!-- Sidebar -->
        <?php
        include "retailer-sidebar.php";
        ?>
        <!-- Sidebar -->

      </div>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form action="#">
          <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Enter location Pincode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div>
                  <div class="form-group">
                    <label>Pickup Pincode</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i data-feather="map-pin"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control phone-number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Delivery Pincode</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i data-feather="map-pin"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control phone-number">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <a href="book-single-order.php"> <button type="button" class="btn btn-primary">Save </button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </form>
      </div>


















      <script type="text/javascript">
        function AllOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientAllOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }

        function PendingOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientPendingOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }

        function ProgressOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientProgressOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }

        function RTOOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientRTOOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }


        function DeliveredOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientDeliverdOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }

        function CancelOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientCancelOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }

        function SearchOrders() {
          // alert('work');
          $("#All_Records").html("<center><h5>Loading......</h5></center>");
          $.ajax({
            type: "GET",
            url: 'OrderaAll/ClientSearchOrders.php',
            data: {
              val: "Delivered"
            },
            success: function(data) {
              $("#All_Records").html(data);
            },
            error: function(data) {
              console.log('Error:', data);
            }
          });
        }
      </script>


















      <!-- Main Content -->

      <div class="main-content" style="min-height:100px !important">

        <section class="section">
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>All Orders</h4>
                  <div class="card-header-action">



                  </div>
                </div>
                <div class="card-body">
                  <div class="container">




                    <div class="row" id="All_Records" style="background-color:#EAEEF2 !important;">
                      <!--  -->
                      <!--  -->

                      <!-- *  *   *   *   *   Download Functions  *   *   *   *   *    -->
                      <div class="container-fluid my-3">
                        <div class="row white-box fontweighlight">
                          <div class="col-md-4">
                            <select class="form-control" onchange="ManageOrders(this.value)" style="border-radius:20px">
                              <option value="0">- - - Download Your Orders - - -</option>
                               <!--<option value="Last24HourOrders">Today Orders</option> -->
                              <option value="Last7DaysOrders">Last 7 Days Orders</option>
                              <option value="CurrentMonthOrders">Current Month Orders</option>
                              <option value="LastMonthOrders">Last Month Orders</option>
                              <option value="CustomOrdersIs">Custom Date Range</option>
                            </select>
                          </div>

                          <script type="text/javascript">
                            function ManageOrders(val) {
                              // alert(val)
                              if (val == "Last24HourOrders") {
                                document.getElementById("AWBNumber").style.display = "none";
                                document.getElementById("OrderNumber").style.display = "none";
                                document.getElementById("All_RecordsClients").style.display = "none";
                                document.getElementById("CurrentMonth").style.display = "none";
                                document.getElementById("LastMonth").style.display = "none";
                                document.getElementById("CustomOrders").style.display = "none";
                                document.getElementById("Last7Days").style.display = "none";
                                document.getElementById("TodayOrders").style.display = "block";
                                document.getElementById("DefaultShow").style.display = "none";
                              } else if (val == "Last7DaysOrders") {
                                document.getElementById("AWBNumber").style.display = "none";
                                document.getElementById("OrderNumber").style.display = "none";
                                document.getElementById("All_RecordsClients").style.display = "none";
                                document.getElementById("TodayOrders").style.display = "none";
                                document.getElementById("LastMonth").style.display = "none";
                                document.getElementById("CustomOrders").style.display = "none";
                                document.getElementById("CurrentMonth").style.display = "none";
                                document.getElementById("Last7Days").style.display = "block";
                                document.getElementById("DefaultShow").style.display = "none";
                              } else if (val == "CurrentMonthOrders") {
                                document.getElementById("AWBNumber").style.display = "none";
                                document.getElementById("OrderNumber").style.display = "none";
                                document.getElementById("All_RecordsClients").style.display = "none";
                                document.getElementById("TodayOrders").style.display = "none";
                                document.getElementById("LastMonth").style.display = "none";
                                document.getElementById("CustomOrders").style.display = "none";
                                document.getElementById("Last7Days").style.display = "none";
                                document.getElementById("CurrentMonth").style.display = "block";
                                document.getElementById("DefaultShow").style.display = "none";
                              } else if (val == "LastMonthOrders") {
                                document.getElementById("AWBNumber").style.display = "none";
                                document.getElementById("OrderNumber").style.display = "none";
                                document.getElementById("All_RecordsClients").style.display = "none";
                                document.getElementById("TodayOrders").style.display = "none";
                                document.getElementById("CurrentMonth").style.display = "none";
                                document.getElementById("CustomOrders").style.display = "none";
                                document.getElementById("Last7Days").style.display = "none";
                                document.getElementById("LastMonth").style.display = "block";
                                document.getElementById("DefaultShow").style.display = "none";
                              } else if (val == "CustomOrdersIs") {
                                document.getElementById("AWBNumber").style.display = "none";
                                document.getElementById("OrderNumber").style.display = "none";
                                document.getElementById("All_RecordsClients").style.display = "none";
                                document.getElementById("TodayOrders").style.display = "none";
                                document.getElementById("CurrentMonth").style.display = "none";
                                document.getElementById("LastMonth").style.display = "none";
                                document.getElementById("Last7Days").style.display = "none";
                                document.getElementById("CustomOrders").style.display = "block";
                                document.getElementById("DefaultShow").style.display = "none";
                              } else {
                                document.getElementById("AWBNumber").style.display = "none";
                                document.getElementById("OrderNumber").style.display = "none";
                                document.getElementById("All_RecordsClients").style.display = "none";
                                document.getElementById("TodayOrders").style.display = "none";
                                document.getElementById("CurrentMonth").style.display = "none";
                                document.getElementById("LastMonth").style.display = "none";
                                document.getElementById("CustomOrders").style.display = "none";
                                document.getElementById("Last7Days").style.display = "none";
                                document.getElementById("DefaultShow").style.display = "none";
                              }
                            }
                          </script>

                          <!-- Show According Selection -->
                          <div class="col-md-4 text-center" style="border-left:1px solid #5A5A5A;border-right:1px solid #5A5A5A">


                            <div class="row" id="DefaultShow" style="display:block;">
                              <a href="#" class="btn" style="font-size:15px"><u>Download Orders</u></a>
                            </div>


                            <!-- 24/Today Orders Start -->
                            <div class="row" id="TodayOrders" style="display:none;">
                              <a href="OrderaAllExcel/Client_All_Excel.php?OrderManageBy=Today" class="btn" style="font-size:15px"><u>Download Today Orders</u></a>
                            </div>
                            <!-- 24/Today Orders  End-->
                            <!-- 7 Days Orders Start -->
                            <div class="row" id="Last7Days" style="display:none;">
                              <a href="OrderaAllExcel/Client_Last_7_Day_Excel.php?OrderManageBy=Last7Days" class="btn" style="font-size:15px"><u>Download 7 Days Orders</u></a>
                            </div>
                            <!-- 7 Days Orders  End-->
                            <!-- This Month Orders Start -->
                            <div class="row" id="CurrentMonth" style="display:none;">
                              <a href="OrderaAllExcel/Client_Current_Month_Excel.php?OrderManageBy=Current" class="btn" style="font-size:15px"><u>Download Current Month Order</u></a>
                            </div>
                            <!-- This Month Orders End -->
                            <!-- Last Month Orders Start -->
                            <div class="row" id="LastMonth" style="display:none;">
                              <a href="OrderaAllExcel/Client_Last_Month_Excel.php?OrderManageBy=Last" class="btn" style="font-size:15px"><u>Download Last Month Order</u></a>
                            </div>
                            <!-- Last Month Orders End -->
                            <!-- Custom Orders Start -->
                            <div class="row" id="CustomOrders" style="display:none;">
                              <form action="OrderaAllExcel/Client_All_Month_Excel.php" action="POST">
                                <div class="col-md-12"><span><strong>From</strong></span></div>
                                <div class="col-md-12">
                                  <input type="date" name="startdatefrom" class="form-control" style="border-radius:20px">
                                </div>
                                &ensp;<br>
                                <div class="col-md-12"><span><strong>To</span></h5>
                                </div>
                                <div class="col-md-12">
                                  <input type="date" name="enddatefrom" class="form-control" style="border-radius:20px">
                                </div>
                                &ensp;
                                <div class="col-md-12 text-center">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="hidden" name="OrderManageBy" value="Custom">
                                      <input type="submit" name="downloadfile" value="Download Filter Excel Orders" class="btn btn-default" style="border-radius:20px;background:#5A5A5A;color:#fff;">
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <br>&ensp;<br>
                            </div>
                            <!-- Custom Orders End -->
                            <!-- Order Number Start -->
                            <div class="row" id="OrderNumber" style="display:none;">
                              <center>
                                <input type="text" id="OSearchBox" onkeyup="checkpincode(this.value,'orderno')" class="form-control" placeholder="Search Order Number" style="border-radius:20px;width:80%" autocomplete="off">
                              </center>
                            </div>
                            <!-- Order Number  End-->
                            <!-- AWN Number Start -->
                            <div class="row" id="AWBNumber" style="display:none;">
                              <center>
                                <input type="text" id="ASearchBox" onkeyup="checkpincode(this.value,'awbno')" class="form-control" placeholder="Search AWB Number" style="border-radius:20px;width:80%" autocomplete="off">
                              </center>
                            </div>
                            <!-- AWB Number End -->

                          </div>
                          <div class="col-md-4">


                          </div>

                          <!-- Show According Selection -->


                        </div>
                      </div>
                      <!-- *  *   *   *   *   //Download Functions  *   *   *   *   *    -->

                      <!-- *  *   *   *   *   Search Functions  *   *   *   *   *    -->


                      <script type="text/javascript">
                        function SearchOrders(val) {
                          // alert(val)
                          if (val == "OrderNumber") {

                            document.getElementById("TodayOrders").style.display = "none";
                            document.getElementById("CurrentMonth").style.display = "none";
                            document.getElementById("LastMonth").style.display = "none";
                            document.getElementById("CustomOrders").style.display = "none";
                            document.getElementById("Last7Days").style.display = "none";
                            document.getElementById("All_RecordsClients").style.display = "none";
                            document.getElementById("AWBNumber").style.display = "none";
                            document.getElementById("OrderNumber").style.display = "block";
                          } else if (val == "AWBNumber") {
                            document.getElementById("TodayOrders").style.display = "none";
                            document.getElementById("CurrentMonth").style.display = "none";
                            document.getElementById("LastMonth").style.display = "none";
                            document.getElementById("CustomOrders").style.display = "none";
                            document.getElementById("Last7Days").style.display = "none";
                            document.getElementById("All_RecordsClients").style.display = "none";
                            document.getElementById("OrderNumber").style.display = "none";
                            document.getElementById("AWBNumber").style.display = "block";
                          } else {
                            document.getElementById("TodayOrders").style.display = "none";
                            document.getElementById("CurrentMonth").style.display = "none";
                            document.getElementById("LastMonth").style.display = "none";
                            document.getElementById("CustomOrders").style.display = "none";
                            document.getElementById("Last7Days").style.display = "none";
                            document.getElementById("AWBNumber").style.display = "none";
                            document.getElementById("OrderNumber").style.display = "none";
                            document.getElementById("All_RecordsClients").style.display = "none";
                          }
                        }
                      </script>

                      <script type="text/javascript">
                        function checkpincode(param, cateis) {
                          document.getElementById("All_RecordsClients").style.display = "block";
                          var newtext = param.substr(0, 5);
                          var maxlength = 9;
                          if (newtext == "I0308") {
                            maxlength = 9;
                          } else if (newtext == "D7822") {
                            maxlength = 9;
                          } else if (newtext == "RPDX0") {
                            maxlength = 9;
                          } else if (newtext == "14315") {
                            maxlength = 14;
                          } else if (newtext == "84451") {
                            maxlength = 13;
                          } else {
                            maxlength = 9;
                          }
                          // alert(maxlength);
                          var resultis = param.length;
                          if (resultis < maxlength) {
                            // alert(param);
                            $("#All_RecordsClients").html("<center><h5>Not Found AWB/Order Number</h5></center>");
                          } else {
                            $("#All_RecordsClients").html("<center><h4>Loading...</h4></center>");
                            $.ajax({
                              type: "GET",
                              url: 'OrderaAll/Search_Order.php',
                              data: {
                                param: param,
                                cateis: cateis
                              },
                              success: function(data) {
                                // console.log(data);
                                $("#All_RecordsClients").html(data);
                                // $("#OSearchBox").val('');
                                // $("#ASearchBox").val('');

                              },
                              error: function(data) {
                                console.log('Error:', data);
                              }
                            });
                          }
                        }
                      </script>

                      <!--  -->
                      <div class="col-md-12">

                        <!-- <div class="col-md-12 white-box"> -->
                        <div class="col-md-12">
                          <div id="All_RecordsClients"> </div>
                        </div>

                      </div>
                      <!--  -->

                      <!-- *  *   *   *   *   Search Functions  *   *   *   *   *    -->

                      <!--  -->
                      <!--  -->
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
          <?php
          if ($_GET['excelfile'] == 'Cancel Order') {
            echo "<div class='alert alert-success'>Order cancel successfully</div>";
          } elseif ($_GET['excelfile'] == 'Not Cancel Order') {
            echo "<div class='alert alert-danger'>Order Not Canceled | Please Try Again</div>";
          }


          ?>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Shipments</h4>
                </div>
                <div class="card-body">
                  <div>
                    <ul class="list-inline text-right" style="padding:0px;margin:0px">
                      <li class="list-inline-item p-r-10 text-center ">
                        <a href="singleorderuploadnot_excel.php" class="">
                          <i data-feather="arrow-down-circle" class="col-orange text-center"></i>
                        </a>
                        <h5 class="m-b-0 text-center">Download</h5>
                        <p class="text-muted font-14 m-b-0"> Download fail Order</p>
                      </li>

                      <li class="list-inline-item p-r-10 text-center">
                        <a href="singleorderupload_excel.php">
                          <i data-feather="arrow-down-circle" class="col-orange"></i>
                        </a>
                        <h5 class="m-b-0">Download</h5>
                        <p class="text-muted font-14 m-b-0">Download successfull order</p>
                      </li>

                    </ul>
                  </div>

                  <div class="table-responsive">

                    <table class="table table-striped table-hover" id="" style="width:100%;">
                    <!--<table class="table table-striped table-hover" id="save-stage" style="width:100%;">-->
                      <thead>
                        <tr>
                            <th></th>
                            <th>Order ID</th>
                            <th>AWB</th>
                            <th>Upload Time</th>
                            <th>Courier</th>
                            <th>Order Status</th>
                            <th>Remark</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--  -->
                        <?php
                        $tdate = date("Y-m-d");
                        $totalnoosorders = 0;
                        //
                        $useridisa = array();
                        $queryall = "SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
                        $fdataall = mysqli_query($conn, $queryall);
                        $numrowall = mysqli_num_rows($fdataall);
                        if ($numrowall > 1) {
                          while ($resultall = mysqli_fetch_assoc($fdataall)) {
                            $useridisa[] = $resultall['User_Id'];
                          }
                          $user_ids = implode(",", $useridisa);
                        } else {
                          $user_ids = $user_id;
                        }


                        // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `Awb_Number`!='' AND `awb_gen_by`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
                        $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";


                        //
                        // $singleproquery = "SELECT * FROM `spark_single_order` ORDER BY `Single_Order_Id` DESC";
                        $singleproqueryr = mysqli_query($conn, $singleproquery);
                        while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                          $awbsnumare = $row['Awb_Number'];
                          $ordernoare = $row['orderno'];


                          if ($row['order_cancel']) {
                        ?>
                            <tr class="record danger">
                            <?php
                          } else {
                            ?>
                            <tr class="record ">
                            <?php
                          }
                            ?>
                            <!-- <td>
                                <input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">
                                <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">
                            </td> -->
                            <td class="text-center">
                              <a href="retailer-single-order-cancel.php?cancelrpdxnois=<?= $ordernoare ?>" onclick="return confirm('Are you sure Delete this orders?')">
                                <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
                              </a>
                            </td>
                            <td>
                              <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">
                              <input type="hidden" name="shippingallorders[]" value="<?= $row['orderno'] ?>">
                              <label>
                                <!--<input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">-->
                                <?php echo $row['orderno']; ?>
                              </label>
                            </td>
                            <td><a href="retailer-print-shipping-label.php?ordernos=<?= $awbsnumare ?>"><?php echo $row['Awb_Number']; ?></a></td>
                            <td><?php echo $row['Rec_Time_Date']; ?></td>
                            <td><?php echo $row['awb_gen_by']; ?></td>
                            <td><?php echo $row['order_status1']; ?></td>
                            <td><?php echo $row['order_status_show']; ?></td>
                            <td><?php echo $row['Order_Type']; ?></td>
                            <td><?php echo $row['Total_Amount']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Item_Name']; ?></td>
                            </tr>
                          <?php
                          $totalnoosorders++;
                        }
                          ?>
                          <!--  -->
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>


    <select id="size">
      <option value="">-- select one -- </option>
    </select>
    <script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#type").change(function() {
          var val = $(this).val();
          if (val == "Last seven days orders") {
            $("#size").html("<a value='Last seven days orders' >Download Last seven days orders</a>");
          } else if (val == "Current Month Order") {
            $("#size").html("<a value='Current Month Order'>Download Current Month Order</a>");
          } else if (val == "Last Month Order") {
            $("#size").html("<a value='Download Last Month Order'>Last Month Order</a>");
          } else if (val == "Custom Date Range") {
            $("#size").html("<a value='Download Custom Date Range'>Custom Date Range</a>");
          } else if (val == "---Download Your Order---") {
            $("#size").html("");
          }

        });
      });
    </script>

  </div>
  </div>

  <!--  Footer  -->
  <?php
  include "retailer-footer-bulk.php";
  ?>
  <!--  Footer  -->