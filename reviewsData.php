<?php

include 'includes/Client.php';
session_start();
$c = new Client();
$reviews = array();
$cols = "reviews.title, reviews.content, reviews.created_on, clients.name";
$plus = "INNER JOIN clients ON reviews.client_id = clients.id ORDER BY reviews.id DESC";
$reviews  = $c->view("reviews", $cols, $plus);

?>

    <?php  if(! empty($reviews)) {  ?>
        <?php  for($i=0; $i<count($reviews); $i++) {  ?>
        <div class="panel panel-default panel-guestbook load">
            <div class="panel-heading load">
                <div id="revTitle" class="guestbook__title load"> <?= $reviews[$i]['title'] ?> </div>
            </div>
            <div class="panel-body load">
                <div id="revContent" class="guestbook__text load"> <?= $reviews[$i]['content'] ?> </div>
            </div>
            <div class="panel-footer load">
                <div id="authName" class="guestbook__writer load"><strong>Added By: <?= $reviews[$i]['name'] ?></strong>  On   <u> <?= $reviews[$i]['created_on'] ?> </u> </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>