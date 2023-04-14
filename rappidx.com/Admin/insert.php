<?php  
// return 1;




include "config/dbcon.php";
$staus=$_GET['status'];
$shipped=$_GET['ship_status'];

$myCheckboxes=$_GET['myCheckboxes'];
$count = count($myCheckboxes);
for ($i = 0; $i < $count; $i++) {
   $orderno = $myCheckboxes[$i];

   $query="UPDATE spark_single_order SET shipstatus='$staus' WHERE orderno='$orderno'";
   $exec= mysqli_query($conn,$query); 
}

if($exec){
   header('location:/user_panel/shipment.php');
   // echo "<script> window.location.href('upload-order.php')</script>";

}else{
$msg= "Error: " . $query . "<br>" . mysqli_error($conn);
echo $msg; 
}

?>