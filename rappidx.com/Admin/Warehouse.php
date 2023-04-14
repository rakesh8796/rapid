<?php include_once("layouts/header.php");   ?>
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

<?php include_once("layouts/footer.php");   ?>