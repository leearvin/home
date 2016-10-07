<?php /* Smarty version Smarty-3.1.13, created on 2016-08-25 22:43:27
         compiled from "C:\inetpub\wwwroot\home\home\application\views\admin\email_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1457457b97fe536b2d4-96224089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73404bdbff3bf4e4e17d773428a1a74a028a99fa' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\home\\home\\application\\views\\admin\\email_list.html',
      1 => 1472136197,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1457457b97fe536b2d4-96224089',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57b97fe538f669_84240734',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllEmailList' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'deleteEmailById' => 0,
    'add' => 0,
    'update' => 0,
    'G_id' => 0,
    'G_firstName' => 0,
    'G_lastName' => 0,
    'G_email' => 0,
    'send' => 0,
    'G_subject' => 0,
    'G_elvisMail' => 0,
    'deleteOne' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b97fe538f669_84240734')) {function content_57b97fe538f669_84240734($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<link href="../public/styles/cominfo.css" rel="stylesheet"/>
<script type="text/JavaScript" src="../public/jquery/jquery-1.9.1.js"></script>

<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body id="main">
	<div id="map">

		
	后台首页>>email_list>><strong id="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>

	</div><!-- / -->
<ol>
	<li><a href="email_list.php?action=show" title="">email list information</a></li>
	<li><a href="email_list.php?action=add" title="">add email</a></li>
	<li><a href="email_list.php?action=send" title="">send email</a></li>
	<li><a href="email_list.php?action=deleteOne" title="">delete one by email</a></li>
	<li><a href="email_list.php?action=deleteEmailById" title="">delete email by choosed ID</a></li>
</ol><!-- / -->



<?php if ($_smarty_tpl->tpl_vars['show']->value){?>
<table>
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
	<thead>
		<tr>	
			<th>序号</th>
			<th>first name</th>
			<th>last name</th>
			<th>email</th>
			<th>do something</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($_smarty_tpl->tpl_vars['AllEmailList']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllEmailList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<tr>
			<td><script>document.write(<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
+<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
);</script></td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->first_name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->email;?>
</td>
			<td>
	   		 <a href="email_list.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
	   		 <a href="email_list.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定要删除吗？')">删除</a>
			</td>
		</tr>
	<?php } ?>
	<?php }else{ ?>
		<tr><td colspan="5">no data</td></tr>
	<?php }?>
	</tbody>
</table>

<div id="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['deleteEmailById']->value){?>
<form method="post" name="content" enctype="multipart/form-data" action="">
<table>
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
	<thead>
		<tr>	
			<th>序号</th>
			<th>选择删除id</th>
			<th>first name</th>
			<th>last name</th>
			<th>email</th>
			<th>do something</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($_smarty_tpl->tpl_vars['AllEmailList']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllEmailList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<tr>
			<td><script>document.write(<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
+<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
);</script></td>					//行序列号
			<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="toDelete[]"></td>    //行复选框
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->first_name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->email;?>
</td>
			<td>
	   		 <a href="email_list.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
	   		 <a href="email_list.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定要删除吗？')">删除</a>
			</td>
			
		</tr>
	<?php } ?>
		
	<?php }else{ ?>
		<tr><td colspan="5">no data</td></tr>
	<?php }?>
		<tr>
				<td colspan="6"><input type="submit" value="delete all choose" name="submit" /></td>
		</tr>
	</tbody>
</table>
</form>
<div id="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['add']->value){?>
<form method="post" name="content" enctype="multipart/form-data" >
	<table>
	
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
		<thead>
			<tr>
				<th colspan="2">email information</th>
			</tr>
		</thead>
		<tbody>
		
			<tr>
				<td><label for="firstname">First Name:</label></td><td><input type="text" id="firstname" name="firstname" /></td>
			</tr>
			<tr>
				<td><label for="lastname">Last Name:</label></td><td><input type="text" id="lastname" name="lastname" /></td>
			</tr>
			<tr>
				<td><label for="email">What is your email?:</label></td><td><input type="text" id="email" name="email" /></td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" value="submit" name="submit" /></td>
			</tr>
			
			
		</tbody>
		
</table>
</form>	
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['update']->value){?>
<form action="" method="post" accept-charset="utf-8" >
<table>
			<input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['G_id']->value;?>
>
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
		<thead>
			<tr>
				<th colspan="2">update email information </th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td><label for="firstname">First Name:</label></td><td><input type="text" id="firstname" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['G_firstName']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="lastname">Last Name:</label></td><td><input type="text" id="lastname" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['G_lastName']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="email">email:</label></td><td><input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['G_email']->value;?>
"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="submit" name="submit" /></td>
			</tr>
			
			
		</tbody>
		
</table>
	
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['send']->value){?>
<form method="post" name="content" enctype="multipart/form-data" action="" >
	<table>
	
	<caption></caption>
		<thead>
			<tr>
				<th colspan=""><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</th>
			</tr>
		</thead>
		<tbody>
		
			<tr><td><label for="subject">Subject of email:</label></td></tr>
			<tr><td><input type="text" id="subject" name="subject"  value="<?php echo $_smarty_tpl->tpl_vars['G_subject']->value;?>
" size="60"/></td></tr>
			<tr><td><label for="elvisMail">Body of email::</label></td></tr>
			<tr><td><textarea id="elvisMail" name="elvisMail" rows="8" cols="60"><?php echo $_smarty_tpl->tpl_vars['G_elvisMail']->value;?>
</textarea></td></tr>
			<tr><td colspan="2"><input type="submit" value="submit" name="submit" /></td></tr>
	
			
		</tbody>
		
</table>
</form>	
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['deleteOne']->value){?>
<form method="post" name="content" enctype="multipart/form-data" action="" >
	<table>
	
	<caption></caption>
		<thead>
			<tr>
				<th colspan=""><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</th>
			</tr>
		</thead>
		<tbody>
			<tr><td>Enter an email address to remove</td></tr>
			<tr><td><label for="deleteOne">Email address:</label></td></tr>
			<tr><td><input type="text" id="email" name="email" size="60"/></td></tr>
			<tr><td colspan=""><input type="submit" value="remove" name="submit" /></td></tr>
	
			
		</tbody>
		
</table>
</form>	

<?php }?>

</body>
</html><?php }} ?>