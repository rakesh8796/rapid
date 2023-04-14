<?php
    include "Layout_Header_Table.php";
?>

<!-- Page Content -->



<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Pending Order
      <span style="float:right">
        <!-- Excel File -->
          <a href="Order_Last_7_Days_C_Excel.php" class="btn btn-info btn-block">Download All Pending Orders</a>
        <!-- Excel File -->
      </span>
    </h4>
  </div>
</div>



<!-- /row -->

<div class="col-md-12">
<div class="col-md-12">
<div class="white-box">
<!-- <h3 class="box-title m-b-0">Hospital Payments Details</h3>
<hr> -->
<div class="table-responsive">


  <table id="myTable" class="table table-striped">
      <thead>
          <tr>
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

            <th>Pickup Id</th>
            <th>Pickup Name</th>
            <th>Pickup Mobile</th>
            <th>Pickup Address</th>
            <th>Pickup State</th>
            <th>Pickup City</th>
            <th>Pickup Pincode</th>
            <th>Upload Type</th>
            <th>Order Status</th>
          </tr>
      </thead>
      <tbody>
        <!--  -->

        <?php
            $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status`='Pending'";
            $singleproqueryr=mysqli_query($conn,$singleproquery);
            while($row = mysqli_fetch_assoc($singleproqueryr))
            {
        ?>
        <tr class="record">
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
<!-- /.row -->




<!-- /#page-wrapper -->

<?php
    include "Layout_Footer_Table.php";
?>
