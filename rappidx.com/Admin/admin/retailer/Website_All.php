<?php
    include "Layout_Header_Table.php";
?>

<!-- Page Content -->


<!-- Page Content -->

    <div class="container">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Website Request</h4> </div>
                <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Hospital</a></li>
                        <li class="active">Payments</li>
                    </ol>
                </div> -->
        </div>
<!-- /row -->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<!-- <h3 class="box-title m-b-0">Hospital Payments Details</h3>
<hr> -->
<div class="table-responsive">
<table id="myTable" class="table table-striped">
<thead>
    <tr>
        <th>Request Date</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<!--  -->
<?php
$tdate = date("Y-m-d");
// $user_id = 4;
$checkcerno = 1;
$allclientquery = "SELECT * FROM `asitfa_user_website` ORDER BY `websitejoinid` DESC";
$allclientqueryr=mysqli_query($conn,$allclientquery);
while($row = mysqli_fetch_assoc($allclientqueryr))
{

?>
<tr class="record">
    <td><?php echo $row['requestdate']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo ucwords($row['emailid']); ?></td>
    <td id="sta<?= $checkcerno ?>"><?php echo ucwords($row['formstatus']); ?></td>
    <td>
      <select class="form-control" name="" onchange="changecrtstatus<?= $checkcerno ?>(this.value,<?= $checkcerno ?>,<?= $row['websitejoinid'] ?>)">
        <option value="0">Change Status</option>
        <option value="Pending">Pending</option>
        <option value="Complete">Complete</option>
        <option value="Cancel">Cancel</option>
        <option value="Ignore">Ignore</option>
      </select>
      <script type="text/javascript">
      function changecrtstatus<?= $checkcerno ?>(valis,crtno,crtidno){
          // alert(valis);
          // alert(crtno);
          // alert(crtidno);
          if(valis != 0){
            $.ajax({
                type: "GET",
                url: "WebsiteRequestActiveCode/StatusChange.php",
                data:{clientidisause:valis,crtidno:crtidno},
                success: function (data){
                    // location.reload();
                    // alert(data);
                    // $("#Select_Desingnation").html(data);
                    $("#sta"+crtno).html(data);
                },
                error: function (data) {
                    // location.reload();
                    // alert(data);
                    // console.log('Error:', data);
                }
            });
          }
      }
      </script>
   </td>
</tr>

<?php
$checkcerno++;
}
?>
<!--  -->



</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- /.row -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul>
                        <li><b>Layout Options</b></li>
                        <li>
                            <div class="checkbox checkbox-info">
                                <input id="checkbox1" type="checkbox" class="fxhdr">
                                <label for="checkbox1"> Fix Header </label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox checkbox-warning">
                                <input id="checkbox2" type="checkbox" checked="" class="fxsdr">
                                <label for="checkbox2"> Fix Sidebar </label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox checkbox-success">
                                <input id="checkbox4" type="checkbox" class="open-close">
                                <label for="checkbox4"> Toggle Sidebar </label>
                            </div>
                        </li>
                    </ul>
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme working">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.right-sidebar -->
    </div>
    <!-- /.container-fluid -->

<!-- /#page-wrapper -->










<span class="pull-right">
<?php
if($_GET['msg'] == 'y'){
    echo "<div class='success' style='color:gold;margin-right:450px'>Update Successfully</div>";
}elseif($_GET['msg'] == 'n'){
    echo "<div class='success' style='color:red;margin-right:450px'>Not Updated</div>";
}
?>
</span>





<!-- /#page-wrapper -->

<?php
    include "Layout_Footer_Table.php";
?>
