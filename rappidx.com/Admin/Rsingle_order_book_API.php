<?php
// include "Layout_Header_Table.php";
include("config/dbcon.php");
extract($_REQUEST);
// error_reporting(1);
// include 'Header.php';
$orderdata = date('Y-m-d H:i:s');
$wcrtdatetime = date("Y-m-d H:i:s");
?>
<!-- Page Content -->
<div class="col-md-12" style="background:#edf1f5">



<?php

$orderplaceawbs = array();
$orderplacesrno = array();

// echo $awborderquery = "SELECT * FROM `spark_single_order` WHERE `apihitornot`='0'  ORDER BY `Single_Order_Id` LIMIT 50";
$awborderquery = "SELECT * FROM `spark_single_order` WHERE `orderno`='$orderno' ORDER BY `Single_Order_Id` DESC LIMIT 1";


$awborderqueryr = mysqli_query($conn,$awborderquery);
$crtnois = 1;
while ($awbres = mysqli_fetch_assoc($awborderqueryr)){
     $orderplaceawbs[$crtnois] = $awbres['orderno'];
     $orderplacesrno[$crtnois] = $awbres['Single_Order_Id'];
     $awbnois = $awbres['orderno'];
     $srnois = $awbres['Single_Order_Id'];
     /*
     $processquery = "UPDATE `spark_single_order` SET `apihitornot`='1' WHERE `Single_Order_Id`='$srnois'";
     mysqli_query($conn,$processquery);
     */
$crtnois++;
}

/*
echo "<br>1. <br>";
echo print_r($awbres);
echo "<br>2. <br>";
echo count($orderplaceawbs);
echo "<br>3. <br>";
echo count($orderplacesrno);
echo "<br>";
echo "<br>4. <br>";
print_r($orderplaceawbs);
echo "<br>5. <br>";
print_r($orderplacesrno);
echo "<br><br>";
*/











echo "<br><br>";
// Selected Data In Prcessing Orders
foreach ($orderplacesrno as $orderkey) {
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
  $ordertypeisa = $orderdetailsres['Order_Type'];
  // 24 Order_Type

$last_id = $orderdetailsres['Single_Order_Id'];
echo "<br>";
echo $selectedweightidis = $orderdetailsres['User_Id'];
    $useridisa = $orderdetailsres['User_Id'];
echo "<br>";


// Wallet Code Write Here
echo "<br><br>* -   * 1  -   *<br>";
echo $walletbal = "SELECT * FROM `spark_wallet_details` WHERE `statuscode`='1' AND `user_id`='$useridisa' ORDER BY `wallet_id` DESC LIMIT 1";
$walletbalr = mysqli_query($conn,$walletbal);
$wres = mysqli_fetch_assoc($walletbalr);
echo "<br>Wallet Amt : ";
echo $walbal = $wres['crt_amt'];
$newwalbal = $walbal - $value[16];
echo "<br>* -   *  1 -   *";
echo "<br>* -   *  2 -   *<br>";    
echo $waleti = "INSERT INTO `spark_wallet_details`(`txntype`,`user_id`,`currency`, `amount`, `txn_date_time`, `txnid`) VALUES ('Sub','$useridisa','INR','$value[16]','$wcrtdatetime','$orderno')";
    mysqli_query($conn,$waleti);
$walletid = $conn->insert_id;
$walletoid = "RPWLN".$walletid;
$waletu = "UPDATE `spark_wallet_details` SET `order_id`='$walletoid',`status`='TXN_FAILURE',`statuscode`='2' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);


if($value[16]>$walbal){
    echo "Wallet Amount Not Enough";  
    $waletu = "UPDATE `spark_wallet_details` SET `status`='TXN_FAILURE',`statuscode`='2' WHERE `wallet_id`='$walletid'";
    mysqli_query($conn,$waletu);
    echo "<script> window.location.assign('add_balance.php?walletmsg=Lowbal')</script>";
}else{
    echo "Wallet Amount Detect Successfully";
    // $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbresis',`banktxnid`='$awbresis',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
    // mysqli_query($conn,$waletu);
    // echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbresis')</script>";
}
echo "<br>* -   *  2 -   *";
// Wallet Code Write Here


$accountcate = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$selectedweightidis'";
$accountcater = mysqli_query($conn,$accountcate);
$accountcateres = mysqli_fetch_assoc($accountcater);
echo $weightcategory = $accountcateres['commercialstype'];
echo "<br>";


  // echo $value[0] = trim($value[0]);
  // echo "&ensp; : &ensp;";
  // echo $value[1] = trim($value[1]);
  // echo "&ensp; : &ensp;";
  // echo $value[2] = trim($value[2]);
  // echo "&ensp; : &ensp;";
  // echo  $value[3] = trim($value[3]);
  // echo "&ensp; : &ensp;";
  // echo  $value[4] = trim($value[4]);
  // echo "&ensp; : &ensp;";
  // echo  $value[5] = trim($value[5]);
  // echo "&ensp; : &ensp;";
  // echo  $value[6] = trim($value[6]);
  // echo "&ensp; : &ensp;";
  // echo  $value[7] = trim($value[7]);
  // echo "&ensp; : &ensp;";
  // echo $value[8] = trim($value[8]);
  // echo "&ensp; : &ensp;";
  // echo  $value[9] = trim($value[9]);
  // echo "&ensp; : &ensp;";
  // echo  $value[10] = trim($value[10]);
  // echo "&ensp; : &ensp;";
  // echo  $value[11] = trim($value[11]);
  // echo "&ensp; : &ensp;";
  // echo  $value[12] = trim($value[12]);
  // echo "&ensp; : &ensp;";
  // echo  $value[13] = trim($value[13]);
  // echo "&ensp; : &ensp;";
  // echo  $value[14] = trim($value[14]);
  // echo "&ensp; : &ensp;";
  // echo $value[15] = trim($value[15]);
  // echo "&ensp; : &ensp;";
  // echo  $value[16] = trim($value[16]);
  // echo "&ensp; : &ensp;";
  // echo  $value[17] = trim($value[17]);
  // echo "&ensp; : &ensp;";
  // echo  $value[18] = trim($value[18]);
  // echo "&ensp; : &ensp;";
  // echo  $value[19] = trim($value[19]);
  // echo "&ensp; : &ensp;";
  // echo  $value[20] = trim($value[20]);
  // echo "&ensp; : &ensp;";
  // echo  $value[21] = trim($value[21]);
  // echo "&ensp; : &ensp;";
  // echo  $value[22] = trim($value[22]);
  // echo "&ensp; : &ensp;";
  // echo  $value[23] = trim($value[23]);
  // echo "&ensp; : &ensp;";
  // echo  $value[24] = trim($value[24]);
  // echo "&ensp; : &ensp;";
  // echo  $value[25] = trim($value[25]);
  // echo "&ensp; : <br><br>";


// 0 Customer Name
// 1 Address
// 2  Mobile
// 3  Pincode
// 4 Order ID
// 5 Item
// 6 Quantity
// 7 Width
// 8 Height
// 9 Length
// 10 Invoice Value
// 11 COD Amount if not Enter 0
// 12 State
// 13 City
// 14 Additional Details(dangures Goods, Extra Care)
// 15 Weight
// 16 Total Amount
// 17 pickup_id
// 18 pickup_name
// 19 pickup_mobile
// 20 pickup_pincode
// 21 pickup_gstin
// 22 pickup_address
// 23 pickup_state
// 24 pickup_city
// 25 Order_Type

 ?>



<!-- File Upload According Selected Weight -->


<!-- 500 Gram Start -->
<?php
if($weightcategory=="gm500")
{
$user_id = $selectedweightidis;
try {


// foreach($rowData as $key => $value){
//     if($value[0]==""){  continue;   }


// API Check
// $xpressbeeapion = 1;
// $shadowfaxapion = 0;
// $dtdcapion = 0;
// $delhiveryapion = 0;
// $xpressbeeapion = "XpressBees";
// $shadowfaxapion = "Shadowfax";
// $dtdcapion = "DTDC";
// $delhiveryapion = "Delhivery";

$xpressbeeapion = "XpressBee";
$shadowfaxapion = "ShadowFax";
$dtdcapion = "DTDC";
$delhiveryapion = "Delhivery";

$awbnogenerate = "";
// API Check


// Check Pincode Is Serviceable Or Not
// $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
// $allclientsr=mysqli_query($conn,$allclients);
// $clientres = mysqli_fetch_assoc($allclientsr);
//
// echo "XB : ".$clientres['xpressbee']."<br>";
// echo "DL : ".$clientres['delhivery']."<br>";
// echo "SF : ".$clientres['shadowfax']."<br>";
// echo "DC : ".$clientres['dtdc']."<br>";
//
// if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
// if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
// if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
// if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
//
// $crtusers = explode(",",$clientres['disableclientids']);
// // print_r($crtusers);
// // echo "<br>";
// // echo in_array($clientidisa,$crtusers);
// // echo "<br>";
//
// // echo $a = array_search($idisa, $allidisa);
// // unset($allidisa["$a"]);
// // $allidisa = implode(",",$allidisa);
//
// // $pincode = $row['pincode'];
// // $clientidisa = $clientres['User_Id'];
// $crtusers = explode(",",$clientres['disableclientids']);
// if(in_array($user_id,$crtusers)){
//     $xpressbeeapion = "XB";
//     $shadowfaxapion = "SF";
//     $dtdcapion = "DT";
//     $delhiveryapion = "DL";
// }
// Check Pincode Is Serviceable Or Not



$apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$permissionsr=mysqli_query($conn,$apipermission);
$pres = mysqli_fetch_assoc($permissionsr);
$arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

// print_r($arrayName);

// echo "<br>";



// Temperay Delete Code
// foreach ($allapis1 as $key => $val) {
for ($i=1;$i<6;$i++){
// Check All Permissions APIs
  // echo $key."&ensp; ".$val."<br>";


    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
  // if($shadowfaxapion==$key){
  if($shadowfaxapion==$arrayName[$i]){
    // $awbnogenerate = "SF";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - ShadowfaxM  - - - <br>";


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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$shadowfaxawbno')</script>";
    }else{
      $errormsg = $response['message'];
      $errormsg = mysqli_real_escape_string($conn, $errormsg);
      $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$shadowfaxawbnoudate);
    }
    // exit();
  }
  if($awbnogenerate){        break;     }
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //






    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery
  // if ($delhiveryapion==$key) {
  if ($delhiveryapion==$arrayName[$i]) {
    // $awbnogenerate = "DL";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - Delhivery - - - <br>";
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
        // echo "<br>";
        // print_r($response1);
    // Create a Order //

      // $response = curl_exec($curl);
      // $response = json_decode($response, true);
      // curl_close($curl);

      // $_SESSION["dtdc"] = $response;
      // $test = $_SESSION["dtdc"];
      // print_r($test);

      // // echo "<pre>";
      // $response['data'][0]['reference_number'];
      // // echo "<br>";
      // $response['data'][0]['customer_reference_number'];
      // // echo "<br>";
      // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
      // // echo "<br>";
      // // print_r($response);
      // // exit();
      if($awbnogenerate){
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
        $errormsg = $response1['packages'][0]['remarks'][0];
        $errormsg = mysqli_real_escape_string($conn, $errormsg);
        echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
      }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

  }
  if($awbnogenerate){        break;     }
// Delhivery
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//








    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
  // if($xpressbeeapion==$key){
  if($xpressbeeapion==$arrayName[$i]){
    // $awbnogenerate = "XB";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - XpressBees  - - -  <br>";

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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$xbawbnoisreturn')</script>";
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

  }
  if($awbnogenerate){        break;     }
// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
  // if ($dtdcapion==$key){
  if ($dtdcapion==$arrayName[$i]) {
    // $awbnogenerate = "DT";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "-DTDC <br>";


    // Item Length DTDC is max 50
        echo $value5 = substr($value[5],0,49);
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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
    }else{
      $errormsg1 = $response['data'][0]['reason'];
      $errormsg2 = $response['data'][0]['message'];
      $errormsg = $errormsg1." / ".$errormsg2;
      $errormsg = mysqli_real_escape_string($conn, $errormsg);
      $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$dtdcawbnoudate);
    }


  }
  if($awbnogenerate){        break;     }
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



  // echo "<br>";
}
// echo "Only Check Loop <br><br><br>";
// exit();
// Temperay Delete Code

          // echo "<br><br>";
      // }
    //   echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=Update')</script>";
    //   exit();

} catch (Exception $e) {
        //   echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=No Update')</script>";
}


}
?>
<!-- 500 Gram End -->

<!-- 1 KG Start -->
<?php
if($weightcategory=="kg1")
{
$user_id = $selectedweightidis;
try {
      // foreach($rowData as $key => $value){
      //     if($value[0]==""){  continue;   }


// API Check
// $xpressbeeapion = 1;
// $shadowfaxapion = 0;
// $dtdcapion = 0;
// $delhiveryapion = 0;
// $xpressbeeapion = "XpressBees";
// $shadowfaxapion = "Shadowfax";
// $dtdcapion = "DTDC";
// $delhiveryapion = "Delhivery";

$xpressbeeapion = "XpressBee";
$shadowfaxapion = "ShadowFax";
$dtdcapion = "DTDC";
$delhiveryapion = "Delhivery";

$awbnogenerate = "";
// API Check

// Check Pincode Is Serviceable Or Not
// $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
// $allclientsr=mysqli_query($conn,$allclients);
// $clientres = mysqli_fetch_assoc($allclientsr);
// // echo "XB : ".$clientres['xpressbee']."<br>";
// // echo "DL : ".$clientres['delhivery']."<br>";
// // echo "SF : ".$clientres['shadowfax']."<br>";
// // echo "DC : ".$clientres['dtdc']."<br>";
// if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
// if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
// if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
// if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
// $crtusers = explode(",",$clientres['disableclientids']);
// // print_r($crtusers);
// // echo "<br>";
// // echo in_array($clientidisa,$crtusers);
// // echo "<br>";
// // echo $a = array_search($idisa, $allidisa);
// // unset($allidisa["$a"]);
// // $allidisa = implode(",",$allidisa);
// // $pincode = $row['pincode'];
// // $clientidisa = $clientres['User_Id'];
// $crtusers = explode(",",$clientres['disableclientids']);
// if(in_array($user_id,$crtusers)){
//     $xpressbeeapion = "XB";
//     $shadowfaxapion = "SF";
//     $dtdcapion = "DT";
//     $delhiveryapion = "DL";
// }
// Check Pincode Is Serviceable Or Not



$apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$permissionsr=mysqli_query($conn,$apipermission);
$pres = mysqli_fetch_assoc($permissionsr);
$arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");
// print_r($arrayName);
// echo "<br>";


// Temperay Delete Code
// foreach ($allapis1 as $key => $val) {
for ($i=1;$i<6;$i++){
// Check All Permissions APIs
  // echo $key."&ensp; ".$val."<br>";


    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
  // if($shadowfaxapion==$key){
  if($shadowfaxapion==$arrayName[$i]){
    // $awbnogenerate = "SF";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - ShadowfaxM  - - - <br>";

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
            "product_value":"'.$value[10].'",
            "payment_mode": "'.$value[25].'",
            "cod_amount": "'.$value[11].'",
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
    $shadowfaxawbno = $response['data']['awb_number'];
    $awbnogenerate = $shadowfaxawbno;
    // echo "<br>";
    // print_r($response);
    // echo "<br>qwerty";

    // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$shadowfaxawbnoudate);
    // exit();
    if($shadowfaxawbno){
      	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$shadowfaxawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$shadowfaxawbno')</script>";
      }else{
      	$errormsg = $response['message'];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$shadowfaxawbnoudate);
      }
  }
  if($awbnogenerate){        break;     }
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
  // if($xpressbeeapion==$key){
  if($xpressbeeapion==$arrayName[$i]){
    // $awbnogenerate = "XB";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - XpressBees  - - -  <br>";

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
        // exit();
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
    // print_r($dummy);
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
    // echo "<br><br>";
    // print_r($response);
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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$xbawbnoisreturn')</script>";
      }else{
        	$errormsg = $response['ReturnMessage'];
        	$errormsg = mysqli_real_escape_string($conn, $errormsg);
        	$xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        	mysqli_query($conn,$xpressbeeawbnoudate);
        }
    // exit();
    // echo $response;

  }
  if($awbnogenerate){        break;     }
// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
  // if ($dtdcapion==$key) {
  if ($dtdcapion==$arrayName[$i]) {
    // $awbnogenerate = "DT";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "-DTDC <br>";


    // Item Length DTDC is max 50
        echo $value5 = substr($value[5],0,49);
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

    // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$dtdcawbnoudate);
    if($awbnogenerate){
      	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
      	$errormsg1 = $response['data'][0]['reason'];
      	$errormsg2 = $response['data'][0]['message'];
      	$errormsg = $errormsg1." / ".$errormsg2;
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
      }

  }
  if($awbnogenerate){        break;     }
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery
  // if ($delhiveryapion==$key) {
  if ($delhiveryapion==$arrayName[$i]) {
    // $awbnogenerate = "DL";
    // echo "AwbNO-".$awbnogenerate." : ";
    $valueone = substr($value[1],0,45);
    $valueone = mysqli_real_escape_string($conn, $valueone);
    $value[5] = mysqli_real_escape_string($conn, $value[5]);
    $valuefive = substr($value[5],0,45);
    echo "<br>  - - - Delhivery - - - <br>";
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

// echo "<pre>";
// print_r($delhiverydummy);
// echo "<br><br>";
// exit();

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
    // curl_close($curl);
        // echo $response1;
        // echo "<br>";
    if($response1['packages'][0]['status']=="Success"){
      $awbnogenerate = $response1['packages'][0]['waybill'];
    }
        // echo "<br>";
        // print_r($response1);
    // Create a Order //

      // $response = curl_exec($curl);
      // $response = json_decode($response, true);
      // curl_close($curl);

      // $_SESSION["dtdc"] = $response;
      // $test = $_SESSION["dtdc"];
      // print_r($test);

      // // echo "<pre>";
      // $response['data'][0]['reference_number'];
      // // echo "<br>";
      // $response['data'][0]['customer_reference_number'];
      // // echo "<br>";
      // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
      // // echo "<br>";
      // // print_r($response);
      // // exit();
      if($awbnogenerate){
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
      	$errormsg = $response1['packages'][0]['remarks'][0];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
      }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

  }
  if($awbnogenerate){        break;     }
// Delhivery
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

  // echo "<br>";
}
// echo "Only Check Loop <br><br><br>";
// exit();
// Temperay Delete Code

          // echo "<br><br>";
      // }
    //   echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=Update')</script>";

} catch (Exception $e) {
    // echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=No Update')</script>";
}


}
?>
<!-- 1 KG End -->


<!-- 2 KG Start -->
<?php
if($weightcategory=="kg2")
{
$user_id = $selectedweightidis;
try {
      // foreach($rowData as $key => $value){
      //     if($value[0]==""){  continue;   }

// API Check
// $xpressbeeapion = 1;
// $shadowfaxapion = 0;
// $dtdcapion = 0;
// $delhiveryapion = 0;
// $xpressbeeapion = "XpressBees";
// $shadowfaxapion = "Shadowfax";
// $dtdcapion = "DTDC";
// $delhiveryapion = "Delhivery";

$xpressbeeapion = "XpressBee";
$shadowfaxapion = "ShadowFax";
$dtdcapion = "DTDC";
$delhiveryapion = "Delhivery";

$awbnogenerate = "";
// API Check

// Check Pincode Is Serviceable Or Not
// $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
// $allclientsr=mysqli_query($conn,$allclients);
// $clientres = mysqli_fetch_assoc($allclientsr);
// // echo "XB : ".$clientres['xpressbee']."<br>";
// // echo "DL : ".$clientres['delhivery']."<br>";
// // echo "SF : ".$clientres['shadowfax']."<br>";
// // echo "DC : ".$clientres['dtdc']."<br>";
// if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
// if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
// if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
// if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
// $crtusers = explode(",",$clientres['disableclientids']);
// // print_r($crtusers);
// // echo "<br>";
// // echo in_array($clientidisa,$crtusers);
// // echo "<br>";
// // echo $a = array_search($idisa, $allidisa);
// // unset($allidisa["$a"]);
// // $allidisa = implode(",",$allidisa);
// // $pincode = $row['pincode'];
// // $clientidisa = $clientres['User_Id'];
// $crtusers = explode(",",$clientres['disableclientids']);
// if(in_array($user_id,$crtusers)){
//     $xpressbeeapion = "XB";
//     $shadowfaxapion = "SF";
//     $dtdcapion = "DT";
//     $delhiveryapion = "DL";
// }
// Check Pincode Is Serviceable Or Not

$apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$permissionsr=mysqli_query($conn,$apipermission);
$pres = mysqli_fetch_assoc($permissionsr);
$arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

// print_r($arrayName);
// echo "<br>";





// Temperay Delete Code
// foreach ($allapis1 as $key => $val) {
for ($i=1;$i<6;$i++){
// Check All Permissions APIs
  // echo $key."&ensp; ".$val."<br>";


    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
  // if($shadowfaxapion==$key){
  if($shadowfaxapion==$arrayName[$i]){
    // $awbnogenerate = "SF";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - ShadowfaxM  - - - <br>";

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
            "product_value": '.$value[10].',
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
    $shadowfaxawbno = $response['data']['awb_number'];
    $awbnogenerate = $shadowfaxawbno;
    // echo "<br>";
    // print_r($response);
    // echo "<br>qwerty";

    // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$shadowfaxawbnoudate);
    // exit();
    if($shadowfaxawbno){
    	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
    	mysqli_query($conn,$shadowfaxawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$shadowfaxawbno')</script>";
    }else{
    	$errormsg = $response['message'];
    	$errormsg = mysqli_real_escape_string($conn, $errormsg);
    	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
    	mysqli_query($conn,$shadowfaxawbnoudate);
    }
  }
  if($awbnogenerate){        break;     }
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
  // if($xpressbeeapion==$key){
  if($xpressbeeapion==$arrayName[$i]){
    // $awbnogenerate = "XB";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - XpressBees  - - -  <br>";

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
        // exit();
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
    // print_r($dummy);
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
    // echo "<br><br>";
    // print_r($response);
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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$xbawbnoisreturn')</script>";
        }else{
          $errormsg = $response['ReturnMessage'];
          $errormsg = mysqli_real_escape_string($conn, $errormsg);
          $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
          mysqli_query($conn,$xpressbeeawbnoudate);
        }
    // exit();
    // echo $response;

  }
  if($awbnogenerate){        break;     }
// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
  // if ($dtdcapion==$key) {
  if ($dtdcapion==$arrayName[$i]) {
    // $awbnogenerate = "DT";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "-DTDC <br>";


    // Item Length DTDC is max 50
        echo $value5 = substr($value[5],0,49);
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
    }
    // Check COD Order Or Not

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

    // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$dtdcawbnoudate);
    if($awbnogenerate){
    	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
    	mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
    }else{
    	$errormsg1 = $response['data'][0]['reason'];
    	$errormsg2 = $response['data'][0]['message'];
    	$errormsg = $errormsg1." / ".$errormsg2;
    	$errormsg = mysqli_real_escape_string($conn, $errormsg);
    	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
    	mysqli_query($conn,$dtdcawbnoudate);
    }

  }
  if($awbnogenerate){        break;     }
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery
  // if ($delhiveryapion==$key) {
  if ($delhiveryapion==$arrayName[$i]) {
    // $awbnogenerate = "DL";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - Delhivery - - - <br>";
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

// echo "<pre>";
// print_r($delhiverydummy);
// echo "<br><br>";
// exit();

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
    // curl_close($curl);
        // echo $response1;
        // echo "<br>";
    if($response1['packages'][0]['status']=="Success"){
      $awbnogenerate = $response1['packages'][0]['waybill'];
    }
        // echo "<br>";
        // print_r($response1);
    // Create a Order //

      // $response = curl_exec($curl);
      // $response = json_decode($response, true);
      // curl_close($curl);

      // $_SESSION["dtdc"] = $response;
      // $test = $_SESSION["dtdc"];
      // print_r($test);

      // // echo "<pre>";
      // $response['data'][0]['reference_number'];
      // // echo "<br>";
      // $response['data'][0]['customer_reference_number'];
      // // echo "<br>";
      // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
      // // echo "<br>";
      // // print_r($response);
      // // exit();
      if($awbnogenerate){
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
        	$errormsg = $response1['packages'][0]['remarks'][0];
        	$errormsg = mysqli_real_escape_string($conn, $errormsg);
        	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        	mysqli_query($conn,$dtdcawbnoudate);
      }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

  }
  if($awbnogenerate){        break;     }
// Delhivery
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//


  // echo "<br>";
}
// echo "Only Check Loop <br><br><br>";
// exit();
// Temperay Delete Code
          // echo "<br><br>";
      // }
    //   echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=Update')</script>";

} catch (Exception $e) {
    // echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=No Update')</script>";
}


}
?>
<!-- 2 KG End -->

<!-- 5 KG Start -->
<?php
if($weightcategory=="kg5")
{
$user_id = $selectedweightidis;
try {
      // foreach($rowData as $key => $value){
      //     if($value[0]==""){  continue;   }

// API Check
// $xpressbeeapion = 1;
// $shadowfaxapion = 0;
// $dtdcapion = 0;
// $delhiveryapion = 0;
// $xpressbeeapion = "XpressBees";
// $shadowfaxapion = "Shadowfax";
// $dtdcapion = "DTDC";
// $delhiveryapion = "Delhivery";

$xpressbeeapion = "XpressBee";
$shadowfaxapion = "ShadowFax";
$dtdcapion = "DTDC";
$delhiveryapion = "Delhivery";

$awbnogenerate = "";
// API Check

// Check Pincode Is Serviceable Or Not
// $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
// $allclientsr=mysqli_query($conn,$allclients);
// $clientres = mysqli_fetch_assoc($allclientsr);
// echo "XB : ".$clientres['xpressbee']."<br>";
// echo "DL : ".$clientres['delhivery']."<br>";
// echo "SF : ".$clientres['shadowfax']."<br>";
// echo "DC : ".$clientres['dtdc']."<br>";
// if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
// if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
// if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
// if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
// $crtusers = explode(",",$clientres['disableclientids']);
// // print_r($crtusers);
// // echo "<br>";
// // echo in_array($clientidisa,$crtusers);
// // echo "<br>";
// // echo $a = array_search($idisa, $allidisa);
// // unset($allidisa["$a"]);
// // $allidisa = implode(",",$allidisa);
// // $pincode = $row['pincode'];
// // $clientidisa = $clientres['User_Id'];
// $crtusers = explode(",",$clientres['disableclientids']);
// if(in_array($user_id,$crtusers)){
//     $xpressbeeapion = "XB";
//     $shadowfaxapion = "SF";
//     $dtdcapion = "DT";
//     $delhiveryapion = "DL";
// }
// Check Pincode Is Serviceable Or Not

$apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$permissionsr=mysqli_query($conn,$apipermission);
$pres = mysqli_fetch_assoc($permissionsr);
$arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

// print_r($arrayName);
// echo "<br>";



// Temperay Delete Code
// foreach ($allapis1 as $key => $val) {
for ($i=1;$i<6;$i++){
// Check All Permissions APIs
  // echo $key."&ensp; ".$val."<br>";


    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
  // if($shadowfaxapion==$key){
  if($shadowfaxapion==$arrayName[$i]){
    // $awbnogenerate = "SF";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - ShadowfaxM  - - - <br>";

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
            "product_value": '.$value[10].',
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
    $shadowfaxawbno = $response['data']['awb_number'];
    $awbnogenerate = $shadowfaxawbno;
    // echo "<br>";
    // print_r($response);
    // echo "<br>qwerty";

    // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$shadowfaxawbnoudate);
    // exit();
    if($shadowfaxawbno){
    	   $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$shadowfaxawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$shadowfaxawbno')</script>";
      }else{
      	$errormsg = $response['message'];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$shadowfaxawbnoudate);
      }
  }
  if($awbnogenerate){        break;     }
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
  // if($xpressbeeapion==$key){
  if($xpressbeeapion==$arrayName[$i]){
    // $awbnogenerate = "XB";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - XpressBees  - - -  <br>";

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
        // exit();
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
    // print_r($dummy);
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
    // echo "<br><br>";
    // print_r($response);
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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$xbawbnoisreturn')</script>";
      }else{
      	$errormsg = $response['ReturnMessage'];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$xpressbeeawbnoudate);
      }
    // exit();
    // echo $response;

  }
  if($awbnogenerate){        break;     }
// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
  // if ($dtdcapion==$key) {
  if ($dtdcapion==$arrayName[$i]) {
    // $awbnogenerate = "DT";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "-DTDC <br>";


    // Item Length DTDC is max 50
        echo $value5 = substr($value[5],0,49);
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
    }
    // Check COD Order Or Not

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

    // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$dtdcawbnoudate);
    if($awbnogenerate){
      	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
      	$errormsg1 = $response['data'][0]['reason'];
      	$errormsg2 = $response['data'][0]['message'];
      	$errormsg = $errormsg1." / ".$errormsg2;
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
      }

  }
  if($awbnogenerate){        break;     }
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery
  // if ($delhiveryapion==$key) {
  if ($delhiveryapion==$arrayName[$i]) {
    // $awbnogenerate = "DL";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - Delhivery - - - <br>";
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

// echo "<pre>";
// print_r($delhiverydummy);
// echo "<br><br>";
// exit();

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
    // curl_close($curl);
        // echo $response1;
        // echo "<br>";
    if($response1['packages'][0]['status']=="Success"){
      $awbnogenerate = $response1['packages'][0]['waybill'];
    }
        // echo "<br>";
        // print_r($response1);
    // Create a Order //

      // $response = curl_exec($curl);
      // $response = json_decode($response, true);
      // curl_close($curl);

      // $_SESSION["dtdc"] = $response;
      // $test = $_SESSION["dtdc"];
      // print_r($test);

      // // echo "<pre>";
      // $response['data'][0]['reference_number'];
      // // echo "<br>";
      // $response['data'][0]['customer_reference_number'];
      // // echo "<br>";
      // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
      // // echo "<br>";
      // // print_r($response);
      // // exit();
      if($awbnogenerate){
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
      	$errormsg = $response1['packages'][0]['remarks'][0];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
      }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

  }
  if($awbnogenerate){        break;     }
// Delhivery
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



  echo "<br>";
}
// echo "Only Check Loop <br><br><br>";
// exit();
// Temperay Delete Code

          echo "<br><br>";
      // }
    //   echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=Update')</script>";

} catch (Exception $e) {
    // echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=No Update')</script>";
}


}
?>
<!-- 5 KG End -->

<!-- 10 KG Start -->
<?php
if($weightcategory=="kg10")
{
$user_id = $selectedweightidis;
try {

// foreach($rowData as $key => $value){
//     if($value[0]==""){  continue;   }

// API Check
// $xpressbeeapion = 1;
// $shadowfaxapion = 0;
// $dtdcapion = 0;
// $delhiveryapion = 0;
// $xpressbeeapion = "XpressBees";
// $shadowfaxapion = "Shadowfax";
// $dtdcapion = "DTDC";
// $delhiveryapion = "Delhivery";

$xpressbeeapion = "XpressBee";
$shadowfaxapion = "ShadowFax";
$dtdcapion = "DTDC";
$delhiveryapion = "Delhivery";

$awbnogenerate = "";
// API Check


// Check Pincode Is Serviceable Or Not
// $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
// $allclientsr=mysqli_query($conn,$allclients);
// $clientres = mysqli_fetch_assoc($allclientsr);
// echo "XB : ".$clientres['xpressbee']."<br>";
// echo "DL : ".$clientres['delhivery']."<br>";
// echo "SF : ".$clientres['shadowfax']."<br>";
// echo "DC : ".$clientres['dtdc']."<br>";
// if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
// if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
// if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
// if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
// $crtusers = explode(",",$clientres['disableclientids']);
// // print_r($crtusers);
// // echo "<br>";
// // echo in_array($clientidisa,$crtusers);
// // echo "<br>";
// // echo $a = array_search($idisa, $allidisa);
// // unset($allidisa["$a"]);
// // $allidisa = implode(",",$allidisa);
// // $pincode = $row['pincode'];
// // $clientidisa = $clientres['User_Id'];
// $crtusers = explode(",",$clientres['disableclientids']);
// if(in_array($user_id,$crtusers)){
//     $xpressbeeapion = "XB";
//     $shadowfaxapion = "SF";
//     $dtdcapion = "DT";
//     $delhiveryapion = "DL";
// }
// Check Pincode Is Serviceable Or Not

$apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$permissionsr=mysqli_query($conn,$apipermission);
$pres = mysqli_fetch_assoc($permissionsr);
$arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

// print_r($arrayName);
// echo "<br>";


// Temperay Delete Code
// foreach ($allapis1 as $key => $val) {
for ($i=1;$i<6;$i++){
// Check All Permissions APIs
  // echo $key."&ensp; ".$val."<br>";


    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
  // if($shadowfaxapion==$key){
  if($shadowfaxapion==$arrayName[$i]){
    // $awbnogenerate = "SF";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - ShadowfaxM  - - - <br>";

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
            "product_value": '.$value[10].',
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
    $shadowfaxawbno = $response['data']['awb_number'];
    $awbnogenerate = $shadowfaxawbno;
    // echo "<br>";
    // print_r($response);
    // echo "<br>qwerty";

    // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$shadowfaxawbnoudate);
    // exit();
    if($shadowfaxawbno){
      	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$shadowfaxawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$shadowfaxawbno',`banktxnid`='$shadowfaxawbno',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$shadowfaxawbno')</script>";
      }else{
      	$errormsg = $response['message'];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$shadowfaxawbnoudate);
      }

  }
  if($awbnogenerate){        break;     }
// Shadowfax
    // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
  // if($xpressbeeapion==$key){
  if($xpressbeeapion==$arrayName[$i]){
    // $awbnogenerate = "XB";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - XpressBees  - - -  <br>";

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
        // exit();
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
    // print_r($dummy);
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
    // echo "<br><br>";
    // print_r($response);
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
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$xbawbnoisreturn',`banktxnid`='$xbawbnoisreturn',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$xbawbnoisreturn')</script>";
      }else{
      	$errormsg = $response['ReturnMessage'];
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$xpressbeeawbnoudate);
      }
    // exit();
    // echo $response;

  }
  if($awbnogenerate){        break;     }
// XpressBees
    // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
  // if ($dtdcapion==$key) {
  if ($dtdcapion==$arrayName[$i]) {
    // $awbnogenerate = "DT";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "-DTDC <br>";


    // Item Length DTDC is max 50
        echo $value5 = substr($value[5],0,49);
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
    }
    // Check COD Order Or Not

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

    // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
    // mysqli_query($conn,$dtdcawbnoudate);
    if($awbnogenerate){
      	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
      	$errormsg1 = $response['data'][0]['reason'];
      	$errormsg2 = $response['data'][0]['message'];
      	$errormsg = $errormsg1." / ".$errormsg2;
      	$errormsg = mysqli_real_escape_string($conn, $errormsg);
      	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
      	mysqli_query($conn,$dtdcawbnoudate);
      }

  }
  if($awbnogenerate){        break;     }
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery
  // if ($delhiveryapion==$key) {
  if ($delhiveryapion==$arrayName[$i]) {
    // $awbnogenerate = "DL";
    // echo "AwbNO-".$awbnogenerate." : ";
    echo "<br>  - - - Delhivery - - - <br>";
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

// echo "<pre>";
// print_r($delhiverydummy);
// echo "<br><br>";
// exit();

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
    // curl_close($curl);
        // echo $response1;
        // echo "<br>";
    if($response1['packages'][0]['status']=="Success"){
      $awbnogenerate = $response1['packages'][0]['waybill'];
    }
        // echo "<br>";
        // print_r($response1);
    // Create a Order //

      // $response = curl_exec($curl);
      // $response = json_decode($response, true);
      // curl_close($curl);

      // $_SESSION["dtdc"] = $response;
      // $test = $_SESSION["dtdc"];
      // print_r($test);

      // // echo "<pre>";
      // $response['data'][0]['reference_number'];
      // // echo "<br>";
      // $response['data'][0]['customer_reference_number'];
      // // echo "<br>";
      // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
      // // echo "<br>";
      // // print_r($response);
      // // exit();
      if($awbnogenerate){
        $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
        mysqli_query($conn,$dtdcawbnoudate);
$waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
mysqli_query($conn,$waletu);
echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbnogenerate')</script>";
      }else{
        	$errormsg = $response1['packages'][0]['remarks'][0];
        	$errormsg = mysqli_real_escape_string($conn, $errormsg);
        	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
        	mysqli_query($conn,$dtdcawbnoudate);
        }

    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

  }
  if($awbnogenerate){        break;     }
// Delhivery
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



  echo "<br>";
}
// echo "Only Check Loop <br><br><br>";
// exit();
// Temperay Delete Code

          echo "<br><br>";
      // }
    //   echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=Update')</script>";

} catch (Exception $e) {
    // echo "<script> window.location.assign('bulkorderuploadAPI.php?excelfile=No Update')</script>";
}


}
?>
<!-- 10 KG End -->


<!-- File Upload According Selected Weight -->






































<?php

// Selected Data In Prcessing Orders
}
// Selected Data In Prcessing Orders

?>



<!-- /#page-wrapper -->
<?php
  include "Layout_Footer_Table.php";
?>
