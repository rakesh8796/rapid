<?php class Student {
    
    /*****************************************************************************
    *****************************ADD STUDENT**********************************
    *****************************************************************************/

    function addStudent(){
    	if(isset($_POST["submit"])){
    		include('config/dbconnection.php');
    		$registrationno = trim($_POST['registrationno']);
            $formno = trim($_POST['formno']);
            $class = trim($_POST['class']);
            $studentname = trim($_POST['studentname']);
            $mothername = trim($_POST['mothername']);
            $fatherame = trim($_POST['fatherame']);
            $dob = trim($_POST['dob']);
            $gender = trim($_POST['gender']);
            $category = trim($_POST['category']);
            $fatherqualification = trim($_POST['fatherqualification']);
            $fatheroccupation = trim($_POST['fatheroccupation']);
            $motherqualification = trim($_POST['motherqualification']);
            $motheroccupation = trim($_POST['motheroccupation']);
            $studentmobile = trim($_POST['studentmobile']);
            $studentemail = trim($_POST['studentemail']);
            $homeaddress = trim($_POST['homeaddress']);
            $siblingname = trim($_POST['siblingname']);
            $siblingclass = trim($_POST['siblingclass']);
            $schoolname = trim($_POST['schoolname']);
            $schooladdress = trim($_POST['schooladdress']);
            $principalname = trim($_POST['principalname']);
            $studyingclass = trim($_POST['studyingclass']);
            $aggregratemark = trim($_POST['aggregratemark']);
            $datejoin = $_POST['joindate'];

            $joindate = date("Y-m-d", strtotime($datejoin));
            $RecTimeStamp = Date("Y/m/d H:m:s");

            $imgFile = trim($_FILES['uploadimage']['name']);
            $tmp_dir = trim($_FILES['uploadimage']['tmp_name']);
            $imgSize = trim($_FILES['uploadimage']['size']);

            if(empty($imgFile)){
               $errMSG = "Please Select Image File.";
              }
              else
              {
               $upload_dir = 'upload/'; // upload directory
             
               $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
              
               // valid image extensions
               $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
              
               // rename uploading image
               $userpic = $imgFile;
                
               // allow valid image file formats
               if(in_array($imgExt, $valid_extensions)){   
                // Check file size '5MB'
                if($imgSize < 5000000)    {
                 move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                 $errMSG = "Sorry, your file is too large.";
                }
               }
               else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
               }
              }

    		try {

    			$dbservice = $db->query("SELECT * FROM asitfa_student WHERE Redg_No = '$registrationno'");
    			$getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
    			if($getservice>0)
	            {
	                echo "<script>alert('Sorry, Regd Number is already exist')</script>";
	            }
	            else{
	    			$sql = "INSERT INTO asitfa_student ( Redg_No, Form_No, Class_Id, Student_Name, Mother_Name, Father_Name,    Dob, Gender_Id, Category_Id, Father_Qualification, Father_Occupation, Mother_Qualification, Mother_Occupation, Mobile_No, Email_Id, Address, Sibling_Name, Sibling_Class, School_Name, School_Address,  Principal_Name, Studying_In_Class, Marks, Joining_Date, Image, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u,:v,:w,:x,:y,:z)";
	    			$aa = $db->prepare($sql);
	    			$insertservice = $aa->execute(array(':a'=>$registrationno,':b'=>$formno,':c'=>$class,':d'=>$studentname,':e'=>$mothername,':f'=>$fatherame,':g'=>$dob,':h'=>$gender,':i'=>$category,':j'=>$fatherqualification,':k'=>$fatheroccupation,':l'=>$motherqualification,':m'=>$motheroccupation,':n'=>$studentmobile,':o'=>$studentemail, ':p'=>$homeaddress, ':q'=>$siblingname, ':r'=>$siblingclass, ':s'=>$schoolname, ':t'=>$schooladdress, ':u'=>$principalname, ':v'=>$studyingclass, ':w'=>$aggregratemark, ':x'=>$joindate, ':y'=>$imgFile, ':z'=>$RecTimeStamp,));
					if ($insertservice) {
						echo "<script type= 'text/javascript'>alert('Student Inserted Successfully');</script>";
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

    function viewStudent(){
    	include('config/dbconnection.php');
    	$result = $db->prepare("SELECT * FROM asitfa_student ORDER BY Joining_Date  DESC");
		$result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $classid = $row['Class_Id'];
            $resultClass = $db->prepare("SELECT Class_Name FROM asitfa_class WHERE Class_Id = $classid");
            $resultClass->execute();
            for($i=0; $rowClass = $resultClass->fetch(); $i++){
                
                ?>
        			<tr class="record">
                        <td><?php echo $row['Redg_No']; ?></td>
                        <td><?php echo $row['Student_Name']; ?></td>
                        <td><?php echo $row['Father_Name']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $rowClass['Class_Name']; ?></td>
                        <td><img src="upload/<?php echo $row['Image']; ?>" class="img-rounded" width="50px" height="50px" /></td>
                        <td>
                            <a href="viewStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="View" class="btn btn-default btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
        					<a href="editStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
        					<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          	<?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i>  </button>    
                            <?php
                                }
                                else
                                {
                            ?>
                            <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i>  </button>
                            <?php
                                } 
                            ?>
                            <!--Make Payment Link-->
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <a href="addFee.php?studentid=<?php echo $row['Student_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </a>    
                            <?php
                                }
                                else
                                {
                            ?>
                            
                            <?php
                                } 
                            ?>
                            <a href="generateIdCard.php?studentid=<?php echo $row['Student_Id']; ?>" title="View" class="btn btn-default btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                      	</td>
        			</tr>
        			<div class="col-lg-12">
                        <div class="modal fade" id="DeleteModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                                    </div>
                                    <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                        <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                        <div class="modal-body">
                                            <button type="submit" class="btn btn-danger" name = "DeleteStudent" >Delete</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="DeactiveModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <?php 
                                            if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to deactivate this Member? </h4>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to Activate this Member? </h4> 
                                        <?php   
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "DeactivateStudent" >Deactivate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "ActivateStudent" >Activate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form> 
                                        <?php   
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
		        <?php
                }
        
		}
	}



    //Class Wise Student

    function ClasswiseStudent($classid){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_student WHERE Class_Id = $classid  ORDER BY Joining_Date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            
                ?>
                    <tr class="record">
                        <td><?php echo $row['Redg_No']; ?></td>
                        <td><?php echo $row['Student_Name']; ?></td>
                        <td><?php echo $row['Father_Name']; ?></td>
                        <td><?php echo $row['Mobile_No']; ?></td>
                        <td>
                            <a href="viewStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="View" class="btn btn-default btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="editStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i>  </button>    
                            <?php
                                }
                                else
                                {
                            ?>
                            <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i>  </button>
                            <?php
                                } 
                            ?>
                            <!--Make Payment Link-->
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <a href="addFee.php?studentid=<?php echo $row['Student_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </a>    
                            <?php
                                }
                                else
                                {
                            ?>
                            
                            <?php
                                } 
                            ?>
                            
                        </td>
                    </tr>
                    <div class="col-lg-12">
                        <div class="modal fade" id="DeleteModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                                    </div>
                                    <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                        <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                        <div class="modal-body">
                                            <button type="submit" class="btn btn-danger" name = "DeleteStudent" >Delete</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="DeactiveModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <?php 
                                            if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to deactivate this Member? </h4>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to Activate this Member? </h4> 
                                        <?php   
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "DeactivateStudent" >Deactivate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "ActivateStudent" >Activate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form> 
                                        <?php   
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
        }
    }


	// Start Update Gym Services
    function UpdateStudent()
    {
    	if(isset($_POST["updatestudent"])){
    		include('config/dbconnection.php');
            $studentid =  trim($_POST['studentid']);
            $registrationno = trim($_POST['registrationno']);
            $formno = trim($_POST['formno']);
            $class = trim($_POST['class']);
            $studentname = trim($_POST['studentname']);
            $mothername = trim($_POST['mothername']);
            $fatherame = trim($_POST['fatherame']);
            $editdob = trim($_POST['dob']);
            $dob = date("Y-m-d", strtotime($editdob));

            $gender = trim($_POST['gender']);
            $category = trim($_POST['category']);
            $fatherqualification = trim($_POST['fatherqualification']);
            $fatheroccupation = trim($_POST['fatheroccupation']);
            $motherqualification = trim($_POST['motherqualification']);
            $motheroccupation = trim($_POST['motheroccupation']);
            $studentmobile = trim($_POST['studentmobile']);
            $studentemail = trim($_POST['studentemail']);
            $homeaddress = trim($_POST['homeaddress']);
            $siblingname = trim($_POST['siblingname']);
            $siblingclass = trim($_POST['siblingclass']);
            $schoolname = trim($_POST['schoolname']);
            $schooladdress = trim($_POST['schooladdress']);
            $principalname = trim($_POST['principalname']);
            $studyingclass = trim($_POST['studyingclass']);
            $aggregratemark = trim($_POST['aggregratemark']);
            $datejoin = $_POST['dob'];
            $joindate = date("Y-m-d", strtotime('$datejoin'));
            $RecTimeStamp = Date("Y/m/d H:m:s");

            // $imgFile = trim($_FILES['uploadimage']['name']);
            // $tmp_dir = trim($_FILES['uploadimage']['tmp_name']);
            // $imgSize = trim($_FILES['uploadimage']['size']);

            // if(empty($imgFile)){
            //    $errMSG = "Please Select Image File.";
            //   }
            //   else
            //   {
            //    $upload_dir = 'upload/'; // upload directory
             
            //    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
              
            //    // valid image extensions
            //    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
              
            //    // rename uploading image
            //    $userpic = $imgFile;
                
            //    // allow valid image file formats
            //    if(in_array($imgExt, $valid_extensions)){   
            //     // Check file size '5MB'
            //     if($imgSize < 5000000)    {
            //      move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            //     }
            //     else{
            //      $errMSG = "Sorry, your file is too large.";
            //     }
            //    }
            //    else{
            //     $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
            //    }
            //   }
            
			try {
                $sql = "UPDATE asitfa_student SET Redg_No = :a, Form_No = :b, Student_Name = :c, Mother_Name = :d, Father_Name = :e, Father_Qualification = :f, Father_Occupation = :g, Mother_Qualification = :h, Mother_Occupation = :i, Class_Id = :j, Dob = :k, Gender_Id = :l, Category_Id = :m, Mobile_No = :n, Email_Id = :o, Address = :p, Sibling_Name = :q, Sibling_Class = :r, School_Name = :s, School_Address = :t, Principal_Name = :u, Studying_In_Class = :v, Marks = :w, Joining_Date = :x WHERE Student_Id = '$studentid'";
	    		$z = $db->prepare($sql);
	    		$insertservice = $z->execute(array(':a'=>$registrationno,':b'=>$formno,':c'=>$studentname,':d'=>$mothername,':e'=>$fatherame,':f'=>$fatherqualification,':g'=>$fatheroccupation,':h'=>$motherqualification,':i'=>$motheroccupation,':j'=>$class,':k'=>$dob,':l'=>$gender,':m'=>$category,':n'=>$studentmobile,':o'=>$studentemail,':p'=>$homeaddress,':q'=>$siblingname,':r'=>$siblingclass,':s'=>$schoolname,':t'=>$schooladdress,':u'=>$principalname,':v'=>$studyingclass,':w'=>$aggregratemark,':x'=>$joindate,));
				if ($insertservice) {
					echo "<script type= 'text/javascript'>alert('Student Record Updated Successfully');</script>";
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


    //Delete Member
    function DeleteStudent()
    {
    	if(isset($_POST["DeleteStudent"])){
    		include('config/dbconnection.php');
            $id = $_POST['id'];
            try {

				$dbmember = "DELETE FROM asitfa_student WHERE Student_Id = ?";
				$q = $db->prepare($dbmember);
				$response = $q->execute(array($id));  
	        }
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
        }
    }
    
    //ACTIVE MEMBER

    function activeStudent(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_student WHERE Active = '1' ORDER BY Joining_Date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $classid = $row['Class_Id'];
            $resultClass = $db->prepare("SELECT Class_Name FROM asitfa_class WHERE Class_Id = $classid");
            $resultClass->execute();
            for($i=0; $rowClass = $resultClass->fetch(); $i++){
                ?>
                    <tr class="record">
                        <td><?php echo $row['Redg_No']; ?></td>
                        <td><?php echo $row['Student_Name']; ?></td>
                        <td><?php echo $row['Father_Name']; ?></td>
                        <td><?php echo $row['Mobile_No']; ?></td>
                        <td><?php echo $rowClass['Class_Name']; ?></td>
                        <td class="hidden"></td>
                        <td>
                            <a href="viewStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="View" class="btn btn-default btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="editStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i>  </button>    
                            <?php
                                }
                                else
                                {
                            ?>
                            <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i>  </button>
                            <?php
                                } 
                            ?>
                            <!--Make Payment Link-->
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <a href="addFeeMember.php?memberid=<?php echo $row['Student_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </a>    
                            <?php
                                }
                                else
                                {
                            ?>
                            
                            <?php
                                } 
                            ?>
                            
                        </td>
                    </tr>
                    <div class="col-lg-12">
                        <div class="modal fade" id="DeleteModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                                    </div>
                                    <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                        <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                        <div class="modal-body">
                                            <button type="submit" class="btn btn-danger" name = "DeleteStudent" >Delete</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="DeactiveModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <?php 
                                            if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to deactivate this Member? </h4>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to Activate this Member? </h4> 
                                        <?php   
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "DeactivateStudent" >Deactivate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "ActivateStudent" >Activate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form> 
                                        <?php   
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
        }
}
    }


    //ACTIVE MEMBER

    function deactiveStudent(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_student WHERE Active = '0' ORDER BY Joining_Date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $classid = $row['Class_Id'];
            $resultClass = $db->prepare("SELECT Class_Name FROM asitfa_class WHERE Class_Id = $classid");
            $resultClass->execute();
            for($i=0; $rowClass = $resultClass->fetch(); $i++)
                ?>
                    <tr class="record">
                        <td><?php echo $row['Redg_No']; ?></td>
                        <td><?php echo $row['Student_Name']; ?></td>
                        <td><?php echo $row['Father_Name']; ?></td>
                        <td><?php echo $row['Mobile_No']; ?></td>
                        <td><?php echo $rowCourse['Class_Name']; ?></td>
                        <td class="hidden"></td>
                        <td>
                            <a href="viewStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="View" class="btn btn-default btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="editStudent.php?studentid=<?php echo $row['Student_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-ban" aria-hidden="true"></i>  </button>    
                            <?php
                                }
                                else
                                {
                            ?>
                            <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Student_Id']; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i>  </button>
                            <?php
                                } 
                            ?>
                            <!--Make Payment Link-->
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                            <a href="addFeeMember.php?memberid=<?php echo $row['Student_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </a>    
                            <?php
                                }
                                else
                                {
                            ?>
                            
                            <?php
                                } 
                            ?>
                            
                        </td>
                    </tr>
                    <div class="col-lg-12">
                        <div class="modal fade" id="DeleteModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                                    </div>
                                    <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                        <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                        <div class="modal-body">
                                            <button type="submit" class="btn btn-danger" name = "DeleteStudent" >Delete</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="DeactiveModal-<?php echo $row['Student_Id']; ?>" tabindex="<?php echo $row['Student_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Student_Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <?php 
                                            if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to deactivate this Member? </h4>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <h4 class="modal-title" id="H2">Are you sure want to Activate this Member? </h4> 
                                        <?php   
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if($row['Active'] == '1')
                                            { 
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "DeactivateStudent" >Deactivate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>    
                                        <?php 
                                            }
                                                else
                                            {
                                        ?>
                                        <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                            <input type="hidden" name="id" value="<?php echo $row['Student_Id']; ?>">
                                            <div class="modal-body">
                                                <button type="submit" class="btn btn-danger" name = "ActivateStudent" >Activate</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form> 
                                        <?php   
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
        }
    }


    // Start Deactivate Member
    function DeactivateStudent()
    {
        if(isset($_POST["DeactivateStudent"])){
            include('config/dbconnection.php');
            $studentid = $_POST['id'];
            
            
            try {
                $sql = "UPDATE asitfa_student SET Active = :a WHERE Student_Id = '$studentid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>0,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Student Deactivated Successfully');</script>";
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

    // Start Activate Member
    function ActivateStudent()
    {
        if(isset($_POST["ActivateStudent"])){
            include('config/dbconnection.php');
            $studentid = $_POST['id'];
            
            
            try {
                $sql = "UPDATE asitfa_student SET Active = :a WHERE Student_Id = '$studentid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>1,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Student Activated Successfully');</script>";
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
    

}