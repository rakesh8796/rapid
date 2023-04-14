<?php
session_start();
// error_reporting(1);
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


// include "Header_Excel.php";
if(empty($clientname)){
    $filename="All Clients";
}else{
    $allclientquery1 = "SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$clientname' ORDER BY `User_Id` DESC";
    $allclientqueryr1 = mysqli_query($conn,$allclientquery1);
    $row1 = mysqli_fetch_assoc($allclientqueryr1);
    $filename = $row1['Brand'];
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
<thead>
<tr>
<th>Join Date</th>
<th>User_Email</th>
<th>Password</th>

<th>Company Name</th>
<th>Website</th>
<th>Brand</th>
<th>Email</th>
<th>Pan No</th>
<th>Tan No</th>
<th>GST No</th>

<th>Reg Address</th>
<th>Reg City</th>
<th>Reg State</th>
<th>Reg Pin</th>
<th>Reg Mobile</th>
<th>Reg Phone</th>

<th>Com Address</th>
<th>Com City</th>
<th>Com State</th>
<th>Com Pin</th>
<th>Com Mobile</th>
<th>Com Phone</th>

<th>Bank Name</th>
<th>Bank AC Number</th>
<th>Bank Branch</th>
<th>IFSC CODE</th>
<th>ACCOUNT TYPE</th>

<th>PRODUCT CATEGORY</th>
<th>SERVICE TYPE</th>
<th>PICKUP POINT</th>
<th>COD REMITTANCE TYPE</th>
<th>BILLING TYPE</th>
<th>BILLING CYCLE</th>
<th>REMITTANCE</th>
<th>Commercials Type</th>

<th>Min A</th>
<th>Min B</th>
<th>Min C</th>
<th>Min D</th>
<th>Min E</th>
<th>Add A</th>
<th>Add B</th>
<th>Add C</th>
<th>Add D</th>
<th>Add E</th>
<th>RTO A</th>
<th>RTO B</th>
<th>RTO C</th>
<th>RTO D</th>
<th>RTO E</th>
<th>FSC</th>
<th>COD</th>
<th>Shipment Liabilty</th>
<th>GST</th>
<th>Special Note</th>

<th>Min A1</th>
<th>Min B1</th>
<th>Min C1</th>
<th>Min D1</th>
<th>Min E1</th>
<th>Add A1</th>
<th>Add B1</th>
<th>Add C1</th>
<th>Add D1</th>
<th>Add E1</th>
<th>RTO A1</th>
<th>RTO B1</th>
<th>RTO C1</th>
<th>RTO D1</th>
<th>RTO E1</th>
<th>FSC1</th>
<th>COD1</th>
<th>Shipment Liabilty1</th>
<th>GST1</th>
<th>Special Note1</th>

<th>Min A2</th>
<th>Min B2</th>
<th>Min C2</th>
<th>Min D2</th>
<th>Min E2</th>
<th>Add A2</th>
<th>Add B2</th>
<th>Add C2</th>
<th>Add D2</th>
<th>Add E2</th>
<th>RTO A2</th>
<th>RTO B2</th>
<th>RTO C2</th>
<th>RTO D2</th>
<th>RTO E2</th>
<th>FSC2</th>
<th>COD2</th>
<th>Shipment Liabilty2</th>
<th>GST2</th>
<th>Special Note2</th>

<th>Min A5</th>
<th>Min B5</th>
<th>Min C5</th>
<th>Min D5</th>
<th>Min E5</th>
<th>Add A5</th>
<th>Add B5</th>
<th>Add C5</th>
<th>Add D5</th>
<th>Add E5</th>
<th>RTO A5</th>
<th>RTO B5</th>
<th>RTO C5</th>
<th>RTO D5</th>
<th>RTO E5</th>
<th>FSC5</th>
<th>COD5</th>
<th>Shipment Liabilty5</th>
<th>GST5</th>
<th>Special Note5</th>

<th>Min A10</th>
<th>Min B10</th>
<th>Min C10</th>
<th>Min D10</th>
<th>Min E10</th>
<th>Add A10</th>
<th>Add B10</th>
<th>Add C10</th>
<th>Add D10</th>
<th>Add E10</th>
<th>RTO A10</th>
<th>RTO B10</th>
<th>RTO C10</th>
<th>RTO D10</th>
<th>RTO E10</th>
<th>FSC10</th>
<th>COD10</th>
<th>Shipment Liabilty10</th>
<th>GST10</th>
<th>Special Note10</th>


<th>CLIENT AUTHORIZED SIGNATORY</th>
<th>CLIENT DESIGNATION</th>
<th>CLIENT EMAIL</th>
<th>CLIENT MOBILE</th>

<th>CLIENTS FINANCE POC</th>
<th>POC DESIGNATION</th>
<th>POC EMAIL</th>
<th>POC MOBILE</th>

<th>CLIENTS OPERATION POC</th>
<th>OPERATION POC DESIGNATION</th>
<th>OPERATION POC EMAIL</th>
<th>OPERATION POC MOBILE</th>

<th>RAPPIDX BD NAME</th>
<th>BD NAME DESIGNATION</th>
<th>BD NAME EMAIL</th>
<th>BD NAME MOBILE</th>
 

<th>ADDED BY</th>
<th>ACCOUNT STATUS</th>
<th>CANCEL REASON</th>
</tr>
</thead>
<!--  -->
<!--  -->
<?php 
$tdate = date("Y-m-d");
if(empty($clientname)){
    $allclientquery = "SELECT * FROM `asitfa_user` WHERE `usertype`='client' ORDER BY `User_Id` DESC";
}else{
    $allclientquery = "SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$clientname' ORDER BY `User_Id` DESC";
}
$allclientqueryr=mysqli_query($conn,$allclientquery);
while($row = mysqli_fetch_assoc($allclientqueryr))
{
$permisionid = $row['User_Id'];
$permissions = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$permisionid'";
$permissionsr=mysqli_query($conn,$permissions);
$pres = mysqli_fetch_assoc($permissionsr);

$row['Active'] = $row['Active'];
if($row['Active']=="1"){    $row['Active'] = "Active";    }
if($row['Active']=="0"){    $row['Active'] = "Deactive";  }

?>
<tr class="record">
<td><?php echo $row['Rec_Time_Stamp']; ?></td>
<td><?= $row['User_Email'] ?></td>
<td><?= $row['User_Password_show'] ?></td>

<td><?= $row['Company_Name'] ?></td>
<td><?= $row['Website'] ?></td>
<td><?= $row['Brand'] ?></td>
<td><?= $row['Email'] ?></td>
<td><?= $row['Pan'] ?></td>
<td><?= $row['Tan'] ?></td>
<td><?= $row['GST_No'] ?></td>

<td><?= $row['Reg_Address'] ?></td>
<td><?= $row['Reg_City'] ?></td>
<td><?= $row['Reg_State'] ?></td>
<td><?= $row['Reg_Pin'] ?></td>
<td><?= $row['Reg_Mobile'] ?></td>
<td><?= $row['Reg_Landline'] ?></td>

<td><?= $row['Com_Address'] ?></td>
<td><?= $row['Com_City'] ?></td>
<td><?= $row['Com_State'] ?></td>
<td><?= $row['Com_Pin'] ?></td>
<td><?= $row['Com_Mobile'] ?></td>
<td><?= $row['Com_Landline'] ?></td>

<td><?= $row['Bankname'] ?></td>
<td><?= $row['Bankaccount'] ?></td>
<td><?= $row['Branch'] ?></td>
<td><?= $row['IFSC'] ?></td>
<td><?= $row['Acc_Type'] ?></td>

<td><?= $row['Product'] ?></td>
<td><?= $row['Service'] ?></td>
<td><?= $row['Pickup'] ?></td>
<td><?= $row['Cod_Rem'] ?></td>
<td><?= $row['Billing_Type'] ?></td>
<td><?= $row['Billing_Cycle'] ?></td>

<td><?= $row['remittancecycle'] ?></td>
<td><?= $row['commercialstype'] ?></td>

<td><?= $row['Min_a'] ?></td>
<td><?= $row['Min_b'] ?></td>
<td><?= $row['Min_c'] ?></td>
<td><?= $row['Min_d'] ?></td>
<td><?= $row['Min_e'] ?></td>
<td><?= $row['Add_a'] ?></td>
<td><?= $row['Add_b'] ?></td>
<td><?= $row['Add_c'] ?></td>
<td><?= $row['Add_d'] ?></td>
<td><?= $row['Add_e'] ?></td>
<td><?= $row['Rto_a'] ?></td>
<td><?= $row['Rto_b'] ?></td>
<td><?= $row['Rto_c'] ?></td>
<td><?= $row['Rto_d'] ?></td>
<td><?= $row['Rto_e'] ?></td>
<td><?= $row['FSC'] ?></td>
<td><?= $row['COD'] ?></td>
<td><?= $row['Shipment_Lia'] ?></td>
<td><?= $row['GST'] ?></td>
<td><?= $row['specialnotes'] ?></td>

<td><?= $row['min1_a'] ?></td>
<td><?= $row['min1_b'] ?></td>
<td><?= $row['min1_c'] ?></td>
<td><?= $row['min1_d'] ?></td>
<td><?= $row['min1_e'] ?></td>
<td><?= $row['add1_a'] ?></td>
<td><?= $row['add1_b'] ?></td>
<td><?= $row['add1_c'] ?></td>
<td><?= $row['add1_d'] ?></td>
<td><?= $row['add1_e'] ?></td>
<td><?= $row['Rto1_a'] ?></td>
<td><?= $row['Rto1_b'] ?></td>
<td><?= $row['Rto1_c'] ?></td>
<td><?= $row['Rto1_d'] ?></td>
<td><?= $row['Rto1_e'] ?></td>
<td><?= $row['FSC1'] ?></td>
<td><?= $row['COD1'] ?></td>
<td><?= $row['Shipment_Lia1'] ?></td>
<td><?= $row['GST1'] ?></td>
<td><?= $row['specialnotes1'] ?></td>




<td><?= $row['min2_a'] ?></td>
<td><?= $row['min2_b'] ?></td>
<td><?= $row['min2_c'] ?></td>
<td><?= $row['min2_d'] ?></td>
<td><?= $row['min2_e'] ?></td>
<td><?= $row['add2_a'] ?></td>
<td><?= $row['add2_b'] ?></td>
<td><?= $row['add2_c'] ?></td>
<td><?= $row['add2_d'] ?></td>
<td><?= $row['add2_e'] ?></td>
<td><?= $row['Rto2_a'] ?></td>
<td><?= $row['Rto2_b'] ?></td>
<td><?= $row['Rto2_c'] ?></td>
<td><?= $row['Rto2_d'] ?></td>
<td><?= $row['Rto2_e'] ?></td>
<td><?= $row['FSC2'] ?></td>
<td><?= $row['COD2'] ?></td>
<td><?= $row['Shipment_Lia2'] ?></td>
<td><?= $row['GST2'] ?></td>
<td><?= $row['specialnotes2'] ?></td>

<td><?= $row['min5_a'] ?></td>
<td><?= $row['min5_b'] ?></td>
<td><?= $row['min5_c'] ?></td>
<td><?= $row['min5_d'] ?></td>
<td><?= $row['min5_e'] ?></td>
<td><?= $row['add5_a'] ?></td>
<td><?= $row['add5_b'] ?></td>
<td><?= $row['add5_c'] ?></td>
<td><?= $row['add5_d'] ?></td>
<td><?= $row['add5_e'] ?></td>
<td><?= $row['Rto5_a'] ?></td>
<td><?= $row['Rto5_b'] ?></td>
<td><?= $row['Rto5_c'] ?></td>
<td><?= $row['Rto5_d'] ?></td>
<td><?= $row['Rto5_e'] ?></td>
<td><?= $row['FSC5'] ?></td>
<td><?= $row['COD5'] ?></td>
<td><?= $row['Shipment_Lia5'] ?></td>
<td><?= $row['GST5'] ?></td>
<td><?= $row['specialnotes5'] ?></td>

<td><?= $row['min10_a'] ?></td>
<td><?= $row['min10_b'] ?></td>
<td><?= $row['min10_c'] ?></td>
<td><?= $row['min10_d'] ?></td>
<td><?= $row['min10_e'] ?></td>
<td><?= $row['add10_a'] ?></td>
<td><?= $row['add10_b'] ?></td>
<td><?= $row['add10_c'] ?></td>
<td><?= $row['add10_d'] ?></td>
<td><?= $row['add10_e'] ?></td>
<td><?= $row['Rto10_a'] ?></td>
<td><?= $row['Rto10_b'] ?></td>
<td><?= $row['Rto10_c'] ?></td>
<td><?= $row['Rto10_d'] ?></td>
<td><?= $row['Rto10_e'] ?></td>
<td><?= $row['FSC10'] ?></td>
<td><?= $row['COD10'] ?></td>
<td><?= $row['Shipment_Lia10'] ?></td>
<td><?= $row['GST10'] ?></td>
<td><?= $row['specialnotes10'] ?></td>

<td><?= $row['Client_Auth'] ?></td>
<td><?= $row['Designation'] ?></td>
<td><?= $row['Client_Email'] ?></td>
<td><?= $row['Client_Mobile'] ?></td>

<td><?= $row['Client_poc'] ?></td>
<td><?= $row['Poc_Designation'] ?></td>
<td><?= $row['Poc_Email'] ?></td>
<td><?= $row['Poc_Mobile'] ?></td>

<td><?= $row['Operation_Poc'] ?></td>
<td><?= $row['Operation_Designation'] ?></td>
<td><?= $row['Operation_Mail'] ?></td>
<td><?= $row['Operation_Mobile'] ?></td>

<td><?= $row['Bd_Name'] ?></td>
<td><?= $row['Bd_Designation'] ?></td>
<td><?= $row['Bd_mail'] ?></td>
<td><?= $row['Bd_Mobile'] ?></td>

<td><?= $row['added_by'] ?></td>
<td><?= $row['Active'] ?></td>
<td><?= $row['cancel_reason'] ?></td>
</tr>
<?php
}   
?>
<!--  -->
<!--  -->
</table>