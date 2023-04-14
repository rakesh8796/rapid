

<?php
  include "Layout_Header-retailer.php";
?>


<!--  Header  -->
<?php
  include "retailer-header-bulk.php";
?>
<!--  Header  -->

<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>



<!--  topbar  -->
<?php
  include "retailer-header-topbar.php";
?>
<!--  topbar  -->


         <div class="main-sidebar sidebar-style-2">


<!--  Sidebar  -->
<?php
  include "retailer-sidebar.php";
?>
<!--  Sidebar  -->


</div>











      <!-- Main Content -->
      <div class="main-content">
          
          































          
          
        <section class="section">
          <div class="section-body">


<?php
if($_GET['excelfile'] == 'Cancel Order'){
  echo "<div class='alert alert-success'>Order cancel successfully</div>";
}elseif($_GET['excelfile'] == 'Not Cancel Order'){
  echo "<div class='alert alert-danger'>Order Not Canceled | Please Try Again</div>";
}


?>

           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>SINGLE ORDERS</h4>
                  </div>
                  <div class="card-body">
                    <div>
                    <ul class="list-inline text-right">
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
                        
                        
                        
                        
                        
                        
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Order Number</th>
                            <th>AWB Number</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Customer Address</th>
                            <th>Customer State</th>
                            <th>Customer City</th>
                            <th>Customer Pincode</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>L/W/H</th>
                            <th>Weight</th>
                            <th>Total Amt</th>
                            <th>COD Amt</th>
                            <th>Additional Type</th>
                            <th>Upload Time</th>
                            <th>Pickup id</th>
                            <th>Pickup Name</th>
                            <th>Pickup Mobile</th>
                            <th>Pickup State</th>
                            <th>Pickup City</th>
                            <th>Pickup Pincode</th>
                            <th>Order Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <!--  -->
                        <?php
                        $tdate = date("Y-m-d");
                        $totalnoosorders = 0;
                        //
                        $useridisa = array();
                        $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
                        $fdataall=mysqli_query($conn,$queryall);
                        $numrowall=mysqli_num_rows($fdataall);
                        if($numrowall>1){
                            while($resultall = mysqli_fetch_assoc($fdataall)){
                                $useridisa[] = $resultall['User_Id'];
                            }
                            $user_ids = implode(",",$useridisa);
                        }else{
                          $user_ids = $user_id;
                        }


                    // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `Awb_Number`!='' AND `awb_gen_by`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
                    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";


                        //
                        // $singleproquery = "SELECT * FROM `spark_single_order` ORDER BY `Single_Order_Id` DESC";
                        $singleproqueryr=mysqli_query($conn,$singleproquery);
                        while($row = mysqli_fetch_assoc($singleproqueryr))
                        {
                            
                            $awbsnumare = $row['Awb_Number'];
                            $ordernoare = $row['orderno'];
                            
                            
                          if($row['order_cancel']){
                        ?>
                          <tr class="record danger">
                        <?php
                          }else{
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
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Mobile']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><?php echo $row['State']; ?></td>
                            <td><?php echo $row['City']; ?></td>
                            <td><?php echo $row['Pincode']; ?></td>

                            <td><?php echo $row['Item_Name']; ?></td>
                            <td><?php echo $row['Quantity']; ?></td>
                            <td><?php echo $row['Length']; ?> x <?php echo $row['Width']; ?> x <?php echo $row['Height']; ?></td>
                            <td><?php echo $row['Actual_Weight']; ?></td>
                            <td><?php echo $row['Total_Amount']; ?></td>
                            <td><?php echo $row['Cod_Amount']; ?></td>
                            <td><?php echo $row['additionaltype']; ?></td>
                            <td><?php echo $row['Rec_Time_Date']; ?></td>

                            <td><?php echo $row['pickup_id']; ?></td>
                            <td><?php echo $row['pickup_name']; ?></td>
                            <td><?php echo $row['pickup_mobile']; ?></td>
                            <!-- <td><?php echo $row['pickup_address']; ?></td> -->
                            <td><?php echo $row['pickup_state']; ?></td>
                            <td><?php echo $row['pickup_city']; ?></td>
                            <td><?php echo $row['pickup_pincode']; ?></td>
                            <td><?php echo $row['order_status1']; ?></td>
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


    </div>
  </div>

<!--  Footer  -->
<?php
  include "retailer-footer-bulk.php";
?>
<!--  Footer  -->
