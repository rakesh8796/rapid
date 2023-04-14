<?php class Famsmaster   {
    


  

    function addAddress(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $user_id = $_POST['user_id'];
            $name = trim($_POST['name']);
            $mobile = trim($_POST['mobile']);
            $pincode = trim($_POST['pincode']);
            $gstin = trim($_POST['gstin']);
            $address = trim($_POST['address']);
            $state = trim($_POST['state']);
            $city = trim($_POST['city']);
            $RecTimeStamp = Date("Y/m/d H:m:s");
            try {

                $dbservice = $db->query("SELECT * FROM spark_pickup_address WHERE Mobile = '$mobile' AND User_Id = '$user_id'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Mobile is already exist')</script>";
                }
                else{
                    $sql = "INSERT INTO spark_pickup_address (Name, Mobile, Pincode, Gstin, Address, State, City, Rec_Time_Stamp, User_Id) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i)";
                    $q = $db->prepare($sql);
                    $insertservice = $q->execute(array(':a'=>$name,':b'=>$mobile,':c'=>$pincode,':d'=>$gstin,':e'=>$address,':f'=>$state,':g'=>$city,':h'=>$RecTimeStamp,':i'=>$user_id));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Address Inserted Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }
                    $db = null;
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }


    function viewAddress($user_id){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM spark_pickup_address where User_Id = $user_id");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>

                        <tr class="record">
                            <td> <ul>
                <li>
                    <input type='radio' value='<?php echo $row['Address_Id']; ?>' name='radio' id='radio1'/>
                    <label for='radio1'><?php echo $row['Address_Id']; ?> </label>
                </li>
            </ul></td>
                            <td><?php echo $row['Address_Id']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Mobile']; ?></td>
                            <td><?php echo $row['Pincode']; ?></td>
                            <td><?php echo $row['Gstin']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><?php echo $row['State']; ?></td>
                            <td><?php echo $row['City']; ?></td>
                        </tr>
                       
                   
            
            <div class="col-lg-12">
                <div class="modal fade" id="EditModal-<?php echo $row['Class_Id']; ?>" tabindex="<?php echo $row['Class_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Class_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Update Class</h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <div class="modal-body">
                                    <input type="hidden" name="classid" value="<?php echo $row['Class_Id']; ?>">
                                    <div class="form-group">
                                        <label>Course Name</label>
                                        <input type="text" class="form-control" value = "<?php echo $row['Class_Name']; ?>" name = "classname" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Course Details</label>
                                        <textarea id="coursedetails" class="autosize-transition form-control"  name="classdetails"><?php echo $row['Class_Details']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name = "updateclass" > Update</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeleteModal-<?php echo $row['Class_Id']; ?>" tabindex="<?php echo $row['Class_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Class_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <input type="hidden" name="id" value="<?php echo $row['Class_Id']; ?>">
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-danger" name = "DeleteClass" >Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php   
        }
    }

  



   

    function addSingleOrder(){
        if(isset($_POST["submit1"])){
            include('config/dbconnection.php');
            $addressid = trim($_POST['addressid']);
            $user_id = trim($_POST['user_id']);
            $ordertype = trim($_POST['ordertype']);
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $mobile = trim($_POST['mobile']);
            $pin = trim($_POST['pin']);
            $widht = trim($_POST['widht']);
            $height = trim($_POST['height']);
            $lenght = trim($_POST['lenght']);
            $itemname = trim($_POST['itemname']);
            $quantity = trim($_POST['quantity']);
            $invoicevalue = trim($_POST['invoicevalue']);
            $codamount = trim($_POST['codamount']);
            $state = trim($_POST['state']);
            $city = trim($_POST['city']);
            $clientorderid = trim($_POST['clientorderid']);
            $actualweight = trim($_POST['actualweight']);
            $totalamount = trim($_POST['totalamount']);
            
            $RecTimeStamp = Date("Y/m/d H:m:s");
             $result = $db->prepare("SELECT * FROM spark_pickup_address where Address_Id = $addressid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 

            $pickuprname = $row['Name'];
            $pickupmobile = $row['Mobile'];
            $pickupaddress = $row['Address'];
            $pickuppincode = $row['Pincode'];
            $pickupstate = $row['State'];
            $pickupcity = $row['City'];
            



       


            
            $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://dale.staging.shadowfax.in/api/v3/clients/orders/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"order_details\": {
    \"client_order_id\": \"$user_id\",
    \"actual_weight\": \"$actualweight\",
    
    \"product_value\": \"$totalamount\",
    \"payment_mode\": \"$ordertype\",
    \"cod_amount\": \"$codamount\",
    
    \"total_amount\": \"$totalamount\"
  },
  \"customer_details\": {
    \"name\": \"$name\",
    \"contact\": \"$mobile\",
    \"address_line_1\": \"$address\",
    
    \"city\": \"$city\",
    \"state\": \"$state\",
    \"pincode\": \"$pin\"
    
  },
  \"pickup_details\": {
    \"name\": \"$pickuprname\",
    \"contact\": \"$pickupmobile\",
    \"address_line_1\": \"$pickupaddress\",
    \"city\": \"$pickupcity\",
    \"state\": \"$pickupstate\",
    \"pincode\": \"$pickuppincode\"
    
  },
  \"rts_details\": {
    \"name\": \"$name\",
    \"contact\": \"$mobile\",
    \"address_line_1\": \"$address\",
    \"city\": \"$city\",
    \"state\": \"$state\",
    \"pincode\": \"$pin\"
  },
  \"product_details\": [
    {
      \"hsn_code\": \"HJUY890\",
      \"invoice_no\": \"$quantity\",
      \"sku_name\": \"$itemname\",
      \"client_sku_id\": \"MAC789\",
      
      \"price\": \"$invoicevalue\",
      
     
      \"additional_details\": \"$clientorderid\"
      
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9"
));

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response,true);
///Count
                echo '<pre>'; print_r($data); echo '</pre>';
             
             $client_order_id = $data['data']['client_order_id'];
             $awb_number = $data['data']['awb_number'];
             $product_value = $data['data']['product_value'];
             $cod_amount = $data['data']['cod_amount'];
             $payment_mode = $data['data']['payment_mode'];
             $order_date = $data['data']['order_date'];
             $promised_delivery_date = $data['data']['promised_delivery_date'];
             $status_display = $data['data']['status_display'];
             $status = $data['data']['status'];

             $pickupname = $data['data']['pickup_details']['name'];
             $address = trim($_POST['address']);
             $widht = trim($_POST['widht']);
             $height = trim($_POST['height']);
             $lenght = trim($_POST['lenght']);

             $name = $data['data']['delivery_details']['name'];
             $contact = $data['data']['delivery_details']['contact'];
             $address_line_1 = $data['data']['delivery_details']['address_line_1'];
             $city = $data['data']['delivery_details']['city'];
             $state = $data['data']['delivery_details']['state'];
             $deliverypincode = $data['data']['delivery_details']['pincode'];

             $sku_name = $data['data']['product_details']['0']['sku_name'];
             $price = $data['data']['product_details']['0']['price'];
             $invoice_no = $data['data']['product_details']['0']['invoice_no'];
             $additional_details = $data['data']['product_details']['0']['additional_details'];


             $result = $db->prepare("SELECT sum(Amount) FROM spark_wallet where User_Id = $client_order_id ");
                $result->execute();
       
                for($i=0; $row = $result->fetch(); $i++){ 
                $s=$row['sum(Amount)'];
                $result1 = $db->prepare("SELECT sum(Total_Amount) FROM spark_single_order where User_Id = $client_order_id ");
                $result1->execute();

                for($i=0; $row1 = $result1->fetch(); $i++){ 
                $t=$row1['sum(Total_Amount)'];

                $balance = $s - $t;


            if($balance<$product_value)
                {
                    echo "<script>alert('Sorry, Balance is low please recharge your account')</script>";
                }
                else{
                    $sql = "INSERT INTO spark_single_order (Address_Id, User_Id, Awb_Number, Name, Address, Mobile, State, City, Pincode, Item_Name, Quantity, Actual_Weight, Total_Amount, Invoice_Value, Cod_Amount, Rec_Time_Stamp, Clinet_Order_Id, Width, Height, Length, Order_Type) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u)";
                    $qq = $db->prepare($sql);
                    $insertservice = $qq->execute(array(':a'=>$addressid,':b'=>$client_order_id,':c'=>$awb_number,':d'=>$name,':e'=>$address_line_1,':f'=>$contact,':g'=>$state,':h'=>$city,':i'=>$deliverypincode,':j'=>$sku_name,':k'=>$quantity ,':l'=>$actualweight,':m'=>$product_value,':n'=>$price,':o'=>$cod_amount,':p'=>$RecTimeStamp,':q'=>$additional_details,':r'=>$widht,':s'=>$height,':t'=>$lenght,':u'=>$payment_mode));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Order Placed Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }
                    $db = null;
                }
            }
        }
    }
            
       
        }
    }







    function addbulkorder(){
        include('config/dbconnection.php');
        if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
   $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                
                // $name   = $line[0];
                // $email  = $line[1];
                // $phone  = $line[2];
                // $status = $line[3];


                $addressid = trim($_POST['addressid']);
                $user_id = trim($_POST['user_id']);
                $ordertype = $line[0];
                $declearedvalue = $line[1];
                $netpayment = $line[2];
                $poid = $line[3];
                $shippingid = $line[4];
                $ShippingReferenceNo = $line[5];
                $ShipName = $line[6];
                $ShipAddress = $line[7];
                $ShipCity = $line[8];
                $ShipMobileNo = $line[9];
                $MobileNo2 = $line[10];
                $ShipPinCode = $line[11];
                $ShipState = $line[12];
                $ServiceType = $line[13];
                $PhysicalWeight = $line[14];
                $Instructions = $line[15];
                $OctroiMRP = $line[16];
                $ProductInfo = $line[17];
                $RTOAddress = $line[18];
                $RTOPinCode = $line[19];
                $RTOName = $line[20];
                $RTOCity = $line[21];
                $InvoiceNumber = $line[22];
                $SellerName = $line[23];
                $SellerAddress = $line[24];
                $IsSellerRegUnderGST = $line[25];
                $SellerGSTRegNumber = $line[26];
                $SupplyStatePlace = $line[27];
                $EWayBillSrNumber = $line[28];
                $BuyerGSTRegNumber = $line[29];
                $HSNCode = $line[30];
                $TaxableValue = $line[31];
                $CGSTAmount = $line[32];
                $IGSTAmount = $line[33];
                $SellerPincode = $line[34];
                $Discount = $line[35];
                $GSTTaxRateCGSTN = $line[36];
                $GSTTaxRateSGSTN = $line[37];
                $GSTTAXRateIGSTN = $line[38];
                

                
                $RecTimeStamp = Date("Y/m/d H:m:s");
                  $prevQuery = "SELECT * FROM spark_pickup_address WHERE Address_Id = $addressid ";
                $prevResult = $db->query($prevQuery);
            for($i=0; $row = $prevResult->fetch(); $i++){ 

                $pickuprname = $row['Name'];
                $pickupmobile = $row['Mobile'];
                $pickupaddress = $row['Address'];
                $pickuppincode = $row['Pincode'];
                $pickupstate = $row['State'];
                $pickupcity = $row['City'];

                echo $pickuppincode;

                $result = $db->prepare("SELECT sum(Amount) FROM spark_wallet where User_Id = $user_id ");
                $result->execute();
       
                for($i=0; $row = $result->fetch(); $i++){ 
                $s=$row['sum(Amount)'];
                $result1 = $db->prepare("SELECT sum(Total_Amount) FROM spark_single_order where User_Id = $user_id ");
                $result1->execute();

                for($i=0; $row1 = $result1->fetch(); $i++){ 
                $t=$row1['sum(Total_Amount)'];

               

                $balance = $s - $t;


            if($balance<$netpayment)
                {
                    echo "<script>alert('Sorry, Balance is low please recharge your account')</script>";
                }
                else{
                

                $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://dale.staging.shadowfax.in/api/v3/clients/orders/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"order_details\": {
    \"client_order_id\": \"$user_id\",
    \"actual_weight\": \"$PhysicalWeight\",
    \"volumetric_weight\": 100,
    \"product_value\": \"$declearedvalue\",
    \"payment_mode\": \"$ordertype\",
    \"total_amount\": \"$netpayment\"
  },
  \"customer_details\": {
    \"name\": \"$ShipName\",
    \"contact\": \"$ShipMobileNo\",
    \"address_line_1\": \"$ShipAddress\",
    \"city\": \"$ShipCity\",
    \"state\": \"$ShipState\",
    \"pincode\": \"$ShipPinCode\",
    \"alternate_contact\": \"$MobileNo2\"
   
  },
  \"pickup_details\": {
    \"name\": \"$pickuprname\",
    \"contact\": \"$pickupmobile\",
    \"address_line_1\": \"$pickupaddress\",
    \"city\": \"$pickupcity\",
    \"state\": \"$pickupstate\",
    \"pincode\": \"$pickuppincode\"
  },
  \"rts_details\": {
    \"name\": \"$RTOName\",
    \"contact\": \"0987654321\",
    \"address_line_1\": \"$RTOAddress\",
    \"city\": \"$RTOCity\",
    \"pincode\": \"$RTOPinCode\"
  },
  \"product_details\": [
    {
      \"hsn_code\": \"$HSNCode\",
      \"invoice_no\": \"$InvoiceNumber\",
      \"sku_name\": \"$ProductInfo\",
      \"price\": \"$OctroiMRP\",
      \"seller_details\": {
        \"seller_name\": \"$SellerName\",
        \"seller_address\": \"$SellerAddress\",
        \"seller_state\": \"$SupplyStatePlace\",
        \"gstin_number\": \"$SellerGSTRegNumber\"
      },
      \"taxes\": {
        \"cgst\": \"$GSTTaxRateCGSTN\",
        \"sgst\": \"$GSTTaxRateSGSTN\",
        \"igst\": \"$GSTTAXRateIGSTN\",
        \"total_tax\": \"$TaxableValue\"
      },
      \"additional_details\": {
        \"requires_extra_care\": \"False\",
        \"type_extra_care\": \"Dangerous Goods\"
      }
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9"
));

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response,true);
///Count
               
             echo '<pre>'; print_r($data); echo '</pre>';
             $client_order_id = $data['data']['client_order_id'];
             $awb_number = $data['data']['awb_number'];
             $product_value = $data['data']['product_value'];
             $cod_amount = $data['data']['cod_amount'];
             $payment_mode = $data['data']['payment_mode'];
             $order_date = $data['data']['order_date'];
             $promised_delivery_date = $data['data']['promised_delivery_date'];
             $status_display = $data['data']['status_display'];
             $status = $data['data']['status'];

             $pickupname = $data['data']['pickup_details']['name'];
             $addressid = trim($_POST['addressid']);

             $name = $data['data']['delivery_details']['name'];
             $contact = $data['data']['delivery_details']['contact'];
             $address_line_1 = $data['data']['delivery_details']['address_line_1'];
             $city = $data['data']['delivery_details']['city'];
             $state = $data['data']['delivery_details']['state'];
             $deliverypincode = $data['data']['delivery_details']['pincode'];

             $sku_name = $data['data']['product_details']['0']['sku_name'];
             $price = $data['data']['product_details']['0']['price'];
             $invoice_no = $data['data']['product_details']['0']['invoice_no'];
             $additional_details = $data['data']['product_details']['0']['additional_details'];
             $seller_name = $data['data']['product_details']['0']['seller_name'];
             $seller_address = $data['data']['product_details']['0']['seller_address'];
             $seller_state = $data['data']['product_details']['0']['seller_state'];
             $sgst_amount = $data['data']['product_details']['0']['sgst_amount'];
             $cgst_amount = $data['data']['product_details']['0']['cgst_amount'];
             $igst_amount = $data['data']['product_details']['0']['igst_amount'];
                
                 
                    $sql = "INSERT INTO spark_single_order (Address_Id, User_Id, Awb_Number, Name, Address, Mobile, State, City, Pincode, Item_Name, Quantity, Actual_Weight, Total_Amount, Invoice_Value, Cod_Amount, Rec_Time_Stamp, Clinet_Order_Id, Width, Height, Length, Order_Type) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u)";
                    $qq = $db->prepare($sql);
                    $insertservice = $qq->execute(array(':a'=>$addressid,':b'=>$client_order_id,':c'=>$awb_number,':d'=>$name,':e'=>$address_line_1,':f'=>$contact,':g'=>$state,':h'=>$city,':i'=>$deliverypincode,':j'=>$sku_name,':k'=>$seller_name ,':l'=>$cgst_amount,':m'=>$product_value,':n'=>$price,':o'=>$cod_amount,':p'=>$RecTimeStamp,':q'=>$additional_details,':r'=>$seller_address,':s'=>$seller_state,':t'=>$sgst_amount,':u'=>$payment_mode));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Order Placed Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }
                    $db = null;
                }
            }
        }
    }
            }
        }
    }
            
       
        }
    }

   

function checkpincode(){
      if(isset($_POST["submit"])){
        $pincode =$_POST['pincode'];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://dale.staging.shadowfax.in/api/v2/clients/requests/check_serviceable_pickup_pincode?pincode=$pincode");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9"
));

$result = curl_exec($ch);
curl_close($ch);



///Deocde Json
$data = json_decode($result,true);
///Count
             $total=count($data);
             
//You Can Also Make In Table:
             foreach ($data as $key => $value)
              {
                ?>
                <div class="panel-body">
                            <div class="row m-t-10">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <center><h1><?php echo $data['message'];?></h1></center>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <?php
                
           }
       }
          
}

 function misreport(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM spark_single_order");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $addressid = $row['Address_Id'];
            $userid = $row['User_Id'];

            $result1 = $db->prepare("SELECT * FROM spark_pickup_address WHERE Address_Id = $addressid and User_Id = $userid");
            $result1->execute();
            for($i=0; $row1 = $result1->fetch(); $i++){

            ?>
            <tr class="record">
                <td><b>Client Order ID : </b><?php echo $row['Single_Order_Id']; ?></td>
                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
                <td><?php echo $row['Item_Name']; ?><br><b>Quantity : </b><?php echo $row['Quantity']; ?></td>
                
                <td><?php echo $row['Total_Amount']; ?><br><label style="background-color: #ffd647; color: #000;"><?php echo $row['Order_Type']; ?></label></td>
                
                <td><?php echo $row1['Name']; ?><br><?php echo $row1['Mobile']; ?><br><?php echo $row1['Address']; ?><br><?php echo $row1['State']; ?><br><?php echo $row1['City']; ?><br><?php echo $row1['Pincode']; ?></td>
                
                <td><?php echo $row['Name']; ?><br><?php echo $row['Mobile']; ?><br><?php echo $row['Address']; ?><br><?php echo $row['State']; ?><br><?php echo $row['City']; ?><br><?php echo $row['Pincode']; ?></td>
                
             </tr>
            
           
        <?php   
        }
    }
}




 function allorder(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM spark_single_order");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $addressid = $row['Address_Id'];
            $userid = $row['User_Id'];

            $result1 = $db->prepare("SELECT * FROM spark_pickup_address WHERE Address_Id = $addressid and User_Id = $userid");
            $result1->execute();
            for($i=0; $row1 = $result1->fetch(); $i++){

            ?>
            <tr class="record">
                <td><?php echo $row['User_Id']; ?></td>
                <td><?php echo $row['Order_Type']; ?></td>
                <td><?php echo $row1['Name']; ?></td>
                <td><?php echo $row1['Mobile']; ?></td>
                <td><?php echo $row1['Pincode']; ?></td>
                <td><?php echo $row1['Gstin']; ?></td>
                <td><?php echo $row1['Address']; ?></td>
                <td><?php echo $row1['State']; ?></td>
                <td><?php echo $row1['City']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['State']; ?></td>
                <td><?php echo $row['City']; ?></td>
                <td><?php echo $row['Mobile']; ?></td>
                <td><?php echo $row['Pincode']; ?></td>
                <td><?php echo $row['Item_Name']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Actual_Weight']; ?></td>
                <td><?php echo $row['Total_Amount']; ?></td>
                <td><?php echo $row['Invoice_Value']; ?></td>
                <td><?php echo $row['Cod_Amount']; ?></td>
                <td><?php echo $row['Clinet_Order_Id']; ?></td>
                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
                
                
                
            </tr>
            
           
        <?php   
        }
    }
}












 function searchorder(){
        include('config/dbconnection.php');
        $user_id = $_SESSION['userid'];
        $result = $db->prepare("SELECT * FROM spark_single_order WHERE User_Id = $user_id");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $addressid = $row['Address_Id'];
            $userid = $row['User_Id'];

            $result1 = $db->prepare("SELECT * FROM spark_pickup_address WHERE Address_Id = $addressid and User_Id = $userid");
            $result1->execute();
            for($i=0; $row1 = $result1->fetch(); $i++){

            ?>
            <tr class="record">
                <td><?php echo $row['User_Id']; ?></td>
                <td><?php echo $row['Order_Type']; ?></td> 
                <td><?php echo $row['Awb_Number']; ?></td> 
                <td><?php echo $row1['Name']; ?></td>
                <td><?php echo $row1['Mobile']; ?></td>
                <td><?php echo $row1['Pincode']; ?></td>
                <td><?php echo $row1['Gstin']; ?></td>
                <td><?php echo $row1['Address']; ?></td>
                <td><?php echo $row1['State']; ?></td>
                <td><?php echo $row1['City']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['State']; ?></td>
                <td><?php echo $row['City']; ?></td>
                <td><?php echo $row['Mobile']; ?></td>
                <td><?php echo $row['Pincode']; ?></td>
                <td><?php echo $row['Item_Name']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Actual_Weight']; ?></td>
                <td><?php echo $row['Total_Amount']; ?></td>
                <td><?php echo $row['Invoice_Value']; ?></td>
                <td><?php echo $row['Cod_Amount']; ?></td>
                <td><?php echo $row['Clinet_Order_Id']; ?></td>
                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
                
                
                
            </tr>
            
           
        <?php   
        }
    }
}




    function allclient(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_user ORDER BY User_Id");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            

            ?>
            <tr class="record">
                <td><?php echo $row['User_Id']; ?></td>
                <td><?php echo $row['Company_Name']; ?></td>
                <td><?php echo $row['Reg_Mobile']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td>
                            <!-- <a href="viewStudent.php?userid=<?php echo $row['User_Id']; ?>" title="View" class="btn btn-default btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="editStudent.php?userid=<?php echo $row['User_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a> -->
                            <button class="btn btn-danger btn-sm" data-toggle="modal" title="Delete" data-target="#DeleteModal-<?php echo $row['User_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['User_Id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i>  </button>    
                            <?php
                                }
                                else
                                {
                            ?>
                            <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['User_Id']; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i>  </button>
                            <?php
                                } 
                            ?>
                            <!--Make Payment Link-->
                            
                        </td>
                         <div class="modal fade" id="DeactiveModal-<?php echo $row['User_Id']; ?>" tabindex="<?php echo $row['User_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['User_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <?php 
                                            if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to deactivate this Member? </h4>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to Activate this Member? </h4> 
                                        <?php   
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['User_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "DeactivateUser" >Deactivate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['User_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "ActivateUser" >Activate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form> 
                                        <?php   
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                        </div>
                
                
                
            </tr>
            
           
        <?php   
        
    }
}

 function DeactivateUser()
    {
        if(isset($_POST["DeactivateUser"])){
            include('config/dbconnection.php');
            $studentid = $_POST['id'];
            
            
            try {
                $sql = "UPDATE asitfa_user SET Active = :a WHERE User_Id = '$studentid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>0,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('User Deactivated Successfully');</script>";
                }
                else{
                    echo "<script type= 'text/javascript'>alert('Data not successfully Updated.');</script>";
                }
                $db = null;
                
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    function DeleteUser()
    {
        if(isset($_POST["DeleteStudent"])){
            include('config/dbconnection.php');
            $id = $_POST['id'];
            try {

                $dbmember = "DELETE FROM asitfa_user WHERE User_Id = ?";
                $q = $db->prepare($dbmember);
                $response = $q->execute(array($id));  
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    // Start Activate Member
    function ActivateUser()
    {
        if(isset($_POST["ActivateUser"])){
            include('config/dbconnection.php');
            $studentid = $_POST['id'];
            
            
            try {
                $sql = "UPDATE asitfa_user SET Active = :a WHERE User_Id = '$studentid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>1,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('User Activated Successfully');</script>";
                }
                else{
                    echo "<script type= 'text/javascript'>alert('Data not successfully Updated.');</script>";
                }
                $db = null;
                
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }




}

