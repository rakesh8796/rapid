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
error_reporting(1);
$tdate = date("d-m-Y");
$ydate = date('d-m-Y',strtotime("-1 Day"));
$tmonth = date("M");
$lmonth = date('M',strtotime("-1 month"));
$filename = "Manifest_Order";
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
    <th>Length</th>
    <th>Width</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Product Amt</th>
    <th>COD Amt</th>
    <th>Payment Mode</th>

    <th>Upload Date</th>
    <th>Pickup Date</th>
    <th>Delivered Date</th>
    <th>RTD Date</th>

    <th>Pickup Id</th>
    <th>Pickup Name</th>
    <th>Pickup Mobile</th>
    <th>Pickup Address</th>
    <th>Pickup State</th>
    <th>Pickup City</th>
    <th>Pickup Pincode</th>
    <th>Upload Type</th>

    <th>Courier By</th>
    <th>Order Status</th>
    <th>Order Remark</th>
</tr>

</thead>
<!--  -->
<!--  -->
<?php
// Current Month
  $crtmonth = date('Y-m-d',strtotime("-1 Day"));
?>
<!-- Process -->
<?php
// $singleproquery = "SELECT * FROM `spark_single_order` WHERE
// `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND
// `Rec_Time_Date` BETWEEN '$crtmonth' AND '$crtmonth'";

$singleproquery = "SELECT * FROM `spark_single_order` WHERE
`User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND
(`order_status_show`='Manifested' OR `order_status_show`='Upload' OR `order_status_show`='Pending' OR `order_status_show`='Not Picked')";

    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {

// Delhivery
if($row['awb_gen_by']=="Delhivery2"){
    $row['awb_gen_by'] = "Delhivery Bulky";
}
// Delhivery

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
if($row['order_status_show']=="Dispatched"){
    $row['order_status_show'] = "OFD";
}
// Status Change

?>
<tr>
<?php
    $User_Id = $row['User_Id'];
    $uploaduser = "SELECT `useruinqueidno`,`commercialstype`,`Company_Name` FROM `asitfa_user` WHERE `User_Id`='$User_Id'";
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
    <td><?php echo $row['Length']; ?></td>
    <td><?php echo $row['Width']; ?></td>
    <td><?php echo $row['Height']; ?></td>
    <td><?php echo $row['Actual_Weight']; ?></td>
    <td><?php echo $row['Total_Amount']; ?></td>
    <td><?php echo $row['Cod_Amount']; ?></td>
    <td><?php echo $row['Order_Type']; ?></td>

    <td><?php echo $row['Rec_Time_Date']; ?></td>
    <td><?php
        if($row['pickupdate'] == "1970-01-01"){
            echo $row['Rec_Time_Date'];
        }elseif($row['pickupdate'] == "0000-00-00"){
            echo $row['Rec_Time_Date'];
        }elseif(is_null($row['pickupdate'])){
            echo $row['Rec_Time_Date'];
        }else{
            echo $row['pickupdate'];  
        }
    ?></td>
    <td><?php if($row['delivereddate'] != "0000-00-00"){   echo $row['delivereddate'];  }   ?></td>
    <td><?php  if($row['rtodate'] != "0000-00-00"){  echo $row['rtodate'];    }    ?></td>

    <td><?php echo $row['pickup_id']; ?></td>
    <td><?php echo $row['pickup_name']; ?></td>
    <td><?php echo $row['pickup_mobile']; ?></td>
    <td><?php echo $row['pickup_address']; ?></td>
    <td><?php echo $row['pickup_state']; ?></td>
    <td><?php echo $row['pickup_city']; ?></td>
    <td><?php echo $row['pickup_pincode']; ?></td>
    <td><?php echo $row['uploadtype']; ?> Order</td>

    <td><?php echo $row['awb_gen_by']; ?></td>
    <td><?php echo $row['order_status_show']; ?></td>
    <td><?php echo $row['order_status1']; ?></td>
</tr>
<?php
}
?>
<!-- Process -->
</table>
<?php
// Current Month End
?>
