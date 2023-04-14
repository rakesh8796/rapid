<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    // echo $param;
?>

<hr style="border-bottom:2px solid gold">
<?php

    // $param = "A";
    // $freightWeightare = 10;
    
    // param:zone
    // paymode:paymode
    // prodamt:prodamt
    // freightWeightare:freightWeightare
    
    
    if(empty($param)){
      echo "<center>Please enter valid pincodes</center>";
      exit();
    }
    
    
    
    
    
    // // Main Courier Permissions
    // $courirpermissions = "SELECT * FROM `retailer-rate-list-couriers-permissions` WHERE `status`='1'";
    // $courirpermission=mysqli_query($conn,$courirpermissions);
    // while($courirpermissi = mysqli_fetch_assoc($courirpermission)){
    // // Main Courier Permissions
    // $courirpermissids = $courirpermissi['courier_id'];
    
    
    // Main Courier Permissions
    $courirpermissions = "SELECT * FROM `retailer-rate-list-couriers` WHERE `status`='1'";
    // echo "<br>";
    $courirpermission=mysqli_query($conn,$courirpermissions);
    while($courirpermissi = mysqli_fetch_assoc($courirpermission)){
    // Main Courier Permissions
    
    // echo "Courier Name : ";
    $courirpermissionname = $courirpermissi['Courier'];
    
    
    $courirpermiss = "SELECT * FROM `retailer-rate-list-couriers-permissions` WHERE `Courier`='$courirpermissionname' AND `status`='1'";
    // echo "<br>";
    $courirpermis=mysqli_query($conn,$courirpermiss);
    // $courirpermi = mysqli_fetch_assoc($courirpermis);
    while($courirpermi = mysqli_fetch_assoc($courirpermis)){
    
        // echo "<br> CID - ";
        $courirpermissids = $courirpermi['courier_id'];
        // echo " : Up-Weight - ";
        $couriersweight = $courirpermi['upto_weight'];
        // echo " ****  ";
        if($freightWeightare <= $couriersweight){
            // echo 'if';
            break;
        }else{
            // echo 'else';
        }
        // // if main show
    
    
    }
    
    
    // echo "<br> * - * - * - * - ";
    // echo "<br> CID - ";
    // echo $courirpermissids;
    // echo " : Up-Weight - ";
    // echo $couriersweight;
    
        if($freightWeightare>50){
            echo "<center>
                    <h4 style='color:red;font-size'>Invalid Weight <br> Please use product weight below 50KG</h4>
                <center>";
            exit();
        }
    
    
    if($param=="A"){
        $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `A` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
    }elseif($param=="B"){
        $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `B` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
    }elseif($param=="C"){
        $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `C` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
    }elseif($param=="D"){
        $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `D` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
    }elseif($param=="E"){
        $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `E` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
    }elseif($param=="F"){
        $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `F` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
    }
    
    // echo "<br>";
    // echo $singleproquery;
    // echo "<br>_________<br>";
    
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    if(empty(mysqli_num_rows($singleproqueryr))){
      echo "<center>Not In Service</center>";
    }
    $modelid = 0;
?>






<?php
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
    $newcodchange = 0;
    $newtotalamt = 0;
    
    // param:zone
    // paymode:paymode
    // prodamt:prodamt
    // freightWeightare:freightWeightare
    // agentfee:agentfee
    
    
    
    
    
    $courierschage = $row['Zone'];
    $codpercent = $row['COD%'];
    $codstandartdcharge = $row['COD'];
    $codaccordingtocodamt = ($prodamt * $codpercent)/100;
    
    $newcodchange = $codstandartdcharge;
    if($codstandartdcharge<$codaccordingtocodamt){
        $newcodchange = $codaccordingtocodamt;
    }
    
    if($paymode=="Prepaid"){
        $newcodchange = 0;    
    }
    
    $newtotalamt = $courierschage+$newcodchange;
    
    // if main show
    // if($row['weight_type']=="additional"){
    //     continue;
    // }
    // if main show
    
    $addionalweightadd = 0;
    $additionalweightcalci = 0;
    // echo "<br>Wt Cate : ";
    $crtwiht = $row['upto_weight'];
    // echo "<br>Frt Wt : ";
    $freightWeightare;
    // echo "<br>";
    // Additional Charges
    if($freightWeightare>$crtwiht){
    
        // echo "<br> Calculated : ";
        $additionalweightcalci = ceil($freightWeightare/$crtwiht);
        $additionalweightcalci = $additionalweightcalci-1;
    // echo "<br>";
    
        $parentidno = $row['id'];
        if($param=="A"){
            $addtionalcharge ="SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `A` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
        }elseif($param=="B"){
            $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `B` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
        }elseif($param=="C"){
            $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `C` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
        }elseif($param=="D"){
            $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `D` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
        }elseif($param=="E"){
            $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `E` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
        }elseif($param=="F"){
            $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `F` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
        }
    
    
        $addtionalcharg=mysqli_query($conn,$addtionalcharge);
        if(mysqli_num_rows($addtionalcharg)){
            $addirow = mysqli_fetch_assoc($addtionalcharg);
    /*
    echo "<br>adionl : ";
    echo $abc = $addirow['upto_weight'];
    echo "<br>aa: "; 
    $additionalweightcalci = ceil($freightWeightare/$abc);
    echo $additionalweightcalci = $additionalweightcalci-1;
    */
    
            // echo "<br>Adiotnal wt : ";
            $addinlwetare = $addirow['Zone1'];
            $addionalweightadd = $addinlwetare*$additionalweightcalci;
        }else{
            continue;
        }
        $newtotalamt = $newtotalamt+$addionalweightadd;
        // echo "<br>";
    }
    // Additional Charges
    $modelid++;
    
    
    $agentfee;
    
    // new Courie chanrges
        $courierschage = $newtotalamt-$newcodchange;
    // new Courie chanrges
    
    $gstperct = 18/100;
    $gstamt = $newtotalamt*$gstperct;
    $tamtwihtgst = $gstamt+$newtotalamt;
    $totalfreightamt = $agentfee+$tamtwihtgst;
    
    
    $courierpermissions[] = array('inno' => $modelid,'courier'=>$row['Courier'],'weight' =>$row['Courier'],'courierschage' => $courierschage,'newcodchange' => $newcodchange,'newtotalamt'=>$newtotalamt,'gstamt'=>$gstamt,'tamtwihtgst'=>$tamtwihtgst,'agentfee'=>$agentfee,'totalfreightamt'=>$totalfreightamt);
    
    
    }
?>






<?php
    // Main Courier Permissions
    }
    // Main Courier Permissions
    
    
    // echo $modelid;
?>
































<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-md">
    <tr>
        <th>S.no</th>
        <th>Courier</th>
        <!-- <th>Weight </th> -->
        <th>Courier Charges</th>
        <th>COD  Charges</th>
        <th>Amount</th>
        <th>18% GST</th>
        <th>Freight Amount</th>
        <th>Agent Fee</th>
        <th>Total Amount</th>
        <th>Booking</th>
    </tr>
<?php
    $modelid=0;
    foreach ($courierpermissions as $courierpermission){
    $modelid++;
    $couriename = $courierpermission['courier'];
    $courierschage = $courierpermission['courierschage'];
    $newcodchange = $courierpermission['newcodchange'];
    $couriername = $courierpermission['courier'];
    $newtotalamt = $courierpermission['newtotalamt'];

    $gstamt = $courierpermission['gstamt'];
    $tamtwihtgst = $courierpermission['tamtwihtgst'];
    $agentfee = $courierpermission['agentfee'];
    $totalfreightamt = $courierpermission['totalfreightamt'];
?>
    <tr>
        <td><?= $modelid ?></td>
        <td><?= $couriename ?></td>
        <td><?= $courierschage ?></td>
        <td><?= $newcodchange ?></td>
            <?php 
                if($couriername=="Delhivery Surface"){
            ?>
                <td><?= $newtotalamt ?></td>
                <td>
                <?php 
                    // $gstperct = 18/100;
                    // echo $gstamt = $newtotalamt*$gstperct;
                    // echo "<br>";
                    // echo $tamtwihtgst = $gstamt+$newtotalamt;
                    echo $gstamt;
                ?>      
                </td>
                <td>
                    <?php
                        echo $tamtwihtgst;
                        echo "<input type='hidden' name='tamtwihtgstdlsf' value='$tamtwihtgst'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $agentfee;
                        echo "<input type='hidden' value='$agentfee' name='agentfee'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $totalfreightamt;
                     ?>
                </td>
                <td>
                    <input type="submit" name="retailerbookingsingledelhiverysurface" class="btn btn-primary" value="Book">
                </td>
            <?php
                }elseif($couriername=="Ekart"){
            ?>
                <td><?= $newtotalamt ?></td>
                <td>
                <?php 
                    // $gstperct = 18/100;
                    // echo $gstamt = $newtotalamt*$gstperct;
                    // echo "<br>";
                    // echo $tamtwihtgst = $gstamt+$newtotalamt;
                    echo $gstamt;
                ?>      
                </td>
                <td>
                    <?php
                        echo $tamtwihtgst;
                        echo "<input type='hidden' name='tamtwihtgstekrt' value='$tamtwihtgst'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $agentfee;
                        echo "<input type='hidden' value='$agentfee' name='agentfee'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $totalfreightamt;
                     ?>
                </td>
                <td>
                    <input type="submit" name="retailerbookingsingleekart" class="btn btn-primary" value="Book">
                </td>
            <?php
                }elseif($couriername=="Xpressbees"){
            ?>
                <td><?= $newtotalamt ?></td>
                <td>
                <?php 
                    // $gstperct = 18/100;
                    // echo $gstamt = $newtotalamt*$gstperct;
                    // echo "<br>";
                    // echo $tamtwihtgst = $gstamt+$newtotalamt;
                    echo $gstamt;
                ?>      
                </td>
                <td>
                    <?php
                        echo $tamtwihtgst;
                        echo "<input type='hidden' name='tamtwihtgstxb' value='$tamtwihtgst'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $agentfee;
                        echo "<input type='hidden' value='$agentfee' name='agentfee'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $totalfreightamt;
                     ?>
                </td>
                <td>
                    <input type="submit" name="retailerbookingsinglexpressbees" class="btn btn-primary" value="Book">
                </td>
            <?php
                }elseif($couriername=="Shadowfax"){
            ?>
                <td><?= $newtotalamt ?></td>
                <td>
                    <?php
                        echo $gstamt;
                    ?>
                </td>
                <td>
                    <?php
                        echo $tamtwihtgst;
                        echo "<input type='hidden' name='tamtwihtgstxb' value='$tamtwihtgst'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $agentfee;
                        echo "<input type='hidden' value='$agentfee' name='agentfee'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $totalfreightamt;
                     ?>
                </td>
                <td>
                    <input type="submit" name="retailerbookingsingleshadowfax" class="btn btn-primary" value="Book">
                </td>
            <?php
                }else{
            ?>
                <td><?= $newtotalamt ?></td>
                <td>
                <?php 
                    // $gstperct = 18/100;
                    // echo $gstamt = $newtotalamt*$gstperct;
                    // echo "<br>";
                    // echo $tamtwihtgst = $gstamt+$newtotalamt;
                    echo $gstamt;
                ?>      
                </td>
                <td>
                    <?php
                        echo $tamtwihtgst;
                        echo "<input type='hidden' name='tamtwihtgst' value='$tamtwihtgst'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $agentfee;
                        echo "<input type='hidden' value='$agentfee' name='agentfee'>";
                    ?>
                </td>
                <td>
                    <?php 
                        echo $totalfreightamt;
                     ?>
                </td>
                <td>
                    <!-- <input type="submit" name="retailerbookingsingledelhiverybulky" class="btn btn-primary" value="Book"> -->
                </td>
            <?php
                }
            ?>
    </tr>
<?php
    }
?>
</table>
</div>
</div>


