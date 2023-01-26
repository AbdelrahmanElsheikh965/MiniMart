<?php
ob_start();     // output buffering
include 'includes/Client.php';
// CGI : stands for Common gateway interface.
$emailResult ='';

if(isset($_POST['send'])){ 
    $email = $_POST['email'];
    $emailResult = filter_var($email, FILTER_VALIDATE_EMAIL) ? "True" : "Enter Well-formatted Email";
    if($emailResult === "True")
        header("Location: mail.php?email=$email");
        ob_end_flush();

}

include 'template/forgotpass.html';

?>