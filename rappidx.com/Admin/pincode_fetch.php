<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');

// echo $param;
?>
<hr style="border-bottom:2px solid gold">
<?php
if(empty($param))
{
  echo "<center><h3>Waiting For PinCode Input</h3></center><hr style='border-bottom:2px solid gold'>";
  exit();
}
$singleproquery = "SELECT * FROM `serviceable_pincodes` WHERE `pincode` LIKE '$param%'";
$singleproqueryr=mysqli_query($conn,$singleproquery);
if(empty(mysqli_num_rows($singleproqueryr))){
  echo "<center><h3>$param Is Not In Service</h3></center><hr style='border-bottom:2px solid gold'>";
}
$modelid = 1;
while($row = mysqli_fetch_assoc($singleproqueryr))
{
?>
<div class="col-md-12" style="font-size:18px;border-bottom:2px solid gold">
  <div class="col-md-6">
    <strong>PinCode : </strong> <?= $row['pincode'] ?>
  </div>
  <div class="col-md-6">
    <strong>Area Code : </strong> <?= $row['areacode'] ?>
  </div>
  <div class="col-md-6">
    <strong>Progress Code : </strong> <?= $row['processcode'] ?>
  </div>
  <div class="col-md-6">
    <strong>Hub Zone Name : </strong> <?= $row['hubzonename'] ?>
  </div>
  <div class="col-md-6">
    <strong>Hub City : </strong> <?= $row['hubcity'] ?>
  </div>
  <div class="col-md-6">
    <strong>Hub State : </strong> <?= $row['hubstate'] ?>
  </div>
  <div class="col-md-6">
    <strong>COD : </strong> <?= $row['cod'] ?>
  </div>
  <div class="col-md-6">
    <strong>Prepaid : </strong> <?= $row['prepaid'] ?>
  </div>
  <div class="col-md-6">
    <strong>Has Reverse Pickup Service : </strong> <?= $row['hasreversepickupservice'] ?>
  </div>
  <div class="col-md-6"></div>






















<div class="col-md-12">
<center>
  <button type="button" class="btn" style="background-color:#009688;border-color:#009688;color:white;border-radius:10px" data-toggle="modal" data-target="#myModal<?= $row['pincode'] ?>">
    &ensp;&ensp; Click Here To Disable Pincode For Clients &ensp;&ensp;
  </button>
</center>

<div class="modal fade" id="myModal<?= $row['pincode'] ?>" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Select Client To Disable <span style="color:blue"><?= $row['pincode'] ?></span> Pincode</h4>
      </div>
      <div class="modal-body">
<!--  -->
<div class="container-fluid">
<!--  --><!--  -->
<?php 
$allclients = "SELECT * FROM `asitfa_user` WHERE `usertype`='client' AND `Active`='1' ORDER BY `Company_Name` ASC";
$allclientsr=mysqli_query($conn,$allclients);
while($clientres = mysqli_fetch_assoc($allclientsr)){
?>
<div class="col-md-6" style="border:1px solid #60baaf;">
<div class="row">
    <div class="col-md-10" style="float:left;padding:0px;font-size:13px">
        <?= $clientres['Company_Name'] ?>(<?= substr($clientres['commercialstype'],2)."".strtoupper(substr($clientres['commercialstype'],0,2)) ?>)
        <input type="hidden" name="selectedclientid" id="selectedclientid" value="<?= $clientres['User_Id'] ?>">
    </div>
    <div class="col-md-2" style="float:right;padding:0px">
<?php
    $pincode = $row['pincode'];
    $clientidisa = $clientres['User_Id'];
$crtusers = explode(",",$row['disableclientids']);
    if(in_array($clientidisa,$crtusers)){
?>

    <label class="switch" style="padding:0px">
      <input type="checkbox" onclick="disablepin('<?= $pincode ?>','<?= $clientidisa ?>','on')" checked>
      <span class="slider round"></span>
    </label>
<?php
    }else
    {
?>
    <label class="switch" style="padding:0px">
      <input type="checkbox" onclick="disablepin('<?= $pincode ?>','<?= $clientidisa ?>','off')">
      <span class="slider round"></span>
    </label>

<?php
    }
?>
    </div>
<script type="text/javascript">
function disablepin(pincode,idisa,smode){
// alert(pincode);
// alert(idisa);
$.ajax({
    type: "GET",
    url: "ServiceableNotPincodeActiveCode/ClientNotUsethisservice.php",
    data:{idisa:idisa,pincode:pincode,smode:smode},
    success: function (data){
        // alert(data);
    },
    error: function (data) {
        alert('data');
    }
});
}
</script>
</div>
</div>
<?php
}
?>
<!--  --><!--  -->
</div>
<!--  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
  
  
</div>










<!-- Servicable Pincodes -->
<div class="col-md-12">

<!-- XB -->
<div class="col-md-3">XpressBees 
    <?php
        $xpressbeeid = $row['pinsid'];
        $xpressbee = $row['xpressbee'];
        if($row['xpressbee'])
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatusxb('<?= $xpressbee ?>','<?= $xpressbeeid ?>')" checked>
          <span class="slider round"></span>
        </label>
    <?php
        }else
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatusxb('<?= $xpressbee ?>','<?= $xpressbeeid ?>')">
          <span class="slider round"></span>
        </label>

    <?php
        }
    ?>
<script type="text/javascript">
function docstatusxb(valis,idisa){
// alert(valis);
// alert(idisa);
var serviename = "XB";
$.ajax({
    type: "GET",
    url: "ServiceableNotPincodeActiveCode/StatusChange.php",
    data:{idisa:idisa,valis:valis,serviename:serviename},
    success: function (data){
        // location.reload();
        // alert(data);
        // $("#Select_Desingnation").html(data);
    },
    error: function (data) {
        // location.reload();
        // alert(data);
        // console.log('Error:', data);
    }
});
}
</script>
</div>
<!-- // XB -->

<!-- Delhivery -->
<div class="col-md-3">Delhivery 
    <?php
        $delhiveryid = $row['pinsid'];
        $delhivery = $row['delhivery'];
        if($row['delhivery'])
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatusdl('<?= $delhivery ?>','<?= $delhiveryid ?>')" checked>
          <span class="slider round"></span>
        </label>
    <?php
        }else
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatusdl('<?= $delhivery ?>','<?= $delhiveryid ?>')">
          <span class="slider round"></span>
        </label>

    <?php
        }
    ?>
<script type="text/javascript">
function docstatusdl(valis,idisa){
// alert(valis);
// alert(idisa);
var serviename = "DL";
$.ajax({
    type: "GET",
    url: "ServiceableNotPincodeActiveCode/StatusChange.php",
    data:{idisa:idisa,valis:valis,serviename:serviename},
    success: function (data){
        // location.reload();
        // alert(data);
        // $("#Select_Desingnation").html(data);
    },
    error: function (data) {
        // location.reload();
        // alert(data);
        // console.log('Error:', data);
    }
});
}
</script>
</div>
<!-- //Delhivery -->
<!-- ShadowFax -->
<div class="col-md-3">ShadowFax 
    <?php
        $shadowfaxid = $row['pinsid'];
        $shadowfax = $row['shadowfax'];
        if($row['shadowfax'])
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatussf('<?= $shadowfax ?>','<?= $shadowfaxid ?>')" checked>
          <span class="slider round"></span>
        </label>
    <?php
        }else
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatussf('<?= $shadowfax ?>','<?= $shadowfaxid ?>')">
          <span class="slider round"></span>
        </label>

    <?php
        }
    ?>
<script type="text/javascript">
function docstatussf(valis,idisa){
// alert(valis);
// alert(idisa);
var serviename = "SF";
$.ajax({
    type: "GET",
    url: "ServiceableNotPincodeActiveCode/StatusChange.php",
    data:{idisa:idisa,valis:valis,serviename:serviename},
    success: function (data){
        // location.reload();
        // alert(data);
        // $("#Select_Desingnation").html(data);
    },
    error: function (data) {
        // location.reload();
        // alert(data);
        // console.log('Error:', data);
    }
});
}
</script>
</div>
<!-- //ShadowFax -->
<!-- DTDC -->
<div class="col-md-3">DTDC 
    <?php
        $dtdcid = $row['pinsid'];
        $dtdc = $row['dtdc'];
        if($row['dtdc'])
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatusdt('<?= $dtdc ?>','<?= $dtdcid ?>')" checked>
          <span class="slider round"></span>
        </label>
    <?php
        }else
        {
    ?>
        <label class="switch">
          <input type="checkbox" onclick="docstatusdt('<?= $dtdc ?>','<?= $dtdcid ?>')">
          <span class="slider round"></span>
        </label>

    <?php
        }
    ?>
<script type="text/javascript">
function docstatusdt(valis,idisa){
// alert(valis);
// alert(idisa);
var serviename = "DC";
$.ajax({
    type: "GET",
    url: "ServiceableNotPincodeActiveCode/StatusChange.php",
    data:{idisa:idisa,valis:valis,serviename:serviename},
    success: function (data){
        // location.reload();
        // alert(data);
        // $("#Select_Desingnation").html(data);
    },
    error: function (data) {
        // location.reload();
        // alert(data);
        // console.log('Error:', data);
    }
});
}
</script>
</div>
<!-- //DTDC -->

</div>
<!-- Servicable Pincodes -->

























</div>
<?php
$modelid++;
}
?>



