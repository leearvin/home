<?php

include '../../Smarty.int.php';
$guitar_wars = new guitar_warsAction($smarty);
$guitar_wars->run();

$smarty->display("admin/guitar_wars.html");
?>