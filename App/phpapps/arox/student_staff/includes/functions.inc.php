<?php
//check the administratorlogin
function checkuserinlogin(){
	if (!isset($_SESSION['eschools']['login_type'])||$_SESSION['eschools']['login_type']==""){
	header("Location:../index.php?emsg=16");
	die();
	}
}
function sqlnumber($sql){
	$rs_qury   = @mysql_query($sql);
    return @mysql_num_rows($rs_qury);
}

function getarrayassoc($sql_qury){
	$rs_qury   = @mysql_query($sql_qury);
   if (@mysql_num_rows($rs_qury)>=1){
   return @mysql_fetch_assoc($rs_qury);
   }
   //echo $sql_qury;
   return null;
}

function getamultiassoc($sql_qury){
	$arraydata = array();
	$rs_qury   = @mysql_query($sql_qury);
	if (@mysql_num_rows($rs_qury)>0){
		while ($data = @mysql_fetch_assoc($rs_qury)){
			$arraydata[] = $data;
		}
		return $arraydata;
	}
	//echo $sql_qury;
   return null;
}
function changejsdate($jsdate){
	list($dd, $mm, $yyyy) = split('[/.-]', $jsdate); 
  return "$dd-$mm-$yyyy";
}
 
function changejsdate1($jsdate){
	list($dd, $mm, $yyyy) = split('[/.-]', $jsdate); 
  return "$yyyy-$mm-$dd";
} 
function classname($cid){
	$class = "SELECT `es_classname` FROM `es_classes` WHERE `es_classesid`='" . $cid . "'";
    $className = getarrayassoc($class);
	return $className['es_classname'];
 }
 
 function subjectname($sjid){
	$sub = "SELECT `es_subjectname` FROM `es_subject` WHERE `es_subjectid`='" . $sjid . "'";
    $subName = getarrayassoc($sub);
	return $subName['es_subjectname'];
 }
 
 function deptname($sid){
	$dept = "SELECT `es_deptname` FROM `es_departments` WHERE `es_departmentsid`='" . $sid . "'";
    $deptName = getarrayassoc($dept);
	return $deptName['es_deptname'];
 }
 
  function postname($sid){
	$post = "SELECT `es_postname` FROM `es_deptposts` WHERE `es_deptpostsid`='" . $sid . "'";
    $postName = getarrayassoc($post);
	return $postName['es_postname'];
 }
 /*function deptname($sid){
	$dept = "SELECT `es_deptname` FROM ` es_departments` WHERE `es_departmentsid`='" . $sid . "'";
    $deptName = getarrayassoc($dept);
	return $deptName['es_deptname'];
 }
 
 function postname($sid){
	$post = "SELECT `es_postname` FROM ` es_deptposts` WHERE `es_deptpostsid`='" . $sid. "'";
    $postName = getarrayassoc($post);
	return $postName['es_postname'];
 }*/
 
 function studentname($studentid){
	$sel_student = "SELECT  `pre_student_username` FROM `es_preadmission` WHERE `es_preadmissionid`='" . $studentid . "'";
    $studentName = getarrayassoc($sel_student);
	return $studentNam['pre_student_username'];
 }
 
function downloadIcon(){
	return '<img src="images/download.PNG" border="0" alt="Download">';
}
 function schoolfees(){
	$sel_schoolgrandfee = "SELECT SUM(`feeamount`) AS SUMAMT FROM `es_feepaid`";
	$schoolgrandfee_data = getarrayassoc($sel_schoolgrandfee);
	return $schoolgrandfee_data['SUMAMT'];
 }
   // generate URL
	function buildurl($arr_url) {
		$str_querystring = "?";
		$amp = "";
		if (is_array($arr_url)) {
			foreach ($arr_url as $param=>$value) {
				if (!empty($param)) {
					$str_querystring .= $amp . $param . "=" . $value;
					$amp = "&";
				}
			}
		}
		return $str_querystring;
	}

function getSqlNumber($sqlQuery) {
	$query = @mysql_query($sqlQuery);
	$result = @mysql_num_rows($query);
	@mysql_free_result($query);
	return $result;
}

//extract numbers from a string 
 function extract_numbers($string)  {  
	preg_match_all('/([\d]+)/', $string, $match);  
  	return $match[0];  
}

	/*********************************************************/
	/*                    Register globals                   */
	/*********************************************************/

	function sm_registerglobal () {

		$args = func_get_args();

		while (list(,$key) = each ($args)) {

			if (isset($_GET[$key])) $value = $_GET[$key];
			if (isset($_POST[$key])) $value = $_POST[$key];

			if (isset($value)) {

				if (!ini_get ('magic_quotes_gpc')) {

					if (!is_array($value))
						$value = addslashes($value);
					else
						$value = sm_slasharray($value);
				}

				$GLOBALS[$key] = $value;
				unset($value);
			}
		}
	}

	function sm_slasharray ($a) {

		while (list($k,$v) = each($a)) {

			if (!is_array($v))
				$a[$k] = addslashes($v);
			else
				$a[$k] = sm_slasharray($v);
		}

		reset ($a);
		return ($a);
	}

	//word wrap function
	function utf8_wordwrap($str,$width=75,$break="\n", $cut=false){
		return utf8_encode(wordwrap(utf8_decode($str), $width, $break, $cut));
	}


/**
* Random generate Password
*/
function get_rand_id($length = 8) {  
   if ($length>0){
	   $rand_id = "";
	   for($i=1; $i<=$length; $i++) {
		   do {
			   mt_srand((double)microtime() * 1000000);
			   $num = mt_rand(48,122);  
		   }while (($num > 57 && $num < 65) || ($num > 90 && $num < 97) );  
					$rand_id .= chr($num);  
	   }  
   }  
 return $rand_id;  
}  

function checkCreditCard ($cardnumber, $cardname, &$errornumber, &$errortext) {

		// Define the cards we support. You may add additional card types.
		// Name:      As in the selection box of the form - must be same as user's
		// Length:    List of possible valid lengths of the card number for the card
		// prefixes:  List of possible prefixes for the card
		// checkdigit Boolean to say whether there is a check digit
		// Don't forget - all but the last array definition needs a comma separator!

		$cards = array (  array ('name' => 'American Express', 
                          'length' => '15', 
                          'prefixes' => '34,37',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Carte Blanche', 
                          'length' => '14', 
                          'prefixes' => '300,301,302,303,304,305,36,38',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Diners Club', 
                          'length' => '14',
                          'prefixes' => '300,301,302,303,304,305,36,38',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Discover', 
                          'length' => '16', 
                          'prefixes' => '6011',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Enroute', 
                          'length' => '15', 
                          'prefixes' => '2014,2149',
                          'checkdigit' => true
                         ),
                   array ('name' => 'JCB', 
                          'length' => '15,16', 
                          'prefixes' => '3,1800,2131',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Maestro', 
                          'length' => '16,18', 
                          'prefixes' => '5020,6',
                          'checkdigit' => true
                         ),
                   array ('name' => 'MasterCard', 
                          'length' => '16', 
                          'prefixes' => '51,52,53,54,55',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Solo', 
                          'length' => '16,18,19', 
                          'prefixes' => '6334,6767',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Switch', 
                          'length' => '16,18,19', 
                          'prefixes' => '4903,4905,4911,4936,564182,633110,6333,6759',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Visa', 
                          'length' => '13,16', 
                          'prefixes' => '4',
                          'checkdigit' => true
                         ),
                   array ('name' => 'Visa Electron', 
                          'length' => '16', 
                          'prefixes' => '417500,4917,4913',
                          'checkdigit' => true
                         )
                );



		$ccErrorNo = 0;

		$ccErrors [0] = "Unknown card type";
		$ccErrors [1] = "No card number provided";
		$ccErrors [2] = "Credit card number has invalid format";
		$ccErrors [3] = "Credit card number is invalid";
		$ccErrors [4] = "Credit card number is wrong length";

		// Establish card type
		$cardType = -1;
		for ($i=0; $i<sizeof($cards); $i++) {
			// See if it is this card (ignoring the case of the string)
			if (strtolower($cardname) == strtolower($cards[$i]['name'])) {
				$cardType = $i;
				break;
			}
		}

		// If card type not found, report an error
		if ($cardType == -1) {
			$errornumber = 0;     
			$errortext = $ccErrors [$errornumber];
			return false; 
		}

		// Ensure that the user has provided a credit card number
		if (strlen($cardnumber) == 0)  {
			$errornumber = 1;     
			$errortext = $ccErrors [$errornumber];
			return false; 
		}

		// Remove any spaces from the credit card number
		$cardNo = str_replace (' ', '', $cardnumber);  

		// Check that the number is numeric and of the right sort of length.
		if (!eregi('^[0-9]{13,19}$',$cardNo))  {
			$errornumber = 2;     
			$errortext = $ccErrors [$errornumber];
			return false; 
		}

		// Now check the modulus 10 check digit - if required
		if ($cards[$cardType]['checkdigit']) {
			$checksum = 0;                                  // running checksum total
			$mychar = "";                                   // next char to process
			$j = 1;                                         // takes value of 1 or 2

			// Process each digit one by one starting at the right
			for ($i = strlen($cardNo) - 1; $i >= 0; $i--) {

				// Extract the next digit and multiply by 1 or 2 on alternative digits.      
				$calc = $cardNo{$i} * $j;

				// If the result is in two digits add 1 to the checksum total
				if ($calc > 9) {
					$checksum = $checksum + 1;
					$calc = $calc - 10;
				}

				// Add the units element to the checksum total
				$checksum = $checksum + $calc;

				// Switch the value of j
				if ($j ==1) {$j = 2;} else {$j = 1;};
			} 

			// All done - if checksum is divisible by 10, it is a valid modulus 10.
			// If not, report an error.
			if ($checksum % 10 != 0) {
				$errornumber = 3;     
				$errortext = $ccErrors [$errornumber];
				return false; 
			}
		}  

		// The following are the card-specific checks we undertake.

		// Load an array with the valid prefixes for this card
		$prefix = split(',',$cards[$cardType]['prefixes']);

		// Now see if any of them match what we have in the card number  
		$PrefixValid = false; 
		for ($i=0; $i<sizeof($prefix); $i++) {
			$exp = '^' . $prefix[$i];
			if (ereg($exp,$cardNo)) {
				$PrefixValid = true;
				break;
			}
		}

		// If it isn't a valid prefix there's no point at looking at the length
		if (!$PrefixValid) {
			$errornumber = 3;     
			$errortext = $ccErrors [$errornumber];
			return false; 
		}

		// See if the length is valid for this card
		$LengthValid = false;
		$lengths = split(',',$cards[$cardType]['length']);
		for ($j=0; $j<sizeof($lengths); $j++) {
			if (strlen($cardNo) == $lengths[$j]) {
				$LengthValid = true;
				break;
			}
		}

		// See if all is OK by seeing if the length was valid. 
		if (!$LengthValid) {
			$errornumber = 4;     
			$errortext = $ccErrors [$errornumber];
			return false; 
		};   

		// The credit card is in the required format.
		return true;
	}
	
/*
* Getting the Student Details
**/

function get_studentdetails($stud_id){	
	$get_student = "SELECT * FROM `es_preadmission` where `es_preadmissionid`=$stud_id";
	return getarrayassoc($get_student );
}	

/*
* Getting the Room Allotment Details
**/

function get_roomallot_details($raid){	
	$get_room = "SELECT * FROM `es_roomallotment` where `es_roomallotmentid`=$raid";
	return getarrayassoc($get_room) ;
}

/*

* get rooms for building 
*/
function get_room($es_hostelbuldid){
	$classes_data = array();
	$sel_classes    = "SELECT * FROM `es_hostelroomid` WHERE `es_hostelroomid`= '$es_hostelbuldid'";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;   
}
/**

* Getting the Room Details
**/

function get_room_details($roomid)
{	
	$get_room = "SELECT * FROM `es_hostelroom` where `es_hostelroomid`=$roomid";
	$rs_room = mysql_query($get_room);
	$roomname = mysql_fetch_assoc($rs_room);
	return $roomname;
}

/*
* Getting the Staff Details
**/

function get_staffdetails($staff_id){	
	$get_staff = "SELECT * FROM `es_staff` where `es_staffid`='$staff_id'";
	return  getarrayassoc($get_staff);
}	
	
/*
* Getting the class groups
**/

function get_groups(){	
	$sel_group = "SELECT * FROM `es_groups`";
	return getamultiassoc($sel_group);
}

/*
* Getting the group name
**/

function get_groupname($groupid)
{	
	$get_group = "SELECT * FROM `es_groups` where `es_groupsid`='" . $groupid . "'";
	return  getarrayassoc($get_group);
}
/** 
* Feteching the all classes under the group 
*/
function getClasses($groupid="") {
	if($groupid!="") {
		$cond = " WHERE es_groupid = $groupid ";
	}
	$sel_classes    = "SELECT * FROM `es_classes` $cond ";
	return getamultiassoc($sel_classes);
}

/** 
* Feteching the all Exams
*/
function get_Exams() {
	$sel_exams    = "SELECT * FROM `es_exam` WHERE 1";
	return getamultiassoc($sel_exams);
}

/** 
* Fetching All the class 
*/
function getallClasses() {
	$classes_data    = "SELECT * FROM `es_classes` ORDER BY `es_classesid` ASC";
	return getamultiassoc($classes_data);
}

/**
* Fetch classes data for class id 
*/
function getclassdata($classid)
{	
	$get_group = "SELECT * FROM `es_classes` where `es_classesid`='" . $classid . "'";
	return  getarrayassoc($get_group);
}

/** 

* Getting the Subjects
**/

function gettingSubject($classid=""){
	if($classid!="") {
		$cond = "WHERE es_subjectshortname='$classid'";
	} else {
		$cond = "";
	}

	 $sel_subject = "SELECT * FROM `es_subject` $cond ORDER BY `es_subjectid` ASC";
		//$sel_subject = "SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='$sub_class'";
	return getamultiassoc($sel_subject);
}

/**
* Get Subjects details
*/
function getsubjectdet($subjectid){
  $sel_subjects = "SELECT * FROM `es_subject` WHERE `es_subjectid` ='$sub_class'";
  return  getarrayassoc($sel_subjects);
}
/*
* Getting the Departments
**/

function gettingDept(){	
	$sel_dept = "SELECT * FROM `es_departments` ORDER BY `es_deptid` ASC";
	return getamultiassoc($sel_dept);
}
/**
* Get Department details
*/
function getsdept($deptid){
  $sel_dept = "SELECT * FROM `es_departments` WHERE `es_deptid` ='$deptid'";
  return  getarrayassoc($sel_subjects);
}
/*

/**


* Getting the Financial Accounting groups
**/

function groups_finance()
{	$groups_array = array();
	$sel_group = "SELECT * FROM `es_fa_groups`";
	$rs_group = mysql_query($sel_group );

	if (mysql_num_rows($rs_group)>0 ) {
		while ($group_data = mysql_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
return $groups_array;
}

/*
* Getting the Financial Accounting  Voucher
**/

function voucher_finance()
{	$groups_array = array();
	$sel_group = "SELECT * FROM `es_voucher`";
	$rs_group = mysql_query($sel_group);

	if (mysql_num_rows($rs_group)>0 ) {
		while ($group_data = mysql_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
return $groups_array;
}
/*

* Getting the Financial Ledgure
**/

function ledger_finance()
{	$groups_array = array();
	$sel_group = "SELECT * FROM `es_ledger`";
	$rs_group = mysql_query($sel_group);

	if (mysql_num_rows($rs_group)>0 ) {
		while ($group_data = mysql_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
return $groups_array;
}

/*

* Getting the Financial Ledgure
**/

function department()
{	$groups_array = array();
	$sel_group = "SELECT * FROM `es_departments`";
	$rs_group = mysql_query($sel_group);

	if (mysql_num_rows($rs_group)>0 ) {
		while ($group_data = mysql_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
return $groups_array;
}

/*

* Getting the Financial Vocture For Particular Vocture type
**/

function voucher_partypes($type)
{	$groups_array = array();
	$sel_group = "SELECT * FROM `es_voucher` where voucher_mode='$type'";
	$rs_group = mysql_query($sel_group);

	if (mysql_num_rows($rs_group)>0 ) {
		while ($group_data = mysql_fetch_assoc($rs_group)) {
			$groups_array[] = $group_data;
		}
		return $groups_array;
	}
return $groups_array;
}

/*

* Getting the sum Total for Particular Vocture
**/

function voucher_sumforselvoc($type)
{	
	$sel_group = "SELECT * FROM `es_voucherentry` where es_vouchertype = '$type'";
	$rs_group = mysql_query($sel_group);
	$tot=0;
	if (mysql_num_rows($rs_group)>0 ) {
		while ($group_data = mysql_fetch_assoc($rs_group)) {
			$tot = $tot+$group_data['es_amount'];
		}
		return $tot;
	}
	return $tot;
}
/*

* Getting the Financial Accounting  Voucher for vocture id
**/

function voucherid_finance($voucherid)
{	
	$get_voucher = "SELECT * FROM `es_voucher` where `es_voucherid`=$voucherid";
	$rs_voucher = mysql_query($get_voucher);
	$vouchername = mysql_fetch_assoc($rs_voucher);
	return $vouchername;
}


/*

* Feteching All Posts from Staff table
$obj_postlist   = new es_deptposts();
$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));

	$sel_classes    = "SELECT * es_deptposts WHERE `es_postshortname`=`$st_department` ";
	
*/
function getallPosts($st_department) {
	$classes_data = array();
    $sel_classes    = "SELECT * FROM `es_deptposts` WHERE `es_postshortname` = '$st_department' ";
	//$sel_classes    = "SELECT DISTINCT `st_postaplied` FROM `es_staff`";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

function getallsubject($st_class) {
	$classes_data = array();
    $sel_classes    = "SELECT * FROM `es_subject` WHERE `es_subjectshortname` = '$st_class' ";
	//$sel_classes    = "SELECT DISTINCT `st_postaplied` FROM `es_staff`";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/*

* Feteching All Leave Types fron Leaves Table*/
function getallleaves($posttype) {
	$classes_data = array();
	$sel_classes    = "SELECT DISTINCT `lev_type` FROM `es_leavemaster` where `lev_post`='$posttype'";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/*

* Fetching Leave type for remarks for staff attendance*/
function get_attend_remark($post) {
	$classes_data = array();
	$sel_classes    = "SELECT DISTINCT `lev_type`  FROM `es_leavemaster` WHERE `lev_post` = '$post'";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}
/**
* get vehicle name and vehicle number
*/
function get_vehiclenumber(){	
     $vehiclenumber_array = array();
	 
	 $sel_vehicle_nbr = "SELECT `tr_vehicle_no` FROM `es_transport` ";

	$rs_vehicle_nbr = mysql_query($sel_vehicle_nbr);
	
    if (mysql_num_rows($rs_vehicle_nbr)>0  ){
		while ($vehiclenumber_data = mysql_fetch_assoc($rs_vehicle_nbr)) {
			$vehiclenumber_array[] = $vehiclenumber_data;
		}
		return $vehiclenumber_array;
	}
return $vehiclenumber_array;

}
/**
* get vehicle name and vehicle number
*/
function get_vehiclename($vehicle_no) {	
	$sel_vehiclename = "SELECT * FROM `es_transport` where `es_transportid`='$vehicle_no'";
	$rs_vehiclename = mysql_query($sel_vehiclename);

	return mysql_fetch_assoc($rs_vehiclename);
}
/**
* get student name for attendance
*/
function get_StudAttend($at_std_class){
	$classes_data = array();
	$sel_classes    = "SELECT * FROM `es_preadmission` WHERE `pre_class`= '$at_std_class'  AND status!= 'inactive' AND status!= 'resultawaiting' AND pre_fromdate = '".$_SESSION['eschools']['from_acad'] ."' AND pre_todate= '". $_SESSION['eschools']['to_acad']."'"  ;
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;   
}
/**
* get student name for attendance using reg no
*/
function get_StudAttend_Reg($at_stdregno){
	$classes_data = array();
	$sel_classes    = "SELECT * FROM `es_preadmission` WHERE `pre_serialno`= '$at_stdregno'";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;   
}
/**
* get student name for attendance using reg no
*/
function get_StudAttend_Reg1($at_stdregno){
	$classes_data = array();
	$sel_classes    = "SELECT * FROM `es_preadmission` WHERE `es_preadmissionid`= '$at_stdregno'";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;   
}
/**
* get student name for Classwisw reporting
*/
function get_StudAttend_report($at_std_class){
	$classes_data = array();
	$sel_classes    = "SELECT DISTINCT `at_reg_no` ,`at_stud_name` FROM `es_attend_student` WHERE `at_std_class`= '$at_std_class'";
	return getamultiassoc($sel_classes);
  
}
/**
* get Departments for attendance
*/
function get_DeptAttend() {
	$classes_data = array();
	echo $sel_classes    = "SELECT DISTINCT `st_department` FROM `es_staff` ";
	$rs_classes     = mysql_query($sel_classes); 
	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/**
* get Departments for attendance in staffwise reporting.......... 
*/
function get_DeptAttend_report($at_staff_dept1) {
	$classes_data = array();
	$sel_classes    = "SELECT DISTINCT `at_staff_name` , `at_staff_id`
FROM `es_attend_staff`
WHERE `at_staff_dept` ='$at_staff_dept1'";
	$rs_classes     = mysql_query($sel_classes); 
	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/**
* get Departments for attendance
*/
function getstudentdetails($at_staff_dept) {
	$classes_data = array();
	$sel_classes    = "SELECT * FROM `es_staff` WHERE `st_department`= '$at_staff_dept'";
	$rs_classes     = mysql_query($sel_classes); 
	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}
/**
*get total number of working days
*/
function get_workingdays_studentwise($at_std_class_report) {
$get_days = "SELECT COUNT(at_attendance_date)  FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno' AND `at_stud_name` = '$at_std_wise_name'";
	$rs_days= mysql_query($get_days);
	
	return mysql_num_rows($rs_days);
}
/**
*get total number of working days for student wise
*/
function get_workingdays($at_std_class_report,$at_stdregno) {
  $classes_data = array();
    $get_days = "SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE `at_std_class`='$at_std_class_report' AND `at_reg_no`='$at_stdregno'";
	return getarrayassoc($get_days);
}

/**
*get total number of present days
*/
function get_presentdays($at_std_class_report,$name) {
 $get_presentdays = "SELECT *
FROM `es_attend_student`
WHERE `at_attendance` = 'P'
AND `at_reg_no` = '$name'
AND `at_std_class` = '$at_std_class_report' ";
	$rs_presentdays= mysql_query($get_presentdays);
	
	return mysql_num_rows($rs_presentdays);
}
/**
*get total number of present days
*/
function get_presentdays_studentwise($from,$to,$at_std_wise_class_report,$at_stdregno) {
$get_presentdays = "SELECT *  FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno'  AND `at_attendance` = 'P'";
	$rs_presentdays= mysql_query($get_presentdays);
	return mysql_num_rows($rs_presentdays);
}
/**
*get total number of working days for staff
*/
function get_workingdays_staff($at_staff_dept1,$name) {
$get_days_staff = "SELECT  COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE  `at_staff_dept`='$at_staff_dept1' AND `at_staff_name` = '$name' ";
	
	
	return getarrayassoc($get_days_staff);
}
/**
*get total number of present days for staff
*/
function get_presentdays_staff($at_staff_dept1,$name) {
 $get_presentdays_staff = "SELECT COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_attend` = 'P' AND `at_staff_name` = '$name' AND `at_staff_dept` = '$at_staff_dept1'";
	
	
	return getarrayassoc($get_presentdays_staff);
}

/**
*get total number of present days for studentwise
*/
function get_studentwise_attend($at_std_class_report,$name) {
 $get_presentdays = "SELECT *
FROM `es_attend_student`
WHERE `at_attendance` = 'P'
AND `at_stud_name` = '$name'
AND `at_std_class` = '$at_std_class_report' ";
	$rs_presentdays= mysql_query($get_presentdays);
	
	return mysql_num_rows($rs_presentdays);
}
/**
* get student name for studentwise reporting
*/
function get_StudWise_report($from,$to,$at_std_wise_class_report,$at_stdregno){
	$classes_data = array();
	  $sel_classes    = "SELECT COUNT(*) FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno' ";
	$rs_classes     = mysql_query($sel_classes); 	
	if (mysql_num_rows($rs_classes ) >0 ){
		while ($classes_det = mysql_fetch_assoc($rs_classes)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;   
}


function get_workingdays_studentwise1($from,$to,$at_std_wise_class_report,$at_stdregno){
    $sel_no_days    = "SELECT *  FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_wise_class_report' AND `at_reg_no`='$at_stdregno' ";
	$rs_no_days    = mysql_query($sel_no_days); 
	return mysql_num_rows($rs_no_days);
	 
}
/** Selecting the categories for Knowledge Base
*/

function get_know_categories() {
    $classes_data = array();
	$sel_category = "SELECT * FROM `es_knowledge_base` WHERE  status='active' AND parent_id='0'";
	$res_category = mysql_query($sel_category);	
	
	if (mysql_num_rows($res_category ) >0 ){
		while ($classes_det = mysql_fetch_assoc($res_category)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}
/** Selecting the articles for categories for Knowledge Base
*/
 
function get_know_category_article($uid) {
 $classes_data = array();
	$sel_category = "SELECT cat. * , art. * FROM es_knowledge_base cat, es_knowledge_articles art WHERE cat.status = 'active'AND cat.es_knowledge_baseid = art.kb_category_id AND  art.kb_category_id = '$uid' AND  art.status='active' ";
	$res_category = mysql_query($sel_category);	
	
	if (mysql_num_rows($res_category ) >0 ){
		while ($classes_det = mysql_fetch_assoc($res_category)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}
function get_know_category_article1($uid,$artid) {
 $classes_data = array();
   $sel_category = "SELECT cat. * , art. * FROM es_knowledge_base cat, es_knowledge_articles art WHERE cat.status = 'active'AND cat.es_knowledge_baseid = art.kb_category_id AND  art.kb_category_id = '$uid' AND art.es_knowledge_articlesid='$artid'";
	$res_category = mysql_query($sel_category);	
	
	if (mysql_num_rows($res_category ) >0 ){
		while ($classes_det = mysql_fetch_assoc($res_category)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/** Selecting the Subcategories for Knowledge Base
*/

function get_know_sub_categories($uid) {
    $classes_data = array();
	$sel_sub_category = "SELECT * FROM `es_knowledge_base` where parent_id ='$uid' AND status = 'active'";
	$res_sub_category = mysql_query($sel_sub_category);	
	
	if (mysql_num_rows($res_sub_category ) >0 ){
		while ($classes_det = mysql_fetch_assoc($res_sub_category)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/** Selecting the Sub Category id Articles for Knowledge Base
*/

function get_categoryid($uid) {
    $classes_data = array();
	$sel_sub_category = "SELECT `es_knowledge_baseid` FROM `es_knowledge_base` WHERE `parent_id` = '$uid'";
	$res_sub_category = mysql_query($sel_sub_category);	
	return mysql_fetch_assoc($res_sub_category);
}
/** Selecting the Sub Category Articles for Knowledge Base
*/

function get_know_sub_article($sub_categoryid) {
    $classes_data = array();
	echo $sel_sub_category = "SELECT `kb_article_name` FROM `es_knowledge_articles` WHERE `kb_category_id` = '$sub_categoryid'";
	$res_sub_category = mysql_query($sel_sub_category);	
	
	if (mysql_num_rows($res_sub_category ) >0 ){
		while ($classes_det = mysql_fetch_assoc($res_sub_category)){
			$classes_data[] = $classes_det;
		}
		return $classes_data;
	}
	return false;
}

/***
** Float checkoing
* */
function float_validation($value) {
	if (isset($value)&& !empty($value)){
		$value_format = $value;
		if (is_numeric($value_format)){
			return true;
		}
	}
   return false;
}





//Disply Functions for debuggging

function session_print($ses='session', $dieaction=null){
	if ($ses=='session'){
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	}else{
		echo "<pre>";
		print_r($ses);
		echo "</pre>";
	}
	if ( isset($dieaction)&&($dieaction)!=null ) {
		die;
	}
}
	function array_print($name=array(), $dieaction=null ){
		echo "<pre>";
		print_r($name);
		echo "</pre>";
		if ( isset($dieaction)&&($dieaction)!=null ) {
			die;
		}
	}

	/**
	* Format the date into user defined format
	*/

	function formatDateCalender($cdate, $format = 'Y-m-d'){		
		$v = explode("/",$cdate);
		$nwdt = $v[1]."/".$v[0]."/".$v[2];
		$timestamp = strtotime($nwdt);
		$formatDateCalender = date($format, $timestamp);
		return $formatDateCalender;
	}
	function formatDBDateTOCalender($cdate, $format = 'd/m/Y'){		
		$timestamp = strtotime($cdate);
		$formatDateCalender = date($format, $timestamp);
		return $formatDateCalender;
	}
	
	function formatDateCalenderTime($cdate = "d/m/Y H:i:s", $format = 'Y-m-d') {
		$v = explode("/",$cdate);
		$nwdt = $v[1]."/".$v[0]."/".$v[2];
		$timestamp = strtotime($nwdt);
		$formatDateCalenderTime = date($format, $timestamp);
		return $formatDateCalenderTime;
		
	}
	function DatabaseFormatTime($cdate, $format = 'm-d-Y'){
		
		$timestamp = strtotime($cdate);
		$DatabaseFormated_date = date($format, $timestamp);
		return $DatabaseFormated_date;
	}
	
	function formatDateproject($cdate, $format = 'm/d/y'){		
		$f    = "l, F d, Y";
		$date   = date($f, $cdate);
		$timestamp = strtotime($date);
		$formatDateproject_date = date($format, $timestamp);
		return $formatDateproject_date;
	}
	
	function DatabaseFormat($cdate, $format = 'd-m-Y'){
		
		$timestamp = strtotime($cdate);
		$DatabaseFormated_date = date($format, $timestamp);
		return $DatabaseFormated_date;
	}

	//08-Feb-4
	function date_shrt_ymd($cdate, $format = 'y-M-j'){
		$f         = "l, F d, Y";
		$date      = date($f, $cdate);		
		$date_shrt_stamp = strtotime($date);
		$date_shrt = date($format, $date_shrt_stamp);
		return $date_shrt;
	}


	//Monday 04 Feb, 2008
	function formatDate($cdate, $format = 'l d M, Y'){
		$f         = "l, F d, Y";
		$date      = date($f, $cdate);		
		$timestamp = strtotime($date);
		$formated_date = date($format, $timestamp);
		return $formated_date;
	}

	function formatLoginDate($cdate, $format = 'l d M, Y  g:i:s A'){
		$f         = "l, F d, Y";
		$date      = date($f, $cdate);
		$timestamp     = strtotime($date);
		$formated_date = date($format, $timestamp);
		return $formated_date;
	}

	function formatJSDatetime($cdate, $format = 'm/d/Y H:i:s'){

		## Format : 06/22/2007 22:22:05
		$f         = "l, F d, Y";
		$date      = date($f, $cdate);
		$timestamp     = strtotime($date);
		$formated_date = date($format, $timestamp);
		return $formated_date;
	}

	function formatDBDatetime($cdate, $format = 'Y-m-d H:i:s'){
		## Format : 2007-06-27 01:01:01
		$f             = "l, F d, Y";
		$date          = date($f, $cdate);
		$timestamp     = strtotime($date);
		$formated_date = date($format, $timestamp);
		return $formated_date;
	}

	function formattime($time, $format ='H:i:s'){
		## Format :    10:01:02
		$timestamp     = strtotime($time);
		$formated_date = date($format, $timestamp);
		return $formated_date;
	}

	function randamString($len = 8){
		$string = md5(uniqid(rand()));
		$string	= strtoupper(substr($string, 0, $len));
		return $string;
	}
	
	/*************************************
	 Function for displaying time as 00:00
	**************************************/

	function timedisplay($timetodisplay){
		$time = substr($timetodisplay,0,5);
		return $time;
	}
	

function send_mail($to, $body, $subject, $fromaddress, $fromname, $attachments=false) {
  $eol           = "\r\n";
  $mime_boundary = md5(time());

  # Common Headers
  $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;    // these two to set reply address
  $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters

  # Boundry for marking the split & Multitype Headers
  $headers .= 'MIME-Version: 1.0'.$eol.$eol;
  $headers .= "Content-Type: multipart/mixed; boundary=\"".$mime_boundary."\"".$eol.$eol;

  # Open the first part of the mail
  $msg = "--".$mime_boundary.$eol;
 
  $htmlalt_mime_boundary = $mime_boundary."_htmlalt"; //we must define a different MIME boundary for this section
  # Setup for text OR html -
  $msg .= "Content-Type: multipart/alternative; boundary=\"".$htmlalt_mime_boundary."\"".$eol.$eol;

  # Text Version
  $msg .= "--".$htmlalt_mime_boundary.$eol;
  $msg .= "Content-Type: text/plain; charset=iso-8859-1".$eol;
  $msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
  $msg .= strip_tags(str_replace("<br>", "\n", substr($body, (strpos($body, "<body>")+6)))).$eol.$eol;

  # HTML Version
  $msg .= "--".$htmlalt_mime_boundary.$eol;
  $msg .= "Content-Type: text/html; charset=iso-8859-1".$eol;
  $msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
  $msg .= $body.$eol.$eol;

  //close the html/plain text alternate portion
  $msg .= "--".$htmlalt_mime_boundary."--".$eol.$eol;

  if ($attachments !== false)
  {
    for($i=0; $i < count($attachments); $i++)
    {
      if (is_file($attachments[$i]["file"]))
      {  
        # File for Attachment
        $file_name = substr($attachments[$i]["file"], (strrpos($attachments[$i]["file"], "/")+1));
       
        $handle=fopen($attachments[$i]["file"], 'rb');
        $f_contents=fread($handle, filesize($attachments[$i]["file"]));
        $f_contents=chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode();
        $f_type=filetype($attachments[$i]["file"]);
        fclose($handle);
       
        # Attachment
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: ".$attachments[$i]["content_type"]."; name=\"".$file_name."\"".$eol;  // sometimes i have to send MS Word, use 'msword' instead of 'pdf'
        $msg .= "Content-Transfer-Encoding: base64".$eol;
        $msg .= "Content-Description: ".$file_name.$eol;
        $msg .= "Content-Disposition: attachment; filename=\"".$file_name."\"".$eol.$eol; // !! This line needs TWO end of lines !! IMPORTANT !!
        $msg .= $f_contents.$eol.$eol;
      }
    }
  }

  # Finished
  $msg .= "--".$mime_boundary."--".$eol.$eol;  // finish with two eol's for better security. see Injection.
 
  # SEND THE EMAIL
  ini_set(sendmail_from, $fromaddress);  // the INI lines are to force the From Address to be used !
  $mail_sent = mail($to, $subject, $msg, $headers);
   ini_restore(sendmail_from);
   return $mail_sent;
}

#Delete Icon
function deleteIcon(){
	return '<img src="images/b_drop.png" border="0" alt="Delete">';
}

function editIcon(){
	return '<img src="images/b_edit.png" border="0" alt="Edit">';
}

function viewIcon(){
	return '<img src="images/b_browse.png" border="0" alt="View">';
}

/**
* Pagination
*/
function paginateexte($start, $limit, $total,$otherParams='') {
	global $lang;
	global $pid;
	if ($otherParams!=''){
		$otherParams = "&" . $otherParams;
	}
	$allPages	 = ceil($total/$limit);
	$currentPage = floor($start/$limit) + 1;
	$pagination  = "";
	if ($allPages>10) {
		$maxPages = ($allPages>9) ? 9 : $allPages;

		if ($allPages>9) {
			if ($currentPage>=1&&$currentPage<=$allPages) {
				$pagination .= ($currentPage>4) ? "<td> ... </td>" : " ";
				$minPages    = ($currentPage>4) ? $currentPage : 5;
				$maxPages    = ($currentPage<$allPages-4) ? $currentPage : $allPages - 4;

				for($i = $minPages-4; $i<$maxPages+5; $i++) {
					$pagination .= ($i == $currentPage) ? "<td>".$i."</td>" : "<td><a href=\"?pid=".$pid."&start=".(($i-1)*$limit).$otherParams."\">".$i."</a></td>";
				}
				$pagination .= ($currentPage<$allPages-4) ? "<td> ...</td> " : " ";
			} else {
				$pagination .= "<td> ...</td> ";
			}
		}
	} else {
		for($i=1; $i<$allPages+1; $i++) {
			$pagination .= ($i==$currentPage) ? "<td>".$i."</td>" : "<td><a  href=\"?pid=" . $pid . "&start=" . (($i-1)*$limit) . $otherParams."\">" . $i . "</a></td>";
		}
	}

	if ($currentPage>1){ 
		
		$pagination = "<td><a  href=\"?pid=" . $pid . "&start=0" . $otherParams . "\"><strong>&laquo;</strong> First</a></td><td><a  href=\"?pid=" . $pid . "&start=" . (($currentPage-2)*$limit) . $otherParams . "\"><strong >&laquo;</strong> Previous</a></td>" . $pagination;
	}
	if ($currentPage<$allPages){
		
		$pagination .= "<td><a  href=\"?pid=" . $pid . "&start=" . ($currentPage*$limit) . $otherParams . "\">Next <strong>&raquo;</strong></a></td><td><a  href=\"?pid=" . $pid . "&start=" . (($allPages-1)*$limit) . $otherParams . "\">Last <strong>&raquo;</strong></a></td>";
	}	
	echo "<table align=\"center\" class=\"boxPagination\"><tr>".$pagination."</tr></table>";
}	



/*************for thumbnail display**********/
function imageSource($image,$width=100,$height=100){
return "includes/image_display.php?file=".$image;
return $image;
}
/***********eof**********/




function displayDate($date,$format = 'd/m/Y'){
	$timestamp = strtotime($date);
	$date = date($format,$timestamp);
return $date;
}

function displayDateTime($date,$format = 'F d, Y H:i:s'){
	$timestamp = strtotime($date);
	$date = date($format,$timestamp);
return $date;
}	

function displayDateAndTime($date,$format = 'd/m/Y H:i:s'){
	$timestamp = strtotime($date);
	$date = date($format,$timestamp);
return $date;
}		

/***********datediff**********/
function date_diff11($earlierDate, $laterDate) {
//returns an array of numeric values representing days, hours, minutes & seconds respectively
	$ret = array('days'=>0,'hours'=>0,'minutes'=>0,'seconds'=>0);
	$totalsec = strtotime($laterDate) - strtotime($earlierDate);
	if ($totalsec >= 86400) {
		$ret['days'] = floor($totalsec/86400);
		$totalsec = $totalsec % 86400;
	}
	if ($totalsec >= 3600) {
		$ret['hours'] = floor($totalsec/3600);
		$totalsec = $totalsec % 3600;
	}
	if ($totalsec >= 60) {
		$ret['minutes'] = floor($totalsec/60);
	}
	$ret['seconds'] = $totalsec % 60;
	return $ret;
}
/************eofdatediff**********/		

/*Finding the difference between dates */
function dateDiff($startDate, $endDate) {
	// Parse dates for conversion
	$startArry	= date_parse($startDate);
	$endArry	= date_parse($endDate);

// Convert dates to Julian Days
	$start_date = GregorianToJD($startArry["month"], $startArry["day"], $startArry["year"])."</br>";
	$end_date   = GregorianToJD($endArry["month"], $endArry["day"], $endArry["year"]);
// Return difference
return round(($end_date - $start_date), 0);
}

//function to display the images
function displayimage($imgsrc, $thumbsize = "100", $alt = "Image", $title = "Images" ){
	if (file_exists($imgsrc)) {
	list($width, $height ) = getimagesize($imgsrc);
	$imgratio = $width/$height;
		if ($imgratio>1) {
			$newwidth = $thumbsize;
			$newheight = $thumbsize/$imgratio;
		}else {
			$newheight = $thumbsize;
			$newwidth = $thumbsize*$imgratio;
		}
	return '<img src="' . $imgsrc . '" width="' . $newwidth . '" height="' . $newheight . '" alt="' . $alt . '" border="0" title="' . $title . '" >';
	} else {
	return '<span class="narmal">No Image</span>';
	}
}

function get_trans_det($checkitem) {
	$get_trans = "SELECT * FROM `es_transport` where `es_transportid`=$checkitem";
	return getamultiassoc($get_trans);
	
	
}

function get_day($day,$format = 'l') {
	$v = explode("/",$day);
	$nwdt = $v[1]."/".$v[0]."/".$v[2];
	$timestamp = strtotime($nwdt);	
	$dates = date($format, $timestamp);	
	return $dates;

}

function fee_master($class, $feeparticularid){
	$sel_masterfee = "SELECT * FROM `es_feemaster` WHERE `es_feemasterid` = '$feeparticularid' AND `fee_class`='$class' " ;
	return getarrayassoc($sel_masterfee);
} 
function staff_class($cid) {
	$class = "SELECT st_class  FROM es_staff  WHERE es_staffid ='".$cid."' ";
	$className = getarrayassoc($class);
	return $className['st_class'];
	
}

function class_group($cid) {
	$class = "SELECT es_groupid   FROM es_classes   WHERE es_classesid  ='".$cid."' ";
	$className = getarrayassoc($class);
	return $className['es_groupid'];
	
}
function stripslashes_deep($value)
{
    $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

    return $value;
}
function func_date_conversion($date_format_source, $date_format_destiny, $date_str){
/*
	To Convert Any Date Format to any other Date Format
	Use Like:
		$df_des = 'Y-m-d H:i';
		$df_src = 'd/m/Y H:i A';
		echo func_date_conversion( $df_src, $df_des, '10/11/2008 03:34 PM');
*/
	$base_format     = split('[:/.\ \-]', $date_format_source);
	$date_str_parts = split('[:/.\ \-]', $date_str );
	
	$date_elements = array();
	
	$p_keys = array_keys( $base_format );
	foreach ( $p_keys as $p_key )
	{
		if ( !empty( $date_str_parts[$p_key] ))
		{
			$date_elements[$base_format[$p_key]] = $date_str_parts[$p_key];
		}
		else
			return false;
	}
	
	if (array_key_exists('M', $date_elements)) {
		$Mtom=array(
			"Jan"=>"01",
			"Feb"=>"02",
			"Mar"=>"03",
			"Apr"=>"04",
			"May"=>"05",
			"Jun"=>"06",
			"Jul"=>"07",
			"Aug"=>"08",
			"Sep"=>"09",
			"Oct"=>"10",
			"Nov"=>"11",
			"Dec"=>"12",
		);
		$date_elements['m']=$Mtom[$date_elements['M']];
	}
	
	$dummy_ts = mktime($date_elements['H'], $date_elements['i'], $date_elements['s'], $date_elements['m'], $date_elements['d'], $date_elements['Y'] );
	
	return date( $date_format_destiny, $dummy_ts );
}
//==========================
//	File extension
//=====================
function fileextension($filename) { 
	$path_info = pathinfo($filename);
	return $path_info['extension'];
} 
//===================
//	File name
//==================
function filename($filename) {
	$path_info = pathinfo($filename);
	return $path_info['filename'];
}

function RemoveDateFromFilename($filename, $separator="_") {
	$file_ext = fileextension($filename);
	$file_name = filename($filename);
	
	$exp_arr = explode($separator,$file_name);
	unset($exp_arr[ count($exp_arr)-1 ]);
	$org_file_name = implode($separator,$exp_arr);
	return $org_file_name.".".$file_ext;
}
/***********************************************
**	Used to force download any file by passing the full path of the file for download
**	Use Like 
**	echo ForceDownloadFile("documents/application.pdf");
************************************************/
function ForceDownloadFile($filepath) {
	$extn = fileextension($filepath);
	$flnm = filename($filepath);
	$downloadfl = $flnm.".".$extn;
	$downloadfl = RemoveDateFromFilename($downloadfl);
	$len = @filesize($filepath);
 	header("Content-type: application/$extn");
	header("Content-Disposition: attachment; filename=$downloadfl");
	header("Content-Length: $len");
	@readfile($filepath);
	exit;
}

?>
