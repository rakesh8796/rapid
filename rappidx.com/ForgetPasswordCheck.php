<?PHP
session_start();
error_reporting(1);
extract($_REQUEST);
include "Admin/config/dbcon.php";

if(!empty($_SESSION['usertype'])){
    echo "<script>window.location.assign('Admin/index.php')</script> ";
}

// echo $username;


if(isset($loginchekc))
{
    $password = md5($password);
    $query="SELECT * FROM `asitfa_user` WHERE `User_Email`='$username'";
    $fdata=mysqli_query($conn,$query);
    $numrow=mysqli_num_rows($fdata);
    if($numrow==1)
    {
        $result = mysqli_fetch_assoc($fdata);
        // $_SESSION['username'] = $result['Company_Name'];
        // $_SESSION['useridis'] = $result['User_Id'];
        // $_SESSION['usertype'] = $result['usertype'];
        // $result['usertype']=="user";
        $regmailid = $result['Email'];
        if($result['Active']==1){
            // echo "Work";

// Mail Format
require "phpmailer/PHPMailerAutoload.php";
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth=false;
$mail->Port=25;
$mail->Host="localhost";

$mail->Username="info@rappidx.com";
$mail->Password="INFO@rappid1234";

$mail->IsSendmail();
$mail->setFrom("info@rappidx.com");
$mail->addAddress("shivam.philontechnologies@gmail.com");
$mail->addAddress("$username");
// $mail->addAddress("info@rappidx.com");
$mail->addAddress("techsupport@rappidx.com");

$mail->isHTML(true);
$mail->Subject="Rappidx Account Reset Password";

$mail->Body="
<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff'>
<tbody><tr>
<td align='center'>
    <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='m_-736964052541832188container590'>
        <tbody><tr>
            <td align='center' style='color:#343434;font-size:24px;font-family:Quicksand,Calibri,sans-serif;font-weight:700;letter-spacing:3px;line-height:35px' class='m_-736964052541832188main-header'>

                <div style='line-height:35px'>Rappidx Panel  Reset Your Password </div>
            </td>
        </tr>
        <tr>
            <td height='10' style='font-size:10px;line-height:10px'>&nbsp;</td>
        </tr>
        <tr>
            <td align='center'>
                <table border='0' width='40' align='center' cellpadding='0' cellspacing='0' bgcolor='eeeeee'>
                    <tbody><tr>
                        <td height='2' style='font-size:2px;line-height:2px'>&nbsp;</td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
            <td height='20' style='font-size:20px;line-height:20px'>&nbsp;</td>
        </tr>
        <tr>
            <td align='left'>
                <table border='0' width='590' align='center' cellpadding='0' cellspacing='0' class='m_-736964052541832188container590'>
                    <tbody><tr>
                        <td align='left'>
                            <p style='line-height:24px;margin-bottom:15px'>
                                <a href='#'>$username<wbr>com</a>,
                            </p>
                            <p style='line-height:24px;margin-bottom:15px'>
                                You has requested a password reset for your Rappidx account. Follow the link below to set a new password:
                            </p>

                            <table border='0' align='center' width='180' cellpadding='0' cellspacing='0' bgcolor='5caad2' style='margin-bottom:20px'>
                                <tbody><tr>
                                    <td height='10' style='font-size:10px;line-height:10px'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align='center'>
                                        <div style='line-height:22px'>
                                            <a href='http://rappidx.com/NewPassword.php?useremail=$username' style='color:#ffffff;text-decoration:none' target='_blank'>Reset Your Password</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height='10' style='font-size:10px;line-height:10px'>&nbsp;</td>
                                </tr>
                            </tbody></table>

                            <p style='line-height:24px;margin-bottom:20px'>
                                If you don't wish to reset your password, disregard this email and no action will be taken
                            </p>

                            <p style='line-height:24px'>
                                Rappidx Team
                            </p>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>
</td>
</tr>
<tr>
<td height='40' style='font-size:40px;line-height:40px'>&nbsp;</td>
</tr>
</tbody></table>";
$mail->send();
// Mail Format


$queryu="UPDATE `asitfa_user` SET `forgetpassword`='1' WHERE `User_Email`='$username'";
mysqli_query($conn,$queryu);

            // header("location:ForgetPassword.php?error=noaterror");
            echo "<script>window.location.assign('ForgetPasswordSend.php?email=$regmailid')</script>";
            // echo "<script>window.location.replace('Admin/Dashboard.php')</script>";
            // header("location:Admin/Dashboard.php");
        }else{
          header("location:ForgetPassword.php?error=noaterror");
          echo "<script>window.location.assign('ForgetPassword.php?error=noaterror')</script>";
        }
    }else{
        header("location:ForgetPassword.php?error=notacerror");
        echo "<script>window.location.assign('ForgetPassword.php?error=notacerror')</script>";
        // echo "Invalid Details";
    }
}

// echo "<script>location.reload()</script>";

?>
