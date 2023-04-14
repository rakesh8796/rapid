<?php
    include "../Layout_Header_Folder.php";
?>


<section class="content">
<div class="col-md-12">
<div class="col-md-12">
<div class="col-md-12">
<br>
<div class="col-md-12 white-box fontweighlight">





<?php
$user_id = $_SESSION['useridis'];

// Multiple Users Check
$useruinqueidno = $_SESSION['useruinqueidno'];
$queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall=mysqli_query($conn,$queryall);
$fdataall3=mysqli_query($conn,$queryall);
// $fdataall=mysqli_query($conn,$queryall);
$numrowall=mysqli_num_rows($fdataall);
//
$useridisa0 = array();
$queryall0="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall0=mysqli_query($conn,$queryall0);
$numrowall0=mysqli_num_rows($fdataall0);
if($numrowall0>1){
    while($resultall0 = mysqli_fetch_assoc($fdataall0)){
        $useridisa0[] = $resultall0['User_Id'];
    }
    $user_ids = implode(",",$useridisa0);
}else{
  $user_ids = $user_id;
}
//
// Multiple Users Check




$tdate = date('Y-m-d');
$tdate1 = date('Y-m-d',strtotime("-1 days"));
$tdate2 = date('Y-m-d',strtotime("-2 days"));
$tdate3 = date('Y-m-d',strtotime("-3 days"));
$tdate4 = date('Y-m-d',strtotime("-4 days"));
$tdate5 = date('Y-m-d',strtotime("-5 days"));
$tdate6 = date('Y-m-d',strtotime("-6 days"));
$tdate7 = date('Y-m-d',strtotime("-7 days"));
$tdate8 = date('Y-m-d',strtotime("-8 days"));
$tdate9 = date('Y-m-d',strtotime("-9 days"));
$tdate10 = date('Y-m-d',strtotime("-10 days"));

$tdatec = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate'";
$tdaterc=mysqli_query($conn,$tdatec);
$tdaterresc = mysqli_fetch_assoc($tdaterc);
$count = $tdaterresc["COUNT(`mis_id`)"];

// Temperary VJ Account Suspended
if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count = 0;
}
// Temperary VJ Account Suspended

$tdatec1 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate1'";
$tdaterc1=mysqli_query($conn,$tdatec1);
$tdaterresc1 = mysqli_fetch_assoc($tdaterc1);
$count1 = $tdaterresc1["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count1 = 0;
}


$tdatec2 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate2'";
$tdaterc2=mysqli_query($conn,$tdatec2);
$tdaterresc2 = mysqli_fetch_assoc($tdaterc2);
$count2 = $tdaterresc2["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count2 = 0;
}


$tdatec3 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate3'";
$tdaterc3=mysqli_query($conn,$tdatec3);
$tdaterresc3 = mysqli_fetch_assoc($tdaterc3);
$count3 = $tdaterresc3["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count3 = 0;
}


$tdatec4 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate4'";
$tdaterc4=mysqli_query($conn,$tdatec4);
$tdaterresc4 = mysqli_fetch_assoc($tdaterc4);
$count4 = $tdaterresc4["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count4 = 0;
}


$tdatec5 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate5'";
$tdaterc5=mysqli_query($conn,$tdatec5);
$tdaterresc5 = mysqli_fetch_assoc($tdaterc5);
$count5 = $tdaterresc5["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count5 = 0;
}


$tdatec6 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate6'";
$tdaterc6=mysqli_query($conn,$tdatec6);
$tdaterresc6 = mysqli_fetch_assoc($tdaterc6);
$count6 = $tdaterresc6["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count6 = 0;
}


$tdatec7 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate7'";
$tdaterc7=mysqli_query($conn,$tdatec7);
$tdaterresc7 = mysqli_fetch_assoc($tdaterc7);
$count7 = $tdaterresc7["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count7 = 0;
}


$tdatec8 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate8'";
$tdaterc8=mysqli_query($conn,$tdatec8);
$tdaterresc8 = mysqli_fetch_assoc($tdaterc8);
$count8 = $tdaterresc8["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count8 = 0;
}


$tdatec9 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate9'";
$tdaterc9=mysqli_query($conn,$tdatec9);
$tdaterresc9 = mysqli_fetch_assoc($tdaterc9);
$count9 = $tdaterresc9["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count9 = 0;
}


$tdatec10 = "SELECT COUNT(`mis_id`) FROM `spark_mis_report` WHERE `user_id`='$user_id' AND `uploaddate`='$tdate10'";
$tdaterc10=mysqli_query($conn,$tdatec10);
$tdaterresc10 = mysqli_fetch_assoc($tdaterc10);
$count10 = $tdaterresc10["COUNT(`mis_id`)"];

if($useruinqueidno == "RPXC60" OR $useruinqueidno == "RPXC44"){
    $count10 = 0;
}



?>



<style type="text/css">
.btn-success {
color: #fff !important;
background-color: #60baaf !important;
border-color: #gold !important;
}
td{
  padding:10px 0px 0px 20px !important;
  font-size: 13px !important;
}
a.btn{
  font-size: 13px !important;
  margin-top:-8px !important;
}
</style>

<table class="table table-striped table-hover" style="font-size:15px;border:1px solid gold;">
<thead>
  <tr>
    <th colspan="3" class="text-center" style="background-color:#33333373;color:black;padding:5px">
        MIS Report (Last 10 Days)
    </th>
  </tr>
</thead>
<tbody>


    <div class="container-fluid">
        
        <?php
            if(!empty($count))
            {

$query = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate'";
  $queryr = mysqli_query($conn,$query);
  
    if($retrunrows = mysqli_num_rows($queryr)){
      
    while($queryres = mysqli_fetch_assoc($queryr)){
      // echo $queryres['uploadtime']."<br>";
      echo "<tr>
  <td>".$tdate." / ".date("g:iA", strtotime($queryres['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall=mysqli_query($conn,$queryall);
while($resultall = mysqli_fetch_assoc($fdataall)){
      $selectuserid = $resultall['User_Id'];

    if($resultall['commercialstype']=="gm500" AND $resultall['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$selectuserid' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall['commercialstype']=="kg1" AND $resultall['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$selectuserid' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall['commercialstype']=="kg2" AND $resultall['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$selectuserid' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall['commercialstype']=="kg5" AND $resultall['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$selectuserid' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall['commercialstype']=="kg10" AND $resultall['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$selectuserid' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
    }
  }else{

    echo "
<tr>
  <td>".$tdate."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }

        ?>

        <?php
            }
            if(!empty($count1))
            {

$query1 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate1'";
  $queryr1 = mysqli_query($conn,$query1);
  if($retrunrows1 = mysqli_num_rows($queryr1))
  {
    while($queryres1 = mysqli_fetch_assoc($queryr1)){
      // echo $queryres1['uploadtime']."<br>";

echo "<tr>
  <td>".$tdate1." / ".date("g:iA", strtotime($queryres1['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall1="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall1=mysqli_query($conn,$queryall1);
while($resultall1 = mysqli_fetch_assoc($fdataall1)){
      $selectuserid1 = $resultall1['User_Id'];

    if($resultall1['commercialstype']=="gm500" AND $resultall1['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."&selectuserid=$selectuserid1' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall1['commercialstype']=="kg1" AND $resultall1['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."&selectuserid=$selectuserid1' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall1['commercialstype']=="kg2" AND $resultall1['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."&selectuserid=$selectuserid1' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall1['commercialstype']=="kg5" AND $resultall1['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."&selectuserid=$selectuserid1' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall1['commercialstype']=="kg10" AND $resultall1['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."&selectuserid=$selectuserid1' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";


//       echo "
// <tr>
//   <td>".$tdate1." / ".date("g:iA", strtotime($queryres1['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows1;
echo "
<tr>
  <td>".$tdate1."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate1' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count2))
            {
$query2 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate2'";
  $queryr2 = mysqli_query($conn,$query2);
  if($retrunrows2 = mysqli_num_rows($queryr2))
  {
    while($queryres2=mysqli_fetch_assoc($queryr2)){
      // echo $queryres2['uploadtime']."<br>";
      // <a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
      // &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>

echo "<tr>
  <td>".$tdate2." / ".date("g:iA", strtotime($queryres2['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall2="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall2=mysqli_query($conn,$queryall2);
while($resultall2 = mysqli_fetch_assoc($fdataall2)){
      $selectuserid2 = $resultall2['User_Id'];

    if($resultall2['commercialstype']=="gm500" AND $resultall2['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."&selectuserid=$selectuserid2' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall2['commercialstype']=="kg1" AND $resultall2['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."&selectuserid=$selectuserid2' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall2['commercialstype']=="kg2" AND $resultall2['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."&selectuserid=$selectuserid2' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall2['commercialstype']=="kg5" AND $resultall2['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."&selectuserid=$selectuserid2' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall2['commercialstype']=="kg10" AND $resultall2['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."&selectuserid=$selectuserid2' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
// echo "
// <tr>
//   <td>".$tdate2." / ".date("g:iA", strtotime($queryres2['uploadtime']))."</td>
//   <td></td>
//   <td>
//       <a href='mis_report_client_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500GM</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows2;
      echo "
<tr>
  <td>".$tdate2."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate2' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }

        ?>

        <?php
            }
            if(!empty($count3))
            {


$query3 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate3'";
  $queryr3 = mysqli_query($conn,$query3);
  if($retrunrows3 = mysqli_num_rows($queryr3))
  {
    while($queryres3=mysqli_fetch_assoc($queryr3)){
      // echo $queryres3['uploadtime']."<br>";


echo "<tr>
  <td>".$tdate3." / ".date("g:iA", strtotime($queryres3['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall3="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall3=mysqli_query($conn,$queryall3);
while($resultall3 = mysqli_fetch_assoc($fdataall3)){
      $selectuserid3 = $resultall3['User_Id'];

    if($resultall3['commercialstype']=="gm500" AND $resultall3['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."&selectuserid=$selectuserid3' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall3['commercialstype']=="kg1" AND $resultall3['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."&selectuserid=$selectuserid3' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall3['commercialstype']=="kg2" AND $resultall3['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."&selectuserid=$selectuserid3' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall3['commercialstype']=="kg5" AND $resultall3['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."&selectuserid=$selectuserid3' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall3['commercialstype']=="kg10" AND $resultall3['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."&selectuserid=$selectuserid3' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";


//       echo "
// <tr>
//   <td>".$tdate3." / ".date("g:iA", strtotime($queryres3['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows3;
      echo "
<tr>
  <td>".$tdate3."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate3' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count4))
            {


$query4 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate4'";
  $queryr4 = mysqli_query($conn,$query4);
  if($retrunrows4 = mysqli_num_rows($queryr4))
  {
    while($queryres4=mysqli_fetch_assoc($queryr4)){
      // echo $queryres4['uploadtime']."<br>";
  echo "<tr>
  <td>".$tdate4." / ".date("g:iA", strtotime($queryres4['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall4="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall4=mysqli_query($conn,$queryall4);
while($resultall4 = mysqli_fetch_assoc($fdataall4)){
      $selectuserid4 = $resultall4['User_Id'];

    if($resultall4['commercialstype']=="gm500" AND $resultall4['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."&selectuserid=$selectuserid4' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall4['commercialstype']=="kg1" AND $resultall4['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."&selectuserid=$selectuserid4' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall4['commercialstype']=="kg2" AND $resultall4['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."&selectuserid=$selectuserid4' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall4['commercialstype']=="kg5" AND $resultall4['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."&selectuserid=$selectuserid4' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall4['commercialstype']=="kg10" AND $resultall4['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."&selectuserid=$selectuserid4' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
//       echo "
// <tr>
//   <td>".$tdate4." / ".date("g:iA", strtotime($queryres4['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows4;
      echo "
<tr>
  <td>".$tdate4."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate4' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count5))
            {



$query5 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate5'";
  $queryr5 = mysqli_query($conn,$query5);
  if($retrunrows5 = mysqli_num_rows($queryr5))
  {
    while($queryres5=mysqli_fetch_assoc($queryr5)){
      // echo $queryres5['uploadtime']."<br>";

echo "<tr>
  <td>".$tdate5." / ".date("g:iA", strtotime($queryres5['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall5="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall5=mysqli_query($conn,$queryall5);
while($resultall5 = mysqli_fetch_assoc($fdataall5)){
      $selectuserid5 = $resultall5['User_Id'];

    if($resultall5['commercialstype']=="gm500" AND $resultall5['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."&selectuserid=$selectuserid5' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall5['commercialstype']=="kg1" AND $resultall5['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."&selectuserid=$selectuserid5' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall5['commercialstype']=="kg2" AND $resultall5['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."&selectuserid=$selectuserid5' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall5['commercialstype']=="kg5" AND $resultall5['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."&selectuserid=$selectuserid5' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall5['commercialstype']=="kg10" AND $resultall5['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."&selectuserid=$selectuserid5' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
//       echo "
// <tr>
//   <td>".$tdate5." / ".date("g:iA", strtotime($queryres5['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows5;
      echo "
<tr>
  <td>".$tdate5."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate5' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count6))
            {


$query6 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate6'";
  $queryr6 = mysqli_query($conn,$query6);
  if($retrunrows6 = mysqli_num_rows($queryr6))
  {
    while($queryres6=mysqli_fetch_assoc($queryr6)){
      // echo $queryres6['uploadtime']."<br>";
echo "<tr>
  <td>".$tdate6." / ".date("g:iA", strtotime($queryres6['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall6="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall6=mysqli_query($conn,$queryall6);
while($resultall6 = mysqli_fetch_assoc($fdataall6)){
      $selectuserid6 = $resultall6['User_Id'];

    if($resultall6['commercialstype']=="gm500" AND $resultall6['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."&selectuserid=$selectuserid6' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall6['commercialstype']=="kg1" AND $resultall6['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."&selectuserid=$selectuserid6' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall6['commercialstype']=="kg2" AND $resultall6['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."&selectuserid=$selectuserid6' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall6['commercialstype']=="kg5" AND $resultall6['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."&selectuserid=$selectuserid6' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall6['commercialstype']=="kg10" AND $resultall6['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."&selectuserid=$selectuserid6' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
// echo "
// <tr>
//   <td>".$tdate6." / ".date("g:iA", strtotime($queryres6['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows6;
      echo "
<tr>
  <td>".$tdate6."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate6' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count7))
            {


$query7 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate7'";
  $queryr7 = mysqli_query($conn,$query7);
  if($retrunrows7 = mysqli_num_rows($queryr7))
  {
    while($queryres7=mysqli_fetch_assoc($queryr7)){
      // echo $queryres7['uploadtime']."<br>";

echo "<tr>
  <td>".$tdate7." / ".date("g:iA", strtotime($queryres7['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall7="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall7=mysqli_query($conn,$queryall7);
while($resultall7 = mysqli_fetch_assoc($fdataall7)){
      $selectuserid7 = $resultall7['User_Id'];

    if($resultall7['commercialstype']=="gm500" AND $resultall7['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."&selectuserid=$selectuserid7' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall7['commercialstype']=="kg1" AND $resultall7['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."&selectuserid=$selectuserid7' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall7['commercialstype']=="kg2" AND $resultall7['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."&selectuserid=$selectuserid7' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall7['commercialstype']=="kg5" AND $resultall7['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."&selectuserid=$selectuserid7' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall7['commercialstype']=="kg10" AND $resultall7['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."&selectuserid=$selectuserid7' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
// echo "
// <tr>
//   <td>".$tdate7." / ".date("g:iA", strtotime($queryres7['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows7;
      echo "
<tr>
  <td>".$tdate7."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate7' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count8))
            {



$query8 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate8'";
  $queryr8 = mysqli_query($conn,$query8);
  if($retrunrows8 = mysqli_num_rows($queryr8))
  {
    while($queryres8=mysqli_fetch_assoc($queryr8)){
      // echo $queryres8['uploadtime']."<br>";

echo "<tr>
  <td>".$tdate8." / ".date("g:iA", strtotime($queryres8['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall8="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall8=mysqli_query($conn,$queryall8);
while($resultall8 = mysqli_fetch_assoc($fdataall8)){
      $selectuserid8 = $resultall8['User_Id'];

    if($resultall8['commercialstype']=="gm500" AND $resultall8['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."&selectuserid=$selectuserid8' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall8['commercialstype']=="kg1" AND $resultall8['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."&selectuserid=$selectuserid8' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall8['commercialstype']=="kg2" AND $resultall8['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."&selectuserid=$selectuserid8' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall8['commercialstype']=="kg5" AND $resultall8['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."&selectuserid=$selectuserid8' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall8['commercialstype']=="kg10" AND $resultall8['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."&selectuserid=$selectuserid8' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
// echo "
// <tr>
//   <td>".$tdate8." / ".date("g:iA", strtotime($queryres8['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows8;
      echo "
<tr>
  <td>".$tdate8."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate8' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count9))
            {


$query9 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate9'";
  $queryr9 = mysqli_query($conn,$query9);
  if($retrunrows9 = mysqli_num_rows($queryr9))
  {
    while($queryres9=mysqli_fetch_assoc($queryr9)){
      // echo $queryres9['uploadtime']."<br>";

echo "<tr>
  <td>".$tdate9." / ".date("g:iA", strtotime($queryres9['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall9="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall9=mysqli_query($conn,$queryall9);
while($resultall9 = mysqli_fetch_assoc($fdataall9)){
      $selectuserid9 = $resultall9['User_Id'];

    if($resultall9['commercialstype']=="gm500" AND $resultall9['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."&selectuserid=$selectuserid9' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall9['commercialstype']=="kg1" AND $resultall9['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."&selectuserid=$selectuserid9' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall9['commercialstype']=="kg2" AND $resultall9['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."&selectuserid=$selectuserid9' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall9['commercialstype']=="kg5" AND $resultall9['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."&selectuserid=$selectuserid9' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall9['commercialstype']=="kg10" AND $resultall9['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."&selectuserid=$selectuserid9' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
// echo "
// <tr>
//   <td>".$tdate9." / ".date("g:iA", strtotime($queryres9['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows9;
      echo "
<tr>
  <td>".$tdate9."</td>
  <td></td>
  <td>
    <a href='mis_report_client_excel.php?date=$tdate9' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
  </td>
</tr>
";
  }
        ?>

        <?php
            }
            if(!empty($count10))
            {



$query10 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate10'";
  $queryr10 = mysqli_query($conn,$query10);
  if($retrunrows10 = mysqli_num_rows($queryr10))
  {
    while($queryres10=mysqli_fetch_assoc($queryr10)){
      // echo $queryres10['uploadtime']."<br>";


echo "<tr>
  <td>".$tdate10." / ".date("g:iA", strtotime($queryres10['uploadtime']))."</td>
  <td></td>
  <td>";
$queryall10="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall10=mysqli_query($conn,$queryall10);
while($resultall10 = mysqli_fetch_assoc($fdataall10)){
      $selectuserid10 = $resultall10['User_Id'];

    if($resultall10['commercialstype']=="gm500" AND $resultall10['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."&selectuserid=$selectuserid10' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
    }
    if($resultall10['commercialstype']=="kg1" AND $resultall10['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."&selectuserid=$selectuserid10' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;1 KG</a>";
    }
    if($resultall10['commercialstype']=="kg2" AND $resultall10['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."&selectuserid=$selectuserid10' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;2 KG</a>";
    }
    if($resultall10['commercialstype']=="kg5" AND $resultall10['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."&selectuserid=$selectuserid10' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;5 KG</a>";
    }
    if($resultall10['commercialstype']=="kg10" AND $resultall10['Active']=="1"){
      echo "<a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."&selectuserid=$selectuserid10' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;10 KG</a>";
    }
}
echo "<a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
&ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
echo "</td></tr>";
// echo "
// <tr>
//   <td>".$tdate10." / ".date("g:iA", strtotime($queryres10['uploadtime']))."</td>
//   <td></td>
//   <td>
//     <a href='mis_report_client_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."' class='btn btn-link' style='color:#5A5A5A'>
//       &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
//   </td>
// </tr>
// ";
    }
  }else{
    // echo $retrunrows10;
      echo "
          <tr>
            <td>".$tdate."</td>
            <td></td>
            <td>
              <a href='mis_report_client_excel.php?date=$tdate10' class='btn btn-link' style='color:#5A5A5A'>
      &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;Download</a>
            </td>
          </tr>
        ";
  }
        ?>


        <?php
            }
        ?>



<?php

    
    
    
    //   VJ Temperary Show
    if($useruinqueidno == "RPXC60"){
        $tdate = "2022-01-06";
        $queryres['uploadtime'] = "15:08:01"; 
              echo "<tr>
          <td>".$tdate." / ".date("g:iA", strtotime($queryres['uploadtime']))."</td>
          <td></td>
          <td>";
        $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
              echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=60' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
        
        echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
        echo "</td></tr>";
        
        $tdate1 = "2022-01-07";
        $queryres1 = "15:00:01"; 
              echo "<tr>
          <td>".$tdate1." / ".date("g:iA", strtotime($queryres1))."</td>
          <td></td>
          <td>";
        $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
              echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=60' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
        
        echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
        echo "</td></tr>";
    
    }elseif($useruinqueidno == "RPXC44"){
        $tdate = "2022-01-06";
        $queryres['uploadtime'] = "15:08:01"; 
              echo "<tr>
          <td>".$tdate." / ".date("g:iA", strtotime($queryres['uploadtime']))."</td>
          <td></td>
          <td>";
        $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
              echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=44' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
        
        echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
        echo "</td></tr>";
        
        $tdate1 = "2022-01-07";
        $queryres1 = "15:00:01"; 
              echo "<tr>
          <td>".$tdate1." / ".date("g:iA", strtotime($queryres1))."</td>
          <td></td>
          <td>";
        $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
              echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=44' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i> &ensp;500 GM</a>";
        
        echo "<a href='mis_report_client_excel.php?date=$tdate&time=".$queryres['uploadtime']."&selectuserid=$user_ids' class='btn btn-link' style='color:#5A5A5A'>
        &ensp;<i class='fa fa-download' aria-hidden='true'></i>&ensp;ALL</a>";
        echo "</td></tr>";
    
    }elseif(empty($count) AND empty($count2) AND empty($count2) AND empty($count3) AND empty($count4) AND empty($count5) AND empty($count6) AND empty($count7) AND empty($count8) AND empty($count9) AND empty($count10))
    {
    //   VJ Temperary Show
    // if(empty($count) AND empty($count2) AND empty($count2) AND empty($count3) AND empty($count4) AND empty($count5) AND empty($count6) AND empty($count7) AND empty($count8) AND empty($count9) AND empty($count10))
    // {
        echo "
            <tr>
              <td colspan='3'><center>Comming Soon</center></td>
            </tr>
        ";
    }

?>

</div>
</div>
</div>
</div>
</section>




<?php
    // include "Layout_Footer.php";
?>
