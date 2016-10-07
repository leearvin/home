<?php
/**
*上传类simple description
*
*上传前进行路径、大小、类型的检测
*自定义错误信息，外部可以获取错误信息，新文件名，设置上传的最大值
*@package UploadFile;
*
*/
class UploadFile{
	/**
	 * 允许上传的最大值；
	 * @var int $maxSize  */
	private $maxSize=1000000;
	private $fileSize;
	private $allowType;
	private $fileType;
	private $originame;
	private $newFileName;
	private $isRandName;
	private $tmpName;
	private $filePath;
	private $errorNum;
	private $errorMsg;
	/**
	 * 构造方法：必须要传字段名
	 * 允许的类型，路径，是否开启随机文件名有默认值；
	 * @param string $_fieldName
	 * @param array $_allowType
	 * @param string $_filePath
	 * @param boolean $_isRandName  */
	public function __construct($_fieldName,$_filePath='./uploads/',$_allowType=array('gif','png','jpg'),$_isRandName=true){
		$this->isRandName=$_isRandName;
		$this->allowType=$_allowType;
		$this->filePath=$_filePath;
		$this->getFileInfo($_fieldName);
		$this->setNewFileName();
	}
	/**
	 * 获取上传文件的信息 
	 * @param string $_fieldName  */
	private function getFileInfo($_fieldName){
		$this->fileSize=$_FILES[$_fieldName]['size'];
		$this->originame=$_FILES[$_fieldName]['name'];
		$this->errorNum=$_FILES[$_fieldName]['error'];
		$this->tmpName=$_FILES[$_fieldName]['tmp_name'];
		//explode:根据分隔符，把字符串拆分成数组；
		$arr=explode(".", $this->originame);
		//var_dump($arr);
		//echo $arr[count($arr)-1];
		$this->fileType=strtolower($arr[count($arr)-1]);
		//echo "文件类型是：".$this->originame;
		//echo $this->fileType;
	}	
	/**
	 * 根据错误号，输出不同的错误信息
	 * 错误号有内置和自定义两种；
	 *   */
	private function getError(){
		$str='上传错误，错误信息是：';
		switch($this->errorNum){
			case 1:
				$str.="上传文件超过了php.ini设置的最大值";
				break;
			case 2:
				$str.="上传文件超过了表单中的MAX_FILE_SIZE最大值";
				break;
			case 3:
				$str.="文件上传了一部分";
				break;
			case 4:
				$str.="没有文件被上传";
				break;
			case 6:
				$str.="找不到临时文件";
				break;
			case 7:
				$str.="文件写入失败";
				break;
			case -1:
				$str.="上传文件类型错误";
				break;
			case -2:
				$str.="上传文件超过了".$this->maxSize."的值";
				break;			
			case -3:
				$str.="上传目录不存在";			
			default:
				$str.="未知的错误类型";			
		}
		return $str;
	}
	/**
	 *根据是否开启随机文件名，设置上传后新的文件名 
	 *   */
	private function setNewFileName(){
		if($this->isRandName==true){
			$this->newFileName=date('YmdHis').rand(100,999).".".$this->fileType;
		}else{
			$this->newFileName=$this->originame;
		}
	}
	/**
	 * 检测文件大小
	 * @return boolean;
	 *   */
	private function checkFileSize(){		
		if($this->fileSize>$this->maxSize){
			$this->errorNum=-2;
			return false;
		}
		return true;
	}
	/**
	 * 检测文件类型
	 * @return boolean
	 *   */
	private function checkFileType(){
		if(!in_array($this->fileType, $this->allowType)){
			$this->errorNum=-1;
			return false;
		}
		return true;
	}
	/**
	 * 有斜线的时候，删掉斜线，再添加斜线
	 * 如果没有斜线，直接添加斜线；
	 * @return boolean;
	 **/
	private function checkFilePath(){
		if(empty($this->filePath)){
			$this->errorNum=-3;
			return false;
		}
		if(!file_exists($this->filePath)){
			mkdir($this->filePath);
		}
		$this->filePath=rtrim($this->filePath,"/")."/";
		//echo "路径是：".$this->filePath;
		return true;
	}
	/**
	 * 预检测
	 * 检测大小、类型、路径
	 * 如果出错的话，显示相应的错误信息；
	 *   */
	private function preCheck(){
		if($this->errorNum){
			$this->errorMsg=$this->getError();
			return false;
		}
		if(!$this->checkFileSize()){
			$this->errorMsg=$this->getError();			
			return false;
		}
		if(!$this->checkFileType()){
			$this->errorMsg=$this->getError();
			return false;
		}
		if(!$this->checkFilePath()){
			$this->errorMsg=$this->getError();
			return false;
		}
		return true;
	}	
	/**
	 *获取错误信息
	 *@return string; 
	 *   */
	public function getErrorMsg(){
		return $this->errorMsg;
	}
	/**
	 * 获取上传后新的文件名
	 *   */
	public function getFileNewName(){
		return $this->newFileName;
	}
	/**
	 * 在外部设置允许上传的最大值
	 * @param int $_size  */
	public function setMaxSize($_size){
		$this->maxSize=$_size;
	}
	/**
	 * 上传文件
	 * 
	 * 在预检测都通过的情况下，再进行上传；
	 *   */
	public function upload(){
		if($this->preCheck()){
			if(move_uploaded_file($this->tmpName, $this->filePath.$this->newFileName)){
				//Tools::Success("上传成功", 3, "file.html");
				return true;
			}else{
				//Tools::getBack("上传失败,请重新上传",3);
				return false;
			}
		  }				
		}
}
?>