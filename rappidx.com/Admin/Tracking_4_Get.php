<style type="text/css">
body{
  background-color:gold
}
</style>

<?php
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
  include 'Header.php';
$allawbno2 = array();
echo $livequery2 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!=''   AND (`User_Id`!='' AND `User_Id`!=0) AND (`order_cancel`!='1' OR `order_cancel` IS NULL) AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered' OR `order_status_show` IS NULL)";
$livequery2r = mysqli_query($conn,$livequery2);
while ($livequery2res = mysqli_fetch_assoc($livequery2r)){
       $allawbno2[$livecount1] = $livequery2res['Awb_Number'];
       $awbnois = $livequery2res['Awb_Number'];
       $queryallawb = "INSERT INTO `autostatusupdate4`(`awbnois`,`awbcheck`) VALUES ('$awbnois','0')";
       mysqli_query($conn,$queryallawb);
$livecount1++;
}
echo "<br>";
echo count($allawbno2);
echo "<br>";
print_r($allawbno2);
// foreach ($allawbno as $value) {
//   // echo $value."<br>";
//   $queryallawb = "INSERT INTO `autostatusupdate4`(`awbnois`, `statusis`, `awbcheck`) VALUES ('$value','','0')";
//   mysqli_query($conn,$queryallawb);
// }
// exit();
echo "<br><br>";
?>

<?php
$conn123 = mysqli_connect("localhost","singhaniyatest","singhaniyatest","singhaniyatest");
date_default_timezone_set('Asia/Kolkata');
$query123 = "INSERT INTO `testing_cronjob`(`name`, `crtdate`, `count`) VALUES ('Admin',now(),'Get_4')";
if(mysqli_query($conn123,$query123))
{
	echo "Work";
}else{
	echo "Else";
}
?>
