<?php 
session_start();
// error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";


if(!empty($usertype)){

    echo "<script>window.location.assign('retailer-dashboard.php')</script>";
	header("location:retailer-dashboard.php");

}else{
//     header("location:https://rappidx.com/");
// 	echo "<script>window.location.assign('https://rappidx.com/')</script> ";
    header("location:index.php");
    echo "<script>window.location.assign('index.php')</script> ";
}



?>