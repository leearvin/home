<?php
/**
*图片类
*/
class Image{
	private $filePath;
	public function __construct($_filePath='uploads/'){
		if(!file_exists($_filePath)){
			mkdir($_filePath);
		}
		$this->filePath=rtrim($_filePath,"/").'/';
	}
	/**
	 * 根据传进来的图片，获取图片的宽、高、类型
	 * @param array $_fileName  */
	private function getInfo($_fileName){
		$data=getimagesize($this->filePath.$_fileName);
		$imageInfo['width']=$data[0];
		$imageInfo['height']=$data[1];
		$imageInfo['type']=$data[2];
		return $imageInfo;
	}
	/**
	 * 根据传入的图片的不同类型，生成相应的图片资源；
	 * @param string $_fileName
	 * @param array $_imgInfo
	 * @return boolean|resource  */
	private function getImageResource($_fileName,$_imgInfo){
		switch($_imgInfo['type']){
			case 1:
				$image=imagecreatefromgif($this->filePath.$_fileName);
				break;
			case 2:
				$image=imagecreatefromjpeg($this->filePath.$_fileName);
				break;
			case 3:
				$image=imagecreatefrompng($this->filePath.$_fileName);
				break;
			default:
				return false;
		}
		return $image;
	}
	/**
	 * 等比例的获取新尺寸 
	 * @param int $_width
	 * @param int $_height
	 * @param array $_imgInfo  */
	private function getNewSize($_width,$_height,$_imgInfo){
		$size['width']=$_imgInfo['width'];
		$size['height']=$_imgInfo['height'];		
		if($_width<$_imgInfo['width']){
			$size['width']=$_width;
		}
		if($_height<$_imgInfo['height']){
			$size['height']=$_height;
		}
		//等比例的公式
		if($_imgInfo['width']*$size['width']>$_imgInfo['height']*$size['height']){
			$size['height']=round($_imgInfo['height']*$size['width']/$_imgInfo['width']);
		}else{
			$size['width']=round($_imgInfo['width']*$size['height']/$_imgInfo['height']);
		}
		return $size;
	}
	/**
	 * 根据传入的图片的类型，生成相应的新的图片资源，并且导出相应格式的新图片;
	 * 
	 * $_imgInfo['type']:1是gif，2是jpg，3是png；
	 * @param resource $_newImage
	 * @param string $_newFileName
	 * @param array $_imgInfo  
	 * @return string $_newFileName:返回缩略图的名字;
	 * */
	private function outputNewImage($_newImageResource,$_newFileName,$_imgInfo){
		switch ($_imgInfo['type']){
			case 1:
				imagegif($_newImageResource,$this->filePath.$_newFileName);
				break;
			case 2:
				imagejpeg($_newImageResource,$this->filePath.$_newFileName);
				break;
			case 3:
				imagepng($_newImageResource,$this->filePath.$_newFileName);
				break;				
		}
		imagedestroy($_newImageResource);
		return $_newFileName;
	}
	/**
	 *生成经过等比例缩放的新图片资源；
	 * @param 原图的图片资源 $_sourceImage
	 * @param array $_size
	 * @param array $_imgInfo  */
	private function resizeImage($_sourceImageResource,$_size,$_imgInfo){
		$newImageResource=imagecreatetruecolor($_size['width'], $_size['height']);
		imagecopyresized($newImageResource,$_sourceImageResource,0, 0, 0, 0, $_size['width'],$_size['height'],$_imgInfo['width'], $_imgInfo['height']);
		imagedestroy($_sourceImageResource);
		return $newImageResource;
	}
	/**
	 * 生成缩略图
	 * @param string $_fileName:源文件图片名
	 * @param int $_width：缩略图的宽
	 * @param int $_height：缩略图的高
	 * @param string $prefix：缩略图的前缀
	 *   */
	public function thumb($_fileName,$_width,$_height,$prefix="only_"){
		//根据图片名，获取图片的宽、高、类型
		$imageInfo=$this->getInfo($_fileName);
		//根据图片的信息，生产源图片的图片资源
		$sourceImageResource=$this->getImageResource($_fileName,$imageInfo);
		//生成新图片的尺寸
		$size=$this->getNewSize($_width, $_height,$imageInfo);
		//生成新的图片资源
		$newImageResource=$this->resizeImage($sourceImageResource,$size,$imageInfo);
		//根据原图的类型，输出相应的图片
		echo $this->outputNewImage($newImageResource, $prefix.$_fileName, $imageInfo);
	}
	/**
	 * 对图片缩放
	 * @param string $_destionFileName
	 * @param number $_rate  */
	public function scale($_destionFileName,$_rate=0.5){
		$prefix=date("YmdHis");
		$imageInfo=$this->getInfo($_destionFileName);
		$sourceImageResource=$this->getImageResource($_destionFileName,$imageInfo);
		$size['width']=$imageInfo['width']*$_rate;
		$size['height']=$imageInfo['height']*$_rate;		
		$newImageResource=$this->resizeImage($sourceImageResource,$size,$imageInfo);
		echo $this->outputNewImage($newImageResource, $prefix.$_destionFileName, $imageInfo);
	}
	/**
	 * 复制图片
	 * @param string $_destionFileName  */
	public function copyImage($_destionFileName){
		$prefix=date("YmdHis");
		$imageInfo=$this->getInfo($_destionFileName);
		$sourceImageResource=$this->getImageResource($_destionFileName,$imageInfo);
		$newImageResource=$this->resizeImage($sourceImageResource, $imageInfo, $imageInfo);
		echo $this->outputNewImage($newImageResource, $prefix.$_destionFileName, $imageInfo);		
	}	
	public function waterMark($_groundName,$_waterName,$_waterMarkPos=9,$prefix='kong_'){
		//判断背景图和水印图片都存在;
		if(file_exists($this->filePath.$_groundName)&&(file_exists($this->filePath.$_waterName))){
			$groundInfo=$this->getInfo($_groundName);
			$waterInfo=$this->getInfo($_waterName);
			if(!$pos=$this->position($groundInfo, $waterInfo, $_waterMarkPos)){
				echo "水印图片添加不成功";
				return false;
			}
			$groundImageResource=$this->getImageResource($_groundName, $groundInfo);
			$waterImageResource=$this->getImageResource($_waterName, $waterInfo);
			$groundImageResource=$this->addWaterMarkImage($groundImageResource, $waterImageResource, $pos, $waterInfo);
			return $this->outputNewImage($groundImageResource, $prefix.$_groundName,$groundInfo);
		}else{
			echo "图片或水印图片不存在";
			return false;
		}
	}
	/**
	 * 为背景图添加水印图片
	 * @param Resource $_groundImageResource
	 * @param Resource $_waterMarResource
	 * @param array $_pos
	 * @param array  $_waterInfo
	 * @return resource|false;
	 *   */
	private function addWaterMarkImage($_groundImageResource,$_waterMarkResource,$_pos,$_waterInfo){
		imagecopy($_groundImageResource, $_waterMarkResource, $_pos['posX'], $_pos['posY'],0, 0, $_waterInfo['width'], $_waterInfo['height']);
		imagedestroy($_waterMarkResource);
		return $_groundImageResource;
	}
	/**
	 * 调整水印图片在背景图的位置；
	 * 
	 * @param array $_groundInfo
	 * @param array $_waterInfo
	 * @param int $_waterPos  
	 * @return array;
	 * */
	private  function position($_groundInfo,$_waterInfo,$_waterPos){
		if($_groundInfo['width']<$_waterInfo['width']||($_groundInfo['height']<$_waterInfo['height'])){
			echo "水印图片不能大于背景图";
			return false;
		}
		switch ($_waterPos){
			case 1:
				$posX=0;
				$posY=0;
				break;
			case 2:
				$posX=($_groundInfo['width']-$_waterInfo['width'])/2;
				$posY=0;
				break;
			case 3:
				$posX=$_groundInfo['width']-$_waterInfo['width'];
				$posY=0;
				break;
			case 4:
				$posX=0;
				$posY=($_groundInfo['height']-$_waterInfo['height'])/2;
				break;
			case 5:
				$posX=($_groundInfo['width']-$_waterInfo['width'])/2;
				$posY=($_groundInfo['height']-$_waterInfo['height'])/2;
				break;
			case 6:
				$posX=$_groundInfo['width']-$_waterInfo['width'];
				$posY=($_groundInfo['height']-$_waterInfo['height'])/2;
				break;
			case 7:
				$posX=0;
				$posY=$_groundInfo['height']-$_waterInfo['height'];
				break;
			case 8:
				$posX=($_groundInfo['width']-$_waterInfo['width'])/2;
				$posY=$_groundInfo['height']-$_waterInfo['height'];
				break;
			case 9:
				$posX=$_groundInfo['width']-$_waterInfo['width'];
				$posY=$_groundInfo['height']-$_waterInfo['height'];
				break;
		}
		return array('posX'=>$posX,'posY'=>$posY);
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>