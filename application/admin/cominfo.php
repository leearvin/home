<?php
include '../../Smarty.int.php';
$cominfo=new cominfoAction($smarty);

$cominfo->run();


$smarty->display("admin/cominfo.html");


?>