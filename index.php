<?php

include 'includes/Client.php';

session_start();
$products = array();
$c = new Client();

if (isset($_SESSION['email'])){
    $myEmail          = $_SESSION['email'];
    $userData = $c->view("clients", "id, name", "WHERE email='$myEmail'");
    $_SESSION['id']   = $userData[0]['id'];
    $_SESSION['name'] = $userData[0]['name'];
}

$products = $c->view("products", "*", "ORDER BY id DESC LIMIT 3");

include 'template/index.html';


?>