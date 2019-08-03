<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `es_voucherentry` (
	`es_voucherentryid` int(11) NOT NULL auto_increment,
	`es_vouchertype` VARCHAR(255) NOT NULL,
	`es_receiptno` VARCHAR(255) NOT NULL,
	`es_receiptdate` DATE NOT NULL,
	`es_paymentmode` VARCHAR(255) NOT NULL,
	`es_bankacc` VARCHAR(255) NOT NULL,
	`es_particulars` VARCHAR(255) NOT NULL,
	`es_amount` DOUBLE NOT NULL,
	`es_narration` LONGTEXT NOT NULL,
	`es_vouchermode` VARCHAR(255) NOT NULL,
	`es_checkno` VARCHAR(255) NOT NULL,
	`es_teller_number` BIGINT NOT NULL,
	`es_bank_pin` BIGINT NOT NULL,
	`es_bank_name` VARCHAR(255) NOT NULL,
	`ve_fromfinance` DATE NOT NULL,
	`ve_tofinance` DATE NOT NULL, PRIMARY KEY  (`es_voucherentryid`)) ENGINE=MyISAM;
*/

/**
* <b>es_voucherentry</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=es_voucherentry&attributeList=array+%28%0A++0+%3D%3E+%27es_vouchertype%27%2C%0A++1+%3D%3E+%27es_receiptno%27%2C%0A++2+%3D%3E+%27es_receiptdate%27%2C%0A++3+%3D%3E+%27es_paymentmode%27%2C%0A++4+%3D%3E+%27es_bankacc%27%2C%0A++5+%3D%3E+%27es_particulars%27%2C%0A++6+%3D%3E+%27es_amount%27%2C%0A++7+%3D%3E+%27es_narration%27%2C%0A++8+%3D%3E+%27es_vouchermode%27%2C%0A++9+%3D%3E+%27es_checkno%27%2C%0A++10+%3D%3E+%27es_teller_number%27%2C%0A++11+%3D%3E+%27es_bank_pin%27%2C%0A++12+%3D%3E+%27es_bank_name%27%2C%0A++13+%3D%3E+%27ve_fromfinance%27%2C%0A++14+%3D%3E+%27ve_tofinance%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27DATE%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++6+%3D%3E+%27DOUBLE%27%2C%0A++7+%3D%3E+%27LONGTEXT%27%2C%0A++8+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++9+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++10+%3D%3E+%27BIGINT%27%2C%0A++11+%3D%3E+%27BIGINT%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++13+%3D%3E+%27DATE%27%2C%0A++14+%3D%3E+%27DATE%27%2C%0A%29
*/
include_once('class.pog_base.php');
class es_voucherentry extends POG_Base
{
	public $es_voucherentryId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $es_vouchertype;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_receiptno;
	
	/**
	 * @var DATE
	 */
	public $es_receiptdate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_paymentmode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_bankacc;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_particulars;
	
	/**
	 * @var DOUBLE
	 */
	public $es_amount;
	
	/**
	 * @var LONGTEXT
	 */
	public $es_narration;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_vouchermode;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_checkno;
	
	/**
	 * @var BIGINT
	 */
	public $es_teller_number;
	
	/**
	 * @var BIGINT
	 */
	public $es_bank_pin;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $es_bank_name;
	
	/**
	 * @var DATE
	 */
	public $ve_fromfinance;
	
	/**
	 * @var DATE
	 */
	public $ve_tofinance;
	
	public $pog_attribute_type = array(
		"es_voucherentryId" => array('db_attributes' => array("NUMERIC", "INT")),
		"es_vouchertype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_receiptno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_receiptdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"es_paymentmode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_bankacc" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_particulars" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_amount" => array('db_attributes' => array("NUMERIC", "DOUBLE")),
		"es_narration" => array('db_attributes' => array("TEXT", "LONGTEXT")),
		"es_vouchermode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_checkno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"es_teller_number" => array('db_attributes' => array("NUMERIC", "BIGINT")),
		"es_bank_pin" => array('db_attributes' => array("NUMERIC", "BIGINT")),
		"es_bank_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"ve_fromfinance" => array('db_attributes' => array("NUMERIC", "DATE")),
		"ve_tofinance" => array('db_attributes' => array("NUMERIC", "DATE")),
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
	
	function es_voucherentry($es_vouchertype='', $es_receiptno='', $es_receiptdate='', $es_paymentmode='', $es_bankacc='', $es_particulars='', $es_amount='', $es_narration='', $es_vouchermode='', $es_checkno='', $es_teller_number='', $es_bank_pin='', $es_bank_name='', $ve_fromfinance='', $ve_tofinance='')
	{
		$this->es_vouchertype = $es_vouchertype;
		$this->es_receiptno = $es_receiptno;
		$this->es_receiptdate = $es_receiptdate;
		$this->es_paymentmode = $es_paymentmode;
		$this->es_bankacc = $es_bankacc;
		$this->es_particulars = $es_particulars;
		$this->es_amount = $es_amount;
		$this->es_narration = $es_narration;
		$this->es_vouchermode = $es_vouchermode;
		$this->es_checkno = $es_checkno;
		$this->es_teller_number = $es_teller_number;
		$this->es_bank_pin = $es_bank_pin;
		$this->es_bank_name = $es_bank_name;
		$this->ve_fromfinance = $ve_fromfinance;
		$this->ve_tofinance = $ve_tofinance;
	}
	
	
	/**
	* Gets object from database
	* @param integer $es_voucherentryId 
	* @return object $es_voucherentry
	*/
	function Get($es_voucherentryId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `es_voucherentry` where `es_voucherentryid`='".intval($es_voucherentryId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->es_voucherentryId = $row['es_voucherentryid'];
			$this->es_vouchertype = $this->Unescape($row['es_vouchertype']);
			$this->es_receiptno = $this->Unescape($row['es_receiptno']);
			$this->es_receiptdate = $row['es_receiptdate'];
			$this->es_paymentmode = $this->Unescape($row['es_paymentmode']);
			$this->es_bankacc = $this->Unescape($row['es_bankacc']);
			$this->es_particulars = $this->Unescape($row['es_particulars']);
			$this->es_amount = $this->Unescape($row['es_amount']);
			$this->es_narration = $this->Unescape($row['es_narration']);
			$this->es_vouchermode = $this->Unescape($row['es_vouchermode']);
			$this->es_checkno = $this->Unescape($row['es_checkno']);
			$this->es_teller_number = $this->Unescape($row['es_teller_number']);
			$this->es_bank_pin = $this->Unescape($row['es_bank_pin']);
			$this->es_bank_name = $this->Unescape($row['es_bank_name']);
			$this->ve_fromfinance = $row['ve_fromfinance'];
			$this->ve_tofinance = $row['ve_tofinance'];
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $es_voucherentryList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `es_voucherentry` ";
		$es_voucherentryList = Array();
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
			$sortBy = "es_voucherentryid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$es_voucherentry = new $thisObjectName();
			$es_voucherentry->es_voucherentryId = $row['es_voucherentryid'];
			$es_voucherentry->es_vouchertype = $this->Unescape($row['es_vouchertype']);
			$es_voucherentry->es_receiptno = $this->Unescape($row['es_receiptno']);
			$es_voucherentry->es_receiptdate = $row['es_receiptdate'];
			$es_voucherentry->es_paymentmode = $this->Unescape($row['es_paymentmode']);
			$es_voucherentry->es_bankacc = $this->Unescape($row['es_bankacc']);
			$es_voucherentry->es_particulars = $this->Unescape($row['es_particulars']);
			$es_voucherentry->es_amount = $this->Unescape($row['es_amount']);
			$es_voucherentry->es_narration = $this->Unescape($row['es_narration']);
			$es_voucherentry->es_vouchermode = $this->Unescape($row['es_vouchermode']);
			$es_voucherentry->es_checkno = $this->Unescape($row['es_checkno']);
			$es_voucherentry->es_teller_number = $this->Unescape($row['es_teller_number']);
			$es_voucherentry->es_bank_pin = $this->Unescape($row['es_bank_pin']);
			$es_voucherentry->es_bank_name = $this->Unescape($row['es_bank_name']);
			$es_voucherentry->ve_fromfinance = $row['ve_fromfinance'];
			$es_voucherentry->ve_tofinance = $row['ve_tofinance'];
			$es_voucherentryList[] = $es_voucherentry;
		}
		return $es_voucherentryList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $es_voucherentryId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `es_voucherentryid` from `es_voucherentry` where `es_voucherentryid`='".$this->es_voucherentryId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `es_voucherentry` set 
			`es_vouchertype`='".$this->Escape($this->es_vouchertype)."', 
			`es_receiptno`='".$this->Escape($this->es_receiptno)."', 
			`es_receiptdate`='".$this->es_receiptdate."', 
			`es_paymentmode`='".$this->Escape($this->es_paymentmode)."', 
			`es_bankacc`='".$this->Escape($this->es_bankacc)."', 
			`es_particulars`='".$this->Escape($this->es_particulars)."', 
			`es_amount`='".$this->Escape($this->es_amount)."', 
			`es_narration`='".$this->Escape($this->es_narration)."', 
			`es_vouchermode`='".$this->Escape($this->es_vouchermode)."', 
			`es_checkno`='".$this->Escape($this->es_checkno)."', 
			`es_teller_number`='".$this->Escape($this->es_teller_number)."', 
			`es_bank_pin`='".$this->Escape($this->es_bank_pin)."', 
			`es_bank_name`='".$this->Escape($this->es_bank_name)."', 
			`ve_fromfinance`='".$this->ve_fromfinance."', 
			`ve_tofinance`='".$this->ve_tofinance."' where `es_voucherentryid`='".$this->es_voucherentryId."'";
		}
		else
		{
			$this->pog_query = "insert into `es_voucherentry` (`es_vouchertype`, `es_receiptno`, `es_receiptdate`, `es_paymentmode`, `es_bankacc`, `es_particulars`, `es_amount`, `es_narration`, `es_vouchermode`, `es_checkno`, `es_teller_number`, `es_bank_pin`, `es_bank_name`, `ve_fromfinance`, `ve_tofinance` ) values (
			'".$this->Escape($this->es_vouchertype)."', 
			'".$this->Escape($this->es_receiptno)."', 
			'".$this->es_receiptdate."', 
			'".$this->Escape($this->es_paymentmode)."', 
			'".$this->Escape($this->es_bankacc)."', 
			'".$this->Escape($this->es_particulars)."', 
			'".$this->Escape($this->es_amount)."', 
			'".$this->Escape($this->es_narration)."', 
			'".$this->Escape($this->es_vouchermode)."', 
			'".$this->Escape($this->es_checkno)."', 
			'".$this->Escape($this->es_teller_number)."', 
			'".$this->Escape($this->es_bank_pin)."', 
			'".$this->Escape($this->es_bank_name)."', 
			'".$this->ve_fromfinance."', 
			'".$this->ve_tofinance."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->es_voucherentryId == "")
		{
			$this->es_voucherentryId = $insertId;
		}
		return $this->es_voucherentryId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $es_voucherentryId
	*/
	function SaveNew()
	{
		$this->es_voucherentryId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `es_voucherentry` where `es_voucherentryid`='".$this->es_voucherentryId."'";
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
			$pog_query = "delete from `es_voucherentry` where ";
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