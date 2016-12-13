<?php
/**
 * Created by PhpStorm.
 * User: Haus-IT
 * Date: 12/13/2016
 * Time: 5:03 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "ikp");

$result = $conn->query("SELECT * FROM users");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Sno":"'  . $rs["sno"] . '",';
    $outp .= '"fullname":"'  . $rs["fullName"] . '",';
    $outp .= '"email":"'  . $rs["userEmail"] . '",';
    $outp .= '"designation":"'   . $rs["userDesignation"] . '",';
    $outp .= '"room":"'. $rs["userRoomno"] . '",';
    $outp .= '"description":"'. $rs["userDescription"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>