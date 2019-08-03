<?php
////////////////////////////////////////////////////////////////////////////
// ADD EVENT - Saves event to file
////////////////////////////////////////////////////////////////////////////
function add_event()
{
 global $script_file;
 $newline = "\r\n";
 $event_title = $_POST['event_title'];
 $event_title = ereg_replace('"', '\"',$event_title); 		

 $event_date_id = $_POST['event_date_id'];
 $event_hour = $_POST['event_hour'];
 $event_min = $_POST['event_min'];
 $event_ampm = $_POST['event_ampm'];
 $event_description = $_POST['event_description'];
 $event_description = nl2br($event_description);
 $event_description = ereg_replace('"', '\"',$event_description);


 $event_milhour = $event_hour;
 if ($event_ampm == "pm" && $event_hour < 12)
 {
  	$event_milhour = $event_hour +12;
 }
 $temp_month = date('m',$event_date_id);
 $temp_day = date('d',$event_date_id);
 $temp_year = date('Y',$event_date_id);
 $event_timestamp = mktime($event_milhour, $event_min, 0, $temp_month, $temp_day, $temp_year);
 
 if ($_POST['oldevent_file'] != "")
 {
  	$delfile = $_POST['oldevent_file'];
	unlink($delfile);
 }
 $line1 = '<?php' .$newline;
 $line2 = '$event_title = "'.stripslashes($event_title).'";'.$newline;
 $line3 = '$event_date_id = "'.stripslashes($event_date_id).'";'.$newline;
 $line4 = '$event_hour = "'.stripslashes($event_hour).'";'.$newline;
 $line5 = '$event_min = "'.stripslashes($event_min).'";'.$newline;
 $line6 = '$event_ampm = "'.stripslashes($event_ampm).'";'.$newline;
 $line7 = '$event_description = "'.stripslashes($event_description).'";'.$newline;
 $line8 = '?>';
 $out2file = $line1.$line2.$line3.$line4.$line5.$line6.$line7.$line8;
 $filename = "events/".$event_timestamp.'-'.time().'.event';
 $gp = fopen($filename,'w');
 fwrite($gp, $out2file);
 fclose($gp);
 $temp = "events.php?date=$event_date_id"; 
 print '<script>';
 print 'location.replace("'."$temp".'")';
 print '</script>';

}

////////////////////////////////////////////////////////////////////////////
// NEW EVENT - Has user enter new event
////////////////////////////////////////////////////////////////////////////
function new_event($event_file = "")
{
 global $event_date_name;
 global $event_date_id;
 $months = array ('','Jan','Feb','March','April','May','June','July','August','Sep','Oct','Nov','Dec');
 if ($event_file != "")
 {
  $event_file = 'events/' . $event_file . ".event";
  require($event_file);
  $event_title = ereg_replace('"', '&quot;',$event_title);
  $event_description = ereg_replace('<br />', '',$event_description);
  $event_date_name = date('F d Y',$event_date_id);
  print '<h3><b>Edit Event for '."$event_date_name".'</b></h3>'."\n";
 }
 else
 {
  $event_title = "";
  $event_speaker = "";
  $event_month = "";
  $event_day = "";
  $event_year = "";
  $event_hour = "";
  $event_min = "";
  $event_ampm = "";
  $event_time_add ="";
  $event_description = "";
  print '<h3><b>Enter New Event for '."$event_date_name".'</b></h3>'."\n";
 }


 print '<form ENCTYPE="multipart/form-data" name="newevent" onsubmit="return checkvalues()" action="events.php" method="post" >'."\n";
 print '<table>'."\n";
 print '<tr>'."\n";
 print '	<td align="right">Title Of Event:</td>'."\n";
 print '	<td><input type="text" name="event_title" size="55" value="'."$event_title".'"/></td>'."\n";
 print '</tr>'."\n";
 print '<tr>'."\n";
 print '	<td align="right">Time:</td>'."\n";
 print '	<td><select name="event_hour">'."\n";
 print '	<option value="">Hour</option>'."\n";
 for ($i = 1; $i<=12; $i++)
 {
  	  if ($event_hour == $i)
	  { 
	  	 print '	<option selected="selected" value="'."$i".'">'."$i".'</option>'."\n";
	  }
	  else
	  {
	  	 print '	<option value="'."$i".'">'."$i".'</option>'."\n";
	  }
 }
 print '</select>'."\n";
 print '	<select name="event_min">'."\n";
 print '	<option value="">Min</option>'."\n";
 for ($i = 0; $i<=59; $i++)
 {
  	  if ($i < 10)
	  {
	   	 $newi = "0" . $i;
	  }
	  else
	  {
	   	 $newi = $i;
	  }
	  if ($event_min == $i && $event_hour != "")
	  { 
	  	 print '	<option selected="selected" value="'."$newi".'">'."$newi".'</option>'."\n";
	  }
	  else
	  {
	  	 print '	<option value="'."$newi".'">'."$newi".'</option>'."\n";
	  }
 }
 print '</select>'."\n";
 print '	<select name="event_ampm">'."\n";
 if ($event_ampm =="pm")
 {
  	print '		 <option value="am" >AM</option>'."\n";
	print '		 <option value="pm" selected="selected">PM</option>'."\n";
 }
 else
 {
  	print '		 <option value="am" selected="selected">AM</option>'."\n";
	print '		 <option value="pm" >PM</option>'."\n";
 }
 print '</select>'."\n";
 print '</tr>'."\n";
 print '<tr>'."\n";
 print '	<td align="right">Description:</td>'."\n";
 print '	<td><textarea rows="10" cols="45" name="event_description">'."$event_description".'</textarea></td>'."\n";
 print '</tr>'."\n";
 print '<tr>'."\n";
 print '	<td></td>'."\n";
 print '	<td><input type="submit" name="newevent_submit" value="Save New Event">'."\n";
 print '	<input type="reset" name="newevent_reset" value="Reset">'."\n";
 print '	<input type="button" name="newevent_cancel" value="Cancel" onclick="history.back();"></td>'."\n";
 print '	<input type="hidden" name="oldevent_file" value="'."$event_file".'" />' . "\n";
 print '	<input type="hidden" name="event_date_id" value="'."$event_date_id".'" />'."\n";
 print '</tr>'."\n";
 print '</table>'."\n";
 print '</form>'."\n";
}


////////////////////////////////////////////////////////////////////////////
// PRINT EVENTS
////////////////////////////////////////////////////////////////////////////
function print_events( $all=0)
{
	error_reporting(0);
	global $event_date_name;
	global $event_date_id;
	$event_counter = 0;
	if (isset($_GET['listallevents']))
	{
	   $all = 1;
	}
	if (!isset($event_date_id))
	{
	   $event_date_id="";
	}
	if (isset($_GET['date']))
	{
	   $event_date = $_GET['date'];
	   print "<h2>".date("F d, Y",$event_date)."</h2><br/>";
	}
	else
	{
	 	$event_date = "0";
	}
	$pattern = "events/" . "*.event";
    foreach(glob($pattern) as $event_files)
    {
     	$events[] = basename($event_files);
    }
    if (!empty($events))
    {
   	   for ($i=0; $i<count($events); $i++)
       {
		   $name = ereg_replace(".event", "",$events[$i]);
   	   	   $req = "events/". "$events[$i]";
		   require($req);
		   if (($event_date_id == $event_date) || $all)
		   {
		   	  $event_counter=1;
			  $event_full_date = date("F d, Y",$event_date_id);
			  if ($event_ampm == 'pm')
			  {
			   	 $event_hour = $event_hour + 12;
			  }
			  $event_full_time_id = mktime($event_hour, $event_min);
		      $event_full_time = date("g:i a", $event_full_time_id);
			  print "<h3><b>$event_title</b></h3>";
			  if ($all)
			  {
			   	 print "<p><b>$event_full_date $event_full_time</b></p>";
			  }
			  else
			  {
			   	 print "<p><b>$event_full_time</b></p>";
			  }
			  print "$event_description<br />";
           	  print '<a href="events.php?mode=new&id='."$name".'">Edit Event</a>'."\n";
		   	  print '&nbsp;&nbsp;&nbsp;<a href="events.php?mode=del&id='."$name".'" 
			  		onclick="return confirm('."'Are you sure you want to delete this event?'".');">Delete Event</a>'."\n";
			  print '<hr />';
		   }
	   }
   	  
    }
	if  (count($events) == 0 || !$event_counter)
	{
	 	  print "There are no events for this date.";
	}
}
////////////////////////////////////////////////////////////////////////////
// DEL EVENT
////////////////////////////////////////////////////////////////////////////
function del_event()
{
 if(isset($_GET['id']))
 {
  	$file = $_GET['id'];
	unlink("events/".$file.".event");
    $temp = "calendar.php"; 
    print '<script>';
 	print 'location.replace("'."$temp".'")';
 	print '</script>';
 }
}

////////////////////////////////////////////////////////////////////////////
// MAIN
////////////////////////////////////////////////////////////////////////////
if (isset($_GET['date']))
{
   $event_date_id = $_GET['date'];
   $event_date_name = date('F d Y',$event_date_id);
}
else
{
   $event_date_name = "";
}

if (isset($_POST['newevent_submit']))
{
   add_event();
}
if (isset($_GET['mode']))
{
   if($_GET['mode'] == 'new')
   {
   	  if (isset($_GET['id']))
	  {
	  	 new_event($_GET['id']);
	  }	 
	  else
	  {
	   	 new_event();
	  }
   }
   else if ($_GET['mode'] == 'del')
   {
   		del_event();
   }
   else
   {  
   	  print_events();
   }
}
else
{
   print_events();
}

?>