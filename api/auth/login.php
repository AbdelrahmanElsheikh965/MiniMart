<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

include '../../includes/DataBase.php';

$type = $_GET['type'];

$credentials = json_decode(file_get_contents("php://input"));
$email      = $credentials->email; 
$password   = $credentials->password; 
$u = new DataBase();

switch($type){
    case 'Admin':
        $AL = $u->login("admins", $email, $password);
        echo json_encode($AL);
        break;

    case 'Client':
        $CL = $u->login("clients", $email, $password);
        echo json_encode($CL);
        break;
        
    default;
        throw new Exception("Error Typed:Wrong Type :(");
        break;
}

// Link : http://localhost/minimart/api/auth/login.php?type=

?>