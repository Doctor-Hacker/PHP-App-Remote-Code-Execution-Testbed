<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_offerletter` (
	`es_offerletterid` int(11) NOT NULL auto_increment,
	`ofr_message` LONGTEXT NOT NULL, PRIMARY KEY  (`es_offerletterid`)) ENGINE=MyISAM;
*/

/**
* <b>es_offerletter</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_offerletter&attributeList=array+%28%0A++0+%3D%3E+%27ofr_message%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27LONGTEXT%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_offerletter extends POG_Base
{
	public $es_offerletterId = '';

	/**
	 * @var LONGTEXT
	 */
	public $ofr_message;
	
	public $pog_attribute_type = array(
		"es_offerletterId" => array('db_attributes' => array("NUMERIC", "INT")),
		"ofr_message" => array('db_attributes' => array("TEXT", "LONGTEXT")),
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
	
	function es_offerletter($ofr_message='')
	{
		$this->ofr_message = $ofr_message;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_offerletterId 
	* @return object $es_offerletter
	*/
	function Get($es_offerletterId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_offerletter` where `es_offerletterid`='".intval($es_offerletterId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_offerletterId = $row['es_offerletterid'];
			$this->ofr_message = $this->Unescape($row['ofr_message']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_offerletterList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_offerletter` ";
		$es_offerletterList = Array();
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
			$sortBy = "es_offerletterid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_offerletter = new $thisObjectName();
			$es_offerletter->es_offerletterId = $row['es_offerletterid'];
			$es_offerletter->ofr_message = $this->Unescape($row['ofr_message']);
			$es_offerletterList[] = $es_offerletter;
		}
		return $es_offerletterList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_offerletterId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_offerletterid` from `es_offerletter` where `es_offerletterid`='".$this->es_offerletterId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_offerletter` set 
			`ofr_message`='".$this->Escape($this->ofr_message)."' where `es_offerletterid`='".$this->es_offerletterId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_offerletter` (`ofr_message` ) values (
			'".$this->Escape($this->ofr_message)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_offerletterId == "")
		{
			$this->es_offerletterId = $insertId;
		}
		return $this->es_offerletterId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_offerletterId
	*/
	function SaveNew()
	{
		$this->es_offerletterId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_offerletter` where `es_offerletterid`='".$this->es_offerletterId."'";
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
			$pog_query = "delete from `es_offerletter` where ";
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