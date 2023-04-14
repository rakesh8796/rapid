<?php
include "Layout_Header.php";
// include "Layout_Footer.php";

include('config/dbconnection.php');

$tdate = date("Y-m-d");
if($_GET['m']){
    $useridis = $_GET['m'];
    // $allclientquery = "SELECT * FROM `retailers_clients` WHERE `rcsno`='$useridis'";
    $allclientquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$useridis'";
    $allclientqueryr=mysqli_query($conn,$allclientquery);
    $row = mysqli_fetch_assoc($allclientqueryr);
    // $User_Id = $row['rcsno'];
    $User_Id = $row['User_Id'];
    

    $User_Email1 = $row['Email'];

    $Company_Name1 = $row['User_Email'];
    $Reg_Mobile1 = $row['Reg_Mobile'];
    $folderare = $row['foldername'];
}else{
    echo "<script>window.location.assign('Login.php')</script>";
}
?>


<link rel="stylesheet" type="text/css" href="vendors/gridforms/css/gridforms.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">


<style type="text/css">
.icon {
      padding: 5px;
      background: #ffd647;
      color: white;
      min-width: 50px;
      text-align: center;
      margin-top: -29px;
      float: right;
    }
</style>

<div class="col-md-12 white-box">
    <div class="col-md-12">
        <span class="fontweighlight"><span class="text-primary"><?= $row['Company_Name'] ?></span> retailer details</span>
    </div>
</div>


            <section class="content">
            <div class="row white-box fontweighlight">
                <!--5th tab bank application starting-->
                <div class="col-lg-12">


<!--<form class="grid-form" enctype="multipart/form-data"  method="post" action="Retailer_Edit_a.php">-->
<!--    <button type="submit" class="btn btn-primary" name="submit" style="color:black">&ensp; Update Client Details &ensp;</button>-->
<!--</form>-->

<form class="grid-form" enctype="multipart/form-data"  method="post" action="Retailer_Edit_a.php">
<!--<form class="grid-form" enctype="multipart/form-data"  method="post" action="Retailer_All.php">-->
    <!-- <h2 class="text-center">ONBOARDING FORM</h2> -->
    <h2 class="text-center">

<?php
if(@$_GET['msg']=="y"){
    echo "<span style='color:green'>Retailer details updated</span>";
}elseif(@$_GET['msg']=="n"){
    echo "<span style='color:red'>Retailer details not updated</span>";
}else{
    echo "<span class='text-primary'>".$row['Company_Name']."</span> update details";
}
?>
</h2>


























    <fieldset>
        <legend></legend>
        <div data-row-span="3">
            <div data-field-span="1">
                <label>Company Registered Name</label>
                <input type="text" name="companyname" value="<?= $row['Company_Name'] ?>" required="" readonly="">
            </div>
            <div data-field-span="1">
                <label>Client login Id <span style="color:black"><b>(User Unique ID)</b></span></label>
                <input type="text" disabled="" name="clientidusername" readonly="" value="<?= $row['User_Email'] ?>" class="input-field">
            </div>
            <div data-field-span="1">
                <label><span style="color:black"><b>Password</b></span></label>
                <input type="text" name="clientpass" value="<?= $row['User_Password_show'] ?>" class="input-field">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Personal Details</legend>
        <div data-row-span="4">
            <div data-field-span="1">
                <label>Website</label>
                <input type="text" name="website" value="<?= $row['Website'] ?>" autofocus>
            </div>
            <div data-field-span="1">
                <label>Brand Name</label>
                <input type="text" name="brand" value="<?= $row['Brand'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Email Id</label>
                <input type="text" name="Email" value="<?= $row['Email'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>PAN Number</label>
                <input type="text" name="pan" value="<?= $row['Pan'] ?>" required="">
            </div>
        </div>
        <div data-row-span="4">
             <div data-field-span="2">
                <label>TAN Number</label>
                <input type="text" name="tan" value="<?= $row['Tan'] ?>">
            </div>
            <div data-field-span="2">
                <label>GST Number</label>
                <input type="text" name="gstno" value="<?= $row['GST_No'] ?>" required="">
            </div>
        </div>

        <br>
        <fieldset>
            <legend>Registered address</legend>
            <div data-row-span="5">
                <div data-field-span="1">
                    <label>Address</label>
                    <input type="text" name="regaddress" value="<?= $row['Reg_Address'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="regcity" value="<?= $row['Reg_City'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="regpin" value="<?= $row['Reg_Pin'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="regmobile" value="<?= $row['Reg_Mobile'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Alternate Mobile</label>
                    <input type="text" name="reglandline" value="<?= $row['Reg_Landline'] ?>" required="">
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
                    <input type="text" name="comaddress" value="<?= $row['Com_Address'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="comcity" value="<?= $row['Com_City'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="compin" value="<?= $row['Com_Pin'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="commobile" value="<?= $row['Com_Mobile'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Alternate Mobile</label>
                    <input type="text" name="comlandline" value="<?= $row['Com_Landline'] ?>" required="">
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
                <input type="text" name="bankname" value="<?= $row['Bankname'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Account No.</label>
                <input type="text" name="bankacc" value="<?= $row['Bankaccount'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Branch</label>
                <input type="text" name="branch" value="<?= $row['Branch'] ?>" required="">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>IFSC Code</label>
                <input type="text" name="ifsc" value="<?= $row['IFSC'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Account Type</label>
                <input type="text" name="acctype" value="<?= $row['Acc_Type'] ?>" required="">
            </div>
        </div>
    </fieldset>
    <br>
    <br>



<fieldset>
<legend>Product
</legend>
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
        if($row['Product']==$presres['prodcate'])
        {
            echo "<option value=".$presres["prodcate"]." selected>".$presres["prodcate"]."</option>";
        }else
        {
            echo "<option value=".$presres["prodcate"].">".$presres["prodcate"]."</option>";
        }
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
<?php
if($row['Service']=="Forward"){
?>
    <label>
        <input type="radio" name="service" value="Forward" checked> Forward
    </label> &nbsp;
    <label>
        <input type="radio" name="service" value="Reverse"> Reverse
    </label>&nbsp;
    <label>
        <input type="radio" name="service" value="Both"> Forward and Reverse Both
    </label>
<?php
}elseif($row['Service']=="Reverse"){
?>
    <label>
        <input type="radio" name="service" value="Forward"> Forward
    </label> &nbsp;
    <label>
        <input type="radio" name="service" value="Reverse" checked> Reverse
    </label>&nbsp;
    <label>
        <input type="radio" name="service" value="Both"> Forward and Reverse Both
    </label>
<?php
}elseif($row['Service']=="Both"){
?>
    <label>
        <input type="radio" name="service" value="Forward"> Forward
    </label> &nbsp;
    <label>
        <input type="radio" name="service" value="Reverse"> Reverse
    </label>&nbsp;
    <label>
        <input type="radio" name="service" value="Both" checked> Forward and Reverse Both
    </label>
<?php
}
?>

        </div>
        <div data-field-span="1">
            <label>Pickup point</label>
<?php
if($row['Pickup']=="Single/Werehouse"){
?>
    <label>
        <input type="radio" name="pickup" value="Single/Werehouse" checked> Single/Werehouse
    </label> &nbsp;
    <label>
        <input type="radio" name="pickup" value="Multiple/Marketplace"> Multiple/Marketplace
    </label>
<?php
}elseif($row['Pickup']=="Multiple/Marketplace"){
?>
    <label>
        <input type="radio" name="pickup" value="Single/Werehouse"> Single/Werehouse
    </label> &nbsp;
    <label>
        <input type="radio" name="pickup" value="Multiple/Marketplace" checked> Multiple/Marketplace
    </label>
<?php
}
?>


        </div>
    </div>

</fieldset>
<fieldset>
    <legend>Remittance and Billing</legend>
    <div data-row-span="2">
        <div data-field-span="1">
            <label>COD Remittance Type </label>
<?php
if($row['Cod_Rem']=="Hybrid"){
?>
    <label>
        <input type="radio" name="codrem" value="Hybrid" checked> Hybrid
    </label> &nbsp;
    <label>
        <input type="radio" name="codrem" value="Non-Hybrid"> Non-Hybrid
    </label>
<?php
}elseif($row['Cod_Rem']=="Non-Hybrid"){
?>
    <label>
        <input type="radio" name="codrem" value="Hybrid"> Hybrid</label> &nbsp;
    <label>
        <input type="radio" name="codrem" value="Non-Hybrid" checked> Non-Hybrid
    </label>
<?php
}
?>

        </div>
        <div data-field-span="1">
            <label>Billing Type </label>
<?php
if($row['Billing_Type']=="Prepaid"){
?>
    <label>
        <input type="radio" name="billingtype" value="Prepaid" checked> Prepaid</label> &nbsp;
    <label>
        <input type="radio" name="billingtype" value="Postpaid"> Postpaid
    </label>
<?php
}elseif($row['Billing_Type']=="Postpaid"){
?>
    <label>
        <input type="radio" name="billingtype" value="Prepaid"> Prepaid</label> &nbsp;
    <label>
        <input type="radio" name="billingtype" value="Postpaid" checked> Postpaid
    </label>
<?php
}
?>


        </div>
    </div>
    <div data-row-span="1">
        <div data-field-span="1">
            <label>Billing Cycle</label>
<?php
if($row['Billing_Cycle']=="Weekly"){
?>
    <label>
        <input type="radio" name="billingcycle" value="Weekly" checked> Weekly</label> &nbsp;
    <label>
        <input type="radio" name="billingcycle" value="Fortnightly"> Fortnightly
    </label>
    <label>
        <input type="radio" name="billingcycle" value="Monthly"> Monthly
    </label>
<?php
}elseif($row['Billing_Cycle']=="Fortnightly"){
?>
    <label>
        <input type="radio" name="billingcycle" value="Weekly"> Weekly</label> &nbsp;
    <label>
        <input type="radio" name="billingcycle" value="Fortnightly" checked> Fortnightly
    </label>
    <label>
        <input type="radio" name="billingcycle" value="Monthly"> Monthly
    </label>
<?php
}elseif($row['Billing_Cycle']=="Monthly"){
?>
    <label>
        <input type="radio" name="billingcycle" value="Weekly"> Weekly</label> &nbsp;
    <label>
        <input type="radio" name="billingcycle" value="Fortnightly"> Fortnightly
    </label>
    <label>
        <input type="radio" name="billingcycle" value="Monthly" checked> Monthly
    </label>
<?php
}
?>

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
                    <input type="text" name="remittancecycle" class="form-control" style="width:50%" value="<?= $row['remittancecycle'] ?>">
                </div>
                <div class="col-md-6"></div>
            </div>
        </label>
    </div>
</fieldset>




























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
<?php
if($row['commercialstype']=="gm500"){
?>
    <input type="radio" name="commercialstype" value="gm500" onclick="openCity('gm500')" style="cursor:pointer" checked=""> 500 GM
<?php
}else{
?>
    <input type="radio" name="commercialstype" value="gm500" onclick="openCity('gm500')" style="cursor:pointer"> 500 GM
<?php
}
?>
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
<?php
if($row['commercialstype']=="kg1"){
?>
    <input type="radio" name="commercialstype" value="kg1" onclick="openCity('kg1')" style="cursor:pointer" checked=""> 1 KG
<?php
}else{
?>
    <input type="radio" name="commercialstype" value="kg1" onclick="openCity('kg1')" style="cursor:pointer"> 1 KG
<?php
}
?>
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
<?php
if($row['commercialstype']=="kg2"){
?>
    <input type="radio" name="commercialstype" value="kg2" onclick="openCity('kg2')" style="cursor:pointer" checked=""> 2 KG
<?php
}else{
?>
    <input type="radio" name="commercialstype" value="kg2" onclick="openCity('kg2')" style="cursor:pointer"> 2 KG
<?php
}
?>
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
<?php
if($row['commercialstype']=="kg5"){
?>
    <input type="radio" name="commercialstype" value="kg5" onclick="openCity('kg5')" style="cursor:pointer" checked=""> 5 KG
<?php
}else{
?>
    <input type="radio" name="commercialstype" value="kg5" onclick="openCity('kg5')" style="cursor:pointer"> 5 KG
<?php
}
?>
            </strong></label></h4>
        </div>
        <div class="col-md-2">
            <h4><label><strong>
<?php
if($row['commercialstype']=="kg10"){
?>
    <input type="radio" name="commercialstype" value="kg10" onclick="openCity('kg10')" style="cursor:pointer" checked=""> 10 KG
<?php
}else{
?>
    <input type="radio" name="commercialstype" value="kg10" onclick="openCity('kg10')" style="cursor:pointer"> 10 KG
<?php
}
?>
            </strong></label></h4>
        </div>
    </div>
</legend>


        
        <div data-row-span="12">
            <div data-field-span="2"></div>
            <div data-field-span="2">
                <label>A-Intracity</label>
            </div>
            <div data-field-span="1">
                <label>B-Within-Zone</label>
            </div>
            <div data-field-span="1">
                <label>B1-Within-Zone</label>
            </div>
            <div data-field-span="1">
                <label>C-Metro</label>
            </div>
            <div data-field-span="1">
                <label>C1-Metro</label>
            </div>
            <div data-field-span="1">
                <label>D-ROI</label>
            </div>
            <div data-field-span="1">
                <label>D1-ROI</label>
            </div>
            <div data-field-span="1">
                <label>E-Special Zone</label>
            </div>
            <div data-field-span="1">
                <label>F-Special Zone</label>
            </div>
        </div>

<!-- 500 GM -->
<?php
if($row['commercialstype']=="gm500"){
?>
    <div id="gm500" class="city">
<?php
}else{
?>
    <div id="gm500" class="city" style="display:none">
<?php
}
?>



        <div data-row-span="12">
            <div data-field-span="2">
                <label>MIN 500 Gram</label>
            </div>
            <div data-field-span="2">
                <input type="text" name="min_a" value="<?= $row['Min_a'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_b" value="<?= $row['Min_b'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_b1" value="<?= $row['Min_b1'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_c" value="<?= $row['Min_c'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_c1" value="<?= $row['Min_c1'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_d" value="<?= $row['Min_d'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_d1" value="<?= $row['Min_d1'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_e" value="<?= $row['Min_e'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_f" value="<?= $row['Min_f'] ?>">
            </div>
        </div>

        <div data-row-span="12">
            <div data-field-span="2">
                <label>ADDITIONAL 500 Gram</label>
            </div>
            <div data-field-span="2">
                <input type="text" name="add_a" value="<?= $row['Add_a'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_b" value="<?= $row['Add_b'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_b1" value="<?= $row['Add_b1'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_c" value="<?= $row['Add_c'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_c1" value="<?= $row['Add_c1'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_d" value="<?= $row['Add_d'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_d1" value="<?= $row['Add_d1'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_e" value="<?= $row['Add_e'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="add_f" value="<?= $row['Add_f'] ?>">
            </div>



        </div>

        <div data-row-span="12">
            <div data-field-span="2">
              <label>RTO</label>
            </div>
            <div data-field-span="2">
              <input type="text" name="rto_a" class="rto_a" value="<?= $row['Rto_a'] ?>">
            </div>
            <div data-field-span="1">
              <input type="text" name="rto_b" class="rto_b" value="<?= $row['Rto_b'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_b1" value="<?= $row['Rto_b1'] ?>">
            </div>
            <div data-field-span="1">
              <input type="text" name="rto_c" class="rto_c" value="<?= $row['Rto_c'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_c1" value="<?= $row['Rto_c1'] ?>">
            </div>
            <div data-field-span="1">
              <input type="text" name="rto_d" class="rto_d" value="<?= $row['Rto_d'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_d1" value="<?= $row['Rto_d1'] ?>">
            </div>
            <div data-field-span="1">
              <input type="text" name="rto_e" class="rto_e" value="<?= $row['Rto_e'] ?>">
            </div>
            <div data-field-span="1">
                <input type="text" name="rto_f" value="<?= $row['Rto_f'] ?>">
            </div>
        </div>
<!--  -->



        <div data-row-span="2">
          <div data-field-span="1">
              <label>FSC</label>
              <input type="text" name="fsc" class="fsc" value="<?= $row['FSC'] ?>">
          </div>
          <div data-field-span="1">
              <label>COD (Min 1 or Higher 100)</label>
              <input type="number" name="cod" class="cod" value="<?= $row['COD'] ?>" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
              <label>Shipment Liabilty</label>
              <input type="text" name="shipmentlia" class="shipmentlia" value="<?= $row['Shipment_Lia'] ?>">
          </div>
          <div data-field-span="1">
              <label>GST</label>
              <input type="text" name="gst" class="gst" value="<?= $row['GST'] ?>">
          </div>
        </div>
        <div data-row-span="1">
          <div data-field-span="1">
            <label>Note(If Any)</label>
            <input type="text" name="specialnote" value="<?= $row['specialnotes'] ?>">
          </div>
        </div>
<!--  -->
    </div>
<!-- 500 GM -->
<!-- 1 KG -->


<?php
if($row['commercialstype']=="kg1"){
?>
    <div id="kg1" class="city">
<?php
}else{
?>
    <div id="kg1" class="city" style="display:none">
<?php
}
?>

<div data-row-span="12">
    <div data-field-span="2">
        <label>MIN 1kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="min1_a" value="<?= $row['min1_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_b" value="<?= $row['min1_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_b1" value="<?= $row['min1_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_c" value="<?= $row['min1_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_c1" value="<?= $row['min1_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_d" value="<?= $row['min1_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_d1" value="<?= $row['min1_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_e" value="<?= $row['min1_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min1_f" value="<?= $row['min1_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
        <label>ADDITIONAL 1kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="add1_a" value="<?= $row['add1_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_b" value="<?= $row['add1_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_b1" value="<?= $row['add1_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_c" value="<?= $row['add1_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_c1" value="<?= $row['add1_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_d" value="<?= $row['add1_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_d1" value="<?= $row['add1_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_e" value="<?= $row['add1_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add1_f" value="<?= $row['add1_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
      <label>RTO</label>
    </div>
    <div data-field-span="2">
      <input type="text" name="rto1_a" class="rto_a" value="<?= $row['Rto1_a'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto1_b" class="rto_b" value="<?= $row['Rto1_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto1_b1" value="<?= $row['Rto1_b1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto1_c" class="rto_c" value="<?= $row['Rto1_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto1_c1" value="<?= $row['Rto1_c1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto1_d" class="rto_d" value="<?= $row['Rto1_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto1_d1" value="<?= $row['Rto1_d1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto1_e" class="rto_e" value="<?= $row['Rto1_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto1_f" value="<?= $row['Rto1_f'] ?>">
    </div>
</div>
<!--  -->
        <div data-row-span="2">
          <div data-field-span="1">
              <label>FSC</label>
              <input type="text" name="fsc1" class="fsc" value="<?= $row['FSC1'] ?>">
          </div>
          <div data-field-span="1">
              <label>COD (Min 1 or Higher 100)</label>
              <input type="number" name="cod1" class="cod" value="<?= $row['COD1'] ?>" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
              <label>Shipment Liabilty</label>
              <input type="text" name="shipmentlia1" class="shipmentlia" value="<?= $row['Shipment_Lia1'] ?>">
          </div>
          <div data-field-span="1">
              <label>GST</label>
              <input type="text" name="gst1" class="gst" value="<?= $row['GST1'] ?>">
          </div>
        </div>
        <div data-row-span="1">
          <div data-field-span="1">
            <label>Note(If Any)</label>
            <input type="text" name="specialnote1" value="<?= $row['specialnotes1'] ?>">
          </div>
        </div>
<!--  -->
    </div>
<!-- 1 KG -->
<!-- 2 KG -->


<?php
if($row['commercialstype']=="kg2"){
?>
    <div id="kg2" class="city">
<?php
}else{
?>
    <div id="kg2" class="city" style="display:none">
<?php
}
?>
<div data-row-span="12">
    <div data-field-span="2">
        <label>MIN 2kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="min2_a" value="<?= $row['min2_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_b" value="<?= $row['min2_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_b1" value="<?= $row['min2_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_c" value="<?= $row['min2_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_c1" value="<?= $row['min2_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_d" value="<?= $row['min2_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_d1" value="<?= $row['min2_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_e" value="<?= $row['min2_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min2_f" value="<?= $row['min2_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
        <label>ADDITIONAL 2kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="add2_a" value="<?= $row['add2_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_b" value="<?= $row['add2_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_b1" value="<?= $row['add2_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_c" value="<?= $row['add2_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_c1" value="<?= $row['add2_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_d" value="<?= $row['add2_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_d1" value="<?= $row['add2_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_e" value="<?= $row['add2_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add2_f" value="<?= $row['add2_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
      <label>RTO</label>
    </div>
    <div data-field-span="2">
      <input type="text" name="rto2_a" class="rto_a" value="<?= $row['Rto2_a'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto2_b" class="rto_b" value="<?= $row['Rto2_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto2_b1" value="<?= $row['Rto2_b1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto2_c" class="rto_c" value="<?= $row['Rto2_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto2_c1" value="<?= $row['Rto2_c1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto2_d" class="rto_d" value="<?= $row['Rto2_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto2_d1" value="<?= $row['Rto2_d1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto2_e" class="rto_e" value="<?= $row['Rto2_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto2_f" value="<?= $row['Rto2_f'] ?>">
    </div>
</div>
<!--  -->

        <div data-row-span="2">
          <div data-field-span="1">
              <label>FSC</label>
              <input type="text" name="fsc2" class="fsc" value="<?= $row['FSC2'] ?>">
          </div>
          <div data-field-span="1">
              <label>COD (Min 1 or Higher 100)</label>
              <input type="number" name="cod2" class="cod" value="<?= $row['COD2'] ?>" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
              <label>Shipment Liabilty</label>
              <input type="text" name="shipmentlia2" class="shipmentlia" value="<?= $row['Shipment_Lia2'] ?>">
          </div>
          <div data-field-span="1">
              <label>GST</label>
              <input type="text" name="gst2" class="gst" value="<?= $row['GST2'] ?>">
          </div>
        </div>
        <div data-row-span="1">
          <div data-field-span="1">
            <label>Note(If Any)</label>
            <input type="text" name="specialnote2" value="<?= $row['specialnotes2'] ?>">
          </div>
        </div>
<!--  -->
    </div>
<!-- 2 KG -->
<!-- 5 KG -->


<?php
if($row['commercialstype']=="kg5"){
?>
    <div id="kg5" class="city">
<?php
}else{
?>
    <div id="kg5" class="city" style="display:none">
<?php
}
?>
<div data-row-span="12">
    <div data-field-span="2">
        <label>MIN 5kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="min5_a" value="<?= $row['min5_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_b" value="<?= $row['min5_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_b1" value="<?= $row['min5_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_c" value="<?= $row['min5_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_c1" value="<?= $row['min5_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_d" value="<?= $row['min5_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_d1" value="<?= $row['min5_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_e" value="<?= $row['min5_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min5_f" value="<?= $row['min5_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
        <label>ADDITIONAL 5kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="add5_a" value="<?= $row['add5_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_b" value="<?= $row['add5_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_b1" value="<?= $row['add5_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_c" value="<?= $row['add5_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_c1" value="<?= $row['add5_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_d" value="<?= $row['add5_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_d1" value="<?= $row['add5_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_e" value="<?= $row['add5_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add5_f" value="<?= $row['add5_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
      <label>RTO</label>
    </div>
    <div data-field-span="2">
      <input type="text" name="rto5_a" class="rto_a" value="<?= $row['Rto5_a'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto5_b" class="rto_b" value="<?= $row['Rto5_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto5_b1" value="<?= $row['Rto5_b1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto5_c" class="rto_c" value="<?= $row['Rto5_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto5_c1" value="<?= $row['Rto5_c1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto5_d" class="rto_d" value="<?= $row['Rto5_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto5_d1" value="<?= $row['Rto5_d1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto5_e" class="rto_e" value="<?= $row['Rto5_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto5_f" value="<?= $row['Rto5_f'] ?>">
    </div>
</div>
<!--  -->

        <div data-row-span="2">
          <div data-field-span="1">
              <label>FSC</label>
              <input type="text" name="fsc5" class="fsc" value="<?= $row['FSC5'] ?>">
          </div>
          <div data-field-span="1">
              <label>COD (Min 1 or Higher 100)</label>
              <input type="number" name="cod5" class="cod" value="<?= $row['COD5'] ?>" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
              <label>Shipment Liabilty</label>
              <input type="text" name="shipmentlia5" class="shipmentlia" value="<?= $row['Shipment_Lia5'] ?>">
          </div>
          <div data-field-span="1">
              <label>GST</label>
              <input type="text" name="gst5" class="gst" value="<?= $row['GST5'] ?>">
          </div>
        </div>
        <div data-row-span="1">
          <div data-field-span="1">
            <label>Note(If Any)</label>
            <input type="text" name="specialnote5" value="<?= $row['specialnotes5'] ?>">
          </div>
        </div>
<!--  -->
    </div>
<!-- 5 KG -->
<!-- 10 KG -->


<?php
if($row['commercialstype']=="kg10"){
?>
    <div id="kg10" class="city">
<?php
}else{
?>
    <div id="kg10" class="city" style="display:none">
<?php
}
?>
<div data-row-span="12">
    <div data-field-span="2">
        <label>MIN 10kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="min10_a" value="<?= $row['min10_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_b" value="<?= $row['min10_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_b1" value="<?= $row['min10_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_c" value="<?= $row['min10_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_c1" value="<?= $row['min10_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_d" value="<?= $row['min10_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_d1" value="<?= $row['min10_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_e" value="<?= $row['min10_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="min10_f" value="<?= $row['min10_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
        <label>ADDITIONAL 10kg</label>
    </div>
    <div data-field-span="2">
        <input type="text" name="add10_a" value="<?= $row['add10_a'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_b" value="<?= $row['add10_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_b1" value="<?= $row['add10_b1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_c" value="<?= $row['add10_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_c1" value="<?= $row['add10_c1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_d" value="<?= $row['add10_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_d1" value="<?= $row['add10_d1'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_e" value="<?= $row['add10_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="add10_f" value="<?= $row['add10_f'] ?>">
    </div>
</div>
<div data-row-span="12">
    <div data-field-span="2">
      <label>RTO</label>
    </div>
    <div data-field-span="2">
      <input type="text" name="rto10_a" class="rto_a" value="<?= $row['Rto10_a'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto10_b" class="rto_b" value="<?= $row['Rto10_b'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto10_b1" value="<?= $row['Rto10_b1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto10_c" class="rto_c" value="<?= $row['Rto10_c'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto10_c1" value="<?= $row['Rto10_c1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto10_d" class="rto_d" value="<?= $row['Rto10_d'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto10_d1" value="<?= $row['Rto10_d1'] ?>">
    </div>
    <div data-field-span="1">
      <input type="text" name="rto10_e" class="rto_e" value="<?= $row['Rto10_e'] ?>">
    </div>
    <div data-field-span="1">
        <input type="text" name="rto10_f" value="<?= $row['Rto10_f'] ?>">
    </div>
</div>
<!--  -->

        <div data-row-span="2">
          <div data-field-span="1">
              <label>FSC</label>
              <input type="text" name="fsc10" class="fsc" value="<?= $row['FSC10'] ?>">
          </div>
          <div data-field-span="1">
              <label>COD (Min 1 or Higher 100)</label>
              <input type="number" name="cod10" class="cod" value="<?= $row['COD10'] ?>" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
          </div>
        </div>
        <div data-row-span="2">
          <div data-field-span="1">
              <label>Shipment Liabilty</label>
              <input type="text" name="shipmentlia10" class="shipmentlia" value="<?= $row['Shipment_Lia10'] ?>">
          </div>
          <div data-field-span="1">
              <label>GST</label>
              <input type="text" name="gst10" class="gst" value="<?= $row['GST10'] ?>">
          </div>
        </div>
        <div data-row-span="1">
          <div data-field-span="1">
            <label>Note(If Any)</label>
            <input type="text" name="specialnote10" value="<?= $row['specialnotes10'] ?>">
          </div>
        </div>
<!--  -->
    </div>
<!-- 10 KG -->

<!--  -->

<!--  -->

        <br>
<fieldset>































            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client Authorized Signatory</label>
                    <input type="text" name="clientauth" value="<?= $row['Client_Auth'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="designation" value="<?= $row['Designation'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="clientemail" value="<?= $row['Client_Email'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="clientmobile" value="<?= $row['Client_Mobile'] ?>" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client’s Finance POC</label>
                    <input type="text" name="clientpoc" value="<?= $row['Client_poc'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="pocdesignation" value="<?= $row['Poc_Designation'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="pocemail" value="<?= $row['Poc_Email'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="pocmobile" value="<?= $row['Poc_Mobile'] ?>" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Client’s Operation POC</label>
                    <input type="text" name="operationpoc" value="<?= $row['Operation_Poc'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="operationdesignation" value="<?= $row['Operation_Designation'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="operationemail" value="<?= $row['Operation_Mail'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="operationmobile" value="<?= $row['Operation_Mobile'] ?>" required="">
                </div>
            </div>
            <div data-row-span="4">
                <div data-field-span="1">
                    <label>Rappidx BD Name</label>
                    <input type="text" name="bdname" value="<?= $row['Bd_Name'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Designation</label>
                    <input type="text" name="bddesignation" value="<?= $row['Bd_Designation'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Email</label>
                    <input type="text" name="bdemail" value="<?= $row['Bd_mail'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Mobile</label>
                    <input type="text" name="bdmobile" value="<?= $row['Bd_Mobile'] ?>" required="">
                </div>
            </div>













<style>
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 5</div>
      <img src="upload/<?= $row['foldername'] ?>/<?= $row['Pancard'] ?>" style="width:80%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 5</div>
      <img src="upload/<?= $row['foldername'] ?>/<?= $row['GST_cert'] ?>" style="width:80%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 5</div>
      <img src="upload/<?= $row['foldername'] ?>/<?= $row['Can_Cheque'] ?>" style="width:80%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 5</div>
      <img src="upload/<?= $row['foldername'] ?>/<?= $row['Add_Proofe'] ?>" style="width:80%">
    </div>

    <div class="mySlides">
      <div class="numbertext">5 / 5</div>
      <img src="upload/<?= $row['foldername'] ?>/<?= $row['Client_Mail_acc'] ?>" style="width:80%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="upload/<?= $row['foldername'] ?>/<?= $row['Pancard'] ?>" style="width:80%" onclick="currentSlide(1)" alt="PAN CARD">
    </div>
    <div class="column">
      <img class="demo cursor" src="upload/<?= $row['foldername'] ?>/<?= $row['GST_cert'] ?>" style="width:80%" onclick="currentSlide(2)" alt="GST CERTIFICATE">
    </div>
    <div class="column">
      <img class="demo cursor" src="upload/<?= $row['foldername'] ?>/<?= $row['Can_Cheque'] ?>" style="width:80%" onclick="currentSlide(3)" alt="CANCEL CHEQUE">
    </div>
    <div class="column">
      <img class="demo cursor" src="upload/<?= $row['foldername'] ?>/<?= $row['Add_Proofe'] ?>" style="width:80%" onclick="currentSlide(4)" alt="ADDRESS PROOF">
    </div>
    <div class="column">
      <img class="demo cursor" src="upload/<?= $row['foldername'] ?>/<?= $row['Client_Mail_acc'] ?>" style="width:80%" onclick="currentSlide(5)" alt="CLIENT’S MAIL ACCEPTANCE (COMMERCIALS)">
    </div>
  </div>
</div>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>










            <div data-row-span="3">
            <br>
                <legend>Attach Document</legend>
            <br>
                  <div data-field-span="1" class="text-center">
                    <label>Pan card</label>
<a href="upload/<?= $row['foldername'] ?>/<?= $row['Pancard'] ?>" target="_blank">
    <img src="upload/<?= $row['foldername'] ?>/<?= $row['Pancard'] ?>" style="width:100px;height:100px" class="hover-shadow cursor">
</a>
    <input class="form-control" type="file" id="uploadimage"  name="uploadimage" />
                    </div>
                <div data-field-span="1" class="text-center">
                    <label>GST Certificate</label>

<a href="upload/<?= $row['foldername'] ?>/<?= $row['GST_cert'] ?>" target="_blank">
    <img src="upload/<?= $row['foldername'] ?>/<?= $row['GST_cert'] ?>" style="width:100px;height:100px" class="hover-shadow cursor">
</a>
                    <input id="input-41" type="file" name="gstcert" class="file-loading">
                </div>
                <div data-field-span="1" class="text-center">
                    <label>Cancel Cheque</label>

<a href="upload/<?= $row['foldername'] ?>/<?= $row['Can_Cheque'] ?>" target="_blank">
    <img src="upload/<?= $row['foldername'] ?>/<?= $row['Can_Cheque'] ?>" style="width:100px;height:100px" class="hover-shadow cursor">
</a>
                    <input id="input-41" type="file" name="cancheque" class="file-loading">
                </div>
            </div>
            <div data-row-span="2">
                <div data-field-span="1" class="text-center">
                    <label>Address Proof</label>

<a href="upload/<?= $row['foldername'] ?>/<?= $row['Add_Proofe'] ?>" target="_blank">
    <img src="upload/<?= $row['foldername'] ?>/<?= $row['Add_Proofe'] ?>" style="width:100px;height:100px" class="hover-shadow cursor">
</a>
                    <input id="input-41" type="file" name="addproofe" class="file-loading">
                </div>
                <div data-field-span="1" class="text-center">
                    <label>Client’s Mail Acceptance (commercials)</label>

<a href="upload/<?= $row['foldername'] ?>/<?= $row['Client_Mail_acc'] ?>" target="_blank">
    <img src="upload/<?= $row['foldername'] ?>/<?= $row['Client_Mail_acc'] ?>" style="width:100px;height:100px" class="hover-shadow cursor">
</a>
                    <input id="input-41" type="file" name="clientmailacc" class="file-loading">
                </div>
            </div>


<!-- Status Change -->
<br><br>
 <div data-row-span="3">

    <div data-field-span="1" class="text-center">
        <label><b>Send Mail</b></label>
        <label><b><input type="checkbox" name="sendmail" value="1"> Send Mail</b></label>
    </div>
  <div data-field-span="1" class="text-center">


                <label><b>Client Status</b></label>
<?php
if($row['Active'])
{
?>
    &ensp;&ensp;&ensp;
    <label style="color:green"><b>
        <input type="radio" name="statuscheck" value="1" checked=""> Active
    </b></label>&ensp;&ensp;&ensp;
    <label style="color:red"><b>
        <input type="radio" name="statuscheck" value="0"> Deactive
    </b></label>
<?php
}else
{
?>
    &ensp;&ensp;&ensp;
    <label style="color:green"><b>
        <input type="radio" name="statuscheck" value="1"> Active
    </b></label>&ensp;&ensp;&ensp;
    <label style="color:red"><b>
        <input type="radio" name="statuscheck" value="0" checked=""> Deactive
    </b></label>
<?php
}
?>

</div>
<div data-field-span="1" class="text-center">
    <label><b>Cancel Reason</b></label>
    <input type="text" name="cancel_reason" value="<?= $row['cancel_reason'] ?>">
</div>
</div>
<!-- Status Change -->



        </fieldset>
    </fieldset>


 <div class="modal-footer">
    <center>

<input type="hidden" name="User_Id" value="<?= $User_Id ?>">
<input type="hidden" name="User_UID" value="<?= $row['useruinqueidno'] ?>">
<input type="hidden" name="Company_Name1" value="<?= $Company_Name1 ?>">
<input type="hidden" name="User_Email1" value="<?= $User_Email1 ?>">
<input type="hidden" name="Reg_Mobile1" value="<?= $Reg_Mobile1 ?>">
<input type="hidden" name="folderare" value="<?= $folderare ?>">
    <button type="submit" class="btn btn-primary" name="submit" value="submit" style="color:black">&ensp; Update Client Details &ensp;</button>
    </center>
</div>
</form>

<div class="col-md-12">&ensp;<br>&ensp;</div>


                </div>
            </div>
            <!--5 th tab bank application ending  -->
        </section>





</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php
// include "Layout_Header.php";
include "Layout_Footer.php";
?>
