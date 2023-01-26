<?php

include 'includes/Client.php';

$resultOfLogin ='';
session_start();

if(isset($_SESSION['email']))
    header('Location: index.php');
    
$c = new Client();
if(isset($_POST['click'])){   // if the form is submitted.    
    $email          = $_POST['em'];
    $password       = $_POST['pass'];
    $resultOfLogin  = $c->Login("clients", $email, $password);

    if ($resultOfLogin === "True"){
        if (isset($_POST['reme'])) {
            // cookies last for 2 days.
            setcookie("email", $email, time() +  2 * 24 * 60 * 60);
            setcookie("password", $password, time() + 2 * 24 * 60 * 60);
        }
        $_SESSION['email'] = $email;
        header('Location: index.php');   
    }
}

include 'template/login.html';

?>