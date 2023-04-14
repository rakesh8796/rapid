@extends("retailer/app")
@section("retailer")

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>All Orders</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row mb-0">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">

                                            <div class="form-group ">

                                                <h5 class="bold"><b>Serviceable Pincodes</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">

                                            <div class="form-group ">
                                               
                                           <h4> <span class="badge badge-primary ">Download Serviceable Pincodes</span> </h4>

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-4"> <select class="form-control badge"  >
                                                    <option>500GM</option>
                                                   
                                                </select></div>
                                                    <div class="col-md-8 ">
                                                    <input type="text" placeholder="Search Pincode Number" class="form-control" style="border-color:#33333373;border-radius:20px" required="">
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
        </div>
</div>
</section>
</div>

@endsection()