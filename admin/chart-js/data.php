<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","IvanMata36","pat_db");

$sqlQuery = "SELECT id,sub_county,p_div_1 FROM sub_county_results where year='2018'";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>