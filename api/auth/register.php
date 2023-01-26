<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

include '../../includes/DataBase.php';

$client_data = json_decode(file_get_contents("php://input"));
$name         = $client_data->name; 
$email        = $client_data->email;
$password_1   = $client_data->password_1; 
$password_2   = $client_data->password_2;

$d = new DataBase();
$output = $d->Register("clients", $name, $email, $password_1, $password_2);
echo json_encode($output);

// Link : http://localhost/minimart/api/auth/register.php

?>