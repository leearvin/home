<?php
class cominfoAction extends Action {
	public function __construct($_smarty) {
		// 调用父类的构造方法，实例话广告模型，赋给Action的model属性；
		parent::__construct ( $_smarty, new cominfoModel () );
	}
	public function run() {
		
		$this->show ();
		
		
		if(isset($_GET ['action'])){
			
		
		
		switch ($_GET ['action']) {
				//case "show" :
				//$this->show();
				//break;
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
		
		// ///
		// echo $_GET['kind'];
		// $this->model->kind=$_GET['kind'];
		// echo $_POST['memoryCapacity']."<br />";
		parent::page ( $this->model->getALLCominfoTotal () );
		$this->smarty->assign ( 'title', '计算机信息列表' );
		$data = $this->model->getALLCominfo ();
			
		$this->smarty->assign ( "AllCominfo", $data );
		
		$this->smarty->assign ( "show", true );
		
		
		
	}
	private function add() {
		// print_r($_GET);
		// echo $_POST['memoryCapacity'];
		// echo "<br />";
		if (isset ( $_POST ['send'] )) {
			// print_r($_POST);
			$this->model->comcode = $_POST ['comcode'];
			$this->model->comname = $_POST ['comname'];
			$this->model->ip = $_POST ['ip'];
			$this->model->mac = $_POST ['mac'];
			$this->model->user = $_POST ['user'];
			$this->model->department = $_POST ['department'];
			$this->model->cpu = $_POST ['cpu'];
			$this->model->memoryCapacity = $_POST ['memoryCapacity'];
			$this->model->memoryType = $_POST ['memoryType'];
			$this->model->machineRoomPort = $_POST ['machineRoomPort'];
			$this->model->switchNumber = $_POST ['switchNumber'];
			$this->model->internet = $_POST ['internet'];
			$this->model->sww = $_POST ['sww'];
			$this->model->application = $_POST ['application'];
			$this->model->description = $_POST ['description'];
			if ($this->model->addCominfo ()) {
				Tools::Success ( "新增计算机信息成功", 1, "?action=show" );
			} else {
				Tools::Error ( "新增计算机信息失败", 3, "?action=show" );
			}
		}
		$this->smarty->assign ( "title", "新增计算机信息" );
		$this->smarty->assign ( "add", true );
	}
	private function update() {
		if (isset ( $_POST ['send'] )) {
// 			echo "<pre>";
// 			var_dump($_POST);
// 			echo "</pre>";
			$this->model->id = $_POST['id'];
			$this->model->comcode = $_POST ['comcode'];
			$this->model->comname = $_POST ['comname'];
			$this->model->ip = $_POST ['ip'];
			$this->model->mac = $_POST ['mac'];
			$this->model->user = $_POST ['user'];
			$this->model->department = $_POST ['department'];
			$this->model->cpu = $_POST ['cpu'];
			$this->model->memoryCapacity = $_POST ['memoryCapacity'];
			$this->model->memoryType = $_POST ['memoryType'];
			$this->model->machineRoomPort = $_POST ['machineRoomPort'];
			$this->model->switchNumber = $_POST ['switchNumber'];
			$this->model->internet = $_POST ['internet'];
			$this->model->sww = $_POST ['sww'];
			$this->model->application = $_POST ['application'];
			$this->model->description = $_POST ['description'];
			if ($this->model->updateCominfo ()) {
				Tools::Success ( "修改计算机信息成功", 1, "?action=show" );
			} else {
				Tools::getBack ( "修改计算机信息失败", 3 );
			}
		}
		
		if (isset ( $_GET ['id'] )) {
			// print_r($_GET);
			// echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			
			$this->model->id = $_GET ['id'];
			$data = $this->model->getOneCominfo ();
			$this->smarty->assign ( "G_id", $data->id );
			$this->smarty->assign ( "G_comcode", $data->comcode );
			$this->smarty->assign ( "G_comname", $data->comname );
			$this->smarty->assign ( "G_ip", $data->ip );
			$this->smarty->assign ( "G_mac", $data->mac );
			$this->smarty->assign ( "G_user", $data->user );
			
			$this->smarty->assign ( "G_department", $data->department );
			switch ($data->department) {
				case "支撑部" :
					$this->smarty->assign ( 'G_department1', "selected='selected'" );
					break;
				case "行政一部" :
					$this->smarty->assign ( 'G_department2', "selected='selected'" );
					break;
				case "财务部" :
					$this->smarty->assign ( 'G_department3', "selected='selected'" );
					break;
				case "工程部" :
					$this->smarty->assign ( 'G_department4', "selected='selected'" );
					break;
				case "客服部" :
					$this->smarty->assign ( 'G_department5', "selected='selected'" );
					break;
				case "行政二部" :
					$this->smarty->assign ( 'G_department6', "selected='selected'" );
					break;
				case "人事部" :
					$this->smarty->assign ( 'G_department7', "selected='selected'" );
					break;
				case "数据部" :
					$this->smarty->assign ( 'G_department8', "selected='selected'" );
					break;
				case "业务一部" :
					$this->smarty->assign ( 'G_department9', "selected='selected'" );
					break;
				case "业务二部" :
					$this->smarty->assign ( 'G_department10', "selected='selected'" );
					break;
				case "业务三部" :
					$this->smarty->assign ( 'G_department11', "selected='selected'" );
					break;
				case "业务四部" :
					$this->smarty->assign ( 'G_department12', "selected='selected'" );
					break;
				case "业务北区" :
					$this->smarty->assign ( 'G_department13', "selected='selected'" );
					break;
				case "管理部" :
					$this->smarty->assign ( 'G_department14', "selected='selected'" );
					break;
				case "青春营业厅" :
					$this->smarty->assign ( 'G_department15', "selected='selected'" );
					break;
				case "机房" :
					$this->smarty->assign ( 'G_department16', "selected='selected'" );
					break;
				case "支库房" :
					$this->smarty->assign ( 'G_department17', "selected='selected'" );
					break;
			}
			switch ($data->cpu) {
				case "celeron2.8" :
					$this->smarty->assign ( 'G_cpu1', "selected='selected'" );
					break;
				case "celeron2.66" :
					$this->smarty->assign ( 'G_cpu2', "selected='selected'" );
					break;
				case "celeron3.06" :
					$this->smarty->assign ( 'G_cpu3', "selected='selected'" );
					break;
				case "G630" :
					$this->smarty->assign ( 'G_cpu4', "selected='selected'" );
					break;
				case "i5-3470" :
					$this->smarty->assign ( 'G_cpu5', "selected='selected'" );
					break;
				case "E5800" :
					$this->smarty->assign ( 'G_cpu6', "selected='selected'" );
					break;
				case "E5700" :
					$this->smarty->assign ( 'G_cpu7', "selected='selected'" );
					break;
				case "E5500" :
					$this->smarty->assign ( 'G_cpu8', "selected='selected'" );
					break;
				case "E5300" :
					$this->smarty->assign ( 'G_cpu9', "selected='selected'" );
					break;
				case "E430" :
					$this->smarty->assign ( 'G_cpu10', "selected='selected'" );
					break;
				case "E440" :
					$this->smarty->assign ( 'G_cpu11', "selected='selected'" );
					break;
				case "E420" :
					$this->smarty->assign ( 'G_cpu12', "selected='selected'" );
					break;
				case "E1400" :
					$this->smarty->assign ( 'G_cpu13', "selected='selected'" );
					break;
				case "AMD3400+" :
					$this->smarty->assign ( 'G_cpu14', "selected='selected'" );
					break;
			}
			$this->smarty->assign ( "G_memoryCapacity", $data->memoryCapacity );
			switch ($data->memoryType) {
				case "一代内存" :
					$this->smarty->assign ( "G_memoryType1", "checked='checked'" );
					break;
				case "二代内存" :
					$this->smarty->assign ( "G_memoryType2", "checked='checked'" );
					break;
				case "三代内存" :
					$this->smarty->assign ( "G_memoryType3", "checked='checked'" );
					break;
			}
			$this->smarty->assign ( "G_machineRoomPort", $data->machineRoomPort );
			$this->smarty->assign ( "G_switchNumber", $data->switchNumber );
			switch ($data->internet) {
				case "上网" :
					$this->smarty->assign ( "G_internet1", "checked='checked'" );
					break;
				case "不上网" :
					$this->smarty->assign ( "G_internet2", "checked='checked'" );
					break;
			}
			switch ($data->sww) {
				case "有" :
					$this->smarty->assign ( "G_sww1", "checked='checked'" );
					break;
				case "无" :
					$this->smarty->assign ( "G_sww2", "checked='checked'" );
					break;
			}
			
			$this->smarty->assign ( "G_application", $data->application );
			$this->smarty->assign ( "G_description", $data->description );
		}
		$this->smarty->assign ( "title", "修改计算机信息" );
		$this->smarty->assign ( "update", true );
	}
	private function delete() {
		// print_r($_GET);
		// echo $_GET['id'];
		$this->model->id = $_GET ['id'];
		
		if ($this->model->deleteConinfo ()) {
			Tools::Success ( "删除计算机信息成功", 3, "?action=show" );
		} else {
			Tools::getBack ( "删除计算机信息失败", 3 );
		}
		
		$this->smarty->assign ( "delete", true );
	}
}
