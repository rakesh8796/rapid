<?php
  include "Layout_Header-retailer.php";
?>

<?php
  include "Layout_Header-retailer.php";
?>
<!--  Header -->
<?php
  include "retailer-header.php";
?>
<!--  Header -->

<body>
  <div id="app">

    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

<!--  Topbar -->
<?php
  include "retailer-header-topbar.php";
?>
<!--  Topbar -->

<div class="main-sidebar sidebar-style-2">

<!--  Sidebar -->
<?php
  include "retailer-sidebar.php";
?>
<!--  Sidebar -->

</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form action="#" >
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
      <a href="retailer/book-single-order.php"> <button type="button" class="btn btn-primary">Save </button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
   
  </div>
  </form>
</div>      











<style>
.font-13{
    font-size: 12px !important;
}
</style



      <!-- Main Content -->
      <div class="main-content">
                <section class="section">
                    <div class="row ">
                        <div class="col-md-8">
                            <div class="col-12">

                                <div class="card">
                                    <?php
                                    $cateis = $_GET['cateis'];
                                    // echo "$cateis";



                                    // $singleproquery ="SELECT * FROM spark_single_order
                                    //             WHERE (`orderno` LIKE '%".$cateis."%') OR (`Awb_Number` LIKE '%".$cateis."%')";
                                    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number` LIKE '$cateis%' ";

                                    $singleproqueryr = mysqli_query($conn, $singleproquery);

                                        while ($row  = mysqli_fetch_assoc( $singleproqueryr)) {



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
                                                <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div>
                                <div class="card ">
                                    <div class="card-header">
                                        <h4>Order Tracking/Real Time</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="row">
                                                    <div class="list-inline col-md-12 ">

                                                        <textarea class="form-control" name="airwaybillnumber" id="airwaybillnumber" placeholder="Search Order Details Write AWB Number"  ><?php echo "$cateis"; ?></textarea>

                                                        
                                                    </div>
                                                    <div class="my-3 col-md-6  ">
                                                       
                                                        <input type="submit" class="btn btn-primary form-control" name="TrackOrder" onclick="TrackMyOrder()" value="Track Order Now">

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
            </div>
<!-- Main Content -->





    </div>
  </div>

  <script type="text/javascript">
        function TrackMyOrder() {

            $("#TrackingData").html("<center><img src='OrderTrack/loading.gif' style='width:100px'></center>");

            var airwaybillnumber = $("#airwaybillnumber").val();



            $.ajax({

                type: "GET",

                url: "OrderTrack/MyOrderTracking.php",

                data: {
                    airwaybillnumber: airwaybillnumber
                },

                success: function(data) {

                    // alert(data);

                    // $("#Changeabletext").html("<center><span style='color:#243c4f'><b>We Contact Very Soon</b></span></center>");

                    $("#TrackingData").html(data);

                },

                error: function(data) {

                    console.log('Error:', data);

                }

            });

            return true;

        }
    </script>
  

<!--  Footer -->
<?php
  include "retailer-footer.php";
?>
<!--  Footer -->