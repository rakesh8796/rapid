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

$allawbno1 = array();
echo $livequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!=''  AND (`User_Id`!='' AND `User_Id`!=0) AND (`order_cancel`!='1' OR `order_cancel` IS NULL) AND `order_status_show`!='Upload' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')";
$livequery1r = mysqli_query($conn,$livequery1);
$livecount1 = 1;
while ($livequery1res = mysqli_fetch_assoc($livequery1r)){
      $allawbno1[$livecount1] = $livequery1res['Awb_Number'];
      $awbno = $livequery1res['Awb_Number'];
      $queryallawb = "INSERT INTO `autostatusupdate3`(`awbnois`,`awbcheck`) VALUES ('$awbno','0')";
      mysqli_query($conn,$queryallawb);
$livecount1++;
}
echo "<br>";
echo count($allawbno1);
echo "<br>";
print_r($allawbno1);
// foreach ($allawbno1 as $value) {
//   // echo $value."<br>";
//   $queryallawb = "INSERT INTO `autostatusupdate3`(`awbnois`, `statusis`, `awbcheck`) VALUES ('$value','','0')";
//   mysqli_query($conn,$queryallawb);
// }
// exit();
echo "<br><br>";
?>
<?php
$conn123 = mysqli_connect("localhost","singhaniyatest","singhaniyatest","singhaniyatest");
date_default_timezone_set('Asia/Kolkata');
$query123 = "INSERT INTO `testing_cronjob`(`name`, `crtdate`, `count`) VALUES ('Admin',now(),'Get_3')";
if(mysqli_query($conn123,$query123))
{
	echo "Work";
}else{
	echo "Else";
}
?>