<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_bookissue` (
	`es_bookissueid` int(11) NOT NULL auto_increment,
	`bki_id` INT NOT NULL,
	`bki_bookid` INT NOT NULL,
	`issuetype` VARCHAR(255) NOT NULL,
	`issuedate` DATE NOT NULL,
	`status` enum('active','inactive') NOT NULL, PRIMARY KEY  (`es_bookissueid`)) ENGINE=MyISAM;
*/

/**
* <b>es_bookissue</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_bookissue&attributeList=array+%28%0A++0+%3D%3E+%27bki_id%27%2C%0A++1+%3D%3E+%27bki_bookid%27%2C%0A++2+%3D%3E+%27issuetype%27%2C%0A++3+%3D%3E+%27issuedate%27%2C%0A++4+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27INT%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27DATE%27%2C%0A++4+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C%5C%5C%5C%27inactive%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_bookissue extends POG_Base
{
	public $es_bookissueId = '';

	/**
	 * @var INT
	 */
	public $bki_id;
	
	/**
	 * @var INT
	 */
	public $bki_bookid;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $issuetype;
	
	/**
	 * @var DATE
	 */
	public $issuedate;
	
	/**
	 * @var enum('active','inactive')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_bookissueId" => array('db_attributes' => array("NUMERIC", "INT")),
		"bki_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"bki_bookid" => array('db_attributes' => array("NUMERIC", "INT")),
		"issuetype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"issuedate" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_bookissue($bki_id='', $bki_bookid='', $issuetype='', $issuedate='', $status='')
	{
		$this->bki_id = $bki_id;
		$this->bki_bookid = $bki_bookid;
		$this->issuetype = $issuetype;
		$this->issuedate = $issuedate;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_bookissueId 
	* @return object $es_bookissue
	*/
	function Get($es_bookissueId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_bookissue` where `es_bookissueid`='".intval($es_bookissueId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_bookissueId = $row['es_bookissueid'];
			$this->bki_id = $this->Unescape($row['bki_id']);
			$this->bki_bookid = $this->Unescape($row['bki_bookid']);
			$this->issuetype = $this->Unescape($row['issuetype']);
			$this->issuedate = $row['issuedate'];
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
	* @return array $es_bookissueList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_bookissue` ";
		$es_bookissueList = Array();
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
						/****Narasimha */
						if (strstr($value, ' AND ')) {
							list($d1, $d2 ) = explode('AND',$value);
							$value =  "   " . $d1 . "'   AND  '" . $d2;
						} 
						/****Narasimha ****/
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
			$sortBy = "es_bookissueid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_bookissue = new $thisObjectName();
			$es_bookissue->es_bookissueId = $row['es_bookissueid'];
			$es_bookissue->bki_id = $this->Unescape($row['bki_id']);
			$es_bookissue->bki_bookid = $this->Unescape($row['bki_bookid']);
			$es_bookissue->issuetype = $this->Unescape($row['issuetype']);
			$es_bookissue->issuedate = $row['issuedate'];
			$es_bookissue->status = $row['status'];
			$es_bookissueList[] = $es_bookissue;
		}
		return $es_bookissueList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_bookissueId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_bookissueid` from `es_bookissue` where `es_bookissueid`='".$this->es_bookissueId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_bookissue` set 
			`bki_id`='".$this->Escape($this->bki_id)."', 
			`bki_bookid`='".$this->Escape($this->bki_bookid)."', 
			`issuetype`='".$this->Escape($this->issuetype)."', 
			`issuedate`='".$this->issuedate."', 
			`status`='".$this->status."' where `es_bookissueid`='".$this->es_bookissueId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_bookissue` (`bki_id`, `bki_bookid`, `issuetype`, `issuedate`, `status` ) values (
			'".$this->Escape($this->bki_id)."', 
			'".$this->Escape($this->bki_bookid)."', 
			'".$this->Escape($this->issuetype)."', 
			'".$this->issuedate."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_bookissueId == "")
		{
			$this->es_bookissueId = $insertId;
		}
		return $this->es_bookissueId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_bookissueId
	*/
	function SaveNew()
	{
		$this->es_bookissueId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_bookissue` where `es_bookissueid`='".$this->es_bookissueId."'";
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
			$pog_query = "delete from `es_bookissue` where ";
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