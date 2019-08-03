<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_admins` (
	`es_adminsid` int(11) NOT NULL auto_increment,
	`admin_username` VARCHAR(255) NOT NULL,
	`admin_password` VARCHAR(255) NOT NULL,
	`admin_fname` VARCHAR(255) NOT NULL,
	`user_type` enum('super', 'admin') NOT NULL,
	`user_theme` VARCHAR(255) NOT NULL,
	`admin_lname` VARCHAR(255) NOT NULL,
	`admin_email` VARCHAR(255) NOT NULL,
	`admin_phoneno` VARCHAR(255) NOT NULL,
	`admin_more` TEXT NOT NULL,
	`admin_permissions` TEXT NOT NULL, PRIMARY KEY  (`es_adminsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_admins</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_admins&attributeList=array+%28%0A++0+%3D%3E+%27admin_username%27%2C%0A++1+%3D%3E+%27admin_password%27%2C%0A++2+%3D%3E+%27admin_fname%27%2C%0A++3+%3D%3E+%27user_type%27%2C%0A++4+%3D%3E+%27user_theme%27%2C%0A++5+%3D%3E+%27admin_lname%27%2C%0A++6+%3D%3E+%27admin_email%27%2C%0A++7+%3D%3E+%27admin_phoneno%27%2C%0A++8+%3D%3E+%27admin_more%27%2C%0A++9+%3D%3E+%27admin_permissions%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27enum%28%5C%5C%5C%27super%5C%5C%5C%27%2C+%5C%5C%5C%27admin%5C%5C%5C%27%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27TEXT%27%2C%0A++9+%3D%3E+%27TEXT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_admins extends POG_Base
{
	public $es_adminsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $admin_username;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $admin_password;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $admin_fname;
	
	/**
	 * @var enum('super', 'admin')
	 */
	public $user_type;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $user_theme;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $admin_lname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $admin_email;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $admin_phoneno;
	
	/**
	 * @var TEXT
	 */
	public $admin_more;
	
	/**
	 * @var TEXT
	 */
	public $admin_permissions;
	
	public $pog_attribute_type = array(
		"es_adminsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"admin_username" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"admin_password" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"admin_fname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"user_type" => array('db_attributes' => array("SET", "ENUM", "'super', 'admin'")),
		"user_theme" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"admin_lname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"admin_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"admin_phoneno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"admin_more" => array('db_attributes' => array("TEXT", "TEXT")),
		"admin_permissions" => array('db_attributes' => array("TEXT", "TEXT")),
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
	
	function es_admins($admin_username='', $admin_password='', $admin_fname='', $user_type='', $user_theme='', $admin_lname='', $admin_email='', $admin_phoneno='', $admin_more='', $admin_permissions='')
	{
		$this->admin_username = $admin_username;
		$this->admin_password = $admin_password;
		$this->admin_fname = $admin_fname;
		$this->user_type = $user_type;
		$this->user_theme = $user_theme;
		$this->admin_lname = $admin_lname;
		$this->admin_email = $admin_email;
		$this->admin_phoneno = $admin_phoneno;
		$this->admin_more = $admin_more;
		$this->admin_permissions = $admin_permissions;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_adminsId 
	* @return object $es_admins
	*/
	function Get($es_adminsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_admins` where `es_adminsid`='".intval($es_adminsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_adminsId = $row['es_adminsid'];
			$this->admin_username = $this->Unescape($row['admin_username']);
			$this->admin_password = $this->Unescape($row['admin_password']);
			$this->admin_fname = $this->Unescape($row['admin_fname']);
			$this->user_type = $row['user_type'];
			$this->user_theme = $this->Unescape($row['user_theme']);
			$this->admin_lname = $this->Unescape($row['admin_lname']);
			$this->admin_email = $this->Unescape($row['admin_email']);
			$this->admin_phoneno = $this->Unescape($row['admin_phoneno']);
			$this->admin_more = $this->Unescape($row['admin_more']);
			$this->admin_permissions = $this->Unescape($row['admin_permissions']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_adminsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_admins` ";
		$es_adminsList = Array();
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
			$sortBy = "es_adminsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_admins = new $thisObjectName();
			$es_admins->es_adminsId = $row['es_adminsid'];
			$es_admins->admin_username = $this->Unescape($row['admin_username']);
			$es_admins->admin_password = $this->Unescape($row['admin_password']);
			$es_admins->admin_fname = $this->Unescape($row['admin_fname']);
			$es_admins->user_type = $row['user_type'];
			$es_admins->user_theme = $this->Unescape($row['user_theme']);
			$es_admins->admin_lname = $this->Unescape($row['admin_lname']);
			$es_admins->admin_email = $this->Unescape($row['admin_email']);
			$es_admins->admin_phoneno = $this->Unescape($row['admin_phoneno']);
			$es_admins->admin_more = $this->Unescape($row['admin_more']);
			$es_admins->admin_permissions = $this->Unescape($row['admin_permissions']);
			$es_adminsList[] = $es_admins;
		}
		return $es_adminsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_adminsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_adminsid` from `es_admins` where `es_adminsid`='".$this->es_adminsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_admins` set 
			`admin_username`='".$this->Escape($this->admin_username)."', 
			`admin_password`='".$this->Escape($this->admin_password)."', 
			`admin_fname`='".$this->Escape($this->admin_fname)."', 
			`user_type`='".$this->user_type."', 
			`user_theme`='".$this->Escape($this->user_theme)."', 
			`admin_lname`='".$this->Escape($this->admin_lname)."', 
			`admin_email`='".$this->Escape($this->admin_email)."', 
			`admin_phoneno`='".$this->Escape($this->admin_phoneno)."', 
			`admin_more`='".$this->Escape($this->admin_more)."', 
			`admin_permissions`='".$this->Escape($this->admin_permissions)."' where `es_adminsid`='".$this->es_adminsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_admins` (`admin_username`, `admin_password`, `admin_fname`, `user_type`, `user_theme`, `admin_lname`, `admin_email`, `admin_phoneno`, `admin_more`, `admin_permissions` ) values (
			'".$this->Escape($this->admin_username)."', 
			'".$this->Escape($this->admin_password)."', 
			'".$this->Escape($this->admin_fname)."', 
			'".$this->user_type."', 
			'".$this->Escape($this->user_theme)."', 
			'".$this->Escape($this->admin_lname)."', 
			'".$this->Escape($this->admin_email)."', 
			'".$this->Escape($this->admin_phoneno)."', 
			'".$this->Escape($this->admin_more)."', 
			'".$this->Escape($this->admin_permissions)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_adminsId == "")
		{
			$this->es_adminsId = $insertId;
		}
		return $this->es_adminsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_adminsId
	*/
	function SaveNew()
	{
		$this->es_adminsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_admins` where `es_adminsid`='".$this->es_adminsId."'";
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
			$pog_query = "delete from `es_admins` where ";
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