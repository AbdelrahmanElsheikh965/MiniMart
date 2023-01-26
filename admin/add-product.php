<?php
ob_start();
include '../includes/Admin.php';

session_start();
if (! isset($_SESSION['em']))
    header('Location: login.php');

$errors = array('title', 'descriptionOfprod', 'price', 'available');
$newArr = array();

$a = new Admin();
$email = $_SESSION['em'];
$data  = $a->view("admins", "*", "WHERE email='$email'");

if(isset($_POST['addprod'])){ 
    $title = $_POST['title'];    
    $desc  = $_POST['descriptionOfprod'];    
    $aval  = $_POST['available'];    
    $price = $_POST['price'];
    $image = $_FILES['imageProd'];
    
    if(! file_exists($_FILES['imageProd']['tmp_name']))
        $newArr['image'] = "*Product image is required!"; 

    for($i = 0; $i < count($errors)-1; $i++){
        if (empty($_POST[$errors[$i]])) {
            $newArr[$errors[$i]] = "*Product $errors[$i] is required!"; 
        }
    }
    if (empty ($newArr)) {
        $aval = ($aval == "Available") ? 1 : 0;
        $addRes = $a->add_prod($title, $desc, $aval, $price, $image['name'], $data[0]['id']);
    }
    if (isset($addRes) && $addRes == 'True')
        move_uploaded_file($_FILES['imageProd']['tmp_name'], '../uploads/' . $_FILES['imageProd']['name']);
        
}

include '../template/admin/header.html';
include '../template/admin/add-product.html';



?>