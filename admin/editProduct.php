<?php
ob_start();
include '../includes/Admin.php';

session_start();
if (! isset($_SESSION['em']))
    header('Location: login.php');

$a = new Admin();
$d = new DataBase();
$email = $_SESSION['em'];
$data  = $a->view("admins", "*", "WHERE email='$email'");
$id = $data[0]['id'];

$product_id = (isset($_GET['id'])) ? $_GET['id'] : '';

$prods = $d->view("products", "*", "WHERE id=$product_id");

if(isset($_POST['editProd']))
    {
        $aval = ($_POST['available'] == "Available") ? 1 : 0;
        $edit_Res = $a->edit_prod($_POST['title'], $_POST['descriptionOfprod'], $aval, $_POST['price'], $_FILES['imageProd']['name'], $_GET['id']);
        if (isset($edit_Res) && $edit_Res == 'True')
            move_uploaded_file($_FILES['imageProd']['tmp_name'], '../uploads/' . $_FILES['imageProd']['name']);
    }




include '../template/admin/header.html';
include '../template/admin/editProduct.html';


?>
