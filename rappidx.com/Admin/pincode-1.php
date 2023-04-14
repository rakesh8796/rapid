<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->





<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Serviceable Pincodes</h4>
  </div>
</div>













<section class="content">
  <div class="col-md-12">
    <div class="col-md-12">
        <div class="panel">

<div class="panel-body">

<!-- Excel File -->
<div class="col-md-12">
    <div class="col-md-3" style="font-size:18px">
      <strong>Serviceable Pincodes</strong>
    </div>
    <div class="col-md-4">
        <a href="pincode_excel.php" class="btn btn-info btn-block active" style="border-radius:20px">Download Serviceable PinCode</a>
    </div>
    <div class="col-md-2" style="font-size:18px">
      <select class="form-control" style="border-radius:20px" name="weightcategory" id="weightcategory">
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
        echo "<option value='".$resultall['User_Id']."'>500GM</option>";
    }
    if($resultall['commercialstype']=="kg1" AND $resultall['Active']=="1"){
        echo "<option value='".$resultall['User_Id']."'>1KG</option>";
    }
    if($resultall['commercialstype']=="kg2" AND $resultall['Active']=="1"){
        echo "<option value='".$resultall['User_Id']."'>2KG</option>";
    }
    if($resultall['commercialstype']=="kg5" AND $resultall['Active']=="1"){
        echo "<option value='".$resultall['User_Id']."'>5KG</option>";
    }
    if($resultall['commercialstype']=="kg10" AND $resultall['Active']=="1"){
        echo "<option value='".$resultall['User_Id']."'>10KG</option>";
    }
}
 ?>
      </select>
    </div>
    <div class="col-md-3">
      <input type="text" onkeyup="checkpincode(this.value)" class="form-control" placeholder="Search Pincode Number" style="border-radius:20px">
  </div>
</div>
<!-- Excel File -->

<script type="text/javascript">
function checkpincode(param){
    if(param.length>3){
        $("#All_Records").html("<br><center><h4>Loading...<h4></center>");
        var weightcategory = $("#weightcategory").val();
        // alert(weightcategory);
        $.ajax({
            type: "GET",
            url: 'pincode_fetchc.php',
            data:{param:param,weightcategory:weightcategory},
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

<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
