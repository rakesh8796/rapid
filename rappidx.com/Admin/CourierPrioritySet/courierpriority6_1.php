<?php
extract($_REQUEST);
error_reporting(1);
// include('../config/dbconnection.php');
?>



<input type="hidden" name="<?= $courierselect ?>" value="5">

<?php 
    // echo $courierselect;
// $couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC');
$couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','DTDCapinotwo'=>'DTDC2','Amazonapino'=>'Amazon','delhiveryapithree'=>'Delhivery3');
unset($couriernames[$courierselect]);
unset($couriernames[$fourthcourier]);
unset($couriernames[$thirdcourier]);
unset($couriernames[$secondcourier]);
unset($couriernames[$firstcourier]);

?>

<input type="hidden" id="firstcourier" value="<?= $firstcourier ?>">
<input type="hidden" id="secondcourier" value="<?= $secondcourier ?>">
<input type="hidden" id="thirdcourier" value="<?= $thirdcourier ?>">
<input type="hidden" id="fourthcourier" value="<?= $fourthcourier ?>">
<input type="hidden" id="fifthcourier" value="<?= $courierselect ?>">
<!-- <input type="text" id="thirdcourier" value="<?= $courierselect ?>"> -->
<select class="form-control" name="courierpriorityset5" onchange="courierprioritysetsix(this.value)" style="float:right;border-radius:15px">
<option value="0">Courier Priority 6</option>
<?php
    foreach($couriernames as $key => $couriername){
        echo "<option value='$key'>$couriername</option>";
    }
?>
</select>
<script type="text/javascript">
function courierprioritysetsix(val){
    var firstcourier = $("#firstcourier").val();
    var secondcourier = $("#secondcourier").val();
    var thirdcourier = $("#thirdcourier").val();
    var fourthcourier = $("#fourthcourier").val();
    var fifthcourier = $("#fifthcourier").val();
    // alert(firstcourier);
    // alert(secondcourier);
    // alert(thirdcourier);
    // alert(fourthcourier);
    // alert(val);
    $.ajax({
    type: "GET",
    url: 'CourierPrioritySet/courierpriority7.php',
    data:{courierselect:val,firstcourier:firstcourier,secondcourier:secondcourier,thirdcourier:thirdcourier,fourthcourier:fourthcourier,fifthcourier:fifthcourier},
    success: function (data){
        $("#courierpriorityseven").html(data);
    },
    error: function (data) {
        console.log('Error:', data);
    }
    });
}
</script>
