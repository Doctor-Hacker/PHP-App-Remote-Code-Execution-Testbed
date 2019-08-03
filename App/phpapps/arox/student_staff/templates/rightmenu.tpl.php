<script type="text/javascript">
function popup(url) {
		 var width  = 600;
		 var height = 400;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=no';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}
</script>
<!--
	2) Optionally override the settings defined at the top
	of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
hs.graphicsDir = './highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
hs.numberPosition = 'caption';
hs.dimmingOpacity = 0.75;

// Add the controlbar
if (hs.addSlideshow) hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 4000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .95,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script> <script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

              </script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 
if (in_array('31_p', $top_level_permissions) ){?>
              <tr>
                <td  align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="2%" class="bb1" height="13"></td>
                    <td width="96%" class="bb2" height="13"></td>
                    <td width="2%" class="bb3" height="13"></td>
                  </tr>
                  <tr>
                    <td class="bb4">&nbsp;</td>
                    <td align="center" valign="top" class="bb5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="35" class="noticeboard">&nbsp;</td>
                      </tr>
                      <tr>
                        <td style="padding-left:10px;" height="100"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
$online_sql1="select * from es_notice  ORDER BY es_noticeId   ";
 $online_row1=$db->getRows($online_sql1);

$online_sql="select * from es_notice ORDER BY es_noticeId  DESC limit 0,5 ";
 $online_row=$db->getRows($online_sql);
  $no_rows2 =count($online_row1);
  foreach ($online_row as $each_user){

?>
                          <tr>
                            <td height="27" align="left" valign="middle"><?php echo displaydate( $each_user['es_date']);  ?></td>
                          </tr>
                          <tr>
                            <td class="f2_txt" align="left"><b>
							 <a href="javascript: void(0)" onclick="popup_letter('?pid=14&nid=<?php echo $each_user['es_noticeid']; ?>')" class="header_link" >
							
						<?php echo stripslashes(ucfirst( $each_user['es_title'])); ?></a>
									</td>
                          </tr>
						  
						     <tr>
                            <td class="f2_txt" align="left">&nbsp;</td>
                          </tr>
						 
<?php
			}
	
?>	
<?php 

if( ($no_rows2)>=5){
?>
 <tr>
                            <td align="right"><a href="?pid=33&action=noticeboard" class="header_link"> More..</a>&nbsp;&nbsp;</td>
                          </tr><?php } ?>
<?php if( ($no_rows2)==0){?>
                 <tr>
                            <td align="center" valign="middle">Comming Soon!</td>
                          </tr>  
						  <?php }?>      
                          
                        
                        </table></td>
                      </tr>
                    </table></td>
                    <td class="bb6">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="15" class="bb7">&nbsp;</td>
                    <td class="bb8">&nbsp;</td>
                    <td class="bb9">&nbsp;</td>
                  </tr>
                  <tr></tr>
                </table></td>
              </tr>
			  <?php }?>
			   <?php if (in_array('24_p', $top_level_permissions) ){?>
              <tr>
                <td align="center" valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="2%" class="bb1">&nbsp;</td>
                    <td width="96%" class="bb2">&nbsp;</td>
                    <td width="2%" class="bb3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="bb4">&nbsp;</td>
                    <td align="center" valign="top" class="bb5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="35" class="thoughtoftheday">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="100"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="f2_txt" style="padding:5px;" align="center"><?php 
						$todays_tip_right = $db->getrow("SELECT * FROM es_tips WHERE status='active' ORDER BY rand() LIMIT 0,1");
	                    $todaystip = $todays_tip_right['message'];
				if(isset($todaystip) && $todaystip!=""){ echo ucfirst($todaystip);}else
				{echo "Comming Soon!";}?></td>
                          </tr>
                        </table></td>
                        </tr>
                    </table></td>
                    <td class="bb6">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="15" class="bb7">&nbsp;</td>
                    <td class="bb8">&nbsp;</td>
                    <td class="bb9">&nbsp;</td>
                  </tr>
                  <tr></tr>
                </table></td>
              </tr>
			   <?php }?>
              <tr>
                <td align="center" valign="top"><table width="100%" height="141" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="2%" class="bb1">&nbsp;</td>
                    <td width="96%" class="bb2">&nbsp;</td>
                    <td width="2%" class="bb3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="111" class="bb4">&nbsp;</td>
                    <td align="center" valign="top" class="bb5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="35" class="calender">&nbsp;</td>
                        </tr>
                        <tr>
                          <td><script type="text/javascript">
var day_of_week = new Array('Su','Mo','Tu','We','Th','Fr','Sa');
var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

//  DECLARE AND INITIALIZE VARIABLES
var Calendar = new Date();

var year = Calendar.getYear();	
if(year<300){
	year = year+1900;
}
///year = year;    // Returns year
var month = Calendar.getMonth();    // Returns month (0-11)
var today = Calendar.getDate();    // Returns day (1-31)
var weekday = Calendar.getDay();    // Returns day (1-31)

var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
var cal;    // Used for printing

Calendar.setDate(1);    // Start the calendar day at '1'
Calendar.setMonth(month);    // Start the calendar month at now


var TR_start = '<TR class="narmal">';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC align="center"><TR><TD WIDTH=20><B><CENTER>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="30"><CENTER>';
var TD_end = '</CENTER></TD>';



cal =  '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 WIDTH=100%><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" ><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;

//   DO NOT EDIT BELOW THIS POINT  //

// LOOPS FOR EACH DAY OF WEEK
for(index=0; index < DAYS_OF_WEEK; index++)
{

// BOLD TODAY'S DAY OF WEEK
if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;

// PRINTS DAY
else
cal += TD_start + day_of_week[index] + TD_end;
}

cal += TD_end + TR_end;
cal += TR_start;

// FILL IN BLANK GAPS UNTIL TODAY'S DAY
for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;

// LOOPS FOR EACH DAY IN CALENDAR
for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
// RETURNS THE NEXT DAY TO PRINT
week_day =Calendar.getDay();

// START NEW ROW FOR FIRST DAY OF WEEK
if(week_day == 0)
cal += TR_start;

if(week_day != DAYS_OF_WEEK)
{

// SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
var day  = Calendar.getDate();

// HIGHLIGHT TODAY'S DATE
if( today==Calendar.getDate() )
cal += highlight_start + day + highlight_end + TD_end;

// PRINTS DAY
else
cal += TD_start + day + TD_end;
}

// END ROW FOR LAST DAY OF WEEK
if(week_day == DAYS_OF_WEEK)
cal += TR_end;
}

// INCREMENTS UNTIL END OF THE MONTH
Calendar.setDate(Calendar.getDate()+1);

}// end for loop

cal += '</TD></TR></TABLE></TABLE>';

//  PRINT CALENDAR
document.write(cal);

</script></td>
                        </tr>
                    </table></td>
                    <td class="bb6">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="15" class="bb7">&nbsp;</td>
                    <td class="bb8">&nbsp;</td>
                    <td class="bb9">&nbsp;</td>
                  </tr>
                  <tr></tr>
                </table></td>
              </tr>
			   <?php if (in_array('27_p', $top_level_permissions) ){?>
              <tr>
                <td  align="center" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="2%" class="bb1">&nbsp;</td>
                    <td width="96%" class="bb2">&nbsp;</td>
                    <td width="2%" class="bb3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td  class="bb4">&nbsp;</td>
                    <td align="center" valign="top" class="bb5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="35" class="holidays">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="100"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <?php 
						$holidays_right = $db->getRows("SELECT title,DATE_FORMAT(holiday_date, '%y') as year,DATE_FORMAT(holiday_date, '%b') as month,DATE_FORMAT(holiday_date, '%e') as day  FROM es_holidays WHERE holiday_date>='".date("Y-m-d")."' ORDER BY holiday_date ASC LIMIT 0,4");
						if(count($holidays_right==0)){
							foreach($holidays_right as $each_holiday){
							?>
                          <tr>
                            <td width="20%" height="40" align="center" valign="middle" class="b_box">
                            <table width="100%" height="30" border="0" cellpadding="0" cellspacing="0" class="b_box_in">
                              <tr>
                                <td align="center" valign="middle" class="holiday_big_font" ><?php echo $each_holiday['day']; ?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" ><?php echo $each_holiday['month']."&nbsp;".$each_holiday['year']; ?></td>
                              </tr>
                            </table></td>
                            <td width="80%" align="left" valign="middle" style="padding-left:5px"><?php echo $each_holiday['title']; ?></td>
                          </tr>
                           <?php
							}
						}else {
	                    ?><tr>
                          <td align="center" valign="middle">Comming Soon!</td>
                        </tr>
                        <?php }?>
                        
                        </table></td>
                        </tr>
                    </table></td>
                    <td class="bb6">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="15" class="bb7">&nbsp;</td>
                    <td class="bb8">&nbsp;</td>
                    <td class="bb9">&nbsp;</td>
                  </tr>
                  <tr></tr>
                </table></td>
              </tr>
			  <?php }?>
			  <?php if (in_array('25_p', $top_level_permissions) ){?>
              <tr>
                <td align="center" valign="top"><table width="100%" height="141" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="2%" class="bb1">&nbsp;</td>
                    <td width="96%" class="bb2">&nbsp;</td>
                    <td width="2%" class="bb3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="111" class="bb4">&nbsp;</td>
                    <td align="center" valign="top" class="bb5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="35" class="gallery">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="100" align="left" valign="top" style="padding:10px;"><?php 
					$all_albums = $db->getRows("SELECT * FROM es_photogallery WHERE pid=0 ORDER BY id DESC LIMIT 0,5");
					if(count($all_albums)>=1){
					for($i=0;$i<count($all_albums);$i++){					
						$gallery = $db->getRows("SELECT * FROM es_photogallery WHERE pid='".$all_albums[$i]['id']."'");
						if(count($gallery)>0){
						
	                    ?>
	<div class="highslide-gallery" style="padding-top:3px;">
	<a id="thumb2" href="../office_admin/images/student_photos/<?php echo $gallery[0]['image_path'];?>" style="cursor: pointer;" onclick="return hs.expand(this,	{ slideshowGroup: <?php echo $i; ?>} )" class="header_link">
<b>	<?php echo $all_albums[$i]['title']; ?></b>
	
</a>

<div class="highslide-caption">
	<?php echo $gallery[0]['title'];?>
</div>
<div class="hidden-container">
<?php
for($j=1;$j<count($gallery);$j++){
 ?>
	<a href="../office_admin/images/student_photos/<?php echo $gallery[$j]['image_path'];?>" class="highslide" 
		onclick="return hs.expand(this, { thumbnailId: 'thumb2', slideshowGroup: <?php echo $i; ?> })"></a>
	<div class="highslide-caption">
		<?php echo $gallery[$j]['title'];?>
	</div>
	<?php } ?>
</div>

</div>
<?php } 
}
} else {
echo "Comming Soon!";
}
?></td>
                        </tr>
                    </table></td>
                    <td class="bb6">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="15" class="bb7">&nbsp;</td>
                    <td class="bb8">&nbsp;</td>
                    <td class="bb9">&nbsp;</td>
                  </tr>
                  <tr></tr>
                </table></td>
              </tr>
			   <?php }?>
            </table>
            
     

<?php /*?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	
	<tr>
		<td align="right">
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr>
         <td height="3" colspan="3"></td>
	 </tr>
				<tr><td height="25" colspan="3" class="bgcolor_02" align="center">&nbsp;&nbsp;Notice Board</td></tr>
				<tr>
					<td class="bgcolor_02" width="1"></td>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php

$obj_notice = new es_notice();
$notice_det = $obj_notice->GetList(array(array("es_noticeid", ">", 0)), "es_noticeid", false,  "0 , 5" );
if (is_array($notice_det)){
	 foreach ($notice_det as $eachrecord){
			if ($eachrecord->es_subject !=""&&strlen($eachrecord->es_subject)>=1){
?>							
							
							<tr>
								<td valign="top" align="left" class="narmal">
									<b><?php echo ucfirst($eachrecord->es_title); ?></b><br />
										<a href="javascript: void(0)" onclick="popup('?pid=39&nid=<?php echo $eachrecord->es_noticeId; ?>')"><?php echo ucfirst($eachrecord->es_subject); ?></a>
										<br /><?php echo displaydate($eachrecord->es_date); ?><br /><br />
								</td>
							</tr>
							<tr><td  class="bgcolor_02" height="1"></td></tr>
<?php
			}
		}
	}
?>		
						</table>
					</td>
					<td class="bgcolor_02" width="1"></td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td align="right">			
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr><td colspan="3" height="25" align="center" class="bgcolor_02">Calender</td></tr>
				<tr><td colspan="3" ></td></tr>
				<tr>
					<td class="bgcolor_02" width="1"></td>
					<td height="150" align="center"><script type="text/javascript">
var day_of_week = new Array('Su','Mo','Tu','We','Th','Fr','Sa');
var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

//  DECLARE AND INITIALIZE VARIABLES
var Calendar = new Date();

var year = Calendar.getYear();	
if(year<300){
	year = year+1900;
}
///year = year;    // Returns year
var month = Calendar.getMonth();    // Returns month (0-11)
var today = Calendar.getDate();    // Returns day (1-31)
var weekday = Calendar.getDay();    // Returns day (1-31)

var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
var cal;    // Used for printing

Calendar.setDate(1);    // Start the calendar day at '1'
Calendar.setMonth(month);    // Start the calendar month at now


var TR_start = '<TR class="narmal">';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC align="center"><TR><TD WIDTH=20><B><CENTER>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="30"><CENTER>';
var TD_end = '</CENTER></TD>';



cal =  '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 WIDTH=100%><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" class="bgcolor_02"><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;

//   DO NOT EDIT BELOW THIS POINT  //

// LOOPS FOR EACH DAY OF WEEK
for(index=0; index < DAYS_OF_WEEK; index++)
{

// BOLD TODAY'S DAY OF WEEK
if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;

// PRINTS DAY
else
cal += TD_start + day_of_week[index] + TD_end;
}

cal += TD_end + TR_end;
cal += TR_start;

// FILL IN BLANK GAPS UNTIL TODAY'S DAY
for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;

// LOOPS FOR EACH DAY IN CALENDAR
for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
// RETURNS THE NEXT DAY TO PRINT
week_day =Calendar.getDay();

// START NEW ROW FOR FIRST DAY OF WEEK
if(week_day == 0)
cal += TR_start;

if(week_day != DAYS_OF_WEEK)
{

// SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
var day  = Calendar.getDate();

// HIGHLIGHT TODAY'S DATE
if( today==Calendar.getDate() )
cal += highlight_start + day + highlight_end + TD_end;

// PRINTS DAY
else
cal += TD_start + day + TD_end;
}

// END ROW FOR LAST DAY OF WEEK
if(week_day == DAYS_OF_WEEK)
cal += TR_end;
}

// INCREMENTS UNTIL END OF THE MONTH
Calendar.setDate(Calendar.getDate()+1);

}// end for loop

cal += '</TD></TR></TABLE></TABLE>';

//  PRINT CALENDAR
document.write(cal);

</script>						
					</td>
					<td class="bgcolor_02" width="1"></td>
				</tr>
				<tr><td height="1"colspan="3"class="bgcolor_02" ></td></tr>
			</table>							
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td align="right">
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr><td height="25" colspan="3" class="bgcolor_02" align="center">&nbsp;&nbsp;Thought of the Day</td></tr>
				<tr>
					<td class="bgcolor_02" width="1"></td>
					<td style="padding:5px;" align="center">
						<?php 
						$todays_tip = $db->getrow("SELECT * FROM es_tips WHERE status='active' ORDER BY lastupdated_on DESC LIMIT 0,1");
	                    $todaystip = $todays_tip['message'];
				if(isset($todaystip) && $todaystip!=""){ echo ucfirst($todaystip);}else
				{echo "No Thoughts Added";}?>
					</td>
					<td class="bgcolor_02" width="1"></td>
				</tr>
				<tr><td height="1" colspan="3" class="bgcolor_02" align="center"></td></tr>
			</table>		
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td align="right">
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr><td height="25" colspan="3" class="bgcolor_02" align="center">&nbsp;&nbsp;Photo Gallery</td></tr>
				<tr>
					<td class="bgcolor_02" width="1"></td>
					<td style="padding:15px;" align="left">
					<?php 
					$all_albums = $db->getRows("SELECT DISTINCT(album_cover) FROM es_photogallery ORDER BY id DESC LIMIT 0,5");
					if(count($all_albums>0)){
					for($i=0;$i<count($all_albums);$i++){					
						$gallery = $db->getRows("SELECT * FROM es_photogallery WHERE album_cover='".$all_albums[$i]['album_cover']."'");
						if(count($gallery>0)){
						
	                    ?>
	<div class="highslide-gallery" style="padding-top:3px;">
	<a id="thumb2" href="images/student_photos/<?php echo $gallery[0]['image_path'];?>" style="cursor: pointer;" onclick="return hs.expand(this,	{ slideshowGroup: <?php echo $i; ?>} )">
<b>	<?php echo $all_albums[$i]['album_cover']; ?></b>
	
</a>

<div class="highslide-caption">
	<?php echo $gallery[0]['title'];?>
</div>
<div class="hidden-container">
<?php
for($j=1;$j<count($gallery);$j++){
 ?>
	<a href="images/student_photos/<?php echo $gallery[$j]['image_path'];?>" class="highslide" 
		onclick="return hs.expand(this, { thumbnailId: 'thumb2', slideshowGroup: <?php echo $i; ?> })"></a>
	<div class="highslide-caption">
		<?php echo $gallery[$j]['title'];?>
	</div>
	<?php } ?>
</div>

</div>
<?php } 
}
}
?>
					</td>
					<td class="bgcolor_02" width="1"></td>
				</tr>
				<tr><td height="1" colspan="3" class="bgcolor_02" align="center"></td></tr>
			</table>		
		</td>
	</tr>
    <tr><td>&nbsp;</td></tr>
	<tr>
		<td align="right">
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr><td height="25" colspan="3" class="bgcolor_02" align="center">&nbsp;&nbsp;Upcoming Holidays</td></tr>
				<tr>
					<td class="bgcolor_02" width="1"></td>
					<td style="padding:5px;" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">



					<?php 
						$holidays_right = $db->getRows("SELECT title,DATE_FORMAT(holiday_date, '%y') as year,DATE_FORMAT(holiday_date, '%b') as month,DATE_FORMAT(holiday_date, '%e') as day  FROM es_holidays WHERE holiday_date>='".date("Y-m-d")."' ORDER BY holiday_date ASC LIMIT 0,4");
						if(count($holidays_right>0)){
							foreach($holidays_right as $each_holiday){
							?>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td align="center" style="font-size:16px; font-weight:bold;"><?php echo $each_holiday['day']; ?></td>
  </tr>
  <tr>
    <td><?php echo $each_holiday['month']."&nbsp;".$each_holiday['year']; ?></td>
  </tr>
</table>
</td>
                                <td><?php echo $each_holiday['title']; ?></td>
                              </tr>
                              <tr><td colspan="2" height="5"></td>
                            <?php
							}
						}
	                    ?>
					</table>
					</td>
					<td class="bgcolor_02" width="1"></td>
				</tr>
				<tr><td height="1" colspan="3" class="bgcolor_02" align="center"></td></tr>
			</table>		
		</td>
	</tr>
	
</table><?php */?>