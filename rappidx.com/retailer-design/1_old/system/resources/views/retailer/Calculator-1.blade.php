<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Rappidx</title>
<!-- General CSS Files -->
<link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
<!-- Custom style CSS -->
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<link rel='shortcut icon' type='image/x-icon' href='{{asset("assets/img/reppidxlogoicon.png")}}' />
</head>

<body>

<div id="app">
<div class="main-wrapper main-wrapper-1">
@include("retailer/layouts/navbar")
@include("retailer/layouts/sidebar")
<!-- Main Content -->
<div class="main-content">








<section class="section">
<div class="row">
<div class="col-12 col-sm-12 col-lg-12">
<div class="card ">
<div class="card-header">
<h4>Calculate Estimate Amount</h4>

</div>
<div class="card-body">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div id="nav">
                    <a href="#content1" class="btn btn-primary font-18 ">B2C Calculator</a>
                    <a href="#content2" class="btn btn-primary font-18"> B2B calculator</a>
                    <a href="#content3" class="btn btn-primary font-18">International calculator</a>
                </div>
            </div>
        </div>
    </div>
    <div id="content1" class="toggle" style="display:none">
        <div class="row">
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Pickup Pincode</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Delivery Pincode</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i>KG</i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>L(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>H(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>B(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Value in INR</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>COD</label>
                            <div class="input-group">

                                <select class="form-control">

                                    <option>COD</option>
                                    <option>Prepad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>select Category</label>
                            <div class="input-group">

                                <select class="form-control">
                                    <option>Product Category*</option>
                                    <option>Apparel And Accessories</option>
                                    <option>Automotives</option>
                                    <option>Baby Care</option>
                                    <option>Books And Stationery</option>
                                    <option>Consumables FMCG</option>
                                    <option>Documents</option>
                                    <option>Electronics</option>
                                    <option>Household Items</option>
                                    <option>Sports Equipments</option>
                                    <option>Covid Essentials</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Product Amount</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="my-3 col-md-6  ">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary form-control">&nbsp;Calculate</i></a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">&nbsp;Rate List</i></a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card-header">
                    <h4>Terms & Conditions:</h4>

                </div>
                <ul>
                    <li>I have read and received the merchant agreement. Request you to kindly acknowledge the below terms: </li>
                    <li>I have read and understood the shipping rates and services.</li>
                    <li>I understand that I should use only shipping labels (AWB’S) that are generated from the dashboard and not manual labels; use of manual labels will result in a fine of Rs. 500/-+ taxes.</li>
                    <li>I understand that sending of prohibited items and dangerous goods are not permissible and I shall abide by those restrictions.</li>
                    <li>I understand that there is a chance that pick-up services may face issues due to operational concerns of the courier company especially in case of new pickup locations.</li>
                    <li>I understand that the volumetric weight of my package could be higher than physical weight and agree to be billed for whichever is higher.</li>
                   
                    <details>
                        <summary>see all</summary>
                        <li>I understand that I will be liable for the freight charges and the return charges of a shipment if returned. I understand that there may be certain penalties or customs in case of international levied by carrier and I am liable to bear those taxes when required.</li>
                        <li>I understand that proper packaging of my products has to be done from my end. I shall be solely liable for any damage arising out of improper packaging.</li>
                        <li>I understand that additional government rules and norms can be applicable while shipping to certain states and subject to change without prior intimation and will abide by them.</li>
                        <li>I understand that MSDS is required for shipping liquid and semi-solid products and agree to furnish the same for every consignment that carries such products.</li>
                        <li>I also understand that liquid and semi-solid products cannot be sent via air and will be sent only through surface shipping.</li>
                        <li>I agree to declare the accurate weight and dimensions of my packages while scheduling shipments. I also agree that no dispute can be raised with respect to billing, due to incorrect entry of data while scheduling. Shipment will be billed as per slab & services selected.</li>
                        <li>I Understand that Proof of Delivery will not be provided after 30 days of Delivery.</li>
                        <li>I understand that I can’t raise disputes of any shipment beyond 7 days of bills being submitted. Disputes with respect to weight should be supported by image proof of the shipments. </li>
                    </details>
                </ul>
            </div>
        </div>

    </div>
    <div id="content2" class="toggle" style="display:none">
        <div class="row">
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">



                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Pickup Pincode</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Delivery Pincode</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i>KG</i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>L(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>H(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>B(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Value in INR</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>COD</label>
                            <div class="input-group">

                                <select class="form-control">

                                    <option>YES</option>
                                    <option>NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>select Category</label>
                            <div class="input-group">

                                <select class="form-control">
                                    <option>Product Category*</option>
                                    <option>Apparel And Accessories</option>
                                    <option>Automotives</option>
                                    <option>Baby Care</option>
                                    <option>Books And Stationery</option>
                                    <option>Consumables FMCG</option>
                                    <option>Documents</option>
                                    <option>Electronics</option>
                                    <option>Household Items</option>
                                    <option>Sports Equipments</option>
                                    <option>Covid Essentials</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Product Amount</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 col-md-6  ">
                    <div class="row">

                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary form-control">&nbsp;Calculate</i></a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">&nbsp;Rate List</i></a>




                        </div>
                    </div>

                </div>



            </div>
            <div class="col-md-6">

                <div class="card-header">
                    <h4>Terms & Conditions:</h4>

                </div>
                <ul>
                    <li>I have read and received the merchant agreement. Request you to kindly acknowledge the below terms: </li>
                    <li>I have read and understood the shipping rates and services.</li>
                    <li>I understand that I should use only shipping labels (AWB’S) that are generated from the dashboard and not manual labels; use of manual labels will result in a fine of Rs. 500/-+ taxes.</li>
                    <li>I understand that sending of prohibited items and dangerous goods are not permissible and I shall abide by those restrictions.</li>
                    <li>I understand that there is a chance that pick-up services may face issues due to operational concerns of the courier company especially in case of new pickup locations.</li>
                    <li>I understand that the volumetric weight of my package could be higher than physical weight and agree to be billed for whichever is higher.</li>
                   
                    <details>
                        <summary>see all</summary>
                        <li>I understand that I will be liable for the freight charges and the return charges of a shipment if returned. I understand that there may be certain penalties or customs in case of international levied by carrier and I am liable to bear those taxes when required.</li>
                        <li>I understand that proper packaging of my products has to be done from my end. I shall be solely liable for any damage arising out of improper packaging.</li>
                        <li>I understand that additional government rules and norms can be applicable while shipping to certain states and subject to change without prior intimation and will abide by them.</li>
                        <li>I understand that MSDS is required for shipping liquid and semi-solid products and agree to furnish the same for every consignment that carries such products.</li>
                        <li>I also understand that liquid and semi-solid products cannot be sent via air and will be sent only through surface shipping.</li>
                        <li>I agree to declare the accurate weight and dimensions of my packages while scheduling shipments. I also agree that no dispute can be raised with respect to billing, due to incorrect entry of data while scheduling. Shipment will be billed as per slab & services selected.</li>
                        <li>I Understand that Proof of Delivery will not be provided after 30 days of Delivery.</li>
                        <li>I understand that I can’t raise disputes of any shipment beyond 7 days of bills being submitted. Disputes with respect to weight should be supported by image proof of the shipments. </li>
                    </details>
                </ul>
            </div>
        </div>
    </div>
    <div id="content3" class="toggle" style="display:none">
        <div class="row">
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">



                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Pickup Country</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Delivery Country</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <label>Weight</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i>KG</i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>L(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>H(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>B(cm)</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Value in INR</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>COD</label>
                            <div class="input-group">

                                <select class="form-control">

                                    <option>YES</option>
                                    <option>NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>select Category</label>
                            <div class="input-group">

                                <select class="form-control">
                                    <option>Product Category*</option>
                                    <option>Apparel And Accessories</option>
                                    <option>Automotives</option>
                                    <option>Baby Care</option>
                                    <option>Books And Stationery</option>
                                    <option>Consumables FMCG</option>
                                    <option>Documents</option>
                                    <option>Electronics</option>
                                    <option>Household Items</option>
                                    <option>Sports Equipments</option>
                                    <option>Covid Essentials</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Product Amount</label>
                            <div class="input-group">

                                <input type="text" class="form-control phone-number">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 col-md-6  ">
                    <div class="row">

                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary form-control">&nbsp;Calculate</i></a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary form-control" data-toggle="modal" data-target=".bd-example-modal-lg">&nbsp;Rate List</i></a>




                        </div>
                    </div>

                </div>



            </div>
            <div class="col-md-6">

                <div class="card-header">
                    <h4>Terms & Conditions:</h4>
                </div>
                <ul>
                    <li>I have read and received the merchant agreement. Request you to kindly acknowledge the below terms: </li>
                    <li>I have read and understood the shipping rates and services.</li>
                    <li>I understand that I should use only shipping labels (AWB’S) that are generated from the dashboard and not manual labels; use of manual labels will result in a fine of Rs. 500/-+ taxes.</li>
                    <li>I understand that sending of prohibited items and dangerous goods are not permissible and I shall abide by those restrictions.</li>
                    <li>I understand that there is a chance that pick-up services may face issues due to operational concerns of the courier company especially in case of new pickup locations.</li>
                    <li>I understand that the volumetric weight of my package could be higher than physical weight and agree to be billed for whichever is higher.</li>
                   
                    <details>
                        <summary>see all</summary>
                        <li>I understand that I will be liable for the freight charges and the return charges of a shipment if returned. I understand that there may be certain penalties or customs in case of international levied by carrier and I am liable to bear those taxes when required.</li>
                        <li>I understand that proper packaging of my products has to be done from my end. I shall be solely liable for any damage arising out of improper packaging.</li>
                        <li>I understand that additional government rules and norms can be applicable while shipping to certain states and subject to change without prior intimation and will abide by them.</li>
                        <li>I understand that MSDS is required for shipping liquid and semi-solid products and agree to furnish the same for every consignment that carries such products.</li>
                        <li>I also understand that liquid and semi-solid products cannot be sent via air and will be sent only through surface shipping.</li>
                        <li>I agree to declare the accurate weight and dimensions of my packages while scheduling shipments. I also agree that no dispute can be raised with respect to billing, due to incorrect entry of data while scheduling. Shipment will be billed as per slab & services selected.</li>
                        <li>I Understand that Proof of Delivery will not be provided after 30 days of Delivery.</li>
                        <li>I understand that I can’t raise disputes of any shipment beyond 7 days of bills being submitted. Disputes with respect to weight should be supported by image proof of the shipments. </li>
                    </details>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
</section>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myLargeModalLabel">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="card-header">
<h6>Pricing Plans</h6>
</div>
<div class="card-body">
<div class="table-responsive">
    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
        <thead>
            <tr>
                <th>Courier</th>
                <th>Weight </th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>E</th>
                <th>F</th>
                <th>COD</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Amazon</td>
                <td>Upto 250 Gram</td>
                <td>48</td>
                <td>53</td>
                <td>56</td>
                <td>57</td>
                <td>73</td>
                <td>73</td>
                <td>Cod</td>
            </tr>
            <tr>
                <td>Amazon</td>
                <td>Upto 0.5 Kg</td>
                <td>51</td>
                <td>57</td>
                <td>61</td>
                <td>61</td>
                <td>78</td>
                <td>78</td>
                <td>50|2.5%</td>
            </tr>

            <tr>
                <td>Amazon</td>
                <td>1 kg </td>
                <td>72</td>
                <td>89</td>
                <td>101</td>
                <td>111</td>
                <td>134</td>
                <td>134</td>
                <td>50|2.5%</td>
            </tr>
            <tr>
                <td>Amazon</td>
                <td>2 kg</td>
                <td>82.35</td>
                <td>109.35</td>
                <td>126.9</td>
                <td>154</td>
                <td>188</td>
                <td>188</td>
                <td>50|2.5%</td>
            </tr>
            <tr>
                <td>Amazon</td>
                <td>Additional Per 1 kg</td>
                <td>35</td>
                <td>39</td>
                <td>42</td>
                <td>47</td>
                <td>54</td>
                <td>54</td>
                <td>50|2.5%</td>
            </tr>
            <tr>
                <td>Amazon</td>
                <td>Up to 5 Kg</td>
                <td>198</td>
                <td>215</td>
                <td>231</td>
                <td>264</td>
                <td>297</td>
                <td>297</td>
                <td>50|2.5%</td>
            </tr>
            <tr>
                <td>Amazon</td>
                <td>Up to 10 Kg</td>
                <td>51</td>
                <td>57</td>
                <td>61</td>
                <td>61</td>
                <td>78</td>
                <td>78</td>
                <td>50|2.5%</td>
            </tr>
            <tr></tr>

        </tbody>
    </table>
    <h6>*GST Additional</h6>
</div>
</div>
</div>
<div class="modal-footer bg-whitesmoke br">

<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
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
<script src="{{asset('assets/js/app.min.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/datatables.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('assets/js/custom.js')}}"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>