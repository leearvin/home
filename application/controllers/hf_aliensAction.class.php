<?php
class hf_aliensAction extends Action {
	public function __construct($_smarty) {
		// 调用父类的构造方法，实例话广告模型，赋给Action的model属性；
		
		
		parent::__construct ( $_smarty, new hf_aliensModel() );
	}
	public function run() {
		
		
		$this->show ();
		

		if(isset($_GET ['action'])){
			
			
			
			switch ($_GET ['action']) {
				case "show" :
				$this->show();
				break;
				case "add" :
					$this->add ();
					break;
				case "update" :
					$this->update ();
					break;
				case "delete" :
					$this->delete ();
					break;
			}

		}


	}
	private function show() {
		//print_r($_GET);
		
		// echo $_GET['kind'];
		// $this->model->kind=$_GET['kind'];
		// echo $_POST['memoryCapacity']."<br />";
		parent::page ( $this->model->getALLAlienAbductionTotal () );
	
		
		$this->smarty->assign ( 'title', 'aliens tables' );
		
		
		$data = $this->model->getALLAlienAbduction ();
		
		
		
		$this->smarty->assign ( "AllAlienAbduction", $data );
		

		$this->smarty->assign ( "show", true );
		



	}
	private function add() {
		// print_r($_GET);
		 
		// exit;
		// echo $_POST['memoryCapacity'];
		// echo "<br />";
		if (isset ( $_POST ['submit'] )) {
			 print_r($_POST);
			
			$this->model->firstName = $_POST ['firstname'];
			$this->model->lastName = $_POST ['lastname'];
			$this->model->email = $_POST ['email'];
			$this->model->whenItHappened = $_POST ['whenithappened'];
			$this->model->howLong = $_POST ['howlong'];
			$this->model->howMany = $_POST ['howmany'];
			$this->model->aliensDescription = $_POST ['aliensdescription'];
			$this->model->whatTheyDid = $_POST ['whattheydid'];
			$this->model->fangSpotted = $_POST ['fangspotted'];
			$this->model->other = $_POST ['other'];
			if ($this->model->addAlienAbduction ()) {
				Tools::Success ( "新增计算机信息成功", 1, "?action=show" );
			} else {
				Tools::Error ( "新增计算机信息失败", 3, "?action=show" );
			}
		}
		$this->smarty->assign ( "title", "add new aliensAbduction" );
		$this->smarty->assign ( "add", true );
	}
	private function update() {
		
		// print_r($_GET);
			
		// exit;
		if (isset ( $_POST ['submit'] )) {
			
			print_r($_POST);
						
			$this->model->id = $_POST['id'];
			$this->model->firstName = $_POST ['firstname'];
			$this->model->lastName = $_POST ['lastname'];
			$this->model->email = $_POST ['email'];
			$this->model->whenItHappened = $_POST ['whenithappened'];
			$this->model->howLong = $_POST ['howlong'];
			$this->model->howMany = $_POST ['howmany'];
			$this->model->aliensDescription = $_POST ['aliensdescription'];
			$this->model->whatTheyDid = $_POST ['whattheydid'];
			$this->model->fangSpotted = $_POST ['fangspotted'];
			$this->model->other = $_POST ['other'];
			
			if ($this->model->updateAlienAbduction ()) {
				Tools::Success ( "修改计算机信息成功", 1, "?action=show" );
			} else {
				Tools::getBack ( "修改计算机信息失败", 3 );
			}
		}

		if (isset ( $_GET ['id'] )) {
			
				
			$this->model->id = $_GET ['id'];
			$data = $this->model->getOneAlienAbduction ();
																				
			$this->smarty->assign ( "G_id", $data->ID );
			$this->smarty->assign ( "G_firstName", $data->first_name );
			$this->smarty->assign ( "G_lastName", $data->last_name );
			$this->smarty->assign ( "G_whenItHappened", $data->when_it_happened );
			$this->smarty->assign ( "G_howLong", $data->how_long );
			$this->smarty->assign ( "G_howMany", $data->how_many );
			$this->smarty->assign ( "G_alienDescription", $data->alien_description );
			$this->smarty->assign ( "G_whatTheyDid", $data->what_they_did );
			switch ($data->fang_spotted) {
				case "yes" :
					$this->smarty->assign ( "G_fang_spotted1", "checked='checked'" );
					break;
				case "no" :
					$this->smarty->assign ( "G_fang_spotted2", "checked='checked'" );
					break;
			}
			//$this->smarty->assign ( "G_fangSpotted", $data->fang_spotted );
			$this->smarty->assign ( "G_other", $data->other );
			$this->smarty->assign ( "G_email", $data->email );
			
				
	
		}
		$this->smarty->assign ( "title", "update aliens abduction" );
		$this->smarty->assign ( "update", true );
	}
	private function delete() {
		
		$this->model->id = $_GET ['id'];

		if ($this->model->deleteAlienAbduction ()) {
			Tools::Success ( "删除计算机信息成功", 3, "?action=show" );
		} else {
			Tools::getBack ( "删除计算机信息失败", 3 );
		}

		$this->smarty->assign ( "delete", true );
	}
}

