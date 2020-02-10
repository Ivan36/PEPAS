<?php
namespace Phppot;

use Phppot\CountryState;
require_once __DIR__ . '/Model/CountryState.php';
$countryState = new CountryState();
$countryResult = $countryState->getAllCountry();
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
    $("#loader").show();
	$.ajax({
	type: "POST",
	url: "./ajax/get-country-state-ep.php",
	data:'country_id='+val,
	success: function(data){
		$("#state-list").html(data);
		$("#loader").hide();
	}
	});
}
</script>
</head>
<body>
    <div class="frmDronpDown">
        <div class="row">
            <label>Country:</label><br /> <select name="country"
                id="country-list" class="demoInputBox"
                onChange="getState(this.value);">
                <option value="">Select Country</option>
<?php
foreach ($countryResult as $country) {
    ?>
<option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
<?php
}
?>
</select>
        </div>
        <div class="row">
            <label>State:</label><br /> <select name="state"
                id="state-list" class="demoInputBox">
                <option value="">Select State</option>
            </select> <img id="loader" src="./images/loader.gif" />
        </div>
    </div>
</body>
</html>