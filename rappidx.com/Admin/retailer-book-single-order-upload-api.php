<?php
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
  
  $agent_fee = $orderdetailsres['agent_fee'];
  $agenttotalamt = $orderdetailsres['agent_total_freight_amt'];

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
    if($agenttotalamt > $crtbal){
        // echo "<br>BalErr. ";
        $balerror = "UPDATE `spark_single_order` SET `showerrors`='Insufficient Balance' WHERE `Single_Order_Id`='$last_id'";
        if(mysqli_query($conn,$balerror)){
          echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
        }

    }else{
// Wallet Code Write Here
      // echo "<br><br>";
        $newwalbal = $crtbal - $agenttotalamt;
        $waleti = "INSERT INTO `spark_wallet_details`(`txntype`,`user_id`,`currency`, `amount`, `txn_date_time`, `txnid`,`banktxnid`,`agent_fee`) VALUES ('Sub','$selectedweightidis','INR','$agenttotalamt','$wcrtdatetime','$value[4]','$value[4]','$agent_fee')";
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























// // Ekart API Start    *   *   *   *   *   *   *   *   *   *   *
if($ordertype=="Ekart"){
// // Ekart API Start    *   *   *   *   *   *   *   *   *   *   *
error_reporting(1);

    // echo "<br>  - - - Ekart  - - - <br>";


$crtdatetime=date('Y-m-d h:i:s');


$ekarttokens = "SELECT * FROM `api_tokens` WHERE `couriername`='Ekart'";
$ekarttoken = mysqli_query($conn,$ekarttokens);
$ekarttoke = mysqli_fetch_assoc($ekarttoken);
// echo "<br>";
$beartokn = $ekarttoke['tokenno'];
// echo "<br>";


$ekarttkncod = $ekarttoke['last_cod_awb'];
$ekarttknppd = $ekarttoke['last_ppd_awb'];

// $ekrtawbno = "RPXC0001415181";

if($value[25]=="Prepaid"){
    $newekarttkncod = $ekarttknppd+1;
    
    if(strlen($newekarttkncod)>9){
        $awbmiddleno = "";
    }elseif(strlen($newekarttkncod)>8){
        $awbmiddleno = "0";
    }elseif(strlen($newekarttkncod)>7){
        $awbmiddleno = "00";
    }elseif(strlen($newekarttkncod)>6){
        $awbmiddleno = "000";
    }elseif(strlen($newekarttkncod)>5){
        $awbmiddleno = "0000";
    }else{
        $awbmiddleno = "00000";
    }
    $ekrt10uid = $awbmiddleno.$newekarttkncod;

    $ekrtawbno = "RPXP".$ekrt10uid;
    $ekrtawbuptate = "UPDATE `api_tokens` SET `last_ppd_awb`='$ekrt10uid',`tkn_update`=now() WHERE `couriername`='Ekart'";
    mysqli_query($conn,$ekrtawbuptate);
}else{
    $newekarttkncod = $ekarttkncod+1;
    
if(strlen($newekarttkncod)>9){
    $awbmiddleno = "";
}elseif(strlen($newekarttkncod)>8){
    $awbmiddleno = "0";
}elseif(strlen($newekarttkncod)>7){
    $awbmiddleno = "00";
}elseif(strlen($newekarttkncod)>6){
    $awbmiddleno = "000";
}elseif(strlen($newekarttkncod)>5){
    $awbmiddleno = "0000";
}else{
    $awbmiddleno = "00000";
}
$ekrt10uid = $awbmiddleno.$newekarttkncod;

    $ekrtawbno = "RPXC".$ekrt10uid;
    $ekrtawbuptate = "UPDATE `api_tokens` SET `last_cod_awb`='$ekrt10uid',`tkn_update`=now() WHERE `couriername`='Ekart'";
    mysqli_query($conn,$ekrtawbuptate);
}

// $awbnocod = "RPXC0001415182";

// echo "<br> New AWB : ";
// echo $ekrtawbno;
// echo "<br>";


$ekartapidata = '{
    "client_name": "RPX",
    "goods_category": "NON_ESSENTIAL",
    "services": [
        {
            "service_code": "REGULAR",
            "service_details": [
                {
                    "service_leg": "FORWARD",
                    "service_data": {
                        "service_types": [
                            {
                                "name": "regional_handover",
                                "value": "true"
                            },
                            {
                                "name": "delayed_dispatch",
                                "value": "false"
                            }
                        ],
                        "vendor_name": "Ekart",
                        "amount_to_collect": '.$value[11].',
                        "dispatch_date": "'.$crtdatetime.'",
                        "customer_promise_date": "",
                        "delivery_type": "SMALL",
                        "source": {
                            "address": {
                                "first_name": "'.$value[18].'",
                                "address_line1": "'.$value[22].'",
                                "address_line2": "",
                                "pincode": "'.$value[20].'",
                                "city": "'.$value[24].'",
                                "state": "'.$value[23].'",
                                "primary_contact_number": "'.$value[19].'",
                                "email_id": ""
                            }
                        },
                        "destination": {
                            "address": {
                                "first_name": "'.$value[0].'",
                                "address_line1": "'.$value[1].'",
                                "address_line2": "",
                                "pincode": "'.$value[3].'",
                                "city": "'.$value[13].'",
                                "state": "'.$value[12].'",
                                "primary_contact_number": "'.$value[2].'",
                                "email_id": ""
                            }
                        },
                        "return_location": {
                            "address": {
                                "first_name": "'.$value[18].'",
                                "address_line1": "'.$value[22].'",
                                "address_line2": "",
                                "pincode": "'.$value[20].'",
                                "city": "'.$value[24].'",
                                "state": "'.$value[23].'",
                                "primary_contact_number": "'.$value[19].'",
                                "email_id": ""
                            }
                        }
                    },
                    "shipment": {
                        "client_reference_id": "'.$ekrtawbno.'",
                        "tracking_id": "'.$ekrtawbno.'",
                        "shipment_value": 200,
                        "shipment_dimensions": {
                            "length": {
                                "value": '.$value[9].'
                            },
                            "breadth": {
                                "value": '.$value[7].'
                            },
                            "height": {
                                "value": '.$value[8].'
                            },
                            "weight": {
                                "value": '.$value[15].'
                            }
                        },
                        "return_label_desc_1": "",
                        "return_label_desc_2": "",
                        "shipment_items": [
                            {
                                "product_id": "'.$value[4].'",
                                "category": "Apparel",
                                "product_title": "'.$value[5].'",
                                "quantity": '.$value[6].',
                                "cost": {
                                    "total_sale_value": 0,
                                    "total_tax_value": 0,
                                    "tax_breakup": {
                                        "cgst": 0.0,
                                        "sgst": 0.0,
                                        "igst": 0.0
                                    }
                                },
                                "seller_details": {
                                    "seller_reg_name": "",
                                    "gstin_id": ""
                                },
                                "hsn": "",
                                "ern": "",
                                "discount": 0.0,
                                "item_attributes": [
                                    {
                                        "name": "order_id",
                                        "value": "'.$value[4].'"
                                    },
                                    {
                                        "name": "invoice_id",
                                        "value": "'.$value[4].'"
                                    },
                                    {
                                        "name": "item_dimensions",
                                        "value": "'.$value[9].':'.$value[7].':'.$value[8].':'.$value[15].'"
                                    },
                                    {
                                        "name": "brand_name",
                                        "value": ""
                                    }
                                ],
                                "handling_attributes": [
                                    {
                                        "name": "isFragile",
                                        "value": "false"
                                    },
                                    {
                                        "name": "isDangerous",
                                        "value": "false"
                                    }
                                ]
                            }
                        ]
                    }
                }
            ]
        }
    ]
}';


// echo "<br>";
// print_r($ekartapidata);
// echo "<br>";




$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.ekartlogistics.com/v2/shipments/create',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$ekartapidata,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "HTTP_X_MERCHANT_CODE: RPX",
    "Authorization: $beartokn"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);

curl_close($curl);
// echo $response;

// echo "<pre>";
// print_r($response);

// echo "<br>";
// echo "<br>";


if($response['unauthorised']){
    echo "<br>if conditiaon<br>";
    // echo $response['unauthorised'];
    $errormsg = $response['unauthorised'];
    $errormsg = mysqli_real_escape_string($conn, $errormsg);
    $ekartawbnoudate = "UPDATE `spark_single_order` SET `ekterrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$ekartawbnoudate);

    echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
}else{
    
    $ekrtstatusmsg = "";
    $ekrtrpssts = "";
    $ekrtmsgcode = ""; 
    $ekrtmsgstus = "";
    
    print_r($response);
    echo "<br> :- ";
    $ekartawbno = $response['response'][0]['tracking_id'];
    echo "<br> :- ";
    echo $ekrtrpssts = $response['response'][0]['status'];
        // REQUEST_REJECTED
    if($response['response'][0]['status_code']){
        echo "<br> :- ";
        echo $ekrtmsgcode = $response['response'][0]['status_code'];
    }else{
        echo "<br> :- ";
        echo $ekrtmsgstus = $response['response'][0]['message'][0];
    }
    
    $ekrtstatusmsg = $ekrtrpssts."-".$ekrtmsgcode." - ".$ekrtmsgstus;
    
    echo "<br> :- ";
    echo $response['response'][0]['is_parked'];
        // NOT_PARKED
    echo "<br> :- ";    
    echo $response['request_id'];
    
    echo "<br><br>";    
    
    
    
    
    
    if($ekrtrpssts=="REQUEST_REJECTED"){
        echo "<br> A : ";
        $errormsg = mysqli_real_escape_string($conn, $ekrtstatusmsg);
        echo $ekartawbnoudate = "UPDATE `spark_single_order` SET `ekterrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$ekartawbnoudate);
        
    }else{
        
        $awbnogenerate = $ekartawbno;
        $ekartawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$ekartawbno',`awb_gen_by`='Ekart' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$ekartawbnoudate);
        if($billingyype == "Prepaid"){
            $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$ekartawbno',`banktxnid`='$ekartawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
            mysqli_query($conn,$waletu);
        }
        
    }
    
// echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=$awbnogenerate')</script>";
    
    

}


/*
$ekartawbno = $value[4];

$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$ekartawbno',`banktxnid`='$ekartawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
*/



// exit();
// echo "<script> window.location.assign('retailer-book-single-order.php')</script>";
echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=$awbnogenerate')</script>";

// // Ekart API End    *   *   *   *   *   *   *   *   *   *   *
}
// // Ekart API End    *   *   *   *   *   *   *   *   *   *   *































// // Delhivery Surfax API Start    *   *   *   *   *   *   *   *   *   *   *
if($ordertype=="DlSufx"){
// // Delhivery Surfax API Start    *   *   *   *   *   *   *   *   *   *   *

// echo "DL Surfax";


    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery 1st API
  // if ($delhiveryapion==$key) {
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
      CURLOPT_URL => 'https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3',
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
    // echo "<br><br>";
    // Create AWB Number


/*
    $delhiverydummy = 'format=json&data={
    "pickup_location": {
        "pin": "'.$value[20].'",
        "add": "'.$value[22].'",
        "phone": "'.$value[19].'",
        "state": "'.$value[23].'",
        "city": "'.$value[24].'",
        "country": "India",
        "name": "RAPPIDX SURFACE"
    },
    "shipments": [
        {
          "return_name": "RAPPIDXSURFACE-B2C",
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
          "client": "RAPPIDX SURFACE"
        }
    ]
    }';

echo "<pre>";
print_r($delhiverydummy);
echo "</pre>";
// echo "<br><br>";
// // exit();
*/


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
          "name": "RAPPIDX SURFACE"
      },
      "shipments": [
          {
            "return_name": "RAPPIDXSURFACE-B2C",
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
            "client": "RAPPIDX SURFACE"
          }
      ]
    }',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
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
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
if($billingyype == "Prepaid"){
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
      mysqli_query($conn,$waletu);
}
      }else{
        $errormsg = $response1['packages'][0]['remarks'][0];
        $errormsg = mysqli_real_escape_string($conn, $errormsg);
        echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
      }


// echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=$awbnogenerate')</script>";

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

// Delhivery 1st API End



// // Delhivery Surfax API End    *   *   *   *   *   *   *   *   *   *   *
}
// // Delhivery Surfax API End    *   *   *   *   *   *   *   *   *   *   *
































// // Dtdc API Start    *   *   *   *   *   *   *   *   *   *   *
if($ordertype=="Dtdc"){
// // Dtdc API Start    *   *   *   *   *   *   *   *   *   *   *

// echo "Dtdc";


    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
  // if ($dtdcapion==$key){
    // $awbnogenerate = "DT";
    // echo "AwbNO-".$awbnogenerate." : ";
    // echo "-DTDC <br>";


    // Item Length DTDC is max 50
        $value5 = substr($value[5],0,49);
    // Item Length DTDC is max 50
    // Check COD Order Or Not
    if(!empty($value[11]))
    {
        $curlcodcheck = '{
        "consignments": [
            {
                "customer_code": "GL2467",
                "reference_number": "",
                "service_type_id": "B2C SMART EXPRESS",
                "load_type": "NON-DOCUMENT",
                "description": "sample",
                "cod_favor_of": "",
                "cod_collection_mode": "cash",
                "consignment_type": "Forward",
                "dimension_unit": "cm",
                "length": "1",
                "width": "1",
                "height": "1",
                "weight_unit": "kg",
                "weight": "'.$value[15].'",
                "declared_value": "'.$value[16].'",
                "cod_amount": "'.$value[11].'",
                "num_pieces": "'.$value[6].'",
                "commodity_id": "Others",
                "customer_reference_number": "'.$value[4].'",
                "is_risk_surcharge_applicable": false,
                "origin_details": {
                    "name": "'.$value[18].'",
                    "phone": "'.$value[19].'",
                    "alternate_phone": "",
                    "address_line_1": "'.$value[22].'",
                    "address_line_2": "",
                    "pincode": "'.$value[20].'",
                    "city": "'.$value[24].'",
                    "state": "'.$value[23].'"
                },
                "destination_details": {
                    "name": "'.$value[0].'",
                    "phone": "'.$value[2].'",
                    "alternate_phone": "",
                    "address_line_1": "'.$value[1].'",
                    "address_line_2": "",
                    "pincode": "'.$value[3].'",
                    "city": "'.$value[13].'",
                    "state": "'.$value[12].'"
                },
                "pieces_detail": [
                    {
                        "description": "'.$value5.'",
                        "declared_value": "'.$value[10].'",
                        "weight": "'.$value[15].'",
                        "height": "'.$value[8].'",
                        "length": "'.$value[9].'",
                        "width": "'.$value[7].'"
                    }
                ]
            }
        ]
    }';
    }elseif($value[11]==0)
    {
        $curlcodcheck = '{
        "consignments": [
            {
                "customer_code": "GL2467",
                "reference_number": "",
                "service_type_id": "B2C SMART EXPRESS",
                "load_type": "NON-DOCUMENT",
                "description": "sample",
                "cod_favor_of": "",
                "cod_collection_mode": "",
                "consignment_type": "Forward",
                "dimension_unit": "cm",
                "length": "1",
                "width": "1",
                "height": "1",
                "weight_unit": "kg",
                "weight": "'.$value[15].'",
                "declared_value": "'.$value[16].'",
                "cod_amount": "",
                "num_pieces": "'.$value[6].'",
                "commodity_id": "Others",
                "customer_reference_number": "'.$value[4].'",
                "is_risk_surcharge_applicable": false,
                "origin_details": {
                    "name": "'.$value[18].'",
                    "phone": "'.$value[19].'",
                    "alternate_phone": "",
                    "address_line_1": "'.$value[22].'",
                    "address_line_2": "",
                    "pincode": "'.$value[20].'",
                    "city": "'.$value[24].'",
                    "state": "'.$value[23].'"
                },
                "destination_details": {
                    "name": "'.$value[0].'",
                    "phone": "'.$value[2].'",
                    "alternate_phone": "",
                    "address_line_1": "'.$value[1].'",
                    "address_line_2": "",
                    "pincode": "'.$value[3].'",
                    "city": "'.$value[13].'",
                    "state": "'.$value[12].'"
                },
                "pieces_detail": [
                    {
                        "description": "'.$value5.'",
                        "declared_value": "'.$value[10].'",
                        "weight": "'.$value[15].'",
                        "height": "'.$value[8].'",
                        "length": "'.$value[9].'",
                        "width": "'.$value[7].'"
                    }
                ]
            }
        ]
    }';
    }else{
        $curlcodcheck = '{
        "consignments": [
            {
                "customer_code": "GL2467",
                "reference_number": "",
                "service_type_id": "B2C SMART EXPRESS",
                "load_type": "NON-DOCUMENT",
                "description": "sample",
                "cod_favor_of": "",
                "cod_collection_mode": "",
                "consignment_type": "Forward",
                "dimension_unit": "cm",
                "length": "1",
                "width": "1",
                "height": "1",
                "weight_unit": "kg",
                "weight": "'.$value[15].'",
                "declared_value": "'.$value[16].'",
                "cod_amount": "'.$value[11].'",
                "num_pieces": "'.$value[6].'",
                "commodity_id": "Others",
                "customer_reference_number": "'.$value[4].'",
                "is_risk_surcharge_applicable": false,
                "origin_details": {
                    "name": "'.$value[18].'",
                    "phone": "'.$value[19].'",
                    "alternate_phone": "",
                    "address_line_1": "'.$value[22].'",
                    "address_line_2": "",
                    "pincode": "'.$value[20].'",
                    "city": "'.$value[24].'",
                    "state": "'.$value[23].'"
                },
                "destination_details": {
                    "name": "'.$value[0].'",
                    "phone": "'.$value[2].'",
                    "alternate_phone": "",
                    "address_line_1": "'.$value[1].'",
                    "address_line_2": "",
                    "pincode": "'.$value[3].'",
                    "city": "'.$value[13].'",
                    "state": "'.$value[12].'"
                },
                "pieces_detail": [
                    {
                        "description": "'.$value5.'",
                        "declared_value": "'.$value[10].'",
                        "weight": "'.$value[15].'",
                        "height": "'.$value[8].'",
                        "length": "'.$value[9].'",
                        "width": "'.$value[7].'"
                    }
                ]
            }
        ]
    }';
    }
    // Check COD Order Or Not

// echo "<pre>";
// print_r($curlcodcheck);
// echo "</pre>";
// echo "<br>";

      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://app.shipsy.in/api/customer/integration/consignment/softdata',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $curlcodcheck,

      CURLOPT_HTTPHEADER => array(
        'api-key: dd9c24d16f71ac05fba93bd70502fe',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);

// echo "<pre>";
// print_r($response);
// echo "</pre>";
// echo $response['data'][0]['reason'];
// echo "<br>";
// echo $response['data'][0]['message'];
// echo "<br><br>";
    // $_SESSION["dtdc"] = $response;
    // $test = $_SESSION["dtdc"];
    // print_r($test);

    // echo "<pre>";
    $awbnogenerate = $response['data'][0]['reference_number'];
    // echo "<br>";
    $response['data'][0]['customer_reference_number'];
    // echo "<br>";
    $response['data'][0]['pieces'][0]['reference_number'];
    // echo "<br>";
    // print_r($response);
    // exit();

    if($awbnogenerate){
      $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$dtdcawbnoudate);
if($billingyype == "Prepaid"){
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
}
    }else{
      $errormsg1 = $response['data'][0]['reason'];
      $errormsg2 = $response['data'][0]['message'];
      $errormsg = $errormsg1." / ".$errormsg2;
      $errormsg = mysqli_real_escape_string($conn, $errormsg);
      $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$dtdcawbnoudate);
    }



// echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=$awbnogenerate')</script>";
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



// // Dtdc API End    *   *   *   *   *   *   *   *   *   *   *
}
// // Dtdc API End    *   *   *   *   *   *   *   *   *   *   *





























// // Shadofax API Start    *   *   *   *   *   *   *   *   *   *   *
if($ordertype=="Sadfx"){
// // Shadofax API Start    *   *   *   *   *   *   *   *   *   *   *

echo "Sdfx";


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
      CURLOPT_URL => 'https://dale.shadowfax.in/api/v3/clients/orders/',
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
        'Authorization: Token c626f543f961fd0b59ffff3a7f6f8b9b705a2c8b'
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
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
}
    }else{
      $errormsg = $response['message'];
      $errormsg = mysqli_real_escape_string($conn, $errormsg);
      $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$shadowfaxawbnoudate);
    }


    // echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=$awbnogenerate')</script>";
    // exit();
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //





// // Shadofax API End    *   *   *   *   *   *   *   *   *   *   *
}
// // Shadofax API End    *   *   *   *   *   *   *   *   *   *   *







































// // Delhivery Bulky API Start    *   *   *   *   *   *   *   *   *   *   *
if($ordertype=="DlBulky"){
// // Delhivery Bulky API Start    *   *   *   *   *   *   *   *   *   *   *

// echo "DL Bulky";

// Delhivery 2nd API 
  // if ($delhiveryapiontwo==$arrayName[$i]) {
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
    echo $awbnois = $response;
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
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
}
      }else{
        $errormsg = $response1['packages'][0]['remarks'][0];
        $errormsg = mysqli_real_escape_string($conn, $errormsg);
        echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhl2errors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
      }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

      // echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=$awbnogenerate')</script>";

// Delhivery 2nd API End
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




// // Delhivery Bulky API End    *   *   *   *   *   *   *   *   *   *   *
}
// // Delhivery Bulky API End    *   *   *   *   *   *   *   *   *   *   *










































// // Xpressbees API Start    *   *   *   *   *   *   *   *   *   *   *
if($ordertype=="Xbees"){
// // Xpressbees API Start    *   *   *   *   *   *   *   *   *   *   *

// echo "XB";


    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
  
    // echo "<br>  - - - XpressBees  - - -  <br>";

        // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
    // $xbawbnois = "131560000012351";
    $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
    $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
    $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
    $xbawbnois = $xpressbeesawbnofetchres['awbnois'];

    $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnois'";
    mysqli_query($conn,$apiused);

    $tdateis = date('Y-m-d');
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://userauthapis.xbees.in/api/auth/generateToken',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "username": "admin@rappidx.com",
            "password": "$rappidx$",
            "secretkey": "5d009de9ed78dfa2ef472c22cc163046a52f39dd076cac4cf2a57e37c71405b0"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer xyz'
          ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        $xpressbeetoken = $response['token'];
// echo "<br>";
// print_r($response);
// echo "<br>";
// // exit();
        // XpressBees Token Generate    -   -   -   -   -   -   -   -   -//


      $dummy = '{
        "AirWayBillNO": "'.$xbawbnois.'",
        "BusinessAccountName": "Rappidx",
        "OrderNo": "'.$value[4].'",
        "SubOrderNo": "'.$value[4].'",
        "OrderType": "'.$value[25].'",
        "CollectibleAmount": "'.$value[11].'",
        "DeclaredValue": "'.$value[16].'",
        "PickupType": "Vendor",
        "Quantity": "'.$value[6].'",
        "ServiceType": "SD",
        "DropDetails": {
            "Addresses": [
                {
                    "Address": "'.$value[1].'",
                    "City": "'.$value[13].'",
                    "EmailID": "",
                    "Name": "'.$value[0].' ",
                    "PinCode": "'.$value[3].'",
                    "State": "'.$value[12].'",
                    "Type": "Primary"
                }
            ],
            "ContactDetails": [
                {
                    "PhoneNo": "'.$value[2].'",
                    "Type": "Primary",
                    "VirtualNumber": null
                }
            ],
            "IsGenSecurityCode": null,
            "SecurityCode": null,
            "IsGeoFencingEnabled": null,
            "Latitude": null,
            "Longitude": null,
            "MaxThresholdRadius": null,
            "MidPoint": null,
            "MinThresholdRadius": null,
            "RediusLocation": null
        },
        "PickupDetails": {
            "Addresses": [
                {
                    "Address": "'.$value[22].'",
                    "City": "'.$value[24].'",
                    "EmailID": "",
                    "Name": "'.$value[18].'",
                    "PinCode": "'.$value[20].'",
                    "State": "'.$value[23].'",
                    "Type": "Primary"
                }
            ],
            "ContactDetails": [
                {
                    "PhoneNo": "'.$value[19].'",
                    "Type": "Primary"
                }
            ],
            "PickupVendorCode": "'.$value[17].'",
            "IsGenSecurityCode": null,
            "SecurityCode": null,
            "IsGeoFencingEnabled": null,
            "Latitude": null,
            "Longitude": null,
            "MaxThresholdRadius": null,
            "MidPoint": null,
            "MinThresholdRadius": null,
            "RediusLocation": null
        },
        "RTODetails": {
            "Addresses": [
                {
                    "Address": "'.$value[22].'",
                    "City": "'.$value[24].'",
                    "EmailID": "",
                    "Name": "'.$value[18].'",
                    "PinCode": "'.$value[20].'",
                    "State": "'.$value[23].'",
                    "Type": "Primary"
                }
            ],
            "ContactDetails": [
                {
                    "PhoneNo": "'.$value[19].'",
                    "Type": "Primary"
                }
            ]
        },
        "Instruction": "",
        "CustomerPromiseDate": null,
        "IsCommercialProperty": null,
        "IsDGShipmentType": null,
        "IsOpenDelivery": null,
        "IsSameDayDelivery": null,
        "ManifestID": "SGHJDX1554362X",
        "MultiShipmentGroupID": null,
        "SenderName": null,
        "IsEssential": "false",
        "IsSecondaryPacking": "false",
        "PackageDetails": {
            "Dimensions": {
                "Height": "'.$value[8].'",
                "Length": "'.$value[9].'",
                "Width": "'.$value[7].'"
            },
            "Weight": {
                "BillableWeight": "'.$value[15].'",
                "PhyWeight": "'.$value[15].'",
                "VolWeight": "'.$value[15].'"
            }
        },
        "GSTMultiSellerInfo": [
            {
                "BuyerGSTRegNumber": "29AAACU1901H1ZK",
                "EBNExpiryDate": null,
                "EWayBillSrNumber": "'.$xbawbnois.'",
                "InvoiceDate": "'.$tdateis.'",
                "InvoiceNumber": "'.$value[10].'",
                "InvoiceValue": null,
                "IsSellerRegUnderGST": "Yes",
                "ProductUniqueID": null,
                "SellerAddress": "'.$value[22].'",
                "SellerGSTRegNumber": "'.$value[21].'",
                "SellerName": "'.$value[18].'",
                "SellerPincode": "'.$value[20].'",
                "SupplySellerStatePlace": "'.$value[23].'",
                "HSNDetails": [
                    {
                        "ProductCategory": "Elecrotnics",
                        "ProductDesc": "'.$value[5].'",
                        "CGSTAmount": "",
                        "Discount": null,
                        "GSTTAXRateIGSTN": null,
                        "GSTTaxRateCGSTN": null,
                        "GSTTaxRateSGSTN": null,
                        "GSTTaxTotal": "",
                        "HSNCode": "",
                        "IGSTAmount": null,
                        "ProductQuantity": null,
                        "SGSTAmount": null,
                        "TaxableValue": "'.$value[16].'"
                    }
                ]
            }
        ]
    }';
// echo "<pre>";
// print_r($dummy);
// echo "</pre>";
// echo "<br><br>";
    //  -   -   -   -   -   -   -   -   -   -   -   -

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://api.shipmentmanifestation.xbees.in/shipmentmanifestation/forward',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>$dummy,
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "token: $xpressbeetoken",
        "versionnumber: v1"
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);

// echo "<pre>";
// print_r($response);
// echo "</pre>";
// echo $response['ReturnMessage'];
// echo "<br>";

      // if($response['ReturnMessage']=="Successfull"){
      if($response['ReturnCode']=="100"){
        $xbawbnoisreturn = $response['AWBNo'];
        $awbnogenerate = $xbawbnoisreturn;
        echo "<br>XB-UPDATE<br>";
        echo $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$xbawbnoisreturn',`awb_gen_by`='XpressBees' WHERE `Single_Order_Id`='$last_id'";
        echo "<br>XB-UPDATE<br>";
        mysqli_query($conn,$xpressbeeawbnoudate);

        $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnoisreturn'";
        mysqli_query($conn,$apiused);
if($billingyype == "Prepaid"){
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$agenttotalamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
}
// echo "<br><br>";
// print_r($response);
// exit();
      }else{
        $errormsg = $response['ReturnMessage'];
        $errormsg = mysqli_real_escape_string($conn, $errormsg);
        $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$xpressbeeawbnoudate);
      }

    // echo $response;

      echo "<script> window.location.assign('retailer-print-shipping-label.php?ordernos=retailer-print-shipping-label.php?ordernos')</script>";

  }
// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




// // Xpressbees API End    *   *   *   *   *   *   *   *   *   *   *

// // Xpressbees API End    *   *   *   *   *   *   *   *   *   *   *






echo "<script> window.location.assign('retailer-print-shipping-label.php')</script>";

