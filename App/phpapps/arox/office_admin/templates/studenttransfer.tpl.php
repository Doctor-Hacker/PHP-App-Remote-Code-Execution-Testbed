<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
	}
//echo $sss = base64_decode("Y2hhbmdl");
?>


<script type="text/javascript">
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
</script> <script type="text/javascript">
/************ Checking Browsers ***********/
		function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
		function getsubjects(countryid,selval)
		{   
		    
			url="?pid=98&action=getposts&es_departmentsid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			
			xmlHttp1=GetXmlHttpObject(countryChanged);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp1.responseText
			}
		}
		
		function getallsubjects(countryid,getselected)
		{   
			
			url="?pid=98&action=getstaff&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged2);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged2()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp.responseText
			}
		}
	
	
	
</script>
<script type="text/javascript">
var gblvar7 = 1;
function AddRow7() //This function will add extra row to provide another file
{

var prevrow = document.getElementById("uplimg7");
var tmpvar = gblvar7;
var newrow = prevrow.insertRow(prevrow.rows.length);
newrow.id = newrow.uniqueID; // give row its own ID

var newcell; // an inserted row has no cells, so insert the cells
newcell = newrow.insertCell(0);
newcell.id = newcell.uniqueID;
newcell.innerHTML = "<table width='100%' border='0' cellspacing='0' cellpadding='0'><TR height='25'><td align='left' ><input name='newimage[]' type='file'><input type='hidden' name='filecount[]' value='1' ></TD></TR></table>";

gblvar7 = tmpvar + 1;
}

function DelRow7() //This function will delete the last row
{
if(gblvar7 == 1)
return;

var prevrowas = document.getElementById("uplimg7");
//alert(gblvar);
prevrowas.deleteRow(prevrowas.rows.length-1);
gblvar7 = gblvar7 - 1;
}
</script>


<?php  if($action=='add' || $action=='edit'){

/*$sql="SELECT sno FROM es_charcerti order by id desc limit 0,1";
		 $aac=$db->getrow($sql);
		$sno=$aac['id'];
		 $sno=$sno+1;
		 
		 $es_preadmissionid=$sno;
 $student_detals=$db->getrow("select es_preadmissionid,pre_class from es_preadmission where es_preadmissionid=".$es_preadmissionid); echo $es_preadmissionid;
 array_print($student_detals);*/

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   
   
  
     <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">
                Student Transfer</span></td>
  </tr>	
  
 	  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				
				 <form name="reg" action="" method="post" enctype="multipart/form-data">
                 
				   <table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					 
                     <?php if($action!='edit'){?>
                     <tr><td colspan="3"><table width="99%">
<tr>
				<td width="35%" class="narmal"  align="left"> Class </td>
				  <td width="1%" align="center" class="narmal"><strong> :</strong></td>
				  <td width="64%" height="30" align="left"><?php //echo $html_obj->draw_selectfield('es_classesid',$class_list,$es_classesid,'onchange="document.reg.submit();"');?>
                  <select name='es_classesid' onchange="document.reg.submit();">
                 <?php
				   foreach($class_list as $k=>$v)
				  {?>
                  <option value='<?php echo $k; ?>' <?php if($es_classesid==$k || $class_name==$v){?> selected="selected"<?php } ?>><?php echo $v;?></option>
                  <?php
				  }?>
                  </select>
                  <font color="#FF0000">&nbsp;*</font></td>
					</tr><tr>
					<td height="30" class="narmal"  align="left"> Student</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td  align="left" >
                    
					<?php  //echo $html_obj->draw_selectfield('es_preadmissionid',$students_list,$es_preadmissionid,'');?>
                    
                    <select name='es_preadmissionid' onchange="document.reg.submit();">
                 <?php
                  foreach($students_list as $k=>$v)
				  {?>
                  <option value='<?php echo $k; ?>' <?php if($es_preadmissionid==$k || $v==$student_name){?> selected="selected"<?php } ?>><?php echo $v;?></option>
                  <?php
				  }?>
                  </select>
                    <font color="#FF0000">*</font>   </td>
					</tr><?php } ?>
<?php /*?><?php echo $html_obj->draw_hiddenfield('es_classesid',$es_classesid);?>
<?php echo $html_obj->draw_hiddenfield('es_preadmissionid[0]',$copyid);?>
<?php echo $html_obj->draw_hiddenfield('es_messagesid',$es_messagesid);?>
<?php echo $html_obj->draw_hiddenfield('copyid',$copyid);?><?php */?>

   
   </table></td></tr><tr>
					<td width="42%"  align="left" valign="middle" class="narmal">Reg No</td>
					<td width="1%" align="left" valign="middle"><strong> :</strong></td>
					<td width="57%" height="30" align="left" valign="middle">
			
						<input name="sno1" type="text" id="sno1" readonly="readonly" 
		value="<?php echo	$sem_det['es_preadmissionid'];?>"  class="input_field" /></td>
					</tr>
                 <?php /*?>   <tr>
					<td width="35%" valign="top" class="narmal"  align="left"> Admission No.</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('admissionno','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr><?php */?>
                    
					<tr>
					<td width="42%"  align="left" valign="middle" class="narmal">Student Name</td>
					<td width="1%" align="left" valign="middle"><strong> :</strong></td>
					<td width="57%" height="30" align="left" valign="middle">
				
				
		
		
						<input name="name" type="text" id="sno" readonly="readonly" 
		value="<?php echo	$sem_det['pre_name'];?>"  class="input_field" />
        
        <input name="es_classesid" type="hidden" id="sno" readonly="readonly" 
		value="<?php echo	$sem_det['pre_class'];?>"  class="input_field" />
		
		
				<?php /*?>
					<?php
						if($action=='add')
						{
						?>
					<?php echo $html_obj->draw_inputfield('name',$student_detadd['pre_name'],'','class="input_field" ');?>
                    <?php
						}
						else
						{
						
						?>
                      <?php $student_detadd=$db->getRow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$sem_det['name']."'"); 
				  echo $student_detadd['pre_name'];
				  
				
				  
				    }?>
                    <?php */?>                    </td>
					</tr>
                 
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left"> Gender</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
					<input name="gender" type="text" id="sno" readonly="readonly" 
		value="<?php echo	$sem_det['pre_gender'];?>"  class="input_field" />
					
					
					<?php /*?><?php //echo $html_obj->draw_selectfield('gender',$default_title_array,$gender,'style="width:170px; height:20px; "class="input_field"' ); ?>
                    <select name='gender' style="width:150px; height:20px;">
                    <option value="">Select</option>
                    <option value='male' <?php if($gender=='male'){?> selected="selected"<?php } ?>>Male</option>
                    <option value='female' <?php if($gender=='female'){?> selected="selected"<?php } ?>>Female</option>
                    </select><?php */?>
                    </td>
					</tr>
                    
					<tr>
					<td width="42%" valign="middle" class="narmal"  align="left"> Father Name</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
						<input name="fname" type="text" id="sno" readonly="readonly" 
		value="<?php echo	$sem_det['pre_fathername'];?>"  class="input_field" />
		
		
					<?php /*?><?php echo $html_obj->draw_inputfield('fname','','','class="input_field"');?><?php */?></td>
					</tr>
				<?php /*?>	<tr>
					<td width="35%" valign="top" class="narmal"  align="left"> Mother Name</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('mother_name','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr><?php */?>
						
                        
                        <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Nationality</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left"><?php /*?><input name="nationality" type="text" class="input_field" 
		value="<?php if($sem_det1['nationality']!='') { echo	$sem_det1['nationality']; } else { echo $nationality;  } ?>"   /><?php */?>
					 <?php echo $html_obj->draw_inputfield('nationality','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left"> Whether the Pupil belongs to scheduled caste or schedule tribe?</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left"><?php /*?><input name="sc" type="text" id="nationality2"  
		value="<?php if($sem_det1['sc']!='') {  echo	$sem_det1['sc'];} else { echo $sc;  }?>"  class="input_field" /><?php */?>
					 <?php echo $html_obj->draw_inputfield('sc','','','class="input_field"');?></td>
					</tr>
                    
                    
                    
             <?php /*?>       <tr>
					<td width="35%" valign="top" class="narmal"  align="left">Date of birth According to admission Register</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('dobw','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr><?php */?>
                    	<tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Date of Birth</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
								<input name="dob1" type="text" id="sno" readonly="readonly" 
		value="<?php   echo	displaydate($sem_det['pre_dateofbirth']);?>"  class="input_field" />
					
<?php /*?>					
					
				      <input name="dob1" type="text" id="dob1" size="15" value="<?php echo $dob1;  ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reg.dob1);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><?php */?>
                       
                      <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>
 </td>
					</tr>
                    	<tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Class</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
				
					<input name="section" type="text"  
		value="<?php 
			 $sem_det2 = $db->getrow("SELECT * FROM es_classes WHERE es_classesid=".$sem_det['pre_class']);
		
		if($sem_det2['es_classname']!='') {  echo	$sem_det2['es_classname'];} else { echo $section;  }?>"  class="input_field" readonly="readonly" />
					
			<?php /*?>	<?php echo $html_obj->draw_inputfield('section','','','class="input_field"');?><?php */?></td>
					</tr>
		
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Subject Studied, starting in each compulsory or Elective, According to NCERT Syllabus, Hindi ,English,Gen Science,Social Study</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
				<?php /*?>	<input name="subject" type="text"  
		value="<?php if($sem_det1['subject']!='') {  echo	$sem_det1['subject'];} else { echo $subject;  }?>"  class="input_field" />
<?php */?><?php echo $html_obj->draw_inputfield('subject','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Date of Promotion to the Class in</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
				
					<input name="dobp" type="text" id="dobp" size="15" value="<?php if($sem_det1['dobp']!=''){echo displaydate($sem_det1['dobp']);} else { echo $dobp;}  ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reg.dobp);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left"> Month upto which fees has been paid</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
				<?php /*?>	<input name="monthfeepay" type="text"  
		value="<?php if($sem_det1['monthfeepay']!='') {  echo	$sem_det1['monthfeepay'];} else { echo $monthfeepay;  }?>"  class="input_field" /><?php */?>
					
				<?php echo $html_obj->draw_inputfield('monthfeepay','','','class="input_field"');?>
                    &nbsp;&nbsp;&nbsp; <?php 
		  
	 $year = date("Y");
		  $stat = $year-15;
		  
		  ?>
		  
		  
		  <select name="exam_date" id="exam_date" class="input_field" style="width:150px">
  <option value="">Year</option>
  <?php for($i=$stat; $i<=$year; $i++){?>
  <option value="<?php echo $i;?>" <?php if( $exam_date==$i ){echo "selected='selected'";} else { echo $exam_date;}?>><?php echo $i;?></option>
  <?php }?>
</select>
		  <font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left"> Whether the pupil was in receipt of any fees concession?<br/>
					  If so, state the nature of concession.</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
				<?php /*?>	<input name="feecons" type="text"  
		value="<?php if($sem_det1['feecons']!='') {  echo	$sem_det1['feecons']; } else { echo $feecons;}?>"  class="input_field" /><?php */?>
		

					<?php echo $html_obj->draw_inputfield('feecons','','','class="input_field"');?>
					
					<font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left"> Date of Pupil's last attendance at the school</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left"><input name="doblast" type="text" id="dob" size="15" value="<?php if($sem_det1['doblast']!=''){echo displaydate($sem_det1['doblast']);} else { echo $doblast;}  ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reg.doblast);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Date on which he/she struck off the rolls of the school</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left"><input name="datestuck" type="text" id="dob" size="15" value="<?php if($sem_det1['datestuck']!=''){ echo displaydate($sem_det1['datestuck']);} else { echo $datestuck;}  ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reg.datestuck);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000">*</font></td>
					</tr>
                    
                    
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Attendance during the period</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
					
				<?php /*?>	<input name="attendance" type="text"  
		value="<?php  if($sem_det1['attendance']!='') { echo	$sem_det1['attendance'];} else { echo $attendance;}?>"  class="input_field" />
		<?php */?>
		
					<?php echo $html_obj->draw_inputfield('attendance','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr>
                    
                    
                         <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Date of issue of this certificate</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left"><input name="sissuecetrti" type="text" id="dob" size="15" value="<?php if($sem_det1['sissuecetrti']!=''){echo displaydate($sem_det1['sissuecetrti']);} else { echo $sissuecetrti;}  ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.reg.sissuecetrti);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000">*</font></td>
					</tr>     <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Reasons for leaving the school</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left"><?php /*?><input name="rls" type="text" id="rls" 
		value="<?php echo	$sem_det1['rls'];?>"  class="input_field" /><?php */?>
					  	<?php echo $html_obj->draw_inputfield('rls','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr>     <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Whether NCC Cadet/Boys scout/Girl Guide?</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					<?php /*?><input name="ncc" type="text" id="rls" 
		value="<?php echo	$sem_det1['ncc'];?>"  class="input_field" /><?php */?>
					<?php echo $html_obj->draw_inputfield('ncc','','','class="input_field"');?></td>
					</tr>     <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Games played and other co-curricular activities in which pupil usually took part with degree or proficiency attained.</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
					
				<?php /*?>	<input name="games" type="text" id="rls" 
		value="<?php echo	$sem_det1['games'];?>"  class="input_field" /><?php */?>
					<?php echo $html_obj->draw_inputfield('games','','','class="input_field"');?></td>
					</tr>
                    
                    
                    			
                   
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Conduct</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
						<?php /*?><input name="conduct" type="text"" 
		value="<?php echo $conduct; ?>"  class="input_field" /><?php */?>
				<?php echo $html_obj->draw_inputfield('conduct','','','class="input_field"');?></td>
					</tr>
                    <tr>
					<td width="42%" valign="middle" class="narmal"  align="left">Annual charges for the year.</td>
					<td width="1%" valign="middle"  align="left"><strong> :</strong></td>
					<td width="57%" height="30" valign="middle" align="left">
						<?php /*?><input name="acharge" type="text" id="rls" 
		value="<?php if($sem_det1['acharge']!='') {   echo	$sem_det1['acharge'];} else { echo $acharge;  }?>"  class="input_field" /><?php */?>
				<?php echo $html_obj->draw_inputfield('acharge','','','class="input_field"');?></td>
					</tr>
                    
                  
					<tr>
					<td width="42%" align="left" valign="middle" ></td>
					<td width="1%" valign="middle"  align="left"></td>
					<td width="57%" height="30" valign="middle" align="left">
					
					<?php
						if($action=='add')
						{
						?>
					
					
					<input type="submit" name="submit_from" value="submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" />
			
					<?php
						}
						else
						{
						?>
						
					  <input type="submit" name="update"  class="bgcolor_02" value="update" style="padding-left:10px;padding-right:10px;cursor:pointer;"/>
					  <?php } ?>					</td>
					</tr>
				   </table>	
				  </form>	
				
						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
  <tr>
    <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>

<?php } if($action=="list"){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Student Transfer</span></td>
  </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				<table width="100%" border="0">
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>
					<table width="100%" border="0">
						<tr>
						<td colspan="7" align="right" style="padding-right:20px;"><a href="?pid=98&action=add" class="bgcolor_02" style="padding:5px; text-decoration:none;">Add New</a></td>
					  </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr class="bgcolor_02 admin" height="25">
						<td align="center" valign="middle">S No</td>
						<td align="center" valign="middle">Student Name</td>
						<td align="center" valign="middle">Father Name</td>
						
						<td align="center" valign="middle">Actions</td>
						
					  </tr>
				 <?php if(count($all_sem_det)>0){
					$irow=$start;
					foreach($all_sem_det as $eachrecord){
					$irow++;
					$student_det=$db->getRow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$eachrecord['name']."'");


					 ?>
					  
					  <tr>
						<td align="center" valign="middle">&nbsp;<?php echo $irow; ?></td>
                        
                        
						<td align="center" valign="middle">&nbsp;<?php echo $student_det['pre_name']; ?></td>
						<td align="center" valign="middle">&nbsp;<?php echo $eachrecord['fname']; ?></td>
							<td align="center" valign="middle">
							
							<a href="javascript:void()" onclick="popup_letter('?pid=98&action=print_transfercertificate&id=<?php echo $eachrecord['id']; ?>')" ><img src="images/print_16.png" border="0" title="View" alt="View" /></a>
							
							
							&nbsp;<a href="?pid=98&action=edit&id=<?php echo $eachrecord['id']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a>&nbsp;<a href="?pid=98&action=delete&id=<?php echo $eachrecord['id']; ?>" onClick="return confirm('Are you sure want to delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a></td>
						
					  </tr>
					    <?php }?>
					  <tr>
						<td colspan="7"  align="center"><?php paginateexte($start, $q_limit, $no_rec, "action=list");?></td>
					  </tr>
					  <?php }else{?>
					  <tr>
						<td colspan="7" class="admin" align="center">No Records Found</td>
					  </tr>
					  <?php }?>
					</table>

					</td>
				  </tr>
				</table>

						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }?>
<?php if($action=='print_transfercertificate'){ ?>


<table width="100%" border="0" cellspacing="0" cellpadding="6" >
							<tr><td colspan="2">
						  
							
							 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
							
                            	<tr>
                                
								<td  colspan="3"  align="center"><table width="100%" border="0">
                                  <tr>
                                    <td><span class="narmal">S No&nbsp;:&nbsp;<strong><?php echo $candidate_det['sno']; ?></strong></span></td>
                                    <td align="right"><span class="narmal">Admission Number&nbsp;:&nbsp;<strong><?php echo $candidate_det['admissionno']; ?> </strong></span></td>
                                  </tr>
                                </table>								 </td>
								
								</tr>	
                                
                                
                          
								<tr>
								  <td width="1" ></td>
								<td width="1" ></td>
								<td  align="center" valign="top">
									<table width="100%" border="0">
									<tr>
									<td height="30" colspan="4" align="left" valign="top" ><table width="100%" border="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;  line-height:19px;">
                                      <tr>
                                      <?php $student_det=$db->getRow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$candidate_det['name']."'");   ?>
                                        <td width="39%">1. Name Of Pupil</td>
                                        <td width="61%"><b><?php echo ucwords( $student_det['pre_name']); ?></b></td>
                                      </tr>
										<tr>
										  <td> 
										  2. Name Of Father</td>
									      <td><strong><?php echo ucwords($candidate_det['fname']); ?></strong></td>
									  </tr>
										<tr>
										  <td>3. Nationality</td>
                                          <td><strong><?php echo ucwords($candidate_det['nationality']); ?></strong></td>
									  </tr>
                                      <tr>
                                        <td>4.Whether the pupil belong to scheduled caste or seheduled tribe</td>
                                        <td><strong><?php echo ucwords($candidate_det['sc']); ?></strong></td>
                                      </tr>
                                        <tr>
                                          <td>5. Date of birth according to admission register</td>
                                          <td><strong><?php echo ucwords($candidate_det['dobw']); ?></strong> &nbsp;&nbsp;In Fig                                           <strong> <?php  if($candidate_det['dob']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",ucwords($candidate_det['dob']));}else{echo "0000-00-00";}  ?></strong></td>
                                      </tr><tr>
                                        <td>6. Class in which is pupil is studying<strong>&nbsp;
										
										</strong></td>
                                        <td><strong>
                                        <?php 
										$student_detclass=$db->getRow("SELECT * FROM es_classes WHERE es_classesid='".$candidate_det['class_name']."'");   
										
										?>
                                        <?php echo ucwords($student_detclass['es_classname']); ?>&nbsp;<?php if($candidate_det['section']!=""){echo "&nbsp;,&nbsp;".ucwords($candidate_det['section']);} ?></strong></td>
                                      </tr>
                                      
                                      <tr>
                                        <td>7. Subject studing, starting in each Compulsory or elective according&nbsp;&nbsp;to NCERT Syllabus Hindi,English,Generalscience,Socialstudy</td>
                                        <td><strong><?php echo ucwords($candidate_det['subject']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>8. Date of promotion of class in</td>
                                        <td><strong>
                                          <?php  if($candidate_det['dobp']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",ucwords($candidate_det['dobp']));}else{echo "0000-00-00";}  ?>
                                        </strong></td>
                                      </tr>
                                      <tr>
                                        <td>9. Month Upto Fees has been paid</td>
                                        <td><strong><?php echo ucwords($candidate_det['monthfeepay']); ?>&nbsp;<?php echo ucwords($candidate_det['exam_date']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>10. Whether the pupil was in receipt of any fee concession?&nbsp;if so state the nature of concession</td>
                                        <td><strong><?php echo ucwords($candidate_det['feecons']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>11. Date of pupil last attend at the school</td>
                                        <td><strong>
                                          <?php  if($candidate_det['doblast']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",ucwords($candidate_det['doblast']));}else{echo "0000-00-00";}  ?>
                                        </strong></td>
                                      </tr>
                                      <tr>
                                        <td>12. Date in which <?php if($candidate_det['gender']=='Male'){ echo'He';  } elseif($candidate_det['gender']=='Female'){ echo'She';  } ?> was stuck off the rolls of school</td>
                                        <td><strong>
                                          <?php  if($candidate_det['datestuck']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",ucwords($candidate_det['datestuck']));}else{echo "0000-00-00";}  ?>
                                        </strong></td>
                                      </tr>
                                      <tr>
                                        <td>13. Attandence during the period</td>
                                        <td><strong><?php echo ucwords($candidate_det['attendance']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>14. Date of issue of this certificate</td>
                                        <td><strong>
                                          <?php  if($candidate_det['sissuecetrti']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",ucwords($candidate_det['sissuecetrti']));}else{echo "0000-00-00";}  ?>
                                        </strong></td>
                                      </tr>
                                      <tr>
                                        <td>15. Reason for leaving the school</td>
                                        <td><strong><?php echo ucwords($candidate_det['rls']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>16. Whether NCC Cadet/Boys Scout/Girl Guide?</td>
                                        <td><strong><?php echo ucwords($candidate_det['ncc']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>17.Games Played and Other co-cercular activities in which&nbsp;&nbsp;pupil usually took part with degree or proficiency attend.</td>
                                        <td><strong><?php echo ucwords($candidate_det['games']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>18. Conduct</td>
                                        <td><strong><?php echo ucwords($candidate_det['conduct']); ?></strong></td>
                                      </tr>
                                      <tr>
                                        <td>19. Annual Charges Of Year</td>
                                        <td><strong><?php echo  $_SESSION['eschools']['currency']."&nbsp;".ucwords($candidate_det['acharge']); ?></strong></td>
                                      </tr>
                                     <tr><td colspan="5"> <table width="100%" border="0" >
									
									
									<tr>
									  <td width="34%" height="10" align="left" class="narmal">Date <strong> <?php echo date("d-m-Y");?></strong></td>
  									   </tr>
								
									</table>	</td></tr>
                                    </table>
									  </td>
									</tr>
								  </table>								</td>
                                  
								
								</tr>
                                  
								
							  </table>
							
							 
							
							
							       
							
							  
							  </td></tr>
							 
							
							
</table>
<script type="text/javaScript">
  function printing(){
	  document.getElementById("printbutton").style.display = "none";
	  window.print();
	  window.close();
	 }

  </script>
  
<script type="text/javascript">
	function getfieldvalues(){
		if (document.getElementById('sameaddress').checked){
	//alert("checked");
			document.preadmission.pre_address.value=document.preadmission.pre_address1.value;
			document.preadmission.pre_city.value=document.preadmission.pre_city1.value;
			document.preadmission.pre_pincode.value=document.preadmission.pre_pincode1.value;
			document.preadmission.pre_phno.value=document.preadmission.pre_phno1.value;			document.preadmission.pre_state.value=document.preadmission.pre_state1.value;
			

			document.preadmission.pre_mobile.value=document.preadmission.pre_mobile1.value;
			document.preadmission.pre_country.value=document.preadmission.pre_country1.value;
		}else{
			document.preadmission.pre_address.value="";
			document.preadmission.pre_city.value="";
			document.preadmission.pre_pincode.value="";
			document.preadmission.pre_phno.value="";			document.preadmission.pre_state.value="";
			

			document.preadmission.pre_mobile.value="";
			document.preadmission.pre_country.value="";
		}
  }
  function open_sub(val){
   popup_letter('?pid=94&action=display_sub&scat_id='+val);
  }
 
</script>
<script type="text/javascript">
function popup_letter(url) {
		 var width  = 500;
		 var height = 300;
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

<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>
<?php }?>