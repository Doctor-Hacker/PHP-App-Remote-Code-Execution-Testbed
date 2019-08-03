<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_schooltimings` (
	`es_schooltimingsid` int(11) NOT NULL auto_increment,
	`es_startfrom` VARCHAR(255) NOT NULL,
	`es_endto` VARCHAR(255) NOT NULL,
	`es_breakfrom` VARCHAR(255) NOT NULL,
	`es_breakto` VARCHAR(255) NOT NULL,
	`es_lunchfrom` VARCHAR(255) NOT NULL,
	`es_lunchto` VARCHAR(255) NOT NULL,
	`es_periodduration` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_schooltimingsid`)) ENGINE=MyISAM;
*/

/**
* <b>es_schooltimings</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_schooltimings&attributeList=array+%28%0A++0+%3D%3E+%27es_startfrom%27%2C%0A++1+%3D%3E+%27es_endto%27%2C%0A++2+%3D%3E+%27es_breakfrom%27%2C%0A++3+%3D%3E+%27es_breakto%27%2C%0A++4+%3D%3E+%27es_lunchfrom%27%2C%0A++5+%3D%3E+%27es_lunchto%27%2C%0A++6+%3D%3E+%27es_periodduration%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_schooltimings extends POG_Base
{
	public $es_schooltimingsId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_startfrom;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_endto;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_breakfrom;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_breakto;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_lunchfrom;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_lunchto;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_periodduration;
	
	public $pog_attribute_type = array(
		"es_schooltimingsId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_startfrom" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_endto" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_breakfrom" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_breakto" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_lunchfrom" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_lunchto" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_periodduration" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_schooltimings($es_startfrom='', $es_endto='', $es_breakfrom='', $es_breakto='', $es_lunchfrom='', $es_lunchto='', $es_periodduration='')
	{
		$this->es_startfrom = $es_startfrom;
		$this->es_endto = $es_endto;
		$this->es_breakfrom = $es_breakfrom;
		$this->es_breakto = $es_breakto;
		$this->es_lunchfrom = $es_lunchfrom;
		$this->es_lunchto = $es_lunchto;
		$this->es_periodduration = $es_periodduration;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_schooltimingsId 
	* @return object $es_schooltimings
	*/
	function Get($es_schooltimingsId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_schooltimings` where `es_schooltimingsid`='".intval($es_schooltimingsId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_schooltimingsId = $row['es_schooltimingsid'];
			$this->es_startfrom = $this->Unescape($row['es_startfrom']);
			$this->es_endto = $this->Unescape($row['es_endto']);
			$this->es_breakfrom = $this->Unescape($row['es_breakfrom']);
			$this->es_breakto = $this->Unescape($row['es_breakto']);
			$this->es_lunchfrom = $this->Unescape($row['es_lunchfrom']);
			$this->es_lunchto = $this->Unescape($row['es_lunchto']);
			$this->es_periodduration = $this->Unescape($row['es_periodduration']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_schooltimingsList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_schooltimings` ";
		$es_schooltimingsList = Array();
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
			$sortBy = "es_schooltimingsid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_schooltimings = new $thisObjectName();
			$es_schooltimings->es_schooltimingsId = $row['es_schooltimingsid'];
			$es_schooltimings->es_startfrom = $this->Unescape($row['es_startfrom']);
			$es_schooltimings->es_endto = $this->Unescape($row['es_endto']);
			$es_schooltimings->es_breakfrom = $this->Unescape($row['es_breakfrom']);
			$es_schooltimings->es_breakto = $this->Unescape($row['es_breakto']);
			$es_schooltimings->es_lunchfrom = $this->Unescape($row['es_lunchfrom']);
			$es_schooltimings->es_lunchto = $this->Unescape($row['es_lunchto']);
			$es_schooltimings->es_periodduration = $this->Unescape($row['es_periodduration']);
			$es_schooltimingsList[] = $es_schooltimings;
		}
		return $es_schooltimingsList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_schooltimingsId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_schooltimingsid` from `es_schooltimings` where `es_schooltimingsid`='".$this->es_schooltimingsId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_schooltimings` set 
			`es_startfrom`='".$this->Escape($this->es_startfrom)."', 
			`es_endto`='".$this->Escape($this->es_endto)."', 
			`es_breakfrom`='".$this->Escape($this->es_breakfrom)."', 
			`es_breakto`='".$this->Escape($this->es_breakto)."', 
			`es_lunchfrom`='".$this->Escape($this->es_lunchfrom)."', 
			`es_lunchto`='".$this->Escape($this->es_lunchto)."', 
			`es_periodduration`='".$this->Escape($this->es_periodduration)."' where `es_schooltimingsid`='".$this->es_schooltimingsId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_schooltimings` (`es_startfrom`, `es_endto`, `es_breakfrom`, `es_breakto`, `es_lunchfrom`, `es_lunchto`, `es_periodduration` ) values (
			'".$this->Escape($this->es_startfrom)."', 
			'".$this->Escape($this->es_endto)."', 
			'".$this->Escape($this->es_breakfrom)."', 
			'".$this->Escape($this->es_breakto)."', 
			'".$this->Escape($this->es_lunchfrom)."', 
			'".$this->Escape($this->es_lunchto)."', 
			'".$this->Escape($this->es_periodduration)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_schooltimingsId == "")
		{
			$this->es_schooltimingsId = $insertId;
		}
		return $this->es_schooltimingsId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_schooltimingsId
	*/
	function SaveNew()
	{
		$this->es_schooltimingsId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_schooltimings` where `es_schooltimingsid`='".$this->es_schooltimingsId."'";
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
			$pog_query = "delete from `es_schooltimings` where ";
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