<?php

class guitar_warsAction extends Action {
	public function __construct($_smarty) {
		// 调用父类的构造方法，实例化模型，赋给Action的model属性；
		
		parent::__construct ( $_smarty, new guitar_warsModel());
		
		
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
	
private function show(){
	parent::page ( $this->model->getALLGuitarWarsScoresTotal () );
	$this->smarty->assign ( 'title', 'guitar wars' );
	$data = $this->model->getALLGuitarWarsScores ();
	
	$this->smarty->assign ( "GuitarWarsScores", $data );
	$this->smarty->assign ( "show", true );
}
	
private function add(){
	if(isset($_POST['submit'])){
		//var_dump($_POST);
		$this->model->name = $_POST['name'];
		$this->model->score = $_POST['score'];
		if(isset($_FILES)){
// 			var_dump($_FILES);
// 			echo "<br />";
			
			$upload=new UploadFile('screenShot','../../database/uploads/');
// 			var_dump($upload);
// 			exit;
			$upload->setMaxSize("10000000");
			
			if($upload->upload()){
				$this->model->screenShot = $upload->getFileNewName();
				
// 				echo $this->model->screenShot;
// 				exit;
// 				Tools::Success("上传".$upload->getFileNewName()."成功了", 3, "file.html");
				echo $upload->getFileNewName()."上传成功了";
				
			}else{
				Tools::Error($upload->getErrorMsg(), 5, "?action=add");
				//Tools::getBack("上传失败", 3);
			}
			
		}	
		if($this->model->addGuitarWarsScore()){
			Tools::Success('add GuitarWars score successed!', 3,"?action=show");
		}else{
			Tools::getBack('add GuitarWars score failed!',"?action=add");
		}
	}
	$this->smarty->assign("title","add GuitarWars Score");
	$this->smarty->assign("add",true);
}

private function delete(){
	if(isset($_GET)){
		$this->model->id = $_GET['id'];
		$oneScore = $this->model->getOneGuitarWarsScore();
		$file = "../../database/uploads/".$oneScore->screenshot;
		
		if(file_exists($file)){
			if(unlink($file)){
				echo "delete file successed!";;
			}else{
				echo "delete file failed";
				Tools::Success('delete GuitarWars score failed!', 3,"?action=show");
			}
		}
		if($this->model->deleteOneGuitarWarsScore()){
			Tools::Success('delete GuitarWars score successed!', 3,"?action=show");
		}else{
			Tools::Success('delete GuitarWars score failed!', 3,"?action=show");
		}
	}
}

private function update(){
	if(isset($_GET[id])){
		$this->model->id = $_GET[id];
		$oneGuitarWarsScore = $this->model->getOneGuitarWarsScore();
// 		var_dump($oneGuitarWarsScore);
		
		$G_screenShot =  $oneGuitarWarsScore->screenshot;
// 		echo $oneGuitarWarsScore->id;
// 		exit;
		
		$this->smarty->assign("G_name",			$oneGuitarWarsScore->name);
		$this->smarty->assign("G_id",			$oneGuitarWarsScore->id);
		$this->smarty->assign("G_score",		$oneGuitarWarsScore->score);
		$this->smarty->assign("G_screenshot_hidden",$G_screenShot);
 		$this->smarty->assign("G_screenshot",	"../../database/uploads/".$G_screenShot);
	}
	
	if(isset($_POST['submit'])){
// 		var_dump($_POST);
		$this->model->id = $_POST['id'];
		$this->model->name = $_POST['name'];
		$this->model->score = $_POST['score'];
		$G_screenShot = $_POST['G_screenShot'];
		
	if(!empty($_FILES['updateScreenShot']['name'])){
			
			$upload=new UploadFile('updateScreenShot','../../database/uploads/');
			$upload->setMaxSize("10000000");
			
			if($upload->upload()){
				$this->model->screenShot = $upload->getFileNewName();
				echo $upload->getFileNewName()."上传成功了";
			}else{
				echo $upload->getErrorMsg();
			}
			
		}else{
			$this->model->screenShot = $G_screenShot;
		}
		
		if($this->model->updateOneGuitarWarsScore()){
			Tools::Success('update GuitarWars score successed!', 3,"?action=show");
		}else{
			Tools::getBack('add GuitarWars score failed!',"?action=update&id=".$_POST['id']);
		}
		
	}
	$this->smarty->assign("title","update GuitarWars Score");
	$this->smarty->assign("update",true);
	
}
	
}
?>