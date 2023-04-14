

<style>
.one_bo {
  background:none !important;
}
.form_righ,.my-form-border {
    /* position: relative; */
    /* border-top: 10px solid #242f45; */
    border-top:none;
}
.contactuscontent{
  font-family: proxima-nova,sans-serif;
  /* font-size:21px */
}
</style>
<!-- <div class="clearfix" style="margin-bottom:120px;"></div> -->
<footer class="bg-10 form_area" id="team">
 <div class="container-fluid">
<!-- <div class="row" style="margin-top: -80px;"> -->
<div class="row" style="height:460px">
<div class="col-md-6" style="background:#1a1a1a;color: white;">
<div class="form_control_lef">

<div class="col-md-12 contactuscontent">
<!-- left -->
<div class="col-md-4" style="float:right">
  <h3 class="contactuscontent">Services</h3>
  <p>
    B2C
    <br>
    B2B
    <br>
    Document Delivery
    <br>
    Fulfillment
    <br>
    FTL/ LTL/ PTL
  </p>
</div>
<!-- left -->
<!-- Right -->
<div class="col-md-8" style="margin-top:50px">
  <h3 class="contactuscontent">Contact Details</h3>
  <p>
    <li class="fa fa-mobile" style="font-size:21px"></li>011 44123490
    <br>
    <li class="fa fa-watch" style="font-size:21px"></li>(9AM To 7PM)
    <br>
    <span style="font-size:15px"><li class="fa fa-envelope" style="font-size:18px"></li>customersupport@rappidx.com</span>
    <br>
  </p>
</div>
<!-- Right -->

</div>



<div class="col-md-12">
<div class="folow_head">
<div class="clearfix" style="margin-bottom:40px;"></div>

<div id="social" style="margin:0px;">
    <a class="facebookBtn smGlobalBtn" href="https://www.facebook.com/Rappidx-107554754773726/" target="_blank" style="background: #ffe141;"></a>
    <a class="twitterBtn smGlobalBtn" href="#" style="background: #ffe141;"></a>
    <!-- <a class="pinterestBtn smGlobalBtn" href="#" style="background: #ffe141;"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->
    <a class="fa fa-instagram smGlobalBtn" href="https://www.instagram.com/accounts/login/"  target="_blank" style="background:#ffe141;font-size:26px;width:40px !important;padding-top:5px"></a>
    <a class="linkedinBtn smGlobalBtn" href="https://www.linkedin.com/company/rappidx1/" target="_blank" style="background: #ffe141;"></a>
</div>



</div>
</div>



</div>
</div>


<style media="screen">
.my-form-border {
    border-top: 10px solid white !important;
}
.form_righ, .my-form-border {
    position: relative;
    border-top: 10px solid white !important;
    border-top: none;
}
.placecolor::placeholder {
  color: white;
}
.placecolor{
  color:white;
}

</style>


<div class="col-md-6 my-form-border" style="background:#1a1a1a;color: white;">



<form class="form_righ form_righ-2 form_right_me" style="background:#1a1a1a;color:white;">
<div class="form_hea form_head_me">
<!-- <h4 class="">Let's Talk</h4> -->
<p class="contactuscontent">Business Query <br>
    <span id="msgbox" style="color:gold"></span>
</p>
</div>
<div class="row come-e">
<div class="col-sm-6 p-b-25">
<div class="size-a-3 form_m form_me_me">
<input class="form-control nene wow slideInUp placecolor" type="text" name="YourName" id="YourName" placeholder="Your Name" required>
</div>
</div>

<div class="col-sm-6 p-b-25">
<div class="size-a-3 form_m form_me_me">
<input class="form-control nene wow slideInUp placecolor" type="text" name="CompanyName" id="CompanyName" placeholder="Company Name" required>
</div>
</div>


<div class="col-sm-6">
<div class="size-a-3 form_me">
  <input class="form-control fofo  wow slideInUp contactuscontent placecolor" required type="text" name="text" id="mobile" placeholder="Mobile">
</div>
</div>


<div class="col-sm-6 p-b-25">
	<div class="size-a-3 form_me" >
<input class="form-control fofo  wow slideInUp contactuscontent placecolor" required type="email" name="email1" id="email" placeholder="Email">
	</div>
</div>



<div class="col-sm-12 p-b-25">
<div class="size-a-3 form_m" >
<textarea class="form-control contactuscontent placecolor"  name="message" id="message" cols="58" rows="3" placeholder="Write Your Msg (If Any)"></textarea>
</div>
</div>

<div class="col-sm-12 p-b-25">
<div class="size-a-3 form_m form_me_submi" >

<input class="form-control fofo  wow slideInUp btn btn-warning contactuscontent" name="enq1" onclick="businessquery()" value="Submit" style="color:black;background-color:white">
</div>
</div>
</div>


<script type="text/javascript">
function businessquery(){

    var yname = $("#YourName").val();
    var cname = $("#CompanyName").val();
    var mobil = $("#mobile").val();
    var email = $("#email").val();
    var messg = $("#message").val();

if(yname != "" & cname != "" & mobil != "" & email != "") {
    // alert(yname);
    // alert(cname);
    // alert(mobil);
    // alert(email);
    // alert(messg);
    // alert("Valid email address!");
    $.ajax({
        type: "GET",
        url: "BusinessQuery/BusinessQuery.php",
        data:{yname:yname,cname:cname,mobil:mobil,email:email,messg:messg},
        success: function (data) {
            // alert(data);
            if(data == "Yes"){
                $("#msgbox").html('We Will Contact You Soon');
                $("#YourName").val("");
                $("#CompanyName").val("");
                $("#mobile").val("");
                $("#email").val("");
                $("#message").val("");
            }else{
                $("#msgbox").html('Please Try Again');
            }
        },
            error: function (data) {
            console.log('Error:', data);
        }
    });
        // $("#msgbox").html('We Will Contact You Soon');
return true;
} else {
$("#msgbox").html('Please Fill All Fileds');
// alert("Invalid email address!");
return false;
}

}
</script>

</form>




</div>


</div>
</div>
 </footer>

    <div class="container-fluid px-0 py-5 bg-black" style="background-color:#000000">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
    
<p class="mb-0" class="" style="color: rgba(255,255,255,.5);">
  <span class="contactuscontent" style="color:white">
    2022 © Rappidx Global Business Solutions Pvt. Ltd.
  </span>
</p>
            </div>
          </div>
        </div>
      </div>

<!--footer end-->


</div>

<!-- page wrapper end -->


<!--color-customizer start-->



<!--color-customizer end-->


<!--back-to-top start-->

<div class="scroll-top"><a class="smoothscroll" href="#top"><i class="flaticon-go-up-in-web"></i></a></div>

<!--back-to-top end-->


<!-- inject js start -->

<!--== jquery -->
<script src="js/jquery.3.3.1.min.js"></script>

<!--== popper -->
<script src="js/popper.min.js"></script>

<!--== bootstrap -->
<script src="js/bootstrap.min.js"></script>

<!--== appear -->
<script src="js/jquery.appear.js"></script>

<!--== modernizr -->
<script src="js/modernizr.js"></script>

<!--== easing -->
<script src="js/jquery.easing.min.js"></script>

<!--== menu -->
<script src="js/menu/jquery.smartmenus.js"></script>

<!--== owl-carousel -->
<script src="js/owl-carousel/owl.carousel.min.js"></script>

<!--== magnific-popup -->
<script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!--== counter -->
<script src="js/counter/counter.js"></script>

<!--== countdown -->
<script src="js/countdown/jquery.countdown.min.js"></script>

<!--== canvas -->

<!--== step animation -->
<script src="js/snap.svg.js"></script>
<script src="js/step.js"></script>

<!--== contact-form -->
<script src="js/contact-form/contact-form.js"></script>

<!--== validate -->
<script src="js/contact-form/jquery.validate.min.js"></script>

<!--== map api -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

<!--== map -->
<script src="js/map.js"></script>

<!--== wow -->
<script src="js/wow.min.js"></script>

<!--== color-customize -->
<script src="js/color-customize/color-customizer.js"></script>

<!--== theme-script -->
<script src="js/theme-script.js"></script>

<!-- inject js end -->

</body>
</html>
