<?php
include('./IoTDB.php');

$db = new IoTDB();
$qResult = $db->getTemperatureData();
$temperature = $qResult;


$qResult = $db->getPressureData();
$pressure = $qResult;

$qResult = $db->getHumidityData();
$humidity = $qResult;

$arrytest = array('temperature' => $temperature, 'pressure' => $pressure, 'humidity' => $humidity);

// Force the outer structure into an object rather than array
echo json_encode($arrytest , JSON_FORCE_OBJECT);


?>