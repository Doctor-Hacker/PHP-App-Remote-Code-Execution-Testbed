<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_feepaid` (
	`es_feepaidid` int(11) NOT NULL auto_increment,
	`studentid` INT NOT NULL,
	`class` VARCHAR(255) NOT NULL,
	`particularid` INT NOT NULL,
	`particulartname` VARCHAR(255) NOT NULL,
	`feeamount` FLOAT NOT NULL,
	`date` DATE NOT NULL,
	`academicyear` VARCHAR(255) NOT NULL,
	`comments` VARCHAR(255) NOT NULL,
	`es_installment` INT NOT NULL,
	`fi_fromdate` DATE NOT NULL,
	`fi_todate` DATE NOT NULL,
	`es_voucherentryid` INT NOT NULL,
	`fee_waived` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_feepaidid`)) ENGINE=MyISAM;
*/

/**
* <b>es_feepaid</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_feepaid&attributeList=array+%28%0A++0+%3D%3E+%27studentid%27%2C%0A++1+%3D%3E+%27class%27%2C%0A++2+%3D%3E+%27particularid%27%2C%0A++3+%3D%3E+%27particulartname%27%2C%0A++4+%3D%3E+%27feeamount%27%2C%0A++5+%3D%3E+%27date%27%2C%0A++6+%3D%3E+%27academicyear%27%2C%0A++7+%3D%3E+%27comments%27%2C%0A++8+%3D%3E+%27es_installment%27%2C%0A++9+%3D%3E+%27fi_fromdate%27%2C%0A++10+%3D%3E+%27fi_todate%27%2C%0A++11+%3D%3E+%27es_voucherentryid%27%2C%0A++12+%3D%3E+%27fee_waived%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27FLOAT%27%2C%0A++5+%3D%3E+%27DATE%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27DATE%27%2C%0A++10+%3D%3E+%27DATE%27%2C%0A++11+%3D%3E+%27INT%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_feepaid extends POG_Base
{
	public $es_feepaidId = '';

	/**
	 * @var INT
	 */
	public $studentid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $class;
	
	/**
	 * @var INT
	 */
	public $particularid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $particulartname;
	
	/**
	 * @var FLOAT
	 */
	public $feeamount;
	
	/**
	 * @var DATE
	 */
	public $date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $academicyear;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $comments;
	
	/**
	 * @var INT
	 */
	public $es_installment;
	
	/**
	 * @var DATE
	 */
	public $fi_fromdate;
	
	/**
	 * @var DATE
	 */
	public $fi_todate;
	
	/**
	 * @var INT
	 */
	public $es_voucherentryid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fee_waived;
	
	public $pog_attribute_type = array(
		"es_feepaidId" => array('db_attributes' => array("NUMERIC", "INT")),
		"studentid" => array('db_attributes' => array("NUMERIC", "INT")),
		"class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"particularid" => array('db_attributes' => array("NUMERIC", "INT")),
		"particulartname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"feeamount" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"academicyear" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"comments" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_installment" => array('db_attributes' => array("NUMERIC", "INT")),
		"fi_fromdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"fi_todate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"es_voucherentryid" => array('db_attributes' => array("NUMERIC", "INT")),
		"fee_waived" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_feepaid($studentid='', $class='', $particularid='', $particulartname='', $feeamount='', $date='', $academicyear='', $comments='', $es_installment='', $fi_fromdate='', $fi_todate='', $es_voucherentryid='', $fee_waived='')
	{
		$this->studentid = $studentid;
		$this->class = $class;
		$this->particularid = $particularid;
		$this->particulartname = $particulartname;
		$this->feeamount = $feeamount;
		$this->date = $date;
		$this->academicyear = $academicyear;
		$this->comments = $comments;
		$this->es_installment = $es_installment;
		$this->fi_fromdate = $fi_fromdate;
		$this->fi_todate = $fi_todate;
		$this->es_voucherentryid = $es_voucherentryid;
		$this->fee_waived = $fee_waived;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_feepaidId 
	* @return object $es_feepaid
	*/
	function Get($es_feepaidId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_feepaid` where `es_feepaidid`='".intval($es_feepaidId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_feepaidId = $row['es_feepaidid'];
			$this->studentid = $this->Unescape($row['studentid']);
			$this->class = $this->Unescape($row['class']);
			$this->particularid = $this->Unescape($row['particularid']);
			$this->particulartname = $this->Unescape($row['particulartname']);
			$this->feeamount = $this->Unescape($row['feeamount']);
			$this->date = $row['date'];
			$this->academicyear = $this->Unescape($row['academicyear']);
			$this->comments = $this->Unescape($row['comments']);
			$this->es_installment = $this->Unescape($row['es_installment']);
			$this->fi_fromdate = $row['fi_fromdate'];
			$this->fi_todate = $row['fi_todate'];
			$this->es_voucherentryid = $this->Unescape($row['es_voucherentryid']);
			$this->fee_waived = $this->Unescape($row['fee_waived']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_feepaidList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_feepaid` ";
		$es_feepaidList = Array();
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
			$sortBy = "es_feepaidid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_feepaid = new $thisObjectName();
			$es_feepaid->es_feepaidId = $row['es_feepaidid'];
			$es_feepaid->studentid = $this->Unescape($row['studentid']);
			$es_feepaid->class = $this->Unescape($row['class']);
			$es_feepaid->particularid = $this->Unescape($row['particularid']);
			$es_feepaid->particulartname = $this->Unescape($row['particulartname']);
			$es_feepaid->feeamount = $this->Unescape($row['feeamount']);
			$es_feepaid->date = $row['date'];
			$es_feepaid->academicyear = $this->Unescape($row['academicyear']);
			$es_feepaid->comments = $this->Unescape($row['comments']);
			$es_feepaid->es_installment = $this->Unescape($row['es_installment']);
			$es_feepaid->fi_fromdate = $row['fi_fromdate'];
			$es_feepaid->fi_todate = $row['fi_todate'];
			$es_feepaid->es_voucherentryid = $this->Unescape($row['es_voucherentryid']);
			$es_feepaid->fee_waived = $this->Unescape($row['fee_waived']);
			$es_feepaidList[] = $es_feepaid;
		}
		return $es_feepaidList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_feepaidId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_feepaidid` from `es_feepaid` where `es_feepaidid`='".$this->es_feepaidId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_feepaid` set 
			`studentid`='".$this->Escape($this->studentid)."', 
			`class`='".$this->Escape($this->class)."', 
			`particularid`='".$this->Escape($this->particularid)."', 
			`particulartname`='".$this->Escape($this->particulartname)."', 
			`feeamount`='".$this->Escape($this->feeamount)."', 
			`date`='".$this->date."', 
			`academicyear`='".$this->Escape($this->academicyear)."', 
			`comments`='".$this->Escape($this->comments)."', 
			`es_installment`='".$this->Escape($this->es_installment)."', 
			`fi_fromdate`='".$this->fi_fromdate."', 
			`fi_todate`='".$this->fi_todate."', 
			`es_voucherentryid`='".$this->Escape($this->es_voucherentryid)."', 
			`fee_waived`='".$this->Escape($this->fee_waived)."' where `es_feepaidid`='".$this->es_feepaidId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_feepaid` (`studentid`, `class`, `particularid`, `particulartname`, `feeamount`, `date`, `academicyear`, `comments`, `es_installment`, `fi_fromdate`, `fi_todate`, `es_voucherentryid`, `fee_waived` ) values (
			'".$this->Escape($this->studentid)."', 
			'".$this->Escape($this->class)."', 
			'".$this->Escape($this->particularid)."', 
			'".$this->Escape($this->particulartname)."', 
			'".$this->Escape($this->feeamount)."', 
			'".$this->date."', 
			'".$this->Escape($this->academicyear)."', 
			'".$this->Escape($this->comments)."', 
			'".$this->Escape($this->es_installment)."', 
			'".$this->fi_fromdate."', 
			'".$this->fi_todate."', 
			'".$this->Escape($this->es_voucherentryid)."', 
			'".$this->Escape($this->fee_waived)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_feepaidId == "")
		{
			$this->es_feepaidId = $insertId;
		}
		return $this->es_feepaidId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_feepaidId
	*/
	function SaveNew()
	{
		$this->es_feepaidId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_feepaid` where `es_feepaidid`='".$this->es_feepaidId."'";
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
			$pog_query = "delete from `es_feepaid` where ";
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