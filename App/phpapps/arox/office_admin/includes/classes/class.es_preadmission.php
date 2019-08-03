<?php

include_once('class.pog_base.php');
class es_preadmission extends POG_Base
{
	public $es_preadmissionId= '';

	/**
	 * @var VARCHAR(255)
	 */
	 
	 //public $es_admissionid
	 
	 
	public $pre_serialno;
	
	/**
	 * @var VARCHAR(255)
	 */
	 public $pre_number;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_student_username;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_student_password;
	
	/**
	 * @var DATE
	 */
	public $pre_dateofbirth;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_fathername;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_mothername;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_fathersoccupation;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_motheroccupation;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_contactname1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_contactno1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_contactno2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_contactname2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_address1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_city1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_state1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_country1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_phno1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_mobile1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_prev_acadamicname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_prev_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_prev_university;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_prev_percentage;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_prev_tcno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_acadamicname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_class1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_percentage1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_result1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_class2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_percentage2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_result2;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_class3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_percentage3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_current_result3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_physical_details;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_height;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_weight;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_alerge;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_physical_status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_special_care;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_sec;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_name;
	
	/**
	 * @var INT
	 */
	public $pre_age;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_phno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_mobile;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_resno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_resno1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_image;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $test1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $test2;
	
	/**
	 * @var INT
	 */
	public $test3;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_pincode1;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_pincode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_emailid;
	
	/**
	 * @var DATE
	 */
	public $pre_fromdate;
	
	/**
	 * @var DATE
	 */
	public $pre_todate;
	
	/**
	 * @var ENUM('pass','fail','resultawaiting', 'inactive' )
	 */
	public $status;
	
	/**
	 * @var ENUM('inactive','active')
	 */
	public $pre_status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_user_theme;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_hobbies;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $pre_blood_group;
	
	/**
	 * @var ENUM('male','female')
	 */
	public $pre_gender;
	
	/**
	 * @var enum('newadmission','promoted')
	 */
	public $admission_status;
	
	public $es_program;
	public $es_branch;
	public $es_admitted;
	public $es_rcat;
	public $es_phandcaped;
	public $es_econbackward;
	public $es_home;
	public $pre_hobbies1;
	public $pre_hobbies2;
	public $pre_building;
	public $pre_room;
	
	
	
	public $pog_attribute_type = array(
	    
		"es_preadmissionId" => array('db_attributes' => array("NUMERIC", "INT")),
		"pre_serialno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_number" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_student_username" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_student_password" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_dateofbirth" => array('db_attributes' => array("NUMERIC", "DATE")),
		"pre_fathername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_mothername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_fathersoccupation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_motheroccupation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_contactname1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_contactno1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_contactno2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_contactname2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_address1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_city1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_state1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_country1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_phno1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_mobile1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_prev_acadamicname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_prev_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_prev_university" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_prev_percentage" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_prev_tcno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_acadamicname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_class1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_percentage1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_result1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_class2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_percentage2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_result2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_class3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_percentage3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_current_result3" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_physical_details" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_height" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_weight" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_alerge" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_physical_status" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_special_care" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_sec" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_age" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_address" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_phno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_mobile" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_resno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_resno1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_image" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"test1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"test2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"test3" => array('db_attributes' => array("NUMERIC", "INT")),
		"pre_pincode1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_pincode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_emailid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"pre_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'pass','fail','resultawaiting', 'inactive'")),
		"pre_status" => array('db_attributes' => array("SET", "ENUM", "'inactive','active'")),
		"es_user_theme" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_hobbies" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_blood_group" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_gender" => array('db_attributes' => array("SET", "ENUM", "'male','female'")),
		"admission_status" => array('db_attributes' => array("SET", "ENUM", "'newadmission','promoted'")),
		"es_program" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_branch" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	    "es_admitted" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	    "es_rcat" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	    "es_phandcaped" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
        "es_econbackward" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	    "es_home" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_hobbies1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	    "pre_hobbies2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"pre_building" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	    "pre_room" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
	
		);
	public $pog_query;
	
	
	
	
	/**
	* Getter for some private attributes
	* @return mixed $attribute
	*/
	public function __get($attribute)
	{
		if (isset($this->{"_".$attribute}))
		{
			return $this->{"_".$attribute};
		}
		else
		{
			return false;
		}
	}
	
	function es_preadmission($pre_serialno='', $pre_number='', $pre_student_username='', $pre_student_password='', $pre_dateofbirth='', $pre_fathername='', $pre_mothername='', $pre_fathersoccupation='', $pre_motheroccupation='', $pre_contactname1='', $pre_contactno1='', $pre_contactno2='', $pre_contactname2='', $pre_address1='', $pre_city1='', $pre_state1='', $pre_country1='', $pre_phno1='', $pre_mobile1='', $pre_prev_acadamicname='', $pre_prev_class='', $pre_prev_university='', $pre_prev_percentage='', $pre_prev_tcno='', $pre_current_acadamicname='', $pre_current_class1='', $pre_current_percentage1='', $pre_current_result1='', $pre_current_class2='', $pre_current_percentage2='', $pre_current_result2='', $pre_current_class3='', $pre_current_percentage3='', $pre_current_result3='', $pre_physical_details='', $pre_height='', $pre_weight='', $pre_alerge='', $pre_physical_status='', $pre_special_care='', $pre_class='', $pre_sec='', $pre_name='', $pre_age='', $pre_address='', $pre_city='', $pre_state='', $pre_country='', $pre_phno='', $pre_mobile='', $pre_resno='', $pre_resno1='', $pre_image='', $test1='', $test2='', $test3='', $pre_pincode1='', $pre_pincode='', $pre_emailid='', $pre_fromdate='', $pre_todate='', $status='', $pre_status='', $es_user_theme='', $pre_hobbies='', $pre_blood_group='', $pre_gender='', $admission_status='', $es_program='', $es_branch='', $es_admitted='',$es_rcat='', $es_phandcaped='', $es_econbackward='', $es_home='', $pre_hobbies1='', $pre_hobbies2='', $pre_building='', $pre_room='',$es_preadmissionid='')
	{
	   
		$this->pre_serialno = $pre_serialno;
		$this->pre_number = $pre_number;
		$this->pre_student_username = $pre_student_username;
		$this->pre_student_password = $pre_student_password;
		$this->pre_dateofbirth = $pre_dateofbirth;
		$this->pre_fathername = $pre_fathername;
		$this->pre_mothername = $pre_mothername;
		$this->pre_fathersoccupation = $pre_fathersoccupation;
		$this->pre_motheroccupation = $pre_motheroccupation;
		$this->pre_contactname1 = $pre_contactname1;
		$this->pre_contactno1 = $pre_contactno1;
		$this->pre_contactno2 = $pre_contactno2;
		$this->pre_contactname2 = $pre_contactname2;
		$this->pre_address1 = $pre_address1;
		$this->pre_city1 = $pre_city1;
		$this->pre_state1 = $pre_state1;
		$this->pre_country1 = $pre_country1;
		$this->pre_phno1 = $pre_phno1;
		$this->pre_mobile1 = $pre_mobile1;
		$this->pre_prev_acadamicname = $pre_prev_acadamicname;
		$this->pre_prev_class = $pre_prev_class;
		$this->pre_prev_university = $pre_prev_university;
		$this->pre_prev_percentage = $pre_prev_percentage;
		$this->pre_prev_tcno = $pre_prev_tcno;
		$this->pre_current_acadamicname = $pre_current_acadamicname;
		$this->pre_current_class1 = $pre_current_class1;
		$this->pre_current_percentage1 = $pre_current_percentage1;
		$this->pre_current_result1 = $pre_current_result1;
		$this->pre_current_class2 = $pre_current_class2;
		$this->pre_current_percentage2 = $pre_current_percentage2;
		$this->pre_current_result2 = $pre_current_result2;
		$this->pre_current_class3 = $pre_current_class3;
		$this->pre_current_percentage3 = $pre_current_percentage3;
		$this->pre_current_result3 = $pre_current_result3;
		$this->pre_physical_details = $pre_physical_details;
		$this->pre_height = $pre_height;
		$this->pre_weight = $pre_weight;
		$this->pre_alerge = $pre_alerge;
		$this->pre_physical_status = $pre_physical_status;
		$this->pre_special_care = $pre_special_care;
		$this->pre_class = $pre_class;
		$this->pre_sec = $pre_sec;
		$this->pre_name = $pre_name;
		$this->pre_age = $pre_age;
		$this->pre_address = $pre_address;
		$this->pre_city = $pre_city;
		$this->pre_state = $pre_state;
		$this->pre_country = $pre_country;
		$this->pre_phno = $pre_phno;
		$this->pre_mobile = $pre_mobile;
		$this->pre_resno = $pre_resno;
		$this->pre_resno1 = $pre_resno1;
		$this->pre_image = $pre_image;
		$this->test1 = $test1;
		$this->test2 = $test2;
		$this->test3 = $test3;
		$this->pre_pincode1 = $pre_pincode1;
		$this->pre_pincode = $pre_pincode;
		$this->pre_emailid = $pre_emailid;
		$this->pre_fromdate = $pre_fromdate;
		$this->pre_todate = $pre_todate;
		$this->status = $status;
		$this->pre_status = $pre_status;
		$this->es_user_theme = $es_user_theme;
		$this->pre_hobbies = $pre_hobbies;
		$this->pre_blood_group = $pre_blood_group;
		$this->pre_gender = $pre_gender;
		$this->admission_status = $admission_status;
		$this->es_program = $es_program;
		$this->es_branch = $es_branch;
		$this->es_admitted = $es_admitted;
		$this->es_rcat = $es_rcat;
		$this->es_phandcaped = $es_phandcaped;
		$this->es_econbackward = $es_econbackward;
		$this->es_home = $es_home;
		$this->pre_hobbies1 = $pre_hobbies1;
		$this->pre_hobbies2 = $pre_hobbies2;
		$this->pre_building = $pre_building;
		$this->pre_room = $pre_room;
		$this->pre_room = $pre_room;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_preadmissionId 
	* @return object $es_preadmission
	*/
	function Get($es_preadmissionId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_preadmission` where `es_preadmissionid`='".intval($es_preadmissionId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_preadmissionId = $row['es_preadmissionid'];
			
			$this->pre_serialno = $this->Unescape($row['pre_serialno']);
			$this->pre_number = $this->Unescape($row['pre_number']);
			$this->pre_student_username = $this->Unescape($row['pre_student_username']);
			$this->pre_student_password = $this->Unescape($row['pre_student_password']);
			$this->pre_dateofbirth = $row['pre_dateofbirth'];
			$this->pre_fathername = $this->Unescape($row['pre_fathername']);
			$this->pre_mothername = $this->Unescape($row['pre_mothername']);
			$this->pre_fathersoccupation = $this->Unescape($row['pre_fathersoccupation']);
			$this->pre_motheroccupation = $this->Unescape($row['pre_motheroccupation']);
			$this->pre_contactname1 = $this->Unescape($row['pre_contactname1']);
			$this->pre_contactno1 = $this->Unescape($row['pre_contactno1']);
			$this->pre_contactno2 = $this->Unescape($row['pre_contactno2']);
			$this->pre_contactname2 = $this->Unescape($row['pre_contactname2']);
			$this->pre_address1 = $this->Unescape($row['pre_address1']);
			$this->pre_city1 = $this->Unescape($row['pre_city1']);
			$this->pre_state1 = $this->Unescape($row['pre_state1']);
			$this->pre_country1 = $this->Unescape($row['pre_country1']);
			$this->pre_phno1 = $this->Unescape($row['pre_phno1']);
			$this->pre_mobile1 = $this->Unescape($row['pre_mobile1']);
			$this->pre_prev_acadamicname = $this->Unescape($row['pre_prev_acadamicname']);
			$this->pre_prev_class = $this->Unescape($row['pre_prev_class']);
			$this->pre_prev_university = $this->Unescape($row['pre_prev_university']);
			$this->pre_prev_percentage = $this->Unescape($row['pre_prev_percentage']);
			$this->pre_prev_tcno = $this->Unescape($row['pre_prev_tcno']);
			$this->pre_current_acadamicname = $this->Unescape($row['pre_current_acadamicname']);
			$this->pre_current_class1 = $this->Unescape($row['pre_current_class1']);
			$this->pre_current_percentage1 = $this->Unescape($row['pre_current_percentage1']);
			$this->pre_current_result1 = $this->Unescape($row['pre_current_result1']);
			$this->pre_current_class2 = $this->Unescape($row['pre_current_class2']);
			$this->pre_current_percentage2 = $this->Unescape($row['pre_current_percentage2']);
			$this->pre_current_result2 = $this->Unescape($row['pre_current_result2']);
			$this->pre_current_class3 = $this->Unescape($row['pre_current_class3']);
			$this->pre_current_percentage3 = $this->Unescape($row['pre_current_percentage3']);
			$this->pre_current_result3 = $this->Unescape($row['pre_current_result3']);
			$this->pre_physical_details = $this->Unescape($row['pre_physical_details']);
			$this->pre_height = $this->Unescape($row['pre_height']);
			$this->pre_weight = $this->Unescape($row['pre_weight']);
			$this->pre_alerge = $this->Unescape($row['pre_alerge']);
			$this->pre_physical_status = $this->Unescape($row['pre_physical_status']);
			$this->pre_special_care = $this->Unescape($row['pre_special_care']);
			$this->pre_class = $this->Unescape($row['pre_class']);
			$this->pre_sec = $this->Unescape($row['pre_sec']);
			$this->pre_name = $this->Unescape($row['pre_name']);
			$this->pre_age = $this->Unescape($row['pre_age']);
			$this->pre_address = $this->Unescape($row['pre_address']);
			$this->pre_city = $this->Unescape($row['pre_city']);
			$this->pre_state = $this->Unescape($row['pre_state']);
			$this->pre_country = $this->Unescape($row['pre_country']);
			$this->pre_phno = $this->Unescape($row['pre_phno']);
			$this->pre_mobile = $this->Unescape($row['pre_mobile']);
			$this->pre_resno = $this->Unescape($row['pre_resno']);
			$this->pre_resno1 = $this->Unescape($row['pre_resno1']);
			$this->pre_image = $this->Unescape($row['pre_image']);
			$this->test1 = $this->Unescape($row['test1']);
			$this->test2 = $this->Unescape($row['test2']);
			$this->test3 = $this->Unescape($row['test3']);
			$this->pre_pincode1 = $this->Unescape($row['pre_pincode1']);
			$this->pre_pincode = $this->Unescape($row['pre_pincode']);
			$this->pre_emailid = $this->Unescape($row['pre_emailid']);
			$this->pre_fromdate = $row['pre_fromdate'];
			$this->pre_todate = $row['pre_todate'];
			$this->status = $row['status'];
			$this->pre_status = $row['pre_status'];
			$this->es_user_theme = $this->Unescape($row['es_user_theme']);
			$this->pre_hobbies = $this->Unescape($row['pre_hobbies']);
			$this->pre_blood_group = $this->Unescape($row['pre_blood_group']);
			$this->pre_gender = $row['pre_gender'];
			$this->admission_status = $row['admission_status'];
			$this->es_program = $row['es_program'];
			$this->es_branch = $row['es_branch'];
			$this->es_admitted = $row['es_admitted'];
			$this->es_rcat = $row['es_rcat'];
			$this->es_phandcaped = $row['es_phandcaped'];
			$this->es_econbackward = $row['es_econbackward'];
			$this->es_home = $row['es_home'];
			$this->pre_hobbies1 = $row['pre_hobbies1'];
			$this->pre_hobbies2 = $row['pre_hobbies2'];
			$this->pre_building = $row['pre_building'];
			$this->pre_room = $row['pre_room'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_preadmissionList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_preadmission` ";
		$es_preadmissionList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$this->pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
					{
						$this->pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						if ($GLOBALS['configuration']['db_encoding'] == 1)
						{
							$value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(".$fcv_array[$i][2].")" : "'".$fcv_array[$i][2]."'";
							$this->pog_query .= "BASE64_DECODE(`".$fcv_array[$i][0]."`) ".$fcv_array[$i][1]." ".$value;
						}
						else
						{
							$value =  POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$this->Escape($fcv_array[$i][2])."'";
							$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
						}
					}
					else
					{
						$value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$fcv_array[$i][2]."'";
						$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
					}
				}
			}
		}
		if ($sortBy != '')
		{
			if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET')
			{
				if ($GLOBALS['configuration']['db_encoding'] == 1)
				{
					$sortBy = "BASE64_DECODE($sortBy) ";
				}
				else
				{
					$sortBy = "$sortBy ";
				}
			}
			else
			{
				$sortBy = "$sortBy ";
			}
		}
		else
		{
			$sortBy = "es_preadmissionid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_preadmission = new $thisObjectName();
			$es_preadmission->pre_serialno = $this->Unescape($row['pre_serialno']);
			$pre_number->pre_serialno = $this->Unescape($row['pre_number']);
			$es_preadmission->es_preadmissionId = $row['es_preadmissionid'];
			$es_preadmission->pre_serialno = $this->Unescape($row['pre_serialno']);
			$es_preadmission->pre_student_username = $this->Unescape($row['pre_student_username']);
			$es_preadmission->pre_student_password = $this->Unescape($row['pre_student_password']);
			$es_preadmission->pre_dateofbirth = $row['pre_dateofbirth'];
			$es_preadmission->pre_fathername = $this->Unescape($row['pre_fathername']);
			$es_preadmission->pre_mothername = $this->Unescape($row['pre_mothername']);
			$es_preadmission->pre_fathersoccupation = $this->Unescape($row['pre_fathersoccupation']);
			$es_preadmission->pre_motheroccupation = $this->Unescape($row['pre_motheroccupation']);
			$es_preadmission->pre_contactname1 = $this->Unescape($row['pre_contactname1']);
			$es_preadmission->pre_contactno1 = $this->Unescape($row['pre_contactno1']);
			$es_preadmission->pre_contactno2 = $this->Unescape($row['pre_contactno2']);
			$es_preadmission->pre_contactname2 = $this->Unescape($row['pre_contactname2']);
			$es_preadmission->pre_address1 = $this->Unescape($row['pre_address1']);
			$es_preadmission->pre_city1 = $this->Unescape($row['pre_city1']);
			$es_preadmission->pre_state1 = $this->Unescape($row['pre_state1']);
			$es_preadmission->pre_country1 = $this->Unescape($row['pre_country1']);
			$es_preadmission->pre_phno1 = $this->Unescape($row['pre_phno1']);
			$es_preadmission->pre_mobile1 = $this->Unescape($row['pre_mobile1']);
			$es_preadmission->pre_prev_acadamicname = $this->Unescape($row['pre_prev_acadamicname']);
			$es_preadmission->pre_prev_class = $this->Unescape($row['pre_prev_class']);
			$es_preadmission->pre_prev_university = $this->Unescape($row['pre_prev_university']);
			$es_preadmission->pre_prev_percentage = $this->Unescape($row['pre_prev_percentage']);
			$es_preadmission->pre_prev_tcno = $this->Unescape($row['pre_prev_tcno']);
			$es_preadmission->pre_current_acadamicname = $this->Unescape($row['pre_current_acadamicname']);
			$es_preadmission->pre_current_class1 = $this->Unescape($row['pre_current_class1']);
			$es_preadmission->pre_current_percentage1 = $this->Unescape($row['pre_current_percentage1']);
			$es_preadmission->pre_current_result1 = $this->Unescape($row['pre_current_result1']);
			$es_preadmission->pre_current_class2 = $this->Unescape($row['pre_current_class2']);
			$es_preadmission->pre_current_percentage2 = $this->Unescape($row['pre_current_percentage2']);
			$es_preadmission->pre_current_result2 = $this->Unescape($row['pre_current_result2']);
			$es_preadmission->pre_current_class3 = $this->Unescape($row['pre_current_class3']);
			$es_preadmission->pre_current_percentage3 = $this->Unescape($row['pre_current_percentage3']);
			$es_preadmission->pre_current_result3 = $this->Unescape($row['pre_current_result3']);
			$es_preadmission->pre_physical_details = $this->Unescape($row['pre_physical_details']);
			$es_preadmission->pre_height = $this->Unescape($row['pre_height']);
			$es_preadmission->pre_weight = $this->Unescape($row['pre_weight']);
			$es_preadmission->pre_alerge = $this->Unescape($row['pre_alerge']);
			$es_preadmission->pre_physical_status = $this->Unescape($row['pre_physical_status']);
			$es_preadmission->pre_special_care = $this->Unescape($row['pre_special_care']);
			$es_preadmission->pre_class = $this->Unescape($row['pre_class']);
			$es_preadmission->pre_sec = $this->Unescape($row['pre_sec']);
			$es_preadmission->pre_name = $this->Unescape($row['pre_name']);
			$es_preadmission->pre_age = $this->Unescape($row['pre_age']);
			$es_preadmission->pre_address = $this->Unescape($row['pre_address']);
			$es_preadmission->pre_city = $this->Unescape($row['pre_city']);
			$es_preadmission->pre_state = $this->Unescape($row['pre_state']);
			$es_preadmission->pre_country = $this->Unescape($row['pre_country']);
			$es_preadmission->pre_phno = $this->Unescape($row['pre_phno']);
			$es_preadmission->pre_mobile = $this->Unescape($row['pre_mobile']);
			$es_preadmission->pre_resno = $this->Unescape($row['pre_resno']);
			$es_preadmission->pre_resno1 = $this->Unescape($row['pre_resno1']);
			$es_preadmission->pre_image = $this->Unescape($row['pre_image']);
			$es_preadmission->test1 = $this->Unescape($row['test1']);
			$es_preadmission->test2 = $this->Unescape($row['test2']);
			$es_preadmission->test3 = $this->Unescape($row['test3']);
			$es_preadmission->pre_pincode1 = $this->Unescape($row['pre_pincode1']);
			$es_preadmission->pre_pincode = $this->Unescape($row['pre_pincode']);
			$es_preadmission->pre_emailid = $this->Unescape($row['pre_emailid']);
			$es_preadmission->pre_fromdate = $row['pre_fromdate'];
			$es_preadmission->pre_todate = $row['pre_todate'];
			$es_preadmission->status = $row['status'];
			$es_preadmission->pre_status = $row['pre_status'];
			$es_preadmission->es_user_theme = $this->Unescape($row['es_user_theme']);
			$es_preadmission->pre_hobbies = $this->Unescape($row['pre_hobbies']);
			$es_preadmission->pre_blood_group = $this->Unescape($row['pre_blood_group']);
			$es_preadmission->pre_gender = $row['pre_gender'];
			$es_preadmission->admission_status = $row['admission_status'];
			$es_preadmission->es_program = $this->unescape($row['es_program']);
			$es_preadmission->es_branch = $this->unescape($row['es_branch']);
			$es_preadmission->es_admitted = $this->unescape($row['es_admitted']);
			$es_preadmission->es_rcat = $this->unescape($row['es_rcat']);
			$es_preadmission->es_phandcaped = $this->unescape($row['es_phandcaped']);
			$es_preadmission->es_econbackward = $this->unescape($row['es_econbackward']);
			$es_preadmission->es_home = $this->unescape($row['es_home']);
			$es_preadmission->pre_hobbies1 = $this->unescape($row['pre_hobbies1']);
			$es_preadmission->pre_hobbies2 = $this->unescape($row['pre_hobbies2']);
			$es_preadmission->pre_building = $this->unescape($row['pre_building']);
			$es_preadmission->pre_room = $this->unescape($row['pre_room']);
			$es_preadmissionList[] = $es_preadmission;
		}
		return $es_preadmissionList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_preadmissionId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_preadmissionid` from `es_preadmission` where `es_preadmissionid`='".$this->es_preadmissionId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_preadmission` set 
			
			`pre_serialno`='".$this->Escape($this->pre_serialno)."', 
			`pre_number`='".$this->Escape($this->pre_number)."', 
			`pre_student_username`='".$this->Escape($this->pre_student_username)."', 
			`pre_student_password`='".$this->Escape($this->pre_student_password)."', 
			`pre_dateofbirth`='".$this->pre_dateofbirth."', 
			`pre_fathername`='".$this->Escape($this->pre_fathername)."', 
			`pre_mothername`='".$this->Escape($this->pre_mothername)."', 
			`pre_fathersoccupation`='".$this->Escape($this->pre_fathersoccupation)."', 
			`pre_motheroccupation`='".$this->Escape($this->pre_motheroccupation)."', 
			`pre_contactname1`='".$this->Escape($this->pre_contactname1)."', 
			`pre_contactno1`='".$this->Escape($this->pre_contactno1)."', 
			`pre_contactno2`='".$this->Escape($this->pre_contactno2)."', 
			`pre_contactname2`='".$this->Escape($this->pre_contactname2)."', 
			`pre_address1`='".$this->Escape($this->pre_address1)."', 
			`pre_city1`='".$this->Escape($this->pre_city1)."', 
			`pre_state1`='".$this->Escape($this->pre_state1)."', 
			`pre_country1`='".$this->Escape($this->pre_country1)."', 
			`pre_phno1`='".$this->Escape($this->pre_phno1)."', 
			`pre_mobile1`='".$this->Escape($this->pre_mobile1)."', 
			`pre_prev_acadamicname`='".$this->Escape($this->pre_prev_acadamicname)."', 
			`pre_prev_class`='".$this->Escape($this->pre_prev_class)."', 
			`pre_prev_university`='".$this->Escape($this->pre_prev_university)."', 
			`pre_prev_percentage`='".$this->Escape($this->pre_prev_percentage)."', 
			`pre_prev_tcno`='".$this->Escape($this->pre_prev_tcno)."', 
			`pre_current_acadamicname`='".$this->Escape($this->pre_current_acadamicname)."', 
			`pre_current_class1`='".$this->Escape($this->pre_current_class1)."', 
			`pre_current_percentage1`='".$this->Escape($this->pre_current_percentage1)."', 
			`pre_current_result1`='".$this->Escape($this->pre_current_result1)."', 
			`pre_current_class2`='".$this->Escape($this->pre_current_class2)."', 
			`pre_current_percentage2`='".$this->Escape($this->pre_current_percentage2)."', 
			`pre_current_result2`='".$this->Escape($this->pre_current_result2)."', 
			`pre_current_class3`='".$this->Escape($this->pre_current_class3)."', 
			`pre_current_percentage3`='".$this->Escape($this->pre_current_percentage3)."', 
			`pre_current_result3`='".$this->Escape($this->pre_current_result3)."', 
			`pre_physical_details`='".$this->Escape($this->pre_physical_details)."', 
			`pre_height`='".$this->Escape($this->pre_height)."', 
			`pre_weight`='".$this->Escape($this->pre_weight)."', 
			`pre_alerge`='".$this->Escape($this->pre_alerge)."', 
			`pre_physical_status`='".$this->Escape($this->pre_physical_status)."', 
			`pre_special_care`='".$this->Escape($this->pre_special_care)."', 
			`pre_class`='".$this->Escape($this->pre_class)."', 
			`pre_sec`='".$this->Escape($this->pre_sec)."', 
			`pre_name`='".$this->Escape($this->pre_name)."', 
			`pre_age`='".$this->Escape($this->pre_age)."', 
			`pre_address`='".$this->Escape($this->pre_address)."', 
			`pre_city`='".$this->Escape($this->pre_city)."', 
			`pre_state`='".$this->Escape($this->pre_state)."', 
			`pre_country`='".$this->Escape($this->pre_country)."', 
			`pre_phno`='".$this->Escape($this->pre_phno)."', 
			`pre_mobile`='".$this->Escape($this->pre_mobile)."', 
			`pre_resno`='".$this->Escape($this->pre_resno)."', 
			`pre_resno1`='".$this->Escape($this->pre_resno1)."', 
			`pre_image`='".$this->Escape($this->pre_image)."', 
			`test1`='".$this->Escape($this->test1)."', 
			`test2`='".$this->Escape($this->test2)."', 
			`test3`='".$this->Escape($this->test3)."', 
			`pre_pincode1`='".$this->Escape($this->pre_pincode1)."', 
			`pre_pincode`='".$this->Escape($this->pre_pincode)."', 
			`pre_emailid`='".$this->Escape($this->pre_emailid)."', 
			`pre_fromdate`='".$this->pre_fromdate."', 
			`pre_todate`='".$this->pre_todate."', 
			`status`='".$this->status."', 
			`pre_status`='".$this->pre_status."', 
			`es_user_theme`='".$this->Escape($this->es_user_theme)."', 
			`pre_hobbies`='".$this->Escape($this->pre_hobbies)."', 
			`pre_blood_group`='".$this->Escape($this->pre_blood_group)."', 
			`pre_gender`='".$this->pre_gender."', 
			`admission_status`='".$this->admission_status."',
			`es_program`='".$this->Escape($this->es_program)."',
			`es_branch`='".$this->Escape($this->es_branch)."',
			`es_admitted`='".$this->Escape($this->es_admitted)."',
			`es_rcat`='".$this->Escape($this->es_rcat)."',
			`es_phandcaped`='".$this->Escape($this->es_phandcaped)."',
			`es_econbackward`='".$this->Escape($this->es_econbackward)."',
			`es_home`='".$this->Escape($this->es_home)."',
			`pre_hobbies1`='".$this->Escape($this->pre_hobbies1)."',
			`pre_hobbies2`='".$this->Escape($this->pre_hobbies2)."',
			`pre_building`='".$this->Escape($this->pre_building)."',
			`pre_room`='".$this->Escape($this->pre_room)."',
			 where `es_preadmissionid`='".$this->es_preadmissionId."'";
		}
		else
		
		{
			echo $this->pog_query = "insert into `es_preadmission` (`pre_serialno`, `pre_number`, `pre_student_username`, `pre_student_password`, `pre_dateofbirth`, `pre_fathername`, `pre_mothername`, `pre_fathersoccupation`, `pre_motheroccupation`, `pre_contactname1`, `pre_contactno1`, `pre_contactno2`, `pre_contactname2`, `pre_address1`, `pre_city1`, `pre_state1`, `pre_country1`, `pre_phno1`, `pre_mobile1`, `pre_prev_acadamicname`, `pre_prev_class`, `pre_prev_university`, `pre_prev_percentage`, `pre_prev_tcno`, `pre_current_acadamicname`, `pre_current_class1`, `pre_current_percentage1`, `pre_current_result1`, `pre_current_class2`, `pre_current_percentage2`, `pre_current_result2`, `pre_current_class3`, `pre_current_percentage3`, `pre_current_result3`, `pre_physical_details`, `pre_height`, `pre_weight`, `pre_alerge`, `pre_physical_status`, `pre_special_care`, `pre_class`, `pre_sec`, `pre_name`, `pre_age`, `pre_address`, `pre_city`, `pre_state`, `pre_country`, `pre_phno`, `pre_mobile`, `pre_resno`, `pre_resno1`, `pre_image`, `test1`, `test2`, `test3`, `pre_pincode1`, `pre_pincode`, `pre_emailid`, `pre_fromdate`, `pre_todate`, `status`, `pre_status`, `es_user_theme`, `pre_hobbies`, `pre_blood_group`, `pre_gender`, `admission_status`, `es_program`, `es_branch` , `es_admitted` ,`es_rcat`, `es_phandcaped`, `es_econbackward` , `es_home` ,`pre_hobbies1`,`pre_hobbies2`,`pre_building`,`pre_room`) values (
			 
			'".$this->Escape($this->pre_serialno)."', 
			'".$this->Escape($this->pre_number)."',
			'".$this->Escape($this->pre_student_username)."', 
			'".$this->Escape($this->pre_student_password)."', 
			'".$this->pre_dateofbirth."', 
			'".$this->Escape($this->pre_fathername)."', 
			'".$this->Escape($this->pre_mothername)."', 
			'".$this->Escape($this->pre_fathersoccupation)."', 
			'".$this->Escape($this->pre_motheroccupation)."', 
			'".$this->Escape($this->pre_contactname1)."', 
			'".$this->Escape($this->pre_contactno1)."', 
			'".$this->Escape($this->pre_contactno2)."', 
			'".$this->Escape($this->pre_contactname2)."', 
			'".$this->Escape($this->pre_address1)."', 
			'".$this->Escape($this->pre_city1)."', 
			'".$this->Escape($this->pre_state1)."', 
			'".$this->Escape($this->pre_country1)."', 
			'".$this->Escape($this->pre_phno1)."', 
			'".$this->Escape($this->pre_mobile1)."', 
			'".$this->Escape($this->pre_prev_acadamicname)."', 
			'".$this->Escape($this->pre_prev_class)."', 
			'".$this->Escape($this->pre_prev_university)."', 
			'".$this->Escape($this->pre_prev_percentage)."', 
			'".$this->Escape($this->pre_prev_tcno)."', 
			'".$this->Escape($this->pre_current_acadamicname)."', 
			'".$this->Escape($this->pre_current_class1)."', 
			'".$this->Escape($this->pre_current_percentage1)."', 
			'".$this->Escape($this->pre_current_result1)."', 
			'".$this->Escape($this->pre_current_class2)."', 
			'".$this->Escape($this->pre_current_percentage2)."', 
			'".$this->Escape($this->pre_current_result2)."', 
			'".$this->Escape($this->pre_current_class3)."', 
			'".$this->Escape($this->pre_current_percentage3)."', 
			'".$this->Escape($this->pre_current_result3)."', 
			'".$this->Escape($this->pre_physical_details)."', 
			'".$this->Escape($this->pre_height)."', 
			'".$this->Escape($this->pre_weight)."', 
			'".$this->Escape($this->pre_alerge)."', 
			'".$this->Escape($this->pre_physical_status)."', 
			'".$this->Escape($this->pre_special_care)."', 
			'".$this->Escape($this->pre_class)."', 
			'".$this->Escape($this->pre_sec)."', 
			'".$this->Escape($this->pre_name)."', 
			'".$this->Escape($this->pre_age)."', 
			'".$this->Escape($this->pre_address)."', 
			'".$this->Escape($this->pre_city)."', 
			'".$this->Escape($this->pre_state)."', 
			'".$this->Escape($this->pre_country)."', 
			'".$this->Escape($this->pre_phno)."', 
			'".$this->Escape($this->pre_mobile)."', 
			'".$this->Escape($this->pre_resno)."', 
			'".$this->Escape($this->pre_resno1)."', 
			'".$this->Escape($this->pre_image)."', 
			'".$this->Escape($this->test1)."', 
			'".$this->Escape($this->test2)."', 
			'".$this->Escape($this->test3)."', 
			'".$this->Escape($this->pre_pincode1)."', 
			'".$this->Escape($this->pre_pincode)."', 
			'".$this->Escape($this->pre_emailid)."', 
			'".$this->pre_fromdate."', 
			'".$this->pre_todate."', 
			'".$this->status."', 
			'".$this->pre_status."', 
			'".$this->Escape($this->es_user_theme)."', 
			'".$this->Escape($this->pre_hobbies)."', 
			'".$this->Escape($this->pre_blood_group)."', 
			'".$this->pre_gender."', 
			'".$this->admission_status."',
			'".$this->Escape($this->es_program)."',
			'".$this->Escape($this->es_branch)."',
			'".$this->Escape($this->es_admitted)."',
			'".$this->Escape($this->es_rcat)."',
			'".$this->Escape($this->es_phandcaped)."',
			'".$this->Escape($this->es_econbackward)."',
			'".$this->Escape($this->es_home)."',
			'".$this->Escape($this->pre_hobbies1)."',
			'".$this->Escape($this->pre_hobbies2)."',
		   '".$this->Escape($this->pre_building)."',
			'".$this->Escape($this->pre_room)."'";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_preadmissionId == "")
		{
			$this->es_preadmissionId = $insertId;
		}
		return $this->es_preadmissionId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_preadmissionId
	*/
	function SaveNew()
	{
		$this->es_preadmissionId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_preadmission` where `es_preadmissionid`='".$this->es_preadmissionId."'";
		return Database::NonQuery($this->pog_query, $connection);
	}
	
	
	/**
	* Deletes a list of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param bool $deep 
	* @return 
	*/
	function DeleteList($fcv_array)
	{
		if (sizeof($fcv_array) > 0)
		{
			$connection = Database::Connect();
			$pog_query = "delete from `es_preadmission` where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) !== 1)
					{
						$pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$this->Escape($fcv_array[$i][2])."'";
					}
					else
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$fcv_array[$i][2]."'";
					}
				}
			}
			return Database::NonQuery($pog_query, $connection);
		}
	}
}
?>