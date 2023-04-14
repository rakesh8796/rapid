<?php
session_start();
// error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

if(empty($_SESSION['username']))
{
	echo "<script>window.location.assign('index.php')</script> ";
}
$username = $_SESSION['username'];
$user_id = $_SESSION['useridis'];

    $userid = $_SESSION['username'];

$headerquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
$headerfdata = mysqli_query($conn,$headerquery);
$hresult = mysqli_fetch_assoc($headerfdata);
// $hresult['Company_Name'];




// error_reporting(1);
// include 'Header_Excel.php';
$filename=$username."MIS";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
<thead>
<tr>
    <th>   Awb No </th>
    <th>    Order No    </th>
    <th>    Item Name </th>
    <th>    PickUp Date </th>
    <th>    Order Status    </th>
    <th>    Courier Remark  </th>
    <th>    Last Status date    </th>
    <th>    Delivery Date   </th>
    <th>    FirstScanDate   </th>
    <th>    FirstScantime   </th>
    <th>    FirstAttemptDate    </th>
    <th>    EDD </th>
    <th>    Origin City     </th>
    <th>    Origin pin code </th>
    <th>    Destination City    </th>
    <th>    Destination Pincode </th>
    <th>    Client Name   </th>
    <th>    Customer Contact    </th>
    <th>    Customer Name </th>
    <th>    Payment Mode    </th>
    <th>    COD Amount  </th>
    <th>    Order Ageing    </th>
    <th>    AttemptCount    </th>
    <th>    CourierName </th>
    <th>    RTO Date    </th>
    <th>    RTOReason   </th>
    <th>    ZoneName    </th>
    <th>    Last OFD Date   </th>
    <th>    NDR instructions </th>
</tr>

</thead>
<!--  -->
<?php
$downloaddate = $_GET['date'];
$downloadtime = $_GET['time'];
$user_id = $_GET['selectuserid'];
// echo "<br>";
if(empty($_GET['selectuserid'])){    $user_id = $_SESSION['useridis'];  }
$i = 1;

$stdate = date("Y-m-d");
if($downloadtime){
    // $singleproquery = "SELECT * FROM `spark_mis_report` WHERE `user_id` IN ($user_id) AND`uploaddate`='$downloaddate' AND `uploadtime`='$downloadtime' ORDER BY `mis_id` DESC";
    $singleproquery = "SELECT DISTINCT(`awbno`),`user_id`,`orderno`,`productname`,`pickupdate`,`orderstatus`,`courierremark`,`orderstatusnull`,`ordersremark1`,`ordersremark2`,`ordersremark3`,`laststatusdate`,`deliverydate`,`firstscandate`,`firstattemptdate`,`edd`,`origincity`,`originpincode`,`destinationcity`,`destinationpincode`,`customername`,`customercontact`,`clientname`,`paymentmode`,`codamt`,`attemptcount`,`couriername`,`rtodate`,`rtoreason`,`zonename`,`lastofddate`,`ndrinstructions` FROM `spark_mis_report` WHERE `user_id` IN ($user_id) AND`uploaddate`='$downloaddate' AND `uploadtime`='$downloadtime' ORDER BY `mis_id` DESC";
}else{
    // $singleproquery = "SELECT * FROM `spark_mis_report` WHERE `user_id` IN ($user_id) AND `uploaddate`='$downloaddate' ORDER BY `mis_id` DESC";
    $singleproquery = "SELECT DISTINCT(`awbno`),`user_id`,`orderno`,`productname`,`pickupdate`,`orderstatus`,`courierremark`,`orderstatusnull`,`ordersremark1`,`ordersremark2`,`ordersremark3`,`laststatusdate`,`deliverydate`,`firstscandate`,`firstattemptdate`,`edd`,`origincity`,`originpincode`,`destinationcity`,`destinationpincode`,`customername`,`customercontact`,`clientname`,`paymentmode`,`codamt`,`attemptcount`,`couriername`,`rtodate`,`rtoreason`,`zonename`,`lastofddate`,`ndrinstructions` FROM `spark_mis_report` WHERE `user_id` IN ($user_id) AND `uploaddate`='$downloaddate' ORDER BY `mis_id` DESC";
}


// echo $singleproquery;

$singleproqueryr=mysqli_query($conn,$singleproquery);
while($row = mysqli_fetch_assoc($singleproqueryr))
{
    
if(empty($row['customername'])){
    $companynameis = "SELECT `Company_Name` FROM `asitfa_user` WHERE `User_Id`='$row[user_id]'";
    $companynameisr = mysqli_query($conn,$companynameis);
    $companynameisres = mysqli_fetch_assoc($companynameisr);
    $row['customername'] = $companynameisres['Company_Name'];
}
    
if($row['pickupdate'] != "0000-00-00"){
    // Order ageing
    $nowtime = time();
    $pickupdate = $row['pickupdate'];
    $pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
    $pickupdate = strtotime($pickupdate);
    $orderageing = $nowtime - $pickupdate;
    $orderageing = round($orderageing / (60 * 60 * 24));
    // Order ageing
}

// Status Change
if($row['orderstatus']=="Undelivered ??? Multiple Attempt"){
    $row['orderstatus'] = "Undelivered";
}

if(empty($row['orderstatus']) OR is_null($row['orderstatus'])){
    $row['orderstatus'] = $row['orderstatusnull'];
}

if($row['orderstatus']=="Out For WHHandover" OR $row['orderstatus']=="Local RTO Intransit" OR $row['orderstatus']=="RTODispute" OR $row['orderstatus']=="RTO" OR $row['orderstatus']=="STD"){
    $row['orderstatus'] = "RTO In Transit";
}

if($row['orderstatus']=="RAD" OR $row['orderstatus']=="ODA" OR $row['orderstatus']=="Shipped"  OR $row['orderstatus']=="ODA (Out Of Delivery Area)"){
    $row['orderstatus'] = "In Transit";
}
if($row['orderstatus']=="OFD"){
    $row['orderstatus'] = "Out For Delivery";
}
// Status Change
// Remark Chages
if(empty($row['courierremark']) OR $row['courierremark']==""){
    if(!empty($row['ordersremark1']) AND $row['ordersremark1']!=""){
        $row['courierremark'] = $row['ordersremark1'];
    }elseif(!empty($row['ordersremark2']) AND $row['ordersremark2']!=""){
        $row['courierremark'] = $row['ordersremark2'];
    }elseif(!empty($row['ordersremark3']) AND $row['ordersremark3']!=""){
        $row['courierremark'] = $row['ordersremark3'];
    }
}
// Remark Chages
// Remark Change To Status
if($row['courierremark']=="Shipment not received from client"){
    $row['orderstatus'] = "Not Picked";
}
if($row['orderstatus']=="Not Picked"){
    continue;
}
if($row['courierremark']=="Manifest uploaded"){
    continue;
}
if($row['courierremark']=="Seller cancelled the order"){
    continue;
}
if($row['orderstatus']=="Manifested"){
    continue;
}
// Remark Change To Status


    
// Check Delivered Order Date And Return Order Date
$deliverednoofgaps = 0;
$rtonoofgaps = 0;
$rtonoofgaps1 = 0;
// if($row['deliverydate'] != "0000-00-00"){
//     $deldate = $row['deliverydate'];
//     $diff = strtotime($stdate) - strtotime($deldate);
//     $deliverednoofgaps = abs(round($diff / 86400));
// }
// if($row['rtodate'] != "0000-00-00"){
//     $diff = strtotime($stdate) - strtotime($row['rtodate']);
//     $rtonoofgaps = abs(round($diff / 86400));
// }
// if($deliverednoofgaps>5){
//     continue;
// }elseif($rtonoofgaps>5){
//     continue;
// }
if($row['deliverydate'] != "0000-00-00"){
    $deldate = $row['deliverydate'];
    $diff = strtotime($stdate) - strtotime($deldate);
    $deliverednoofgaps = abs(round($diff / 86400));
}elseif($row['couriername']=="XpressBees" AND $row['laststatusdate'] != "0000-00-00"){
    $rtodate = $row['laststatusdate'];
    $diff = strtotime($stdate) - strtotime($rtodate);
    $rtonoofgaps1 = abs(round($diff / 86400));
}elseif($row['rtodate'] != "0000-00-00"){
    $rtodate = $row['rtodate'];
    $diff = strtotime($stdate) - strtotime($rtodate);
    $rtonoofgaps = abs(round($diff / 86400));
}
if($deliverednoofgaps>5){
  continue;
}elseif($rtonoofgaps1>5){
  continue;
}elseif($rtonoofgaps>5){
  continue;
}elseif($row['courierremark']=="Manifested"){
  continue;
}
// Check Delivered Order Date And Return Order Date

// Attempt Or Not
if($row['attemptcount']>0){
    if($row['orderstatus']=="In Transit"){
        $row['orderstatus'] = "Undelivered";
    }
}
// Attempt Or Not

// OFD Status
$row['courierremark'] = ucwords($row['courierremark']);
if($row['courierremark'] == "Out For Delivery"){
    $row['orderstatus'] = "Out For Delivery";
}
// OFD Status

?>
<tr class="record">
    <td><?= $row['awbno'] ?></td>
    <td><?= $row['orderno'] ?></td>
    <td><?= $row['productname'] ?></td>
    <td><?php
    if($row['pickupdate'] != "0000-00-00"){
        echo $row['pickupdate'];
    }
    // $row['pickupdate']
    ?></td>
    <td><?= $row['orderstatus'] ?></td>
    <td><?= $row['courierremark'] ?></td>
    <td><?php
    if($row['laststatusdate'] != "0000-00-00"){
        echo $row['laststatusdate'];
    }
    // $row['laststatusdate']
    ?></td>
    <td><?php
    if($row['deliverydate'] != "0000-00-00"){
        echo $row['deliverydate'];
    }
    // $row['deliverydate']
    ?></td>
    <td><?php
    if($row['firstscandate'] != "0000-00-00"){
        echo $row['firstscandate'];
    }
    // $row['firstscandate']
    ?></td>
    <td><?php
    if($row['firstscantime'] != "00:00:00"){
        echo $row['firstscantime'];
    }
    // $row['firstscantime']
    ?></td>
    <td><?php
    if($row['firstattemptdate'] != "0000-00-00"){
        if($row['couriername']!="Bluedart"){
            echo $row['firstattemptdate'];    
        }
    }
    // $row['firstattemptdate']
    ?></td>
    <td><?php
    if($row['edd'] != "0000-00-00"){
        echo $row['edd'];
    }
    // $row['edd']
    ?></td>
    <td><?= $row['origincity'] ?></td>
    <td><?= $row['originpincode'] ?></td>
    <td><?= $row['destinationcity'] ?></td>
    <td><?= $row['destinationpincode'] ?></td>
    <td><?= $row['customername'] ?></td>
    <td><?= $row['customercontact'] ?></td>
    <td><?= $row['clientname'] ?></td>
    <td><?= $row['paymentmode'] ?></td>
    <td><?= $row['codamt'] ?></td>
    <td><?= $orderageing ?></td>
    <td><?= $row['attemptcount'] ?></td>
    <td><?= $row['couriername'] ?></td>
    <td><?php
    if($row['rtodate'] != "0000-00-00"){
        if($row['orderstatus']=="RTO In Transit" OR $row['orderstatus']=="RTO Delivered"){
            echo $row['rtodate'];
        }
    }
    // $row['rtodate']
    ?></td>
    <td><?= $row['rtoreason'] ?></td>
    <td><?= $row['zonename'] ?></td>
    <td><?php
    if($row['lastofddate'] != "0000-00-00"){
        echo $row['lastofddate'];
    }
    // $row['lastofddate']
    ?></td>
    <td><?= $row['ndrinstructions'] ?></td>
</tr>
<?php
$i++;
}
?>
<!--  -->
</table>
