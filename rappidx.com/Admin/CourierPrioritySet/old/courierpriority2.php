<?php
extract($_REQUEST);
error_reporting(1);
// include('../config/dbconnection.php');
?>




<input type="hidden" name="<?= $courierselect ?>" value="1">

<?php 
$couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','ekartapino'=>'Ekart','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC');
unset($couriernames[$courierselect]);
?>
<input type="hidden" id="firstcourier" value="<?= $courierselect ?>">
<select class="form-control" name="courierpriorityset2" onchange="courierprioritysettwo(this.value)" style="float:right;border-radius:15px">
<option value="0">Courier Priority 2</option>
<?php
    foreach($couriernames as $key => $couriername){
        if($couriername == "Delhivery"){
            echo "<option value='$key'>Delhivery Surface</option>";
        }elseif($couriername == "Delhivery2"){
            echo "<option value='$key'>Delhivery Bulky Surface</option>";
        }else{
            echo "<option value='$key'>$couriername</option>";
        }
        // echo "<option value='$key'>$couriername</option>";
    }
?>
</select>
<script type="text/javascript">
function courierprioritysettwo(val){
    // alert(val);
    document.getElementById("courierprioritythree").style.display = "block";
    var firstcourier = $("#firstcourier").val();
    // alert(lastcurrentselecteditem);
    $.ajax({
    type: "GET",
    url: 'CourierPrioritySet/courierpriority3.php',
    data:{courierselect:val,firstcourier:firstcourier},
    success: function (data){
        $("#courierprioritythree").html(data);
    },
    error: function (data) {
        console.log('Error:', data);
    }
    });
}
</script>



<!-- Courier Priority -->
<!-- <div class="col-md-3">
<select class="form-control" name="delhiveryapino" style="float:right;border-radius:15px">
<option value="0">Delhivery Priority (Not In Service)</option>

<?php
    for ($i=1;$i<$tcoureis;$i++){
        if($delhivery ==$i){
            echo "<option value='$i' selected>Delhivery Priority $i</option>";
        }else{
            echo "<option value='$i'>Delhivery Priority $i</option>";
        }
    }
?>

</select>
</div> -->
<!-- Courier Priority -->

