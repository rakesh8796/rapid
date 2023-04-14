<?php
include 'Header_Excel.php';

$tdate = date("d-m-Y");
$tmonth = date("M");
$lmonth = date('M',strtotime("-1 month"));

?>




<?php
if($OrderManageBy=="Today"){
// Today Orders Start
$filename = $tdate."_Today Orders";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
<thead>
<tr>
    <th>Client ID</th>
    <th>User Name</th>
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
<!--  -->
<!--  -->
<?php 
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Rec_Time_Stamp`>now() - INTERVAL 1 day";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
<tr class="record">
<?php 
    $User_Id = $row['User_Id'];
    $uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$User_Id'";
    $uploaduserr=mysqli_query($conn,$uploaduser);
    $uploaduserres = mysqli_fetch_assoc($uploaduserr);
?>
    <td><?php echo $uploaduserres['useruinqueidno']."(".$uploaduserres['commercialstype'].")"; ?></td>
    <td><?php echo $uploaduserres['Company_Name']; ?></td>
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
<!--  -->
</table>
<?php
// Today Orders End
}elseif($OrderManageBy=="Current"){
// Current Month Strat
$filename = $tmonth."_Current Month Order";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
<thead>
<tr>
    <th>Client ID</th>
    <th>User Name</th>
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

    <th>Pickup Id</th>
    <th>Pickup Name</th>
    <th>Pickup Mobile</th>
    <th>Pickup Address</th>
    <th>Pickup State</th>
    <th>Pickup City</th>
    <th>Pickup Pincode</th>
    <th>Upload Type</th>
</tr>

</thead>
<!--  -->
<!--  -->
<?php 
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Rec_Time_Stamp`>now() - INTERVAL 30 day ORDER BY `Single_Order_Id` DESC";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
<tr class="record">
<?php 
    $User_Id = $row['User_Id'];
    $uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$User_Id'";
    $uploaduserr=mysqli_query($conn,$uploaduser);
    $uploaduserres = mysqli_fetch_assoc($uploaduserr);
?>
    <td><?php echo $uploaduserres['useruinqueidno']."(".$uploaduserres['commercialstype'].")"; ?></td>
    <td><?php echo $uploaduserres['Company_Name']; ?></td>
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
</tr>
<?php
    }   
?>
<!--  -->
<!--  -->
</table>
<?php
// Current Month End
}elseif($OrderManageBy=="Last"){
// Last Month Start
$filename = $lmonth."_Last Month";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
<thead>
<tr>
    <th>Client ID</th>
    <th>User Name</th>
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
<!--  -->
<!--  -->
<?php 
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Rec_Time_Stamp`>now() - INTERVAL 1 month";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
<tr class="record">
<?php 
    $User_Id = $row['User_Id'];
    $uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$User_Id'";
    $uploaduserr=mysqli_query($conn,$uploaduser);
    $uploaduserres = mysqli_fetch_assoc($uploaduserr);
?>
    <td><?php echo $uploaduserres['useruinqueidno']."(".$uploaduserres['commercialstype'].")"; ?></td>
    <td><?php echo $uploaduserres['Company_Name']; ?></td>
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
<!--  -->
</table>
<?php
// Last Month End
}elseif($OrderManageBy=="Custom"){
// Custom Orders Start
header("Content-type: application/octet-stream");
if(!empty($startdatefrom) AND !empty($enddatefrom)){
    $filename = $startdatefrom."_".$enddatefrom."_All Orders";
}else{    $filename = "All Orders"; }
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
<thead>
<tr>
    <th>Client ID</th>
    <th>User Name</th>
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
<!--  -->
<!--  -->
<?php 

if(!empty($startdatefrom) AND !empty($enddatefrom)){
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $singleproquery = "SELECT * FROM `spark_single_order`";
}
    // $singleproquery = "SELECT * FROM `spark_single_order`";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
<tr class="record">
<?php 
$User_Id = $row['User_Id'];
    $uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$User_Id'";
    $uploaduserr=mysqli_query($conn,$uploaduser);
    $uploaduserres = mysqli_fetch_assoc($uploaduserr);
?>
    <td><?php echo $uploaduserres['useruinqueidno']."(".$uploaduserres['commercialstype'].")"; ?></td>
    <td><?php echo $uploaduserres['Company_Name']; ?></td>
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
<!--  -->
</table>
<?php
// Custom Orders End
}
?>