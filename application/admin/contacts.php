<?php
/** 
 * 
 * */
include '../../Smarty.int.php';
$contacts=new contactsAction($smarty);
$contacts->run();
$smarty->display("admin/contacts.html");
?>