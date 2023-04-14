<style type="text/css">
body{
  background-color:gold
}
</style>

<?php
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);

$allawbno1 = array();
// echo $query1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!=''  AND (`User_Id`!='' AND `User_Id`!=0) AND (`order_cancel`!='1' OR `order_cancel` IS NULL) AND `order_status_show`!='Upload' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')";



// echo "<br><br>";
// echo $query = "SELECT count(`Single_Order_Id`) FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!=''  AND (`User_Id`!='' AND `User_Id`!=0) AND (`order_cancel`!='1' OR `order_cancel` IS NULL) AND `order_status_show`!='Upload' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')";
// $queryr = mysqli_query($conn, $query);
// $queryrres = mysqli_fetch_assoc($queryr);
// echo "<br>";
// echo $qcodremmmitruis = $queryrres["count(`Single_Order_Id`)"];

echo "<br>";
$livequery1 = "SELECT `Awb_Number`,`awb_gen_by` FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!=''  AND (`User_Id`!='' AND `User_Id`!=0) AND (`order_cancel`!='1' OR `order_cancel` IS NULL) AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')";
// $livequery1 = "SELECT `Awb_Number` FROM `spark_single_order` WHERE `Awb_Number`!='' AND `orderno`!='' AND `awb_gen_by`!='' AND (`User_Id`!='' AND `User_Id`!=0) AND (`order_cancel`!='1' OR `order_cancel` IS NULL) AND `order_status_show`!='Upload' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
//  ORDER BY `Single_Order_Id` DESC LIMIT 5000";
$livequery1r = mysqli_query($conn,$livequery1);
$livecount1 = 1;
while ($livequery1res = mysqli_fetch_assoc($livequery1r)){
      if($livequery1res['awb_gen_by']=="Bluedart"){          continue;      }
      $allawbno1[$livecount1] = $livequery1res['Awb_Number'];
      $awbno = $livequery1res['Awb_Number'];
      $queryallawb = "INSERT INTO `autostatusupdate3`(`awbnois`, `awbcheck`) VALUES ('$awbno','0')";
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




date_default_timezone_set('Asia/Kolkata');
$query123 = "INSERT INTO `cronjobs`(`pagename`, `hitdate`, `hittime`, `hitdatetime`) VALUES ('Tracking_Track_Orders',now(),now(),now())";
if(mysqli_query($conn,$query123))
{
	echo "Work";
}else{
	echo "Else";
}
?>

