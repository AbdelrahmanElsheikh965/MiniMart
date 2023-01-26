<?php
include 'includes/Client.php';

$regRes=array('nameANDemail' => '');
$c = new Client();

if(isset($_POST['click'])){   // if the form is submitted.    

    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $password_1  = $_POST['password'];
    $password_2  = $_POST['cnfpassword'];
    
    $regRes['nameANDemail']  = $c->Register("clients", $name, $email, $password_1, $password_2);
    
    if ($regRes['nameANDemail'] === "True"){
        session_start();
        $_SESSION['email'] = $email;
        header('Location: index.php');   
    }
}

include 'template/register.html';

?>