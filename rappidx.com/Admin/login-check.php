<?PHP
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

  $tudate = date('Y-m-d');
//   echo "<br>";
  $crttime = date("Y-m-d H:i:s");

if(!empty($_SESSION['usertype']))
{
    echo "<script>window.location.assign('Admin/index.php')</script> ";
}



if(isset($loginchekc))
{
    $password = md5($password);
    $query="SELECT * FROM `asitfa_user` WHERE `User_Email`='$username' AND `User_Password`='$password' AND `Active`='1'";
    $fdata=mysqli_query($conn,$query);
    $numrow=mysqli_num_rows($fdata);
    if($numrow==1)
    {
        $result = mysqli_fetch_assoc($fdata);
        $_SESSION['username'] = $result['Company_Name'];
        $_SESSION['useridis'] = $result['User_Id'];
        $_SESSION['usertype'] = $result['usertype'];
        $_SESSION['useruinqueidno'] = $result['useruinqueidno'];
        // if($result['usertype']=="user")
        // {
        //     echo "<script>window.location.replace('Admin/Dashboard.php')</script>";
        //     header("location:Admin/Dashboard.php");
        // }
        
        
        
        
        
        
        $lgname = $result['Company_Name'];
        $lgid = $result['User_Id'];
        $lgtype = $result['usertype'];
        $lguid = $result['useruinqueidno'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $apiURL = 'https://freegeoip.app/json/'.$userIP;
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $apiResponse = curl_exec($ch);
        curl_close($ch);
        $ipData = json_decode($apiResponse, true);
        if(!empty($ipData)){
            $country_code = $ipData['country_code'];
            $country_name = $ipData['country_name'];
            $region_code = $ipData['region_code'];
            $region_name = $ipData['region_name'];
            $city = $ipData['city'];
            $zip_code = $ipData['zip_code'];
            $latitude = $ipData['latitude'];
            $longitude = $ipData['longitude'];
            $time_zone = $ipData['time_zone'];
            $loginout = "INSERT INTO `loginandlogoutdetails`(
              `ipaddress`, `userid`, `usertype`, `useruniqueidno`, `companyname`,
              `logindate`, `logindatetime`, `regionname`, `city`, `pincode`, `countryname`)
            VALUES ('$userIP','$lgid','$lgtype','$lguid','$lgname',
              '$tudate','$crttime','$region_name','$city','$zip_code','$country_name')";
            mysqli_query($conn,$loginout);
        }
        // $lgname = $result['Company_Name'];
        // $lgid = $result['User_Id'];
        // $lgtype = $result['usertype'];
        // $lguid = $result['useruinqueidno'];
        // $userIP = $_SERVER['REMOTE_ADDR'];
        // $loginout = "INSERT INTO `loginandlogoutdetails`(`userid`, `usertype`, `useruniqueidno`, `companyname`,`logindate`, `logindatetime`)VALUES ('$lgid','$lgtype','$lguid','$lgname',now(),now())";
        // mysqli_query($conn,$loginout);

        
        
        
        
        
        
        
        
        
        
        
if($result['usertype']=="admin"){
    $_SESSION['paneltitle'] = "Admin Panel";
    header("location:AdminDashboard.php");
    echo "<script>window.location.assign('AdminDashboard.php')</script>";
}elseif($result['usertype']=="employee"){
    $_SESSION['paneltitle'] = "Employee Panel";
    header("location:Admin/EmployeeDashboard.php");
    echo "<script>window.location.assign('EmployeeDashboard.php')</script>";
}elseif($result['usertype']=="retailer"){
    $_SESSION['paneltitle'] = "Retailer Panel";
    // header("location:Admin/RetailerDashboard.php");
    // echo "<script>window.location.assign('Admin/RetailerDashboard.php')</script>";
    header("location:admin/retailer/retailer-panel.php");
    echo "<script>window.location.assign('admin/retailer/retailer-panel.php')</script>";
}else{
    $_SESSION['paneltitle'] = "Client Panel";
    header("location:Dashboard.php");
    echo "<script>window.location.assign('Dashboard.php')</script>";
}
        
        
        
    }
    else
    {
        header("location:Login.php?error=error");
        echo "<script>window.location.assign('Login.php?error=error')</script>";
    }
}

echo "<script>location.reload()</script>";

?>


