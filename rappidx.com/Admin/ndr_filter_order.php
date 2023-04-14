<?php
$co=mysqli_connect("localhost","root","","rapidax_db");


$ndr_date_range=$_POST['ndr_date_range'];

 

$ndr_order_id=$_POST['ndr_order_id'];
$ndr_awb_no=$_POST['ndr_awb_no'];
$ndr_mobile_no=$_POST['ndr_mobile_no'];
$ndr_name=$_POST['ndr_name'];
$ndr_product_name=$_POST['ndr_product_name'];
$ndr_attempts=$_POST['ndr_attempts'];
$ndr_courier_wise=$_POST['ndr_courier_wise'];
$ndr_remark=$_POST['ndr_remark'];
$ordertype=$_POST['ordertype'];
$active_tab_ndr=$_POST['active_tab_ndr'];
$table_id_ndr=$_POST['table_id_ndr'];


?>