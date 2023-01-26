<?php

include '../includes/Admin.php';

session_start();
if (! isset($_SESSION['em']))
    header('Location: login.php');

$a = new Admin();
$email = $_SESSION['em'];
$data  = $a->view("admins", "*", "WHERE email='$email'");


include '../template/admin/header.html';
include '../template/admin/index.html';


?>



      