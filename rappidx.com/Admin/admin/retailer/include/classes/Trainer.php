<?php class Trainer  extends MySqlDriver {
    function __construct(){
        $obj = new MySqlDriver;
    }


    /*****************************************************************************
    *****************************ADD GYM SERVICE**********************************
    *****************************************************************************/

    function addTrainer(){
    	if(isset($_POST["submit"])){
    		include('config/dbconnection.php');
    		$trainercreateid = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['trainercreateid'])));
            $trainername = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['name'])));
            $fathername = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['fathername'])));
            $dateofbirth = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['dateofbirth'])));
            $traineremail = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['email'])));
            $trainercontact = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['contact'])));
            $traineraddress = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['address'])));
            $traineradhar = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['adhar'])));
            $trainerqualification = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['qualification'])));
            $trainerachievement = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['achievement'])));
            $trainerjoindate = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['joindate'])));
            $RecTimeStamp = Date("Y/m/d H:m:s");
    		try {

    			$dbservice = $db->query("SELECT * FROM asitg_trainer WHERE Trainer_Contact = '$trainercontact' OR Trainer_Create_Id = '$trainercreateid'");
    			$getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
    			if($getservice>0)
	            {
	                echo "<script>alert('Sorry, Trainer Contact Or Trainer ID is already exist')</script>";
	            }
	            else{
	    			$sql = "INSERT INTO asitg_trainer (Trainer_Create_Id, Trainer_Name, Trainer_Father, Trainer_DOB, Trainer_Email, Trainer_Contact, Trainer_Address, Trainer_Adhar, Trainer_Qualification, Trainer_Achievement, Trainer_Join_date, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l)";
	    			$q = $db->prepare($sql);
	    			$insertservice = $q->execute(array(':a'=>$trainercreateid,':b'=>$trainername,':c'=>$fathername,':d'=>$dateofbirth,':e'=>$traineremail,':f'=>$trainercontact,':g'=>$traineraddress,':h'=>$traineradhar,':i'=>$trainerqualification,':j'=>$trainerachievement,':k'=>$trainerjoindate,':l'=>$RecTimeStamp,));
					if ($insertservice) {
						echo "<script type= 'text/javascript'>alert('New Trainer Inserted Successfully');</script>";
					}
					else{
						echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
					}
					$db = null;
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
    	}
    }

    //FETCH SERVICES FROM DATABASE

    function viewTrainer(){
    	include('config/dbconnection.php');
    	$result = $db->prepare("SELECT * FROM asitg_trainer ORDER BY Trainer_Join_date DESC");
		$result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
			<tr class="record">
                <td><?php echo $row['Trainer_Create_Id']; ?></td>
                <td><?php echo $row['Trainer_Name']; ?></td>
                <td><?php echo $row['Trainer_Contact']; ?></td>
                <td><?php echo $row['Trainer_Adhar']; ?></td> 
                <td><?php echo $row['Trainer_Join_date']; ?></td>
                <td>
                    <a href="viewTrainer.php?trainerid=<?php echo $row['Trainer_Id']; ?>" title="View" class="btn btn-default btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
					<a href="editTrainer.php?trainerid=<?php echo $row['Trainer_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
					<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-trash-alt"></i></button>
                  	<?php 
                        if($row['Active'] =='1')
                        { 
                    ?>
                    <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-ban"></i>  </button>    
                    <?php
                        }
                        else
                        {
                    ?>
                    <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-check-circle"></i>  </button>
                    <?php
                        } 
                    ?>
                    <!--Make Payment Link-->
                    <?php 
                        if($row['Active'] =='1')
                        { 
                    ?>
                    <a href="makePayTrainer.php?trainerid=<?php echo $row['Trainer_Id']; ?>"  title="Make Payment" class="btn btn-danger btn-sm">
                        <i class="far fa-money-bill-alt"></i>
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
                <div class="modal fade" id="DeleteModal-<?php echo $row['Trainer_Id']; ?>" tabindex="<?php echo $row['Trainer_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Trainer_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-danger" name ="DeleteTrainer" >Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeactiveModal-<?php echo $row['Member_Id']; ?>" tabindex="<?php echo $row['Member_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Member_Id']; ?>" aria-hidden="true">
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
                                    <input type="hidden" name="id" value="<?php echo $row['Member_Id']; ?>">
                                    <div class="modal-body">
                                        <button type="submit" class="btn btn-danger" name = "DeactivateTrainer" >Deactivate</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>    
                                <?php 
                                    }
                                        else
                                    {
                                ?>
                                <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                    <input type="hidden" name="id" value="<?php echo $row['Member_Id']; ?>">
                                    <div class="modal-body">
                                        <button type="submit" class="btn btn-danger" name = "ActivateTrainer" >Activate</button>
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
    function UpdateTrainer()
    {
    	if(isset($_POST["updatetrainer"])){
    		include('config/dbconnection.php');
	        $trainerid = $_POST['trainerid'];
            // $membercreateid = strip_tags(mysql_real_escape_string(trim($_POST['membercreateid'])));
	        $trainername = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['name'])));
            $fathername = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['fathername'])));
            $dateofbirth = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['dateofbirth'])));
            $email = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['email'])));
            $contact = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['contact'])));
            $address = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['address'])));
            $adhar = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['adhar'])));
            $qualification = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['qualification'])));
            $achievement = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['achievement'])));
            $joindate = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['joindate'])));
            
            try {
                $sql = "UPDATE asitg_trainer SET Trainer_Name = :a, Trainer_Father = :b, Trainer_DOB = :c, Trainer_Email = :d, Trainer_Contact = :e, Trainer_Address = :f, Trainer_Adhar = :g, Trainer_Qualification = :h, Trainer_Achievement = :i, Trainer_Join_date = :j WHERE Trainer_Id = '$trainerid'";
	    		$q = $db->prepare($sql);
	    		$insertservice = $q->execute(array(':a'=>$trainername,':b'=>$fathername,':c'=>$dateofbirth,':d'=>$email,':e'=>$contact,':f'=>$address,':g'=>$adhar,':h'=>$qualification,':i'=>$achievement,':j'=>$joindate,));
				if ($insertservice) {
					echo "<script type= 'text/javascript'>alert('Record Updated Successfully');</script>";
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
    function DeleteTrainer()
    {
    	if(isset($_POST["DeleteTrainer"])){
    		include('config/dbconnection.php');
            $id = $_POST['id'];
            try {

				$dbmember = "DELETE FROM asitg_trainer WHERE Trainer_Id = ?";
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

    function activeTrainer(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitg_trainer WHERE Active = '1' ORDER BY Trainer_Join_date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <tr class="record">
                <td><?php echo $row['Trainer_Create_Id']; ?></td>
                <td><?php echo $row['Trainer_Name']; ?></td>
                <td><?php echo $row['Trainer_Contact']; ?></td>
                <td><?php echo $row['Trainer_Adhar']; ?></td> 
                <td><?php echo $row['Trainer_Join_date']; ?></td>
                <td>
                    <a href="viewTrainer.php?trainerid=<?php echo $row['Trainer_Id']; ?>" title="View" class="btn btn-default btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="editMember.php?memberid=<?php echo $row['Trainer_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-trash-alt"></i></button>
                    <?php 
                        if($row['Active'] =='1')
                        { 
                    ?>
                    <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-ban"></i>  </button>    
                    <?php
                        }
                        else
                        {
                    ?>
                    <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-check-circle"></i>  </button>
                    <?php
                        } 
                    ?>
                    <!--Make Payment Link-->
                    <?php 
                        if($row['Active'] =='1')
                        { 
                    ?>
                    <a href="#"  title="Make Payment" class="btn btn-danger btn-sm">
                        <i class="far fa-money-bill-alt"></i>
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
                <div class="modal fade" id="DeleteModal-<?php echo $row['Trainer_Id']; ?>" tabindex="<?php echo $row['Trainer_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Trainer_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Are u sure want to delete this record? </h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-danger" name = "DeleteTrainer" >Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeactiveModal-<?php echo $row['Trainer_Id']; ?>" tabindex="<?php echo $row['Trainer_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Trainer_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <?php 
                                    if($row['Active'] == '1')
                                    { 
                                ?>
                                <h4 class="modal-title" id="H2">Are you sure want to deactivate this Trainer? </h4>    
                                <?php 
                                    }
                                        else
                                    {
                                ?>
                                <h4 class="modal-title" id="H2">Are you sure want to Activate this Trainer? </h4> 
                                <?php   
                                    }
                                ?>
                            </div>
                            <?php 
                                if($row['Active'] == '1')
                                    { 
                                ?>
                                <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                    <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                    <div class="modal-body">
                                        <button type="submit" class="btn btn-danger" name = "DeactivateTrainer" >Deactivate</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>    
                                <?php 
                                    }
                                        else
                                    {
                                ?>
                                <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                    <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                    <div class="modal-body">
                                        <button type="submit" class="btn btn-danger" name = "ActivateTrainer" >Activate</button>
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


    //ACTIVE MEMBER

    function deactiveTrainer(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitg_trainer WHERE Active = '0' ORDER BY Trainer_Join_date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <tr class="record">
                <td><?php echo $row['Trainer_Create_Id']; ?></td>
                <td><?php echo $row['Trainer_Name']; ?></td>
                <td><?php echo $row['Trainer_Contact']; ?></td>
                <td><?php echo $row['Trainer_Adhar']; ?></td> 
                <td><?php echo $row['Trainer_Join_date']; ?></td>
                <td>
                    <a href="viewMember.php?memberid=<?php echo $row['Trainer_Id']; ?>" title="View" class="btn btn-default btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="editMember.php?memberid=<?php echo $row['Trainer_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-trash-alt"></i></button>
                    <?php 
                        if($row['Active'] =='1')
                        { 
                    ?>
                    <button class="btn btn-danger btn-sm" data-placement="top" title="Deactivate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-ban"></i>  </button>    
                    <?php
                        }
                        else
                        {
                    ?>
                    <button class="btn btn-success btn-sm" data-placement="top" title="Activate" data-toggle="modal"  data-target="#DeactiveModal-<?php echo $row['Trainer_Id']; ?>"><i class="fas fa-check-circle"></i>  </button>
                    <?php
                        } 
                    ?>
                    <!--Make Payment Link-->
                    <?php 
                        if($row['Active'] =='1')
                        { 
                    ?>
                    <a href="#"  title="Make Payment" class="btn btn-danger btn-sm">
                        <i class="far fa-money-bill-alt"></i>
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
                <div class="modal fade" id="DeleteModal-<?php echo $row['Trainer_Id']; ?>" tabindex="<?php echo $row['Trainer_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Trainer_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Are u sure want to delete this record? </h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-danger" name = "DeleteMember" >Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeactiveModal-<?php echo $row['Trainer_Id']; ?>" tabindex="<?php echo $row['Trainer_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Trainer_Id']; ?>" aria-hidden="true">
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
                                    <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                    <div class="modal-body">
                                        <button type="submit" class="btn btn-danger" name = "DeactivateTrainer" >Deactivate</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>    
                                <?php 
                                    }
                                        else
                                    {
                                ?>
                                <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                    <input type="hidden" name="id" value="<?php echo $row['Trainer_Id']; ?>">
                                    <div class="modal-body">
                                        <button type="submit" class="btn btn-danger" name = "ActivateTrainer" >Activate</button>
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
    function DeactivateTrainer()
    {
        if(isset($_POST["DeactivateTrainer"])){
            include('config/dbconnection.php');
            $trainerid = $_POST['id'];
            
            
            try {
                $sql = "UPDATE asitg_trainer SET Active = :a WHERE Trainer_Id = '$trainerid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>0,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Trainer Deactivated Successfully');</script>";
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

    // Start Deactivate Member
    function ActivateTrainer()
    {
        if(isset($_POST["ActivateTrainer"])){
            include('config/dbconnection.php');
            $trainerid = $_POST['id'];
            
            
            try {
                $sql = "UPDATE asitg_trainer SET Active = :a WHERE Trainer_Id = '$trainerid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>1,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Trainer Activated Successfully');</script>";
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
    

    function makeTrainerPay(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $trainerid = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['trainerid'])));
            $trainercreateid = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['trainercreateid'])));
            $title = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['title'])));
            $description = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['description'])));
            $paydate = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['paydate'])));
            $paymonths = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['paymonths'])));
            $payyear = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['payyear'])));
            $basicda = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['basicda'])));
            $hra = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['hra'])));
            $conveyance = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['conveyance'])));
            $medical = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['medical'])));
            $totalearnings = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totalearnings'])));
            $providentfund = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['providentfund'])));
            $loan = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['loan'])));
            $profesiontax = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['profesiontax'])));
            $totaldeduction = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totaldeduction'])));
            $totalamount = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totalamount'])));
            $status = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['status'])));
            $method = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['method'])));
            $RecTimeStamp = Date("Y/m/d H:m:s");
            try {
                $sql = "INSERT INTO asitg_trainer_payments (Trainer_Id, Trainer_Create_Id, Title, Description, Pay_Date, Pay_Months, Payment_Year, Basic_Da, Home_Rent_Allowance, Conveyance_Allowance, Medical, Total_Earnings, Provident_Fund, Trainer_Loan, Profession_Tax, Total_Deductions, Total_Payments, Payments_Status, Payments_Method, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t)";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>$trainerid,':b'=>$trainercreateid,':c'=>$title,':d'=>$description,':e'=>$paydate,':f'=>$paymonths,':g'=>$payyear,':h'=>$basicda,':i'=>$hra,':j'=>$conveyance,':k'=>$medical,':l'=>$totalearnings,':m'=>$providentfund,':n'=>$loan,':o'=>$profesiontax,':p'=>$totaldeduction,':q'=>$totalamount,':r'=>$status,':s'=>$method,':t'=>$RecTimeStamp,));
                $lastid = $db->lastInsertId();
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Trainer Payments Inserted Successfully');</script>";
                }
                else{
                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                }
                $db = null;
                
                header("Refresh: 0; URL=receiptTrainer.php?invoice=$lastid");
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
    

    function trainerPaymentsList(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitg_trainer_payments ORDER BY Pay_Date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $tranerid = $row['Trainer_Id'];
            $memberdetail = $db->prepare("SELECT Trainer_Name FROM asitg_trainer WHERE Trainer_Id = $tranerid");
            $memberdetail->execute();
            for($i=0; $rowmember = $memberdetail->fetch(); $i++){ 
            ?>
            <tr class="record">
                <td>AKHSAL<?php echo $row['Trainer_Pay_Id']; ?></td>
                <td><?php echo $row['Trainer_Create_Id']; ?></td>
                <td><?php echo $rowmember['Trainer_Name']; ?></td>
                <td><?php echo $row['Title']; ?></td>
                <td><?php echo $row['Pay_Date']; ?></td>
                <td><?php echo $row['Pay_Months']; ?></td>
                <td><?php echo $row['Payment_Year']; ?></td>
                <td><?php echo $row['Total_Payments']; ?></td> 
                <td>
                    <?php if($row['Payments_Status']==1){
                        echo "Paid";
                    } 
                    else{
                        echo "Unpaid";
                    }?>
                </td>
                <td>
                    <a href="receiptTrainer.php?invoice=<?php echo $row['Trainer_Pay_Id']; ?>" title="View" class="btn btn-default btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="editPayTrainer.php?invoiceid=<?php echo $row['Trainer_Pay_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    
                    <a href="makePayTrainer.php?trainerid=<?php echo $row['Trainer_Id']; ?>"  title="Add Fee" class="btn btn-danger btn-sm">
                        <i class="far fa-money-bill-alt"></i>
                    </a>    
                </td>
            </tr>
            
            <?php  
            } 
        }
    }

    function updateTrainerPay(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $trainerpayid = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['trainerpayid'])));
            $paymonths = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['paymonths'])));
            $payyear = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['payyear'])));
            $basicda = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['basicda'])));
            $hra = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['hra'])));
            $conveyance = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['conveyance'])));
            $medical = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['medical'])));
            $totalearnings = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totalearnings'])));
            $providentfund = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['providentfund'])));
            $loan = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['loan'])));
            $profesiontax = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['profesiontax'])));
            $totaldeduction = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totaldeduction'])));
            $totalamount = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['totalamount'])));
            $status = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['status'])));
            $method = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($_POST['method'])));
            try {
                $sql = "UPDATE asitg_trainer_payments SET Pay_Months = :a, Payment_Year = :b, Basic_Da = :c, Home_Rent_Allowance = :d, Conveyance_Allowance = :e, Medical = :f, Total_Earnings = :g, Provident_Fund = :h, Trainer_Loan = :i, Profession_Tax = :j, Total_Deductions = :k,    Total_Payments = :l, Payments_Status = :m, Payments_Method = :n WHERE Trainer_Pay_Id = '$trainerpayid'";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>$paymonths,':b'=>$payyear,':c'=>$basicda,':d'=>$hra,':e'=>$conveyance,':f'=>$medical,':g'=>$totalearnings,':h'=>$providentfund,':i'=>$loan,':j'=>$profesiontax,':k'=>$totaldeduction,':l'=>$totalamount,':m'=>$status,':n'=>$method,));
                if ($insertservice) {
                    echo "<script type= 'text/javascript'>alert('Trainer Payments Inserted Successfully');</script>";
                }
                else{
                    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                }
                $db = null;
                
                header("Refresh: 0; URL=receiptTrainer.php?invoice=$trainerpayid");
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

}