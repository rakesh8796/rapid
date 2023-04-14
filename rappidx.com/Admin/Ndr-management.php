<?php include_once("layouts/header.php");   ?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>NDR Managment</h4>

                            <div class="card-header-form">

                            </div>


                        </div>
                        <hr>
                        <div class="card-header-form">
                            <div class=" text-right " style="margin-right:2% ;">
                                <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter200">&nbsp;Bulk Upload&nbsp;</i></a>
                                <a href="#" class="btn btn-outline-primary">&nbsp;Export&nbsp;</i></a>
                                <a href="#" class="btn btn-outline-primary" onclick="myFunction()">&nbsp;Filtter&nbsp;</i></a>
                            </div>
                        </div>
                        <div class="col-md-12 my-2 " id="myDIV" style="display: none;">
                            <div class="card  ">
                                <div class="card-header">
                                    <h4>Filtter</h4>
                                    <div class="card-header-action">
                                    </div>
                                </div>
                                <div class="card-body  " style="background-color: #bfbfbf;">
                                    <form id="ndr_for_filter">
                                    <div class="row">
                                       <input type="hidden" id="active_tab_ndr" name="active_tab_ndr">
                                        <input type="hidden" id="table_id_ndr" name="table_id_ndr">

                                        <div class="col-md-3  ">
                                            <label class="form-label">Date Range</label>
                                            <div class="list-inline text-center">
                                                <div class="form-group ">
                                                    <select class="form-control " id="type" name="ndr_date_range">
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
                                        <div class="col-md-3 ">
                                            <label class="form-label">Order Id</label>
                                           
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_order_id" class="form-control " placeholder="Search by Order Id">

                                                </div>
                                           
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label">AWB Number</label>
                                           
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_awb_no" class="form-control " placeholder="Search by AWB ">

                                                </div>
                                           
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label">Mobile</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_mobile_no" class="form-control " placeholder="Search by Mobile no ">

                                                </div>
                                            
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label">Name</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_name" class="form-control " placeholder="Search by Name ">

                                                </div>
                                           
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label">Product Name</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_product_name" class="form-control " placeholder="Search by Product name">

                                                </div>
                                            
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label">Attempts</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_attempts" class="form-control " placeholder="Search by Product name">

                                                </div>
                                            
                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="form-label">Courier Wise</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_courier_wise" class="form-control " placeholder="search by Courier Wise">

                                                </div>
                                            
                                        </div>

                                        <div class="col-md-3 ">
                                            <label class="form-label">NDR Remarks</label>
                                            
                                                <div class="input-group ">
                                                    <input type="text" name="ndr_remark" class="form-control " placeholder="Search by WNDR Remarks">

                                                </div>
                                            
                                        </div>


                                        <div class="col-md-2">
                                            <label class="form-label">Type</label>
                                            <div class="form-group">
                                                <select class="form-control" id="paymentmode" name="ordertype" onchange="calculateraterefresh(),yesnoCheck(this)" >
                                                    <option value="">Select</option>
                                                    <option value="Prepaid">Prepaid</option>
                                                    <option value="COD">COD</option>
                                                    <option value="COD">COD/Prepaid</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3 my-2">
                                            <label class="form-label"></label>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-primary" value="Search">

                                            </div>

                                        </div>



                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDIV");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display === "block";
                                }
                            }

                          
                          
                        </script>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="card-header">
                                        <!-- <h4>Tab <code>.nav-pills</code></h4> -->
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Action Required</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Action Requested</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">RTO</a>
                                            </li>

                                            
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Order Id</th>
                                                                <th>AWB</th>
                                                                <th>NDR Date</th>
                                                                <th>Payment </th>
                                                                <th>Aging</th>
                                                                <th>Attempts</th>
                                                                <th>Courier</th>
                                                                <th>State</th>
                                                                <th>Customer</th>
                                                                <th>Mobile</th>
                                                                <th>Product</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>


                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Order Id</th>
                                                                <th>AWB</th>
                                                                <th>NDR Date</th>
                                                                <th>Payment </th>
                                                                <th>Aging</th>
                                                                <th>Attempts</th>
                                                                <th>Courier</th>
                                                                <th>State</th>
                                                                <th>Customer</th>
                                                                <th>Mobile</th>
                                                                <th>Product</th>
                                                                <th>Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>


                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Order Id</th>
                                                                <th>AWB</th>
                                                                <th>NDR Date</th>
                                                                <th>Payment </th>
                                                                <th>Aging</th>
                                                                <th>Attempts</th>
                                                                <th>Courier</th>
                                                                <th>State</th>
                                                                <th>Customer</th>
                                                                <th>Mobile</th>
                                                                <th>Product</th>
                                                                <th>Action</th>


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
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Bulkorder popup Center -->
<div class="modal fade" id="exampleModalCenter200" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">UPLOAD BULK ORDERS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <label>Upload orders via excel file<span class="text-danger">*</span></label>

                </div>
                <hr>
                <h6>CSV File With Sample Data: <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv">Download</a></h6>
                <hr>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Upload CSV File</label>
                </div>
                <label>Please remove sample data before proceed<span class="text-danger">*</span></label>
            </div>

            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter420" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <label>Select</label>
                        <div class="section-title"></div>
                        <div class="form-group" id="middleDetails">
                            <!-- <label>Select2</label> -->
                            <select class="form-control select2" onChange="getDropDown(this)">
                                <option value="vancouver">Select </option>
                                <option value="vancouver">RTO</option>
                                <option value="singapore">Reattempt</option>
                                <option value="newyork">Mobile Change</option>
                                <option value="Address">Address Change</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Reattempt Date</label>
                            <input type="Date" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="vancouver" style="display: none;">
                    <!-- <label>RTO</label> -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Remark</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Remarks"></textarea>

                        </div>
                    </div>
                </div>
                <!-- reattempt -->
                <div id="singapore" style="display: none;">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Remarks"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Change mobile number -->
                <div id="newyork" style="display: none;">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Enter Your Mobile Number</label>
                            <input type="Number" class="form-control">

                            <textarea name="" id="" cols="30" rows="10" class="form-control my-2" placeholder="Remarks"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Address Change -->
                <div id="Address" style="display: none;">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Enter Your New Address</label>
                            <input type="text" class="form-control">
                            <textarea name="" id="" cols="30" rows="10" class="form-control my-2" placeholder="Remarks"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function getDropDown(sel) {
        hideAll();
        document.getElementById(sel.options[sel.selectedIndex].value).style.display = 'block';
    }

    function hideAll() {
        document.getElementById("vancouver").style.display = 'none';
        document.getElementById("singapore").style.display = 'none';
        document.getElementById("newyork").style.display = 'none';
        document.getElementById("Address").style.display = 'none';
    }
      

</script>
<?php include_once("layouts/footer.php");   ?>
<script type="text/javascript">
    $(document).on("click",".nav-link",function(){
        if($(this).hasClass('active')){
            var ndr_active=$(this).text();
            var ndr_attr=$(this).attr('href');
            $("#active_tab_ndr").val(ndr_active);
            $("#table_id_ndr").val(ndr_attr);
            
        }
    });

    $("#ndr_for_filter").submit(function(e){
                               var formData=new FormData(this);
                                e.preventDefault();
                                $.ajax({
                                         url : 'ndr_filter_order.php',
                                        type : 'POST',
                                        data : formData,
                                      
                                        contentType : false,
                                        processData : false,
                                        // success:function(response){
                                        //    console.log(response);
                                        //       var data=JSON.parse(response);
                                        //       $(data.tableId+ "table tbody tr").not("thead tr").remove();
                                              
                                        //        $(data.tableId+ ".filter_table").html(data.res);
                                            
                                            
                                        // }
                                });
                            });
</script>
