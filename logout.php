<?php
session_start();
?>
<?php
if(isset($_SESSION['name']))
{
    $uname = $_SESSION['name'];
    //unset($_SESSION['name']);
    session_unset();
    session_destroy();
    //header("location: index.php");
    define('DB_NAME', 'ikp');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $admin_activity = "Login/logout";
    $date = date_create();
    $adminTimestamp = date("Y-m-d H:i:s");
    $adminComments = "The user ". $uname. " has logged out";

    $stmt2 = $conn->prepare("INSERT INTO logs (activity, username, comments, timestamp) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("ssss",$admin_activity, $uname, $adminComments, $adminTimestamp);

    if($stmt2->execute()){

    } else {
        die('execute() failed: ' . htmlspecialchars($stmt2->error));
    }
    $stmt2->close();
    $conn->close();
}
echo '<h1>You have been successfully logout</h1>';
header("location: index.php");
?>