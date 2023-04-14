<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->


<style type="text/css">
.misreportclass {
    font-size: 14px;
}
</style>









<section class="content">
  <div class="col-md-12" style="background-color:#E7EBEF">
<div class="col-md-12">




    <div class=" white-box fontweighlight">
        <div class="">



          <div class="">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <h5 class="fontweighlight" style="background-color:#33333373;padding:5px">MIS Reports (Last 10 Days)
                  <span class="pull-right">
                    <?php
                    if($_GET['excelfile'] == 'Update'){
                        echo "<div class='success' style='color:black;margin-right:450px'>File Upload Successfully</div>";
                    }elseif($_GET['excelfile'] == 'No Update'){
                        echo "<div class='success' style='color:black;margin-right:450px'>File Not Upload</div>";
                    }elseif($_GET['excelfile'] == 'MIS Delete'){
                        echo "<div class='success' style='color:black;margin-right:450px'>MIS Record Delete Successfully</div>";
                    }elseif($_GET['excelfile'] == 'MIS Not Delete'){
                        echo "<div class='success' style='color:black;margin-right:450px'>MIS Record Not Deleted</div>";
                    }elseif($_GET['excelfile'] == 'Not Working'){
                        echo "<div class='success' style='color:black;margin-right:450px'>No Response</div>";
                    }
                    ?>
                  </span>
                  </h5>
                 </div>
          </div>


        </div>

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

        <a href='mis_report_excel.php?date=$tdate&time=".$queryres['uploadtime']."'>Download</a><br>
    </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate'>
  <input type='hidden' name='datetime' value='".$queryres['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>

</form>
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

    <a href='mis_report_excel.php?date=$tdate'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate1&time=".$queryres1['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate1'>
  <input type='hidden' name='datetime' value='".$queryres1['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate1'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate1'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>

</form>
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

    <a href='mis_report_excel.php?date=$tdate2&time=".$queryres2['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate2'>
  <input type='hidden' name='datetime' value='".$queryres2['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate2'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate2'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate3&time=".$queryres3['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate3'>
  <input type='hidden' name='datetime' value='".$queryres3['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate3'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate3'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate4&time=".$queryres4['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate4'>
  <input type='hidden' name='datetime' value='".$queryres4['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate4'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate4'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate5&time=".$queryres5['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate5'>
  <input type='hidden' name='datetime' value='".$queryres5['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate5'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate5'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate6&time=".$queryres6['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate6'>
  <input type='hidden' name='datetime' value='".$queryres6['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate6'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate6'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate7&time=".$queryres7['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate7'>
  <input type='hidden' name='datetime' value='".$queryres7['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate7'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate7'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate8&time=".$queryres8['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate8'>
  <input type='hidden' name='datetime' value='".$queryres8['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate8'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate8'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate9&time=".$queryres9['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate9'>
  <input type='hidden' name='datetime' value='".$queryres9['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate9'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate9'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate10&time=".$queryres10['uploadtime']."'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate10'>
  <input type='hidden' name='datetime' value='".$queryres10['uploadtime']."'>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
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

    <a href='mis_report_excel.php?date=$tdate10'>Download</a><br>
  </div>
    <div class='col-md-4'>
<form method='post' action='misreports/DeleteMIS.php'>
  <input type='hidden' name='date' value='$tdate10'>
  <input type='hidden' name='datetime' value=''>
  <button class='btn uploadbutton' name='delete' style='color:#fb8678 !important'>Delete</button>
</form>
    </div>
</div>
";
  }

 ?>



        <!-- <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate ?>">Download</a><br>
          </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate1 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate1 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate2 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate2 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate3 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate3 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate4 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate4 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate5 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate5 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate6 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate6 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate7 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate7 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate8 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate8 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid black">
            <div class="col-md-4"><?= $tdate9 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate9 ?>">Download</a><br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4"><?= $tdate10 ?></div>
            <div class="col-md-4">Clients MIS Report</div>
            <div class="col-md-4">

            <a href="mis_report_excel.php?date=<?= $tdate10 ?>">Download</a><br>
            </div>
        </div> -->
    </div>


</div>
</div>
<!-- Excel File -->
<!-- <div class="col-md-3 col-sm-3">
    <a href="mis_report_excel.php" class="btn btn-info btn-block">Download</a>
</div> -->
<!-- Excel File -->

<!-- <table data-toggle="table" data-sort-name="age" data-sort-order="desc"
   data-pagination="true" data-search="true" data-height="400">
<thead>
<tr>
    <th data-field="User ID" data-sortable="true">
    User ID </th>
    <th data-field="Awb No" data-sortable="true">
    Awb No </th>
    <th data-field="Order No" data-sortable="true">
    Order No    </th>
    <th data-field="PickUp Date" data-sortable="true">
    PickUp Date </th>
    <th data-field="Order Status" data-sortable="true">
    Order Status    </th>
    <th data-field="Courier Remark" data-sortable="true">
    Courier Remark  </th>
    <th data-field="Last Status date" data-sortable="true">
    Last Status date    </th>
    <th data-field="Delivery Date" data-sortable="true">
    Delivery Date   </th>
    <th data-field="FirstScanDate" data-sortable="true">
    FirstScanDate   </th>
    <th data-field="FirstScantime" data-sortable="true">
    FirstScantime   </th>
    <th data-field="FirstAttemptDate" data-sortable="true">
    FirstAttemptDate    </th>
    <th data-field="EDD" data-sortable="true">
    EDD </th>
    <th data-field="Origin City" data-sortable="true">
    Origin City     </th>
    <th data-field="Origin pin code" data-sortable="true">
    Origin pin code </th>
    <th data-field="Destination City" data-sortable="true">
    Destination City    </th>
    <th data-field="Destination Pincode" data-sortable="true">
    Destination Pincode </th>
    <th data-field="Customer Name" data-sortable="true">
    Customer Name   </th>
    <th data-field="Customer Contact" data-sortable="true">
    Customer Contact    </th>
    <th data-field="Client Name" data-sortable="true">
    Client Name </th>
    <th data-field="Payment Mode" data-sortable="true">
    Payment Mode    </th>
    <th data-field="COD Amount" data-sortable="true">
    COD Amount  </th>
    <th data-field="Order Ageing" data-sortable="true">
    Order Ageing    </th>
    <th data-field="AttemptCount" data-sortable="true">
    AttemptCount    </th>
    <th data-field="CourierName" data-sortable="true">
    CourierName </th>
    <th data-field="RTO Date" data-sortable="true">
    RTO Date    </th>
    <th data-field="RTOReason" data-sortable="true">
    RTOReason   </th>
    <th data-field="ZoneName" data-sortable="true">
    ZoneName    </th>
    <th data-field="Last OFD Date" data-sortable="true">
    Last OFD Date   </th>
    <th data-field="NDR instructions" data-sortable="true">
    NDR instructions </th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$singleproquery = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$singleproqueryr=mysqli_query($conn,$singleproquery);
while($row = mysqli_fetch_assoc($singleproqueryr))
{
?>
<tr class="record">
    <td><?= $row['user_id'] ?></td>
    <td><?= $row['awbno'] ?></td>
    <td><?= $row['orderno'] ?></td>
    <td><?= $row['pickupdate'] ?></td>
    <td><?= $row['orderstatus'] ?></td>
    <td><?= $row['courierremark'] ?></td>
    <td><?= $row['laststatusdate'] ?></td>
    <td><?= $row['deliverydate'] ?></td>
    <td><?= $row['firstscandate'] ?></td>
    <td><?= $row['firstscantime'] ?></td>
    <td><?= $row['firstattemptdate'] ?></td>
    <td><?= $row['edd'] ?></td>
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
    <td><?= $row['rtodate'] ?></td>
    <td><?= $row['rtoreason'] ?></td>
    <td><?= $row['zonename'] ?></td>
    <td><?= $row['lastofddate'] ?></td>
    <td><?= $row['ndrinstructions'] ?></td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
 -->




<style type="text/css">
.uploadbutton{
    margin-top: -5px !important;
    color: #428bca  !important;
    background-color: #fff0 !important;
    border-color: #fff0 !important;
    outline: 0px auto -webkit-focus-ring-color !important;
    outline-offset: -0px !important;
    font-size: 14px !important;
}
.uploadbuttondwn{
    font-size: 13px !important;
}
</style>


<style>
.white-box1{
  padding:15px !important;
  border-radius:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
</style>

<section class="content">
<!--main content-->
<div class="row">
  <div class="col-md-12">
      <div class="panel white-box1" style="background:#fff;color:white !important">
          <div class="panel-heading">
              <h3 class="panel-title fontweighlight" style="background:#33333373;border-radius:20px;color:#333131">&ensp;&ensp;Upload MIS Report (Rappidx Standard Format)</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12" id="importFrm">
<form method="post" enctype="multipart/form-data">
    <div class="col-md-3">
        <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
    </div>
    <div class="col-md-3">
       <!-- <input type="submit" class="btn btn-primary active" name="importSubmit" value="Upload MIS CSV File"> -->
       <button class="btn uploadbutton" name="importSubmit"><b><u><span style="color:#333131"><i class="fa fa-upload" aria-hidden="true"></i> Upload MIS CSV File  &ensp; </span></b></u></button>
    </div>
</form>
<div class="col-md-3">
    <a href="BulkExcelFiles/MisReports/Sample/Data2.csv" class="uploadbuttondwn" style="color:#333131"><b><u>CSV File With Sample Data</u></b></a>
</div>
<div class="col-md-3">
    <a href="BulkExcelFiles/MisReports/Sample/Mis_Report_Sample2.csv" class="uploadbuttondwn" style="color:#333131"><b><u>CSV File Without Sample Data</u></b></a>
</div>
            </div>
          </div>
          <!--  -->
          <?php
          $tudate = date('Y-m-d');
          if(isset($importSubmit))
          {
// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


          $user_id = $_SESSION['useridis'];
          try {
          //

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
}
// File Extention Check

                  $bannername = $_FILES["bulkorderfile"]["name"];
                  $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
                  move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

                  $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");

                  $column=fgetcsv($fileD);
                  while(!feof($fileD)){
                   $rowData[]=fgetcsv($fileD);
                  }
// echo "<pre>";
// print_r($rowData);
// exit();
                  foreach($rowData as $key => $value){
                    if($value[0]=="" OR $value[18]==""){  continue;   }
                    $singlequery1 = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$value[0]' AND `Company_Name`='$value[18]'";
                    // echo "<br><br>";
                    $queryrunis = mysqli_query($conn,$singlequery1);
                    if(mysqli_num_rows($queryrunis)){
                        $tdate = date("Y-m-d");





$statushow = $value[4];
// echo "<br><br>";
if($value[4]=="Delivered" AND $value[5]=="RTO"){
  $statushow = "RTO Delivered";
}elseif($value[4]=="Undelivered" AND $value[5]=="In Transit"){
  $statushow = "In Transit";
}else{
  if($value[4]=="RTO" OR $value[4]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[4]=="ConnectionPending" OR $value[4]=="In Transit" OR $value[4]=="LH Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[4]=="CSAW Pending" OR $value[4]=="CSAW" OR $value[4]=="Re-Attempt" OR $value[4]=="Undelivered" OR $value[4]=="Not Delivered" OR $value[4]=="CSAW-ReAttempt"){
    $statushow = "Undelivered";
  }elseif($value[4]=="LH RTO Intransit" OR $value[4]=="RT" OR $value[4]=="RTO Connection Pending" OR $value[4]=="RTO In Transit" OR $value[4]=="RTO Notified" OR $value[4]=="RTO Undelivered" OR $value[4]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[4]=="Undelivered – Multiple Attempt" OR $value[4]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[4]=="Not Delivered"){
    $statushow = "Undelivered";
  }elseif($value[4]=="" OR $value[4]==" " OR empty($value[4])){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[4];
  }
}

$statushow = trim($statushow);
if(empty($statushow)){  echo $statushow="Undelivered"; }


$uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[4]',`order_status`='$value[5]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

            $singlequery = "INSERT INTO `spark_mis_report`(`user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`, `courierremark`, `laststatusdate`, `deliverydate`, `firstscandate`, `firstscantime`, `firstattemptdate`, `edd`, `origincity`, `originpincode`, `destinationcity`, `destinationpincode`, `customername`, `customercontact`, `clientname`, `paymentmode`, `codamt`, `orderageing`, `attemptcount`, `couriername`, `rtodate`, `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`) VALUES ('$value[0]','$value[1]','$value[2]','$value[3]','$value[4]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[10]','$value[11]','$value[12]','$value[13]','$value[14]','$value[15]','$value[16]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','$value[25]','$value[26]','$value[27]','$value[28]','$tudate','$upcrttime')";
            mysqli_query($conn,$singlequery);
                        // echo "<br><br>";

                    }
                  }
// echo "<pre>";
// print_r($rowData);
// exit();
                  echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
          //
          } catch (Exception $e) {
                  echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
          }

          }
          ?>
          <!--  -->

              </div>
          </div>
      </div>
</section>














<!-- XpressBees -->
<section class="content">
<!--main content-->
<div class="row">
 <div class="col-md-12">
     <div class="panel white-box1" style="background:#fff;color:white !important">
         <div class="panel-heading">
            <h3 class="panel-title fontweighlight" style="background:#33333373;border-radius:20px;color:#333131">&ensp;&ensp;Upload <span style="color:gold">XpressBees</span> MIS Report</h3>
         </div>
         <div class="panel-body">
        <div class="col-md-12" id="importFrm">
<form method="post" enctype="multipart/form-data">
        <div class="col-md-3">
            <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
        </div>
        <div class="col-md-3">
            <!-- <input type="submit" class="btn btn-primary active" name="XBMailimportSubmit" value="XB Mail MIS CSV File"> -->
            <button class="btn uploadbutton" name="XBMailimportSubmit"><span style="color:#333131"><i class="fa fa-upload" aria-hidden="true"></i> XB Mail MIS CSV File &ensp; </span></button>
        </div>
</form>
          <!-- <div class="col-md-4">
             <form method="post" enctype="multipart/form-data">
                 <input type="file" name="bulkorderfile" required="">
                 <input type="submit" class="btn btn-primary active" name="XBPanelimportSubmit" value="Panel MIS CSV File" style="margin-top: 20px;">
             </form>
          </div> -->
        <div class="col-md-3">        </div>
        <div class="col-md-3">
            <a href="BulkExcelFiles/MisReports/Sample/XpressBees/XB_Final.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV-Uploading Sample File</b></a>
        </div>
          </div>
        </div>
<!--  -->
<?php
$tudate = date('Y-m-d');
// Mail MIS Report
if(isset($XBMailimportSubmit))
{

// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");

  $user_id = $_SESSION['useridis'];
  try {

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
}
// File Extention Check

$bannername = $_FILES["bulkorderfile"]["name"];
$bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

$fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");

$column=fgetcsv($fileD);
while(!feof($fileD)){
$rowData[]=fgetcsv($fileD);
}
// echo "<pre>";
// print_r($rowData);
// exit();
      foreach($rowData as $key => $value){

        if($value[1]==""){  continue;   }
        // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]'";
        $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]' AND `orderno`='$value[2]'";
        $queryrunis = mysqli_query($conn,$singlequery1);
        if(mysqli_num_rows($queryrunis)){
        $crtdata = mysqli_fetch_assoc($queryrunis);
        $tdate = date("Y-m-d");

// First Attempt Date
if(!empty($value[30])){
    $lastupdate = $value[30];
    $date = str_replace('/', '-', $lastupdate);
$value[30] = date("Y-m-d", strtotime($date));
$time30 = date("H:i:s",strtotime($date));
}

// PDD == EDD
if(!empty($value[53])){
    $lastupdate = $value[53];
    $date = str_replace('/', '-', $lastupdate);
$value[53] = date("Y-m-d", strtotime($date));
$time53 = date("H:i:s",strtotime($date));
}

// Delivery Date
if(!empty($value[14])){
    $lastupdate = $value[14];
    $date = str_replace('/', '-', $lastupdate);
$value[14] = date("Y-m-d", strtotime($date));
$time14 = date("H:i:s",strtotime($date));
}

// Last Status Date
if(!empty($value[28])){
    $lastupdate = $value[28];
    $date = str_replace('/', '-', $lastupdate);
$value[28] = date("Y-m-d", strtotime($date));
$time28 = date("H:i:s",strtotime($date));
}

// Manifestation Date == Pickup Date
if(!empty($value[12])){
    $lastupdate = $value[12];
    $date = str_replace('/', '-', $lastupdate);
$value[12] = date("Y-m-d", strtotime($date));
$time12 = date("H:i:s",strtotime($date));
}

// RTO Date
if(!empty($value[35])){
    $lastupdate = $value[35];
    $date = str_replace('/', '-', $lastupdate);
$value[35] = date("Y-m-d", strtotime($date));
$time35 = date("H:i:s",strtotime($date));
}


// Order ageing
$nowtime = time();
$pickupdate = $value[12];
$pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
$pickupdate = strtotime($pickupdate);
$orderageing = $nowtime - $pickupdate;
$orderageing = round($orderageing / (60 * 60 * 24));
// Order ageing



$statushow = $value[26];
// echo "<br><br>";
if($value[26]=="RTD"){
  $statushow = "RTO Delivered";
}elseif($value[26]=="Delivered"){
  $statushow = "Delivered";
}elseif($value[26]=="Undelivered" OR $value[26]=="In Transit"){
  $statushow = "In Transit";
}else{
  if($value[26]=="RTO" OR $value[26]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[26]=="ConnectionPending" OR $value[26]=="In Transit" OR $value[26]=="LH Fwd Intransit" OR $value[26]=="Local Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[26]=="CSAW Pending" OR $value[26]=="CSAW" OR $value[26]=="Re-Attempt" OR $value[26]=="Undelivered" OR $value[26]=="Not Delivered" OR $value[26]=="CSAW-ReAttempt"){
    $statushow = "Undelivered";
  }elseif($value[26]=="LH RTO Intransit" OR $value[26]=="RT" OR $value[26]=="RTO Connection Pending" OR $value[26]=="RTO In Transit" OR $value[26]=="RTO Notified" OR $value[26]=="RTO Undelivered" OR $value[26]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[26]=="Undelivered – Multiple Attempt" OR $value[26]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[26]=="" OR $value[26]==" " OR empty($value[26])){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[26];
  }
}
$statushow = trim($statushow);
if(empty($statushow)){ $statushow="Undelivered"; }

$uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[26]',`order_status`='$value[25]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`, `orderno`, `pickupdate`,`pickuptime`,
`orderstatus`, `courierremark`,`laststatusdate`, `laststatustime`, `deliverydate`,
`firstscandate`, `firstscantime`, `firstattemptdate`, `edd`,`origincity`,
`originpincode`, `destinationcity`, `destinationpincode`, `customername`, `customercontact`,
`clientname`, `paymentmode`, `codamt`, `orderageing`, `attemptcount`,
`couriername`,`rtodate`, `rtoreason`,  `zonename`, `lastofddate`,
`ndrinstructions`,`uploaddate`,`uploadtime`) VALUES (
'$crtdata[User_Id]','$value[1]','$value[2]','$value[12]','$time12',
'$statushow','$value[25]','$value[28]','$time28','$value[14]',
'$value[12]','$time30','$value[30]','$value[53]','$value[5]',
'$value[37]','$value[8]','$value[16]','$crtdata[pickup_name]','$crtdata[Mobile]',
'$value[44]','$value[19]','$value[34]','$orderageing','$value[24]',
'XpressBees','$value[35]','$value[49]','','',
'','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
           // echo "<br><br>";
       }
      }

     echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
      // exit();
  } catch (Exception $e) {
     echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
    // exit();
  }
}
// Mail MIS Report
?>
<!--  -->
           </div>
       </div>
   </div>
</section>
<!-- XpressBees -->




















<!-- DTDC -->
<section class="content">
<!--main content-->
<div class="row">
   <div class="col-md-12">
       <div class="panel white-box1" style="background:#fff;color:white !important">
           <div class="panel-heading">
             <h3 class="panel-title fontweighlight" style="background:#33333373;border-radius:20px;color:#333131">&ensp;&ensp;Upload <span style="color:gold">DTDC</span> MIS Report</h3>
               <!-- <span class="pull-right">
                   <i class="fa fa-fw fa-chevron-up clickable"></i>
                   <i class="fa fa-fw fa-times removepanel clickable"></i>
               </span> -->
           </div>
           <div class="panel-body">
              <div class="col-md-12" id="importFrm">
<form method="post" enctype="multipart/form-data">
    <div class="col-md-3">
        <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
    </div>
    <div class="col-md-3">
        <!-- <input type="submit" class="btn btn-primary active" name="DTDCMailFormat" value="Upload MIS CSV File"> -->
        <button class="btn uploadbutton" name="DTDCMailFormat"><span style="color:#333131"><i class="fa fa-upload" aria-hidden="true"></i> DTDC MIS CSV File &ensp;&ensp;&ensp;</span></button>
    </div>
</form>
              <!-- <div class="col-md-4">
                <form method="post" enctype="multipart/form-data">
                   <input type="file" name="bulkorderfile" required="">
                   <input type="submit" class="btn btn-primary active" name="DTDCPanelFormat" value="Upload MIS CSV File" style="margin-top: 20px;">
                </form>
              </div> -->
<div class="col-md-3">        </div>
<div class="col-md-3">
    <a href="BulkExcelFiles/MisReports/Sample/DTDC/DTDC_Final.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV-Uploading Sample File</b></a>
</div>
              </div>
            </div>
<!--  -->
<?php
$tudate = date('Y-m-d');
if(isset($DTDCMailFormat))
{

// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


$user_id = $_SESSION['useridis'];
try {
//

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
}
// File Extention Check


$bannername = $_FILES["bulkorderfile"]["name"];
$bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

$fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");

$column=fgetcsv($fileD);
while(!feof($fileD)){
$rowData[]=fgetcsv($fileD);
}
  // echo "<pre>";
  // print_r($rowData);
  foreach($rowData as $key => $value){
   if($value[1]==""){  continue;   }
    // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]'";
    $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]' AND `orderno`='$value[2]'";
    $queryrunis = mysqli_query($conn,$singlequery1);
    if(mysqli_num_rows($queryrunis)){

$crtdata = mysqli_fetch_assoc($queryrunis);
$uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$crtdata[User_Id]'";
$uploaduserr = mysqli_query($conn,$uploaduser);
$userd = mysqli_fetch_assoc($uploaduserr);

       $tdate = date("Y-m-d");
      // echo $value[13];
      // echo "&ensp;&ensp;---&ensp;&ensp;";
if(!empty($value[13])){
  $lastupdate = $value[13];
  $value[13] = date("Y-m-d", strtotime($lastupdate));
}

if(!empty($value[8])){
  $lastupdate = $value[8];
  $value[8] = date("Y-m-d", strtotime($lastupdate));
}


// Order ageing
$nowtime = time();
$pickupdate = $value[8];
$pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
$pickupdate = strtotime($pickupdate);
$orderageing = $nowtime - $pickupdate;
$orderageing = round($orderageing / (60 * 60 * 24));
// Order ageing

$statushow = $value[15];
$statushow = trim($statushow);
// echo "<br><br>";
if($value[15]=="RTD"){
  $statushow = "RTO Delivered";
}elseif($value[15]=="Delivered"){
  $statushow = "Delivered";
}elseif($value[15]=="Not Delivered"){
    $statushow = "Undelivered";
}elseif($value[15]=="Undelivered" OR $value[15]=="In Transit"){
  $statushow = "In Transit";
}else{
  if($value[15]=="RTO" OR $value[15]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[15]=="ConnectionPending" OR $value[15]=="In Transit" OR $value[15]=="LH Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[15]=="CSAW Pending" OR $value[15]=="CSAW" OR $value[15]=="Re-Attempt" OR $value[15]=="Undelivered" OR $value[15]=="Not Delivered"){
    $statushow = "Undelivered";
  }elseif($value[15]=="LH RTO Intransit" OR $value[15]=="RT" OR $value[15]=="RTO Connection Pending" OR $value[15]=="RTO In Transit" OR $value[15]=="RTO Notified" OR $value[15]=="RTO Undelivered" OR $value[15]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[15]=="Undelivered – Multiple Attempt" OR $value[15]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[15]=="" OR $value[15]==" " OR empty($value[15])){
    $statushow = "Undelivered";
  }elseif($value[15]==""){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[15];
  }
}

$statushow = trim($statushow);
if(empty($statushow)){ $statushow="Undelivered"; }

$uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[15]',`order_status`='$value[16]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`,
`courierremark`, `laststatusdate`, `laststatustime`, `deliverydate`, `firstscandate`,
`firstscantime`, `firstattemptdate`, `edd`, `origincity`, `originpincode`,
`destinationcity`, `destinationpincode`, `customername`, `customercontact`, `clientname`,
`paymentmode`, `codamt`, `orderageing`, `attemptcount`, `couriername`,
`rtodate`, `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,
`uploaddate`,`uploadtime`
) VALUES (
'$crtdata[User_Id]','$value[1]','$value[2]','$value[8]','$statushow',
'$value[16]','$value[13]','$value[14]','','$value[8]',
'','','','$value[5]','$value[4]',
'$value[7]','$value[6]','$userd[Company_Name]','$crtdata[Mobile]','$crtdata[Name]',
'','','$orderageing','','DTDC',
'','','','','',
'$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
       // echo "<br><br>";
   }
  }
  echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
  //
  // exit();
  } catch (Exception $e) {
    // exit();
  echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
  }

}
?>
<!--  -->
         </div>
     </div>
 </div>
</section>
<!-- DTDC -->















<!-- Delhivery -->
<section class="content">
<!--main content-->
<div class="row">
 <div class="col-md-12">
     <div class="panel white-box1" style="background:#fff;color:white !important">
         <div class="panel-heading">
           <h3 class="panel-title fontweighlight" style="background:#33333373;border-radius:20px;color:#333131">&ensp;&ensp;Upload <span style="color:gold">Delhivery</span> MIS Report</h3>
         </div>
         <div class="panel-body">
        <div class="col-md-12" id="importFrm">
<form method="post" enctype="multipart/form-data">
        <div class="col-md-3">
            <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
        </div>
        <div class="col-md-3">
            <!-- <input type="submit" class="btn btn-primary active" name="DelhiveryMailimportSubmit" value="Mail MIS CSV File"> -->
            <button class="btn uploadbutton" name="DelhiveryMailimportSubmit"><span style="color:#333131"><i class="fa fa-upload" aria-hidden="true"></i> Delhivery MIS CSV File</span></button>
        </div>
</form>
          <!-- <div class="col-md-4">
             <form method="post" enctype="multipart/form-data">
                 <input type="file" name="bulkorderfile" required="">
                 <input type="submit" class="btn btn-primary active" name="DelhiveryPanelimportSubmit" value="Panel MIS CSV File" style="margin-top: 20px;">
             </form>
          </div> -->
<div class="col-md-3">        </div>
<div class="col-md-3">
    <a href="BulkExcelFiles/MisReports/Sample/Delhivery/Delhivery_Final.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV-Uploading Sample File</b></a>
</div>
          </div>
        </div>
<!--  -->
<?php





$tudate = date('Y-m-d');
// Mail MIS Report
if(isset($DelhiveryMailimportSubmit))
{

// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


  $user_id = $_SESSION['useridis'];
  try {

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
}
// File Extention Check

     $bannername = $_FILES["bulkorderfile"]["name"];
     $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
     move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");
     $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
     $column=fgetcsv($fileD);
     while(!feof($fileD)){
      $rowData[]=fgetcsv($fileD);
     }
      foreach($rowData as $key => $value){
       if($value[0]==""){  continue;   }
       // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[0]'";
       $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[0]' AND `orderno`='$value[3]'";
       $queryrunis = mysqli_query($conn,$singlequery1);
       if(mysqli_num_rows($queryrunis)){
           $tdate = date("Y-m-d");
$crtdata = mysqli_fetch_assoc($queryrunis);
$uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$crtdata[User_Id]'";
$uploaduserr = mysqli_query($conn,$uploaduser);
$userd = mysqli_fetch_assoc($uploaduserr);


// Pickup Date
if(!empty($value[5])){
  $lastupdate = $value[5];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
  $value[5] = date("Y-m-d", strtotime($lastupdate));
}
// Delhivery Date
if(!empty($value[24])){
  $lastupdate = $value[24];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
  $value[24] = date("Y-m-d", strtotime($lastupdate));
}
// Estimate Delhivery Date
if(!empty($value[26])){
  $lastupdate = $value[26];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
  $value[26] = date("Y-m-d", strtotime($lastupdate));
}
// Last Update Date
if(!empty($value[29])){
  $lastupdate = $value[29];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
  $value[29] = date("Y-m-d", strtotime($lastupdate));
}
// echo "<br>";

// Origin City
$origincity = $crtdata['pickup_city'];
// Origin Pincode
$originpincode = $crtdata['pickup_pincode'];
// Order ageing
$nowtime = time();
$pickupdate = $value[5];
$pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
$pickupdate = strtotime($pickupdate);
$orderageing = $nowtime - $pickupdate;
$orderageing = round($orderageing / (60 * 60 * 24));
// Order ageing

$rtodate = '0000-00-00';
$deldate = '0000-00-00';


$statushow = $value[10];
// echo "<br><br>";
if($value[10]=="Delivered" AND $value[8]=="RTO"){
  $rtodate = $value[24];
  $statushow = "RTO Delivered";
}elseif($value[10]=="Undelivered" AND $value[8]=="In Transit"){
  $statushow = "In Transit";
}elseif($value[10]=="Delivered" AND $value[8]=="Delivered"){
  $deldate = $value[24];
  $statushow = "Delivered";
}else{
  if($value[10]=="RTO" OR $value[10]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[10]=="ConnectionPending" OR $value[10]=="In Transit" OR $value[10]=="LH Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[10]=="CSAW Pending" OR $value[10]=="CSAW" OR $value[10]=="Re-Attempt" OR $value[10]=="Undelivered" OR $value[10]=="Not Delivered"){
    $statushow = "Undelivered";
  }elseif($value[10]=="LH RTO Intransit" OR $value[10]=="RT" OR $value[10]=="RTO Connection Pending" OR $value[10]=="RTO In Transit" OR $value[10]=="RTO Notified" OR $value[10]=="RTO Undelivered" OR $value[10]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[10]=="Undelivered – Multiple Attempt" OR $value[10]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[10]=="Not Delivered"){
    $statushow = "Undelivered";
  }elseif($value[10]=="" OR $value[10]==" " OR empty($value[10])){
    $statushow = "Undelivered";
  }elseif($value[10]==""){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[10];
  }
}

$statushow = trim($statushow);
if(empty($statushow)){ $statushow="Undelivered"; }


$uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[10]',`order_status`='$value[8]',`order_status_show`='$statushow' WHERE `orderno`='$value[3]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`,
`courierremark`,`laststatusdate`, `deliverydate`, `firstscandate`, `firstscantime`,
`firstattemptdate`, `edd`, `origincity`, `originpincode`, `destinationcity`,
`destinationpincode`, `customername`, `customercontact`, `clientname`, `paymentmode`,
`codamt`, `orderageing`, `attemptcount`,`couriername`, `rtodate`,
`rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`
) VALUES (
'$crtdata[User_Id]','$value[0]','$value[3]','$value[5]','$statushow',
'$value[8]','$value[29]','$deldate','$value[4]','',
'$value[28]','$value[26]','$origincity','$originpincode','$value[16]',
'$value[18]','$userd[Company_Name]','$crtdata[Mobile]','$crtdata[Name]','$value[7]',
'$value[15]','$orderageing','$value[12]','Delhivery','$rtodate',
'','','','','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
// echo "<br><br>";
       }
      }

     echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
  } catch (Exception $e) {
     echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
  }
}
// Mail MIS Report

?>
<!--  -->
           </div>
       </div>
   </div>
</section>
<!-- Delhivery -->
























            </div>
        </div>
    </div>
</div>
</section>











</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
