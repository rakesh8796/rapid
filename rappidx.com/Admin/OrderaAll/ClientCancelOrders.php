<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "../config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');

if(empty($_SESSION['usertype']))
{
echo "<script>window.location.assign('index.php')</script> ";
}

$username = $_SESSION['username'];
$user_id = $_SESSION['useridis'];
$user_type = $_SESSION['usertype'];
$paneltitle = $_SESSION['paneltitle'];

// $result = $db->prepare("SELECT * FROM asitfa_user where User_id = '$user_id'");
// $result->execute();
// for($i=0; $row = $result->fetch(); $i++){

// $userid = $row['User_Email'];

$username = $_SESSION['username'];

$headerquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
$headerfdata = mysqli_query($conn,$headerquery);
$hresult = mysqli_fetch_assoc($headerfdata);
// $hresult['Company_Name'];

?>

<head>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <style media="screen">
.success {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 5s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: relative;

}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;
  }
}


</style>
</head>




<?php
// session_start();
// error_reporting(1);
// extract($_REQUEST);
// include "../config/dbcon.php";
// date_default_timezone_set('Asia/Calcutta');
// // echo $param;
?>

<?php
    // include "../Layout_Header_Folder.php";
?>


<!-- /row -->
<div class="col-md-12">
<div class="col-md-12">
<div class="white-box">
<!-- <h3 class="box-title m-b-0">Hospital Payments Details</h3>
<hr> -->
<div class="table-responsive">

<!-- Excel File -->
<div class="col-md-12 text-left">
      <div class="col-md-3 col-sm-3"><span style="font-size:18px"><u><b>Cancel Orders</b></u></span></div>
      <div class="col-md-3 col-sm-3"></div>
      <div class="col-md-3 col-sm-3"></div>
      <div class="col-md-3 col-sm-3">
          <a href="OrderaAllExcel/Client_Cancel_Orders.php" class="btn btn-default" style="border-radius:20px;background:#5A5A5A;color:#fff;width:90%">Download</a>
      </div>
</div><br>&ensp;
<!-- Excel File -->

  <table id="myTable" class="table table-striped">
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
            <th>Cancel Reason</th>
          </tr>
      </thead>
      <tbody>
<!--  -->
<?php
    // $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' OR `order_status_show`='RTO Delivered'";
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`='' OR `order_cancel`='1'";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      // echo $row['order_status_show'];
      // if($row['order_status_show']!='Delivered' OR $row['order_status_show']!='RTO Delivered'){
      //   continue;
      // }
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
    <td><?php echo $row['order_status_show']; ?></td>
    <td><?php echo $row['showerrors']; ?></td>
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




<?php
    include "../Layout_Footer_Table.php";
?>
