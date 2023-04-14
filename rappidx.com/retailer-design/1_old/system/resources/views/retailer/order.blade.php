@extends("retailer/app")
@section("retailer")

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>All Orders</h4>
                        <div class="card-header-action">
                            <!-- <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                                    Delete</a>
                            </div>
                        </div> -->
                            <!-- <a href="#" class="btn btn-primary">View All</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">

                                <div class="row mb-0">

                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">

                                            <div class="form-group ">

                                                <select class="form-control badge" id="type"  >
                                                    <option value="---Download Your Order---">---Download Your Order---</option>
                                                    <option value="Last seven days orders">Last seven days orders</option>
                                                    <option value="Current Month Order">Current Month Order</option>
                                                    <option value="Last Month Order">Last Month Order</option>
                                                    <option value="Custom Date Range">Custom Date Range</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-yellow col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">
                                        <div class="form-group ">
                                            <a href="" id="size"  class="badge   form-control "></a>
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


<select id="size">
    <option value="">-- select one -- </option>
</select>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>$(document).ready(function () {
    $("#type").change(function () {
        var val = $(this).val();
        if (val == "Last seven days orders") {
            $("#size").html("<a value='Last seven days orders' >Download Last seven days orders</a>");
        } else if (val == "Current Month Order") {
            $("#size").html("<a value='Current Month Order'>Download Current Month Order</a>");
        } else if (val == "Last Month Order") {
            $("#size").html("<a value='Download Last Month Order'>Last Month Order</a>");
        } else if (val == "Custom Date Range") {
            $("#size").html("<a value='Download Custom Date Range'>Custom Date Range</a>");
        }else if (val == "---Download Your Order---") {
            $("#size").html("");
        }

    });
});</script>
@endsection()