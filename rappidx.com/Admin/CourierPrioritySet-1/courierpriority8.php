<?php
extract($_REQUEST);
error_reporting(1);
// include('../config/dbconnection.php');
?>

<!--  -->
	<input type="hidden" name="<?= $courierselect ?>" value="7">
<!--  -->


<?php 
$couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','DTDCapinotwo'=>'DTDC2','Amazonapino'=>'Amazon');

// print_r($couriernames);

// unset($couriernames[$courierselect]);
// unset($couriernames[$fifthcourier]);
// unset($couriernames[$fourthcourier]);
// unset($couriernames[$thirdcourier]);
// unset($couriernames[$secondcourier]);
// unset($couriernames[$firstcourier]);
?>





	<input type="text" id="firstcourier" value="1 <?= $firstcourier ?>">
	<input type="text" id="secondcourier" value="2 <?= $secondcourier ?>">
	<input type="text" id="thirdcourier" value="3 <?= $thirdcourier ?>">
	<input type="text" id="fourthcourier" value="4 <?= $fourthcourier ?>">
	<input type="text" id="fifthcourier" value="5 <?= $fifthcourier ?>">
	<input type="text" id="sixthhcourier" value="6 <?= $sixthcourier ?>">
	<input type="text" id="sevencourier" value="7 <?= $courierselect ?>">

