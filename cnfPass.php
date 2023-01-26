<?php

include 'includes/Client.php';

if (isset($_POST['cnf'])) {
    $pass_1 = $_POST['pass_1'];
    $pass_2 = $_POST['pass_2'];
    $c = new Client();
    $myEmail = $_GET['mail'];
    $userData = $c->view("clients", "id", "WHERE email='$myEmail'");
    $id   = $userData[0]['id'];
    $resetRes = $c->setNewPass($id, $pass_1, $pass_2);
}

include 'template/cnfPass.html';

?>