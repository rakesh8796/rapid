<?php
  include "Layout_Header_Table.php";
?>

<!-- Page Content -->


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


























<!-- Page Content -->

<div class="container">
<div class="row bg-title">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h4 class="page-title">COD Remittance</h4> </div>
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
            <th>Remmitance Number</th>
            <th>Due Date</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th></th>
          </tr>
    </thead>
    <tbody>
<!--  -->
<?php
  $tdate = date("Y-m-d");
  $query = "SELECT * FROM `remittancecodamount` WHERE `userid`='$user_id' ORDER BY `remmitid` DESC";
  $queryr = mysqli_query($conn,$query);
  while($res = mysqli_fetch_assoc($queryr)){
?>
  <tr class="record">
      <td><?php echo $res['serinalno']; ?></td>
      <td><?php echo $res['duedate']; ?></td>
      <td><?php echo $res['totalamount']; ?></td>
      <td><?php echo $res['status']; ?></td>
      <td></td>
  </tr>
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















<!-- /#page-wrapper -->

<?php
include "Layout_Footer_Table.php";
?>
