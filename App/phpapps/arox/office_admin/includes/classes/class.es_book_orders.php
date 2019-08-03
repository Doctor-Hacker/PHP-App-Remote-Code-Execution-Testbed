<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_book_orders` (
	`es_bookordersid` int(11) NOT NULL auto_increment,
	`fld_booksupplier` VARCHAR(255) NOT NULL,
	`fld_itempurchased` LONGTEXT NOT NULL,
	`fld_orderdate` DATETIME NOT NULL,
	`fld_recnote` INT NOT NULL,
	`fld_recdate` DATETIME NOT NULL,
	`fld_recbillno` VARCHAR(255) NOT NULL,
	`fld_recitemsreceived` LONGTEXT NOT NULL,
	`fld_totalamount` FLOAT NOT NULL,
	`fld_orderfld_status` enum('pending', 'complete') NOT NULL,
	`fld_status` enum('active', 'inactive', 'deleted') NOT NULL, PRIMARY KEY  (`es_bookordersid`)) ENGINE=MyISAM;
*/

/**
* <b>es_book_orders</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_book_orders&attributeList=array+%28%0A++0+%3D%3E+%27fld_booksupplier%27%2C%0A++1+%3D%3E+%27fld_itempurchased%27%2C%0A++2+%3D%3E+%27fld_orderdate%27%2C%0A++3+%3D%3E+%27fld_recnote%27%2C%0A++4+%3D%3E+%27fld_recdate%27%2C%0A++5+%3D%3E+%27fld_recbillno%27%2C%0A++6+%3D%3E+%27fld_recitemsreceived%27%2C%0A++7+%3D%3E+%27fld_totalamount%27%2C%0A++8+%3D%3E+%27fld_orderfld_status%27%2C%0A++9+%3D%3E+%27fld_status%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27LONGTEXT%27%2C%0A++2+%3D%3E+%27DATETIME%27%2C%0A++3+%3D%3E+%27INT%27%2C%0A++4+%3D%3E+%27DATETIME%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27LONGTEXT%27%2C%0A++7+%3D%3E+%27FLOAT%27%2C%0A++8+%3D%3E+%27enum%28%5C%5C%5C%27pending%5C%5C%5C%27%2C+%5C%5C%5C%27complete%5C%5C%5C%27%29%27%2C%0A++9+%3D%3E+%27enum%28%5C%5C%5C%27active%5C%5C%5C%27%2C+%5C%5C%5C%27inactive%5C%5C%5C%27%2C+%5C%5C%5C%27deleted%5C%5C%5C%27%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_book_orders extends POG_Base
{
	public $es_in_bookordersId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $fld_booksupplier;
	
	/**
	 * @var LONGTEXT
	 */
	public $fld_itempurchased;
	
	/**
	 * @var DATETIME
	 */
	public $fld_orderdate;
	
	/**
	 * @var INT
	 */
	public $fld_recnote;
	
	/**
	 * @var DATETIME
	 */
	public $fld_recdate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $fld_recbillno;
	
	/**
	 * @var LONGTEXT
	 */
	public $fld_recitemsreceived;
	
	/**
	 * @var FLOAT
	 */
	public $fld_totalamount;
	
	/**
	 * @var enum('pending', 'complete')
	 */
	public $fld_orderstatus;
	
	/**
	 * @var enum('active', 'inactive', 'deleted')
	 */
	public $fld_status;
	
	public $pog_attribute_type = array(
		"es_in_bookordersId" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_booksupplier" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_itempurchased" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"fld_orderdate" => array('db_attributes' => array("TEXT", "DATETIME")),
		"fld_recnote" => array('db_attributes' => array("NUMERIC", "INT")),
		"fld_recdate" => array('db_attributes' => array("TEXT", "DATETIME")),
		"fld_recbillno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"fld_recitemsreceived" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"fld_totalamount" => array('db_attributes' => array("NUMERIC", "FLOAT")),
		"fld_orderstatus" => array('db_attributes' => array("SET", "ENUM", "'pending', 'complete'")),
		"fld_status" => array('db_attributes' => array("SET", "ENUM", "'active', 'inactive', 'deleted'")),
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
	
	function es_book_orders($fld_booksupplier='', $fld_itempurchased='', $fld_orderdate='', $fld_recnote='', $fld_recdate='', $fld_recbillno='', $fld_recitemsreceived='', $fld_totalamount='', $fld_orderstatus='', $fld_status='')
	{
		$this->fld_booksupplier = $fld_booksupplier;
		$this->fld_itempurchased = $fld_itempurchased;
		$this->fld_orderdate = $fld_orderdate;
		$this->fld_recnote = $fld_recnote;
		$this->fld_recdate = $fld_recdate;
		$this->fld_recbillno = $fld_recbillno;
		$this->fld_recitemsreceived = $fld_recitemsreceived;
		$this->fld_totalamount = $fld_totalamount;
		$this->fld_orderstatus = $fld_orderstatus;
		$this->fld_status = $fld_status;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_bookordersid 
	* @return object $es_book_orders
	*/
	function Get($es_in_bookordersId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_book_orders` where `es_bookordersid`='".intval($es_in_bookordersId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_in_bookordersId = $row['es_bookordersid'];
			$this->fld_booksupplier = $this->Unescape($row['fld_booksupplier']);
			$this->fld_itempurchased = $this->Unescape($row['fld_itempurchased']);
			$this->fld_orderdate = $row['fld_orderdate'];
			$this->fld_recnote = $this->Unescape($row['fld_recnote']);
			$this->fld_recdate = $row['fld_recdate'];
			$this->fld_recbillno = $this->Unescape($row['fld_recbillno']);
			$this->fld_recitemsreceived = $this->Unescape($row['fld_recitemsreceived']);
			$this->fld_totalamount = $this->Unescape($row['fld_totalamount']);
			$this->fld_orderstatus = $row['fld_orderstatus'];
			$this->fld_status = $row['fld_status'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_book_ordersList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_book_orders` ";
		$es_book_ordersList = Array();
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
			$sortBy = "es_bookordersid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_book_orders = new $thisObjectName();
			$es_book_orders->es_in_bookordersId = $row['es_bookordersid'];
			$es_book_orders->fld_booksupplier = $this->Unescape($row['fld_booksupplier']);
			$es_book_orders->fld_itempurchased = $this->Unescape($row['fld_itempurchased']);
			$es_book_orders->fld_orderdate = $row['fld_orderdate'];
			$es_book_orders->fld_recnote = $this->Unescape($row['fld_recnote']);
			$es_book_orders->fld_recdate = $row['fld_recdate'];
			$es_book_orders->fld_recbillno = $this->Unescape($row['fld_recbillno']);
			$es_book_orders->fld_recitemsreceived = $this->Unescape($row['fld_recitemsreceived']);
			$es_book_orders->fld_totalamount = $this->Unescape($row['fld_totalamount']);
			$es_book_orders->fld_orderstatus = $row['fld_orderstatus'];
			$es_book_orders->fld_status = $row['fld_status'];
			$es_book_ordersList[] = $es_book_orders;
		}
		return $es_book_ordersList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_bookordersid
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_bookordersid` from `es_book_orders` where `es_bookordersid`='".$this->es_in_bookordersId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_book_orders` set 
			`fld_booksupplier`='".$this->Escape($this->fld_booksupplier)."', 
			`fld_itempurchased`='".$this->Escape($this->fld_itempurchased)."', 
			`fld_orderdate`='".$this->fld_orderdate."', 
			`fld_recnote`='".$this->Escape($this->fld_recnote)."', 
			`fld_recdate`='".$this->fld_recdate."', 
			`fld_recbillno`='".$this->Escape($this->fld_recbillno)."', 
			`fld_recitemsreceived`='".$this->Escape($this->fld_recitemsreceived)."', 
			`fld_totalamount`='".$this->Escape($this->fld_totalamount)."', 
			`fld_orderstatus`='".$this->fld_orderstatus."', 
			`fld_status`='".$this->fld_status."' where `es_bookordersid`='".$this->es_in_bookordersId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_book_orders` (`fld_booksupplier`, `fld_itempurchased`, `fld_orderdate`, `fld_recnote`, `fld_recdate`, `fld_recbillno`, `fld_recitemsreceived`, `fld_totalamount`, `fld_orderstatus`, `fld_status` ) values (
			'".$this->Escape($this->fld_booksupplier)."', 
			'".$this->Escape($this->fld_itempurchased)."', 
			'".$this->fld_orderdate."', 
			'".$this->Escape($this->fld_recnote)."', 
			'".$this->fld_recdate."', 
			'".$this->Escape($this->fld_recbillno)."', 
			'".$this->Escape($this->fld_recitemsreceived)."', 
			'".$this->Escape($this->fld_totalamount)."', 
			'".$this->fld_orderstatus."', 
			'".$this->fld_status."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_in_bookordersId == "")
		{
			$this->es_in_bookordersId = $insertId;
		}
		return $this->es_in_bookordersId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_bookordersid
	*/
	function SaveNew()
	{
		$this->es_in_bookordersId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_book_orders` where `es_bookordersid`='".$this->es_in_bookordersId."'";
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
			$pog_query = "delete from `es_book_orders` where ";
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