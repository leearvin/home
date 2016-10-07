<?php
class email_listAction extends Action {
	public function __construct($_smarty) {
		// 调用父类的构造方法，实例话广告模型，赋给Action的model属性；


		parent::__construct ( $_smarty, new email_listModel() );
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
				case "send" :
					$this->send ();
					break;
				case "deleteOne":
					$this->deleteOne();
					break;
				case "deleteEmailById":
					$this->deleteEmailById();
					break;
			}
		}
	}
	
	private function deleteEmailById(){
		if(isset($_POST['submit'])){
			//var_dump($_POST);
			//exit;
			$mailId = $_POST['toDelete'];
			foreach ($mailId as $key=>$value){
				$this->model->id = $value;
				if ($this->model->removeEmailById ()) {
					Tools::Success ( "删除选择的邮件成功", 1, "?action=deleteEmailById" );
				} else {
					Tools::Error ( "删除选择的邮件失败", 3, "?action=deleteEmailById" );
				}
				
				
			}
			
		}
		
		$this->smarty->assign ( "show", false );
		
		parent::page ( $this->model->getALLEmailListTotal () );
			
		
		$data = $this->model->getALLEmailList ();
		
		//print_r($data);
		// 		exit;
		
		$this->smarty->assign ( "AllEmailList", $data );
		
		$this->smarty->assign("title", 'delete email by id');
		
		$this->smarty->assign("deleteEmailById", true);
		
	} 
	
	private function deleteOne(){
		if(isset($_POST['submit'])){
			//print_r($_POST);
			//exit;
			$this->model->email = $_POST['email'];
			if ($this->model->deleteOneEmailByEmail ()) {
				Tools::Success ( "删除计算机信息成功", 3, "?action=deleteOne" );
			} else {
				Tools::getBack ( "删除计算机信息失败", 3 );
			}
			
			
		}
		$this->smarty->assign ( 'title', 'delete one email by email address' );
		$this->smarty->assign ( "deleteOne", true );
	}
	
	private function send(){
		if(isset($_POST['submit'])){
			print_r($_POST);
			//$from = '5002549@qq.com';  //单引号  从源信箱; 默认不用传，服务器默认好的。
			$subject = $_POST['subject'];      //邮件标题 
			$elvisMail = $_POST['elvisMail'];  //邮件正文 
			
			$emailList = $this->model->getALLEmailList();   //获得数据库表单内所有邮件列表 object
			
			
			if(Tools::isNull($subject)||Tools::isNull($elvisMail) ){
				
				$this->smarty->assign ( "G_subject", $subject );
				$this->smarty->assign ( "G_elvisMail", $elvisMail ); 
				//Tools::Success ( "邮件的主题或者正文不能为空", 3, "?action=send" );
				echo "邮件的主题或者正文不能为空";
				
				
			}else{
				Tools::massMail($emailList,$subject,$elvisMail);
				$this->smarty->assign ( "show", true );
			}
			
		}
		$this->smarty->assign ( 'title', 'send mail' );
		$this->smarty->assign ( "send", true );
		
	}
	private function show() {
		//print_r($_GET);

		// echo $_GET['kind'];
		// $this->model->kind=$_GET['kind'];
		// echo $_POST['memoryCapacity']."<br />";
		parent::page ( $this->model->getALLEmailListTotal () );


		$this->smarty->assign ( 'title', 'email list table' );


		$data = $this->model->getALLEmailList ();

		//print_r($data);
// 		exit;

		$this->smarty->assign ( "AllEmailList", $data );


		$this->smarty->assign ( "show", true );




	}
	private function add() {
// 		print_r($_GET);
			
// 		exit;
		// echo $_POST['memoryCapacity'];
		// echo "<br />";
		if (isset ( $_POST ['submit'] )) {
// 			print_r($_POST);
// 			exit;
				
			$this->model->firstName = $_POST ['firstname'];
			$this->model->lastName = $_POST ['lastname'];
			$this->model->email = $_POST ['email'];
			
			if ($this->model->addEmailList ()) {
				Tools::Success ( "新增计算机信息成功", 1, "?action=show" );
			} else {
				Tools::Error ( "新增计算机信息失败", 3, "?action=show" );
			}
		}
		$this->smarty->assign ( "title", "add new email" );
		$this->smarty->assign ( "add", true );
	}
	
	
	private function update() {

// 		print_r($_GET);
			
// 		exit;
		if (isset ( $_POST ['submit'] )) {
				
			$this->model->id = $_POST['id'];
			$this->model->firstName = $_POST ['firstname'];
			$this->model->lastName = $_POST ['lastname'];
			$this->model->email = $_POST ['email'];
							
			if ($this->model->updateEmailList ()) {
				Tools::Success ( "修改计算机信息成功", 1, "?action=show" );
			} else {
				Tools::getBack ( "修改计算机信息失败", 3 );
			}
		}

		if (isset ( $_GET ['id'] )) {
				

			$this->model->id = $_GET ['id'];
			$data = $this->model->getOneEmailList ();

			$this->smarty->assign ( "G_id", $data->id );
			$this->smarty->assign ( "G_firstName", $data->first_name );
			$this->smarty->assign ( "G_lastName", $data->last_name );
			$this->smarty->assign ( "G_email", $data->email );
				


		}
		$this->smarty->assign ( "title", "update email information" );
		$this->smarty->assign ( "update", true );
	}
	private function delete() {

		$this->model->id = $_GET ['id'];

		if ($this->model->deleteEmailList ()) {
			Tools::Success ( "删除计算机信息成功", 3, "?action=show" );
		} else {
			Tools::getBack ( "删除计算机信息失败", 3 );
		}

		$this->smarty->assign ( "delete", true );
	}
}

