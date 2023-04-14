<?php
extract($_REQUEST);
error_reporting(1);
// include('../config/dbconnection.php');
?>



<input type="hidden" name="<?= $courierselect ?>" value="4">

<?php 
// $couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','ekartapino'=>'Ekart','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','Amazonapino'=>'Amazon','delhiveryapithree'=>'Delhivery3');
$couriernames = array('xpressbeeapino'=>'XpressBees','xpressbeeapinotwo'=>'XpressBees2','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','delhiveryapithree'=>'Delhivery3','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','DTDCapinotwo'=>'DTDC2','ekartapino'=>'Ekart','Amazonapino'=>'Amazon','ShreeMarutiCourierapino'=>'ShreeMarutiCourier','Tekiesapino'=>'Tekies');

unset($couriernames[$courierselect]);
unset($couriernames[$thirdcourier]);
unset($couriernames[$secondcourier]);
unset($couriernames[$firstcourier]);
?>

<input type="hidden" id="firstcourier" value="<?= $firstcourier ?>">
<input type="hidden" id="secondcourier" value="<?= $secondcourier ?>">
<input type="hidden" id="thirdcourier" value="<?= $thirdcourier ?>">
<input type="hidden" id="fourthcourier" value="<?= $courierselect ?>">
<!-- <input type="text" id="thirdcourier" value="<?= $courierselect ?>"> -->
<select class="form-control" name="courierpriorityset5" onchange="courierprioritysetfive(this.value)" style="float:right;border-radius:15px">
<option value="0">Courier Priority 5</option>
<?php
    foreach($couriernames as $key => $couriername){
        if($couriername == "Delhivery"){
            echo "<option value='$key'>Delhivery Surface</option>";
        }elseif($couriername == "Delhivery2"){
            echo "<option value='$key'>Delhivery Bulky Surface</option>";
        }elseif($couriername == "Delhivery3"){
            echo "<option value='$key'>Delhivery Heavy Surface </option>";
        }else{
            echo "<option value='$key'>$couriername</option>";
        }
        // echo "<option value='$key'>$couriername</option>";
    }
?>
</select>
<script type="text/javascript">
function courierprioritysetfive(val){
    var firstcourier = $("#firstcourier").val();
    var secondcourier = $("#secondcourier").val();
    var thirdcourier = $("#thirdcourier").val();
    var fourthcourier = $("#fourthcourier").val();
    // alert(firstcourier);
    // alert(secondcourier);
    // alert(thirdcourier);
    // alert(fourthcourier);
    // alert(val);
    $.ajax({
    type: "GET",
    url: 'CourierPrioritySet/courierpriority6.php',
    data:{courierselect:val,firstcourier:firstcourier,secondcourier:secondcourier,thirdcourier:thirdcourier,fourthcourier:fourthcourier},
    success: function (data){
        $("#courierprioritysix").html(data);
    },
    error: function (data) {
        console.log('Error:', data);
    }
    });
}
</script>
