<?php /* Smarty version Smarty-3.1.13, created on 2013-09-13 11:25:11
         compiled from "C:\xampp\htdocs\website\application\views\admin\contacts.html" */ ?>
<?php /*%%SmartyHeaderCode:28560522d73e695b420-52567968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4986c46dda4d7ac046a58c737eab5da802de3ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\website\\application\\views\\admin\\contacts.html',
      1 => 1379064305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28560522d73e695b420-52567968',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_522d73e69cb546_20293903',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllContacts' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522d73e69cb546_20293903')) {function content_522d73e69cb546_20293903($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link href="../public/styles/contacts.css" rel="stylesheet"/>
<script type="text/JavaScript" src="../public/jquery/jquery-1.9.1.js"></script>
</head>
<body id="main">
	<div id="map" class="">
		后台首页>>客户管理>><strong id="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>
	</div><!-- / -->

	<ol id="" class="">
		<li><a href="contacts.php?action=show" title="">客户列表</a></li>
		<li><a href="contacts.php?action=add" title="">新增客户</a></li>
	</ol><!-- / -->
	<?php if ($_smarty_tpl->tpl_vars['show']->value){?>
	<table>
		<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
		<thead>
			<tr>
				<th>序号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>公司名称</th>
				<th>移动电话</th>
				<th>固定电话</th>
				<th>公司地址</th>
				<th>电子信箱</th>
				<th>聊天软件</th>
				<th>联系账号</th>
				<th>照片地址</th>
				<th>客户等级</th>
				<th>客户描述</th>
				
			</tr>
		</thead>
		<tbody>
	<?php if ($_smarty_tpl->tpl_vars['AllContacts']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllContacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
			</tr>
	<?php } ?>
	<?php }else{ ?>
			<tr><td colspan="13" rowspan="" headers="">暂无数据</td></tr>
	<?php }?>


		</tbody>
	</table>




		
	<?php }?>



</body>
</html><?php }} ?>