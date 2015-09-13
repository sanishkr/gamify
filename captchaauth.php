<?php

interface CaptchaInterface{
	function setString($string);
	function getString();
	function getImage();
	function auth($input);
}


//For Imagick
class Captcha implements CaptchaInterface{
	private $captchaString;

	public function setString($string){
		$this->captchaString = $string;
	}

	public function getString(){
		return $this->captchaString;
	}

	public function getImage(){
		$image = new Imagick();
		$image->newImage(80,40,'none');
		$image->setImageBackgroundColor('#ffffff');

		$string = new ImagickDraw();
		$string->setFont("fontPath");
		$string->setFontSize(14);
		$string->annotation(0,20,$this->captchaString);

		$image->drawImage($string);
		return $image;

	}

	public function renderImage($image){
		header("Content-type: image/png");
		header("Cache-control: no-cache");
		$image->setImageFormat("png");
		echo $image;
		exit;
	}

	public function auth($input){
		return ($this->captchaString == $input)?true:false;
	}
}

//For GD
class CaptchaGd implements CaptchaInterface{
	private $captchaString;

	public function setString($string){
		$this->captchaString = $string;
	}

	public function getString(){
		return $this->captchaString;
	}

	public function getImage(){
		$image = imagecreate(80,40);
		$bcolor = ImageColorAllocate($image, 255, 255, 255);
		$textcolor = ImageColorAllocate($image, 0,0,0);
		$font_path="fontPath";
		ImageTTFText ($image, 14, 0, 0, 20, $textcolor, $font_path,$this->captchaString);
		return $image;

	}

	public function renderImage($image){
		header("Content-type: image/png");
		header("Cache-control: no-cache");
		$textcolor = ImageColorAllocate($image, 255, 255, 255);
		ImagePNG($image);
		ImageColorAllocate($image,$textcolor);
		imagedestroy($image);
		exit;
	}

	public function auth($input){
		return ($this->captchaString == $input)?true:false;
	}
}

//How to use

//CreateCaptchaImage
session_start();
$obj = new Captcha();
$_SESSION['captcha']=substr((md5(date("YmdD His"))), 0, 5);
$obj->setString($_SESSION['captcha']);
$obj->renderImage($obj->getImage());



//AuthExample(POST Object)
session_start();
$obj = new Captcha();
$obj->setString($_SESSION['captcha']);
if($obj->auth($_POST['captcha']){
//True Action

}else{
//False Action

}
