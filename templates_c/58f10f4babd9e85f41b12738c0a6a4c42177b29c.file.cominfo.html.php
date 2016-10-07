<?php /* Smarty version Smarty-3.1.13, created on 2013-09-13 10:40:38
         compiled from "C:\xampp\htdocs\website\application\views\admin\cominfo.html" */ ?>
<?php /*%%SmartyHeaderCode:21806522e7aee71db71-71863223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58f10f4babd9e85f41b12738c0a6a4c42177b29c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\website\\application\\views\\admin\\cominfo.html',
      1 => 1379061632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21806522e7aee71db71-71863223',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_522e7aee7a8e72_29365088',
  'variables' => 
  array (
    'title' => 0,
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
    'update' => 0,
    'G_id' => 0,
    'G_comcode' => 0,
    'G_comname' => 0,
    'G_ip' => 0,
    'G_mac' => 0,
    'G_user' => 0,
    'G_department1' => 0,
    'G_department2' => 0,
    'G_department3' => 0,
    'G_department4' => 0,
    'G_department5' => 0,
    'G_department6' => 0,
    'G_department7' => 0,
    'G_department8' => 0,
    'G_department9' => 0,
    'G_department10' => 0,
    'G_department11' => 0,
    'G_department12' => 0,
    'G_department13' => 0,
    'G_department14' => 0,
    'G_department15' => 0,
    'G_department16' => 0,
    'G_department17' => 0,
    'G_cpu1' => 0,
    'G_cpu2' => 0,
    'G_cpu3' => 0,
    'G_cpu4' => 0,
    'G_cpu5' => 0,
    'G_cpu6' => 0,
    'G_cpu7' => 0,
    'G_cpu8' => 0,
    'G_cpu9' => 0,
    'G_cpu10' => 0,
    'G_cpu11' => 0,
    'G_cpu12' => 0,
    'G_cpu13' => 0,
    'G_cpu14' => 0,
    'G_memoryCapacity' => 0,
    'G_memoryType1' => 0,
    'G_memoryType2' => 0,
    'G_memoryType3' => 0,
    'G_machineRoomPort' => 0,
    'G_switchNumber' => 0,
    'G_internet1' => 0,
    'G_internet2' => 0,
    'G_sww1' => 0,
    'G_sww2' => 0,
    'G_application' => 0,
    'G_description' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522e7aee7a8e72_29365088')) {function content_522e7aee7a8e72_29365088($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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

		
	后台首页>>计算机管理>><strong id="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong>

	</div><!-- / -->
<ol>
	<li><a href="cominfo.php?action=show" title="">计算机列表</a></li>
	<li><a href="cominfo.php?action=add" title="">添加计算机</a></li>
</ol><!-- / -->
<?php if ($_smarty_tpl->tpl_vars['show']->value){?>
<table>
	<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
	<thead>
		<tr>
			<th>序号</th>
			<th>登记号</th>
			<th>计算机名</th>
			<th>ip</th>
			<th>mac</th>
			<th>使用人</th>
			<th>部门</th>
			<th>cpu型号</th>
			<th>内存容量</th>
			<th>内存类型</th>
			<th>机柜端口</th>
			<th>交换机编号</th>
			<th>上网</th>
			<th>防水墙</th>
			<th>用途</th>
			<th>操作</th>
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
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->cpu;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->memoryCapacity;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->memoryType;?>
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
			<td>
	   		 <a href="cominfo.php?action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
	   		 <a href="cominfo.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" onclick="return confirm('确定要删除吗？')">删除</a>
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
	
	<table>
		<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
		<tr><td>计算机编号:<input type="text" name="comcode" value=""></td></tr>
		<tr><td>计算机名称:<input type="text" name="comname" value=""></td></tr>
		<tr><td>计算机ip:<input type="text" name="ip" value=""></td></tr>
		<tr><td>计算机mac:<input type="text" name="mac" value=""></td></tr>
		<tr><td>计算机使用人:<input type="text" name="user" value=""></td></tr>
		<tr><td>部门:
					<select name="department" style="background:#fff;border:1px solid #ccc" >
						<option value="支撑部">支撑部</option>
						<option value="行政一部">行政一部</option>
						<option value="财务部">财务部</option>
						<option value="工程部">工程部</option>
						<option value="客服部">客服部</option>
						<option value="行政二部">行政二部</option>
						<option value="人事部">人事部</option>
						<option value="数据部">数据部</option>
						<option value="业务一部">业务一部</option>
						<option value="业务二部">业务二部</option>
						<option value="业务三部">业务三部</option>
						<option value="业务四部">业务四部</option>
						<option value="业务北区">业务北区</option>
						<option value="管理部">管理部</option>
						<option value="青春营业厅">青春营业厅</option>
						<option value="机房">机房</option>
						<option value="库房">库房</option>
					</select>
		</td></tr>
		<tr><td>cpu类型:
					<select name="cpu" style="background:#fff;border:1px solid #ccc" >
						<option value="celeron2.8">celeron2.8</option>
						<option value="celeron2.66">celeron2.66</option>
						<option value="celeron3.06">celeron3.06</option>
						<option value="G630">G630</option>
						<option value="i5-3470">i5-3470</option>
						<option value="E5800">E5800</option>
						<option value="E5700">E5700</option>
						<option value="E5500">E5500</option>
						<option value="E5300">E5300</option>
						<option value="E430">E430</option>
						<option value="E440">E440</option>
						<option value="E420">E420</option>
						<option value="E1400">E1400</option>
						<option value="AMD3400+">AMD3400+</option>
					</select>
		</td></tr>
		<tr><td>内存容量:<input type="text" name="memoryCapacity" value="">G</td></tr>
		<tr><td>内存类型:
				<input type="radio" name="memoryType" value="一代内存" checked="checked">一代内存
				<input type="radio" name="memoryType" value="二代内存" >二代内存
				<input type="radio" name="memoryType" value="三代内存" >三代内存
		</td></tr>
		<tr><td>机房端口<input type="text" name="machineRoomPort" value=""></td></tr>
		<tr><td>连接交换机编号<input type="text" name="switchNumber" value=""></td></tr>
		<tr><td>是否上网:
				<input type="radio" name="internet" value="上网" checked="checked">上网
				<input type="radio" name="internet" value="不上网" >不上网
		</td></tr>
		<tr><td>是否防水墙:  
				<input type="radio" name="sww" value="有" checked="checked">有
				<input type="radio" name="sww" value="无" >无
		</td></tr>
		<tr><td>计算机用途:<textarea name="application"></textarea></td></tr>
		<tr><td>备注:<textarea name="description"></textarea></td></tr>
		<tr><td><input type="submit" name="send" value="提交"></td></tr>
	</table>
</form>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['update']->value){?>
<form action="" method="post" accept-charset="utf-8" >
			<input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['G_id']->value;?>
>
	<table>
		<caption><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</caption>
		<tr><td>计算机编号:<input type="text" name="comcode" value="<?php echo $_smarty_tpl->tpl_vars['G_comcode']->value;?>
"></td></tr>
		<tr><td>计算机名称:<input type="text" name="comname" value="<?php echo $_smarty_tpl->tpl_vars['G_comname']->value;?>
"></td></tr>
		<tr><td>计算机ip:<input type="text" name="ip" value="<?php echo $_smarty_tpl->tpl_vars['G_ip']->value;?>
"></td></tr>
		<tr><td>计算机mac:<input type="text" name="mac" value="<?php echo $_smarty_tpl->tpl_vars['G_mac']->value;?>
"></td></tr>
		<tr><td>计算机使用人:<input type="text" name="user" value="<?php echo $_smarty_tpl->tpl_vars['G_user']->value;?>
"></td></tr>
		<tr><td>部门：
					<select name="department" style="background:#fff;border:1px solid #ccc" >
						<option value="支撑部" <?php echo $_smarty_tpl->tpl_vars['G_department1']->value;?>
>支撑部</option>
						<option value="行政一部" <?php echo $_smarty_tpl->tpl_vars['G_department2']->value;?>
>行政一部</option>
						<option value="财务部" <?php echo $_smarty_tpl->tpl_vars['G_department3']->value;?>
>财务部</option>
						<option value="工程部" <?php echo $_smarty_tpl->tpl_vars['G_department4']->value;?>
>工程部</option>
						<option value="客服部" <?php echo $_smarty_tpl->tpl_vars['G_department5']->value;?>
>客服部</option>
						<option value="行政二部" <?php echo $_smarty_tpl->tpl_vars['G_department6']->value;?>
>行政二部</option>
						<option value="人事部" <?php echo $_smarty_tpl->tpl_vars['G_department7']->value;?>
>人事部</option>
						<option value="数据部" <?php echo $_smarty_tpl->tpl_vars['G_department8']->value;?>
>数据部</option>
						<option value="业务一部" <?php echo $_smarty_tpl->tpl_vars['G_department9']->value;?>
>业务一部</option>
						<option value="业务二部" <?php echo $_smarty_tpl->tpl_vars['G_department10']->value;?>
>业务二部</option>
						<option value="业务三部" <?php echo $_smarty_tpl->tpl_vars['G_department11']->value;?>
>业务三部</option>
						<option value="业务四部" <?php echo $_smarty_tpl->tpl_vars['G_department12']->value;?>
>业务四部</option>
						<option value="业务北区" <?php echo $_smarty_tpl->tpl_vars['G_department13']->value;?>
>业务北区</option>
						<option value="管理部" <?php echo $_smarty_tpl->tpl_vars['G_department14']->value;?>
>管理部</option>
						<option value="青春营业厅" <?php echo $_smarty_tpl->tpl_vars['G_department15']->value;?>
>青春营业厅</option>
						<option value="机房" <?php echo $_smarty_tpl->tpl_vars['G_department16']->value;?>
>机房</option>
						<option value="库房" <?php echo $_smarty_tpl->tpl_vars['G_department17']->value;?>
>库房</option>
					</select>
		</td></tr>
		<tr><td>cpu类型:
				<select name="cpu" style="background:#fff;border:1px solid #ccc" >
						<option value="celeron2.8" <?php echo $_smarty_tpl->tpl_vars['G_cpu1']->value;?>
>celeron2.8</option>
						<option value="celeron2.66" <?php echo $_smarty_tpl->tpl_vars['G_cpu2']->value;?>
>celeron2.66</option>
						<option value="celeron3.06" <?php echo $_smarty_tpl->tpl_vars['G_cpu3']->value;?>
>celeron3.06</option>
						<option value="G630" <?php echo $_smarty_tpl->tpl_vars['G_cpu4']->value;?>
>G630</option>
						<option value="i5-3470" <?php echo $_smarty_tpl->tpl_vars['G_cpu5']->value;?>
>i5-3470</option>
						<option value="E5800" <?php echo $_smarty_tpl->tpl_vars['G_cpu6']->value;?>
>E5800</option>
						<option value="E5700" <?php echo $_smarty_tpl->tpl_vars['G_cpu7']->value;?>
>E5700</option>
						<option value="E5500" <?php echo $_smarty_tpl->tpl_vars['G_cpu8']->value;?>
>E5500</option>
						<option value="E5300" <?php echo $_smarty_tpl->tpl_vars['G_cpu9']->value;?>
>E5300</option>
						<option value="E430" <?php echo $_smarty_tpl->tpl_vars['G_cpu10']->value;?>
>E430</option>
						<option value="E440" <?php echo $_smarty_tpl->tpl_vars['G_cpu11']->value;?>
>E440</option>
						<option value="E420" <?php echo $_smarty_tpl->tpl_vars['G_cpu12']->value;?>
>E420</option>
						<option value="E1400" <?php echo $_smarty_tpl->tpl_vars['G_cpu13']->value;?>
>E1400</option>
						<option value="AMD3400+" <?php echo $_smarty_tpl->tpl_vars['G_cpu14']->value;?>
>AMD3400+</option>
					</select>
		</td></tr>
		<tr><td>内存容量:<input type="text" name="memoryCapacity" value="<?php echo $_smarty_tpl->tpl_vars['G_memoryCapacity']->value;?>
">G</td></tr>
		<tr><td>内存类型:
					<input type="radio" name="memoryType" value="一代内存" <?php echo $_smarty_tpl->tpl_vars['G_memoryType1']->value;?>
>一代内存
					<input type="radio" name="memoryType" value="二代内存" <?php echo $_smarty_tpl->tpl_vars['G_memoryType2']->value;?>
>二代内存
					<input type="radio" name="memoryType" value="三代内存" <?php echo $_smarty_tpl->tpl_vars['G_memoryType3']->value;?>
>三代内存
		</td></tr>
		<tr><td>机房端口<input type="text" name="machineRoomPort" value="<?php echo $_smarty_tpl->tpl_vars['G_machineRoomPort']->value;?>
"></td></tr>
		<tr><td>连接交换机编号<input type="text" name="switchNumber" value="<?php echo $_smarty_tpl->tpl_vars['G_switchNumber']->value;?>
"></td></tr>
		<tr><td>是否上网:
					<input type="radio" name="internet" value="上网" <?php echo $_smarty_tpl->tpl_vars['G_internet1']->value;?>
>上网
					<input type="radio" name="internet" value="不上网" <?php echo $_smarty_tpl->tpl_vars['G_internet2']->value;?>
>不上网
		</td></tr>
		<tr><td>是否防水墙:
					<input type="radio" name="sww" value="有" <?php echo $_smarty_tpl->tpl_vars['G_sww1']->value;?>
>有
					<input type="radio" name="sww" value="无" <?php echo $_smarty_tpl->tpl_vars['G_sww2']->value;?>
>无
		</td></tr>
		<tr><td>计算机用途:<textarea name="application" ><?php echo $_smarty_tpl->tpl_vars['G_application']->value;?>
</textarea></td></tr>
		<tr><td>备注:<textarea name="description" ><?php echo $_smarty_tpl->tpl_vars['G_description']->value;?>
</textarea></td></tr>
		<tr><td><input type="submit" name="send" value="提交"></td></tr>
	</table>
</form>
<?php }?>

</body>
</html><?php }} ?>