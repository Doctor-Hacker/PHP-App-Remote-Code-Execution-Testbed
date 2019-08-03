<?php
      sm_registerglobal('pid', 'action','tid');	
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
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
	   if(isset($_SESSION['eschools']['admin_id']))
	   {
		   $db->update('es_admins', "user_theme = '" . $selected_theme . "'",'es_adminsid =' . $_SESSION['eschools']['admin_id']);
		   $_SESSION['eschools']['user_theme'] = $selected_theme;	   
		} 
	  header("Location:".$_SERVER['HTTP_REFERER']."&emsg=12");
	  exit;
      }
?>

