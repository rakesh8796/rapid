<?php 
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

// echo "<br>";
// echo "User Id : - ";
// echo $User_Id;
// echo "<br>";


if(isset($newemployee))
{

$oriemployeepass = $employeepass;
$employeepass = md5($employeepass);

$query = "UPDATE `asitfa_user` SET 

`Company_Name`='$Name',
`Reg_Mobile`='$Mobile',
`Email`='$Email',
`Pan`='$Pan',
`Com_Address`='$addressc',

`User_Password`='$employeepass',
`User_Password_show`='$oriemployeepass',

`Com_City`='$cityc',
`Com_State`='$statec',
`Com_Pin`='$pincodec',

`Reg_Address`='$addressp',

`Reg_City`='$cityp',
`Reg_State`='$statep',
`Reg_Pin`='$pincodep',

`Bankname`='$bankname',

`Bankaccount`='$bankacc',
`Branch`='$branch',
`IFSC`='$ifsc',
`Acc_Type`='$acctype',
`Active`='$statuscheck'

WHERE `User_Id`=$User_Id";



if(mysqli_query($conn,$query))
{
    echo "<script>window.location.assign('Employee_Registration_Edit.php?email=$Name&id=$Mobile&m=$User_Id&n=$Email&msg=y')</script>";
}else
{
    echo "<script>window.location.assign('Employee_Registration_Edit.php?email=$Name&id=$Mobile&m=$User_Id&n=$Email&msg=n')</script>";
}



}
 ?>














