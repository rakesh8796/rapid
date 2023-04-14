<?php
$co=mysqli_connect("localhost","root","","rapidax_db");


$data_range=$_POST['data_range'];

 //$today = date("Y-m-d", strtotime($_POST['value']));

$customer_name=$_POST['customer_name'];
$order_id=$_POST['order_id'];
$mobile_no=$_POST['mobile_no'];
$product_name=$_POST['product_name'];
$ordertype=$_POST['ordertype'];
$active_tab=$_POST['active_tab'];
$table_id=$_POST['table_id'];
// echo $table_id;
// die();

 $new_date='';
$condition2='';
if($data_range=='Today'){
	$new_date=date('Y-m-d');
	$condition2="AND Rec_Time_Date ='$new_date'";
}if($data_range=='Yesterday'){
	$new_date=date("Y-m-d", strtotime("-1 days"));
	$condition2="AND Rec_Time_Date = '$new_date'";
}if($data_range=='Last seven Days'){
	$new_date=date("Y-m-d", strtotime("-7 days"));
	$condition2="AND Rec_Time_Date >= '$new_date'";
	
}if($data_range=='Current month'){
	$new_date=date("Y-m-d", strtotime("first day of this month"));
	$last_date=date("Y-m-d", strtotime("last day of this month"));

	$condition2="AND Rec_Time_Date>= '$new_date' AND Rec_Time_Date<='$last_date'";
	
}if($data_range=='Last Month'){
	$new_date=date("Y-m-d", strtotime("first day of Last Month"));
	$last_date=date("Y-m-d", strtotime("last day of Last Month"));
	$condition2="AND Rec_Time_Date>= '$new_date' AND Rec_Time_Date<='$last_date'";

	
}
// if($data_range=='Custom Date Range'){
// 	$new_date=date("Y-m-d", strtotime("first day of this month"));
	
// }

if($data_range=='Download your data range'){
	$$condition2='';
	$new_date='';
}


$and='AND order_status=';
$condition='';
if($active_tab=='Not Shipped'){
	$condition='Pending';
}
	else if($active_tab=='Cancelled'){
		$condition='Pending';
	}
	else if($active_tab=='Failed'){
		$condition='Pending';
	}

else{
	$and='';
	$condition='';
}
 
 $sel="select orderno,Rec_Time_Date,Name,Mobile,cpo.courier_name,City,Pincode,Order_Type,Item_Name,Actual_Weight,order_status_show,order_status from spark_single_order spo INNER JOIN courier_partners cpo ON spo.courier_name_id = cpo.id where Name LIKE '%$customer_name%' AND orderno LIKE '%$order_id%' AND Mobile LIKE '%$mobile_no%' AND Item_Name LIKE '%$product_name%' AND Order_Type LIKE '%$ordertype%' $and '$condition' $condition2";
 
 $selquery=mysqli_query($co, $sel);
 $result='';
 while($row=mysqli_fetch_assoc($selquery)){
 	$cal=$row['orderno'];
 	$result .='<tr>';
 	if($table_id=='#home3' || $table_id==''){
 		// $result .='<td>'.'</td>';
 	}
 		
 	else{
 		$result .='<td>'."<input type='checkbox' class='get_value get_value_$cal abc'/>".'</td>';
 	}

 	
 	$result .='<td>'.$row['orderno'].'</td>'.
 	'<td>'.$row['Rec_Time_Date'].'</td>'.
 	'<td>'.$row['Name'].'</td>'.
 	'<td>'.$row['Mobile'].'</td>'.
 	'<td>'.$row['courier_name'].'</td>'.
 	'<td>'.$row['City'].'</td>'.
 	'<td>'.$row['Pincode'].'</td>'.
 	'<td>'.$row['Order_Type'].'</td>'.
 	'<td>'.$row['Item_Name'].'</td>'.
 	'<td>'.$row['Actual_Weight'].'</td>'.
 	'<td>'.$row['order_status_show'].'</td>'.
 	'<td>'.$row['order_status'].'</td>'.

 	'</tr>';
 }

 
 echo json_encode(array('res'=>$result ,'tableId'=>$table_id));

?>