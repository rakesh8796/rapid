<?PHP
session_start();
error_reporting(1);
extract($_REQUEST);
include "Admin/config/dbcon.php";

if(!empty($_SESSION['usertype'])){
    echo "<script>window.location.assign('Admin/index.php')</script> ";
}

// echo $newpassword;
// echo "<br>";
// echo $confirmpassword;
// echo "<br>";
// echo $username;

if(isset($loginchekc))
{
  if($newpassword == $confirmpassword){
    $newpassword = md5($newpassword);

    $query1="SELECT * FROM `asitfa_user` WHERE `User_Email`='$username'";
    $fdata1=mysqli_query($conn,$query1);
    $numrow1=mysqli_num_rows($fdata1);
    if($numrow1==1){
        $result1 = mysqli_fetch_assoc($fdata1);
        if($result1['Active']==1){

          $queryu="UPDATE `asitfa_user` SET `User_Password`='$newpassword',`User_Password_show`='$confirmpassword',`forgetpassword`='0' WHERE `User_Email`='$username'";
          mysqli_query($conn,$queryu);

          // header("location:Login.php?error=notacerror");
          echo "<script>window.location.assign('Login.php?error=pschange')</script>";
        }else{
          // header("location:ForgetPassword.php?error=noaterror");
          echo "<script>window.location.assign('ForgetPassword.php?error=noaterror')</script>";
        }
    }else{
      echo "<script>window.location.assign('Login.php?error=error')</script>";
    }
  }else{

  }
}
echo "<script>location.reload()</script>";
?>
