<?php
/**
*分页类
*第四版：增加display方法，
*显示总记录数，总页数，当前页,首页，末页，前一页，下一页；
*增加dealPage方法，处理当前页过大或者过小的问题；
*增加pageList方法；在当前页之前和之后循环出另外的页
*增加跳转；
*@todo:1.省略号 2.display的显示  3.单独设置参数  4.地址栏的小数点(parse_url())
*/
class Page{
	/**
	 * 保存的是sql语句中limit 0,3
	 * @var string  */
	public  $limit;
	private $total;
	private $page;
	private $pageNum;
	private $num;
	/**
	 * 每页显示的记录数
	 * @var int  */
	private $listRows;
	private $config=array('title'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'首页','end'=>'末页');
	//$_listRows  每页数据个数 默认是10
	public function __construct($_total,$_listRows=10,$_num=2){
		$this->num=$_num;
		$this->total=$_total;
		$this->listRows=$_listRows;		
		$this->pageNum=ceil($this->total/$this->listRows);
		$this->dealPage();		
		$this->limit="limit ".($this->page-1)*$this->listRows.",".$this->listRows;
	}
	private function dealPage(){
		//如果地址栏不为空的话，page就是地址栏的值，如果为空的话，就是1
		//$this->page=!empty(intval($_GET['page']))?intval($_GET['page']):1;		
		//$this->page=intval($this->page);					
		if(!empty($_GET['page'])){
			$this->page=intval($_GET['page']);
		}else{
			$this->page=1;
		}
		if($this->page>=$this->pageNum){
			$this->page=$this->pageNum;
		}
		if($this->page<1){
			$this->page=1;
		}			
	}
	/**
	 * 设置URL地址
	 *   */
	private function setUrl() {
		$_url = $_SERVER["REQUEST_URI"];
		$_par = parse_url($_url);
		if (isset($_par['query'])) {
			parse_str($_par['query'],$_query);
			unset($_query['page']);
			$_url = $_par['path'].'?'.http_build_query($_query);
		}
		return $_url;
	}
	/**
	 * 设置config数组的值;
	 * @param string $_key
	 * @param string $_value  */
	public function setConfig($_key,$_value){
		if(isset($this->config[$_key])){
			$this->config[$_key]=$_value;
		}
	}
	/**
	 * 当前页及其前后
	 * $prev:前面的页数
	 * @todo:$this->page-$num>1
	 **/
	private function pageList(){
		$prev='';
		$next='';
		$first='';
		$end='';
		if($this->page==1){
			$first="";			
		}elseif($this->page>$this->num+2){
			$first='<a href="?page=1">1</a>..';
		}elseif($this->page>$this->num+1){
			$first='<a href="?page=1">1</a>';
		}
		if($this->page==$this->pageNum){
			$end='';
		}elseif($this->pageNum-$this->page>$this->num+1){
			$end="...<a href='?page=".$this->pageNum."'>".$this->pageNum."</a>";
		}elseif($this->pageNum-$this->page>$this->num){
			$end="<a href='?page=".$this->pageNum."'>".$this->pageNum."</a>";
		}
		$present="<span style='color:red;font-size:18px;'>".$this->page."</span>&nbsp;";				
		for($i=$this->num;$i>=1;$i--){
			$page=$this->page-$i;
			if($page<1){
				continue;
			}else{
				$prev.="<a href='?page=".$page."'>".$page."</a>&nbsp;";
			}			
		}
		for($j=1;$j<=$this->num;$j++){
			$page=$this->page+$j;
			if($page<=$this->pageNum){
				$next.="<a href='?page=".$page."'>".$page."</a>&nbsp;";
			}else{
				break;
			}			
		}		
		return $first.$prev.$present.$next.$end;
	}
	public function jump(){
		echo "<input type='text' style='width:25px;' value='".$this->page."' id='urInput'>";
		echo "<input type='button' value='跳转' id='btn'>";
		echo "<script>";
		echo " var btn=document.getElementById('btn');
		       var urInput=document.getElementById('urInput');
		       //alert(urInput.value);
		      //alert(btn);
		      btn.onclick=function(){
	             //alert(urInput.value);	
	             location.href='?page='+urInput.value;
	         }	
	         //按下键盘键的时候，会产生事件对象evt;
	         urInput.onkeydown=function(evt){
                 //alert(3333);
                 //在ie下
                 if(window.event){
	               evt=window.event;
	              }
                 if(evt.keyCode==13){
                    location.href='?page='+urInput.value;
                 }                 	         
	         }
		";
		echo "</script>";
	}
	/**
	 * 显示首页
	 * 在第一页时，没有连接，不再时才有连接；
	 *@return string    */
	private function first(){
		$str='';
		if($this->page==1){
			$str="首页";
		}elseif($this->page > $this->num+1){
			$str="<a href='?page=1'>首页</a>...";
		}else{
			$str="<a href='?page=1'>首页</a>";
		}
		return $str;
	}
	/**
	 * 显示末页
	 * 在最后一页时，没有连接，否则有连接；
	 *@return string*/
	private function end(){
		$str='';
		if($this->page==$this->pageNum){
			$str="末页";
		}elseif($this->pageNum-$this->page>$this->num){
			$str="...<a href='?page=".$this->pageNum."'>末页</a>";
		}else{
			$str="<a href='?page=".$this->pageNum."'>末页</a>";
		}
		return $str;
	}
	/**
	 * 后一页
	 * 当前页减一
	 * @return string; 
	 *   */
	private function prev(){
		$str=$this->config['prev'];
		if($this->page!=1){
			$str="<a href='?page=".($this->page-1)."'>".$this->config['prev']."</a>";
		}
		return $str;
	}
	/**
	 * 下一页
	 * 当前页加一
	 * @return string;
	 **/
	private function next(){
		$str=$this->config['next'];
		if($this->page!=$this->pageNum){
			$str="<a href='?page=".($this->page+1)."'>".$this->config['next']."</a>";
		}
		return $str;
	}
	private function listRowsBegin(){
		return ($this->page-1)*$this->listRows+1;
	}
	private function listRowsEnd(){
		return $this->page*$this->listRows;
	}
	public function firstDataIndex(){
		return ($this->page-1)*$this->listRows;
	}
	/**
	 * 显示分页界面
	 * @access public
	 *   */
	public function display($ui=array(0,1,2,3,4,5,6)){		
		$arr[0]=$this->first();
		$arr[1]=$this->pageList();
		$arr[2]=$this->end();
		$arr[3]=$this->prev();
		$arr[4]=$this->next();
		$arr[5]="本页开始的第：".$this->listRowsBegin()."条数据";
		$arr[6]='本页结束的第：'.$this->listRowsEnd()."条数据";
		$str="";
		foreach($ui as $key){
			$str.=$arr[$key];
		}
		return $str;
	}
}
?>