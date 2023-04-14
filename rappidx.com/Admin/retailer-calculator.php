<?php
  include "Layout_Header-retailer.php";
?>

<!-- Header -->
<?php
    include "retailer-header-bulk.php";
?>
<!-- Header -->

<body>

<div id="app">
<div class="main-wrapper main-wrapper-1">
<div class="navbar-bg"></div>


<!--  Topbar  -->
<?php
include "retailer-header-topbar.php";
?>
<!--  Topbar -->


<div class="main-sidebar sidebar-style-2">

<!-- Sidebar -->
<?php
include "retailer-sidebar.php";
?>
<!-- Sidebar -->


</div>






<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="row">
<div class="col-12 col-sm-12 col-lg-12">
<div class="card ">
<div class="card-header">
<h4>Calculate Estimate Amount</h4>

</div>
<div class="card-body">
<div class="row">
<div class="col-md-12">
<div class="row">
    <div class="col-md-12">
        <div id="nav">
            <a href="#content1" class="btn btn-primary font-18 ">B2C Calculator</a>
            <a href="#content2" class="btn btn-primary font-18"> B2B calculator</a>
            <a href="#content3" class="btn btn-primary font-18">International calculator</a>
        </div>
    </div>
</div>
</div>









<!-- B2B -->
<script type="text/javascript">

// B2C calculator

function oripindetails1(a){
  var pinlen = a.length;
  if(pinlen==6){
      var pincode = a;

// City
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-origin-city.php',
    data:{pincode:pincode,pintype:"origin"},
    success: function (data) {
        $("#originpin-city1").val(data);
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
        $("#originpin-state1").val(data);
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
        $("#originpin-country1").val(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });


    }

// Refresh Query
    calculateraterefresh();

}



function despindetails1(a){
  var pinlen = a.length;
  if(pinlen==6){
      var pincode = a;

// City
    $.ajax({
    type: "GET",
    url: 'retailer-pin-ajax-destin-city.php',
    data:{pincode:pincode,pintype:"destin"},
    success: function (data) {
        $("#destinationpin-city1").val(data);
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
        $("#destinationpin-state1").val(data);
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
        $("#destinationpin-country1").val(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });


    }

// Refresh Query
    calculateraterefresh();

}



function precheckcalculaterate1(){
    var oripin = $("#originpincode1").val();
    var destinpin = $("#destinationpincode1").val();
// Distance Between
    $.ajax({
        type: "GET",
        url: 'retailer-pin-2-pin-distancemain-calcuate.php',
        data:{oripin:oripin,destinpin:destinpin},
        success: function (data) {
            $("#distancebtwn1").val(data);
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
            $("#distancebtwnkm1").val(data);
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
            $("#distancebtwntype1").val(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
// Distance Between
}

// B2B
</script>
<!-- B2B -->





















<!-- B2C Calculate  -->
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
    calculaterate()

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
    calculaterate()
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
    prodamt = $("#valueininr").val();
    freightWeightare = $("#FreightWeightare").val();

    // alert(param);
    $.ajax({
        type: "GET",
        url: 'retailer-calculator-estimate.php',
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
</script>
<!-- B2C Calculate  -->






<div id="content1" class="toggle" style="display:block">

<!-- <div id="b2c_calculate_list">Workng</div> -->

<div class="row">
    <div class="col-md-6 ">


<input type="hidden" id="zonebtwn1">

         <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Pickup- Pincode</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="map-pin"></i>
                                    </div>
                                </div>
<input type="text" name="originpincode" id="originpincode" class="form-control phone-number" onkeyup="oripindetails(this.value)" maxlength="6">

<input type="hidden" name="originpin-city" id="originpin-city">
<input type="hidden" name="originpin-state"  id="originpin-state">
<input type="hidden" name="originpin-country"  id="originpin-country">
                            </div>
<span class="text-center" id="originpin-state-show"></span>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Delivery Pincode</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="map-pin"></i>
                                    </div>
                                </div>
<input type="text" name="destinationpincode" id="destinationpincode" class="form-control phone-number" onkeyup="despindetails(this.value)" maxlength="6">
<input type="hidden" name="destinationpin-city"  id="destinationpin-city">
<input type="hidden" name="destinationpin-state"  id="destinationpin-state">
<input type="hidden" name="destinationpin-country"  id="destinationpin-country">
                            </div>
<span class="text-center" id="destinationpin-state-show"></span>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Actual Weight</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i>Kg</i>
                                    </div>
                                </div>
<input type="number" min="0.1" name="actualweight" id="actualweight" onkeyup="freightWeight()" class="form-control phone-number" placeholder="0.10gm">
<input type="hidden" name="distancebtwn"  id="distancebtwn">
<input type="hidden" name="distancebtwnkm"  id="distancebtwnkm">
<input type="hidden" name="distancebtwntype"  id="distancebtwntype">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
               <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>L(cm)</label>
                    <div class="input-group">
<input type="text" name="lenghtcm" id="lenghtcm" onkeyup="VolumetricWeightCal(this.value,'length')" class="form-control phone-number" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>H(cm)</label>
                    <div class="input-group">
<input type="text" name="heightcm" id="heightcm" onkeyup="VolumetricWeightCal(this.value,'height')" class="form-control phone-number" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>B(cm)</label>
                    <div class="input-group">
<input type="text" name="breadthcm" id="breadthcm" onkeyup="VolumetricWeightCal(this.value,'breadth')" class="form-control phone-number" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Vol Wt(Kg)</label>
                    <div class="input-group">
<input type="text" name="VolumetricWeightshow" id="VolumetricWeightshow"  class="form-control" placeholder="Vol Weight" title="Volumetric Weight" readonly />
                    <input type="hidden" name="VolumetricWeight" id="VolumetricWeight">
                    </div>
                </div>
            </div>
        </div>
        
        

<!-- Volumetric Weight Calculator -->
<script type="text/javascript">
function VolumetricWeightCal(datachange,cateis){
    // if(cateis == "length"){
        var vlength = $("#lenghtcm").val();
        // if(vlength == 0){  $("#vlength").val(1) }
        var vlengthlen = vlength.length;
        if(vlengthlen == 0){    vlength = 1;    }
        // alert("Len" + vlengthlen);
    // }
    // if(cateis == "breadth"){
        var vbreadth = $("#breadthcm").val();
        // if(vbreadth == 0){  $("#vbreadth").val(1) }
        var vbreadthlen = vbreadth.length;
        if(vbreadthlen == 0){    vbreadth = 1;    }
        // alert("Bre" + vbreadthlen);
    // }
    // if(cateis == "height"){
        var vheight = $("#heightcm").val();
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



        
        <div class="row">


            <div class="col-md-4">
                <div class="form-group">
                    <label>Value in INR</label>
                    <div class="input-group">
<input type="text" name="valueininr" id="valueininr" min="0" class="form-control phone-number">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Payment Mode</label>
                    <div class="input-group">
<select name="paymentmode" id="paymentmode" class="form-control">
    <option value="cod">Select</option>
    <option value="cod">COD</option>
    <option value="prepaid">Prepaid</option>
</select>
                    </div>
                </div>
            </div>

<!--            <div class="col-md-3">-->
<!--                <div class="form-group">-->
<!--                    <label>Quantity</label>-->
<!--                    <div class="input-group">-->
<!--<input type="text" name="productamount" min="0" onkeyup="precheckcalculaterate()" id="productamount" class="form-control phone-number">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        
            <div class="col-md-4">
                <div class="form-group">
                    <label>Chargeable Weight(Kg)</label>
                    <div class="input-group">
<input type="hidden" name="productamount" min="0" onkeyup="precheckcalculaterate()" id="productamount" class="form-control phone-number" value="">
<input type="text" name="FreightWeightshow" id="FreightWeightshow"  class="form-control" placeholder="Freight Weight" title="Freight Weight" readonly />
                    <input type="hidden" name="FreightWeightare" id="FreightWeightare">
                    </div>
                </div>
            </div>

            
        </div>




        <div class="row">
            <div class="my-0 col-md-6  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#basicModal" onclick="calculateraterefresh()">&nbsp;Calculate</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">&nbsp;Rate List</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


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



    <div class="col-md-6">
        <div class="card-header">
            <h4>Terms & Conditions:</h4>
        </div>
        <ul>
            <li>Prohibited item not to be ship, if any penalty will charge to seller. </li>
            <li>Pricing are subject to change based on courier company updation or change in any commercials.</li>
            <li>Freight Weight is Picked - Volumetric or Dead weight whichever is higher will be charged.</li>
            <li>No Claim would be entertained for Glassware, Fragile products,</li>
            <li>Concealed damages and improper packaging.</li>
            <li>Any weight dispute due to incorrect weight declaration cannot be claimed.</li>
            <details>
                <summary>see all</summary>
                <li>Chargeable weight would be volumetric or actual weight, whichever is higher </li>
                <li>I understand that proper packaging of my products has to be done from my end. I shall be solely liable for any damage arising out of improper packaging.</li>
                <li>I understand that additional government rules and norms can be applicable while shipping to certain states and subject to change without prior intimation and will abide by them.</li>
                <li>I understand that MSDS is required for shipping liquid and semi-solid products and agree to furnish the same for every consignment that carries such products.</li>
                <li>I also understand that liquid and semi-solid products cannot be sent via air and will be sent only through surface shipping.</li>
                <li>I agree to declare the accurate weight and dimensions of my packages while scheduling shipments. I also agree that no dispute can be raised with respect to billing, due to incorrect entry of data while scheduling. Shipment will be billed as per slab & services selected.</li>
                <li>ODA(Out Of Delivery Area) Charges to be levied</li>
                <li>There  will be penalty on Manual Label Printing</li>
                <li>Any discrepancy in volumetric weight will attract penal charges</li>
                <li>Above Shared Commercials are Exclusive GST</li>
            </details>
        </ul>
    </div>
</div>

</div>
<!-- b2b calculator  -->
<div id="content2" class="toggle" style="display:none">
<div class="row">
    <div class="col-md-6 ">

 <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Pickup- Pincode</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="map-pin"></i>
                                    </div>
                                </div>
<input type="text" name="originpincode1" id="originpincode1" class="form-control phone-number" onkeyup="oripindetails1(this.value)" maxlength="6">
<input type="hidden" name="originpin-city1" id="originpin-city1">
<input type="hidden" name="originpin-state1"  id="originpin-state1">
<input type="hidden" name="originpin-country1"  id="originpin-country1">


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Delivery Pincode</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="map-pin"></i>
                                    </div>
                                </div>
<input type="text" name="destinationpincode1" id="destinationpincode1" class="form-control phone-number" onkeyup="despindetails(this.value)" maxlength="6">
<input type="hidden" name="destinationpin-city1"  id="destinationpin-city1">
<input type="hidden" name="destinationpin-state1"  id="destinationpin-state1">
<input type="hidden" name="destinationpin-country1"  id="destinationpin-country1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Actual Weight</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i>Kg</i>
                                    </div>
                                </div>
<input type="text" name="actualweight1" id="actualweight1" class="form-control phone-number">
<input type="hidden" name="distancebtwn1"  id="distancebtwn1">
<input type="hidden" name="distancebtwnkm1"  id="distancebtwnkm1">
<input type="hidden" name="distancebtwntype1"  id="distancebtwntype1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>L(cm)</label>
                    <div class="input-group">
<input type="text" name="lenghtcm1" id="lenghtcm1" class="form-control phone-number" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>H(cm)</label>
                    <div class="input-group">
<input type="text" name="heightcm1" id="heightcm1" class="form-control phone-number" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>B(cm)</label>
                    <div class="input-group">
<input type="text" name="breadthcm1" id="breadthcm1" class="form-control phone-number" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Value in INR</label>
                    <div class="input-group">
<input type="text" name="valueininr1" id="valueininr1" class="form-control phone-number">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Payment Mode</label>
                    <div class="input-group">
<select name="paymentmode1" id="paymentmode1" class="form-control">
    <option value="cod">COD</option>
    <option value="prepaid">Prepad</option>
</select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Service type</label>
                    <div class="input-group">
<select name="servicestype1" id="servicestype1" class="form-control" required="">
    <option value="">Service Type</option>
    <option value="surface" selected="">Surface</option>
    <option value="air">Air</option>
</select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Product Amount</label>
                    <div class="input-group">
<input type="text" name="productamount1" onkeyup="precheckcalculaterate1()" id="productamount1" class="form-control phone-number">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="my-0 col-md-6  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#basicModal1" onclick="calculaterate1()">&nbsp;Calculate</i></a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">&nbsp;Rate List</i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card-header">
            <h4>Terms & Conditions:</h4>
        </div>
        <ul>
            <li>Prohibited item not to be ship, if any penalty will charge to seller. </li>
            <li>Pricing are subject to change based on courier company updation or change in any commercials.</li>
            <li>Freight Weight is Picked - Volumetric or Dead weight whichever is higher will be charged.</li>
            <li>No Claim would be entertained for Glassware, Fragile products,</li>
            <li>Concealed damages and improper packaging.</li>
            <li>Any weight dispute due to incorrect weight declaration cannot be claimed.</li>
            <details>
                <summary>see all</summary>
                <li>Chargeable weight would be volumetric or actual weight, whichever is higher </li>
                <li>I understand that proper packaging of my products has to be done from my end. I shall be solely liable for any damage arising out of improper packaging.</li>
                <li>I understand that additional government rules and norms can be applicable while shipping to certain states and subject to change without prior intimation and will abide by them.</li>
                <li>I understand that MSDS is required for shipping liquid and semi-solid products and agree to furnish the same for every consignment that carries such products.</li>
                <li>I also understand that liquid and semi-solid products cannot be sent via air and will be sent only through surface shipping.</li>
                <li>I agree to declare the accurate weight and dimensions of my packages while scheduling shipments. I also agree that no dispute can be raised with respect to billing, due to incorrect entry of data while scheduling. Shipment will be billed as per slab & services selected.</li>
                <li>ODA(Out Of Delivery Area) Charges to be levied</li>
                <li>There  will be penalty on Manual Label Printing</li>
                <li>Any discrepancy in volumetric weight will attract penal charges</li>
                <li>Above Shared Commercials are Exclusive GST</li>
            </details>
        </ul>
    </div>
</div>
</div>
<!-- internation calculator  -->
<div id="content3" class="toggle" style="display:none">
<div class="row">
    <div class="col-md-6 ">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Pickup Country</label>
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
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Delivery Country</label>
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
                    <div class="col-md-4 my-3">
                        <div class="form-group">
                            <label>Actual Weight</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i>KG</i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>L(cm)</label>
                    <div class="input-group">

                        <input type="text" class="form-control phone-number">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>H(cm)</label>
                    <div class="input-group">

                        <input type="text" class="form-control phone-number">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>B(cm)</label>
                    <div class="input-group">

                        <input type="text" class="form-control phone-number">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Value in INR</label>
                    <div class="input-group">

                        <input type="text" class="form-control phone-number">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Payment Mode</label>
                    <div class="input-group">

                        <select class="form-control">

                            <option>COD</option>
                            <option>Prepaid</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Service type</label>
                    <div class="input-group">
                        <select class="form-control">
                            <option>Service Type</option>
                            <option>Surface</option>
                            <option>Air</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Product Amount</label>
                    <div class="input-group">

                        <input type="text" class="form-control phone-number">
                    </div>
                </div>
            </div>
        </div>
        <div class="my-0 col-md-6  ">
            <div class="row">

                <div class="col-md-6">
                    <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target="#basicModa2">&nbsp;Calculate</i></a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">&nbsp;Rate List</i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-header">
            <h4>Terms & Conditions:</h4>
        </div>
        <ul>
            <li>Prohibited item not to be ship, if any penalty will charge to seller. </li>
            <li>Pricing are subject to change based on courier company updation or change in any commercials.</li>
            <li>Freight Weight is Picked - Volumetric or Dead weight whichever is higher will be charged.</li>
            <li>No Claim would be entertained for Glassware, Fragile products,</li>
            <li>Concealed damages and improper packaging.</li>
            <li>Any weight dispute due to incorrect weight declaration cannot be claimed.</li>
            <details>
                <summary>see all</summary>
                <li>Chargeable weight would be volumetric or actual weight, whichever is higher </li>
                <li>I understand that proper packaging of my products has to be done from my end. I shall be solely liable for any damage arising out of improper packaging.</li>
                <li>I understand that additional government rules and norms can be applicable while shipping to certain states and subject to change without prior intimation and will abide by them.</li>
                <li>I understand that MSDS is required for shipping liquid and semi-solid products and agree to furnish the same for every consignment that carries such products.</li>
                <li>I also understand that liquid and semi-solid products cannot be sent via air and will be sent only through surface shipping.</li>
                <li>I agree to declare the accurate weight and dimensions of my packages while scheduling shipments. I also agree that no dispute can be raised with respect to billing, due to incorrect entry of data while scheduling. Shipment will be billed as per slab & services selected.</li>
                <li>ODA(Out Of Delivery Area) Charges to be levied</li>
                <li>There  will be penalty on Manual Label Printing</li>
                <li>Any discrepancy in volumetric weight will attract penal charges</li>
                <li>Above Shared Commercials are Exclusive GST</li>
            </details>
        </ul>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</section>












<!-- model for pricing plans model <button>Rate List</button>  -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content" style="max-width:150%;width:150%;margin-left:-25%">
<div class="modal-header">
<h5 class="modal-title" id="myLargeModalLabel"></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="card-header">
<!--    Common Popup Model Show on B2C or B2B    -->
<h6>Pricing Plans</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<div class="col-12 col-md-12 col-lg-12">


<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-md">
<tr>
<th>Sr.no.</th>
<th>Courier</th>
<th>Weight</th>
<th>Within City</th>
<th>Regional (Single connection)</th>
<th>Metro to Metro</th>
<th>Rest of India</th>
<th>North East, Kashmir , HP, Kerala</th>
<th>Manipur ,Jammu , Andaman </th>
<th class="text-center">COD Charges</th>
<th>COD %</th>
</tr>




<?php
$singleproquery = "SELECT `Courier`, `Weight`, `upto_weight`, `upto_addweight`, `weight_type`, `A`, `B`, `C`, `D`, `E`, `F`, `COD`, `COD%` FROM `retailer-rate-list`";
$singleproqueryr=mysqli_query($conn,$singleproquery);
if(empty(mysqli_num_rows($singleproqueryr))){
  echo "<center>Not In Service</center>";
}

$modelid = 0;
while($row = mysqli_fetch_assoc($singleproqueryr)){
$modelid++;

?>
    <tr>
        <td><?= $modelid ?></td>
        <td><?= $row['Courier'] ?></td>
        <td><?= $row['Weight'] ?></td>
        <td><?= $row['A'] ?></td>
        <td><?= $row['B'] ?></td>
        <td><?= $row['C'] ?></td>
        <td><?= $row['D'] ?></td>
        <td><?= $row['E'] ?></td>
        <td><?= $row['F'] ?></td>
        <td><?= $row['COD'] ?></td>
        <td><?= $row['COD%'] ?></td>
    </tr>


<?php

}
?>


</table>
</div>
</div>



</div>

<h6>*GST Additional</h6>
</div>
</div>
</div>
<div class="modal-footer bg-whitesmoke br">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>






<!-- Rate Calculate B2C -->
<script type="text/javascript">


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
<!-- Rate Calculate -->



<!-- calculaor calculate button for b2c model  -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<!-- <div class="modal-content"> -->
<div class="modal-content" style="max-width:120%;width:120%;margin-left:-8%">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">
    <!--Estimate Details B2C-->
</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
    <div class="col-md-6">
        <strong>Pickup Pincode : </strong><span id="pikcuppinno"> <span> <br>
    </div>
    <div class="col-md-6">
        <strong>Destination Pincode : </strong><span id="destinpinno"> <span> <br>
    </div>
</div>



<div id="b2c_calculate_list">B2C estimate couries loading...</div>

<p><span style="color:blue">*</span>GST Additional</p>

</div>
<div class="modal-footer bg-whitesmoke br">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>








<!-- calculaor calculate button for b2b model  -->
<!-- Rate Calculate -->
<script type="text/javascript">


function calculaterate1(){
    // alert('working');
    var oripin = $("#originpincode1").val();
    var oripincity = $("#originpin-city1").val();
    var oripinstate = $("#originpin-state1").val();
    var oripincountry = $("#originpin-country1").val();

    var destinpin = $("#destinationpincode1").val();
    var destinpincity = $("#destinationpin-city1").val();
    var destinpinstate = $("#destinationpin-state1").val();
    var destinpincountry = $("#destinationpin-country1").val();

    var distancebtwn = $("#distancebtwn1").val();
    var distancebtwnkm = parseInt($("#distancebtwnkm1").val());

    var distancebtwntype = $("#distancebtwntype1").val();

    var actualweight = $("#actualweight1").val();

    var lenghtcm = $("#lenghtcm1").val();
    var heightcm = $("#heightcm1").val();
    var breadthcm = $("#breadthcm1").val();

    var valueininr = $("#valueininr1").val();
    var paymentmode = $("#paymentmode1").val();
    var servicestype = $("#servicestype1").val();
    var productamount = $("#productamount1").val();

  



    if(oripincity === destinpincity){
        $("#zonebtwn1").html("A");

    }else if(oripinstate === destinpinstate){
        $("#zonebtwn1").html("C");

    }else if(distancebtwnkm < 500){
        $("#zonebtwn1").html("B");

    }else if(distancebtwnkm < 2500){
        $("#zonebtwn1").html("D");

    }else{
        $("#zonebtwn1").html("Soon");
        
    }



    $("#pikcuppinno1").html(oripin);
    $("#destinpinno1").html(destinpin);

    $("#servicebtwn1").html(servicestype);
    $("#distncebtwn1").html(distancebtwn);

    
}
</script>
<!-- Rate Calculate -->


<!-- calculaor calculate button for b2c model  -->
<div class="modal fade" id="basicModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Estimate Details B2B</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
    <div class="col-md-6">
        <strong>Pickup Pincode : </strong><span id="pikcuppinno1"> <span> <br>
    </div>
    <div class="col-md-6">
        <strong>Delivery Pincode : </strong><span id="destinpinno1"> <span> <br>
    </div>
</div>
<br>
<!--<div my-3>-->
<!--    <strong>Sevice Between : </strong><span id="servicebtwn1"> <span> -->
<!--</div>-->

<!--<div class="row">-->
<!--    <div class="col-md-6">-->
<!--        <strong>Distance : </strong><span id="distncebtwn1"> <span> -->
<!--    </div>-->
<!--    <div class="col-md-6">-->
<!--        <strong>Zone : </strong><span id="zonebtwn1"> <span> -->
<!--    </div>-->
<!--</div>-->


<!--<div class="card-body">-->
<!--<div class="table-responsive">-->
<!--<table class="table table-striped table-hover text-center" id="save-stage" style="width:100%;">-->
<!--<thead>-->
<!--    <tr>-->
<!--        <th>Zone</th>-->
<!--        <th>Type </th>-->

<!--    </tr>-->
<!--</thead>-->
<!--<tbody>-->
<!--    <tr>-->
<!--        <td>Zone A</td>-->
<!--        <td>Within City</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone B</td>-->
<!--        <td> 500KM Regional (Single connection)</td>-->

<!--    </tr>-->

<!--    <tr>-->
<!--        <td>Zone C</td>-->
<!--        <td>Metro to Metro (Within 2500 KM)</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone D</td>-->
<!--        <td>Rest of India (Within 2500 KM)</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone E</td>-->
<!--        <td>North East, Kashmir , HP, Kerala</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone F</td>-->
<!--        <td>Manipur ,Jammu , Andaman </td>-->

<!--    </tr>-->

<!--    <tr></tr>-->

<!--</tbody>-->
<!--</table>-->

<!--</div>-->
<!--</div>-->
</div>
<div class="modal-footer bg-whitesmoke br">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>






<!-- <div class="modal fade" id="basicModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Estimate Details</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-6">Pickup Pincode :</div>
<div class="col-md-6">Delivery Pincode :</div>
</div>
<div my-3>Sevice Between :</div>
<div my-2>Zone :</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped table-hover text-center" id="save-stage" style="width:100%;">
<thead>
    <tr>
        <th>Zone</th>
        <th>Type </th>

    </tr>
</thead>
<tbody>
    <tr>
        <td>Zone A</td>
        <td>Within City</td>

    </tr>
    <tr>
        <td>Zone B</td>
        <td> 500KM Regional (Single connection)</td>

    </tr>

    <tr>
        <td>Zone C</td>
        <td>Metro to Metro (Within 2500 KM)</td>

    </tr>
    <tr>
        <td>Zone D</td>
        <td>Rest of India (Within 2500 KM)</td>

    </tr>
    <tr>
        <td>Zone E</td>
        <td>North East, Kashmir , HP, Kerala</td>

    </tr>
    <tr>
        <td>Zone F</td>
        <td>Manipur ,Jammu , Andaman </td>

    </tr>

    <tr></tr>

</tbody>
</table>

</div>
</div>
</div>
<div class="modal-footer bg-whitesmoke br">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
 -->



<!-- calculaor calculate button for b2c model  -->
<div class="modal fade" id="basicModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Estimate Details International Calculate</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<!--<div class="row">-->
<!--<div class="col-md-6">Pickup Pincode :</div>-->
<!--<div class="col-md-6">Delivery Pincode :</div>-->
<!--</div>-->
<!--<div my-3>Sevice Between :</div>-->
<!--<div my-2>Zone :</div>-->
<!--<div class="card-body">-->
<!--<div class="table-responsive">-->
<!--<table class="table table-striped table-hover text-center" id="save-stage" style="width:100%;">-->
<!--<thead>-->
<!--    <tr>-->
<!--        <th>Zone</th>-->
<!--        <th>Type </th>-->

<!--    </tr>-->
<!--</thead>-->
<!--<tbody>-->
<!--    <tr>-->
<!--        <td>Zone A</td>-->
<!--        <td>Within City</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone B</td>-->
<!--        <td> 500KM Regional (Single connection)</td>-->

<!--    </tr>-->

<!--    <tr>-->
<!--        <td>Zone C</td>-->
<!--        <td>Metro to Metro (Within 2500 KM)</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone D</td>-->
<!--        <td>Rest of India (Within 2500 KM)</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone E</td>-->
<!--        <td>North East, Kashmir , HP, Kerala</td>-->

<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Zone F</td>-->
<!--        <td>Manipur ,Jammu , Andaman </td>-->

<!--    </tr>-->

<!--    <tr></tr>-->

<!--</tbody>-->
<!--</table>-->

<!--</div>-->
<!--</div>-->
</div>
<div class="modal-footer bg-whitesmoke br">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- end calculaor button for b2c model  -->

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$("#nav a").click(function(e) {
e.preventDefault();
$(".toggle").hide();
var toShow = $(this).attr('href');
$(toShow).show();
});
</script>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/datatables.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
