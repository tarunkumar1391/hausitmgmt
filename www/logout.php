<?php
if(isset($_SESSION['name']))
{
    unset($_SESSION['name']);
    session_destroy();
}
echo '<h1>You have been successfully logout</h1>';
header("location: index.php");
?>