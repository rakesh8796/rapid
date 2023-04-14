<?php
    include "Layout_Header.php";
?>
<!-- Page Content -->



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
.icon{
    padding: 5px;
    background: #ffd647;
    color: white;
    min-width: 50px;
    text-align: center;
    margin-top: -29px;
    float: right;
  }

</style>




<div class="col-md-12" style="background-color:#E7EBEF">



  <div class="col-md-12 white-box">
    <div class="col-md-12">
        <span class="fontweighlight">New Employee Registration</span>
    </div>
  </div>


            <section class="content">
            <div class="row white-box fontweighlight">
                <!--5th tab bank application starting-->
                <div class="col-lg-12">





<!-- <form class="grid-form form-horizontal" enctype="multipart/form-data" role="form" id="popup-validation" method="post" action="#"> -->
<form class="grid-form" enctype="multipart/form-data"  method="post" action="Employee_Registration.php">

<h2 class="text-center">

<?php
if(@$_GET['msg']=="y")
{
    echo "<span style='color:green'>Registration Complete</span>";
}elseif(@$_GET['msg']=="n")
{
    echo "<span style='color:red'>Registration Not Complete</span>";
}else
{
    echo "ONBOARDING FORM";
}
?>
</h2>


<fieldset>
    <div data-row-span="2">
        <div data-field-span="1" class="input-container">
            <label>Create Employee login Id</label>
            <input type="text" name="employeeid" class="input-field" required="">
            <span class="icon">@rappidx.com</span>
        </div>
        <div data-field-span="1">
            <label>Create Password</label>
            <input type="text" name="employeepass" required="" autofocus>
        </div>
    </div>
</fieldset>
<br><br>

    <fieldset>
        <legend>Personal Details</legend>
        <div data-row-span="4">
            <div data-field-span="1">
                <label>Name</label>
                <input type="text" name="Name" required="">
            </div>
            <div data-field-span="1">
                <label>Mobile</label>
                <input type="text" name="Mobile" required="">
            </div>
            <div data-field-span="1">
                <label>Email Id</label>
                <input type="text" name="Email" required="">
            </div>
            <div data-field-span="1">
                <label>PAN Number</label>
                <input type="text" name="Pan" required="">
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
                    <input type="text" name="addressc" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="cityc" required="">
                </div>
                <div data-field-span="1">
                    <label>State</label>
                    <input type="text" name="statec" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="pincodec" required="">
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
                    <input type="text" name="addressp" required="">
                </div>
                <div data-field-span="1">
                    <label>City</label>
                    <input type="text" name="cityp" required="">
                </div>
                <div data-field-span="1">
                    <label>State</label>
                    <input type="text" name="statep" required="">
                </div>
                <div data-field-span="1">
                    <label>Pincode</label>
                    <input type="text" name="pincodep" required="">
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
                <input type="text" name="bankname" required="">
            </div>
            <div data-field-span="1">
                <label>Account No.</label>
                <input type="text" name="bankacc" required="">
            </div>
            <div data-field-span="1">
                <label>Branch</label>
                <input type="text" name="branch" required="">
            </div>
        </div>
        <div data-row-span="2">
            <div data-field-span="1">
                <label>IFSC Code</label>
                <input type="text" name="ifsc" required="">
            </div>
            <div data-field-span="1">
                <label>Account Type</label>
                <input type="text" name="acctype" required="">
            </div>
        </div>
    </fieldset>

 <div class="modal-footer">
    <center>
        <button type="submit" class="btn btn-primary" name="newemployee" style="color:black">&ensp; Submit &ensp;</button>
        <button type="reset" class="btn btn-primary" style="color:black">&ensp; Reset &ensp;</button>
        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
    </center>
</div>
</form>



<?php
if(isset($newemployee))
{
$oriemployeepass = $employeepass;
$employeepass = md5($employeepass);
$employeeid = $employeeid."@rappidx.com";

echo $query = "
INSERT INTO `asitfa_user`(
`usertype`,
`User_Email`,
`User_Password`,
`User_Password_show`,

`Company_Name`,
`Reg_Mobile`,
`Email`,
`Pan`,

`Com_Address`,
`Com_City`,
`Com_State`,
`Com_Pin`,

`Reg_Address`,
`Reg_City`,
`Reg_State`,
`Reg_Pin`,

`Bankname`,
`Bankaccount`,
`Branch`,
`IFSC`,
`Acc_Type`,
`Rec_Time_Stamp`

) VALUES (
'employee',
'$employeeid',
'$employeepass',
'$oriemployeepass',

'$Name',
'$Mobile',
'$Email',
'$Pan',

'$addressc',
'$cityc',
'$statec',
'$pincodec',

'$addressp',
'$cityp',
'$statep',
'$pincodep',

'$bankname',
'$bankacc',
'$branch',
'$ifsc',
'$acctype',
now()

)
";

if(mysqli_query($conn,$query))
{
    $last_id = mysqli_insert_id($conn);
    mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id')");
    echo "<script>window.location.assign('Employee_Registration.php?msg=y')</script>";
}else
{
    echo "<script>window.location.assign('Employee_Registration.php?msg=n')</script>";
}


// echo $companyname;
// echo "<br>";
// echo $website;
// echo "<br>";
// echo $brand;
// echo "<br>";
// echo $Email;
// echo "<br>";
// echo $pan;
// echo "<br>";
// echo $tan;
// echo "<br>";
// echo $gstno;
// echo "<br>";
// echo $regaddress;
// echo "<br>";
// echo $regcity;
// echo "<br>";
// echo $regpin;
// echo "<br>";
// echo $regmobile;
// echo "<br>";
// echo $reglandline;
// echo "<br>";
// echo $comaddress;
// echo "<br>";
// echo $comcity;
// echo "<br>";
// echo $compin;
// echo "<br>";
// echo $commobile;
// echo "<br>";
// echo $comlandline;
// echo "<br>";
// echo $bankname;
// echo "<br>";
// echo $bankacc;
// echo "<br>";
// echo $branch;
// echo "<br>";
// echo $ifsc;
// echo "<br>";
// echo $acctype;
// echo "<br>";
// echo $product;
// echo "<br>";
// echo $service;
// echo "<br>";
// echo $pickup;
// echo "<br>";
// echo $codrem;
// echo "<br>";
// echo $billingtype;
// echo "<br>";
// echo $billingcycle;
// echo "<br>";

// echo $min_a;
// echo "<br>";
// echo $min_b;
// echo "<br>";
// echo $min_c;
// echo "<br>";
// echo $min_d;
// echo "<br>";
// echo $min_e;
// echo "<br>";
// echo $add_a;
// echo "<br>";
// echo $add_b;
// echo "<br>";
// echo $add_c;
// echo "<br>";
// echo $add_d;
// echo "<br>";
// echo $add_e;
// echo "<br>";
// echo $rto_a;
// echo "<br>";
// echo $rto_b;
// echo "<br>";
// echo $rto_c;
// echo "<br>";
// echo $rto_d;
// echo "<br>";
// echo $rto_e;
// echo "<br>";

// echo $fsc;
// echo "<br>";
// echo $cod;
// echo "<br>";
// echo $shipmentlia;
// echo "<br>";
// echo $gst;
// echo "<br>";
// echo $clientid;
// echo "<br>";
// echo $password;
// echo "<br>";
// echo $clientauth;
// echo "<br>";
// echo $designation;
// echo "<br>";
// echo $clientemail;
// echo "<br>";
// echo $clientmobile;
// echo "<br>";
// echo $clientpoc;
// echo "<br>";
// echo $pocdesignation;
// echo "<br>";
// echo $pocemail;
// echo "<br>";
// echo $pocmobile;
// echo "<br>";
// echo $operationpoc;
// echo "<br>";
// echo $operationdesignation;
// echo "<br>";
// echo $operationemail;
// echo "<br>";
// echo $operationmobile;
// echo "<br>";
// echo $bdname;
// echo "<br>";
// echo $bddesignation;
// echo "<br>";
// echo $bdemail;
// echo "<br>";
// echo $bdmobile;
// echo "<br>";

// echo $uploadimage;
// echo "<br>";
// echo $gstcert;
// echo "<br>";
// echo $cancheque;
// echo "<br>";
// echo $addproofe;
// echo "<br>";
// echo $clientmailacc;
// echo "<br>";


}
 ?>






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


</div>
<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
