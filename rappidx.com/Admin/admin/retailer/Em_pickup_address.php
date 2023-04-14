<?php
    include "Layout_Header_Table.php";
    // include "Layout_Footer.php";
?>

<div class="bg-title">
    <div class="col-md-12">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Pickup Address </h4>
        </div>
    </div>
</div>


        <section class="content">
              <div class="col-md-12">
                <div class="col-md-12">
                    <div class="white-box filterable">
<div class="table-responsive">

<!-- Add New Pickup Address -->
<div class="col-md-3 col-sm-3"></div>
<div class="col-md-3 col-sm-3"></div>
<div class="col-md-3 col-sm-3"></div>
 <div class="col-md-3 col-sm-3">
    <button type="button" class="btn btn-info btn-block" data-toggle="modal"
            data-target="#basic_modal" data-animate-modal="jello">Add Address
    </button>
</div>

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
        echo "<script> window.location.assign('Em_pickup_address.php?address=update')</script>";
    }else{
        echo "<script> window.location.assign('Em_pickup_address.php?address=noupdate')</script>";
    }
}

?>

            </div>
        </div>
    </div>
<!-- Model -->
<!-- Add New Pickup Address -->

<table id="myTable" class="table table-striped">
<thead>
<tr>
    <!-- <th data-field="#" data-sortable="true">#</th> -->
    <th data-field="Add Client" data-sortable="true">Add Client</th>
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
    $singleproquery = "SELECT * FROM `spark_pickup_address` ORDER BY `Name` DESC";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    while($row = mysqli_fetch_assoc($singleproqueryr))
    {
?>
    <tr class="record">
        <td>
<?php
    $uid = $row['User_Id'];
$addedc = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$uid'";
$addedcr = mysqli_query($conn,$addedc);
$addedcres = mysqli_fetch_assoc($addedcr);

echo $addedcres['Company_Name'];
echo " ($uid)";

?>
        </td>
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
            </section>



             <section class="content">
            <!--main content-->











        </section>

</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php
    // include "Layout_Header.php";
    include "Layout_Footer_Table.php";
?>
