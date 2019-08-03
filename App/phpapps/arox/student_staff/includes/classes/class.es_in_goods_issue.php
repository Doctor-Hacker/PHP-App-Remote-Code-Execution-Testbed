<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_in_goods_issue` (
	`es_in_goods_issueid` int(11) NOT NULL auto_increment,
	`in_issue_date` DATETIME NOT NULL,
	`in_issue_to` VARCHAR(255) NOT NULL,
	`in_inventory_id` INT NOT NULL,
	`in_issued_items` LONGTEXT NOT NULL,
	`in_returned_items` LONGTEXT NOT NULL,
	`in_department_id` INT NOT NULL,
	`in_issue_status` enum('notreturned','partialreturned','returned') NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_in_goods_issueid`)) ENGINE=MyISAM;
*/

/**
* <b>es_in_goods_issue</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_in_goods_issue&attributeList=array+%28%0A++0+%3D%3E+%27in_issue_date%27%2C%0A++1+%3D%3E+%27in_issue_to%27%2C%0A++2+%3D%3E+%27in_inventory_id%27%2C%0A++3+%3D%3E+%27in_issued_items%27%2C%0A++4+%3D%3E+%27in_returned_items%27%2C%0A++5+%3D%3E+%27in_department_id%27%2C%0A++6+%3D%3E+%27in_issue_status%27%2C%0A++7+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27DATETIME%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27LONGTEXT%27%2C%0A++4+%3D%3E+%27LONGTEXT%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27enum%28%5C%5C%5C%27notreturned%5C%5C%5C%27%2C%5C%5C%5C%27partialreturned%5C%5C%5C%27%2C%5C%5C%5C%27returned%5C%5C%5C%27%29%27%2C%0A++7+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_in_goods_issue extends POG_Base
{
	public $es_in_goods_issueId = '';

	/**
	 * @var DATETIME
	 */
	public $in_issue_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $in_issue_to;
	
	/**
	 * @var INT
	 */
	public $in_inventory_id;
	
	/**
	 * @var LONGTEXT
	 */
	public $in_issued_items;
	
	/**
	 * @var LONGTEXT
	 */
	public $in_returned_items;
	
	/**
	 * @var INT
	 */
	public $in_department_id;
	
	/**
	 * @var enum('notreturned','partialreturned','returned')
	 */
	public $in_issue_status;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_in_goods_issueId" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_issue_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"in_issue_to" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"in_inventory_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_issued_items" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"in_returned_items" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"in_department_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"in_issue_status" => array('db_attributes' => array("SET", "ENUM", "'notreturned','partialreturned','returned'")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
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
	
	function es_in_goods_issue($in_issue_date='', $in_issue_to='', $in_inventory_id='', $in_issued_items='', $in_returned_items='', $in_department_id='', $in_issue_status='', $status='')
	{
		$this->in_issue_date = $in_issue_date;
		$this->in_issue_to = $in_issue_to;
		$this->in_inventory_id = $in_inventory_id;
		$this->in_issued_items = $in_issued_items;
		$this->in_returned_items = $in_returned_items;
		$this->in_department_id = $in_department_id;
		$this->in_issue_status = $in_issue_status;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_in_goods_issueId 
	* @return object $es_in_goods_issue
	*/
	function Get($es_in_goods_issueId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_in_goods_issue` where `es_in_goods_issueid`='".intval($es_in_goods_issueId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_goods_issueId = $row['es_in_goods_issueid'];
			$this->in_issue_date = $row['in_issue_date'];
			$this->in_issue_to = $this->Unescape($row['in_issue_to']);
			$this->in_inventory_id = $this->Unescape($row['in_inventory_id']);
			$this->in_issued_items = $this->Unescape($row['in_issued_items']);
			$this->in_returned_items = $this->Unescape($row['in_returned_items']);
			$this->in_department_id = $this->Unescape($row['in_department_id']);
			$this->in_issue_status = $row['in_issue_status'];
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
	* @return array $es_in_goods_issueList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_in_goods_issue` ";
		$es_in_goods_issueList = Array();
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
			$sortBy = "es_in_goods_issueid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		
		//echo $this->pog_query; exit;
		
		$thisObjectName = get_class($this);
//		$cursor = Database::Reader($this->pog_query, $connection);
		$cursor = Database::Reader(stripslashes($this->pog_query), $connection);
		while ($row = Database::Read($cursor))
		{
			$es_in_goods_issue = new $thisObjectName();
			$es_in_goods_issue->es_in_goods_issueId = $row['es_in_goods_issueid'];
			$es_in_goods_issue->in_issue_date = $row['in_issue_date'];
			$es_in_goods_issue->in_issue_to = $this->Unescape($row['in_issue_to']);
			$es_in_goods_issue->in_inventory_id = $this->Unescape($row['in_inventory_id']);
			$es_in_goods_issue->in_issued_items = $this->Unescape($row['in_issued_items']);
			$es_in_goods_issue->in_returned_items = $this->Unescape($row['in_returned_items']);
			$es_in_goods_issue->in_department_id = $this->Unescape($row['in_department_id']);
			$es_in_goods_issue->in_issue_status = $row['in_issue_status'];
			$es_in_goods_issue->status = $row['status'];
			$es_in_goods_issueList[] = $es_in_goods_issue;
		}
		return $es_in_goods_issueList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_in_goods_issueId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_in_goods_issueid` from `es_in_goods_issue` where `es_in_goods_issueid`='".$this->es_in_goods_issueId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_in_goods_issue` set 
			`in_issue_date`='".$this->in_issue_date."', 
			`in_issue_to`='".$this->Escape($this->in_issue_to)."', 
			`in_inventory_id`='".$this->Escape($this->in_inventory_id)."', 
			`in_issued_items`='".$this->Escape($this->in_issued_items)."', 
			`in_returned_items`='".$this->Escape($this->in_returned_items)."', 
			`in_department_id`='".$this->Escape($this->in_department_id)."', 
			`in_issue_status`='".$this->in_issue_status."', 
			`status`='".$this->status."' where `es_in_goods_issueid`='".$this->es_in_goods_issueId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_in_goods_issue` (`in_issue_date`, `in_issue_to`, `in_inventory_id`, `in_issued_items`, `in_returned_items`, `in_department_id`, `in_issue_status`, `status` ) values (
			'".$this->in_issue_date."', 
			'".$this->Escape($this->in_issue_to)."', 
			'".$this->Escape($this->in_inventory_id)."', 
			'".$this->Escape($this->in_issued_items)."', 
			'".$this->Escape($this->in_returned_items)."', 
			'".$this->Escape($this->in_department_id)."', 
			'".$this->in_issue_status."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_goods_issueId == "")
		{
			$this->es_in_goods_issueId = $insertId;
		}
		return $this->es_in_goods_issueId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_in_goods_issueId
	*/
	function SaveNew()
	{
		$this->es_in_goods_issueId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_in_goods_issue` where `es_in_goods_issueid`='".$this->es_in_goods_issueId."'";
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
			$pog_query = "delete from `es_in_goods_issue` where ";
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