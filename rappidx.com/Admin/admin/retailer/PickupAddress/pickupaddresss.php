<?php
	include '../config/dbcon.php';
	extract($_REQUEST);
	// echo $param;
	$pickupadrsid = 0;
	$pickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$param'";
	$pickupaddressr = mysqli_query($conn,$pickupaddress);
	$pickures = mysqli_fetch_assoc($pickupaddressr);
?>


<?php
if(!empty($param))
{
	$pickupadrsid = $pickures['Address_Id'];
?>

	<div class="col-md-12"><br>
	    <div class="col-md-3">
	    	<input type="hidden" name="pickupaddressid" value="<?= $pickupadrsid ?>">
	        <input type="text" name="pickupname" class="form-control" value="<?= $pickures['Name'] ?>" placeholder="Pickup Shop Name">
	    </div>
	    <div class="col-md-3">
	        <input type="text" name="pickupmobile" class="form-control" value="<?= $pickures['Mobile'] ?>" placeholder="Pickup Mobile">
	    </div>
	    <div class="col-md-3">
	        <input type="text" name="pickuppincode" class="form-control" value="<?= $pickures['Pincode'] ?>" placeholder="Pickup Pincode">
	    </div>
	    <div class="col-md-3">
	        <input type="text" name="pickupgstin" class="form-control" value="<?= $pickures['Gstin'] ?>" placeholder="Pickup GSTIN">
	    </div>
	</div>
	<div class="col-md-12"><br>
	    <div class="col-md-6">
	        <input type="text" name="pickupadress" class="form-control" value="<?= $pickures['Address'] ?>"  placeholder="Pickup Address">
	    </div>
	    <div class="col-md-3">
	        <input type="text" name="pickupstate" class="form-control" value="<?= $pickures['State'] ?>"  placeholder="Pickup State">
	    </div>
	    <div class="col-md-3">
	        <input type="text" name="pickupcity" class="form-control" value="<?= $pickures['City'] ?>" placeholder="Pickup City">
	    </div>
	</div>

<?php
}
?>


<?php
if(empty($param))
{
?>

<!--  -->
<div class="col-md-12"><br>
    <div class="col-md-3">
        <input type="text" class="form-control" placeholder="Shop Name" readonly="">
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" placeholder="Mobile" readonly="">
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" placeholder="Pincode" readonly="">
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" placeholder="GSTIN" readonly="">
    </div>
</div>
<div class="col-md-12"><br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Address" readonly="">
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" placeholder="State" readonly="">
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" placeholder="City" readonly="">
    </div>
</div>
<!--  -->

<?php
}
?>