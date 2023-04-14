<?php 
include("../config/dbcon.php");
extract($_REQUEST);
error_reporting(1);

if(!empty($datetime) AND !empty($date)){

    $query = "DELETE FROM `spark_single_order` WHERE `awb_gen_by`='Bluedart' AND `uploaddate`='$date' AND `uploadtime`='$datetime'";
    if(mysqli_query($conn,$query)){
        echo "<script> window.location.assign('../BD_Ordera.php?excelfile=MIS Delete')</script>";
    }else{
        echo "<script> window.location.assign('../BD_Ordera.php?excelfile=MIS Not Delete')</script>";
    }
    echo "<script> window.location.assign('../BD_Ordera.php?excelfile=Not Working')</script>";

}elseif(!empty($date)){

    echo "<script> window.location.assign('../BD_Ordera.php?excelfile=Not Working')</script>";

}else{
    echo "<script> window.location.assign('../BD_Ordera.php?excelfile=Not Working')</script>";
}

echo "<script> window.location.assign('../BD_Ordera.php?excelfile=Not Working')</script>";

?>