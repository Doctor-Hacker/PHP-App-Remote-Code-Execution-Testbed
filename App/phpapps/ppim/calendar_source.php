<?php
function check_event($month,$day,$year)
{
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
	   $event_date = mktime(0,0,0,date('m',$event_date_id),date('d',$event_date_id),date('Y',$event_date_id));
	   $event_check_date = mktime(0,0,0,$month,$day,$year);
	   if ($event_check_date == $event_date)
	   {
	   	  return 1;
	   }
	   else
	   {

	   }
	}
 
 }
 return 0;

}

function print_week($offset,$startday,$month, $year)
{
	print '<tr height="55px">';
	$olddate = 1;
	for ($day =0; $day<7; $day++)
	{
	 	if ($offset > $day)
		{
		   $date = " ";
		   $olddate = 1;
		}
		else
		{
		   $date = date('d',mktime(0,0,0,$month,$startday+$day-$offset,$year));
		}
		if ($date < $olddate && $date != " " )
		{
			$date = " ";
		}
		if ($date != " ")
		{
		   $olddate = $date;
		}
		if ($date != " ")
		{
		   $event_date = mktime(0,0,0,$month,$date,$year);
		   if (mktime(0,0,0,date('m'),date('d'),date('Y')) !=$event_date)
		   {
		   	  print '	<td align="right" valign="top" id="day" width="13%">'."\n";
			  if (check_event($month, $date, $year))
			  {
		   	   	 print '<div id="event">';
			  }
		   	  print '	<a href="events.php?date='."$event_date".'">'."\n";
		   }
		   else
		   {
			  print '	<td align="right" valign="top" id="today" width="13%">'."\n";
		   	  if (check_event($month, $date, $year))
			  {
		   	   	 print '<div id="event">';
			  }
		   	  print '	<a href="events.php?date='."$event_date".'">'."\n";
		   }

		}
		else
		{
		   print '	<td id="dayempty" width="13%">'."\n";
		} 
	   print "	 $date";			  			// DAY
		if ($date != " ")
		{
		   print '	 </a>';
		}
		if (check_event($month, $date, $year))
	   	{
	   	   print '</div>';
	   	}

		print '</td>'."\n";
	
	}
	print '</tr>';
}

function print_month($month,$year)
{
 	$themonth = date('F',mktime(0,0,0,$month,1,$year));
 	$monthbefore = date('F',mktime(0,0,0,$month-1,1,$year));
	$monthafter =  date('F',mktime(0,0,0,$month+1,1,$year));
	$Dayoweek =    date('D',mktime(0,0,0,$month,1,$year));
	$trueyear = date('Y',mktime(0,0,0,$month,1,$year));
	switch ($Dayoweek) {
		   case 'Sun':
		   		$offset = "0";
				break;
		   case 'Mon':
		   		$offset = "1";
				break;
		   case 'Tue':
		   		$offset = "2";
				break;
		   case 'Wed':
		   		$offset = "3";
				break;
		   case 'Thu':
		   		$offset = "4";
				break;
		   case 'Fri':
		   		$offset = "5";
				break;
		   case 'Sat':
		   		$offset = "6";
				break;
	}
 
	print '<table width="91%" cellspacing="5px">'."\n";
	print '<tr align="center">'."\n";
	print '	<td colspan="2">';
	$temp = $month - 1;
	print '<a href="calendar.php?month='."$temp".'"><<</a>';	  		 	   // MONTH BEFORE
	print '</td><td colspan="3"><b>';
	print "$themonth $trueyear";					 	   // MONTH
	print '</b></td><td colspan="2">';
	$temp = $month + 1;
	print '<a href="calendar.php?month='."$temp".'">>></a>';	  		 	   // MONTH AFTER
	print '</td>'."\n";
	print '</tr>'."\n";
	print '<tr align="right" >'."\n";
	print '	<td id="day">Sun</td>'."\n";
	print '	<td id="day">Mon</td>'."\n";
	print '	<td id="day">Tue</td>'."\n";
	print '	<td id="day">Wed</td>'."\n";
	print '	<td id="day">Thu</td>'."\n";
	print '	<td id="day">Fri</td>'."\n";
	print '	<td id="day">Sat</td>'."\n";
	print '</tr>'."\n";
	for ($i=0; $i<6; $i++)
	{
		$startday = ($i*7)+1;
		if ($i == 0)
		{
		   print_week($offset,$startday,$month,$year);
		}
		else
		{
		   if ($i != 5)
		   {
		   	print_week('0',$startday-$offset,$month,$year);
		   }
		   if ($i == 5 && $startday < 31+$offset)
		   {
			print_week('0',$startday-$offset,$month,$year);
		   }
		}
		
	}
	print '</table>'."\n";
}

if (isset($_GET['month']))
{
   	$month=$_GET['month'];
}
else
{
 	$month = date('m');
}
if (isset($_GET['year']))
{
    $year = $_GET['year'];
}
else
{
 	$year = date('Y');
}


print_month($month,$year);
?>
