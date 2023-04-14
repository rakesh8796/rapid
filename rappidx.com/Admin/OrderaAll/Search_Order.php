<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "../config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');

// echo $param;
?>


<?php
if(empty($param))
{
  // echo "<center><h3>Waiting For PinCode Input</h3></center><hr style='border-bottom:2px solid gold'>";
  exit();
}

if($cateis=="orderno"){
    $singleproquery1 = "SELECT * FROM `spark_single_order` WHERE `orderno` LIKE '$param%' ORDER BY `Single_Order_Id` DESC LIMIT 10";
}elseif ($cateis=="awbno") {
    $singleproquery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number` LIKE '$param%' ORDER BY `Single_Order_Id` DESC LIMIT 10";
}


$singleproqueryr=mysqli_query($conn,$singleproquery1);
if(empty(mysqli_num_rows($singleproqueryr))){
  
}else{

?>




<!-- <div class="row panel panel-success filterable"> -->
<div class="row panel-success filterable">
&ensp;
<br>
<div class="table-responsive">
<table class="table table-bordered border-primary table-responsive">
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
<tbody>
<!--  -->
<?php 
if($cateis=="orderno"){
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `orderno` LIKE '$param%' ORDER BY `Single_Order_Id` DESC LIMIT 10";
}elseif ($cateis=="awbno") {
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number` LIKE '$param%' ORDER BY `Single_Order_Id` DESC LIMIT 10";
}
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
<tr>
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
</tbody>
</table>
</div>
&ensp;
<br>
</div>






<?php
}
?>
