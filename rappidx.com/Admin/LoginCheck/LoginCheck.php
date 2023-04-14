<?php 
session_start();
error_reporting(1);
extract($_REQUEST);
// include "../config/dbcon.php";
// include "config/dbcon.php";
$conn=mysqli_connect("localhost","root","","philon_rappidx");

$password = md5($password);

if(isset($Login))
{
    $query="SELECT * FROM `asitfa_user` WHERE `User_Email`='$name' AND `User_Password`='$password'";
    $fdata=mysqli_query($conn,$query);
    $numrow=mysqli_num_rows($fdata);
    if($numrow==1)
    {
        echo "1";
        $result = mysqli_fetch_assoc($fdata);
        $_SESSION['username'] = $result['Company_Name'];
        $_SESSION['useridis'] = $result['User_Id'];
        if($result['User_Id']==1)
        {
            echo "2";
            echo "<script>window.location.assign('AdminDashboard.php')</script>";
        }else
        {
            echo "3";
            echo "<script>window.location.assign('Dashboard.php')</script>";
        }
    }
    else
    {
        // echo "<script>window.location.assign('Login.php?error=error')</script>";
        echo "Invalid Details";
    }
}

?>