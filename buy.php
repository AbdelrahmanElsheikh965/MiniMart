<?php
include 'includes/Client.php';
session_start();
$c = new Client();
$myId = $_SESSION['id'];

include 'template/buy.html';

?>


