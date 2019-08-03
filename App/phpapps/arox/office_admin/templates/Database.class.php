<?php
/*
 * Database.class.php -- Version 01-Feb-2006
 *
 * Copyright (c) 2003-2006 Jochen Kupperschmidt <webmaster@nwsnet.de>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 * The above license is the MIT License. It was copied from the website of the
 * Open Source Initiative: http://www.opensource.org/licenses/mit-license.php
 *   _                               _
 *  | |_ ___ _____ ___ _ _ _ ___ ___| |_
 *  |   | . |     | ._| | | | . |  _| . /
 *  |_|_|___|_|_|_|___|_____|___|_| |_|_\
 *    http://homework.nwsnet.de/
 *
 * This is a database wrapper that provides a layer that is independent of the
 * DBMS (e.g. MySQL, PostgreSQL) you actually use. It provides a set of common
 * methods to retrieve results as single value, (associative) arrays and
 * two-dimensional arrays for much simpler code.
 *
 * In addition, you can use '?' placeholders to write cleaner query strings.
 * The actual values are appended to the function by appending an array
 * containing the required variables.
 *
 * Example usage:
 *
 *      # Create database object.
 *      $db = new Database('myHost', 'myUser', 'myPassword', 'myDatabase');
 *
 *      # Fetch a single value.
 *      $rowCount = $db->getOne('
 *          SELECT COUNT(*)
 *          FROM `some_table`;
 *      ');
 *      printf('Row count: %s', $rowCount);
 *
 *      # Fetch a single row using a single placeholder.
 *      $id = 123;
 *      $row = $db->getRow('
 *          SELECT firstname, lastname, age
 *          FROM `persons`
 *          WHERE id = ?;
 *      ', array($id));
 *      print_r($row);
 *
 *      # Fetch multiple rows using multiple placeholders.
 *      $firstname = 'Joe';
 *      $minimumAge = 30;
 *      $rows = $db->getRows('
 *          SELECT firstname, lastname, age
 *          FROM `persons`
 *          WHERE firstname = ? AND age > ?;
 *      ', array($firstname, $minimumAge));
 *      print_r($rows);
 *
 *      # Insert a row using placeholders with auto-escaping.
 *      $db->query('
 *          INSERT INTO `persons`
 *          (firstname, lastname, age)
 *          VALUES (?, ?, ?);
 *      ', array($firstname, $lastname, $age));
 *
 *      # Insert a row using the SQL-free method with an associative array.
 *      $db->insert('persons', array(
 *          'firstname' => $firstname,
 *          'lastname' => $lastname,
 *          'age' => $age
 *          ));
 *
 *      # Updating/deleting:
 *      # If the WHERE clause would only contain the ID, you can pass just it.
 *      $id = 123;
 *
 *      # Update some rows.
 *      $db->update('persons', 'age = age + 1', $id);
 *      $db->update('persons', 'firstname = ?, lastname = ?', $id,
 *                  array('John', 'Doe'));
 *
 *      # Delete some rows.
 *      $db->delete('persons', 'age < 18');
 *      $db->delete('persons', $id);
 */
/**



*/


class Database
{
    # Constructor. Create an instance of this class with this.
    # You would generally need just one.
	

	private static $_singleton;
	private $linkID;
	private function __construct($hostname, $username, $password, $database, $debug=False){
		$this->debug = $debug;
		$this->linkID = 0;
		$this->queryID = 0;
		$this->queryCount = 0;
		$this->errNo = 0;
		$this->errStr = '';
		
		//$this->_connection = mysql_connect();
		 if (! ($hostname and $username and $database))
            $this->halt('Missing parameters.');

		$this->linkID = mysql_connect($hostname, $username, $password);

		if (! $this->linkID)
            $this->halt('linkID == False. Connect failed.');
        
		if (! mysql_select_db($database, $this->linkID))
            $this->halt("Cannot use database '$database'.");

	}
	public static function getInstance($hostname, $username, $password, $database, $debug=False){
		if (is_null (self::$_singleton)) {
			self::$_singleton = new Database($hostname, $username, $password, $database, $debug=False);
		}
		return self::$_singleton;
	}
  
  
  /*  function Database($hostname, $username, $password, $database, $debug=False)
    {
        $this->debug = $debug;
        $this->linkID = 0;
        $this->queryID = 0;
        $this->queryCount = 0;
        $this->errNo = 0;
        $this->errStr = '';

        if (! ($hostname and $username and $database))
            $this->halt('Missing parameters.');
        
		
		$this->linkID = mysql_connect($hostname, $username, $password);
        
		
		if (! $this->linkID)
            $this->halt('linkID == False. Connect failed.');
        
		if (! mysql_select_db($database, $this->linkID))
            $this->halt("Cannot use database '$database'.");
    }*/

    # Halt because an error occured.
    function halt($msg)
    {
        trigger_error(
            sprintf("Database error %d: %s<br />%s\n",
                    $this->errNo, $this->errStr, $msg),
            E_USER_ERROR);
    }

    # ---------------------------------------------------------------- #

    # Escape ' and " to prevent SQL injection.
    function quote($str)
    {
        # React corresponding to en-/disabled magic_quotes_gpc.
        if (get_magic_quotes_gpc())
            $str = stripslashes($str);
        $str = mysql_real_escape_string($str);

        # Quote string if not an integer.
        //if (! is_numeric($str) or (intval($str) != $str))
            $str = "'$str'";
        return $str;
    }

    # Process ? placeholders in the query string.
    function buildQuery($sql, $params=array())
    {
        # Transform ? placeholders to %s for use with sprintf().
        $sql_raw = strtr($sql, array('%' => '%%', '?' => '%s'));

        # Build and execute sprintf code.
        $toeval = '$sql = sprintf($sql_raw';
        for ($i = 0; $i < count($params); $i++)
            $toeval .= ', $this->quote($params[' . $i . '])';
        $toeval .= ');';
        eval($toeval);

        return $sql;
    }

    # Execute a query and return the result (if available).
    function query($sql, $params=array())
    {
        $sql = chop($sql);
        if ($params)
            $sql = $this->buildQuery($sql, $params);

        $this->queryCount++;
        if ($this->debug)
            printf("SQL query #%d: %s<br />\n", $this->queryCount, $sql);
	//echo $sql;
        $this->queryID = mysql_query($sql, $this->linkID);
        $this->errNo = mysql_errno();
        $this->errStr = mysql_error();
        if (! $this->queryID)
            $this->halt('Invalid SQL: ' . $sql);

        return $this->queryID;
    }

    # ---------------------------------------------------------------- #

    # Fetch and return the value of the first column of the first row.
    function getOne($sql, $params=array())
    {
        $result = $this->query($sql, $params);
        $row = mysql_fetch_array($result);
        return $row[0];
    }

    # Fetch a single column and return it as array.
    function getCol($sql, $params=array())
    {
        $fields = array();
        for (
            $result = $this->query($sql, $params);
            $row = mysql_fetch_array($result);
            $fields[] = $row[0]);
        return $fields;
    }

    # Fetch the first row and return an associative array using the column
    # names as keys and the row's fields as their values.
    function getRow($sql, $params=array())
    {
	$result = $this->query($sql, $params);
	return mysql_fetch_assoc($result);
    }

    # Fetch multiple rows and return an array of associative arrays that use
    # the column names as keys and the row's fields as their values.
    function getRows($sql, $params=array())
    {
        $rows = array();
        for (
            $result = $this->query($sql, $params);
            $row = mysql_fetch_assoc($result);
            $rows[] = $row);
        return $rows;
    }

    # ---------------------------------------------------------------- #

    # Insert a row into a table.
    function insert($table, $values)
    {
        $this->query(
            sprintf(
                'INSERT INTO `%s` (%s) VALUES (%s);',
                $table,
                join(', ', array_keys($values)),
                join(', ', array_fill(0, count($values), '?'))
                ),
            array_values($values));
        return mysql_insert_id();
    }

    # Update one or more rows in a table.
    # If $where is an integer, the row with that ID will be updated.
    function update($table, $set, $where, $params=array())
    {
        if (ctype_digit((string) $where))
            $where = 'id = ' . $where;
            
          // echo sprintf('UPDATE `%s` SET %s WHERE %s;', $table, $set, $where);exit;
        $this->query(
            sprintf('UPDATE `%s` SET %s WHERE %s;', $table, $set, $where),
            $params);
    }

    # Delete one or more rows in a table.
    # If $where is an integer, the row with that ID will be deleted.
    function delete($table, $where, $params=array())
    {
        if (ctype_digit((string) $where))
            $where = 'id = ' . $where;
        $this->query(
            sprintf('DELETE FROM `%s` WHERE %s;', $table, $where),
            $params);
    }

    # ---------------------------------------------------------------- #

    # Return the number of fields in the most recently retrieved result.
    function numCols()
    {
        return mysql_num_fields($this->queryID);
    }

    # Return the number of rows in the most recently retrieved result.
    function numRows()
    {
        return mysql_num_rows($this->queryID);
    }

    # Return the number of affected rows in the most recently executed query.
    function affectedRows()
    {
        return mysql_affected_rows($this->queryID);
    }

    # Return the number of queries executed so far.
    function getQueryCount()
    {
        return $this->queryCount;
    }
}
    
	
	define("DB_MYSQL_HOST", "localhost" );
	define("DB_MYSQL_USERNAME", "data_ems2011" );
	define("DB_MYSQL_PASSWORD", "apexems" );
	define("DB_MYSQL_DATABASE", "data_ems" );

	
	$db = Database::getInstance(DB_MYSQL_HOST, DB_MYSQL_USERNAME, DB_MYSQL_PASSWORD, DB_MYSQL_DATABASE);
?>