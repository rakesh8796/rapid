<?php
    include "../Layout_Header_Folder.php";
?>
<div class="panel-body">
<div class="row">

    <div class="container-fluid" style="font-size:21px">


<?php

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

  // echo "<br>-0<br>";
  $query = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate' ORDER BY `mis_id` DESC";
  $queryr = mysqli_query($conn,$query);
  if($retrunrows = mysqli_num_rows($queryr))
  {
    while($queryres = mysqli_fetch_assoc($queryr)){
      // echo $queryres['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate." / ".date("g:iA", strtotime($queryres['uploadtime']))."</div>

    <div class='col-md-4'>

        <a href='mis_report_emp_excel.php?date=$tdate&time=".$queryres['uploadtime']."'>Download</a><br>
    </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows;
    echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>". $tdate ."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>

</div>
";
  }
  // echo "<br>-1<br>";
  $query1 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate1' ORDER BY `mis_id` DESC";
  $queryr1 = mysqli_query($conn,$query1);
  if($retrunrows1 = mysqli_num_rows($queryr1))
  {
    while($queryres1 = mysqli_fetch_assoc($queryr1)){
      // echo $queryres1['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate1." / ".date("g:iA", strtotime($queryres1['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows1;
echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>". $tdate1 ."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate1'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-2<br>";
  $query2 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate2' ORDER BY `mis_id` DESC";
  $queryr2 = mysqli_query($conn,$query2);
  if($retrunrows2 = mysqli_num_rows($queryr2))
  {
    while($queryres2=mysqli_fetch_assoc($queryr2)){
      // echo $queryres2['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate2." / ".date("g:iA", strtotime($queryres2['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows2;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate2."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate2'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-3<br>";
  $query3 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate3' ORDER BY `mis_id` DESC";
  $queryr3 = mysqli_query($conn,$query3);
  if($retrunrows3 = mysqli_num_rows($queryr3))
  {
    while($queryres3=mysqli_fetch_assoc($queryr3)){
      // echo $queryres3['uploadtime']."<br>";

      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate3." / ".date("g:iA", strtotime($queryres3['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows3;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate3."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate3'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-4<br>";
  $query4 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate4' ORDER BY `mis_id` DESC";
  $queryr4 = mysqli_query($conn,$query4);
  if($retrunrows4 = mysqli_num_rows($queryr4))
  {
    while($queryres4=mysqli_fetch_assoc($queryr4)){
      // echo $queryres4['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate4." / ".date("g:iA", strtotime($queryres4['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows4;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate4."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate4'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-5<br>";
  $query5 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate5' ORDER BY `mis_id` DESC";
  $queryr5 = mysqli_query($conn,$query5);
  if($retrunrows5 = mysqli_num_rows($queryr5))
  {
    while($queryres5=mysqli_fetch_assoc($queryr5)){
      // echo $queryres5['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate5." / ".date("g:iA", strtotime($queryres5['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows5;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate5."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate5'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-6<br>";
  $query6 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate6' ORDER BY `mis_id` DESC";
  $queryr6 = mysqli_query($conn,$query6);
  if($retrunrows6 = mysqli_num_rows($queryr6))
  {
    while($queryres6=mysqli_fetch_assoc($queryr6)){
      // echo $queryres6['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate6." / ".date("g:iA", strtotime($queryres6['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows6;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate6."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate6'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-7<br>";
  $query7 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate7' ORDER BY `mis_id` DESC";
  $queryr7 = mysqli_query($conn,$query7);
  if($retrunrows7 = mysqli_num_rows($queryr7))
  {
    while($queryres7=mysqli_fetch_assoc($queryr7)){
      // echo $queryres7['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate7." / ".date("g:iA", strtotime($queryres7['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows7;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate7."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate7'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-8<br>";
  $query8 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate8' ORDER BY `mis_id` DESC";
  $queryr8 = mysqli_query($conn,$query8);
  if($retrunrows8 = mysqli_num_rows($queryr8))
  {
    while($queryres8=mysqli_fetch_assoc($queryr8)){
      // echo $queryres8['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate8." / ".date("g:iA", strtotime($queryres8['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows8;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate8."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate8'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-9<br>";
  $query9 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate9' ORDER BY `mis_id` DESC";
  $queryr9 = mysqli_query($conn,$query9);
  if($retrunrows9 = mysqli_num_rows($queryr9))
  {
    while($queryres9=mysqli_fetch_assoc($queryr9)){
      // echo $queryres9['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate9." / ".date("g:iA", strtotime($queryres9['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows9;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate9."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate9'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }
  // echo "<br>-10<br>";
  $query10 = "SELECT DISTINCT(`uploadtime`) FROM `spark_mis_report` WHERE `uploaddate`='$tdate10' ORDER BY `mis_id` DESC";
  $queryr10 = mysqli_query($conn,$query10);
  if($retrunrows10 = mysqli_num_rows($queryr10))
  {
    while($queryres10=mysqli_fetch_assoc($queryr10)){
      // echo $queryres10['uploadtime']."<br>";
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate10." / ".date("g:iA", strtotime($queryres10['uploadtime']))."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
    }
  }else{
    // echo $retrunrows10;
      echo "
<div class='col-md-12 misreportclass' style='border-bottom:1px solid black'>
    <div class='col-md-4'>".$tdate10."</div>

    <div class='col-md-4'>

    <a href='mis_report_emp_excel.php?date=$tdate10'>Download</a><br>
  </div>
    <div class='col-md-4'>

    </div>
</div>
";
  }

 ?>


    </div>


</div>
</div>
