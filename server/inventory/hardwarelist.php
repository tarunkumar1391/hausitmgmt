<?php
/**
 * Created by PhpStorm.
 * User: Haus-IT
 * Date: 4/5/2017
 * Time: 3:18 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "ikp");

$result = $conn->query("SELECT * FROM hardwareList");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Sno":"'  . $rs["sno"] . '",';
    $outp .= '"Room":"'  . $rs["room"] . '",';
    $outp .= '"Kostenstelle":"'  . $rs["kostenstelle"] . '",';
    $outp .= '"Inventar":"'  . $rs["inventar"] . '",';
    $outp .= '"Device":"'   . $rs["device"] . '",';
    $outp .= '"Ipaddress":"'   . $rs["ipaddress"] . '",';
    $outp .= '"MAC":"'   . $rs["mac"] . '",';
    $outp .= '"Uname":"'   . $rs["uname"] . '",';
    $outp .= '"Comments":"'. $rs["comments"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>