<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_issueloan` (
	`es_issueloanid` int(11) NOT NULL auto_increment,
	`es_staffid` INT NOT NULL,
	`es_loanmasterid` INT NOT NULL,
	`loan_intrestrate` FLOAT NOT NULL,
	`loan_amount` FLOAT NOT NULL,
	`loan_instalments` INT NOT NULL,
	`deductionmonth` DATE NOT NULL,
	`dud_amount` FLOAT NOT NULL,
	`amountpaidtillnow` FLOAT NOT NULL,
	`noofinstalmentscompleted` INT NOT NULL,
	`created_on` DATE NOT NULL,
	`voucherid` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_issueloanid`)) ENGINE=MyISAM;
*/

/**
* <b>es_issueloan</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0f / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_issueloan&attributeList=array+%28%0A++0+%3D%3E+%27es_staffid%27%2C%0A++1+%3D%3E+%27es_loanmasterid%27%2C%0A++2+%3D%3E+%27loan_intrestrate%27%2C%0A++3+%3D%3E+%27loan_amount%27%2C%0A++4+%3D%3E+%27loan_instalments%27%2C%0A++5+%3D%3E+%27deductionmonth%27%2C%0A++6+%3D%3E+%27dud_amount%27%2C%0A++7+%3D%3E+%27amountpaidtillnow%27%2C%0A++8+%3D%3E+%27noofinstalmentscompleted%27%2C%0A++9+%3D%3E+%27created_on%27%2C%0A++10+%3D%3E+%27voucherid%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27FLOAT%27%2C%0A++3+%3D%3E+%27FLOAT%27%2C%0A++4+%3D%3E+%27INT%27%2C%0A++5+%3D%3E+%27DATE%27%2C%0A++6+%3D%3E+%27FLOAT%27%2C%0A++7+%3D%3E+%27FLOAT%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27DATE%27%2C%0A++10+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_issueloan extends POG_Base
{
	public $es_issueloanId = '';

	/**
	 * @var INT
	 */
	public $es_staffid;
	
	/**
	 * @var INT
	 */
	public $es_loanmasterid;
	
	/**
	 * @var FLOAT
	 */
	public $loan_intrestrate;
	
	/**
	 * @var FLOAT
	 */
	public $loan_amount;
	
	/**
	 * @var INT
	 */
	public $loan_instalments;
	
	/**
	 * @var DATE
	 */
	public $deductionmonth;
	
	/**
	 * @var FLOAT
	 */
	public $dud_amount;
	
	/**
	 * @var FLOAT
	 */
	public $amountpaidtillnow;
	
	/**
	 * @var INT
	 */
	public $noofinstalmentscompleted;
	
	/**
	 * @var DATE
	 */
	public $created_on;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $voucherid;
	
	public $pog_attribute_type = array(
		"es_issueloanId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_staffid" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_loanmasterid" => array('db_attributes' => array("NUMERIC", "INT")),
		"loan_intrestrate" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"loan_amount" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"loan_instalments" => array('db_attributes' => array("NUMERIC", "INT")),
		"deductionmonth" => array('db_attributes' => array("NUMERIC", "DATE")),
		"dud_amount" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"amountpaidtillnow" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"noofinstalmentscompleted" => array('db_attributes' => array("NUMERIC", "INT")),
		"created_on" => array('db_attributes' => array("NUMERIC", "DATE")),
		"voucherid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_issueloan($es_staffid='', $es_loanmasterid='', $loan_intrestrate='', $loan_amount='', $loan_instalments='', $deductionmonth='', $dud_amount='', $amountpaidtillnow='', $noofinstalmentscompleted='', $created_on='', $voucherid='')
	{
		$this->es_staffid = $es_staffid;
		$this->es_loanmasterid = $es_loanmasterid;
		$this->loan_intrestrate = $loan_intrestrate;
		$this->loan_amount = $loan_amount;
		$this->loan_instalments = $loan_instalments;
		$this->deductionmonth = $deductionmonth;
		$this->dud_amount = $dud_amount;
		$this->amountpaidtillnow = $amountpaidtillnow;
		$this->noofinstalmentscompleted = $noofinstalmentscompleted;
		$this->created_on = $created_on;
		$this->voucherid = $voucherid;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_issueloanId 
	* @return object $es_issueloan
	*/
	function Get($es_issueloanId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_issueloan` where `es_issueloanid`='".intval($es_issueloanId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_issueloanId = $row['es_issueloanid'];
			$this->es_staffid = $this->Unescape($row['es_staffid']);
			$this->es_loanmasterid = $this->Unescape($row['es_loanmasterid']);
			$this->loan_intrestrate = $this->Unescape($row['loan_intrestrate']);
			$this->loan_amount = $this->Unescape($row['loan_amount']);
			$this->loan_instalments = $this->Unescape($row['loan_instalments']);
			$this->deductionmonth = $row['deductionmonth'];
			$this->dud_amount = $this->Unescape($row['dud_amount']);
			$this->amountpaidtillnow = $this->Unescape($row['amountpaidtillnow']);
			$this->noofinstalmentscompleted = $this->Unescape($row['noofinstalmentscompleted']);
			$this->created_on = $row['created_on'];
			$this->voucherid = $this->Unescape($row['voucherid']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_issueloanList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_issueloan` ";
		$es_issueloanList = Array();
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
			$sortBy = "es_issueloanid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_issueloan = new $thisObjectName();
			$es_issueloan->es_issueloanId = $row['es_issueloanid'];
			$es_issueloan->es_staffid = $this->Unescape($row['es_staffid']);
			$es_issueloan->es_loanmasterid = $this->Unescape($row['es_loanmasterid']);
			$es_issueloan->loan_intrestrate = $this->Unescape($row['loan_intrestrate']);
			$es_issueloan->loan_amount = $this->Unescape($row['loan_amount']);
			$es_issueloan->loan_instalments = $this->Unescape($row['loan_instalments']);
			$es_issueloan->deductionmonth = $row['deductionmonth'];
			$es_issueloan->dud_amount = $this->Unescape($row['dud_amount']);
			$es_issueloan->amountpaidtillnow = $this->Unescape($row['amountpaidtillnow']);
			$es_issueloan->noofinstalmentscompleted = $this->Unescape($row['noofinstalmentscompleted']);
			$es_issueloan->created_on = $row['created_on'];
			$es_issueloan->voucherid = $this->Unescape($row['voucherid']);
			$es_issueloanList[] = $es_issueloan;
		}
		return $es_issueloanList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_issueloanId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_issueloanid` from `es_issueloan` where `es_issueloanid`='".$this->es_issueloanId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_issueloan` set 
			`es_staffid`='".$this->Escape($this->es_staffid)."', 
			`es_loanmasterid`='".$this->Escape($this->es_loanmasterid)."', 
			`loan_intrestrate`='".$this->Escape($this->loan_intrestrate)."', 
			`loan_amount`='".$this->Escape($this->loan_amount)."', 
			`loan_instalments`='".$this->Escape($this->loan_instalments)."', 
			`deductionmonth`='".$this->deductionmonth."', 
			`dud_amount`='".$this->Escape($this->dud_amount)."', 
			`amountpaidtillnow`='".$this->Escape($this->amountpaidtillnow)."', 
			`noofinstalmentscompleted`='".$this->Escape($this->noofinstalmentscompleted)."', 
			`created_on`='".$this->created_on."', 
			`voucherid`='".$this->Escape($this->voucherid)."' where `es_issueloanid`='".$this->es_issueloanId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_issueloan` (`es_staffid`, `es_loanmasterid`, `loan_intrestrate`, `loan_amount`, `loan_instalments`, `deductionmonth`, `dud_amount`, `amountpaidtillnow`, `noofinstalmentscompleted`, `created_on`, `voucherid` ) values (
			'".$this->Escape($this->es_staffid)."', 
			'".$this->Escape($this->es_loanmasterid)."', 
			'".$this->Escape($this->loan_intrestrate)."', 
			'".$this->Escape($this->loan_amount)."', 
			'".$this->Escape($this->loan_instalments)."', 
			'".$this->deductionmonth."', 
			'".$this->Escape($this->dud_amount)."', 
			'".$this->Escape($this->amountpaidtillnow)."', 
			'".$this->Escape($this->noofinstalmentscompleted)."', 
			'".$this->created_on."', 
			'".$this->Escape($this->voucherid)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_issueloanId == "")
		{
			$this->es_issueloanId = $insertId;
		}
		return $this->es_issueloanId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_issueloanId
	*/
	function SaveNew()
	{
		$this->es_issueloanId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_issueloan` where `es_issueloanid`='".$this->es_issueloanId."'";
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
			$pog_query = "delete from `es_issueloan` where ";
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