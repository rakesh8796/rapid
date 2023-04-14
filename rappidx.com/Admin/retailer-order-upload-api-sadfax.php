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
























    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
  // if($shadowfaxapion==$key){
    // $awbnogenerate = "SF";
    // echo "AwbNO-".$awbnogenerate." : ";
    // echo "<br>  - - - ShadowfaxM  - - - <br>";


$dummyshadowfax = '{
"order_details": {
"client_order_id": "'.$value[4].'",
"actual_weight": '.$value[7].',
"volumetric_weight": '.$value[7].',
"product_value": '.$value[11].',
"payment_mode": "'.$value[25].'",
"cod_amount": "0",
"promised_delivery_date": "'.$crtdatetime.'",
"total_amount": '.$value[16].'
},
"customer_details": {
"name": "'.$value[0].'",
"contact": "'.$value[2].'",
"address_line_1": "'.$value[1].'",
"address_line_2": "'.$value[1].'",
"city": "'.$value[13].'",
"state": "'.$value[12].'",
"pincode": '.$value[3].',
"alternate_contact": "'.$value[2].'",
"latitude": "0",
"longitude": "0"
},
"pickup_details": {
"name": "'.$value[18].'",
"contact": "'.$value[19].'",
"address_line_1": "'.$value[22].'",
"address_line_2": "'.$value[22].'",
"city": "'.$value[24].'",
"state": "'.$value[23].'",
"pincode": '.$value[20].',
"latitude": "0",
"longitude": "0"
},
"rts_details": {
"name": "'.$value[18].'",
"contact": "'.$value[19].'",
"address_line_1": "'.$value[22].'",
"address_line_2": "'.$value[22].'",
"city": "'.$value[24].'",
"state": "'.$value[23].'",
"pincode": '.$value[20].'
},
"product_details": [
{
    "hsn_code": "'.$value[4].'",
    "invoice_no": "'.$value[4].'",
    "sku_name": "'.$value[4].'",
    "client_sku_id": "'.$value[17].'",
    "category": "all",
    "price": '.$value[16].',
    "seller_details": {
        "seller_name": "'.$value[18].'",
        "seller_address": "'.$value[22].'",
        "seller_state": "'.$value[23].'",
        "gstin_number": ""
    },
    "taxes": {
        "cgst": 3,
        "sgst": 4,
        "igst": 5,
        "total_tax": 5.6
    },
    "additional_details": {
        "requires_extra_care": "False",
        "type_extra_care": "'.$value[14].'"
    }
}
]
}';

// echo "<pre>";
// print_r($dummyshadowfax);
// echo "</pre>";
// echo "<br>";


    $crtdatetime=date('Y-m-d h:i:s');
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v3/clients/orders/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "order_details": {
            "client_order_id": "'.$value[4].'",
            "actual_weight": '.$value[7].',
            "volumetric_weight": '.$value[7].',
            "product_value": '.$value[11].',
            "payment_mode": "'.$value[25].'",
            "cod_amount": "0",
            "promised_delivery_date": "'.$crtdatetime.'",
            "total_amount": '.$value[16].'
        },
        "customer_details": {
            "name": "'.$value[0].'",
            "contact": "'.$value[2].'",
            "address_line_1": "'.$value[1].'",
            "address_line_2": "'.$value[1].'",
            "city": "'.$value[13].'",
            "state": "'.$value[12].'",
            "pincode": '.$value[3].',
            "alternate_contact": "'.$value[2].'",
            "latitude": "0",
            "longitude": "0"
        },
        "pickup_details": {
            "name": "'.$value[18].'",
            "contact": "'.$value[19].'",
            "address_line_1": "'.$value[22].'",
            "address_line_2": "'.$value[22].'",
            "city": "'.$value[24].'",
            "state": "'.$value[23].'",
            "pincode": '.$value[20].',
            "latitude": "0",
            "longitude": "0"
        },
        "rts_details": {
            "name": "'.$value[18].'",
            "contact": "'.$value[19].'",
            "address_line_1": "'.$value[22].'",
            "address_line_2": "'.$value[22].'",
            "city": "'.$value[24].'",
            "state": "'.$value[23].'",
            "pincode": '.$value[20].'
        },
        "product_details": [
            {
                "hsn_code": "'.$value[4].'",
                "invoice_no": "'.$value[4].'",
                "sku_name": "'.$value[4].'",
                "client_sku_id": "'.$value[17].'",
                "category": "all",
                "price": '.$value[16].',
                "seller_details": {
                    "seller_name": "'.$value[18].'",
                    "seller_address": "'.$value[22].'",
                    "seller_state": "'.$value[23].'",
                    "gstin_number": ""
                },
                "taxes": {
                    "cgst": 3,
                    "sgst": 4,
                    "igst": 5,
                    "total_tax": 5.6
                },
                "additional_details": {
                    "requires_extra_care": "False",
                    "type_extra_care": "'.$value[14].'"
                }
            }
        ]
    }
    ',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9'
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);
    // echo $response;
// echo "<pre>";
// print_r($response);
// echo "</pre>";
// echo $response['message'];
// echo "<br>";

    $shadowfaxawbno = $response['data']['awb_number'];
    $awbnogenerate = $shadowfaxawbno;
    // echo "<br>";
    // print_r($response);
    // echo "<br>qwerty";

    if($shadowfaxawbno){
      $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$shadowfaxawbnoudate);
if($billingyype == "Prepaid"){
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
}
    }else{
      $errormsg = $response['message'];
      $errormsg = mysqli_real_escape_string($conn, $errormsg);
      $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$shadowfaxawbnoudate);
    }


    echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
    // exit();
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //



