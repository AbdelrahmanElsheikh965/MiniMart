<?php

include '../includes/Admin.php';

session_start();
if (! isset($_SESSION['em']))
    header('Location: login.php');

$a = new Admin();
$email = $_SESSION['em'];
$data  = $a->view("admins", "*", "WHERE email='$email'");

switch ($_GET['category']) {
    case 'products':
        if($a->delete("products", $_GET['id'])== "True")
            header("Location: all-products.php");
        break;

    case 'reviews':
        if($a->delete("reviews", $_GET['id'])== "True")
            header("Location: allReviews.php");
        break;

    // if a client is deleted his (reviews & transactions) are deleted too as it has CASCADE constraint.
    case 'clients':   
        if($a->delete("clients", $_GET['id'])== "True")
            header("Location: users.php");
        break;
    
    default:
        header("Location: index.php");
        break;
}

?>