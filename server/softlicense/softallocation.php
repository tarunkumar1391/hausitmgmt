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
 * User: tkumar
 * Date: 8/9/16
 * Time: 5:55 PM

 **/
$servername = "localhost";
$username = "uhausitmgnt";
$password = "AhTahsh8rig0ooP2";
$dbname = "dbhausitmgnt";
//define variables
$sno2 = $finNok = $origNok = $sas = $nokl = $softreq = $requester_email = $mac_device = $requester_roomNo = $requester_groupName = $dalloc = $lexpiry = $comm = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO allocatedsoftware (	selectedSoft, nokl, nameofRequester, requester_email, mac_device, requester_roomNo, requester_groupName, dateofAlloc, licenseExpiry, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissssssss", $sas, $nokl, $softreq, $requester_email, $mac_device, $requester_roomNo, $requester_groupName, $dalloc, $lexpiry, $comm);

$stmt2 = $conn->prepare("UPDATE software SET Nok=? WHERE Sno=?");
$stmt2->bind_param("ii", $finNok,$sno2);

$stmt3 = $conn->prepare("INSERT INTO logs (activity, username, comments, timestamp) VALUES (?, ?, ?, ?)");
$stmt3->bind_param("ssss",$admin_activity, $adminName, $adminComments, $adminTimestamp);

function input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

// set parameters and execute
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $sas = isset($_POST['sas']) ? input($_POST['sas']) : "0";
    $sno2 = isset($_POST['softid']) ? input($_POST['softid']) : "0";
    $origNok = isset($_POST['origkeys']) ? input($_POST['origkeys']) : "0";
    $nokl = isset($_POST['nokl']) ? input($_POST['nokl']) : "0";
    $softreq = isset($_POST['softreq']) ? input($_POST['softreq']) : "0";
    $requester_email = isset($_POST['requester_email']) ? input($_POST['requester_email']) : "0";
    $mac_device = isset($_POST['mac_device']) ? input($_POST['mac_device']) : "0";
    $requester_roomNo = isset($_POST['requester_roomNo']) ? input($_POST['requester_roomNo']) : "0";
    $requester_groupName = isset($_POST['requester_groupName']) ? input($_POST['requester_groupName']) : "0";
    $dalloc = isset($_POST['dalloc']) ? input($_POST['dalloc']) : "0";
    $lexpiry = isset($_POST['lexpiry']) ? input($_POST['lexpiry']) : "0";
    $comm = isset($_POST['comm']) ? input($_POST['comm']) : "0";
    $admin_activity = "Software License Allocation";
    $adminComments = "A new Software/License has been allotted to ".$softreq;
    $date = date_create();
    $adminTimestamp = date("Y-m-d H:i:s");

    if($nokl <= $origNok && $nokl > 0){
        $finNok = $origNok - $nokl;
    } else {
        echo"<h4>The chosen no. of licenses are more than what is present in the repository!!! Please enter valid no. of licenses and try again!!!</h4>";
    }
}





if ($stmt2->execute()) {
//    echo "Software db has been updated" ;
    if($stmt->execute()){
        echo "A new entry has been created successfully and the license database has been updated accordingly!! ".'\n' ;
        echo '<a href="../../home.php">click here to return!!</a>';
//    header("Location: ../www/index.html");
        if($stmt3->execute()){

        } else {
            die('execute() failed: ' . htmlspecialchars($stmt2->error));
        }
    }else {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
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
    $mail->addAddress($requester_email,$softreq);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Software registration at IKP';
    $mail->Body    = 'Hello,<br>
                        This is to confirm that we have allocated a license for '. $sas.' on '.$dalloc.'.<br><br>Regards,<br>IKP';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} else {
die('execute() failed: ' . htmlspecialchars($stmt->error));
}

$stmt3->close();
$stmt2->close();

//if( true === $stmt){
//    die('execute() failed: ' . htmlspecialchars($stmt->error));
//}
//

//printf ("New records created successfully", $stmt->error);



$stmt->close();
$conn->close();
?>