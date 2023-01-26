<?php

include 'includes/Client.php';

session_start();
$products = array();
$c = new Client();
$id = $_GET['id'];
$thisProduct = $c->view("products", "*", "WHERE id=$id");
if (! empty($_SESSION['id']) && isset($_POST['addTC'])) {
    $myId = $_SESSION['id'];
    $addRes = $c->addToCart($id, $myId);
}

include 'template/product-info.html';

?>