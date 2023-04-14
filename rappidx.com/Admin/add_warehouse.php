<?php include_once("layouts/header.php");   ?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8" style="margin-left:10% ;">
                <form method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Warehouse</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Warehouse Name</label>
                                    <input type="text" class="form-control" name="pickupname">
                                </div>
                                </div>
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Contact Person </label>
                                            <input type="text" class="form-control" name="contact_person">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Contact Number </label>
                                            <input type="text" class="form-control" name="pickupmobile">

                                        </div>


                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="pickupadress">
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="pickupcity">
                                        </div>
                                        <div class="col-md-6">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="pickupstate">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Pincode</label>
                                            <input type="text" class="form-control" name="pickuppincode">
                                        </div>
                                        <div class="col-md-8">
                                            <label>Email ID</label>
                                            <input type="email" class="form-control" name="pickupemail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="form-group col-md-4">
                                    <label>GST Number</label>
                                    <input type="text" class="form-control" name="pickupgstin">
                                </div>
                                </div>
                                
                            </div>
                            <div class="card-footer text-right">
                                <input type="submit" name="submitaddress" class="btn btn-primary mr-1">
                                <input type="reset" class="btn btn-secondary">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
if(isset($submitaddress))
{
    $user_id = $_SESSION['useridis'];

    $newpickupaddress = "INSERT INTO `spark_pickup_address`(`User_Id`, `Name`,`contact_person`, `Mobile`,`	email_id`, `Pincode`, `Gstin`, `Address`, `State`, `City`, `Rec_Time_Stamp`, `Active`) VALUES ('$user_id','$pickupname','$contact_person',$pickupmobile','$pickupemail','$pickuppincode','$pickupgstin','$pickupadress','$pickupstate','$pickupcity',now(),1)";
    if(mysqli_query($conn,$newpickupaddress)){
        echo "<script> window.location.assign('Warehouse.php?address=update')</script>";
    }else{
        echo "<script> window.location.assign('Warehouse.php?address=noupdate')</script>";
    }
}

?>







<?php include_once("layouts/footer.php");   ?>