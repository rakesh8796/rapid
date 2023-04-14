<?php 
include("../config/dbcon.php");
extract($_REQUEST);
error_reporting(1);

if(!empty($datetime) AND !empty($date)){

    $query = "DELETE FROM `spark_mis_report` WHERE `uploaddate`='$date' AND `uploadtime`='$datetime'";
    if(mysqli_query($conn,$query)){
        echo "<script> window.location.assign('../mis_report.php?excelfile=MIS Delete')</script>";
    }else{
        echo "<script> window.location.assign('../mis_report.php?excelfile=MIS Not Delete')</script>";
    }
    echo "<script> window.location.assign('../mis_report.php?excelfile=Not Working')</script>";

}elseif(!empty($date)){

    $query = "DELETE FROM `spark_mis_report` WHERE `uploaddate`='$date'";
    if(mysqli_query($conn,$query)){
        echo "<script> window.location.assign('../mis_report.php?excelfile=MIS Delete')</script>";
    }else{
        echo "<script> window.location.assign('../mis_report.php?excelfile=MIS Not Delete')</script>";
    }
    echo "<script> window.location.assign('../mis_report.php?excelfile=Not Working')</script>";

}else{
    echo "<script> window.location.assign('../mis_report.php?excelfile=Not Working')</script>";
}

echo "<script> window.location.assign('../mis_report.php?excelfile=Not Working')</script>";

?>