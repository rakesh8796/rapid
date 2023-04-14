<?php
// include "Layout_Header_Table.php";
include("config/dbcon.php");
extract($_REQUEST);
// error_reporting(1);
// include 'Header.php';
$orderdata = date('Y-m-d H:i:s');
$wcrtdatetime = date("Y-m-d H:i:s");


echo "Loading...";



  // echo $orderkey."<br>";
  $orderdetails = "SELECT * FROM `spark_single_order` WHERE `Single_Order_Id`='$orderkey'";
  $orderdetailsr = mysqli_query($conn,$orderdetails);
  $orderdetailsres = mysqli_fetch_assoc($orderdetailsr);
  $value[0] = $orderdetailsres['Name'];
  // 0 Customer Name
  $value[1] = $orderdetailsres['Address'];
  // 1 Address
  $value[2] = $orderdetailsres['Mobile'];
  // 2  Mobile
  $value[3] = $orderdetailsres['Pincode'];
  // 3  Pincode
  $value[4] = $orderdetailsres['orderno'];
  // 4 Order ID
  $value[5] = $orderdetailsres['Item_Name'];
  // 5 Item
  $value[6] = $orderdetailsres['Quantity'];
  // 6 Quantity
  $value[7] = $orderdetailsres['Width'];
  // 7 Width
  $value[8] = $orderdetailsres['Height'];
  // 8 Height
  $value[9] = $orderdetailsres['Length'];
  // 9 Length
  $value[10] = $orderdetailsres['Invoice_Value'];
  // 10 Invoice Value
  $value[11] = $orderdetailsres['Cod_Amount'];
  // 11 COD Amount if not Enter 0
  $value[12] = $orderdetailsres['State'];
  // 12 State
  $value[13] = $orderdetailsres['City'];
  // 13 City
  $value[14] = $orderdetailsres['additionaltype'];
  // 14 Additional Details(dangures Goods, Extra Care)
  $value[15] = $orderdetailsres['Actual_Weight'];
  // 15 Weight
  $value[16] = $orderdetailsres['Total_Amount'];
  // 16 Total Amount
  $value[17] = $orderdetailsres['pickup_id'];
  // 17 pickup_id
  $value[18] = $orderdetailsres['pickup_name'];
  // 18 pickup_name
  $value[19] = $orderdetailsres['pickup_mobile'];
  // 19 pickup_mobile
  $value[20] = $orderdetailsres['pickup_pincode'];
  // 20 pickup_pincode
  $value[21] = $orderdetailsres['pickup_gstin'];
  // 21 pickup_gstin
  $value[22] = $orderdetailsres['pickup_address'];
  // 22 pickup_address
  $value[23] = $orderdetailsres['pickup_state'];
  // 23 pickup_state
  $value[24] = $orderdetailsres['pickup_city'];
  // 24 pickup_city
  $value[25] = $orderdetailsres['Order_Type'];
  // 24 Order_Type




$last_id = $orderdetailsres['Single_Order_Id'];


// echo "<br>";
$selectedweightidis = $orderdetailsres['User_Id'];
// echo "<br>";

$accountcate = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$selectedweightidis'";
$accountcater = mysqli_query($conn,$accountcate);
$accountcateres = mysqli_fetch_assoc($accountcater);
$weightcategory = $accountcateres['commercialstype'];
// echo "<br>";
$billingyype = $accountcateres['Billing_Type'];
// echo "<br>";

if($billingyype == "Prepaid"){
    // echo $walletdetails = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$selectedweightidis' AND `status`='TXN_SUCCESS' AND `statuscode`='1' ORDER BY `wallet_id` DESC LIMIT 1";
    $walletdetails = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$selectedweightidis' AND `status`='TXN_SUCCESS'  ORDER BY `wallet_id` DESC LIMIT 1";
    $walletdetail = mysqli_query($conn,$walletdetails);
    $walletdetai = mysqli_fetch_assoc($walletdetail);
    if(empty($walletdetai['crt_amt'])){        $crtbal = 0;
    }else{        $crtbal = $walletdetai['crt_amt'];    }
    // echo "<br>Bal. ";
    // echo $crtbal;
    if($value[16] > $crtbal){
        // echo "<br>BalErr. ";
        $balerror = "UPDATE `spark_single_order` SET `showerrors`='Insufficient Balance' WHERE `Single_Order_Id`='$last_id'";
        if(mysqli_query($conn,$balerror)){
          echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
        }

    }else{
// Wallet Code Write Here
      // echo "<br><br>";
        $newwalbal = $crtbal - $value[16];
        $waleti = "INSERT INTO `spark_wallet_details`(`txntype`,`user_id`,`currency`, `amount`, `txn_date_time`, `txnid`,`banktxnid`) VALUES ('Sub','$selectedweightidis','INR','$value[16]','$wcrtdatetime','$value[4]','$value[4]')";
            mysqli_query($conn,$waleti);
        $walletid = $conn->insert_id;
        $walletoid = "RPWLN".$walletid;
        $waletus = "UPDATE `spark_wallet_details` SET `order_id`='$walletoid',`status`='TXN_FAILURE',`statuscode`='2' WHERE `wallet_id`='$walletid'";
        mysqli_query($conn,$waletus);
    // If AWB No not generate
        $waletuis = "UPDATE `spark_wallet_details` SET `status`='TXN_FAILURE',`statuscode`='2' WHERE `wallet_id`='$walletid'";
        mysqli_query($conn,$waletuis);
    // If AWB No not generate
// Wallet Code Write Here
    }
}














// Delhivery 2nd API 
    // $awbnogenerate = "DL";
    // echo "AwbNO-".$awbnogenerate." : ";
    // echo "<br>  - - - Delhivery - - - <br>";
    $valueone = substr($value[1],0,45);
    $valueone = mysqli_real_escape_string($conn, $valueone);
    $value[5] = mysqli_real_escape_string($conn, $value[5]);
    $valuefive = substr($value[5],0,45);
// Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // Create AWB Number
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXBULKY SURFACE&token=6f82518fd0e9772ede80d1ec821013d41f11de05",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);
    $awbnois = $response;
    echo "<br><br>";
    // Create AWB Number


    $delhiverydummy = 'format=json&data={
    "pickup_location": {
        "pin": "'.$value[20].'",
        "add": "'.$value[22].'",
        "phone": "'.$value[19].'",
        "state": "'.$value[23].'",
        "city": "'.$value[24].'",
        "country": "India",
        "name": "RAPPIDXBULKY SURFACE"
    },
    "shipments": [
        {
          "return_name": "RAPPIDXBULKY SURFACE",
          "return_pin": "'.$value[20].'",
          "return_city": "'.$value[24].'",
          "return_phone": "'.$value[19].'",
          "return_add": "'.$value[22].'",
          "return_state": "'.$value[23].'",
          "return_country": "India",
          "order": "'.$value[4].'",
          "phone": "'.$value[2].'",
          "products_desc": "'.$valuefive.'",
          "cod_amount": "'.$value[11].'",
          "name": "'.$value[0].'",
          "country": "India",
          "waybill": "'.$awbnois.'",
          "seller_inv_date": "'.$orderdata.'",
          "order_date": "'.$orderdata.'",
          "total_amount": "'.$value[16].'",
          "seller_add": "'.$value[22].'",
          "seller_cst": "'.$value[21].'",
          "add": "'.$valueone.'",
          "seller_name": "'.$value[18].'",
          "seller_inv": "",
          "seller_tin": "",
          "pin": "'.$value[3].'",
          "quantity": "'.$value[6].'",
          "payment_mode": "'.$value[25].'",
          "state": "'.$value[12].'",
          "city": "'.$value[13].'",
          "client": "RAPPIDXBULKY SURFACE"
        }
    ]
    }';

// echo "<pre>";
// print_r($delhiverydummy);
// echo "</pre>";
// echo "<br><br>";
// // exit();

    // Order Date
      $orderdata = date('Y-m-d H:i:s');
    // Order Date

    // Create a Order
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'format=json&data={
      "pickup_location": {
          "pin": "'.$value[20].'",
          "add": "'.$value[22].'",
          "phone": "'.$value[19].'",
          "state": "'.$value[23].'",
          "city": "'.$value[24].'",
          "country": "India",
          "name": "RAPPIDXBULKY SURFACE"
      },
      "shipments": [
          {
            "return_name": "RAPPIDXBULKY SURFACE",
            "return_pin": "'.$value[20].'",
            "return_city": "'.$value[24].'",
            "return_phone": "'.$value[19].'",
            "return_add": "'.$value[22].'",
            "return_state": "'.$value[23].'",
            "return_country": "India",
            "order": "'.$value[4].'",
            "phone": "'.$value[2].'",
            "products_desc": "'.$valuefive.'",
            "cod_amount": "'.$value[11].'",
            "name": "'.$value[0].'",
            "country": "India",
            "waybill": "'.$awbnois.'",
            "seller_inv_date": "'.$orderdata.'",
            "order_date": "'.$orderdata.'",
            "total_amount": "'.$value[16].'",
            "seller_add": "'.$value[22].'",
            "seller_cst": "'.$value[21].'",
            "add": "'.$valueone.'",
            "seller_name": "'.$value[18].'",
            "seller_inv": "",
            "seller_tin": "",
            "pin": "'.$value[3].'",
            "quantity": "'.$value[6].'",
            "payment_mode": "'.$value[25].'",
            "state": "'.$value[12].'",
            "city": "'.$value[13].'",
            "client": "RAPPIDXBULKY SURFACE"
          }
      ]
    }',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Token 6f82518fd0e9772ede80d1ec821013d41f11de05',
        'Accept: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $response1 = json_decode($response, true);
    curl_close($curl);
        // echo $response1;
        // echo "<br>";

// echo "<pre>";
// print_r($response1);
// echo "</pre>";
// echo $response1['packages'][0]['remarks'][0];
// echo "<br>";

    if($response1['packages'][0]['status']=="Success"){
      $awbnogenerate = $response1['packages'][0]['waybill'];
    }

      if($awbnogenerate){
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery2' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
if($billingyype == "Prepaid"){
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
}
      }else{
        $errormsg = $response1['packages'][0]['remarks'][0];
        $errormsg = mysqli_real_escape_string($conn, $errormsg);
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhl2errors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
      }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

      echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";

// Delhivery 2nd API End
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//
