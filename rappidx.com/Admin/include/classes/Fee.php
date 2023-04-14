<?php class Fee {


	/*****************************************************************************
    *****************************ADD Member Fee***********************************
    *****************************************************************************/
    function userName($studentid){
    	include('config/dbconnection.php');
    	$result = $db->prepare("SELECT * FROM asitfa_student WHERE Student_Id = $studentid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            echo $sudentname = $row['Student_Name'];
        }
    }

    function addFee(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $studid = trim($_POST['studid']);
            $coursefee = trim($_POST['coursefee']);
            $approvedfee = trim($_POST['approvedfee']);
            $depositeoption = trim($_POST['depositeoption']);
            $onetimefee = trim($_POST['onetimefee']);
            $monthfee = trim($_POST['monthfee']);

            $sgst = ($monthfee*9)/100;
            $cgst = ($monthfee*9)/100;

            $monthname = $_POST['monthname'];
            $mon=""; 
				foreach($monthname as $mon1) 
				{ 
				$mon.= $mon1.","; 
				} 

            $nextmonthdate = trim($_POST['monthnextdate']);
            $monthnextdate = date("Y-m-d", strtotime($nextmonthdate));

            $feedate1 = trim($_POST['feedate']);
            $feedate = date("Y-m-d", strtotime($feedate1));

            $noofinstallment = trim($_POST['noofinstallment']);
            $installments = trim($_POST['installments']);
            $installmentfeedeposit = trim($_POST['installmentfeedeposit']);

            $installmentnextdate = trim($_POST['nextinstallmentdate']);
            $nextinstallmentdate = date("Y-m-d", strtotime($installmentnextdate));

            $feedepositeoption = trim($_POST['feedepositeoption']);
            $chequeno = trim($_POST['chequeno']);
            $chequedatechange = trim($_POST['chequedate']);
            $chequedate = date("Y-m-d", strtotime($chequedatechange));


            $RecTimeStamp = Date("Y/m/d H:m:s");

            if($onetimefee>$approvedfee || $monthfee>$approvedfee || $installmentfeedeposit>$approvedfee){
            	echo "<script type= 'text/javascript'>alert('You can not add more than approved fee');</script>";
            }
            else{
	            try {
	                $sql = "INSERT INTO asitfa_fee (Student_Id, Course_Fee, Approved_Fee, Fee_Option, One_Time_Fee, Month_Fee, Month_Name, Next_Month_Date, No_Of_Installment, Installment, Installment_Fee, Next_Install_Date, Fee_Deposit_Method, Cheque_No, Cheque_Date, Fee_SGST, Fee_CGST, Fee_Date, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s)";
	                $q = $db->prepare($sql);
	                $insertservice = $q->execute(array(':a'=>$studid,':b'=>$coursefee,':c'=>$approvedfee,':d'=>$depositeoption,':e'=>$onetimefee,':f'=>$monthfee,':g'=>$mon,':h'=>$monthnextdate,':i'=>$noofinstallment,':j'=>$installments,':k'=>$installmentfeedeposit,':l'=>$nextinstallmentdate,':m'=>$feedepositeoption,':n'=>$chequeno,':o'=>$chequedate, ':p'=>$sgst, ':q'=>$cgst, ':r'=>$feedate,':s'=>$RecTimeStamp));
	                $lastid = $db->lastInsertId();
	                if ($insertservice) {
	                    echo "<script type= 'text/javascript'>alert('Student Fee Deposited Successfully');</script>";
	                }
	                else{
	                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
	                }
	                $db = null;
	                
	                header("Refresh: 0; URL=receipt.php?invoice=$lastid");
	            }
	            catch(PDOException $e)
	            {
	                echo $e->getMessage();
	            }
	        }    
        }
    }

    function feeOption($feeoption){
    	include('config/dbconnection.php');
    	$result = $db->prepare("SELECT Fee_Method_Name FROM asitfa_fee_method WHERE Fee_Method_Id = $feeoption");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
        	$feemethodname = $row['Fee_Method_Name'];
        }
    }


    function oneTimeAddFee($studentid){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Student_Id = $studentid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
        	$feeoption = $row['Fee_Option'];
        	$feedeposit = $row['Fee_Deposit_Method'];
            $studentdetail = $db->prepare("SELECT Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
				$resultfeeoption = $db->prepare("SELECT Fee_Method_Name FROM asitfa_fee_method WHERE Fee_Method_Id = $feeoption");
		        $resultfeeoption->execute();
		        for($i=0; $rowfeeoption = $resultfeeoption->fetch(); $i++){
		        	$resultfeemethod = $db->prepare("SELECT Deposit_Method_Name FROM asitfa_deposit_method WHERE Deposit_Method_Id = $feedeposit");
			        $resultfeemethod->execute();
			        for($i=0; $rowfeemethod = $resultfeemethod->fetch(); $i++){
					if ($feeoption == 1) {
	            		?>
	            			
		            	
			            <tr>
			            	<td><?php echo $row['Fee_Id']; ?></td>
			                <td><?php echo $rowstudent['Student_Name']; ?></td>
			                <td><?php echo $row['Course_Fee']; ?></td>
			                <td><?php echo $row['Approved_Fee']; ?></td>
			                <td><?php echo $row['Fee_Date']; ?></td>
			                <td><?php echo $rowfeeoption['Fee_Method_Name']; ?></td>
			                <td><?php echo $row['One_Time_Fee']; ?></td> 
			                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
			                <td><?php echo $rowfeemethod['Deposit_Method_Name']; ?></td>
			                <td>
			                    <a href="receipt.php?invoice=<?php echo $row['Fee_Id']; ?>" title="View" class="btn btn-default btn-sm">
			                        <i class="fa fa-eye" aria-hidden="true"></i>
			                    </a>
			                </td>
			            </tr>
				        
						<?php        
					    } 
					}
		    	} 
        	}
   	 	}
	}

	function monthAddFee($studentid){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Student_Id = $studentid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
        	$feeoption = $row['Fee_Option'];
        	$feedeposit = $row['Fee_Deposit_Method'];
            $studentdetail = $db->prepare("SELECT Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
				$resultfeeoption = $db->prepare("SELECT Fee_Method_Name FROM asitfa_fee_method WHERE Fee_Method_Id = $feeoption");
		        $resultfeeoption->execute();
		        for($i=0; $rowfeeoption = $resultfeeoption->fetch(); $i++){
		        	$resultfeemethod = $db->prepare("SELECT Deposit_Method_Name FROM asitfa_deposit_method WHERE Deposit_Method_Id = $feedeposit");
			        $resultfeemethod->execute();
			        for($i=0; $rowfeemethod = $resultfeemethod->fetch(); $i++){
					if ($feeoption == 2) {
	            		?>
	            			
		            	
			    		<tr>
			                <td><?php echo $row['Fee_Id']; ?></td>
			                <td><?php echo $rowstudent['Student_Name']; ?></td>
			                <td><?php echo $row['Course_Fee']; ?></td>
			                <td><?php echo $row['Approved_Fee']; ?></td>
			                <td><?php echo $row['Fee_Date']; ?></td>
			                <td><?php echo $rowfeeoption['Fee_Method_Name']; ?></td>
			                <td><?php echo $row['Month_Name']; ?></td>
			                <td><?php echo $row['Month_Fee']; ?></td>
			                <td><?php echo $row['Next_Month_Date']; ?></td> 
			                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
			                <td><?php echo $rowfeemethod['Deposit_Method_Name']; ?></td>
			                <td>
			                    <a href="receipt.php?invoice=<?php echo $row['Fee_Id']; ?>" title="View" class="btn btn-default btn-sm">
			                        <i class="fa fa-eye" aria-hidden="true"></i>
			                    </a>
			                </td>
			            </tr>
			        
						<?php        
					    } 
					}
		    	} 
        	}
   	 	}
	}


	function installmentAddFee($studentid){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Student_Id = $studentid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
        	$feeoption = $row['Fee_Option'];
        	$feedeposit = $row['Fee_Deposit_Method'];
            $studentdetail = $db->prepare("SELECT Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
				$resultfeeoption = $db->prepare("SELECT Fee_Method_Name FROM asitfa_fee_method WHERE Fee_Method_Id = $feeoption");
		        $resultfeeoption->execute();
		        for($i=0; $rowfeeoption = $resultfeeoption->fetch(); $i++){
		        	$resultfeemethod = $db->prepare("SELECT Deposit_Method_Name FROM asitfa_deposit_method WHERE Deposit_Method_Id = $feedeposit");
			        $resultfeemethod->execute();
			        for($i=0; $rowfeemethod = $resultfeemethod->fetch(); $i++){
					if ($feeoption == 3) {
	            		?>
	            			
		            	
			    		<tr>
			                <td><?php echo $row['Fee_Id']; ?></td>
			                <td><?php echo $rowstudent['Student_Name']; ?></td>
			                <td><?php echo $row['Course_Fee']; ?></td>
			                <td><?php echo $row['Approved_Fee']; ?></td>
			                <td><?php echo $row['Fee_Date']; ?></td>
			                <td><?php echo $rowfeeoption['Fee_Method_Name']; ?></td>
			                <td><?php echo $row['No_Of_Installment']; ?></td>
			                <td><?php echo $row['Installment']; ?></td>
			                <td><?php echo $row['Installment_Fee']; ?></td>
			                <td><?php echo $row['Next_Install_Date']; ?></td> 
			                <td><?php echo $row['Rec_Time_Stamp']; ?></td>
			                <td><?php echo $rowfeemethod['Deposit_Method_Name']; ?></td>
			                <td>
			                    <a href="receipt.php?invoice=<?php echo $row['Fee_Id']; ?>" title="View" class="btn btn-default btn-sm">
			                        <i class="fa fa-eye" aria-hidden="true"></i>
			                    </a>
			                </td>
			            </tr>
			        </tbody>
						<?php        
					    } 
					}
		    	} 
        	}
   	 	}
	}

    function totalfeePrint($studentid){
    	include('config/dbconnection.php');
    	$result = $db->prepare("SELECT * FROM asitfa_fee WHERE Student_Id = $studentid GROUP BY Student_Id");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
        	$feeoption = $row['Fee_Option'];
        	if ($feeoption == 1) {
        		$resultsum = $db->prepare("SELECT sum(One_Time_Fee) FROM asitfa_fee WHERE Student_Id = $studentid ");
				$resultsum->execute();
				for($i=0; $rowsum = $resultsum->fetch(); $i++){
				?>
				<tr>
					<td><?php echo $row['Approved_Fee']; ?></td>
					<td><?php echo $rowsum['sum(One_Time_Fee)']; ?></td>
					<td><?php echo $row['Approved_Fee'] - $rowsum['sum(One_Time_Fee)']; ?></td>
				</tr>
					
	    		<?php 
	    		}
	    	}
	    	elseif ($feeoption == 2){
	    		$resultmonthsum = $db->prepare("SELECT sum(Month_Fee) FROM asitfa_fee WHERE Student_Id = $studentid");
				$resultmonthsum->execute();
				for($i=0; $rowmonthsum = $resultmonthsum->fetch(); $i++){
				?>
				
				<tr>
					<td><?php echo $row['Approved_Fee']; ?></td>
					<td><?php echo $rowmonthsum['sum(Month_Fee)']; ?></td>
					<td><?php echo $row['Approved_Fee'] - $rowmonthsum['sum(Month_Fee)']; ?></td>
				</tr>
				
	    		<?php 
	    		}
	    	}
	    	else{
	    		$resultinstasum = $db->prepare("SELECT sum(Installment_Fee) FROM asitfa_fee WHERE Student_Id = $studentid");
				$resultinstasum->execute();
				for($i=0; $rowinstasum = $resultinstasum->fetch(); $i++){
				?>
				
				<tr>
					<td><?php echo $row['Approved_Fee']; ?></td>
					<td><?php echo $rowinstasum['sum(Installment_Fee)']; ?></td>
					<td><?php echo $row['Approved_Fee'] - $rowinstasum['sum(Installment_Fee)']; ?></td>
				</tr>
				<?php 
	    		}
	    	}
        }
    }

    // Start Update Gym Services
    function UpdateFeeMember()
    {
        if(isset($_POST["editfee"])){
            include('config/dbconnection.php');
            $invoiceid = $_POST['invoiceid'];
            $subenddate = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['subscripionenddate'])));
            $plan = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['plan'])));
            $amount = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['amount'])));
            $discount = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['discount'])));
            $discountamount = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['discountamount'])));
            $cgst = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['cgst'])));
            $sgst = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['sgst'])));
            $igst = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['igst'])));
            $totalamount = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totalamount'])));
            $status = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['status'])));
            $method = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['method'])));
            
            try {
                $sql = "UPDATE asitg_fee SET Fee_Plan = :a, Fee_Amount = :b, Discount_Amount = :c, After_Discount_Amount = :d, Fee_CGST = :e, Fee_SGST = :f, Fee_IGST = :g, Total_Amount = :h, Fee_Status = :i, Fee_Method = :j Sub_End_Date = :k WHERE fee_id = '$invoiceid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>$plan,':b'=>$amount,':c'=>$discount,':d'=>$discountamount,':e'=>$cgst,':f'=>$sgst,':g'=>$igst,':h'=>$totalamount,':i'=>$status,':j'=>$method, ':k'=>$subenddate));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Fee Updated Successfully');</script>";
                }
                else{
                    echo "<script type= 'text/javascript'>alert('Data not successfully Updated.');</script>";
                }
                $db = null;
                
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    function monthFeeReminder(){
        include('config/dbconnection.php');
        /* Get expired date. */
        $expire_date = date("Y-m-d",strtotime("+30 days"));

        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 2  AND Next_Month_Date <= '".$expire_date."'");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT * FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
                $classid = $rowstudent['Class_Id'];
                $categoryid = $rowstudent['Category_Id'];

                $classdetail = $db->prepare("SELECT * FROM asitfa_class WHERE Class_Id = $classid");
                $classdetail->execute();
                for($i=0; $rowclass = $classdetail->fetch(); $i++){ 

                    $categorydetail = $db->prepare("SELECT * FROM asitfa_category WHERE Category_Id = $categoryid");
                    $categorydetail->execute();
                    for($i=0; $rowcategory = $categorydetail->fetch(); $i++){ 

                       
                        ?>
                        <tr class="record">
                            <td><?php echo $rowstudent['Redg_No']; ?></td>
                            <td><?php echo $rowstudent['Student_Name']; ?></td>
                            <td><?php echo $rowstudent['Father_Name']; ?> (<?php echo $rowstudent['Mobile_No']; ?>)</td>
                            <td><?php echo $rowclass['Class_Name']; ?>-><?php echo $rowcategory['Category_Name']; ?></td>
                            <td>Monthly</td>
                            <td><?php echo $row['Next_Month_Date']; ?></td> 
                            <td>
                                <a href="addFee.php?studentid=<?php echo $row['Student_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </a>    
                            </td>
                        </tr>
            
                        <?php  
                        }
                }
            }
        }
    }

    function installmentFeeReminder(){
        include('config/dbconnection.php');
        /* Get expired date. */
        $expire_date = date("Y-m-d",strtotime("+30 days"));

        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 3  AND Next_Month_Date <= '".$expire_date."'");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT * FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 

                $classid = $rowstudent['Class_Id'];
                $categoryid = $rowstudent['Category_Id'];

                $classdetail = $db->prepare("SELECT * FROM asitfa_class WHERE Class_Id = $classid");
                $classdetail->execute();
                for($i=0; $rowclass = $classdetail->fetch(); $i++){ 

                    $categorydetail = $db->prepare("SELECT * FROM asitfa_category WHERE Category_Id = $categoryid");
                    $categorydetail->execute();
                    for($i=0; $rowcategory = $categorydetail->fetch(); $i++){ 

                        
                        ?>
                        <tr class="record">
                            <td><?php echo $rowstudent['Redg_No']; ?></td>
                            <td><?php echo $rowstudent['Student_Name']; ?></td>
                            <td><?php echo $rowstudent['Father_Name']; ?> (<?php echo $rowstudent['Mobile_No']; ?>)</td>
                            <td><?php echo $rowclass['Class_Name']; ?>-><?php echo $rowcategory['Category_Name']; ?></td>
                            <td>Installment</td>
                            <td><?php echo $row['Next_Install_Date']; ?></td> 
                            <td>
                                <a href="addFee.php?studentid=<?php echo $row['Student_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </a>    
                            </td>
                        </tr>
                        <?php  
                    }
                }
            }
        }
    }

    	/*****************************************************************************
    *****************************ADD Staff Salary***********************************
    *****************************************************************************/
    function staffName($staffid){
    	include('config/dbconnection.php');
    	$result = $db->prepare("SELECT * FROM asitfa_staff WHERE Staff_Id = $staffid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            echo $staffname = $row['Staff_Name'];
        }
    }

    function addSalary(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $staffid = trim($_POST['staffid']);
            $description = trim($_POST['description']);
            $date = trim($_POST['date']);
            $salarydate = date("Y-m-d", strtotime($date));
            $month = trim($_POST['month']);
            $onetimefee = trim($_POST['onetimefee']);
            $besic = trim($_POST['besic']);
            $homerent = trim($_POST['homerent']);

            $conallowance = trim($_POST['conallowance']);

            $medical = trim($_POST['medical']);
            $totalearning = trim($_POST['totalearning']);
            $providentfund = trim($_POST['providentfund']);

            $loan = trim($_POST['loan']);

            $protax = trim($_POST['protax']);
            $totalded = trim($_POST['totalded']);
            $status = trim($_POST['status']);
            $method = trim($_POST['method']);


            $RecTimeStamp = Date("Y/m/d H:m:s");

          
	            try {
	                $sql = "INSERT INTO asitfa_salary (Staff_Id, Description, Salary_Date, Months, Year, Besic_Salary, Home_Rent, 	Convene_Allowance, 	Medical, Total_Earnings, Provident_Fund, Loan, Profession_Tax, Total_Deductions, Status, Method, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q)";
	                $q = $db->prepare($sql);
	                $insertservice = $q->execute(array(':a'=>$staffid,':b'=>$description,':c'=>$salarydate,':d'=>$month,':e'=>$onetimefee,':f'=>$besic,':g'=>$homerent,':h'=>$conallowance,':i'=>$medical,':j'=>$totalearning,':k'=>$providentfund,':l'=>$loan,':m'=>$protax,':n'=>$totalded,':o'=>$status,':p'=>$method,':q'=>$RecTimeStamp));
	                $lastid = $db->lastInsertId();
	                if ($insertservice) {
	                    echo "<script type= 'text/javascript'>alert('Staff Salary add Successfully');</script>";
	                }
	                else{
	                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
	                }
	                $db = null;
	                
	                header("Refresh: 0; URL=receipt.php?invoice=$lastid");
	            }
	            catch(PDOException $e)
	            {
	                echo $e->getMessage();
	            }
	          
        }
    }




    function oneTimeAddSalary($staffid){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_salary WHERE Staff_Id = $staffid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
        
            $staffdetail = $db->prepare("SELECT Staff_Name FROM asitfa_staff WHERE Staff_Id = $staffid");
            $staffdetail->execute();
            for($i=0; $rowstaff = $staffdetail->fetch(); $i++){ 
				
	            		?>
	            			
		            	
			            <tr>
			            	<td><?php echo $row['Salary_Id']; ?></td>
			                <td><?php echo $rowstaff['Staff_Name']; ?></td>
			                <td><?php echo $row['Besic_Salary']; ?></td>
			                <td><?php echo $row['Home_Rent']; ?></td>
			                <td><?php echo $row['Convene_Allowance']; ?></td>
			                <td><?php echo $row['Total_Earnings']; ?></td> 
			                <td><?php echo $row['Status']; ?></td>
			                <td><?php echo $row['Method']; ?></td>
			                <td>
			                    <a href="salaryreceipt.php?invoice=<?php echo $row['Salary_Id']; ?>" title="View" class="btn btn-default btn-sm">
			                        <i class="fa fa-eye" aria-hidden="true"></i>
			                    </a>
			                </td>
			            </tr>
				        
						<?php        
					    
        	}
   	 	}
	}

function sms($message,$mob)
    {
        $api_key = '45B7BE5EBB8037';	
		$from = 'ALTEST';
		$contacts = $mob;
		$sms_text = urlencode($message);

		$api_url = "http://sms.ashrishait.com/app/smsapi/index.php?key=".$api_key."&campaign=4074&routeid=100233&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;

        //Submit to server

        $response = file_get_contents( $api_url);
        echo $response;
    }


}