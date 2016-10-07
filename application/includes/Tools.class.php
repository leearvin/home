<?php
/**
*工具类
*@final Tools
*@static getBack:弹出信息，自定义时间，并返回；
*/
final class Tools{
	/**
	 * 弹出信息，自定义时间，并返回
	 * @static getBack
	 * @param string $_msg
	 * @param int $_t  */
	static public function getBack($_msg,$_t){
		echo "<div id='ad' style='width:250px;height:50px;border:1px solid orange;border-radius:8px;margin:150px auto;text-align:center;line-height:50px;'></div>";
		echo "<script>";
		echo "
		     var ad=document.getElementById('ad');
		     //alert(ad);
		     var t=".$_t.";
		     var tt=setInterval(function(){	           
	           if(t==0){
	             clearInterval(tt);
	             ad.style.display='none';
	             history.go(-1);
	           }
	           ad.innerHTML='<span>".$_msg."</span>'+t;
	           t--;
	           },1000);		
		";
		echo "</script>";
	}
	static public function Success($_msg,$_t,$_url){
		echo "<div id='ad' style='width:250px;height:50px;border:1px solid orange;border-radius:8px;margin:150px auto;text-align:center;line-height:50px;'></div>";
		echo "<script>";
		echo "
		var ad=document.getElementById('ad');
		//alert(ad);
		var t=".$_t.";
		var tt=setInterval(function(){
		if(t==0){
		clearInterval(tt);
		ad.style.display='none';
		location.href='".$_url."';
	}
	ad.innerHTML='<span>".$_msg."</span>'+t;
	t--;
	},1000);
	";
		echo "</script>";
	}
	static public function Error($_msg,$_t,$_url){
		echo "<div id='ad' style='width:250px;height:50px;border:1px solid orange;border-radius:8px;margin:150px auto;text-align:center;line-height:50px;'></div>";
		echo "<script>";
		echo "
		var ad=document.getElementById('ad');
		//alert(ad);
		var t=".$_t.";
		var tt=setInterval(function(){
		if(t==0){
		clearInterval(tt);
		ad.style.display='none';
		location.href='".$_url."';
	}
	ad.innerHTML='<span>".$_msg."</span>'+t;
	t--;
	},1000);
	";
		echo "</script>";
	}
	/**
	 * 修剪字符串
	 * 
	 * 根据指定的长度进行修剪，超过指定的长度就是省略号
	 * 省略号也可以被新的设置覆盖;
	 * @param string $_str
	 * @param int $_start
	 * @param int $_length
	 * @param string $_houzui  
	 * @return string;
	 * */
	static public function mbSubstr($_str,$_start,$_length,$_houzui="..."){
		$num=mb_strlen($_str,"utf8");
		if($num>$_length){
			return mb_substr($_str,$_start,$_length,"utf8").$_houzui;
		}
		return mb_substr($_str,$_start,$_length,"utf8");
	}
	/**
	 * 检测数据是否为空
	 * 
	 * @param string $_data  
	 * @return boolean;
	 * */
	static public function isNull($_data){
		if(trim($_data)==''){
			return true;
		}
		return false;
	}
	/**
	 * 检测是否为数字
	 * @param string $_data  
	 * @return boolean;
	 * */
	static public function isNum($_data){
		if(!is_numeric($_data)){
			return true;
		}
		return false;
	}
	/**
	 * 判断两个数据是否一致
	 * @param string $_data1
	 * @param string $_data2  
	 * @return boolean;
	 * */
	static public function isEqual($_data1,$_data2){
		if(trim($_data1)!=trim($_data2)){
			return true;
		}
		return false;
	}
	/**
	 * 检测数据的长度
	 * 不能大于最大值，也不能小于最小值 
	 * @param string $_data
	 * @param int $_length
	 * @param string $_flag  
	 * @return boolean;
	 * */
	static public function lengthFlag($_data,$_length,$_flag){
		if($_flag=='min'){
			if(mb_strlen(trim($_data),"utf8")<$_length){
				return true;
			}
		}elseif($_flag=="max"){
			if(mb_strlen(trim($_data),"utf8")>$_length){
				return true;
			}
		}
		return false;
	}
	/**
	 * 检测邮箱格式
	 * 
	 * 模式的定界符是//，[\w]:任意一个a-z,A-Z,0-9
	 * +是数量词，表示至少有一个
	 * {x,y}表示数量最少是x，最多是y; 
	 * @param unknown_type $_data  
	 * @return boolean;
	 * */
	static public function isEmail($_data){
		$pattern ="/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		
		if(preg_match($pattern,$_data)){
			return true;
		}
		return false;
	}
	
	
	
	/**
	 * 判断是否是一个对象
	 * @param unknown $object
	 * @param string $check
	 * @param string $strict
	 * @return boolean
	 */
	static function is_obj( &$object, $check=null, $strict=true )
 	{
   		if (is_object($object)) {
      		if ($check == null) {
          	 	return true;
      	 	} else {
            	$object_name = get_class($object);
           		 return 	($strict === true)? 
               			 	( $object_name == $check ):
                			( strtolower($object_name) == strtolower($check) );
       		}    
  		 } else {
       		return false;
  		 }
 		} 

 		/**
 		 * 判断输入是不是一个索引数组
 		 * @param unknown $array
 		 * @return boolean
 		 * array_keys()返回数组的所有键值的新数组
 		 * 
 		 *  
 		 */
 	static function is_assoc($array) {
     	if(is_array($array)) {  
       		$keys = array_keys($array);  
        	return $keys != array_keys($keys);  
  		 }  
  		 return false;  
 	
 }
 
 
 /**
  *
  * @param object $emailList .  getAllData()返回值   邮件列表
  * @param string $subject 邮件标题
  * @param string $context 邮件内容
  * @param string $fromEmail 源邮件 要符合信箱判断
  * TODO 配置php邮箱发送。现在发送不正常
  */
	static  public function massMail($emailList,$subject,$context,$fromEmail='5002549@qq.com'){
		//验证邮件主题和内容不能为空
		if(Tools::isNull($subject)||Tools::isNull($context)){
			echo "邮件的主题或者正文不能为空";
		}
		
		
		if(!is_array($emailList)){
			
			echo "邮件列表不是正确数据数组格式";
		}
		//邮箱地址对象历遍
		
		
		foreach ($emailList as $key=>$value){
			
			
			// 发送正文
			$msg = "dear ".$value->first_name." ".$value->last_name."\n ".$context;
			//发送的邮箱地址
			$to = $value->email;
			
			
			//判断是否符合邮箱名称正则
			if(Tools::isEmail($to)){
				//成功失败都要回写浏览器
				if (mail($to, $subject, $msg , 'From'.$fromEmail )) {
					echo "邮件发送".$to."成功<br />";
				} else {
					echo "邮件发送".$to."失败<br />";
				}
			} else{
				echo "邮箱".$to."格式错误<br />";   //格式错误报错
			}
			
			//
			
			 
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>