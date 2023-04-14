
<?php include('header.php');

if($_SESSION['agent']=='')

{

	header("location:index.php");

}

include('top_section.php');

$st=mysql_query("select * from agents where user_mobile_no='$_SESSION[agent]'"); //money transfer status from agents table
 
 $mt=mysql_fetch_array($st);
 
 $c_details=mysql_fetch_array(mysql_query("select * from company_details"));

 
?>

<?php

if($_POST[transfer]=='transfer'){
  
$rate_sql=mysql_query("select * from `commission_recharge` where `provider`='money' and `wl_code`='' or wl_code is NULL ")or die(mysql_error());
				
				
$rate_res=mysql_fetch_array($rate_sql);


 $rate=$rate_res['rate'];

 
  $channel=$_REQUEST['channel'];
  //echo $_POST['rcp_id'];

$account=$_REQUEST['account'];
 
 $_SESSION[account]=$split[2];

 $recipient_id=trim(stripslashes($_REQUEST['recipient_id']));
 
 $amount=mysql_real_escape_string($_REQUEST['amount']);
 
 $mobile=mysql_real_escape_string($_POST['mobile']);

 



$orderid = rand(0,99999); //your unique order id


 
 $date=date("Y-m-d");
 
 

if($_SESSION['balance'] > $amount){
	
$main_key=mysql_fetch_array(mysql_query("select * from access_keys where service ='recharges' and status ='A'"));


$key=$main_key[user];

//echo $url="$api_url/money_transfer/send_money?gatkey=$gatkey&mobile_number=$mobile&recipient_id=$recipient_id&account=$account&amount=$amount&channel=$channel&client_id=$orderid";

$ch = curl_init("$api_url/money_transfer/send_money?gatkey=$gatkey&mobile_number=$mobile&recipient_id=$recipient_id&account=$account&amount=$amount&channel=$channel&client_id=$orderid");
   
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //curl_setopt($ch, CURLOPT_POSTFIELDS,($json5));
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        if(!$response) {
            return false;
        }
		

	
  ?>

<?php
//print_r($response);

//echo $response;


$json=json_decode($response, true);

 $tid=$json['tid'];
  $fee=$json['data']['fee'];
  $service_tax=$json['data']['service_tax'];
  $txstatus_desc=$json['txstatus_desc'];
  $tx_status=$json['data']['tx_status'];
  $balance=$json['data']['balance'];
  $account=$json['account'];
  
  $bank_ref_num=$json['bank_ref_num'];


if($json['status']=='success'){	
	
	
 
	
mysql_query("insert into `balance`(`gatid`,`user_type`,`user_id`,`naration`,`payment`,`pay_type`,`date`,`flag`,`wl_code`) 
values('$orderid','agent','$_SESSION[email]','Money Transfer To($recipient_id) and (AC- $account)','$amount','dr','$date','0','')")or die(mysql_error());
	

 $total_comm=($amount * $rate)/100;
	
 mysql_query("insert into `balance`(`gatid`,`user_type`,`user_id`,`naration`,`payment`,`pay_type`,`date`,`flag`,`wl_code`) 
values('$orderid','agent','$_SESSION[email]','Fees for Transfer (rcp id- $recipient_id)','$total_comm','dr','$date','0','')")or die(mysql_error());
	
	
	
	
 	$ins="INSERT INTO `money_transaction`(`user`, `recipient_id`, `fee`, `amount`, `txstatus_desc`, `client_ref_id`, `service_tax`, `tid`, `bank_ref_num`,`bank`, `account`, `balance`, `status`, `tx_status`, `channel`, `state`, `date`,`customer_id`,`wl_code`,`payid`,`AckNo`,`type`) VALUES('$_SESSION[email]','$recipient_id','$fee','$amount','$txstatus_desc','$orderid','$service_tax','$tid', '$bank_ref_num','$bank','$account','$balance','Success','$tx_status','$channel','1','$date','$_REQUEST[sender_no]','','$payid','','EKO')";
	
	mysql_query($ins);
	

?>
       
	<?php    header("Refresh:10; url=money_report.php");  
	
	
	 }  
	
	}

else {
	
	header("location:money_transfer_eko.php?Insufficient Balance You have ");
	
	?>
    	<span id="notice1" style="color:#F00; font-weight:bold; font-size:18px;">YOU DONT HAVE BALANCE TO TRANSFER MONEY </span>

	
	 <?php  }  ?>
	
	
    
    <?php
	
	if($json['status']=='failure'){
		
		$ins="INSERT INTO `money_transaction`(`user`, `recipient_id`, `fee`, `amount`, `txstatus_desc`, `client_ref_id`, `service_tax`, `tid`, `bank_ref_num`,`bank`, `account`, `balance`, `status`, `tx_status`, `channel`, `state`, `date`,`customer_id`,`wl_code`,`payid`,`AckNo`,`type`) VALUES('$_SESSION[email]','$recipient_id','$fee','$amount','$txstatus_desc','$orderid','$service_tax','$tid', '$bank_ref_num','$bank','$account','$balance','Failed','$tx_status','$channel','1','$date','$_REQUEST[sender_no]','','$payid','','EKO')";
	
	mysql_query($ins);
		
		?>
	<span id="notice2" style="color:#F00; font-weight:bold; font-size:18px;">MINIMUM AMOUNT 1000 R.s U CAN TRANSFER FOR IMPS BELOW 100 R.S USE NEFT</span>
	
	<?php } ?>
    
    
    
    

  
  
   <script src="js/jquery.js"></script>

<script>
	
	$(document).ready(function(e) {
        
		$('#success_tab').fadeIn(100);
		
    });
	
	</script>
  
  <?php  }  ?>
	





 

        <div class="container">
            <h1 class="page-title">Welcome To <?php echo $c_details[c_name];?> </h1>
        </div>




        <div class="container">
            <div class="row">
                <?php include('dashbord_menu.php');?>
                
                
                <div class="col-md-9">
                    <div class="row">
                        
                        
                        
                        <div  class="element-tab" >
					<ul  class="nav nav-tabs tab-style1">
<li  style="size:12px" id="tab_1"  class="active"><a data-toggle="tab" href="#tab1">MONEY TRANSFER</a></li>
						<li><a data-toggle="tab"  style="display:none" id="tab_2" href="#tab2">ADD BENEFICIARY</a></li>
						<li><a data-toggle="tab" style="display:none" id="tab_3"  href="#tab3">SEND MONEY</a></li>
                        <li><a data-toggle="tab" style="display:none" id="tab_4" href="#tab4">TRANSACTION HISTORY</a></li>
						<li><a data-toggle="tab" style="display:none" id="tab_5" href="#tab5">REFUND TRANSACTION</a></li>
					</ul>
					<div class="tab-content">
						<div id="tab1" class="tab-pane fade in active ">
							<div class="col-md-5">
								<h4 id="name">SENDER MOBILE NO</h4>
								<div class="form-group form-group-icon-left">
									<form id="form1" action=""  method="post" >
										<div class="form-group form-group-icon-left">
											
			<input type="text"  id="mobile" placeholder="Mobile no" class="form-control" name="sender_no">
										</div>
                                        
                                       <?php
											if($mt['money'] == 'A'  ){  
											 ?>
                                        
                                        
                                        <div class="form-group form-group-icon-left">
 <button type="button"  class="btn btn-success"  id="otp">Check Now </button>
										</div> <?php  }?>
                                        
               <div id=""> <img  id="process" src="gif/loading.gif" alt="cruise" style="display:none; width:40px" height="40px"> </div>
								</div>
                                
                                
                            </div>
                            
                           <div class="col-md-5" id="new_rcp" style="display:none" >
                           
                       <h5>NEW BENEFICIARY </h5>
									<form >
                                    
										
									<div class="col-md-6 text-center">
		 <button type="button" style="background: #06C" class="btn btn-success"  id="add_new_rcp" >ADD NEW BENEFICIARY</button>
         
										</div>	
                                        
                                        
                                        
									</form>
							</div> 
                            
                            
                           
                           
                            
                            
                            
                            
                            
                            
                            
                            <div id="rcp_img" style="display:none;">
                           
                            
           <img  id="" style="width:300px; height:220px; margin-top:125px;"   src="http://www.crm.org.mx/img/espera.gif"  >  </div>               
                            
                            
                            <div id="rcp_details"> </div>
                            
               

                            
      <div class="col-md-4 col-md-offset-1" id="new_cus" style="display:none;">
									<form >
                                    <div class="form-group form-group-icon-left">
											<label>Full Name</label>
											<input type="text" name="fname"  id="cusname"    placeholder="Name" class="form-control">
										</div>
										
										<div class="col-md-6 text-center">
		 <button type="button" class="btn btn-success"  id="next_add_cus" >Next Step</button>
										</div>
                                        
                                        
                                        
									</form>
							</div>
                            
                       
                       <div class="col-md-4 col-md-offset-1" id="enter_otp" style="display:none;">
									<form >
                                    <div class="form-group form-group-icon-left">
											<label>Otp</label>
											<input type="text" name=""  id="main_otp" placeholder="otp" class="form-control">
										</div>
										
										<div class="col-md-6 text-center">
		 <button type="button" class="btn btn-success"  id="confirm_cus" >Register</button>
         
										</div>
                                        
                                        <div class="col-md-6 text-center">
		 <button type="button"  class="btn btn-success" style="background-color:#F90"  id="resend_otp" >Resend Otp</button>
         
										</div>
                                        
                                        
									</form>
							</div>     
                            
                            
                  
                  
                  
                  
                  
                  
                  <div class="col-md-6 col-md-offset-1" id="add_bank" style="display:none;">
				<h5 id="">ADD BANK </h5>

                                    
                                  <div class="panel-body" id="ben_frm" style="">
                                                <div class="form-horizontal">
                                                    <input type="hidden" value="" id="senderidn">
                                                    <div id="bankname" class="form-group" style="display: block;">
                                                        
                                                        <div class="col-sm-12">
                                                        
                                                        <select style="" class="form-control " id="bank_code">
                                                  
                                                  
                                                  <?php
										$sle2=mysql_query("select * from  money_marster_bank_list");
										while($rows2=mysql_fetch_array($sle2)){
										
										 ?>
						<option value="<?php echo $rows2['bank_code'];?> "> <?php echo $rows2['bank_name'];?></option>
                                            <?php  }  ?>      
                                                        
                                                        </select>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div id="account_field"  style="display:none">

                                                    <div id="an" class="form-group" style="display: block;">
                                                        <label for="bank_account" class="control-label col-sm-4">
                                                            Account
                                                            Number </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="bank_account" placeholder="Bank Account Number">
                                                                <span class="input-group-btn" >
                                                                            <button id="bnv" class="btn btn-primary" type="button" >Verify
                                                                            </button>
                                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="fn" class="form-group" style="display: block;">
                                                        <label for="first_name" class="control-label col-sm-4">
                                                            Name </label>
                                                        <div class="col-md-8" id="bene_name2">
                                                            <input type="text" class="form-control" id="bene_name" placeholder="Beneficiary Name">

                                                        </div>
                                                    </div>
                                                    <div id="bm" class="form-group" style="display: block;">
                                                        <label for="bene_mobile" class="control-label col-sm-4">Beneficiary
                                                            Mobile</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="bene_mobile" placeholder="Mobile Number (  )">

                                                        </div>
                                                    </div>

                                                    <div style="display: none;" id="ifsc_input" class="form-group">
                                                        <label for="ifsc" class="control-label col-sm-4"> IFS
                                                            Code </label>
                                                        <div class="col-md-8">
            <input type="text" class="form-control" id="ifsc" placeholder="IFS Code (  )">
                                                        </div>
                                                    </div>
                                                    <div id="bn" class="form-group" style="display: block;">
                                                        <div class="col-xs-offset-4 col-xs-8">
                                                            <a class="btn btn-success" id="addbene">
                                                                Continue</a>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                                <span class="success" id="sendercreate" style="display: none;"></span>
                                            </div>  
                                    
                                    
                                    
							</div>
                  
                  
                  
                  
                  
                  
                  
                 <div class="col-md-6" style="background:; display:none"  id="success_tab">
                            <!-- START TESTIMONIAL -->
                            <div class="testimonial testimonial-color" >
                                <div class="testimonial-inner" style="background:#9C0">
                                    <blockquote>
                                        <table width="340px" >
                            <tr style="background:#9C0; color:#006">
                            <th>RECIPIENT ID</th>
                            <td><?php echo $recipient_id ;?> </td>
                            </tr>
                            <tr style="background:#9C0; color:#006">
                            <th>BANK NAME</th>
                            <td><?php echo $bank ;?>  </td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>BANK ACCOUNT</th>
                            <td><?php echo $account ;?>  </td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>BANK REF NO</th>
                            <td><?php echo $bank_ref_num ;?></td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>TRANSACTION ID</th>
                            <td><?php echo $tid ;?></td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>ORDER ID</th>
                            <td><?php echo $orderid ;?></td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>AMOUNT</th>
                            <td>₹<?php echo $_REQUEST['amount'] ;?></td>
                            </tr>
                           
                             
                            
                            
                            
                            </table>
                                    </blockquote>
                                </div>
                                <div class="testimonial-author">
                                     
                                <?php if ($json['status']=='success')  {  ?>
              <div class="alert alert-success">
                                <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                                </button>
                                <strong  style="font-weight:bold; font-size:18px">Money Tranfer Success</strong>
                            </div>                                </div><?php  } else  {   ?>
                            
                            <div class="alert alert-danger">
                                <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                                </button>
                                <strong  style="font-weight:bold; font-size:18px">Money Tranfer Failed</strong>
                            </div> <?php  }  ?>
                                </div>
                            </div>
                            <!-- END TESTIMONIAL -->
                        </div> 
                  
                  
                  
                  
                  
                  
                  
                            
                            
                            
     <style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    border: none;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
                            
                            
                            
            <div class="col-md-4 col-md-offset-1" id="confirm_rcp_by_otp" style="display:none;">
            
            <h4>CONFIRM BENEFICIARY </h4>

	<div class="form-group form-group-icon-left">
											<label>Beneficiary Code Dont Edit</label>
						<input type="text" name=""  id="get_rcp_otp"   autocomplete="off" class="form-control" >
										</div>   
                                            
                                            
                                            <div class="form-group form-group-icon-left">
											<label>OTP</label>
						<input type="text" name=""  id="rbl_rcp_otp" placeholder="Enter OTP" autocomplete="off" class="form-control" >
										</div>
                                        
                                        
                                        <div class="col-md-6 text-center">
                           
 <button type="button" class="btn btn-success"  name="" value=""  style="" id="add_new_rcp_otp" >CONFIRM NOW</button>
										</div>
                                            
                                            
                                            
                                    
                                        
                             
							</div>                
                            
                            
                          
                          
                          
                          <div class="user-change-password" id="resend" style="display:none">
								<h4>RESEND OTP NOW</h4>
								<div class="change-password-body">
									<form >
                                    
                                    
                            <span id="resend1" style="color:#9C0; font-size: 18px; font-weight:bold; display:none">Name: </span>
                          <br>
                          <span id="resend2" style="color:#9C0; font-size:18px; font-weight:bold; display:none">Mobile: </span>
                          <br></br>
									
										<div class="col-md-12 text-center">
											 <button type="button"  style="background:#9C0" id="sendotp">Resend OTP</button>
										</div>
									</form>
								</div>
							</div>
                          
                          
                          
                          <div class="user-change-password" id="enterotp" style="display:none">
								<h4>ENTER OTP NOW</h4>
								<div class="change-password-body">
									<form action="" method="post">
                                   
										<div class="col-md-12">
							<span id="sended"   style="color:#9C0; font-size: 18px; font-weight:bold; display:none"> </span>
                                        <br></br>
							<input type="password" placeholder="ENTER OTP"  id="yesotp"class="form-control" name="otp">
										</div>

                                        <span id=""   style="color:#9C0; font-size: 14px; font-weight:bold; display:none"> </span>
                                        <br></br>
                                        
                                        
                                        <span id="done2"  style="color: #F30; font-size: 14px; font-weight:bold; display:none"> </span>
                                        <br></br>
										
										<div class="col-md-12 text-center">

											 <button type="button" style="background:green;" id="verify">VERIFY NOW</button>&nbsp;&nbsp;&nbsp;

                        <input type="hidden" style="font-weight:bold;" >DIDN'T RECEIVE OTP? </>
                      <button type="button" style="background:blue;" id="sendonce">RESEND OTP</button>



										</div>



									</form>
								</div>
							</div>

						</div>
                        
  <!------------------- -------------------------- ADD Recipient--------------------------------------------------- ---->       
						<div id="tab2" class="tab-pane fade <?php echo $tabactive_2 ;?> ">
							<div class="col-md-6">
                            <div class="user-personal-info" id="">
								<h4>ADD RECIPIENT NOW</h4>
								<div class="user-info-body">
									<form  action=""  method="post" >
                                     <input type="hidden" name="tab_group" value="tab_2">
                                    
										<div class="col-md-6 col-sm-6 col-xs-62 text-center" id="fade">
											<label>CUSTOMER ID (MOBILE NO)</label>
	<input type="text"  id="cus_no" value="<?php echo $_SESSION['no']= $_REQUEST['cus_id'];?>" placeholder="Mobile no" class="form-control" name="cus_id">
										</div>
                                        
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
						 <button type="submit" style="background:#9C0" name="add" value="add" id="add">ADD NEW </button>
                                             
										</div>
                                        
                                        
                
                
                                        
									</form>
								</div>
							</div>
                            </div>
                
                                           
					 
             
             
                            
                            
                            
                            
                            
                            
                            
  <!---------------------------------------GET ALL RICIEPIENT FROM DATABASE ------------------------------>
    
    
  

                   		
                    </div>
                           
                        
                        
   <!-- ////////////////////////////////////////Transfer Money Now--------------------------------////////////-->                    
                        
                       
                        
                        
                        
						 <div id="tab3" class="tab-pane fade <?php echo $tabactive_3;?>">
                       
                         
                         
                         <div class="col-md-6">
                            <div class="user-personal-info" id="final_rcp">
								<h4>Get All Recipient</h4>
								<div class="user-info-body">
									<form id="form1" action="" method="post"> 
                                     <input type="hidden" name="tab_group" value="tab_3">
                                    
										<div class="col-md-12" id="">
											<label>Customer Id</label>
								<input type="text"  id="" placeholder="Mobile no" class="form-control" name="cus_mobile">
										</div>
                                        
                                       
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-center">
											 <button type="submit" name="submit" id="">Get Recipient</button>
                                            
                                             
                                            
										</div>
                                        
                                        
                
                              
                                        
									</form>
								</div>
							</div>
                            
                            <div style="overflow-x:auto; display: none " id="rcp_dtl">
                            
                            <table width="340px" >
                            <tr  class="tr" style="font-size:16px; font-weight:bold; background:#9C0; color:#006"  >
        
        <th >Recipient </th>
        
        <th >Details</th>
        
      </tr>
      
      
      
      <tr  class="tr"   style="">
        
        <td style="">Full Name</td>
        
        
        
        <td id="details1"></td>
        </tr>
      
      <tr  class="tr" >
        
        <td style="">Mobile</td>
        
        
        
        <td id="details2"></td>
        </tr>
      
      
       <tr  class="tr" >
        
        <td style=""> Bank Name</td>
        
        
        
        <td id="details6"></td>
        </tr>
      
      
      
      
      <tr  class="tr" >
        
        <td style=""> Account No</td>
        
        
        
        <td id="details3"></td>
        </tr>
      
      <tr  class="tr" >
        
        <td style="">Ifsc Code</td>
        
        
        
        <td id="details4"></td>
        </tr>
      
      <tr  class="tr" >
        
        <td style=""> Recipient Id</td>
        
        
        
        <td id="details5"></td>
        </tr>
      
      
      
                            
                            </table>
                            </br>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-center" id="again_cus" >
							 <button type="button"  style="background:#9C0; color:#003" id="" >Search Customer</button>
										</div>
                            
                            
                            </div>
                            
                            
                            
                            
                            </div>
                            
                            
                            
                            
                            
                            
                            
                         
   
   <script>
  
  $(document).ready(function() {
    
	$('#send_amount').keyup(function() {
        
	var send_amount=$('#send_amount').val()
	
	//alert(send_amount);
		
		$.post('chk_money_send_amount.php',{"send_amount":send_amount,},
			
			function(data){
		
		//alert(data);
		
		
		if(data==0){
			
			$('#more').fadeIn(100);
			
		$('#transfer').attr('disabled', false);	
			
			
			
		}
		
		if(data==1){
			
			
			$('#low').fadeIn(100).delay(5000).fadeOut(500);
			
		$('#transfer').attr('disabled', true);	
			
		}
		
    });
	
	});
	
	$('#real_rcp').change(function(e) {
        
		
		//alert('ok boss');
    });
	
	
	
});
 
 
  
   
   </script>
   
   
                          
                                        
                                
                                        
                                        
                                   
                                        
						</div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--   //////////////////////////////////////////////// Transaction History ////////////////////////////-->
  <script>
  $(document).ready(function() {
    
	$('#tid_get').click(function() {
		
		
		
		var tid=$('#tid').val()
		
		//alert(tid);
		
		//$('#final_rcp').fadeOut(500)
		$('#tid_search').fadeIn(500) .delay(1500).fadeOut(800);
		
		$.post('money_get_tid_status.php',{"tid":tid,},
			
			function(data){
				
				//alert(data);
				
				
				//var dd = data.split('-');
		  
		  
				// if(dd[0]=='save_sucess'){
				 
				    document.getElementById('details1').innerHTML=dd[1];
					document.getElementById('details2').innerHTML=dd[2];
					document.getElementById('details3').innerHTML=dd[3];
					document.getElementById('details4').innerHTML=dd[4];
					document.getElementById('details5').innerHTML=dd[5];
					document.getElementById('details6').innerHTML=dd[6];
					//document.getElementById('details7').innerHTML=dd[7];
				})
				
			
    });
	
	});
	                
                        
 </script>                    
                        <div id="tab4" class="tab-pane fade">
                        
                        <div class="col-md-3 col-sm-3">
                        <form action="" method="post">
                        <input type="hidden" name="tab_group" value="tab_4">
											<label>Transaction Id</label>
					<input type="text" name="" id="tid"  placeholder="Enter Tid" class="form-control">
                           </div>
                           
                           <div>            
        <button type="button"  id="tid_get" name="" class="cbtn sm-btn" style="margin-top: 23px;
    margin-left: 44px;" >Search</button>    
    
 </div>
    <div id="" style="margin-top: -31px; margin-left: 439px;">  <img  id="tid_search" src="gif/progress_bar.gif" alt="cruise" style="display:none;"> </div>                          
                                            
										
                                        
                                        
							
										
                        
                        <br><br/><br>
                        
							<div style="overflow-x:auto; display:  " id="">
                            
                            <table width="340px" >
                            <tr  class="tr" style="font-size:16px; font-weight:bold; background:#9C0; color:#006"  >
        
        <th >Sender Id</th>
        
        <th >Recipient Id</th>
        
        <th >Transaction Id</th>
        
        <th >Order Id</th>
        
        <th >Account</th>
        
        <th >Bank</th>
        
        <th >Amount</th>
        
        <th >Bank Ref No</th>
        
        <th >Status</th>
        <th >Date</th>
         
        
      </tr>
      
      <tbody> 
      
      <?php
		$sel3=mysql_query("select * from money_transaction where user='".$_SESSION['agent']."' ORDER BY id DESC LIMIT 0,10");
		while($rows3=mysql_fetch_array($sel3)){
		
		  ?>  
       <tr  class="tr"   style="">
        
        
        <td><?php  echo $rows3['customer_id'];?></td>
        <td><?php  echo $rows3['recipient_id'];?></td>
          <td><?php  echo $rows3['tid'];?></td>
           <td><?php  echo $rows3['client_ref_id'];?></td>
            <td><?php  echo $rows3['account'];?></td>
            
            
             <td><?php 
			 $sel4=mysql_query("select * from money_recipient_list where recipient_id='".$rows3['recipient_id']."'");
			 $rows4=mysql_fetch_array($sel4);
			 
			  echo $rows3['bank'];?></td>
              
              
              
              <td>₹<?php  echo $rows3['amount'];?></td>
              
               <td><?php  echo $rows3['bank_ref_num'];?></td>
               
               <td> <?php
			 
			 if($rows3['txstatus_desc']=='Success')
{
	?>
    <b style="background-color:#090; color:#FFF">Success </b>
       <?php
}
elseif($rows3['txstatus_desc']=='In Progress')
{
	?>
    <p style="background-color:orange; color:#FFF">In Progress </p>
       <?php
}
elseif($rows3['txstatus_desc']=='Refunded')
{
	?>
    <b style="background-color: #66C; color:#FFF">Refunded </b>
       <?php
}

elseif($rows3['txstatus_desc']=='Refunded_done')
{
	?>
    <b style="background-color: #00F; color:#FFF">Refunded_done</b>
       <?php
}


elseif($rows3['txstatus_desc']=='Refund Pending')
{
	?>
    <b style="background-color:#039; color:#FFF">Refund Pending </b>
       <?php
}

elseif($rows3['txstatus_desc']=='Initiated')
{
	?>
    <b style="background-color: #F09; color:#FFF">Initiated </b>
       <?php
}





elseif($rows3['txstatus_desc']=='Hold')
{
	?>
    <b style="background-color: #C33; color:#FFF">Hold</b>
       <?php
}

elseif($rows3['txstatus_desc']=='Failure')

{
	?>
    <b style="background-color:#900; color:#FFF">Failure</b>
       <?php
}?></td>
      
      <td><?php  echo $rows3['date'];?></td>  
        </tr>
        <?php }  ?>
       
     </tbody>   
         
            </table>
                      
                            
                            </div>
                            
                            
                            
                            
						</div>
                        
                     
    </form>                 
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
   <!--///////////////////////////////////////REFUND STATUS /////////////////////////////////--->                  
                     
                     
                        
                     
                        
                        <div id="tab5" class="tab-pane fade<?php echo $tabactive_5;?>">
                        
                        
                        
                        <div class="col-md-6">
							<div class="user-change-password" id="" style="display:">
								<h4 style="background:#9C3; color:#006">REFUND TRANSACTION</h4>
								<div class="change-password-body">
									<form action="" method="post">
                                    
                                    <input type="hidden" name="tab_group" value="tab_5">
                                   
										<div class="col-md-12">
           <span id=""  style="color: #F30; font-size: 14px; font-weight:bold; display:none;"> </span>
							<span id=""   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
	<input type="text" placeholder="ENTER TRANSACTION ID"  id="take_tid" class="form-control" name="">
										</div>
   <button type="button"   style=" background: #9C0;color: #FFF" id="tid_search_get" >SEARCH NOW</button>     
										</div>
									</form>
								</div>
						</div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div  id="r_done" style="display:none">                
   <span id=""   style="color: #009; font-size: 18px; font-weight:bold; display:">SUCCESSFULLY REFUNDED  </span>
   
   
   <div style="overflow-x:auto; display: " id="">
                      <table width="340px" >
                            <tr style="background:#9C0; color:#006">
                            <th>RECIPIENT ID</th>
                            <td id="f1"> </td>
                            </tr>
                                                                                
                            
                            <tr style="background:#9C0; color:#006">
                            <th>TRANSACTION ID</th>
                            <td id="f2"></td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>REFUND ID</th>
                            <td id="f3"></td>
                            </tr>
                            
                            <tr style="background:#9C0; color:#006">
                            <th>REFUND AMOUNT</th>
                            <td id="f4">₹</td>
                            </tr>
                           
                             
                            
                            
                            
                            </table>
                            </div>
                            </div>
                        
                       <div class="user-change-password" id="refund_box" style="display:none  ">
								<h4 style="background:#9C0; color:#006">REFUND MONEY NOW</h4>
            
            
            
                            
                            
                                
     <span id="invalid_otp"  style="color: #F30; font-size: 14px; font-weight:bold; display:none;"> </span>
								<div class="change-password-body">
									<form action="" method="post">
                           
                                   <div class="col-md-6 col-sm-6">
                                   
                                   <label>RECIPIENT ID</label>
           <span id=""  style="color: #F30; font-size: 14px; font-weight:bold; display:none;">3333333333333 </span>
							<span id=""   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
							<input type="text" placeholder=""  id="rcp_id_no" class="form-control" name="">
										</div>
                                   
                                   
                                   										
                                        
                                        <div class="col-md-6 col-sm-6">
                                        <label>ORDER ID</label>
							<span id="sended"   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
							<input type="text"  placeholder=""  id="order_id" class="form-control" name="otp">
										</div>
                                        
                                        
                                        <div class="col-md-6 col-sm-6">
                                        <label>TRANSACTION ID</label>
							<span id="sended"   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
	<input type="text"  placeholder=""  id="tid2" class="form-control" name="otp">
										</div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                    
                                    <label>AMOUNT</label>
          
							<span id="sended"   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
							<input type="text" placeholder=""  id="amnt" class="form-control" name="">
										</div>
                                    
                                    
                                        
                                        
                                        <div class="col-md-6 col-sm-6">
                                        
                                        <label>ENTER OTP</label>
           <span id="invalid_otp"  style="color: #F30; font-size: 14px; font-weight:bold; display:none;"></span>
							<span id="sended"   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
							<input type="text" placeholder="ENTER OTP"  id="otp2" class="form-control" name="otp2">
										</div>
                                        
                                        
                                        <div class="col-md-6 col-sm-6">
                                        
                                        <label>SENDER ID</label>
           <span id="invalid_otp"  style="color: #F30; font-size: 14px; font-weight:bold; display:none;"></span>
							<span id="sended"   style="color:#9C0; font-size: 18px; font-weight:bold; display:"> </span>
                                        <br></br>
							<input type="text" placeholder=""  id="sen_id" class="form-control" name="otp2">
										</div>
                                        
                                        
           <span id=""   style="color:#9C0; font-size: 14px; font-weight:bold; display:none"> </span>
                                        
                                        
                                        
   
                                        
										
										<div class="col-md-12 text-center">
                                        
 <button type="button"   style=" background: #06F;color: #FFF" id="refund" >CONFIRM REFUND</button>&nbsp;&nbsp;&nbsp;
   <button style="display:; background:#9C0;" type="button" id="refund_otp" >RESEND OTP</button>
     
										</div>
									</form>
								</div>
							</div>
                            
                            
                           </div> 
                            
                            
                            
                             
                        
                        
                        
                        
                        
                        
                        
                        
                        
					</div>
				</div>
                        
                        
                        
                        
                    </div>

                </div>
                
                
                
                
                        
                        
                        
                
                
                
                
                
                
            </div>
        </div>


<div class="modal fade" id="myModal"  role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Transaction</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" method="post">
                        <input type="hidden" value="408" id="user_id" name="user_id">
                        <input id="c_bene_id" type="hidden">
                        <input id="c_sender_id" type="hidden">
                        <div class="form-group">
                            <label for="bank_account" class="control-label col-sm-4">
                                Account Number </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" disabled id="c_bank_account"
                                       placeholder="Bank Account Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_account" class="control-label col-sm-4">
                                Account Holder Name </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" disabled id="c_bene_name"
                                       placeholder="Account Holder Name">
                                      
                                       
                                       <input type="hidden" name="recipient_id" class="form-control"  id="rcp_id"/>
                                       
                                       <input type="hidden" name="account" class="form-control"  id="account_rcp"/>
                                       
                                       <input type="hidden" name="mobile" class="form-control"  id="mob"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_account" class="control-label col-sm-4">
                                Amount </label>
                            <div class="col-sm-6">
                                <input   name="amount"  type="text" class="form-control" id="c_amount"
                                       placeholder="Enter Amount">
                            </div>
                        </div>
                        <div style="display: none" class="form-group">
                            <label for="bank_account" class="control-label col-sm-4">
                                Pin </label>
                            <div class="col-sm-6">
                                <input    type="text" class="form-control" id="pay_pin"
                                       placeholder="Pin">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bank_account" class="control-label col-sm-4">
                                Payment Type </label>
                            <div class="col-sm-6">
                                <select id="channel" name="channel" class="form-control">
                                    <option value="2">IMPS</option>
                                    <option value="1">NEFT</option>
                                </select>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" value="transfer" name="transfer"   class="btn btn-primary">Confirm
                        Transaction
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="gap"></div>
        
      
       
       
       <?php  include('footer.php');?>
	   
         <script src="assets/js/money_transfer.js"></script>

<script>
	function Calculate(name, id, account) {
		
		var mobile =$('#mobile').val();
		
		//alert(mobile);
		
		///alert(id);
		
				//alert(account);

   // var token = $("input[name=_token]").val();
   // var number = $("#number").val();
    //var dataString = 'number=' + number + '&_token=' + token;
	
       //$("#c_sender_id").val(id);
           $("#c_bene_name").val(name);
            $("#c_bene_id").val(id);
            $("#c_bank_account").val(account);
			
			
			$("#mob").val(mobile);
			
						$("#rcp_id").val(id);

			$("#account_rcp").val(account);

			
		//$('#send_money').fadeIn(100);


	}
	
	function Deletebene(id){
		
		var mobile= $('#mobile').val();
		
	var x = confirm("Are you sure you want to delete?");
  if(x==true)



	{	

$.post('money_rcp_delete.php',{"id":id,"mobile":mobile,},
	
	  function(data){
		  
		// alert(data);
		 
		 	document.getElementById('rcp_details').innerHTML=data;

		  
	});
	  
	}  else {
		
		//alert('goalltrip')
		
	}
		
	}
	
	</script>
