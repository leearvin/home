<?php /* Smarty version Smarty-3.1.13, created on 2013-09-05 07:37:35
         compiled from "C:\xampp\htdocs\website\application\views\admin\test.html" */ ?>
<?php /*%%SmartyHeaderCode:143625225a0240b1718-85360270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaf04c9d16b4cf3c536f9a63e11f71aae2e6892d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\website\\application\\views\\admin\\test.html',
      1 => 1378359451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143625225a0240b1718-85360270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5225a024115062_90437028',
  'variables' => 
  array (
    'show' => 0,
    'AllEmployee' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5225a024115062_90437028')) {function content_5225a024115062_90437028($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>人员登记表</title>
<link href="../public/styles/test.css" rel="stylesheet"/>
</head>
<body id="main">
<?php if ($_smarty_tpl->tpl_vars['show']->value){?>
<table>
<tr><th> 编号</th><th>姓名</th><th>性别</th><th>生日</th><th>入职时间</th><th>身份证号码</th><th>联系电话</th><th>原籍地址</th></tr>
<?php if ($_smarty_tpl->tpl_vars['AllEmployee']->value){?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllEmployee']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<tr>
	<td><script>document.write(<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
+<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
);</script></td>	
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->sex;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->birthday;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->entryTime;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->idCardNum;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->phone;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->address1;?>
</td>
	
</tr>


<?php } ?>
<?php }?>
</table>
<?php }?>


</body>
</html><?php }} ?>