<?php
include "../Layout_Header_Folder.php";
error_reporting(1);
include("../config/dbcon.php");
extract($_REQUEST);





$destinationcity = trim($destinationcity);
// echo "<br>";
$origincity = trim($origincity);
// echo "<br>";


echo $zonecheckquery = "SELECT * FROM `zone_citywise` WHERE `pickup_city`='$origincity' AND `destination_city`='$destinationcity'";
$zonedata = mysqli_query($conn,$zonecheckquery);
$zoneresult = mysqli_fetch_assoc($zonedata);
// echo "<br><br>";
// print_r($zoneresult);
echo "<br><br>";
echo $zoneis = $zoneresult['zone_category'];
echo "<br>";


// $pickuppincheck = 110091;
// $destinpincheck = 110001;


/*
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://track.delhivery.com/api/kinko/v1/invoice/charges/.json?md=S&cgm=$weightproduct&o_pin=$pickuppincheck&ss=Delivered&d_pin=$destinpincheck&pt=COD",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'accept: application/json',
    'authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
    'content: application/json'
  ),
));

$response = curl_exec($curl);
$response1 = json_decode($response, true);
curl_close($curl);

$rtmsg = $response1[0]['total_amount'];

$prepaidestimateamt = $rtmsg;
$codestimateamt = $rtmsg + 30;

// if($paymenttype == "COD"){
//     $estimateamt = $rtmsg + 30;
// }else{
//     $estimateamt = $rtmsg;
// }
// echo "<pre>";
// print_r($response1);
// echo "</pre>";
*/

?>

<!-- <div class="row">
    <div class="col-md-8"> 
        <div class="col-md-12"> 
            <div class="col-md-8"> 
                <h5 class="signuptxt"><b>COD Estimate Amount</b></h5>
            </div>
            <div class="col-md-4">
                <h5 class="signuptxt"><b><i class="fa fa-inr" aria-hidden="true"></i><?= $codestimateamt ?></b></h5>
            </div>
        </div>
        <div class="col-md-12"> 
            <div class="col-md-8"> 
                <h5 class="signuptxt"><b>Prepaid Estimate Amount</b></h5>
            </div>
            <div class="col-md-4">
                <h5 class="signuptxt"><b><i class="fa fa-inr" aria-hidden="true"></i><?= $prepaidestimateamt ?></b></h5>
            </div>
        </div>
    </div>
    <div class="col-md-4"> 
        <span><b> Zone : <?= $zoneis ?> </b></span>
        <br><?= $user_id ?>
        <br>

    </div>
</div>
<hr> -->


<?php

    $zonerate = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
    $zonerater = mysqli_query($conn,$zonerate);
    $zoneres = mysqli_fetch_assoc($zonerater);
    // echo "<br>";
    // print_r($zoneres);

if($zoneres['commercialstype'] == "gm500"){
// 500Gm
    if($zoneis == "A"){
        $minimumchrg = $zoneres['Min_a'];
        $additinalchrg = $zoneres['Add_a'];
        $rtochrg = $zoneres['Rto_a'];
    }elseif($zoneis == "B"){
        $minimumchrg = $zoneres['Min_b'];
        $additinalchrg = $zoneres['Add_b'];
        $rtochrg = $zoneres['Rto_b'];
    }elseif($zoneis == "C"){
        $minimumchrg = $zoneres['Min_c'];
        $additinalchrg = $zoneres['Add_c'];
        $rtochrg = $zoneres['Rto_c'];
    }elseif($zoneis == "D"){
        $minimumchrg = $zoneres['Min_d'];
        $additinalchrg = $zoneres['Add_d'];
        $rtochrg = $zoneres['Rto_d'];
    }elseif($zoneis == "E"){
        $minimumchrg = $zoneres['Min_e'];
        $additinalchrg = $zoneres['Add_e'];
        $rtochrg = $zoneres['Rto_e'];
    }
    $fuelchrg = $zoneres['FSC'];
    $codchrg = $zoneres['COD'];
    $shiplibilitychrg = $zoneres['Shipment_Lia'];
    $gstchrg = $zoneres['GST'];
    $notechrg = $zoneres['specialnotes'];
// 500Gm
}elseif($zoneres['commercialstype'] == "kg1"){
// 1 KG
    if($zoneis == "A"){
        $minimumchrg = $zoneres['Min1_a'];
        $additinalchrg = $zoneres['Add1_a'];
        $rtochrg = $zoneres['Rto1_a'];
    }elseif($zoneis == "B"){
        $minimumchrg = $zoneres['Min1_b'];
        $additinalchrg = $zoneres['Add1_b'];
        $rtochrg = $zoneres['Rto1_b'];
    }elseif($zoneis == "C"){
        $minimumchrg = $zoneres['Min1_c'];
        $additinalchrg = $zoneres['Add1_c'];
        $rtochrg = $zoneres['Rto1_c'];
    }elseif($zoneis == "D"){
        $minimumchrg = $zoneres['Min1_d'];
        $additinalchrg = $zoneres['Add1_d'];
        $rtochrg = $zoneres['Rto1_d'];
    }elseif($zoneis == "E"){
        $minimumchrg = $zoneres['Min1_e'];
        $additinalchrg = $zoneres['Add1_e'];
        $rtochrg = $zoneres['Rto1_e'];
    }
    $fuelchrg = $zoneres['FSC1'];
    $codchrg = $zoneres['COD1'];
    $shiplibilitychrg = $zoneres['Shipment_Lia1'];
    $gstchrg = $zoneres['GST1'];
    $notechrg = $zoneres['specialnotes1'];
// 1 KG
}elseif($zoneres['commercialstype'] == "kg2"){
// 2 KG
    if($zoneis == "A"){
        $minimumchrg = $zoneres['Min2_a'];
        $additinalchrg = $zoneres['Add2_a'];
        $rtochrg = $zoneres['Rto2_a'];
    }elseif($zoneis == "B"){
        $minimumchrg = $zoneres['Min2_b'];
        $additinalchrg = $zoneres['Add2_b'];
        $rtochrg = $zoneres['Rto2_b'];
    }elseif($zoneis == "C"){
        $minimumchrg = $zoneres['Min2_c'];
        $additinalchrg = $zoneres['Add2_c'];
        $rtochrg = $zoneres['Rto2_c'];
    }elseif($zoneis == "D"){
        $minimumchrg = $zoneres['Min2_d'];
        $additinalchrg = $zoneres['Add2_d'];
        $rtochrg = $zoneres['Rto2_d'];
    }elseif($zoneis == "E"){
        $minimumchrg = $zoneres['Min2_e'];
        $additinalchrg = $zoneres['Add2_e'];
        $rtochrg = $zoneres['Rto2_e'];
    }
    $fuelchrg = $zoneres['FSC2'];
    $codchrg = $zoneres['COD2'];
    $shiplibilitychrg = $zoneres['Shipment_Lia2'];
    $gstchrg = $zoneres['GST2'];
    $notechrg = $zoneres['specialnotes2'];
// 2 KG
}elseif($zoneres['commercialstype'] == "kg5"){
// 5 KG
    if($zoneis == "A"){
        $minimumchrg = $zoneres['Min5_a'];
        $additinalchrg = $zoneres['Add5_a'];
        $rtochrg = $zoneres['Rto5_a'];
    }elseif($zoneis == "B"){
        $minimumchrg = $zoneres['Min5_b'];
        $additinalchrg = $zoneres['Add5_b'];
        $rtochrg = $zoneres['Rto5_b'];
    }elseif($zoneis == "C"){
        $minimumchrg = $zoneres['Min5_c'];
        $additinalchrg = $zoneres['Add5_c'];
        $rtochrg = $zoneres['Rto5_c'];
    }elseif($zoneis == "D"){
        $minimumchrg = $zoneres['Min5_d'];
        $additinalchrg = $zoneres['Add5_d'];
        $rtochrg = $zoneres['Rto5_d'];
    }elseif($zoneis == "E"){
        $minimumchrg = $zoneres['Min5_e'];
        $additinalchrg = $zoneres['Add5_e'];
        $rtochrg = $zoneres['Rto5_e'];
    }
    $fuelchrg = $zoneres['FSC5'];
    $codchrg = $zoneres['COD5'];
    $shiplibilitychrg = $zoneres['Shipment_Lia5'];
    $gstchrg = $zoneres['GST5'];
    $notechrg = $zoneres['specialnotes5'];
// 5 KG
}elseif($zoneres['commercialstype'] == "kg10"){
// 10 KG
    if($zoneis == "A"){
        $minimumchrg = $zoneres['Min10_a'];
        $additinalchrg = $zoneres['Add10_a'];
        $rtochrg = $zoneres['Rto10_a'];
    }elseif($zoneis == "B"){
        $minimumchrg = $zoneres['Min10_b'];
        $additinalchrg = $zoneres['Add10_b'];
        $rtochrg = $zoneres['Rto10_b'];
    }elseif($zoneis == "C"){
        $minimumchrg = $zoneres['Min10_c'];
        $additinalchrg = $zoneres['Add10_c'];
        $rtochrg = $zoneres['Rto10_c'];
    }elseif($zoneis == "D"){
        $minimumchrg = $zoneres['Min10_d'];
        $additinalchrg = $zoneres['Add10_d'];
        $rtochrg = $zoneres['Rto10_d'];
    }elseif($zoneis == "E"){
        $minimumchrg = $zoneres['Min10_e'];
        $additinalchrg = $zoneres['Add10_e'];
        $rtochrg = $zoneres['Rto10_e'];
    }
    $fuelchrg = $zoneres['FSC10'];
    $codchrg = $zoneres['COD10'];
    $shiplibilitychrg = $zoneres['Shipment_Lia10'];
    $gstchrg = $zoneres['GST10'];
    $notechrg = $zoneres['specialnotes10'];
// 10 KG
}


/*
echo "<br>";
echo "<br>Min Charge : ";
echo $minimumchrg;
echo "<br>Additional Charge : ";
echo $additinalchrg;
echo "<br>RTO Charge : ";
echo $rtochrg;
echo "<br>Fuel Charge : ";
echo $fuelchrg;
echo "<br>COD Charge : ";
echo $codchrg;
echo "<br>Shipment Charge : ";
echo $shiplibilitychrg;
echo "<br>GST Charge / Percentage : ";
echo $gstchrg;
echo " / ";
echo $gstprct = $gstchrg / 100;
echo "<br>Notes : ";
echo $notechrg;
echo "<br><br>";
*/


$gmparts = $weightproduct / 500;
// echo "<br>";
$roundnoofgm = (ceil($gmparts));
// echo "<br>";


// Product Amt
$codamtisa = $codamtis;
// Product Amt

$minimumchrg;
$additinalchrg;
$rtochrg;
$fuelchrg;
$codchrg;
$shiplibilitychrg;
$gstchrg;
$gstprct = $gstchrg / 100;
$notechrg;

if($paymenttype == "Prepaid"){    $codchrg = 0;     }


$gmparts = $weightproduct / 500;
// echo "<br>";
$roundnoofgm = (ceil($gmparts));
$remainnoofgm = $roundnoofgm - 1;
$morecharges = $additinalchrg * $remainnoofgm;

$totalcharges = $minimumchrg + $morecharges + $fuelchrg + $codchrg + $shiplibilitychrg;
// echo "<br>";
// echo "Total Charge Without GST Amount : ".$totalcharges;
// echo "<br>";
$gstchrgamt = $totalcharges * $gstprct;
// echo " GST Amount ".$gstchrgamt = $totalcharges * $gstprct;
// echo "<br>";
$tamtwithgst = $totalcharges + $gstchrgamt + $codamtisa;
// echo "Total Charge With GST Amount : ".$tamtwithgst;

// $estimatedetails = array('pickuppin'=>,);

$estimatedetails = array('pickuppin'=>$pickuppincheck,'pickupstate'=>$origincity,'destinpin'=>$destinpincheck,'destinstate'=>$destinationcity,'zone'=>$zoneis,'actualweight'=>$weightselectisa,'vollength'=>$vlengthis,'volbreadth'=>$vbreadthis,'volheight'=>$vheightis,'volumentriweight'=>$volweightproductgma,'prodcategroy'=>$productcategoryis,'prodamt'=>$codamtisa,'mode'=>$paymenttype,'estimateamt'=>$tamtwithgst);

if(!empty($zoneis)){
    $_SESSION['estimatedetails'] = $estimatedetails;
}
?>



<?php   
if(!empty($zoneis)){
?>

<div class="row">
    <div class="col-md-8"> 
        <div class="col-md-12"> 
            <div class="col-md-8"> 
                <h5 class="signuptxt"><b>Estimate Amount</b></h5>
            </div>
            <div class="col-md-4">
                <h5 class="signuptxt"><b>
                    <i class="fa fa-inr" aria-hidden="true"></i> <?= $tamtwithgst ?> /-
                </b></h5>
            </div>
        </div>
    </div>
    <div class="col-md-4"> 
        <?php 
            // print_r($estimatedetails);
         ?>
    <!--     <span><b> Zone : <?= $zoneis ?> </b></span>
        <br><?= $user_id ?>
        <br> -->
    </div>
</div>

<?php   
}else{
?>
    not
<?php
}
?>



<?php
/*
echo "<br>";
echo $zoneres['Min_a']; 
echo "<br>";
echo $zoneres['Min_b']; 
echo "<br>";
echo $zoneres['Min_c']; 
echo "<br>";
echo $zoneres['Min_d']; 
echo "<br>";
echo $zoneres['Min_e']; 
echo "<br>";
echo $zoneres['Add_a']; 
echo "<br>";
echo $zoneres['Add_b']; 
echo "<br>";
echo $zoneres['Add_c']; 
echo "<br>";
echo $zoneres['Add_d']; 
echo "<br>";
echo $zoneres['Add_e']; 
echo "<br>";
echo $zoneres['Rto_a']; 
echo "<br>";
echo $zoneres['Rto_b']; 
echo "<br>";
echo $zoneres['Rto_c']; 
echo "<br>";
echo $zoneres['Rto_d']; 
echo "<br>";
echo $zoneres['Rto_e']; 
echo "<br>";
echo $zoneres['FSC']; 
echo "<br>";
echo $zoneres['COD']; 
echo "<br>";
echo $zoneres['Shipment_Lia']; 
echo "<br>";
echo $zoneres['GST']; 
echo "<br>";
echo $zoneres['specialnotes']; 
*/


/*
// 500Gm
echo $zoneres['Min_a']; 
echo $zoneres['Add_a']; 
echo $zoneres['Rto_a']; 

echo $zoneres['Min_b']; 
echo $zoneres['Add_b']; 
echo $zoneres['Rto_b']; 

echo $zoneres['Min_c']; 
echo $zoneres['Add_c']; 
echo $zoneres['Rto_c']; 

echo $zoneres['Min_d']; 
echo $zoneres['Add_d']; 
echo $zoneres['Rto_d']; 

echo $zoneres['Min_e']; 
echo $zoneres['Add_e']; 
echo $zoneres['Rto_e']; 

echo $zoneres['FSC']; 
echo $zoneres['COD']; 
echo $zoneres['Shipment_Lia']; 
echo $zoneres['GST']; 
echo $zoneres['specialnotes']; 
*/

/*
// 1kg
echo $zoneres['Min1_a']; 
echo $zoneres['Add1_a']; 
echo $zoneres['Rto1_a']; 

echo $zoneres['Min1_b']; 
echo $zoneres['Add1_b']; 
echo $zoneres['Rto1_b']; 

echo $zoneres['Min1_c']; 
echo $zoneres['Add1_c']; 
echo $zoneres['Rto1_c']; 

echo $zoneres['Min1_d']; 
echo $zoneres['Add1_d']; 
echo $zoneres['Rto1_d']; 

echo $zoneres['Min1_e']; 
echo $zoneres['Add1_e']; 
echo $zoneres['Rto1_e']; 



echo $zoneres['FSC1']; 
echo $zoneres['COD1']; 
echo $zoneres['Shipment_Lia1']; 
echo $zoneres['GST1']; 
echo $zoneres['specialnotes1']; 
*/

/*
// 2KG
echo $zoneres['Min2_a']; 
echo $zoneres['Add2_a']; 
echo $zoneres['Rto2_a']; 

echo $zoneres['Min2_b']; 
echo $zoneres['Add2_b']; 
echo $zoneres['Rto2_b']; 

echo $zoneres['Min2_c']; 
echo $zoneres['Add2_c']; 
echo $zoneres['Rto2_c']; 

echo $zoneres['Min2_d']; 
echo $zoneres['Add2_d']; 
echo $zoneres['Rto2_d']; 

echo $zoneres['Min2_e']; 
echo $zoneres['Add2_e']; 
echo $zoneres['Rto2_e']; 

echo $zoneres['FSC2']; 
echo $zoneres['COD2']; 
echo $zoneres['Shipment_Lia2']; 
echo $zoneres['GST2']; 
echo $zoneres['specialnotes2']; 
*/

/*
// 5KG
echo $zoneres['Min5_a']; 
echo $zoneres['Add5_a']; 
echo $zoneres['Rto5_a']; 

echo $zoneres['Min5_b']; 
echo $zoneres['Add5_b']; 
echo $zoneres['Rto5_b']; 

echo $zoneres['Min5_c']; 
echo $zoneres['Add5_c']; 
echo $zoneres['Rto5_c']; 

echo $zoneres['Min5_d']; 
echo $zoneres['Add5_d']; 
echo $zoneres['Rto5_d']; 

echo $zoneres['Min5_e']; 
echo $zoneres['Add5_e']; 
echo $zoneres['Rto5_e']; 

echo $zoneres['FSC5']; 
echo $zoneres['COD5']; 
echo $zoneres['Shipment_Lia5']; 
echo $zoneres['GST5']; 
echo $zoneres['specialnotes5']; 
*/

/*
// 10 KG
echo $zoneres['Min10_a']; 
echo $zoneres['Add10_a']; 
echo $zoneres['Rto10_a']; 

echo $zoneres['Min10_b']; 
echo $zoneres['Add10_b']; 
echo $zoneres['Rto10_b']; 

echo $zoneres['Min10_c']; 
echo $zoneres['Add10_c']; 
echo $zoneres['Rto10_c']; 

echo $zoneres['Min10_d']; 
echo $zoneres['Add10_d']; 
echo $zoneres['Rto10_d']; 

echo $zoneres['Min10_e']; 
echo $zoneres['Add10_e']; 
echo $zoneres['Rto10_e']; 

echo $zoneres['FSC10']; 
echo $zoneres['COD10']; 
echo $zoneres['Shipment_Lia10']; 
echo $zoneres['GST10']; 
echo $zoneres['specialnotes10']; 
*/


/*
`Min_a`, `Min_b`, `Min_c`, `Min_d`, `Min_e`, `Add_a`, `Add_b`, `Add_c`, `Add_d`, `Add_e`, 
`Rto_a`, `Rto_b`, `Rto_c`, `Rto_d`, `Rto_e`, `FSC`, `COD`, `Shipment_Lia`, `GST`, `specialnotes`, 

`min1_a`, `min1_b`, `min1_c`, `min1_d`, `min1_e`, `add1_a`, `add1_b`, `add1_c`, `add1_d`, `add1_e`, 
`Rto1_a`, `Rto1_b`, `Rto1_c`, `Rto1_d`, `Rto1_e`, `FSC1`, `COD1`, `Shipment_Lia1`, `GST1`, `specialnotes1`, 

`min2_a`, `min2_b`, `min2_c`, `min2_d`, `min2_e`, `add2_a`, `add2_b`, `add2_c`, `add2_d`, `add2_e`, 
`Rto2_a`, `Rto2_b`, `Rto2_c`, `Rto2_d`, `Rto2_e`, `FSC2`, `COD2`, `Shipment_Lia2`, `GST2`, `specialnotes2`, 

`min5_a`, `min5_b`, `min5_c`, `min5_d`, `min5_e`, `add5_a`, `add5_b`, `add5_c`, `add5_d`, `add5_e`, 
`Rto5_a`, `Rto5_b`, `Rto5_c`, `Rto5_d`, `Rto5_e`, `FSC5`, `COD5`, `Shipment_Lia5`, `GST5`, `specialnotes5`, 

`min10_a`, `min10_b`, `min10_c`, `min10_d`, `min10_e`, `add10_a`, `add10_b`, `add10_c`, `add10_d`, `add10_e`, 
`Rto10_a`, `Rto10_b`, `Rto10_c`, `Rto10_d`, `Rto10_e`, `FSC10`, `COD10`, `Shipment_Lia10`, `GST10`, `specialnotes10`, 
*/

?>
