<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include '../includes/DataBase.php';

$d = new DataBase();
$reviews = $d->view("reviews");

echo json_encode($reviews);

// Link : http://localhost/minimart/api/reviews.php

?>