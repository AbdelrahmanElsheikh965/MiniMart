<?php 

include 'includes/Client.php';

session_start();

$all_products = array();
$c = new Client();
$all_products = $c->view("products");

include 'template/products.html';

?>
