<?php
include "Layout_Header.php";
// include "Layout_Footer.php";
?>

<?php
extract($_REQUEST);
error_reporting(1);
  // ob_start();
  // require_once('include/function/autoload.php');
  include('config/dbconnection.php');
  // $studentObj = new Student;
//
$tdate = date("Y-m-d");
if($_GET['m'])
{
    $useridis = $_GET['m'];
    $allclientquery = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$useridis'";
    $allclientqueryr=mysqli_query($conn,$allclientquery);
    $row = mysqli_fetch_assoc($allclientqueryr);
    $useridis = $row['loginuser_id'];

    $pickup = $row['pickup_show'];
    $servicablepincode = $row['serviceablepincode_show'];
    $ndrshow = $row['ndr_show'];
    $printshipping = $row['printshipping_show'];
    $reportshow = $row['reports_show'];
    $misshow = $row['mis_show'];
    $podshow = $row['pod_show'];
    $codshow = $row['cod_show'];
    $codremities = $row['codremities_show'];

    $billing = $row['billing_show'];
    $invoiceshow = $row['invoice_show'];
    $remitiesshow = $row['remities_show'];

    $walletshow = $row['wallet_show'];
    $addbalanceshow = $row['addbalance_show'];
    $histroyshow = $row['transactionhistroy_show'];

    $xpressbee = $row['api_xpressbee'];
    $delhivery = $row['api_delhivery'];
    $ekart = $row['api_ekart'];
    $shadowfax = $row['api_shadowfax'];
    $dtdc = $row['api_dtdc'];

// Name Only
    $clientname = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$useridis'";
    $clientnamer=mysqli_query($conn,$clientname);
    $clientnamerd = mysqli_fetch_assoc($clientnamer);
    $nameonly = $clientnamerd['Company_Name'];
    $uniqueuid = $clientnamerd['User_Id'];
    $useruinqueidno = $clientnamerd['useruinqueidno'];
// Name Only
}else
{
    echo "Redirect";
}
//
?>


    <aside class="right-side">

      <style>
      .white-box{
        padding:15px !important;
        border-radius:10px;
      }
      </style>


<section class="content">
  <div class="col-md-12" style="background-color:#E6EAEE">
<div class="col-md-12">

<div class="row bg-title fontweigh">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3><center>
      <span style="color:blue">#_<?= $useruinqueidno ?>&ensp;<?= ucwords($nameonly) ?></span>
      _Client Access Permissions
    </center></h3>
  </div>
</div>

    <div class="">
    <div class="">

<form method="post">
<!--  -->








<!-- Courier Priority -->
<div class="col-md-12 white-box fontweighlight">
<h4 class="text-center"><b>Courier Priority</b></h4>


<div class="col-md-12">
<?php
$arrayName = array($row['api_xpressbee']=>"XpressBee",$row['api_delhivery2']=>"Delhivery2",$row['api_delhivery']=>"Delhivery",$row['api_ekart']=>"Ekart",$row['api_shadowfax']=>"ShadowFax",$row['api_dtdc']=>"DTDC",$row['api_dtdc2']=>"DTDC2");

for ($i=1;$i<8;$i++){
  if(!empty($arrayName[$i])){
      if($arrayName[$i] == "Delhivery"){
          echo "<div class='col-md-3'>Priority $i : <b>Delhivery Surface</b></div>";
      }elseif($arrayName[$i] == "Delhivery2"){
          echo "<div class='col-md-3'>Priority $i : <b>Delhivery Bulky Surface</b></div>";
      }else{
          echo "<div class='col-md-3'>Priority $i : <b>".$arrayName[$i]."</b></div>";
      }
    //   echo "<div class='col-md-3'>Priority $i : <b>".$arrayName[$i]."</b></div>";
  }
}
?>
</div>


<?php

$couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC');
    $tcoureis = 5;
?>
<div class="col-md-12">

<div class="col-md-3">
<select class="form-control" name="courierpriorityset1" onchange="courierprioritysetone(this.value)" style="float:right;border-radius:15px">
<option value="0">Courier Priority 1</option>
<?php
    foreach($couriernames as $key => $couriername){
        if($couriername == "Delhivery"){
            echo "<option value='$key'>Delhivery Surface</option>";
        }elseif($couriername == "Delhivery2"){
            echo "<option value='$key'>Delhivery Bulky Surface</option>";
        }else{
            echo "<option value='$key'>$couriername</option>";
        }
        // echo "<option value='$key'>$couriername</option>";
    }
?>
</select>
</div>


<div class="col-md-3" id="courierprioritytwo">
    <select class="form-control">        <option>Courier Priority 2</option>    </select>
</div>
<div class="col-md-3" id="courierprioritythree">
    <select class="form-control">        <option>Courier Priority 3</option>    </select>
</div>
<div class="col-md-3" id="courierpriorityfour">
    <select class="form-control">        <option>Courier Priority 4</option>    </select>    
</div>

</div>
<div class="col-md-12 my-4">

<div class="col-md-3" id="courierpriorityfive">
    <select class="form-control">        <option>Courier Priority 5</option>    </select>    
</div>
<div class="col-md-3" id="courierprioritysix"></div>
<!-- <div class="col-md-3" id="courierprioritysix">
    <select class="form-control">        <option>Courier Priority 6</option>    </select>    
</div>
<div class="col-md-3" id="courierpriorityseven">
    <select class="form-control">        <option>Courier Priority 7</option>    </select>    
</div>
<div class="col-md-3" id="courierpriorityeight"></div>
 -->

</div> &ensp;
</div>

<script type="text/javascript">
function courierprioritysetone(val){
    // $("#courierpriorityfour").html();
    document.getElementById("courierprioritytwo").style.display = "block";
    // alert(val);
    $.ajax({
    type: "GET",
    url: 'CourierPrioritySet/courierpriority2.php',
    data:{courierselect:val},
    success: function (data){
        $("#courierprioritytwo").html(data);
    },
    error: function (data) {
        console.log('Error:', data);
    }
    });
}
</script>
<!-- Courier Priority -->








<div class="col-md-12 white-box fontweighlight">
<h3 class="text-center">Sidebar Menu Show Permissions</h3><br>
<div class="col-md-6">
<?php
if($pickup){
?>
    <label><b>
        <input type="checkbox" name="pickupaddress1" value="1" checked=""> Pickup Address
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="pickupaddress1" value="1"> Pickup Address
    </b></label>
<?php
}
?>

            </div>
            <div class="col-md-6">

<?php
if($servicablepincode){
?>
    <label><b>
        <input type="checkbox" name="serviceablepincodeshow1" value="1" checked=""> Pincode Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="serviceablepincodeshow1" value="1"> Pincode Show
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($ndrshow){
?>
    <label><b>
        <input type="checkbox" name="ndrmanagementshow1" value="1" checked=""> NDR Management
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="ndrmanagementshow1" value="1"> NDR Management
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($printshipping){
?>
    <label><b>
        <input type="checkbox" name="printshippinglabelshow1" value="1" checked=""> Print Shipping Labels
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="printshippinglabelshow1" value="1"> Print Shipping Labels
    </b></label>
<?php
}
?>
</div>
</div>
<!-- //Main Service -->
<!-- Reports -->
<div class="col-md-12 white-box fontweighlight"><br>
<div class="col-md-12">
<div class="col-md-12">
<h4 class="text-center">
<?php
if($reportshow){
?>
    <label><b><input type="checkbox" name="reportshow1" value="1" checked=""> Reports Section</b></label>
<?php
}else{
?>
    <label><b><input type="checkbox" name="reportshow1" value="1"> Reports Section</b></label>
<?php
}
?>
</h4>
</div>
<hr>
<div class="col-md-12">
<div class="col-md-6">
<?php
if($misshow){
?>
    <label><b>
        <input type="checkbox" name="misreportshow1" value="1" checked=""> MIS Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="misreportshow1" value="1"> MIS Reports 
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($podshow){
?>
    <label><b>
        <input type="checkbox" name="podreportshow1" value="1" checked=""> POD Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="podreportshow1" value="1"> POD Reports 
    </b></label>
<?php
}
?>
</div>
</div>
<div class="col-md-12">
<div class="col-md-6">

<?php
if($codshow){
?>
    <label><b>
        <input type="checkbox" name="codreportshow1" value="1" checked=""> COD Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="codreportshow1" value="1"> COD Reports 
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($codremities){
?>
    <label><b>
        <input type="checkbox" name="codremitiesreportshow1" value="1" checked=""> COD Remities Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="codremitiesreportshow1" value="1"> COD Remities Reports 
    </b></label>
<?php
}
?>
</div>
</div>
</div>
</div>
<!-- //Reports -->
<!-- Billing -->
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-12">
<h4 class="text-center">

<?php
if($billing){
?>
<label><b><input type="checkbox" name="billing1" value="1" checked=""> Billing Section</b></label>
<?php
}else{
?>
<label><b><input type="checkbox" name="billing1" value="1"> Billing Section</b></label>
<?php
}
?>
</h4><hr>
            <div class="col-md-6">

<?php
if($invoiceshow){
?>
    <label><b>
        <input type="checkbox" name="invoiceshow1" value="1" checked=""> Invoice 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="invoiceshow1" value="1"> Invoice 
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($remitiesshow){
?>
    <label><b>
        <input type="checkbox" name="remitiesshow1" value="1" checked=""> Remities 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="remitiesshow1" value="1"> Remities 
    </b></label>
<?php
}
?>
</div>
</div>
</div>
<!-- //Billing -->
<!-- Wallet -->
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-12"><br>

<div class="col-md-6">
<?php
if($walletshow){
?>
<label><b><input type="checkbox" name="walletshow1" value="1" checked=""> Wallet</b></label>
<?php
}else{
?>
<label><b><input type="checkbox" name="walletshow1" value="1"> Wallet</b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($row['ordersshow']){
?>
<label><b>
    <input type="checkbox" name="ordersshow1" value="1" checked=""> Orders
</b></label>
<?php
}else{
?>
<label><b>
    <input type="checkbox" name="ordersshow1" value="1"> Orders
</b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($row['bulkorderupload']){
?>
<label><b>
    <input type="checkbox" name="bulkorderupload1" value="1" checked=""> Bulk Order Upload
</b></label>
<?php
}else{
?>
<label><b>
    <input type="checkbox" name="bulkorderupload1" value="1"> Bulk Order Upload
</b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($row['ordertracking']){
?>
<label><b>
    <input type="checkbox" name="ordertracking1" value="1" checked=""> Order Tracking
</b></label>
<?php
}else{
?>
<label><b>
    <input type="checkbox" name="ordertracking1" value="1"> Order Tracking
</b></label>
<?php
}
?>
</div>

</div>
</div>
<!-- //Wallet -->


        <div class="col-md-12 text-center"><br>
            <input type="hidden" name="clientid1" value="<?= $useridis ?>">
            <input type="submit" name="updateaccessgranted" value="Update Access Granted" class="btn btn-success" style="background-color:green;border-color:green">
            <hr>
        </div>
</form>
<!--  -->
        &ensp;<br>
    </div>
    </div>

</div>
</div>
</section>



    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php
// include "Layout_Header.php";
include "Layout_Footer.php";
?>



<?php

if(isset($updateaccessgranted))
{

// echo $pickupaddress1;
// echo $serviceablepincodeshow1;
// echo $ndrmanagementshow1;
// echo $printshippinglabelshow1;
// echo $reportshow1;
// echo $misreportshow1;
// echo $podreportshow1;
// echo $codreportshow1;
// echo $codremitiesreportshow1;
// echo $billing1;
// echo $invoiceshow1;
// echo $remitiesshow1;
// echo $walletshow1;
// echo $addbalance1;
// echo $transactionhistory1;

// echo $DTDCapino;
// echo $shadowfaxno;
// echo $ekartapino;
// echo $delhiveryapino;
// echo $xpressbeeapino;


echo "<br>";
print_r($courierpriority1);
echo "<br>";

$querypermission="UPDATE `asitfa_user_access` SET 
`pickup_show`='$pickupaddress1',`serviceablepincode_show`='$serviceablepincodeshow1',
`ndr_show`='$ndrmanagementshow1',`printshipping_show`='$printshippinglabelshow1',
`reports_show`='$reportshow1',`mis_show`='$misreportshow1',`pod_show`='$podreportshow1',
`cod_show`='$codreportshow1',`codremities_show`='$codremitiesreportshow1',`billing_show`='$billing1',
`invoice_show`='$invoiceshow1',`remities_show`='$remitiesshow1',`wallet_show`='$walletshow1',
`addbalance_show`='$addbalance1',`transactionhistroy_show`='$transactionhistory1',

`api_xpressbee`='$xpressbeeapino',`api_delhivery`='$delhiveryapino',`api_delhivery2`='$delhiveryapinotwo',`api_ekart`='$ekartapino',
`api_shadowfax`='$shadowfaxno',`api_dtdc`='$DTDCapino',

`ordersshow`='$ordersshow1',`bulkorderupload`='$bulkorderupload1',`ordertracking`='$ordertracking1'
WHERE `loginuser_id`='$clientid1'";

    if(mysqli_query($conn,$querypermission))
    {
        echo "<script>window.location.assign('Client_Permissions.php?m=$clientid1&msg=y')</script>";
    }else
    {
        echo "<script>window.location.assign('Client_Permissions.php?m=$clientid1&msg=y')</script>";
    }

}

?>
