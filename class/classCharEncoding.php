<?php
class CharEncoding{
	
	private $string = NULL;
	private $avoidEncode = array('"','<','>','&');
	
	public function __construct($string){
		$this->string = $string;
	}
	public function encodeString(){
		$list = get_html_translation_table(HTML_ENTITIES);
		foreach($this->avoidEncode as $char){
			unset($list[$char]);
		}
		$search = array_keys($list);
		$values = array_values($list);
		$search = array_map('utf8_encode', $search);
		$string = str_replace($search, $values, $this->string);
		$this->string = $string;
	}
	public function getEncodedString(){
    	return $this->string;	
	}
}
?>
