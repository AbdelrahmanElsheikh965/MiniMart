<?php 
ob_start();
include 'includes/Client.php';
session_start();
$c = new Client();
$myId = $_SESSION['id'];
$cols = "orders.amount, products.id, products.title, products.desc, products.price, products.image";
$plus = "INNER JOIN `orders` ON products.id = orders.product_id ";
$plus .= "INNER JOIN `clients` ON orders.client_id = clients.id WHERE clients.id = $myId";
$myProducts = $c->view("products", $cols, $plus);
if (isset($_POST['delete'])) {
    $product_id =  $_POST['product_id'];
    $c->removeFC($product_id, $myId);
    // reload the page once.
    echo "<script>      
    function reloadIt() {
        if (window.location.href.substr(-2) !== \"?r\") {
            window.location = window.location.href + \"?r\";
        }
    }    
    setTimeout('reloadIt()', 1000);
    </script>";
}

$titles = array();

include 'template/cart.html';

?>
