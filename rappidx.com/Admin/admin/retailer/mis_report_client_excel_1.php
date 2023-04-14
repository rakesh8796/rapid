<?php
error_reporting(1);
include 'Header_Excel.php';
$filename="MIS";
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1">
<thead>

<tr>
     <th>    Order No    </th>
    <th>    Awb No </th>
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


if($downloadtime){
    $singleproquery = "SELECT * FROM `spark_mis_report` WHERE `user_id` IN ($user_id) AND`uploaddate`='$downloaddate' AND `uploadtime`='$downloadtime' ORDER BY `mis_id` DESC";
}else{
    $singleproquery = "SELECT * FROM `spark_mis_report` WHERE `user_id` IN ($user_id) AND `uploaddate`='$downloaddate' ORDER BY `mis_id` DESC";
}


// echo $singleproquery;

$singleproqueryr=mysqli_query($conn,$singleproquery);
while($row = mysqli_fetch_assoc($singleproqueryr))
{
    
    
// Check Delivered Order Date And Return Order Date
if($row['deliverydate'] != "0000-00-00"){
    $deldate = $row['deliverydate'];
    // echo "&ensp;&ensp;:&ensp;";
    $diff = strtotime($stdate) - strtotime($deldate);
    $deliverednoofgaps = abs(round($diff / 86400));
    // echo "<br>";
}
if($row['rtodate'] != "0000-00-00"){
    $diff = strtotime($stdate) - strtotime($row['rtodate']);
    $rtonoofgaps = abs(round($diff / 86400));
}

// if($deliverednoofgaps>5 OR $rtonoofgaps>5){
//     continue;
// }
if($deliverednoofgaps>5){
    continue;
}
elseif($rtonoofgaps>5){
    continue;
}
// Check Delivered Order Date And Return Order Date


?>
<tr class="record">
    <td><?= $row['orderno'] ?></td>
    <td><?= $row['awbno'] ?></td>
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
        echo $row['firstattemptdate'];
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
    <td><?= $row['orderageing'] ?></td>
    <td><?= $row['attemptcount'] ?></td>
    <td><?= $row['couriername'] ?></td>
    <td><?php
    if($row['rtodate'] != "0000-00-00"){
        echo $row['rtodate'];
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
