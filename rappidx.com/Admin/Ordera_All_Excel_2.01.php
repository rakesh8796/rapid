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
    <th>Length</th>
    <th>Width</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Total Amt</th>
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
  <!-- MIS Fields -->
      <th>    Courier Remark  </th>
      <th>    PickUp Date </th>
      <th>    Last Status date    </th>
      <th>    Delivery Date   </th>
      <th>    FirstScanDate   </th>
      <th>    FirstAttemptDate    </th>
      <th>    EDD </th>
      <th>    Order Ageing    </th>
      <th>    AttemptCount    </th>
      <th>    CourierName </th>
      <th>    RTO Date    </th>
      <th>    RTOReason   </th>
      <th>    ZoneName    </th>
      <th>    Last OFD Date   </th>
      <th>    NDR instructions </th>
  <!-- MIS Fields -->
</tr>

</thead>
<!--  -->
<!--  -->
<?php
$stdate = date("d-m-Y");
$currentmonthcheck = date('Y-m-d',strtotime($stdate));

    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!='' AND (`User_Id`!='' AND `User_Id`!=0) AND  DAY(`Rec_Time_Date`) = DAY('$currentmonthcheck') AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      // MIS
        $awbnoisa = $row['Awb_Number'];
        $misaddfield = "SELECT * FROM `spark_mis_report` WHERE `awbno`='$awbnoisa' ORDER BY `mis_id` DESC";
        $misaddfieldr = mysqli_query($conn,$misaddfield);
        $misaddfieldres = mysqli_fetch_assoc($misaddfieldr);
      // MIS
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
<!-- MIS Field -->
    <td><?= $misaddfieldres['courierremark'] ?></td>
    <td><?php
    if($misaddfieldres['pickupdate'] != "0000-00-00"){
        echo $misaddfieldres['pickupdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['laststatusdate'] != "0000-00-00"){
        echo $misaddfieldres['laststatusdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['deliverydate'] != "0000-00-00"){
        echo $misaddfieldres['deliverydate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstscandate'] != "0000-00-00"){
        echo $misaddfieldres['firstscandate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstattemptdate'] != "0000-00-00"){
        echo $misaddfieldres['firstattemptdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['edd'] != "0000-00-00"){
        echo $misaddfieldres['edd'];
    }
    ?></td>
    <td><?= $misaddfieldres['orderageing'] ?></td>
    <td><?= $misaddfieldres['attemptcount'] ?></td>
    <td><?= $misaddfieldres['couriername'] ?></td>
    <td><?php
    if($misaddfieldres['rtodate'] != "0000-00-00"){
        echo $misaddfieldres['rtodate'];
    }
    ?></td>
    <td><?= $misaddfieldres['rtoreason'] ?></td>
    <td><?= $misaddfieldres['zonename'] ?></td>
    <td><?php
    if($misaddfieldres['lastofddate'] != "0000-00-00"){
        echo $misaddfieldres['lastofddate'];
    }
    ?></td>
    <td><?= $misaddfieldres['ndrinstructions'] ?></td>
<!-- MIS Field -->
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
    <th>Length</th>
    <th>Width</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Total Amt</th>
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
  <!-- MIS Fields -->
      <th>    Courier Remark  </th>
      <th>    PickUp Date </th>
      <th>    Last Status date    </th>
      <th>    Delivery Date   </th>
      <th>    FirstScanDate   </th>
      <th>    FirstAttemptDate    </th>
      <th>    EDD </th>
      <th>    Order Ageing    </th>
      <th>    AttemptCount    </th>
      <th>    CourierName </th>
      <th>    RTO Date    </th>
      <th>    RTOReason   </th>
      <th>    ZoneName    </th>
      <th>    Last OFD Date   </th>
      <th>    NDR instructions </th>
  <!-- MIS Fields -->
</tr>

</thead>
<!--  -->
<!--  -->
<?php
$stdate = date("d-m-Y");
$currentmonthcheck = date('Y-m-d',strtotime($stdate));

    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!='' AND (`User_Id`!='' AND `User_Id`!=0) AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck') ORDER BY `Single_Order_Id` DESC";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      // MIS
        $awbnoisa = $row['Awb_Number'];
        $misaddfield = "SELECT * FROM `spark_mis_report` WHERE `awbno`='$awbnoisa' ORDER BY `mis_id` DESC";
        $misaddfieldr = mysqli_query($conn,$misaddfield);
        $misaddfieldres = mysqli_fetch_assoc($misaddfieldr);
      // MIS
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
<!-- MIS Field -->
    <td><?= $misaddfieldres['courierremark'] ?></td>
    <td><?php
    if($misaddfieldres['pickupdate'] != "0000-00-00"){
        echo $misaddfieldres['pickupdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['laststatusdate'] != "0000-00-00"){
        echo $misaddfieldres['laststatusdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['deliverydate'] != "0000-00-00"){
        echo $misaddfieldres['deliverydate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstscandate'] != "0000-00-00"){
        echo $misaddfieldres['firstscandate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstattemptdate'] != "0000-00-00"){
        echo $misaddfieldres['firstattemptdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['edd'] != "0000-00-00"){
        echo $misaddfieldres['edd'];
    }
    ?></td>
    <td><?= $misaddfieldres['orderageing'] ?></td>
    <td><?= $misaddfieldres['attemptcount'] ?></td>
    <td><?= $misaddfieldres['couriername'] ?></td>
    <td><?php
    if($misaddfieldres['rtodate'] != "0000-00-00"){
        echo $misaddfieldres['rtodate'];
    }
    ?></td>
    <td><?= $misaddfieldres['rtoreason'] ?></td>
    <td><?= $misaddfieldres['zonename'] ?></td>
    <td><?php
    if($misaddfieldres['lastofddate'] != "0000-00-00"){
        echo $misaddfieldres['lastofddate'];
    }
    ?></td>
    <td><?= $misaddfieldres['ndrinstructions'] ?></td>
<!-- MIS Field -->
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
    <th>Length</th>
    <th>Width</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Total Amt</th>
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
  <!-- MIS Fields -->
      <th>    Courier Remark  </th>
      <th>    PickUp Date </th>
      <th>    Last Status date    </th>
      <th>    Delivery Date   </th>
      <th>    FirstScanDate   </th>
      <th>    FirstAttemptDate    </th>
      <th>    EDD </th>
      <th>    Order Ageing    </th>
      <th>    AttemptCount    </th>
      <th>    CourierName </th>
      <th>    RTO Date    </th>
      <th>    RTOReason   </th>
      <th>    ZoneName    </th>
      <th>    Last OFD Date   </th>
      <th>    NDR instructions </th>
  <!-- MIS Fields -->
</tr>

</thead>
<!--  -->
<!--  -->
<?php
$stdate = date("d-m-Y");
$lastmonthcheck = date('Y-m-d',strtotime("-1 Month"));

    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!='' AND (`User_Id`!='' AND `User_Id`!=0) AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      // MIS
        $awbnoisa = $row['Awb_Number'];
        $misaddfield = "SELECT * FROM `spark_mis_report` WHERE `awbno`='$awbnoisa' ORDER BY `mis_id` DESC";
        $misaddfieldr = mysqli_query($conn,$misaddfield);
        $misaddfieldres = mysqli_fetch_assoc($misaddfieldr);
      // MIS
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
<!-- MIS Field -->
    <td><?= $misaddfieldres['courierremark'] ?></td>
    <td><?php
    if($misaddfieldres['pickupdate'] != "0000-00-00"){
        echo $misaddfieldres['pickupdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['laststatusdate'] != "0000-00-00"){
        echo $misaddfieldres['laststatusdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['deliverydate'] != "0000-00-00"){
        echo $misaddfieldres['deliverydate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstscandate'] != "0000-00-00"){
        echo $misaddfieldres['firstscandate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstattemptdate'] != "0000-00-00"){
        echo $misaddfieldres['firstattemptdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['edd'] != "0000-00-00"){
        echo $misaddfieldres['edd'];
    }
    ?></td>
    <td><?= $misaddfieldres['orderageing'] ?></td>
    <td><?= $misaddfieldres['attemptcount'] ?></td>
    <td><?= $misaddfieldres['couriername'] ?></td>
    <td><?php
    if($misaddfieldres['rtodate'] != "0000-00-00"){
        echo $misaddfieldres['rtodate'];
    }
    ?></td>
    <td><?= $misaddfieldres['rtoreason'] ?></td>
    <td><?= $misaddfieldres['zonename'] ?></td>
    <td><?php
    if($misaddfieldres['lastofddate'] != "0000-00-00"){
        echo $misaddfieldres['lastofddate'];
    }
    ?></td>
    <td><?= $misaddfieldres['ndrinstructions'] ?></td>
<!-- MIS Field -->
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
    <th>Length</th>
    <th>Width</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Total Amt</th>
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
  <!-- MIS Fields -->
      <th>    Courier Remark  </th>
      <th>    PickUp Date </th>
      <th>    Last Status date    </th>
      <th>    Delivery Date   </th>
      <th>    FirstScanDate   </th>
      <th>    FirstAttemptDate    </th>
      <th>    EDD </th>
      <th>    Order Ageing    </th>
      <th>    AttemptCount    </th>
      <th>    CourierName </th>
      <th>    RTO Date    </th>
      <th>    RTOReason   </th>
      <th>    ZoneName    </th>
      <th>    Last OFD Date   </th>
      <th>    NDR instructions </th>
  <!-- MIS Fields -->
</tr>

</thead>
<!--  -->
<!--  -->
<?php

if(!empty($startdatefrom) AND !empty($enddatefrom)){
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!='' AND (`User_Id`!='' AND `User_Id`!=0) AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!='' AND (`User_Id`!='' AND `User_Id`!=0)";
}
    // $singleproquery = "SELECT * FROM `spark_single_order`";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      // MIS
        $awbnoisa = $row['Awb_Number'];
        $misaddfield = "SELECT * FROM `spark_mis_report` WHERE `awbno`='$awbnoisa' ORDER BY `mis_id` DESC";
        $misaddfieldr = mysqli_query($conn,$misaddfield);
        $misaddfieldres = mysqli_fetch_assoc($misaddfieldr);
      // MIS
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
<!-- MIS Field -->
    <td><?= $misaddfieldres['courierremark'] ?></td>
    <td><?php
    if($misaddfieldres['pickupdate'] != "0000-00-00"){
        echo $misaddfieldres['pickupdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['laststatusdate'] != "0000-00-00"){
        echo $misaddfieldres['laststatusdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['deliverydate'] != "0000-00-00"){
        echo $misaddfieldres['deliverydate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstscandate'] != "0000-00-00"){
        echo $misaddfieldres['firstscandate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['firstattemptdate'] != "0000-00-00"){
        echo $misaddfieldres['firstattemptdate'];
    }
    ?></td>
    <td><?php
    if($misaddfieldres['edd'] != "0000-00-00"){
        echo $misaddfieldres['edd'];
    }
    ?></td>
    <td><?= $misaddfieldres['orderageing'] ?></td>
    <td><?= $misaddfieldres['attemptcount'] ?></td>
    <td><?= $misaddfieldres['couriername'] ?></td>
    <td><?php
    if($misaddfieldres['rtodate'] != "0000-00-00"){
        echo $misaddfieldres['rtodate'];
    }
    ?></td>
    <td><?= $misaddfieldres['rtoreason'] ?></td>
    <td><?= $misaddfieldres['zonename'] ?></td>
    <td><?php
    if($misaddfieldres['lastofddate'] != "0000-00-00"){
        echo $misaddfieldres['lastofddate'];
    }
    ?></td>
    <td><?= $misaddfieldres['ndrinstructions'] ?></td>
<!-- MIS Field -->
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
