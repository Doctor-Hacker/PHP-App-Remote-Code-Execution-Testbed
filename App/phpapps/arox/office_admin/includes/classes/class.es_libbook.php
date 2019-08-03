<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_libbook` (
	`es_libbookid` int(11) NOT NULL auto_increment,
	`lbook_dateofpurchase` DATE NOT NULL,
	`lbook_aceesnofrom` INT NOT NULL,
	`lbook_accessnoto` INT NOT NULL,
	`lbook_bookfromno` INT NOT NULL,
	`lbook_booktono` INT NOT NULL,
	`lbook_author` VARCHAR(255) NOT NULL,
	`lbook_title` VARCHAR(255) NOT NULL,
	`lbook_publishername` VARCHAR(255) NOT NULL,
	`lbook_publisherplace` VARCHAR(255) NOT NULL,
	`lbook_booksubject` VARCHAR(255) NOT NULL,
	`lbook_bookedition` VARCHAR(255) NOT NULL,
	`lbook_year` VARCHAR(255) NOT NULL,
	`lbook_cost` VARCHAR(255) NOT NULL,
	`lbook_sourse` VARCHAR(255) NOT NULL,
	`lbook_aditinalbookinfo` VARCHAR(255) NOT NULL,
	`lbook_bookstatus` VARCHAR(255) NOT NULL,
	`lbook_category` VARCHAR(255) NOT NULL,
	`lbook_class` VARCHAR(255) NOT NULL,
	`lbook_booksubcategory` VARCHAR(255) NOT NULL,
	`lbook_ref` VARCHAR(255) NOT NULL,
	`lbook_statusstatus` VARCHAR(255) NOT NULL,
	`lbook_pages` VARCHAR(255) NOT NULL,
	`lbook_volume` VARCHAR(255) NOT NULL,
	`lbook_bilnumber` VARCHAR(255) NOT NULL,
	`status` enum('active','inactive') NOT NULL,
	`issuestatus` enum('issued','notissued') NOT NULL, PRIMARY KEY  (`es_libbookid`)) ENGINE=MyISAM;
*/

/**
* <b>es_libbook</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_libbook&attributeList=array+%28%0A++0+%3D%3E+%27lbook_dateofpurchase%27%2C%0A++1+%3D%3E+%27lbook_aceesnofrom%27%2C%0A++2+%3D%3E+%27lbook_accessnoto%27%2C%0A++3+%3D%3E+%27lbook_bookfromno%27%2C%0A++4+%3D%3E+%27lbook_booktono%27%2C%0A++5+%3D%3E+%27lbook_author%27%2C%0A++6+%3D%3E+%27lbook_title%27%2C%0A++7+%3D%3E+%27lbook_publishername%27%2C%0A++8+%3D%3E+%27lbook_publisherplace%27%2C%0A++9+%3D%3E+%27lbook_booksubject%27%2C%0A++10+%3D%3E+%27lbook_bookedition%27%2C%0A++11+%3D%3E+%27lbook_year%27%2C%0A++12+%3D%3E+%27lbook_cost%27%2C%0A++13+%3D%3E+%27lbook_sourse%27%2C%0A++14+%3D%3E+%27lbook_aditinalbookinfo%27%2C%0A++15+%3D%3E+%27lbook_bookstatus%27%2C%0A++16+%3D%3E+%27lbook_category%27%2C%0A++17+%3D%3E+%27lbook_class%27%2C%0A++18+%3D%3E+%27lbook_booksubcategory%27%2C%0A++19+%3D%3E+%27lbook_ref%27%2C%0A++20+%3D%3E+%27lbook_statusstatus%27%2C%0A++21+%3D%3E+%27lbook_pages%27%2C%0A++22+%3D%3E+%27lbook_volume%27%2C%0A++23+%3D%3E+%27lbook_bilnumber%27%2C%0A++24+%3D%3E+%27status%27%2C%0A++25+%3D%3E+%27issuestatus%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27DATE%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++14+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++15+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++16+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++17+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++18+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++19+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++20+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++21+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++22+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++23+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++24+%3D%3E+%27enum%28%5C%27active%5C%27%2Cinactive%5C%27%29%27%2C%0A++25+%3D%3E+%27enum%28%5C%27issued%5C%27%2C%5C%27notissued%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_libbook extends POG_Base
{
	public $es_libbookId = '';

	/**
	 * @var DATE
	 */
	public $lbook_dateofpurchase;
	
	/**
	 * @var INT
	 */
	public $lbook_aceesnofrom;
	
	/**
	 * @var INT
	 */
	public $lbook_accessnoto;
	
	/**
	 * @var INT
	 */
	public $lbook_bookfromno;
	
	/**
	 * @var INT
	 */
	public $lbook_booktono;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_author;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_title;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_publishername;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_publisherplace;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_booksubject;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_bookedition;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_year;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_cost;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_sourse;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_aditinalbookinfo;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_bookstatus;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_category;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_booksubcategory;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_ref;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_statusstatus;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_pages;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_volume;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $lbook_bilnumber;
	
	/**
	 * @var enum('active',inactive')
	 */
	public $status;
	
	/**
	 * @var enum('issued','notissued')
	 */
	public $issuestatus;
	
	public $pog_attribute_type = array(
		"es_libbookId" => array('db_attributes' => array("NUMERIC", "INT")),
		"lbook_dateofpurchase" => array('db_attributes' => array("NUMERIC", "DATE")),
		"lbook_aceesnofrom" => array('db_attributes' => array("NUMERIC", "INT")),
		"lbook_accessnoto" => array('db_attributes' => array("NUMERIC", "INT")),
		"lbook_bookfromno" => array('db_attributes' => array("NUMERIC", "INT")),
		"lbook_booktono" => array('db_attributes' => array("NUMERIC", "INT")),
		"lbook_author" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_title" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_publishername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_publisherplace" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_booksubject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_bookedition" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_year" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_cost" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_sourse" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_aditinalbookinfo" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_bookstatus" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_category" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_booksubcategory" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_ref" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_statusstatus" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_pages" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_volume" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"lbook_bilnumber" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active',inactive'")),
		"issuestatus" => array('db_attributes' => array("SET", "ENUM", "'issued','notissued'")),
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
	
	function es_libbook($lbook_dateofpurchase='', $lbook_aceesnofrom='', $lbook_accessnoto='', $lbook_bookfromno='', $lbook_booktono='', $lbook_author='', $lbook_title='', $lbook_publishername='', $lbook_publisherplace='', $lbook_booksubject='', $lbook_bookedition='', $lbook_year='', $lbook_cost='', $lbook_sourse='', $lbook_aditinalbookinfo='', $lbook_bookstatus='', $lbook_category='', $lbook_class='', $lbook_booksubcategory='', $lbook_ref='', $lbook_statusstatus='', $lbook_pages='', $lbook_volume='', $lbook_bilnumber='', $status='', $issuestatus='')
	{
		$this->lbook_dateofpurchase = $lbook_dateofpurchase;
		$this->lbook_aceesnofrom = $lbook_aceesnofrom;
		$this->lbook_accessnoto = $lbook_accessnoto;
		$this->lbook_bookfromno = $lbook_bookfromno;
		$this->lbook_booktono = $lbook_booktono;
		$this->lbook_author = $lbook_author;
		$this->lbook_title = $lbook_title;
		$this->lbook_publishername = $lbook_publishername;
		$this->lbook_publisherplace = $lbook_publisherplace;
		$this->lbook_booksubject = $lbook_booksubject;
		$this->lbook_bookedition = $lbook_bookedition;
		$this->lbook_year = $lbook_year;
		$this->lbook_cost = $lbook_cost;
		$this->lbook_sourse = $lbook_sourse;
		$this->lbook_aditinalbookinfo = $lbook_aditinalbookinfo;
		$this->lbook_bookstatus = $lbook_bookstatus;
		$this->lbook_category = $lbook_category;
		$this->lbook_class = $lbook_class;
		$this->lbook_booksubcategory = $lbook_booksubcategory;
		$this->lbook_ref = $lbook_ref;
		$this->lbook_statusstatus = $lbook_statusstatus;
		$this->lbook_pages = $lbook_pages;
		$this->lbook_volume = $lbook_volume;
		$this->lbook_bilnumber = $lbook_bilnumber;
		$this->status = $status;
		$this->issuestatus = $issuestatus;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_libbookId 
	* @return object $es_libbook
	*/
	function Get($es_libbookId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libbook` where `es_libbookid`='".intval($es_libbookId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libbookId = $row['es_libbookid'];
			$this->lbook_dateofpurchase = $row['lbook_dateofpurchase'];
			$this->lbook_aceesnofrom = $this->Unescape($row['lbook_aceesnofrom']);
			$this->lbook_accessnoto = $this->Unescape($row['lbook_accessnoto']);
			$this->lbook_bookfromno = $this->Unescape($row['lbook_bookfromno']);
			$this->lbook_booktono = $this->Unescape($row['lbook_booktono']);
			$this->lbook_author = $this->Unescape($row['lbook_author']);
			$this->lbook_title = $this->Unescape($row['lbook_title']);
			$this->lbook_publishername = $this->Unescape($row['lbook_publishername']);
			$this->lbook_publisherplace = $this->Unescape($row['lbook_publisherplace']);
			$this->lbook_booksubject = $this->Unescape($row['lbook_booksubject']);
			$this->lbook_bookedition = $this->Unescape($row['lbook_bookedition']);
			$this->lbook_year = $this->Unescape($row['lbook_year']);
			$this->lbook_cost = $this->Unescape($row['lbook_cost']);
			$this->lbook_sourse = $this->Unescape($row['lbook_sourse']);
			$this->lbook_aditinalbookinfo = $this->Unescape($row['lbook_aditinalbookinfo']);
			$this->lbook_bookstatus = $this->Unescape($row['lbook_bookstatus']);
			$this->lbook_category = $this->Unescape($row['lbook_category']);
			$this->lbook_class = $this->Unescape($row['lbook_class']);
			$this->lbook_booksubcategory = $this->Unescape($row['lbook_booksubcategory']);
			$this->lbook_ref = $this->Unescape($row['lbook_ref']);
			$this->lbook_statusstatus = $this->Unescape($row['lbook_statusstatus']);
			$this->lbook_pages = $this->Unescape($row['lbook_pages']);
			$this->lbook_volume = $this->Unescape($row['lbook_volume']);
			$this->lbook_bilnumber = $this->Unescape($row['lbook_bilnumber']);
			$this->status = $row['status'];
			$this->issuestatus = $row['issuestatus'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_libbookList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_libbook` ";
		$es_libbookList = Array();
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
						/****prabhakar */
						if (strstr($value, ' AND ')) {
							list($d1, $d2 ) = explode('AND',$value);
							$value =  "   " . $d1 . "'   AND  '" . $d2;
						} 
						/****prabhakar ****/
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
			$sortBy = "es_libbookid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_libbook = new $thisObjectName();
			$es_libbook->es_libbookId = $row['es_libbookid'];
			$es_libbook->lbook_dateofpurchase = $row['lbook_dateofpurchase'];
			$es_libbook->lbook_aceesnofrom = $this->Unescape($row['lbook_aceesnofrom']);
			$es_libbook->lbook_accessnoto = $this->Unescape($row['lbook_accessnoto']);
			$es_libbook->lbook_bookfromno = $this->Unescape($row['lbook_bookfromno']);
			$es_libbook->lbook_booktono = $this->Unescape($row['lbook_booktono']);
			$es_libbook->lbook_author = $this->Unescape($row['lbook_author']);
			$es_libbook->lbook_title = $this->Unescape($row['lbook_title']);
			$es_libbook->lbook_publishername = $this->Unescape($row['lbook_publishername']);
			$es_libbook->lbook_publisherplace = $this->Unescape($row['lbook_publisherplace']);
			$es_libbook->lbook_booksubject = $this->Unescape($row['lbook_booksubject']);
			$es_libbook->lbook_bookedition = $this->Unescape($row['lbook_bookedition']);
			$es_libbook->lbook_year = $this->Unescape($row['lbook_year']);
			$es_libbook->lbook_cost = $this->Unescape($row['lbook_cost']);
			$es_libbook->lbook_sourse = $this->Unescape($row['lbook_sourse']);
			$es_libbook->lbook_aditinalbookinfo = $this->Unescape($row['lbook_aditinalbookinfo']);
			$es_libbook->lbook_bookstatus = $this->Unescape($row['lbook_bookstatus']);
			$es_libbook->lbook_category = $this->Unescape($row['lbook_category']);
			$es_libbook->lbook_class = $this->Unescape($row['lbook_class']);
			$es_libbook->lbook_booksubcategory = $this->Unescape($row['lbook_booksubcategory']);
			$es_libbook->lbook_ref = $this->Unescape($row['lbook_ref']);
			$es_libbook->lbook_statusstatus = $this->Unescape($row['lbook_statusstatus']);
			$es_libbook->lbook_pages = $this->Unescape($row['lbook_pages']);
			$es_libbook->lbook_volume = $this->Unescape($row['lbook_volume']);
			$es_libbook->lbook_bilnumber = $this->Unescape($row['lbook_bilnumber']);
			$es_libbook->status = $row['status'];
			$es_libbook->issuestatus = $row['issuestatus'];
			$es_libbookList[] = $es_libbook;
		}
		return $es_libbookList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_libbookId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_libbookid` from `es_libbook` where `es_libbookid`='".$this->es_libbookId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_libbook` set 
			`lbook_dateofpurchase`='".$this->lbook_dateofpurchase."', 
			`lbook_aceesnofrom`='".$this->Escape($this->lbook_aceesnofrom)."', 
			`lbook_accessnoto`='".$this->Escape($this->lbook_accessnoto)."', 
			`lbook_bookfromno`='".$this->Escape($this->lbook_bookfromno)."', 
			`lbook_booktono`='".$this->Escape($this->lbook_booktono)."', 
			`lbook_author`='".$this->Escape($this->lbook_author)."', 
			`lbook_title`='".$this->Escape($this->lbook_title)."', 
			`lbook_publishername`='".$this->Escape($this->lbook_publishername)."', 
			`lbook_publisherplace`='".$this->Escape($this->lbook_publisherplace)."', 
			`lbook_booksubject`='".$this->Escape($this->lbook_booksubject)."', 
			`lbook_bookedition`='".$this->Escape($this->lbook_bookedition)."', 
			`lbook_year`='".$this->Escape($this->lbook_year)."', 
			`lbook_cost`='".$this->Escape($this->lbook_cost)."', 
			`lbook_sourse`='".$this->Escape($this->lbook_sourse)."', 
			`lbook_aditinalbookinfo`='".$this->Escape($this->lbook_aditinalbookinfo)."', 
			`lbook_bookstatus`='".$this->Escape($this->lbook_bookstatus)."', 
			`lbook_category`='".$this->Escape($this->lbook_category)."', 
			`lbook_class`='".$this->Escape($this->lbook_class)."', 
			`lbook_booksubcategory`='".$this->Escape($this->lbook_booksubcategory)."', 
			`lbook_ref`='".$this->Escape($this->lbook_ref)."', 
			`lbook_statusstatus`='".$this->Escape($this->lbook_statusstatus)."', 
			`lbook_pages`='".$this->Escape($this->lbook_pages)."', 
			`lbook_volume`='".$this->Escape($this->lbook_volume)."', 
			`lbook_bilnumber`='".$this->Escape($this->lbook_bilnumber)."', 
			`status`='".$this->status."', 
			`issuestatus`='".$this->issuestatus."' where `es_libbookid`='".$this->es_libbookId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_libbook` (`lbook_dateofpurchase`, `lbook_aceesnofrom`, `lbook_accessnoto`, `lbook_bookfromno`, `lbook_booktono`, `lbook_author`, `lbook_title`, `lbook_publishername`, `lbook_publisherplace`, `lbook_booksubject`, `lbook_bookedition`, `lbook_year`, `lbook_cost`, `lbook_sourse`, `lbook_aditinalbookinfo`, `lbook_bookstatus`, `lbook_category`, `lbook_class`, `lbook_booksubcategory`, `lbook_ref`, `lbook_statusstatus`, `lbook_pages`, `lbook_volume`, `lbook_bilnumber`, `status`, `issuestatus` ) values (
			'".$this->lbook_dateofpurchase."', 
			'".$this->Escape($this->lbook_aceesnofrom)."', 
			'".$this->Escape($this->lbook_accessnoto)."', 
			'".$this->Escape($this->lbook_bookfromno)."', 
			'".$this->Escape($this->lbook_booktono)."', 
			'".$this->Escape($this->lbook_author)."', 
			'".$this->Escape($this->lbook_title)."', 
			'".$this->Escape($this->lbook_publishername)."', 
			'".$this->Escape($this->lbook_publisherplace)."', 
			'".$this->Escape($this->lbook_booksubject)."', 
			'".$this->Escape($this->lbook_bookedition)."', 
			'".$this->Escape($this->lbook_year)."', 
			'".$this->Escape($this->lbook_cost)."', 
			'".$this->Escape($this->lbook_sourse)."', 
			'".$this->Escape($this->lbook_aditinalbookinfo)."', 
			'".$this->Escape($this->lbook_bookstatus)."', 
			'".$this->Escape($this->lbook_category)."', 
			'".$this->Escape($this->lbook_class)."', 
			'".$this->Escape($this->lbook_booksubcategory)."', 
			'".$this->Escape($this->lbook_ref)."', 
			'".$this->Escape($this->lbook_statusstatus)."', 
			'".$this->Escape($this->lbook_pages)."', 
			'".$this->Escape($this->lbook_volume)."', 
			'".$this->Escape($this->lbook_bilnumber)."', 
			'".$this->status."', 
			'".$this->issuestatus."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_libbookId == "")
		{
			$this->es_libbookId = $insertId;
		}
		return $this->es_libbookId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_libbookId
	*/
	function SaveNew()
	{
		$this->es_libbookId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_libbook` where `es_libbookid`='".$this->es_libbookId."'";
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
			$pog_query = "delete from `es_libbook` where ";
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