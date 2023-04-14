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

if(!empty($param)){

	$pickupadrsid = $pickures['Address_Id'];

?>

	<div class="col-md-12">

	    <div class="row">

    	    <div class="col-md-8">
				<p><?= $pickures['Name'] ?>,<?= $pickures['Address'] ?>,<?= $pickures['State'] ?>,<?= $pickures['City'] ?>,<?= $pickures['Pincode'] ?>,<?= $pickures['Gstin'] ?><br><?= $pickures['Mobile'] ?></p>

    	    	<input type="hidden" name="pickupaddressid" value="<?= $pickupadrsid ?>">

    	        <!-- <input type="text" name="pickupname" class="form-control" value="<?= $pickures['Name'] ?>" placeholder="Pickup Shop Name" disabled="disabled"> -->

    	    </div>

    	    <!-- <div class="col-md-4">

    	        <input type="text" name="pickupmobile" class="form-control" value="<?= $pickures['Mobile'] ?>" placeholder="Pickup Mobile" disabled="disabled">

    	    </div> -->

	    </div>

	</div>

	<br>

	<!-- <div class="col-md-12">

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

	</div> -->

	<br>&ensp;<br>

<?php

}

?>





<?php

    

    if(empty($param)){



?>



<!--  -->

<center style="color:red">Please Select Pickup Address</center>

<br>&ensp;<br>

<!--  -->



<?php

}

?>