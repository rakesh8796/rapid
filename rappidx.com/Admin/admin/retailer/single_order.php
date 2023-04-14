<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->


     <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">

<?php
// $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
// $apipermissionr = mysqli_query($conn,$apipermission);
// $apipermissionres = mysqli_fetch_assoc($apipermissionr);
// echo $apipermissionres['api_xpressbee'];
// echo "<br>";
// echo $apipermissionres['api_delhivery'];
// echo "<br>";
// echo $apipermissionres['api_ekart'];
// echo "<br>";
// echo $apipermissionres['api_shadowfax'];
// echo "<br>";
// echo $apipermissionres['api_dtdc'];
// echo "<br>";
// $allapis1 = array();
// $allapis11 = array();
// if($apipermissionres['api_xpressbee']){
//     $allapis1['XpressBees'] = $apipermissionres['api_xpressbee'];
//     $allapis11[$apipermissionres['api_xpressbee']] = "XpressBees";
// }
// if($apipermissionres['api_delhivery']){
//    $allapis1['Delhivery'] = $apipermissionres['api_delhivery'];
//    $allapis11[$apipermissionres['api_delhivery']] = "Delhivery";
// }
// if($apipermissionres['api_ekart']){
//    $allapis1['Ekart'] = $apipermissionres['api_ekart'];
//    $allapis11[$apipermissionres['api_ekart']] = "Ekart";
// }
// if($apipermissionres['api_shadowfax']){
//    $allapis1['Shadowfax'] = $apipermissionres['api_shadowfax'];
//    $allapis11[$apipermissionres['api_shadowfax']] = "Shadowfax";
// }
// if($apipermissionres['api_dtdc']){
//    $allapis1['DTDC'] = $apipermissionres['api_dtdc'];
//    $allapis11[$apipermissionres['api_dtdc']] = "DTDC";
// }
// print_r($allapis1);
// echo "<br>";
// print_r($allapis11);
// asort($allapis1);
// ksort($allapis11);
// echo "<br><br>";
// print_r($allapis1);
// echo "<br>";
// print_r($allapis11);

// echo "<br><br>";
// foreach ($allapis11 as $key => $value) {
//     echo $key."&ensp; ".$value."<br>";
// }
// echo "<br><br>";
// foreach ($allapis1 as $key => $value) {
//     echo $key."&ensp; ".$value."<br>";
// }


$apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$apipermissionr = mysqli_query($conn,$apipermission);
$apipermissionres = mysqli_fetch_assoc($apipermissionr);
$apipermissionres['api_xpressbee'];
$apipermissionres['api_delhivery'];
$apipermissionres['api_ekart'];
$apipermissionres['api_shadowfax'];
$apipermissionres['api_dtdc'];
$allapis1 = array();
if($apipermissionres['api_xpressbee']){
    $allapis1['XpressBees'] = $apipermissionres['api_xpressbee'];
}
if($apipermissionres['api_delhivery']){
   $allapis1['Delhivery'] = $apipermissionres['api_delhivery'];
}
if($apipermissionres['api_ekart']){
   $allapis1['Ekart'] = $apipermissionres['api_ekart'];
}
if($apipermissionres['api_shadowfax']){
   $allapis1['Shadowfax'] = $apipermissionres['api_shadowfax'];
}
if($apipermissionres['api_dtdc']){
   $allapis1['DTDC'] = $apipermissionres['api_dtdc'];
}
ksort($allapis11);
foreach ($allapis1 as $key => $value) {
    echo $key."&ensp; ".$value."<br>";
}























// echo $allapis1
// echo "<br><br>";
// for ($i=0; $i<6;$i++) {
//     // echo $allapis1[$i]."<br>";
// }
// echo "<br><br>";
// foreach ($allapis1 as $key => $value) {
//   echo "Key-".$key." Value-".$value."<br>";
// }
// echo "<br>";
// sort($allapis1);
// print_r($allapis1);
// echo "<br>---------<br>";
// foreach ($allapis11 as $key => $value) {
//   echo "Key-".$key." Value-".$value."<br>";
// }
// echo "<br><br>";
//
// $allapis = array('XpressBees'=>$apipermissionres['api_xpressbee'],'Delhivery'=>$apipermissionres['api_delhivery'],'Ekart'=>$apipermissionres['api_ekart'],'Shadowfax'=>$apipermissionres['api_shadowfax'],'DTDC'=>$apipermissionres['api_dtdc']);
// print_r($allapis);
// echo "<br>";
// sort($allapis);
// print_r($allapis);
// echo "<pre>";
// print_r($apipermissionres);

?>
            <!-- <h1>Today Single Booking</h1> -->
            <!-- <ol class="breadcrumb">
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#"> Place Order</a>
                </li>
                <li class="active">
                    Single Order
                </li>
            </ol> -->
        </section>
        <!--section ends-->
  
  
  
  
  
  
  


             <section class="content">
            <!--main content-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background:#fff;border-color:#fff">
                            <h3 class="panel-title">
                                Single Order Booking
<center>
<?php
    if($_GET['singleoredr'] == 'update'){
      echo "<div class='success alert alert-success'>  <strong>Order place successfully</strong>    </div>";
    }elseif($_GET['singleoredr'] == 'noupdate'){
        echo "<div class='success alert alert-warning'>  <strong>Order not uploaded</strong>      </div>";
    }
    // echo "<div class='success alert alert-success'>  <strong>Order place successfully</strong>    </div>";
    // echo "<div class='success alert alert-warning'>  <strong>Order not uploaded</strong>      </div>";
?>
</center>
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <!-- <i class="fa fa-fw fa-times removepanel clickable"></i> -->
                            </span>
                        </div>
                        <div class="panel-body">


<!-- <form class="form-horizontal" role="form" id="popup-validation" method="post" action="#"> -->
<form class="form-horizontal" method="POST">
<div class="form-group">
    <div class="row">
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Customer Name<span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="val-username" name="name" class="form-control" placeholder="Enter Customer name" required="">
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Customer Mobile <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="password" name="mobile" class="form-control" placeholder="Enter Customer Mobile No." required="">
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
            <input type="text" id="email" name="address" class="form-control" placeholder="Enter Customer Address" required="">
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
            <input type="text" id="email" name="state" class="form-control" placeholder="Enter Customer State" required="">
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="email">
            Customer City
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" id="email" name="city" class="form-control" placeholder="Enter Customer City" required="">
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
            <input type="text" id="confirmpassword" name="pin" class="form-control" placeholder="Enter Customer Pincode" required="">
        </div>
    </div>
    <div class="col-md-6">
        <label class="col-md-4 control-label" for="val-username">
            Order Type
            <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <select id="select21" name="ordertype" class="form-control select2" style="width:100%" required="">
                    <option value="COD">Select Order Type </option>
                    <option value="COD" selected>COD</option>
                    <option value="Prepaid">Prepaid</option>
            </select>
        </div>
    </div>
    </div>
</div>


<hr>
<div class="heading text-center">
    <h3 class="panel-title">
        Order Details
    </h3>
</div>
<br>


<div class="form-group">
    <div class="col-md-12">
        <input type="text" id="confirmpassword" name="itemname" class="form-control" placeholder="Order/Item Name *" required="">
    </div>
</div>

<div class="form-group">
    <div class="col-md-4">
        <input type="number" id="confirmpassword" name="quantity" class="form-control" placeholder="No Of Quantity *" min="1" required="">
    </div>
    <div class="col-md-4">
        <input type="text" id="confirmpassword" name="codamount" class="form-control" placeholder="Cod Amount *" required="">
    </div>
    <div class="col-md-4">
        <input type="text" id="confirmpassword" name="invoicevalue" class="form-control" placeholder="Invoice Value" required="">
    </div>
</div>

<div class="form-group">
    <div class="col-md-4">
        <input type="text" id="width" name="widht" class="form-control" placeholder="Enter Width *" required="">
    </div>
    <div class="col-md-4">
        <input type="text" id="height" name="height" class="form-control" placeholder="Enter Height *" required="">
    </div>
    <div class="col-md-4">
        <input type="text" id="lenght" name="lenght" class="form-control" placeholder="Enter Lenght *" required="">
    </div>
</div>

 <div class="form-group">
    <div class="col-md-4">
        <input type="text" name="actualweight" class="form-control" placeholder="Enter Actual Weight" id="actualweight" required="">
    </div>
    <div class="col-md-4">
        <input type="text" name="totalamount" class="form-control" placeholder="Total Amount" id="totalamount" required="">
    </div>
    <div class="col-md-4">
        <select id="select21" name="itemextracare" class="form-control select2">
                <option value="No">Additional Details </option>
                <option value="Dengerous">Dengerous Good</option>
                <option value="Extra Care">Extra Care</option>
        </select>
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


<div class="col-md-12" style="background-color:orange">
    <div class="col-md-6">&ensp;
        <h4 class="text-center"><b>Order Pickup Address</b></h4>&ensp;
    </div>
    <div class="col-md-6">&ensp;
        <select class="form-control" onchange="showallordershere(this.value)" required="">
            <option value=""><b>Select Pickup Address</b></option>
            <!--<option value="newaddress"><b>Create New Pickup Address</b></option>-->
        <?php
            $pickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `User_Id`='$user_id' ORDER BY `Address_Id` DESC";
            $pickupaddressr = mysqli_query($conn,$pickupaddress);
            while($pickures = mysqli_fetch_assoc($pickupaddressr))
            {
        ?>
            <option value="<?= $pickures['Address_Id'] ?>"><?= $pickures['Name'] ?>(<?= $pickures['Address_Id'] ?>)</option>
        <?php
            }
        ?>
        </select>
        &ensp;
    </div>
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
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-succes" name="submit1" style="background-color: #ffd647;width:50%">Upload Order</button>
    </div>
    <div class="col-md-4"></div>
</div>
        
    <!--<div class="form-group form-actions"><br>&ensp;<br>-->
        <!--<div class="col-md-8 col-md-offset-4">-->
            <!--<button type="submit" class="btn btn-succes" name="submit1" style="background-color: #ffd647;">Submit</button>-->
            <!--<button type="reset" class="btn btn-effect-ripple btn-default reset_btn" style="background-color: #ffd647;">Reset-->
            <!--</button>-->
        <!--</div>-->
    <!--</div>-->
</form>

<?php


if(isset($submit1))
{
    // echo "work";
$user_id = $_SESSION['useridis'];
// echo "11<br>-:";
// echo $pickupaddressid;
// echo "<br>22<br>";
    if(empty($pickupaddressid))
    {
        $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`, `Active`) VALUES ('$user_id','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity',now(),1)";
        if(mysqli_query($conn,$newpickupaddress)){
            $pickupaddressid = mysqli_insert_id($conn);
        }else{
            echo "<script> window.location.assign('single_order.php?singleoredr=noupdate')</script>";
        }
    }

    // $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`orderno`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`, `Clinet_Order_Id`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`)
    // VALUES ('$ordertype','$user_id','$orderno','$name','$address','$state','$city','$mobile','$pin','$itemname','$quantity','$widht','$height','$lenght','$actualweight','$totalamount','$invoicevalue','$codamount','$itemextracare',now(),'Single','$pickupaddressid','$pickupaddressid','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity','Pending','Pending')";
    $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`, `Clinet_Order_Id`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`)
    VALUES ('$ordertype','$user_id','$name','$address','$state','$city','$mobile','$pin','$itemname','$quantity','$widht','$height','$lenght','$actualweight','$totalamount','$invoicevalue','$codamount','$itemextracare',now(),'Single','$pickupaddressid','$pickupaddressid','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity','Pending','Pending','Upload')";
    if(mysqli_query($conn,$singlequery)){

// Last Insert ID
    $last_id = mysqli_insert_id($conn);

    $orderidcreate = "RPDX00".$last_id;
    $orderno = $orderidcreate;
    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$updateorderid);
// Last Insert ID



        echo "<script> window.location.assign('single_order.php?singleoredr=update')</script>";
    }else{
        // echo "run else";
        echo "<script> window.location.assign('single_order.php?singleoredr=noupdate')</script>";
    }

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
