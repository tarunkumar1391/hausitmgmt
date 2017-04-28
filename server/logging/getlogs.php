<?php
/**
 * Created by PhpStorm.
 * User: Haus-IT
 * Date: 4/26/2017
 * Time: 3:51 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "ikp");

$result = $conn->query("SELECT * FROM logs");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Sno":"'  . $rs["sno"] . '",';
    $outp .= '"Activity":"'  . $rs["activity"] . '",';
    $outp .= '"User":"'  . $rs["username"] . '",';
    $outp .= '"Comments":"'   . $rs["comments"] . '",';  
    $outp .= '"Timestamp":"'. $rs["timestamp"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>