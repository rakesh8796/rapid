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

                            <div class="col-12 col-md-12 col-lg-12">

                                <div class="card">

                                    <div class="card-header">

                                        <h4>Warehouse List</h4>





                                    </div>

                                    <div class="text-right" style="margin-right:3% ;margin-top:2%">

                                        <a href="add_warehouse.php" class="btn btn-primary">Add Warehouse</a>

                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table class="table table-bordered table-md">

                                                <tr>

                                                    <th>Warehouse ID</th>

                                                    <th>Warehouse Name </th>

                                                    <th>Contact person</th>

                                                    <th> Contact Number </th>

                                                    <th>Details</th>

                                                    <!-- <th>Status</th> -->

                                                    <th>Date</th>

                                                </tr>

                                                <tbody>

                                                    <!--  -->

                                                    <?php

                                                    // echo $user_id;



                                                    $singleproquery = "SELECT * FROM `spark_pickup_address` WHERE `User_Id`='$user_id' ORDER BY `Name` DESC";



                                                    $singleproqueryr = mysqli_query($conn, $singleproquery);



                                                    while ($row = mysqli_fetch_assoc($singleproqueryr)) {



                                                    ?>



                                                        <tr class="record">

                                                            <td><?php echo $row['Address_Id']; ?></td>



                                                            <td><?php echo $row['Name']; ?></td>

                                                            <td><?php echo $row['contact_person']; ?></td>





                                                            <td><?php echo $row['Mobile']; ?></td>

                                                            <td><?php echo $row['Address']; ?></td>

                                                            <!--<td>-->

                                                            <!--     <div class="btn btn-success">Active</div> -->

                                                            <!--</td>-->

                                                            <td><?php echo $row['Rec_Time_Stamp']; ?></td>

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