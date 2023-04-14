<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->
<div class="col-md-12" style="background:#edf1f5">
<div class="row bg-title" style="padding:0px 0px 0px 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<h5 class="" style="font-weight:600">SINGLE ORDERS
<span class="pull-right">
<?php
if($_GET['excelfile'] == 'Update'){
  echo "<div class='success' style='color:green;margin-right:450px'>Update Successfully</div>";
}elseif($_GET['excelfile'] == 'No Update'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Not Updated</div>";
}elseif($_GET['excelfile'] == 'No Pickup'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Pickup Address Invalid</div>";
}elseif($_GET['excelfile'] == 'invalid Details'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid CSV File Details</div>";
}elseif($_GET['excelfile'] == 'Invalid Data'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid Hub/Pickup Address</div>";
}elseif($_GET['excelfile'] == 'Invalid Data1'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid Hub/Pickup Address</div>";
}elseif($_GET['excelfile'] == 'Cancel Order'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Order Canceled</div>";
}elseif($_GET['excelfile'] == 'Not Canceled'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Order Not Canceled</div>";
}
?>
</span>
</h5>

    </div>
</div>



<aside class="right-side">




<?php 

// echo "Working <br>";
$estimatedetails = $_SESSION['estimatedetails'];
// print_r($estimatedetails);


// echo "<br>";
 $pickuppin = $estimatedetails['pickuppin'];
 $pickupstate = $estimatedetails['pickupstate'];
 $destipin = $estimatedetails['destinpin'];
 $destistate = $estimatedetails['destinstate'];
 $zone = $estimatedetails['zone'];
 $actulweight = $estimatedetails['actualweight'];
 $vollength = $estimatedetails['vollength'];
 $volbreadth = $estimatedetails['volbreadth'];
 $volheight = $estimatedetails['volheight'];
 $volweight = $estimatedetails['volumentriweight'];
 $procategory = $estimatedetails['prodcategroy'];
 $proamt = $estimatedetails['prodamt'];
 $mode = $estimatedetails['mode'];
 $estimateamt = $estimatedetails['estimateamt'];
 
 
/*
echo "Start";
echo "<br>";
echo $pickuppin = $estimatedetails['pickuppin'];
echo "<br>";
echo $pickupstate = $estimatedetails['pickupstate'];
echo "<br>";
echo $destipin = $estimatedetails['destinpin'];
echo "<br>";
echo $destistate = $estimatedetails['destinstate'];
echo "<br>";
echo $zone = $estimatedetails['zone'];
echo "<br>";
echo $actulweight = $estimatedetails['actualweight'];
echo "<br>";
echo $vollength = $estimatedetails['vollength'];
echo "<br>";
echo $volbreadth = $estimatedetails['volbreadth'];
echo "<br>";
echo $volheight = $estimatedetails['volheight'];
echo "<br>";
echo $volweight = $estimatedetails['volumentriweight'];
echo "<br>";
echo $procategory = $estimatedetails['prodcategroy'];
echo "<br>";
echo $proamt = $estimatedetails['prodamt'];
echo "<br>";
echo $mode = $estimatedetails['mode'];
echo "<br>";
echo $estimateamt = $estimatedetails['estimateamt'];
echo "<br>";
echo "End";
*/

 
/*
if(empty($pickuppin) OR empty($pickupstate) OR empty($destipin) OR empty($destistate) OR empty($zone) OR empty($actulweight) OR empty($vollength) OR empty($volbreadth) OR empty($volheight) OR empty($volweight) OR empty($procategory) OR empty($proamt) OR empty($mode) OR empty($estimateamt)){
    echo "<script>window.location.assign('Rcalculator.php')</script> ";	
}
*/
 
?>















<section class="content">
<!--main content-->
<div class="col-md-12">
<div class="row">
<div class="panel panel-primary">

<div class="panel-heading" style="background-color:#33333373;padding:1px 0px 0px 20px;border-radius:10px 10px 0px 0px">
<h5 style="color:#333333;font-weight:100"><b>Book New Order</b></h5>
</div>
<div class="panel-body">


<form class="form-horizontal" method="POST">


<div class="heading text-center">
    <h3 class="panel-title" style="background-color:gray;color:white;border-radius:20px;">
        <i class="fa fa-archive" aria-hidden="true"> &ensp; Product Details</i>
    </h3>
</div>
<br>
<div class="form-group">
    <div class="col-md-4">

<?php 
    $productcates = array("Apparel And accessories","Automotives","Baby Care","Books And Stationery","Consumables FMCG","Documents","Electronics","Household Items","Sports Equipments","Covid Essentials","Others");
?>
        <select id="select21" name="itemnamecate" onchange="ManageProdName(this.value)" class="form-control select2" style="width:100%" required="">
                <option value="">Product Category * </option>
                <?php 
                foreach ($productcates as $productcate) {
                    if($procategory == $productcate){
                ?>
                        <option value="<?= $productcate ?>" selected><?= $productcate ?></option>
                <?php
                    }else{
                ?>
                        <option value="<?= $productcate ?>"><?= $productcate ?></option>
                <?php
                    }
                }
                ?>
        </select>
    </div>
<script type="text/javascript">
function ManageProdName(val){
    // alert(val)
    if(val == "Others"){
        $("#itemname").val('');
        // document.getElementById("itemname").readOnly = "false";
        document.getElementById("itemnamedemo").style.display = "none";
        document.getElementById("itemname").style.display = "block";
    }else{
        $("#itemname").val(val);
        // document.getElementById("itemname").readOnly = "true";
        document.getElementById("itemnamedemo").style.display = "none";
        document.getElementById("itemname").style.display = "block";
    }
}
</script>

    <div class="col-md-4">
        <input type="text" id="itemname" name="itemname" class="form-control" placeholder="Order/Item Name" style="display:none;">
        <input type="text" id="itemnamedemo" class="form-control" placeholder="Order/Item Name" readonly>
    </div>
    <div class="col-md-4">
        <select id="select21" name="itemextracare" class="form-control select2">
                <option value="No">Additional Details </option>
                <option value="Dengerous">Dengerous Good</option>
                <option value="Extra Care">Extra Care</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            Payment Mode <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <!--<input type="text" id="" name="ordertype" class="form-control" placeholder="Payment Mode" value="<?= $mode ?>" readonly="">-->
            <?php 
                $productmodes = array("cod","prepaid");
            ?>
            <select id="" name="ordertype" class="form-control" style="width:100%" required="">
                    <?php 
                    foreach ($productmodes as $productmode) {
                        if($productmode == $mode){
                    ?>
                            <option value="<?= $productmode ?>" selected><?= ucwords($productmode) ?></option>
                    <?php
                        }else{
                    ?>
                            <option value="<?= $productmode ?>"><?= ucwords($productmode) ?></option>
                    <?php
                        }
                    }
                    ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            COD Amount <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <input type="text" id="" name="codamount" class="form-control" placeholder="Cod Amount *" value="<?= $proamt ?>" required="">
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-8 text-left control-label" for="val-username">
            Actual Weight <span class="text-danger">*</span>
        </label>
        <div class="col-md-4">
            <input type="text" name="actualweight" class="form-control" placeholder="Actual Weight" id="" value="<?= $actulweight ?>" required="">
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            Total Amount <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <input type="text" name="totalamount" class="form-control" placeholder="Total Amount" id="totalamount" value="<?= $estimateamt ?>" onkeyup="TotalInvoicevalue(this.value)" required="">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            Product Length <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <input type="text" id="vlength" name="lenght" class="form-control" placeholder="Lenght *" value="<?= $vollength ?>" onkeyup="VolumetricWeightCal(this.value,'length')" required="">
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            Product Breadth <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <input type="text" id="vbreadth" name="widht" class="form-control" placeholder="Width *" value="<?= $volbreadth ?>" onkeyup="VolumetricWeightCal(this.value,'breadth')" required="">
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-8 text-left control-label" for="val-username">
            Product Height <span class="text-danger">*</span>
        </label>
        <div class="col-md-4">
            <input type="text" id="vheight" name="height" class="form-control" placeholder="Height *" value="<?= $volheight ?>" onkeyup="VolumetricWeightCal(this.value,'height')" required="">
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username" title="Volumetric Weight">
            Volumetric Wt. <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <input type="text" id="VolumetricWeightshow" name="volweight" class="form-control" placeholder="Volumetric Weight" value="<?= $volweight ?> gm" readonly="">
        </div>
    </div>
</div>


<!-- Volumetric Weight Calculator -->
<script type="text/javascript">
function TotalInvoicevalue(datachange){
    $("#invoicevaluetotalamt").val(datachange);
}
function VolumetricWeightCal(datachange,cateis){
    // if(cateis == "length"){
        var vlength = $("#vlength").val();
        // if(vlength == 0){  $("#vlength").val(1) }
        var vlengthlen = vlength.length;
        if(vlengthlen == 0){    vlength = 1;    }
        // alert("Len" + vlengthlen);
    // }
    // if(cateis == "breadth"){
        var vbreadth = $("#vbreadth").val();
        // if(vbreadth == 0){  $("#vbreadth").val(1) }
        var vbreadthlen = vbreadth.length;
        if(vbreadthlen == 0){    vbreadth = 1;    }
        // alert("Bre" + vbreadthlen);
    // }
    // if(cateis == "height"){
        var vheight = $("#vheight").val();
        // if(vheight == 0){  $("#vheight").val(1) }
        var vheightlen = vheight.length;
        if(vheightlen == 0){    vheight = 1;    }
        // alert("Hei" + vheightlen);
    // }
    var valumetricweight = vlength*vbreadth*vheight / 5000;
    // alert("Res" + valumetricweight);
    valumetricweightshow = valumetricweight + " KG";
    $("#VolumetricWeight").val(valumetricweight);
    $("#VolumetricWeightshow").val(valumetricweightshow);

}
</script>
<!-- Volumetric Weight Calculator -->



<div class="form-group">
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            No of Quantity <span class="text-danger">*</span>
        </label>
        <div class="col-md-5">
            <input type="number" id="" name="quantity" class="form-control" placeholder="No Of Quantity *" min="1" required="" value="1" required="">
        </div>
    </div>
    <div class="col-md-3">
        <label class="col-md-7 text-left control-label" for="val-username">
            Invoice Value <span class="text-danger">*</span>
        </label>
        <div class="col-md-5" title="Invoice Value">
            <input type="number" id="invoicevaluetotalamt" name="invoicevalue" class="form-control" placeholder="Invoice Value" value="<?= $estimateamt ?>" required="" readonly="">
        </div>
    </div>
    <div class="col-md-6"></div>
</div>





















<div class="heading text-center">
    <h3 class="panel-title" style="background-color:gray;color:white;border-radius:20px;">
        <i class="fa fa-map-marker" aria-hidden="true"> &ensp; Droppoint/ Destination Details</i>
    </h3>
</div>
<br>

<div class="form-group">
    <div class="row">
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-7">
                <label class="col-md-4 control-label" for="val-username">
                    Name<span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="" name="name" class="form-control" placeholder="Customer name" required="">
                </div>
            </div>
            <div class="col-md-5">
                <label class="col-md-4 control-label" for="val-username">
                    Mobile <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="number" id="" name="mobile" class="form-control" placeholder="XXXXXXXXXX" maxlength="10" required="">
                </div>
            </div>
        </div>
        <!--  -->
        <div class="row my-4">
            <div class="col-md-7">
                <label class="col-md-4 control-label" for="email">
                    State <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="email" name="state" class="form-control" placeholder="Enter Customer State" required="">
                </div>
            </div>
            <div class="col-md-5">
                <label class="col-md-4 control-label" for="email">
                    City <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="email" name="city" class="form-control" placeholder="Customer City" value="<?= $destistate ?>" required="">
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-7">
                <label class="col-md-4 control-label" for="confirmpassword">
                    Pincode <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="" name="pin" class="form-control" placeholder="Customer Pincode" value="<?= $destipin ?>" required="">
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
        <!--  -->
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <label class="col-md-12" for="confirmpassword">
                    Address <span class="text-danger">*</span>
                </label>
                <div class="col-md-12">
                    <textarea name="address" class="form-control" placeholder="Enter Customer Address" rows="5" required=""></textarea>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Pickup Address -->
<!--  -->
<div class="heading text-center">
    <h3 class="panel-title" style="background-color:gray;color:white;border-radius:20px;">
        <i class="fa fa-map-marker" aria-hidden="true"> &ensp; Pickup Details</i>
    </h3>
</div>
<br>


<div class="form-group">
    <div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <label class="col-md-12" for="confirmpassword">
                    Address <span class="text-danger">*</span>
                </label>
                <div class="col-md-12">
                    <textarea name="pickupadress" class="form-control" placeholder="Enter Customer Address" rows="5" required=""></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-7">
                <label class="col-md-4 control-label" for="val-username">
                    Name<span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="" name="pickupname" class="form-control" placeholder="Customer name" required="">
                </div>
            </div>
            <div class="col-md-5">
                <label class="col-md-4 control-label" for="val-username">
                    Mobile <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="number" id="" name="pickupmobile" class="form-control" placeholder="XXXXXXXXXX" maxlength="10" required="">
                </div>
            </div>
        </div>
        <!--  -->
        <div class="row my-4">
            <div class="col-md-7">
                <label class="col-md-4 control-label" for="email">
                    State <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="" name="pickupstate" class="form-control" placeholder="Enter Customer State" required="">
                </div>
            </div>
            <div class="col-md-5">
                <label class="col-md-4 control-label" for="email">
                    City <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="" name="pickupcity" class="form-control" placeholder="Customer City" value="<?= $pickupstate ?>" required="">
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-7">
                <label class="col-md-4 control-label" for="confirmpassword">
                    Pincode <span class="text-danger">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" id="" name="pickuppincode" class="form-control" placeholder="Customer Pincode" value="<?= $pickuppin ?>" required="">
                </div>
            </div>  
            <!--<div class="col-md-7">-->
            <!--    <label class="col-md-4 control-label" for="email">-->
            <!--        GSTIN <span class="text-danger"> &ensp; </span>-->
            <!--    </label>-->
            <!--    <div class="col-md-8">-->
            <!--        <input type="text" id="" name="pickupgstin" class="form-control" placeholder="Customer City">-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <!--  -->
    </div>
    </div>
</div>
<!-- Pickup Address -->
<div class="col-md-12"><br>
    <div class="form-group form-actions">
        <div class="text-center">
            <button type="submit" class="btn btn-succes" name="submit1" style="background-color: #ffd647;">Submit</button>
        </div>
    </div>
</div>

</form>

<?php


if(isset($submit1)){
// echo "Enter A Action <br>";
$user_id = $_SESSION['useridis'];
    if(empty($pickupaddressid)){
        echo "Pickup Id Not Existes <br>";
        echo $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`, `Active`) VALUES ('$user_id','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity',now(),1)";
        if(mysqli_query($conn,$newpickupaddress)){
            $pickupaddressid = mysqli_insert_id($conn);
        }else{
            // echo "<br> Pickup Else Run <br>";
            echo "<script> window.location.assign('Rsingle_order_book.php?excelfile=No Pickup')</script>";
        }
    }
    // echo "<br>";
    if(empty($itemname)){   $itemname = $itemnamecate; }
    $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`, `additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`,`apihitornot`)
    VALUES ('$ordertype','$user_id','$name','$address','$state','$city','$mobile','$pin','$itemname','$quantity','$widht','$height','$lenght','$actualweight','$totalamount','$invoicevalue','$codamount','$itemextracare',now(),'Single','$pickupaddressid','$pickupaddressid','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity','Pending','Pending','Upload','1')";
// 
    if(mysqli_query($conn,$singlequery)){
        // echo "<br> Query Run <br>";
// Last Insert ID
    $last_id = mysqli_insert_id($conn);
    $orderidcreate = "RPDX00".$last_id;
    $orderno = $orderidcreate;
    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$updateorderid);
// Last Insert ID
        // echo "<br> If Run <br>";
    unset($_SESSION['estimatedetails']);
    // $orderno = 5509;
        echo "<script> window.location.assign('Rsingle_order_book_API.php?orderno=$orderno&excelfile=Update')</script>";
    }else{
        // echo "run else";
        echo "<script> window.location.assign('Rsingle_order_book.php?excelfile=No Update')</script>";
    }
//
}
?>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
