<?php
class Session{
	
	private $server = array(
		'LIFETIME' => 1000,
		'PATH' => '/',
		'DOMAIN' => NULL,
		'SECURE' => false,
		'HTTP_ONLY' => false
	);
			
	public function __construct($lifetime, $path, $domain, $secure, $http_only){
		$this->server['LIFETIME'] = $lifetime;
		$this->server['PATH'] = $path;
		$this->server['DOMAIN'] = $domain;
		$this->server['SECURE'] = $secure;
		$this->server['HTTP_ONLY'] = $http_only;
	}			
	public function StartSession(){
		session_start();
		session_set_cookie_params($this->server['LIFETIME'], $this->server['PATH'], $this->server['DOMAIN'], $this->server['SECURE'], $this->server['HTTP_ONLY']);
	}
	public function AddToSession($name, $value){
		$_SESSION[$name] = $value;
	}
	public function UnsetSession(){ 
		session_unset();
		session_destroy();
	}
}
?>
