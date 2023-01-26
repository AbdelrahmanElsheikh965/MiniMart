<?php
include '../includes/Admin.php';

session_start();
if (! isset($_SESSION['em']))
    header('Location: login.php');

$a = new Admin();
$email = $_SESSION['em'];
$data  = $a->view("admins", "*", "WHERE email='$email'");
$id = $data[0]['id'];

$prods = $a->view("products", "*", "WHERE admin_id=$id");

include '../template/admin/header.html';
include '../template/admin/all-products.html';


?>

       