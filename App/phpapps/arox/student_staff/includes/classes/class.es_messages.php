<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_messages` (
	`es_messagesid` int(11) NOT NULL auto_increment,
	`from_id` INT NOT NULL,
	`from_type` VARCHAR(255) NOT NULL,
	`to_id` INT NOT NULL,
	`to_type` VARCHAR(255) NOT NULL,
	`subject` TEXT NOT NULL,
	`message` TEXT NOT NULL,
	`created_on` DATETIME NOT NULL,
	`status` enum('active','inactive','deleted') NOT NULL, PRIMARY KEY  (`es_messagesid`)) ENGINE=MyISAM;
*/

/**
* <b>es_messages</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_messages&attributeList=array+%28%0A++0+%3D%3E+%27from_id%27%2C%0A++1+%3D%3E+%27from_type%27%2C%0A++2+%3D%3E+%27to_id%27%2C%0A++3+%3D%3E+%27to_type%27%2C%0A++4+%3D%3E+%27subject%27%2C%0A++5+%3D%3E+%27message%27%2C%0A++6+%3D%3E+%27created_on%27%2C%0A++7+%3D%3E+%27status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27INT%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27TEXT%27%2C%0A++5+%3D%3E+%27TEXT%27%2C%0A++6+%3D%3E+%27DATETIME%27%2C%0A++7+%3D%3E+%27enum%28%5C%27active%5C%27%2C%5C%27inactive%5C%27%2C%5C%27deleted%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_messages extends POG_Base
{
	public $es_messagesId = '';

	/**
	 * @var INT
	 */
	public $from_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $from_type;
	
	/**
	 * @var INT
	 */
	public $to_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $to_type;
	
	/**
	 * @var TEXT
	 */
	public $subject;
	
	/**
	 * @var TEXT
	 */
	public $message;
	
	/**
	 * @var DATETIME
	 */
	public $created_on;
	
	/**
	 * @var enum('active','inactive','deleted')
	 */
	public $status;
	
	public $pog_attribute_type = array(
		"es_messagesId" => array('db_attributes' => array("NUMERIC", "INT")),
		"from_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"from_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"to_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"to_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"subject" => array('db_attributes' => array("TEXT", "TEXT")),
		"message" => array('db_attributes' => array("TEXT", "TEXT")),
		"created_on" => array('db_attributes' => array("TEXT", "DATETIME")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active','inactive','deleted'")),
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
	
	function es_messages($from_id='', $from_type='', $to_id='', $to_type='', $subject='', $message='', $created_on='', $status='')
	{
		$this->from_id = $from_id;
		$this->from_type = $from_type;
		$this->to_id = $to_id;
		$this->to_type = $to_type;
		$this->subject = $subject;
		$this->message = $message;
		$this->created_on = $created_on;
		$this->status = $status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_messagesId 
	* @return object $es_messages
	*/
	function Get($es_messagesId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_messages` where `es_messagesid`='".intval($es_messagesId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_messagesId = $row['es_messagesid'];
			$this->from_id = $this->Unescape($row['from_id']);
			$this->from_type = $this->Unescape($row['from_type']);
			$this->to_id = $this->Unescape($row['to_id']);
			$this->to_type = $this->Unescape($row['to_type']);
			$this->subject = $this->Unescape($row['subject']);
			$this->message = $this->Unescape($row['message']);
			$this->created_on = $row['created_on'];
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
	* @return array $es_messagesList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_messages` ";
		$es_messagesList = Array();
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
			$sortBy = "es_messagesid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_messages = new $thisObjectName();
			$es_messages->es_messagesId = $row['es_messagesid'];
			$es_messages->from_id = $this->Unescape($row['from_id']);
			$es_messages->from_type = $this->Unescape($row['from_type']);
			$es_messages->to_id = $this->Unescape($row['to_id']);
			$es_messages->to_type = $this->Unescape($row['to_type']);
			$es_messages->subject = $this->Unescape($row['subject']);
			$es_messages->message = $this->Unescape($row['message']);
			$es_messages->created_on = $row['created_on'];
			$es_messages->status = $row['status'];
			$es_messagesList[] = $es_messages;
		}
		return $es_messagesList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_messagesId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_messagesid` from `es_messages` where `es_messagesid`='".$this->es_messagesId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_messages` set 
			`from_id`='".$this->Escape($this->from_id)."', 
			`from_type`='".$this->Escape($this->from_type)."', 
			`to_id`='".$this->Escape($this->to_id)."', 
			`to_type`='".$this->Escape($this->to_type)."', 
			`subject`='".$this->Escape($this->subject)."', 
			`message`='".$this->Escape($this->message)."', 
			`created_on`='".$this->created_on."', 
			`status`='".$this->status."' where `es_messagesid`='".$this->es_messagesId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_messages` (`from_id`, `from_type`, `to_id`, `to_type`, `subject`, `message`, `created_on`, `status` ) values (
			'".$this->Escape($this->from_id)."', 
			'".$this->Escape($this->from_type)."', 
			'".$this->Escape($this->to_id)."', 
			'".$this->Escape($this->to_type)."', 
			'".$this->Escape($this->subject)."', 
			'".$this->Escape($this->message)."', 
			'".$this->created_on."', 
			'".$this->status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_messagesId == "")
		{
			$this->es_messagesId = $insertId;
		}
		return $this->es_messagesId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_messagesId
	*/
	function SaveNew()
	{
		$this->es_messagesId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_messages` where `es_messagesid`='".$this->es_messagesId."'";
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
			$pog_query = "delete from `es_messages` where ";
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