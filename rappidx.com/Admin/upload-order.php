<?php

include_once("layout_new_user_config.php");
include_once("layouts/header.php");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Orders</h4>
                            <div style="margin-left:25% ;">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="radio1" value="1" class="selectgroup-input-radio" checked>
                                        <span class="selectgroup-button">&nbsp;&nbsp;B2C&nbsp;&nbsp;</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="radio1" value="2" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">&nbsp;&nbsp;B2B&nbsp;&nbsp;</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="radio1" value="3" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">International</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="radio1" value="4" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">Hyperlocal</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <center>
                            <?php
                            if ($_GET['excelfile'] == 'Update') {
                                echo "<div class='success' style='color:green;'>Please wait file is processing</div><hr>";
                            } elseif ($_GET['excelfile'] == 'No Update') {
                                echo "<div class='success' style='color:red;'>File Not Upload</div><hr>";
                            } elseif ($_GET['excelfile'] == 'Cancel Order') {
                                echo "<div class='success' style='color:gray;'>Order Cancel Successfully</div><hr>";
                            } elseif ($_GET['excelfile'] == 'Not Cancel Order') {
                                echo "<div class='success' style='color:gray;'>Order Not Canceled | Please Try Again</div><hr>";
                            } elseif ($_GET['excelfile'] == 'invalid Details') {
                                echo "<div class='success' style='color:gray;'>Invalid Details | Please Try Again</div><hr>";
                            } elseif ($_GET['excelfile'] == 'Invalid Data') {
                                echo "<div class='success' style='color:gray;'>Invalid Details | Please Try Again</div><hr>";
                            } elseif ($_GET['excelfile'] == 'Invalid Data1') {
                                echo "<div class='success' style='color:gray;'>Invalid Details | Please Try Again</div><hr>";
                            }
                            ?>
                        </center>


                        <div class="card-header-form">
                            <div class=" text-right " style="margin-right:2% ;">
                                <!-- <a href="shipment.php" class="btn btn-outline-primary ">&nbsp;&nbsp; ship &nbsp;&nbsp;</i></a> -->
                                <button type="button" name="submit" class="btn btn-outline-primary " id="submit123" >ship</button>
                                <a href="singleorder.php" class="btn btn-outline-primary">Create Order</i></a>
                                <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter200">Bulk Upload</i></a>
                                <a href="#" class="btn btn-outline-primary"data-toggle="modal" data-target="" id="change_courier">change Courier </i></a>
                                <a href="javascript:void(0)" onclick="window.location.reload()" class="btn btn-outline-primary" type="reset">&nbsp;Refresh &nbsp;</i></a>
                                <a href="#" class="btn btn-outline-primary" onclick="myFunction()">&nbsp;Filtter&nbsp;</i></a>
                                <a href="#" class="btn btn-outline-primary">&nbsp;Report&nbsp;</i></a>
                                <a href="#" class="btn btn-outline-primary">&nbsp;Cancel&nbsp;</i></a>
                                <!-- <a href="#" class="btn btn-outline-primary">&nbsp;Print Label&nbsp;</i></a> -->
                                <!-- <a href="manifest.php" class="btn btn-outline-primary">&nbsp;Manifest&nbsp;</i></a> -->
                            </div>

                        </div>
                        <div class="col-md-12 my-2 " id="myDIV" style="display: none;">
                            <div class="card  ">
                                <div class="card-header">
                                    <h4>Filtter</h4>
                                    <div class="card-header-action">
                                    </div>
                                </div>
                                <div class="card-body  " style="background-color: #bfbfbf;">
                                    <form id="filter_form">
                                    <div class="row">
                                        <input type="hidden" id="active_tab" name="active_tab">
                                        <input type="hidden" id="table_id" name="table_id">

                                        <div class="col-md-3  ">
                                            <label class="form-label" style="color:#0d0d0d ;">Date Range</label>
                                            <div class="list-inline text-center">
                                                <div class="form-group ">
                                                    <select class="form-control " name="data_range" id="type">
                                                        <option value="Download your data range">---Select Data Range---</option>
                                                        <option value="Today">Today</option>
                                                        <option value="Yesterday">Yesterday</option>
                                                        <option value="Last seven Days">Last seven days </option>
                                                        <option value="Current month">Current Month </option>
                                                        <option value="Last Month">Last Month </option>
                                                       
                                                        <option value="Custom Date Range">Custom Date Range</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label" style="color:#0d0d0d ;">Customer Name</label>
                                           
                                                <div class="input-group ">
                                                    <input type="text" name="customer_name" class="form-control " placeholder="Search by customer name">

                                                </div>
                                            
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label" style="color:#0d0d0d ;">Order Id</label>
                                           
                                                <div class="input-group ">
                                                    <input type="text" name="order_id" class="form-control " placeholder="Search by Order Id">

                                                </div>
                                           
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label" style="color:#0d0d0d ;">Mobile No</label>
                                           
                                                <div class="input-group ">
                                                    <input type="text" name="mobile_no" class="form-control " placeholder="Search by Mobile no">

                                                </div>
                                           
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label" style="color:#0d0d0d ;">Product Name</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="product_name" class="form-control " placeholder="Search by Product name">

                                                </div>
                                           
                                        </div>


                                        <div class="col-md-2">
                                            <label class="form-label" style="color:#0d0d0d ;">Payment Mode*</label>
                                            <div class="form-group">
                                                <select class="form-control" name="ordertype" id="paymentmode" name="ordertype" onchange="calculateraterefresh(),yesnoCheck(this)" >
                                                    <option value="">Select</option>
                                                    <option value="Prepaid">Prepaid</option>
                                                    <option value="COD">COD</option>
                                                    <option value="COD">COD/Prepaid</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3 my-2">
                                            <label class="form-label"></label>
                                            <div class="form-group" style="margin-top:1% ;">
                                                <input type="submit" class="btn btn-outline-primary" name="submit" id="serach_btn" value="Search">

                                            </div>

                                        </div>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDIV");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                            $(document).ready(function(){
                            $(document).on("click",".nav-link",function(){
                               if($(this).hasClass('active')){
                                var act=$(this).text();
                                
                                $("#active_tab").val(act);
                               
                                var table_id=$(this).attr('href');
                                $("#table_id").val(table_id);
                              console.log(act);
                             }
                              });
                             
                            $("#filter_form").submit(function(e){
                                var formData=new FormData(this);
                                e.preventDefault();
                                $.ajax({
                                         url : 'filter_order.php',
                                        type : 'POST',
                                        data : formData,
                                      
                                        contentType : false,
                                        processData : false,
                                        success:function(response){
                                           console.log(response);
                                              var data=JSON.parse(response);
                                              console.log($(data.tableId+ "table tbody tr").not("thead tr").remove());
                                              
                                               $(".filter_table").html(data.res);
                                            
                                            
                                        }
                                });

                            });
                        });

                           
                        </script>


                        <div class="card-body " style="margin-top:2%;">
                            <ul class="nav nav-pills" id="myTab3" role="tablist" style="margin-left:2% ;">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">All Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false" >Not Shipped</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false" >Booked</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact4" aria-selected="false">Cancelled</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact5" aria-selected="false">Failed</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active my-2" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                    <div class="table-responsive">
                                        <table class="table table-striped Courier">
                                            <thead>
                                            <tr>
                                                <!--<th class="text-center">-->
                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->
                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->
                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->
                                                <!--    </div>-->
                                                <!--</th>-->
                                               
                                                <th>Order Id</th>
                                                <th>Date</th>
                                                <th>Customer </th>
                                                <th>Mobile</th>
                                                <th>Courier</th>
                                                <th>City</th>
                                                <th>Pincode</th>
                                                <th>Type</th>
                                                <th>Product</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Remark</th>
                                                <!--<th>Action</th>-->
                                            </tr>
                                            </thead>
                                            <tbody class="filter_table">
                                            <?php
                                             $singleproquery = "SELECT * FROM spark_single_order spo
                                                INNER JOIN courier_partners cpo 
                                                ON spo.courier_name_id = cpo.id WHERE User_Id=$user_id ORDER BY Single_Order_Id DESC";
                                                
                                               $singleproqueryr =mysqli_query($conn, $singleproquery);

                                               while ($row = mysqli_fetch_assoc($singleproqueryr)) {
                                           
                                            ?>
                                                

                                                    <td><?php echo $row['orderno']; ?></td>
                                                    <td><?php echo $row['uploaddate']; ?></td>
                                                    <td><?php echo $row['Name']; ?></td>
                                                    <td><?php echo $row['Mobile']; ?></td>
                                                    <td><?php echo $row['courier_name']; ?></td>

                                                    <td><?php echo $row['City']; ?></td>
                                                    <td><?php echo $row['Pincode']; ?></td>
                                                    <td>
                                                        <?php echo $row['Order_Type']; ?>
                                                    </td>
                                                    <td><?php echo $row['Item_Name']; ?></td>
                                                    <td><?php echo $row['Actual_Weight']; ?></td>
                                                    <td><?php echo $row['order_status_show']; ?></td>
                                                    <td><?php echo $row['order_status']; ?></td>

                                                   
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="tab-pane fade my-2" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Order Id(not shipped)</th>
                                                <th>Date</th>
                                                <th>Customer </th>
                                                <th>Mobile</th>
                                                <th>Courier</th>
                                                <th>City</th>
                                                <th>Pincode</th>
                                                <th>Type</th>
                                                <!-- <th>Mode</th> -->
                                                <th>Product</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <!-- `User_Id`='$user_id' -->
                                            <tbody class="filter_table">
                                            <?php
                                            $singleproquery = "SELECT * FROM spark_single_order spo
                                                INNER JOIN courier_partners cpo 
                                                ON spo.courier_name_id = cpo.id   WHERE `User_Id`='$user_id' AND `shipstatus`='0' AND `apihitornot`='0'  ORDER BY `Single_Order_Id` DESC";
                                            $singleproqueryr = mysqli_query($conn, $singleproquery);
                                            while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                                            ?>
                                                <tr>

                                                    <td> <input type="checkbox" class="get_value get_value_<?= $row['orderno'] ?>" data-orderid="<?= $row['orderno'] ?>" value="<?= $row['orderno'] ?>" /></td>

                                                    <td><?php echo $row['orderno']; ?></td>
                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>
                                                    <td><?php echo $row['Name']; ?></td>
                                                    <td><?php echo $row['Mobile']; ?></td>
                                                    <td><?php echo $row['courier_name']; ?></td>

                                                    <td><?php echo $row['City']; ?></td>
                                                    <td><?php echo $row['Pincode']; ?></td>
                                                    <td>
                                                        <?php echo $row['Order_Type']; ?>
                                                    </td>
                                                    <td><?php echo $row['Item_Name']; ?></td>
                                                    <td><?php echo $row['Actual_Weight']; ?></td>
                                                    <td><?php echo $row['order_status_show']; ?></td>
                                                    <td><?php echo $row['order_status1']; ?></td>

                                                    <!--<td>-->
                                                    <!--    <div class="dropdown d-inline">-->
                                                    <!--        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                                    <!--            Action-->
                                                    <!--        </button>-->
                                                    <!--        <div class="dropdown-menu">-->
                                                    <!--            <a class="dropdown-item has-icon" href="#"> Edit</a>-->
                                                    <!--            <a class="dropdown-item has-icon" href="order-shipping.php"> Print Label </a>-->
                                                    <!--            <a class="dropdown-item has-icon" href="#">Cancel</a>-->
                                                    <!--        </div>-->
                                                    <!--    </div>-->
                                                    <!--</td>-->
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade my-2" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="text-center">
                                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Order Id</th>
                                                <th>Date</th>
                                                <th>Customer </th>
                                                <th>Mobile</th>
                                                <th>Courier</th>
                                                <th>City</th>
                                                <th>Pincode</th>
                                                <th>Type</th>

                                                <th>Product</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td class="p-0 text-center">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>100457 </td>
                                                <td>2018-01-20</td>
                                                <td class="align-middle">
                                                    raj
                                                </td>
                                                <td>
                                                    98562374
                                                </td>
                                                <td>
                                                    Shree Maruti Courier
                                                </td>

                                                <td>
                                                    Delhi
                                                </td>
                                                <td>
                                                    110001
                                                </td>
                                                <td>
                                                    COD
                                                </td>
                                                <td>
                                                    hello
                                                </td>
                                                <td>
                                                    0.5kg
                                                </td>
                                                <th>pending</th>
                                                <td><a href="#" class="btn btn-primary">view</a></td>
                                            </tr>


                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade my-2" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>

                                                <th>Order Id</th>
                                                <th>Date</th>
                                                <th>Customer </th>
                                                <th>Mobile</th>
                                                <th>Courier</th>
                                                <th>City</th>
                                                <th>Pincode</th>
                                                <th>Type</th>

                                                <th>Product</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php

                                            $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`='' OR `order_cancel`='1'";
                                            $singleproqueryr = mysqli_query($conn, $singleproquery);
                                            while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                                            ?>
                                                <tr>
                                                    <!--<td class="p-0 text-center">-->
                                                    <!--    <div class="custom-checkbox custom-control">-->
                                                    <!--        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">-->
                                                    <!--        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>-->
                                                    <!--    </div>-->
                                                    <!--</td>-->
                                                    <td><?php echo $row['orderno']; ?></td>
                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>
                                                    <td><?php echo $row['Name']; ?></td>
                                                    <td><?php echo $row['Mobile']; ?></td>
                                                    <td><?php echo $row['awb_gen_by']; ?></td>

                                                    <td><?php echo $row['City']; ?></td>
                                                    <td><?php echo $row['Pincode']; ?></td>
                                                    <td>
                                                        <?php echo $row['Order_Type']; ?>
                                                    </td>
                                                    <td><?php echo $row['Item_Name']; ?></td>
                                                    <td><?php echo $row['Actual_Weight']; ?></td>
                                                    <td><?php echo $row['order_status_show']; ?></td>
                                                    <td><?php echo $row['order_status1']; ?></td>
                                                    <!--<td><a href="#" class="btn btn-primary">view</a></td>-->
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade my-2" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="text-center">
                                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Order Id</th>
                                                <th>Date</th>
                                                <th>Customer </th>
                                                <th>Mobile</th>
                                                <th>Courier</th>
                                                <th>City</th>
                                                <th>Pincode</th>
                                                <th>Type</th>
                                                <!-- <th>Mode</th> -->
                                                <th>Product</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php
                                             $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`=''  ORDER BY `Single_Order_Id` DESC";
                                               $singleproqueryr = mysqli_query($conn, $singleproquery);
                                               while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                                            ?>
                                                <tr>

                                                    <td> <input type="checkbox" class="get_value get_value_<?= $row['orderno'] ?>" data-orderid="<?= $row['orderno'] ?>" value="<?= $row['orderno'] ?>" /></td>

                                                    <td><?php echo $row['orderno']; ?></td>
                                                    <td><?php echo $row['uploaddate']; ?></td>
                                                    <td><?php echo $row['Name']; ?></td>
                                                    <td><?php echo $row['Mobile']; ?></td>
                                                    <td><?php echo $row['awb_gen_by']; ?></td>

                                                    <td><?php echo $row['City']; ?></td>
                                                    <td><?php echo $row['Pincode']; ?></td>
                                                    <td>
                                                        <?php echo $row['Order_Type']; ?>
                                                    </td>
                                                    <td><?php echo $row['Item_Name']; ?></td>
                                                    <td><?php echo $row['Actual_Weight']; ?></td>
                                                    <td><?php echo $row['order_status_show']; ?></td>
                                                    <td><?php echo $row['order_status1']; ?></td>

                                                   
                                                </tr>
                                            <?php
                                            }
                                            ?>


                                        </table>
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
<script>
    $(function() {

        $('#submit123').click(function() {


            var myCheckboxes = new Array();
            $("input:checked").each(function() {
                myCheckboxes.push($(this).val());
            });
            // let orderid = $('.get_value').data('orderid');
            let url = "insert.php";

            $.ajax({
                type: "GET",
                url: 'insert.php',
                data: {
                    status: 1,
                    ship_status: 'shepped',
                    myCheckboxes: myCheckboxes
                },
                success: function(response) {
                    console.log('line Two');
                    // alert('work');
                    console.log(response);
                    // window.location.href('upload-order.php');
                    // window.location.href = 'https://rappidx.com/Admin/shipment.php';
                    window.location.href = 'http://localhost/Vivek/ServerProject/rappidx.com/Admin/shipment.php';
                    console.log(data.message);
                }
            });



        });
    });

    //Change Courier
//#exampleModalCenter_Couriear
        $(function() {


            var change_courier = new Array();
         

            $(".Courier input:checkbox[name=type]:checked").each(function() {
                change_courier.push($(this).val());
            });
console.log(change_courier);
            // let orderid = $('.get_value').data('orderid');
            // let url = "insert.php";

            // $.ajax({
            //     type: "GET",
            //     url: 'insert.php',
            //     data: {
            //         status: 1,
            //         ship_status: 'shepped',
            //         myCheckboxes: myCheckboxes
            //     },
            //     success: function(response) {
            //         console.log('line Two');
            //         // alert('work');
            //         console.log(response);
            //         // window.location.href('upload-order.php');
            //         // window.location.href = 'https://rappidx.com/Admin/shipment.php';
            //         window.location.href = 'http://localhost/Vivek/ServerProject/rappidx.com/Admin/shipment.php';
            //         console.log(data.message);
            //     }
            // });




    });
</script>
<!-- Bulkorder popup Center -->
<div class="modal fade" id="exampleModalCenter200" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">UPLOAD BULK ORDERS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Upload orders via excel file<span class="text-danger">*</span></label>

                    </div>
                    <hr>
                    <h6>CSV File With Sample Data: <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv">Download</a></h6>
                    <hr>
                    <div class="custom-file">
                        <input type="text" name="selectedweightidis" value="<?= $user_id ?>">
                        <!-- <input type="file" class="custom-file-input" id="customFile"> -->
                        <input type="file" name="bulkorderfile" required="" onchange="inputfile500gm(this)" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Upload CSV File11</label>
                    </div>
                    <label>Please remove sample data before proceed<span class="text-danger">*</span></label>
                </div>

                <div class="modal-footer bg-whitesmoke br">
                    <!-- <button type="button" class="btn btn-primary">Upload</button> -->
                    <input type="text" name="selectedweightidis" value="<?= $user_id ?>">
                    <input type="submit" class="btn btn-primary active" name="importSubmit5gm" value="Upload CSV File" title="Please Select First Upload File" id="inputsubmits500gm">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 500 Gram Start -->
<!--- Change couirier parter-->
    <div class="modal fade" id="exampleModalCenter_Couriear" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">CHANGE COURIER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    <hr>
                <div class="modal-body">
                

                    <div class="custom-file">
                        <input type="hidden" name="selectedweightidis" value="<?= $user_id ?>">
                        <select class="form-control">
                            <option value="">abc</option>
                            <option value="">xyz</option>
                            <option value="">mno</option>
                        </select>
                        
                    </div>
                </div>

                <div class="modal-footer bg-whitesmoke br">
                    <!-- <button type="button" class="btn btn-primary">Upload</button> -->
                    <input type="hidden" name="selectedweightidis" value="<?= $user_id ?>">
                    <input type="submit" class="btn btn-primary active" name="importSubmit5gm" value="Update">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

if (isset($importSubmit5gm)) {

    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";

    // $user_id = $_SESSION['useridis'];

    $user_id = $selectedweightidis;

    try {

        //

        // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";

        $fa = date('dmY');

        $fb = $user_id;

        $fc = "_";

        $randno1 = rand(1, 499);

        $randno2 = rand(500, 999);

        $bannername = $fa . $fb . $fc . $randno1 . $randno2 . ".csv";
       
        // $bannername = $_FILES["bulkorderfile"]["name"];

        $bannertmp = $_FILES["bulkorderfile"]["tmp_name"];
 
        move_uploaded_file($bannertmp, "BulkExcelFiles/$bannername");

        $fileD = fopen("BulkExcelFiles/$bannername", "r");
        $column = fgetcsv($fileD);
    
        while (!feof($fileD)) {

            $rowData[] = fgetcsv($fileD);
        }
    

        $totalnooforders = count($rowData);
 
        $bulkordersq = "INSERT INTO `spark_single_order_file`(`couriername`, `filename`, `uploaddate`, `uploadtime`, `uploadby`, `uploadid`, `uploadusercate`, `totalnooforders`) VALUES ('500gm','$bannername',now(),now(),'$user_id','$user_id','$user_id','$totalnooforders')";

        mysqli_query($conn, $bulkordersq);

        // echo "<pre>";

        // print_r($rowData);


        foreach ($rowData as $key => $value) {
            
            if ($value[0] == "") {
                continue;
            }

            if (empty($value[17]) and empty($value[18])) {

                echo "<script> window.location.assign('upload-order.php?excelfile=invalid Details')</script>";
            }
        }









        foreach ($rowData as $key => $value) {

            if ($value[0] == "") {
                continue;
            }



            $value[0] = trim($value[0]);

            $value[0] = mysqli_real_escape_string($conn, $value[0]);

            $value[1] = trim($value[1]);

            $value[1] = mysqli_real_escape_string($conn, $value[1]);

            $value[2] = trim($value[2]);

            $value[2] = mysqli_real_escape_string($conn, $value[2]);

            $value[3] = trim($value[3]);

            $value[3] = mysqli_real_escape_string($conn, $value[3]);

            $value[4] = trim($value[4]);

            $value[4] = mysqli_real_escape_string($conn, $value[4]);

            $value[5] = trim($value[5]);

            $value[5] = mysqli_real_escape_string($conn, $value[5]);

            $value[6] = trim($value[6]);

            $value[6] = mysqli_real_escape_string($conn, $value[6]);

            $value[7] = trim($value[7]);

            $value[7] = mysqli_real_escape_string($conn, $value[7]);

            $value[8] = trim($value[8]);

            $value[8] = mysqli_real_escape_string($conn, $value[8]);

            $value[9] = trim($value[9]);

            $value[9] = mysqli_real_escape_string($conn, $value[9]);

            $value[10] = trim($value[10]);

            $value[10] = mysqli_real_escape_string($conn, $value[10]);

            $value[11] = trim($value[11]);

            $value[11] = mysqli_real_escape_string($conn, $value[11]);

            $value[12] = trim($value[12]);

            $value[12] = mysqli_real_escape_string($conn, $value[12]);

            $value[13] = trim($value[13]);

            $value[13] = mysqli_real_escape_string($conn, $value[13]);

            $value[14] = trim($value[14]);

            $value[14] = mysqli_real_escape_string($conn, $value[14]);

            $value[15] = trim($value[15]);

            $value[15] = mysqli_real_escape_string($conn, $value[15]);

            $value[16] = trim($value[16]);

            $value[16] = mysqli_real_escape_string($conn, $value[16]);

            $value[17] = trim($value[17]);

            $value[17] = mysqli_real_escape_string($conn, $value[17]);

            $value[18] = trim($value[18]);

            $value[18] = mysqli_real_escape_string($conn, $value[18]);

            $value[19] = trim($value[19]);

            $value[19] = mysqli_real_escape_string($conn, $value[19]);

            $value[20] = trim($value[20]);

            $value[20] = mysqli_real_escape_string($conn, $value[20]);

            $value[21] = trim($value[21]);

            $value[21] = mysqli_real_escape_string($conn, $value[21]);

            if (empty($value[21])) {
                $value[21] = "";
            }

            $value[22] = trim($value[22]);

            $value[22] = mysqli_real_escape_string($conn, $value[22]);

            $value[23] = trim($value[23]);

            $value[23] = mysqli_real_escape_string($conn, $value[23]);

            $value[24] = trim($value[24]);

            $value[24] = mysqli_real_escape_string($conn, $value[24]);





            // Pickup Address

            if (empty($value[17])) {

                $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";

                if (mysqli_query($conn, $newpickupaddress)) {

                    $pickupaddressid = mysqli_insert_id($conn);

                    $value[17] = $pickupaddressid;
                } else {

                    echo "<script> window.location.assign('upload-order.php?excelfile=Invalid Data')</script>";
                }
            } else {

                $pickupidis = $value[17];

                $newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";

                $alldata = mysqli_query($conn, $newpickupaddress);

                if ($exists = mysqli_num_rows($alldata)) {

                    // echo "<br> : - ";

                    // echo $exists;

                    // echo "<br>";

                    $alldatares = mysqli_fetch_assoc($alldata);

                    $value[18] = $alldatares['Name'];

                    $value[19] = $alldatares['Mobile'];

                    $value[20] = $alldatares['Pincode'];

                    $value[21] = $alldatares['Gstin'];

                    $value[22] = $alldatares['Address'];

                    $value[23] = $alldatares['State'];

                    $value[24] = $alldatares['City'];
                } else {

                    // echo "<br> : -";

                    // echo "Else";

                    // echo "<br>";

                    $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";

                    if (mysqli_query($conn, $newpickupaddress)) {

                        $pickupaddressid = mysqli_insert_id($conn);

                        $value[17] = $pickupaddressid;
                    } else {

                        echo "<script> window.location.assign('upload-order.php?excelfile=Invalid Data1')</script>";
                    }
                }
            }



            // echo "<br><br>";

            $tdate = date("Y-m-d");

            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";

            if (mysqli_query($conn, $singlequery)) {

                // echo "<br><br>";

                $last_id = mysqli_insert_id($conn);
            }

            // Last Insert ID



            // echo "<br><br>";

            // $orderidcreate = "RPDX00".$last_id;

            // echo "<br><br>";

            // $value[4] = $orderidcreate;

            // echo "<br><br>";





            // echo "<br><br>";

            $orderidcreate = $value[4];

            // echo "<br><br>";

            if (empty($value[4])) {

                $orderidcreate = "RPDX00" . $last_id;

                $value[4] = $orderidcreate;
            }

            // $value[4] = $orderidcreate;







            $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";

            // echo "<br><br>";

            mysqli_query($conn, $updateorderid);

            // Last Insert ID



            // API Check

            // $xpressbeeapion = 1;

            // $shadowfaxapion = 0;

            // $dtdcapion = 0;

            // $delhiveryapion = 0;

            // $xpressbeeapion = "XpressBees";

            // $shadowfaxapion = "Shadowfax";

            // $dtdcapion = "DTDC";

            // $delhiveryapion = "Delhivery";



            $xpressbeeapion = "XpressBee";

            $shadowfaxapion = "ShadowFax";

            $dtdcapion = "DTDC";

            $delhiveryapion = "Delhivery";

            $awbnogenerate = "";

            // API Check



            $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";

            $permissionsr = mysqli_query($conn, $apipermission);

            $pres = mysqli_fetch_assoc($permissionsr);

            $arrayName = array($pres['api_xpressbee'] => "XpressBee", $pres['api_delhivery'] => "Delhivery", $pres['api_ekart'] => "Ekart", $pres['api_shadowfax'] => "ShadowFax", $pres['api_dtdc'] => "DTDC");



                // print_r($arrayName);

            // echo "<br>";



            // echo "<br><br>";

        }

        echo "<script> window.location.assign('upload-order.php?excelfile=Update')</script>";
    } catch (Exception $e) {
       echo "<script> window.location.assign('upload-order.php?excelfile=No Update')</script>";
    }
}

?>

<!-- 500 Gram End -->
<?php include_once("layouts/footer.php");   ?>
