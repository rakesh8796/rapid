  <?php class Certificates {



    function addCertificates(){
    	if(isset($_POST["submit"])){
    		include('config/dbconnection.php');
            $certificateid =  trim($_POST['certificateid']);
            $studentid =  trim($_POST['studentid']);
    		$registrationno = trim($_POST['registrationno']);
            $class = trim($_POST['class']);
            $branch = trim($_POST['branch']);
            $studentname = trim($_POST['studentname']);
            $mothername = trim($_POST['mothername']);
            $fatherame = trim($_POST['fatherame']);
            $dob1 = trim($_POST['dob']);
            $dob = date("Y-m-d", strtotime($dob1));
            $gender = trim($_POST['gender']);
            $category = trim($_POST['category']);
            $studentmobile = trim($_POST['studentmobile']);
            $studentemail = trim($_POST['studentemail']);
            $mark = trim($_POST['mark']);
            $devision = trim($_POST['devision']);
            $character = trim($_POST['character']);
            $astartyear = trim($_POST['astartyear']);
            $RecTimeStamp = Date("Y/m/d H:m:s");

           
              
    		try {
                include('config/dbconnection.php');
    			$dbservice = $db->query("SELECT * FROM asitfa_studentcert WHERE Redg_No = '$registrationno' AND Certificates_Id = '$certificateid'");
    			$getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
    			if($getservice>0)
	            {
	                echo "<script>alert('Sorry, Regd Number is already exist')</script>";
	            }
	            else{
	    			$sql = "INSERT INTO asitfa_studentcert (Certificates_Id, Student_Id, Redg_No, Class_Id, Branch_Id, Student_Name, Mother_Name, Father_Name, Dob, Gender_Id, Category_Id,  Mobile_No, Email_Id,  Marks, Devision, Charecter, Academic_Id, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r)";
	    			$aa = $db->prepare($sql);
	    			$insertservice = $aa->execute(array(':a'=>$certificateid, ':b'=>$studentid, ':c'=>$registrationno, ':d'=>$class,':e'=>$branch,':f'=>$studentname,':g'=>$mothername,':h'=>$fatherame,':i'=>$dob,':j'=>$gender,':k'=>$category,':l'=>$studentmobile,':m'=>$studentemail,':n'=>$mark,':o'=>$devision, ':p'=>$character, ':q'=>$astartyear, ':r'=>$RecTimeStamp,));
                    $lastid = $db->lastInsertId();
					if ($insertservice) {
						echo "<script type= 'text/javascript'>alert('Certificates Inserted Successfully');</script>";
					}
					else{
						echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
					}


					$db = null;
                     header("Refresh: 0; URL=printCertificates.php?certificateprint=$lastid");
				}
			}
			catch(PDOException $ee)
			{
				echo $ee->getMessage();
			}
    	}
    }



        function addFeeNotice(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $studentid =  trim($_POST['studentid']);
            $registrationno = trim($_POST['registrationno']);
            $class = trim($_POST['class']);
            $astartyear = trim($_POST['astartyear']);
            $studentname = trim($_POST['studentname']);
            $mothername = trim($_POST['mothername']);
            $fatherame = trim($_POST['fatherame']);
            $dob1 = trim($_POST['dob']);
            $dob = date("Y-m-d", strtotime($dob1));
            $gender = trim($_POST['gender']);
            $category = trim($_POST['category']);
            $studentmobile = trim($_POST['studentmobile']);
            $studentemail = trim($_POST['studentemail']);
            $notice = trim($_POST['notice']);
            $fee = trim($_POST['fee']);
             $RecTimeStamp = Date("Y/m/d H:m:s");

           
              
            try {
                include('config/dbconnection.php');
                $dbservice = $db->query("SELECT * FROM asitfa_feenotice WHERE Redg_No = '$registrationno'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Regd Number is already exist')</script>";
                }
                else{
                    $sql = "INSERT INTO asitfa_feenotice (Student_Id, Redg_No, Class_Id, Academic_Id, Student_Name, Mother_Name, Father_Name, Dob, Gender_Id, Category_Id,  Mobile_No, Email_Id,  Notice_No, Fee, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o)";
                    $aa = $db->prepare($sql);
                    $insertservice = $aa->execute(array(':a'=>$studentid, ':b'=>$registrationno, ':c'=>$class,':d'=>$astartyear,':e'=>$studentname,':f'=>$mothername,':g'=>$fatherame,':h'=>$dob,':i'=>$gender,':j'=>$category,':k'=>$studentmobile,':l'=>$studentemail,':m'=>$notice,':n'=>$fee, ':o'=>$RecTimeStamp,));
                    $lastid = $db->lastInsertId();
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Fee Notice Inserted Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }


                    $db = null;
                     header("Refresh: 0; URL=printCertificates.php?certificateprint=$lastid");
                }
            }
            catch(PDOException $ee)
            {
                echo $ee->getMessage();
            }
        }
    }


        function allotRoom(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $studentid =  trim($_POST['studentid']);
            $registrationno = trim($_POST['registrationno']);
            $class = trim($_POST['class']);
            $astartyear = trim($_POST['astartyear']);
            $studentname = trim($_POST['studentname']);
            $mothername = trim($_POST['mothername']);
            $fatherame = trim($_POST['fatherame']);
            $dob1 = trim($_POST['dob']);
            $dob = date("Y-m-d", strtotime($dob1));
            $gender = trim($_POST['gender']);
            $category = trim($_POST['category']);
            $studentmobile = trim($_POST['studentmobile']);
            $studentemail = trim($_POST['studentemail']);
            $room = trim($_POST['room']);
            $building = trim($_POST['building']);
             $RecTimeStamp = Date("Y/m/d H:m:s");

           
              
            try {
                include('config/dbconnection.php');
                $dbservice = $db->query("SELECT * FROM asitfa_alowroom WHERE Student_Id = '$studentid'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, This Student is already Room Alloted')</script>";
                }
                else{
                    $sql = "INSERT INTO asitfa_alowroom (Student_Id, Redg_No, Class_Id, Academic_Id, Student_Name, Mother_Name, Father_Name, Dob, Gender_Id, Category_Id,  Mobile_No, Email_Id,  Building_Id, Room_Id, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o)";
                    $aa = $db->prepare($sql);
                    $insertservice = $aa->execute(array(':a'=>$studentid, ':b'=>$registrationno, ':c'=>$class,':d'=>$astartyear,':e'=>$studentname,':f'=>$mothername,':g'=>$fatherame,':h'=>$dob,':i'=>$gender,':j'=>$category,':k'=>$studentmobile,':l'=>$studentemail,':m'=>$building,':n'=>$room, ':o'=>$RecTimeStamp,));
                    $lastid = $db->lastInsertId();
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Room Alloted Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }


                    $db = null;
                }
            }
            catch(PDOException $ee)
            {
                echo $ee->getMessage();
            }
        }
    }






    //FETCH SERVICES FROM DATABASE




            function addStaffCertificates(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $certificateid =  trim($_POST['certificateid']);
            $staffid =  trim($_POST['staffid']);
            $staffname = trim($_POST['staffname']);
            $gender = trim($_POST['gender']);
            $fathername = trim($_POST['fathername']);
            $departmentid = trim($_POST['department']);
            $post = trim($_POST['post']);
            $subject = trim($_POST['subject']);
            $besicsalary = trim($_POST['besicsalary']);
            $joiningdate = trim($_POST['joiningdate']);
            $datejoin = date("Y-m-d", strtotime($joiningdate));
            $address = trim($_POST['address']);
            $email = trim($_POST['email']);
             $RecTimeStamp = Date("Y/m/d H:m:s");

           
              
            try {
                include('config/dbconnection.php');
                $dbservice = $db->query("SELECT * FROM asitfa_addstaffcertificate WHERE Certificate_Id = '$certificateid'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Certificate is already exist')</script>";
                }
                else{
                    $sql = "INSERT INTO asitfa_addstaffcertificate (Certificate_Id, Staff_Id, Staff_Name, Gender, Father_Name, Department, Post, Subject_Id, Basic_Salary, Joining_Date, Address, Email,  Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m)";
                    $aa = $db->prepare($sql);
                    $insertservice = $aa->execute(array(':a'=>$certificateid, ':b'=>$staffid, ':c'=>$staffname, ':d'=>$gender, ':e'=>$fathername,':f'=>$departmentid,':g'=>$post,':h'=>$subject,':i'=>$besicsalary, ':j'=>$datejoin, ':k'=>$address,':l'=>$email,':m'=>$RecTimeStamp,));
                    $lastid = $db->lastInsertId();
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Certificates Inserted Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }


                    $db = null;
                     header("Refresh: 0; URL=printStaffCertificates.php?certificateprint=$lastid");
                }
            }
            catch(PDOException $ee)
            {
                echo $ee->getMessage();
            }
        }
    }
}
    