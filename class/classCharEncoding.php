<?php
class CharEncoding{
	
	private $string = NULL;
	
	public function __construct($string){
		$this->string = $string;
	}
	public function encodeString(){
		$list = get_html_translation_table(HTML_ENTITIES);
		unset($list['"']);
		unset($list['<']);
		unset($list['>']);
		unset($list['&']);
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
