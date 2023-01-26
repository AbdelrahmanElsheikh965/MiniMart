<?php

include 'includes/Client.php';
session_start();

$myId    = ( isset($_SESSION['id']) ) ? $_SESSION['id'] : '';
$myName  = ( isset($_SESSION['name']) )? $_SESSION['name'] : '';

if (isset($_POST['add'])) {
    $revTitle   = $_POST['title'];
    $revContent = $_POST['content'];
    $selfName   = $myName;
    $c = new Client();
    $output = $c->Add_Rev($revTitle, $revContent, $myId);
}

include 'template/reviews.html';

?>
