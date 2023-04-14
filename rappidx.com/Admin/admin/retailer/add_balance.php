<?php
    include "Layout_Header_Table.php";
?>

<!-- Page Content -->





<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Wallet Details
<span class="pull-right">
<?php
if($_GET['walletmsg'] == 'Lowbal'){
    echo "<div class='success' style='color:orange;margin-right:450px;font-size:15px'>Your wallet balance is not sufficient to place the order. <br> Please recharge min Rs.500 /-</div>";
}
?>
</span>
    </h4>
  </div>
</div>



<section class="content">
<div class="col-md-12">


<div class="col-md-12">
<div class="col-md-6">
<div class="panel">
    <div class="panel-heading" style="background-color:#33333373;padding:5px 5px 5px 5px !important">
        <h5 style="font-weight:500;color:#333333">Add Balance</h5>
    </div>
<form class="form-horizontal" role="form" id="popup-validation" method="post" action="Paytm/PaytmKit/pgRedirect.php" target="_blank">
<?php
$query = "SELECT * FROM `spark_wallet_details` ORDER BY `wallet_id` desc";
$data = mysqli_query($conn,$query);
$res = mysqli_fetch_assoc($data);
$oid = $res['wallet_id']+1;
$oid = "RPWLN".$oid;
// $oid = "DORID6";
$_SESSION['CUST_ID'] = $user_id;

 ?>

    <input type="hidden" id="ORDER_ID" name="ORDER_ID" value="<?= $oid ?>">
    <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?= $user_id ?>">
    <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID"  value="<?= $user_type ?>">
    <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">

    <div class="panel-body">
      <div class="col-md-8">
            <div class="col-md-12">
                <div class="input-group">
                    <label class="sr-only" for="first-name">Add Balance</label>
                    <input type="text" name="TXN_AMOUNT" id="first-name"placeholder="0.0" class="form-control m-t-10" style="border-color:#33333373;border-radius:20px" required="">
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="modal-footer">
            <button type="submit" class="btn btn-info" name="submit" style="border-radius:20px">Add Amount</button>
          </div>
        </div>
    </div>
</form>

</div>
</div>




<div class="col-md-6">
<div class="panel">
    <div class="panel-heading" style="background-color:#33333373;padding:5px 5px 5px 5px !important">
        <h5 style="font-weight:500;color:#333333">Total Balance</h5>
    </div>

<?php
    $query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id' AND `status`='TXN_SUCCESS' ORDER BY `wallet_id` desc";
    $data1 = mysqli_query($conn,$query1);
    $res1 = mysqli_fetch_assoc($data1);
    if(empty($res1['crt_amt']))
    {
        $tamt = 0;
    }else
    {
        $tamt = $res1['crt_amt'];
    }
 ?>

<div class="panel-body">
<div class="col-md-12">
    <div class="col-md-6">
        <div class="input-group">
            <center><h1>
                <i class="fa fa-inr" aria-hidden="true"></i>
                <?= $tamt ?> /-</h1></center>
        </div>
    </div>
</div>
</div>

</div>
</div>

</div>







<!-- /row -->
<div class="col-md-12">
<div class="col-md-12">
<div class="white-box">
<div class="table-responsive">
    <table id="myTable" class="table table-striped">
        <thead>
            <tr>
              <th data-field="Order No" data-sortable="true"><b>Order No</b></th>
              <th data-field="Txn No" data-sortable="true"><b>Txn No</b></th>
              <th data-field="Data/Time" data-sortable="true"><strong>Data/Time</strong></th>
              <th data-field="Last Amount" data-sortable="true"><strong>Last Amount</strong></th>
              <th data-field="Update Amount" data-sortable="true"><strong>Update Amount</strong></th>
              <th data-field="Total Amount" data-sortable="true"><strong>Total Amount</strong></th>
              <th data-field="Status" data-sortable="true"><strong>Status</strong></th>
              </tr>
        </thead>
        <tbody>
          <!--  -->
          <!--  -->
          <?php
              $i = 1;
              $query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id'  ORDER BY `wallet_id` DESC";
              $data1 = mysqli_query($conn,$query1);
              while ($res1 = mysqli_fetch_assoc($data1)){

                $txntypeis = $res1['txntype'];
                if($txntypeis == "Add"){        $txntypeism = "+";    }
                if($txntypeis == "Sub"){        $txntypeism = "-";    }
                // if($res1['status']=="TXN_SUCCESS"){
                if($res1['statuscode']=="1"){
          ?>
            <tr>
              <td><span style="color:green"><b><?= $res1['order_id'] ?></b></span></td>
              <td><span style="color:green"><b><?= $res1['banktxnid'] ?></b></span></td>
              <td><span style="color:green"><b><?= $res1['txn_date_time'] ?></b></span></td>
              <td><span style="color:green"><b><?= $res1['last_amt'] ?></b></span></td>
              <td><span style="color:green"><b><?= $res1['update_amt'] ?></b></span></td>
              <td><span style="color:green"><b><?= $res1['crt_amt'] ?></b></span></td>
              <td><span style="color:green"><b><?= $txntypeism ?> <?= $res1['status'] ?></b></span></td>
            </tr>
          <?php
                  }else{
          ?>
            <tr>
              <td><span style="color:red"><b><?= $res1['order_id'] ?></b></span></td>
              <td><span style="color:red"><b><?= $res1['banktxnid'] ?></b></span></td>
              <td><span style="color:red"><b><?= $res1['txn_date_time'] ?></b></span></td>
              <td><span style="color:red"><b><?= $res1['last_amt'] ?></b></span></td>
              <td><span style="color:red"><b><?= $res1['update_amt'] ?></b></span></td>
              <td><span style="color:red"><b><?= $res1['crt_amt'] ?></b></span></td>
              <td><span style="color:red"><b><?= $txntypeism ?> <?= $res1['status'] ?></b></span></td>
            </tr>
          <?php
                  }
          ?>
          <?php
              $i++;
              }
          ?>
          <!--  -->
          <!--  -->
        </tbody>
    </table>
</div>
</div>
</div>
</div>
<!-- /.row -->








</div>
</section>





</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer_Table.php";
?>
