<?php
class FormValidation {

	var $ERROR	=	"";
	var $CLEAR	=	false;

	function FormValidation (){
		return;
	}

	function clear_error (){

		$this->ERROR = "";
	}
//	************************************************************
//	Strips whitespace (tab or space) from a string

	function strip_space ($text)
	{
		$Return = ereg_replace("([ 	]+)","",$text);
		return ($Return);
	}

//	************************************************************
//	Returns true if string contains only numbers

	function is_allnumbers ($text)
	{
	if($this->CLEAR) { $this->clear_error(); }

		if(empty($text)){
			$this->ERROR = "No value submited";
			return false;
		}
		
		if($text<0){
			$this->ERROR = "Should be positive numerics";
			return false;
		}
		if( (gettype($text)) == "integer")	{ return true; }
		
		$Bad = $this->strip_numbers($text);

		if(empty($Bad)){
			return true;
		}
		return false;
	}

//	************************************************************

//	Returns true if string contains only numbers

	function is_nonNegNumber ($text)
	{
	if($this->CLEAR) { $this->clear_error(); }

		if(empty($text))
		{
			$this->ERROR = "No value submited";
			return false;
		}
		
		if( (gettype($text)) == "float")	{ return true; }

		$Bad = eregi_replace("([0-9.])", "", $text);

		if(empty($Bad))
		{
			return true;
		}
		else {
			$this->ERROR = "Value should be Positive Integer";
			return false;
		}
	}

//	************************************************************

//	Strip numbers from a string

	function strip_numbers ($text)
	{
		$Stripped = eregi_replace("([0-9]+)", "", $text);
		return ($Stripped);
	}

//	************************************************************
//	Checks a string for whitespace. True or false

	function has_space ($text)
	{
		if( ereg("[ 	]",$text) )
		{
			return true;
		}

		return false;
	}

//	************************************************************
//	Hostname is a reachable internet host? true or false

	function is_host ($hostname = "", $type = "ANY")
	{
		if($this->CLEAR) { $this->clear_error(); }

		if(empty($hostname))
		{
			$this->ERROR = "Plese Provide Correct Email Id";
			return false;
		}

		if(!$this->is_hostname($hostname))	{ return false; }

		if(!checkdnsrr($hostname,$type))
		{
			$this->ERROR = "no DNS records for [$hostname].";
			return false;
		}

		return true;
	}

	//	************************************************************
//	Valid email format? true or false
//	This checks the raw address, not RFC 822 addresses.

//	Looks for [something]@[valid hostname with DNS record]

	function is_email ($Address = "")
	{
		if($this->CLEAR) { $this->clear_error(); }

		if(empty($Address))
		{
			$this->ERROR = "Enter Email ID";
			return false;
		}
		
		if(!ereg("^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$",$Address))
		{
		$this->ERROR = "Invalid email address submitted";
			return false;
		}

		if(!ereg("@",$Address))
		{
			$this->ERROR = "Invalid email address submitted";
			return false;
		}
		

		list($User,$Host) = split("@",$Address);

		if ( (empty($User)) or (empty($Address)) or (empty($Host)) )
		{
			$this->ERROR = "missing data [$User]@[$Host]";
			return false;
		}
		if( ($this->has_space($User)) or ($this->has_space($Host)) )
		{
			$this->ERROR = "Plese Provoid correct Email Id";
			return false;
		}

		// Can't look for an MX only record as that precludes
		// CNAME only records. Thanks to everyone that slapped
		// me upside the head for this glaring oversite. :)

		

		return true;
	}

	function is_number($number)	{
		if(!preg_match("/^\-?\+?[0-9e1-9.]+$/",$number)){
			return false;
			}
		else {
			return true;
			}
	}
		function is_numberonly($number)	{
		if(!preg_match("/^\-?\+?[0-9]+$/",$number)){
			return false;
			}
		else {
			return true;
			}
	}
	function isfloat($number)	{
		// ([0-9]*[\.]{LNUM}) | ({LNUM}[\.][0-9]*)
		
		if(!preg_match("/^[0-9]*[\.][0-9]*+$/",$number)){
			return false;
			}
		else {
			return true;
			}
	}
/****
**  This function checks the given string is P or A word or not
**  and return true or false accordingly.
***/	


/****
**  This function checks the given string is alphanumeric word or not
**  and return true or false accordingly.
***/
	function is_alpha_numeric($str){
		if ( empty($str) ||$str=="" ) {
			return false;
		}
		/*if ( !preg_match("/^[A-Za-z0-9_ ]+$/", $str ) ) {
			return false;
		}*/
		return true;
	}
		
	function is_alpha($str){
		if ( empty($str) ||$str=="" ) {
			return false;
		}

		if ( !preg_match("/^[A-Za-z.' ]+$/", $str ) ) {
					return false;
		}
		return true;
	}
  function is_alphacoma($str){
		if ( empty($str) ||$str=="" ) {
			return false;
		}

		if ( !preg_match("/^[A-Za-z.,' ]+$/", $str ) ) {
					return false;
		}
		return true;
	}
/****
**  Phone number validation
***/
function is_phone ($Phone = "")
	{
		if($this->CLEAR) { $this->clear_error(); }

		if ( empty ( $Phone)){
			$this->ERROR = "No Phone number submitted";
			return false;
		}

		$Num = $Phone;
		$Num = $this->strip_space($Num);
		$Num = eregi_replace("(\(|\)|\-|\+)","",$Num);
		if(!$this->is_allnumbers($Num))
		{
			$this->ERROR = "bad data in phone number";
			return false;
		}

		if ( (strlen($Num)) < 7)
		{
			$this->ERROR = "number is too short [$Num][$Phone]";
			return false;
		}

		// 000 000 000 0000
 		// CC  AC  PRE SUFX = max 13 digits

		if( (strlen($Num)) > 13)
		{
			$this->ERROR = "number is too long [$Num][$Phone]";
			return false;
		}

		return true;
	}

//	************************************************************
//	Valid, fully qualified hostname? true or false
//	Checks the -syntax- of the hostname, not it's actual
//	validity as a reachable internet host

	function is_hostname ($hostname = ""){
		if($this->CLEAR) { $this->clear_error(); }

		$web = false;

		if(empty($hostname))
		{
			$this->ERROR = "Provide Correct Email Id";
			return false;
		}

		// Only a-z, 0-9, and "-" or "." are permitted in a hostname

		// Patch for POSIX regex lib by Sascha Schumann sas@schell.de
		$Bad = eregi_replace("[-A-Z0-9\.]","",$hostname);

		if(!empty($Bad))
		{
			$this->ERROR = "invalid chars [$Bad]";
			return false;
		}

		// See if we're doing www.hostname.tld or hostname.tld
		if(eregi("^www\.",$hostname))
		{
			$web = true;
		}

		// double "." is a not permitted
		if(ereg("\.\.",$hostname))
		{
			$this->ERROR = "Double dot in [$hostname]";
			return false;
		}
		if(ereg("^\.",$hostname))
		{
			$this->ERROR = "leading dot in [$hostname]";
			return false;
		}

		$chunks = explode(".",$hostname);

		if( (gettype($chunks)) != "array")
		{
			$this->ERROR = "Invalid hostname, no dot seperator [$hostname]";
			return false;
		}

		$count = ( (count($chunks)) - 1);

		if($count < 1)
		{
			$this->ERROR = "Invalid hostname [$count] [$hostname]\n";
			return false;
		}

	}

}
?>
