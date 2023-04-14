<?php
extract($_REQUEST);
error_reporting(1);
// include('../config/dbconnection.php');
?>



<input type="hidden" name="<?= $courierselect ?>" value="2">


<?php 
// $couriernames = array('xpressbeeapino'=>'XpressBees','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','ekartapino'=>'Ekart','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','Amazonapino'=>'Amazon','delhiveryapithree'=>'Delhivery3');
$couriernames = array('xpressbeeapino'=>'XpressBees','xpressbeeapinotwo'=>'XpressBees2','delhiveryapino'=>'Delhivery','delhiveryapinotwo'=>'Delhivery2','delhiveryapithree'=>'Delhivery3','shadowfaxno'=>'ShadowFax','DTDCapino'=>'DTDC','DTDCapinotwo'=>'DTDC2','ekartapino'=>'Ekart','Amazonapino'=>'Amazon','ShreeMarutiCourierapino'=>'ShreeMarutiCourier','Tekiesapino'=>'Tekies');

unset($couriernames[$courierselect]);
unset($couriernames[$firstcourier]);
?>

<input type="hidden" id="firstcourier" value="<?= $firstcourier ?>">
<input type="hidden" id="secondcourier" value="<?= $courierselect ?>">
<select class="form-control" name="courierpriorityset3" onchange="courierprioritysetthree(this.value)" style="float:right;border-radius:15px">
<option value="0">Courier Priority 3</option>
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
function courierprioritysetthree(val){
    document.getElementById("courierpriorityfour").style.display = "block";
    var firstcourier = $("#firstcourier").val();
    var secondcourier = $("#secondcourier").val();
    // alert(val);
    $.ajax({
    type: "GET",
    url: 'CourierPrioritySet/courierpriority4.php',
    data:{courierselect:val,firstcourier:firstcourier,secondcourier:secondcourier},
    success: function (data){
        $("#courierpriorityfour").html(data);
    },
    error: function (data) {
        console.log('Error:', data);
    }
    });
}
</script>

