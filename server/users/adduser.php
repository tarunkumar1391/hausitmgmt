<?php
/**
 * Created by PhpStorm.
 * User: Haus-IT
 * Date: 12/13/2016
 * Time: 4:20 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ikp";
//define variables
$fullName = $userEmail = $userPassword = $userDesignation =$userRoomno = $userDescription = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (fullName, userEmail, userPassword, userDesignation, userRoomno, userDescription ) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssis", $fullName, $userEmail, $userPassword, $userDesignation, $userRoomno, $userDescription);

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// set parameters and execute
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullName = isset($_POST['fullName']) ? input($_POST['fullName']) : "0";
    $userEmail = isset($_POST['userEmail']) ? input($_POST['userEmail']) : "0";
    $userPassword = isset($_POST['userPassword']) ? input($_POST['userPassword']) : "0";
    $userDesignation = isset($_POST['userDesignation']) ? input($_POST['userDesignation']) : "0";
    $userRoomno = isset($_POST['userRoomno']) ? input($_POST['userRoomno']) : "0";
    $userDescription = isset($_POST['userDescription']) ? input($_POST['userDescription']) : "0";
}


if ($stmt->execute()) {
    echo "A new entry has been created successfully!! ".'\n' ;
    echo '<a href="../../www/home.php">click here to return!!</a>';
//    header("Location: ../www/index.html");

} else {
    die('execute() failed: ' . htmlspecialchars($stmt->error));
}

//if( true === $stmt){
//    die('execute() failed: ' . htmlspecialchars($stmt->error));
//}
//

//printf ("New records created successfully", $stmt->error);


$stmt->close();
$conn->close();
?>