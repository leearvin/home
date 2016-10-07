<?php /* Smarty version Smarty-3.1.13, created on 2013-09-10 18:20:12
         compiled from "E:\xampp\htdocs\website\application\views\admin\cominfo.html" */ ?>
<?php /*%%SmartyHeaderCode:15633522f1942eeb1d6-03448699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e1befc630a12bf6e93b3893d528e76e8cb381c7' => 
    array (
      0 => 'E:\\xampp\\htdocs\\website\\application\\views\\admin\\cominfo.html',
      1 => 1378830006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15633522f1942eeb1d6-03448699',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_522f1943012b21_10186580',
  'variables' => 
  array (
    'show' => 0,
    'AllCominfo' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'all' => 0,
    'first' => 0,
    'second' => 0,
    'add' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522f1943012b21_10186580')) {function content_522f1943012b21_10186580($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=">
<link href="../public/styles/cominfo.css" rel="stylesheet"/>
<title>公司计算机信息统计表</title>
</head>
<body id="main">
	<div id="map">
	</div><!-- / -->
<ol>
	<li><a href="cominfo.php?action=show" title="">计算机列表</a></li>
	<li><a href="cominfo.php?action=add" title="">添加计算机</a></li>
</ol><!-- / -->
<?php if ($_smarty_tpl->tpl_vars['show']->value){?>
<table>
	<caption>公司计算机信息统计表</caption>
	<thead>
		<tr>
			<th>序号</th>
			<th>登记号</th>
			<th>计算机名</th>
			<th>ip</th>
			<th>mac</th>
			<th>使用人</th>
			<th>部门</th>
			<th>所在房间</th>
			<th>cpu型号</th>
			<th>内存容量</th>
			<th>内存类型</th>
			<th>主板型号</th>
			<th>主板芯片</th>
			<th>机柜端口</th>
			<th>交换机编号</th>
			<th>上网</th>
			<th>防水墙</th>
			<th>用途</th>
			<th>描述备注</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($_smarty_tpl->tpl_vars['AllCominfo']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllCominfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<tr>
			<td><script>document.write(<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
+<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
);</script></td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->comcode;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->comname;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->ip;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->mac;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->user;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->department;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->room;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->cpu;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->memory;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->memoryType;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->motherboardModel;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->chipset;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->machineRoomPort;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->switchNumber;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->internet;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->sww;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->application;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>
		</tr>
	<?php } ?>
	<?php }else{ ?>
		<tr><td colspan="20">暂无数据</td></tr>
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
<form method="post" name="content" enctype="multipart/form-data">
	<input type="hidden" name="ad">
	<table>
		<tr><td>计算机编号:<input type="text" name="comcode" value=""></td></tr>
		<tr><td>计算机名称:<input type="text" name="comname" value=""></td></tr>
		<tr><td>计算机ip:<input type="text" name="ip" value=""></td></tr>
		<tr><td>计算机mac:<input type="text" name="mac" value=""></td></tr>
		<tr><td>计算机使用人:<input type="text" name="user" value=""></td></tr>
		<tr><td>部门:<input type="text" name="department" value=""></td></tr>
		<tr><td>所在房间:<input type="text" name="room" value=""></td></tr>
		<tr><td>cpu类型:<input type="text" name="cpu" value=""></td></tr>
		<tr><td>内存容量:<input type="text" name="memory" value=""></td></tr>
		<tr><td>内存类型:<input type="text" name="memoryType" value=""></td></tr>
		<tr><td>主板型号:<input type="text" name="motherboardModel" value=""></td></tr>
		<tr><td>主板芯片<input type="text" name="chipset" value=""></td></tr>
		<tr><td>机房端口<input type="text" name="machineRoomPort" value=""></td></tr>
		<tr><td>连接交换机编号<input type="text" name="switchNumber" value=""></td></tr>
		<tr><td>是否上网:<input type="text" name="internet" value=""></td></tr>
		<tr><td>是否防水墙:<input type="text" name="sww" value=""></td></tr>
		<tr><td>计算机用途:<textarea name="application"></textarea></td></tr>
		<tr><td>备注:<textarea name="description"></textarea></td></tr>

		
		<tr><td><input type="submit" name="send" value="提交"></td></tr>
	</table>
</form>

<?php }?>

</body>
</html><?php }} ?>