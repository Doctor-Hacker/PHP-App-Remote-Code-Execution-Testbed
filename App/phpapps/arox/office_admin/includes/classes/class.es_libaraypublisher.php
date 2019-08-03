<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_libaraypublisher` (
	`es_libaraypublisherid` int(11) NOT NULL auto_increment,
	`library_publishername` VARCHAR(255) NOT NULL,
	`library_pulisheradress` VARCHAR(255) NOT NULL,
	`library_city` VARCHAR(255) NOT NULL,
	`libaray_state` VARCHAR(255) NOT NULL,
	`libarary_country` VARCHAR(255) NOT NULL,
	`libaray_phoneno` VARCHAR(255) NOT NULL,
	`librray_mobileno` VARCHAR(255) NOT NULL,
	`library_fax` VARCHAR(255) NOT NULL,
	`libarary_email` VARCHAR(255) NOT NULL,
	`libarary_aditinalinformation` VARCHAR(255) NOT NULL,
	`status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_libaraypublisherid`)) ENGINE=MyISAM;
*/

/**
* <b>es_libaraypublisher</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_libaraypublisher&attributeList=array+%28%0A++0+%3D%3E+%27library_publishername%27%2C%0A++1+%3D%3E+%27library_pulisheradress%27%2C%0A++2+%3D%3E+%27library_city%27%2C%0A++3+%3D%3E+%27libaray_state%27%2C%0A++4+%3D%3E+%27libarary_country%27%2C%0A++5+%3D%3E+%27libaray_phoneno%27%2C%0A++6+%3D%3E+%27librray_mobileno%27%2C%0A++7+%3D%3E+%27library_fax%27%2C%0A++8+%3D%3E+%27libarary_email%27%2C%0A++9+%3D%3E+%27libarary_aditinalinformation%27%2C%0A++10+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_libaraypublisher extends POG_Base
{
	public $es_libaraypublisherId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $library_publishername;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $library_pulisheradress;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $library_city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $libaray_state;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $libarary_country;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $libaray_phoneno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $librray_mobileno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $library_fax;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $libarary_email;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $libarary_aditinalinformation;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_libaraypublisherId" => array('db_attributes' => array("NUMERIC", "INT")),
		"library_publishername" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"library_pulisheradress" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"library_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"libaray_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"libarary_country" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"libaray_phoneno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"librray_mobileno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"library_fax" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"libarary_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"libarary_aditinalinformation" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive'")),
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
	
	function es_libaraypublisher($library_publishername='', $library_pulisheradress='', $library_city='', $libaray_state='', $libarary_country='', $libaray_phoneno='', $librray_mobileno='', $library_fax='', $libarary_email='', $libarary_aditinalinformation='', $status='')
	{
		$this->library_publishername = $library_publishername;
		$this->library_pulisheradress = $library_pulisheradress;
		$this->library_city = $library_city;
		$this->libaray_state = $libaray_state;
		$this->libarary_country = $libarary_country;
		$this->libaray_phoneno = $libaray_phoneno;
		$this->librray_mobileno = $librray_mobileno;
		$this->library_fax = $library_fax;
		$this->libarary_email = $libarary_email;
		$this->libarary_aditinalinformation = $libarary_aditinalinformation;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_libaraypublisherId 
	* @return object $es_libaraypublisher
	*/
	function Get($es_libaraypublisherId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_libaraypublisher` where `es_libaraypublisherid`='".intval($es_libaraypublisherId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_libaraypublisherId = $row['es_libaraypublisherid'];
			$this->library_publishername = $this->Unescape($row['library_publishername']);
			$this->library_pulisheradress = $this->Unescape($row['library_pulisheradress']);
			$this->library_city = $this->Unescape($row['library_city']);
			$this->libaray_state = $this->Unescape($row['libaray_state']);
			$this->libarary_country = $this->Unescape($row['libarary_country']);
			$this->libaray_phoneno = $this->Unescape($row['libaray_phoneno']);
			$this->librray_mobileno = $this->Unescape($row['librray_mobileno']);
			$this->library_fax = $this->Unescape($row['library_fax']);
			$this->libarary_email = $this->Unescape($row['libarary_email']);
			$this->libarary_aditinalinformation = $this->Unescape($row['libarary_aditinalinformation']);
			$this->status = $row['status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_libaraypublisherList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_libaraypublisher` ";
		$es_libaraypublisherList = Array();
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
				{   if(isset($this->orcondition)&&$this->orcondition != ""){
						if ($i > 0 && sizeof($fcv_array[$i-1]) != 1){
							$this->pog_query .= " OR ";
						}
					}
					elseif ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
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
			$sortBy = "es_libaraypublisherid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_libaraypublisher = new $thisObjectName();
			$es_libaraypublisher->es_libaraypublisherId = $row['es_libaraypublisherid'];
			$es_libaraypublisher->library_publishername = $this->Unescape($row['library_publishername']);
			$es_libaraypublisher->library_pulisheradress = $this->Unescape($row['library_pulisheradress']);
			$es_libaraypublisher->library_city = $this->Unescape($row['library_city']);
			$es_libaraypublisher->libaray_state = $this->Unescape($row['libaray_state']);
			$es_libaraypublisher->libarary_country = $this->Unescape($row['libarary_country']);
			$es_libaraypublisher->libaray_phoneno = $this->Unescape($row['libaray_phoneno']);
			$es_libaraypublisher->librray_mobileno = $this->Unescape($row['librray_mobileno']);
			$es_libaraypublisher->library_fax = $this->Unescape($row['library_fax']);
			$es_libaraypublisher->libarary_email = $this->Unescape($row['libarary_email']);
			$es_libaraypublisher->libarary_aditinalinformation = $this->Unescape($row['libarary_aditinalinformation']);
			$es_libaraypublisher->status = $row['status'];
			$es_libaraypublisherList[] = $es_libaraypublisher;
		}
		return $es_libaraypublisherList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_libaraypublisherId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_libaraypublisherid` from `es_libaraypublisher` where `es_libaraypublisherid`='".$this->es_libaraypublisherId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_libaraypublisher` set 
			`library_publishername`='".$this->Escape($this->library_publishername)."', 
			`library_pulisheradress`='".$this->Escape($this->library_pulisheradress)."', 
			`library_city`='".$this->Escape($this->library_city)."', 
			`libaray_state`='".$this->Escape($this->libaray_state)."', 
			`libarary_country`='".$this->Escape($this->libarary_country)."', 
			`libaray_phoneno`='".$this->Escape($this->libaray_phoneno)."', 
			`librray_mobileno`='".$this->Escape($this->librray_mobileno)."', 
			`library_fax`='".$this->Escape($this->library_fax)."', 
			`libarary_email`='".$this->Escape($this->libarary_email)."', 
			`libarary_aditinalinformation`='".$this->Escape($this->libarary_aditinalinformation)."', 
			`status`='".$this->status."' where `es_libaraypublisherid`='".$this->es_libaraypublisherId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_libaraypublisher` (`library_publishername`, `library_pulisheradress`, `library_city`, `libaray_state`, `libarary_country`, `libaray_phoneno`, `librray_mobileno`, `library_fax`, `libarary_email`, `libarary_aditinalinformation`, `status` ) values (
			'".$this->Escape($this->library_publishername)."', 
			'".$this->Escape($this->library_pulisheradress)."', 
			'".$this->Escape($this->library_city)."', 
			'".$this->Escape($this->libaray_state)."', 
			'".$this->Escape($this->libarary_country)."', 
			'".$this->Escape($this->libaray_phoneno)."', 
			'".$this->Escape($this->librray_mobileno)."', 
			'".$this->Escape($this->library_fax)."', 
			'".$this->Escape($this->libarary_email)."', 
			'".$this->Escape($this->libarary_aditinalinformation)."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_libaraypublisherId == "")
		{
			$this->es_libaraypublisherId = $insertId;
		}
		return $this->es_libaraypublisherId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_libaraypublisherId
	*/
	function SaveNew()
	{
		$this->es_libaraypublisherId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_libaraypublisher` where `es_libaraypublisherid`='".$this->es_libaraypublisherId."'";
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
			$pog_query = "delete from `es_libaraypublisher` where ";
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