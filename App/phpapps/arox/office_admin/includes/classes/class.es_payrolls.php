<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_payrolls` (
	`es_payrollsid` int(11) NOT NULL auto_increment,
	`registration_no` VARCHAR(255) NOT NULL,
	`employee_name` VARCHAR(255) NOT NULL,
	`gender` enume('male','female') NOT NULL,
	`dob` DATE NOT NULL,
	`designation` VARCHAR(255) NOT NULL,
	`primary_subject` VARCHAR(255) NOT NULL,
	`secondary_subject` VARCHAR(255) NOT NULL,
	`guardian_name` VARCHAR(255) NOT NULL,
	`daughters` INT NOT NULL,
	`sons` INT NOT NULL,
	`present_address` TEXT NOT NULL,
	`city` VARCHAR(255) NOT NULL,
	`state` VARCHAR(255) NOT NULL,
	`country` VARCHAR(255) NOT NULL,
	`zip` VARCHAR(255) NOT NULL,
	`phone_num` VARCHAR(255) NOT NULL,
	`mobile_num` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`permanent_address` TEXT NOT NULL,
	`city` VARCHAR(255) NOT NULL,
	`state` VARCHAR(255) NOT NULL,
	`country` VARCHAR(255) NOT NULL,
	`previousemployer` VARCHAR(255) NOT NULL,
	`institution_name` VARCHAR(255) NOT NULL,
	`duration` VARCHAR(255) NOT NULL,
	`designation` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_payrollsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_payrolls</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_payrolls&attributeList=array+%28%0A++0+%3D%3E+%27registration_no%27%2C%0A++1+%3D%3E+%27employee_name%27%2C%0A++2+%3D%3E+%27gender%27%2C%0A++3+%3D%3E+%27dob%27%2C%0A++4+%3D%3E+%27designation%27%2C%0A++5+%3D%3E+%27primary_subject%27%2C%0A++6+%3D%3E+%27secondary_subject%27%2C%0A++7+%3D%3E+%27guardian_name%27%2C%0A++8+%3D%3E+%27daughters%27%2C%0A++9+%3D%3E+%27sons%27%2C%0A++10+%3D%3E+%27present_address%27%2C%0A++11+%3D%3E+%27city%27%2C%0A++12+%3D%3E+%27state%27%2C%0A++13+%3D%3E+%27country%27%2C%0A++14+%3D%3E+%27zip%27%2C%0A++15+%3D%3E+%27phone_num%27%2C%0A++16+%3D%3E+%27mobile_num%27%2C%0A++17+%3D%3E+%27email%27%2C%0A++18+%3D%3E+%27permanent_address%27%2C%0A++19+%3D%3E+%27city%27%2C%0A++20+%3D%3E+%27state%27%2C%0A++21+%3D%3E+%27country%27%2C%0A++22+%3D%3E+%27previousemployer%27%2C%0A++23+%3D%3E+%27institution_name%27%2C%0A++24+%3D%3E+%27duration%27%2C%0A++25+%3D%3E+%27designation%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27enume%28%5C%5C%5C%27male%5C%5C%5C%27%2C%5C%5C%5C%27female%5C%5C%5C%27%29%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27INT%27%2C%0A++10+%3D%3E+%27TEXT%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++15+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++16+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++17+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++18+%3D%3E+%27TEXT%27%2C%0A++19+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++20+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++21+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++22+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++23+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++24+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++25+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_payrolls extends POG_Base
{
	public $es_payrollsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $registration_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $employee_name;
	
	/**
	 * @var enume('male','female')
	 */
	public $gender;
	
	/**
	 * @var DATE
	 */
	public $dob;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $designation;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $primary_subject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $secondary_subject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $guardian_name;
	
	/**
	 * @var INT
	 */
	public $daughters;
	
	/**
	 * @var INT
	 */
	public $sons;
	
	/**
	 * @var TEXT
	 */
	public $present_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $zip;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $phone_num;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $mobile_num;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $email;
	
	/**
	 * @var TEXT
	 */
	public $permanent_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $previousemployer;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $institution_name;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $duration;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $designation;
	
	public $pog_attribute_type = array(
		"es_payrollsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"registration_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"employee_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"gender" => array('db_attributes' => array("TEXT", "ENUME", "'male','female'")),
		"dob" => array('db_attributes' => array("NUMERIC", "DATE")),
		"designation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"primary_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"secondary_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"guardian_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"daughters" => array('db_attributes' => array("NUMERIC", "INT")),
		"sons" => array('db_attributes' => array("NUMERIC", "INT")),
		"present_address" => array('db_attributes' => array("TEXT", "TEXT")),
		"city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"zip" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"phone_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"mobile_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"permanent_address" => array('db_attributes' => array("TEXT", "TEXT")),
		"city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"previousemployer" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"institution_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"duration" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"designation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_payrolls($registration_no='', $employee_name='', $gender='', $dob='', $designation='', $primary_subject='', $secondary_subject='', $guardian_name='', $daughters='', $sons='', $present_address='', $city='', $state='', $country='', $zip='', $phone_num='', $mobile_num='', $email='', $permanent_address='', $city='', $state='', $country='', $previousemployer='', $institution_name='', $duration='', $designation='')
	{
		$this->registration_no = $registration_no;
		$this->employee_name = $employee_name;
		$this->gender = $gender;
		$this->dob = $dob;
		$this->designation = $designation;
		$this->primary_subject = $primary_subject;
		$this->secondary_subject = $secondary_subject;
		$this->guardian_name = $guardian_name;
		$this->daughters = $daughters;
		$this->sons = $sons;
		$this->present_address = $present_address;
		$this->city = $city;
		$this->state = $state;
		$this->country = $country;
		$this->zip = $zip;
		$this->phone_num = $phone_num;
		$this->mobile_num = $mobile_num;
		$this->email = $email;
		$this->permanent_address = $permanent_address;
		$this->city = $city;
		$this->state = $state;
		$this->country = $country;
		$this->previousemployer = $previousemployer;
		$this->institution_name = $institution_name;
		$this->duration = $duration;
		$this->designation = $designation;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_payrollsId 
	* @return object $es_payrolls
	*/
	function Get($es_payrollsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_payrolls` where `es_payrollsid`='".intval($es_payrollsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_payrollsId = $row['es_payrollsid'];
			$this->registration_no = $this->Unescape($row['registration_no']);
			$this->employee_name = $this->Unescape($row['employee_name']);
			$this->gender = $row['gender'];
			$this->dob = $row['dob'];
			$this->designation = $this->Unescape($row['designation']);
			$this->primary_subject = $this->Unescape($row['primary_subject']);
			$this->secondary_subject = $this->Unescape($row['secondary_subject']);
			$this->guardian_name = $this->Unescape($row['guardian_name']);
			$this->daughters = $this->Unescape($row['daughters']);
			$this->sons = $this->Unescape($row['sons']);
			$this->present_address = $this->Unescape($row['present_address']);
			$this->city = $this->Unescape($row['city']);
			$this->state = $this->Unescape($row['state']);
			$this->country = $this->Unescape($row['country']);
			$this->zip = $this->Unescape($row['zip']);
			$this->phone_num = $this->Unescape($row['phone_num']);
			$this->mobile_num = $this->Unescape($row['mobile_num']);
			$this->email = $this->Unescape($row['email']);
			$this->permanent_address = $this->Unescape($row['permanent_address']);
			$this->city = $this->Unescape($row['city']);
			$this->state = $this->Unescape($row['state']);
			$this->country = $this->Unescape($row['country']);
			$this->previousemployer = $this->Unescape($row['previousemployer']);
			$this->institution_name = $this->Unescape($row['institution_name']);
			$this->duration = $this->Unescape($row['duration']);
			$this->designation = $this->Unescape($row['designation']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_payrollsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_payrolls` ";
		$es_payrollsList = Array();
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
			$sortBy = "es_payrollsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_payrolls = new $thisObjectName();
			$es_payrolls->es_payrollsId = $row['es_payrollsid'];
			$es_payrolls->registration_no = $this->Unescape($row['registration_no']);
			$es_payrolls->employee_name = $this->Unescape($row['employee_name']);
			$es_payrolls->gender = $row['gender'];
			$es_payrolls->dob = $row['dob'];
			$es_payrolls->designation = $this->Unescape($row['designation']);
			$es_payrolls->primary_subject = $this->Unescape($row['primary_subject']);
			$es_payrolls->secondary_subject = $this->Unescape($row['secondary_subject']);
			$es_payrolls->guardian_name = $this->Unescape($row['guardian_name']);
			$es_payrolls->daughters = $this->Unescape($row['daughters']);
			$es_payrolls->sons = $this->Unescape($row['sons']);
			$es_payrolls->present_address = $this->Unescape($row['present_address']);
			$es_payrolls->city = $this->Unescape($row['city']);
			$es_payrolls->state = $this->Unescape($row['state']);
			$es_payrolls->country = $this->Unescape($row['country']);
			$es_payrolls->zip = $this->Unescape($row['zip']);
			$es_payrolls->phone_num = $this->Unescape($row['phone_num']);
			$es_payrolls->mobile_num = $this->Unescape($row['mobile_num']);
			$es_payrolls->email = $this->Unescape($row['email']);
			$es_payrolls->permanent_address = $this->Unescape($row['permanent_address']);
			$es_payrolls->city = $this->Unescape($row['city']);
			$es_payrolls->state = $this->Unescape($row['state']);
			$es_payrolls->country = $this->Unescape($row['country']);
			$es_payrolls->previousemployer = $this->Unescape($row['previousemployer']);
			$es_payrolls->institution_name = $this->Unescape($row['institution_name']);
			$es_payrolls->duration = $this->Unescape($row['duration']);
			$es_payrolls->designation = $this->Unescape($row['designation']);
			$es_payrollsList[] = $es_payrolls;
		}
		return $es_payrollsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_payrollsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_payrollsid` from `es_payrolls` where `es_payrollsid`='".$this->es_payrollsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_payrolls` set 
			`registration_no`='".$this->Escape($this->registration_no)."', 
			`employee_name`='".$this->Escape($this->employee_name)."', 
			`gender`='".$this->gender."', 
			`dob`='".$this->dob."', 
			`designation`='".$this->Escape($this->designation)."', 
			`primary_subject`='".$this->Escape($this->primary_subject)."', 
			`secondary_subject`='".$this->Escape($this->secondary_subject)."', 
			`guardian_name`='".$this->Escape($this->guardian_name)."', 
			`daughters`='".$this->Escape($this->daughters)."', 
			`sons`='".$this->Escape($this->sons)."', 
			`present_address`='".$this->Escape($this->present_address)."', 
			`city`='".$this->Escape($this->city)."', 
			`state`='".$this->Escape($this->state)."', 
			`country`='".$this->Escape($this->country)."', 
			`zip`='".$this->Escape($this->zip)."', 
			`phone_num`='".$this->Escape($this->phone_num)."', 
			`mobile_num`='".$this->Escape($this->mobile_num)."', 
			`email`='".$this->Escape($this->email)."', 
			`permanent_address`='".$this->Escape($this->permanent_address)."', 
			`city`='".$this->Escape($this->city)."', 
			`state`='".$this->Escape($this->state)."', 
			`country`='".$this->Escape($this->country)."', 
			`previousemployer`='".$this->Escape($this->previousemployer)."', 
			`institution_name`='".$this->Escape($this->institution_name)."', 
			`duration`='".$this->Escape($this->duration)."', 
			`designation`='".$this->Escape($this->designation)."' where `es_payrollsid`='".$this->es_payrollsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_payrolls` (`registration_no`, `employee_name`, `gender`, `dob`, `designation`, `primary_subject`, `secondary_subject`, `guardian_name`, `daughters`, `sons`, `present_address`, `city`, `state`, `country`, `zip`, `phone_num`, `mobile_num`, `email`, `permanent_address`, `city`, `state`, `country`, `previousemployer`, `institution_name`, `duration`, `designation` ) values (
			'".$this->Escape($this->registration_no)."', 
			'".$this->Escape($this->employee_name)."', 
			'".$this->gender."', 
			'".$this->dob."', 
			'".$this->Escape($this->designation)."', 
			'".$this->Escape($this->primary_subject)."', 
			'".$this->Escape($this->secondary_subject)."', 
			'".$this->Escape($this->guardian_name)."', 
			'".$this->Escape($this->daughters)."', 
			'".$this->Escape($this->sons)."', 
			'".$this->Escape($this->present_address)."', 
			'".$this->Escape($this->city)."', 
			'".$this->Escape($this->state)."', 
			'".$this->Escape($this->country)."', 
			'".$this->Escape($this->zip)."', 
			'".$this->Escape($this->phone_num)."', 
			'".$this->Escape($this->mobile_num)."', 
			'".$this->Escape($this->email)."', 
			'".$this->Escape($this->permanent_address)."', 
			'".$this->Escape($this->city)."', 
			'".$this->Escape($this->state)."', 
			'".$this->Escape($this->country)."', 
			'".$this->Escape($this->previousemployer)."', 
			'".$this->Escape($this->institution_name)."', 
			'".$this->Escape($this->duration)."', 
			'".$this->Escape($this->designation)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_payrollsId == "")
		{
			$this->es_payrollsId = $insertId;
		}
		return $this->es_payrollsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_payrollsId
	*/
	function SaveNew()
	{
		$this->es_payrollsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_payrolls` where `es_payrollsid`='".$this->es_payrollsId."'";
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
			$pog_query = "delete from `es_payrolls` where ";
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