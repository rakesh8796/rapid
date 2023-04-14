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
    $waletu = "UPDATE `spark_wallet_details` SET `awb_no`='$awbnogenerate',`banktxnid`='$awbnogenerate',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$crtbal',`update_amt`='$value[16]', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
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



echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=Update')</script>";
// DTDC
    // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

