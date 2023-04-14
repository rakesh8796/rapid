<?php include_once("layout_new_user_config.php");   ?>
<?php include_once("layouts/header.php");   ?>

<div class="main-content">

  <section class="section">

    <div class="section-body">

      <div class="row">

        <div class="col-12 col-sm-12 col-lg-12 ">

          <h4>Wallet</h4>

          <div class=" card">

            <div class="row">

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

              <div class="col-md-10 my-1 ">

                <div class="" style="margin-left:3%;"><i class="fas fa-wallet my-1" style="color:blue;border-radius: 50%;background-color: white;font-size:20px"></i><span style="font-size:15px"></i>

                    <strong style="font-size: 12px;">Total Balance</strong> &nbsp;₹&nbsp;<?= $tamt ?></div>

              </div>

              <div class="col-md-2">

                <div class="my-1"><button type="button" class="btn " style="background-color:#00cc00;

                      border-radius: 5%;" data-toggle="modal" data-target="#basicModal"><i class="fa fa-exclamation" style="font-size: 12px;"></i>&nbsp;Recharge

                  </button></div>

              </div>

            </div>

          </div>

        </div>

        <div class="col-12 my-1">

          <div class="row">

            <div class="col-md-3  ">

              <!-- <label class="form-label" style="color:#0d0d0d ;">Date Range</label> -->

              <div class="list-inline text-center">

                <div class="form-group card">

                  <select class="form-control " id="type">

                    <option value="---Download Your Order---">---Select Data Range---</option>

                    <option value="Last seven days orders">Today</option>

                    <option value="Last seven days orders">Yesterday</option>

                    <option value="Last seven days orders">Last seven days </option>

                    <option value="Current Month Order">Current Month </option>

                    <option value="Last Month Order">Last Month </option>

                    <option value="All Time Order">All Time

                    </option>

                    <option value="Custom Date Range">Custom Date Range</option>

                  </select>

                </div>

              </div>

            </div>

            <div class="col-md-5">

              <div class="card">

                <div class="input-group">

                  <input type="text" class="form-control" placeholder="Search">

                  <div class="">

                    <button class="btn btn-primary"><i class="fas fa-search" style="height: 25px;"></i></button>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-4">

              <div class="row">

                <div class="col-md-9"></div>

              </div>

              <div class="card">

                <div class="" style="margin-left:3%">

                  <h6 class="my-1">Opening Balance</h6> <i class="fas fa-wallet" style="color:blue;border-radius: 50%;background-color: white;font-size:15px;margin-left:1%"></i>

                  <span style="font-size:15px">₹&nbsp;<?= $tamt ?></i></span>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="col-12 ">

          <div class="card">

            <div class="card-body">

              <ul class="nav nav-pills" id="myTab3" role="tablist">

                <li class="nav-item">

                  <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Deduction</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Recharge</a>

                </li>

                <li class="nav-item">

                  <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Refunds</a>

                </li>

              </ul>

              <div class="tab-content" id="myTabContent2">

                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">

                  <div class="">

                    <table class="table table-striped table-hover">

                      <thead>

                        <tr>

                          <th>Date/Time</th>

                          <th>AWB</th>

                          <th>Txn No</th>

                          <th>Amount</th>

                          

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

                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">

                  <div class="table-responsive">

                    <table class="table table-striped ">

                      <thead>

                        <tr>

                          <th>Date/Time</th>

                          <th>Amount</th>

                          <th>Transaction ID</th>

                          <th>Bank Transaction ID</th>

                          <th>Type</th>

                          <th>Status</th>

                          <th>Recharge</th>

                        </tr>

                      </thead>

                      <tbody>

                        <tr>



                        </tr>

                        </tr>



                      </tbody>

                    </table>

                  </div>

                </div>

                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">

                  <div class="table-responsive">

                    <table class="table table-striped ">

                      <thead>

                        <tr>

                          <th>Date/Time</th>

                          <th>Amount</th>

                          <th>Transaction ID</th>

                          <th>Bank Transaction ID</th>

                          <th>Type</th>

                          <th>Status</th>

                          <th>Recharge</th>

                        </tr>

                      </thead>

                      <tbody>

                        <tr>



                        </tr>



                      </tbody>

                    </table>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>



</div>

<?php include_once("layouts/footer.php");   ?>