<?php
    include "Layout_Header_Table.php";
?>

<!-- Page Content -->




<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">  All PickUp Address
      <span style="float:right">
        <!-- Excel File -->
          <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#basic_modal" data-animate-modal="jello">Add New Address</button>
        <!-- Excel File -->
      </span>
    </h4>
  </div>
</div>









<!-- /row -->
<div class="col-md-12" style="background-color:#EDF1F5">
<div class="col-md-12">
<div class="white-box">
            <!-- <h3 class="box-title m-b-0">Hospital Payments Details</h3>
            <hr> -->
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th data-field="Pickup Name" data-sortable="true">Pickup Name</th>
                            <th data-field="Pickup Id" data-sortable="true">Pickup Id</th>
                            <th data-field="Pickup Mobile" data-sortable="true">Pickup Mobile</th>
                            <th data-field="Pickup Address" data-sortable="true">Pickup Address</th>
                            <th data-field="Pickup State" data-sortable="true">Pickup State</th>
                            <th data-field="Pickup City" data-sortable="true">Pickup City</th>
                            <th data-field="GSTIN" data-sortable="true">GSTIN</th>
                            <th data-field="Pickup Pincode" data-sortable="true">Pickup Pincode</th>
                          </tr>
                    </thead>
                    <tbody>
                      <!--  -->
                      <?php
                          // echo $user_id;
                          $singleproquery = "SELECT * FROM `spark_pickup_address` WHERE `User_Id`='$user_id' ORDER BY `Name` DESC";
                          $singleproqueryr=mysqli_query($conn,$singleproquery);
                          while($row = mysqli_fetch_assoc($singleproqueryr))
                          {
                      ?>
                          <tr class="record">
                              <td><?php echo $row['Name']; ?></td>
                              <td><?php echo $row['Address_Id']; ?></td>
                              <td><?php echo $row['Mobile']; ?></td>
                              <td><?php echo $row['Address']; ?></td>
                              <td><?php echo $row['State']; ?></td>
                              <td><?php echo $row['City']; ?></td>
                              <td><?php echo $row['Gstin']; ?></td>
                              <td><?php echo $row['Pincode']; ?></td>
                          </tr>
                      <?php
                          }
                      ?>
                      <!--  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->





<!-- Model -->
 <div id="basic_modal" class="modal fade animated" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add address</h4>
                </div>


<!--  -->
<!-- <form class="form-horizontal" role="form" id="popup-validation" method="post" action="#"> -->
<form method="post" action="#">
<div class="modal-body">
    <div class="row m-t-10">
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="first-name">Name</label>
                <input type="text" name="pickupname" id="first-name"
                       placeholder="Name" class="form-control m-t-10">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="last-name">Mobile</label>
                <input type="text" name="pickupmobile" id="last-name"
                       placeholder="Mobile" class="form-control m-t-10">
            </div>
        </div>
    </div>
    <div class="row m-t-10">
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="first-name">Pincode</label>
                <input type="text" name="pickuppincode" id="first-name"
                       placeholder="Pincode" class="form-control m-t-10">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="last-name">GSTIN(Optinal)</label>
                <input type="text" name="pickupgstin" id="last-name"
                       placeholder="GSTIN" class="form-control m-t-10">
            </div>
        </div>
    </div>
    <div class="row m-t-10">
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="address">Address</label>
                <input type="text" name="pickupadress" id="first-name"
                       placeholder="Address" class="form-control m-t-10">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="address">State</label>
                <input type="text" name="pickupstate" id="first-name"
                       placeholder="State" class="form-control m-t-10">
            </div>
        </div>
    </div>
    <div class="row m-t-10">
        <div class="col-md-6">
            <div class="input-group">
                <label class="sr-only" for="address">City</label>
                <input type="text" name="pickupcity" id="first-name"
                       placeholder="City" class="form-control m-t-10">
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-succes" name="submitaddress">Submit</button>
    <button type="reset" class="btn btn-default">Reset</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">
        Close
    </button>
</div>
</form>
<!--  -->

<?php
if(isset($submitaddress))
{
    $user_id = $_SESSION['useridis'];

    $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`, `Mobile`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`, `Active`) VALUES ('$user_id','$pickupname','$pickupmobile','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity',now(),1)";
    if(mysqli_query($conn,$newpickupaddress)){
        echo "<script> window.location.assign('pickup_address.php?address=update')</script>";
    }else{
        echo "<script> window.location.assign('pickup_address.php?address=noupdate')</script>";
    }
}

?>

            </div>
        </div>
    </div>
<!-- Model -->
<!-- Add New Pickup Address -->



<!-- /#page-wrapper -->

<?php
    include "Layout_Footer_Table.php";
?>
