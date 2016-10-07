<?php
/**
*控制器父类
*
*@todo:分页的条数由常量控制;
*@var obect $smarty:保存的是smarty的实例化的对象
*@var object $model:保存的是模型对象实例
*/
class Action{
	protected $smarty;
	protected $model;
	public function __construct($_smarty,$_model=null){
		$this->smarty=$_smarty;
		$this->model=$_model;
	}
	/**
	 * 分页赋到模板中；
	 * @param unknown_type $_total  */
	public function page($_total){
		$page=new Page($_total);
		//把分页类的limit传给模型;
		$this->model->limit=$page->limit;
		$this->smarty->assign('page',$page->display(array(3,1,4)));
		$this->smarty->assign('num',$page->firstDataIndex());
	}
}
?>