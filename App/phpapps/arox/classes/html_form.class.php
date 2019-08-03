<?php 
/********************************* Guide lines to usage********************************
$html = new html_form();

  //// SELECT BOX/////
$selectoptions = array('select_one'=>'Select One', 'name'=>"prabhakr", 'graduation'=>'btech', 'job'=>"swe"); 
echo $html->draw_selectfeild($persondata, $selectoptions, 'name', ' class="cssclass" style="width:150px;" ' );
 
*******************************************************************************************************/

class html_form{

/**
*  Validation for set values
*/
	function is_setvalue($setvalue){
		if ( isset ( $setvalue ) && is_string($setvalue) ) {
			$this->rs_setvalue = $setvalue; 
			return true;
		}else{
			return false;
		}
	}

/**
*  Validation for  null and set values
*/
	function isset_notnull($setvalue){
		if ( isset ( $setvalue )&& is_string($setvalue)&& $setvalue !=""  ) {$this->rs_set_notnullvalue = $setvalue; return true;}
		else return false;
	}

	// Parse the data used in the html tags to ensure the tags will not break
  function parse_input($data, $parse) {
    return strtr(trim($data), $parse);
}

  function output_string($string, $translate = false, $protected = false) {
    if ($protected == true) {
      return htmlspecialchars($string);
    } else {
      if ($translate == false) {
        return $this->parse_input($string, array('"' => '&quot;'));
      } else {
        return $this->parse_input($string, $translate);
      }
    }
  }

/////// Actuall functions///
 function textbox($name, $value = '', $parameters = '', $type = 'text', $override= true) {
    global $_GET, $_POST;

    $field = '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';

    if ( ($override == true) && ( (isset($_GET[$name]) && is_string($_GET[$name])) || (isset($_POST[$name]) && is_string($_POST[$name])) ) ) {
      if (isset($_GET[$name]) && is_string($_GET[$name])) {
        $value = stripslashes($_GET[$name]);
      } elseif (isset($_POST[$name]) && is_string($_POST[$name])) {
        $value = stripslashes($_POST[$name]);
      }
    }

    if ($this->isset_notnull($value)) {
      $field .= ' value="' .$value. '"';
    }

    if ($parameters!="") $field .= ' ' . $parameters;

    $field .= '>';

    return $field;
  }

// Output a select box
	function selectbox($name, $options, $select='', $parameters = null,   $override = true) {
		global $_GET, $_POST;
		$selectbox = '<select  name="' . $name . '" id="' . $name . '" ';
		
		if ($this->isset_notnull($parameters)) 
			$selectbox .= ' ' . $parameters;
		
		$selectbox .= ' >';
		
		if ($options!="" && count($options)>0){
			foreach($options as $keyoption=>$eachoption){
				$selectbox .= '<option value="' . $keyoption . '" ';
				
				if ( ( $this->is_setvalue($GLOBALS[$name]) || $this->is_setvalue($_GET[$name]) || $this->is_setvalue($_POST[$name]) ) && ($override) ) {
					if ($keyoption == $this->rs_setvalue){
						$selectbox .= ' selected ';
						unset($this->rs_setvalue);
					}

				}elseif($keyoption == $select && $select!=''){
					$selectbox .= ' selected ';
				}
				$selectbox .= ' >' . $eachoption . '</option>';
			}
		} 
			$selectbox .= '</select>';
		return $selectbox;
  }

/////  OLD //////////

/**
*  Output a form TEXTBOX field
*/
	function draw_inputfield($name, $value="", $type='text', $parameters = null, $override = true) {
		
		global $_POST,$_GET, $GLOBALS;
		if($type=='')
			$type = "text";
		
		$field = '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';
		
		if (($this->is_setvalue($GLOBALS[$name])||$this->is_setvalue($GLOBALS[$name])||$this->is_setvalue($GLOBALS[$name]))&&($override)){			  
			$field .= ' value="' . stripslashes($this->rs_setvalue) . '" ';
				 
		}elseif (!($override)) {
				$field .= '';
		}elseif ($value != '') {
				$field .= '  value="' . stripslashes($value) . '" ';
		}

		if ( $this->isset_notnull($parameters)) $field .= ' ' . $parameters;
			$field .= '>';
			unset($this->rs_setvalue);
		return $field;
	}

/**
*  Output a selection field - alias function for draw_checkbox() and draw_radiobutton()
*/  
  function checked_field($name, $type, $value = '', $checked = false, $parameters = '') {
		
		global $GLOBALS, $_GET,$_POST;
		
		$checkbox = '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';

		if (isset($value)&&$value!="") $checkbox .= ' value="' . $value. '"';

		if ( ($checked == true) || (isset($_GET[$name]) && is_string($_GET[$name]) && (($_GET[$name] == 'on') || (stripslashes($_GET[$name]) == $value))) || (isset($_POST[$name]) && is_string($_POST[$name]) && (($_POST[$name] == 'on') || (stripslashes($_POST[$name]) == $value)))|| (isset($GLOBALS[$name]) && is_string($GLOBALS[$name]) && (($GLOBALS[$name] == 'on') || (stripslashes($GLOBALS[$name]) == $value))) ) {
      	  $checkbox .= ' CHECKED';
    }

	if ( $this->isset_notnull($parameters) ) $checkbox .= ' ' . $parameters;
    $checkbox .= '>';

    return $checkbox;
  }

/**
*  Output a form CHECKBOX field
*/ 
  function draw_checkbox($name, $value = '', $checked = false, $parameters = '') {
		return $this->checked_field($name, 'checkbox', $value, $checked, $parameters);
  }

/**
*  Output a form RADIOBUTTON field
*/
  function draw_radiobutton($name, $value = '', $checked = false, $parameters = '') {
	  return $this->checked_field($name, 'radio', $value, $checked, $parameters);
  }
 
 /**
 * password field
 */

	function draw_passwordfield($name, $parameters = null) {
		return $this->draw_inputfield($name, null, 'password', $parameters, false);
	}
/**
* Hidden field
*/
	function draw_hiddenfield($name, $value) {
		return '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '">';
	}
/**
* Select box
*/
	function draw_selectfield($name, $option_values = array(), $select='', $parameters = null, $override = true) {
		
		$selectfeild = '<select  name="' . $name . '" id="' . $name . '" ';
		
		if ($this->isset_notnull($parameters)) $selectfeild .= ' ' . $parameters;
		
		$selectfeild .= ' >';
		
		
		if($option_values!="" && count($option_values)>0)
		foreach($option_values as $keyoption=>$eachoption){
			
			$selectfeild .= '<option value="' . $keyoption . '" ';
			
			if (($this->is_setvalue($GLOBALS[$name])||$this->is_setvalue($_GET[$name])||$this->is_setvalue($_POST[$name]))&&($override)) {
				if ($keyoption == $this->rs_setvalue){
					$selectfeild .= ' selected ';
					unset($this->rs_setvalue);
				}

			}elseif($keyoption==$select && $select!=''){
				$selectfeild .= ' selected ';
			}
			$selectfeild .= ' >' . $eachoption . '</option>';
		} 
			$selectfeild .= '</select>';
		//echo $selectfeild;exit;
		return $selectfeild;
	}

/**
* Select box
*/
	function draw_multiple_selectfield($name, $option_values = array(), $selectvalues=array(), $parameters = null, $override = true) {
		
		$selectfeild = '<select  name="' . $name . '" id="' . $name . '" ';
		
		if ($this->isset_notnull($parameters)) $selectfeild .= ' ' . $parameters;
		
		$selectfeild .= ' multiple >';
		
		
		if($option_values!="" && count($option_values)>0)
			foreach($option_values as $keyoption=>$eachoption) {
				
				$selectfeild .= '<option value="' . $keyoption . '" ';
				
				if ( ( $this->is_setvalue($GLOBALS[$name]) || $this->is_setvalue($_GET[$name]) || $this->is_setvalue($_POST[$name])) && ($override) ) {
					if (is_array($this->rs_setvalue) && in_array($keyoption, $this->rs_setvalue)) {
						$selectfeild .= ' selected ';
						unset($this->rs_setvalue);
					}
	
				} elseif (is_array($selectvalues) && in_array($keyoption, $selectvalues)){
					$selectfeild .= ' selected ';
				}
				$selectfeild .= ' >' . $eachoption . '</option>';
			}
		$selectfeild .= '</select>';
		
		return $selectfeild;
	}

	function draw_textarea($name, $value = null, $parameters = null, $override = true){
		
		$textareafield = '<textarea name="' . $name . '" id="' . $name . '"';
		
		if ($this->isset_notnull($parameters)) $textareafield .= ' ' . $parameters;		
		
		$textareafield .= ' >';

		if ((isset($GLOBALS[$name])||isset($_GET[$name])||isset($_POST[$name]))&&($override)){
			
			if (isset($GLOBALS[$name]))
				$this->is_setvalue($GLOBALS[$name]);
			if (isset($_GET[$name]))
				$this->is_setvalue($_GET[$name]);
			if (isset($_POST[$name]))
				$this->is_setvalue($_POST[$name]);

			$textareafield .= @stripslashes($this->rs_setvalue);
		}elseif(isset($value)&&($value != ''||$value !=null) ) {
			$textareafield .= @htmlspecialchars($value);
		}
		$textareafield .= '</textarea>';
		return $textareafield;
	}
/*** 
* Display Profile array
* 
*/
function showprofile(	
					$profile_arr = array(), 
					$ltdattribs	 = '', 
					$rtdattribs  = '',  
					$tbl_width   = "100%", 
					$tblattribs  = 'border="0" cellpadding="1"  cellspacing="0"', 
					$tblclass    = '' ){
	
	$table = '<table  width="' . $tbl_width . '"  ' . $tblattribs . '  '.$tblclass.'  >';
	
	if (is_array($profile_arr) && count($profile_arr)>0){
		
		foreach ($profile_arr as $key => $value) {    
			
			if ($key!="" || $value!=""){
				
				$table .= '<tr>';
				$table .= '<td ' . $ltdattribs . ' ><b> ' . $key . ' </b></td>';
				$table .= '<td align="center" width="5%" valign="top"> : </td>';
				$table .= '<td align="left"   ' . $rtdattribs . ' > ' . ucwords(strtolower($value)) . ' </td>';
				$table .= '</tr>';
			}
		}
	}else{
		
		$table .= '<tr><td colspan="2" align="center">No Record Available</td></tr>';
	}
	
	$table .= '</table>';
	
	return $table;
}

/**
* Display error
*/ 
	function displayErrormsg($message, $cssclas = "") {
	   if (isset($message)&&$message!=""){
	      return '<div  ' . $cssclas . ' >' . $message . '</div>';
	   }
	   return;
	}

}

?>