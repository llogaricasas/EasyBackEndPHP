<?php
class EasyBackEndPHP{
	
	public $status = 'Not Initialized';
	public $pathFolder = '../class/';
	private $classList = array(
		'MySQL' => 'classMySQL.php',
		'FTP' => 'classFTP.php',
		'ImageEditor' => 'classImageEditor.php',
		'StringGenerator' => 'classStringGenerator.php',
                'Sorting' => 'classSorting.php',
                'CharEncoding' => 'classCharEncoding.php'
	);
	
	public function __construct(){
		foreach($this->classList as $class => $path){
			try{
				require $this->pathFolder.$path;
			} catch(Exception $e){
				$this->status = 'Failed to load class: '.$class.' at '.$path;
				die($e->getMessage());
			}
		}
		$this->status = 'All classes loaded - OK';
	}
	public function FTP($host, $user, $password){
		return new FTP($host, $user, $password);
	}
	public function MySQL($host, $database, $user, $password){
		return new MySQL($host, $database, $user, $password);
	}
	public function ImageEditor($filename){
		return new ImageEditor($filename);
	}
	public function Session($lifetime, $path, $domain, $secure, $http_only){
		return new Session($lifetime, $path, $domain, $secure, $http_only);
	}
	public function StringGenerator($lenght){
		return new StringGenerator($lenght);
	}
}
?>
