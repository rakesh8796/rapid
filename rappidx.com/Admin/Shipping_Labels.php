<?php
session_start();
extract($_REQUEST);
include "config/dbcon.php";


	if(empty($_GET['orderid']))
	{
		echo "<script>window.location.assign('Dashboard.php')</script> ";
	}else
	{
		$orderid = $_GET['orderid'];
	}


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


<div style="width:1500px;"><br><br> <!-- Main Div -->
<!-- <h3> Header </h3> -->




<?php
	$singleproquery = "SELECT * FROM `spark_single_order` WHERE `Single_Order_Id`='$orderid'";
	$singleproqueryr=mysqli_query($conn,$singleproquery);
	$row = mysqli_fetch_assoc($singleproqueryr)
?>













	<div style="float:left; width:49%;">
		<table width="100%" border="1" style="border-collapse: collapse;">
			<!-- <tr>
				<td colspan="5"><div class="col-md-12"></div></td>
			</tr>
			<tr>
				<td colspan="5">
					<div class="col-md-12">

					</div>
				</td>
			</tr> -->


			<tr>
				<td colspan="1" style="width:40%">
					<div class="col-md-12 text-center">
					<span style="font-size:21px" class="text-center">RAPPIDX (<?php echo $row['awb_gen_by']; ?>)</span>
						<p><b>
							<?php
							if($row['order_cancel']){
							?>
									<span style="font-size:21px;">CANCEL</span>
							<?php
							}
							?>
						Delivery Details</b></p>

					</div>
				</td>
				<td colspan="4" style="width:60%">
					<div class="col-md-12 text-center" style="padding:5px 0px 5px 0px;">
<!-- Barcode -->
<?php
$barcodeText = trim($row['Awb_Number']);
$barcodeType="code128";
$barcodeDisplay="horizontal";
$barcodeSize="20";
$printText="true";
if($barcodeText != '') {
	echo '<img style="width:99%;height:80px" class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'"/>';
}
?>
<b>Awb No : </b><?php echo $row['Awb_Number']; ?>
<!-- <b><?php echo $row['Awb_Number']; ?></b> -->
<!-- //Barcode -->


					</div>
				</td>
			</tr>








			<tr>
				<td colspan="2" width="55%">
					<div class="col-md-12" style="padding-top:10px">
<b>Print Date :</b> <?php echo date('d-m-Y H:i:s'); ?>	<br>
<b>Order No :</b> <?php echo $row['orderno']; ?>	<br>
<b>Product Name :</b> <?php echo $row['Item_Name']; ?> <br>
					</div>
				</td>
				<td colspan="3">
					<div class="col-md-12">
						<!-- <center><b>Invoice Details</b></center> -->
<!-- <b>COD-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br> -->
<b>Total-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>

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
			<tr>
				<td colspan="5"><div class="col-md-12" style="font-size:15px;padding-top:10px">
					<center><b>Shipped By (If Undelivered, Return to)</b></center>
<?php echo ucwords($row['pickup_name']); ?>,<br>
<b>Address : </b>
<?php echo ucwords($row['pickup_address']); ?> <br>
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


















	<!-- <div style="float:left; width:49%; margin-left:10px;">
		<table width="100%" border="1" style="border-collapse: collapse;">
		<tr>
				<td colspan="5"></td>
			</tr>

			<tr>
				<td colspan="5">

				</td>
			</tr>
			<tr>
				<td colspan="5">
					<div class="col-md-12">

					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<b>Shipping Address</b> <br>

				</td>
				<td colspan="3">

				</td>
			</tr>
			<tr>
				<td colspan="5">
					<table class="table">
						<tr>
							<th>Sr No</th>
							<th>Product Name</th>
							<th>SKU</th>
							<th>QTY</th>
							<th>Total</th>
						</tr>
						<tr>
							<td>1</td>
							<td colspan="3"></td>
							<td></td>
							<td colspan="3"></td>
							<td colspan="3"></td>
						</tr>
					</table><br><br><br>
				</td>
			</tr>
			<tr>
				<td colspan="2">Discount</td>
				<td colspan="3">0</td>
			</tr>
			<tr>
				<td colspan="2">COD Charge</td>
				<td colspan="3">0</td>
			</tr>
			<tr>
				<td colspan="2">Net Amount</td>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="5">

				</td>
			</tr>
			<tr>
				<td colspan="5">
					This is Auto Generated Label And Does Not Need Signature
				</td>
			</tr>
		</table>
	</div> -->



<!-- <div>Footer</div> -->
</div>





















</body>
</html>


<!-- <script>
function printpage()
  {
  window.print()
  }
  printpage();
</script> -->
