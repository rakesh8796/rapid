<?php
    include "Layout_Header-retailer.php";
?>

<!--  Header  -->
<?php
    include "retailer-header-bulk.php";
?>
<!--  Header  -->

<?php


echo "Loading...";






$orderdata = date('Y-m-d H:i:s');
$wcrtdatetime = date("Y-m-d H:i:s");




    // $cancelrpdxnois."--> ";

    $queryall = "SELECT * FROM `spark_single_order` WHERE `orderno`='$cancelrpdxnois'";
    $fdataall=mysqli_query($conn,$queryall);
    // $numrowall=mysqli_num_rows($fdataall);
    $resultall = mysqli_fetch_assoc($fdataall);



    $ordernoisa = $resultall['orderno'];
    $awbnoisa = $resultall['Awb_Number'];
    $couriername = $resultall['awb_gen_by'];
    

    $userid = $resultall['User_Id'];
    $refundamt = $resultall['agent_total_freight_amt'];
    $agent_fee = $resultall['agent_fee'];

    // <!--    Cancel Orders   -->


$cancelstatus = '0';

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
        if(mysqli_query($conn,$updateorderid)){
          $cancelstatus = '1';
        }
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
        if(mysqli_query($conn,$updateorderid)){
          $cancelstatus = '1';
        }
    }



    // DTDC
    }elseif($couriername=="Shadowfax"){
    // Shadowfax

        echo "Shadowfax";
        echo "<br>";
        echo $ordernoisa;
        echo "<br>";
        echo $awbnoisa;


        // Temperoary
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            if(mysqli_query($conn,$updateorderid)){
              $cancelstatus = '1';
            }
        // Temperoary


    // Shadowfax
    }elseif($couriername=="Ekart"){
    // Ekart
        echo "Ekart";
        echo "<br>";
        echo $ordernoisa;
        echo "<br>";
        echo $awbnoisa;

$ekarttokens = "SELECT * FROM `api_tokens` WHERE `couriername`='Ekart'";
$ekarttoken = mysqli_query($conn,$ekarttokens);
$ekarttoke = mysqli_fetch_assoc($ekarttoken);
$beartokn = $ekarttoke['tokenno'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.ekartlogistics.com/v2/shipments/rto/create',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "request_id": "",
    "request_details": [
        {
            "tracking_id": "'.$awbnoisa.'",
            "reason": "not intersted to book this order"
        }
    ]
}',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "HTTP_X_MERCHANT_CODE: RPX",
    "Authorization: $beartokn"
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
curl_close($curl);


// echo "<pre>";
// print_r($response);

if($response['unauthorised']){
    // $msg = $response['unauthorised'];
    // echo "<script> alert($msg);  </script>";
    echo "<script> window.location.assign('retailer-single-order.php?excelfile=Not Cancel Order')</script>";
}else{
    if($response['response'][0]['status'] == "REQUEST_RECEIVED" AND $response['response'][0]['status_code'] == "200"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        if(mysqli_query($conn,$updateorderid)){
          $cancelstatus = '1';
        }
    }
}

    // Ekart
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
            echo $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            if(mysqli_query($conn,$updateorderid)){
              $cancelstatus = '1';
            }
        }

    // Delhivery
    }elseif($couriername=="Delhivery2"){
    // Delhivery 2nd API
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
            'Authorization: Token 6f82518fd0e9772ede80d1ec821013d41f11de05',
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
            echo $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            if(mysqli_query($conn,$updateorderid)){
              $cancelstatus = '1';
            }
        }

      }
    // Delhivery 2nd API
    
    
    
    
    
    
    

// Wallet Refund Amount
if($cancelstatus=='1'){

    $walletdetails = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$userid' AND `status`='TXN_SUCCESS'  ORDER BY `wallet_id` DESC LIMIT 1";
    $walletdetail = mysqli_query($conn,$walletdetails);
    $walletdetai = mysqli_fetch_assoc($walletdetail);
    if(empty($walletdetai['crt_amt'])){        $crtbal = 0;
    }else{        $crtbal = $walletdetai['crt_amt'];    }

    $newbal = $crtbal+$refundamt;

    $waleti = "INSERT INTO `spark_wallet_details`
    (`txntype`,`user_id`,`awb_no`,`currency`, `amount`, `txn_date_time`, `txnid`,`banktxnid`,`status`,`statuscode`,`last_amt`,`update_amt`,`crt_amt`,`agent_fee`,`remark`) VALUES 
    ('Add','$userid','$awbnoisa','INR','$refundamt','$wcrtdatetime','$awbnoisa','$awbnoisa','TXN_SUCCESS','1','$crtbal',$refundamt,'$newbal','$agent_fee','Refund')";
    mysqli_query($conn,$waleti);
    $walletid = $conn->insert_id;
    $walletoid = "RPWLN".$walletid;
    $waletus = "UPDATE `spark_wallet_details` SET `order_id`='$walletoid' WHERE `wallet_id`='$walletid'";
    mysqli_query($conn,$waletus);
}
// Wallet Refund Amount

    
    
    
    
    
    
    
    
    
    
    // <!--    Cancel Orders   -->
    echo "<script> window.location.assign('retailer-single-order.php?excelfile=Cancel Order')</script>";
    
    // exit();




 ?>