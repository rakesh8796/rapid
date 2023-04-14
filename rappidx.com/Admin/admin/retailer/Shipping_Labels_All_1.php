<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";


// echo $_POST['shippinglabelawbno'];
$allawbno = $_POST['shippinglabelawbno'];

// $seperateawbno = explode(",", $allawbno);
$seperateawbno = explode(PHP_EOL, $allawbno);
if(count($seperateawbno)>50)
{
	echo "<script>window.location.assign('Shipping_Labels_Check.php?error=exixtsdata')</script> ";
}
// echo "<br><br>";
// $a1 = explode(",", $abc);
// print_r($a1);

// echo "<br><br>";
// $a2 = implode($a1, ",");
// print_r($a2);

	// if(empty($_GET['orderid']))
	// {
	// 	echo "<script>window.location.assign('Dashboard.php')</script> ";
	// }else
	// {
	// 	$orderid = $_GET['orderid'];
	// }


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rappidx</title>
	<meta name="keywords" content="Rappidx" />
	<meta name="description" content="Rappidx">
	<meta name="author" content="Singhaniya">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Castoro:ital@0;1&family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@1,500&family=Castoro:ital@0;1&display=swap" rel="stylesheet">

</head>
<body>


<?php
if($printlabels=="A4 Shipping Labels"){
// Standred A4 Size
?>


<div style="width:740px"><br><br> <!-- Main Div -->
<!-- <h3> Header </h3> -->
<?php
$i = 0;
foreach ($seperateawbno as $value) {
	if(empty($value)){		continue;	}
	// echo $value."<br>";
// Foreach Loop Start
	$value = trim($value);

	$singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value'";
	$singleproqueryr=mysqli_query($conn,$singleproquery);

	if(empty(mysqli_num_rows($singleproqueryr))){
		continue;
	}else{
		$i = 1;
	}

	$row = mysqli_fetch_assoc($singleproqueryr)
?>

	<!-- <h2 class="text-center">Rappidx</h2> -->
	<div style="margin-bottom:20px">
		<table width="100%" border="1" style="border-collapse: collapse;">

			<tr>
				<td colspan="2">
					<div class="col-md-12 text-center">
					<span style="font-size:21px" class="text-center">RAPPIDX (<?php echo $row['awb_gen_by']; ?>)</span>
						<p><b>
							<?php
							if($row['order_cancel']){
							?>
									<span style="font-size:21px">CANCEL</span>
							<?php
							}
							?>
						Delivery Details</b></p>

					</div>
				</td>
				<td colspan="3">
					<div class="col-md-12 text-center">
<b>Awb No : </b><?php echo $row['Awb_Number']; ?> <br>
<!-- Barcode -->
<?php
$barcodeText = trim($row['Awb_Number']);
$barcodeType="code128";
$barcodeDisplay="horizontal";
$barcodeSize="20";
$printText="true";
if($barcodeText != '') {
	echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'"/>';
}
?>

<!-- <b><?php echo $row['Awb_Number']; ?></b> -->
<!-- //Barcode -->

					</div>
				</td>
			</tr>


			<tr>
				<td colspan="2" width="55%">
					<div class="col-md-12" style="padding-top:10px">
					<!-- <center><b>Shipping Address</b></center> -->
<b>Print Date :</b> <?php echo date('d-m-Y H:i:s'); ?>	<br>
<b>Order No :</b> <?php echo $row['orderno']; ?>	<br>
<b>Product Name :</b> <?php echo $row['Item_Name']; ?> <br>
					</div>
				</td>
				<td colspan="3">
					<div class="col-md-12">
						<!-- <center><b>Invoice Details</b></center> -->
<!-- <b>COD-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br> -->
<!-- <b>Total-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br> -->
<!-- <b>Order No :</b> <?php echo $row['Name']; ?>	<br> -->
<?php
if($row['Order_Type']=="COD"){
?>
    <b>COD-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>
<?php
}
?>
<b>Order Date :</b>
<?php
	$date=date_create($row['Rec_Time_Stamp']);
	echo date_format($date,"d-m-Y");
?>	<br>

<?php
	$selleridis = $row['User_Id'];
	$sellername = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$selleridis'";
	$sellernamer=mysqli_query($conn,$sellername);
	$sellernameres = mysqli_fetch_assoc($sellernamer)
?>
<!-- <b>Payment Mode :</b> <span style="font-size:15px">Cash On Delivery</span>	<br> -->
<b>Payment Mode :</b> <span style="font-size:15px"><?php echo $row['Order_Type']; ?></span>	<br>
<!-- <b>Seller Name :</b> <?php echo ucwords($sellernameres['Company_Name']); ?>	<br> -->



					</div>
				</td>
			</tr>
			<!-- <tr>
				<td colspan="5">
					<div class="col-md-12 text-center">

					</div>
				</td>
			</tr> -->

				<td colspan="5"><div class="col-md-12" style="font-size:15px">
					<center><b>Shipped By (If Undelivered, Return to)</b></center>
<?php echo ucwords($row['pickup_name']); ?>,<br>
<b>Address : </b>
<?php echo ucwords($row['pickup_address']); ?>
<?php echo ucwords($row['pickup_state']); ?> -
<?php echo $row['pickup_pincode']; ?> <br>
<!-- <b>Mobile : </b><?php echo $row['pickup_mobile']; ?> -->
				</div></td>
			</tr>
			<tr>
				<td colspan="5"><div class="col-md-12">
					This is Auto Generated Label And Does Not Need Signature
				</div></td>
			</tr>
		</table>

	</div>


<div style="page-break-after:always;"></div>






<?php
}
// Foreach Loop End

if(empty($i))
{
	echo "<h2 class='text-center'>Result Not Found | Use Another AWB Numbers</h2>";
}

?>
</div>
























<?php
// Standred A4 Size
}elseif($printlabels=="4X6 Shipping Labels"){
// 4 X 6 Print Size
?>
















<div style="width:540px"><br><br> <!-- Main Div -->
<!-- <h3> Header </h3> -->
<?php
$i = 0;
foreach ($seperateawbno as $value) {
	if(empty($value)){		continue;	}
	// echo $value."<br>";
// Foreach Loop Start
	$value = trim($value);

	$singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value'";
	$singleproqueryr=mysqli_query($conn,$singleproquery);

	if(empty(mysqli_num_rows($singleproqueryr))){
		continue;
	}else{
		$i = 1;
	}

	$row = mysqli_fetch_assoc($singleproqueryr)
?>

	<!-- <h2 class="text-center">Rappidx</h2> -->
	<div style="margin-bottom:20px">
		<table width="100%" border="1" style="border-collapse: collapse;">

			<tr>
				<td colspan="2">
					<div class="col-md-12 text-center">
					<span style="font-size:21px" class="text-center">RAPPIDX (<?php echo $row['awb_gen_by']; ?>)</span>
						<p><b>
							<?php
							if($row['order_cancel']){
							?>
									<span style="font-size:21px">CANCEL</span>
							<?php
							}
							?>
						Delivery Details</b></p>

					</div>
				</td>
				<td colspan="3">
					<div class="col-md-12 text-center">
<b>Awb No : </b><?php echo $row['Awb_Number']; ?> <br>
<!-- Barcode -->
<?php
$barcodeText = trim($row['Awb_Number']);
$barcodeType="code128";
$barcodeDisplay="horizontal";
$barcodeSize="20";
$printText="true";
if($barcodeText != '') {
	echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'"/>';
}
?>

<!-- <b><?php echo $row['Awb_Number']; ?></b> -->
<!-- //Barcode -->

					</div>
				</td>
			</tr>


			<tr>
				<td colspan="2" width="55%">
					<div class="col-md-12" style="padding-top:10px">
					<!-- <center><b>Shipping Address</b></center> -->
<b>Print Date :</b> <?php echo date('d-m-Y H:i:s'); ?>	<br>
<b>Order No :</b> <?php echo $row['orderno']; ?>	<br>
<b>Product Name :</b> <?php echo $row['Item_Name']; ?> <br>
					</div>
				</td>
				<td colspan="3">
					<div class="col-md-12">
						<!-- <center><b>Invoice Details</b></center> -->
<!-- <b>COD-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br> -->
<!-- <b>Total-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br> -->
<!-- <b>Order No :</b> <?php echo $row['Name']; ?>	<br> -->
<?php
if($row['Order_Type']=="COD"){
?>
    <b>COD-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>
<?php
}
?>
<b>Order Date :</b>
<?php
	$date=date_create($row['Rec_Time_Stamp']);
	echo date_format($date,"d-m-Y");
?>	<br>

<?php
	$selleridis = $row['User_Id'];
	$sellername = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$selleridis'";
	$sellernamer=mysqli_query($conn,$sellername);
	$sellernameres = mysqli_fetch_assoc($sellernamer)
?>
<!-- <b>Payment Mode :</b> <span style="font-size:15px">Cash On Delivery</span>	<br> -->
<b>Payment Mode :</b> <span style="font-size:15px"><?php echo $row['Order_Type']; ?></span>	<br>
<!-- <b>Seller Name :</b> <?php echo ucwords($sellernameres['Company_Name']); ?>	<br> -->



					</div>
				</td>
			</tr>
			<!-- <tr>
				<td colspan="5">
					<div class="col-md-12 text-center">

					</div>
				</td>
			</tr> -->

				<td colspan="5"><div class="col-md-12" style="font-size:15px">
					<center><b>Shipped By (If Undelivered, Return to)</b></center>
<?php echo ucwords($row['pickup_name']); ?>,<br>
<b>Address : </b>
<?php echo ucwords($row['pickup_address']); ?>
<?php echo ucwords($row['pickup_state']); ?> -
<?php echo $row['pickup_pincode']; ?> <br>
<!-- <b>Mobile : </b><?php echo $row['pickup_mobile']; ?> -->
				</div></td>
			</tr>
			<tr>
				<td colspan="5"><div class="col-md-12">
					This is Auto Generated Label And Does Not Need Signature
				</div></td>
			</tr>
		</table>

	</div>


<div style="page-break-after:always;"></div>






<?php
}
// Foreach Loop End

if(empty($i))
{
	echo "<h2 class='text-center'>Result Not Found | Use Another AWB Numbers</h2>";
}

?>
</div>


















<?php
// 4 X 6 Print Size
}
?>























</body>
</html>


<!-- <script>
function printpage()
  {
  window.print()
  }
  printpage();
</script> -->
