<?php
      sm_registerglobal('pid', 'action','tid');	
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin(); 
	//Changing theme of the template
      if(isset($tid) && $tid!="")
      {
	   $theme_name[1] = "blue.css";
	   $theme_name[2] = "pink.css";
	   $theme_name[3] = "violet.css";
	   $theme_name[4] = "green.css";
	   $theme_name[5] = "orange.css";
	   $theme_name[6] = "red.css";	 
	   //selected Theme
	   $selected_theme = $theme_name[$tid];
	   unset($_SESSION['eschools']['user_theme']);	   
	   // Updating Data Base with Selected Theme
	   if(isset($_SESSION['eschools']['user_id']))
	   {
		   if($_SESSION['eschools']['login_type']=="student")
		   {
		   $db->update('es_preadmission', "es_user_theme = '" . $selected_theme . "'",'es_preadmissionid =' . $_SESSION['eschools']['user_id']);
		   }
		   if($_SESSION['eschools']['login_type']=="staff")
		   {
		   $db->update('es_staff', "st_theme = '" . $selected_theme . "'",'es_staffid =' . $_SESSION['eschools']['user_id']);
		   }
		   $_SESSION['eschools']['user_theme'] = $selected_theme;	   
		} 
	  header("Location:".$_SERVER['HTTP_REFERER']."&emsg=12");
      }
?>

