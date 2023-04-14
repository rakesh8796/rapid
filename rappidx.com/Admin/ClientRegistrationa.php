<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->
<div class="col-md-12">



     <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h2>Client Registration</h2>
        </section>
        <!--section ends-->


                 <?php
                    // $studentObj->addClient();
                 ?>
            <section class="content">
            <div class="row">
                <!--5th tab bank application starting-->
                <div class="col-lg-12">





<!-- <form class="grid-form form-horizontal" enctype="multipart/form-data" role="form" id="popup-validation" method="post" action="#"> -->


<form class="grid-form" enctype="multipart/form-data"  method="post" action="Client_Registration.php">
<h2 class="text-center">

<?php
if(@$_GET['msg']=="y")
{
    echo "<span style='color:green'>Registration Complete</span>";
}elseif(@$_GET['msg']=="n")
{
    echo "<span style='color:red'>Registration Not Complete</span>";
}else
{
    echo "ONBOARDING FORM";
}
?>
</h2>





    <fieldset>
        <legend></legend>
        <div data-row-span="1">
            <div data-field-span="1">
                <label>Company Registered Name</label>
                <input type="text" name="companyname" required="" autofocus>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Personal Details</legend>
        <div data-row-span="4">
            <div data-field-span="1">
                <label>Website</label>
                <input type="text" name="website">
            </div>
            <div data-field-span="1">
                <label>Brand Name</label>
                <input type="text" name="brand" required="">
            </div>
            <div data-field-span="1">
                <label>Email Id</label>
                <input type="text" name="Email" required="">
            </div>
            <div data-field-span="1">
                <label>PAN Number</label>
                <input type="text" name="pan" required="">
            </div>
        </div>
        <div data-row-span="4">
             <div data-field-span="2">
                <label>TAN Number</label>
                <input type="text" name="tan">
            </div>
            <div data-field-span="2">
                <label>GST Number</label>
                <input type="text" name="gstno" required="">
            </div>
        </div>

        <br>
        <fieldset>
            <legend>Registered address</legend>
            <div data-row-span="5">
                <div data-field-span="1">
                    <label>Address</label>
                    <input type="text" name="regaddress" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="regcity" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="regpin" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="regmobile" required="">
                </div>
                <div data-field-span="1">
                    <label>Alternate Mobile</label>
                    <input type="text" name="reglandline" required="">
                </div>
            </div>


        </fieldset>
    </fieldset>
    <br>
    <fieldset>
        <legend>Communication Address
        </legend>
       <div data-row-span="5">
                <div data-field-span="1">
                    <label>Address</label>
                    <input type="text" name="comaddress" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="comcity" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="compin" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="commobile" required="">
                </div>
                <div data-field-span="1">
                    <label>Alternate Mobile</label>
                    <input type="text" name="comlandline" required="">
                </div>
            </div>
    </fieldset>
    <br>
    <br>
    <fieldset>
        <legend>Bank Details</legend>
        <div data-row-span="3">
            <div data-field-span="1">
                <label>Bank Name</label>
                <input type="text" name="bankname" required="">
            </div>
            <div data-field-span="1">
                <label>Account No.</label>
                <input type="text" name="bankacc" required="">
            </div>
            <div data-field-span="1">
                <label>Branch</label>
                <input type="text" name="branch" required="">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>IFSC Code</label>
                <input type="text" name="ifsc" required="">
            </div>
            <div data-field-span="1">
                <label>Account Type</label>
                <input type="text" name="acctype" required="">
            </div>
        </div>
    </fieldset>
    <br>
    <br>
    <fieldset>
        <legend>Product</legend>
        <div data-row-span="1">
            <div data-field-span="1">
                <label for="country">Product Category</label>
                <select id="country" name="product" required="">
                    <option>Select Category</option>
<?php
    $prodcate = "SELECT * FROM `client_regisration_prod_cate`";
    $prodcater=mysqli_query($conn,$prodcate);
    while($presres = mysqli_fetch_assoc($prodcater))
    {
        echo "<option value=".$presres["prodcate"].">".$presres["prodcate"]."</option>";
    }
?>
                </select>
            </div>

        </div>

        <br>
        <fieldset>
            <legend>Service Type and Pickup Point</legend>
            <div data-row-span="2">
                <div data-field-span="1">
                    <label>Service Type</label>
                    <label>
                        <input type="radio" name="service" value="Forward" required=""> Forward</label> &nbsp;
                    <label>
                        <input type="radio" name="service" value="Reverse" required=""> Reverse</label>&nbsp;
                    <label>
                        <input type="radio" name="service" value="Both" required=""> Forward and Reverse Both</label>
                </div>
                <div data-field-span="1">
                    <label>Pickup point</label>
                    <label>
                        <input type="radio" name="pickup" value="Single/Warehouse" required=""> Single/Warehouse</label> &nbsp;
                    <label>
                        <input type="radio" name="pickup" value="Multiple/Marketplace" required=""> Multiple/Marketplace</label>

                </div>
            </div>

        </fieldset>
        <fieldset>
            <legend>Remittance and Billing</legend>
            <div data-row-span="2">
                <div data-field-span="1">
                    <label>COD Remittance Type </label>
                    <label>
                        <input type="radio" name="codrem" value="Hybrid" required=""> Hybrid</label> &nbsp;
                    <label>
                        <input type="radio" name="codrem" value="Non-Hybrid" required=""> Non-Hybrid</label>
                </div>
                <div data-field-span="1">
                    <label>Billing Type </label>
                    <label>
                        <input type="radio" name="billingtype" value="Prepaid" required=""> Prepaid</label> &nbsp;
                    <label>
                        <input type="radio" name="billingtype" value="Postpaid" required=""> Postpaid </label>

                </div>
            </div>
            <div data-row-span="1">
                <div data-field-span="1">
                    <label>Billing Cycle  </label>
                    <label>
                        <input type="radio" name="billingcycle" value="Weekly" required=""> Weekly</label> &nbsp;
                    <label>
                        <input type="radio" name="billingcycle" value="Fortnightly" required=""> Fortnightly </label>
                    <label>
                        <input type="radio" name="billingcycle" value="Monthly" required=""> Monthly </label>
                </div>

            </div>

        </fieldset>
    </fieldset>
    <br>
    <br>








































<fieldset>
<legend>Remittance Cycle</legend>
<div data-row-span="1">
    <div data-field-span="1">
        <label>
            <div class="col-md-12">
                <div class="col-md-3"><b>Remittance </b></div>
                <div class="col-md-3">
                    <span style="float:left;font-size:21px"><b>T+</b></span>
                    <input type="number" name="remittancecycle" class="form-control" style="width:50%" placeholder="T+ is PreFix / Write Only Number" min="0" pattern="[0-9]+">
                </div>
                <div class="col-md-6"></div>
            </div>
        </label>
    </div>
</fieldset>










































    <!-- <fieldset>
        <legend>Commercials</legend>

        <div data-row-span="6">
            <div data-field-span="1"></div>
            <div data-field-span="1">
                <label>A-Intracity</label>

            </div>
            <div data-field-span="1">
                <label>B-Within-Zone</label>

            </div>
            <div data-field-span="1">
                <label>C-Metro</label>

            </div>
            <div data-field-span="1">
                <label>D-ROI</label>

            </div>
            <div data-field-span="1">
                <label>E-Special Zone</label>

            </div>
            <div data-field-span="1">
                <label>Min 500 Gram</label>
            </div>
            <div data-field-span="1">

                <input type="text" name="min_a" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_b" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_c" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_d" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_e" required="">
            </div>
            <div data-field-span="1">
                <label>Additional 500 Gram</label>
            </div>
            <div data-field-span="1">

                <input type="text" name="add_a" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_b" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_c" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_d" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_e" required="">
            </div>
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_a" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_b" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_c" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_d" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_e" required="">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc" required="">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod" required="" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>


        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia" required="">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst" required="">
            </div>
        </div>

        <br>
        <fieldset>
            <legend>Client Id</legend>
            <div data-row-span="2">
                <div data-field-span="1" class="input-container">
                    <label>Client login Id</label>
                    <input type="text" name="clientid" class="input-field" required="">
                    <span class="icon">@rappidx.com</span>
                </div>
                <div data-field-span="1">
                    <label>Password</label>
                    <input type="text" name="password" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client Authorized Signatory</label>
                    <input type="text" name="clientauth" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="designation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="clientemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="clientmobile" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client’s Finance POC</label>
                    <input type="text" name="clientpoc" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="pocdesignation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="pocemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="pocmobile" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client’s Operation POC</label>
                    <input type="text" name="operationpoc" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="operationdesignation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="operationemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="operationmobile" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Rappidx BD Name</label>
                    <input type="text" name="bdname" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="bddesignation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="bdemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="bdmobile" required="">
                </div>
            </div>
            <legend>Attach Document</legend>
            <div data-row-span="3">
                <div data-field-span="1">
                    <label>Pan card</label>
                    <input class="form-control" type="file" id="uploadimage"  name="uploadimage" />
                </div>
                <div data-field-span="1">
                    <label>GST Certificate</label>
                    <input id="input-41" type="file" name="gstcert" class="file-loading">
                </div>
                <div data-field-span="1">
                    <label>Cancel Cheque</label>
                    <input id="input-41" type="file" name="cancheque" class="file-loading">
                </div>
            </div>
            <div data-row-span="2">
                <div data-field-span="1">
                    <label>Address Proof</label>
                    <input id="input-41" type="file" name="addproofe" class="file-loading">
                </div>
                <div data-field-span="1">
                    <label>Client’s Mail Acceptance (commercials)</label>
                    <input id="input-41" type="file" name="clientmailacc" class="file-loading">
                </div>
            </div>
        </fieldset>
    </fieldset> -->


<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(cityName).style.display = "block";
}
</script>

<!--  -->
<fieldset>
        <!-- <legend>Commercials</legend> -->
<legend>
    <div class="row" style="color:brown">
        <div class="col-md-2" style="color:black">
            <h4><strong style="font-size:21px">Commercials</strong></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
                <input type="radio" name="commercialstype" value="gm500" onclick="openCity('gm500')" style="cursor:pointer" checked=""> 500 GM
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
                <input type="radio" name="commercialstype" value="kg1" onclick="openCity('kg1')" style="cursor:pointer"> 1 KG
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
                <input type="radio" name="commercialstype" value="kg2" onclick="openCity('kg2')" style="cursor:pointer"> 2 KG
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
                <input type="radio" name="commercialstype" value="kg5" onclick="openCity('kg5')" style="cursor:pointer"> 5 KG
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
                <input type="radio" name="commercialstype" value="kg10" onclick="openCity('kg10')" style="cursor:pointer"> 10 KG
            </strong></label></h4>
        </div>
    </div>
</legend>


        <div data-row-span="6">
            <div data-field-span="1"></div>
            <div data-field-span="1">
                <label>A-Intracity</label>
            </div>
            <div data-field-span="1">
                <label>B-Within-Zone</label>
            </div>
            <div data-field-span="1">
                <label>C-Metro</label>
            </div>
            <div data-field-span="1">
                <label>D-ROI</label>
            </div>
            <div data-field-span="1">
                <label>E-Special Zone</label>
            </div>
        </div>

<!-- 500 GM -->
    <div id="gm500" class="city">
        <div data-row-span="6">
            <div data-field-span="1">
                <label>MIN 500 Gram</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="min_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_e">
            </div>
        </div>

        <div data-row-span="6">
            <div data-field-span="1">
                <label>ADDITIONAL 500 Gram</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="add_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_e">
            </div>
        </div>
<!--  -->
        <div data-row-span="6">
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_e">
            </div>
        </div>

        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>

        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst">
            </div>
        </div>

        <div data-row-span="1">
            <div data-field-span="1">
                <label>Note(If Any)</label>
                <input type="text" name="specialnote">
            </div>
        </div>
<!--  -->
    </div>
<!-- 500 GM -->
<!-- 1 KG -->
    <div id="kg1" class="city" style="display:none">
        <div data-row-span="6">
            <div data-field-span="1">
                <label>MIN 1kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="min1_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="min1_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="min1_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="min1_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="min1_e">
            </div>
        </div>
        <div data-row-span="6">
            <div data-field-span="1">
                <label>ADDITIONAL 1kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="add1_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="add1_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="add1_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="add1_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="add1_e">
            </div>
        </div>
<!--  -->
        <div data-row-span="6">
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="rto1_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto1_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto1_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto1_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto1_e">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc1">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod1" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia1">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst1">
            </div>
        </div>

        <div data-row-span="1">
            <div data-field-span="1">
                <label>Note(If Any)</label>
                <input type="text" name="specialnote1">
            </div>
        </div>
<!--  -->
    </div>
<!-- 1 KG -->
<!-- 2 KG -->
    <div id="kg2" class="city" style="display:none">
        <div data-row-span="6">
            <div data-field-span="1">
                <label>MIN 2Kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="min2_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="min2_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="min2_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="min2_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="min2_e">
            </div>
        </div>
        <div data-row-span="6">
            <div data-field-span="1">
                <label>ADDITIONAL 2Kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="add2_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="add2_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="add2_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="add2_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="add2_e">
            </div>
        </div>
<!--  -->
        <div data-row-span="6">
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="rto2_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto2_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto2_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto2_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto2_e">
            </div>
        </div>

        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc2">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod2" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>

        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia2">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst2">
            </div>
        </div>

        <div data-row-span="1">
            <div data-field-span="1">
                <label>Note(If Any)</label>
                <input type="text" name="specialnote2">
            </div>
        </div>
<!--  -->
    </div>
<!-- 2 KG -->
<!-- 5 KG -->
    <div id="kg5" class="city" style="display:none">
        <div data-row-span="6">
            <div data-field-span="1">
                <label>MIN 5Kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="min5_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="min5_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="min5_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="min5_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="min5_e">
            </div>
        </div>
        <div data-row-span="6">
            <div data-field-span="1">
                <label>ADDITIONAL 5Kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="add5_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="add5_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="add5_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="add5_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="add5_e">
            </div>
        </div>
<!--  -->
        <div data-row-span="6">
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="rto5_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto5_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto5_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto5_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto5_e">
            </div>
        </div>

        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc5">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod5" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>

        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia5">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst5">
            </div>
        </div>

        <div data-row-span="1">
            <div data-field-span="1">
                <label>Note(If Any)</label>
                <input type="text" name="specialnote5">
            </div>
        </div>
<!--  -->
    </div>
<!-- 5 KG -->
<!-- 10 KG -->
    <div id="kg10" class="city" style="display:none">
        <div data-row-span="6">
            <div data-field-span="1">
                <label>MIN 10Kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="min10_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="min10_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="min10_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="min10_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="min10_e">
            </div>
        </div>
        <div data-row-span="6">
            <div data-field-span="1">
                <label>ADDITIONAL 10Kg</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="add10_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="add10_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="add10_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="add10_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="add10_e">
            </div>
        </div>
<!--  -->
        <div data-row-span="6">
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">
                <input type="text" name="rto10_a">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto10_b">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto10_c">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto10_d">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto10_e">
            </div>
        </div>

        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc10">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod10" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>

        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia10">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst10">
            </div>
        </div>

        <div data-row-span="1">
            <div data-field-span="1">
                <label>Note(If Any)</label>
                <input type="text" name="specialnote10">
            </div>
        </div>
<!--  -->
    </div>
<!-- 10 KG -->



        <br>
<fieldset>







































            <legend>Client Id</legend>
            <div data-row-span="2">
                <div data-field-span="1" class="input-container">
                    <label>Client login Id</label>
                    <input type="text" name="clientid" class="input-field" required="">
                    <span class="icon">@rappidx.com</span>
                </div>
                <div data-field-span="1">
                    <label>Password</label>
                    <input type="text" name="password" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client Authorized Signatory</label>
                    <input type="text" name="clientauth" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="designation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="clientemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="clientmobile" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client’s Finance POC</label>
                    <input type="text" name="clientpoc" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="pocdesignation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="pocemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="pocmobile" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client’s Operation POC</label>
                    <input type="text" name="operationpoc" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="operationdesignation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="operationemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="operationmobile" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Rappidx BD Name</label>
                    <input type="text" name="bdname" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="bddesignation" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="bdemail" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="bdmobile" required="">
                </div>
            </div>
            <legend>Attach Document</legend>
            <div data-row-span="3">
                <div data-field-span="1">
                    <label>Pan card</label>
                    <input class="form-control" type="file" id="uploadimage"  name="uploadimage" />
                </div>
                <div data-field-span="1">
                    <label>GST Certificate</label>
                    <input id="input-41" type="file" name="gstcert" class="file-loading">
                </div>
                <div data-field-span="1">
                    <label>Cancel Cheque</label>
                    <input id="input-41" type="file" name="cancheque" class="file-loading">
                </div>
            </div>
            <div data-row-span="2">
                <div data-field-span="1">
                    <label>Address Proof</label>
                    <input id="input-41" type="file" name="addproofe" class="file-loading">
                </div>
                <div data-field-span="1">
                    <label>Client’s Mail Acceptance (commercials)</label>
                    <input id="input-41" type="file" name="clientmailacc" class="file-loading">
                </div>
            </div>
        </fieldset>
    </fieldset>
























    <br>
    <br>

 <div class="modal-footer">
    <center>
        <button type="submit" class="btn btn-primary" name="submit" style="color:black">&ensp; Submit &ensp;</button>
        <button type="reset" class="btn btn-primary" style="color:black">&ensp; Reset &ensp;</button>
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
    </center>
</div>
</form>



<?php
if(isset($submit))
{

$clientid = $clientid."@rappidx.com";
$oripassword = $password;
$password = md5($password);

$remittancecycle = "T+".$remittancecycle;

//     echo "work";

echo date('ymdhms');
$foldername = date('ymdhms');

if(!file_exists("upload/$foldername"))
{
    mkdir("upload/$foldername");
}

echo "<br>";
// echo $uploadimage;
echo "<br>";
echo $uploadimagename = $_FILES["uploadimage"]["name"];
echo "<br>";
echo $uploadimagenamet = $_FILES["uploadimage"]["tmp_name"];
echo "<br>";
move_uploaded_file($uploadimagenamet,"upload/$foldername/$uploadimagename");


echo "<br>";
// echo $gstcert;
echo "<br>";
echo $gstcername = $_FILES["gstcert"]["name"];
echo "<br>";
echo $gstcernamet = $_FILES["gstcert"]["tmp_name"];
echo "<br>";
move_uploaded_file($gstcernamet,"upload/$foldername/$gstcername");


echo "<br>";
// echo $cancheque;
echo "<br>";
echo $canchequename = $_FILES["cancheque"]["name"];
echo "<br>";
echo $canchequenamet = $_FILES["cancheque"]["tmp_name"];
echo "<br>";
move_uploaded_file($canchequenamet,"upload/$foldername/$canchequename");


echo "<br>";
// echo $addproofe;
echo "<br>";
echo $addproofename = $_FILES["addproofe"]["name"];
echo "<br>";
echo $addproofenamet = $_FILES["addproofe"]["tmp_name"];
echo "<br>";
move_uploaded_file($addproofenamet,"upload/$foldername/$addproofename");


echo "<br>";
// echo $clientmailacc;
echo "<br>";
echo $clientmailaccname = $_FILES["clientmailacc"]["name"];
echo "<br>";
echo $clientmailaccnamet = $_FILES["clientmailacc"]["tmp_name"];
echo "<br>";
move_uploaded_file($clientmailaccnamet,"upload/$foldername/$clientmailaccname");




try {
// *    *   *   Main/500Gm   *   *   *   Start

$status500gm = 0;
$status1kg = 0;
$status2kg = 0;
$status5kg = 0;
$status10kg = 0;
if($min_a){    $status500gm = 1;    }
if($min1_a){    $status1kg = 1;    }
if($min2_a){    $status2kg = 1;    }
if($min5_a){    $status5kg = 1;    }
if($min10_a){    $status10kg = 1;    }


$query = "
INSERT INTO `asitfa_user`(
`usertype`,

`Company_Name`,
`Website`,
`Brand`,
`Email`,
`Pan`,
`Tan`,
`GST_No`,

`Reg_Address`,
`Reg_City`,
`Reg_Pin`,
`Reg_Mobile`,
`Reg_Landline`,

`Com_Address`,
`Com_City`,
`Com_Pin`,
`Com_Mobile`,
`Com_Landline`,

`Bankname`,
`Bankaccount`,
`Branch`,
`IFSC`,
`Acc_Type`,

`Product`,
`Service`,
`Pickup`,
`Cod_Rem`,
`Billing_Type`,
`Billing_Cycle`,
`remittancecycle`,
`commercialstype`,

`status500gm`,`status1kg`,`status2kg`,`status5kg`,`status10kg`,

`Min_a`,`Min_b`,`Min_c`,`Min_d`,`Min_e`,`Add_a`,`Add_b`,`Add_c`,`Add_d`,`Add_e`,`Rto_a`,`Rto_b`,`Rto_c`,`Rto_d`,`Rto_e`,`FSC`,`COD`,`Shipment_Lia`,`GST`,`specialnotes`,

`min1_a`,`min1_b`,`min1_c`,`min1_d`,`min1_e`,`add1_a`,`add1_b`,`add1_c`,`add1_d`,`add1_e`,`Rto1_a`,`Rto1_b`,`Rto1_c`,`Rto1_d`,`Rto1_e`,`FSC1`,`COD1`,`Shipment_Lia1`,`GST1`,`specialnotes1`,

`min2_a`,`min2_b`,`min2_c`,`min2_d`,`min2_e`,`add2_a`,`add2_b`,`add2_c`,`add2_d`,`add2_e`,`Rto2_a`,`Rto2_b`,`Rto2_c`,`Rto2_d`,`Rto2_e`,`FSC2`,`COD2`,`Shipment_Lia2`,`GST2`,`specialnotes2`,

`min5_a`,`min5_b`,`min5_c`,`min5_d`,`min5_e`,`add5_a`,`add5_b`,`add5_c`,`add5_d`,`add5_e`,`Rto5_a`,`Rto5_b`,`Rto5_c`,`Rto5_d`,`Rto5_e`,`FSC5`,`COD5`,`Shipment_Lia5`,`GST5`,`specialnotes5`,

`min10_a`,`min10_b`,`min10_c`,`min10_d`,`min10_e`,`add10_a`,`add10_b`,`add10_c`,`add10_d`,`add10_e`,`Rto10_a`,`Rto10_b`,`Rto10_c`,`Rto10_d`,`Rto10_e`,`FSC10`,`COD10`,`Shipment_Lia10`,`GST10`,`specialnotes10`,

`User_Email`,
`User_Password`,
`User_Password_show`,

`Client_Auth`,
`Designation`,
`Client_Email`,
`Client_Mobile`,

`Client_poc`,
`Poc_Designation`,
`Poc_Email`,
`Poc_Mobile`,

`Operation_Poc`,
`Operation_Designation`,
`Operation_Mail`,
`Operation_Mobile`,

`Bd_Name`,
`Bd_Designation`,
`Bd_mail`,
`Bd_Mobile`,

`Pancard`,
`GST_cert`,
`Can_Cheque`,
`Add_Proofe`,
`Client_Mail_acc`,
`foldername`,
`Rec_Time_Stamp`,
`Active`,
`added_by`
) VALUES (
'client',

'$companyname',
'$website',
'$brand',
'$Email',
'$pan',
'$tan',
'$gstno',

'$regaddress',
'$regcity',
'$regpin',
'$regmobile',
'$reglandline',

'$comaddress',
'$comcity',
'$compin',
'$commobile',
'$comlandline',

'$bankname',
'$bankacc',
'$branch',
'$ifsc',
'$acctype',

'$product',
'$service',
'$pickup',
'$codrem',
'$billingtype',
'$billingcycle',
'$remittancecycle',
'gm500',

'$status500gm','$status1kg','$status2kg','$status5kg','$status10kg',

'$min_a','$min_b','$min_c','$min_d','$min_e','$add_a','$add_b','$add_c','$add_d','$add_e','$rto_a','$rto_b','$rto_c','$rto_d','$rto_e','$fsc','$cod','$shipmentlia','$gst','$specialnote',

'$min1_a','$min1_b','$min1_c','$min1_d','$min1_e','$add1_a','$add1_b','$add1_c','$add1_d','$add1_e','$rto1_a','$rto1_b','$rto1_c','$rto1_d','$rto1_e','$fsc1','$cod1','$shipmentlia1','$gst1','$specialnote1',
'$min2_a','$min2_b','$min2_c','$min2_d','$min2_e','$add2_a','$add2_b','$add2_c','$add2_d','$add2_e','$rto2_a','$rto2_b','$rto2_c','$rto2_d','$rto2_e','$fsc2','$cod2','$shipmentlia2','$gst2','$specialnote2',
'$min5_a','$min5_b','$min5_c','$min5_d','$min5_e','$add5_a','$add5_b','$add5_c','$add5_d','$add5_e','$rto5_a','$rto5_b','$rto5_c','$rto5_d','$rto5_e','$fsc5','$cod5','$shipmentlia5','$gst5','$specialnote5',
'$min10_a','$min10_b','$min10_c','$min10_d','$min10_e','$add10_a','$add10_b','$add10_c','$add10_d','$add10_e','$rto10_a','$rto10_b','$rto10_c','$rto10_d','$rto10_e','$fsc10','$cod10','$shipmentlia10','$gst10','$specialnote10',

'$clientid',
'$password',
'$oripassword',

'$clientauth',
'$designation',
'$clientemail',
'$clientmobile',

'$clientpoc',
'$pocdesignation',
'$pocemail',
'$pocmobile',

'$operationpoc',
'$operationdesignation',
'$operationemail',
'$operationmobile',

'$bdname',
'$bddesignation',
'$bdemail',
'$bdmobile',

'$uploadimagename',
'$gstcername',
'$canchequename',
'$addproofename',
'$clientmailaccname',
'$foldername',
now(),
'1',
'Admin'
)
";


mysqli_query($conn,$query);
$last_id0 = mysqli_insert_id($conn);
$useruinqueidnois0 = "RPXC".$last_id0;
$uniquequery0 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois0',`useruinqueparentid`='$useruinqueidnois0' WHERE `User_Id`='$last_id0'";
mysqli_query($conn,$uniquequery0);
mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id0')");

// *    *   *   Main/500Gm   *   *   *   End
// *    *   *   1KG     *   *   *   Start
if($min1_a){
    $query1 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min1_a`,`min1_b`,`min1_c`,`min1_d`,`min1_e`,`add1_a`,`add1_b`,`add1_c`,`add1_d`,`add1_e`,`Rto1_a`,`Rto1_b`,`Rto1_c`,`Rto1_d`,`Rto1_e`,`FSC1`,`COD1`,`Shipment_Lia1`,`GST1`,`specialnotes1`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg1','$min1_a','$min1_b','$min1_c','$min1_d','$min1_e','$add1_a','$add1_b','$add1_c','$add1_d','$add1_e','$rto1_a','$rto1_b','$rto1_c','$rto1_d','$rto1_e','$fsc1','$cod1','$shipmentlia1','$gst1','$specialnote1','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
    mysqli_query($conn,$query1);
    $last_id1 = mysqli_insert_id($conn);
    $useruinqueidnois1 = "RPXC".$last_id1;
    $uniquequery1 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois1',`useruinqueparentid`='$useruinqueidnois0' WHERE `User_Id`='$last_id1'";
    mysqli_query($conn,$uniquequery1);
    mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id1')");
}
// *    *   *   1KG     *   *   *   End
// *    *   *   2KG     *   *   *   Start
if($min2_a){
    $query2 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min2_a`,`min2_b`,`min2_c`,`min2_d`,`min2_e`,`add2_a`,`add2_b`,`add2_c`,`add2_d`,`add2_e`,`Rto2_a`,`Rto2_b`,`Rto2_c`,`Rto2_d`,`Rto2_e`,`FSC2`,`COD2`,`Shipment_Lia2`,`GST2`,`specialnotes2`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg2','$min2_a','$min2_b','$min2_c','$min2_d','$min2_e','$add2_a','$add2_b','$add2_c','$add2_d','$add2_e','$rto2_a','$rto2_b','$rto2_c','$rto2_d','$rto2_e','$fsc2','$cod2','$shipmentlia2','$gst2','$specialnote2','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
    mysqli_query($conn,$query2);
    $last_id2 = mysqli_insert_id($conn);
    $useruinqueidnois2 = "RPXC".$last_id2;
    $uniquequery2 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois2',`useruinqueparentid`='$useruinqueidnois0' WHERE `User_Id`='$last_id2'";
    mysqli_query($conn,$uniquequery2);
    mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id2')");
}
// *    *   *   2KG     *   *   *   End
// *    *   *   5KG     *   *   *   Start
if($min5_a){
    $query5 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min5_a`,`min5_b`,`min5_c`,`min5_d`,`min5_e`,`add5_a`,`add5_b`,`add5_c`,`add5_d`,`add5_e`,`Rto5_a`,`Rto5_b`,`Rto5_c`,`Rto5_d`,`Rto5_e`,`FSC5`,`COD5`,`Shipment_Lia5`,`GST5`,`specialnotes5`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg5','$min5_a','$min5_b','$min5_c','$min5_d','$min5_e','$add5_a','$add5_b','$add5_c','$add5_d','$add5_e','$rto5_a','$rto5_b','$rto5_c','$rto5_d','$rto5_e','$fsc5','$cod5','$shipmentlia5','$gst5','$specialnote5','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
    mysqli_query($conn,$query5);
    $last_id5 = mysqli_insert_id($conn);
    $useruinqueidnois5 = "RPXC".$last_id5;
    $uniquequery5 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois5',`useruinqueparentid`='$useruinqueidnois0' WHERE `User_Id`='$last_id5'";
    mysqli_query($conn,$uniquequery5);
    mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id5')");
}
// *    *   *   5KG     *   *   *   End
// *    *   *   10KG     *   *   *   Start
if($min10_a){
    $query10 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min10_a`,`min10_b`,`min10_c`,`min10_d`,`min10_e`,`add10_a`,`add10_b`,`add10_c`,`add10_d`,`add10_e`,`Rto10_a`,`Rto10_b`,`Rto10_c`,`Rto10_d`,`Rto10_e`,`FSC10`,`COD10`,`Shipment_Lia10`,`GST10`,`specialnotes10`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg10','$min10_a','$min10_b','$min10_c','$min10_d','$min10_e','$add10_a','$add10_b','$add10_c','$add10_d','$add10_e','$rto10_a','$rto10_b','$rto10_c','$rto10_d','$rto10_e','$fsc10','$cod10','$shipmentlia10','$gst10','$specialnote10','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
    mysqli_query($conn,$query10);
    $last_id10 = mysqli_insert_id($conn);
    $useruinqueidnois10 = "RPXC".$last_id10;
    $uniquequery10 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois10',`useruinqueparentid`='$useruinqueidnois0' WHERE `User_Id`='$last_id10'";
    mysqli_query($conn,$uniquequery10);
    mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id10')");
}
// *    *   *   10KG     *   *   *   End






//  *   *   *    Mail Send To Client *  *   *
//     require 'phpmailer/PHPMailerAutoload.php';
//     $mail = new PHPMailer;

//     $mail->isSMTP();
//     $mail->Host='smtp.gmail.com';
//     $mail->Port=587;
//     $mail->SMTPAuth=true;
//     $mail->SMTPSecure='tls';

//     $mail->Username="rappidxteam@gmail.com";
//     $mail->Password="custmrSPRT@1188";

//     $mail->setFrom('techsupport@rappidx.com');
//     $mail->addAddress("$Email");
//     $mail->addAddress('customersupport@rappidx.com');
//     $mail->addReplyTo('techsupport@rappidx.com');

//     $mail->isHTML(true);
//     $mail->Subject="Rappidx Account Details";
//     $mail->Body="
// Hello, <br><br>
// Greetings from Rappidx! We are glad to serve your esteemed organization and welcome you to the Rappidx Family. Our client servicing team will soon get in touch with you with the escalation matrix and other details. <br> <br>

// Follow the instructions given below to login to Rappidx client portal <br>
// Logon on to www.rappidx.com <br>
// Click the option login/sign up <br>
// Login to the system with the following login credentials: <br>
// User Id: ".$clientid." <br>
// Password: ".$oripassword." <br>
// Welcome again and we look forward to a mutually rewarding and long standing business relationship. <br>
// Thank You! <br>
// Team Rappidx <br><br><br>


// Warm Regards <br>

// Divyam Srivastava | Key Accounts Manager <br>

// 9559771188
// ";
//     $mail->send();
//  *   *   *    Mail Send To Client *  *   *
    echo "<script>window.location.assign('Client_Registration.php?msg=y')</script>";
}catch (Exception $e) {
    echo "<script>window.location.assign('Client_Registration.php?msg=n')</script>";
}


}
 ?>






                </div>
            </div>
            <!--5 th tab bank application ending  -->

        </section>





    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->




</div>

<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
