<?php include_once("layout_new_user_config.php");   ?>

<?php include_once("layouts/header.php");   ?>

<div class="main-content">

    <section class="section">

        <div class="section-body">

            <div class="row">



                <div class="col-12">

                    <div class="card">

                        <div class="card-header">

                            <h4>Shipment</h4>

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

                        <div class="card-header-form">

                            <div class=" text-right " style="margin-right:2% ;">
                                <a href="#" class="btn btn-outline-primary">&nbsp;Print Label&nbsp;</i></a>
                                <a href="#" class="btn btn-outline-primary">&nbsp;Manifest&nbsp;</i></a>
                                <a href="javascript:void(0)" onclick="window.location.reload()" class="btn btn-outline-primary">&nbsp;Refresh&nbsp;</i></a>

                                <a href="#" class="btn btn-outline-primary">&nbsp;Report&nbsp;</i></a>

                                <a href="#" class="btn btn-outline-primary" onclick="myFunction()">&nbsp;Filtter&nbsp;</i></a>

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
                                    <form id="shipment_filter_form">

                                    <div class="row">
                                        <input type="hidden" id="active_shipment" name="active_shipment">
                                        <input type="hidden" id="table_id_shipment" name="table_id_shipment">

                                        <div class="col-md-3  ">

                                            <label class="form-label">Date Range</label>

                                            <div class="list-inline text-center">

                                                <div class="form-group ">

                                                    <select class="form-control " name="ship_data_range" id="type">

                                                        <option value="---Download Your Order---">---Select Data Range---</option>

                                                        <option value="Today">Today</option>

                                                        <option value="Yesterday">Yesterday</option>

                                                        <option value="Last seven days orders">Last seven days </option>

                                                        <option value="Current Month Order">Current Month </option>

                                                        <option value="Last Month Order">Last Month </option>

                                                       

                                                        <option value="Custom Date Range">Custom Date Range</option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-3 ">

                                            <label class="form-label">AWB Number</label>

                                           

                                                <div class="input-group ">

                                                    <input type="text" name="ship_awb_no" class="form-control " placeholder="Search by AWB ">

                                                </div>

                                           

                                        </div>

                                        <div class="col-md-3 ">

                                            <label class="form-label">Order Id</label>

                                            
                                                <div class="input-group ">

                                                    <input type="text" name="ship_order_id" class="form-control " placeholder="Search by Order Id">

                                                </div>

                                            
                                        </div>

                                        <div class="col-md-3 ">

                                            <label class="form-label">Courier Wise</label>

                                            
                                                <div class="input-group ">

                                                    <input type="text" name="ship_couier" class="form-control " placeholder="search by Courier Wise">

                                                </div>

                                            
                                        </div>

                                        <div class="col-md-3 ">

                                            <label class="form-label">Product Name</label>

                                            

                                                <div class="input-group ">

                                                    <input type="text" name="ship_product" class="form-control " placeholder="Search by Product name">

                                                </div>

                                           

                                        </div>

                                        <div class="col-md-3 ">

                                            <label class="form-label">Warehouse</label>

                                           

                                                <div class="input-group ">

                                                    <input type="text" name="ship_warehouse" class="form-control " placeholder="Search by Warehouse">



                                                </div>

                                            

                                        </div>

                                        <div class="col-md-2">

                                            <label class="form-label">Payment Mode*</label>

                                            <div class="form-group">

                                                <select class="form-control" id="paymentmode" name="ordertype" onchange="calculateraterefresh(),yesnoCheck(this)" >

                                                    <option value="">Select</option>

                                                    <option value="Prepaid">Prepaid</option>

                                                    <option value="COD">COD</option>

                                                    <option value="COD">COD/Prepaid</option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-md-3 my-2">

                                            <label class="form-label"></label>

                                            <div class="form-group">

                                                <input type="submit" class="btn btn-outline-primary" value="Search">

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


                           
                        </script>

                        <div class="card-body " style="margin-top:2%;">

                            <ul class="nav nav-pills" id="myTab3" role="tablist" style="margin-left:2% ;">

                                <li class="nav-item">

                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">All </a>

                                </li>



                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Pending Pickup</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact4" aria-selected="false">Intransit</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact5" aria-selected="false">Delivered</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab6" data-toggle="tab" href="#contact6" role="tab" aria-controls="contact6" aria-selected="false">Out For Delivery</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab7" data-toggle="tab" href="#contact7" role="tab" aria-controls="contact7" aria-selected="false">Undelivered</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab8" data-toggle="tab" href="#contact8" role="tab" aria-controls="contact8" aria-selected="false">RTO</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab9" data-toggle="tab" href="#contact9" role="tab" aria-controls="contact9" aria-selected="false">Lost</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" id="contact-tab10" data-toggle="tab" href="#contact10" role="tab" aria-controls="contact10" aria-selected="false">Cancelled</a>

                                </li>

                            </ul>

                            <div class="tab-content  " id="myTabContent2">

                                <div class="tab-pane fade show active my-2" id="home3" role="tabpanel" aria-labelledby="home-tab3">

                                    <div class="table-responsive">

                                        <table class="table table-striped">
                                            <thead>

                                            <tr>

                                                <!--<th class="text-center">-->

                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->

                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->

                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->

                                                <!--    </div>-->

                                                <!--</th>-->
                                                <th></th>

                                                <th>Order Id</th>

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

                                            </tr>
                                            </thead>
                                            <tbody class="ship_filter_table">
                                            <?php

                                            $singleproquery = "SELECT * FROM `spark_single_order` spo
                                                INNER JOIN courier_partners cpo 
                                                ON spo.courier_name_id = cpo.id WHERE `User_Id`='$user_id' ORDER BY `Single_Order_Id` DESC";

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

                                                    <td></td>
                                                    <td><?php echo $row['orderno']; ?></td>

                                                    <td><?php echo $row['Awb_Number']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                    <td><?php echo $row['Name']; ?></td>

                                                    <td><?php echo $row['courier_name']; ?></td>



                                                    <td><?php echo $row['Actual_Weight']; ?></td>

                                                    <td><?php echo $row['Order_Type']; ?></td>

                                                    <td><?php echo $row['Total_Amount']; ?></td>

                                                    <td><?php echo $row['Item_Name']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                    <td><?php echo $row['order_status_show']; ?></td>



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
                                            <thead>
                                            <tr>

                                                <!--<th class="text-center">-->

                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->

                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->

                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->

                                                <!--    </div>-->

                                                <!--</th>-->
                                                <th></th>
                                                <th>Order Id</th>
                                                

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

                                            </tr>
                                            </thead>
                                             <tbody class="ship_filter_table">

                                            <?php

                                            $singleproquery = "SELECT * FROM `spark_single_order` spo
                                                INNER JOIN courier_partners cpo 
                                                ON spo.courier_name_id = cpo.id WHERE `User_Id`='$user_id' AND `order_status1`='Pending'";

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
                                                    <td> <input type="checkbox" class="get_value get_value_<?= $row['orderno'] ?>" data-orderid="<?= $row['orderno'] ?>" value="<?= $row['orderno'] ?>" /></td>

                                                    <td><?php echo $row['orderno']; ?></td>
                                                   

                                                    <td><?php echo $row['Awb_Number']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                    <td><?php echo $row['Name']; ?></td>

                                                    <td><?php echo $row['courier_name']; ?></td>



                                                    <td><?php echo $row['Actual_Weight']; ?></td>

                                                    <td><?php echo $row['Order_Type']; ?></td>

                                                    <td><?php echo $row['Total_Amount']; ?></td>

                                                    <td><?php echo $row['Item_Name']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                    <td><?php echo $row['order_status_show']; ?></td>



                                                </tr> 
                                                <?php

                                                    }

                                                        ?>

                                                        </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="tab-pane fade my-2" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">

                                    <table class="table table-striped">

                                        <tr>

                                            <th class="text-center">

                                                <div class="custom-checkbox custom-checkbox-table custom-control">

                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">

                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>

                                                </div>

                                            </th>
                                           

                                            <th>Order Id</th>

                                            <th>AWB</th>

                                            <th>Date</th>

                                            <th>Customer </th>

                                            <th>Courier</th>

                                            <th>Weight</th>

                                            <th>Mode</th>

                                            <th>Value</th>

                                            <th>Product</th>

                                            <th>latest Update</th>

                                            <th>Status</th>

                                        </tr>

                                        <?php

                                        $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status1`='In Transit'";

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

                                                <td><?php echo $row['Awb_Number']; ?></td>

                                                <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                <td><?php echo $row['Name']; ?></td>

                                                <td><?php echo $row['awb_gen_by']; ?></td>



                                                <td><?php echo $row['Actual_Weight']; ?></td>

                                                <td><?php echo $row['additionaltype']; ?></td>

                                                <td><?php echo $row['Total_Amount']; ?></td>

                                                <td><?php echo $row['Item_Name']; ?></td>

                                                <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                <td><?php echo $row['order_status_show']; ?></td>



                                            </tr>

                                        <?php

                                        }

                                        ?>






                                    </table>

                                </div>

                                <div class="tab-pane fade my-2" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">

                                    <div class="table-responsive">

                                        <table class="table table-striped">

                                            <tr>

                                                <!--<th class="text-center">-->

                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->

                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->

                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->

                                                <!--    </div>-->

                                                <!--</th>-->

                                                <th>Order Id</th>

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

                                            </tr>

                                            <?php



                                            $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered'";

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

                                                    <td><?php echo $row['Awb_Number']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                    <td><?php echo $row['Name']; ?></td>

                                                    <td> Shree Maruti </td>



                                                    <td><?php echo $row['Actual_Weight']; ?></td>

                                                    <td><?php echo $row['additionaltype']; ?></td>

                                                    <td><?php echo $row['Total_Amount']; ?></td>

                                                    <td><?php echo $row['Item_Name']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                    <td><?php echo $row['order_status_show']; ?></td>



                                                </tr>

                                            <?php

                                            }

                                            ?>

                                        </table>

                                    </div>

                                </div>

                                <div class="tab-pane fade my-2" id="contact6" role="tabpanel" aria-labelledby="contact-tab6">

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

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

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

                                                <td class="align-middle">raj</td>

                                                <td> 98562374 </td>

                                                <td> Shree Maruti Courier</td>



                                                <td> Delhi

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



                                            </tr>





                                        </table>

                                    </div>

                                </div>

                                <div class="tab-pane fade my-2" id="contact7" role="tabpanel" aria-labelledby="contact-tab7">

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

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

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

                                                <td class="align-middle">raj</td>

                                                <td> 98562374 </td>

                                                <td> Shree Maruti Courier</td>



                                                <td> Delhi

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



                                            </tr>





                                        </table>

                                    </div>

                                </div>

                                <div class="tab-pane fade my-2" id="contact8" role="tabpanel" aria-labelledby="contact-tab8">

                                    <div class="table-responsive">

                                        <table class="table table-striped">

                                            <tr>

                                                <!--<th class="text-center">-->

                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->

                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->

                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->

                                                <!--    </div>-->

                                                <!--</th>-->

                                                <th>Order Id</th>

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

                                            </tr>

                                            <?php

                                            // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' OR `order_status_show`='RTO Delivered'";

                                            $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered'";

                                            $singleproqueryr = mysqli_query($conn, $singleproquery);

                                            while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                                                // echo $row['order_status_show'];

                                                // if($row['order_status_show']!='Delivered' OR $row['order_status_show']!='RTO Delivered'){

                                                //   continue;

                                                // }

                                            ?>

                                                <tr>



                                                    <!--<td class="p-0 text-center">-->

                                                    <!--    <div class="custom-checkbox custom-control">-->

                                                    <!--        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">-->

                                                    <!--        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>-->

                                                    <!--    </div>-->

                                                    <!--</td>-->

                                                    <td><?php echo $row['orderno']; ?></td>

                                                    <td><?php echo $row['Awb_Number']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                    <td><?php echo $row['Name']; ?></td>

                                                    <td> Shree Maruti </td>



                                                    <td><?php echo $row['Actual_Weight']; ?></td>

                                                    <td><?php echo $row['additionaltype']; ?></td>

                                                    <td><?php echo $row['Total_Amount']; ?></td>

                                                    <td><?php echo $row['Item_Name']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                    <td><?php echo $row['order_status_show']; ?></td>



                                                </tr>

                                            <?php

                                            }

                                            ?>



                                        </table>

                                    </div>

                                </div>

                                <div class="tab-pane fade my-2" id="contact9" role="tabpanel" aria-labelledby="contact-tab9">

                                    <div class="table-responsive">

                                        <table class="table table-striped">

                                            <tr>

                                                <!--<th class="text-center">-->

                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->

                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->

                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->

                                                <!--    </div>-->

                                                <!--</th>-->

                                                <th>Order Id</th>

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

                                            </tr>

                                            <?php

                                            // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' OR `order_status_show`='RTO Delivered'";

                                            $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Lost'";

                                            $singleproqueryr = mysqli_query($conn, $singleproquery);

                                            while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                                                // echo $row['order_status_show'];

                                                // if($row['order_status_show']!='Delivered' OR $row['order_status_show']!='RTO Delivered'){

                                                //   continue;

                                                // }

                                            ?>

                                                <tr>



                                                    <!--<td class="p-0 text-center">-->

                                                    <!--    <div class="custom-checkbox custom-control">-->

                                                    <!--        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">-->

                                                    <!--        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>-->

                                                    <!--    </div>-->

                                                    <!--</td>-->

                                                    <td><?php echo $row['orderno']; ?></td>

                                                    <td><?php echo $row['Awb_Number']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                    <td><?php echo $row['Name']; ?></td>

                                                    <td> Shree Maruti </td>



                                                    <td><?php echo $row['Actual_Weight']; ?></td>

                                                    <td><?php echo $row['additionaltype']; ?></td>

                                                    <td><?php echo $row['Total_Amount']; ?></td>

                                                    <td><?php echo $row['Item_Name']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                    <td><?php echo $row['order_status_show']; ?></td>



                                                </tr>

                                            <?php

                                            }

                                            ?>







                                        </table>

                                    </div>

                                </div>

                                <div class="tab-pane fade my-2" id="contact10" role="tabpanel" aria-labelledby="contact-tab10">

                                    <div class="table-responsive">

                                        <table class="table table-striped">

                                            <tr>

                                                <!--<th class="text-center">-->

                                                <!--    <div class="custom-checkbox custom-checkbox-table custom-control">-->

                                                <!--        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">-->

                                                <!--        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>-->

                                                <!--    </div>-->

                                                <!--</th>-->

                                                <th>Order Id</th>

                                                <th>AWB</th>

                                                <th>Date</th>

                                                <th>Customer </th>

                                                <th>Courier</th>

                                                <th>Weight</th>

                                                <th>Mode</th>

                                                <th>Value</th>

                                                <th>Product</th>

                                                <th>latest Update</th>

                                                <th>Status</th>

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

                                                    <td><?php echo $row['Awb_Number']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Date']; ?></td>

                                                    <td><?php echo $row['Name']; ?></td>

                                                    <td> Shree Maruti </td>



                                                    <td><?php echo $row['Actual_Weight']; ?></td>

                                                    <td><?php echo $row['additionaltype']; ?></td>

                                                    <td><?php echo $row['Total_Amount']; ?></td>

                                                    <td><?php echo $row['Item_Name']; ?></td>

                                                    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

                                                    <td><?php echo $row['order_status_show']; ?></td>



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

<?php include_once("layouts/footer.php");   ?>
<script type="text/javascript">
   $(document).on("click",".nav-link",function(){
        if($(this).hasClass('active')){
            var shipment_active=$(this).text();
            console.log(shipment_active);
            $("#active_shipment").val(shipment_active);
            var shipment_attr=$(this).attr('href');
            
            $("#table_id_shipment").val(shipment_attr);
            
        }
    });

    $("#shipment_filter_form").submit(function(e){
                                 var formData=new FormData(this);
                                e.preventDefault();
                                $.ajax({
                                         url :'shipment_filter_order.php',
                                        type :'POST',
                                        data :formData,
                                      
                                        contentType : false,
                                        processData : false,
                                         success:function(response){
                                            console.log(response);
                                              var data1=JSON.parse(response);

                                             $(data1.ship_tableId+ "table tbody tr").not("thead tr").remove();
                                              
                                             $(".ship_filter_table").html(data1.ship_data);
                                            
                                            
                                         }
                                });
                              
                            });  

</script>