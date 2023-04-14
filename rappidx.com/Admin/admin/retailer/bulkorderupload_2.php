<?php
    include "Layout_Header_Table.php";
?>

<!-- Page Content -->




<div class="col-md-12">
<div class="row bg-title" style="padding:0px 0px 0px 20px">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h5 class="" style="font-weight:600">UPLOAD BULK ORDERS</h5>
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



<div class="panel filterable">
<div class="panel-heading" style="background-color:#33333373;padding:5px">
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
          <a href="bulkorderuploadnot_excel.php" class="btn btn-link" style="color:#7c7c82;">Download Failed Orders</a>
      </div>
      <div class="col-md-4">
          <a href="bulkorderupload_excel.php" class="btn btn-link" style="color:#7c7c82;">Download Successfull Orders</a>
        </div>
    </div>
    <!-- Excel File -->

<form method="get" action="#">

<div class="table-responsive">
<table id="myTable" class="table table-striped">
<thead>
    <tr>
        <th data-field="Order No" data-sortable="true">Order No</th>
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
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Excel' AND `Awb_Number`!='' AND `awb_gen_by`!='' AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";
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
        
            <?php   
            if($row['order_cancel']){
            ?>
                <td style="color:red">
            <?php
            }else{
            ?>
                <td>
            <?php
            }
            ?>
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
    <?php
    if($totalnoosorders>0){
    ?>
    <br><br>
    <div class="row">
        <div class="col-md-2">
    <input type="submit" name="selectedlabels" class="btn btn-link" style="color:#7c7c82;" value="Selected Labels Print">
        </div>
        <div class="col-md-2">
    <input type="submit" name="alllabels" class="btn btn-link" style="color:#7c7c82;" value="All Labels Print">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3 text-right">
    <input type="submit" name="cancelorders" class="btn btn-link" style="color:#7c7c82;" value="Cancel Selected Orders">
        </div>
        <div class="col-md-2">
    <input type="submit" name="allcancelorders" class="btn btn-link" style="color:#7c7c82;" value="Cancel All Orders">
        </div>
        <div class="col-md-1"></div>
    </div>
    <!--<div class="row">-->
    <!--    <div class="col-md-3">-->
    <!--<input type="submit" name="cancelorders" class="btn btn-primary" style="background-color:#2098d1;border-color:#2098d1" value="Cancel Selected Orders">-->
    <!--    </div>-->
    <!--    <div class="col-md-3">-->
    <!--<input type="submit" name="allcancelorders" class="btn btn-danger" value="Cancel All Orders">-->
    <!--    </div>-->
    <!--    <div class="col-md-6"></div>-->
    <!--</div>-->
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
    $fdataall = mysqli_query($conn,$queryall);
    // $numrowall=mysqli_num_rows($fdataall);
    $resultall = mysqli_fetch_assoc($fdataall);
    echo "&ensp; : &ensp;";
    echo $ordernoisa = $resultall['orderno'];
    echo "&ensp; : &ensp;";
    echo $awbnoisa = $resultall['Awb_Number'];
    echo "&ensp; : &ensp;";
    echo $couriername = $resultall['awb_gen_by'];
    echo "&ensp; : &ensp;";

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
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
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
    print_r($response1);
    exit();
    // echo "<br>";
    if($response1['status'] == "OK" AND $response1['success'] == "true"){
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
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
    
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'POST',
        //   CURLOPT_POSTFIELDS =>'{
        //     "waybill": "'.$awbnoisa.'",
        //     "cancellation": "true"
        // }',
        //   CURLOPT_HTTPHEADER => array(
        //     'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
        //     'Accept: application/json'
        //   ),
        // ));

        // $response1 = curl_exec($curl);
        // curl_close($curl);
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
        
        
        // echo "<pre>";
        // print_r($response1);
        // echo "<br>";
        // echo $response1[0]['status'];
        // echo "<br>";
        // echo $response1['status'];
        // echo "<br>";
        if($response1['status']=="true"){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            if(mysqli_query($conn,$updateorderid)){
                echo "Work";    
            }
        }

      }
    // Delhivery
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
        // echo $response;
        echo "<br>";
          if($response1['RTONotifyShipment'][0]['ReturnMessage'] == "successful"){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
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
        $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
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

        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => 'https://track.delhivery.com/api/p/edit',
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'POST',
        //   CURLOPT_POSTFIELDS =>'{
        //     "waybill": "'.$awbnoisa.'",
        //     "cancellation": "true"
        // }',
        //   CURLOPT_HTTPHEADER => array(
        //     'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
        //     'Accept: application/json'
        //   ),
        // ));

        // $response1 = curl_exec($curl);
        // curl_close($curl);
        // // echo $response1;
        // // echo "<pre>";
        // // print_r($response1);
        // // echo "<br>";
        //   if($response1['remark'] == "Shipment has been cancelled"){
        //     $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
        //     mysqli_query($conn,$updateorderid);
        //   }
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
        
        
        // echo "<pre>";
        // print_r($response1);
        // echo "<br>";
        // echo $response1[0]['status'];
        // echo "<br>";
        // echo $response1['status'];
        // echo "<br>";
        if($response1['status']=="true"){
            $updateorderid = "UPDATE `spark_single_order` SET `order_cancel_reasion`='Client Cancel This Order',`order_cancel`='1' WHERE `orderno`='$ordernoisa'";
            if(mysqli_query($conn,$updateorderid)){
                echo "Work";    
            }
        }

      }
    // Delhivery
    // <!--    Cancel Orders   -->
    echo "<script> window.location.assign('bulkorderupload.php?excelfile=Cancel Order')</script>";


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
            $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
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
if(empty($value[21])){
$value[21] = "";
}
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
            $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`,`apihitornot`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload','1')";
            mysqli_query($conn,$singlequery);
    // Last Insert ID
    $last_id = mysqli_insert_id($conn);

    $orderidcreate = "RPDX00".$last_id;
    $value[4] = $orderidcreate;
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
    if(empty($value[21])){
      $value[21] = "";
    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);





// Check Pincode Is Serviceable Or Not
    // $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
    // $allclientsr=mysqli_query($conn,$allclients);
    // $clientres = mysqli_fetch_assoc($allclientsr);
    //
    // echo "XB : ".$clientres['xpressbee']."<br>";
    // echo "DL : ".$clientres['delhivery']."<br>";
    // echo "SF : ".$clientres['shadowfax']."<br>";
    // echo "DC : ".$clientres['dtdc']."<br>";
    //
    // if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
    // if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
    // if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
    // if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
    //
    // $crtusers = explode(",",$clientres['disableclientids']);
    // // print_r($crtusers);
    // // echo "<br>";
    // // echo in_array($clientidisa,$crtusers);
    // // echo "<br>";
    //
    // // echo $a = array_search($idisa, $allidisa);
    // // unset($allidisa["$a"]);
    // // $allidisa = implode(",",$allidisa);
    //
    // // $pincode = $row['pincode'];
    // // $clientidisa = $clientres['User_Id'];
    // $crtusers = explode(",",$clientres['disableclientids']);
    // if(in_array($user_id,$crtusers)){
    //     $xpressbeeapion = "XB";
    //     $shadowfaxapion = "SF";
    //     $dtdcapion = "DT";
    //     $delhiveryapion = "DL";
    // }
// Check Pincode Is Serviceable Or Not



    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

// print_r($arrayName);

    // echo "<br>";








    // Temperay Delete Code
    // foreach ($allapis1 as $key => $val) {
    for ($i=1;$i<6;$i++){
    // Check All Permissions APIs
        // echo $key."&ensp; ".$val."<br>";


          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
    // Shadowfax
        // if($shadowfaxapion==$key){
        if($shadowfaxapion==$arrayName[$i]){
          // $awbnogenerate = "SF";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - ShadowfaxM  - - - <br>";


$dummyshadowfax = '{
  "order_details": {
      "client_order_id": "'.$value[4].'",
      "actual_weight": '.$value[7].',
      "volumetric_weight": '.$value[7].',
      "product_value": '.$value[10].',
      "payment_mode": "'.$value[25].'",
      "cod_amount": "0",
      "promised_delivery_date": "'.$crtdatetime.'",
      "total_amount": '.$value[16].'
  },
  "customer_details": {
      "name": "'.$value[0].'",
      "contact": "'.$value[2].'",
      "address_line_1": "'.$value[1].'",
      "address_line_2": "'.$value[1].'",
      "city": "'.$value[13].'",
      "state": "'.$value[12].'",
      "pincode": '.$value[3].',
      "alternate_contact": "'.$value[2].'",
      "latitude": "0",
      "longitude": "0"
  },
  "pickup_details": {
      "name": "'.$value[18].'",
      "contact": "'.$value[19].'",
      "address_line_1": "'.$value[22].'",
      "address_line_2": "'.$value[22].'",
      "city": "'.$value[24].'",
      "state": "'.$value[23].'",
      "pincode": '.$value[20].',
      "latitude": "0",
      "longitude": "0"
  },
  "rts_details": {
      "name": "'.$value[18].'",
      "contact": "'.$value[19].'",
      "address_line_1": "'.$value[22].'",
      "address_line_2": "'.$value[22].'",
      "city": "'.$value[24].'",
      "state": "'.$value[23].'",
      "pincode": '.$value[20].'
  },
  "product_details": [
      {
          "hsn_code": "'.$value[4].'",
          "invoice_no": "'.$value[4].'",
          "sku_name": "'.$value[4].'",
          "client_sku_id": "'.$value[17].'",
          "category": "all",
          "price": '.$value[16].',
          "seller_details": {
              "seller_name": "'.$value[18].'",
              "seller_address": "'.$value[22].'",
              "seller_state": "'.$value[23].'",
              "gstin_number": ""
          },
          "taxes": {
              "cgst": 3,
              "sgst": 4,
              "igst": 5,
              "total_tax": 5.6
          },
          "additional_details": {
              "requires_extra_care": "False",
              "type_extra_care": "'.$value[14].'"
          }
      }
  ]
}';

// echo "<pre>";
// print_r($dummyshadowfax);
// echo "</pre>";
// echo "<br>";


          $crtdatetime=date('Y-m-d h:i:s');
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v3/clients/orders/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "order_details": {
                  "client_order_id": "'.$value[4].'",
                  "actual_weight": '.$value[7].',
                  "volumetric_weight": '.$value[7].',
                  "product_value": '.$value[10].',
                  "payment_mode": "'.$value[25].'",
                  "cod_amount": "0",
                  "promised_delivery_date": "'.$crtdatetime.'",
                  "total_amount": '.$value[16].'
              },
              "customer_details": {
                  "name": "'.$value[0].'",
                  "contact": "'.$value[2].'",
                  "address_line_1": "'.$value[1].'",
                  "address_line_2": "'.$value[1].'",
                  "city": "'.$value[13].'",
                  "state": "'.$value[12].'",
                  "pincode": '.$value[3].',
                  "alternate_contact": "'.$value[2].'",
                  "latitude": "0",
                  "longitude": "0"
              },
              "pickup_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].',
                  "latitude": "0",
                  "longitude": "0"
              },
              "rts_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].'
              },
              "product_details": [
                  {
                      "hsn_code": "'.$value[4].'",
                      "invoice_no": "'.$value[4].'",
                      "sku_name": "'.$value[4].'",
                      "client_sku_id": "'.$value[17].'",
                      "category": "all",
                      "price": '.$value[16].',
                      "seller_details": {
                          "seller_name": "'.$value[18].'",
                          "seller_address": "'.$value[22].'",
                          "seller_state": "'.$value[23].'",
                          "gstin_number": ""
                      },
                      "taxes": {
                          "cgst": 3,
                          "sgst": 4,
                          "igst": 5,
                          "total_tax": 5.6
                      },
                      "additional_details": {
                          "requires_extra_care": "False",
                          "type_extra_care": "'.$value[14].'"
                      }
                  }
              ]
          }
          ',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo $response;
// echo "<pre>";
// print_r($response);
// echo "</pre>";
// echo $response['message'];
// echo "<br>";

          $shadowfaxawbno = $response['data']['awb_number'];
          $awbnogenerate = $shadowfaxawbno;
          // echo "<br>";
          // print_r($response);
          // echo "<br>qwerty";

          if($shadowfaxawbno){
            $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
            mysqli_query($conn,$shadowfaxawbnoudate);
          }else{
            $errormsg = $response['message'];
            $errormsg = mysqli_real_escape_string($conn, $errormsg);
            $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            mysqli_query($conn,$shadowfaxawbnoudate);
          }
          // exit();
        }
        if($awbnogenerate){        break;     }
    // Shadowfax
          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //






          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // Delhivery
        // if ($delhiveryapion==$key) {
        if ($delhiveryapion==$arrayName[$i]) {
          // $awbnogenerate = "DL";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - Delhivery - - - <br>";
          $valueone = substr($value[1],0,45);
          $valueone = mysqli_real_escape_string($conn, $valueone);
          $value[5] = mysqli_real_escape_string($conn, $value[5]);
          $valuefive = substr($value[5],0,45);
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
          // Create AWB Number
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          echo $awbnois = $response;
          echo "<br><br>";
          // Create AWB Number


          $delhiverydummy = 'format=json&data={
          "pickup_location": {
              "pin": "'.$value[20].'",
              "add": "'.$value[22].'",
              "phone": "'.$value[19].'",
              "state": "'.$value[23].'",
              "city": "'.$value[24].'",
              "country": "India",
              "name": "RAPPIDX SURFACE"
          },
          "shipments": [
              {
                "return_name": "RAPPIDXSURFACE-B2C",
                "return_pin": "'.$value[20].'",
                "return_city": "'.$value[24].'",
                "return_phone": "'.$value[19].'",
                "return_add": "'.$value[22].'",
                "return_state": "'.$value[23].'",
                "return_country": "India",
                "order": "'.$value[4].'",
                "phone": "'.$value[2].'",
                "products_desc": "'.$valuefive.'",
                "cod_amount": "'.$value[11].'",
                "name": "'.$value[0].'",
                "country": "India",
                "waybill": "'.$awbnois.'",
                "seller_inv_date": "'.$orderdata.'",
                "order_date": "'.$orderdata.'",
                "total_amount": "'.$value[16].'",
                "seller_add": "'.$value[22].'",
                "seller_cst": "'.$value[21].'",
                "add": "'.$valueone.'",
                "seller_name": "'.$value[18].'",
                "seller_inv": "",
                "seller_tin": "",
                "pin": "'.$value[3].'",
                "quantity": "'.$value[6].'",
                "payment_mode": "'.$value[25].'",
                "state": "'.$value[12].'",
                "city": "'.$value[13].'",
                "client": "RAPPIDX SURFACE"
              }
          ]
          }';

// echo "<pre>";
// print_r($delhiverydummy);
// echo "</pre>";
// echo "<br><br>";
// // exit();

          // Order Date
            $orderdata = date('Y-m-d H:i:s');
          // Order Date

          // Create a Order
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'format=json&data={
            "pickup_location": {
                "pin": "'.$value[20].'",
                "add": "'.$value[22].'",
                "phone": "'.$value[19].'",
                "state": "'.$value[23].'",
                "city": "'.$value[24].'",
                "country": "India",
                "name": "RAPPIDX SURFACE"
            },
            "shipments": [
                {
                  "return_name": "RAPPIDXSURFACE-B2C",
                  "return_pin": "'.$value[20].'",
                  "return_city": "'.$value[24].'",
                  "return_phone": "'.$value[19].'",
                  "return_add": "'.$value[22].'",
                  "return_state": "'.$value[23].'",
                  "return_country": "India",
                  "order": "'.$value[4].'",
                  "phone": "'.$value[2].'",
                  "products_desc": "'.$valuefive.'",
                  "cod_amount": "'.$value[11].'",
                  "name": "'.$value[0].'",
                  "country": "India",
                  "waybill": "'.$awbnois.'",
                  "seller_inv_date": "'.$orderdata.'",
                  "order_date": "'.$orderdata.'",
                  "total_amount": "'.$value[16].'",
                  "seller_add": "'.$value[22].'",
                  "seller_cst": "'.$value[21].'",
                  "add": "'.$valueone.'",
                  "seller_name": "'.$value[18].'",
                  "seller_inv": "",
                  "seller_tin": "",
                  "pin": "'.$value[3].'",
                  "quantity": "'.$value[6].'",
                  "payment_mode": "'.$value[25].'",
                  "state": "'.$value[12].'",
                  "city": "'.$value[13].'",
                  "client": "RAPPIDX SURFACE"
                }
            ]
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
              'Accept: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response1 = json_decode($response, true);
          curl_close($curl);
              // echo $response1;
              // echo "<br>";

echo "<pre>";
print_r($response1);
echo "</pre>";
// echo $response1['packages'][0]['remarks'][0];
echo "<br>";

          if($response1['packages'][0]['status']=="Success"){
            $awbnogenerate = $response1['packages'][0]['waybill'];
          }
              // echo "<br>";
              // print_r($response1);
          // Create a Order //

            // $response = curl_exec($curl);
            // $response = json_decode($response, true);
            // curl_close($curl);

            // $_SESSION["dtdc"] = $response;
            // $test = $_SESSION["dtdc"];
            // print_r($test);

            // // echo "<pre>";
            // $response['data'][0]['reference_number'];
            // // echo "<br>";
            // $response['data'][0]['customer_reference_number'];
            // // echo "<br>";
            // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
            // // echo "<br>";
            // // print_r($response);
            // // exit();
            if($awbnogenerate){
              $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$dtdcawbnoudate);
            }else{
              $errormsg = $response1['packages'][0]['remarks'][0];
              $errormsg = mysqli_real_escape_string($conn, $errormsg);
              echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$dtdcawbnoudate);
            }

          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

        }
        if($awbnogenerate){        break;     }
    // Delhivery
          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//








          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // XpressBees
        // if($xpressbeeapion==$key){
        if($xpressbeeapion==$arrayName[$i]){
          // $awbnogenerate = "XB";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - XpressBees  - - -  <br>";

              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
          // $xbawbnois = "131560000012351";
          $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
          $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
          $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
          $xbawbnois = $xpressbeesawbnofetchres['awbnois'];
          
          $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnois'";
          mysqli_query($conn,$apiused);

          $tdateis = date('Y-m-d');
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://userauthapis.xbees.in/api/auth/generateToken',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                  "username": "admin@rappidx.com",
                  "password": "$rappidx$",
                  "secretkey": "5d009de9ed78dfa2ef472c22cc163046a52f39dd076cac4cf2a57e37c71405b0"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json',
                  'Authorization: Bearer xyz'
                ),
              ));
              $response = curl_exec($curl);
              $response = json_decode($response, true);
              curl_close($curl);
              $xpressbeetoken = $response['token'];
// echo "<br>";
// print_r($response);
// echo "<br>";
// // exit();
              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -//


            $dummy = '{
              "AirWayBillNO": "'.$xbawbnois.'",
              "BusinessAccountName": "Rappidx",
              "OrderNo": "'.$value[4].'",
              "SubOrderNo": "'.$value[4].'",
              "OrderType": "'.$value[25].'",
              "CollectibleAmount": "'.$value[16].'",
              "DeclaredValue": "'.$value[16].'",
              "PickupType": "Vendor",
              "Quantity": "'.$value[6].'",
              "ServiceType": "SD",
              "DropDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[1].'",
                          "City": "'.$value[13].'",
                          "EmailID": "",
                          "Name": "'.$value[0].' ",
                          "PinCode": "'.$value[3].'",
                          "State": "'.$value[12].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[2].'",
                          "Type": "Primary",
                          "VirtualNumber": null
                      }
                  ],
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "PickupDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ],
                  "PickupVendorCode": "'.$value[17].'",
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "RTODetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ]
              },
              "Instruction": "",
              "CustomerPromiseDate": null,
              "IsCommercialProperty": null,
              "IsDGShipmentType": null,
              "IsOpenDelivery": null,
              "IsSameDayDelivery": null,
              "ManifestID": "SGHJDX1554362X",
              "MultiShipmentGroupID": null,
              "SenderName": null,
              "IsEssential": "false",
              "IsSecondaryPacking": "false",
              "PackageDetails": {
                  "Dimensions": {
                      "Height": "'.$value[8].'",
                      "Length": "'.$value[9].'",
                      "Width": "'.$value[7].'"
                  },
                  "Weight": {
                      "BillableWeight": "'.$value[15].'",
                      "PhyWeight": "'.$value[15].'",
                      "VolWeight": "'.$value[15].'"
                  }
              },
              "GSTMultiSellerInfo": [
                  {
                      "BuyerGSTRegNumber": "29AAACU1901H1ZK",
                      "EBNExpiryDate": null,
                      "EWayBillSrNumber": "'.$xbawbnois.'",
                      "InvoiceDate": "'.$tdateis.'",
                      "InvoiceNumber": "'.$value[10].'",
                      "InvoiceValue": null,
                      "IsSellerRegUnderGST": "Yes",
                      "ProductUniqueID": null,
                      "SellerAddress": "'.$value[22].'",
                      "SellerGSTRegNumber": "'.$value[21].'",
                      "SellerName": "'.$value[18].'",
                      "SellerPincode": "'.$value[20].'",
                      "SupplySellerStatePlace": "'.$value[23].'",
                      "HSNDetails": [
                          {
                              "ProductCategory": "Elecrotnics",
                              "ProductDesc": "'.$value[5].'",
                              "CGSTAmount": "",
                              "Discount": null,
                              "GSTTAXRateIGSTN": null,
                              "GSTTaxRateCGSTN": null,
                              "GSTTaxRateSGSTN": null,
                              "GSTTaxTotal": "",
                              "HSNCode": "",
                              "IGSTAmount": null,
                              "ProductQuantity": null,
                              "SGSTAmount": null,
                              "TaxableValue": "'.$value[16].'"
                          }
                      ]
                  }
              ]
          }';
// echo "<pre>";
// print_r($dummy);
// echo "</pre>";
// echo "<br><br>";
          //  -   -   -   -   -   -   -   -   -   -   -   -

          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.shipmentmanifestation.xbees.in/shipmentmanifestation/forward',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$dummy,
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "token: $xpressbeetoken",
              "versionnumber: v1"
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);

echo "<pre>";
print_r($response);
echo "</pre>";
// echo $response['ReturnMessage'];
echo "<br>";

            // if($response['ReturnMessage']=="Successfull"){
            if($response['ReturnCode']=="100"){
              $xbawbnoisreturn = $response['AWBNo'];
              $awbnogenerate = $xbawbnoisreturn;
              echo "<br>XB-UPDATE<br>";
              echo $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$xbawbnoisreturn',`awb_gen_by`='XpressBees' WHERE `Single_Order_Id`='$last_id'";
              echo "<br>XB-UPDATE<br>";
              mysqli_query($conn,$xpressbeeawbnoudate);

              $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnoisreturn'";
              mysqli_query($conn,$apiused);
    // echo "<br><br>";
    // print_r($response);
    // exit();
            }else{
              $errormsg = $response['ReturnMessage'];
              $errormsg = mysqli_real_escape_string($conn, $errormsg);
              $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$xpressbeeawbnoudate);
            }

          // echo $response;

        }
        if($awbnogenerate){        break;     }
    // XpressBees
          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // DTDC
        // if ($dtdcapion==$key){
        if ($dtdcapion==$arrayName[$i]) {
          // $awbnogenerate = "DT";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "-DTDC <br>";


          // Item Length DTDC is max 50
              echo $value5 = substr($value[5],0,49);
          // Item Length DTDC is max 50
          // Check COD Order Or Not
          if(!empty($value[11]))
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "cash",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "'.$value[11].'",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }elseif($value[11]==0)
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }else{
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }
          // Check COD Order Or Not

// echo "<pre>";
// print_r($curlcodcheck);
// echo "</pre>";
// echo "<br>";

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.shipsy.in/api/customer/integration/consignment/softdata',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $curlcodcheck,

            CURLOPT_HTTPHEADER => array(
              'api-key: dd9c24d16f71ac05fba93bd70502fe',
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);

// echo "<pre>";
// print_r($response);
// echo "</pre>";
// echo $response['data'][0]['reason'];
// echo "<br>";
// echo $response['data'][0]['message'];
// echo "<br><br>";
          // $_SESSION["dtdc"] = $response;
          // $test = $_SESSION["dtdc"];
          // print_r($test);

          // echo "<pre>";
          $awbnogenerate = $response['data'][0]['reference_number'];
          // echo "<br>";
          $response['data'][0]['customer_reference_number'];
          // echo "<br>";
          $response['data'][0]['pieces'][0]['reference_number'];
          // echo "<br>";
          // print_r($response);
          // exit();

          if($awbnogenerate){
            $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
            mysqli_query($conn,$dtdcawbnoudate);
          }else{
            $errormsg1 = $response['data'][0]['reason'];
            $errormsg2 = $response['data'][0]['message'];
            $errormsg = $errormsg1." / ".$errormsg2;
            $errormsg = mysqli_real_escape_string($conn, $errormsg);
            $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            mysqli_query($conn,$dtdcawbnoudate);
          }


        }
        if($awbnogenerate){        break;     }
    // DTDC
          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



        // echo "<br>";
    }
    // echo "Only Check Loop <br><br><br>";
    // exit();
    // Temperay Delete Code

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
            $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
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

    $orderidcreate = "RPDX00".$last_id;
    $value[4] = $orderidcreate;
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
    if(empty($value[21])){
      $value[21] = "";
    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);






// Check Pincode Is Serviceable Or Not
    // $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
    // $allclientsr=mysqli_query($conn,$allclients);
    // $clientres = mysqli_fetch_assoc($allclientsr);
    // // echo "XB : ".$clientres['xpressbee']."<br>";
    // // echo "DL : ".$clientres['delhivery']."<br>";
    // // echo "SF : ".$clientres['shadowfax']."<br>";
    // // echo "DC : ".$clientres['dtdc']."<br>";
    // if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
    // if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
    // if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
    // if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
    // $crtusers = explode(",",$clientres['disableclientids']);
    // // print_r($crtusers);
    // // echo "<br>";
    // // echo in_array($clientidisa,$crtusers);
    // // echo "<br>";
    // // echo $a = array_search($idisa, $allidisa);
    // // unset($allidisa["$a"]);
    // // $allidisa = implode(",",$allidisa);
    // // $pincode = $row['pincode'];
    // // $clientidisa = $clientres['User_Id'];
    // $crtusers = explode(",",$clientres['disableclientids']);
    // if(in_array($user_id,$crtusers)){
    //     $xpressbeeapion = "XB";
    //     $shadowfaxapion = "SF";
    //     $dtdcapion = "DT";
    //     $delhiveryapion = "DL";
    // }
// Check Pincode Is Serviceable Or Not



    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");
    // print_r($arrayName);
    // echo "<br>";


    // Temperay Delete Code
    // foreach ($allapis1 as $key => $val) {
    for ($i=1;$i<6;$i++){
    // Check All Permissions APIs
        // echo $key."&ensp; ".$val."<br>";


          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
    // Shadowfax
        // if($shadowfaxapion==$key){
        if($shadowfaxapion==$arrayName[$i]){
          // $awbnogenerate = "SF";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - ShadowfaxM  - - - <br>";

          $crtdatetime=date('Y-m-d h:i:s');
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v3/clients/orders/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "order_details": {
                  "client_order_id": "'.$value[4].'",
                  "actual_weight": '.$value[7].',
                  "volumetric_weight": '.$value[7].',
                  "product_value": '.$value[10].',
                  "payment_mode": "'.$value[25].'",
                  "cod_amount": "0",
                  "promised_delivery_date": "'.$crtdatetime.'",
                  "total_amount": '.$value[16].'
              },
              "customer_details": {
                  "name": "'.$value[0].'",
                  "contact": "'.$value[2].'",
                  "address_line_1": "'.$value[1].'",
                  "address_line_2": "'.$value[1].'",
                  "city": "'.$value[13].'",
                  "state": "'.$value[12].'",
                  "pincode": '.$value[3].',
                  "alternate_contact": "'.$value[2].'",
                  "latitude": "0",
                  "longitude": "0"
              },
              "pickup_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].',
                  "latitude": "0",
                  "longitude": "0"
              },
              "rts_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].'
              },
              "product_details": [
                  {
                      "hsn_code": "'.$value[4].'",
                      "invoice_no": "'.$value[4].'",
                      "sku_name": "'.$value[4].'",
                      "client_sku_id": "'.$value[17].'",
                      "category": "all",
                      "price": '.$value[16].',
                      "seller_details": {
                          "seller_name": "'.$value[18].'",
                          "seller_address": "'.$value[22].'",
                          "seller_state": "'.$value[23].'",
                          "gstin_number": ""
                      },
                      "taxes": {
                          "cgst": 3,
                          "sgst": 4,
                          "igst": 5,
                          "total_tax": 5.6
                      },
                      "additional_details": {
                          "requires_extra_care": "False",
                          "type_extra_care": "'.$value[14].'"
                      }
                  }
              ]
          }
          ',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo $response;
          $shadowfaxawbno = $response['data']['awb_number'];
          $awbnogenerate = $shadowfaxawbno;
          // echo "<br>";
          // print_r($response);
          // echo "<br>qwerty";

          // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$shadowfaxawbnoudate);
          // exit();
          if($shadowfaxawbno){
            	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$shadowfaxawbnoudate);
            }else{
            	$errormsg = $response['message'];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$shadowfaxawbnoudate);
            }
        }
        if($awbnogenerate){        break;     }
    // Shadowfax
          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // XpressBees
        // if($xpressbeeapion==$key){
        if($xpressbeeapion==$arrayName[$i]){
          // $awbnogenerate = "XB";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - XpressBees  - - -  <br>";

              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
          // $xbawbnois = "131560000012351";
          $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
          $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
          $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
          $xbawbnois = $xpressbeesawbnofetchres['awbnois'];

          $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnois'";
          mysqli_query($conn,$apiused);

          $tdateis = date('Y-m-d');
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://userauthapis.xbees.in/api/auth/generateToken',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                  "username": "admin@rappidx.com",
                  "password": "$rappidx$",
                  "secretkey": "5d009de9ed78dfa2ef472c22cc163046a52f39dd076cac4cf2a57e37c71405b0"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json',
                  'Authorization: Bearer xyz'
                ),
              ));
              $response = curl_exec($curl);
              $response = json_decode($response, true);
              curl_close($curl);
              $xpressbeetoken = $response['token'];
              // echo "<br>";
              // print_r($response);
              // echo "<br>";
              // exit();
              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -//


            $dummy = '{
              "AirWayBillNO": "'.$xbawbnois.'",
              "BusinessAccountName": "Rappidx",
              "OrderNo": "'.$value[4].'",
              "SubOrderNo": "'.$value[4].'",
              "OrderType": "'.$value[25].'",
              "CollectibleAmount": "'.$value[16].'",
              "DeclaredValue": "'.$value[16].'",
              "PickupType": "Vendor",
              "Quantity": "'.$value[6].'",
              "ServiceType": "SD",
              "DropDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[1].'",
                          "City": "'.$value[13].'",
                          "EmailID": "",
                          "Name": "'.$value[0].' ",
                          "PinCode": "'.$value[3].'",
                          "State": "'.$value[12].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[2].'",
                          "Type": "Primary",
                          "VirtualNumber": null
                      }
                  ],
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "PickupDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ],
                  "PickupVendorCode": "'.$value[17].'",
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "RTODetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ]
              },
              "Instruction": "",
              "CustomerPromiseDate": null,
              "IsCommercialProperty": null,
              "IsDGShipmentType": null,
              "IsOpenDelivery": null,
              "IsSameDayDelivery": null,
              "ManifestID": "SGHJDX1554362X",
              "MultiShipmentGroupID": null,
              "SenderName": null,
              "IsEssential": "false",
              "IsSecondaryPacking": "false",
              "PackageDetails": {
                  "Dimensions": {
                      "Height": "'.$value[8].'",
                      "Length": "'.$value[9].'",
                      "Width": "'.$value[7].'"
                  },
                  "Weight": {
                      "BillableWeight": "'.$value[15].'",
                      "PhyWeight": "'.$value[15].'",
                      "VolWeight": "'.$value[15].'"
                  }
              },
              "GSTMultiSellerInfo": [
                  {
                      "BuyerGSTRegNumber": "29AAACU1901H1ZK",
                      "EBNExpiryDate": null,
                      "EWayBillSrNumber": "'.$xbawbnois.'",
                      "InvoiceDate": "'.$tdateis.'",
                      "InvoiceNumber": "'.$value[10].'",
                      "InvoiceValue": null,
                      "IsSellerRegUnderGST": "Yes",
                      "ProductUniqueID": null,
                      "SellerAddress": "'.$value[22].'",
                      "SellerGSTRegNumber": "'.$value[21].'",
                      "SellerName": "'.$value[18].'",
                      "SellerPincode": "'.$value[20].'",
                      "SupplySellerStatePlace": "'.$value[23].'",
                      "HSNDetails": [
                          {
                              "ProductCategory": "Elecrotnics",
                              "ProductDesc": "'.$value[5].'",
                              "CGSTAmount": "",
                              "Discount": null,
                              "GSTTAXRateIGSTN": null,
                              "GSTTaxRateCGSTN": null,
                              "GSTTaxRateSGSTN": null,
                              "GSTTaxTotal": "",
                              "HSNCode": "",
                              "IGSTAmount": null,
                              "ProductQuantity": null,
                              "SGSTAmount": null,
                              "TaxableValue": "'.$value[16].'"
                          }
                      ]
                  }
              ]
          }';
          // print_r($dummy);
          //  -   -   -   -   -   -   -   -   -   -   -   -



          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.shipmentmanifestation.xbees.in/shipmentmanifestation/forward',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$dummy,
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "token: $xpressbeetoken",
              "versionnumber: v1"
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo "<br><br>";
          // print_r($response);
            // if($response['ReturnMessage']=="Successfull"){
            if($response['ReturnCode']=="100"){
              $xbawbnoisreturn = $response['AWBNo'];
              $awbnogenerate = $xbawbnoisreturn;
              echo "<br>XB-UPDATE<br>";
              echo $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$xbawbnoisreturn',`awb_gen_by`='XpressBees' WHERE `Single_Order_Id`='$last_id'";
              echo "<br>XB-UPDATE<br>";
              mysqli_query($conn,$xpressbeeawbnoudate);

              $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnoisreturn'";
              mysqli_query($conn,$apiused);
            }else{
              	$errormsg = $response['ReturnMessage'];
              	$errormsg = mysqli_real_escape_string($conn, $errormsg);
              	$xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
              	mysqli_query($conn,$xpressbeeawbnoudate);
              }
          // exit();
          // echo $response;

        }
        if($awbnogenerate){        break;     }
    // XpressBees
          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // DTDC
        // if ($dtdcapion==$key) {
        if ($dtdcapion==$arrayName[$i]) {
          // $awbnogenerate = "DT";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "-DTDC <br>";


          // Item Length DTDC is max 50
              echo $value5 = substr($value[5],0,49);
          // Item Length DTDC is max 50
          // Check COD Order Or Not
          if(!empty($value[11]))
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "cash",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "'.$value[11].'",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }elseif($value[11]==0)
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }else{
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }
          // Check COD Order Or Not

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.shipsy.in/api/customer/integration/consignment/softdata',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $curlcodcheck,

            CURLOPT_HTTPHEADER => array(
              'api-key: dd9c24d16f71ac05fba93bd70502fe',
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);

          // $_SESSION["dtdc"] = $response;
          // $test = $_SESSION["dtdc"];
          // print_r($test);

          // echo "<pre>";
          $awbnogenerate = $response['data'][0]['reference_number'];
          // echo "<br>";
          $response['data'][0]['customer_reference_number'];
          // echo "<br>";
          $response['data'][0]['pieces'][0]['reference_number'];
          // echo "<br>";
          // print_r($response);
          // exit();

          // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$dtdcawbnoudate);
          if($awbnogenerate){
            	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }else{
            	$errormsg1 = $response['data'][0]['reason'];
            	$errormsg2 = $response['data'][0]['message'];
            	$errormsg = $errormsg1." / ".$errormsg2;
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }

        }
        if($awbnogenerate){        break;     }
    // DTDC
          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // Delhivery
        // if ($delhiveryapion==$key) {
        if ($delhiveryapion==$arrayName[$i]) {
          // $awbnogenerate = "DL";
          // echo "AwbNO-".$awbnogenerate." : ";
          $valueone = substr($value[1],0,45);
          $valueone = mysqli_real_escape_string($conn, $valueone);
          $value[5] = mysqli_real_escape_string($conn, $value[5]);
          $valuefive = substr($value[5],0,45);
          echo "<br>  - - - Delhivery - - - <br>";
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
          // Create AWB Number
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          echo $awbnois = $response;
          echo "<br><br>";
          // Create AWB Number


          $delhiverydummy = 'format=json&data={
          "pickup_location": {
              "pin": "'.$value[20].'",
              "add": "'.$value[22].'",
              "phone": "'.$value[19].'",
              "state": "'.$value[23].'",
              "city": "'.$value[24].'",
              "country": "India",
              "name": "RAPPIDX SURFACE"
          },
          "shipments": [
              {
                "return_name": "RAPPIDXSURFACE-B2C",
                "return_pin": "'.$value[20].'",
                "return_city": "'.$value[24].'",
                "return_phone": "'.$value[19].'",
                "return_add": "'.$value[22].'",
                "return_state": "'.$value[23].'",
                "return_country": "India",
                "order": "'.$value[4].'",
                "phone": "'.$value[2].'",
                "products_desc": "'.$valuefive.'",
                "cod_amount": "'.$value[11].'",
                "name": "'.$value[0].'",
                "country": "India",
                "waybill": "'.$awbnois.'",
                "seller_inv_date": "'.$orderdata.'",
                "order_date": "'.$orderdata.'",
                "total_amount": "'.$value[16].'",
                "seller_add": "'.$value[22].'",
                "seller_cst": "'.$value[21].'",
                "add": "'.$valueone.'",
                "seller_name": "'.$value[18].'",
                "seller_inv": "",
                "seller_tin": "",
                "pin": "'.$value[3].'",
                "quantity": "'.$value[6].'",
                "payment_mode": "'.$value[25].'",
                "state": "'.$value[12].'",
                "city": "'.$value[13].'",
                "client": "RAPPIDX SURFACE"
              }
          ]
          }';

    // echo "<pre>";
    // print_r($delhiverydummy);
    // echo "<br><br>";
    // exit();

          // Order Date
            $orderdata = date('Y-m-d H:i:s');
          // Order Date

          // Create a Order
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'format=json&data={
            "pickup_location": {
                "pin": "'.$value[20].'",
                "add": "'.$value[22].'",
                "phone": "'.$value[19].'",
                "state": "'.$value[23].'",
                "city": "'.$value[24].'",
                "country": "India",
                "name": "RAPPIDX SURFACE"
            },
            "shipments": [
                {
                  "return_name": "RAPPIDXSURFACE-B2C",
                  "return_pin": "'.$value[20].'",
                  "return_city": "'.$value[24].'",
                  "return_phone": "'.$value[19].'",
                  "return_add": "'.$value[22].'",
                  "return_state": "'.$value[23].'",
                  "return_country": "India",
                  "order": "'.$value[4].'",
                  "phone": "'.$value[2].'",
                  "products_desc": "'.$valuefive.'",
                  "cod_amount": "'.$value[11].'",
                  "name": "'.$value[0].'",
                  "country": "India",
                  "waybill": "'.$awbnois.'",
                  "seller_inv_date": "'.$orderdata.'",
                  "order_date": "'.$orderdata.'",
                  "total_amount": "'.$value[16].'",
                  "seller_add": "'.$value[22].'",
                  "seller_cst": "'.$value[21].'",
                  "add": "'.$valueone.'",
                  "seller_name": "'.$value[18].'",
                  "seller_inv": "",
                  "seller_tin": "",
                  "pin": "'.$value[3].'",
                  "quantity": "'.$value[6].'",
                  "payment_mode": "'.$value[25].'",
                  "state": "'.$value[12].'",
                  "city": "'.$value[13].'",
                  "client": "RAPPIDX SURFACE"
                }
            ]
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
              'Accept: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response1 = json_decode($response, true);
          // curl_close($curl);
              // echo $response1;
              // echo "<br>";
          if($response1['packages'][0]['status']=="Success"){
            $awbnogenerate = $response1['packages'][0]['waybill'];
          }
              // echo "<br>";
              // print_r($response1);
          // Create a Order //

            // $response = curl_exec($curl);
            // $response = json_decode($response, true);
            // curl_close($curl);

            // $_SESSION["dtdc"] = $response;
            // $test = $_SESSION["dtdc"];
            // print_r($test);

            // // echo "<pre>";
            // $response['data'][0]['reference_number'];
            // // echo "<br>";
            // $response['data'][0]['customer_reference_number'];
            // // echo "<br>";
            // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
            // // echo "<br>";
            // // print_r($response);
            // // exit();
            if($awbnogenerate){
              $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$dtdcawbnoudate);
            }else{
            	$errormsg = $response1['packages'][0]['remarks'][0];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }

          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

        }
        if($awbnogenerate){        break;     }
    // Delhivery
          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

        // echo "<br>";
    }
    // echo "Only Check Loop <br><br><br>";
    // exit();
    // Temperay Delete Code

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
            $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
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

    $orderidcreate = "RPDX00".$last_id;
    $value[4] = $orderidcreate;
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
    if(empty($value[21])){
      $value[21] = "";
    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);










// Check Pincode Is Serviceable Or Not
    // $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
    // $allclientsr=mysqli_query($conn,$allclients);
    // $clientres = mysqli_fetch_assoc($allclientsr);
    // // echo "XB : ".$clientres['xpressbee']."<br>";
    // // echo "DL : ".$clientres['delhivery']."<br>";
    // // echo "SF : ".$clientres['shadowfax']."<br>";
    // // echo "DC : ".$clientres['dtdc']."<br>";
    // if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
    // if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
    // if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
    // if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
    // $crtusers = explode(",",$clientres['disableclientids']);
    // // print_r($crtusers);
    // // echo "<br>";
    // // echo in_array($clientidisa,$crtusers);
    // // echo "<br>";
    // // echo $a = array_search($idisa, $allidisa);
    // // unset($allidisa["$a"]);
    // // $allidisa = implode(",",$allidisa);
    // // $pincode = $row['pincode'];
    // // $clientidisa = $clientres['User_Id'];
    // $crtusers = explode(",",$clientres['disableclientids']);
    // if(in_array($user_id,$crtusers)){
    //     $xpressbeeapion = "XB";
    //     $shadowfaxapion = "SF";
    //     $dtdcapion = "DT";
    //     $delhiveryapion = "DL";
    // }
// Check Pincode Is Serviceable Or Not








    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

    // print_r($arrayName);
    // echo "<br>";





    // Temperay Delete Code
    // foreach ($allapis1 as $key => $val) {
    for ($i=1;$i<6;$i++){
    // Check All Permissions APIs
        // echo $key."&ensp; ".$val."<br>";


          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
    // Shadowfax
        // if($shadowfaxapion==$key){
        if($shadowfaxapion==$arrayName[$i]){
          // $awbnogenerate = "SF";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - ShadowfaxM  - - - <br>";

          $crtdatetime=date('Y-m-d h:i:s');
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v3/clients/orders/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "order_details": {
                  "client_order_id": "'.$value[4].'",
                  "actual_weight": '.$value[7].',
                  "volumetric_weight": '.$value[7].',
                  "product_value": '.$value[10].',
                  "payment_mode": "'.$value[25].'",
                  "cod_amount": "0",
                  "promised_delivery_date": "'.$crtdatetime.'",
                  "total_amount": '.$value[16].'
              },
              "customer_details": {
                  "name": "'.$value[0].'",
                  "contact": "'.$value[2].'",
                  "address_line_1": "'.$value[1].'",
                  "address_line_2": "'.$value[1].'",
                  "city": "'.$value[13].'",
                  "state": "'.$value[12].'",
                  "pincode": '.$value[3].',
                  "alternate_contact": "'.$value[2].'",
                  "latitude": "0",
                  "longitude": "0"
              },
              "pickup_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].',
                  "latitude": "0",
                  "longitude": "0"
              },
              "rts_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].'
              },
              "product_details": [
                  {
                      "hsn_code": "'.$value[4].'",
                      "invoice_no": "'.$value[4].'",
                      "sku_name": "'.$value[4].'",
                      "client_sku_id": "'.$value[17].'",
                      "category": "all",
                      "price": '.$value[16].',
                      "seller_details": {
                          "seller_name": "'.$value[18].'",
                          "seller_address": "'.$value[22].'",
                          "seller_state": "'.$value[23].'",
                          "gstin_number": ""
                      },
                      "taxes": {
                          "cgst": 3,
                          "sgst": 4,
                          "igst": 5,
                          "total_tax": 5.6
                      },
                      "additional_details": {
                          "requires_extra_care": "False",
                          "type_extra_care": "'.$value[14].'"
                      }
                  }
              ]
          }
          ',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo $response;
          $shadowfaxawbno = $response['data']['awb_number'];
          $awbnogenerate = $shadowfaxawbno;
          // echo "<br>";
          // print_r($response);
          // echo "<br>qwerty";

          // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$shadowfaxawbnoudate);
          // exit();
          if($shadowfaxawbno){
          	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
          	mysqli_query($conn,$shadowfaxawbnoudate);
          }else{
          	$errormsg = $response['message'];
          	$errormsg = mysqli_real_escape_string($conn, $errormsg);
          	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
          	mysqli_query($conn,$shadowfaxawbnoudate);
          }
        }
        if($awbnogenerate){        break;     }
    // Shadowfax
          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // XpressBees
        // if($xpressbeeapion==$key){
        if($xpressbeeapion==$arrayName[$i]){
          // $awbnogenerate = "XB";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - XpressBees  - - -  <br>";

              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
          // $xbawbnois = "131560000012351";
          $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
          $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
          $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
          $xbawbnois = $xpressbeesawbnofetchres['awbnois'];

          $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnois'";
          mysqli_query($conn,$apiused);

          $tdateis = date('Y-m-d');
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://userauthapis.xbees.in/api/auth/generateToken',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                  "username": "admin@rappidx.com",
                  "password": "$rappidx$",
                  "secretkey": "5d009de9ed78dfa2ef472c22cc163046a52f39dd076cac4cf2a57e37c71405b0"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json',
                  'Authorization: Bearer xyz'
                ),
              ));
              $response = curl_exec($curl);
              $response = json_decode($response, true);
              curl_close($curl);
              $xpressbeetoken = $response['token'];
              // echo "<br>";
              // print_r($response);
              // echo "<br>";
              // exit();
              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -//


            $dummy = '{
              "AirWayBillNO": "'.$xbawbnois.'",
              "BusinessAccountName": "Rappidx",
              "OrderNo": "'.$value[4].'",
              "SubOrderNo": "'.$value[4].'",
              "OrderType": "'.$value[25].'",
              "CollectibleAmount": "'.$value[16].'",
              "DeclaredValue": "'.$value[16].'",
              "PickupType": "Vendor",
              "Quantity": "'.$value[6].'",
              "ServiceType": "SD",
              "DropDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[1].'",
                          "City": "'.$value[13].'",
                          "EmailID": "",
                          "Name": "'.$value[0].' ",
                          "PinCode": "'.$value[3].'",
                          "State": "'.$value[12].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[2].'",
                          "Type": "Primary",
                          "VirtualNumber": null
                      }
                  ],
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "PickupDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ],
                  "PickupVendorCode": "'.$value[17].'",
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "RTODetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ]
              },
              "Instruction": "",
              "CustomerPromiseDate": null,
              "IsCommercialProperty": null,
              "IsDGShipmentType": null,
              "IsOpenDelivery": null,
              "IsSameDayDelivery": null,
              "ManifestID": "SGHJDX1554362X",
              "MultiShipmentGroupID": null,
              "SenderName": null,
              "IsEssential": "false",
              "IsSecondaryPacking": "false",
              "PackageDetails": {
                  "Dimensions": {
                      "Height": "'.$value[8].'",
                      "Length": "'.$value[9].'",
                      "Width": "'.$value[7].'"
                  },
                  "Weight": {
                      "BillableWeight": "'.$value[15].'",
                      "PhyWeight": "'.$value[15].'",
                      "VolWeight": "'.$value[15].'"
                  }
              },
              "GSTMultiSellerInfo": [
                  {
                      "BuyerGSTRegNumber": "29AAACU1901H1ZK",
                      "EBNExpiryDate": null,
                      "EWayBillSrNumber": "'.$xbawbnois.'",
                      "InvoiceDate": "'.$tdateis.'",
                      "InvoiceNumber": "'.$value[10].'",
                      "InvoiceValue": null,
                      "IsSellerRegUnderGST": "Yes",
                      "ProductUniqueID": null,
                      "SellerAddress": "'.$value[22].'",
                      "SellerGSTRegNumber": "'.$value[21].'",
                      "SellerName": "'.$value[18].'",
                      "SellerPincode": "'.$value[20].'",
                      "SupplySellerStatePlace": "'.$value[23].'",
                      "HSNDetails": [
                          {
                              "ProductCategory": "Elecrotnics",
                              "ProductDesc": "'.$value[5].'",
                              "CGSTAmount": "",
                              "Discount": null,
                              "GSTTAXRateIGSTN": null,
                              "GSTTaxRateCGSTN": null,
                              "GSTTaxRateSGSTN": null,
                              "GSTTaxTotal": "",
                              "HSNCode": "",
                              "IGSTAmount": null,
                              "ProductQuantity": null,
                              "SGSTAmount": null,
                              "TaxableValue": "'.$value[16].'"
                          }
                      ]
                  }
              ]
          }';
          // print_r($dummy);
          //  -   -   -   -   -   -   -   -   -   -   -   -



          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.shipmentmanifestation.xbees.in/shipmentmanifestation/forward',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$dummy,
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "token: $xpressbeetoken",
              "versionnumber: v1"
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo "<br><br>";
          // print_r($response);
            // if($response['ReturnMessage']=="Successfull"){
            if($response['ReturnCode']=="100"){
              $xbawbnoisreturn = $response['AWBNo'];
              $awbnogenerate = $xbawbnoisreturn;
              echo "<br>XB-UPDATE<br>";
              echo $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$xbawbnoisreturn',`awb_gen_by`='XpressBees' WHERE `Single_Order_Id`='$last_id'";
              echo "<br>XB-UPDATE<br>";
              mysqli_query($conn,$xpressbeeawbnoudate);

              $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnoisreturn'";
              mysqli_query($conn,$apiused);
              }else{
                $errormsg = $response['ReturnMessage'];
                $errormsg = mysqli_real_escape_string($conn, $errormsg);
                $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
                mysqli_query($conn,$xpressbeeawbnoudate);
              }
          // exit();
          // echo $response;

        }
        if($awbnogenerate){        break;     }
    // XpressBees
          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // DTDC
        // if ($dtdcapion==$key) {
        if ($dtdcapion==$arrayName[$i]) {
          // $awbnogenerate = "DT";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "-DTDC <br>";


          // Item Length DTDC is max 50
              echo $value5 = substr($value[5],0,49);
          // Item Length DTDC is max 50
          // Check COD Order Or Not
          if(!empty($value[11]))
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "cash",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "'.$value[11].'",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }elseif($value[11]==0)
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }else{
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }
          // Check COD Order Or Not

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.shipsy.in/api/customer/integration/consignment/softdata',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $curlcodcheck,

            CURLOPT_HTTPHEADER => array(
              'api-key: dd9c24d16f71ac05fba93bd70502fe',
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);

          // $_SESSION["dtdc"] = $response;
          // $test = $_SESSION["dtdc"];
          // print_r($test);

          // echo "<pre>";
          $awbnogenerate = $response['data'][0]['reference_number'];
          // echo "<br>";
          $response['data'][0]['customer_reference_number'];
          // echo "<br>";
          $response['data'][0]['pieces'][0]['reference_number'];
          // echo "<br>";
          // print_r($response);
          // exit();

          // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$dtdcawbnoudate);
          if($awbnogenerate){
          	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
          	mysqli_query($conn,$dtdcawbnoudate);
          }else{
          	$errormsg1 = $response['data'][0]['reason'];
          	$errormsg2 = $response['data'][0]['message'];
          	$errormsg = $errormsg1." / ".$errormsg2;
          	$errormsg = mysqli_real_escape_string($conn, $errormsg);
          	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
          	mysqli_query($conn,$dtdcawbnoudate);
          }

        }
        if($awbnogenerate){        break;     }
    // DTDC
          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // Delhivery
        // if ($delhiveryapion==$key) {
        if ($delhiveryapion==$arrayName[$i]) {
          // $awbnogenerate = "DL";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - Delhivery - - - <br>";
          $valueone = substr($value[1],0,45);
          $valueone = mysqli_real_escape_string($conn, $valueone);
          $value[5] = mysqli_real_escape_string($conn, $value[5]);
          $valuefive = substr($value[5],0,45);
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
          // Create AWB Number
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          echo $awbnois = $response;
          echo "<br><br>";
          // Create AWB Number


          $delhiverydummy = 'format=json&data={
          "pickup_location": {
              "pin": "'.$value[20].'",
              "add": "'.$value[22].'",
              "phone": "'.$value[19].'",
              "state": "'.$value[23].'",
              "city": "'.$value[24].'",
              "country": "India",
              "name": "RAPPIDX SURFACE"
          },
          "shipments": [
              {
                "return_name": "RAPPIDXSURFACE-B2C",
                "return_pin": "'.$value[20].'",
                "return_city": "'.$value[24].'",
                "return_phone": "'.$value[19].'",
                "return_add": "'.$value[22].'",
                "return_state": "'.$value[23].'",
                "return_country": "India",
                "order": "'.$value[4].'",
                "phone": "'.$value[2].'",
                "products_desc": "'.$valuefive.'",
                "cod_amount": "'.$value[11].'",
                "name": "'.$value[0].'",
                "country": "India",
                "waybill": "'.$awbnois.'",
                "seller_inv_date": "'.$orderdata.'",
                "order_date": "'.$orderdata.'",
                "total_amount": "'.$value[16].'",
                "seller_add": "'.$value[22].'",
                "seller_cst": "'.$value[21].'",
                "add": "'.$valueone.'",
                "seller_name": "'.$value[18].'",
                "seller_inv": "",
                "seller_tin": "",
                "pin": "'.$value[3].'",
                "quantity": "'.$value[6].'",
                "payment_mode": "'.$value[25].'",
                "state": "'.$value[12].'",
                "city": "'.$value[13].'",
                "client": "RAPPIDX SURFACE"
              }
          ]
          }';

    // echo "<pre>";
    // print_r($delhiverydummy);
    // echo "<br><br>";
    // exit();

          // Order Date
            $orderdata = date('Y-m-d H:i:s');
          // Order Date

          // Create a Order
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'format=json&data={
            "pickup_location": {
                "pin": "'.$value[20].'",
                "add": "'.$value[22].'",
                "phone": "'.$value[19].'",
                "state": "'.$value[23].'",
                "city": "'.$value[24].'",
                "country": "India",
                "name": "RAPPIDX SURFACE"
            },
            "shipments": [
                {
                  "return_name": "RAPPIDXSURFACE-B2C",
                  "return_pin": "'.$value[20].'",
                  "return_city": "'.$value[24].'",
                  "return_phone": "'.$value[19].'",
                  "return_add": "'.$value[22].'",
                  "return_state": "'.$value[23].'",
                  "return_country": "India",
                  "order": "'.$value[4].'",
                  "phone": "'.$value[2].'",
                  "products_desc": "'.$valuefive.'",
                  "cod_amount": "'.$value[11].'",
                  "name": "'.$value[0].'",
                  "country": "India",
                  "waybill": "'.$awbnois.'",
                  "seller_inv_date": "'.$orderdata.'",
                  "order_date": "'.$orderdata.'",
                  "total_amount": "'.$value[16].'",
                  "seller_add": "'.$value[22].'",
                  "seller_cst": "'.$value[21].'",
                  "add": "'.$valueone.'",
                  "seller_name": "'.$value[18].'",
                  "seller_inv": "",
                  "seller_tin": "",
                  "pin": "'.$value[3].'",
                  "quantity": "'.$value[6].'",
                  "payment_mode": "'.$value[25].'",
                  "state": "'.$value[12].'",
                  "city": "'.$value[13].'",
                  "client": "RAPPIDX SURFACE"
                }
            ]
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
              'Accept: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response1 = json_decode($response, true);
          // curl_close($curl);
              // echo $response1;
              // echo "<br>";
          if($response1['packages'][0]['status']=="Success"){
            $awbnogenerate = $response1['packages'][0]['waybill'];
          }
              // echo "<br>";
              // print_r($response1);
          // Create a Order //

            // $response = curl_exec($curl);
            // $response = json_decode($response, true);
            // curl_close($curl);

            // $_SESSION["dtdc"] = $response;
            // $test = $_SESSION["dtdc"];
            // print_r($test);

            // // echo "<pre>";
            // $response['data'][0]['reference_number'];
            // // echo "<br>";
            // $response['data'][0]['customer_reference_number'];
            // // echo "<br>";
            // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
            // // echo "<br>";
            // // print_r($response);
            // // exit();
            if($awbnogenerate){
              $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$dtdcawbnoudate);
            }else{
              	$errormsg = $response1['packages'][0]['remarks'][0];
              	$errormsg = mysqli_real_escape_string($conn, $errormsg);
              	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
              	mysqli_query($conn,$dtdcawbnoudate);
            }

          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

        }
        if($awbnogenerate){        break;     }
    // Delhivery
          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//


        // echo "<br>";
    }
    // echo "Only Check Loop <br><br><br>";
    // exit();
    // Temperay Delete Code
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
            $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
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

    $orderidcreate = "RPDX00".$last_id;
    echo $value[4] = $orderidcreate;
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
    if(empty($value[21])){
      $value[21] = "";
    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);












// Check Pincode Is Serviceable Or Not
    // $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
    // $allclientsr=mysqli_query($conn,$allclients);
    // $clientres = mysqli_fetch_assoc($allclientsr);
    // echo "XB : ".$clientres['xpressbee']."<br>";
    // echo "DL : ".$clientres['delhivery']."<br>";
    // echo "SF : ".$clientres['shadowfax']."<br>";
    // echo "DC : ".$clientres['dtdc']."<br>";
    // if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
    // if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
    // if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
    // if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
    // $crtusers = explode(",",$clientres['disableclientids']);
    // // print_r($crtusers);
    // // echo "<br>";
    // // echo in_array($clientidisa,$crtusers);
    // // echo "<br>";
    // // echo $a = array_search($idisa, $allidisa);
    // // unset($allidisa["$a"]);
    // // $allidisa = implode(",",$allidisa);
    // // $pincode = $row['pincode'];
    // // $clientidisa = $clientres['User_Id'];
    // $crtusers = explode(",",$clientres['disableclientids']);
    // if(in_array($user_id,$crtusers)){
    //     $xpressbeeapion = "XB";
    //     $shadowfaxapion = "SF";
    //     $dtdcapion = "DT";
    //     $delhiveryapion = "DL";
    // }
// Check Pincode Is Serviceable Or Not





    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

    // print_r($arrayName);
    // echo "<br>";






    // Temperay Delete Code
    // foreach ($allapis1 as $key => $val) {
    for ($i=1;$i<6;$i++){
    // Check All Permissions APIs
        // echo $key."&ensp; ".$val."<br>";


          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
    // Shadowfax
        // if($shadowfaxapion==$key){
        if($shadowfaxapion==$arrayName[$i]){
          // $awbnogenerate = "SF";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - ShadowfaxM  - - - <br>";

          $crtdatetime=date('Y-m-d h:i:s');
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v3/clients/orders/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "order_details": {
                  "client_order_id": "'.$value[4].'",
                  "actual_weight": '.$value[7].',
                  "volumetric_weight": '.$value[7].',
                  "product_value": '.$value[10].',
                  "payment_mode": "'.$value[25].'",
                  "cod_amount": "0",
                  "promised_delivery_date": "'.$crtdatetime.'",
                  "total_amount": '.$value[16].'
              },
              "customer_details": {
                  "name": "'.$value[0].'",
                  "contact": "'.$value[2].'",
                  "address_line_1": "'.$value[1].'",
                  "address_line_2": "'.$value[1].'",
                  "city": "'.$value[13].'",
                  "state": "'.$value[12].'",
                  "pincode": '.$value[3].',
                  "alternate_contact": "'.$value[2].'",
                  "latitude": "0",
                  "longitude": "0"
              },
              "pickup_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].',
                  "latitude": "0",
                  "longitude": "0"
              },
              "rts_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].'
              },
              "product_details": [
                  {
                      "hsn_code": "'.$value[4].'",
                      "invoice_no": "'.$value[4].'",
                      "sku_name": "'.$value[4].'",
                      "client_sku_id": "'.$value[17].'",
                      "category": "all",
                      "price": '.$value[16].',
                      "seller_details": {
                          "seller_name": "'.$value[18].'",
                          "seller_address": "'.$value[22].'",
                          "seller_state": "'.$value[23].'",
                          "gstin_number": ""
                      },
                      "taxes": {
                          "cgst": 3,
                          "sgst": 4,
                          "igst": 5,
                          "total_tax": 5.6
                      },
                      "additional_details": {
                          "requires_extra_care": "False",
                          "type_extra_care": "'.$value[14].'"
                      }
                  }
              ]
          }
          ',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo $response;
          $shadowfaxawbno = $response['data']['awb_number'];
          $awbnogenerate = $shadowfaxawbno;
          // echo "<br>";
          // print_r($response);
          // echo "<br>qwerty";

          // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$shadowfaxawbnoudate);
          // exit();
          if($shadowfaxawbno){
          	   $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$shadowfaxawbnoudate);
            }else{
            	$errormsg = $response['message'];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$shadowfaxawbnoudate);
            }
        }
        if($awbnogenerate){        break;     }
    // Shadowfax
          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // XpressBees
        // if($xpressbeeapion==$key){
        if($xpressbeeapion==$arrayName[$i]){
          // $awbnogenerate = "XB";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - XpressBees  - - -  <br>";

              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
          // $xbawbnois = "131560000012351";
          $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
          $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
          $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
          $xbawbnois = $xpressbeesawbnofetchres['awbnois'];

          $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnois'";
          mysqli_query($conn,$apiused);

          $tdateis = date('Y-m-d');
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://userauthapis.xbees.in/api/auth/generateToken',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                  "username": "admin@rappidx.com",
                  "password": "$rappidx$",
                  "secretkey": "5d009de9ed78dfa2ef472c22cc163046a52f39dd076cac4cf2a57e37c71405b0"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json',
                  'Authorization: Bearer xyz'
                ),
              ));
              $response = curl_exec($curl);
              $response = json_decode($response, true);
              curl_close($curl);
              $xpressbeetoken = $response['token'];
              // echo "<br>";
              // print_r($response);
              // echo "<br>";
              // exit();
              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -//


            $dummy = '{
              "AirWayBillNO": "'.$xbawbnois.'",
              "BusinessAccountName": "Rappidx",
              "OrderNo": "'.$value[4].'",
              "SubOrderNo": "'.$value[4].'",
              "OrderType": "'.$value[25].'",
              "CollectibleAmount": "'.$value[16].'",
              "DeclaredValue": "'.$value[16].'",
              "PickupType": "Vendor",
              "Quantity": "'.$value[6].'",
              "ServiceType": "SD",
              "DropDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[1].'",
                          "City": "'.$value[13].'",
                          "EmailID": "",
                          "Name": "'.$value[0].' ",
                          "PinCode": "'.$value[3].'",
                          "State": "'.$value[12].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[2].'",
                          "Type": "Primary",
                          "VirtualNumber": null
                      }
                  ],
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "PickupDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ],
                  "PickupVendorCode": "'.$value[17].'",
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "RTODetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ]
              },
              "Instruction": "",
              "CustomerPromiseDate": null,
              "IsCommercialProperty": null,
              "IsDGShipmentType": null,
              "IsOpenDelivery": null,
              "IsSameDayDelivery": null,
              "ManifestID": "SGHJDX1554362X",
              "MultiShipmentGroupID": null,
              "SenderName": null,
              "IsEssential": "false",
              "IsSecondaryPacking": "false",
              "PackageDetails": {
                  "Dimensions": {
                      "Height": "'.$value[8].'",
                      "Length": "'.$value[9].'",
                      "Width": "'.$value[7].'"
                  },
                  "Weight": {
                      "BillableWeight": "'.$value[15].'",
                      "PhyWeight": "'.$value[15].'",
                      "VolWeight": "'.$value[15].'"
                  }
              },
              "GSTMultiSellerInfo": [
                  {
                      "BuyerGSTRegNumber": "29AAACU1901H1ZK",
                      "EBNExpiryDate": null,
                      "EWayBillSrNumber": "'.$xbawbnois.'",
                      "InvoiceDate": "'.$tdateis.'",
                      "InvoiceNumber": "'.$value[10].'",
                      "InvoiceValue": null,
                      "IsSellerRegUnderGST": "Yes",
                      "ProductUniqueID": null,
                      "SellerAddress": "'.$value[22].'",
                      "SellerGSTRegNumber": "'.$value[21].'",
                      "SellerName": "'.$value[18].'",
                      "SellerPincode": "'.$value[20].'",
                      "SupplySellerStatePlace": "'.$value[23].'",
                      "HSNDetails": [
                          {
                              "ProductCategory": "Elecrotnics",
                              "ProductDesc": "'.$value[5].'",
                              "CGSTAmount": "",
                              "Discount": null,
                              "GSTTAXRateIGSTN": null,
                              "GSTTaxRateCGSTN": null,
                              "GSTTaxRateSGSTN": null,
                              "GSTTaxTotal": "",
                              "HSNCode": "",
                              "IGSTAmount": null,
                              "ProductQuantity": null,
                              "SGSTAmount": null,
                              "TaxableValue": "'.$value[16].'"
                          }
                      ]
                  }
              ]
          }';
          // print_r($dummy);
          //  -   -   -   -   -   -   -   -   -   -   -   -



          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.shipmentmanifestation.xbees.in/shipmentmanifestation/forward',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$dummy,
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "token: $xpressbeetoken",
              "versionnumber: v1"
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo "<br><br>";
          // print_r($response);
            // if($response['ReturnMessage']=="Successfull"){
            if($response['ReturnCode']=="100"){
              $xbawbnoisreturn = $response['AWBNo'];
              $awbnogenerate = $xbawbnoisreturn;
              echo "<br>XB-UPDATE<br>";
              echo $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$xbawbnoisreturn',`awb_gen_by`='XpressBees' WHERE `Single_Order_Id`='$last_id'";
              echo "<br>XB-UPDATE<br>";
              mysqli_query($conn,$xpressbeeawbnoudate);

              $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnoisreturn'";
              mysqli_query($conn,$apiused);
            }else{
            	$errormsg = $response['ReturnMessage'];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$xpressbeeawbnoudate);
            }
          // exit();
          // echo $response;

        }
        if($awbnogenerate){        break;     }
    // XpressBees
          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // DTDC
        // if ($dtdcapion==$key) {
        if ($dtdcapion==$arrayName[$i]) {
          // $awbnogenerate = "DT";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "-DTDC <br>";


          // Item Length DTDC is max 50
              echo $value5 = substr($value[5],0,49);
          // Item Length DTDC is max 50
          // Check COD Order Or Not
          if(!empty($value[11]))
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "cash",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "'.$value[11].'",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }elseif($value[11]==0)
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }else{
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }
          // Check COD Order Or Not

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.shipsy.in/api/customer/integration/consignment/softdata',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $curlcodcheck,

            CURLOPT_HTTPHEADER => array(
              'api-key: dd9c24d16f71ac05fba93bd70502fe',
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);

          // $_SESSION["dtdc"] = $response;
          // $test = $_SESSION["dtdc"];
          // print_r($test);

          // echo "<pre>";
          $awbnogenerate = $response['data'][0]['reference_number'];
          // echo "<br>";
          $response['data'][0]['customer_reference_number'];
          // echo "<br>";
          $response['data'][0]['pieces'][0]['reference_number'];
          // echo "<br>";
          // print_r($response);
          // exit();

          // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$dtdcawbnoudate);
          if($awbnogenerate){
            	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }else{
            	$errormsg1 = $response['data'][0]['reason'];
            	$errormsg2 = $response['data'][0]['message'];
            	$errormsg = $errormsg1." / ".$errormsg2;
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }

        }
        if($awbnogenerate){        break;     }
    // DTDC
          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // Delhivery
        // if ($delhiveryapion==$key) {
        if ($delhiveryapion==$arrayName[$i]) {
          // $awbnogenerate = "DL";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - Delhivery - - - <br>";
          $valueone = substr($value[1],0,45);
          $valueone = mysqli_real_escape_string($conn, $valueone);
          $value[5] = mysqli_real_escape_string($conn, $value[5]);
          $valuefive = substr($value[5],0,45);
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
          // Create AWB Number
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          echo $awbnois = $response;
          echo "<br><br>";
          // Create AWB Number


          $delhiverydummy = 'format=json&data={
          "pickup_location": {
              "pin": "'.$value[20].'",
              "add": "'.$value[22].'",
              "phone": "'.$value[19].'",
              "state": "'.$value[23].'",
              "city": "'.$value[24].'",
              "country": "India",
              "name": "RAPPIDX SURFACE"
          },
          "shipments": [
              {
                "return_name": "RAPPIDXSURFACE-B2C",
                "return_pin": "'.$value[20].'",
                "return_city": "'.$value[24].'",
                "return_phone": "'.$value[19].'",
                "return_add": "'.$value[22].'",
                "return_state": "'.$value[23].'",
                "return_country": "India",
                "order": "'.$value[4].'",
                "phone": "'.$value[2].'",
                "products_desc": "'.$valuefive.'",
                "cod_amount": "'.$value[11].'",
                "name": "'.$value[0].'",
                "country": "India",
                "waybill": "'.$awbnois.'",
                "seller_inv_date": "'.$orderdata.'",
                "order_date": "'.$orderdata.'",
                "total_amount": "'.$value[16].'",
                "seller_add": "'.$value[22].'",
                "seller_cst": "'.$value[21].'",
                "add": "'.$valueone.'",
                "seller_name": "'.$value[18].'",
                "seller_inv": "",
                "seller_tin": "",
                "pin": "'.$value[3].'",
                "quantity": "'.$value[6].'",
                "payment_mode": "'.$value[25].'",
                "state": "'.$value[12].'",
                "city": "'.$value[13].'",
                "client": "RAPPIDX SURFACE"
              }
          ]
          }';

    // echo "<pre>";
    // print_r($delhiverydummy);
    // echo "<br><br>";
    // exit();

          // Order Date
            $orderdata = date('Y-m-d H:i:s');
          // Order Date

          // Create a Order
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'format=json&data={
            "pickup_location": {
                "pin": "'.$value[20].'",
                "add": "'.$value[22].'",
                "phone": "'.$value[19].'",
                "state": "'.$value[23].'",
                "city": "'.$value[24].'",
                "country": "India",
                "name": "RAPPIDX SURFACE"
            },
            "shipments": [
                {
                  "return_name": "RAPPIDXSURFACE-B2C",
                  "return_pin": "'.$value[20].'",
                  "return_city": "'.$value[24].'",
                  "return_phone": "'.$value[19].'",
                  "return_add": "'.$value[22].'",
                  "return_state": "'.$value[23].'",
                  "return_country": "India",
                  "order": "'.$value[4].'",
                  "phone": "'.$value[2].'",
                  "products_desc": "'.$valuefive.'",
                  "cod_amount": "'.$value[11].'",
                  "name": "'.$value[0].'",
                  "country": "India",
                  "waybill": "'.$awbnois.'",
                  "seller_inv_date": "'.$orderdata.'",
                  "order_date": "'.$orderdata.'",
                  "total_amount": "'.$value[16].'",
                  "seller_add": "'.$value[22].'",
                  "seller_cst": "'.$value[21].'",
                  "add": "'.$valueone.'",
                  "seller_name": "'.$value[18].'",
                  "seller_inv": "",
                  "seller_tin": "",
                  "pin": "'.$value[3].'",
                  "quantity": "'.$value[6].'",
                  "payment_mode": "'.$value[25].'",
                  "state": "'.$value[12].'",
                  "city": "'.$value[13].'",
                  "client": "RAPPIDX SURFACE"
                }
            ]
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
              'Accept: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response1 = json_decode($response, true);
          // curl_close($curl);
              // echo $response1;
              // echo "<br>";
          if($response1['packages'][0]['status']=="Success"){
            $awbnogenerate = $response1['packages'][0]['waybill'];
          }
              // echo "<br>";
              // print_r($response1);
          // Create a Order //

            // $response = curl_exec($curl);
            // $response = json_decode($response, true);
            // curl_close($curl);

            // $_SESSION["dtdc"] = $response;
            // $test = $_SESSION["dtdc"];
            // print_r($test);

            // // echo "<pre>";
            // $response['data'][0]['reference_number'];
            // // echo "<br>";
            // $response['data'][0]['customer_reference_number'];
            // // echo "<br>";
            // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
            // // echo "<br>";
            // // print_r($response);
            // // exit();
            if($awbnogenerate){
              $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$dtdcawbnoudate);
            }else{
            	$errormsg = $response1['packages'][0]['remarks'][0];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }

          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

        }
        if($awbnogenerate){        break;     }
    // Delhivery
          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



        echo "<br>";
    }
    // echo "Only Check Loop <br><br><br>";
    // exit();
    // Temperay Delete Code

                echo "<br><br>";
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
            $bannername = $_FILES["bulkorderfile"]["name"];
            $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
            move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");

            $fileD = fopen("BulkExcelFiles/$bannername","r");

            $column=fgetcsv($fileD);
            while(!feof($fileD)){
             $rowData[]=fgetcsv($fileD);
            }
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

    $orderidcreate = "RPDX00".$last_id;
    echo $value[4] = $orderidcreate;
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
    if(empty($value[21])){
      $value[21] = "";
    }
    $value[22] = trim($value[22]);
    $value[23] = trim($value[23]);
    $value[24] = trim($value[24]);









// Check Pincode Is Serviceable Or Not
    // $allclients = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$value[3]'";
    // $allclientsr=mysqli_query($conn,$allclients);
    // $clientres = mysqli_fetch_assoc($allclientsr);
    // echo "XB : ".$clientres['xpressbee']."<br>";
    // echo "DL : ".$clientres['delhivery']."<br>";
    // echo "SF : ".$clientres['shadowfax']."<br>";
    // echo "DC : ".$clientres['dtdc']."<br>";
    // if(!empty($clientres['xpressbee'])){  $xpressbeeapion = "XpressBee";  }else{  $xpressbeeapion = "XB"; }
    // if(!empty($clientres['shadowfax'])){  $shadowfaxapion = "ShadowFax";  }else{  $shadowfaxapion = "SF"; }
    // if(!empty($clientres['dtdc'])){       $dtdcapion = "DTDC";            }else{  $dtdcapion = "DT";      }
    // if(!empty($clientres['delhivery'])){  $delhiveryapion = "Delhivery";  }else{  $delhiveryapion = "DL"; }
    // $crtusers = explode(",",$clientres['disableclientids']);
    // // print_r($crtusers);
    // // echo "<br>";
    // // echo in_array($clientidisa,$crtusers);
    // // echo "<br>";
    // // echo $a = array_search($idisa, $allidisa);
    // // unset($allidisa["$a"]);
    // // $allidisa = implode(",",$allidisa);
    // // $pincode = $row['pincode'];
    // // $clientidisa = $clientres['User_Id'];
    // $crtusers = explode(",",$clientres['disableclientids']);
    // if(in_array($user_id,$crtusers)){
    //     $xpressbeeapion = "XB";
    //     $shadowfaxapion = "SF";
    //     $dtdcapion = "DT";
    //     $delhiveryapion = "DL";
    // }
// Check Pincode Is Serviceable Or Not







    $apipermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $permissionsr=mysqli_query($conn,$apipermission);
    $pres = mysqli_fetch_assoc($permissionsr);
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

    // print_r($arrayName);
    // echo "<br>";






    // Temperay Delete Code
    // foreach ($allapis1 as $key => $val) {
    for ($i=1;$i<6;$i++){
    // Check All Permissions APIs
        // echo $key."&ensp; ".$val."<br>";


          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *
    // Shadowfax
        // if($shadowfaxapion==$key){
        if($shadowfaxapion==$arrayName[$i]){
          // $awbnogenerate = "SF";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - ShadowfaxM  - - - <br>";

          $crtdatetime=date('Y-m-d h:i:s');
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v3/clients/orders/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "order_details": {
                  "client_order_id": "'.$value[4].'",
                  "actual_weight": '.$value[7].',
                  "volumetric_weight": '.$value[7].',
                  "product_value": '.$value[10].',
                  "payment_mode": "'.$value[25].'",
                  "cod_amount": "0",
                  "promised_delivery_date": "'.$crtdatetime.'",
                  "total_amount": '.$value[16].'
              },
              "customer_details": {
                  "name": "'.$value[0].'",
                  "contact": "'.$value[2].'",
                  "address_line_1": "'.$value[1].'",
                  "address_line_2": "'.$value[1].'",
                  "city": "'.$value[13].'",
                  "state": "'.$value[12].'",
                  "pincode": '.$value[3].',
                  "alternate_contact": "'.$value[2].'",
                  "latitude": "0",
                  "longitude": "0"
              },
              "pickup_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].',
                  "latitude": "0",
                  "longitude": "0"
              },
              "rts_details": {
                  "name": "'.$value[18].'",
                  "contact": "'.$value[19].'",
                  "address_line_1": "'.$value[22].'",
                  "address_line_2": "'.$value[22].'",
                  "city": "'.$value[24].'",
                  "state": "'.$value[23].'",
                  "pincode": '.$value[20].'
              },
              "product_details": [
                  {
                      "hsn_code": "'.$value[4].'",
                      "invoice_no": "'.$value[4].'",
                      "sku_name": "'.$value[4].'",
                      "client_sku_id": "'.$value[17].'",
                      "category": "all",
                      "price": '.$value[16].',
                      "seller_details": {
                          "seller_name": "'.$value[18].'",
                          "seller_address": "'.$value[22].'",
                          "seller_state": "'.$value[23].'",
                          "gstin_number": ""
                      },
                      "taxes": {
                          "cgst": 3,
                          "sgst": 4,
                          "igst": 5,
                          "total_tax": 5.6
                      },
                      "additional_details": {
                          "requires_extra_care": "False",
                          "type_extra_care": "'.$value[14].'"
                      }
                  }
              ]
          }
          ',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json',
              'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo $response;
          $shadowfaxawbno = $response['data']['awb_number'];
          $awbnogenerate = $shadowfaxawbno;
          // echo "<br>";
          // print_r($response);
          // echo "<br>qwerty";

          // $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$shadowfaxawbnoudate);
          // exit();
          if($shadowfaxawbno){
            	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$shadowfaxawbno',`awb_gen_by`='Shadowfax' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$shadowfaxawbnoudate);
            }else{
            	$errormsg = $response['message'];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `shferrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$shadowfaxawbnoudate);
            }

        }
        if($awbnogenerate){        break;     }
    // Shadowfax
          // // Shadowfax API     *   *   *   *   *   *   *   *   *   *   *   *  //




          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // XpressBees
        // if($xpressbeeapion==$key){
        if($xpressbeeapion==$arrayName[$i]){
          // $awbnogenerate = "XB";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - XpressBees  - - -  <br>";

              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -
          // $xbawbnois = "131560000012351";
          $xpressbeesawbnofetch = "SELECT * FROM `xpressbees_awbno` WHERE `isuse` IS NULL ORDER BY `awb_sr_no` ASC LIMIT 1";
          $xpressbeesawbnofetchr = mysqli_query($conn,$xpressbeesawbnofetch);
          $xpressbeesawbnofetchres = mysqli_fetch_assoc($xpressbeesawbnofetchr);
          $xbawbnois = $xpressbeesawbnofetchres['awbnois'];

          $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnois'";
          mysqli_query($conn,$apiused);

          $tdateis = date('Y-m-d');
              $curl = curl_init();
              curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://userauthapis.xbees.in/api/auth/generateToken',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                  "username": "admin@rappidx.com",
                  "password": "$rappidx$",
                  "secretkey": "5d009de9ed78dfa2ef472c22cc163046a52f39dd076cac4cf2a57e37c71405b0"
              }',
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json',
                  'Authorization: Bearer xyz'
                ),
              ));
              $response = curl_exec($curl);
              $response = json_decode($response, true);
              curl_close($curl);
              $xpressbeetoken = $response['token'];
              // echo "<br>";
              // print_r($response);
              // echo "<br>";
              // exit();
              // XpressBees Token Generate    -   -   -   -   -   -   -   -   -//


            $dummy = '{
              "AirWayBillNO": "'.$xbawbnois.'",
              "BusinessAccountName": "Rappidx",
              "OrderNo": "'.$value[4].'",
              "SubOrderNo": "'.$value[4].'",
              "OrderType": "'.$value[25].'",
              "CollectibleAmount": "'.$value[16].'",
              "DeclaredValue": "'.$value[16].'",
              "PickupType": "Vendor",
              "Quantity": "'.$value[6].'",
              "ServiceType": "SD",
              "DropDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[1].'",
                          "City": "'.$value[13].'",
                          "EmailID": "",
                          "Name": "'.$value[0].' ",
                          "PinCode": "'.$value[3].'",
                          "State": "'.$value[12].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[2].'",
                          "Type": "Primary",
                          "VirtualNumber": null
                      }
                  ],
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "PickupDetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ],
                  "PickupVendorCode": "'.$value[17].'",
                  "IsGenSecurityCode": null,
                  "SecurityCode": null,
                  "IsGeoFencingEnabled": null,
                  "Latitude": null,
                  "Longitude": null,
                  "MaxThresholdRadius": null,
                  "MidPoint": null,
                  "MinThresholdRadius": null,
                  "RediusLocation": null
              },
              "RTODetails": {
                  "Addresses": [
                      {
                          "Address": "'.$value[22].'",
                          "City": "'.$value[24].'",
                          "EmailID": "",
                          "Name": "'.$value[18].'",
                          "PinCode": "'.$value[20].'",
                          "State": "'.$value[23].'",
                          "Type": "Primary"
                      }
                  ],
                  "ContactDetails": [
                      {
                          "PhoneNo": "'.$value[19].'",
                          "Type": "Primary"
                      }
                  ]
              },
              "Instruction": "",
              "CustomerPromiseDate": null,
              "IsCommercialProperty": null,
              "IsDGShipmentType": null,
              "IsOpenDelivery": null,
              "IsSameDayDelivery": null,
              "ManifestID": "SGHJDX1554362X",
              "MultiShipmentGroupID": null,
              "SenderName": null,
              "IsEssential": "false",
              "IsSecondaryPacking": "false",
              "PackageDetails": {
                  "Dimensions": {
                      "Height": "'.$value[8].'",
                      "Length": "'.$value[9].'",
                      "Width": "'.$value[7].'"
                  },
                  "Weight": {
                      "BillableWeight": "'.$value[15].'",
                      "PhyWeight": "'.$value[15].'",
                      "VolWeight": "'.$value[15].'"
                  }
              },
              "GSTMultiSellerInfo": [
                  {
                      "BuyerGSTRegNumber": "29AAACU1901H1ZK",
                      "EBNExpiryDate": null,
                      "EWayBillSrNumber": "'.$xbawbnois.'",
                      "InvoiceDate": "'.$tdateis.'",
                      "InvoiceNumber": "'.$value[10].'",
                      "InvoiceValue": null,
                      "IsSellerRegUnderGST": "Yes",
                      "ProductUniqueID": null,
                      "SellerAddress": "'.$value[22].'",
                      "SellerGSTRegNumber": "'.$value[21].'",
                      "SellerName": "'.$value[18].'",
                      "SellerPincode": "'.$value[20].'",
                      "SupplySellerStatePlace": "'.$value[23].'",
                      "HSNDetails": [
                          {
                              "ProductCategory": "Elecrotnics",
                              "ProductDesc": "'.$value[5].'",
                              "CGSTAmount": "",
                              "Discount": null,
                              "GSTTAXRateIGSTN": null,
                              "GSTTaxRateCGSTN": null,
                              "GSTTaxRateSGSTN": null,
                              "GSTTaxTotal": "",
                              "HSNCode": "",
                              "IGSTAmount": null,
                              "ProductQuantity": null,
                              "SGSTAmount": null,
                              "TaxableValue": "'.$value[16].'"
                          }
                      ]
                  }
              ]
          }';
          // print_r($dummy);
          //  -   -   -   -   -   -   -   -   -   -   -   -



          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.shipmentmanifestation.xbees.in/shipmentmanifestation/forward',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$dummy,
          CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "token: $xpressbeetoken",
              "versionnumber: v1"
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          // echo "<br><br>";
          // print_r($response);
            // if($response['ReturnMessage']=="Successfull"){
            if($response['ReturnCode']=="100"){
              $xbawbnoisreturn = $response['AWBNo'];
              $awbnogenerate = $xbawbnoisreturn;
              echo "<br>XB-UPDATE<br>";
              echo $xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$xbawbnoisreturn',`awb_gen_by`='XpressBees' WHERE `Single_Order_Id`='$last_id'";
              echo "<br>XB-UPDATE<br>";
              mysqli_query($conn,$xpressbeeawbnoudate);

              $apiused = "UPDATE `xpressbees_awbno` SET `isuse`='Used' WHERE `awbnois`='$xbawbnoisreturn'";
              mysqli_query($conn,$apiused);
            }else{
            	$errormsg = $response['ReturnMessage'];
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$xpressbeeawbnoudate = "UPDATE `spark_single_order` SET `xberrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$xpressbeeawbnoudate);
            }
          // exit();
          // echo $response;

        }
        if($awbnogenerate){        break;     }
    // XpressBees
          // XpressBees   *   *   *   *   *   *   *   *   *   *   *   *   *   *//




          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // DTDC
        // if ($dtdcapion==$key) {
        if ($dtdcapion==$arrayName[$i]) {
          // $awbnogenerate = "DT";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "-DTDC <br>";


          // Item Length DTDC is max 50
              echo $value5 = substr($value[5],0,49);
          // Item Length DTDC is max 50
          // Check COD Order Or Not
          if(!empty($value[11]))
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "cash",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "'.$value[11].'",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }elseif($value[11]==0)
          {
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }else{
              $curlcodcheck = '{
              "consignments": [
                  {
                      "customer_code": "GL2467",
                      "reference_number": "",
                      "service_type_id": "GROUND EXPRESS",
                      "load_type": "NON-DOCUMENT",
                      "description": "sample",
                      "cod_favor_of": "",
                      "cod_collection_mode": "",
                      "consignment_type": "Forward",
                      "dimension_unit": "cm",
                      "length": "1",
                      "width": "1",
                      "height": "1",
                      "weight_unit": "kg",
                      "weight": "'.$value[15].'",
                      "declared_value": "'.$value[16].'",
                      "cod_amount": "",
                      "num_pieces": "'.$value[6].'",
                      "commodity_id": "Others",
                      "customer_reference_number": "'.$value[4].'",
                      "is_risk_surcharge_applicable": false,
                      "origin_details": {
                          "name": "'.$value[18].'",
                          "phone": "'.$value[19].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[22].'",
                          "address_line_2": "",
                          "pincode": "'.$value[20].'",
                          "city": "'.$value[24].'",
                          "state": "'.$value[23].'"
                      },
                      "destination_details": {
                          "name": "'.$value[0].'",
                          "phone": "'.$value[2].'",
                          "alternate_phone": "",
                          "address_line_1": "'.$value[1].'",
                          "address_line_2": "",
                          "pincode": "'.$value[3].'",
                          "city": "'.$value[13].'",
                          "state": "'.$value[12].'"
                      },
                      "pieces_detail": [
                          {
                              "description": "'.$value5.'",
                              "declared_value": "'.$value[10].'",
                              "weight": "'.$value[15].'",
                              "height": "'.$value[8].'",
                              "length": "'.$value[9].'",
                              "width": "'.$value[7].'"
                          }
                      ]
                  }
              ]
          }';
          }
          // Check COD Order Or Not

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.shipsy.in/api/customer/integration/consignment/softdata',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $curlcodcheck,

            CURLOPT_HTTPHEADER => array(
              'api-key: dd9c24d16f71ac05fba93bd70502fe',
              'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);

          // $_SESSION["dtdc"] = $response;
          // $test = $_SESSION["dtdc"];
          // print_r($test);

          // echo "<pre>";
          $awbnogenerate = $response['data'][0]['reference_number'];
          // echo "<br>";
          $response['data'][0]['customer_reference_number'];
          // echo "<br>";
          $response['data'][0]['pieces'][0]['reference_number'];
          // echo "<br>";
          // print_r($response);
          // exit();

          // $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
          // mysqli_query($conn,$dtdcawbnoudate);
          if($awbnogenerate){
            	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='DTDC' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }else{
            	$errormsg1 = $response['data'][0]['reason'];
            	$errormsg2 = $response['data'][0]['message'];
            	$errormsg = $errormsg1." / ".$errormsg2;
            	$errormsg = mysqli_real_escape_string($conn, $errormsg);
            	$dtdcawbnoudate = "UPDATE `spark_single_order` SET `dtdcerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
            	mysqli_query($conn,$dtdcawbnoudate);
            }

        }
        if($awbnogenerate){        break;     }
    // DTDC
          // DTDC *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//






          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
    // Delhivery
        // if ($delhiveryapion==$key) {
        if ($delhiveryapion==$arrayName[$i]) {
          // $awbnogenerate = "DL";
          // echo "AwbNO-".$awbnogenerate." : ";
          echo "<br>  - - - Delhivery - - - <br>";
          $valueone = substr($value[1],0,45);
          $valueone = mysqli_real_escape_string($conn, $valueone);
          $value[5] = mysqli_real_escape_string($conn, $value[5]);
          $valuefive = substr($value[5],0,45);
    // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
          // Create AWB Number
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/waybill/api/fetch/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          echo $awbnois = $response;
          echo "<br><br>";
          // Create AWB Number


          $delhiverydummy = 'format=json&data={
          "pickup_location": {
              "pin": "'.$value[20].'",
              "add": "'.$value[22].'",
              "phone": "'.$value[19].'",
              "state": "'.$value[23].'",
              "city": "'.$value[24].'",
              "country": "India",
              "name": "RAPPIDX SURFACE"
          },
          "shipments": [
              {
                "return_name": "RAPPIDXSURFACE-B2C",
                "return_pin": "'.$value[20].'",
                "return_city": "'.$value[24].'",
                "return_phone": "'.$value[19].'",
                "return_add": "'.$value[22].'",
                "return_state": "'.$value[23].'",
                "return_country": "India",
                "order": "'.$value[4].'",
                "phone": "'.$value[2].'",
                "products_desc": "'.$valuefive.'",
                "cod_amount": "'.$value[11].'",
                "name": "'.$value[0].'",
                "country": "India",
                "waybill": "'.$awbnois.'",
                "seller_inv_date": "'.$orderdata.'",
                "order_date": "'.$orderdata.'",
                "total_amount": "'.$value[16].'",
                "seller_add": "'.$value[22].'",
                "seller_cst": "'.$value[21].'",
                "add": "'.$valueone.'",
                "seller_name": "'.$value[18].'",
                "seller_inv": "",
                "seller_tin": "",
                "pin": "'.$value[3].'",
                "quantity": "'.$value[6].'",
                "payment_mode": "'.$value[25].'",
                "state": "'.$value[12].'",
                "city": "'.$value[13].'",
                "client": "RAPPIDX SURFACE"
              }
          ]
          }';

    // echo "<pre>";
    // print_r($delhiverydummy);
    // echo "<br><br>";
    // exit();

          // Order Date
            $orderdata = date('Y-m-d H:i:s');
          // Order Date

          // Create a Order
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://track.delhivery.com/api/cmu/create.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'format=json&data={
            "pickup_location": {
                "pin": "'.$value[20].'",
                "add": "'.$value[22].'",
                "phone": "'.$value[19].'",
                "state": "'.$value[23].'",
                "city": "'.$value[24].'",
                "country": "India",
                "name": "RAPPIDX SURFACE"
            },
            "shipments": [
                {
                  "return_name": "RAPPIDXSURFACE-B2C",
                  "return_pin": "'.$value[20].'",
                  "return_city": "'.$value[24].'",
                  "return_phone": "'.$value[19].'",
                  "return_add": "'.$value[22].'",
                  "return_state": "'.$value[23].'",
                  "return_country": "India",
                  "order": "'.$value[4].'",
                  "phone": "'.$value[2].'",
                  "products_desc": "'.$valuefive.'",
                  "cod_amount": "'.$value[11].'",
                  "name": "'.$value[0].'",
                  "country": "India",
                  "waybill": "'.$awbnois.'",
                  "seller_inv_date": "'.$orderdata.'",
                  "order_date": "'.$orderdata.'",
                  "total_amount": "'.$value[16].'",
                  "seller_add": "'.$value[22].'",
                  "seller_cst": "'.$value[21].'",
                  "add": "'.$valueone.'",
                  "seller_name": "'.$value[18].'",
                  "seller_inv": "",
                  "seller_tin": "",
                  "pin": "'.$value[3].'",
                  "quantity": "'.$value[6].'",
                  "payment_mode": "'.$value[25].'",
                  "state": "'.$value[12].'",
                  "city": "'.$value[13].'",
                  "client": "RAPPIDX SURFACE"
                }
            ]
          }',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
              'Accept: application/json'
            ),
          ));

          $response = curl_exec($curl);
          $response1 = json_decode($response, true);
          // curl_close($curl);
              // echo $response1;
              // echo "<br>";
          if($response1['packages'][0]['status']=="Success"){
            $awbnogenerate = $response1['packages'][0]['waybill'];
          }
              // echo "<br>";
              // print_r($response1);
          // Create a Order //

            // $response = curl_exec($curl);
            // $response = json_decode($response, true);
            // curl_close($curl);

            // $_SESSION["dtdc"] = $response;
            // $test = $_SESSION["dtdc"];
            // print_r($test);

            // // echo "<pre>";
            // $response['data'][0]['reference_number'];
            // // echo "<br>";
            // $response['data'][0]['customer_reference_number'];
            // // echo "<br>";
            // $awbnogenerate = $response['data'][0]['pieces'][0]['reference_number'];
            // // echo "<br>";
            // // print_r($response);
            // // exit();
            if($awbnogenerate){
              $dtdcawbnoudate = "UPDATE `spark_single_order` SET `Awb_Number`='$awbnogenerate',`awb_gen_by`='Delhivery' WHERE `Single_Order_Id`='$last_id'";
              mysqli_query($conn,$dtdcawbnoudate);
            }else{
              	$errormsg = $response1['packages'][0]['remarks'][0];
              	$errormsg = mysqli_real_escape_string($conn, $errormsg);
              	echo $dtdcawbnoudate = "UPDATE `spark_single_order` SET `dhlerrors`='$errormsg',`showerrors`='$errormsg' WHERE `Single_Order_Id`='$last_id'";
              	mysqli_query($conn,$dtdcawbnoudate);
              }

          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//

        }
        if($awbnogenerate){        break;     }
    // Delhivery
          // Delhivery *   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *//



        echo "<br>";
    }
    // echo "Only Check Loop <br><br><br>";
    // exit();
    // Temperay Delete Code

                echo "<br><br>";
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
