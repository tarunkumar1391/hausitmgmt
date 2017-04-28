<?php
session_start();

?>
<?php
if(!isset($_SESSION['name']))
{
    header("location: index.php");
}
$adminName=$_SESSION['name'];

?>
<?php
/**
 * Created by PhpStorm.
 * User: Haus-IT
 * Date: 12/27/2016
 * Time: 4:02 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ikp";
//define variables
$sno = $fullName = $userEmail  = $userDesignation =$userRoomno = $userDescription = $admin_activity = $adminComments = $adminTimestamp = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("UPDATE users SET fullName=?, userEmail=?, userDesignation=?, userRoomno=?, userDescription=? WHERE sno=?");
$stmt2 = $conn->prepare("INSERT INTO logs (activity, username, comments, timestamp) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssisi", $fullName, $userEmail, $userDesignation, $userRoomno, $userDescription,$sno);
$stmt2->bind_param("ssss",$admin_activity, $adminName, $adminComments, $adminTimestamp);

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// set parameters and execute
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullName = isset($_POST['userfname']) ? input($_POST['userfname']) : "0";
    $userEmail = isset($_POST['userEmail']) ? input($_POST['userEmail']) : "0";
    $userDesignation = isset($_POST['userDesignation']) ? input($_POST['userDesignation']) : "0";
    $userRoomno = isset($_POST['userRoomno']) ? input($_POST['userRoomno']) : "0";
    $userDescription = isset($_POST['userDescription']) ? input($_POST['userDescription']) : "0";
    $sno = isset($_POST['sno']) ? input($_POST['sno']) : "0";
    $admin_activity = "User Registration";
    $adminComments = "A new user has been added";
    $date = date_create();
    $adminTimestamp = date("Y-m-d H:i:s");
}


if ($stmt->execute()) {
    echo "Entry no. $sno has been update successfully!! ".'\n' ;
    echo '<a href="../../www/home.php">click here to return!!</a>';
    if($stmt2->execute()){

    } else {
        die('execute() failed: ' . htmlspecialchars($stmt2->error));
    }

} else {
    die('execute() failed: ' . htmlspecialchars($stmt->error));
}

//if( true === $stmt){
//    die('execute() failed: ' . htmlspecialchars($stmt->error));
//}
//

//printf ("New records created successfully", $stmt->error);

$stmt2->close();
$stmt->close();
$conn->close();
?>