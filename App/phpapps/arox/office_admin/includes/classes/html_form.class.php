<?php 
/********************************* Guide lines to usage********************************
$html = new html_form();

  //// SELECT BOX/////
$selectoptions = array('select_one'=>'Select One', 'name'=>"prabhakr", 'graduation'=>'btech', 'job'=>"swe"); 
echo $html->draw_selectfeild($persondata, $selectoptions, 'name', ' class="cssclass" style="width:150px;" ' );
 
***************************************************************************************/

class html_form{

/**
*  Validation for set values
*/
	function is_setvalue($setvalue){
		if ( isset ( $setvalue ) && is_string($setvalue) ) {$this->rs_setvalue = $setvalue; return true;}
		else return false;
	}

/**
*  Validation for  null and set values
*/
	function isset_notnull($setvalue){
		if ( isset ( $setvalue )&& is_string($setvalue)&& $setvalue !=""  ) {$this->rs_set_notnullvalue = $setvalue; return true;}
		else return false;
	}

/**
*  Output a form TEXTBOX field
*/
	function draw_inputfield($name, $value=null, $type='text', $parameters = null, $override = true) {
		if($type=='')
			$type = "text";
		
		$field = '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';
		
		if  ( ( $this->is_setvalue($GLOBALS[$name]) || $this->is_setvalue($_GET[$name]) || $this->is_setvalue($_POST[$name]) ) && ( $override ) ) 
			{			  
			  $field .= ' value="' . stripslashes($this->rs_setvalue) . '" ';
			  unset($this->rs_setvalue);
			}
			elseif (!($override)) {
				$field .= '';
			}elseif ($value != '') {
				$field .= '  value="' . stripslashes($value) . '" ';
			}

		if ( $this->isset_notnull($parameters)) $field .= ' ' . $parameters;
			$field .= '>';
		return $field;
	}

/**
*  Output a selection field - alias function for draw_checkbox() and draw_radiobutton()
*/  
  function checked_field($name, $type, $value = '', $checked = false, $parameters = '') {
		
		global $GLOBALS;
		global $_GET; 
		global $_POST;
		
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
	function draw_selectfield($name, $option_values = array(), $select='', $parameters = null, $override = true){
		
		$selectfeild = '<select  name="' . $name . '" id="' . $name . '" ';
		
		if ($this->isset_notnull($parameters)) $selectfeild .= ' ' . $parameters;
		
		$selectfeild .= ' >';
		
		$selectfeild .= '<option value="">Select</option>';
		if($option_values!="" && count($option_values)>0)
		foreach($option_values as $keyoption=>$eachoption){
			
			$selectfeild .= '<option value="' . $keyoption . '" ';
			
			if ( ( $this->is_setvalue($GLOBALS[$name]) || $this->is_setvalue($_GET[$name]) || $this->is_setvalue($_POST[$name]) )  && ($override) ) {
				
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
		return $selectfeild;
	}

	function draw_textarea($name, $value = null, $parameters = null, $override = true){
		
		$textareafield = '<textarea name="' . $name . '" id="' . $name . '"';
		
		if ($this->isset_notnull($parameters)) $textareafield .= ' ' . $parameters;		
		
		$textareafield .= ' >';

		if ( ($this->is_setvalue($GLOBALS[$name]) || $this->is_setvalue($_GET[$name]) ||	$this->is_setvalue($_POST[$name])) && ($override) ){
			$textareafield .= @stripslashes($this->rs_setvalue);
		}elseif($value != '') {
			$textareafield .= @htmlspecialchars($value);
		}

		$textareafield .= '</textarea>';
		return $textareafield;
	}
/*** 
* Display Profile array
* 
*/
	function showprofile($profile_arr = array() , $ltdattribs = '',  $rtdattribs = '',  $tbl_width = "100%", $tblattribs = 'border="1" cellpadding="1"  cellspacing="0"', $tblclass = '' ){
		$table = '<table  width="' . $tbl_width . '"  ' . $tblattribs . '  ' . $tableclass . '  >';
		if (is_array($profile_arr) && count($profile_arr)>0){
			foreach ($profile_arr as $key => $value) {    
				$table .= '<tr>';
				$table .= '<td width="29%" align="right"  ' . $ltdattribs . ' > ' . $key . ' </td>';
				$table .= '<td width="2%"  align="center" ' . $ltdattribs . ' > : </td>';
				$table .= '<td width="69%" align="left"   ' . $rtdattribs . ' > ' . ucwords(strtolower($value)) . ' </td>';
				$table .= '</tr>';
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
	//multiple select
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

}



?>