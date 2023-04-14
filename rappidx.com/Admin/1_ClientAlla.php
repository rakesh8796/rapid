<?php
    include "Layout_Header_Table.php";
?>


<!-- Status Switch Code -->
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!-- Status Switch Code -->





    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- <h1>All Client List</h1> -->
            <!-- <ol class="breadcrumb">
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#"> All Client</a>
                </li>
                <li class="active">
                    All Client List
                </li>
            </ol> -->
        </section>
        <!--section ends-->






        <section class="content">
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel filterable">


<div class="panel-body">

<!-- Excel File -->
<!-- <div class="col-md-3 col-sm-3">
    <a href="Client_All_Excel.php" class="btn btn-info btn-block">Download</a>
</div> -->
<!-- Excel File -->


    <table id="myTable" class="table table-striped">
        <thead>
        <tr>
            <th data-field="Parent id" data-sortable="true">Parent ID</th>
            <th data-field="User id" data-sortable="true">User ID</th>
            <th data-field="Email" data-sortable="true">User Email</th>
            <th data-field="Join Date" data-sortable="true">Join Date</th>
            <th data-field="Company Name" data-sortable="true">Company Name</th>
            <th data-field="Mobile Number" data-sortable="true">Mobile Number</th>
            <th data-field="Status" data-sortable="true">Status</th>
            <th data-field="Added By" data-sortable="true">Added By</th>
            <th data-field="Action" data-sortable="true" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
<!--  -->
<?php
$tdate = date("Y-m-d");
// $user_id = 4;
$allclientquery = "SELECT * FROM `asitfa_user` WHERE `usertype`='client' ORDER BY `User_Id` DESC";
$allclientqueryr=mysqli_query($conn,$allclientquery);
while($row = mysqli_fetch_assoc($allclientqueryr))
{

$permisionid = $row['User_Id'];
$permissions = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$permisionid'";
$permissionsr=mysqli_query($conn,$permissions);
$pres = mysqli_fetch_assoc($permissionsr);


?>
<tr class="record">
    <td><?php echo $row['useruinqueparentid']; ?>(<?php echo $row['commercialstype']; ?>)</td>
    <td><?php echo $row['useruinqueidno']; ?>(<?php echo $row['User_Id']; ?>)
        <u><a href="#" data-toggle="modal" data-target="#myModal<?php echo $row['User_Id']; ?>"><b>Couriers</b></a></u>
    </td>
    <td><?php echo $row['User_Email']; ?></td>
    <td><?php echo $row['Rec_Time_Stamp']; ?></td>
    <td><?php echo $row['Company_Name']; ?></td>
    <td><?php echo $row['Reg_Mobile']; ?></td>
    <td>
        <?php
            $useridisa = $row['User_Id'];
            if($row['Active'])
            {
        ?>
            <!-- <div class="form-check form-switch">
                <input class="form-check-input" onclick="docstatus('{{ $param->uniqueid }}')" type="checkbox" checked="">
            </div> -->
            <label class="switch">
              <input type="checkbox" onclick="docstatus('<?= $useridisa ?>')" checked>
              <span class="slider round"></span>
            </label>
        <?php
            }else
            {
        ?>
            <!-- <div class="form-check form-switch">
                <input class="form-check-input" onclick="docstatus('{{ $param->uniqueid }}')" type="checkbox">
            </div> -->
            <label class="switch">
              <input type="checkbox" onclick="docstatus('<?= $useridisa ?>')">
              <span class="slider round"></span>
            </label>

        <?php
            }
        ?>
<script type="text/javascript">
function docstatus(valis){
    // alert(valis);
    $.ajax({
        type: "GET",
        url: "StatusActiveCode/StatusChange.php",
        data:{clientidisause:valis},
        success: function (data){
            // location.reload();
            // alert(data);
            // $("#Select_Desingnation").html(data);
        },
        error: function (data) {
            // location.reload();
            // alert(data);
            // console.log('Error:', data);
        }
    });
}
</script>
    </td>
    <td><?php echo $row['added_by']; ?></td>
    <td>
        <?php
        if(empty($row['User_Email'])){
        ?>
            <a href="Client_Edita_Commerical.php?email=<?= $row['Company_Name'] ?>&id=<?= $row['Reg_Mobile'] ?>&m=<?= $row['User_Id'] ?>&n=<?= $row['User_Email'] ?>" target="_blank" title="EDIT Client Details">
                <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:18px"></i>
            </a>
        <?php
        }else{
        ?>
            <a href="Client_Edit.php?email=<?= $row['Company_Name'] ?>&id=<?= $row['Reg_Mobile'] ?>&m=<?= $row['User_Id'] ?>&n=<?= $row['User_Email'] ?>" target="_blank" title="EDIT Client Details">
                <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:18px"></i>
            </a>
        <?php
        }
        ?>




        &ensp;&ensp;
        <a href="Client_Permissions.php?email=<?= $row['Company_Name'] ?>&id=<?= $row['Reg_Mobile'] ?>&m=<?= $row['User_Id'] ?>&n=<?= $row['User_Email'] ?>" target="_blank" title="Client Permissions Details">
            <i class="fa fa-lock" aria-hidden="true" style="font-size:18px"></i>
        </a>
    </td>
</tr>

<!-- Courier Priority -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button> -->
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['User_Id']; ?>" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo $row['User_Id']; ?>_<?php echo $row['User_Email']; ?></h4>
    </div>
    <div class="modal-body">
      <p>
<?php
    // $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");
    $arrayName = array($pres['api_xpressbee']=>"XpressBee",$pres['api_delhivery']=>"Delhivery",$pres['api_ekart']=>"Ekart",$pres['api_shadowfax']=>"ShadowFax",$pres['api_dtdc']=>"DTDC");

    // print_r($arrayName);
    // $arrayName = array(1=>$pres['api_xpressbee'],2=>$pres['api_delhivery'],3=>$pres['api_ekart'],4=>$pres['api_shadowfax'],5=>$pres['api_dtdc']);
    // $arrayName = array($pres['api_xpressbee'],$pres['api_delhivery'],$pres['api_ekart'],$pres['api_shadowfax'],$pres['api_dtdc']);
    // print_r($arrayName);

for ($i=1;$i<6;$i++){
    if(!empty($arrayName[$i])){
        echo "-> $i. <b>".$arrayName[$i]."</b> Courier Priority $i <br>";
    }
}
?>
      </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- Courier Priority -->
<?php
}
?>
<!--  -->
        </tbody>
    </table>



</div>



                                    </div>
                                </div>

                        </div>

            </section>



    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->

<?php
    include "Layout_Footer_Table.php";
?>
