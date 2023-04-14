 <?php class hostel   {




    /*****************************************************************************
    *****************************ADD Building*************************************
    *****************************************************************************/

    function addBuilding(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $buildingname = trim($_POST['buildingname']);
            $buildingdetails = trim($_POST['buildingdetails']);
            $RecTimeStamp = Date("Y/m/d H:m:s");
            try {

                $dbservice = $db->query("SELECT * FROM asitfa_building WHERE Building_Name = '$buildingname'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Building is already exist')</script>";
                }
                else{
                    $sql = "INSERT INTO asitfa_building (Building_Name, Building_Details, Rec_Time_Stamp) VALUES (:a,:b,:c)";
                    $q = $db->prepare($sql);
                    $insertservice = $q->execute(array(':a'=>$buildingname,':b'=>$buildingdetails,':c'=>$RecTimeStamp));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Building Inserted Successfully');</script>";
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


    function viewBuilding(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_building");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <tr class="record">
                <td><?php echo $row['Building_Id']; ?></td>
                <td><?php echo $row['Building_Name']; ?></td>
                <td><?php echo $row['Building_Details']; ?></td>
                <td>
                    <button class="btn btn-default btn-sm" data-toggle="modal" title="Edit" data-target="#EditModal-<?php echo $row['Building_Id']; ?>"/><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" title="Delete" data-target="#DeleteModal-<?php echo $row['Building_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                   
                    
                </td>
                <td class="hidden-sm hidden-md hidden-lg"></td>
                <td class="hidden-sm hidden-md hidden-lg"></td>
                <td class="hidden-sm hidden-md hidden-lg"></td>
            </tr>
            <div class="col-lg-12">
                <div class="modal fade" id="EditModal-<?php echo $row['Building_Id']; ?>" tabindex="<?php echo $row['Building_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Building_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Update Building</h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <div class="modal-body">
                                    <input type="hidden" name="buildingid" value="<?php echo $row['Building_Id']; ?>">
                                    <div class="form-group">
                                        <label>Building Name</label>
                                        <input type="text" class="form-control" value = "<?php echo $row['Building_Name']; ?>" name = "buildingname" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Building Details</label>
                                        <textarea id="buildingdetails" class="autosize-transition form-control"  name="buildingdetails"><?php echo $row['Building_Details']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name = "updatebuilding" > Update</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeleteModal-<?php echo $row['Building_Id']; ?>" tabindex="<?php echo $row['Building_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Building_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <input type="hidden" name="id" value="<?php echo $row['Building_Id']; ?>">
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-danger" name = "DeleteBuilding" >Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php   
        }
    }

    // Start Update Gym Services
    function UpdateBuilding()
    {
        if(isset($_POST["updatebuilding"])){
            include('config/dbconnection.php');
            $id = $_POST['buildingid'];
            $buildingname = trim($_POST['buildingname']);
            $buildingdetails = trim($_POST['buildingdetails']);
            
            try {

                
                    $sql = "UPDATE asitfa_building SET Building_Name = :a, Building_Details= :b WHERE Building_Id = '$id'";
                    $q = $db->prepare($sql);
                    $insertservice = $q->execute(array(':a'=>$buildingname,':b'=>$buildingdetails));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Building Updated Successfully');</script>";
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

    //Delete Services
    function DeleteBuilding()
    {
        if(isset($_POST["DeleteBuilding"])){
            include('config/dbconnection.php');
            $id = $_POST['id'];
            try {

                $dbservice = "DELETE FROM asitfa_building WHERE Building_Id = ?";
                $q = $db->prepare($dbservice);
                $response = $q->execute(array($id));  
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

        /*****************************************************************************
    *****************************ADD ROOM*************************************
    *****************************************************************************/

    function addRoom(){
        if(isset($_POST["submit"])){
            include('config/dbconnection.php');
            $building = trim($_POST['building']);
            $roomno = trim($_POST['roomno']);
            $roomtype = trim($_POST['roomtype']);
            $roomcapacity = trim($_POST['roomcapacity']);
            $roomrate = trim($_POST['roomrate']);
            $RecTimeStamp = Date("Y/m/d H:m:s");
            try {

                $dbservice = $db->query("SELECT * FROM asitfa_room WHERE Room_No = '$roomno'");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Room is already exist')</script>";
                }
                else{
                    $sql = "INSERT INTO asitfa_room (Building_Id, Room_No, Room_Type, Room_Capacity, Room_Rate, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e,:f)";
                    $q = $db->prepare($sql);
                    $insertservice = $q->execute(array(':a'=>$building,':b'=>$roomno,':c'=>$roomtype,':d'=>$roomcapacity,':e'=>$roomrate,':f'=>$RecTimeStamp));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Room Inserted Successfully');</script>";
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


    function viewRoom(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_room");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <tr class="record">
                <td><?php echo $row['Room_Id']; ?></td>
                <td><?php echo $row['Room_No']; ?></td>
                <td><?php echo $row['Room_Type']; ?></td>
                <td><?php echo $row['Room_Capacity']; ?></td>
                <td><?php echo $row['Room_Rate']; ?></td>

                <td>
                    <button class="btn btn-default btn-sm" data-toggle="modal" title="Edit" data-target="#EditModal-<?php echo $row['Room_Id']; ?>"/><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" title="Delete" data-target="#DeleteModal-<?php echo $row['Room_Id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                   
                    
                </td>
                <td class="hidden-sm hidden-md hidden-lg"></td>
            </tr>
            <div class="col-lg-12">
                <div class="modal fade" id="EditModal-<?php echo $row['Room_Id']; ?>" tabindex="<?php echo $row['Room_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Room_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Update Room</h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <div class="modal-body">
                                    <input type="hidden" name="roomid" value="<?php echo $row['Room_Id']; ?>">
                                    <div class="form-group">
                                        <label>Room No.</label>
                                        <input type="text" class="form-control" value = "<?php echo $row['Room_No']; ?>" name = "roomno" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Room Type</label>
                                        <textarea id="buildingdetails" class="autosize-transition form-control"  name="roomtype"><?php echo $row['Room_Type']; ?></textarea>
                                    </div>
                                     <div class="form-group">
                                        <label>Room Capacity</label>
                                        <input type="text" class="form-control" value = "<?php echo $row['Room_Capacity']; ?>" name = "roomcapacity" required/>
                                    </div>
                                     <div class="form-group">
                                        <label>Room Rate</label>
                                        <input type="text" class="form-control" value = "<?php echo $row['Room_Rate']; ?>" name = "roomrate" required/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name = "updateroom" > Update</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeleteModal-<?php echo $row['Room_Id']; ?>" tabindex="<?php echo $row['Room_Id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['Room_Id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="H2">Are you sure want to delete this record? </h4>
                            </div>
                            <form role="form" method="post" class="form-horizontal" id="popup-validation">
                                <input type="hidden" name="id" value="<?php echo $row['Room_Id']; ?>">
                                <div class="modal-body">
                                    <button type="submit" class="btn btn-danger" name = "DeleteRoom" >Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php   
        }
    }

    // Start Update Gym Services
    function UpdateRoom()
    {
        if(isset($_POST["updateroom"])){
            include('config/dbconnection.php');
            $id = $_POST['roomid'];
            $roomno = trim($_POST['roomno']);
            $roomtype = trim($_POST['roomtype']);
            $roomcapacity = trim($_POST['roomcapacity']);
            $roomrate = trim($_POST['roomrate']);

            
            try {

                
                    $sql = "UPDATE asitfa_room SET Room_No = :a, Room_Type= :b, Room_Capacity= :c, Room_Rate= :d WHERE Room_Id = '$id'";
                    $q = $db->prepare($sql);
                    $insertservice = $q->execute(array(':a'=>$roomno,':b'=>$roomtype,':c'=>$roomtype,':d'=>$roomtype));
                    if ($insertservice) {
                        echo "<script type= 'text/javascript'>alert('Room Updated Successfully');</script>";
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

    //Delete Services
    function DeleteRoom()
    {
        if(isset($_POST["DeleteRoom"])){
            include('config/dbconnection.php');
            $id = $_POST['id'];
            try {

                $dbservice = "DELETE FROM asitfa_room WHERE Room_Id = ?";
                $q = $db->prepare($dbservice);
                $response = $q->execute(array($id));  
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }


        function ClasswiseStudentHostel($classid){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_student WHERE Class_Id = $classid  ORDER BY Joining_Date  DESC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            
                ?>
                    <tr class="record">
                        <td><?php echo $row['Student_Id']; ?></td>
                        <td><?php echo $row['Redg_No']; ?></td>
                        <td><?php echo $row['Student_Name']; ?></td>
                        <td><?php echo $row['Father_Name']; ?></td>
                        <td><?php echo $row['Mobile_No']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td>
                            <a href="allowRoomStudent.php?studentid=<?php echo $row['Student_Id']; ?>&classid=<?php echo $row['Class_Id']; ?>" title="Edit" class="btn btn-default btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                           
                            <?php
                                }
                                else
                                {
                            ?>
                            
                            <?php
                                } 
                            ?>
                            <!--Make Payment Link-->
                            <?php 
                                if($row['Active'] =='1')
                                { 
                            ?>
                           
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