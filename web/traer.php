<?php

include_once '../config/dbConnection.php';

header("Content-Type: application/json; charset=UTF-8");

$sql = "SELECT * FROM pedidos ORDER BY estado ASC,id ASC LIMIT 7";
$query_run = $mysqli->query($sql);


$outp= array();

for ($i=0; $i<$query_run->num_rows; $i++) 
	$outp[$i] = $query_run->fetch_array(MYSQLI_ASSOC);



echo json_encode($outp);


?>
