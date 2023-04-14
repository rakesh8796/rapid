<?php
    include "Layout_Header_Table.php";
    // include "Layout_Footer.php";
?>

<div class="bg-title">
    <div class="col-md-12">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Complete Orders</h4>
        </div>
    </div>
</div>


        <section class="content">
              <div class="col-md-12">
                <div class="col-md-12">
                    <div class="white-box filterable">
<div class="table-responsive">

<!-- Excel File -->
<!-- <div class="col-md-3 col-sm-3"></div>
<div class="col-md-3 col-sm-3"></div>
<div class="col-md-3 col-sm-3"></div>
<div class="col-md-3 col-sm-3">
    <a href="Order_Emp_fComplete_Excel.php" class="btn btn-info btn-block">Download</a>
</div> -->
<!-- Excel File -->

<table id="myTable" class="table table-striped">
<thead>
<tr>
    <!-- <th data-field="#" data-sortable="true">#</th> -->
    <th data-field="Order Unique Id" data-sortable="true">Order Unique Id</th>
    <th data-field="User Name" data-sortable="true">User Name</th>
    <th data-field="AWB Number" data-sortable="true">AWB Number</th>
    <th data-field="Customer Name" data-sortable="true">Customer Name</th>
    <th data-field="Customer Mobile" data-sortable="true">Customer Mobile</th>
    <th data-field="Customer Address" data-sortable="true">Customer Address</th>
    <th data-field="Customer State" data-sortable="true">Customer State</th>
    <th data-field="Customer City" data-sortable="true">Customer City</th>
    <th data-field="Customer Pincode" data-sortable="true">Customer Pincode</th>

    <th data-field="Product Name" data-sortable="true">Product Name</th>
    <th data-field="Quantity" data-sortable="true">Quantity</th>
    <th data-field="L/W/H" data-sortable="true">L/W/H</th>
    <th data-field="Weight" data-sortable="true">Weight</th>
    <th data-field="Total Amt" data-sortable="true">Total Amt</th>
    <th data-field="COD Amt" data-sortable="true">COD Amt</th>
    <th data-field="Additional Type" data-sortable="true">Additional Type</th>
    <th data-field="Upload Time" data-sortable="true">Upload Time</th>

    <th data-field="Pickup Id" data-sortable="true">Pickup Id</th>
    <th data-field="Pickup Name" data-sortable="true">Pickup Name</th>
    <th data-field="Pickup Mobile" data-sortable="true">Pickup Mobile</th>
    <th data-field="Pickup Address" data-sortable="true">Pickup Address</th>
    <th data-field="Pickup State" data-sortable="true">Pickup State</th>
    <th data-field="Pickup City" data-sortable="true">Pickup City</th>
    <th data-field="Pickup Pincode" data-sortable="true">Pickup Pincode</th>
    <th data-field="Upload Type" data-sortable="true">Upload Type</th>
    <th data-field="Order Status" data-sortable="true">Order Status</th>
</tr>
</thead>
<tbody>

<!--  -->

<?php
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `order_status`='Complete'";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
<tr class="record">
    <td><?= $row['Single_Order_Id'] ?></td>
    <td>
<?php
    $User_Id = $row['User_Id'];
    $uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$User_Id'";
    $uploaduserr=mysqli_query($conn,$uploaduser);
    $uploaduserres = mysqli_fetch_assoc($uploaduserr);
    echo $uploaduserres['Company_Name'];
?>
    </td>
    <td><?php echo $row['Awb_Number']; ?></td>
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
    <td><?php echo $row['Rec_Time_Stamp']; ?></td>

    <td><?php echo $row['pickup_id']; ?></td>
    <td><?php echo $row['pickup_name']; ?></td>
    <td><?php echo $row['pickup_mobile']; ?></td>
    <td><?php echo $row['pickup_address']; ?></td>
    <td><?php echo $row['pickup_state']; ?></td>
    <td><?php echo $row['pickup_city']; ?></td>
    <td><?php echo $row['pickup_pincode']; ?></td>
    <td><?php echo $row['uploadtype']; ?> Order</td>
    <td><?php echo $row['order_status1']; ?></td>
</tr>
<?php
    }
?>
<!--  -->

        </tbody>
    </table>



</div>


                    </div>
                </div>
            </div>
            </section>



             <section class="content">
            <!--main content-->
            <div class="row">


































            </div>
        </section>
    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php
    // include "Layout_Header.php";
    include "Layout_Footer_Table.php";
?>
