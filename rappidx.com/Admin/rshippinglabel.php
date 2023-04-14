<?php 
session_start();
extract($_REQUEST);
include "config/dbcon.php";

/*
// echo $_POST['shippinglabelawbno'];
$allawbno = $_POST['shippinglabelawbno'];

// $seperateawbno = explode(",", $allawbno);
$seperateawbno = explode(PHP_EOL, $allawbno);
if(count($seperateawbno)>1000)
{
	echo "<script>window.location.assign('Shipping_Labels_Check.php?error=exixtsdata')</script> ";
}
*/
$seperateawbno = "8445110220920";
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
<body style="line-height: 1.628571 !important;">

<?php
// Standred A4 Size
if($printlabels=="A4 Size"){
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
    $value =  trim($value);

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
					<span style="font-size:19px" class="text-center">RAPPIDX (<?php echo $row['awb_gen_by']; ?>)</span>
					<p><b>Delivery Details</b></p>
					</div>
				</td>
				<td colspan="4" style="width:59%">
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
				<td colspan="2" style="width:49%">
					<div class="col-md-12" style="padding-top:10px">
					<center><b>Shipping Address</b></center>
<b>Print Date :</b> <?php echo date('d-m-Y H:i:s'); ?>	<br>
<b>Name :</b> <?php echo $row['Name']; ?>	<br>
<b>Order No :</b> <?php echo $row['orderno']; ?>	<br>
<b>Product Name :</b> <?php echo $row['Item_Name']; ?> <br>
<b>Address :</b> <?php echo $row['Address']; ?> <br>
,<?php echo $row['State']; ?>, <?php echo $row['City']; ?><br>
<b>Pincode :</b> <?php echo $row['Pincode']; ?>
					</div>
				</td>
				<td colspan="3" style="width:49%">
					<div class="col-md-12">
						<!-- <center><b>Invoice Details</b></center> -->

<?php
if($row['Order_Type']=="COD"){
?>
    <b>COD-Amt :</b> <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>
<?php
}
?>

<!-- <b>Order No :</b> <?php echo $row['Name']; ?>	<br> -->
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
<!--<b>Payment Mode :</b> <span style="font-size:15px">Cash On Delivery</span>	<br>-->
<b>Payment Mode :</b> <span style="font-size:15px">
<?php
if($row['Order_Type']=="COD"){
    echo "Cash On Delivery";
}else{
    echo $row['Order_Type'];
}
?>
</span>	<br>
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
<?php echo ucwords($row['pickup_address']); ?> <br>
<!--<?php echo ucwords(substr($row['pickup_address'],23,100)); ?> <br>-->
<?php echo ucwords($row['pickup_state']); ?> - 
<?php echo $row['pickup_pincode']; ?> <br>
<?php
if($mobileshowornot==1){
?>
	<b>Mobile : </b><?php echo $row['pickup_mobile']; ?>
<?php
}
?>
<!--<b>Mobile : </b><?php echo $sellernameres['Reg_Mobile']; ?>-->
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
<!-- <div>Footer</div> -->
</div>





















<?php
// Standred A4 Size
}elseif($printlabels=="4X6 Size"){
// 4 X 6 Print Size
?>







<!--
396.9*559.4
-->

<!--<div style="width:540px;"><br>-->
<div style="width:100%;">
<!--<div style="width:100%;height:100%"><br>-->
<!-- Main Div -->
<!-- <h3> Header </h3> -->
	



<?php 
$i = 0;
foreach ($seperateawbno as $value) {
    if(empty($value)){		continue;	}
	// echo $value."<br>";
// Foreach Loop Start
    $value =  trim($value);

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
				<td colspan="5" style="width:89%">
					<div class="col-md-12 text-center" style="padding:0px;">
					<span style="font-size:12px" class="text-center">RAPPIDX (<?php echo $row['awb_gen_by']; ?>)</span>
					<!--<p>Delivery Details</p>-->
					</div>
				<!--</td>-->
				<!--<td colspan="4" style="width:59%">-->
					<div class="col-md-12 text-center" style="padding:0px;">
<!-- Barcode -->
<?php
$barcodeText = trim($row['Awb_Number']);
$barcodeType="code128";
$barcodeDisplay="horizontal";
$barcodeSize="20";
$printText="true";
if($barcodeText != '') {
	echo '<img style="width:99%;height:90px" class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'"/>';
}
?>
<span style="font-size:15px">
Awb No : <?php echo $row['Awb_Number']; ?>
<span>
<br>
<!-- <b><?php echo $row['Awb_Number']; ?></b> -->
<!-- //Barcode -->


</div>
</td>
</tr>

<tr>
<td colspan="2" style="width:49%">
<div class="col-md-12" style="padding-top:10px">
<center>Shipping Address</center>


Print Date : <?php echo date('d-m-Y H:i:s'); ?>	<br>
Name : <?php echo $row['Name']; ?>	<br>
<!--Order No : <?php echo $row['orderno']; ?>	<br>-->
Product Name : <?php echo $row['Item_Name']; ?> <br>
Address : <?php echo $row['Address']; ?> <br>
,<?php echo $row['State']; ?>, <?php echo $row['City']; ?><br>
Pincode : <?php echo $row['Pincode']; ?>
					</div>
				</td>
				<td colspan="3" style="width:49%">
					<div class="col-md-12">
						<!-- <center><b>Invoice Details</b></center> -->

<span style="font-size:21px">Order No : <?php echo $row['orderno']; ?>	<br></span>
<?php
if($row['Order_Type']=="COD"){
?>
    COD-Amt : <span style="font-size:15px">Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>
<?php
}
?>

<!-- <b>Order No :</b> <?php echo $row['Name']; ?>	<br> -->
Order Date :
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
<!--<b>Payment Mode :</b> <span style="font-size:15px">Cash On Delivery</span>	<br>-->
Payment Mode : <span style="font-size:15px">
<?php
if($row['Order_Type']=="COD"){
    echo "Cash On Delivery";
}else{
    echo $row['Order_Type'];
}
?>
</span>	<br>
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
			
				<td colspan="5"><div class="col-md-12" style="font-size:12px">
					<center>Shipped By (If Undelivered, Return to)</center>
<?php echo ucwords($row['pickup_name']); ?>,<br>
Address : 
<?php echo ucwords($row['pickup_address']); ?> <br>
<?php echo ucwords($row['pickup_state']); ?> - 
<?php echo $row['pickup_pincode']; ?> <br>
<?php
if($mobileshowornot==1){
?>
	Mobile : <?php echo $row['pickup_mobile']; ?>
<?php
}
?>
<!--				</div></td>-->
			</tr>
			<tr>
				<td colspan="5"><div class="col-md-12" style="font-size:12px">
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
<!-- <div>Footer</div> -->
</div>














<?php
// 4 X 6 Print Size
}elseif($printlabels=="A6 Size"){
// 4 X * Print Size
?>



<div style="width:510px;font-size:17px">
<!--<div style="width:100%;font-size:17px">-->
<!-- Main Div -->
<!-- <h3> Header </h3> -->
	



<?php 
$i = 0;
foreach ($seperateawbno as $value) {
    if(empty($value)){		continue;	}
	// echo $value."<br>";
// Foreach Loop Start
    $value =  trim($value);

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
	<div style="margin-bottom:10px">
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
				<!--<td colspan="1" style="width:9%">-->
				<td colspan="5" style="width:89%">
					<div class="col-md-12 text-center" style="padding:0px;">
					<span style="font-size:10px" class="text-center">RAPPIDX (<?php echo $row['awb_gen_by']; ?>)</span>
					<p><b>Delivery Details</b></p>
					</div>
				<!--</td>-->
				<!--<td colspan="5" style="width:89%">-->
					<div class="col-md-12 text-center" style="padding:0px;">
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
<br>
<!-- <b><?php echo $row['Awb_Number']; ?></b> -->
<!-- //Barcode -->


</div>
</td>
</tr>

<tr>
<td colspan="2" style="width:49%">
<div class="col-md-12" style="padding-top:10px">
<center><b>Shipping Address</b></center>


<b>Print Date :</b> <?php echo date('d-m-Y H:i:s'); ?>	<br>
<b>Name :</b> <?php echo $row['Name']; ?>	<br>
<b>Order No :</b> <?php echo $row['orderno']; ?>	<br>
<b>Product Name :</b> <?php echo $row['Item_Name']; ?> <br>
<!--<b>Address :</b> <?php //echo $row['Address']; ?> <br>-->
<b>Address :</b> <?php echo substr($row['Address'],0,120); ?> <br>
,<?php echo $row['State']; ?>, <?php echo $row['City']; ?><br>
<b>Pincode :</b> <?php echo $row['Pincode']; ?>


					</div>
				</td>
				<td colspan="3" style="width:49%">
					<div class="col-md-12">
						<!-- <center><b>Invoice Details</b></center> -->

<?php
if($row['Order_Type']=="COD"){
?>
    <b>COD-Amt :</b> <span>Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>
<?php
}
?>

<!-- <b>Order No :</b> <?php echo $row['Name']; ?>	<br> -->
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
<!--<b>Payment Mode :</b> <span style="font-size:15px">Cash On Delivery</span>	<br>-->
<b>Payment Mode :</b> <span>
<?php
if($row['Order_Type']=="COD"){
    echo "Cash On Delivery";
}else{
    echo $row['Order_Type'];
}
?>
</span>	<br>
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
			
				<td colspan="5"><div class="col-md-12">
					<center><b>Shipped By (If Undelivered, Return to)</b></center>
<?php echo ucwords($row['pickup_name']); ?>,<br>
<b>Address : </b>
<?php echo ucwords($row['pickup_address']); ?> <br>
<?php echo ucwords($row['pickup_state']); ?> - 
<?php echo $row['pickup_pincode']; ?> <br>
<?php
if($mobileshowornot==1){
?>
	<b>Mobile : </b><?php echo $row['pickup_mobile']; ?>
<?php
}
?>

<!--				</div></td>-->
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
<!-- <div>Footer</div> -->
</div>





<?php
// 4 X * Print Size
}elseif($printlabels=="A6 Size New"){
// 4 X 6 Print Size New
?>




<div style="width:510px;font-size:23px">

<?php 
$i = 0;
foreach ($seperateawbno as $value) {
    if(empty($value)){		continue;	}
	// echo $value."<br>";
// Foreach Loop Start
    $value =  trim($value);

	$singleproquery = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value'";
	$singleproqueryr=mysqli_query($conn,$singleproquery);
	
	if(empty(mysqli_num_rows($singleproqueryr))){
		continue;
	}else{
		$i = 1;
	}

	$row = mysqli_fetch_assoc($singleproqueryr)
?>

	<div style="margin-bottom:10px">

<table width="100%" border="1" style="border-collapse: collapse;">

<tr>
    <td colspan="2">
        <div class="col-md-12 text-center">
            
            
            <span style="font-size:15px;" class="text-center"><b>RAPPIDX ( <?php echo $row['awb_gen_by']; ?> )<b></span>
            <p style="font-size:12px"><b>Product Details</b></p>
            
            
        </div>
        <div class="col-md-12 text-center" style="padding:0px;">
            <b>Awb No : </b><?php echo $row['Awb_Number']; ?>
            <br>
        </div>
    </td>
</tr>
<tr>
	<td width="90%">
        <div class="col-md-12">
            <center><b>Shipping Address</b></center>
            <b>Print Date :</b> <?php echo date('d-m-Y'); ?>	<br>
            <b>Name :</b> <?php echo $row['Name']; ?>	<br>
            <b>Order No :</b> <?php echo $row['orderno']; ?>	<br>
            <b>Product Name :</b> <?php echo $row['Item_Name']; ?> <br>
            <!--<b>Address :</b> <?php //echo $row['Address']; ?> <br>-->
            <b>Address :</b> <?php echo substr($row['Address'],0,120); ?> <br>
            ,<?php echo $row['State']; ?>, <?php echo $row['City']; ?><br>
            <b>Pincode :</b> <?php echo $row['Pincode']; ?>
                    
            <hr style="border-color:black">           
            <?php
            if($row['Order_Type']=="COD"){
            ?>
                <b>COD-Amt :</b> <span>Rs. <?php echo $row['Cod_Amount']; ?> /-</span>	<br>
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
            <b>Payment Mode :</b> <span>
            <?php
            if($row['Order_Type']=="COD"){
                echo "Cash On Delivery";
            }else{
                echo $row['Order_Type'];
            }
            ?>
            </span>	<br>
            
            </div>
            <!---->
	</td>
	<td width="10%">
	    <?php
            $barcodeText = trim($row['Awb_Number']);
            $barcodeType="code128";
            $barcodeDisplay="horizontal";
            $barcodeSize="20";
            $printText="true";
            if($barcodeText != '') {
            	echo '<img style="width:99%;height:430px" class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'"/>';
            }
        ?>
	</td>
</tr>
<tr>
	<td colspan="5"><div class="col-md-12">
	    <div class="col-md-12" style="border-bottom:1px solid black">
        	<center><b>Shipped By (If Undelivered, Return to)</b></center>
        <?php echo ucwords($row['pickup_name']); ?>,<br>
        <b>Address : </b>
        <!--<?php echo ucwords($row['pickup_address']); ?> <br>-->
        <?php echo ucwords($row['pickup_state']); ?> - 
        <?php echo $row['pickup_pincode']; ?> <br>
        <?php
        if($mobileshowornot==1){
        ?>
        <b>Mobile : </b><?php echo $row['pickup_mobile']; ?>
        <?php
        }
        ?>
        </div>
        <span style="font-size:17px;">
		    This is Auto Generated Label And Does Not Need Signature
        </span>
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
// 4 X 6 Print Size New
}
?>

























</body>
</html>


<script>
function printpage()
  {
  window.print()
  }
  printpage();
</script>
