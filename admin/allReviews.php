<?php

include '../includes/Admin.php';

session_start();
if (! isset($_SESSION['em']))
    header('Location: login.php');

$a = new Admin();
$email = $_SESSION['em'];
$data  = $a->view("admins", "*", "WHERE email='$email'");

$cols = "reviews.id, reviews.title, reviews.content, reviews.created_on, clients.name, clients.email";
$plus = "INNER JOIN clients ON reviews.client_id = clients.id ORDER BY reviews.id DESC";
$rvs  = $a->view("reviews", $cols, $plus);

include '../template/admin/header.html';
include '../template/admin/reviews.html';

?>

        