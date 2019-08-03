<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_notice` (
	`es_noticeid` int(11) NOT NULL auto_increment,
	`es_title` VARCHAR(255) NOT NULL,
	`es_message` LONGTEXT NOT NULL,
	`es_date` DATE NOT NULL,
	`es_subject` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_noticeid`)) ENGINE=MyISAM;
*/

/**
* <b>es_notice</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_notice&attributeList=array+%28%0A++0+%3D%3E+%27es_title%27%2C%0A++1+%3D%3E+%27es_message%27%2C%0A++2+%3D%3E+%27es_date%27%2C%0A++3+%3D%3E+%27es_subject%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27LONGTEXT%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_notice extends POG_Base
{
	public $es_noticeId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_title;
	
	/**
	 * @var LONGTEXT
	 */
	public $es_message;
	
	/**
	 * @var DATE
	 */
	public $es_date;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_subject;
	
	public $pog_attribute_type = array(
		"es_noticeId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_title" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_message" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"es_date" => array('db_attributes' => array("NUMERIC", "DATE")),
		"es_subject" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_notice($es_title='', $es_message='', $es_date='', $es_subject='')
	{
		$this->es_title = $es_title;
		$this->es_message = $es_message;
		$this->es_date = $es_date;
		$this->es_subject = $es_subject;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_noticeId 
	* @return object $es_notice
	*/
	function Get($es_noticeId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_notice` where `es_noticeid`='".intval($es_noticeId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_noticeId = $row['es_noticeid'];
			$this->es_title = $this->Unescape($row['es_title']);
			$this->es_message = $this->Unescape($row['es_message']);
			$this->es_date = $row['es_date'];
			$this->es_subject = $this->Unescape($row['es_subject']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_noticeList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_notice` ";
		$es_noticeList = Array();
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
			$sortBy = "es_noticeid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_notice = new $thisObjectName();
			$es_notice->es_noticeId = $row['es_noticeid'];
			$es_notice->es_title = $this->Unescape($row['es_title']);
			$es_notice->es_message = $this->Unescape($row['es_message']);
			$es_notice->es_date = $row['es_date'];
			$es_notice->es_subject = $this->Unescape($row['es_subject']);
			$es_noticeList[] = $es_notice;
		}
		return $es_noticeList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_noticeId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_noticeid` from `es_notice` where `es_noticeid`='".$this->es_noticeId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_notice` set 
			`es_title`='".$this->Escape($this->es_title)."', 
			`es_message`='".$this->Escape($this->es_message)."', 
			`es_date`='".$this->es_date."', 
			`es_subject`='".$this->Escape($this->es_subject)."' where `es_noticeid`='".$this->es_noticeId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_notice` (`es_title`, `es_message`, `es_date`, `es_subject` ) values (
			'".$this->Escape($this->es_title)."', 
			'".$this->Escape($this->es_message)."', 
			'".$this->es_date."', 
			'".$this->Escape($this->es_subject)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_noticeId == "")
		{
			$this->es_noticeId = $insertId;
		}
		return $this->es_noticeId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_noticeId
	*/
	function SaveNew()
	{
		$this->es_noticeId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_notice` where `es_noticeid`='".$this->es_noticeId."'";
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
			$pog_query = "delete from `es_notice` where ";
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