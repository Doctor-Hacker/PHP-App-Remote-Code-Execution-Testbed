<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_knowledge_articles` (
	`es_knowledge_articlesid` int(11) NOT NULL auto_increment,
	`kb_category_id` INT NOT NULL,
	`kb_article_name` VARCHAR(255) NOT NULL,
	`kb_article_desc` TEXT NOT NULL,
	`kb_article_date` DATETIME NOT NULL,
	`status` enum('active', 'inactive', 'deleted') NOT NULL,
	`kb_priority` VARCHAR(255) NOT NULL,
	`kb_views` BIGINT NOT NULL,
	`created_by` VARCHAR(255) NOT NULL,
	`person_type` VARCHAR(255) NOT NULL, PRIMARY KEY  (`es_knowledge_articlesid`)) ENGINE=MyISAM;
*/

/**
* <b>es_knowledge_articles</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_knowledge_articles&attributeList=array+%28%0A++0+%3D%3E+%27kb_category_id%27%2C%0A++1+%3D%3E+%27kb_article_name%27%2C%0A++2+%3D%3E+%27kb_article_desc%27%2C%0A++3+%3D%3E+%27kb_article_date%27%2C%0A++4+%3D%3E+%27status%27%2C%0A++5+%3D%3E+%27kb_priority%27%2C%0A++6+%3D%3E+%27kb_views%27%2C%0A++7+%3D%3E+%27created_by%27%2C%0A++8+%3D%3E+%27person_type%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27INT%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27TEXT%27%2C%0A++3+%3D%3E+%27DATETIME%27%2C%0A++4+%3D%3E+%27enum%28%5C%27active%5C%27%2C+%5C%27inactive%5C%27%2C+%5C%27deleted%5C%27%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27BIGINT%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_knowledge_articles extends POG_Base
{
	public $es_knowledge_articlesId = '';

	/**
	 * @var INT
	 */
	public $kb_category_id;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $kb_article_name;
	
	/**
	 * @var TEXT
	 */
	public $kb_article_desc;
	
	/**
	 * @var DATETIME
	 */
	public $kb_article_date;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $status;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $kb_priority;
	
	/**
	 * @var BIGINT
	 */
	public $kb_views;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $created_by;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $person_type;
	
	public $pog_attribute_type = array(
		"es_knowledge_articlesId" => array('db_attributes' => array("NUMERIC", "INT")),
		"kb_category_id" => array('db_attributes' => array("NUMERIC", "INT")),
		"kb_article_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"kb_article_desc" => array('db_attributes' => array("TEXT", "TEXT")),
		"kb_article_date" => array('db_attributes' => array("TEXT", "DATETIME")),
		"status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
		"kb_priority" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"kb_views" => array('db_attributes' => array("NUMERIC", "BIGINT")),
		"created_by" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"person_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function es_knowledge_articles($kb_category_id='', $kb_article_name='', $kb_article_desc='', $kb_article_date='', $status='', $kb_priority='', $kb_views='', $created_by='', $person_type='')
	{
		$this->kb_category_id = $kb_category_id;
		$this->kb_article_name = $kb_article_name;
		$this->kb_article_desc = $kb_article_desc;
		$this->kb_article_date = $kb_article_date;
		$this->status = $status;
		$this->kb_priority = $kb_priority;
		$this->kb_views = $kb_views;
		$this->created_by = $created_by;
		$this->person_type = $person_type;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_knowledge_articlesId 
	* @return object $es_knowledge_articles
	*/
	function Get($es_knowledge_articlesId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_knowledge_articles` where `es_knowledge_articlesid`='".intval($es_knowledge_articlesId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_knowledge_articlesId = $row['es_knowledge_articlesid'];
			$this->kb_category_id = $this->Unescape($row['kb_category_id']);
			$this->kb_article_name = $this->Unescape($row['kb_article_name']);
			$this->kb_article_desc = $this->Unescape($row['kb_article_desc']);
			$this->kb_article_date = $row['kb_article_date'];
			$this->status = $row['status'];
			$this->kb_priority = $this->Unescape($row['kb_priority']);
			$this->kb_views = $this->Unescape($row['kb_views']);
			$this->created_by = $this->Unescape($row['created_by']);
			$this->person_type = $this->Unescape($row['person_type']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_knowledge_articlesList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_knowledge_articles` ";
		$es_knowledge_articlesList = Array();
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
			$sortBy = "es_knowledge_articlesid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_knowledge_articles = new $thisObjectName();
			$es_knowledge_articles->es_knowledge_articlesId = $row['es_knowledge_articlesid'];
			$es_knowledge_articles->kb_category_id = $this->Unescape($row['kb_category_id']);
			$es_knowledge_articles->kb_article_name = $this->Unescape($row['kb_article_name']);
			$es_knowledge_articles->kb_article_desc = $this->Unescape($row['kb_article_desc']);
			$es_knowledge_articles->kb_article_date = $row['kb_article_date'];
			$es_knowledge_articles->status = $row['status'];
			$es_knowledge_articles->kb_priority = $this->Unescape($row['kb_priority']);
			$es_knowledge_articles->kb_views = $this->Unescape($row['kb_views']);
			$es_knowledge_articles->created_by = $this->Unescape($row['created_by']);
			$es_knowledge_articles->person_type = $this->Unescape($row['person_type']);
			$es_knowledge_articlesList[] = $es_knowledge_articles;
		}
		return $es_knowledge_articlesList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_knowledge_articlesId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_knowledge_articlesid` from `es_knowledge_articles` where `es_knowledge_articlesid`='".$this->es_knowledge_articlesId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_knowledge_articles` set 
			`kb_category_id`='".$this->Escape($this->kb_category_id)."', 
			`kb_article_name`='".$this->Escape($this->kb_article_name)."', 
			`kb_article_desc`='".$this->Escape($this->kb_article_desc)."', 
			`kb_article_date`='".$this->kb_article_date."', 
			`status`='".$this->status."', 
			`kb_priority`='".$this->Escape($this->kb_priority)."', 
			`kb_views`='".$this->Escape($this->kb_views)."', 
			`created_by`='".$this->Escape($this->created_by)."', 
			`person_type`='".$this->Escape($this->person_type)."' where `es_knowledge_articlesid`='".$this->es_knowledge_articlesId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_knowledge_articles` (`kb_category_id`, `kb_article_name`, `kb_article_desc`, `kb_article_date`, `status`, `kb_priority`, `kb_views`, `created_by`, `person_type` ) values (
			'".$this->Escape($this->kb_category_id)."', 
			'".$this->Escape($this->kb_article_name)."', 
			'".$this->Escape($this->kb_article_desc)."', 
			'".$this->kb_article_date."', 
			'".$this->status."', 
			'".$this->Escape($this->kb_priority)."', 
			'".$this->Escape($this->kb_views)."', 
			'".$this->Escape($this->created_by)."', 
			'".$this->Escape($this->person_type)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_knowledge_articlesId == "")
		{
			$this->es_knowledge_articlesId = $insertId;
		}
		return $this->es_knowledge_articlesId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_knowledge_articlesId
	*/
	function SaveNew()
	{
		$this->es_knowledge_articlesId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_knowledge_articles` where `es_knowledge_articlesid`='".$this->es_knowledge_articlesId."'";
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
			$pog_query = "delete from `es_knowledge_articles` where ";
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