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



$singleproquery = "SELECT `Courier`, `Weight`, `upto_weight`, `upto_addweight`, `weight_type`, `A`, `B`, `C`, `D`, `E`, `F`, `COD`, `COD%` FROM `retailer-rate-list`  WHERE `status`='1'";


$singleproqueryr=mysqli_query($conn,$singleproquery);
if(empty(mysqli_num_rows($singleproqueryr))){
  echo "<center>Not In Service</center>";
}
$modelid = 0;
?>

<div class="card-header">
<h4>Seviable Courier Services</h4>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-md">
    <tr>
        <th>S.no</th>
        <th>Courier</th>
        <th>Weight </th>
        <th>Within City</th>
        <th>Regional (Single connection)</th>
        <th>Metro to Metro </th>
        <th>Rest of India </th>
        <th>North East, Kashmir , HP, Kerala</th>
        <th>Manipur ,Jammu , Andaman </th>
        <th>COD  Charges</th>
        <th>COD %</th>
    </tr>


<?php
while($row = mysqli_fetch_assoc($singleproqueryr))
{
$modelid++;
?>
    <tr>
        <td><?= $modelid ?></td>
        <td><?= $row['Courier'] ?></td>
        <td><?= $row['Weight'] ?></td>
        <td><?= $row['A'] ?></td>
        <td><?= $row['B'] ?></td>
        <td><?= $row['C'] ?></td>
        <td><?= $row['D'] ?></td>
        <td><?= $row['F'] ?></td>
        <td><?= $row['COD'] ?></td>
        <td><?= $row['COD%'] ?></td>
    </tr>


<?php

}
?>





</table>
</div>
</div>



<?php
// echo $modelid;
?>



