<!DOCTYPE html>
<html lang="en">


<!-- form-wizard.html  21 Nov 2019 03:55:16 GMT -->

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Rappidx</title>
<!-- General CSS Files -->
<link rel="stylesheet" href="assets/css/app.min.css">
<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">

<!-- Custom style CSS -->
<link rel="stylesheet" href="assets/css/custom.css">
<link rel='shortcut icon' type='image/x-icon' href='assets/img/reppidxlogoicon.png'/>


</head>
<style>

</style>

<body>
<div class="loader"></div>
<div id="app">
<div class="main-wrapper main-wrapper-1">
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
<div class="form-inline mr-auto">
<ul class="navbar-nav mr-3">
<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
collapse-btn"> <i data-feather="align-justify"></i></a></li>
<li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
<i data-feather="maximize"></i>
</a></li>
<li>
<form class="form-inline mr-auto">
<div class="search-element">
<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
<button class="btn" type="submit">
<i class="fas fa-search"></i>
</button>
</div>
</form>
</li>
</ul>
</div>
<ul class="navbar-nav navbar-right">
<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
<span class="badge headerBadge1">
6 </span> </a>
<div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
<div class="dropdown-header">
Messages
<div class="float-right">
<a href="#">Mark All As Read</a>
</div>
</div>
<div class="dropdown-list-content dropdown-list-message">
<a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
text-white"> 
<img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">

</span> <span class="dropdown-item-desc"> <span class="message-user">John
Deo</span>
<span class="time messege-text">Please check your mail !!</span>
<span class="time">2 Min Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
<img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
</span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
Smith</span> <span class="time messege-text">Request for leave
application</span>
<span class="time">5 Min Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
<img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
</span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
Ryan</span> <span class="time messege-text">Your payment invoice is
generated.</span> <span class="time">12 Min Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
<img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
</span> <span class="dropdown-item-desc"> <span class="message-user">Lina
Smith</span> <span class="time messege-text">hii John, I have upload
doc
related to task.</span> <span class="time">30
Min Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
<img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
</span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
Joshi</span> <span class="time messege-text">Please do as specify.
Let me
know if you have any query.</span> <span class="time">1
Days Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
<img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
</span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
Smith</span> <span class="time messege-text">Client Requirements</span>
<span class="time">2 Days Ago</span>
</span>
</a>
</div>
<div class="dropdown-footer text-center">
<a href="#">View All <i class="fas fa-chevron-right"></i></a>
</div>
</div>
</li>
<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
</a>
<div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
<div class="dropdown-header">
Notifications
<div class="float-right">
<a href="#">Mark All As Read</a>
</div>
</div>
<div class="dropdown-list-content dropdown-list-icons">
<a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
fa-code"></i>
</span> <span class="dropdown-item-desc"> Template update is
available now! <span class="time">2 Min
Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
fa-user"></i>
</span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
Sugiharto</b> are now friends <span class="time">10 Hours
Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
fa-check"></i>
</span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
Hours
Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
</span> <span class="dropdown-item-desc"> Low disk space. Let's
clean it! <span class="time">17 Hours Ago</span>
</span>
</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
fa-bell"></i>
</span> <span class="dropdown-item-desc"> Welcome to Otika
template! <span class="time">Yesterday</span>
</span>
</a>
</div>
<div class="dropdown-footer text-center">
<a href="#">View All <i class="fas fa-chevron-right"></i></a>
</div>
</div>
</li>
<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
<div class="dropdown-menu dropdown-menu-right pullDown">
<div class="dropdown-title">Hello Sarah Smith</div>
<a href="profile.html" class="dropdown-item has-icon"> <i class="far
fa-user"></i> Profile
</a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
Activities
</a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
Settings
</a>
<div class="dropdown-divider"></div>
<a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
Logout
</a>
</div>
</li>
</ul>
</nav>




<!-- sidebar -->
<?php include 'sidebar.php'; ?>
<!-- sidebar -->



<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="section-body">
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="card-header">
    <h4>BOOK NEW ORDER</h4>
</div>
<div class="card-body">
    <form id="wizard_with_validation" method="POST">
        <h3> Product Details</h3>
        <fieldset>
            <div class="form-group form-float">
                <div class="form-line">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">

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
                        <div class="col-md-4">
                            <div class="form-group">

                                <select class="form-control">
                                    <option>Product Sub Category*</option>
                                    <option>Apparel And Accessories</option>
                                    <option>Automotives</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><select class="form-control">
                                    <option>Additional Details*</option>
                                    <option>General</option>
                                    <option>Dengerous Goods</option>
                                    <option>Extra Care</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Payment Mode*</label>
                            <div class="form-group">
                                <select class="form-control" id="cboOptions" onchange="showDiv('div',this)">


                                    <option value="1">Prepaid</option>
                                    <option value="2">COD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 " id="div2" style="display:none;"><label class="form-label">COD Amount*</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                        <div class="col-md-3"><label class="form-label">Actual Weight*</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Travel Mode*</label>
                            <div class="form-group">
                                <select class="form-control" >


                                    <option value="1">Surface Travel</option>
                                    <option value="2">Air Travel</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Packet Length*</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                        <div class="col-md-3"><label class="form-label">Packet Breadth *</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                        <div class="col-md-3"><label class="form-label">Packet Height*</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                        <div class="col-md-3"><label class="form-label">Volumetric Wt.*</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">No of Quantity*</label>
                            <input type="text" class="form-control" name="" required>
                        </div>
                        <div class="col-md-3"><label class="form-label">Invoice Value*</label>
                            <input type="text" class="form-control" value="Invoice Value">

                        </div>

                    </div>
                </div>


        </fieldset>
        <h3>Pickup Details and Destination Details</h3>
        <fieldset>
            <div class="form-group form-float">
                <h4>Pickup Details</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>
                    <div class="col-md-6"><label class="form-label">Mobile *</label>
                        <input type="text" class="form-control" name="" required>

                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Address *</label>
                        <textarea class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">State*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>
                    <div class="col-md-3"><label class="form-label">City*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>
                    <div class="col-md-3"><label class="form-label">Pincode*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>

                </div>
            </div>
            <div class="form-group form-float">
                <h4>Droppoint/ Destination Details</h4>

                <div class="form-group form-float">
                    <h4></h4>
                    <div class="form-line">
                        <label class="form-label">Address *</label>
                        <textarea class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>
                    <div class="col-md-6"><label class="form-label">Mobile *</label>
                        <input type="text" class="form-control" name="" required>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">State*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>
                    <div class="col-md-3"><label class="form-label">City*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>
                    <div class="col-md-3"><label class="form-label">Pincode*</label>
                        <input type="text" class="form-control" name="" required>
                    </div>

                </div>
            </div>


        </fieldset>
        <h3>Select Courier Services</h3>
        <fieldset>
            <div class="col-12 col-md-12 col-lg-12">

                <div class="card-header">
                    <h4>Select Courier Services</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>Courier</th>
                                <th>Weight </th>
                                <th>Travel <br> Mode</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>
                                <th>F</th>
                                <th class="text-center">COD
                                    <br>
                                    CHARGES
                                </th>
                                <th>COD %</th>
                                <th >Agent Fee</th>
                                <th>Booking</th>

                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>Upto 250 Gram</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>57</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>Upto 0.5 Kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>1kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>2kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>3kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>4kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>5kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>5kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>6kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>10kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1" form-control></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>12kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>16kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>20kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>25kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>
                            <tr>
                                <td>Amazon</td>
                                <td>30kg</td>
                                <td>air</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                                <td>73</td>
                                <td>73</td>
                                <td>73</td>
                                <td>50</td>
                                <td>2.5%</td>
                                <td ><input type="number" value="1"></td>
                                
                                <td><a href="#" class="btn btn-primary" require>Book</a></td>
                            </tr>

                           
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>


        </fieldset>
    </form>
</div>
</div>
</div>
</div>
</div>
</section>

</div>
<footer class="main-footer">
<div class="footer-left">
<a href="templateshub.net">Templateshub</a></a>
</div>
<div class="footer-right">
</div>
</footer>
</div>
</div>
<script>
function showDiv(prefix, chooser) {
var selectedOption = (chooser.options[chooser.selectedIndex].value);
if (selectedOption == "2") {
var div = document.getElementById(prefix + "2");
div.style.display = 'block';
} else {
var div = document.getElementById(prefix + "2");
div.style.display = 'None';
}
}
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


<!-- form-wizard.html  21 Nov 2019 03:55:20 GMT -->

</html>