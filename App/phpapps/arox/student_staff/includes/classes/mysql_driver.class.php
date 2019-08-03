<?php

/** 
 * @package mysql_driver 
 * @author Ricardo Alexandre Sismeiro <ricardo@sismeiro.com>
 * @version 1.0.0.0
 * @copyright Copyright (c) 2007, Ricardo Alexandre Sismeiro.
 * @license http://www.gnu.org/licenses/gpl.txt GNU GENERAL PUBLIC LICENSE
 * @link http://www.sismeiro.com/php/mysql_driver.phps 
 * 
 */

class mysql_driver{
  
  	var $mysql_driver_both;
  	var $mysql_driver_num;
  	var $mysql_driver_assoc;  
	var $host;
	var $user;
	var $pass;
	var $name;
	var $connection;
	var $resource;
	var $num_rows;
	var $num_fields;
	var $affected_rows;
	var $tables;
	var $status;
	var $is_started;
	var $is_empty;
	var $keys;		
	var $fields;
	var $count;
	var $version;
	var $last_error_code;
	var $last_error_msg;
	var $silence_mode;
	var $timezone;
	var $insert_id;
	var $createtable;
	var $innodb;
	
	function mysql_driver($host='',$user='',$pass='',$name=''){  		
		/**
		 * change this value to true if you want to disable the debugger
		 */
		$this->silence_mode=false;
				
		$this->mysql_driver_both='2';
  		$this->mysql_driver_num='1';
  		$this->mysql_driver_assoc='0';  		  	
  		$this->count='0';
  		$this->last_error_code='';
		$this->last_error_msg='';

		/**
		 * if the following variables will be defined, 
		 * you dont need to pass any parameters 
		 * when you call this function		 
		 */
		(defined('mysql_driver_host')) ? ($h=mysql_driver_host):($h=$host);
		(defined('mysql_driver_user')) ? ($u=mysql_driver_user):($u=$user);
		(defined('mysql_driver_pass')) ? ($p=mysql_driver_pass):($p=$pass);
		(defined('mysql_driver_name')) ? ($n=mysql_driver_name):($n=$name);
				
		$this->set_timezone('Europe/Lisbon');		
	 	
		$this->start($n,$h,$u,$p);	 	
	}

   	/**
  	 * function set_host, access is private, will not be documented
 	 * @access private
   	 */
	function set_host($str){
		$this->host=$str;
	}
	
	/**
  	 * function set_user, access is private, will not be documented
 	 * @access private
   	 */
	function set_user($str){
		$this->user=$str;
	}
	
   	/**
  	 * function set_pass, access is private, will not be documented
 	 * @access private
   	 */	
	function set_pass($str){
		$this->pass=$str;
	}
	
	/**
  	 * function set_db_name, access is private, will not be documented
 	 * @access private
   	 */
	function set_db_name($str){
		$this->name=$str;
	}
	
   	/**
  	 * function set_info, access is private, will not be documented
 	 * @access private
   	 */	
	function set_info(){
		$this->tables=$this->list_tables();		 		
	 	$this->keys=$this->get_all_primary_keys();
	 	$this->fields=$this->get_all_tables_fields();
	 	$this->createtable=$this->get_all_show_create_tables();
	 	$this->version=$this->get_mysql_version();
	 	$this->innodb=$this->have_innodb();
	}
	
	/**
	 * set_timezone, sets the default timezone used by all date/time functions in a script 
	 *
	 * @param string $param
	 */
	function set_timezone($param='Europe/Lisbon'){
    	$this->timezone=$param;  	
		if ( function_exists('date_default_timezone_set')){   		
   			date_default_timezone_set($this->timezone);
   	    } else {@putenv("TZ=".$this->timezone);}    
    }
	
	/**
  	 * function is_configured, access is private, will not be documented
 	 * @access private
   	 */	
	function is_configured(){
		$r=0;		
		if ((isset($this->host)) && ($this->host!='')) $r++;
		if ((isset($this->user)) && ($this->user!='')) $r++;
		if (isset($this->pass)) $r++;
		if ((isset($this->name)) && ($this->name!='')) $r++;		
        ($r===4) ? ($result=true) : ($result=false);
		return $result;
	}
	
	/**
	 * connect, open a connection to a mysql server
	 * 
	 * @return bool
	 */
	function connect(){
	  $result=false;
	  if ($this->is_configured()){
	  	$r=@mysql_connect($this->host,$this->user,$this->pass);
	  	if (is_resource($r)){$this->connection=$r; $result=true;} 
	  	else {
	  		$this->last_error_code=@mysql_errno();
	  		$this->last_error_msg=@mysql_error();
	  		if (!$this->silence_mode) trigger_error("mysql_driver - Error on connect - ".$this->last_error_code." - ".$this->last_error_msg,E_USER_WARNING);
	  	}
	  }
	  else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on connect -  first you need some settings like the host, user, pass and name ',E_USER_WARNING);}

	  return $result; 
	}
     
	/**
	 * is_connected, ping a server connection or reconnect if there is no connection
	 *
	 * @return bool
	 */
	function is_connected(){
		$result=false;
		if (is_resource($this->connection)){
			$result=@mysql_ping($this->connection);
		}
		return $result;
	}
	
	/**
	 * disconnect,  close mysql connection
	 *
	 * @return bool
	 */
	function disconnect(){		
		$result=false;		
		if ($this->is_connected($this->connection)){
			$result=@mysql_close($this->connection);
			$this->connection=null;
		}		 		
		return $result;
	}
	
	/**
	 * select_db,  select a mysql database
	 *
	 * @return bool
	 */
	function select_db(){		
		$result=false;				
		if (is_resource($this->connection)){
		  $ping=@mysql_ping($this->connection);
		  if ($ping==true){
		  	$db_selected =@mysql_select_db($this->name,$this->connection);
		  	if ($db_selected){
		  		$result=true;
		  	} else {
		  		$this->last_error_code=@mysql_errno($this->connection);
	  			$this->last_error_msg=@mysql_error($this->connection);
	  			if (!$this->silence_mode) trigger_error("mysql_driver - Error on select_db - ".$this->last_error_code." - ".$this->last_error_msg,E_USER_WARNING);
		  	}
		  } else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on select_db - lost connection ...',E_USER_WARNING);}
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on select_db - at first please try to connect ...',E_USER_WARNING);}
		
		return $result;
	}

	/**
  	 * function start, access is private, will not be documented
 	 * @access private
   	 */	
	function start($name,$host='localhost',$user='root',$pass=''){				
		$result=false;										
		if (!isset($this->is_started)) $this->is_started=false;						
		if(!$this->is_started){			
			$this->set_db_name($name);
			$this->set_host($host);
			$this->set_user($user);
			$this->set_pass($pass);			
			$r=true;
			if ($r) $r=$this->connect();
			if ($r) $r=$this->select_db();
			if ($r) {$this->is_started=true;  $this->count=0; $this->set_info();}
			else $this->is_started=false;	
			$result=$r;
		} 
		else { $result=true;}
		return $result;
	}
	

	/**
  	 * function restart, access is private, will not be documented
 	 * @access private
   	 */	
	function restart(){
		$result=false;
		if (is_bool($this->is_started)){
			$this->is_started=false;
			$result=$this->start($this->name,$this->host,$this->user,$this->pass);	
		}		
		return $result;
	}
	
	/**
	 * escape, escapes special characters in a string for use in a sql statement
	 *
	 * @param string $str
	 * @return string
	 */
	function escape($str){
		if ((is_string($str)) || (is_numeric($str))){
			if (get_magic_quotes_gpc()){$str=stripslashes($str);}			
			$result=@mysql_real_escape_string($str,$this->connection);
		} else {
			if (!$this->silence_mode) trigger_error('mysql_driver - Error on escape - param (str) is not a string or integer value!',E_USER_WARNING);
			$result='';
		}
		return $result;
	}
	
	/**
	 * query, sends an unique query to the currently active database on the server
	 * for all types of sql statements returns true on success or false on error.
	 * 
	 * @param string $sql
	 * @return bool
	 */
	function query ($sql){
		$this->last_error_code='';
		$this->last_error_msg='';
		$result=false;
		$this->status=false;		
				
		if (is_resource($this->connection)){
		  $ping=@mysql_ping($this->connection);
		  if ($ping==true){				  			  			  	   	
		  	$r=@mysql_query($sql,$this->connection);
		  	if (is_resource($r)){
		  		$this->resource=$r;
		  		$this->num_rows=@mysql_num_rows($this->resource);
		  		$this->num_fields=@mysql_num_fields($this->resource);
		  		$result=true;
		  		$this->status=true;
		  	} 
		  	else {
		  	   if (is_bool($r)){		  	   	  
		  	   	  if ($r) {
		  	   	  	$this->affected_rows=@mysql_affected_rows();
		  	   	  	if ($this->affected_rows>0) $this->insert_id=@mysql_insert_id();
		  	   	  	else $this->insert_id=0; 		  	   	  	
		  	   	  	$result=true;
		  	   	  }
		  	   	  else {
		  	   	  	$this->last_error_code=@mysql_errno($this->connection);
	  				$this->last_error_msg=@mysql_error($this->connection);
		  	   	  	$this->affected_rows=0;
		  	   	  	$result=false;
		  	   	  }		  	   	  
		  	   } else {
		  	   	   	$this->last_error_code=@mysql_errno($this->connection);
	  				$this->last_error_msg=@mysql_error($this->connection);
		  	   		if (!$this->silence_mode) trigger_error('mysql_driver - Error on query - the result is not bool and is not a resource link!',E_USER_WARNING);
		  	   		$this->affected_rows=0;
		  	   		$result=false;
		  	   }
		  	}   
		  } else {
		  		if ($this->count<3){
					if (!$this->silence_mode) trigger_error('mysql_driver - Error on query - lost connection, trying to connect ...',E_USER_NOTICE);
					$this->count++;	$this->restart(); $this->query($sql);	
				} else { if (!$this->silence_mode) trigger_error('mysql_driver - Error on query - lost connection!',E_USER_WARNING);}
		  }
		} else {						
			if ($this->count<3){
				if (!$this->silence_mode) trigger_error('mysql_driver - Error on query - is not connected, trying to connect ...',E_USER_NOTICE);
				$this->count++;	$this->restart(); $this->query($sql);	
			} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on query - at first please try to connect ...',E_USER_WARNING);}
		}		
		return $result;
	}
	
   	/**
  	 * function get_mysql_version, access is private, will not be documented
 	 * @access private
   	 */	
	function get_mysql_version(){
		$this->query('select @@version as version');
		list(list($result))=$this->fetch_all($this->mysql_driver_num);
		return $result;	
	}
	
	/**
	 * get_version, get the mysql version
	 *
	 * @return string
	 */
	function get_version(){
		$result=$this->version;
		return $result;
	}
	
	/**
  	 * function have_innodb, access is private, will not be documented
 	 * @access private
   	 */	
	function have_innodb(){	
		$name=''; $value='';	
		list(list($name,$value))=$this->consults("SHOW VARIABLES WHERE Variable_name='have_innodb'",'int');
		if ($name=='have_innodb'){
			$result=strtoupper($value);
		} else {$result='NO';}
		return $result;
	}
	
	/**
  	 * function transaction_start, access is private, will not be documented
 	 * @access private
   	 */
   	function transaction_start(){
		$this->query('start transaction'); 		      	      
   	}
   
   	/**
  	 * function transaction_rollback, access is private, will not be documented
 	 * @access private
   	 */
	function transaction_rollback(){
    	$this->query('rollback');
    }
    
    
   	/**
  	 * function transaction_commit, access is private, will not be documented
 	 * @access private
   	 */
    function transaction_commit(){
    	$this->query('commit');
    }
	
    /**
     * transaction, transaction processing is used to maintain database integrity
     * by ensuring that sql operations execute completely or not at all
     *
     * @param array $sql_array
     * @see This only works well in InnoDB tables
     * @return bool
     */
	function transaction($sql_array){
		$result=false;
		if ($this->innodb=='YES'){					
			if (is_array($sql_array)){
			 	$this->transaction_start();
			 	$erro=false;		 	
			 	foreach ($sql_array as $k=>$sql){
			 	 	$this->query($sql);
			 	 	
			 	 	if ($this->affected_rows==0) $erro=true;		 	 	
			 	}
			 	if ($erro){
			 		$this->transaction_rollback();$result=false;
			 	} else {
			 		$this->transaction_commit();$result=true;
			 	}		 	
			}
		}
		return $result;      	
	}
	
	/**
	 * fetch_row, get a result row as an enumerated array
	 *
	 * @return array
	 */
	function fetch_row(){
		$result=false;
		if ($this->status===true){
			$result=@mysql_fetch_row($this->resource);
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on fetch_row - the query status is not true ...',E_USER_WARNING);}				
		(!$result) ? ($this->is_empty=true) : ($this->is_empty=false);				
		return $result;
	}
	
	/**
	 * fetch_array, fetch a result row as an associative array, a numeric array, or both
	 *
	 * @param result_type $type (MYSQL_ASSOC, MYSQL_NUM, and the default value of MYSQL_BOTH)
	 * @return array
	 */
	function fetch_array($type=MYSQL_BOTH){
		$result=false;
		if ($this->status===true){
			$result=@mysql_fetch_array($this->resource,$type);
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on fetch_array - the query status is not true ...',E_USER_WARNING);}
		(!$result) ? ($this->is_empty=true) : ($this->is_empty=false);	
		return $result;
	}
	
	/**
	 *  fetch_assoc, fetch a result row as an associative array
	 *
	 * @return array
	 */
	function fetch_assoc(){
		$result=false;
		if ($this->status===true){
			$result=@mysql_fetch_assoc($this->resource);
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on fetch_assoc- the query status is not true ...',E_USER_WARNING);}
		(!$result) ? ($this->is_empty=true) : ($this->is_empty=false);
		return $result;
	}
	
	/**
	 * fetch_all, fetch a result in all rows as  associative array's,  numeric array's, or both
	 * and free result memory
	 *
	 * @param result_type $type ($this->mysql_driver_both, $this->mysql_driver_num or $this->mysql_driver_assoc)  
	 * @return array
	 */
	function fetch_all($type=''){				
		if ($type=='') $type=$this->mysql_driver_assoc;		
		$result=null;				
		if ($this->status===true){
			$done=false;				
			if ((!$done) && ($type==$this->mysql_driver_assoc)){
				$result=array();			
				$r=true;	
				while ($r){
					$r=$this->fetch_assoc();
					if (!$this->is_empty)
					array_push($result,$r);
				}
				$this->free_result();
				$done=true;		
			}
						
			if ((!$done) && ($type==$this->mysql_driver_num)){
				$result=array();
				$r=true;	
				while ($r){
					$r=$this->fetch_row();
					if (!$this->is_empty)
					array_push($result,$r);
				}
				$this->free_result();								
				$done=true;
			}
			
			if ((!$done) && ($type==$this->mysql_driver_both)){
				$result=array();
				$r=true;	
				while ($r){
					$r=$this->fetch_array();
					if (!$this->is_empty)
					array_push($result,$r);
				}
				$this->free_result();														
				$done=true;
			}		
		} 
		else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on fetch_all - the query status is not true ...',E_USER_WARNING);}
		return $result;
	}
	
	/**
	 * free_result, free result memory
	 *
	 * @return bool 
	 */
	function free_result(){
		$result=false;
		if (is_resource($this->resource)){
			$result=@mysql_free_result($this->resource);	
		}		
		return $result;
	}
	
	/**
  	 * function list_tables, access is private, will not be documented
 	 * @access private
   	 */
	function list_tables(){
		$this->query('show tables');
		$r=$this->fetch_all($this->mysql_driver_num);
		$result=array();
		if (!is_null($r)){		
			foreach ($r as $k=>$tab){
				foreach ($tab as $key=>$name){array_push($result,$name);}
			}	
		}
		return $result;
	}
	
	/**
	 * table_exists, it verifies if the table exists in the database
	 *
	 * @param string $table
	 * @return bool
	 */
	function table_exists($table){
	  (in_array($table,$this->tables)) ? ($result=true) : ($result=false);
	  return $result;	 				
	}
	
	/**
  	 * function describe_table, access is private, will not be documented
 	 * @access private
   	 */
	function describe_table($table){
		$result=null;
		if ($this->table_exists($table)){
			$this->query("describe $table");
			$result=$this->fetch_all();			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on describe_table - the table ['.$table.'] does not exist!',E_USER_WARNING);}
		return $result;
	}

	/**
  	 * function get_show_create_table, access is private, will not be documented
 	 * @access private
   	 */
	function get_show_create_table($table){
		$result=null;
		if ($this->table_exists($table)){
			list($r)=$this->consults("show create table $table","str");
			if (isset($r["Create Table"])){
				$result=$r["Create Table"];
			}
		}
		return $result;
	}
	

	/**
  	 * function get_all_show_create_tables, access is private, will not be documented
 	 * @access private
   	 */
	function get_all_show_create_tables(){
		$result=array();
		foreach ($this->tables as $table){
			$result[$table]=$this->get_show_create_table($table);
		}
		return $result;
	}
	
	/**
	 * show_create_table
	 *
	 * @param string $table
	 * @return string
	 */
	function show_create_table($table){
		$result=null;
		if ($this->table_exists($table)){
			$result=$this->createtable[$table];			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on show_create_table - the table ['.$table.'] does not exist!',E_USER_WARNING);}
		return $result;
	}
	
	/**
  	 * function get_table_primary_key, access is private, will not be documented
 	 * @access private
   	 */
	function get_table_primary_key($table){
		$result=null;
		if ($this->table_exists($table)){
		   $r=$this->describe_table($table);
		   if (!is_null($r)){
		   	 $found=false;$max=count($r); $i=0; $key=null;
		   	 while((!$found) && ($i<$max)){
		   	 	$temp=$r[$i];
		   	 	if ($temp["Key"]=="PRI"){
		   	 		$key=$temp["Field"];
		   	 		$found=true;
		   	 	}		   	 	
		   	 	$i++;
		   	 }
		   	 $result=$key;
		   } else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_table_primary_key - the function describe_table return null value !',E_USER_WARNING);}			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_table_primary_key - the table ['.$table.'] does not exist!',E_USER_WARNING);}
		return $result;
	}
	
	/**
  	 * function get_table_fields, access is private, will not be documented
 	 * @access private
   	 */
	function get_table_fields($table){
		$result=null;
		if ($this->table_exists($table)){			
		   $r=$this->describe_table($table);
		   if (!is_null($r)){
		   	$result=array();
		   	foreach ($r as $k=>$v){array_push($result,$v["Field"]);}
		   } else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_table_fields - the function describe_table return null value !',E_USER_WARNING);}			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_table_fields - the table ['.$table.'] does not exist!',E_USER_WARNING);}
		return $result;
	}
	
	/**
  	 * function get_all_tables_fields, access is private, will not be documented
 	 * @access private
   	 */
	function get_all_tables_fields(){
		$result=array();
		foreach ($this->tables as $table){
			$result[$table]=$this->get_table_fields($table);
		}
		return $result;
	}
	
	/**
	 * table_fields, returns an array with the fields of the table
	 *
	 * @param string $table
	 * @return array
	 */
	function table_fields($table){
		$result=null;
		if ($this->table_exists($table)){
			$result=$this->fields[$table];			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on table_fields - the table ['.$table.'] does not exist!',E_USER_WARNING);}
		return $result;
	}
	
	/**
  	 * function get_all_primary_keys, access is private, will not be documented
 	 * @access private
   	 */
	function get_all_primary_keys(){
		$result=array();
		foreach ($this->tables as $table){
			$result[$table]=$this->get_table_primary_key($table);
		}
		return $result;
	}
	
	/**
	 * primary_key, returns a primary key of a table
	 *
	 * @param string $table
	 * @return string
	 */
	function primary_key($table){
		$result=null;
		if ($this->table_exists($table)){
			$result=$this->keys[$table];			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on primary_key - the table ['.$table.'] does not exist!',E_USER_WARNING);}
		return $result;
	}
	
	/**
	 * lock_tables, lock an array of tables in database with write mode or what else
	 *
	 * @param array $tables
	 * @param string $mode
	 * @return bool
	 */
    function lock_tables($tables,$mode='write'){
    	  $result=false;
    	  $sqli='lock tables';    	  
    	  if (is_array($tables)){
    	  	$sql="$sqli ";
    	  	foreach ($tables as $k=>$v){if ((is_string($v)) && ($this->table_exists($v))){$sql.="$v $mode,";}}
    	  	$sql=substr($sql,0,-1);
    	  }
    	  else {
    	  	$sql=$sqli;
    	  	if ((is_string($tables))  && ($this->table_exists($tables))){$sql.=" $tables $mode";}    	  	
    	  }
    	  
    	  if($sqli!=$sql){$result=$this->query($sql);}
    	  
    	  return $result;
    }
    
    /**
     * lock_all_tables, lock all tables in database with write mode or what else
     *
     * @param string $mode
     * @return bool
     */
    function lock_all_tables($mode='write'){
    	$result=$this->lock_tables($this->tables,$mode);
    	return $result;
    }
    
    /**
     * unlock_tables, unlock all tables in database
     *
     * @return bool
     */
    function unlock_tables(){
    	$result=$this->query("unlock tables");
    	return $result;
    }    
    
	/**
  	 * function flush_tables, access is private, will not be documented
 	 * @access private
   	 */
    function flush_tables(){    	
    	$result=$this->query('flush tables with read lock');
    	return result;
    }
    
    /**
     * consults, 
     *
     * @param sting $sql
     * @param string $mode ('int','str','all');
     * @return array
     */
    function consults($sql,$mode=''){
    	$result=false; 
    	
    	if (!in_array($mode,array('','int','str','all'))) $mode='';
    	
    	   	    	
    	if (($mode=='') || ($mode=='int')) $mode=$this->mysql_driver_num;
    	if ($mode=='str') $mode=$this->mysql_driver_assoc;
    	if ($mode=='all') $mode=$this->mysql_driver_both;    	    	 	
    	
    	$result=$this->query($sql);
    	if ($result){
    		if($this->status===true){$result=$this->fetch_all($mode);} 
    		else {$result=$this->affected_rows; }
    	}
    	return $result;    	
    }
    
    function export_table($table,$filename,$mod=0744,$lock=false,$comm=';',$encode=true){    
    	$result=false;
    	$error=false;    	
    	$s=strlen($comm) * (-1); 
    	
    	if ($this->table_exists($table)){
    		
    		$fields=$this->table_fields($table);
    		$col='*';
    		foreach ($fields as $k=>$name){$col.="$name,";}
    		if ($col!='*') $col=substr($col,1,-1);    		
    		
    		$sql="select $col from $table";
    		if ($lock) $this->lock_tables($table,'read');    		
    		$table_data=$this->consults($sql);
    		if ($lock) $this->unlock_tables();    		
    		$first_line=str_replace(',',$comm,$col).PHP_EOL;
    		$data=$first_line;
                  
    		if ($encode){
    			if (is_array($table_data)){
	    			foreach ($table_data as $tk=>$row_data){
		    			 if (is_array($row_data)){
		    				 $row='';		    			     			
			    			 foreach ($row_data as $tr=>$value){$row.=base64_encode($value).$comm;}	
			    			 if ($row!=''){$row=substr($row,0,$s);}
			    			 $data.=$row.PHP_EOL;
		    			 } else {$error=true;}
		    		}
    			} else {$error=true;}
    		}
    		else {
    			if (is_array($table_data)){
		    		foreach ($table_data as $tk=>$row_data){
		    			 if (is_array($row_data)){
			    			 $row='';    			
			    			 foreach ($row_data as $tr=>$value){$row.=$value.$comm;}	
			    			 if ($row!=''){$row=substr($row,0,$s);}
			    			 $data.=$row.PHP_EOL;
		    			 } else {$error=true;}
		    		}
	    		} else {$error=true;}
    		}
    		
    		if (!$error){    			    		
	    		if ($data!=$first_line){
	    			
		    		$fp=@fopen($filename,'w');
		    		if ($fp){
		    			$size=strlen($data);
		    			$w=@fwrite($fp,$data,$size);
		    			if ($w!=$size){if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_table - fwrite error!',E_USER_WARNING);}
		    			$r=@fclose($fp);
		    			if (!$r) {if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_table - fclose error!',E_USER_WARNING);}
		    			
		    			$rch=@chmod($filename,$mod);
		    			if (!$rch) {if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_table - chmod error!',E_USER_WARNING);}
		    			
		    			if ( ($w==$size) && ($r) && ($rch) ) {$result=true;}
		    			
		    			    			
		    		} else {
		    		  if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_table -fclose error mode w !',E_USER_WARNING);	
		    		}
		    		
	    		} else { /*if (!$this->silence_mode) trigger_error('mysql_driver - Notice on export_table - table is empty!',E_USER_NOTICE);*/}
	    		
    		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_table - consults error!',E_USER_WARNING);}    		    		
    	} 
    	else { if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_table - the table ['.$table.'] does not exist!',E_USER_WARNING);}
    	
    	return $result;
    } 
    
    function export_tables($dir,$ext='csv',$comm=';',$encode=true,$mod=0744,$lock=false){
    	$result=array();
    	
    	$dir=str_replace('\\','/',$dir);    	
    	if (substr($dir,-1)!='/'){$dir.='/';}
	    
    	if (is_dir(substr($dir,0,-1))){
	    	if (is_writable(substr($dir,0,-1))){	    		
		    	
	    		if ($lock){$this->lock_all_tables('read');}		    	
	    		if (is_array($this->tables)){
		    		foreach ($this->tables as $table){
			    		$filename=$dir.$table.".$ext";
			    		$result[$table]=$this->export_table($table,$filename,$mod,false,$comm,$encode);
			    	}
	    		}
		    	if ($lock){$this->unlock_tables();}
		    		
	    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_tables - directory is not set with permissions to write !',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on export_tables - invalid directory!',E_USER_WARNING);}
		
    	
    	return $result;
		
		
    }
    
    function import_table($table,$filename,$lock=false,$comm=';',$encode=true,$tab=""){
    	$result=false;
    	$error=false;
    	  	
    	$s=strlen($comm) * (-1); 
    	
    	if ($this->table_exists($table)){
    		if (is_readable($filename)){    
   
		    	$table_data=@file($filename);
	    	    $filepath_info = pathinfo($filename);
			    $file_extension = $filepath_info['extension'];

			    if($file_extension=="xls" && $tab!="")
				{
					for($i=0; $i<sizeof($table_data); $i++) {
						$line = trim($table_data[$i]);
						$arr = explode("\t", $line);
						if($i==0 && is_array($tab))
						{
							for($n=0;$n<count($arr);$n++)
							{
								$tmparr = array_keys($tab,$arr[$n]);
								$arr[$n] = $tmparr[0];
							}
						}
						$tmp_table[$i] = implode($comm,$arr);
					}
					$table_data = $tmp_table;
				}
		    	
		    	$rows=array();
		    	if ($encode){
		    			if (is_array($table_data)){
		    				$def_row=explode($comm,rtrim($table_data[0]));		    				
		    				unset($table_data[0]);		    				    							    			
		    				foreach ($table_data as $tr=>$row_data){
		    					 $error_line=false;  
			    				 $row=explode($comm,$row_data);	
			    				 $new_row=array();		    				 			    			
				    			 if (is_array($row)){				    			 	 				    			 	 
				    			 	 foreach ($row as $td=>$v){
				    			 	 	if (isset($def_row[$td])){
				    			 	 		$new_row[$def_row[$td]]=base64_decode($v);	
				    			 	 	} /*else {				    			 	 		
				    			 	 		$error_line=true; 
				    			 	 		if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_table - table ['.$table.'] line ['.$tr.'] cell ['.$td.']!',E_USER_NOTICE);
				    			 	 		break;
				    			 	 		}*/
				    			 	 }
				    			 } else {$error_line=true;}
				    			 if (!$error_line) $rows[$tr]=$new_row;
				    		}
		    			} else {$error=true;}
		    		}
		    		else {
		    			if (is_array($table_data)){
		    				$def_row=explode($comm,$table_data[0]);		    				
		    				unset($table_data[0]);		    				    							    			
		    				foreach ($table_data as $tr=>$row_data){
		    					 $error_line=false;  
			    				 $row=explode($comm,$row_data);
			    				 $new_row=array();		    				 			    			
				    			 if (is_array($row)){				    			 	 				    			 	 
				    			 	 foreach ($row as $td=>$v){
				    			 	 	if (isset($def_row[$td])){
				    			 	 		$new_row[$def_row[$td]]=$v;	
				    			 	 	} /*else {				    			 	 		
				    			 	 		$error_line=true; 
				    			 	 		if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_table - table ['.$table.'] line ['.$tr.'] cell ['.$td.']!',E_USER_NOTICE);
				    			 	 		break;
				    			 	 		}*/
				    			 	 }				    			 				    			 	 					    			
				    			 } else {$error_line=true;}				    			 
				    			 if (!$error_line) $rows[$tr]=$new_row;				    			 
				    		}
		    			} else {$error=true;}
		    		}
        		    		
		    		if (!$error){ 
		    			if (!empty($rows)){
		    				if ($lock) $this->lock_tables($table,'write');				    					    						    						    			
//			    			foreach ($rows as $k=>$row){
			    				/*echo "<pre>";
			    				print_r($row);
			    				echo "<br>".$table;
//			    				print_r($rows);
			    				exit;
			    				*/
			    				$rt=$this->update_insert_rows($rows,$table);
			    				
//			    			}			    			
			    			$result=true;
			    			if ($lock) $this->unlock_tables();   			    			
			    		}
		    		} 
		    		else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_table - file format!',E_USER_WARNING);}		    			    				    	
    		} 
    		else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_table - the file ['.$filename.'] is not does not readable!',E_USER_WARNING);}
    	} 
    	else { if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_table - the table ['.$table.'] does not exist!',E_USER_WARNING);}
    	
    	return $result;
    	
    }
    
    function import_tables($dir,$ext='csv',$comm=';',$encode=true,$lock=false){
    	$result=array();
    	
    	$dir=str_replace('\\','/',$dir);    	
    	if (substr($dir,-1)!='/'){$dir.='/';}
	    
    	if (is_dir(substr($dir,0,-1))){
	    	if (is_writable(substr($dir,0,-1))){	    		
		    	
	    		if ($lock){$this->lock_all_tables('write');}
		    	
	    		foreach ($this->tables as $table){
		    		$filename=$dir.$table.".$ext";
		    		if (is_readable($filename)){	   		
		    			$result[$table]=$this->import_table($table,$filename,false,$comm,$encode,false);
		    		} 
		    		else {$result[$table]=false;}
		    	}
		    	
		    	if ($lock){$this->unlock_tables();}
		    		
	    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_tables - directory is not set with permissions to write !',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on import_tables - invalid directory!',E_USER_WARNING);}
    	
    	return $result;
    }
    
    /**
  	 * function is_value_in_array, access is private, will not be documented
 	 * @access private
   	 */
    function is_value_in_array($value,$array){    	
    	$result=false;
    	if (is_array($array)){
    		if($value == "admin_permissions") {
    			echo "kjjhjghfhfghfgfghjghjj";
	    		$eee = array_search($value,$array);
	    		echo "<br>val".$eee."<br>";
    		}
    		foreach ($array as $k=>$v){
    			echo "<br>***".$v."***************".$value."***";
    			if ($v===$value){
    				$result=true;
    				break;
    			}    		
    		}   		
    	}    	
    	return $result;
    }
    
    /**
  	 * function is_value_in_array, access is private, will not be documented
 	 * @access private
   	 */
    function is_valid_row($row,$table){
      	$result=false;
      	$error=false;      	
      	if ($this->table_exists($table)){
      		if (is_array($row)){
    			if (count($row)>0){
    				$fields=$this->get_table_fields($table);
			 		$keys=array_keys($row);
			 		echo"<pre>";
			 			print_r($fields);
			 		foreach ($keys as $key){
			 			echo "<br>".$key;
			 			
			 			echo "###b---".$r=$this->is_value_in_array($key,$fields);
			 			echo "**x####";
			 			if (!$r){$error=true; break;}
			 		}
			 		echo "aaa".$result."aaa".$error;exit;
			 		if (!$error) $result=true;
    			}
			}
      	}
      	return $result;
    }
    
    /**
     * delete_rows, delete rows from a given table.
     * return the number of affected rows.
     *
     * @param array $row
     * @param string $table
     * @param int $limit
     * @return int
     */
    function delete_rows($row,$table,$limit=0){
    	$result=false;
    	if (!is_numeric($limit)) {$limit=0;}    	
    	if ($this->is_valid_row($row,$table)){	
    		if (!empty($row)){	
    			$sql="delete from $table where ";
				foreach ($row as $key=>$value){$sql.=$key."='".$this->escape($value)."' and ";}
				$sql=substr($sql,0,-4);		
				if ($limit>0) {$sql.=" limit $limit";}		
				$r=$this->query($sql);			
				if ($r) { $result=$this->affected_rows;}
				else {$result=0;}
    		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on delete_rows - row is empty!',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on delete_rows - invalid row for the table!',E_USER_WARNING);}
    	return $result;    	    
    }
    
    /**
     * get_row, get the unique row from a given table that
     * matches with the fields in array $row.
     * 
     * if find more than one row, returns false.
     * if not find any, returns false.
     *
     * @param array $row
     * @param string $table
     * @return array
     */
    function get_row($row,$table){
    	$result=false;
    	if ($this->is_valid_row($row,$table)){	
    		if (!empty($row)){	
    			$sql="select * from $table where ";
				foreach ($row as $key=>$value){$sql.=$key."='".$this->escape($value)."' and ";}
				$sql=substr($sql,0,-4);				
				$r=$this->query($sql);			
				if ($this->num_rows===1){$result=$this->fetch_assoc();}
				$this->free_result();									
    		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_row - row is empty!',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_row - invalid row for the table!',E_USER_WARNING);}
    	return $result;    	
    }
    
    /**
     * get_rows, returns all the rows from a given table
     * that matches with the fields in array $row.      
     *
     * @param array $row
     * @param string $table
     * @param int $limit
     * @param int $start
     * @return array of array's
     */    
    function get_rows($row,$table,$limit=0,$start=0){
    	$result=false;
    	if (!is_numeric($limit)) {$limit=0;}
    	if (!is_numeric($start)) {$start=0;}    	
    	if ($this->is_valid_row($row,$table)){	
    		if (!empty($row)){	
    			$sql="select * from $table where ";
				foreach ($row as $key=>$value){$sql.=$key."='".$this->escape($value)."' and ";}
				$sql=substr($sql,0,-4);
				if ($limit>0){
					if ($start==0) {$sql.=" limit $limit";}
					else { if ($start>0) $sql.=" limit ($start,$limit)";}
				}    		      
				$r=$this->query($sql);			
				if ($this->num_rows>0){$result=$this->fetch_all($this->mysql_driver_assoc);}    														
    		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_rows - row is empty!',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_rows - invalid row for the table!',E_USER_WARNING);}
    	return $result;    	
    }
    
    /**
     * get_rows_like,...
     *
     * @param array $row
     * @param string $table
     * @param int $limit
     * @param int $start
     * @return array of array's
     */
    function get_rows_like($row,$table,$limit=0,$start=0){
    	$result=false;
    	if (!is_numeric($limit)) {$limit=0;}
    	if (!is_numeric($start)) {$start=0;}    
    	if ($this->is_valid_row($row,$table)){	
    		if (!empty($row)){	
    			$sql="select * from $table where ";
				foreach ($row as $key=>$value){$sql.="(".$key." like '%".$this->escape($value)."%') and ";}
				$sql=substr($sql,0,-4);
				if ($limit>0){
					if ($start==0) {$sql.=" limit $limit";}
					else { if ($start>0) $sql.=" limit ($start,$limit)";}
				}    					
				$r=$this->query($sql);			
				if ($this->num_rows>0){$result=$this->fetch_all($this->mysql_driver_assoc);}    														
    		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_rows_like - row is empty!',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_rows_like - invalid row for the table!',E_USER_WARNING);}
    	return $result;    	
    }
    
    /**
     * get_rows_except,...
     *
     * @param array $row
     * @param string $table
     * @param int $limit
     * @param int $start
     * @return array of array's
     */
    function get_rows_except($row,$table,$limit=0,$start=0){
    	$result=false;    	
    	if (!is_numeric($limit)) {$limit=0;}
    	if (!is_numeric($start)) {$start=0;}
    	if ($this->is_valid_row($row,$table)){	
    		if (!empty($row)){	
    			$sql="select * from $table where ";
				foreach ($row as $key=>$value){$sql.=$key."!='".$this->escape($value)."' and ";}
				$sql=substr($sql,0,-4);
				if ($limit>0){
					if ($start==0) {$sql.=" limit $limit";}
					else { if ($start>0) $sql.=" limit ($start,$limit)";}
				}    							
				$r=$this->query($sql);			
				if ($this->num_rows>0){$result=$this->fetch_all($this->mysql_driver_assoc);}    														
    		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_rows_except - row is empty!',E_USER_WARNING);}
    	} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on get_rows_except - invalid row for the table!',E_USER_WARNING);}
    	return $result;    	
    }
     
    /**
     * insert_row, this function tries to insert a new row on a given table, 
     * returns false if fails or the value of the primary key from the new row
     * if successful
     *
     * @param array $row
     * @param string $table
     * @param bool $unset_key
     * @return int or bool
     */
	function insert_row($row,$table,$unset_key=true){
		$result=false;
		if ($this->is_valid_row($row,$table)){						
			
			if ($unset_key){
				$primary=$this->primary_key($table);
				if (!is_null($primary)) {if (isset($row[$primary])) unset($row[$primary]);}
			}
						
			if (!empty($row)){		
				$sql="insert ignore into $table set ";
				foreach ($row as $key=>$value){$sql.=$key."='".$this->escape($value)."',";}
				$sql=substr($sql,0,-1);
				$r=$this->query($sql);
				$this->free_result();
				if ($r) {$result=$this->insert_id;}
			} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on insert_row - row is empty!',E_USER_WARNING);}						
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on insert_row - invalid row for the table!',E_USER_WARNING);}		
	    return $result;	
	}
	
	/**
	 * update_row, this function tries to update a row from a given table, 
	 * but require that the table have a primary key and
	 * also that primary key is set in the array $row.
	 * 
	 * returns the number of affected rows on successful or false on fail
	 *
	 * @param array $row
	 * @param string $table
	 * @return int or bool
	 */
	function update_row($row,$table){
		$result=false;
		if ($this->is_valid_row($row,$table)){				
			$primary=$this->primary_key($table);
			if (!is_null($primary)) {
				if (isset($row[$primary])){
					$primary_value=$this->escape($row[$primary]);
					unset($row[$primary]);
				    if (!empty($row)){		
						$sql="update ignore $table set ";
						foreach ($row as $key=>$value){$sql.=$key."='".$this->escape($value)."',";}
						$sql=substr($sql,0,-1);
						$sql.=" where $primary='$primary_value'";
						$r=$this->query($sql);
						$this->free_result();
						if ($r) {$result=$this->affected_rows;}
					} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on update_row - row is empty!',E_USER_WARNING);} 								
				} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on update_row - primary key not set on row!',E_USER_WARNING);}
			} else  {if (!$this->silence_mode) trigger_error('mysql_driver - Error on update_row -  primary key not found on table!',E_USER_WARNING);}			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on update_row - invalid row for the table!',E_USER_WARNING);}		
	    return $result;					
	}
	
	/**
	 * update_insert_row, this function tries to update a row
	 * if the primary key is set in the array $row (example $row['id']=5).
	 * if the update fails, the function tries to insert a new 
	 * row with the specified primary key in $row.
	 * 
	 * if the primary key is not set or is equal to '' in the array $row,
	 * this function tries to insert a new row on the table.
	 *
	 * @param array $row
	 * @param string $table
	 * @return bool
	 */
	function update_insert_row($row,$table){	
		$result=false;
		echo "sss".$this->is_valid_row($row,$table);
		echo "<pre>";
		print_r($row);
 		exit;
		if ($this->is_valid_row($row,$table)){			
			$primary=$this->primary_key($table);
			if (!is_null($primary)) {
				if (isset($row[$primary])){										
				  if (empty($row[$primary])) {				  	
				  	unset($row[$primary]);$result=$this->insert_row($row,$table);
				  } 
				  else {				  	
				  	$r=$this->update_row($row,$table);				  					  	
				  	if (is_numeric($r)){ 
				  		if ($r>0) {$result=$row[$primary];}
				  		else { 
				  			
				  			echo $table;exit;
				  			
				  			$result=$this->insert_row($row,$table,false);}
				  	} 
				  	else {$result=$r;}				  		
				  }						  		
				  
				} else {$result=$this->insert_row($row,$table);}				 							
			} else  {if (!$this->silence_mode) trigger_error('mysql_driver - Error on update_insert_row-  primary key not found on table!',E_USER_WARNING);}			
		} else {if (!$this->silence_mode) trigger_error('mysql_driver - Error on update_insert_row - invalid row for the table!',E_USER_WARNING);}		
	    		
		return $result;		    						
	}
	
	/**
	 * update_insert_rows, the same as update_insert_row but for multiple rows
	 *
	 * @param array of array's $rows
	 * @param string $table
	 * @return array
	 */
	function update_insert_rows($rows,$table){
		$result=array();
		if (is_array($rows)){foreach ($rows as $k=>$v){$result[$k]=$this->update_insert_row($v,$table);}}		
		return $result;
	}
    
	/**
     * time, returns the time (hh:mm:ss) from the web server
     *
     * @return string
     */  
    function local_time(){
    	$result=date("H:i:s");
    	return $result;    
    }
    
    /**
     * date, returns the date (yyyy-mm-dd) from the web server
     *
     * @return string
     */ 
    function local_date(){
    	$result=date("Y-m-d");
    	return $result;    
    }
    
    /**
     * datetime, returns the datetime (yyyy-mm-dd hh:mm:ss) from the web server
     *
     * @return string
     */ 
    function local_datetime(){
    	$result=date("Y-m-d H:i:s");
    	return $result;    
    }
	
	/**
     * time, returns the time (hh:mm:ss) from the mysql server
     *
     * @return string
     */    
    function time(){
    	list($r)=$this->consults("select date_format(now(), '%T') as result",'str');    	
    	return $r['result'];
    }
    
    /**
     * date, returns the date (yyyy-mm-dd) from the mysql server
     *
     * @return string
     */        
    function date(){
    	list($r)=$this->consults("select date_format(now(), '%Y-%m-%d') as result",'str');    	
    	return $r['result'];
    }
    
    /**
     * datetime, returns the datetime (yyyy-mm-dd hh:mm:ss) from the mysql server
     *
     * @return string
     */    
    function datetime(){
    	list($r)=$this->consults("select now() as result",'str');    	
    	return $r['result'];
    }
}
?>