<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

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


//     include 'Header_Excel.php';
// error_reporting(1);
$filename=$username."BulkOrdersNotPlace";
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
  <th>Total Amt</th>
  <th>COD Amt</th>
  <th>Payment Mode</th>
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
  <th>Error Msg</th>
</tr>

</thead>
<!--  -->
<!--  -->
<?php
    $tdate = date("Y-m-d");
    // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `uploadtype`='Excel' AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
    // $singleproqueryr=mysqli_query($conn,$singleproquery);
    // while($row = mysqli_fetch_assoc($singleproqueryr)){





$useruinqueidno = $_SESSION['useruinqueidno'];
$user_id = $_SESSION['useridis'];



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
$singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `Awb_Number` IS NULL AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
//
// $singleproquery = "SELECT * FROM `spark_single_order` ORDER BY `Single_Order_Id` DESC";
$singleproqueryr=mysqli_query($conn,$singleproquery);
while($row = mysqli_fetch_assoc($singleproqueryr))
{




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
    <td><?php echo $row['additionaltype']; ?></td>
    <td><?php echo $row['Rec_Time_Date']; ?></td>

    <td><?php echo $row['pickup_id']; ?></td>
    <td><?php echo $row['pickup_name']; ?></td>
    <td><?php echo $row['pickup_mobile']; ?></td>
    <td><?php echo $row['pickup_address']; ?></td>
    <td><?php echo $row['pickup_state']; ?></td>
    <td><?php echo $row['pickup_city']; ?></td>
    <td><?php echo $row['pickup_pincode']; ?></td>
    <td><?php echo $row['uploadtype']; ?> Order</td>
    <td><?php echo $row['showerrors']; ?></td>
</tr>
<?php
    }
?>
<!--  -->
<!--  -->
</table>
