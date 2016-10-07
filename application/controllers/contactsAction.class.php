<?php
class contactsAction extends Action{
	public function __construct($_smarty){
		//调用父类的构造方法，实例话广告模型，赋给Action的model属性；
		parent::__construct($_smarty,new contactsModel());
	}
	public function run(){
		$this->show();
// 		switch ($_GET['action']){
// 			case "show":
// 				$this->show();
// 				break;
// 		}

	}

	private function show(){
		
		parent::page($this->model->getAllContactsTotal());
		
		$data = $this->model->getAllContacts();
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		$this->smarty->assign("AllContacts",$data);
		
		$this->smarty->assign("title","客户基本信息登记表");
		$this->smarty->assign("show",true);
	}

}
