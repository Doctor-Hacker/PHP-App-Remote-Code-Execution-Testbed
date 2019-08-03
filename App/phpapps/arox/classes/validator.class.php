<?php
class validator{

	var $ERROR = "";
	var $CLEAR = false;

	function validator(){
		return;
	}

	function clear_error (){
		$this->ERROR = "";
	}
//************************************************************
//	Strips whitespace (tab or space) from a string

	function strip_space ($text){
		$Return = ereg_replace("([ 	]+)","",$text);
		return ($Return);
	}

//************************************************************
//	Returns true if string contains only numbers

	function is_allnumbers ($text){
		if ($this->CLEAR) { 
		   $this->clear_error(); 
		 }

		if (empty($text)){
			$this->ERROR =  " No value Submited";
			return false;
		}
		
		if ($text<1){
			$this->ERROR = "Should be positive numerics";
			return false;
		}
		if ( (gettype($text)) !=  "integer" ){ 
			return false; 
		}
		
		$Bad = $this->strip_numbers($text);
		
		if (empty($Bad)){
			return true;
		}
		return false;
	}

//************************************************************

//Returns true if string contains only numbers

	function is_nonNegNumber ($text){
		
		if ($this->CLEAR) { $this->clear_error(); }
		
		if (empty($text)){
			$this->ERROR = "No value submited";
			return false;
		}
		
		if ( (gettype($text)) == "float")	{ return true; }
		$Bad = eregi_replace("([0-9.])", "", $text);

		if (empty($Bad)){
			return true;
		}else {
			$this->ERROR = "Value should be Positive Integer";
			return false;
		}
	}

//************************************************************

//	Strip numbers from a string

	function strip_numbers ($text){
		$Stripped = eregi_replace("([0-9]+)", "", $text);
		return ($Stripped);
	}

/**********************************************
* Checks a string for whitespace. True or False
**/
	function has_space ($text){
		if ( ereg("[ 	]",$text) ){
			return true;
		}
		return false;
	}

/****
**  Phone number validator
***/
	function is_phone ($Phone = ""){
		if ($this->CLEAR) { $this->clear_error(); }

		if ( empty ( $Phone)){
			$this->ERROR = "No Phone number submitted";
			return false;
		}

		$Num = $Phone;
		$Num = $this->strip_space($Num);
		$Num = eregi_replace("(\(|\)|\-|\+)","",$Num);
		if (!$this->is_allnumbers($Num)){
			$this->ERROR = "bad data in phone number";
			return false;
		}

		if ( (strlen($Num)) < 7){
			$this->ERROR = "number is too short [$Num][$Phone]";
			return false;
		}

		// 000 000 000 0000
 		// CC  AC  PRE SUFX = max 13 digits

		if ( (strlen($Num)) > 13){
			$this->ERROR = "number is too long [$Num][$Phone]";
			return false;
		}

		return true;
	}

/*****************
* Email validation
**/

	function is_email ($email_address = ""){
		if ($this->CLEAR) { $this->clear_error(); }
		

		if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
			$this->ERROR = "Invalid email Address Submitted";
			return false;
		}
/*
	$filter = "^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$";
	if (!eregi($filter, $user_email)) {
		echo "Invalid e-mail address.";
	}

	if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid e-mail";
	}
*/
		return true;
	}	

//	************************************************************
//	Hostname is a reachable internet host? true or false

	function is_host ($hostname = "", $type = "ANY"){
		if ($this->CLEAR) { $this->clear_error(); }

		if (empty($hostname)){
			$this->ERROR = "Plese Provide Correct Email Id";
			return false;
		}

		if (!$this->is_hostname($hostname))	{ return false; }

		if(!checkdnsrr($hostname,$type)){
			$this->ERROR = "no DNS records for [$hostname].";
			return false;
		}

		return true;
	}

	function is_number($number)	{
		if (!preg_match("/^[0-9]+$/", $number)){
			return false;
		}
		return true;
		}

	function isfloat($number)	{
		// ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
		if (!preg_match("/^[0-9]*[\.][0-9]*+$/", $number)){
			return false;
		}
		return true;
	}
	


/******************************************************************
* This function checks the given string is alphanumeric word or not
* and return true or false accordingly.
**/
	function is_alpha_numeric($str){
		if ( empty($str) ||$str=="" ) {
			$this->ERROR = "In Valid values Submited";
			return false;
		}
		if ( !preg_match("/^[A-Za-z0-9_ ]+$/", $str ) ) {
			$this->ERROR = "Please provide  valid  ";
			return false;
		}
		return true;
	}
	function is_only_alpha_numeric($str){
		if ( empty($str) ||$str=="" ) {
			$this->ERROR = "In Valid values Submited";
			return false;
		}
		if ( !preg_match("/^[A-Za-z0-9]+$/", $str ) ) {
			$this->ERROR = "Please provide  valid  ";
			return false;
		}
		return true;
	}
		
	function is_alpha($str){
		if ( empty($str) ||$str=="" ) {
			return false;
		}

		if ( !preg_match("/^[A-Za-z ]+$/", $str ) ) {
					return false;
		}
		return true;
	}



//	************************************************************
//	Valid, fully qualified hostname? true or false
//	Checks the -syntax- of the hostname, not it's actual
//	validity as a reachable internet host

	function is_hostname ($hostname = ""){
		if ($this->CLEAR) { $this->clear_error(); }

		$web = false;

		if (empty($hostname)){
			$this->ERROR = "Provide Correct Email Id";
			return false;
		}

		// Only a-z, 0-9, and "-" or "." are permitted in a hostname

		// Patch for POSIX regex lib by Sascha Schumann sas@schell.de
		$Bad = eregi_replace("[-A-Z0-9\.]","",$hostname);

		if (!empty($Bad)){
			$this->ERROR = "invalid chars [$Bad]";
			return false;
		}

		// See if we're doing www.hostname.tld or hostname.tld
		if (eregi("^www\.",$hostname)){
			$web = true;
		}

		// double "." is a not permitted
		if (ereg("\.\.",$hostname)){
			$this->ERROR = "Double dot in [$hostname]";
			return false;
		}
		if ( ereg("^\.", $hostname )) {
			$this->ERROR = "leading dot in [$hostname]";
			return false;
		}

		$chunks = explode(".",$hostname);

		if ( (gettype($chunks)) != "array"){
			$this->ERROR = "Invalid hostname, no dot seperator [$hostname]";
			return false;
		}

		$count = ( (count($chunks)) - 1);

		if ($count < 1){
			$this->ERROR = "Invalid hostname [$count] [$hostname]\n";
			return false;
		}

	}

	function is_nullvalue($nullval){
		if ($this->CLEAR) { $this->clear_error(); }
		if ($nullval==""){
			$this->ERROR = "No content found";
			return false;
		}
		if (strlen($nullval)<1){
			$this->ERROR = "No content found";
			return false;
		}
		return true;
	}

}
?>
