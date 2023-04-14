<?php
    include '../Header_Excel.php';

$filename="Delivered_Order";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
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
        <th>Length</th>
        <th>Width</th>
        <th>Height</th>
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
// $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' OR `order_status_show`='RTO Delivered'";
$singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered'";
$singleproqueryr=mysqli_query($conn,$singleproquery);
while($row = mysqli_fetch_assoc($singleproqueryr))
{
  // echo $row['order_status_show'];
  // if($row['order_status_show']!='Delivered' OR $row['order_status_show']!='RTO Delivered'){
  //   continue;
  // }
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
<td><?php echo $row['Length']; ?></td>
<td><?php echo $row['Width']; ?></td>
<td><?php echo $row['Height']; ?></td>
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
<td><?php echo $row['order_status_show']; ?></td>
</tr>
<?php
}
?>
<!--  -->
  </tbody>
</table>
