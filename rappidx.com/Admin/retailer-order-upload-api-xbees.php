<?php
// include "Layout_Header_Table.php";
include("config/dbcon.php");
extract($_REQUEST);
// error_reporting(1);
// include 'Header.php';
$orderdata = date('Y-m-d H:i:s');
$wcrtdatetime = date("Y-m-d H:i:s");



echo "Loading...";
// Selected Data In Prcessing Orders

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
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
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

      echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";

// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//


