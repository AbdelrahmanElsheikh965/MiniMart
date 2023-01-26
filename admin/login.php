<?php
require '../includes/Admin.php';

$a = new Admin();
$resultOfLogin ='';
session_start();

if(isset($_SESSION['em']))
    header('Location: index.php');

if(isset($_POST['click'])){ 
    $email          = $_POST['em'];
    $password       = $_POST['pass'];
    $resultOfLogin  = $a->login("admins", $email, $password);
    if ($resultOfLogin === "True"){
        if (isset($_POST['reCokk'])) {
            // save cookie for 2 days.
            setcookie("adminEmail", $email, time() +  2 * 24 * 60 * 60);
            setcookie("adminPassword", $password, time() + 2 * 24 * 60 * 60);
        }
    $_SESSION['em'] = $_POST['em'];
    header('Location: index.php');   
    }
}

include '../template/admin/loginadmin.html';


?>


