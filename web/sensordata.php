<?php

include('./IoTDB.php');
$db = new IoTDB();

$user = $_POST['user'] ?? "x";
$pass = $_POST['pass'] ?? "x";

$deviceid = $_POST['deviceid'] ?? null;
$temp = $_POST['temperature'] ?? null;
$press = $_POST['pressure'] ?? null;
$hum = $_POST['humidity'] ?? null;

$temp_ok = false;
$press_ok = false;
$hum_ok = false;

if( $db->CheckUser($user, $pass) === True)
{
    if( !is_null($temp) && !is_null($deviceid))
    {
        if( $db->insert_temperature($deviceid,$temp) )
        { $temp_ok = True; }
    }

    if( !is_null($hum) && !is_null($deviceid))
    {
        if ( $db->insert_humidity($deviceid,$hum) )
        { $hum_ok = True; }
    }

    if( !is_null($press) && !is_null($deviceid))
    {
        if ( $db->insert_pressure($deviceid,$press) )
        { $press_ok = True; }
    }

    echo "Temperature OK: {$temp_ok} / Humidity OK: {$hum_ok} / Pressure OK: {$press_ok}";
}
else
{
    http_response_code(403);
}

?>