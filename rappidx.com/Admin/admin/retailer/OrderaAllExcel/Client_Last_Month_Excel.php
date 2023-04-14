<?php
session_start();
// error_reporting(1);
extract($_REQUEST);
include "../config/dbcon.php";

if(empty($_SESSION['username']))
{
	echo "<script>window.location.assign('index.php')</script> ";
}
$username = $_SESSION['username'];
$user_id = $_SESSION['useridis'];

    $userid = $_SESSION['username'];

$headerquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
$headerfdata = mysqli_query($conn,$headerquery);
$hresult = mysqli_fetch_assoc($headerfdata);
// $hresult['Company_Name'];



// include '../Header_Excel.php';
// error_reporting(1);
$filename=$username."Last Month Order";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
<thead>
<tr>
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
  <th>Length</th>
  <th>Width</th>
  <th>Height</th>
  <th>Weight</th>
  <th>Product Amt</th>
  <th>COD Amt</th>
  <th>Payment Mode</th>
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
    <th>Order Remark</th>
</tr>

</thead>
<!--  -->
    <!--  -->

<?php
$stdate = date("d-m-Y");
// Current Month
// $currentmonthcheck = date('Y-m-d',strtotime($stdate));
$lastmonthcheck = date('Y-m-d',strtotime("-1 Month"));


    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
    // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `Rec_Time_Stamp`>now() - INTERVAL 1 month ORDER BY `Single_Order_Id` DESC";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {

// Status Change
if($row['order_status_show']=="Undelivered ??? Multiple Attempt"){
    $row['order_status_show'] = "Undelivered";
}
if($row['order_status_show']=="InTransit"){
    $row['order_status_show'] = "In Transit";
}
if($row['order_status_show']=="RTO InTransit"){
    $row['order_status_show'] = "RTO In Transit";
}
if($row['order_status_show']=="Dispatched" OR $row['order_status_show']=="OFD"){
    $row['order_status_show'] = "Out For Delivery";
}
if($row['order_status_show']=="Out For WHHandover" OR $row['order_status_show']=="Local RTO Intransit" OR $row['order_status_show']=="RTODispute" OR $row['order_status_show']=="RTO" OR $row['order_status_show']=="RTU" OR $row['order_status_show']=="STD" OR $row['order_status_show']=="Return Undelivered"){
    $row['order_status_show'] = "RTO In Transit";
}
if($row['order_status_show']=="RAD" OR $row['order_status_show']=="ODA" OR $row['order_status_show']=="Shipped"  OR $row['order_status_show']=="ODA (Out Of Delivery Area)"){
    $row['order_status_show'] = "In Transit";
}
if($row['order_status_show']=="Forward Shipment Lost"){
    $row['order_status_show'] = "Lost";
}
// Status Change
// Pickup Date
if($row['pickupdate'] == "0000-00-00"){
    $row['pickupdate'] = $row['Rec_Time_Date'];
}elseif(empty($row['pickupdate'])){
    $row['pickupdate'] = $row['Rec_Time_Date'];    
}
// Pickup Date
// Delhivery
if($row['awb_gen_by']=="Delhivery2"){
    $row['awb_gen_by'] = "Delhivery Bulky";
}
// Delhivery
// Main Status Change
if(empty($row['order_status_show'])){
    $row['order_status_show'] = $row['order_status1'];
}
// Main Status Change
// Remart Status Change
if(empty($row['order_status1'])){
    $row['order_status1'] = $row['order_status_show'];
}
// Remart Status Change
// Attempt Count
if(empty($row['attemptcount'])){
    $row['attemptcount'] = 0;
    if($row['order_status_show']=="Delivered" OR $row['order_status_show']=="RTO Delivered"){
        $row['attemptcount'] = 1;
    }
}
// Attempt Count
// Order Cancel Or Not
if($row['order_cancel']==1){
    // $row['order_status_show'] = "Canceled";    
    continue;
}
// Order Cancel Or Not

?>
<tr class="record">
    <td><?php echo $row['orderno']; ?></td>
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
    <td><?php echo $row['Order_Type']; ?></td>
    <td><?php echo $row['Rec_Time_Date']; ?></td>

    <td><?php echo $row['pickup_id']; ?></td>
    <td><?php echo $row['pickup_name']; ?></td>
    <td><?php echo $row['pickup_mobile']; ?></td>
    <td><?php echo $row['pickup_address']; ?></td>
    <td><?php echo $row['pickup_state']; ?></td>
    <td><?php echo $row['pickup_city']; ?></td>
    <td><?php echo $row['pickup_pincode']; ?></td>
    <td><?php echo $row['uploadtype']; ?> Order</td>
    <td><?php echo $row['order_status_show']; ?></td>
    <td><?php echo $row['order_status1']; ?></td>
</tr>
<?php
    }
?>
<!--  -->
<!--  -->
</table>
