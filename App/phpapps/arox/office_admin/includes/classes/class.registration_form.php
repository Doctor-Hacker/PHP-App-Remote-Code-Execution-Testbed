<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `form` (
	`formid` int(11) NOT NULL auto_increment,
	`formtype` VARCHAR(255) NOT NULL,
	`receiptno` VARCHAR(255) NOT NULL,
	`cheque_no` VARCHAR(255) NOT NULL,
	`bankname` VARCHAR(255) NOT NULL,
	`wardname` VARCHAR(255) NOT NULL,
	`phno` INT NOT NULL,
	`city` VARCHAR(255) NOT NULL,
	`paymode` VARCHAR(255) NOT NULL,
	`paidamount` INT NOT NULL,
	`cheqdate` DATE NOT NULL,
	`cashdate` DATE NOT NULL,
	`class` VARCHAR(255) NOT NULL,
	`emailid` VARCHAR(255) NOT NULL, PRIMARY KEY  (`formid`)) ENGINE=MyISAM;
*/

/**
* <b>form</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0d / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=form&attributeList=array+%28%0A++0+%3D%3E+%27formtype%27%2C%0A++1+%3D%3E+%27receiptno%27%2C%0A++2+%3D%3E+%27cheque_no%27%2C%0A++3+%3D%3E+%27bankname%27%2C%0A++4+%3D%3E+%27wardname%27%2C%0A++5+%3D%3E+%27phno%27%2C%0A++6+%3D%3E+%27city%27%2C%0A++7+%3D%3E+%27paymode%27%2C%0A++8+%3D%3E+%27paidamount%27%2C%0A++9+%3D%3E+%27cheqdate%27%2C%0A++10+%3D%3E+%27cashdate%27%2C%0A++11+%3D%3E+%27class%27%2C%0A++12+%3D%3E+%27emailid%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++1+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++2+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++3+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++5+%3D%3E+%27INT%27%2C%0A++6+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++7+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++8+%3D%3E+%27INT%27%2C%0A++9+%3D%3E+%27DATE%27%2C%0A++10+%3D%3E+%27DATE%27%2C%0A++11+%3D%3E+%27VARCHAR%28255%29%27%2C%0A++12+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class form extends POG_Base
{
	public $formId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $formtype;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $receiptno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $cheque_no;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $bankname;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $wardname;
	
	/**
	 * @var INT
	 */
	public $phno;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $city;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $paymode;
	
	/**
	 * @var INT
	 */
	public $paidamount;
	
	/**
	 * @var DATE
	 */
	public $cheqdate;
	
	/**
	 * @var DATE
	 */
	public $cashdate;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $class;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $emailid;
	
	public $pog_attribute_type = array(
		"formId" => array('db_attributes' => array("NUMERIC", "INT")),
		"formtype" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"receiptno" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cheque_no" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"bankname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"wardname" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"phno" => array('db_attributes' => array("NUMERIC", "INT")),
		"city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"paymode" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"paidamount" => array('db_attributes' => array("NUMERIC", "INT")),
		"cheqdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"cashdate" => array('db_attributes' => array("NUMERIC", "DATE")),
		"class" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"emailid" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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
	
	function form($formtype='', $receiptno='', $cheque_no='', $bankname='', $wardname='', $phno='', $city='', $paymode='', $paidamount='', $cheqdate='', $cashdate='', $class='', $emailid='')
	{
		$this->formtype = $formtype;
		$this->receiptno = $receiptno;
		$this->cheque_no = $cheque_no;
		$this->bankname = $bankname;
		$this->wardname = $wardname;
		$this->phno = $phno;
		$this->city = $city;
		$this->paymode = $paymode;
		$this->paidamount = $paidamount;
		$this->cheqdate = $cheqdate;
		$this->cashdate = $cashdate;
		$this->class = $class;
		$this->emailid = $emailid;
	}
	
	
	/**
	* Gets object from database
	* @param integer $formId 
	* @return object $form
	*/
	function Get($formId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `form` where `formid`='".intval($formId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->formId = $row['formid'];
			$this->formtype = $this->Unescape($row['formtype']);
			$this->receiptno = $this->Unescape($row['receiptno']);
			$this->cheque_no = $this->Unescape($row['cheque_no']);
			$this->bankname = $this->Unescape($row['bankname']);
			$this->wardname = $this->Unescape($row['wardname']);
			$this->phno = $this->Unescape($row['phno']);
			$this->city = $this->Unescape($row['city']);
			$this->paymode = $this->Unescape($row['paymode']);
			$this->paidamount = $this->Unescape($row['paidamount']);
			$this->cheqdate = $row['cheqdate'];
			$this->cashdate = $row['cashdate'];
			$this->class = $this->Unescape($row['class']);
			$this->emailid = $this->Unescape($row['emailid']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $formList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `form` ";
		$formList = Array();
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
			$sortBy = "formid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$form = new $thisObjectName();
			$form->formId = $row['formid'];
			$form->formtype = $this->Unescape($row['formtype']);
			$form->receiptno = $this->Unescape($row['receiptno']);
			$form->cheque_no = $this->Unescape($row['cheque_no']);
			$form->bankname = $this->Unescape($row['bankname']);
			$form->wardname = $this->Unescape($row['wardname']);
			$form->phno = $this->Unescape($row['phno']);
			$form->city = $this->Unescape($row['city']);
			$form->paymode = $this->Unescape($row['paymode']);
			$form->paidamount = $this->Unescape($row['paidamount']);
			$form->cheqdate = $row['cheqdate'];
			$form->cashdate = $row['cashdate'];
			$form->class = $this->Unescape($row['class']);
			$form->emailid = $this->Unescape($row['emailid']);
			$formList[] = $form;
		}
		return $formList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $formId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `formid` from `form` where `formid`='".$this->formId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `form` set 
			`formtype`='".$this->Escape($this->formtype)."', 
			`receiptno`='".$this->Escape($this->receiptno)."', 
			`cheque_no`='".$this->Escape($this->cheque_no)."', 
			`bankname`='".$this->Escape($this->bankname)."', 
			`wardname`='".$this->Escape($this->wardname)."', 
			`phno`='".$this->Escape($this->phno)."', 
			`city`='".$this->Escape($this->city)."', 
			`paymode`='".$this->Escape($this->paymode)."', 
			`paidamount`='".$this->Escape($this->paidamount)."', 
			`cheqdate`='".$this->cheqdate."', 
			`cashdate`='".$this->cashdate."', 
			`class`='".$this->Escape($this->class)."', 
			`emailid`='".$this->Escape($this->emailid)."' where `formid`='".$this->formId."'";
		}
		else
		{
			$this->pog_query = "insert into `form` (`formtype`, `receiptno`, `cheque_no`, `bankname`, `wardname`, `phno`, `city`, `paymode`, `paidamount`, `cheqdate`, `cashdate`, `class`, `emailid` ) values (
			'".$this->Escape($this->formtype)."', 
			'".$this->Escape($this->receiptno)."', 
			'".$this->Escape($this->cheque_no)."', 
			'".$this->Escape($this->bankname)."', 
			'".$this->Escape($this->wardname)."', 
			'".$this->Escape($this->phno)."', 
			'".$this->Escape($this->city)."', 
			'".$this->Escape($this->paymode)."', 
			'".$this->Escape($this->paidamount)."', 
			'".$this->cheqdate."', 
			'".$this->cashdate."', 
			'".$this->Escape($this->class)."', 
			'".$this->Escape($this->emailid)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->formId == "")
		{
			$this->formId = $insertId;
		}
		return $this->formId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $formId
	*/
	function SaveNew()
	{
		$this->formId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `form` where `formid`='".$this->formId."'";
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
			$pog_query = "delete from `form` where ";
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