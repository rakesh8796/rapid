<?php 

    include_once("layout_new_user_config.php");
    include_once("layouts/header.php");

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Order </h4>
                        </div>

                        <form action="" method="POST">
                            <div class="card-body">

                                <div class="row my-5">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Shipping Information</h4>
                                            </div>
            

<div class="card my-2">
    <div class="card-header">
        <h4>Pickup Information</h4>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="form-group" id="AddPassport" style="display: display">

                <select class="form-control" onchange="showallordershere(this.value)" required="">
                    <option value=""><b>Select Pickup Address</b></option>
                <?php
                    $pickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `User_Id`='33' ORDER BY `Address_Id` DESC";
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
<div id="middleDetails">
    <!--uncheck the defult for more address-->
</div>
        </div>

    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <div id="All_Records"></div>
    
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

</div>

    <div class="card">
        <div class="card-header">
            <h4>Customer Infomation</h4>
        </div>

        <div class="card-body">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mobile</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+91</div>
                        </div>
                        <input type="number" id="password" name="mobile" class="form-control" placeholder="Enter Customer Mobile No." required="">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Pincode</label>
                    <input type="text" id="confirmpassword" name="pin" class="form-control" placeholder="Enter Customer Pincode" required="">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" id="email" name="city" class="form-control" placeholder="Enter Customer City" required="">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <input type="text" id="email" name="state" class="form-control" placeholder="Enter Customer State" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="val-username" name="name" class="form-control" placeholder="Enter Customer name" required="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" id="email" name="address" class="form-control" placeholder="Enter Customer Address" required="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Customer email id" required="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Landmark</label>
                <input type="text" id="email"  class="form-control" placeholder="Enter Customer Landmark" >
            </div>
        </div>

    </div>
</div>
</div>
      

      
      
<div class="col-md-6">
<div class="card">
    <div class="card-header">
        <h4>Product Information</h4>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Product Name</label>
                <input type="text" id="confirmpassword" name="itemname" class="form-control" placeholder="Order/Item Name *" required="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Quantity</label>
                <input type="number" id="confirmpassword" name="quantity" class="form-control" placeholder="No Of Quantity *" min="1" required="">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Invoice</label>
                <input type="text" id="confirmpassword" name="invoicevalue" class="form-control" placeholder="Invoice Value" required="">
            </div>
           <div class=" col-md-6">
                <label class="form-label">Payment Mode*</label>
                <div class="form-group">
                    <select id="select21" name="ordertype" class="form-control select2" style="width:100%" required="">
                        <option value="COD">Select Order Type </option>
                        <option value="COD" selected>COD</option>
                        <option value="Prepaid">Prepaid</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="form-row">
             <div class="form-group col-md-6">
                <label for="inputEmail4">COD Amount(in Rupees)</label>
                <input type="text" id="confirmpassword" name="codamount" class="form-control" placeholder="Cod Amount *" required="">
            </div>
            
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header">
        <h4>Packet Information</h4>
    </div>
   <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Physical Weight(KG)</label>
                                                        <input type="text" name="actualweight" class="form-control" placeholder="Enter Actual Weight" id="actualweight" onkeyup="freightWeight()" required="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="hidden" id="select21" name="itemextracare" value="No">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputCity">Box Width(KG)</label>
                                                        <input type="text" id="vbreadth"  name="widht" class="form-control" placeholder="Enter Width *" onkeyup="VolumetricWeightCal(this.value,'breadth')" required="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputState">Box Height(KG)</label>
                                                        <input type="text" id="vheight" name="height" class="form-control"  placeholder="Enter Height *" onkeyup="VolumetricWeightCal(this.value,'height')" required="">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputState">Box Length(cm)</label>
                                                        <input type="text" id="vlength" name="lenght" class="form-control" placeholder="Enter Lenght *" onkeyup="VolumetricWeightCal(this.value,'length')" required="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputName">Chargeable Weight</label>
                                                        <input type="text" name="ChargeableWeight" id="FreightWeightshow" class="form-control" placeholder="Chargeable Weight" title="Chargeable Weight" readonly />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputName">Volumetric Weight(Kg)</label>
                                                        <input type="text" name="VolumetricWeightshow" id="VolumetricWeightshow" class="form-control" placeholder="Vol Weight" title="Volumetric Weight" readonly />
                                                        <input type="hidden" name="VolumetricWeight" id="VolumetricWeight">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                             <!-- Volumetric Weight Calculator -->
                                        <script type="text/javascript">
                                            function VolumetricWeightCal(datachange, cateis) {
                                                var vlength = $("#vlength").val();
                                                var vlengthlen = vlength.length;
                                                if (vlengthlen == 0) {
                                                    vlength = 1;
                                                }

                                                var vbreadth = $("#vbreadth").val();
                                                var vbreadthlen = vbreadth.length;
                                                if (vbreadthlen == 0) {
                                                    vbreadth = 1;
                                                }

                                                var vheight = $("#vheight").val();
                                                var vheightlen = vheight.length;
                                                if (vheightlen == 0) {
                                                    vheight = 1;
                                                }

                                                var valumetricweight = vlength * vbreadth * vheight / 5000;
                                                valumetricweightshow = valumetricweight + " KG";
                                                $("#VolumetricWeight").val(valumetricweight);
                                                $("#VolumetricWeightshow").val(valumetricweightshow);

                                                freightWeight();
                                                // calculateraterefresh();
                                            }

                                            // Freight Weight Calculation
                                            function freightWeight() {

                                                var actualweight = $("#actualweight").val();
                                                var VolumetricWeight = $("#VolumetricWeight").val();
                                                // alert(actualweight);
                                                var Weightpick = actualweight;

                                                if (VolumetricWeight > actualweight) {
                                                    var Weightpick = VolumetricWeight;
                                                }

                                                Weightpickshow = Weightpick + " KG";
                                                $("#FreightWeightare").val(Weightpick);
                                                $("#FreightWeightshow").val(Weightpickshow);

                                                calculateraterefresh();
                                            }
                                        </script>
                                        <!-- Volumetric Weight Calculator -->
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit" name="submit1">Place Order</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </section>
</div>

<script>
    /*
    function yesnoCheck(that){
        if (that.value == "COD"){
            document.getElementById("ifYes").style.display = "block";
        }else{
            document.getElementById("ifYes").style.display = "none";
        }
    }
    */
</script>
<?php
$pickupidis = $pickupaddressid;

$newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";

$alldata = mysqli_query($conn, $newpickupaddress);

if ($exists = mysqli_num_rows($alldata)) {

    // echo "<br> : - ";

    // echo $exists;

    // echo "<br>";

    $alldatares = mysqli_fetch_assoc($alldata);

    $pickupname = $alldatares['Name'];

    $pickupmobile = $alldatares['Mobile'];

    $pickuppincode = $alldatares['Pincode'];

    $pickupgstin = $alldatares['Gstin'];

    $pickupadress = $alldatares['Address'];

    $pickupstate = $alldatares['State'];

    $pickupcity = $alldatares['City'];
}

?>
<?php

if (isset($submit1)) {
    
    $user_id = $_SESSION['useridis'];

    $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`,`email`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Invoice_Value`, `Cod_Amount`, `additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`,`ChargeableWeight`,`VolumetricWeigh`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`)
                                             VALUES ('$ordertype','$user_id','$name','$email','$address','$state','$city','$mobile','$pin',  '$itemname',   '$quantity','$widht','$height','$lenght','$actualweight','$invoicevalue','$codamount','$itemextracare'         ,now(),      'Single','$pickupaddressid','$pickupaddressid','$VolumetricWeight','$ChargeableWeight','$pickupname','$pickupmobile',  '$pickuppincode','$pickupadress','$pickupstate','$pickupcity','Pending','Pending','Upload')";
    //   print_r($singlequery);                                      

    if(mysqli_query($conn, $singlequery)){
        // Last Insert ID
        $last_id = mysqli_insert_id($conn);

        $orderidcreate = "RPDX00" . $last_id;
        $orderno = $orderidcreate;
        $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";

        mysqli_query($conn, $updateorderid);
        // Last Insert ID

        echo "<script> window.location.assign('singleorder.php?singleoredr=update')</script>";
    }else{
        // echo "run else";
        echo "<script> window.location.assign('singleorder.php?singleoredr=noupdate')</script>";
    }


}

?>
<?php include_once("layouts/footer.php");   ?>