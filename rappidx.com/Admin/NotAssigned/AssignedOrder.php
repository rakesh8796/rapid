<?php 
include("../config/dbcon.php");
extract($_REQUEST);
error_reporting(1);

// echo $couriername;
// echo $queryidis;
// $queryidis = "388";
// $couriername = 'Delhivery';
$last_id = $queryidis;
// echo "<pre>";


$query = "SELECT * FROM `spark_single_order` WHERE `Single_Order_Id`='$queryidis'";
$fdata=mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($fdata);

// echo $result['Single_Order_Id'];
// echo "<br>";
// echo $result['Order_Type'];
// echo "<br>";
// echo $result['User_Id'];
// echo "<br>";
// echo $result['orderno'];
// echo "<br>";
// echo $result['Awb_Number'];
// echo "<br>";
// echo $result['awb_gen_by'];
// echo "<br>";
// echo $result['Name'];
// echo "<br>";
// echo $result['Address'];
// echo "<br>";
// echo $result['State'];
// echo "<br>";
// echo $result['City'];
// echo "<br>";
// echo $result['Mobile'];
// echo "<br>";
// echo $result['Pincode'];
// echo "<br>";
// echo $result['Item_Name'];
// echo "<br>";
// echo $result['Quantity'];
// echo "<br>";
// echo $result['Width'];
// echo "<br>";
// echo $result['Height'];
// echo "<br>";
// echo $result['Length'];
// echo "<br>";
// echo $result['Actual_Weight'];
// echo "<br>";
// echo $result['Total_Amount'];
// echo "<br>";
// echo $result['Invoice_Value'];
// echo "<br>";
// echo $result['Cod_Amount'];
// echo "<br>";
// echo $result['Clinet_Order_Id'];
// echo "<br>";
// echo $result['additionaltype'];
// echo "<br>";
// echo $result['Rec_Time_Stamp'];
// echo "<br>";
// echo $result['Rec_Time_Date'];
// echo "<br>";
// echo $result['Last_Time_Stamp'];
// echo "<br>";
// echo $result['uploadtype'];
// echo "<br>";
// echo $result['Active'];
// echo "<br>";
// echo $result['order_status'];
// echo "<br>";
// echo $result['order_status1'];
// echo "<br>";
// echo $result['pickup_id'];
// echo "<br>";
// echo $result['Address_Id'];
// echo "<br>";
// echo $result['pickup_name'];
// echo "<br>";
// echo $result['pickup_mobile'];
// echo "<br>";
// echo $result['pickup_pincode'];
// echo "<br>";
// echo $result['pickup_gstin'];
// echo "<br>";
// echo $result['pickup_address'];
// echo "<br>";
// echo $result['pickup_state'];
// echo "<br>";
// echo $result['pickup_city'];
// echo "<br>";
// echo $result['order_cancel'];
// echo "<br>";

// print_r($result);













// Customer Name = $value[0]
// Customer Address = $value[1]
// Customer Mobile = $value[2]
// Customer Pincode = $value[3]
// Order id = $value[4]
// Order Name = $value[5]
// Quantity = $value[6]
// Width = $value[7]
// Height = $value[8]
// Length = $value[9]
// Invoice_Value = $value[10]
// COD Amt = $value[11]
// State = $value[12]
// City = $value[13]
// Additional Care = $value[14]
// Weight = $value[15]
// Total_Amount = $value[16]
// Pickup Id = $value[17]
// pickupname = $value[18]
// pickupmobile = $value[19]
// pickuppincode = $value[20]
// pickup_gstin = $value[21]
// pickupadress = $value[22]
// pickupstate = $value[23]
// pickupcity = $value[24]





$value[25] = $result['Order_Type'];
// $user_id = $result['User_Id'];
$value[0] = $result['Name'];
$value[1] = $result['Address'];
$value[12] = $result['State'];
$value[13] = $result['City'];
$value[2] = $result['Mobile'];
$value[3] = $result['Pincode'];
$value[5] = $result['Item_Name'];
$value[6] = $result['Quantity'];
$value[7] = $result['Width'];
$value[8] = $result['Height'];
$value[9] = $result['Length'];
$value[15] = $result['Actual_Weight'];
$value[16] = $result['Total_Amount'];
$value[10] = $result['Invoice_Value'];
$value[11] = $result['Cod_Amount'];
$value[12] = $result['additionaltype'];
// $tdate = $result['Rec_Time_Date'];
$tdate = date("Y-m-d");
// $Excel = $result['uploadtype'];
$value[17] = $result['pickup_id'];
$value[17] = $result['Address_Id'];
$value[18] = $result['pickup_name'];
$value[19] = $result['pickup_mobile'];
$value[20] = $result['pickup_pincode'];
$value[21] = $result['pickup_gstin'];
$value[22] = $result['pickup_address'];
$value[23] = $result['pickup_state'];
$value[24] = $result['pickup_city'];
// $Pending = $result['order_status'];
// $Pending = $result['order_status1'];










// if($result['Active']){
// 	$queryn = "UPDATE `asitfa_user` SET `Active`='0' WHERE `User_Id`='$clientidisause'";
// 	mysqli_query($conn,$queryn);
// }else{
// 	$queryn = "UPDATE `asitfa_user` SET `Active`='1' WHERE `User_Id`='$clientidisause'";
// 	mysqli_query($conn,$queryn);
// }
if($couriername=="Delete"){

	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `Single_Order_Id`='$last_id'";
	if(mysqli_query($conn,$dtdcawbnoudate)){
		echo "Order Deteled Successfully";
	}else{
		echo "Order Not Deteled";
	}

}elseif($couriername=="Delhivery"){
	// echo "A1".$couriername;
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
      print_r($delhiverydummy);

}elseif($couriername=="DTDC"){
	// echo "A2".$couriername;
      // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
// DTDC
      // Item Length DTDC is max 50
          $value5 = substr($value[5],0,49);
      // Item Length DTDC is max 50
      // Check COD Order Or Not
      if(empty($value[11]))
      {
			$curlcodcheck = '
			{
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

      }elseif($value[11]==0)
      {
			$curlcodcheck = '
			{
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
      	$curlcodcheck = '
      	{
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
         
      }

      print_r($curlcodcheck);


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

      // echo "<br>";
      // echo $response;
      print_r($response);
      // echo "<br>";


      
      // echo "<pre>";
      $awbnogenerate = $response['data'][0]['reference_number'];
      // echo "<br>";
      $response['data'][0]['customer_reference_number'];
      // echo "<br>";
      $response['data'][0]['pieces'][0]['reference_number'];
      // echo "<br>";

	  if($awbnogenerate){
		$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
		mysqli_query($conn,$dtdcawbnoudate);
      	echo "AWB Number Is ".$dtdcawbnoudate;
      }else{
      	echo "DTDC Not Order Place";
      }
// DTDC
      // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//


}elseif($couriername=="XpressBees"){
	// echo "A3".$couriername;
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
      print_r($dummy);
}elseif($couriername=="Shadowfax"){
	// echo "A4".$couriername;
	$ShadowfaxAPI = '{
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
      }';
      print_r($ShadowfaxAPI);
}






?>