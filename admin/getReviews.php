<?php 

include '../includes/Admin.php';

$a = new Admin();

$cols = "reviews.id, reviews.title, reviews.content, reviews.created_on, clients.name, clients.email";
$plus = "INNER JOIN clients ON reviews.client_id = clients.id ORDER BY reviews.id DESC";
$rvs  = $a->view("reviews", $cols, $plus);

?>
<tr>
    <?php if (count($rvs) > 0){ 
                for($i = 0; $i < count($rvs); $i++){    ?>
        <td> <?= $rvs[$i]['title'] ?> </td>
        <td> <?= $rvs[$i]['content'] ?> </td>
        <td> <?= $rvs[$i]['name'] ?> </td>
        <td> <?= $rvs[$i]['email'] ?> </td>
        <td> <?= $rvs[$i]['created_on'] ?> </td>
        <td>
            <a href="delete.php?category=reviews&id=<?= $rvs[$i]['id']?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php   }
        } ?>