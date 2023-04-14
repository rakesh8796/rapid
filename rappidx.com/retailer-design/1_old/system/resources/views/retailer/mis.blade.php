@extends("retailer/app")
@section("retailer")
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>MIS Report (Last 10 Days)</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S.NO</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">500GM</th>
                                        <th scope="col">ALL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2022-09-06</td>
                                        <td>11:45AM</td>
                                        <td > <a href="#" class="badge badge-warning">Download</a></td>
                                        <td><a href=""><i data-feather="arrow-down-circle" class="col-green"></i></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>2022-09-02 </td>
                                        <td>9:52AM</td>
                                        <td > <a href="#" class="badge badge-warning">Download</a></td>
                                        <td><a href=""><i data-feather="arrow-down-circle" class="col-green"></i></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>2022-09-01</td>
                                        <td>1:14PM</td>
                                        <td > <a href="#" class="badge badge-warning">Download</a></td>
                                        <td><a href=""><i data-feather="arrow-down-circle" class="col-green"></i></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
</div>


@endsection()