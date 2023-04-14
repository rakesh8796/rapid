<?php
  include "Layout_Header-retailer.php";
?>

<!--  Header  -->
<?php
include "retailer-header-bulk.php";
?>
<!--  Header  -->

<body>
<div class="loader"></div>
<div id="app">
<div class="main-wrapper main-wrapper-1">
<div class="navbar-bg"></div>

<!-- Topbar -->
<?php
include "retailer-header-topbar.php";
?>
<!-- Topbar -->


<div class="main-sidebar sidebar-style-2">

<!--  Sidebar  -->
<?php
include "retailer-sidebar.php";
?>
<!--  Sidebar  -->




<style>

.wizard>.actions>.waves-effect {
    display: none !important;
}
    
</style>



</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form action="#" >
<div class="modal-dialog modal-dialog-centered" role="document">

<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalCenterTitle">Enter location Pincode</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div>
<div class="form-group">
<label>Pickup Pincode</label>
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">
<i data-feather="map-pin"></i>
</div>
</div>
<input type="text" class="form-control phone-number">
</div>
</div>
<div class="form-group">
<label>Delivery Pincode</label>
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">
<i data-feather="map-pin"></i>
</div>
</div>
<input type="text" class="form-control phone-number">
</div>
</div>
</div>
</div>
<div class="modal-footer bg-whitesmoke br">
<a href="book-single-order.php"> <button type="button" class="btn btn-primary">Save </button></a>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</form>
</div>






















<!-- Rate Calculations  -->
<script type="text/javascript">
function oripindetails(a){
  var pinlen = a.length;
  if(pinlen==6){
      var pincode = a;

// City
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-origin-city.php',
    data:{pincode:pincode,pintype:"origin"},
    success: function (data) {
        $("#originpin-city").val(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// State
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-origin-state.php',
    data:{pincode:pincode,pintype:"origin"},
    success: function (data) {
        $("#originpin-state").val(data);
        $("#originpin-state-show").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Country
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-origin-country.php',
    data:{pincode:pincode,pintype:"origin"},
    success: function (data) {
        $("#originpin-country").val(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });


    }

// Calculation Check
    precheckcalculaterate();
// Estimate Amount
    checklaneandamt();
// Estimate Amount
    calculaterate();
// Calculate Couries Details
    calculateraterefresh();

}



function despindetails(a){
  var pinlen = a.length;
  if(pinlen==6){
      var pincode = a;

// City
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-destin-city.php',
    data:{pincode:pincode,pintype:"destin"},
    success: function (data) {
        $("#destinationpin-city").val(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// State
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-destin-state.php',
    data:{pincode:pincode,pintype:"destin"},
    success: function (data) {
        $("#destinationpin-state").val(data);
        $("#destinationpin-state-show").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Country
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-destin-country.php',
    data:{pincode:pincode,pintype:"destin"},
    success: function (data) {
        $("#destinationpin-country").val(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });


    }



// Calculation Check
    precheckcalculaterate();
// Estimate Amount
    checklaneandamt();
// Estimate Amount
    calculaterate();
// Calculate Couries Details
    calculateraterefresh();
}







function precheckcalculaterate(){
    var oripin = $("#originpincode").val();
    var destinpin = $("#destinationpincode").val();
// Distance Between
    $.ajax({
        type: "GET",
        url: 'retailer-pin-2-pin-distancemain-calcuate.php',
        data:{oripin:oripin,destinpin:destinpin},
        success: function (data) {
            $("#distancebtwn").val(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
    $.ajax({
        type: "GET",
        url: 'retailer-pin-2-pin-distance-calcuate.php',
        data:{oripin:oripin,destinpin:destinpin},
        success: function (data) {
            $("#distancebtwnkm").val(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
    $.ajax({
        type: "GET",
        url: 'retailer-pin-2-pin-distancekm-calcuate.php',
        data:{oripin:oripin,destinpin:destinpin},
        success: function (data) {
            $("#distancebtwntype").val(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
// Distance Between
}




// checklaneandamt();

function checklaneandamt(){
    zone = $("#zonebtwn1").val();
    paymode = $("#paymentmode").val();
    prodamt = $("#totalamount").val();
    freightWeightare = $("#FreightWeightare").val();

    // alert(param);
    $.ajax({
        type: "GET",
        url: 'retailer-calculator-single-booking.php',
        data:{param:zone,paymode:paymode,prodamt:prodamt,freightWeightare:freightWeightare},
        success: function (data) {
          // console.log(data);
          $("#b2c_calculate_list").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
}











function calculaterate(){
    // alert('working');
    var oripin = $("#originpincode").val();
    var oripincity = $("#originpin-city").val();
    var oripinstate = $("#originpin-state").val();
    var oripincountry = $("#originpin-country").val();

    var destinpin = $("#destinationpincode").val();
    var destinpincity = $("#destinationpin-city").val();
    var destinpinstate = $("#destinationpin-state").val();
    var destinpincountry = $("#destinationpin-country").val();

    var distancebtwn = $("#distancebtwn").val();

    var distancebtwnkm0 = $("#distancebtwnkm").val();
    // alert(distancebtwnkm0);
    distancebtwnkm0 = distancebtwnkm0.replace(",", "");
    // alert(distancebtwnkm0);

    var distancebtwnkm = parseFloat(distancebtwnkm0);

    var distancebtwntype = $("#distancebtwntype").val();

    var actualweight = $("#actualweight").val();

    var lenghtcm = $("#lenghtcm").val();
    var heightcm = $("#heightcm").val();
    var breadthcm = $("#breadthcm").val();

    var valueininr = $("#valueininr").val();
    var paymentmode = $("#paymentmode").val();
    var servicestype = $("#servicestype").val();
    var productamount = $("#productamount").val();

  
// Check Zone C
const metrostates = ["New Delhi", "Delhi", "Mumbai", "Kolkata", "Chennai", "Bangalore", "Hyderabad","Ahmedabad","Pune","Visakhapatnam","Surat","Jaipur","Coimbatore","Kanpur","Nagpur","Raipur","Kochi","Kozhikode","Nashik","Salem","Thiruvananthapuram","Madurai","Jodhpur"];
var pickmertocityis = metrostates.includes(oripincity);
var destmertocityis = metrostates.includes(destinpincity);


// Check Zone E
const ezonestates = ["Kerala", "Himachal Pradesh", "kashmir"];
var   ezonecheckdest = ezonestates.includes(destinpinstate);

// Check Zone F
const fzonestates = ["Andaman and Nicobar Islands", "Manipur", "Jammu"];
var   fzonecheckdest = fzonestates.includes(destinpinstate);

// Check Zone J&K
const jkzonestates = ["Jammu And kashmir"];
var   jfzonecheckdest = jkzonestates.includes(destinpinstate);




    if(oripincity === destinpincity){
        $("#zonebtwn").html("A");
        $("#zonebtwn1").val("A");

// Temp Code
    }else if(jfzonecheckdest){
        $("#zonebtwn").html("F");
        $("#zonebtwn1").val("F");
// Temp Code

    }else if(ezonecheckdest){
        $("#zonebtwn").html("E");
        $("#zonebtwn1").val("E");


    }else if(fzonecheckdest){
        $("#zonebtwn").html("F");
        $("#zonebtwn1").val("F");


    }else if(oripinstate === destinpinstate){
        $("#zonebtwn").html("C");
        $("#zonebtwn1").val("C");

    }else if(distancebtwnkm < 500){
        $("#zonebtwn").html("B");
        $("#zonebtwn1").val("B");

    }else if(pickmertocityis === destmertocityis){
        $("#zonebtwn").html("C");
        $("#zonebtwn1").val("C");

    }else if(distancebtwnkm < 2500){
        $("#zonebtwn").html("D");
        $("#zonebtwn1").val("D");

    }else{
        $("#zonebtwn").html("Soon");
        $("#zonebtwn1").val("Soon");
        
    }



    $("#pikcuppinno").html(oripin);
    $("#destinpinno").html(destinpin);

    $("#servicebtwn").html(servicestype);
    $("#distncebtwn").html(distancebtwn);

    
}
</script>
<!-- Rate Calculations  -->

<script type="text/javascript">
function calculateraterefresh() {
    // Calculation Check
        precheckcalculaterate();
    // Estimate Amount
        checklaneandamt();
    // Estimate Amount
        calculaterate()
}
</script>







<input type="hidden" id="zonebtwn1">
<!-- <span id="zonebtwn1">Zone</span> -->











<!-- Main Content -->

<div class="main-content">
<section class="section">
<div class="section-body">

<?php
if($_GET['excelfile'] == 'Update'){
  echo "<div class='alert alert-success'>Order Booked Successfully</div>";
}elseif($_GET['excelfile'] == 'No Update'){
  echo "<div class='alert alert-danger'>Order Not Booked | Please Try Again</div>";
}
?>


<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">






<div class="card-header">
<h4>BOOK NEW ORDER</h4>
</div>
<div class="card-body">

<form action="retailer-book-single-order-upload.php" id="wizard_with_validation" method="POST">
<h3> Product Details</h3>
<fieldset>
<div class="form-group form-float">
    <div class="form-line">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">

                    <select class="form-control" name="itemnamecate">
                        <option>Product Category*</option>
                        <option value="Apparel And Accessories">Apparel And Accessories</option>
                        <option value="Automotives">Automotives</option>
                        <option value="Baby Care">Baby Care</option>
                        <option value="Books And Stationery">Books And Stationery</option>
                        <option value="Consumables FMCG">Consumables FMCG</option>
                        <option value="Documents">Documents</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Household Items">Household Items</option>
                        <option value="Sports Equipments">Sports Equipments</option>
                        <option value="Covid Essentials">Covid Essentials</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <select class="form-control" name="itemnamedemo">
                        <option value="">Product Sub Category*</option>
                        <option value="Apparel And Accessories">Apparel And Accessories</option>
                        <option value="Automotives">Automotives</option>
                        <option value="Baby Care">Baby Care</option>
                        <option value="Books And Stationery">Books And Stationery</option>
                        <option value="Consumables FMCG">Consumables FMCG</option>
                        <option value="Documents">Documents</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Household Items">Household Items</option>
                        <option value="Sports Equipments">Sports Equipments</option>
                        <option value="Covid Essentials">Covid Essentials</option>
                        <option value="Other">Other</option>

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"><select class="form-control" name="itemextracare">
                        <option>Additional Details*</option>
                        <option value="General">General</option>
                        <!--<option value="Dengerous Goods">Dangerous Goods</option>-->
                        <option value="Extra Care">Extra Care</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Payment Mode*</label>
                <div class="form-group">
                    <select class="form-control" id="paymentmode" name="ordertype" onchange="yesnoCheck(this);">
                        <option value="Prepaid">Prepaid</option>
                        <option value="COD">COD</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 " id="ifYes" style="display:none;"><label class="form-label">COD Amount*</label>
                <input type="number" class="form-control" value="1" min="1" name="codamount" required>
            </div>
            <div class="col-md-3"><label class="form-label">Actual Weight (Kg)*</label>
                <input type="number" class="form-control" name="actualweight" id="actualweight" onkeyup="freightWeight()" step="any" min="0.1" required>
            </div>
<!--<div class="col-md-3">-->
<!--<label class="form-label">Service Mode*</label>-->
<!--<div class="form-group">-->
<!--<select class="form-control" name="service1_mode">-->
<!--<option value="Surface Travel">Surface Travel</option>-->
<!--<option value="Air Travel">Air Travel</option>-->
<!--</select>-->
<!--</div>-->
<!--</div>-->

        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Packet Length*</label>
                <input type="number" class="form-control" name="lenght" id="vlength" min="1" onkeyup="VolumetricWeightCal(this.value,'length')" required>
            </div>
            <div class="col-md-3"><label class="form-label">Packet Breadth (cm) *</label>
                <input type="number" class="form-control" name="widht" id="vbreadth" min="1" onkeyup="VolumetricWeightCal(this.value,'breadth')" required>
            </div>
            <div class="col-md-3"><label class="form-label">Packet Height (cm)*</label>
                <input type="number" class="form-control" name="height" min="1" id="vheight" onkeyup="VolumetricWeightCal(this.value,'height')" required>
            </div>
            <div class="col-md-3"><label class="form-label">Volumetric Weight (Kg).*</label>
                <!--<input type="number" class="form-control" name="VolumetricWeightshow" id="VolumetricWeightshow" min="0.1" required>-->
                <input type="text" name="VolumetricWeightshow" id="VolumetricWeightshow"  class="form-control" placeholder="Vol Weight" title="Volumetric Weight" readonly />
                <input type="hidden" name="VolumetricWeight" id="VolumetricWeight">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-3">
                <label class="form-label">No of Quantity*</label>
                <input type="number" class="form-control" name="quantity" min="1" maxlength="2" required>
            </div>
            <!--<div class="col-md-3"><label class="form-label">Invoice Value*</label>-->
            <!--    <input type="number" class="form-control" min="1" name="invoicevalue">-->
            <!--</div>-->
            <div class="col-md-3"><label class="form-label">Invoice/Total Amount*</label>
                <input type="number" class="form-control" min="1" name="totalamount" id="totalamount" required>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Chargeable Weight(Kg)</label>
                    <div class="input-group">
<input type="text" name="FreightWeightshow" id="FreightWeightshow"  class="form-control" placeholder="Freight Weight" title="Freight Weight" readonly />

                    </div>
                </div>
            </div>

        </div>
    </div>


<input type="hidden" name="FreightWeightare" id="FreightWeightare">
<input type="hidden" name="distancebtwn"  id="distancebtwn">
<input type="hidden" name="distancebtwnkm"  id="distancebtwnkm">
<input type="hidden" name="distancebtwntype"  id="distancebtwntype">


<!-- Volumetric Weight Calculator -->
<script type="text/javascript">
function VolumetricWeightCal(datachange,cateis){
    var vlength = $("#vlength").val();
    var vlengthlen = vlength.length;
    if(vlengthlen == 0){    vlength = 1;    }

    var vbreadth = $("#vbreadth").val();
    var vbreadthlen = vbreadth.length;
    if(vbreadthlen == 0){    vbreadth = 1;    }

    var vheight = $("#vheight").val();
    var vheightlen = vheight.length;
    if(vheightlen == 0){    vheight = 1;    }

    var valumetricweight = vlength*vbreadth*vheight / 5000;
    valumetricweightshow = valumetricweight + " KG";
    $("#VolumetricWeight").val(valumetricweight);
    $("#VolumetricWeightshow").val(valumetricweightshow);

    freightWeight();
}

// Freight Weight Calculation
function freightWeight(){
        var actualweight = $("#actualweight").val();
        var VolumetricWeight = $("#VolumetricWeight").val();
    var Weightpick = actualweight;

    if(VolumetricWeight>actualweight){
        var Weightpick = VolumetricWeight;
    }

    Weightpickshow = Weightpick + " KG";
    $("#FreightWeightare").val(Weightpick);
    $("#FreightWeightshow").val(Weightpickshow);
}
</script>
<!-- Volumetric Weight Calculator -->

</fieldset>
<h3>Sender Details and Destination Details</h3>
<fieldset>
<div class="form-group form-float">
    <h4>Pickup Details</h4>
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
            <input type="number" class="form-control" maxlength="6" id="originpincode" name="pickuppincode" onkeyup="oripindetails(this.value)" required>
<input type="hidden" name="originpin-city" id="originpin-city">
<input type="hidden" name="originpin-state"  id="originpin-state">
<input type="hidden" name="originpin-country"  id="originpin-country">
<!-- <span class="text-center" id="originpin-state-show">text</span> -->
        </div>

    </div>
</div>
<div class="form-group form-float">
    <h4>Droppoint/ Destination Details</h4>

    <div class="form-group form-float">
        <h4></h4>
        <div class="form-line">
            <label class="form-label">Address *</label>
            <textarea class="form-control" required="" name="address"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Name*</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="col-md-6"><label class="form-label">Mobile *</label>
            <input type="number" class="form-control" name="mobile" maxlength="10" required>

        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">State*</label>
            <input type="text" class="form-control" name="state" required>
        </div>
        <div class="col-md-3"><label class="form-label">City*</label>
            <input type="text" class="form-control" name="city" required>
        </div>
        <div class="col-md-3"><label class="form-label">Pincode*</label>
            <input type="number" class="form-control" name="pin" id="destinationpincode" maxlength="6" onkeyup="despindetails(this.value)" required>
<input type="hidden" name="destinationpin-city"  id="destinationpin-city">
<input type="hidden" name="destinationpin-state"  id="destinationpin-state">
<input type="hidden" name="destinationpin-country"  id="destinationpin-country">
<!-- <span class="text-center" id="destinationpin-state-show">text</span> -->
        </div>

    </div>
</div>


</fieldset>
<h3>Select Courier Services</h3>
<fieldset>




<?php
$query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id' AND `status`='TXN_SUCCESS' ORDER BY `wallet_id` desc";
$data1 = mysqli_query($conn,$query1);
$res1 = mysqli_fetch_assoc($data1);
if(empty($res1['crt_amt'])){
    $tamt = 0;
}else{
    $tamt = $res1['crt_amt'];
}
?>


<?php 
if($tamt<500){
?>
    <div class="alert alert-warning" role="alert">
         Balance Low |  Reachage Now
    </div>
<?php
}elseif($tamt==500){
?>
    <div class="alert alert-warning" role="alert">
         Balance Low |  Reachage Now
    </div>
<?php
}else{
?>

<div class="col-12 col-md-12 col-lg-12">

<div class="card-header">
<h4>Select Courier Services</h4>
</div>
<div class="card-body">


<div id="b2c_calculate_list">Workng</div>



</div>

</div>

<?php
}
?>





</fieldset>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

</div>

</div>
</div>
<script>
function yesnoCheck(that) {
if (that.value == "COD") {

document.getElementById("ifYes").style.display = "block";
} else {
document.getElementById("ifYes").style.display = "none";
}
}
</script>


<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/form-wizard.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>


</body>


<!-- form-wizard.html  21 Nov 2019 03:55:20 GMT -->

</html>

