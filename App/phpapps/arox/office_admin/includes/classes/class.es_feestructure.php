<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_feestructure` (
	`es_feestructureid` int(11) NOT NULL auto_increment,
	`fee_tution` INT NOT NULL,
	`fee_library` INT NOT NULL,
	`fee_transportation` INT NOT NULL,
	`fee_mess` INT NOT NULL,
	`fee_book` INT NOT NULL,
	`fee_deposite` INT NOT NULL,
	`fee_class` VARCHAR(255) NOT NULL,
	`fee_hostel` INT NOT NULL,
	`fee_instalments` INT NOT NULL,
	`fee_fine` INT NOT NULL,
	`fees1` INT NOT NULL,
	`fees2` INT NOT NULL,
	`fees3` INT NOT NULL, PRIMARY KEY  (`es_feestructureid`)) ENGINE=MyISAM;
*/

/**
* <b>es_feestructure</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_feestructure&attributeList=array+%28%0A++0+%3D%3E+%27fee_tution%27%2C%0A++1+%3D%3E+%27fee_library%27%2C%0A++2+%3D%3E+%27fee_transportation%27%2C%0A++3+%3D%3E+%27fee_mess%27%2C%0A++4+%3D%3E+%27fee_book%27%2C%0A++5+%3D%3E+%27fee_deposite%27%2C%0A++6+%3D%3E+%27fee_class%27%2C%0A++7+%3D%3E+%27fee_hostel%27%2C%0A++8+%3D%3E+%27fee_instalments%27%2C%0A++9+%3D%3E+%27fee_fine%27%2C%0A++10+%3D%3E+%27fees1%27%2C%0A++11+%3D%3E+%27fees2%27%2C%0A++12+%3D%3E+%27fees3%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27INT%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27INT%27%2C%0A++10+%3D%3E+%27INT%27%2C%0A++11+%3D%3E+%27INT%27%2C%0A++12+%3D%3E+%27INT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_feestructure extends POG_Base
{
	public $es_feestructureId = '';

	/**
	 * @var INT
	 */
	public $fee_tution;
	
	/**
	 * @var INT
	 */
	public $fee_library;
	
	/**
	 * @var INT
	 */
	public $fee_transportation;
	
	/**
	 * @var INT
	 */
	public $fee_mess;
	
	/**
	 * @var INT
	 */
	public $fee_book;
	
	/**
	 * @var INT
	 */
	public $fee_deposite;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fee_class;
	
	/**
	 * @var INT
	 */
	public $fee_hostel;
	
	/**
	 * @var INT
	 */
	public $fee_instalments;
	
	/**
	 * @var INT
	 */
	public $fee_fine;
	
	/**
	 * @var INT
	 */
	public $fees1;
	
	/**
	 * @var INT
	 */
	public $fees2;
	
	/**
	 * @var INT
	 */
	public $fees3;
	
	public $pog_attribute_type = array(
		"es_feestructureId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_tution" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_library" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_transportation" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_mess" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_book" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_deposite" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fee_hostel" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_instalments" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_fine" => array('db_attributes' => array("NUMERIC", "INT")),
		"fees1" => array('db_attributes' => array("NUMERIC", "INT")),
		"fees2" => array('db_attributes' => array("NUMERIC", "INT")),
		"fees3" => array('db_attributes' => array("NUMERIC", "INT")),
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
	
	function es_feestructure($fee_tution='', $fee_library='', $fee_transportation='', $fee_mess='', $fee_book='', $fee_deposite='', $fee_class='', $fee_hostel='', $fee_instalments='', $fee_fine='', $fees1='', $fees2='', $fees3='')
	{
		$this->fee_tution = $fee_tution;
		$this->fee_library = $fee_library;
		$this->fee_transportation = $fee_transportation;
		$this->fee_mess = $fee_mess;
		$this->fee_book = $fee_book;
		$this->fee_deposite = $fee_deposite;
		$this->fee_class = $fee_class;
		$this->fee_hostel = $fee_hostel;
		$this->fee_instalments = $fee_instalments;
		$this->fee_fine = $fee_fine;
		$this->fees1 = $fees1;
		$this->fees2 = $fees2;
		$this->fees3 = $fees3;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_feestructureId 
	* @return object $es_feestructure
	*/
	function Get($es_feestructureId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_feestructure` where `es_feestructureid`='".intval($es_feestructureId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_feestructureId = $row['es_feestructureid'];
			$this->fee_tution = $this->Unescape($row['fee_tution']);
			$this->fee_library = $this->Unescape($row['fee_library']);
			$this->fee_transportation = $this->Unescape($row['fee_transportation']);
			$this->fee_mess = $this->Unescape($row['fee_mess']);
			$this->fee_book = $this->Unescape($row['fee_book']);
			$this->fee_deposite = $this->Unescape($row['fee_deposite']);
			$this->fee_class = $this->Unescape($row['fee_class']);
			$this->fee_hostel = $this->Unescape($row['fee_hostel']);
			$this->fee_instalments = $this->Unescape($row['fee_instalments']);
			$this->fee_fine = $this->Unescape($row['fee_fine']);
			$this->fees1 = $this->Unescape($row['fees1']);
			$this->fees2 = $this->Unescape($row['fees2']);
			$this->fees3 = $this->Unescape($row['fees3']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_feestructureList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_feestructure` ";
		$es_feestructureList = Array();
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
			$sortBy = "es_feestructureid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_feestructure = new $thisObjectName();
			$es_feestructure->es_feestructureId = $row['es_feestructureid'];
			$es_feestructure->fee_tution = $this->Unescape($row['fee_tution']);
			$es_feestructure->fee_library = $this->Unescape($row['fee_library']);
			$es_feestructure->fee_transportation = $this->Unescape($row['fee_transportation']);
			$es_feestructure->fee_mess = $this->Unescape($row['fee_mess']);
			$es_feestructure->fee_book = $this->Unescape($row['fee_book']);
			$es_feestructure->fee_deposite = $this->Unescape($row['fee_deposite']);
			$es_feestructure->fee_class = $this->Unescape($row['fee_class']);
			$es_feestructure->fee_hostel = $this->Unescape($row['fee_hostel']);
			$es_feestructure->fee_instalments = $this->Unescape($row['fee_instalments']);
			$es_feestructure->fee_fine = $this->Unescape($row['fee_fine']);
			$es_feestructure->fees1 = $this->Unescape($row['fees1']);
			$es_feestructure->fees2 = $this->Unescape($row['fees2']);
			$es_feestructure->fees3 = $this->Unescape($row['fees3']);
			$es_feestructureList[] = $es_feestructure;
		}
		return $es_feestructureList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_feestructureId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_feestructureid` from `es_feestructure` where `es_feestructureid`='".$this->es_feestructureId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_feestructure` set 
			`fee_tution`='".$this->Escape($this->fee_tution)."', 
			`fee_library`='".$this->Escape($this->fee_library)."', 
			`fee_transportation`='".$this->Escape($this->fee_transportation)."', 
			`fee_mess`='".$this->Escape($this->fee_mess)."', 
			`fee_book`='".$this->Escape($this->fee_book)."', 
			`fee_deposite`='".$this->Escape($this->fee_deposite)."', 
			`fee_class`='".$this->Escape($this->fee_class)."', 
			`fee_hostel`='".$this->Escape($this->fee_hostel)."', 
			`fee_instalments`='".$this->Escape($this->fee_instalments)."', 
			`fee_fine`='".$this->Escape($this->fee_fine)."', 
			`fees1`='".$this->Escape($this->fees1)."', 
			`fees2`='".$this->Escape($this->fees2)."', 
			`fees3`='".$this->Escape($this->fees3)."' where `es_feestructureid`='".$this->es_feestructureId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_feestructure` (`fee_tution`, `fee_library`, `fee_transportation`, `fee_mess`, `fee_book`, `fee_deposite`, `fee_class`, `fee_hostel`, `fee_instalments`, `fee_fine`, `fees1`, `fees2`, `fees3` ) values (
			'".$this->Escape($this->fee_tution)."', 
			'".$this->Escape($this->fee_library)."', 
			'".$this->Escape($this->fee_transportation)."', 
			'".$this->Escape($this->fee_mess)."', 
			'".$this->Escape($this->fee_book)."', 
			'".$this->Escape($this->fee_deposite)."', 
			'".$this->Escape($this->fee_class)."', 
			'".$this->Escape($this->fee_hostel)."', 
			'".$this->Escape($this->fee_instalments)."', 
			'".$this->Escape($this->fee_fine)."', 
			'".$this->Escape($this->fees1)."', 
			'".$this->Escape($this->fees2)."', 
			'".$this->Escape($this->fees3)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_feestructureId == "")
		{
			$this->es_feestructureId = $insertId;
		}
		return $this->es_feestructureId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_feestructureId
	*/
	function SaveNew()
	{
		$this->es_feestructureId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_feestructure` where `es_feestructureid`='".$this->es_feestructureId."'";
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
			$pog_query = "delete from `es_feestructure` where ";
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