<?php
$co=mysqli_connect("localhost","root","","rapidax_db");


$ship_data_range=$_POST['ship_data_range'];

 //$today = date("Y-m-d", strtotime($_POST['value']));

$ship_awb_no=$_POST['ship_awb_no'];
$ship_order_id=$_POST['ship_order_id'];
$ship_couier=$_POST['ship_couier'];
$ship_product=$_POST['ship_product'];
$ship_warehouse=$_POST['ship_warehouse'];
$ordertype=$_POST['ordertype'];
$active_shipment=$_POST['active_shipment'];
$table_id_shipment=$_POST['table_id_shipment'];
// echo $table_id_shipment;
// die();

$ship_new_date='';
$ship_condition='';
if($ship_data_range=='Today'){
	$ship_new_date=date('Y-m-d');
	$ship_condition="AND Rec_Time_Date='$ship_new_date'";
}
if($ship_data_range=='Yesterday'){
	$ship_new_date=date("Y-m-d", strtotime("-1 days"));
	$ship_condition="AND Rec_Time_Date='$ship_new_date'";
}
if($ship_data_range=='Last seven days orders'){
	$ship_new_date=date("Y-m-d", strtotime("-7 days"));
	$ship_condition="AND Rec_Time_Date >='$ship_new_date'";
}
if($ship_data_range=='Current Month Order'){
	$ship_new_date=date("Y-m-d", strtotime("first day of this month"));
	$ship_last_date=date("Y-m-d", strtotime("last day of this month"));
	$ship_condition="AND Rec_Time_Date >='$ship_new_date' AND Rec_Time_Date <='$ship_last_date'";
}
if($ship_data_range=='Last Month Order'){
	$ship_new_date=date("Y-m-d", strtotime("first day of this last month"));
	$ship_last_date=date("Y-m-d", strtotime("last day of this last month"));
	$ship_condition="AND Rec_Time_Date >='$ship_new_date' AND Rec_Time_Date <='$ship_last_date'";
}
// if($ship_data_range=='Custom Date Range'){

// }
if($ship_data_range=='---Download Your Order---'){
	$ship_new_date='';
	$ship_condition='';
}

$ship_where='AND order_status_show=';
$conditsan='';
if($active_shipment=='Pending Pickup'){
	$conditsan='Upload';

}else if($active_shipment=='Intransit'){
	$conditsan='Upload';
}else if($active_shipment=='Delivered'){
	$conditsan='Upload';
}else if($active_shipment=='Out For Delivery'){
	$conditsan='Upload';
}else if($active_shipment=='Undelivered'){
	$conditsan='Upload';
}else if($active_shipment=='RTO'){
	$conditsan='Upload';
}else if($active_shipment=='Lost'){
	$conditsan='Upload';
}else if($active_shipment=='Cancelled'){
	$conditsan='Upload';
 }
 else{
	$ship_where='';
$conditsan='';

}

$sal="select spo.orderno,spo.Awb_Number,spo.Rec_Time_Date,spo.Name,spo.awb_gen_by,spo.Actual_Weight,spo.Order_Type,spo.Total_Amount,spo.Item_Name,spo.Rec_Time_Stamp,spo.order_status_show,cp.courier_name,spa.Address 
from spark_single_order spo 
INNER JOIN courier_partners cp
ON spo.courier_name_id = cp.id 
INNER JOIN spark_pickup_address spa
ON spo.pickup_address = spa.Address_Id
where spo.orderno LIKE '%$ship_order_id%' AND spo.Awb_Number LIKE '%$ship_awb_no%' AND spo.Item_Name LIKE '%$ship_product%' AND spo.Order_Type LIKE '%$ordertype%' AND cp.courier_name LIKE '%$ship_couier%' AND spa.Address LIKE '%$ship_warehouse%' $ship_where '$conditsan' $ship_condition";
// echo $sal;
// die();

$salquery=mysqli_query($co,$sal);
$ship_result='';
while($row=mysqli_fetch_assoc($salquery)){
	$class=$row['orderno'];
	$ship_result .='<tr>';
	if($table_id_shipment ==''){
		$ship_result .='<td>'.'</td>';
	}else{
	$ship_result .='<td>'."<input type='checkbox' class='get_value get_value_$class abc'/>".'</td>';
	}	
	$ship_result .='<td>'.$row['orderno'].'</td>'.
 	'<td>'.$row['Awb_Number'].'</td>'.
 	'<td>'.$row['Rec_Time_Date'].'</td>'.
 	'<td>'.$row['Name'].'</td>'.
 	'<td>'.$row['courier_name'].'</td>'.
 	
 	
 	'<td>'.$row['Actual_Weight'].'</td>'.
 	'<td>'.$row['Order_Type'].'</td>'.
 	'<td>'.$row['awb_gen_by'].'</td>'.
 	
 	'<td>'.$row['Item_Name'].'</td>'.
 	'<td>'.$row['Rec_Time_Stamp'].'</td>'.
 	'<td>'.$row['order_status_show'].'</td>'.
 	'</tr>';
 
}


echo json_encode(array('ship_data'=>$ship_result ,'ship_tableId'=>$table_id_shipment));

?>