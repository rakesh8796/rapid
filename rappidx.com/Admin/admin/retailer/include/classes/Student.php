<?php class Student {
    
   

    function addClient(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $companyname = trim($_POST['companyname']);
            $website = trim($_POST['website']);
            $brand = trim($_POST['brand']);
            $Email = trim($_POST['Email']);
            $pan = trim($_POST['pan']);
            $tan = trim($_POST['tan']);
            $gstno = trim($_POST['gstno']);
            $regaddress = trim($_POST['regaddress']);
            $regcity = trim($_POST['regcity']);
            $regpin = trim($_POST['regpin']);
            $regmobile = trim($_POST['regmobile']);
            $reglandline = trim($_POST['reglandline']);
            $comaddress = trim($_POST['comaddress']);
            $comcity = trim($_POST['comcity']);
            $compin = trim($_POST['compin']);
            $commobile = trim($_POST['commobile']);
            $comlandline = trim($_POST['comlandline']);
            $bankname = trim($_POST['bankname']);
            $bankacc = trim($_POST['bankacc']);
            $branch = trim($_POST['branch']);
            $ifsc = trim($_POST['ifsc']);
            $acctype = trim($_POST['acctype']);
            $product = trim($_POST['product']);
            $service = trim($_POST['service']);
            $pickup = trim($_POST['pickup']);
            $codrem = trim($_POST['codrem']);
            $billingtype = trim($_POST['billingtype']);
            $billingcycle = trim($_POST['billingcycle']);
            $min_a = trim($_POST['min_a']);
            $min_b = trim($_POST['min_b']);
            $min_c = trim($_POST['min_c']);
            $min_d = trim($_POST['min_d']);
            $min_e = trim($_POST['min_e']);
            $add_a = trim($_POST['add_a']);
            $add_b = trim($_POST['add_b']);
            $add_c = trim($_POST['add_c']);
            $add_d = trim($_POST['add_d']);
            $add_e = trim($_POST['add_e']);
            $rto_a = trim($_POST['rto_a']);
            $rto_b = trim($_POST['rto_b']);
            $rto_c = trim($_POST['rto_c']);
            $rto_d = trim($_POST['rto_d']);
            $rto_e = trim($_POST['rto_e']);
            $fsc = trim($_POST['fsc']);
            $cod = trim($_POST['cod']);
            $shipmentlia = trim($_POST['shipmentlia']);
            $gst = trim($_POST['gst']);
            $clientid = trim($_POST['clientid']);
            $clientid1 =  trim($clientid)."@rappidx.com";
            $password = md5(trim($_POST['password']));
            $clientauth = trim($_POST['clientauth']);
            $designation = trim($_POST['designation']);
            $clientemail = trim($_POST['clientemail']);
            $clientmobile = trim($_POST['clientmobile']);
            $clientpoc = trim($_POST['clientpoc']);
            $pocdesignation = trim($_POST['pocdesignation']);
            $pocemail = trim($_POST['pocemail']);
            $pocmobile = trim($_POST['pocmobile']);
            $operationpoc = trim($_POST['operationpoc']);
            $operationdesignation = trim($_POST['operationdesignation']);
            $operationemail = trim($_POST['operationemail']);
            $operationmobile = trim($_POST['operationmobile']);
            $bdname = trim($_POST['bdname']);

            $bddesignation = trim($_POST['bddesignation']);
            $bdemail = trim($_POST['bdemail']);
            $bdmobile = trim($_POST['bdmobile']);
            $uploadimage = trim($_POST['uploadimage']);
            $gstcert = trim($_POST['gstcert']);
            $cancheque = trim($_POST['cancheque']);
            $addproofe = trim($_POST['addproofe']);
            $clientmailacc = trim($_POST['clientmailacc']);

            $RecTimeStamp = Date("Y/m/d H:m:s");

            try {

                $dbservice = $db->query("SELECT * FROM asitfa_user WHERE User_Email = '$clientid1'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Email_Id is already exist')</script>";
                }
                else{
                    $sql = "INSERT INTO asitfa_user (Company_Name, Website, Brand, Email, Pan, Tan, GST_No, Reg_Address, Reg_City, Reg_Pin, Reg_Mobile, Reg_Landline, Com_Address, Com_City, Com_Pin, Com_Mobile, Com_Landline, Bankname, Bankaccount, Branch, IFSC, Acc_Type, Product, Service, Pickup, Cod_Rem, Billing_Type, Billing_Cycle, Min_a, Min_b, Min_c, Min_d, Min_e, Add_a, Add_b, Add_c, Add_d, Add_e, Rto_a, Rto_b, Rto_c, Rto_d, Rto_e, FSC, COD, Shipment_Lia, GST, User_Email, User_Password, Client_Auth, Designation, Client_Email, Client_Mobile, Client_poc, Poc_Designation, Poc_Email, Poc_Mobile, Operation_Poc, Operation_Designation, Operation_Mail, Operation_Mobile, Bd_Name, Bd_Designation, Bd_mail, Bd_Mobile, Pancard, GST_cert, Can_Cheque, Add_Proofe, Client_Mail_acc, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u,:v,:w,:x,:y,:z,:aa,:ab,:ac,:ad,:ae,:af,:ag,:ah,:ai,:aj,:ak,:al,:am,:an,:ao,:ap,:aq,:ar,:aas,:at,:au,:av,:aw,:ax,:ay,:az,:ba,:bb,:bc,:bd,:be,:bf,:bg,:bh,:bi,:bj,:bk,:bl,:bm,:bn,:bo,:bp,:bq,:br,:bs)";
                    $zz = $db->prepare($sql);
                    $insertservice = $zz->execute(array(':a'=>$companyname,':b'=>$website,':c'=>$brand,':d'=>$Email,':e'=>$pan,':f'=>$tan,':g'=>$gstno,':h'=>$regaddress,':i'=>$regcity,':j'=>$regpin,':k'=>$regmobile,':l'=>$reglandline,':m'=>$comaddress,':n'=>$comcity,':o'=>$compin,':p'=>$commobile,':q'=>$comlandline,':r'=>$bankname,':s'=>$bankacc,':t'=>$branch,':u'=>$ifsc,':v'=>$acctype,':w'=>$product,':x'=>$service,':y'=>$pickup,':z'=>$codrem,':aa'=>$billingtype,':ab'=>$billingcycle,':ac'=>$min_a,':ad'=>$min_b,':ae'=>$min_c,':af'=>$min_d,':ag'=>$min_e,':ah'=>$add_a,':ai'=>$add_b,':aj'=>$add_c,':ak'=>$add_d,':al'=>$add_e,':am'=>$rto_a,':an'=>$rto_b,':ao'=>$rto_c,':ap'=>$rto_d,':aq'=>$rto_e,':ar'=>$fsc,':aas'=>$cod,':at'=>$shipmentlia,':au'=>$gst,':av'=>$clientid1,':aw'=>$password,':ax'=>$clientauth,':ay'=>$designation,':az'=>$clientemail,':ba'=>$clientmobile,':bb'=>$clientpoc,':bc'=>$pocdesignation,':bd'=>$pocemail,':be'=>$pocmobile,':bf'=>$operationpoc,':bg'=>$operationdesignation,':bh'=>$operationemail,':bi'=>$operationmobile,':bj'=>$bdname,':bk'=>$bddesignation,':bl'=>$bdemail,':bm'=>$bdmobile,':bn'=>$uploadimage,':bo'=>$gstcert,':bp'=>$cancheque,':bq'=>$addproofe,':br'=>$clientmailacc,':bs'=>$RecTimeStamp,));

                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Client Inserted Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }

                    $db = null;
                }
            }
            catch(PDOException $za)
            {
                echo $za->getMessage();
            }
        }
    }
    

}