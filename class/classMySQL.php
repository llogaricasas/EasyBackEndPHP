<?php
class MySQL{
	
	private $server = array(
		'HOST' => 'host_IP',
		'DATABASE' => 'database_name',
		'USER' => 'user_name',
		'PASSWORD' => 'password'
	);
	
	public function __construct($host, $database, $user, $password){
		$this->server['HOST'] = $host;
		$this->server['USER'] = $database;
		$this->server['PASSWORD'] = $user;
		$this->server['DATABASE'] = $password;
	}
	public function AffectedRows($all,$table,$row,$var,$orderby,$flag,$limit=''){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		if($all){ $q = 'SELECT * FROM '.$table.'';}
		else{$q='SELECT * FROM '.$table.' WHERE '.$row.'="'.$var.'" ';}
		(!(empty($orderby))) ? $q.=' ORDER BY '.$orderby.' ' : $q;
		$q.=$o[$flag].' '.$limit;
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		$n = mysql_affected_rows();
		mysql_close();
		return $n;
	}
	public function Alter($table,$options){
		$q = 'ALTER TABLE '.$table.' '.$options.'';	
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		$x = (mysql_affected_rows()) ?  true : false;
		mysql_close();
		return $x;
	}
	public function Create($name,$rows){
		$q = 'CREATE TABLE IF NOT EXISTS '.$name.' ('.$rows.')';	
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $x = true : $x = false;
		mysql_close();
		return $x;
	}
	public function Delete($table,$row,$var){
		$q = 'DELETE FROM '.$table.' WHERE '.$row.'="'.$var.'"';	
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $x = true : $x = false;
		mysql_close();
		return $x;
	}
	public function Distinct($row,$table){
		$q = 'SELECT DISTINCT '.$row.' FROM '.$table.'';
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $d=mysql_fetch_array($r) : die('Error');
		mysql_close();
		return $d;
	}
	public function Drop($table){
		$q = 'DROP TABLE IF EXISTS '.$table.'';	
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $x = true : $x = false;
		mysql_close();
		return $x;
	}
	public function Insert($bool,$table,$rows,$n_arguments){
		$n = func_num_args();
		$r = explode(',',$rows);
		$r = count($r);
		if(!($n-3===$r)){die('Error');}
		$q = 'INSERT INTO '.$table.' ('.$rows.') VALUES (';
		for($i=3;$i<$n;$i++){
			$d = func_get_arg($i);
			($i===$n-1) ? $q.='\''.$d.'\'' : $q.='\''.$d.'\',';
		}
		$q.=')';
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		if($bool){(mysql_affected_rows()) ? $i=true : $i=false;}
		else{$i = mysql_insert_id();}
		mysql_close();
		return $i;
	}
	public function Invoke($query){
		$l = $this->Query_constructor();
		$r = mysql_query($query,$l);
		mysql_close();
		return $r;	
	}
	public function InvokeAffectedRows($query){
		$l = $this->Query_constructor();
		$r = mysql_query($query,$l);
		$n = mysql_affected_rows();
		mysql_close();
		return $n;	
	}
	public function Loop($all,$table,$row,$var,$orderby,$flag,$limit=''){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		if($all){ $q = 'SELECT * FROM '.$table.'';}
		else{$q='SELECT * FROM '.$table.' WHERE '.$row.'="'.$var.'" ';}
		(!(empty($orderby))) ? $q.=' ORDER BY '.$orderby.' ' : $q;
		$q.=$o[$flag].' '.$limit;
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		mysql_close();
		return $r;
	}
	public function LoopAND($table,$row_1,$row_2,$var_1,$var_2,$orderby,$flag){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		$q='SELECT * FROM '.$table.' WHERE '.$row_1.'="'.$var_1.'" AND '.$row_2.'="'.$var_2.'"';
		(!(empty($orderby))) ? $q.=' ORDER BY '.$orderby.' ' : $q;
		$q.=$o[$flag];
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		mysql_close();
		return $r;
	}
	public function LoopOR($table,$row_1,$row_2,$var_1,$var_2,$orderby,$flag){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		$q='SELECT * FROM '.$table.' WHERE '.$row_1.'="'.$var_1.'" OR '.$row_2.'="'.$var_2.'"';
		(!(empty($orderby))) ? $q.=' ORDER BY '.$orderby.' ' : $q;
		$q.=$o[$flag];
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		mysql_close();
		return $r;
	}
	public function Match($table,$match,$against,$expansion){
		$q = 'SELECT * FROM '.$table.' WHERE MATCH('.$match.') AGAINST ("'.$against.'"';
		$expansion ? $q.= ' WITH QUERY EXPANSION) ' : $q.=') ';
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		mysql_close();
		print $q;
		return $q;	
	}
	public function Select($all,$table,$row,$var,$orderby,$flag){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		if($all){ $q = 'SELECT * FROM '.$table.'';}
		else{$q='SELECT * FROM '.$table.' WHERE '.$row.'="'.$var.'" '; 
			(!(empty($orderby))) ? $q.='ORDER BY '.$orderby.' ' : $q;}
		$q.=$o[$flag];
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $d=mysql_fetch_array($r) : $d=false;
		mysql_close();
		return $d;
	}
	public function SelectAND($table,$row_1,$row_2,$var_1,$var_2,$orderby,$flag){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		$q='SELECT * FROM '.$table.' WHERE '.$row_1.'="'.$var_1.'" AND '.$row_2.'="'.$var_2.'" '; 
		(!(empty($orderby))) ? $q.='ORDER BY '.$orderby.' ' : $q;
		$q.=$o[$flag];
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		if(mysql_affected_rows()){
			$d=mysql_fetch_array($r);
			mysql_close();
			return $d;
		}else{ 
			return false;
		}
	}
	public function SelectAVG($all,$table,$avg,$as,$row,$var){
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		$q = 'SELECT AVG('.$avg.') AS '.$as.' FROM '.$table;
		if(!$all){$q.=' WHERE '.$row.'="'.$var.'"';}
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $d=mysql_fetch_array($r) : $d=false;
		mysql_close();
		return $d;
	}
	public function SelectInMap($origLat,$origLon,$dist,$tableName){
		$dist = $dist/1.6;
		$q = "SELECT *, 3956 * 2 * 
	          ASIN(SQRT( POWER(SIN(($origLat - abs(lat))*pi()/180/2),2)
	          +COS($origLat*pi()/180 )*COS(abs(lat)*pi()/180)
	          *POWER(SIN(($origLon-lon)*pi()/180/2),2))) 
	          as distance FROM $tableName WHERE 
	          lon between ($origLon-$dist/abs(cos(radians($origLat))*69)) 
	          and ($origLon+$dist/abs(cos(radians($origLat))*69)) 
	          and lat between ($origLat-($dist/69)) 
	          and ($origLat+($dist/69))
	          having distance < $dist ORDER BY distance;"; 
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		mysql_close();
		return $r;
	}
	public function SelectOR($table,$row_1,$row_2,$var_1,$var_2,$orderby,$flag){
		(($flag<-1)||($flag>1)) ? $flag=0 : $flag;
		$o = array(-1=>'DESC',0=>'',1=>'ASC');
		$q='SELECT * FROM '.$table.' WHERE '.$row_1.'="'.$var_1.'" OR '.$row_2.'="'.$var_2.'"'; 
		(!(empty($orderby))) ? $q.='ORDER BY '.$orderby.' ' : $q;
		$q.=$o[$flag];
		print $q;
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		if(mysql_affected_rows()){
			$d=mysql_fetch_array($r);
			mysql_close();
			return $d;
		}else{
			return false;
		}
	}
	public function Update($table,$row,$var,$n_arguments){
		$n = func_num_args();
		$q = 'UPDATE '.$table.' SET ';
		for($i=3;$i<$n;$i+=2){
			$d = func_get_arg($i);
			$e = func_get_arg($i+1);
			($i===$n-2) ? $q.= ''.$d.'="'.$e.'" ' : $q.= ''.$d.'="'.$e.'", ';
		}
		$q.= 'WHERE '.$row.'="'.$var.'"';
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $x = true : $x = false;
		mysql_close();
		return $x;
	}
	public function Truncate($table){
		$q = 'TRUNCATE TABLE '.$table.'';	
		$l = $this->Query_constructor();
		$r = mysql_query($q,$l);
		(mysql_affected_rows()) ? $x = true : $x = false;
		mysql_close();
		return $x;
	}
	private function Query_constructor(){
		$l = mysql_connect($this->server['HOST'],$this->server['USER'],$this->server['PASSWORD']);
		mysql_set_charset('utf8',$l);
		mysql_select_db($this->server['DATABASE'], $l);
		return $l;
	}
}
?>
