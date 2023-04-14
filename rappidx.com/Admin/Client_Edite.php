<?php
    include "Layout_Header.php";
    // include "Layout_Footer.php";
?>

<?php
  // ob_start();
  // require_once('include/function/autoload.php');
  include('config/dbconnection.php');
  // $studentObj = new Student;



//
$tdate = date("Y-m-d");
if($_GET['m'])
{
    $useridis = $_GET['m'];
    $allclientquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$useridis'";
    $allclientqueryr=mysqli_query($conn,$allclientquery);
    $row = mysqli_fetch_assoc($allclientqueryr);
    $User_Id = $row['User_Id'];

    $User_Email1 = $row['User_Email'];

    $Company_Name1 = $row['Company_Name'];
    $Reg_Mobile1 = $row['Reg_Mobile'];
    $folderare = $row['foldername'];



}else
{
    echo "Redirect";
}

//

?>

    <!-- <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/> -->
    <link rel="stylesheet" type="text/css" href="vendors/gridforms/css/gridforms.css">
    <!-- <link rel="stylesheet" type="text/css" href="vendors/datedropper/datedropper.css"> -->
    <!-- <link href="vendors/airdatepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css"> -->
     <!-- <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/formelements.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/complex_forms.css"> -->
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




<div class="bg-title">
    <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-11">
        <!--<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">-->
          <h4 class="page-title">Client Edit Details</h4>
        <!--</div>-->
    </div>
    </div>
</div>

            <section class="content">
            <div class="col-md-12">
                <!--5th tab bank application starting-->
                <div class="col-md-12 white-box filterable">





<!-- <form class="grid-form form-horizontal" enctype="multipart/form-data" role="form" id="popup-validation" method="post" action="#"> -->
<form class="grid-form" enctype="multipart/form-data"  method="post" action="Client_Edit_e.php">
    <!-- <h2 class="text-center">ONBOARDING FORM</h2> -->
    <h2 class="text-center">

<?php
if(@$_GET['msg']=="y")
{
    echo "<span style='color:green'>Details Updated</span>";
}elseif(@$_GET['msg']=="n")
{
    echo "<span style='color:red'>Details Not Updated</span>";
}else
{
    echo "Edit/Update Details";
}
?>
</h2>
    <fieldset>
        <legend></legend>
        <div data-row-span="3">
            <div data-field-span="1">
                <label>Company Registered Name</label>
                <input type="text" name="companyname" value="<?= $row['Company_Name'] ?>" required="" autofocus>
            </div>
            <div data-field-span="1">
                <label>Client login Id <span style="color:black"><b>(USER UNIQUE ID)</b></span></label>
                <input type="text" disabled="" readonly="" value="<?= $row['User_Email'] ?>" class="input-field">
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
                <input type="text" name="website" value="<?= $row['Website'] ?>">
            </div>
            <div data-field-span="1">
                <label>Beneficiary Name</label>
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
            <label>Billing Cycle  </label>
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
        <legend>Commercials</legend>
        <div data-row-span="6">
            <div data-field-span="1">
            </div>
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
                <input type="text" name="min_a" value="<?= $row['Min_a'] ?>" required="">
            </div>
            <div data-field-span="1">
                <input type="text" name="min_b" value="<?= $row['Min_b'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_c" value="<?= $row['Min_c'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_d" value="<?= $row['Min_d'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="min_e" value="<?= $row['Min_e'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Additional 500 Gram</label>
            </div>
            <div data-field-span="1">

                <input type="text" name="add_a" value="<?= $row['Add_a'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_b" value="<?= $row['Add_b'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_c" value="<?= $row['Add_c'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_d" value="<?= $row['Add_d'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="add_e" value="<?= $row['Add_e'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>RTO</label>
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_a" value="<?= $row['Rto_a'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_b" value="<?= $row['Rto_b'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_c" value="<?= $row['Rto_c'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_d" value="<?= $row['Rto_d'] ?>" required="">
            </div>
            <div data-field-span="1">

                <input type="text" name="rto_e" value="<?= $row['Rto_e'] ?>" required="">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>FSC</label>
                <input type="text" name="fsc" value="<?= $row['FSC'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>COD (Min 1 or Higher 100)</label>
                <input type="number" name="cod" value="<?= $row['COD'] ?>" required="" min="1" max="100" step="1" id="n" oninput="(validity.valid)||(value='');">
            </div>


        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>Shipment Liabilty</label>
                <input type="text" name="shipmentlia" value="<?= $row['Shipment_Lia'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>GST</label>
                <input type="text" name="gst" value="<?= $row['GST'] ?>" required="">
            </div>
        </div>

        <br>
        <fieldset>
            <!-- <legend>Client Id</legend> -->
            <!-- <div data-row-span="2">

                <div data-field-span="1">
                    <label>Password</label>
                    <input type="password" name="password" value="<?= $row['User_Password'] ?>" required="">
                </div>
            </div> -->
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
<img src="upload/<?= $row['foldername'] ?>/<?= $row['Pancard'] ?>" style="width:100px;height:100px" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">

                    <input class="form-control" type="file" id="uploadimage"  name="uploadimage" />
                </div>
                <div data-field-span="1" class="text-center">
                    <label>GST Certificate</label>


<img src="upload/<?= $row['foldername'] ?>/<?= $row['GST_cert'] ?>" style="width:100px;height:100px" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
<!-- <img id="myImg1" src="upload/<?= $row['foldername'] ?>/<?= $row['GST_cert'] ?>" alt="Pan Card" style="width:100px;height:100px"> -->


                    <input id="input-41" type="file" name="gstcert" class="file-loading">
                </div>
                <div data-field-span="1" class="text-center">
                    <label>Cancel Cheque</label>
<img src="upload/<?= $row['foldername'] ?>/<?= $row['Can_Cheque'] ?>" style="width:100px;height:100px" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
                    <input id="input-41" type="file" name="cancheque" class="file-loading">
                </div>
            </div>
            <div data-row-span="2">
                <div data-field-span="1" class="text-center">
                    <label>Address Proof</label>
<img src="upload/<?= $row['foldername'] ?>/<?= $row['Add_Proofe'] ?>" style="width:100px;height:100px" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
                    <input id="input-41" type="file" name="addproofe" class="file-loading">
                </div>
                <div data-field-span="1" class="text-center">
                    <label>Client’s Mail Acceptance (commercials)</label>
<img src="upload/<?= $row['foldername'] ?>/<?= $row['Client_Mail_acc'] ?>" style="width:100px;height:100px" onclick="openModal();currentSlide(5)" class="hover-shadow cursor">
                    <input id="input-41" type="file" name="clientmailacc" class="file-loading">
                </div>
            </div>


<!-- Status Change -->
<?php
if(empty($row['Active']))
{
    if($row['cancel_reason'])
    {
?>
<br><br>
 <div data-row-span="2">
    <div data-field-span="1" class="text-center">
        <label><b>Current Status</b></label>
        <input type="text" name="cancel_reason" readonly="" disabled="" value="Deactive" style="color:red" class="text-center">
    </div>
    <div data-field-span="1" class="text-center">
        <label><b>Cancel Reason</b></label>
        <input type="text" name="cancel_reason" readonly="" disabled="" value="<?= $row['cancel_reason'] ?>" class="text-center">
    </div>
</div>
<?php
    }
}
?>
<!-- Status Change -->



        </fieldset>
    </fieldset>
    <br>
    <br>

 <div class="modal-footer">
    <center>
        <button type="submit" class="btn btn-primary" name="submit" style="color:black">&ensp; Submit &ensp;</button>

<input type="hidden" name="User_Id" value="<?= $User_Id ?>">
<input type="hidden" name="Company_Name1" value="<?= $Company_Name1 ?>">
<input type="hidden" name="User_Email1" value="<?= $User_Email1 ?>">
<input type="hidden" name="Reg_Mobile1" value="<?= $Reg_Mobile1 ?>">
<input type="hidden" name="folderare" value="<?= $folderare ?>">
        <button type="reset" class="btn btn-primary" style="color:black">&ensp; Reset &ensp;</button>
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
    </center>
</div>
</form>






                </div>
            </div>
            <!--5 th tab bank application ending  -->
            <div id="right">
                <div id="slim2">


                    <div class="rightsidebar-right">
                        <div class="rightsidebar-right-content">
                            <h5 class="rightsidebar-right-heading rightsidebar-right-heading-first text-uppercase text-xs">
                                <i class="menu-icon  fa fa-fw fa-paw"></i> Contacts
                            </h5>
                            <ul class="list-unstyled margin-none">
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar1.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Alanis
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Rolando
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar2.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Marlee
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar3.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-warning"></i> Marlee
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar4.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-danger"></i> Kamryn
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar5.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-muted"></i> Cielo
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar7.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-muted"></i> Charlene
                                    </a>
                                </li>
                            </ul>
                            <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                <i class="fa fa-fw fa-tasks"></i> Tasks
                            </h5>
                            <ul class="list-unstyled m-t-25">
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 1</strong>
                                            <small class="pull-right text-muted">
                                                40% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 40%">
                                                    <span class="sr-only">
                                                        40% Complete (success)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 2</strong>
                                            <small class="pull-right text-muted">
                                                20% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 20%">
                                                    <span class="sr-only">
                                                        20% Complete
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 3</strong>
                                            <small class="pull-right text-muted">
                                                60% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 60%">
                                                    <span class="sr-only">
                                                        60% Complete (warning)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 4</strong>
                                            <small class="pull-right text-muted">
                                                80% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                 aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 80%">
                                                    <span class="sr-only">
                                                        80% Complete (danger)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                <i class="fa fa-fw fa-group"></i> Recent Activities
                            </h5>
                            <div>
                                <ul class="list-unstyled">
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-comment fa-fw text-primary"></i> New Comment
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-twitter fa-fw text-success"></i> 3 New Followers
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-envelope fa-fw text-info"></i> Message Sent
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-tasks fa-fw text-warning"></i> New Task
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-upload fa-fw text-danger"></i> Server Rebooted
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-warning fa-fw text-primary"></i> Server Not Responding
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart fa-fw text-success"></i> New Order Placed
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-money fa-fw text-info"></i> Payment Received
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>






</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->

<?php
    include 'Footer.php';
?>

</body>


</html>
