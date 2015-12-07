<?php
class ImageEditor{
	
	private $image;
	private $image_type;
	
	public function __construct($filename){
		$info = getimagesize($filename);
		$this->image_type = $info[2];
		switch($this->image_type){
			case IMAGETYPE_JPEG:
				$this->image = imagecreatefromjpeg($filename);
			break;
			case IMAGETYPE_GIF:
				$this->image = imagecreatefromgif($filename);
			break;
			case IMAGETYPE_PNG:
				$this->image = imagecreatefrompng($filename);
			break;
		}
	}
	public function GetHeight(){
		return imagesy($this->image);
	}
	public function GetWidth(){
		return imagesx($this->image);
	}
	public function Output($type){
		switch($type){
			case IMAGETYPE_JPEG:
				imagejpeg($this->image);
			break;
			case IMAGETYPE_GIF:
				imagegif($this->image);
			break;
			case IMAGETYPE_PNG:
				imagepng($this->image);
			break;
		}
	}
	public function Resize($width, $height){
		$new_image = imagecreatetruecolor($width, $height);
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->GetWidth(), $this->GetHeight());
		$this->image = $new_image;
	}  
	public function ResizeToHeight($height){
		$ratio = $height / $this->GetHeight();
		$width = $this->GetWidth() * $ratio;
		$this->Resize($width, $height);
	}
	public function ResizeToWidth($width){
		$ratio = $width / $this->GetWidth();
		$height = $this->Getheight() * $ratio;
		$this->Resize($width, $height);
	}
	public function Save($filename, $type, $compression, $permissions){
		switch($type){
			case IMAGETYPE_JPEG:
				imagejpeg($this->image, $filename, $compression);
			break;
			case IMAGETYPE_GIF:
				imagegif($this->image, $filename);
			break;
			case IMAGETYPE_PNG:
				imagepng($this->image, $filename);
			break;
		}
		if($permissions <> NULL){
			chmod($filename, $permissions);
		}
	}
	public function Scale($scale){
		$width = $this->GetWidth() * $scale/100;
		$height = $this->Getheight() * $scale/100;
		$this->Resize($width, $height);
	} 
	public function Crop($height, $width){
		$centreX = round($this->GetWidth()/2);
		$centreY = round($this->GetHeight()/2);
		$x1 = $centreX - $width/2;
		$y1 = $centreY - $height/2; 
		$x2 = $centreX + $width/2;
		$y2 = $centreY + $height/2;
		if(!is_resource($this->image)){
			die('ERROR! No image set');
		}
		if(is_array($x1) && 4 == count($x1)){
			list($x1, $y1, $x2, $y2) = $x1;
		}
		$x1 = max($x1, 0);
		$y1 = max($y1, 0);   
		$x2 = min($x2, $this->GetWidth());
		$y2 = min($y2, $this->GetWidth());
		$temp = imagecreatetruecolor($width, $height);
		imagecopy($temp, $this->image, 0, 0, $x1, $y1, $width, $height);
		$this->image = $temp;
	}   
}
?>