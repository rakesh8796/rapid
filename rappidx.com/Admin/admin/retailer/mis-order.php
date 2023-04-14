<!--  Header  -->
<?php
  include "layout-retailer/header.php";
?>
<!--  Header  -->




<body>
  
  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      


<!--  topbar  -->
<?php
  include "layout-retailer/header-topbar.php";
?>
<!--  topbar  -->


     <div class="main-sidebar sidebar-style-2">

 <!--  Sidebar  -->
<?php
  include "layout-retailer/sidebar.php";
?>
<!--  Sidebar  -->


</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form action="#" >
  <div class="modal-dialog modal-dialog-centered" role="document">
   
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enter location Pincode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
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
      </div>
      <div class="modal-footer bg-whitesmoke br">
      <a href="book-single-order.php"> <button type="button" class="btn btn-primary">Save </button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
   
  </div>
  </form>
</div>     









<!-- Main Content -->
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
                            <!--<table class="table">-->
                            <!--    <thead>-->
                            <!--        <tr>-->
                            <!--            <th scope="col">S.NO</th>-->
                            <!--            <th scope="col">Date</th>-->
                            <!--            <th scope="col">Time</th>-->
                            <!--            <th scope="col">500GM</th>-->
                            <!--            <th scope="col">ALL</th>-->
                            <!--        </tr>-->
                            <!--    </thead>-->
                            <!--    <tbody>-->
                            <!--        <tr>-->
                            <!--            <th scope="row">1</th>-->
                            <!--            <td>2022-09-06</td>-->
                            <!--            <td>11:45AM</td>-->
                            <!--            <td > <a href="#" class="badge badge-warning">Download</a></td>-->
                            <!--            <td><a href="#"><i data-feather="arrow-down-circle" class="col-green"></i></i></a></td>-->
                            <!--        </tr>-->
                            <!--        <tr>-->
                            <!--            <th scope="row">2</th>-->
                            <!--            <td>2022-09-02 </td>-->
                            <!--            <td>9:52AM</td>-->
                            <!--            <td > <a href="#" class="badge badge-warning">Download</a></td>-->
                            <!--            <td><a href="#"><i data-feather="arrow-down-circle" class="col-green"></i></i></a></td>-->
                            <!--        </tr>-->
                            <!--        <tr>-->
                            <!--            <th scope="row">3</th>-->
                            <!--            <td>2022-09-01</td>-->
                            <!--            <td>1:14PM</td>-->
                            <!--            <td > <a href="#" class="badge badge-warning">Download</a></td>-->
                            <!--            <td><a href="#"><i data-feather="arrow-down-circle" class="col-green"></i></i></a></td>-->
                            <!--        </tr>-->
                            <!--    </tbody>-->
                            <!--</table>-->
                            


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Page Content -->


<script type="text/javascript">
$(document).ready(function(){
  // alert('work');
  $("#temvalue").html("Loading...");
  $.ajax({
  type: "GET",
  url: 'misreports/cmis.php',
  data:{val:"Today "},
  success: function (data){
    $("#last10daymisreports").html(data);
  },
  error: function (data) {
    console.log('Error:', data);
  }
  });
});
</script>


<section class="content" id="last10daymisreports">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <br>
  <div class="col-md-12 white-box fontweighlight" id="temvalue">
  </div>
  </div>
  </div>
  </div>
</section>




                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
</div>


    </div>
  </div>
  


<!--  Footer  -->
<?php
  include "layout-retailer/footer.php";
?>
<!--  Footer  -->