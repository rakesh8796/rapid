<?php
// include "Layout_Header_Table.php";
include("config/dbcon.php");
extract($_REQUEST);
// error_reporting(1);
// include 'Header.php';
$orderdata = date('Y-m-d H:i:s');
?>
<!-- Page Content -->
<div class="col-md-12" style="background:#edf1f5">



<?php
// echo $orderno = "RPDX005509";
echo "<br>";
$orderplaceawbs = array();
$orderplacesrno = array();
echo $awborderquery = "SELECT * FROM `spark_single_order` WHERE `orderno`='$orderno' ORDER BY `Single_Order_Id` DESC LIMIT 1";
$awborderqueryr = mysqli_query($conn,$awborderquery);
$crtnois = 1;
while ($awbres = mysqli_fetch_assoc($awborderqueryr)){
     echo "<br>";
     echo $orderplaceawbs[$crtnois] = $awbres['orderno'];
     
     echo "<br>";
     echo $orderplacesrno[$crtnois] = $awbres['Single_Order_Id'];
     
     echo "<br>";
     echo $orderno = $awbres['orderno'];
     
     echo "<br>";
     echo $srnois = $awbres['Single_Order_Id'];
     
     echo "<br>";
     echo $awbresis = $awbres['Awb_Number'];
     echo "<br>Total Amt : ";
     echo $tamt = $awbres['Total_Amount'];
     echo "<br>";



echo "<br><br>* -   * 1  -   *<br>";
echo $useridisa = $awbres['User_Id'];
echo "<br>";
echo $walletbal = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$useridisa' ORDER BY `wallet_id` DESC LIMIT 1";
$walletbalr = mysqli_query($conn,$walletbal);
$wres = mysqli_fetch_assoc($walletbalr);
echo "<br>Wallet Amt : ";
echo $walbal = $wres['crt_amt'];
echo "<br>* -   *  1 -   *";
echo "<br>* -   *  2 -   *<br>";

    echo $wcrtdatetime = date("Y-m-d H:i:s");
    echo "<br>";
    echo $waleti = "INSERT INTO `spark_wallet_details`(`txntype`,`user_id`, `awb_no`, `currency`, `amount`, `txn_date_time`, `txnid`, `banktxnid`) VALUES ('Sub','$useridisa','$awbresis','INR','$tamt','$wcrtdatetime','$orderno','$awbresis')";
    mysqli_query($conn,$waleti);
    $walletid = $conn->insert_id;

    if($tamt>$walbal){
        echo "Wallet Amount Not Enough";  
        $walletoid = "RPWLN".$walletid;
        $waletu = "UPDATE `spark_wallet_details` SET `order_id`='$walletoid',`status`='TXN_FAILURE',`statuscode`='2' WHERE `wallet_id`='$walletid'";
        mysqli_query($conn,$waletu);
    }else{
        echo "Wallet Amount Detect Successfully";  
        $newwalbal = $walbal - $tamt;
        $walletoid = "RPWLN".$walletid;
        $waletu = "UPDATE `spark_wallet_details` SET `order_id`='$walletoid',`status`='TXN_SUCCESS',`statuscode`='1',`last_amt`='$walbal',`update_amt`='$tamt', `crt_amt`='$newwalbal' WHERE `wallet_id`='$walletid'";
        mysqli_query($conn,$waletu);
    }
echo "<br>* -   *  2 -   *";
echo "<br>* -   *  3 -   *<br>";

// $useridisa
echo "<br>";


/*

    INSERT INTO `spark_wallet_details`(`user_id`, `last_amt`, `update_amt`,`crt_amt`) VALUES('$CUST_ID','$ORDER_ID','$lastamt','$TXN_AMOUNT','$finalamt')";
    if(mysqli_query($conn,$query)){

    }
    
*/
echo "<br>* -   *  3 -   *";
echo "<br>* -   *  4 -   *<br>";
echo "<br>* -   *  4 -   *";






    echo "<br>";
    $awbresis = 8445110220920;
    echo "<script> window.location.assign('rsinglelabelxheck.php?ordernos=$awbresis')</script>";
    echo "<br>";
    echo "<a href='rsinglelabelxheck.php?ordernos=$awbresis'>Print Now</a>";
        

     $processquery = "UPDATE `spark_single_order` SET `apihitornot`='1' WHERE `Single_Order_Id`='$srnois'";
     mysqli_query($conn,$processquery);
$crtnois++;
}
echo "<br>";
echo count($orderplaceawbs);
echo "<br>";
echo count($orderplacesrno);
echo "<br>";
echo "<br>";
print_r($orderplaceawbs);
echo "<br>";
print_r($orderplacesrno);

// echo "<br><br>";
// $allawbno1 = array('RPDX0012250','RPDX0012251','RPDX0012252','RPDX0012253');
// $serialno1 = array('12250','12251','12252','12253');
// echo "<br>";
// print_r($allawbno1);
// echo "<br>";
// print_r($serialno1);



// foreach ($orderplaceawbs as $value) {
//   echo $value."<br>";
//   $queryallawb = "INSERT INTO `autostatusupdate4`(`awbnois`, `statusis`, `awbcheck`) VALUES ('$value','','0')";
//   mysqli_query($conn,$queryallawb);
// }
// exit();
echo "<br><br>";











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
  // 24 Order_Type



$last_id = $orderdetailsres['Single_Order_Id'];


echo "<br>";
echo $selectedweightidis = $orderdetailsres['User_Id'];
echo "<br>";

$accountcate = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$selectedweightidis'";
$accountcater = mysqli_query($conn,$accountcate);
$accountcateres = mysqli_fetch_assoc($accountcater);
echo $weightcategory = $accountcateres['commercialstype'];
echo "<br>";


 ?>



<!-- File Upload According Selected Weight -->


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
