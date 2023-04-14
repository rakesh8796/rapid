<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->



<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Calculate Estimate Amount</h4>
  </div>
</div>






<section class="content">
<div class="container">
<div class="row" >



<!--  -->
<?php 

    // echo $zonerate = "SELECT * FROM `asitfa_user` WHERE `User_Id`='29'";
    // $zonerater = mysqli_query($conn,$zonerate);
    // $zoneres = mysqli_fetch_assoc($zonerater);
    // print_r($zoneres);
/*
    echo $query = "SELECT * FROM `zone_citywise` WHERE `pickup_city`='Pune' AND `destination_city`='Pune'";
    echo "<br>";
    $fdata = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($fdata);
    echo "<br>";
    echo $result['zone_category'];
    echo "<br>";
    print_r($result);
*/
?>
<!--  -->



<div class="col-md-1"><br>
    <!--<img src="img/Calculator/2.png" style="width:80%;margin:15px 0px 0px 35px;">-->
</div>
<div class="col-md-10">
<div class="row" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;border-radius:20px">


<div class="col-md-12">
    <section class="" style="padding:0px 0px 0px 0px !important">
    <div class="">
        <h2 class="text-center signuptxt"><a href="Rcalculator.php"><b><u>
         Calculate Estimate Amount 
        </u></b></a></h2>
    </div>
    </section>
</div>

<div class="container">
<!-- Row 1 -->
<div class="container-fluid">
<div class="col-md-6">
    <div class="row">
        <div class="col-md-4" title="Enter Pickup Pincode">
            <div class="input-group">
            <input type="text" class="form-control signuptxt" name="pickuppincode" id="pickuppincode" value="" placeholder="PickUp Pin" onkeyup="pickuppincodefun(this.value,'originpincode')" style="border-radius:5px !important;" maxlength="6">
            </div>
        </div>
        <div class="col-md-8 text-center">
            <b><span id="originpincodestatus"></span></b>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="col-md-4" title="Enter Destionation Pincode">
        <div class="input-group">
        <input type="text" class="form-control signuptxt" name="destinationpincode" id="destinationpincode" value="" placeholder="Desti Pin" onkeyup="destinationpincodefun(this.value,'destinpincode')" style="border-radius:5px !important;" maxlength="6" title="Destionation Pincode">
        </div>
    </div>
    <div class="col-md-8 text-center">
        <b><span id="destinationpincodestatus"></span></b>
    </div>
</div>
</div>
<!-- Row 1 / -->
<br><hr>
<style type="text/css">
.weightfontchange{
    font-size:13px;
}
</style>
<!-- Row 2 -->
<div class="row" title="Actual Weight">
    <div class="col-md-2">
        <span style="font-size:13px"><b><u> Actual Weight </u></b></span>
    </div>
    <div class="col-md-2 weightfontchange">
        <label><strong> <input type="radio" name="weightcategory" id="gm500" value="gm500" title="0-500gm" checked>&ensp; 0-500gm </strong></label>
    </div>
    <div class="col-md-2 weightfontchange">
        <label><strong> <input type="radio" name="weightcategory" id="kg1" value="kg1" title="500gram-1kg">&ensp; 0.5gm-1kg </strong></label>
    </div>
    <div class="col-md-2 weightfontchange">
        <label><strong> <input type="radio" name="weightcategory" id="kg2" value="kg2" title="1-2kg">&ensp; 1-2kg </strong></label>
    </div>
    <div class="col-md-2 weightfontchange">
        <label><strong> <input type="radio" name="weightcategory" id="kg5" value="kg5" title="2-5kg">&ensp; 2-5kg </strong></label>
    </div>
    <div class="col-md-2 weightfontchange">
        <label><strong> <input type="radio" name="weightcategory" id="kg10" value="kg10" title="5-10kg">&ensp; 5-10kg </strong></label>
    </div>
</div>
<!-- Row 2 / -->
<!-- Rwo 3 -->
<hr>
<div class="row" title="Volumetric Weight">
<div class="col-md-2">
    <span style="font-size:13px"><b><u>Volumetric Wt. </u></b></span>
</div>
<div class="col-md-10">
    <div class="col-md-3">
        <input type="number" name="vlength" id="vlength" class="form-control" placeholder="*Lenght" min="1" title="Lenght" onkeyup="VolumetricWeightCal(this.value,'length')">
    </div>
    <div class="col-md-3">
        <input type="number" name="vbreadth" id="vbreadth" class="form-control" placeholder="*Breadth" title="Breadth" onkeyup="VolumetricWeightCal(this.value,'breadth')">
    </div>
    <div class="col-md-3">
        <input type="number" name="vheight" id="vheight" class="form-control" placeholder="*Height" title="Height" onkeyup="VolumetricWeightCal(this.value,'height')">
    </div>
    <div class="col-md-3">
        <input type="text" name="VolumetricWeightshow" id="VolumetricWeightshow"  class="form-control" placeholder="Vol Weight" title="Volumetric Weight" readonly />
        <input type="hidden" name="VolumetricWeight" id="VolumetricWeight">
    </div>
</div>

</div>
<hr>
<!-- Row 3 / -->
<!-- Row 4 -->
<div class="row">
    <div class="col-md-4" title="Product Category">
        <div class="input-group">
            <select class="form-control" id="productcategory"style="border-radius:5px !important;height:38px !important;">
                <option value="0">- - - Select Category  - - - </option>
                <option value="Apparel And accessories">Apparel & accessories</option>
                <option value="Automotives">Automotives</option>
                <option value="Baby Care">Baby Care</option>
                <option value="Books And Stationery">Books & Stationery</option>
                <option value="Consumables FMCG">Consumables/ FMCG</option>
                <option value="Documents">Documents</option>
                <option value="Electronics">Electronics</option>
                <option value="Household Items">Household Items</option>
                <option value="Sports Equipments">Sports Equipments</option>
                <option value="Covid 19 Essentials">Covid - 19 Essentials</option>
                <option value="Others">Others</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 text-center" title="Product COD Amount">
        <input type="text" id="codamt" name="codamt" class="form-control" placeholder="* Product Amount">
    </div>
    <div class="col-md-4 text-center" title="Payment Mode">
        <!-- <span><b><u> Payment Mode </u></b></span> <br> -->
        <label title="COD Courier"><strong> 
            <input type="radio" name="paymenttype" id="paymenttypecod" value="cod" checked> COD 
        </strong></label>
        &ensp;&ensp;&ensp;
        <label title="Prepaid Courier"><strong> 
            <input type="radio" name="paymenttype" id="paymenttypeprepaid" value="prepaid"> PREPAID     
        </strong></label>
    </div>
<!--     <div class="col-md-4 text-center">
        <span><b><u> Estimate Amount </u></b></span> <br>
        <input type="text" name="estimateamount" id="estimateamount"  class="form-control" placeholder="Total Amount" title="Total Amount" readonly />
    </div> -->
</div>
<!-- Row 4 / -->

<br>
<!-- Estimate Amt Show -->
<span id="estimateamtshow"></span>
<!-- Estimate Amt Show -->
<br>


</div>
<div class="col-md-12">
<section class="" style="padding:0px 0px 20px 0px !important">
    <div class="row">
    <div class="col-md-1"></div> 
    <div class="col-md-10"> 
        <div class="btnn">
            <input type="hidden" id="originpickupstatus">
            <input type="hidden" id="destinpickupstatus">
            <button type="submit" id="calculateestimateamtis" class="btn" style="background:gray;color:white;width:100%;border-radius:5px !important;" onclick="CalculateEstimateAmt()">Calculate Estimate Amount</button>
        </div>
        <center>
            <a href="Rsingle_order_book.php" id="singlebooking" class="btn text-center" style="background:gray;color:white;width:50%;border-radius:5px !important;display:none;margin-top:10px;">Book Now</a>
        </center>
    </div>
    <div class="col-md-1"></div> 
    </div> 
</section>
<!-- <section class="" style="padding:0px 0px 50px 0px !important">
    <div class=""> 
        <div class="btnn">
            <input type="hidden" id="originpickupstatus">
            <input type="hidden" id="destinpickupstatus">
            <button type="submit" class="btn" style="background:gray;color:white;width:100%;border-radius:5px !important;" onclick="CalculateEstimateAmt()">Calculate Estimate Amount</button>
        </div>
    </div>
</section> -->




</div>

</div>
</div>
<div class="col-md-1"><br>
</div>
<!-- <div class="col-md-2"></div> -->

</div>
</div>

</section>



<!-- Volumetric Weight Calculator -->
<script type="text/javascript">
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


<!-- Pincode Calculator -->
<script type="text/javascript">
// Origin Pincode
var origin_var = '';
function pickuppincodefun(param,cateis){
    var resultis = param.length;
    if(resultis == 6){
        console.log("Pickup");
        console.log(param);
        console.log(cateis);
        $.ajax({
        type: "GET",
        url: 'RateCalculator/OriginPincodeServiceCheck.php',
        data:{Originpincode:param,CateName:cateis},
        success: function (data) {
            data = data.split('####');
            $("#originpincodestatus").html(data[0]);
            origin_var = data[1];
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
            type: "GET",
            url: 'RateCalculator/CheckOriginPincodeService.php',
            data:{Originpincode:param,CateName:"OriginPincode"},
            success: function (data) {
                $("#destinpickupstatus").val(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }   
}
// Origin Pincode
// Destination Pincode
function destinationpincodefun(param,cateis){
    var resultis = param.length;
    // alert(param);
    if(resultis == 6){
        console.log("Destination");
        console.log(param);
        console.log(cateis);
        $.ajax({
        type: "GET",
        url: 'RateCalculator/DestinationPincodeServiceCheck.php',
        data:{Destinationpincode:param,CateName:cateis},
        success: function (data) {
            data = data.split('####');
            $("#destinationpincodestatus").html(data[0]);
            if(data[1] == origin_var){
                usr_id = '<?php echo $_SESSION['useridis'] ?>';
                get_rto(usr_id);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
        });
        $.ajax({
            type: "GET",
            url: 'RateCalculator/CheckDestinationPincodeService.php',
            data:{Destinationpincode:param,CateName:"DestinationPincode"},
            success: function (data) {
                $("#originpickupstatus").val(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
}
// Destination Pincode
function get_rto(id){
    $.post('rtocode.php', {id}, function(data){
        alert(data.trim());
    });
}



// Estimate Amout
function CalculateEstimateAmt(){

var origincity = $("#originpincodestatus").html();
var destinationcity = $("#destinationpincodestatus").html();
var productcategoryis = $("#productcategory").val();
// alert(productcategoryis);


var paymentmode = "COD";
if(document.getElementById('paymenttypecod').checked == true){     paymentmode = "COD";   }
if(document.getElementById('paymenttypeprepaid').checked == true){ paymentmode = "Prepaid";}
// alert("Mode : " + paymentmode);

var weightselectis = "gm500";
if(document.getElementById('gm500').checked == true) {  weightselectis = "500";   }
if(document.getElementById('kg1').checked == true) {    weightselectis = "1000";   }
if(document.getElementById('kg2').checked == true) {    weightselectis = "2000";   }
if(document.getElementById('kg5').checked == true) {    weightselectis = "5000";   }
if(document.getElementById('kg10').checked == true) {   weightselectis = "10000";   }
// alert("Wt Cate : " + weightselectis);
var weightselectisa = weightselectis;

var volweightproductgm = 0;
var vlengthis = $("#vlength").val();
var vbreadthis = $("#vbreadth").val();
var vheightis = $("#vheight").val();
var volweightproduct = $("#VolumetricWeight").val();
// alert("Vol.Wt  : " + volweightproduct);
volweightproductgm = volweightproduct * 1000;
var volweightproductgma = volweightproductgm;
// alert("Vol.Wt gm : " + volweightproductgm);



var weightproduct = 0;
if(volweightproductgm < weightselectis){
    weightproduct = weightselectis;
}else{
    weightproduct = volweightproductgm;
}
// alert("Useing Wt is : " + weightproduct)

var gmparts = weightproduct / 500;
// alert("No of gm :" + gmparts);
var noofparts = Math.ceil(gmparts);
// alert("round no of gm :" + noofparts);

var codamtis = $("#codamt").val();

var pickupcheck = 0;
var dropupcheck = 0;
// Original Pincode
var pickuppincheck = $("#pickuppincode").val();
var oripinstate = $("#originpickupstatus").val();
var pickuppincheckis = pickuppincheck.length;
if(pickuppincheckis == 6){
    pickupcheck = 1;
}else{
    alert('Invalid Pickup Pincode');
}
// Original Pincode
// Destination Pincode
var destinpincheck = $("#destinationpincode").val();
var despinstate = $("#destinpickupstatus").val();
var destinpincheckis = destinpincheck.length;
if(destinpincheckis == 6){
    dropupcheck = 1;
}else{
    alert('Invalid Drop Pincode');
}
// Destination Pincode

    if(pickupcheck == 1 &&  dropupcheck == 1){
$("#estimateamtshow").html("<center><img src='img/Loader/ratecale.gif' alt='Loading...' style='width:50px'></center>");
        $.ajax({
        type: "GET",
        url: 'RateCalculator/EstimateAmt.php',
        data:{pickuppincheck:pickuppincheck,destinpincheck:destinpincheck,weightproduct:weightproduct,paymenttype:paymentmode,origincity:origincity,destinationcity:destinationcity,codamtis:codamtis,weightselectisa:weightselectisa,vlengthis:vlengthis,vbreadthis:vbreadthis,vheightis:vheightis,volweightproductgma:volweightproductgma,productcategoryis:productcategoryis},
        success: function (data) {
            $("#estimateamtshow").html(data);
            document.getElementById("calculateestimateamtis").style.display = "none";
            document.getElementById("singlebooking").style.display = "block";
        },
        error: function (data) {
            console.log('Error:', data);
        }
        });
    }
}
// Estimate Amout

</script>
<!-- Pincode Calculator -->











</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
