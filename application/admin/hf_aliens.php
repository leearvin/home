<?php
include '../../Smarty.int.php';
$hf_aliens = new hf_aliensAction($smarty);
$hf_aliens->run();
$smarty->display("admin/hf_aliens.html");
?>