<?php 
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";


if(!empty($_SESSION['usertype']))
{
    if($_SESSION['usertype']=="admin"){
    	header("location:AdminDashboard.php");
        echo "<script>window.location.assign('AdminDashboard.php')</script>";
        
    }elseif($_SESSION['usertype']=="employee"){
    	header("location:EmployeeDashboard.php");
        echo "<script>window.location.assign('EmployeeDashboard.php')</script>";
        
    }elseif($_SESSION['usertype']=="retailer"){
    	header("location:RetailerDashboard.php?usertype=retailer");
        echo "<script>window.location.assign('RetailerDashboard.php?usertype=retailer')</script>";
        
    }else{
        header("location:Dashboard.php");
        echo "<script>window.location.assign('Dashboard.php')</script>";
    }
    
    
}

if(empty($_SESSION['usertype']))
{
    header("location:Login.php");
	echo "<script>window.location.assign('Login.php')</script> ";
}



?>