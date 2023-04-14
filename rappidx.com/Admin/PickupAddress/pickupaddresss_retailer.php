<?php
	include '../config/dbcon.php';
	include "../Layout_Header-retailer.php";
	extract($_REQUEST);
	// echo $param;
	$pickupadrsid = 0;
	$pickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$param'";
    // $pickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `User_Id`='$user_id'";
	
	$pickupaddressr = mysqli_query($conn,$pickupaddress);
	$pickures = mysqli_fetch_assoc($pickupaddressr);
?>



<?php

if($param=="defaultvalue"){
    
    echo "<span style='color:red'>Please select pickup address</span>";
    
}elseif(!empty($param)){
    
	$pickupadrsid = $pickures['Address_Id'];
?>
    &ensp;
	<div class="col-md-12">
	    <div class="row">
    	    <div class="col-md-8">
    	    	<input type="hidden" name="pickupaddressid" value="<?= $pickupadrsid ?>">
    	        <input type="text" name="pickupname" class="form-control" value="<?= $pickures['Name'] ?>" placeholder="Pickup Shop Name" disabled="disabled">
    	    </div>
    	    <div class="col-md-4">
    	        <input type="text" name="pickupmobile" class="form-control" value="<?= $pickures['Mobile'] ?>" placeholder="Pickup Mobile" disabled="disabled">
    	    </div>
	    </div>
	</div>
	<br>
	<div class="col-md-12">
	    <div class="row">
    	    <div class="col-md-8">
    	        <input type="text" name="pickupadress" class="form-control" value="<?= $pickures['Address'] ?>"  placeholder="Pickup Address" disabled="disabled">
    	    </div>
	        <div class="col-md-4">
    	        <input type="text" name="pickupgstin" class="form-control" value="<?= $pickures['Gstin'] ?>" placeholder="Pickup GSTIN" disabled="disabled">
    	    </div>
	    </div>
	</div>
	<br>
	<div class="col-md-12">
	    <div class="row">
    	    <div class="col-md-4">
    	        <input type="text" name="pickupstate" class="form-control" value="<?= $pickures['State'] ?>"  placeholder="Pickup State" disabled="disabled">
    	    </div>
    	    <div class="col-md-4">
    	        <input type="text" name="pickupcity" class="form-control" value="<?= $pickures['City'] ?>" placeholder="Pickup City" disabled="disabled">
    	    </div>
    	    <div class="col-md-4">
    	        <input type="text" name="pickuppincode" class="form-control" value="<?= $pickures['Pincode'] ?>" placeholder="Pickup Pincode" disabled="disabled">
    	    </div>
	    </div>
	</div>
	<br>&ensp;<br>
<?php

}elseif(empty($param)){

?>

<!--  -->

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Name*</label>
            <input type="text" class="form-control" name="pickupname" required>
        </div>
        <div class="col-md-6"><label class="form-label">Mobile *</label>
            <input type="number" class="form-control" maxlength="10" name="pickupmobile" required>

        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <label class="form-label">Address *</label>
            <textarea class="form-control" required="" name="pickupadress"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">State*</label>
            <input type="text" class="form-control" name="pickupstate" required>
        </div>
        <div class="col-md-3"><label class="form-label">City*</label>
            <input type="text" class="form-control" name="pickupcity" required>
        </div>
        <div class="col-md-3"><label class="form-label">Pincode*</label>
            <input type="number" class="form-control" maxlength="6" id="originpincode" name="pickuppincode" onkeyup="oripindetails()" required>
<input type="hidden" name="originpin-city" id="originpin-city">
<input type="hidden" name="originpin-state"  id="originpin-state">
<input type="hidden" name="originpin-zone"  id="originpin-zone">
<input type="hidden" name="originpin-country"  id="originpin-country">
        </div>
    </div>
</div>
<br>&ensp;<br>
<!--  -->

<?php
}
?>