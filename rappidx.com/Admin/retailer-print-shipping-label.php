<?php
  include "Layout_Header-retailer.php";
?>


<!--  Header  -->
<?php
  include "Layout_header-retailer-print-labels.php";
?>
<!--  Header  -->

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

<!--  topbar  -->
<?php
  include "retailer-header-topbar.php";
?>
<!--  topbar  -->


              <div class="main-sidebar sidebar-style-2">

<!--  Sidebar  -->
<?php
  include "retailer-sidebar.php";
?>
<!--  Sidebar  -->


</div>




   <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Print Shipping Labels</h4>

                                </div>
                                <div class="card-body">
                                    <div class="row">









    
    
    
<div class="col-md-12 ">
    <form method="post" action="Shipping_Labels_All.php" target="_blank">
<div class="pretty p-switch">
    <input type="checkbox" name="mobileshowornot" value="1">
    <div class="state p-primary">
        <label>Mobile Show</label>
    </div>
</div>
<div class="list-inline my-3 ">
    <textarea class="form-control" placeholder="Search Order Details Write AWB Number" name="shippinglabelawbno" class="my-5"><?= trim($ordernos) ?></textarea>
</div>
<div class="row">
<div class="col-md-3 my-3"> 
    <select class="form-control badge" name="printlabels">
        <option value="A6 Size New">Select Page Size</option>
        <option value="A4 Size">A4 Size</option>
        <option value="4X6 Size">4*6 Size</option>
        <option value="A6 Size">A6 Size</option>
        <option value="A6 Size New">A6 Size New</option>
</select>
</div>
<div class="col-md-2  my-3">
<div class="buttons ">
    
    <input type="submit" class="btn btn-primary form-control" value="Print">
<!--<a href="#" class="btn btn-primary form-control"><i class="fa fa-print">&nbsp;&nbsp;Print</i></a>-->
</div>
</div>
</div>
</form>

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


<!--  Footer  -->
<?php
  include "retailer-footer-bulk.php";
?>
<!--  Footer  -->
