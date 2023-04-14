<?php

include "Layout_Header-retailer.php";

?>



<!--  Header  -->

<?php

include "retailer-header-bulk.php";

?>

<!--  Header  -->



<body>

    <div class="loader"></div>

    <div id="app">

        <div class="main-wrapper main-wrapper-1">

            <div class="navbar-bg"></div>



            <!-- Topbar -->

            <?php

            include "retailer-header-topbar.php";

            ?>

            <!-- Topbar -->





            <div class="main-sidebar sidebar-style-2">



                <!--  Sidebar  -->

                <?php

                include "retailer-sidebar.php";

                ?>

                <!--  Sidebar  -->









              







            </div>

           

            <!-- Rate Calculations  -->

            

            <!-- Rate Calculations  -->



            
















            <!-- Main Content -->



            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">

                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>UPLOAD BULK ORDERS</h4>
                                    </div>
                                    <?php

                                    if ($_GET['excelfile'] == 'Update') {

                                        echo "<div class='success' style='color:green;margin-right:450px'>Please wait file is processing</div>";
                                    } elseif ($_GET['excelfile'] == 'No Update') {

                                        echo "<div class='success' style='color:red;margin-right:450px'>File Not Upload</div>";
                                    } elseif ($_GET['excelfile'] == 'Cancel Order') {

                                        echo "<div class='success' style='color:gray;margin-right:450px'>Order Cancel Successfully</div>";
                                    } elseif ($_GET['excelfile'] == 'Not Cancel Order') {

                                        echo "<div class='success' style='color:gray;margin-right:450px'>Order Not Canceled | Please Try Again</div>";
                                    } elseif ($_GET['excelfile'] == 'invalid Details') {

                                        echo "<div class='success' style='color:gray;margin-right:450px'>Invalid Details | Please Try Again</div>";
                                    } elseif ($_GET['excelfile'] == 'Invalid Data') {

                                        echo "<div class='success' style='color:gray;margin-right:450px'>Invalid Details | Please Try Again</div>";
                                    } elseif ($_GET['excelfile'] == 'Invalid Data1') {

                                        echo "<div class='success' style='color:gray;margin-right:450px'>Invalid Details | Please Try Again</div>";
                                    }

                                    ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-md-1 font-17">
                                                <div class="pretty p-default">
                                                    <input type="radio" name="b2b" />
                                                    <span class="state p-primary">
                                                        <label>B2C</label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-1 font-17">
                                                <div class="pretty p-default">
                                                    <input type="radio" name="b2b" />
                                                    <span class="state p-primary">
                                                        <label>B2B</label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 font-17">
                                                <div class="pretty p-default">
                                                    <input type="radio" name="b2b" />
                                                    <span class="state p-primary">
                                                        <label>International</label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-inline text-center">
                                            <li class="list-inline-item p-r-30">

                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="bulkorderfile" required="" onchange="inputfile500gm(this)">

                                                    <label class="custom-file-label" for="customFile">Upload CSV File</label>
                                                </div>
                                                <p class="text-muted font-14 m-b-0"></p>
                                            </li>

                                            <li class="list-inline-item p-r-30 ">

                                                <div class="custom-file">
                                                    <input type="submit" class="form-control " name="importSubmit5gm" id="customFile" value="Upload CSV File" style="background-color:#4d79ff;color:#f2f2f2;">

                                                    <input type="hidden" name="selectedweightidis" value="<?= $resultall['User_Id'] ?>">

                                                    <!-- <input type="submit" class="btn btn-primary active" name="importSubmit5gm" value="Upload CSV File" title="Please Select First Upload File" disabled="" id="inputsubmitn500gm"> -->

                                                    <input type="submit" class="btn btn-primary active" name="importSubmit5gm" value="Upload CSV File" title="Please Select First Upload File" style="display:none;" id="inputsubmits500gm">

                                                </div>


                                            </li>
                                            <script type="text/javascript">
                                                function inputfile500gm(fileInput) {

                                                    const selectedFile = fileInput.files[0];

                                                    console.log(selectedFile['name']);

                                                    extension = selectedFile['name'].split('.').pop();

                                                    // alert(extension);

                                                    if (extension == "csv") {

                                                        document.getElementById("inputsubmitn500gm").style.display = "none";

                                                        document.getElementById("inputsubmits500gm").style.display = "block";

                                                    } else {

                                                        alert("Please Upload CSV File");

                                                        document.getElementById("inputsubmitn500gm").style.display = "block";

                                                        document.getElementById("inputsubmits500gm").style.display = "none";

                                                    }

                                                }
                                            </script>

                                            <li class="list-inline-item p-r-30"> <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i data-feather="arrow-down-circle" class="col-orange"></i>
                                                    <h5 class="m-b-0">Download</h5>
                                                    <p class="text-muted font-14 m-b-0"> CSV File With Sample Data</p>
                                                </a>
                                                <!-- <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File With Sample Data</b></a> -->
                                            </li>

                                            <li class="list-inline-item p-r-30"><a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i data-feather="arrow-down-circle" class="col-orange"></i>
                                                    <h5 class="m-b-0">Download</h5>
                                                    <p class="text-muted font-14 m-b-0">CSV File Without Sample Data</p>
                                                </a>
                                                <!-- <a href="BulkExcelFiles/BulkOrdersSample/sample.csv"><i class="fa fa-download" aria-hidden="true"></i> <b>CSV File Without Sample Data</b></a> -->
                                            </li>

                                        </ul>
                                        <div id="revenue"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>BULK ORDER</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Order Download</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Download failed Order</a>
                                                <a class="dropdown-item" href="#">Download successfull order</a>

                                            </div>
                                        </div>

                                        <div class="table-responsive" style="margin-top:2% ;">
                                            <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>AWB Number</th>
                                                        <th>Customer Name</th>
                                                        <th>Customer Mobile</th>
                                                        <th>Customer Address</th>
                                                        <th>Customer State</th>
                                                        <th>Customer City</th>
                                                        <th>Customer Pincode</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>L/W/H</th>
                                                        <th>Weight</th>
                                                        <th>Total Amt</th>
                                                        <th>COD Amt</th>
                                                        <th>Additional Type</th>
                                                        <th>Upload Time</th>
                                                        <th>Pickup id</th>
                                                        <th>Pickup Name</th>
                                                        <th>Pickup Mobile</th>
                                                        <th>Pickup State</th>
                                                        <th>Pickup City</th>
                                                        <th>Pickup Pincode</th>
                                                        <th>Order Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <!--  -->

                                                    <?php

                                                    $tdate = date("Y-m-d");

                                                    $totalnoosorders = 0;

                                                    //

                                                    $useridisa = array();

                                                    $queryall = "SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";

                                                    $fdataall = mysqli_query($conn, $queryall);

                                                    $numrowall = mysqli_num_rows($fdataall);

                                                    if ($numrowall > 1) {

                                                        while ($resultall = mysqli_fetch_assoc($fdataall)) {

                                                            $useridisa[] = $resultall['User_Id'];
                                                        }

                                                        $user_ids = implode(",", $useridisa);
                                                    } else {

                                                        $user_ids = $user_id;
                                                    }

                                                    $singleproquery = "SELECT * FROM `spark_single_order` WHERE `User_Id` IN ($user_ids) AND `uploadtype`='Excel' AND `Awb_Number`!='' AND `awb_gen_by`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date`='$tdate' ORDER BY `Single_Order_Id` DESC";

                                                    //





                                                    $singleproqueryr = mysqli_query($conn, $singleproquery);

                                                    while ($row = mysqli_fetch_assoc($singleproqueryr)) {

                                                        if ($row['order_cancel']) {

                                                    ?>

                                                            <tr class="record danger">

                                                            <?php

                                                        } else {

                                                            ?>

                                                            <tr class="record ">

                                                            <?php

                                                        }

                                                            ?>



                                                            <td>

                                                                <input type="hidden" name="cancelallorders[]" value="<?= $row['orderno'] ?>">

                                                                <input type="hidden" name="shippingallorders[]" value="<?= $row['orderno'] ?>">

                                                                <label>

                                                                    <input type="checkbox" name="selectedcancelorders[]" value="<?= $row['orderno'] ?>">

                                                                    <?php echo $row['orderno']; ?>

                                                                </label>

                                                            </td>

                                                            <td><?php echo $row['Awb_Number']; ?></td>

                                                            <td><?php echo $row['Name']; ?></td>

                                                            <td><?php echo $row['Mobile']; ?></td>

                                                            <td><?php echo $row['Address']; ?></td>

                                                            <td><?php echo $row['State']; ?></td>

                                                            <td><?php echo $row['City']; ?></td>

                                                            <td><?php echo $row['Pincode']; ?></td>



                                                            <td><?php echo $row['Item_Name']; ?></td>

                                                            <td><?php echo $row['Quantity']; ?></td>

                                                            <td><?php echo $row['Length']; ?> x <?php echo $row['Width']; ?> x <?php echo $row['Height']; ?></td>

                                                            <td><?php echo $row['Actual_Weight']; ?></td>

                                                            <td><?php echo $row['Total_Amount']; ?></td>

                                                            <td><?php echo $row['Cod_Amount']; ?></td>

                                                            <td><?php echo $row['additionaltype']; ?></td>

                                                            <td><?php echo $row['Rec_Time_Date']; ?></td>



                                                            <td><?php echo $row['pickup_id']; ?></td>

                                                            <td><?php echo $row['pickup_name']; ?></td>

                                                            <td><?php echo $row['pickup_mobile']; ?></td>

                                                            <td><?php echo $row['pickup_address']; ?></td>

                                                            <td><?php echo $row['pickup_state']; ?></td>

                                                            <td><?php echo $row['pickup_city']; ?></td>

                                                            <td><?php echo $row['pickup_pincode']; ?></td>

                                                            <td><?php echo $row['order_status1']; ?></td>

                                                            </tr>

                                                        <?php

                                                        $totalnoosorders++;
                                                    }

                                                        ?>

                                                        <!--  -->

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>



        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                    $("#nav a").click(function(e) {
                        e.preventDefault();
                        $(".toggle").hide();
                        var toShow = $(this).attr('href');
                        $(toShow).show();
                    });
                </script>




    <!-- General JS Scripts -->

    <script src="assets/js/app.min.js"></script>

    <script src="assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- JS Libraies -->

    <script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>

    <!-- Page Specific JS File -->

    <script src="assets/js/page/form-wizard.js"></script>

    <!-- Template JS File -->

    <script src="assets/js/scripts.js"></script>

    <!-- Custom JS File -->

    <script src="assets/js/custom.js"></script>





</body>









</html>