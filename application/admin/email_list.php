<?php
include '../../Smarty.int.php';
$hf_aliens = new email_listAction($smarty);
$hf_aliens->run();
$smarty->display("admin/email_list.html");