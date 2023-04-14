<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->




<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Change Password</h4>
  </div>
</div>




<style>
.white-box{
  padding:15px !important;
  border-radius:50px;
}
</style>


<section class="content">
<div class="col-md-12">
<div class="col-md-12 white-box fontweighlight"><br>
<div class="col-md-3"></div>
<div class="col-md-6 text-center">


<form method="post">
    <!-- <input type="text" name="abc"> -->
    <div class="form-group">
        <label for="password" class="sr-only">Old Password</label>
        <div class="input-group">
            <span class="input-group-addon" style="background-color:#ffd647;border-color:#ffd647;border-radius:20px 0px 0px 20px">
                <i class="fa fa-lock text-primary" style="color:#60baaf"></i></span>
            <input type="password" class="form-control form-control-lg" id="opassword" name="opassword" placeholder="Old Password" style="border-color:#ffd647;border-radius:0px 20px 20px 0px">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">New Password</label>
        <div class="input-group">
            <span class="input-group-addon" style="background-color:#ffd647;border-color:#ffd647;border-radius:20px 0px 0px 20px">
                <i class="fa fa-lock text-primary" style="color:#60baaf"></i></span>
            <input type="password" class="form-control form-control-lg" id="npassword" name="npassword" placeholder="New Password" style="border-color:#ffd647;border-radius:0px 20px 20px 0px">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">Confirm Password</label>
        <div class="input-group" style="">
            <span class="input-group-addon" style="background-color:#ffd647;border-color:#ffd647;border-radius:20px 0px 0px 20px">
                <i class="fa fa-lock text-primary" style="color:#60baaf"></i></span>
            <input type="password" class="form-control form-control-lg" id="cpassword" name="cpassword" placeholder="Confirm Password" style="border-color:#ffd647;border-radius:0px 20px 20px 0px">
        </div>
    </div>
   <button style="background-color:#60baaf;border-color:#60baaf;color:white;width:50%;border-radius:20px" name="updatepassword" class="btn btn-outline-success">Update Password</button>
</form>


<?php
    if(@$_GET['msg']=='Done')
    {
?>
    <h4 class="col-md-12 text-center"><br>
        <span style="color:green"><b>Password Update Successfully</b></span>
    </h4>
<?php
    }elseif(@$_GET['msg']=='NotDone')
    {
?>
    <h4 class="col-md-12 text-center"><br>
        <span style="color:red"><b>Please Try Again</b></span>
    </h4>
<?php
    }elseif(@$_GET['msg']=='OldNotMatch')
    {
?>
    <h4 class="col-md-12 text-center"><br>
        <span style="color:red"><b>Old Password Not Match</b></span>
    </h4>
<?php
    }elseif(@$_GET['msg']=='NotMatch')
    {
?>
    <h4 class="col-md-12 text-center"><br>
        <span style="color:red"><b>Confirm Password Not Match</b></span>
    </h4>
<?php
    }
?>




<?php
if(isset($updatepassword)){

    $crtuserid = $_SESSION['useridis'];
    if($npassword === $cpassword){

        $password = md5($opassword);
        $query="SELECT * FROM `asitfa_user` WHERE `User_Id`='$crtuserid' AND `User_Password`='$password' AND `Active`='1'";
        $fdata=mysqli_query($conn,$query);
        $numrow=mysqli_num_rows($fdata);
        if($numrow==1){

            $newpassword = md5($cpassword);
            $query="UPDATE `asitfa_user` SET `User_Password`='$newpassword',`User_Password_show`='$cpassword' WHERE `User_Id`='$crtuserid'";
            if(mysqli_query($conn,$query)){
                echo "<script>window.location.assign('ChangePassword.php?msg=Done')</script>";
            }else{
                echo "<script>window.location.assign('ChangePassword.php?msg=NotDone')</script>";
            }
            echo "<script>window.location.assign('ChangePassword.php?msg=NotDone')</script>";
        }else{
            echo "<script>window.location.assign('ChangePassword.php?msg=OldNotMatch')</script>";
        }
    }else{
        echo "<script>window.location.assign('ChangePassword.php?msg=NotMatch')</script>";
    }
}
?>




</div>
<div class="col-md-3"></div>
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
