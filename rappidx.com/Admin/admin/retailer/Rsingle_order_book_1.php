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
    
echo "Working <br>";
$estimatedetails = $_SESSION['estimatedetails'];
print_r($estimatedetails);


echo "<br>";
echo $pickuppin = $estimatedetails['pickuppin'];
echo $pickupstate = $estimatedetails['pickupstate'];
echo $destipin = $estimatedetails['destinpin'];
echo $destistate = $estimatedetails['destinstate'];
echo $zone = $estimatedetails['zone'];
echo $actulweight = $estimatedetails['actualweight'];
echo $vollength = $estimatedetails['vollength'];
echo $volbreadth = $estimatedetails['volbreadth'];
echo $volheight = $estimatedetails['volheight'];
echo $volweight = $estimatedetails['volumentriweight'];
echo $procategory = $estimatedetails['prodcategroy'];
echo $proamt = $estimatedetails['prodamt'];
echo $mode = $estimatedetails['mode'];
echo $estimateamt = $estimatedetails['estimateamt'];





 $pickuppin
 $pickupstate
 $destipin 
 $destistate
 $zone 
 $actulweight
 $vollength 
 $volbreadth 
 $volheight 
 $volweight 
 $procategory 
 $proamt 
 $mode 
 $estimateamt 

?>


<section class="content">
<!--main content-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">

<div class="panel-heading" style="background-color:#33333373;padding:1px 0px 0px 20px;border-radius:10px 10px 0px 0px">
<h5 style="color:#333333;font-weight:100"><b>Book New Order</b></h5>
</div>
<div class="panel-body">
<!--  --><!--  -->
<div class="heading text-center">
    <h3 class="panel-title" style="background-color:gray;color:white;border-radius:20px;">
        <i class="fa fa-map-marker" aria-hidden="true"> &ensp; Droppoint/ Destination Details</i>
    </h3>
</div>
<br>

<div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Customer Name<span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="val-username" name="name" class="form-control" placeholder="Enter Customer name">
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Customer Mobile <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="password" name="mobile" class="form-control" placeholder="Enter Customer Mobile No.">
        </div>
    </div>

    </div>
</div>
<!--  --><!--  -->
</div>
</div>
</div>
</div>
</section>
















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
        <select id="select21" name="ordertype" onchange="ManageProdName(this.value)" class="form-control select2" style="width:100%" required="">
                <option value="">Product Category * </option>
                <option value="Document">Document</option>
                <option value="Watch">Watch</option>
                <option value="Medicine">Medicine</option>
                <option value="Parcel">Parcel</option>
                <option value="Others">Others</option>
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
        <label class="col-md-6 text-left control-label" for="val-username">
            Order Type
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-6">
            <select id="select21" name="ordertype" class="form-control select2" style="width:100%" required="">
                    <option value="COD" selected>COD</option>
                    <option value="Prepaid">Prepaid</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <input type="number" id="confirmpassword" name="quantity" class="form-control" placeholder="No Of Quantity *" min="1" required="">
    </div>
    <div class="col-md-4">
        <input type="text" id="confirmpassword" name="codamount" class="form-control" placeholder="Cod Amount *">
    </div>
    <div class="col-md-4">
        <input type="text" id="confirmpassword" name="invoicevalue" class="form-control" placeholder="Invoice Value">
    </div>
</div>

<div class="form-group">
    <div class="col-md-4">
        <input type="text" id="width" name="widht" class="form-control" placeholder="Enter Width *">
    </div>
    <div class="col-md-4">
        <input type="text" id="height" name="height" class="form-control" placeholder="Enter Height *">
    </div>
    <div class="col-md-4">
        <input type="text" id="lenght" name="lenght" class="form-control" placeholder="Enter Lenght *">
    </div>
</div>
<div class="form-group">
    <div class="col-md-4">
        <input type="text" name="actualweight" class="form-control" placeholder="Enter Actual Weight" id="actualweight">
    </div>
    <div class="col-md-4">
        <input type="text" name="totalamount" class="form-control" placeholder="Total Amount" id="totalamount">
    </div>
    <div class="col-md-4">
        <select id="select21" name="itemextracare" class="form-control select2">
                <option value="No">Additional Details </option>
                <option value="Dengerous">Dengerous Good</option>
                <option value="Extra Care">Extra Care</option>
        </select>
    </div>
</div>
<!-- Image -->
<div class="form-group text-center">
    Upload Product Images    <hr>
    <div class="col-md-3">
        <span><b>Product Image</b></span>
        <input type="file" id="img1" name="img1" class="form-control">
    </div>
    <div class="col-md-3">
        <span><b>Product Height</b></span>
        <input type="file" id="img1" name="img1" class="form-control">
    </div>
    <div class="col-md-3">
        <span><b>Product Width</b></span>
        <input type="file" id="img1" name="img1" class="form-control">
    </div>
    <div class="col-md-3">
        <span><b>Product Length</b></span>
        <input type="file" id="img1" name="img1" class="form-control">
    </div>
</div>
<!-- Image -->










<div class="heading text-center">
    <h3 class="panel-title" style="background-color:gray;color:white;border-radius:20px;">
        <i class="fa fa-map-marker" aria-hidden="true"> &ensp; Droppoint/ Destination Details</i>
    </h3>
</div>
<br>

<div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Customer Name<span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="val-username" name="name" class="form-control" placeholder="Enter Customer name">
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Customer Mobile <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="password" name="mobile" class="form-control" placeholder="Enter Customer Mobile No.">
        </div>
    </div>
    </div>
</div>


<div class="form-group">
    <div class="row">
    <div class="col-md-12">
        <label class="col-md-2 control-label" for="email">
            Customer Address <span class="text-danger">*</span>
        </label>
        <div class="col-md-10">
            <input type="text" id="email" name="address" class="form-control" placeholder="Enter Customer Address">
        </div>
    </div>
    </div>
</div>


<div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="email">
            Customer State
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="email" name="state" class="form-control" placeholder="Enter Customer State">
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="email">
            Customer City
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="email" name="city" class="form-control" placeholder="Enter Customer City">
        </div>
    </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="confirmpassword">
            Customer Pin <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="confirmpassword" name="pin" class="form-control" placeholder="Enter Customer Pincode">
        </div>
    </div>
    <!-- <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Order Type
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <select id="select21" name="ordertype" class="form-control select2" style="width:100%" required="">
                    <option value="">Select Order Type </option>
                    <option value="COD">COD</option>
                    <option value="Prepaid">Prepaid</option>
            </select>
        </div>
    </div> -->
    </div>
</div>







<script>
    $(document).ready(function() {
        $('#actualweight').keyup(function(ev) {
            var i=1;
            var j=500;
            var totalamount = 0;
            var total = $('#actualweight').val() * 1;
            while(i<total && total<=j || total>=j){

            var totalamount = totalamount+150;
            i = j;
            j = j + 500;
            }
            var divobj = document.getElementById('totalamount');
            divobj.value = totalamount;
        });
    });
</script>




<!-- Pickup Address -->
<!--  -->
<script>
function showallordershere(param) {
    // alert(param);
    if(param==null){
        alert('null');
    }else{
      $.ajax({
        type: "GET",
        url: "PickupAddress/pickupaddresss.php",
        data:{param:param},
        success: function (data) {
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    }
};
</script>


<div class="heading text-center">
    <h3 class="panel-title" style="background-color:gray;color:white;border-radius:20px;">
        <i class="fa fa-map-marker" aria-hidden="true"> &ensp; Pickup Details</i>
    </h3>
</div>
<br>

<div class="col-md-12">
    <div class="col-md-4">
        <select class="form-control" onchange="showallordershere(this.value)" required="">
            <option value=""><b>Select Pickup Address</b></option>
            <option value="newaddress"><b>Create New Pickup Address</b></option>
            <?php
                $pickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `User_Id`='$user_id'";
                $pickupaddressr = mysqli_query($conn,$pickupaddress);
                while($pickures = mysqli_fetch_assoc($pickupaddressr))
                {
            ?>
            <option value="<?= $pickures['Address_Id'] ?>"><?= $pickures['Name'] ?>(<?= $pickures['Address_Id'] ?>)</option>
            <?php
                }
            ?>
        </select>
    </div>
    <div class="col-md-8"></div>
</div>

<div class="col-md-12" id="All_Records">
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
</div>

<!-- Pickup Address -->


<div class="col-md-12"><br>
    <div class="form-group form-actions">
        <div class="text-center">
            <button type="submit" class="btn btn-succes" name="submit1" style="background-color: #ffd647;">Submit</button>
            <button type="reset" class="btn btn-effect-ripple btn-default reset_btn" style="background-color: #ffd647;">Reset
            </button>
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
    $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`, `additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`)
    VALUES ('$ordertype','$user_id','$name','$address','$state','$city','$mobile','$pin','$itemname','$quantity','$widht','$height','$lenght','$actualweight','$totalamount','$invoicevalue','$codamount','$itemextracare',now(),'Single','$pickupaddressid','$pickupaddressid','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity','Pending','Pending','Upload')";
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
        echo "<script> window.location.assign('Rsingle_order_book.php?excelfile=Update')</script>";
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
