<?php /* Smarty version Smarty-3.1.13, created on 2016-09-01 19:50:58
         compiled from "C:\inetpub\wwwroot\home\home\application\views\admin\guitar_wars.html" */ ?>
<?php /*%%SmartyHeaderCode:2397857bf8d46e79a18-25291064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31d9b81ccc113473af0bfc1c9e8751bee652dcc0' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\home\\home\\application\\views\\admin\\guitar_wars.html',
      1 => 1472638874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2397857bf8d46e79a18-25291064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57bf8d46eba777_89046226',
  'variables' => 
  array (
    'session' => 0,
    'userName' => 0,
    'title' => 0,
    'show' => 0,
    'GuitarWarsScores' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'add' => 0,
    'update' => 0,
    'G_id' => 0,
    'G_screenshot_hidden' => 0,
    'G_name' => 0,
    'G_score' => 0,
    'G_screenshot' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bf8d46eba777_89046226')) {function content_57bf8d46eba777_89046226($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<title>Guitar Wars - high Score</title>
<link href="../public/styles/cominfo.css" rel="stylesheet"/>
<script type="text/JavaScript" src="../public/jquery/jquery-1.9.1.js"></script>


</head>
<body id="main">
	<div id="map">
	<ol>
<?php if ($_smarty_tpl->tpl_vars['session']->value){?>
		<li>welcome <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
:</li><li>><a href="login.php?action=loginOut">loginout</a></li>
<?php }else{ ?>
		<li><a href="login.php?action=login">login in </a></li><li><a href="login.php?action=add">register</a></li>
<?php }?>
	</ol>
	</div><!-- / -->
	<div id="map">
	<h2>后台首页>>guitar wars>><strong id="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong></h2>
	<p>Welcome , Guitar Warrior, do you have waht it takes to crack the high score list?
		if so, just <a href="?action=add">add your own score</a></p>
	

	</div><!-- / -->
	<ol>
		<li><a href="?action=show" title="">guitarWars scores</a></li>
		<li><a href="?action=add" title="">add  scores</a></li>
			
	
	</ol>
	
 <?php if ($_smarty_tpl->tpl_vars['show']->value){?>

<table>
	<caption></caption>
	<thead>
		<tr>
			<th>No.</th>
			<th>name</th>
			<th>date</th>
			<th>score</th>
			<th>screenshot</th>
			<th>do</th>
		</tr>
	</thead>
	
	<tbody>
	
<?php if ($_smarty_tpl->tpl_vars['GuitarWarsScores']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['GuitarWarsScores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
</td>
			<td><img src="../../database/uploads/<?php echo $_smarty_tpl->tpl_vars['value']->value->screenshot;?>
" alt="Score image" width="200" height="40"/></td>
			<td>
	   		 <a href="?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
	   		 <a href="?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定要删除吗？')">删除</a>
			</td>
		</tr>
	<?php } ?>
<?php }?>
	</tbody>
</table>
<div id="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
<?php }?> 

<?php if ($_smarty_tpl->tpl_vars['add']->value){?>
<form  method="post" name="content" enctype="multipart/form-data" action="">
	<input type='hidden' name="MAX_FILE_SIZE" vlaue='327680' /> 
<table>
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
	<thead>
		<tr>
			<th>subjects</th>
			<th>blank</th>
				
		</tr>
	</thead>
	
		<tr><td><label for="firstname">Your Name:</label></td><td><input type="text" id="name" name="name" /></td></tr>
		<tr><td><label for="score">Your Score:</label></td><td><input type="text" id="score" name="score" /></td></tr>
		<tr><td><label for="uploadFile">Choose Your ScreenShot:</label></td><td><input type="file" id="screenShot" name="screenShot" /></td></tr>
		
		
		
		<tr><td colspan="2"><input type="submit" value="submit" name="submit" /></td></tr>
</table>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['update']->value){?>
<form  method="post" name="content" enctype="multipart/form-data" accept-charset="utf-8" action="">
	
	<input type='hidden'  name="id"  value=<?php echo $_smarty_tpl->tpl_vars['G_id']->value;?>
 /> 
	<input type='hidden'  name="G_screenShot"  value="<?php echo $_smarty_tpl->tpl_vars['G_screenshot_hidden']->value;?>
" /> 
	
<table>
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
	<thead>
		<tr>
			<th>subjects</th>
			<th>blank</th>
				
		</tr>
	</thead>
	
		<tr><td><label for="name">Your Name:</label></td><td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['G_name']->value;?>
"/></td></tr>
		<tr><td><label for="score">Your Score:</label></td><td><input type="text" id="score" name="score" value="<?php echo $_smarty_tpl->tpl_vars['G_score']->value;?>
" /></td></tr>
		<tr><td><img src="<?php echo $_smarty_tpl->tpl_vars['G_screenshot']->value;?>
" alt="Score image" width="200" height="40"/></td></tr>
		<tr><td><label for="uploadFile">Choose Your ScreenShot:</label></td><td><input type="file" id="updateScreenShot" name="updateScreenShot" /></td></tr>
		
		
		
		<tr><td colspan="2"><input type="submit" value="submit" name="submit" /></td></tr>
</table>
</form>
<?php }?>
		
	
	
	
	
	
	
	
	
</body>
</html><?php }} ?>