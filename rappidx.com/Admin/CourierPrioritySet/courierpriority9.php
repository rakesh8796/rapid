<?php
extract($_REQUEST);
error_reporting(1);
// include('../config/dbconnection.php');
?>



<input type="hidden" name="<?= $courierselect ?>" value="8">

<?php 
    // echo $courierselect;
// $couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC');
// $couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','Amazonapino'=>'Amazon','delhiveryapithree'=>'Delhivery3');
$couriernames = array('xpressbeeapino'=>'XpressBees','xpressbeeapinotwo'=>'XpressBees2','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','delhiveryapithree'=>'Delhivery3','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','DTDCapinotwo'=>'DTDC2','ekartapino'=>'Ekart','Amazonapino'=>'Amazon','ShreeMarutiCourierapino'=>'ShreeMarutiCourier','Tekiesapino'=>'Tekies');

unset($couriernames[$courierselect]);
unset($couriernames[$seventhhcourier]);
unset($couriernames[$sixthhcourier]);
unset($couriernames[$fifthcourier]);
unset($couriernames[$fourthcourier]);
unset($couriernames[$thirdcourier]);
unset($couriernames[$secondcourier]);
unset($couriernames[$firstcourier]);
?>

<input type="text" id="firstcourier" value="<?= $firstcourier ?>">
<input type="text" id="secondcourier" value="<?= $secondcourier ?>">
<input type="text" id="thirdcourier" value="<?= $thirdcourier ?>">
<input type="text" id="fourthcourier" value="<?= $fourthcourier ?>">
<input type="text" id="fifthcourier" value="<?= $fifthcourier ?>">
<input type="text" id="sixthhcourier" value="<?= $sixthhcourier ?>">
<input type="text" id="seventhhcourier" value="<?= $seventhhcourier ?>">
<input type="text" id="eighthcourier" value="<?= $courierselect ?>">

<select class="form-control" name="courierpriorityset5" onchange="courierprioritysetnine(this.value)" style="float:right;border-radius:15px">
<option value="0">Courier Priority 911</option>
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
function courierprioritysetnine(val){
    var firstcourier = $("#firstcourier").val();
    var secondcourier = $("#secondcourier").val();
    var thirdcourier = $("#thirdcourier").val();
    var fourthcourier = $("#fourthcourier").val();
    var fifthcourier = $("#fifthcourier").val();
    var sixthcourier = $("#sixthhcourier").val();
    var seventhcourier = $("#seventhhcourier").val();
    var eighthcourier = $("#eighthcourier").val();
    
    $.ajax({
    type: "GET",
    url: 'CourierPrioritySet/courierpriority10.php',
    data:{courierselect:val,firstcourier:firstcourier,secondcourier:secondcourier,thirdcourier:thirdcourier,fourthcourier:fourthcourier,fifthcourier:fifthcourier,sixthhcourier:sixthhcourier,seventhcourier:seventhcourier,eighthcourier:eighthcourier},
    success: function (data){
        $("#courierpriorityeight").html(data);
    },
    error: function (data) {
        console.log('Error:', data);
    }
    });
}
</script>
