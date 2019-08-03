<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `finance_master` (
	`finance_masterid` int(11) NOT NULL auto_increment,
	`fi_startdate` DATE NOT NULL,
	`fi_enddate` DATE NOT NULL,
	`fi_address` TEXT NOT NULL,
	`fi_currency` VARCHAR(255) NOT NULL,
	`fi_symbol` VARCHAR(255) NOT NULL,
	`fi_email` VARCHAR(255) NOT NULL,
	`fi_initialbalance` INT NOT NULL,
	`fi_schoolname` VARCHAR(255) NOT NULL,
	`fi_phoneno` VARCHAR(255) NOT NULL,
	`fi_school_logo` VARCHAR(255) NOT NULL,
	`fi_website` VARCHAR(255) NOT NULL, PRIMARY KEY  (`finance_masterid`)) ENGINE=MyISAM;
*/

/**
* <b>finance_master</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=finance_master&attributeList=array+%28%0A++0+%3D%3E+%27fi_startdate%27%2C%0A++1+%3D%3E+%27fi_enddate%27%2C%0A++2+%3D%3E+%27fi_address%27%2C%0A++3+%3D%3E+%27fi_currency%27%2C%0A++4+%3D%3E+%27fi_symbol%27%2C%0A++5+%3D%3E+%27fi_email%27%2C%0A++6+%3D%3E+%27fi_initialbalance%27%2C%0A++7+%3D%3E+%27fi_schoolname%27%2C%0A++8+%3D%3E+%27fi_phoneno%27%2C%0A++9+%3D%3E+%27fi_school_logo%27%2C%0A++10+%3D%3E+%27fi_website%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27DATE%27%2C%0A++1+%3D%3E+%27DATE%27%2C%0A++2+%3D%3E+%27TEXT%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27INT%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class finance_master extends POG_Base
{
	public $finance_masterId = '';

	/**
	 * @var DATE
	 */
	public $fi_startdate;
	
	/**
	 * @var DATE
	 */
	public $fi_enddate;
	
	/**
	 * @var TEXT
	 */
	public $fi_address;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_currency;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_symbol;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_email;
	
	/**
	 * @var INT
	 */
	public $fi_initialbalance;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_schoolname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_phoneno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_school_logo;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fi_website;
	
	public $pog_attribute_type = array(
		"finance_masterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fi_startdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"fi_enddate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"fi_address" => array('db_attributes' => array("TEXT", "TEXT")),
		"fi_currency" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fi_symbol" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fi_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fi_initialbalance" => array('db_attributes' => array("NUMERIC", "INT")),
		"fi_schoolname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fi_phoneno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fi_school_logo" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fi_website" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function finance_master($fi_startdate='', $fi_enddate='', $fi_address='', $fi_currency='', $fi_symbol='', $fi_email='', $fi_initialbalance='', $fi_schoolname='', $fi_phoneno='', $fi_school_logo='', $fi_website='')
	{
		$this->fi_startdate = $fi_startdate;
		$this->fi_enddate = $fi_enddate;
		$this->fi_address = $fi_address;
		$this->fi_currency = $fi_currency;
		$this->fi_symbol = $fi_symbol;
		$this->fi_email = $fi_email;
		$this->fi_initialbalance = $fi_initialbalance;
		$this->fi_schoolname = $fi_schoolname;
		$this->fi_phoneno = $fi_phoneno;
		$this->fi_school_logo = $fi_school_logo;
		$this->fi_website = $fi_website;
	}
	
	
	/**
	* Gets object from database
	* @param integer $finance_masterId 
	* @return object $finance_master
	*/
	function Get($finance_masterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `finance_master` where `finance_masterid`='".intval($finance_masterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->finance_masterId = $row['finance_masterid'];
			$this->fi_startdate = $row['fi_startdate'];
			$this->fi_enddate = $row['fi_enddate'];
			$this->fi_address = $this->Unescape($row['fi_address']);
			$this->fi_currency = $this->Unescape($row['fi_currency']);
			$this->fi_symbol = $this->Unescape($row['fi_symbol']);
			$this->fi_email = $this->Unescape($row['fi_email']);
			$this->fi_initialbalance = $this->Unescape($row['fi_initialbalance']);
			$this->fi_schoolname = $this->Unescape($row['fi_schoolname']);
			$this->fi_phoneno = $this->Unescape($row['fi_phoneno']);
			$this->fi_school_logo = $this->Unescape($row['fi_school_logo']);
			$this->fi_website = $this->Unescape($row['fi_website']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $finance_masterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `finance_master` ";
		$finance_masterList = Array();
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
			$sortBy = "finance_masterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader(stripslashes($this->pog_query), $connection);
		while ($row = Database::Read($cursor))
		{
			$finance_master = new $thisObjectName();
			$finance_master->finance_masterId = $row['finance_masterid'];
			$finance_master->fi_startdate = $row['fi_startdate'];
			$finance_master->fi_enddate = $row['fi_enddate'];
			$finance_master->fi_address = $this->Unescape($row['fi_address']);
			$finance_master->fi_currency = $this->Unescape($row['fi_currency']);
			$finance_master->fi_symbol = $this->Unescape($row['fi_symbol']);
			$finance_master->fi_email = $this->Unescape($row['fi_email']);
			$finance_master->fi_initialbalance = $this->Unescape($row['fi_initialbalance']);
			$finance_master->fi_schoolname = $this->Unescape($row['fi_schoolname']);
			$finance_master->fi_phoneno = $this->Unescape($row['fi_phoneno']);
			$finance_master->fi_school_logo = $this->Unescape($row['fi_school_logo']);
			$finance_master->fi_website = $this->Unescape($row['fi_website']);
			$finance_masterList[] = $finance_master;
		}
		return $finance_masterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $finance_masterId
	*/
	function Save()
	{
	
		$connection = Database::Connect();
		$this->pog_query = "select `finance_masterid` from `finance_master` where `finance_masterid`='".$this->finance_masterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `finance_master` set 
			`fi_startdate`='".$this->fi_startdate."', 
			`fi_enddate`='".$this->fi_enddate."', 
			`fi_address`='".$this->Escape($this->fi_address)."', 
			`fi_currency`='".$this->Escape($this->fi_currency)."', 
			`fi_symbol`='".$this->Escape($this->fi_symbol)."', 
			`fi_email`='".$this->Escape($this->fi_email)."', 
			`fi_initialbalance`='".$this->Escape($this->fi_initialbalance)."', 
			`fi_schoolname`='".$this->Escape($this->fi_schoolname)."', 
			`fi_phoneno`='".$this->Escape($this->fi_phoneno)."', 
			`fi_school_logo`='".$this->Escape($this->fi_school_logo)."', 
			`fi_website`='".$this->Escape($this->fi_website)."' where `finance_masterid`='".$this->finance_masterId."'";
		}
		else
		{
			 $this->pog_query = "insert into `finance_master` (`fi_startdate`, `fi_enddate`, `fi_address`, `fi_currency`, `fi_symbol`, `fi_email`, `fi_initialbalance`, `fi_schoolname`, `fi_phoneno`, `fi_school_logo`, `fi_website` ) values (
			'".$this->fi_startdate."', 
			'".$this->fi_enddate."', 
			'".$this->Escape($this->fi_address)."', 
			'".$this->Escape($this->fi_currency)."', 
			'".$this->Escape($this->fi_symbol)."', 
			'".$this->Escape($this->fi_email)."', 
			'".$this->Escape($this->fi_initialbalance)."', 
			'".$this->Escape($this->fi_schoolname)."', 
			'".$this->Escape($this->fi_phoneno)."', 
			'".$this->Escape($this->fi_school_logo)."', 
			'".$this->Escape($this->fi_website)."' )";
			
		}
		
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->finance_masterId == "")
		{
			$this->finance_masterId = $insertId;
		}
		return $this->finance_masterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $finance_masterId
	*/
	function SaveNew()
	{
		$this->finance_masterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `finance_master` where `finance_masterid`='".$this->finance_masterId."'";
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
			$pog_query = "delete from `finance_master` where ";
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