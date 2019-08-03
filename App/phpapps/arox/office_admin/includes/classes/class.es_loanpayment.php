<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_loanpayment` (
	`es_loanpaymentid` int(11) NOT NULL auto_increment,
	`es_issueloanid` INT NOT NULL,
	`inst_amount` FLOAT NOT NULL,
	`onmonth` DATE NOT NULL, PRIMARY KEY  (`es_loanpaymentid`)) ENGINE=MyISAM;
*/

/**
* <b>es_loanpayment</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_loanpayment&attributeList=array+%28%0A++0+%3D%3E+%27es_issueloanid%27%2C%0A++1+%3D%3E+%27inst_amount%27%2C%0A++2+%3D%3E+%27onmonth%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27FLOAT%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_loanpayment extends POG_Base
{
	public $es_loanpaymentId = '';

	/**
	 * @var INT
	 */
	public $es_issueloanid;
	
	/**
	 * @var FLOAT
	 */
	public $inst_amount;
	
	/**
	 * @var DATE
	 */
	public $onmonth;
	
	public $pog_attribute_type = array(
		"es_loanpaymentId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_issueloanid" => array('db_attributes' => array("NUMERIC", "INT")),
		"inst_amount" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"onmonth" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_loanpayment($es_issueloanid='', $inst_amount='', $onmonth='')
	{
		$this->es_issueloanid = $es_issueloanid;
		$this->inst_amount = $inst_amount;
		$this->onmonth = $onmonth;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_loanpaymentId 
	* @return object $es_loanpayment
	*/
	function Get($es_loanpaymentId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_loanpayment` where `es_loanpaymentid`='".intval($es_loanpaymentId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_loanpaymentId = $row['es_loanpaymentid'];
			$this->es_issueloanid = $this->Unescape($row['es_issueloanid']);
			$this->inst_amount = $this->Unescape($row['inst_amount']);
			$this->onmonth = $row['onmonth'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_loanpaymentList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_loanpayment` ";
		$es_loanpaymentList = Array();
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
			$sortBy = "es_loanpaymentid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_loanpayment = new $thisObjectName();
			$es_loanpayment->es_loanpaymentId = $row['es_loanpaymentid'];
			$es_loanpayment->es_issueloanid = $this->Unescape($row['es_issueloanid']);
			$es_loanpayment->inst_amount = $this->Unescape($row['inst_amount']);
			$es_loanpayment->onmonth = $row['onmonth'];
			$es_loanpaymentList[] = $es_loanpayment;
		}
		return $es_loanpaymentList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_loanpaymentId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_loanpaymentid` from `es_loanpayment` where `es_loanpaymentid`='".$this->es_loanpaymentId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_loanpayment` set 
			`es_issueloanid`='".$this->Escape($this->es_issueloanid)."', 
			`inst_amount`='".$this->Escape($this->inst_amount)."', 
			`onmonth`='".$this->onmonth."' where `es_loanpaymentid`='".$this->es_loanpaymentId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_loanpayment` (`es_issueloanid`, `inst_amount`, `onmonth` ) values (
			'".$this->Escape($this->es_issueloanid)."', 
			'".$this->Escape($this->inst_amount)."', 
			'".$this->onmonth."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_loanpaymentId == "")
		{
			$this->es_loanpaymentId = $insertId;
		}
		return $this->es_loanpaymentId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_loanpaymentId
	*/
	function SaveNew()
	{
		$this->es_loanpaymentId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_loanpayment` where `es_loanpaymentid`='".$this->es_loanpaymentId."'";
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
			$pog_query = "delete from `es_loanpayment` where ";
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