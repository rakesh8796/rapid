<?php
    include "Layout_Header_Table.php";
?>

<!-- Page Content -->




<div class="col-md-12" style="background:#edf1f5">
<div class="row bg-title" style="padding:0px 0px 0px 20px">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h5 class="" style="font-weight:600">UPLOAD BULK ORDERS
<span class="pull-right">
    <?php
    if($_GET['excelfile'] == 'Update'){
      echo "<div class='success' style='color:green;margin-right:450px'>Please wait file is processing</div>";
    }elseif($_GET['excelfile'] == 'No Update'){
        echo "<div class='success' style='color:red;margin-right:450px'>File Not Upload</div>";
    }elseif($_GET['excelfile'] == 'Cancel Order'){
        echo "<div class='success' style='color:gray;margin-right:450px'>Order Cancel Successfully</div>";
    }elseif($_GET['excelfile'] == 'invalid Details'){
        echo "<div class='success' style='color:gray;margin-right:450px'>Invalid Details | Please Try Again</div>";
    }elseif($_GET['excelfile'] == 'Invalid Data'){
        echo "<div class='success' style='color:gray;margin-right:450px'>Invalid Details | Please Try Again</div>";
    }elseif($_GET['excelfile'] == 'Invalid Data1'){
        echo "<div class='success' style='color:gray;margin-right:450px'>Invalid Details | Please Try Again</div>";
    }
    ?>
</span>
    </h5>
  </div>
</div>










<section class="content">
<!--main content-->
<div class="col-md-12">
<div class="col-md-12">
  <div class="panel panel-primary">




















    <script>
    function openCity(cityName) {
      var i;
      var x = document.getElementsByClassName("city");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(cityName).style.display = "block";
    }
    </script>

    <!--  -->
    <fieldset>
            <!-- <legend>Commercials</legend> -->
    <legend>
        <div class="row" style="color:brown">
            <div class="col-md-2" style="color:black">
                <h5>&ensp; Select Weight</h5>
            </div>


<?php
    $useruinqueidno = $_SESSION['useruinqueidno'];
    $user_id = $_SESSION['useridis'];

    $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
    $fdataall=mysqli_query($conn,$queryall);
    $numrowall=mysqli_num_rows($fdataall);

    // echo "<br>";
    // print_r($resultalls);
    while($resultall = mysqli_fetch_assoc($fdataall)){
        // echo $resultall['useruinqueparentid'];
        // echo $resultall['User_Id'];
        // echo $resultall['useruinqueidno'];
        // echo $resultall['commercialstype'];
        // echo $resultall['Active'];

        if($resultall['commercialstype']=="gm500" AND $resultall['Active']=="1"){
    ?>
            <div class="col-md-2">
                <h5><label>
                    <input type="radio" name="commercialstype" value="gm500" onclick="openCity('gm500')" style="cursor:pointer" checked=""> 500 GM
                </label></h5>
            </div>
    <?php
        }
        if($resultall['commercialstype']=="kg1" AND $resultall['Active']=="1"){
    ?>
            <div class="col-md-2">
                <h5><label>
                    <input type="radio" name="commercialstype" value="kg1" onclick="openCity('kg1')" style="cursor:pointer"> 1 KG
                </label></h5>
            </div>
    <?php
        }
        if($resultall['commercialstype']=="kg2" AND $resultall['Active']=="1"){
    ?>
            <div class="col-md-2">
                <h5><label>
                    <input type="radio" name="commercialstype" value="kg2" onclick="openCity('kg2')" style="cursor:pointer"> 2 KG
                </label></h5>
            </div>
    <?php
        }
        if($resultall['commercialstype']=="kg5" AND $resultall['Active']=="1"){
    ?>
            <div class="col-md-2">
                <h5><label>
                    <input type="radio" name="commercialstype" value="kg5" onclick="openCity('kg5')" style="cursor:pointer"> 5 KG
                </label></h5>
            </div>
    <?php
        }
        if($resultall['commercialstype']=="kg10" AND $resultall['Active']=="1"){
    ?>
            <div class="col-md-2">
                <h5><label>
                    <input type="radio" name="commercialstype" value="kg10" onclick="openCity('kg10')" style="cursor:pointer"> 10 KG
                </label></h5>
            </div>
    <?php
        }
    }
     ?>



        </div>
    </legend>





<style media="screen">
.btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary.focus:active, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .btn-primary.focus, .btn-primary:focus {
  background-color: #5b94c5 !important;
  border: 1px solid #5b94c5 !important;
}
a>b,a>i{
  color: #33333373 !important;
}
</style>



    <?php

    $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
    $fdataall=mysqli_query($conn,$queryall);
    $numrowall=mysqli_num_rows($fdataall);

    if(empty($numrowall)){
    ?>

    <?php


    }else{



    while($resultall = mysqli_fetch_assoc($fdataall)){
        // echo $resultall['useruinqueparentid'];
        // echo $resultall['User_Id'];
        // echo $resultall['useruinqueidno'];
        // echo $resultall['commercialstype'];
        // echo $resultall['Active'];

        if($resultall['commercialstype']=="gm500" AND $resultall['Active']=="1"){
    ?>
    <!-- 500 GM -->
    <div id="gm500" class="city">
      <div class="row">
          <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
        <div class="col-md-3">
            <input type="file" name="bulkorderfile" required="" onchange="inputfile500gm(this)" style="width:100%">
        </div>
        <div class="col-md-3">
            <input type="hidden" name="selectedweightidis" value="<?= $resultall['User_Id'] ?>">
            <input type="submit" class="btn btn-primary active" name="importSubmit5gm" value="Upload CSV File"  title="Please Select First Upload File" disabled="" id="inputsubmitn500gm">
            <input type="submit" class="btn btn-primary active" name="importSubmit5gm" value="Upload CSV File"  title="Please Select First Upload File"  style="display:none;" id="inputsubmits500gm">
        </div>
    </form>
    <script type="text/javascript">
    function inputfile500gm(fileInput){
      const selectedFile = fileInput.files[0];
      console.log(selectedFile['name']);
      extension = selectedFile['name'].split('.').pop();
      // alert(extension);
      if(extension == "csv"){
        document.getElementById("inputsubmitn500gm").style.display = "none";
        document.getElementById("inputsubmits500gm").style.display = "block";
      }else{
        alert("Please Upload CSV File");
        document.getElementById("inputsubmitn500gm").style.display = "block";
        document.getElementById("inputsubmits500gm").style.display = "none";
      }
    }
    </script>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File With Sample Data</b></a>
            </div>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File Without Sample Data</b></a>
            </div>
        </div>
      </div>
    </div>
    <!-- 500 GM -->

    <?php
        }
        if($resultall['commercialstype']=="kg1" AND $resultall['Active']=="1"){
    ?>
    <!-- 1 KG -->
    <div id="kg1" class="city" style="display:none">
      <div class="row">
          <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
    <div class="col-md-3">
      <input type="file" name="bulkorderfile" required="" onchange="inputfile1kg(this)">
    </div>
    <div class="col-md-3">
      <input type="hidden" name="selectedweightidis" value="<?= $resultall['User_Id'] ?>">
      <input type="submit" class="btn btn-primary active" name="importSubmit1kg" value="Upload CSV File" title="Please Select First Upload File" disabled="" id="inputsubmitn1kg">
      <input type="submit" class="btn btn-primary active" name="importSubmit1kg" value="Upload CSV File" title="Please Select First Upload File"  style="display:none;" id="inputsubmits1kg">
    </div>
    </form>
    <script type="text/javascript">
    function inputfile1kg(fileInput){
      const selectedFile = fileInput.files[0];
      console.log(selectedFile['name']);
      extension = selectedFile['name'].split('.').pop();
      // alert(extension);
      if(extension == "csv"){
        document.getElementById("inputsubmitn1kg").style.display = "none";
        document.getElementById("inputsubmits1kg").style.display = "block";
      }else{
        alert("Please Upload CSV File");
        document.getElementById("inputsubmitn1kg").style.display = "block";
        document.getElementById("inputsubmits1kg").style.display = "none";
      }
    }
    </script>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File With Sample Data</b></a>
            </div>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File Without Sample Data</b></a>
            </div>
        </div>
      </div>
    </div>
    <!-- 1 KG -->

    <?php
        }
        if($resultall['commercialstype']=="kg2" AND $resultall['Active']=="1"){
    ?>
    <!-- 2 KG -->
    <div id="kg2" class="city" style="display:none">
      <div class="row">
          <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
    <div class="col-md-3">
      <input type="file" name="bulkorderfile" required="" onchange="inputfile2kg(this)">
    </div>
    <div class="col-md-3">
      <input type="hidden" name="selectedweightidis" value="<?= $resultall['User_Id'] ?>">
      <input type="submit" class="btn btn-primary active" name="importSubmit2kg" value="Upload CSV File" title="Please Select First Upload File" disabled="" id="inputsubmitn2kg">
      <input type="submit" class="btn btn-primary active" name="importSubmit2kg" value="Upload CSV File" title="Please Select First Upload File"  style="display:none;" id="inputsubmits2kg">
    </div>
    </form>
    <script type="text/javascript">
    function inputfile2kg(fileInput){
      const selectedFile = fileInput.files[0];
      console.log(selectedFile['name']);
      extension = selectedFile['name'].split('.').pop();
      // alert(extension);
      if(extension == "csv"){
        document.getElementById("inputsubmitn2kg").style.display = "none";
        document.getElementById("inputsubmits2kg").style.display = "block";
      }else{
        alert("Please Upload CSV File");
        document.getElementById("inputsubmitn2kg").style.display = "block";
        document.getElementById("inputsubmits2kg").style.display = "none";
      }
    }
    </script>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File With Sample Data</b></a>
            </div>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File Without Sample Data</b></a>
            </div>
        </div>
      </div>
    </div>
    <!-- 2 KG -->

    <?php
        }
        if($resultall['commercialstype']=="kg5" AND $resultall['Active']=="1"){
    ?>
    <!-- 5 KG -->
    <div id="kg5" class="city" style="display:none">
      <div class="row">
          <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
    <div class="col-md-3">
      <input type="file" name="bulkorderfile" required="" onchange="inputfile5kg(this)">
    </div>
    <div class="col-md-3">
      <input type="hidden" name="selectedweightidis" value="<?= $resultall['User_Id'] ?>">
      <input type="submit" class="btn btn-primary active" name="importSubmit5kg" value="Upload CSV File" title="Please Select First Upload File" disabled="" id="inputsubmitn5kg">
      <input type="submit" class="btn btn-primary active" name="importSubmit5kg" value="Upload CSV File" title="Please Select First Upload File"  style="display:none;" id="inputsubmits5kg">
    </div>
    </form>
    <script type="text/javascript">
    function inputfile5kg(fileInput){
      const selectedFile = fileInput.files[0];
      console.log(selectedFile['name']);
      extension = selectedFile['name'].split('.').pop();
      // alert(extension);
      if(extension == "csv"){
        document.getElementById("inputsubmitn5kg").style.display = "none";
        document.getElementById("inputsubmits5kg").style.display = "block";
      }else{
        alert("Please Upload CSV File");
        document.getElementById("inputsubmitn5kg").style.display = "block";
        document.getElementById("inputsubmits5kg").style.display = "none";
      }
    }
    </script>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File With Sample Data</b></a>
            </div>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File Without Sample Data</b></a>
            </div>
        </div>
      </div>
    </div>
    <!-- 5 KG -->

    <?php
        }
        if($resultall['commercialstype']=="kg10" AND $resultall['Active']=="1"){
    ?>
    <!-- 10 KG -->
    <div id="kg10" class="city" style="display:none">
      <div class="row">
          <div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
    <div class="col-md-3">
      <input type="file" name="bulkorderfile" required="" onchange="inputfile10kg(this)">
    </div>
    <div class="col-md-3">
      <input type="hidden" name="selectedweightidis" value="<?= $resultall['User_Id'] ?>">
      <input type="submit" class="btn btn-primary active" name="importSubmit10kg" value="Upload CSV File" title="Please Select First Upload File" disabled="" id="inputsubmitn10kg">
      <input type="submit" class="btn btn-primary active" name="importSubmit10kg" value="Upload CSV File" title="Please Select First Upload File"  style="display:none;" id="inputsubmits10kg">
    </div>
    </form>
    <script type="text/javascript">
    function inputfile10kg(fileInput){
      const selectedFile = fileInput.files[0];
      console.log(selectedFile['name']);
      extension = selectedFile['name'].split('.').pop();
      // alert(extension);
      if(extension == "csv"){
        document.getElementById("inputsubmitn10kg").style.display = "none";
        document.getElementById("inputsubmits10kg").style.display = "block";
      }else{
        alert("Please Upload CSV File");
        document.getElementById("inputsubmitn10kg").style.display = "block";
        document.getElementById("inputsubmits10kg").style.display = "none";
      }
    }
    </script>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File With Sample Data</b></a>
            </div>
            <div class="col-md-3">
                <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File Without Sample Data</b></a>
            </div>
        </div>
      </div>
    </div>
    <!-- 10 KG -->
    <?php
        }
    }
     ?>


    <?php
    }
     ?>



    <fieldset>






    <!-- <div class="panel-body">
      <div class="col-md-3 head">
          <div class="float-right">
              <a href="javascript:void(0);" class="btn btn-success active" onclick="formToggle('importFrm');"><i class="plus"></i> Bulk Order Format </a>
          </div>
      </div>
      <div class="col-md-9" id="importFrm" style="display: none;">
          <div class="col-md-7">
              <form method="post" enctype="multipart/form-data">
                  <input type="file" name="bulkorderfile" required="">
                  <input type="submit" class="btn btn-primary active" name="importSubmit" value="Upload CSV File" style="margin-top: 20px;">
              </form>
          </div>
          <div class="col-md-5">
              <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><b>CSV File With Sample Data</b></a>
              <br><br>
              <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><b>CSV File Without Sample Data</b></a>
          </div>
      </div>
    </div> -->
    <br>
    <br>
                    </div>
                </div>
            </div>
    </section>










































    <!-- <script type='text/javascript'>
    function test(){
      // alert('a');
      $("#test1").html('Loading...');
      $("#test1").html();
    }
    </script> -->




<section class="content">
<div class="col-md-12">
<div class="col-md-12">


<div class="panel filterable" style="border-radius:10px 10px 0px 0px">
<div class="panel-heading" style="background-color:#33333373;padding:1px 0px 0px 20px;border-radius:10px 10px 0px 0px">
<h5 style="color:#333333;font-weight:100"><b>Bulk Order</b>
<span class="pull-right">
<?php
if($_GET['excelfile'] == 'Update'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Update Successfully</div>";
}elseif($_GET['excelfile'] == 'NotUpdate'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Not Updated</div>";
}elseif($_GET['excelfile'] == 'No Update'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Not Updated</div>";
}elseif($_GET['excelfile'] == 'invalid Details'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid CSV File Details</div>";
}elseif($_GET['excelfile'] == 'Invalid Data'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid Hub/Pickup Address</div>";
}elseif($_GET['excelfile'] == 'Invalid Data1'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Invalid Hub/Pickup Address</div>";
}elseif($_GET['excelfile'] == 'Cancel Order'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Order Canceled</div>";
}elseif($_GET['excelfile'] == 'Not Canceled'){
  echo "<div class='success' style='color:#fff;margin-right:450px'>Order Not Canceled</div>";
}
?>
</span>
</h5>
</div>
    <div class="panel-body" id="test1">

    <!-- Excel File -->
    <div class="col-md-12">
      <div class="col-md-4"></div>
      <div class="col-md-4">
          <a href="bulkorderuploadnot_excel.php" class="btn btn-block" style="border-radius:20px;color:white;background-color:#7c7c82;border-color:#7c7c82">Download Failed Orders</a>
      </div>
      <div class="col-md-4">
          <a href="bulkorderupload_excel.php" class="btn btn-block" style="border-radius:20px;color:white;background-color:#7c7c82;border-color:#7c7c82">Download Successfull Orders</a>
        </div>
    </div>
    <!-- Excel File -->

<form method="get" action="#">

<div class="table-responsive">
<table id="myTable" class="table table-striped">
<thead>
    <tr>
        <!-- <th data-field="Order No" data-sortable="true">Order No</th> -->
        <th data-field="state" data-checkbox="true"></th>
        <th data-field="AWB Number" data-sortable="true">AWB Number</th>
        <th data-field="Customer Name" data-sortable="true">Customer Name</th>
        <th data-field="Customer Mobile" data-sortable="true">Customer Mobile</th>
        <th data-field="Customer Address" data-sortable="true">Customer Address</th>
        <th data-field="Customer State" data-sortable="true">Customer State</th>
        <th data-field="Customer City" data-sortable="true">Customer City</th>
        <th data-field="Customer Pincode" data-sortable="true">Customer Pincode</th>

        <th data-field="Product Name" data-sortable="true">Product Name</th>
        <th data-field="Quantity" data-sortable="true">Quantity</th>
        <th data-field="L/W/H" data-sortable="true">L/W/H</th>
        <th data-field="Weight" data-sortable="true">Weight</th>
        <th data-field="Total Amt" data-sortable="true">Total Amt</th>
        <th data-field="COD Amt" data-sortable="true">COD Amt</th>
        <th data-field="Additional Type" data-sortable="true">Additional Type</th>
        <th data-field="Upload Time" data-sortable="true">Upload Time</th>

        <th data-field="Pickup Id" data-sortable="true">Pickup Id</th>
        <th data-field="Pickup Name" data-sortable="true">Pickup Name</th>
        <th data-field="Pickup Mobile" data-sortable="true">Pickup Mobile</th>
        <th data-field="Pickup Address" data-sortable="true">Pickup Address</th>
        <th data-field="Pickup State" data-sortable="true">Pickup State</th>
        <th data-field="Pickup City" data-sortable="true">Pickup City</th>
        <th data-field="Pickup Pincode" data-sortable="true">Pickup Pincode</th>
        <th data-field="Order Status" data-sortable="true">Order Status</th>
    </tr>
    </thead>
    <tbody>
    <!--  -->
    <?php
    $tdate = date("Y-m-d");
    $totalnoosorders = 0;
    //
    $useridisa = array();
    $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
    $fdataall=mysqli_query($conn,$queryall);
    $numrowall=mysqli_num_rows($fdataall);
    if($numrowall>1){
        while($resultall = mysqli_fetch_assoc($fdataall)){
            $useridisa[] = $resultall['User_Id'];
        }
        $user_ids = implode(",",$useridisa);
    }else{
      $user_ids = $user_id;
    }
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Excel' AND `Awb_Number`!='' AND `awb_gen_by`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
    //

    // $singleproquery = "SELECT * FROM `spark_single_order` ORDER BY `Single_Order_Id` DESC";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
      if($row['order_cancel']){
    ?>
      <tr class="record danger">
    <?php
      }else{
    ?>
      <tr class="record ">
    <?php
      }
    ?>
        <!-- <td>
            <input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">
            <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">
        </td> -->
        <td>
            <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">
            <input type="hidden" name="shippingallorders[]" value="<?= $row['orderno'] ?>">
            <label>
                <input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">
                <?php echo $row['orderno']; ?>
            </label>
        </td>
        <td><?php echo $row['Awb_Number']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Mobile']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td><?php echo $row['State']; ?></td>
        <td><?php echo $row['City']; ?></td>
        <td><?php echo $row['Pincode']; ?></td>

        <td><?php echo $row['Item_Name']; ?></td>
        <td><?php echo $row['Quantity']; ?></td>
        <td><?php echo $row['Length']; ?> x <?php echo $row['Width']; ?> x <?php echo $row['Height']; ?></td>
        <td><?php echo $row['Actual_Weight']; ?></td>
        <td><?php echo $row['Total_Amount']; ?></td>
        <td><?php echo $row['Cod_Amount']; ?></td>
        <td><?php echo $row['additionaltype']; ?></td>
        <td><?php echo $row['Rec_Time_Date']; ?></td>

        <td><?php echo $row['pickup_id']; ?></td>
        <td><?php echo $row['pickup_name']; ?></td>
        <td><?php echo $row['pickup_mobile']; ?></td>
        <td><?php echo $row['pickup_address']; ?></td>
        <td><?php echo $row['pickup_state']; ?></td>
        <td><?php echo $row['pickup_city']; ?></td>
        <td><?php echo $row['pickup_pincode']; ?></td>
        <td><?php echo $row['order_status1']; ?></td>
    </tr>
    <?php
    $totalnoosorders++;
    }
    ?>
    <!--  -->
    </tbody>
    </table>
</div>
<br><br>
    <?php
    if($totalnoosorders>0){
    ?>
    <div class="row">
        <div class="col-md-2">
    <input type="submit" name="selectedlabels" class="btn btn-success" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="Selected Labels Print">
        </div>
        <div class="col-md-2">
    <input type="submit" name="alllabels" class="btn btn-success" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="All Labels Print">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3 text-right">
    <input type="submit" name="cancelorders" class="btn btn-danger" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="Cancel Selected Orders" onclick="return confirm('Are you sure Delete this orders?')">
        </div>
        <div class="col-md-2">
    <input type="submit" name="allcancelorders" class="btn btn-danger" style="border-radius:20px;background-color:#7c7c82;border-color:#7c7c82" value="Cancel All Orders" onclick="return confirm('Are you sure Delete this orders?')">
        </div>
        <div class="col-md-1"></div>
    </div>
    <?php
    }
    ?>

    </form>



                        </div>
                    </div>
                </div>
            </div>
            </section>



















<!-- Order Shipping Labels -->
<?php
if(isset($selectedlabels)){
    // print_r($selectedcancelorders);
    $selectedcancelorders = serialize( $selectedcancelorders );
    echo "<script> window.location.assign('Shipping_Labels_Check.php?ordernos=$selectedcancelorders')</script>";
}
if(isset($alllabels)){
    // print_r($shippingallorders);
    $shippingallorders = serialize( $shippingallorders );
    echo "<script> window.location.assign('Shipping_Labels_Check.php?ordernos=$shippingallorders')</script>";
}
?>

<!-- Order Shipping Labels -->












    <!-- Multiple Orders Cancel -->
    <?php
    if(isset($cancelorders)){
        print_r($selectedcancelorders);
        foreach($selectedcancelorders as $cancelrpdxnois){

    // $cancelrpdxnois."--> ";

    $queryall = "SELECT * FROM `spark_single_order` WHERE `orderno`='$cancelrpdxnois'";
    $fdataall=mysqli_query($conn,$queryall);
    // $numrowall=mysqli_num_rows($fdataall);
    $resultall = mysqli_fetch_assoc($fdataall);
    $ordernoisa = $resultall['orderno'];
    $awbnoisa = $resultall['Awb_Number'];
    $couriername = $resultall['awb_gen_by'];

    // <!--    Cancel Orders   -->
    // XpressBees
    if($couriername=="XpressBees"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://xbclientapi.xbees.in/POSTShipmentService.svc/RTONotifyShipment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "XBkey": "dSsID3156mssewRrPSkspKSq",
          "AWBNumber": "'.$awbnoisa.'",
          "RTOReason": "Fraud Cancellation"
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Cookie: ASP.NET_SessionId=n101nuhvwipvzvuplef0egqa'
        ),
        ));

        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        // echo "<br>";
      if($response1['RTONotifyShipment'][0]['ReturnMessage'] == "successful"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        mysqli_query($conn,$updateorderid);
      }

    // XpressBees
    }elseif($couriername=="DTDC"){
    // DTDC
        // echo "DTDC";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.shipsy.in/api/client/integration/consignment/cancellation',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "AWBNo": ["'.$awbnoisa.'"],
    "customerCode":"GL2467"
    }',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic ZTA4MjE1MGE3YTQxNWVlZjdkMzE0NjhkMWRkNDY1Og=='
    ),
    ));
    $response = curl_exec($curl);
    $response1 = json_decode($response, true);
    curl_close($curl);
    // echo $response1;
    // print_r($response1);
    // exit();
    // echo "<br>";
    if($response1['status'] == "OK" AND $response1['success'] == "true"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        mysqli_query($conn,$updateorderid);
    }



    // DTDC
    }elseif($couriername=="Shadowfax"){
    // Shadowfax
        echo "Shadowfax";
        echo "<br>";
        echo $ordernoisa;
        echo "<br>";
        echo $awbnoisa;

    // Shadowfax
    }elseif($couriername=="Delhivery"){
    // Delhivery
        // echo "Delhivery";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;
                
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "waybill": "'.$awbnoisa.'",
            "cancellation": "true"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        
        // echo "<pre>";
        // print_r($response1);
        // echo "</pre>";
        if($response1['remark'] == "Shipment has been cancelled."){
            echo $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
        }

    // Delhivery
    }elseif($couriername=="Delhivery2"){
    // Delhivery 2nd API
        // echo "Delhivery";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;
                
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "waybill": "'.$awbnoisa.'",
            "cancellation": "true"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 6f82518fd0e9772ede80d1ec821013d41f11de05',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        
        // echo "<pre>";
        // print_r($response1);
        // echo "</pre>";
        if($response1['remark'] == "Shipment has been cancelled."){
            echo $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
        }

      }
    // Delhivery 2nd API
    // <!--    Cancel Orders   -->
    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Cancel Order')</script>";
    // exit();

        }
    }


    // All Upload File Cancel/Delete
    if(isset($allcancelorders)){
        // print_r($cancelallorders);
        foreach($cancelallorders as $cancelrpdxno){
    // echo $cancelrpdxno."--> ";

    $queryall = "SELECT * FROM `spark_single_order` WHERE `orderno`='$cancelrpdxno'";
    $fdataall=mysqli_query($conn,$queryall);
    // $numrowall=mysqli_num_rows($fdataall);
    $resultall = mysqli_fetch_assoc($fdataall);
    $ordernoisa = $resultall['orderno'];
    $awbnoisa = $resultall['Awb_Number'];
    $couriername = $resultall['awb_gen_by'];

    // <!--    Cancel Orders   -->
    // XpressBees
    if($couriername=="XpressBees"){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://xbclientapi.xbees.in/POSTShipmentService.svc/RTONotifyShipment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "XBkey": "dSsID3156mssewRrPSkspKSq",
          "AWBNumber": "'.$awbnoisa.'",
          "RTOReason": "Fraud Cancellation"
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Cookie: ASP.NET_SessionId=n101nuhvwipvzvuplef0egqa'
        ),
        ));

        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo "<pre>";
        // print_r($response1);
        // echo "</pre>";
        // echo $response;
        echo "<br>";
          if($response1['RTONotifyShipment'][0]['ReturnMessage'] == "successful"){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
          }

    // XpressBees
    }elseif($couriername=="DTDC"){
    // DTDC
        // echo "DTDC";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.shipsy.in/api/client/integration/consignment/cancellation',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "AWBNo": ["'.$awbnoisa.'"],
    "customerCode":"GL2467"
    }',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic ZTA4MjE1MGE3YTQxNWVlZjdkMzE0NjhkMWRkNDY1Og=='
    ),
    ));
    $response = curl_exec($curl);
    $response1 = json_decode($response, true);
    curl_close($curl);
    // echo $response1;
    // print_r($response1);
    // exit();
    // echo "<br>";
    if($response1['status'] == "OK" AND $response1['success'] == "true"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        mysqli_query($conn,$updateorderid);
    }



    // DTDC
    }elseif($couriername=="Shadowfax"){
    // Shadowfax
        echo "Shadowfax";
        echo "<br>";
        echo $ordernoisa;
        echo "<br>";
        echo $awbnoisa;

    // Shadowfax
    }elseif($couriername=="Delhivery"){
    // Delhivery
        // echo "Delhivery";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "waybill": "'.$awbnoisa.'",
            "cancellation": "true"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        // echo $response1;
        // echo "<pre>";
        // print_r($response1);
        // echo "<br>";
          if($response1['remark'] == "Shipment has been cancelled."){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
          }

    // Delhivery
    }elseif($couriername=="Delhivery"){
    // Delhivery 2nd API
        // echo "Delhivery";
        // echo "<br>";
        // echo $ordernoisa;
        // echo "<br>";
        // echo $awbnoisa;

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "waybill": "'.$awbnoisa.'",
            "cancellation": "true"
        }',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Token 6f82518fd0e9772ede80d1ec821013d41f11de05',
            'Accept: application/json',
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);
        $response1 = json_decode($response, true);
        curl_close($curl);
        // echo $response;
        // echo $response1;
        // echo "<pre>";
        // print_r($response1);
        // echo "<br>";
          if($response1['remark'] == "Shipment has been cancelled."){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            mysqli_query($conn,$updateorderid);
          }

      }
    // Delhivery 2nd API
    // <!--    Cancel Orders   -->
    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Cancel Order')</script>";
    // exit();


        }
    }
    ?>
<!-- Multiple Orders Cancel -->





















































<!-- File Upload According Selected Weight -->

<!-- 500 Gram Start -->
    <?php
    if(isset($importSubmit5gm))
    {
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
    // $user_id = $_SESSION['useridis'];
    $user_id = $selectedweightidis;
    try {
    //
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
$fa = date('dmY');
$fb = $user_id;
$fc = "_";
$randno1 = rand(1,499);
$randno2 = rand(500,999);
$bannername = $fa.$fb.$fc.$randno1.$randno2.".csv";
            // $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
$totalnooforders = count($rowData);
$bulkordersq = "INSERT INTO `spark_single_order_file`(`couriername`, `filename`, `uploaddate`, `uploadtime`, `uploadby`, `uploadid`, `uploadusercate`, `totalnooforders`) VALUES ('500gm','$bannername',now(),now(),'$user_id','$user_id','$user_id','$totalnooforders')";
mysqli_query($conn,$bulkordersq);
            // echo "<pre>";
            // print_r($rowData);



    foreach($rowData as $key => $value){
        if($value[0]==""){  continue;   }
        if(empty($value[17]) AND empty($value[18]))
        {
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=invalid Details')</script>";
        }
    }




            foreach($rowData as $key => $value){
                if($value[0]==""){  continue;   }

$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);
$value[4] = trim($value[4]);
$value[4] = mysqli_real_escape_string($conn, $value[4]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[6] = trim($value[6]);
$value[6] = mysqli_real_escape_string($conn, $value[6]);
$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[11] = trim($value[11]);
$value[11] = mysqli_real_escape_string($conn, $value[11]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[13] = trim($value[13]);
$value[13] = mysqli_real_escape_string($conn, $value[13]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);
$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
if(empty($value[21])){    $value[21] = "";    }
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[23] = trim($value[23]);
$value[23] = mysqli_real_escape_string($conn, $value[23]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);


    // Pickup Address
        if(empty($value[17]))
        {
            $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
            if(mysqli_query($conn,$newpickupaddress)){
                $pickupaddressid = mysqli_insert_id($conn);
                $value[17] = $pickupaddressid;
            }else{
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data')</script>";
            }
        }else
        {
            $pickupidis = $value[17];
            $newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";
            $alldata = mysqli_query($conn,$newpickupaddress);
            if($exists = mysqli_num_rows($alldata))
            {
                // echo "<br> : - ";
                // echo $exists;
                // echo "<br>";
                $alldatares = mysqli_fetch_assoc($alldata);
                $value[18] = $alldatares['Name'];
                $value[19] = $alldatares['Mobile'];
                $value[20] = $alldatares['Pincode'];
                $value[21] = $alldatares['Gstin'];
                $value[22] = $alldatares['Address'];
                $value[23] = $alldatares['State'];
                $value[24] = $alldatares['City'];
            }else{
                // echo "<br> : -";
                // echo "Else";
                // echo "<br>";
                $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
                if(mysqli_query($conn,$newpickupaddress)){
                    $pickupaddressid = mysqli_insert_id($conn);
                    $value[17] = $pickupaddressid;
                }else{
                    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data1')</script>";
                }
            }
        }

// echo "<br><br>";
            $tdate = date("Y-m-d");
            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";
            if(mysqli_query($conn,$singlequery)){
              // echo "<br><br>";
              $last_id = mysqli_insert_id($conn);
            }
    // Last Insert ID

// echo "<br><br>";
    // $orderidcreate = "RPDX00".$last_id;
// echo "<br><br>";
    // $value[4] = $orderidcreate;
// echo "<br><br>";


// echo "<br><br>";
    $orderidcreate = $value[4];
// echo "<br><br>";
    if(empty($value[4])){
        $orderidcreate = "RPDX00".$last_id;
        $value[4] = $orderidcreate;
    }
// $value[4] = $orderidcreate;

    

    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
// echo "<br><br>";
    mysqli_query($conn,$updateorderid);
    // Last Insert ID

    // API Check
    // $xpressbeeapion = 1;
    // $shadowfaxapion = 0;
    // $dtdcapion = 0;
    // $delhiveryapion = 0;
    // $xpressbeeapion = "XpressBees";
    // $shadowfaxapion = "Shadowfax";
    // $dtdcapion = "DTDC";
    // $delhiveryapion = "Delhivery";

    $xpressbeeapion = "XpressBee";
    $shadowfaxapion = "ShadowFax";
    $dtdcapion = "DTDC";
    $delhiveryapion = "Delhivery";
    $awbnogenerate = "";
    // API Check

    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

// print_r($arrayName);
    // echo "<br>";

    // echo "<br><br>";
            }
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=Update')</script>";
            // exit();

    } catch (Exception $e) {
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=No Update')</script>";
    }


    }
    ?>
    <!-- 500 Gram End -->

    <!-- 1 KG Start -->
    <?php
    if(isset($importSubmit1kg))
    {
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
    // $user_id = $_SESSION['useridis'];
    $user_id = $selectedweightidis;
    try {
    //
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
$fa = date('dmY');
$fb = $user_id;
$fc = "_";
$randno1 = rand(1,499);
$randno2 = rand(500,999);
$bannername = $fa.$fb.$fc.$randno1.$randno2.".csv";
            // $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
$totalnooforders = count($rowData);
$bulkordersq = "INSERT INTO `spark_single_order_file`(`couriername`, `filename`, `uploaddate`, `uploadtime`, `uploadby`, `uploadid`, `uploadusercate`, `totalnooforders`) VALUES ('500gm','$bannername',now(),now(),'$user_id','$user_id','$user_id','$totalnooforders')";
mysqli_query($conn,$bulkordersq);
            // echo "<pre>";
            // print_r($rowData);



    foreach($rowData as $key => $value){
        if($value[0]==""){  continue;   }
        if(empty($value[17]) AND empty($value[18]))
        {
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=invalid Details')</script>";
        }
    }




            foreach($rowData as $key => $value){
                if($value[0]==""){  continue;   }

$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);
$value[4] = trim($value[4]);
$value[4] = mysqli_real_escape_string($conn, $value[4]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[6] = trim($value[6]);
$value[6] = mysqli_real_escape_string($conn, $value[6]);
$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[11] = trim($value[11]);
$value[11] = mysqli_real_escape_string($conn, $value[11]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[13] = trim($value[13]);
$value[13] = mysqli_real_escape_string($conn, $value[13]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);
$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
if(empty($value[21])){    $value[21] = "";    }
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[23] = trim($value[23]);
$value[23] = mysqli_real_escape_string($conn, $value[23]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);


    // Pickup Address
        if(empty($value[17]))
        {
            $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
            if(mysqli_query($conn,$newpickupaddress)){
                $pickupaddressid = mysqli_insert_id($conn);
                $value[17] = $pickupaddressid;
            }else{
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data')</script>";
            }
        }else
        {
            $pickupidis = $value[17];
            $newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";
            $alldata = mysqli_query($conn,$newpickupaddress);
            if($exists = mysqli_num_rows($alldata))
            {
                // echo "<br> : - ";
                // echo $exists;
                // echo "<br>";
                $alldatares = mysqli_fetch_assoc($alldata);
                $value[18] = $alldatares['Name'];
                $value[19] = $alldatares['Mobile'];
                $value[20] = $alldatares['Pincode'];
                $value[21] = $alldatares['Gstin'];
                $value[22] = $alldatares['Address'];
                $value[23] = $alldatares['State'];
                $value[24] = $alldatares['City'];
            }else{
                // echo "<br> : -";
                // echo "Else";
                // echo "<br>";
                $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
                if(mysqli_query($conn,$newpickupaddress)){
                    $pickupaddressid = mysqli_insert_id($conn);
                    $value[17] = $pickupaddressid;
                }else{
                    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data1')</script>";
                }
            }
        }

                // echo "<br><br>";
               $tdate = date("Y-m-d");
            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";
            mysqli_query($conn,$singlequery);
    // Last Insert ID
    $last_id = mysqli_insert_id($conn);

    // $orderidcreate = "RPDX00".$last_id;
    // $value[4] = $orderidcreate;
// echo "<br><br>";
    $orderidcreate = $value[4];
// echo "<br><br>";
    if(empty($value[4])){
        $orderidcreate = "RPDX00".$last_id;
        $value[4] = $orderidcreate;
    }
// $value[4] = $orderidcreate;

    
    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$updateorderid);
    // Last Insert ID

    // API Check
    // $xpressbeeapion = 1;
    // $shadowfaxapion = 0;
    // $dtdcapion = 0;
    // $delhiveryapion = 0;
    // $xpressbeeapion = "XpressBees";
    // $shadowfaxapion = "Shadowfax";
    // $dtdcapion = "DTDC";
    // $delhiveryapion = "Delhivery";

    $xpressbeeapion = "XpressBee";
    $shadowfaxapion = "ShadowFax";
    $dtdcapion = "DTDC";
    $delhiveryapion = "Delhivery";

    $awbnogenerate = "";
    // API Check

    $value[0] = trim($value[0]);
    $value[1] = trim($value[1]);
    $value[2] = trim($value[2]);
    $value[3] = trim($value[3]);
    $value[4] = trim($value[4]);
    $value[5] = trim($value[5]);
    $value[6] = trim($value[6]);
    $value[7] = trim($value[7]);
    $value[8] = trim($value[8]);
    $value[9] = trim($value[9]);
    $value[10] = trim($value[10]);
    $value[11] = trim($value[11]);
    $value[12] = trim($value[12]);
    $value[13] = trim($value[13]);
    $value[14] = trim($value[14]);
    $value[15] = trim($value[15]);
    $value[16] = trim($value[16]);
    $value[17] = trim($value[17]);
    $value[18] = trim($value[18]);
    $value[19] = trim($value[19]);
    $value[20] = trim($value[20]);
    $value[21] = trim($value[21]);
    if(empty($value[21])){      $value[21] = "";    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);

    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");
    // print_r($arrayName);
    // echo "<br>";
    // echo "<br><br>";
            }
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=Update')</script>";

    } catch (Exception $e) {
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=No Update')</script>";
    }


    }
    ?>
    <!-- 1 KG End -->


    <!-- 2 KG Start -->
    <?php
    if(isset($importSubmit2kg))
    {
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
    // $user_id = $_SESSION['useridis'];
    $user_id = $selectedweightidis;
    try {
    //
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
$fa = date('dmY');
$fb = $user_id;
$fc = "_";
$randno1 = rand(1,499);
$randno2 = rand(500,999);
$bannername = $fa.$fb.$fc.$randno1.$randno2.".csv";
            // $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
$totalnooforders = count($rowData);
$bulkordersq = "INSERT INTO `spark_single_order_file`(`couriername`, `filename`, `uploaddate`, `uploadtime`, `uploadby`, `uploadid`, `uploadusercate`, `totalnooforders`) VALUES ('500gm','$bannername',now(),now(),'$user_id','$user_id','$user_id','$totalnooforders')";
mysqli_query($conn,$bulkordersq);
            // echo "<pre>";
            // print_r($rowData);



    foreach($rowData as $key => $value){
        if($value[0]==""){  continue;   }
        if(empty($value[17]) AND empty($value[18]))
        {
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=invalid Details')</script>";
        }
    }




            foreach($rowData as $key => $value){
                if($value[0]==""){  continue;   }

$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);
$value[4] = trim($value[4]);
$value[4] = mysqli_real_escape_string($conn, $value[4]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[6] = trim($value[6]);
$value[6] = mysqli_real_escape_string($conn, $value[6]);
$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[11] = trim($value[11]);
$value[11] = mysqli_real_escape_string($conn, $value[11]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[13] = trim($value[13]);
$value[13] = mysqli_real_escape_string($conn, $value[13]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);
$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
if(empty($value[21])){    $value[21] = "";    }
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[23] = trim($value[23]);
$value[23] = mysqli_real_escape_string($conn, $value[23]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);

    // Pickup Address
        if(empty($value[17]))
        {
            $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
            if(mysqli_query($conn,$newpickupaddress)){
                $pickupaddressid = mysqli_insert_id($conn);
                $value[17] = $pickupaddressid;
            }else{
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data')</script>";
            }
        }else
        {
            $pickupidis = $value[17];
            $newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";
            $alldata = mysqli_query($conn,$newpickupaddress);
            if($exists = mysqli_num_rows($alldata))
            {
                // echo "<br> : - ";
                // echo $exists;
                // echo "<br>";
                $alldatares = mysqli_fetch_assoc($alldata);
                $value[18] = $alldatares['Name'];
                $value[19] = $alldatares['Mobile'];
                $value[20] = $alldatares['Pincode'];
                $value[21] = $alldatares['Gstin'];
                $value[22] = $alldatares['Address'];
                $value[23] = $alldatares['State'];
                $value[24] = $alldatares['City'];
            }else{
                // echo "<br> : -";
                // echo "Else";
                // echo "<br>";
                $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
                if(mysqli_query($conn,$newpickupaddress)){
                    $pickupaddressid = mysqli_insert_id($conn);
                    $value[17] = $pickupaddressid;
                }else{
                    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data1')</script>";
                }
            }
        }

                // echo "<br><br>";
               $tdate = date("Y-m-d");
            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";
            mysqli_query($conn,$singlequery);
    // Last Insert ID
    $last_id = mysqli_insert_id($conn);

    // $orderidcreate = "RPDX00".$last_id;
    // $value[4] = $orderidcreate;

// echo "<br><br>";
    $orderidcreate = $value[4];
// echo "<br><br>";
    if(empty($value[4])){
        $orderidcreate = "RPDX00".$last_id;
        $value[4] = $orderidcreate;
    }
// $value[4] = $orderidcreate;
    

    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$updateorderid);
    // Last Insert ID

    // API Check
    // $xpressbeeapion = 1;
    // $shadowfaxapion = 0;
    // $dtdcapion = 0;
    // $delhiveryapion = 0;
    // $xpressbeeapion = "XpressBees";
    // $shadowfaxapion = "Shadowfax";
    // $dtdcapion = "DTDC";
    // $delhiveryapion = "Delhivery";

    $xpressbeeapion = "XpressBee";
    $shadowfaxapion = "ShadowFax";
    $dtdcapion = "DTDC";
    $delhiveryapion = "Delhivery";

    $awbnogenerate = "";
    // API Check

    $value[0] = trim($value[0]);
    $value[1] = trim($value[1]);
    $value[2] = trim($value[2]);
    $value[3] = trim($value[3]);
    $value[4] = trim($value[4]);
    $value[5] = trim($value[5]);
    $value[6] = trim($value[6]);
    $value[7] = trim($value[7]);
    $value[8] = trim($value[8]);
    $value[9] = trim($value[9]);
    $value[10] = trim($value[10]);
    $value[11] = trim($value[11]);
    $value[12] = trim($value[12]);
    $value[13] = trim($value[13]);
    $value[14] = trim($value[14]);
    $value[15] = trim($value[15]);
    $value[16] = trim($value[16]);
    $value[17] = trim($value[17]);
    $value[18] = trim($value[18]);
    $value[19] = trim($value[19]);
    $value[20] = trim($value[20]);
    $value[21] = trim($value[21]);
    if(empty($value[21])){      $value[21] = "";    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);

    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

    // print_r($arrayName);
    // echo "<br>";
    // echo "<br><br>";
            }
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=Update')</script>";

    } catch (Exception $e) {
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=No Update')</script>";
    }


    }
    ?>
    <!-- 2 KG End -->

    <!-- 5 KG Start -->
    <?php
    if(isset($importSubmit5kg))
    {
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
    // $user_id = $_SESSION['useridis'];
    $user_id = $selectedweightidis;
    try {
    //
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
$fa = date('dmY');
$fb = $user_id;
$fc = "_";
$randno1 = rand(1,499);
$randno2 = rand(500,999);
$bannername = $fa.$fb.$fc.$randno1.$randno2.".csv";
            // $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
$totalnooforders = count($rowData);
$bulkordersq = "INSERT INTO `spark_single_order_file`(`couriername`, `filename`, `uploaddate`, `uploadtime`, `uploadby`, `uploadid`, `uploadusercate`, `totalnooforders`) VALUES ('500gm','$bannername',now(),now(),'$user_id','$user_id','$user_id','$totalnooforders')";
mysqli_query($conn,$bulkordersq);
            // echo "<pre>";
            // print_r($rowData);



    foreach($rowData as $key => $value){
        if($value[0]==""){  continue;   }
        if(empty($value[17]) AND empty($value[18]))
        {
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=invalid Details')</script>";
        }
    }




            foreach($rowData as $key => $value){
                if($value[0]==""){  continue;   }

$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);
$value[4] = trim($value[4]);
$value[4] = mysqli_real_escape_string($conn, $value[4]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[6] = trim($value[6]);
$value[6] = mysqli_real_escape_string($conn, $value[6]);
$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[11] = trim($value[11]);
$value[11] = mysqli_real_escape_string($conn, $value[11]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[13] = trim($value[13]);
$value[13] = mysqli_real_escape_string($conn, $value[13]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);
$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
if(empty($value[21])){    $value[21] = "";    }
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[23] = trim($value[23]);
$value[23] = mysqli_real_escape_string($conn, $value[23]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);


    // Pickup Address
        if(empty($value[17]))
        {
            $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
            if(mysqli_query($conn,$newpickupaddress)){
                $pickupaddressid = mysqli_insert_id($conn);
                $value[17] = $pickupaddressid;
            }else{
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data')</script>";
            }
        }else
        {
            $pickupidis = $value[17];
            $newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";
            $alldata = mysqli_query($conn,$newpickupaddress);
            if($exists = mysqli_num_rows($alldata))
            {
                // echo "<br> : - ";
                // echo $exists;
                // echo "<br>";
                $alldatares = mysqli_fetch_assoc($alldata);
                $value[18] = $alldatares['Name'];
                $value[19] = $alldatares['Mobile'];
                $value[20] = $alldatares['Pincode'];
                $value[21] = $alldatares['Gstin'];
                $value[22] = $alldatares['Address'];
                $value[23] = $alldatares['State'];
                $value[24] = $alldatares['City'];
            }else{
                // echo "<br> : -";
                // echo "Else";
                // echo "<br>";
                $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
                if(mysqli_query($conn,$newpickupaddress)){
                    $pickupaddressid = mysqli_insert_id($conn);
                    $value[17] = $pickupaddressid;
                }else{
                    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data1')</script>";
                }
            }
        }

                echo "<br><br>";
               $tdate = date("Y-m-d");
            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";
            mysqli_query($conn,$singlequery);
    // Last Insert ID
    $last_id = mysqli_insert_id($conn);

    // $orderidcreate = "RPDX00".$last_id;
    // echo $value[4] = $orderidcreate;
    
// echo "<br><br>";
    $orderidcreate = $value[4];
// echo "<br><br>";
    if(empty($value[4])){
        $orderidcreate = "RPDX00".$last_id;
        $value[4] = $orderidcreate;
    }
// $value[4] = $orderidcreate;

    
    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$updateorderid);
    // Last Insert ID

    // API Check
    // $xpressbeeapion = 1;
    // $shadowfaxapion = 0;
    // $dtdcapion = 0;
    // $delhiveryapion = 0;
    // $xpressbeeapion = "XpressBees";
    // $shadowfaxapion = "Shadowfax";
    // $dtdcapion = "DTDC";
    // $delhiveryapion = "Delhivery";

    $xpressbeeapion = "XpressBee";
    $shadowfaxapion = "ShadowFax";
    $dtdcapion = "DTDC";
    $delhiveryapion = "Delhivery";

    $awbnogenerate = "";
    // API Check

    $value[0] = trim($value[0]);
    $value[1] = trim($value[1]);
    $value[2] = trim($value[2]);
    $value[3] = trim($value[3]);
    $value[4] = trim($value[4]);
    $value[5] = trim($value[5]);
    $value[6] = trim($value[6]);
    $value[7] = trim($value[7]);
    $value[8] = trim($value[8]);
    $value[9] = trim($value[9]);
    $value[10] = trim($value[10]);
    $value[11] = trim($value[11]);
    $value[12] = trim($value[12]);
    $value[13] = trim($value[13]);
    $value[14] = trim($value[14]);
    $value[15] = trim($value[15]);
    $value[16] = trim($value[16]);
    $value[17] = trim($value[17]);
    $value[18] = trim($value[18]);
    $value[19] = trim($value[19]);
    $value[20] = trim($value[20]);
    $value[21] = trim($value[21]);
    if(empty($value[21])){      $value[21] = "";    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);


    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

    // print_r($arrayName);
    // echo "<br>";
    // echo "<br><br>";
            }
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=Update')</script>";

    } catch (Exception $e) {
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=No Update')</script>";
    }


    }
    ?>
    <!-- 5 KG End -->

    <!-- 10 KG Start -->
    <?php
    if(isset($importSubmit10kg))
    {
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
    // $user_id = $_SESSION['useridis'];
    $user_id = $selectedweightidis;
    try {
    //
    // echo "<script type='text/javascript'>  $('#UploadDataLoader').html('Loading...');  </script>";
$fa = date('dmY');
$fb = $user_id;
$fc = "_";
$randno1 = rand(1,499);
$randno2 = rand(500,999);
$bannername = $fa.$fb.$fc.$randno1.$randno2.".csv";
            // $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
$totalnooforders = count($rowData);
$bulkordersq = "INSERT INTO `spark_single_order_file`(`couriername`, `filename`, `uploaddate`, `uploadtime`, `uploadby`, `uploadid`, `uploadusercate`, `totalnooforders`) VALUES ('500gm','$bannername',now(),now(),'$user_id','$user_id','$user_id','$totalnooforders')";
mysqli_query($conn,$bulkordersq);
            // echo "<pre>";
            // print_r($rowData);



    foreach($rowData as $key => $value){
        if($value[0]==""){  continue;   }
        if(empty($value[17]) AND empty($value[18]))
        {
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=invalid Details')</script>";
        }
    }




            foreach($rowData as $key => $value){
                if($value[0]==""){  continue;   }

$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);
$value[4] = trim($value[4]);
$value[4] = mysqli_real_escape_string($conn, $value[4]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[6] = trim($value[6]);
$value[6] = mysqli_real_escape_string($conn, $value[6]);
$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[11] = trim($value[11]);
$value[11] = mysqli_real_escape_string($conn, $value[11]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[13] = trim($value[13]);
$value[13] = mysqli_real_escape_string($conn, $value[13]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);
$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
if(empty($value[21])){    $value[21] = "";    }
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[23] = trim($value[23]);
$value[23] = mysqli_real_escape_string($conn, $value[23]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);

    // Pickup Address
        if(empty($value[17]))
        {
            $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
            if(mysqli_query($conn,$newpickupaddress)){
                $pickupaddressid = mysqli_insert_id($conn);
                $value[17] = $pickupaddressid;
            }else{
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data')</script>";
            }
        }else
        {
            $pickupidis = $value[17];
            $newpickupaddress = "SELECT * FROM `spark_pickup_address` WHERE `Address_Id`='$pickupidis'";
            $alldata = mysqli_query($conn,$newpickupaddress);
            if($exists = mysqli_num_rows($alldata))
            {
                // echo "<br> : - ";
                // echo $exists;
                // echo "<br>";
                $alldatares = mysqli_fetch_assoc($alldata);
                $value[18] = $alldatares['Name'];
                $value[19] = $alldatares['Mobile'];
                $value[20] = $alldatares['Pincode'];
                $value[21] = $alldatares['Gstin'];
                $value[22] = $alldatares['Address'];
                $value[23] = $alldatares['State'];
                $value[24] = $alldatares['City'];
            }else{
                // echo "<br> : -";
                // echo "Else";
                // echo "<br>";
                $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`) VALUES ('$user_id','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',now())";
                if(mysqli_query($conn,$newpickupaddress)){
                    $pickupaddressid = mysqli_insert_id($conn);
                    $value[17] = $pickupaddressid;
                }else{
                    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Invalid Data1')</script>";
                }
            }
        }

                echo "<br><br>";
               $tdate = date("Y-m-d");
            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";
            mysqli_query($conn,$singlequery);
    // Last Insert ID
    $last_id = mysqli_insert_id($conn);

    // $orderidcreate = "RPDX00".$last_id;
    // echo $value[4] = $orderidcreate;
    
// echo "<br><br>";
    $orderidcreate = $value[4];
// echo "<br><br>";
    if(empty($value[4])){
        $orderidcreate = "RPDX00".$last_id;
        $value[4] = $orderidcreate;
    }
// $value[4] = $orderidcreate;

    
    $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
    mysqli_query($conn,$updateorderid);
    // Last Insert ID

    // API Check
    // $xpressbeeapion = 1;
    // $shadowfaxapion = 0;
    // $dtdcapion = 0;
    // $delhiveryapion = 0;
    // $xpressbeeapion = "XpressBees";
    // $shadowfaxapion = "Shadowfax";
    // $dtdcapion = "DTDC";
    // $delhiveryapion = "Delhivery";

    $xpressbeeapion = "XpressBee";
    $shadowfaxapion = "ShadowFax";
    $dtdcapion = "DTDC";
    $delhiveryapion = "Delhivery";

    $awbnogenerate = "";
    // API Check

    $value[0] = trim($value[0]);
    $value[1] = trim($value[1]);
    $value[2] = trim($value[2]);
    $value[3] = trim($value[3]);
    $value[4] = trim($value[4]);
    $value[5] = trim($value[5]);
    $value[6] = trim($value[6]);
    $value[7] = trim($value[7]);
    $value[8] = trim($value[8]);
    $value[9] = trim($value[9]);
    $value[10] = trim($value[10]);
    $value[11] = trim($value[11]);
    $value[12] = trim($value[12]);
    $value[13] = trim($value[13]);
    $value[14] = trim($value[14]);
    $value[15] = trim($value[15]);
    $value[16] = trim($value[16]);
    $value[17] = trim($value[17]);
    $value[18] = trim($value[18]);
    $value[19] = trim($value[19]);
    $value[20] = trim($value[20]);
    $value[21] = trim($value[21]);
    if(empty($value[21])){      $value[21] = "";    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);

    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");
    // print_r($arrayName);
    // echo "<br>";
    // echo "<br><br>";
            }
            echo "<script> window.location.assign('bulkorderupload.php?excelfile=Update')</script>";

    } catch (Exception $e) {
                echo "<script> window.location.assign('bulkorderupload.php?excelfile=No Update')</script>";
    }


    }
    ?>
    <!-- 10 KG End -->


    <!-- File Upload According Selected Weight -->





























































</div>
<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
var element = document.getElementById(ID);
if(element.style.display === "none"){
    element.style.display = "block";
}else{
    element.style.display = "none";
}
}
</script>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer_Table.php";
?>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function () {
    //   alert('Reloading Page');
      location.reload(true);
    }, 30000);
  });
</script>