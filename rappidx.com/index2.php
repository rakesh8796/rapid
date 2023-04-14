<?php 
  include 'Header.php';
?>






<!-- <section id="home" class="p-0 text-center wow fadeInUp" data-wow-duration="2s"> -->
<!-- Banner Add -->


<!-- <section id="home" class="fullscreen-banner banner p-0 bg-contain bg-pos-l" data-bg-img="images/bg/21.png"> -->
<section id="home" class="fullscreen-banner banner p-0 bg-contain bg-pos-l" data-bg-img="images/header/Header31.png">
<!-- <section id="home" class="fullscreen-banner banner p-0 bg-contain bg-pos-l" data-bg-img="images/header/Header3.png"> -->


  <!--<div class="spinner-eff">
    <div class="spinner-circle circle-1"></div>
    <div class="spinner-circle circle-2"></div>
  </div>-->
 <!-- <div class="align-center pt-0" style="margin-top:-1px"> -->
 <div class="align-center" style="">
    <div class="container">
      <div class="row align-items-center">

        <!-- <div class="col-lg-7 col-md-12 order-lg-1 md-mt-5">
          <h1 class="mb-4 wow fadeInUp" data-wow-duration="1.5s" style="font-size:55px;font-family: fantasy;">WE DELIVER</h1>
          <ul class="li-styl">
          <li style="font-size:19px">B2C/B2B Shipping</li> <br>
          <li style="font-size:19px">Complete Ecommerce logistics solutions</li>
          <li style="font-size:19px">Retailers logistics solutions</li>
          </ul>
        </div>
        <div class="col-lg-5 col-md-12 order-lg-1">
            <img class="img-center wow jackInTheBox" data-wow-duration="3s" src="images/banner/banner-web-desing.png" alt="">
        </div> -->
        <div class="col-md-12 headerbar text-center">


<!-- <h1 style="font-family: 'Oswald', sans-serif;font-size: 50px;font-weight: 700;">LEADING END TO END LOGISTICS SOLUTIONS</h1> -->

<h1 style="font-family: 'Montserrat';font-size: 50px;font-weight: 700;color:#1a1a1a">LEADING END TO END LOGISTICS SOLUTIONS</h1>

<h1 style="font-family: 'Montserrat';font-weight: 700;margin-top:0px;color:#1a1a1a">&</h1>
<h2 style="font-family: 'Montserrat';font-size:30px;font-weight: 700;color:#1a1a1a">GROW YOUR E-COMMERCE BUSINESS</h2>
<p style="font-family: 'Montserrat';font-size:21px;font-weight:700;color:#1a1a1a"> 18+ Reliable Courier Partners & 29000 + Pincodes Pan India</p>
        </div>





<style>
.home-newsletter {
/* padding: 80px 0;
background: #f84e77; */
}

.home-newsletter .single {
max-width: 650px;
margin: 0 auto;
text-align: center;
position: relative;
z-index: 2; }
.home-newsletter .single h2 {
font-size: 22px;
color: white;
text-transform: uppercase;
margin-bottom: 40px; }
.home-newsletter .single .form-control {
height: 50px;
background: rgba(255, 255, 255, 0.6);
border-color: transparent;
border-radius: 20px 0 0 20px; }
.home-newsletter .single .form-control:focus {
box-shadow: none;
border-color: #243c4f; }
.home-newsletter .single .btn {
min-height: 50px; 
border-radius: 0 20px 20px 0;
background: #243c4f;
color: #fff;
font-family: 'Montserrat';font-weight:700;
}
</style>


    <div class="col-lg-6 col-md-6">

      <section class="home-newsletter">
        <div class="container">
        <div class="row">
        <div class="col-sm-12">
          <div class="single">
              
            <form action="Signup.php" method="post">
            <div class="input-group" id="Changeabletext">
                 <input type="email" class="form-control" id="text1" name="text1" placeholder="Enter your email" style="font-family: 'Montserrat';font-weight:700;">
                 <span class="input-group-btn">
                 <button class="btn btn-theme" type="submit">Sign Up For Free</button>
                 <!--<button class="btn btn-theme" type="submit" onclick="ValidateEmail()">Sign Up For Free</button>-->
                 </span>
            </div>
            </form>
            
            
          </div>
        </div>
        </div>
        </div>
      </section>
<script type="text/javascript">
function ValidateEmail() {
  var input = $("#text1").val();
  // alert(input);
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (input.match(validRegex)) {
    // alert("Valid email address!");
      $.ajax({
        type: "GET",
        url: "Newuser.php",
        data:{email:input},
        success: function (data) {
          // alert(data);
          if(data == "Yes"){
            $("#Changeabletext").html("<center><span style='color:#243c4f'><b>We Contact Very Soon</b></span></center>");
          }else{
            $("#text1").val('Try Again');
          }
          // $("#Selected_Clients").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    return true;
  } else {
    // alert("Invalid email address!");
    $("#text1").val('Try Again');
    return false;
  }
}

// function newuser(){
//   var a = $("#clienttypecheck").val(param);
//
//   $.ajax({
//     type: "GET",
//     url: "{{ asset('/ENew_Order_Clients') }}",
//     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//     data:{param:param},
//     success: function (data) {
//       $("#Selected_Clients").html(data);
//     },
//     error: function (data) {
//       console.log('Error:', data);
//     }
//   });
// }
</script>      
    </div>
    <div class="col-lg-6 col-md-6">
     
       
      <section class="home-newsletter">
        <div class="container">
        <div class="row">
        <div class="col-sm-12">
          <div class="single">
            <!-- <h2>Subscribe to our Newsletter</h2> -->

<form action="Tracking.php" method="post">
    <div class="input-group">
    <input type="text" class="form-control" name="airwaybillnumber" placeholder="Enter Your Tracking Number" style="font-family: 'Montserrat';font-weight:700">
    <span class="input-group-btn">
      <input type="submit" class="btn btn-theme" name="TrackOrder" value="Track Order">
      <!-- <button  type="submit">Track Order</button> -->
    </span>
    </div>
</form>
            
          </div>
        </div>
        </div>
        </div>
      </section>

    </div>




      </div>
    </div>
  </div>
</section>




<!--feature start-->
<section style="padding:10px">
<div class="container-fluid">
<div class="row">


<div class="row">

  <div class="col-md-3">
    <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon text-center">
          <img src="images/MyPics/Icons/Lowest Rate.jpg" style="width:95%;height:150px;border-radius:1%;margin-top:-38px;">
        </div>
         <p>&nbsp;</p>
        <div class="featured-title">
          <h5 class="featurestart">Lowest Shipping Rate</h5>
        </div>
        <div class="featured-desc">
          <!-- <p>We customise the best rate for your business growth. </p> 
          -->
          <p>
            We provide cheapest, safest and reliable courier service anytime and anywhere in the India. We customize the best rate according to the product needs helps you to scale and grow your business. We are the best choice to reach every nook and corner with affordable rates.
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
          </p>
        </div>
      </div>
    </div>
  </div>




  <div class="col-md-3">
<div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon">
                <img src="images/MyPics/Icons/origin.jpg" style="width:99%;height:150px;border-radius:1%;margin-top:-38px;">
              </div>
              <div class="featured-title"><br>
                <h5 class="featurestart">Reduces RTO</h5>
              </div>
              <div class="featured-desc">
                <!-- <p>Intelligence System to monitor every shipment while out for delivery. And ensure real clouser to avoid false RTO. </p> -->
                <p>
                  Reducing returns is the most important aspect for any ecommerce business to maintain high margins. Our well planned NDR management system ensure monitoring each and every shipment while out for delivery and Safeguard the productivity to stop false remarks.
                  &ensp; <br>
                  &ensp; <br>
                  &ensp; <br>
                  &ensp; <br>
                  &ensp; <br>
                  &ensp; <br>
                  &ensp; <br>
                </p>
              </div>
            </div>
          </div>
  </div>



    <div class="col-md-3">
     <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon">
           <img src="images/MyPics/Icons/weight.jpg" style="width:99%;height:150px;border-radius:1%;margin-top:-38px;">
        </div>
        <div class="featured-title"><br>
          <h5 class="featurestart">Easy Weight Reconcilation</h5>
        </div>
        <div class="featured-desc">
          <!-- <p>Our smart & intelligent process system of higher weight cases to fix all the disputes while shippiments are intrasnsits and charge acccutal weight what you ship.</p> -->
          <p>
            In order to verify that the correct amount is charged during the shipping process, it is necessary to ensure that the weight is accurately calculated for all types of shipments. Rappidx’s weight reconciliation process verify shipping weight to ensure that there are no discrepancies, thereby avoiding a loss in revenue due to unnecessary charges.
            &ensp; <br>
            &ensp; <br>
          </p>
        </div>
      </div>
    </div>
  </div>



<div class="col-md-3">
    <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon text-center">
          <img src="images/MyPics/Icons/api.png" style="width:99%;height:150px;border-radius:1%;margin-top:-38px;">
        </div>
        <div class="featured-title"><br>
          <h5 class="featurestart">API Integration / Plugins </h5>
        </div>
        <div class="featured-desc">
          <p>
            Rappidx has multiple platforms of channel integration to help developers transfer information from one software to another and then use this data in a single user interface. APIs work as an extensible platform that integrates with various solutions so that companies can take advantage of their existing functionality without building features from scratch.
          </p>
        </div>
      </div>
    </div>
  </div>

</div>
<br>
<div class="row">

<div class="col-md-3">
    <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon text-center"><br><br>
          <img src="images/MyPics/Icons/ship.png" style="width:99%;height:150px;border-radius:1%;margin-top:-80px;">
        </div>
        <div class="featured-title">
          <h5 class="featurestart">Ship Anything- Anywhere</h5>
        </div>
        <div class="featured-desc">
          <p>
            We pack and ship anything and anywhere. Sign up for free and start shipping. All we need is product and order details of your package and we will get back to you with an estimate on your best shipping options.
            &ensp; <br>
            &ensp; <br>
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-3">
    <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon text-center">
          <img src="images/MyPics/Icons/dashboard.jpg" style="width:99%;height:150px;border-radius:1%;margin-top:-38px;">
        </div>
        <div class="featured-title">
          <h5 class="featurestart">Single Dashboard </h5>
        </div>
        <div class="featured-desc">
          <p>
            Single dashboard for all your shipping needs plays a very crucial role. We enable businesses to automate their logistics and increase shipping efficiency by providing a single window platform integrated with multiple carriers.
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
          </p>
        </div>
      </div>
    </div>
  </div>



  <div class="col-md-3">
    <div class="item">
        <div class="featured-item style-2">
          <div class="featured-icon">
             <img src="images/MyPics/Icons/cod.png" style="width:99%;height:150px;border-radius:1%;margin-top:-38px;">
          </div>
          <div class="featured-title">
            <h5 class="featurestart">Timely COD Remittance</h5>
          </div>
          <div class="featured-desc">
            <p>
              <!-- Timely COD Remittance in your account of delivered cases as per the cycle. -->
              COD rotation is very important for any seller to balance their business transactions. Rappidx ensure timely COD remittance in seller’s bank account as per the cycle and give you freedom to scale your business.
              &ensp; <br>
              &ensp; <br>
            </p>
          </div>
        </div>
      </div>
  </div>


    <div class="col-md-3">
<div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon">
                <img src="images/MyPics/Icons/tracking.jpg" style="width:99%;height:150px;border-radius:1%;margin-top:-38px;">
              </div>
              <div class="featured-title">
                <h5 class="featurestart">Real Time Tracking</h5>
              </div>
              <div class="featured-desc">
                <p>
                    It offers users real time location updates, every few seconds i.e.  a GPS tracking device sends its location to the end user at a consistently high frequency.Get the real time tracking of your shipment by our track window & via MIS and Pickup report.
                    &ensp; <br>
                    &ensp; <br>
                </p>
              </div>
            </div>
          </div>
  </div>

</div>

<br>

<!-- <div class="row">

  <div class="col-md-3">
    <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon text-center">
          <img src="images/MyPics/Icons/prod13.gif" style="width:75%;border-radius:20%;margin-top:-38px;">
        </div>
         <p>&nbsp;</p>
        <div class="featured-title">
          <h5 class="featurestart">Multiple courier </h5>
        </div>
        <div class="featured-desc">
          <p>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
            &ensp; <br>
          </p>
        </div>
      </div>
    </div>
  </div>



  <div class="col-md-3">
    <div class="item">
      <div class="featured-item style-2">
        <div class="featured-icon text-center">
          <img src="images/MyPics/Icons/prod13.gif" style="width:75%;border-radius:20%;margin-top:-38px;">
        </div>
         <p>&nbsp;</p>
        <div class="featured-title">
          <h5 class="featurestart">Same Day Delivery / Next Day Delivery </h5>
        </div>
        <div class="featured-desc">
          <p>
            We provide same day or next day delivery service anywhere in India in affordable price. Make your customer feel the happiness via early delivery at their door step beyond expectations. Our primary goal is to deliver best services to the people all across.
          </p>
        </div>
      </div>
    </div>
  </div>





</div> -->



</div>
</section>
<!-- <section>
<div class="page-content">
<style>
.featurestart{
  font-family: proxima-nova,sans-serif;
  /* color:black */
}
</style>
  <div class="container-fluid">
    <div class="row custom-mt-10 z-index-1 md-mt-0">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme" data-dots="false" data-items="4" data-lg-items="3" data-md-items="2" data-sm-items="1" data-autoplay="true">
          <div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon text-center">
                <img src="images/MyPics/Icons/prod13.gif" style="width:75%;border-radius:20%;margin-top:-38px;">
              </div>
			         <p>&nbsp;</p>

              <div class="featured-title">
                <h5 class="featurestart">Lowest Rate</h5>
              </div>
              <div class="featured-desc">
                <p>We customise the best rate for your business growth. </p>
              </div>
            </div>
          </div>
		  <div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon">
			           <img src="images/MyPics/Icons/prod14.gif" style="width:100%;border-radius:20%;margin-top:-38px;">
              </div>
              <div class="featured-title">
                <h5 class="featurestart">Weight Reconcilation</h5>
              </div>
              <div class="featured-desc">
                <p>Our smart & intelligent process system of higher weight cases to fix all the disputes while shippiments are intrasnsits and charge acccutal weight what you ship.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon">
			           <img src="images/MyPics/Icons/load1.gif" style="width:100%;border-radius:20%;margin-top:-38px;">
              </div>
              <div class="featured-title">
                <h5 class="featurestart">COD Remittance</h5>
              </div>
              <div class="featured-desc">
                <p>Timely COD Remittance in your account of delivered cases as per the cycle.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon">
                <img src="images/MyPics/Icons/prod12.gif" style="width:75%;border-radius:20%;margin-top:-38px;">
              </div>
              <div class="featured-title">
                <h5 class="featurestart">Reduces RTO</h5>
              </div>
              <div class="featured-desc">
                <p>Intelligence System to monitor every shipment while out for delivery. And ensure real clouser to avoid false RTO. </p>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="featured-item style-2">
              <div class="featured-icon">
                <img src="images/MyPics/Icons/prod12.gif" style="width:75%;border-radius:20%;margin-top:-38px;">
              </div>
              <div class="featured-title">
                <h5 class="featurestart">Real Time Tracking</h5>
              </div>
              <div class="featured-desc">
                <p>Get the real time tracking of your shipment by our track window & via MIS and Pickup report. </p>
              </div>
            </div>
          </div>

        </div>

		<script>
		var itm=1;
		setInterval(function() {
			if(itm==1){
				$('#clorTime').addClass('clr1');
				$('#clorTime').removeClass('clr2');
				$('#clorTime').removeClass('clr3');
				itm=2;
			} else if(itm==2) {
				$('#clorTime').addClass('clr2');
				$('#clorTime').removeClass('clr1');
				$('#clorTime').removeClass('clr3');
				itm=3;
			} else {
				$('#clorTime').addClass('clr3');
				$('#clorTime').removeClass('clr1');
				$('#clorTime').removeClass('clr2');
				itm=1;
			}
		}, 5000);
		</script>

      </div>
    </div>
  </div>
</section> -->
<!--feature end-->




<!-- About Us Similar -->

<!-- About Us Similar -->


<!--step start-->
<style>
.howto{
  font-family: proxima-nova,sans-serif;
  /* font-size:18px */
}
.howtohead{
  font-family: proxima-nova,sans-serif;
  /* font-size:21px */
}
</style>
<section id="workflow" class="text-center pos-r">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-10 ml-auto mr-auto">
        <div class="section-title">
          <div class="title-effect">
            <div class="bar bar-top"></div>
            <div class="bar bar-right"></div>
            <div class="bar bar-bottom"></div>
            <div class="bar bar-left"></div>
          </div>
          <h6 class="howtohead">How Rappidx Works</h6>
        <!--  <h2 class="title">Three Simple Step To Started Working Process</h2>-->
        </div>
      </div>
    </div>
    <div class="row">
      <div id="svg-container">
        <svg id="svgC" width="100%" height="100%" viewBox="0 0 620 120" preserveAspectRatio="xMidYMid meet"></svg>
      </div>
      <div class="col-lg-3 col-md-12">
        <div class="work-process">
          <div class="box-loader"> <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="step-num-box">
            <!-- <div class="step-icon"><span><i class="la la-lightbulb-o"></i></span>
            </div>
            <div class="step-num">01</div>  -->
            <img src="images/MyPics/howtowork/hw1.gif" style="width:200px;height:200px;border-radius:20px">
          </div>
          <div class="step-desc">
            <!-- <h4>Analyse</h4> -->
            <p class="mb-0 howto">Push Your Orders via API / Excel file upload / Plugins</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-12 md-mt-5">
        <div class="work-process">
          <div class="box-loader"> <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="step-num-box">
            <!-- <div class="step-icon"><span><i class="la la-rocket"></i></span>
            </div>
            <div class="step-num">02</div> -->
            <img src="images/MyPics/howtowork/load6.gif" style="width:200px;height:200px;border-radius:20px">
          </div>
          <div class="step-desc">
            <!-- <h4>Design & Development</h4> -->
            <p class="mb-0 howto">Print Shipping Lables and Dispatch</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-12 md-mt-5">
        <div class="work-process">
          <div class="box-loader"> <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="step-num-box">
            <!-- <div class="step-icon"><span><i class="la la-rocket"></i></span>
            </div>
            <div class="step-num">02</div> -->
            <img src="images/MyPics/howtowork/load5.gif" style="width:200px;height:200px;border-radius:20px">
          </div>
          <div class="step-desc">
            <!-- <h4>Design & Development</h4> -->
            <p class="mb-0 howto">Track your Shipment Updates in Real Time</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-12 md-mt-5">
        <div class="work-process">
          <div class="step-num-box">
            <!-- <div class="step-icon"><span><i class="la la-check-square"></i></span>
            </div>
            <div class="step-num">03</div> -->
            <img src="images/MyPics/howtowork/load7.gif" style="width:200px;height:200px;border-radius:20px">
          </div>
          <div class="step-desc">
            <!-- <h4>Deliver</h4> -->
            <p class="mb-0 howto">Monitor your Performance & growth from Dashboard</p>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

<!--step end-->



<!--feature start-->

<style>
.featured-item::before {
  transform: scale(0);
  background: gold;
  /* background: linear-gradient(180deg, rgba(0,91,234,1) 0%, rgba(37,117,252,1) 80%); */
  content: "";
  display: block;
  height: 100%;
  left: 0;
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: -1;
}
</style>
<style>
.whychoosecontenthead{
  color:black !important;
  font-family: proxima-nova,sans-serif;
}
.whychoosecontent{
  color:#000000a6 !important;
  font-family: proxima-nova,sans-serif;
}
</style>

<section id="service" class="service pos-r bg-effect o-hidden">
  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-lg-6 col-md-10 ml-auto mr-auto">
        <div class="section-title">
          <div class="title-effect">
            <div class="bar bar-top"></div>
            <div class="bar bar-right"></div>
            <div class="bar bar-bottom"></div>
            <div class="bar bar-left"></div>
          </div>
          <h6>WHY CHOOSE US</h6>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <!-- <div class="col-lg-4 col-md-12 order-lg-12 image-column right">
        <div class="blink-img">
          <img class="img-fluid blinkblink" src="images/pattern/04.png" alt="">
        </div>
        <img class="img-fluid z-index-1 w-100" src="images/MyPics/banners/mee3.gif" alt="">
      </div> -->
      <!-- <div class="col-lg-8 col-md-12 md-mt-5 order-lg-1"> -->
      <div class="col-lg-12 col-md-12 md-mt-5 order-lg-1">
        <div class="row">
          <div class=" col-md-4">
            <div class="featured-item style-3">
              <div class="featured-icon">
				<img src="images/icon/web_design.png" alt="" style=" width: 78px;"/>
              </div>
              <div class="featured-title">
                <h5 class="whychoosecontenthead">Hassle-free orders booking process</h5>
              </div>
              <div class="featured-desc">
                <p class="whychoosecontent">Book orders from a easy and hassle free single order management system. <!--We satisfy the needs of your requirement of creating a high quality website with creative design at very competitive cost. We have designed some of the finest dynamic websites for many small and medium-sized companies.--></p>
              </div>
            </div>
          </div>
          <div class=" col-md-4">
            <div class="featured-item style-3">
              <div class="featured-icon">
                <img src="images/icon/web_development.gif" alt="" style=" width: 78px;"/>
              </div>
              <div class="featured-title">
                <h5 style="font-size:19px;" class="whychoosecontenthead">Multiple pickup locations</h5>
              </div>
              <div class="featured-desc">
                <p class="whychoosecontent">We have available multiple pickup locations for orders from PAN level in india.
                  &ensp; <br>
                  &ensp; <br>
                </p>
              </div>
            </div>
          </div>

          <div class=" col-md-4">
            <div class="featured-item style-3">
              <div class="featured-icon">

				<img src="images/icon/digital_marketing.png" alt="" style=" width: 78px;"/>
              </div>
              <div class="featured-title">
                <h5 class="whychoosecontenthead">Automated Courier Allocation</h5>
              </div>
              <div class="featured-desc">
                <p class="whychoosecontent">We have an intelligent system for courier allocation which allows shipment easier.
                  &ensp; <br>
                  &ensp; <br>
                </p>
              </div>
            </div>
          </div>
            <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class=" col-md-4">
            <div class="featured-item style-3">
              <div class="featured-icon">

				<img src="images/icon/app_development.png" alt="" style="    width: 78px;"/>
              </div>
              <div class="featured-title">
                <h5 class="whychoosecontenthead">NDR Management</h5>
              </div>
              <div class="featured-desc">
                <p class="whychoosecontent">Undelivered orders are no more a nightmares, we have smart solution for related entities.
                &ensp; <br>
                &ensp; <br>
                &ensp; <br>
                </p>
              </div>
            </div>
          </div>

          <div class=" col-md-4">
            <div class="featured-item style-3">
              <div class="featured-icon">

				<img src="images/icon/content_writing.png" alt="" style="    width: 78px;"/>
              </div>
              <div class="featured-title">
                <h5 class="whychoosecontenthead">Zero Monthly Subscription Charge</h5>
              </div>
              <div class="featured-desc">
                <p class="whychoosecontent">Rappidx provides service to open and register account without any monthly subscription, Only Pay when you Ship.
                &ensp; <br>
                &ensp; <br>
                </p>
              </div>
            </div>
          </div>

          <div class=" col-md-4">
            <div class="featured-item style-3">
              <div class="featured-icon">

				<img src="images/icon/other_service.png" alt="" style=" width: 78px;"/>
              </div>
              <div class="featured-title">
                <h5 class="whychoosecontenthead">Best team support</h5>
              </div>
              <div class="featured-desc">
                <p class="whychoosecontent">Experience the best customer support from Rappidx via our experienced & qualified team. Dedicated account manager assigns and, in your reach just a call away.
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!--feature end-->

<!--about start-->
<style>
.abouthead{
  font-family: proxima-nova,sans-serif;
  /* font-size:18px */
}
.aboutcontet{
  font-family: proxima-nova,sans-serif;
  /* font-size:21px */
}
</style>
<section id="about" class="pos-r bg-contain bg-pos-l py-10" data-bg-img="">

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 col-md-12 image-column p-0 pr-lg-5">
        <div class="zoom">
            <div class="box-loader">
          <span></span>
          <span></span>
          <span></span>
        </div>
            <img class="img-center" src="images/MyPics/about/load2.gif" alt="" style="width:100%;border-radius:30%">
        </div>
      </div>
      <div class="col-lg-5 ml-auto col-md-12 md-mt-5">
        <div class="section-title mb-4">
          <div class="title-effect">
            <div class="bar bar-top"></div>
            <div class="bar bar-right"></div>
            <div class="bar bar-bottom"></div>
            <div class="bar bar-left"></div>
          </div>
          <h6 class="abouthead">About Us</h6>

        </div>
       <p class="aboutcontet">We are here to serve you better than anything. Pick and drop your orders with smart and intelligent system. We have highest pincode reach with multiple pickup locations. Our Easy and hassle-free orders booking process reduces stress from ecommerce as well as other logistics operations. Rappidx provides a End-To-End Logistics Solution.<br>

</p>
      </div>
    </div>
  </div>
</section>

<!--about end-->








<!-- Courir Partners -->
<section>
<div class="page-content">
<style>
.featurestart{
  font-family: proxima-nova,sans-serif;
  /* color:black */
}

/*.featured-item.style-2 {
    padding: 0px !important;
    background: #ffffff;
    overflow: inherit;
}

.owl-carousel .featured-item {
    margin:0px;
}*/
</style>

<div class="row text-center">
<div class="col-lg-6 col-md-10 ml-auto mr-auto">
  <div class="section-title">
    <div class="title-effect">
      <div class="bar bar-top"></div>
      <div class="bar bar-right"></div>
      <div class="bar bar-bottom"></div>
      <div class="bar bar-left"></div>
    </div>
    <h6>Courier Partners</h6>
  </div>
</div>
</div>

  <div class="container-fluid">
    <div class="row z-index-1">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme" data-dots="false" data-items="6" data-lg-items="3" data-md-items="2" data-sm-items="1" data-autoplay="true">
          <div class="item">
            <!-- <div class="featured-item style-2"> -->
            <div>
              <div class="featured-icon text-center">
                <img src="images/Partners/delhivery.jpg" style="height:100px;width:150px">
              </div>
            </div>
          </div>


          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                 <img src="images/Partners/ecom.png" style="height:100px;width:120px">
              </div>
            </div>
          </div>
          
          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                 <img src="images/Partners/amazon.jpeg" style="height:100px;width:150px">
              </div>
            </div>
          </div>

          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                <img src="images/Partners/ejart.jpg" style="height:100px;width:120px">
              </div>
            
            </div>
          </div>

          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                <img src="images/Partners/fedex.png" style="height:100px;width:120px">
              </div>
            </div>
          </div>

          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                <img src="images/Partners/xpressbee.jpg" style="height:100px;width:150px">
              </div>
            </div>
          </div>

          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">&nbsp;&nbsp;
                 <img src="images/Partners/bluedart.png" style="max-height:100px;max-width:150px">
              </div>
              
            </div>
          </div>

          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                <img src="images/Partners/shadowfax.jpg" style="height:100px;width:150px">
              </div>
            </div>
          </div>

          <div class="item">
            <!-- <div class="featured-item style-2"> -->
              <div>
              <div class="featured-icon">
                 <img src="images/Partners/dtdc.jpg" style="height:100px;width:150px">
              </div>
              
            </div>
          </div>

          
          


        </div>

    <script>
    var itm=1;
    setInterval(function() {
      if(itm==1){
        $('#clorTime').addClass('clr1');
        $('#clorTime').removeClass('clr2');
        $('#clorTime').removeClass('clr3');
        itm=2;
      } else if(itm==2) {
        $('#clorTime').addClass('clr2');
        $('#clorTime').removeClass('clr1');
        $('#clorTime').removeClass('clr3');
        itm=3;
      } else {
        $('#clorTime').addClass('clr3');
        $('#clorTime').removeClass('clr1');
        $('#clorTime').removeClass('clr2');
        itm=1;
      }
    }, 5000);
    </script>

      </div>
    </div>
  </div>
</div>
</section>
<!-- Courir Partners -->














<?php 
  include "Footer.php";
?>