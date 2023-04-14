<?php
include("config/dbcon.php");
extract($_REQUEST);
// error_reporting(1);
// include 'Header.php';
$orderdata = date('Y-m-d H:i:s');
$wcrtdatetime = date("Y-m-d H:i:s");



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














    // // Ekart API     *   *   *   *   *   *   *   *   *   *   *
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
            $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$ekartawbno',`banktxnid`='$ekartawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
            mysqli_query($conn,$waletu);
        }
        
    }
    
    echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
    
    

}




// exit();
echo "<script> window.location.assign('retailer-book-single-order.php')</script>";



    // // Ekart API     *   *   *   *   *   *   *   *   *   *   *   *  //




