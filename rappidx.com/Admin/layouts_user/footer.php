   <footer class="main-footer">
     <div class="footer-left">
     </div>
     <div class="footer-right">
     </div>
   </footer>
   </div>
   </div>
   <!-- recharge model  -->
   <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border:2px solid black ;">
     <div class="modal-dialog" role="document">
       <div class="modal-content" style="background-color:  #f2f2f2 ;border:2px solid black ;">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel"><b>Recharge Your Wallet</b> </h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>

         </div>

         <div class="modal-body ">
           <form class="form-horizontal" role="form" id="popup-validation" method="post" action="Paytm/PaytmKit/pgRedirect.php" target="_blank">
             <?php
              $query = "SELECT * FROM `spark_wallet_details` ORDER BY `wallet_id` desc";

              $data = mysqli_query($conn, $query);

              $res = mysqli_fetch_assoc($data);

              $oid = $res['wallet_id'] + 1;

              $oid = "RPWLN" . $oid;

              // $oid = "DORID6";

              $_SESSION['CUST_ID'] = $user_id;
              ?>
             <input type="hidden" id="ORDER_ID" name="ORDER_ID" value="<?= $oid ?>">

             <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?= $user_id ?>">

             <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="<?= $user_type ?>">

             <input type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
             <hr style="border-top:1px solid gray ;" class="my-0">
             <h6>Enter the amount for your recharge</h6>
             <div class="text-center ">
               <div class="row my-4">
                 <div class="col-md-3 my-1">
                   <p> <strong>Amount</strong> </p>
                 </div>
                 <div class="col-md-6">
                   <input type="text" placeholder="₹" class="form-control" style="border-color:#33333373;border-radius:20px" value="500" name="TXN_AMOUNT" id="first-name" placeholder="0.0">

                 </div>
                 <div class="col-md-3"></div>

               </div>
               <div class="text-center my-3">
                 <a href="#" class="btn btn-primary badge">500</i></a>
                 <a href="#" class="btn btn-primary badge">1000</i></a>
                 <a href="#" class="btn btn-primary badge">2000</i></a>
                 <a href="#" class="btn btn-primary badge">5000</i></a>
                 <a href="#" class="btn btn-primary badge">10000</i></a>
               </div>

               <button type="submit" class="btn btn-info" name="submit" style="border-radius:20px">Recharge</button>
             </div>
           </form>
         </div>
         <div class="modal-footer bg-whitesmoke br">
           <!-- <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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
   <script src="assets/js/app.min.js"></script>
   <!-- JS Libraies -->
   <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
   <!-- Page Specific JS File -->
   <script src="assets/js/page/index.js"></script>
   <!-- Template JS File -->
   <script src="assets/js/scripts.js"></script>
   <!-- Custom JS File -->
   <script src="assets/js/custom.js"></script>
   <script src="assets/js/page/chart-amchart.js"></script>
   </body>


   <!-- index.html  21 Nov 2019 03:47:04 GMT -->

   </html>