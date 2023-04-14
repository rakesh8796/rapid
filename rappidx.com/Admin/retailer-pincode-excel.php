<?php
  include "Layout_Header-retailer.php";
?>


<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

// if(empty($_SESSION['username'])){
// 	echo "<script>window.location.assign('index.php')</script> ";
// }
$username = $_SESSION['username'];
$user_id = $_SESSION['useridis'];

    $userid = $_SESSION['username'];

$headerquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
$headerfdata = mysqli_query($conn,$headerquery);
$hresult = mysqli_fetch_assoc($headerfdata);
// $hresult['Company_Name'];


    // include 'Header_Excel.php';

$filename="ServiceablePincode";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-List.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
<thead>
<tr>
    <th>Pincode</th>
    <th>Area Code</th>
    <th>Process Code</th>
    <th>Hub Zone Name</th>
    <th>Hub City</th>
    <th>Hub State</th>
    <th>COD</th>
    <th>Prepaid</th>
    <th>Reverse PickUp Service</th>
</tr>

</thead>
<!--  -->
<!--  -->
<?php 
$singleproquery = "SELECT * FROM `serviceable_pincodes` ORDER BY `pincode` ASC";
$singleproqueryr=mysqli_query($conn,$singleproquery);
while($row = mysqli_fetch_assoc($singleproqueryr))
{
?>
<tr class="record">
    <td><?= $row['pincode'] ?></td>
    <td><?= $row['areacode'] ?></td>
    <td><?= $row['processcode'] ?></td>
    <td><?= $row['hubzonename'] ?></td>
    <td><?= $row['hubcity'] ?></td>
    <td><?= $row['hubstate'] ?></td>
    <td><?= $row['cod'] ?></td>
    <td><?= $row['prepaid'] ?></td>
    <td><?= $row['hasreversepickupservice'] ?></td>
</tr>
<?php
}   
?>
<!--  -->
<!--  -->
</table>