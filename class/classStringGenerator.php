<?php
class StringGenerator{
	
	private $string = NULL;
	
	public function __construct($length){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++){
        		$randomString.= $characters[rand(0, strlen($characters) - 1)];
		}
		$this->string = $randomString;
	}
	public function getRandomString(){
    		return $this->string;	
	}
}
?>
