<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->


<!-- Status Switch Code -->
<style>
.switch {
  position: relative;
  display: inline-block;
    width: 48px;
    height: 21px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!-- Status Switch Code -->



<style media="screen">
.btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary.focus:active, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover, .btn-primary.focus, .btn-primary:focus {
  background-color: #5b94c5 !important;
  border: 1px solid #5b94c5 !important;
}
a>b,a>i{
  color: #33333373 !important;
}
</style>




<div class="col-md-12">





<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Pincode Serviceables</h4>
  </div>
</div>




<section class="content">
<!--main content-->
<div class="col-md-12">
   <div class="col-md-12">
       <div class="panel">
           <div style="color:#2b2b2f;background:#33333373;padding:5px 20px 5px 20px;font-size:14px">
               <span style="font-weight:500">Upload Pincodes With Excel(CSV) File 
               <span style='float:right'>[ <u>' 1 '</u> is Deactive Service | <u>'0' Or BLANK</u> is Active Service In CSV File ]</span>
               </span>
<!-- <span class="pull-right">
<i class="fa fa-fw fa-chevron-up clickable"></i>
<i class="fa fa-fw fa-times removepanel clickable"></i>
</span> -->
           </div>
           <div class="panel-body">


<!-- CSV file upload form -->
<div class="col-md-12" id="importFrm">
<form method="post" enctype="multipart/form-data">
<div class="col-md-3">
<input type="file" name="bulkorderfile" required="" style="width:100%"  onchange="serviablepins(this)">
</div>
<div class="col-md-2">
<input type="submit" class="btn btn-primary active" name="importSubmit" value="Upload CSV File" style="margin-top:-5px;border-radius:15px" title="Please Select First Upload File" disabled="" id="inputsubmitn">
<input type="submit" class="btn btn-primary active" name="importSubmit" value="Upload CSV File" title="Please Select First Upload File"  style="margin-top:-5px;border-radius:15px;display:none" id="inputsubmits">

</div>
</form>
<script type="text/javascript">
function serviablepins(fileInput){
const selectedFile = fileInput.files[0];
console.log(selectedFile['name']);
extension = selectedFile['name'].split('.').pop();
// alert(extension);
if(extension == "csv"){
document.getElementById("inputsubmitn").style.display = "none";
document.getElementById("inputsubmits").style.display = "block";
}else{
alert("Please Upload CSV File");
document.getElementById("inputsubmitn").style.display = "block";
document.getElementById("inputsubmits").style.display = "none";
}
}
</script>
<div class="col-md-3">
<a href="BulkExcelFiles/ServiceablePincode/Sample/SampleWith_Data.csv"><b><i class="fa fa-download" aria-hidden="true"></i> CSV File With Sample Data</b></a>
</div>
<div class="col-md-4">
<a href="BulkExcelFiles/ServiceablePincode/Sample/SampleFile_Withoutdate.csv"><b><i class="fa fa-download" aria-hidden="true"></i> CSV File Without Sample Data</b></a>
</div>
</div>

</div>

<!--  -->
<?php
if(isset($importSubmit))
{
$user_id = $_SESSION['useridis'];
try {
//


$bannername = $_FILES["bulkorderfile"]["name"];
$bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
move_uploaded_file($bannertmp,"BulkExcelFiles/ServiceablePincode/$bannername");

$fileD = fopen("BulkExcelFiles/ServiceablePincode/$bannername","r");

$column=fgetcsv($fileD);
while(!feof($fileD)){
$rowData[]=fgetcsv($fileD);
}

if(!empty($rowData)){
 $query = "TRUNCATE `serviceable_pincodes`";
 mysqli_query($conn,$query);
}
// echo "<pre>";
// print_r($rowData);
foreach($rowData as $key => $value){
   if($value[0]==""){  continue;   }

$disableduserids = array();
$disableduserids[] = 0;
if($value[13]){
    // echo $value[13];
    $rpdxclients[] = 0;
    $rpdxclients = explode(",",$value[13]);
    // print_r($rpdxclients);
    // echo "<br>";
    foreach($rpdxclients as $detailsis){
    $detailsis = trim($detailsis);
    // echo "<br>";
    $useridno = "SELECT * FROM `asitfa_user` WHERE `useruinqueidno`='$detailsis'";
    $useridnor = mysqli_query($conn,$useridno);
    $useridnores = mysqli_fetch_assoc($useridnor);
    // echo "&ensp;&ensp; : &ensp;&ensp;";
    // echo $useridnores['User_Id'];
    // echo "&ensp;&ensp; : &ensp;&ensp;";
    $disableduserids[] = $useridnores['User_Id'];
    }
    // echo "<br>";
    // print_r($disableduserids);
    // echo "<br>";
    // print_r(implode(",",$disableduserids));
}
$disableduserids = implode(",",$disableduserids);


$tdate = date("Y-m-d");
$singlequery = "INSERT INTO `serviceable_pincodes`(
`pincode`, `areacode`, `processcode`, `hubzonename`, `hubcity`,
`hubstate`, `cod`, `prepaid`, `hasreversepickupservice`,
`xpressbee`, `delhivery`, `shadowfax`, `dtdc`,
`disableclientids`, `disableclientidsno`
) VALUES (
'$value[0]','$value[1]','$value[2]','$value[3]','$value[4]',
'$value[5]','$value[6]','$value[7]','$value[8]',
'$value[9]','$value[10]','$value[11]','$value[12]',
'$disableduserids','$value[13]'
)";
mysqli_query($conn,$singlequery);
   // echo "<br><br>";
}
echo "<script> window.location.assign('addpincode.php?excelfile=Update')</script>";
// exit();
//
} catch (Exception $e) {
echo "<script> window.location.assign('addpincode.php?excelfile=No Update')</script>";
}

}
?>
<!--  -->

           </div>
       </div>
   </div>
</section>






<section class="content">
<div class="col-md-12">
  <div class="col-md-12">
      <div class="panel filterable">

        <div style="color:#2b2b2f;background:#33333373;padding:5px 20px 5px 20px;font-size:14px">
            <span style="font-weight:500">Serviceable Pincode Lists</span>
          </div>
<div class="panel-body">



<!-- Excel File -->
<div class="col-md-12">
    <div class="col-md-4" style="font-size:13px">
      <strong>Download Serviceable PinCode</strong>
    </div>
    <div class="col-md-4">
        <a href="addpincode_excel.php" class="btn btn-default btn-block active" style="border-radius:20px;color:black">Download PinCodes</a>
    </div>
    <div class="col-md-4">
      <input type="text" onkeyup="checkpincode(this.value)" class="form-control" placeholder="Search Pincode Number" style="border-radius:20px">
  </div>
</div>
<!-- Excel File -->

<script type="text/javascript">
function checkpincode(param){
    if(param.length>3){
        $("#All_Records").html("<br><center><h4>Loading...<h4></center>");
        $.ajax({
            type: "GET",
            url: 'pincode_fetch.php',
            data:{param:param},
            success: function (data) {
              // console.log(data);
              $("#All_Records").html(data);
            },
            error: function (data) {
              console.log('Error:', data);
            }
        });
    }
}
</script>

<!--  -->

<div class="col-md-12">
  <div id="All_Records">
    <!-- <br><b><center>Waiting For Input</center></b> -->
    <!-- <hr style='border-bottom:2px solid gold'>
    <center><h3>Waiting For PinCode Input</h3></center>
    <hr style='border-bottom:2px solid gold'> -->
  </div>
</div>

<!--  -->




</div>
      </div>
  </div>
</div>
</section>































</div>
<!-- ./wrapper -->
<!-- global js -->

</div>
<!-- /#page-wrapper -->
<?php
    include "Layout_Footer.php";
?>
