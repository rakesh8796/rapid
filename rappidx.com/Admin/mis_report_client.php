<?php
    include "Layout_Header.php";
?>
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
<!-- ./wrapper -->
<!-- global js -->
<!-- /#page-wrapper -->
<?php
    include "Layout_Footer.php";
?>
