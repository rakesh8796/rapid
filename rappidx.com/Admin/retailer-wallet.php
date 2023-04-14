<?php

include "Layout_Header-retailer.php";

?>



<!--  Header  -->

<?php

include "retailer-header-bulk.php";

?>

<!--  Header  -->



<body>



  <div id="app">

    <div class="main-wrapper main-wrapper-1">

      <div class="navbar-bg"></div>



      <!--  topbar  -->

      <?php

      include "retailer-header-topbar.php";

      ?>

      <!--  topbar  -->





      <div class="main-sidebar sidebar-style-2">

        <!--  Sidebar  -->

        <?php

        include "retailer-sidebar.php";

        ?>

        <!--  Sidebar  -->

      </div>







































      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="section-body">







            <div class="row">

              <div class="col-12 col-sm-12 col-lg-12">

                <div class="card ">

                  <div class="card-header">

                    <h4>Wallet Details

                      <span class="pull-right">

                        <?php

                        if ($_GET['walletmsg'] == 'Lowbal') {

                          echo "<div class='success' style='color:orange;margin-right:450px;font-size:15px'>Your wallet balance is not sufficient to place the order. <br> Please recharge min Rs.500 /-</div>";
                        }

                        ?>

                      </span>

                    </h4>

                  </div>





                  <?php

                  $query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id' AND `status`='TXN_SUCCESS' ORDER BY `wallet_id` desc";

                  $data1 = mysqli_query($conn, $query1);

                  $res1 = mysqli_fetch_assoc($data1);

                  if (empty($res1['crt_amt'])) {

                    $tamt = 0;
                  } else {

                    $tamt = $res1['crt_amt'];
                  }

                  ?>

                  <div class="card-body">

                    <div class="row">

                      <div class="col-md-4">

                        <h6>TOTAL BALANCE</h6>

                      </div>

                      <div class="col-md-3"><i class="fa fa-wallet " style="font-size:20px">&nbsp;₹&nbsp;<span style="color:blue"><?= $tamt ?></span></i></div>



                    </div>







                    <form class="form-horizontal" role="form" id="popup-validation" method="post" action="Paytm/PaytmKit/pgRedirect.php" target="_blank">

                      <div class="row my-4">



                        <div class="col-md-4">

                          <h6>ADD BALANCE</h6>

                        </div>

                        <!--  <div class="col-md-3">

        <input type="text" placeholder="0.0" class="form-control" style="border-color:#33333373;border-radius:20px" required="">

    </div>

    <div class="col-md-3">

        <div class="buttons">

            <a href="#" class="btn btn-primary badge">Add Amount</a>

        </div>

    </div> -->



                        <?php

                        $query = "SELECT * FROM `spark_wallet_details` ORDER BY `wallet_id` desc";

                        $data = mysqli_query($conn, $query);

                        $res = mysqli_fetch_assoc($data);

                        $oid = $res['wallet_id'] + 1;

                        $oid = "RPWLN" . $oid;

                        // $oid = "DORID6";

                        $_SESSION['CUST_ID'] = $user_id;



                        ?>



                        <input type="hidden" id="ORDER_ID" name="ORDER_ID" value="<?= $oid ?>">

                        <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?= $user_id ?>">

                        <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="<?= $user_type ?>">

                        <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">



                        <!-- <div class="col-md-4">

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

    </div> -->



                        <div class="col-md-3">

                          <input type="text" name="TXN_AMOUNT" id="first-name" placeholder="0.0" class="form-control" style="border-color:#33333373;border-radius:20px" required="">

                        </div>

                        <div class="col-md-3">

                          <button type="submit" class="btn btn-primary badge" name="submit" style="border-radius:20px">Add Amount</button>

                        </div>



                      </div>

                    </form>











                  </div>

                </div>

              </div>

              <div class="col-12">

                <div class="card">



                  <div class="card-body">


                    <table class="table table-striped table-hover">

                      <thead>

                        <tr>

                          <th>Date/Time</th>

                          <th>AWB</th>

                          <th>Txn No</th>

                          <th>Freight Amount</th>

                          <th>Agent Fee</th>

                          <!--<th>Zone</th>-->

                          <th>Type</th>

                          <th>Status</th>



                        </tr>

                      </thead>

                      <tbody>

                        <!--  -->

                        <!--  -->

                        <?php

                        $i = 1;

                        $query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id'  ORDER BY `wallet_id` DESC";

                        $data1 = mysqli_query($conn, $query1);

                        while ($res1 = mysqli_fetch_assoc($data1)) {

                          $txntypeis = $res1['txntype'];

                          // if($txntypeis == "Add"){        $txntypeism = "+";    }

                          // if($txntypeis == "Sub"){        $txntypeism = "-";    }

                          // if($res1['status']=="TXN_SUCCESS"){

                          if ($res1['statuscode'] == "1") {

                        ?>

                            <tr>

                              <td><span><?= $res1['txn_date_time'] ?></span></td>

                              <td><a href="#"><?= $res1['awb_no'] ?></a></td>

                              <td><span><?= $res1['banktxnid'] ?></span></td>

                              <td><span><?= $res1['update_amt'] ?></span></td>

                              <td><span><?= $res1['agent_fee'] ?></span></td>

                              <!--<td><span style="color:green"><b><?= $res1['last_amt'] ?></b></span></td>-->

                              <!--<td><span style="color:red"><b><?= $res1['crt_amt'] ?></b></span></td>-->

                              <!--<td></td>-->

                              <td><span>

                                  <?php

                                  if ($txntypeism == "-") {

                                    echo "Debit";
                                  } elseif ($txntypeism == "+") {

                                    echo "Credit";
                                  }

                                  ?>

                                </span></td>

                              <td><span style="color:green">

                                  <?php

                                  echo $txntypeism;

                                  if ($res1['status'] == "TXN_SUCCESS") {

                                    echo "Success";
                                  } elseif ($res1['status'] == "TXN_FAILURE") {

                                    echo "Failed";
                                  } else {

                                    echo ucwords($res1['status']);
                                  }

                                  ?>

                                </span>



                                <?php

                                if ($res1['remark']) {

                                  echo " (" . $res1['remark'] . ")";
                                }

                                ?>



                              </td>

                            </tr>

                          <?php

                          } else {

                          ?>

                            <tr>

                              <td><span><?= $res1['txn_date_time'] ?></span></td>

                              <td><a href="#"><?= $res1['awb_no'] ?></a></td>

                              <td><span><?= $res1['banktxnid'] ?></span></td>

                              <td><span><?= $res1['update_amt'] ?></span></td>

                              <td><span><?= $res1['agent_fee'] ?></span></td>

                              <!--<td><span style="color:red"><b><?= $res1['last_amt'] ?></b></span></td>-->

                              <!--<td><span style="color:red"><b><?= $res1['crt_amt'] ?></b></span></td>-->

                              <!--<td></td>-->

                              <td><span>

                                  <?php

                                  if ($txntypeism == "-") {

                                    echo "Debit";
                                  } elseif ($txntypeism == "+") {

                                    echo "Credit";
                                  }

                                  ?>

                                </span></td>

                              <td><span style="color:red">

                                  <?php

                                  echo $txntypeism;

                                  if ($res1['status'] == "TXN_SUCCESS") {

                                    echo "Success";
                                  } elseif ($res1['status'] == "TXN_FAILURE") {

                                    echo "Failed";
                                  } else {

                                    echo ucwords($res1['status']);
                                  }

                                  ?>

                                </span>



                                <?php

                                if ($res1['remark']) {

                                  echo " (" . $res1['remark'] . ")";
                                }

                                ?>



                              </td>

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

          </div>

        </section>



      </div>





    </div>

  </div>





  <!--  Footer  -->

  <?php

  include "retailer-footer-bulk.php";

  ?>

  <!--  Footer  -->