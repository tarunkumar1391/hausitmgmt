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
 * Date: 12/13/2016
 * Time: 4:20 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ikp";
//define variables
$fullName = $userEmail = $userPassword = $userDesignation =$userRoomno = $userDescription = $admin_activity = $adminComments = $adminTimestamp = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (fullName, userEmail, userPassword, userDesignation, userRoomno, userDescription ) VALUES (?, ?, ?, ?, ?, ?)");
$stmt2 = $conn->prepare("INSERT INTO logs (activity, username, comments, timestamp) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssssis", $fullName, $userEmail, $userPassword, $userDesignation, $userRoomno, $userDescription);
$stmt2->bind_param("ssss",$admin_activity, $adminName, $adminComments, $adminTimestamp);

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
    $admin_activity = "User Registration";
    $adminComments = "A new user has been added";
    $date = date_create();
    $adminTimestamp = date("Y-m-d H:i:s");
}


if ($stmt->execute()) {
    echo "Your registration has completed successfully!! ".'\n' ;
    echo '<a href="../../home.php">click here to return!!</a>';



    if($stmt2->execute()){
        
    } else {
        die('execute() failed: ' . htmlspecialchars($stmt2->error));
    }
    //script for mail

    require('../phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'linix.ikp.physik.tu-darmstadt.de';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tramdas@ikp.tu-darmstadt.de';                 // SMTP username
    $mail->Password = 'tarun_1391';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('tramdas@ikp.tu-darmstadt.de', 'Tarun Kumar R');
    $mail->addAddress($userEmail,$fullName);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'User registration for Haus-IT Management Tool';
    $mail->Body    = 'Hello,<br>
                        This is to inform, that you have been granted access to Haus-IT Management Tool.'.'<br>Regards,<br>IKP';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '<br>A confirmation email has been sent';
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