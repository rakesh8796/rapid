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







// echo "Enter A Action <br>";
$user_id = $_SESSION['useridis'];
    // if(empty($pickupaddressid)){
        // echo "Pickup Id Not Existes <br><br>";
        
        
        // $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`, `Active`) VALUES ('$user_id','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity',now(),1)";
        // if(mysqli_query($conn,$newpickupaddress)){
        //     $pickupaddressid = mysqli_insert_id($conn);
        // }else{
        //     // echo "<br> Pickup Else Run <br>";
        //     echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
        // }

        
    // }
    // echo "<br><br>-1-<br><br>";
    if(empty($itemname)){   $itemname = $itemnamecate; }
    


    // echo "<br><br>1- ";
    // echo $tamtwihtgst;
    // echo "<br>2- ";
    // echo $agentfee;
    // echo "<br>3- ";
    // echo $tamtwihtgstnew = $tamtwihtgst+$agentfee;
    // echo "<br><br>";

// Delhivry Surface
if($retailerbookingsingledelhiverysurface){

    // echo "<br><br>1- ";
    $tamtwihtgstdlsf;
    // echo "<br>2- ";
    $agentfee;
    // echo "<br>3- ";
    $tamtwihtgstnew = $tamtwihtgstdlsf+$agentfee;
    // echo "<br><br>";    
    
}elseif($retailerbookingsingleekart){
// Ekart
    
    // echo "<br><br>1- ";
    $tamtwihtgstekrt;
    // echo "<br>2- ";
    $agentfee;
    // echo "<br>3- ";
    $tamtwihtgstnew = $tamtwihtgstekrt+$agentfee;
    // echo "<br><br>";    
    
//
}elseif($retailerbookingsingledtdc){
// DTDC
    
    // echo "<br><br>1- ";
     $tamtwihtgst;
    // echo "<br>2- ";
     $agentfee;
    // echo "<br>3- ";
     $tamtwihtgstnew = $tamtwihtgst+$agentfee;
    // echo "<br><br>";    
    
//
}elseif($retailerbookingsingleshadowfax){
// Shadowfax
    
    // echo "<br><br>1- ";
     $tamtwihtgst;
    // echo "<br>2- ";
     $agentfee;
    // echo "<br>3- ";
     $tamtwihtgstnew = $tamtwihtgst+$agentfee;
    // echo "<br><br>";    
    
//
}elseif($retailerbookingsingledelhiverybulky){
// Delhivery Bulky
    
    // echo "<br><br>1- ";
     $tamtwihtgst;
    // echo "<br>2- ";
     $agentfee;
    // echo "<br>3- ";
     $tamtwihtgstnew = $tamtwihtgst+$agentfee;
    // echo "<br><br>";    
    
//
}elseif($retailerbookingsinglexpressbees){
// Xpressbees
    
    // echo "<br><br>1- ";
     $tamtwihtgstxb;
    // echo "<br>2- ";
     $agentfee;
    // echo "<br>3- ";
     $tamtwihtgstnew = $tamtwihtgstxb+$agentfee;
    // echo "<br><br>";    
    
//
}
// exit();



// Invoice Amount same as Total Amount
$invoicevalue = $totalamount;    

    $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `item_cate`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`, `agent_fee`, `agent_total_freight_amt`, `additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`,`apihitornot`)
    VALUES ('$ordertype','$user_id','$name','$address','$state','$city','$mobile','$pin','$itemname','$itemnamedemo','$quantity','$widht','$height','$lenght','$actualweight','$totalamount','$invoicevalue','$codamount','$agentfee','$tamtwihtgstnew','$itemextracare',now(),'Single','$pickupaddressid','$pickupaddressid','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity','Pending','Pending','Upload','1')";

// exit();
    if(mysqli_query($conn,$singlequery)){
        // echo "<br> Query Run <br>";
// Last Insert ID
    $last_id = mysqli_insert_id($conn);
    $orderidcreate = "RPDX00".$last_id;
    $orderno = $orderidcreate;
    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    if(mysqli_query($conn,$updateorderid)){
            echo "<br> If Run <br>";
            unset($_SESSION['estimatedetails']);
            // $orderno = 5509;
//  
            // Delhivry Surface
            if($retailerbookingsingledelhiverysurface){
                echo "<script> window.location.assign('retailer-book-single-order-upload-api.php?&orderkey=$last_id&ordertype=DlSufx')</script>";
            }elseif($retailerbookingsingleekart){
            // Ekart
                echo "<script> window.location.assign('retailer-book-single-order-upload-api.php?&orderkey=$last_id&ordertype=Ekart')</script>";
            //
            }elseif($retailerbookingsingledtdc){
            // DTDC
                echo "<script> window.location.assign('retailer-book-single-order-upload-api.php?&orderkey=$last_id&ordertype=Dtdc')</script>";
            //
            }elseif($retailerbookingsingleshadowfax){
            // Shadowfax
                echo "<script> window.location.assign('retailer-book-single-order-upload-api.php?&orderkey=$last_id&ordertype=Sadfx')</script>";
            //
            }elseif($retailerbookingsingledelhiverybulky){
            // Delhivery Bulky
                echo "<script> window.location.assign('retailer-book-single-order-upload-api.php?&orderkey=$last_id&ordertype=DlBulky')</script>";
            //
            }elseif($retailerbookingsinglexpressbees){
            // Xpressbees
                echo "<script> window.location.assign('retailer-book-single-order-upload-api.php?&orderkey=$last_id&ordertype=Xbees')</script>";
            //
            }
// 
        }else{
            echo "<br> Else Run <br>";
            echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
        }
            echo "<br> Else <br>";
            echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
    }else{
        echo "run else";
        echo "<script> window.location.assign('retailer-book-single-order.php?excelfile=No Update')</script>";
    }



?>





