<?php
  include "Layout_Header.php";
  // include "Layout_Footer.php";
?>


<?php
  // ob_start();
  // require_once('include/function/autoload.php');
  include('config/dbconnection.php');
  // $studentObj = new Student;



//
$tdate = date("Y-m-d");
if($_GET['m'])
{
    $useridis = $_GET['m'];
    $allclientquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$useridis'";
    $allclientqueryr=mysqli_query($conn,$allclientquery);
    $row = mysqli_fetch_assoc($allclientqueryr);
    $User_Id = $row['User_Id'];

    $User_Email1 = $row['User_Email'];

    $Company_Name1 = $row['Company_Name'];
    $Reg_Mobile1 = $row['Reg_Mobile'];
    $folderare = $row['foldername'];
}else
{
    echo "Redirect";
}
//



?>
<!-- <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/> -->
<link rel="stylesheet" type="text/css" href="vendors/gridforms/css/gridforms.css">
<!-- <link rel="stylesheet" type="text/css" href="vendors/datedropper/datedropper.css"> -->
<!-- <link href="vendors/airdatepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"> -->
<!-- <link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css"> -->
<!-- <link href="vendors/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" type="text/css" href="css/custom.css">
<!-- <link rel="stylesheet" type="text/css" href="css/formelements.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/complex_forms.css"> -->
<style type="text/css">
.icon {
    padding: 5px;
    background: #ffd647;
    color: white;
    min-width: 50px;
    text-align: center;
    margin-top: -29px;
    float: right;
  }
</style>


<div class="col-md-12 white-box">
    <div class="col-md-12">
        <span class="fontweighlight">Edit Employee Registration</span>
    </div>
</div>


            <section class="content">
            <div class="row white-box fontweighlight">
                <!--5th tab bank application starting-->
                <div class="col-lg-12">





<!-- <form class="grid-form form-horizontal" enctype="multipart/form-data" role="form" id="popup-validation" method="post" action="#"> -->
<form class="grid-form" enctype="multipart/form-data"  method="post" action="Employee_Registration_Edit_a.php">

<h2 class="text-center">

<?php
if(@$_GET['msg']=="y")
{
    echo "<span style='color:green'>Registration Update</span>";
}elseif(@$_GET['msg']=="n")
{
    echo "<span style='color:red'>Registration Not Update</span>";
}else
{
    echo "ONBOARDING FORM";
}
?>
</h2>
<legend></legend>

<fieldset>
    <div data-row-span="3">
        <div data-field-span="1" class="input-container">
            <label>Employee login Id <b>(Unique ID)</b></label>
            <input type="text" name="employeeid" class="input-field" value="<?= $row['User_Email'] ?>" readonly>
        </div>
        <div data-field-span="1" class="input-container">
            <label><b>Password</b></label>
            <input type="text" name="employeepass" class="input-field" value="<?= $row['User_Password_show'] ?>">
        </div>
        <div data-field-span="1">
<center>
    <label><b>Employee Account Status</b></label>
<?php
if($row['Active'])
{
?>
    &ensp;&ensp;&ensp;
    <label style="color:green"><b>
        <input type="radio" name="statuscheck" value="1" checked=""> Active
    </b></label>&ensp;&ensp;&ensp;
    <label style="color:red"><b>
        <input type="radio" name="statuscheck" value="0"> Deactive
    </b></label>
<?php
}else
{
?>
    &ensp;&ensp;&ensp;
    <label style="color:green"><b>
        <input type="radio" name="statuscheck" value="1"> Active
    </b></label>&ensp;&ensp;&ensp;
    <label style="color:red"><b>
        <input type="radio" name="statuscheck" value="0" checked=""> Deactive
    </b></label>
<?php
}
?>
</center>
        </div>
    </div>
</fieldset>
<br><br>

    <fieldset>
        <legend>Personal Details</legend>
        <div data-row-span="4">
            <div data-field-span="1">
                <label>Name</label>
                <input type="text" name="Name" value="<?= $row['Company_Name'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Mobile</label>
                <input type="text" name="Mobile" value="<?= $row['Reg_Mobile'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Email Id</label>
                <input type="text" name="Email" value="<?= $row['Email'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>PAN Number</label>
                <input type="text" name="Pan" value="<?= $row['Pan'] ?>" required="">
            </div>
        </div>
        <!-- <div data-row-span="4">
             <div data-field-span="2">
                <label>TAN Number</label>
                <input type="text" name="tan">
            </div>
            <div data-field-span="2">
                <label>GST Number</label>
                <input type="text" name="gstno" required="">
            </div>
        </div> -->

        <br><br>
        <fieldset>
            <legend><b>Current Address</b></legend>
            <div data-row-span="5">
                <div data-field-span="2">
                    <label>Address</label>
                    <input type="text" name="addressc" value="<?= $row['Com_Address'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="cityc" value="<?= $row['Com_City'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>State</label>
                    <input type="text" name="statec" value="<?= $row['Com_State'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="pincodec" value="<?= $row['Com_Pin'] ?>" required="">
                </div>
            </div>


        </fieldset>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Permanent Address </legend>
            <div data-row-span="5">
                <div data-field-span="2">
                    <label>Address</label>
                    <input type="text" name="addressp" value="<?= $row['Reg_Address'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="cityp" value="<?= $row['Reg_City'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>State</label>
                    <input type="text" name="statep" value="<?= $row['Reg_State'] ?>" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="pincodep" value="<?= $row['Reg_Pin'] ?>" required="">
                </div>
            </div>
    </fieldset>
    <br>
    <br>
    <fieldset>
        <legend>Bank Details</legend>
        <div data-row-span="3">
            <div data-field-span="1">
                <label>Bank Name</label>
                <input type="text" name="bankname" value="<?= $row['Bankname'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Account No.</label>
                <input type="text" name="bankacc" value="<?= $row['Bankaccount'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Branch</label>
                <input type="text" name="branch" value="<?= $row['Branch'] ?>" required="">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>IFSC Code</label>
                <input type="text" name="ifsc" value="<?= $row['IFSC'] ?>" required="">
            </div>
            <div data-field-span="1">
                <label>Account Type</label>
                <input type="text" name="acctype" value="<?= $row['Acc_Type'] ?>" required="">
            </div>
        </div>
    </fieldset>

 <div class="modal-footer">
    <center>
        <input type="hidden" name="User_Id" value="<?= $User_Id ?>">
        <button type="submit" class="btn btn-primary" name="newemployee" style="color:black">&ensp; Update Employee Details &ensp;</button>
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
    </center>
</div>
</form>







                </div>
            </div>
            <!--5 th tab bank application ending  -->
            <div id="right">
                <div id="slim2">


                    <div class="rightsidebar-right">
                        <div class="rightsidebar-right-content">
                            <h5 class="rightsidebar-right-heading rightsidebar-right-heading-first text-uppercase text-xs">
                                <i class="menu-icon  fa fa-fw fa-paw"></i> Contacts
                            </h5>
                            <ul class="list-unstyled margin-none">
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar1.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Alanis
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Rolando
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar2.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-primary"></i> Marlee
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar3.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-warning"></i> Marlee
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar4.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-danger"></i> Kamryn
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar5.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-muted"></i> Cielo
                                    </a>
                                </li>
                                <li class="rightsidebar-contact-wrapper">
                                    <a class="rightsidebar-contact" href="#">
                                        <img src="img/authors/avatar7.jpg" height="20" width="20"
                                             class="img-circle pull-right" alt="avatar-image">
                                        <i class="fa fa-circle text-xs text-muted"></i> Charlene
                                    </a>
                                </li>
                            </ul>
                            <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                <i class="fa fa-fw fa-tasks"></i> Tasks
                            </h5>
                            <ul class="list-unstyled m-t-25">
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 1</strong>
                                            <small class="pull-right text-muted">
                                                40% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 40%">
                                                    <span class="sr-only">
                                                        40% Complete (success)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 2</strong>
                                            <small class="pull-right text-muted">
                                                20% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 20%">
                                                    <span class="sr-only">
                                                        20% Complete
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 3</strong>
                                            <small class="pull-right text-muted">
                                                60% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 60%">
                                                    <span class="sr-only">
                                                        60% Complete (warning)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <p>
                                            <strong>Task 4</strong>
                                            <small class="pull-right text-muted">
                                                80% Complete
                                            </small>
                                        </p>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                 aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 80%">
                                                    <span class="sr-only">
                                                        80% Complete (danger)
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                <i class="fa fa-fw fa-group"></i> Recent Activities
                            </h5>
                            <div>
                                <ul class="list-unstyled">
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-comment fa-fw text-primary"></i> New Comment
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-twitter fa-fw text-success"></i> 3 New Followers
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-envelope fa-fw text-info"></i> Message Sent
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-tasks fa-fw text-warning"></i> New Task
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-upload fa-fw text-danger"></i> Server Rebooted
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-warning fa-fw text-primary"></i> Server Not Responding
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart fa-fw text-success"></i> New Order Placed
                                        </a>
                                    </li>
                                    <li class="rightsidebar-notification">
                                        <a href="#">
                                            <i class="fa fa-money fa-fw text-info"></i> Payment Received
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>






</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php
  // include "Layout_Header.php";
include "Layout_Footer.php";
?>
