<?php
  error_reporting(1);
  extract($_REQUEST);
  include "config/dbcon.php";
  
//   $tudate = date('Y-m-d');
// //   echo "<br>";
//   $crttime = date("Y-m-d H:i:s");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Developer</title>
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="fix-sidebar">
    <div id="wrapper" class="container">

<br>
        <div id="">
            <div class="container-fluid">

<div class="row">
<div class="col-md-12">
<div class="white-box">
<div class="table-responsive">
<table id="myTable" class="table table-striped">
    <thead>
        <tr>
            <th style="width:2%">Sno</th>
            <th style="width:18%">Date</th>
            <th style="width:12%">IP</th>
            <th style="width:25%">Name</th>
            <th style="width:25%">UserType</th>
            <th style="width:10%">City</th>
            <th style="width:8%">Pincode</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
      $allclientquery = "SELECT * FROM `loginandlogoutdetails` ORDER BY `loginoutid` ASC";
      $allclientqueryr=mysqli_query($conn,$allclientquery);
      while($row = mysqli_fetch_assoc($allclientqueryr)){
      ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $row['logindatetime']; ?></td>
        <td><?= $row['ipaddress']; ?></td>
        <td><?= $row['companyname']; ?></td>
        <td><?= $row['usertype']; ?>(<?= $row['useruniqueidno'] ?>)</td>
        <td><?= $row['city']; ?></td>
        <td><?= $row['pincode']; ?></td>
      </tr>
      <?php
        $i++;
        }
      ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>



            </div>
        </div>
    </div>




<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
$('#myTable').DataTable();
});
</script>
</body>

</html>
