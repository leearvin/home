<?php
/**
*验证码类
*
*Captcha==>Completely Automated Public Turning (Test to Tell)Computer and Human Apart
*/
class Captcha {
	private $width;
	private $height;
	private $codeNum;
	/**
	 * 保存图片资源
	 * @var resource  */
	private $image;
	/**
	 * 噪音数量
	 * @var int  */
	private $noiseNum;
	/**
	 * 保存验证码；
	 * @var string  */
	private $captchaCode;
	public function __construct($_width=80,$_height=20,$_codeNum=4){
		$this->width=$_width;
		$this->height=$_height;
		$this->codeNum=$_codeNum;
		//把生产的验证码存到属性中；
		$this->captchaCode=$this->createCaptcha();
		//echo $this->checkCode;
		//让噪音与验证码的尺寸有关联
		$number=floor($_width*$_height/15);
		if($number>240-$_codeNum){
			$this->noiseNum=240-$_codeNum;
		}else{
			$this->noiseNum=$number;
		}		
	}
	/**
	 * 输出有验证码的图片
	 * @param string $_fontFile  */
	public function showCaptcha($_fontFile=''){
		$this->createImage();
		//$this->setNoise();
		$this->outPutText($_fontFile);
		$this->outPutImage();
	}
	/**
	 * 返回验证码
	 * @return string;
	 *   */
	public function getCaptcha(){
		return $this->captchaCode;
	}
	/**
	 * 设置噪音
	 * imagesetpixel:设置像素点
	 *   */
	private function setNoise(){
		for($i=0;$i<$this->noiseNum;$i++){
			$color=imagecolorallocate($this->image, rand(0,255), rand(0,255), rand(0,255));
			imagesetpixel($this->image, rand(1,$this->width-2), rand(1,$this->height-2), $color);
		}
		for($i=0;$i<10;$i++){
			$color=imagecolorallocate($this->image, rand(200,255), rand(200,255), rand(200,255));
			imagearc($this->image,rand(-10,$this->width),rand(-10,$this->height),rand(30,300),rand(20,200),55,44,$color);
		}
	}
	/**
	 * 生成验证码，去除容易混淆的几个字符
	 * @return string  */
	private function createCaptcha(){
		$str="23456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
		$code='';
		for($i=0;$i<$this->codeNum;$i++){
			$code.=$str[rand(0,strlen($str)-1)];
		}
		return $code;
	}
	/**
	 * 向图片中写入字符
	 * 
	 * imagechar:(图片资源, 字体大小, x轴, y轴, 字符, 字符颜色))向图片中写入字符；
	 * $font:范围1-5；
	 * imagettftext(图片资源, 字体大小, 字符角度, x轴, y轴,字符颜色, 字符文件, 字符) 
     *
	 *   */
	private function outPutText($_fontFile){
		for($i=0;$i<$this->codeNum;$i++){
			$fontColor=imagecolorallocate($this->image, rand(0,120), rand(0,120), rand(0,120));
			if($_fontFile==''){
				$fontSize=rand(3,5);
				$x=floor($this->width/$this->codeNum)*$i+3;
				$y=rand(0,$this->height-15);
				imagechar($this->image, $fontSize, $x, $y, $this->captchaCode[$i], $fontColor);
			}else{
				$fontSize=rand(12,16);
				$x=floor($this->width-8)/$this->codeNum*$i+8;
				$y=rand($fontSize+5,$this->height-2);
				$angle=rand(-30,30);
				imagettftext($this->image, $fontSize,$angle,$x,$y,$fontColor,$_fontFile,$this->captchaCode[$i]);
			}			
		}		
	}
	/**
	 * 创建真彩色的图片
	 **/
	private function createImage(){
		$this->image=imagecreatetruecolor($this->width, $this->height);
		$bgColor=imagecolorallocate($this->image,rand(200,255),rand(200,255),rand(200,255));
		imagefill($this->image, 0, 0,$bgColor);
		$borderColor=imagecolorallocate($this->image, 0, 0, 0);
		imagerectangle($this->image, 0, 0, $this->width-1, $this->height-1, $borderColor);
	}
	/**
	 * 输出图片
	 *   
	 **/
	private function outPutImage(){
		imagepng($this->image);
	}
	public function __destruct(){
		imagedestroy($this->image);
	}
}
?>