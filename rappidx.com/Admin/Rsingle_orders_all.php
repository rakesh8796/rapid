<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->

<div class="col-md-12" style="background:#edf1f5">
<div class="row bg-title" style="padding:0px 0px 0px 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5 class="" style="font-weight:600">SINGLE ORDERS</h5>
    </div>
</div>
















<aside class="right-side">


<!-- Single Order Details -->
<section class="content">
<div class="col-md-12">
<div class="col-md-12">

<div class="panel filterable" style="border-radius:10px 10px 0px 0px">
<div class="panel-heading" style="background-color:#33333373;padding:1px 0px 0px 20px;border-radius:10px 10px 0px 0px">
<h5 style="color:#333333;font-weight:100"><b>Single Order</b>
<span class="pull-right">
<?php
if($_GET['excelfile'] == 'Update'){
  echo "<div class='success' style='color:green;margin-right:450px'>Update Successfully</div>";
}elseif($_GET['excelfile'] == 'No Update'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Not Updated</div>";
}elseif($_GET['excelfile'] == 'No Pickup'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Pickup Address Invalid</div>";
}elseif($_GET['excelfile'] == 'invalid Details'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid CSV File Details</div>";
}elseif($_GET['excelfile'] == 'Invalid Data'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid Hub/Pickup Address</div>";
}elseif($_GET['excelfile'] == 'Invalid Data1'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid Hub/Pickup Address</div>";
}elseif($_GET['excelfile'] == 'Cancel Order'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Order Canceled</div>";
}elseif($_GET['excelfile'] == 'Not Canceled'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Order Not Canceled</div>";
}
?>
</span>
</h5>
</div>
    <div class="panel-body" id="test1">

    <!-- Excel File -->
    <div class="col-md-12">
      <div class="col-md-4"></div>
      <div class="col-md-4">
          <a href="singleorderuploadnot_excel.php" class="btn btn-block" style="border-radius:20px;color:white;background-color:#7c7c82;border-color:#7c7c82">Download Failed Orders</a>
      </div>
      <div class="col-md-4">
          <a href="singleorderupload_excel.php" class="btn btn-block" style="border-radius:20px;color:white;background-color:#7c7c82;border-color:#7c7c82">Download Successfull Orders</a>
        </div>
        <br>&ensp;
    </div>
    <!-- Excel File -->

<form method="get" action="#">

<div class="table-responsive">
<table id="myTable" class="table table-striped">
<thead>
    <tr>
        <!-- <th data-field="Order No" data-sortable="true">Order No</th> -->
        <th data-field="state" data-checkbox="true"></th>
        <th data-field="AWB Number" data-sortable="true">AWB_Number</th>
        <th data-field="Customer Name" data-sortable="true">Customer_Name</th>
        <th data-field="Customer Mobile" data-sortable="true">Customer_Mobile</th>
        <th data-field="Customer Address" data-sortable="true">Customer_Address</th>
        <th data-field="Customer State" data-sortable="true">Customer_State</th>
        <th data-field="Customer City" data-sortable="true">Customer_City</th>
        <th data-field="Customer Pincode" data-sortable="true">Customer_Pincode</th>

        <th data-field="Product Name" data-sortable="true">Product_Name</th>
        <th data-field="Quantity" data-sortable="true">Quantity</th>
        <th data-field="L/W/H" data-sortable="true">L/W/H</th>
        <th data-field="Weight" data-sortable="true">Weight</th>
        <th data-field="Total Amt" data-sortable="true">Total_Amt</th>
        <th data-field="COD Amt" data-sortable="true">COD_Amt</th>
        <th data-field="Additional Type" data-sortable="true">Additional_Type</th>
        <th data-field="Upload Time" data-sortable="true">Upload_Time</th>

        <th data-field="Pickup Id" data-sortable="true">Pickup_Id</th>
        <th data-field="Pickup Name" data-sortable="true">Pickup_Name</th>
        <th data-field="Pickup Mobile" data-sortable="true">Pickup_Mobile</th>
        <th data-field="Pickup Address" data-sortable="true">Pickup_Address</th>
        <th data-field="Pickup State" data-sortable="true">Pickup_State</th>
        <th data-field="Pickup City" data-sortable="true">Pickup_City</th>
        <th data-field="Pickup Pincode" data-sortable="true">Pickup_Pincode</th>
        <th data-field="Order Status" data-sortable="true">Order_Status</th>
    </tr>
    </thead>
    <tbody>
    <!--  -->
    <?php
    $tdate = date("Y-m-d");
    $totalnoosorders = 0;
    //
    $useridisa = array();
    $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
    $fdataall=mysqli_query($conn,$queryall);
    $numrowall=mysqli_num_rows($fdataall);
    if($numrowall>1){
        while($resultall = mysqli_fetch_assoc($fdataall)){
            $useridisa[] = $resultall['User_Id'];
        }
        $user_ids = implode(",",$useridisa);
    }else{
      $user_ids = $user_id;
    }


// $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `Awb_Number`!='' AND `awb_gen_by`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
$singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Single' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";


    //
    // $singleproquery = "SELECT * FROM `spark_single_order` ORDER BY `Single_Order_Id` DESC";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      if($row['order_cancel']){
    ?>
      <tr class="record danger">
    <?php
      }else{
    ?>
      <tr class="record ">
    <?php
      }
    ?>
        <!-- <td>
            <input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">
            <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">
        </td> -->
        <td>
            <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">
            <input type="hidden" name="shippingallorders[]" value="<?= $row['orderno'] ?>">
            <label>
                <input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">
                <?php echo $row['orderno']; ?>
            </label>
        </td>
        <td><?php echo $row['Awb_Number']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Mobile']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td><?php echo $row['State']; ?></td>
        <td><?php echo $row['City']; ?></td>
        <td><?php echo $row['Pincode']; ?></td>

        <td><?php echo $row['Item_Name']; ?></td>
        <td><?php echo $row['Quantity']; ?></td>
        <td><?php echo $row['Length']; ?> x <?php echo $row['Width']; ?> x <?php echo $row['Height']; ?></td>
        <td><?php echo $row['Actual_Weight']; ?></td>
        <td><?php echo $row['Total_Amount']; ?></td>
        <td><?php echo $row['Cod_Amount']; ?></td>
        <td><?php echo $row['additionaltype']; ?></td>
        <td><?php echo $row['Rec_Time_Date']; ?></td>

        <td><?php echo $row['pickup_id']; ?></td>
        <td><?php echo $row['pickup_name']; ?></td>
        <td><?php echo $row['pickup_mobile']; ?></td>
        <td><?php echo $row['pickup_address']; ?></td>
        <td><?php echo $row['pickup_state']; ?></td>
        <td><?php echo $row['pickup_city']; ?></td>
        <td><?php echo $row['pickup_pincode']; ?></td>
        <td><?php echo $row['order_status1']; ?></td>
    </tr>
    <?php
    $totalnoosorders++;
    }
    ?>
    <!--  -->
    </tbody>
    </table>
</div>
<br><br>
    <?php
    if($totalnoosorders>0){
    ?>
    <div class="row">
        <div class="col-md-2">
    <input type="submit" name="selectedlabels" class="btn btn-success" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="Selected Labels Print">
        </div>
        <div class="col-md-2">
    <input type="submit" name="alllabels" class="btn btn-success" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="All Labels Print">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3 text-right">
    <input type="submit" name="cancelorders" class="btn btn-danger" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="Cancel Selected Orders" onclick="return confirm('Are you sure Delete this orders?')">
        </div>
        <div class="col-md-2">
    <input type="submit" name="allcancelorders" class="btn btn-danger" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="Cancel All Orders" onclick="return confirm('Are you sure Delete this orders?')">
        </div>
        <div class="col-md-1"></div>
    </div>
    <?php
    }
    ?>

    </form>
</div>
</div>
</div>
</div>
</section>
<!-- Single Order Details -->





<!-- Order Shipping Labels -->
<?php
if(isset($selectedlabels)){
    // print_r($selectedcancelorders);
    $selectedcancelorders = serialize( $selectedcancelorders );
    echo "<script> window.location.assign('Shipping_Labels_Check.php?ordernos=$selectedcancelorders')</script>";
}
if(isset($alllabels)){
    // print_r($shippingallorders);
    $shippingallorders = serialize( $shippingallorders );
    echo "<script> window.location.assign('Shipping_Labels_Check.php?ordernos=$shippingallorders')</script>";
}
?>
<!-- Order Shipping Labels -->



    <!-- Multiple Orders Cancel -->
    <?php
    if(isset($cancelorders)){
        // print_r($selectedcancelorders);
        foreach($selectedcancelorders as $cancelrpdxnois){

    // $cancelrpdxnois."--> ";

    $queryall = "SELECT * FROM `spark_single_order` WHERE `orderno`='$cancelrpdxnois'";
    $fdataall=mysqli_query($conn,$queryall);
    // $numrowall=mysqli_num_rows($fdataall);
    $resultall = mysqli_fetch_assoc($fdataall);
    $ordernoisa = $resultall['orderno'];
    $awbnoisa = $resultall['Awb_Number'];
    $couriername = $resultall['awb_gen_by'];

    // <!--    Cancel Orders   -->
    // XpressBees
    if($couriername=="XpressBees"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://xbclientapi.xbees.in/POSTShipmentService.svc/RTONotifyShipment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "XBkey": "dSsID3156mssewRrPSkspKSq",
          "AWBNumber": "'.$awbnoisa.'",
          "RTOReason": "Fraud Cancellation"
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Cookie: ASP.NET_SessionId=n101nuhvwipvzvuplef0egqa'
        ),
        ));

        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        // echo "<br>";
      if($response1['RTONotifyShipment'][0]['ReturnMessage'] == "successful"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        mysqli_query($conn,$updateorderid);
      }

    // XpressBees
    }elseif($couriername=="DTDC"){
    // DTDC
        // echo "DTDC";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.shipsy.in/api/client/integration/consignment/cancellation',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "AWBNo": ["'.$awbnoisa.'"],
    "customerCode":"GL2467"
    }',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic ZTA4MjE1MGE3YTQxNWVlZjdkMzE0NjhkMWRkNDY1Og=='
    ),
    ));
    $response = curl_exec($curl);
    $response1 = json_decode($response, true);
    curl_close($curl);
    // echo $response1;
    // print_r($response1);
    // exit();
    // echo "<br>";
    if($response1['status'] == "OK" AND $response1['success'] == "true"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        mysqli_query($conn,$updateorderid);
    }



    // DTDC
    }elseif($couriername=="Shadowfax"){
    // Shadowfax
        echo "Shadowfax";
        echo "<br>";
        echo $ordernoisa;
        echo "<br>";
        echo $awbnoisa;

    // Shadowfax
    }elseif($couriername=="Delhivery"){
    // Delhivery
        // echo "Delhivery";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;
                
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "waybill": "'.$awbnoisa.'",
            "cancellation": "true"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        
        // echo "<pre>";
        // print_r($response1);
        // echo "</pre>";
        if($response1['remark'] == "Shipment has been cancelled."){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn3,$updateorderid);
        }

      }
    // Delhivery
    // <!--    Cancel Orders   -->
    echo "<script> window.location.assign('Rsingle_orders_all.php?excelfile=Cancel Order')</script>";
    // exit();

        }
    }


    // All Upload File Cancel/Delete
    if(isset($allcancelorders)){
        // print_r($cancelallorders);
        foreach($cancelallorders as $cancelrpdxno){
    // echo $cancelrpdxno."--> ";

    $queryall = "SELECT * FROM `spark_single_order` WHERE `orderno`='$cancelrpdxno'";
    $fdataall=mysqli_query($conn,$queryall);
    // $numrowall=mysqli_num_rows($fdataall);
    $resultall = mysqli_fetch_assoc($fdataall);
    $ordernoisa = $resultall['orderno'];
    $awbnoisa = $resultall['Awb_Number'];
    $couriername = $resultall['awb_gen_by'];

    // <!--    Cancel Orders   -->
    // XpressBees
    if($couriername=="XpressBees"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://xbclientapi.xbees.in/POSTShipmentService.svc/RTONotifyShipment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "XBkey": "dSsID3156mssewRrPSkspKSq",
          "AWBNumber": "'.$awbnoisa.'",
          "RTOReason": "Fraud Cancellation"
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Cookie: ASP.NET_SessionId=n101nuhvwipvzvuplef0egqa'
        ),
        ));

        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo "<pre>";
        // print_r($response1);
        // echo "</pre>";
        // echo $response;
        echo "<br>";
          if($response1['RTONotifyShipment'][0]['ReturnMessage'] == "successful"){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
          }

    // XpressBees
    }elseif($couriername=="DTDC"){
    // DTDC
        // echo "DTDC";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.shipsy.in/api/client/integration/consignment/cancellation',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "AWBNo": ["'.$awbnoisa.'"],
    "customerCode":"GL2467"
    }',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic ZTA4MjE1MGE3YTQxNWVlZjdkMzE0NjhkMWRkNDY1Og=='
    ),
    ));
    $response = curl_exec($curl);
    $response1 = json_decode($response, true);
    curl_close($curl);
    // echo $response1;
    // print_r($response1);
    // exit();
    // echo "<br>";
    if($response1['status'] == "OK" AND $response1['success'] == "true"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        mysqli_query($conn,$updateorderid);
    }



    // DTDC
    }elseif($couriername=="Shadowfax"){
    // Shadowfax
        echo "Shadowfax";
        echo "<br>";
        echo $ordernoisa;
        echo "<br>";
        echo $awbnoisa;

    // Shadowfax
    }elseif($couriername=="Delhivery"){
    // Delhivery
        // echo "Delhivery";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "waybill": "'.$awbnoisa.'",
            "cancellation": "true"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        // echo $response1;
        // echo "<pre>";
        // print_r($response1);
        // echo "<br>";
          if($response1['remark'] == "Shipment has been cancelled."){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
          }

      }
    // Delhivery
    // <!--    Cancel Orders   -->
    echo "<script> window.location.assign('Rsingle_orders_all.php?excelfile=Cancel Order')</script>";
    // exit();


        }
    }
    ?>
<!-- Multiple Orders Cancel -->
































































    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
