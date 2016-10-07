<?php /* Smarty version Smarty-3.1.13, created on 2016-08-25 07:21:00
         compiled from "C:\inetpub\wwwroot\home\home\application\views\admin\hf_aliens.html" */ ?>
<?php /*%%SmartyHeaderCode:257357b82aed8d5ca2-33317381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fc63d888b491fb8503c1106b997a731abf72eef' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\home\\home\\application\\views\\admin\\hf_aliens.html',
      1 => 1471775841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '257357b82aed8d5ca2-33317381',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57b82aed9555b9_37806148',
  'variables' => 
  array (
    'title' => 0,
    'show' => 0,
    'AllAlienAbduction' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'all' => 0,
    'first' => 0,
    'second' => 0,
    'add' => 0,
    'update' => 0,
    'G_id' => 0,
    'G_firstName' => 0,
    'G_lastName' => 0,
    'G_email' => 0,
    'G_whenItHappened' => 0,
    'G_howLong' => 0,
    'G_howMany' => 0,
    'G_alienDescription' => 0,
    'G_whatTheyDid' => 0,
    'G_fang_spotted1' => 0,
    'G_fang_spotted2' => 0,
    'G_other' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b82aed9555b9_37806148')) {function content_57b82aed9555b9_37806148($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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

		
	后台首页>>aliens>><strong id="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>

	</div><!-- / -->
<ol>
	<li><a href="hf_aliens.php?action=show" title="">aliens information</a></li>
	<li><a href="hf_aliens.php?action=add" title="">add aliens</a></li>
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
			<th>when it happened</th>
			<th>how long</th>
			<th>how many</th>
			<th>alien description</th>
			<th>what they did</th>
			<th>Fang spotted</th>
			<th>other</th>
			<th>email</th>
			<th>do something</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($_smarty_tpl->tpl_vars['AllAlienAbduction']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllAlienAbduction']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->when_it_happened;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->how_long;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->how_many;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->alien_description;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->what_they_did;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->fang_spotted;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->other;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->email;?>
</td>
			<td>
	   		 <a href="hf_aliens.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->ID;?>
">修改</a>|
	   		 <a href="hf_aliens.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->ID;?>
" onclick="return confirm('确定要删除吗？')">删除</a>
			</td>
		</tr>
	<?php } ?>
	<?php }else{ ?>
		<tr><td colspan="12">no data</td></tr>
	<?php }?>
	</tbody>
</table>
<?php }?>
<div id="page"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
<!-- <form method="get" action="">
	<input type="hidden" name="action" value="show" />
		<select name="type"> 
			<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有链接</option>
			<option value="1" <?php echo $_smarty_tpl->tpl_vars['first']->value;?>
>文字链接</option>
			<option value="2" <?php echo $_smarty_tpl->tpl_vars['second']->value;?>
>图片链接</option>
			<option value="3">隐藏链接</option>		
		</select>
		<input type="submit" value="submit">
	</form>
	
<form method="get" action="">
	<input type="hidden" name="action" value="show">
	<select name="kind" style="background:#fff;border:1px solid #ccc" >
		<option value="0">全部广告</option>
		<option value="1">通栏广告</option>
		<option value="2">Banner广告</option>
		<option value="3">侧栏广告</option>		
	</select>
	<input type="submit" value="查询">
</form> -->

<?php if ($_smarty_tpl->tpl_vars['add']->value){?>
<form method="post" name="content" enctype="multipart/form-data" >
	<table>
	
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
		<thead>
			<tr>
				<th>Aliens Abducted Me - </th><th>Report an Abduction </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Share your story of alien abduction:</td><td></td>
			</tr>
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
				<td><label for="whenithappened">When did it happened?:</label></td><td><input type="text" id="whenithappened" name="whenithappened" /></td>
			</tr>
			<tr>
				<td><label for="howlong">How long were you gone?:</label></td><td><input type="text" id="howlong" name="howlong" /></td>
			</tr>
			<tr>
				<td><label for="howmany">howmany did you see？</label></td><td><input type="text" id="howmany" name="howmany" /></td>
			</tr>
			<tr>
				<td><label for="aliensdescription">Discribe them:</label></td><td><input type="text" id="aliensdescription" name="aliensdescription" /></td>
			</tr>
			<tr>
				<td><label for="whattheydid">What did they do to you?</label></td><td><input type="text" id="whattheydid" name="whattheydid" /></td>
			</tr>
			<tr>
				<td><label for="fangspotted">Have you seen my dog Fang?</label></td>
				<td>
					yes<input type="radio" id="fangspotted" name="fangspotted" value="yes" />
					no<input type="radio" id="fangspotted" name="fangspotted" value="no" />
				</td>
			</tr>
			<tr>
				<td><img src="../public/images/dandan.png" witdh="" height="" alt="My abducted dog Fang."></td>
			</tr>
			<tr>
				<td><label for="other">Anything else you want to add?</label></td><td><textarea id="other" name="other"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="submit" name="submit" /></td>
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
				<th>Aliens Abducted Me - </th><th>Report an Abduction </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Share your story of alien abduction:</td><td></td>
			</tr>
			<tr>
				<td><label for="firstname">First Name:</label></td><td><input type="text" id="firstname" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['G_firstName']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="lastname">Last Name:</label></td><td><input type="text" id="lastname" name="lastname" value="<?php echo $_smarty_tpl->tpl_vars['G_lastName']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="email">What is your email?:</label></td><td><input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['G_email']->value;?>
"/></td>
			</tr>
			<tr>
				<td><label for="whenithappened">When did it happened?:</label></td><td><input type="text" id="whenithappened" name="whenithappened" value="<?php echo $_smarty_tpl->tpl_vars['G_whenItHappened']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="howlong">How long were you gone?:</label></td><td><input type="text" id="howlong" name="howlong" value="<?php echo $_smarty_tpl->tpl_vars['G_howLong']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="howmany">howmany did you see？</label></td><td><input type="text" id="howmany" name="howmany" value="<?php echo $_smarty_tpl->tpl_vars['G_howMany']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="aliensdescription">Discribe them:</label></td><td><input type="text" id="aliensdescription" name="aliensdescription" value="<?php echo $_smarty_tpl->tpl_vars['G_alienDescription']->value;?>
"/></td>
			</tr>
			<tr>
				<td><label for="whattheydid">What did they do to you?</label></td><td><input type="text" id="whattheydid" name="whattheydid" value="<?php echo $_smarty_tpl->tpl_vars['G_whatTheyDid']->value;?>
" /></td>
			</tr>
			<tr>
				<td><label for="fangspotted">Have you seen my dog Fang?</label></td>
				<td>
					yes<input type="radio" id="fangspotted" name="fangspotted" value="yes" <?php echo $_smarty_tpl->tpl_vars['G_fang_spotted1']->value;?>
 />
					no<input type="radio" id="fangspotted" name="fangspotted" value="no" <?php echo $_smarty_tpl->tpl_vars['G_fang_spotted2']->value;?>
 />
				</td>
			</tr>
			<tr>
				<td><img src="../public/images/dandan.png" witdh="" height="" alt="My abducted dog Fang."></td>
			</tr>
			<tr>
				<td><label for="other">Anything else you want to add?</label></td><td><textarea id="other" name="other" ><?php echo $_smarty_tpl->tpl_vars['G_other']->value;?>
</textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="submit" name="submit" /></td>
			</tr>
			
			
		</tbody>
		
</table>
	
</form>
<?php }?>

</body>
</html><?php }} ?>