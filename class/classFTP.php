<?php
class FTP{
	private $ftp = array(
		'HOST' => NULL,
		'USER' => NULL,
		'PASSWORD' => NULL,
		'PORT' => 21,
		'PASV' => true
	);	
	
	public function __construct($host, $user, $password){
		$this->ftp['HOST'] = $host;
		$this->ftp['USER'] = $user;
		$this->ftp['PASSWORD'] = $password;
	}
	public function UploadFTP($local,$remote){
		$id=$this->FTPconnexion();
		ftp_put($id,$remote,$local,FTP_BINARY);
		ftp_quit($id);
	}
	public function CreateDir($dir){
		$id=$this->FTPconnexion();
		ftp_mkdir($id,$dir);
		ftp_chmod($id,$dir,0777);
		ftp_quit($id);	
	}
	public function RemoveDir($dir){
		$id=$this->FTPconnexion();
		ftp_rmdir($id,$dir);
		ftp_quit($id);
	}
	private function FTPconnexion(){
		$id=ftp_connect($this->ftp['HOST'],$this->ftp['PORT']);
		ftp_login($id,$this->ftp['USER'],$this->ftp['PASSWORD']);
		ftp_pasv($id,$this->ftp['PASV']);
		return $id;
	}
}
?>
