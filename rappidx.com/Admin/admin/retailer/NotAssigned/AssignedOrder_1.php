<?php 
include("../config/dbcon.php");
extract($_REQUEST);

echo $couriername;
echo $queryidis;

$query = "SELECT * FROM `spark_single_order` WHERE `Single_Order_Id`='$queryidis'";
$fdata=mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($fdata);


// if($result['Active']){
// 	$queryn = "UPDATE `asitfa_user` SET `Active`='0' WHERE `User_Id`='$clientidisause'";
// 	mysqli_query($conn,$queryn);
// }else{
// 	$queryn = "UPDATE `asitfa_user` SET `Active`='1' WHERE `User_Id`='$clientidisause'";
// 	mysqli_query($conn,$queryn);
// }



exit();















      // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
// Shadowfax
    if($shadowfaxapion==$key){
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

      $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$shadowfaxawbnoudate);
      // exit();
    }
    if($awbnogenerate){        break;     }
// Shadowfax
      // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //

























      // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// XpressBees
    if($xpressbeeapion==$key){
      // $awbnogenerate = "XB";
      // echo "AwbNO-".$awbnogenerate." : ";
      echo "<br>  - - - XpressBees  - - -  <br>";

          // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
      // $xbawbnois = "131560000012351";
      $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
      $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
      $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
      $xbawbnois = $xpressbeesawbnofetchres['awbnois'];

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
          "CollectibleAmount": "'.$value[16].'",
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
        }
      // exit();
      // echo $response;

    }
    if($awbnogenerate){        break;     }
// XpressBees
      // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//























      // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
    if ($dtdcapion==$key) {
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
                  "service_type_id": "EXPRESS",
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
                  "service_type_id": "GROUND EXPRESS",
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
                  "service_type_id": "GROUND EXPRESS",
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

      echo "<br>";
      // echo $response;
      print_r($response);
      echo "<br>";


      
      // echo "<pre>";
      $awbnogenerate = $response['data'][0]['reference_number'];
      // echo "<br>";
      $response['data'][0]['customer_reference_number'];
      // echo "<br>";
      $response['data'][0]['pieces'][0]['reference_number'];
      // echo "<br>";

      $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
      mysqli_query($conn,$dtdcawbnoudate);

// exit();

    }
// DTDC
      // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






























      // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// Delhivery
    if ($delhiveryapion==$key) {
      // $awbnogenerate = "DL";
      // echo "AwbNO-".$awbnogenerate." : ";
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
            "products_desc": "'.$value[5].'",
            "cod_amount": "'.$value[11].'",
            "name": "'.$value[0].'",
            "country": "India",
            "waybill": "'.$awbnois.'",
            "seller_inv_date": "'.$orderdata.'",
            "order_date": "'.$orderdata.'",
            "total_amount": "'.$value[16].'",
            "seller_add": "'.$value[22].'",
            "seller_cst": "'.$value[21].'",
            "add": "'.$value[1].'",
            "seller_name": "'.$value[18].'",
            "seller_inv": "",
            "seller_tin": "",
            "pin": "'.$value[3].'",
            "quantity": "'.$value[6].'",
            "payment_mode": "'.$value[25].'",
            "state": "'.$value[23].'",
            "city": "'.$value[24].'",
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
              "products_desc": "'.$value[5].'",
              "cod_amount": "'.$value[11].'",
              "name": "'.$value[0].'",
              "country": "India",
              "waybill": "'.$awbnois.'",
              "seller_inv_date": "'.$orderdata.'",
              "order_date": "'.$orderdata.'",
              "total_amount": "'.$value[16].'",
              "seller_add": "'.$value[22].'",
              "seller_cst": "'.$value[21].'",
              "add": "'.$value[1].'",
              "seller_name": "'.$value[18].'",
              "seller_inv": "",
              "seller_tin": "",
              "pin": "'.$value[3].'",
              "quantity": "'.$value[6].'",
              "payment_mode": "'.$value[25].'",
              "state": "'.$value[23].'",
              "city": "'.$value[24].'",
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
      
      if($response1['packages'][0]['status']=="Success"){
        $awbnogenerate = $response1['packages'][0]['waybill'];
      }

        if($awbnogenerate){
          $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
          mysqli_query($conn,$dtdcawbnoudate);
        }

      // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

    }
    if($awbnogenerate){        break;     }
// Delhivery
      // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

?>