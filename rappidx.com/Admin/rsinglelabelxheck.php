<?php
    include "Layout_Header.php";
?>
<!-- Page Content -->


<!-- Status Switch Code -->
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 37px;
  height: 22px;
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
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #F5CE44;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(16px);
  -ms-transform: translateX(16px);
  transform: translateX(16px);
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


<?php 

/*
echo $ordernos;
if($ordernos){

$ordernos = unserialize( $ordernos );
$ordernos1 = $ordernos;
// print_r($ordernos);

$awbordernos = array();

$ordernos = array($ordernos);

echo "<br>";
print_r($ordernos);
echo "<br>";

foreach($ordernos as $orderno){
    // echo $orderno."&ensp;";
    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `orderno`='$orderno'";
    $singleproqueryr=mysqli_query($conn,$singleproquery);
    $rowres = mysqli_fetch_assoc($singleproqueryr);
    $awbordernos[] = $rowres['Awb_Number'];
}

$awbordernos = implode(PHP_EOL, $awbordernos);

}
*/
?>





<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Print Shipping Labels</h4>
  </div>
</div>



        <section class="content">
              <div class="col-md-12">


                <div class="col-md-6">
                    <div class="panel filterable">


<form class="form-horizontal" role="form" id="popup-validation" method="post" action="Shipping_Labels_All.php" target="_blank">

    <div class="panel-body">
        <div class="row m-t-10">
            <div class="col-md-12">
                <div class="input-group">
<!-- <label class="sr-only" for="first-name">Add Balance</label> -->
<!-- <textarea rows="5" class="form-control" name="shippinglabelawbno" placeholder="AWB Number (Use Comma(,) Between 2 AWB No) [Max-50]"></textarea> -->
<textarea rows="5" class="form-control" name="shippinglabelawbno" placeholder="AWB Number (Use New Line Between 2 AWB Numbers) [Max-999]    [ Please Not Use  Comma(,) And Space( ) ]" required=""><?= $ordernos ?></textarea>
                    <!-- <input type="text" name="TXN_AMOUNT" id="first-name"placeholder="0.0" class="form-control m-t-10" required=""> -->
                </div>
            </div>
        </div>
        
<br>
<div class="col-md-3">
  <b>Mobile Show</b>
  <label class="switch">
    <input type="checkbox" name="mobileshowornot" value="1">
    <span class="slider round"></span>
  </label>
</div>
<div class="col-md-9">
    <!--<div class="modal-footer">-->
    <!-- <button type="submit" class="btn btn-succes" name="submit">Print Shipping Labels</button> -->
    <!-- <input type="submit" name="printlabels" value="afour" value="A4 Shipping Labels">
    <input type="submit" name="printlabels" value="fourxsix" value="4X6 Shipping Labels"> -->
    <input type="submit" name="printlabels" value="A4 Size">
    <input type="submit" name="printlabels" value="4X6 Size">
    <input type="submit" name="printlabels" value="A6 Size">
    <input type="submit" name="printlabels" value="A6 Size New">
    <!--</div>-->
</div>
        
        
    </div>
</form>

                                        </div>
                                    </div>



               <!--  <div class="col-lg-6">
                    <div class="panel panel-success filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                 Total Balance
                            </h3>
                        </div>

<?php
    $query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id' ORDER BY `wallet_id` desc";
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
            <div class="row m-t-10">
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
                                    </div> -->



                                </div>

                        </div>
                    </div>
                </div>
            </div>
            </section>


</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
