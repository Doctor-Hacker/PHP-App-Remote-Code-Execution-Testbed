<?php
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
?>

<script type="text/javascript">
function valid()
{
if(document.searchschool.group.value==0)
{
alert("Please Select a group");
return false;
}
else if(document.searchschool.schoolname.value==0)
{
alert("Please Select a School");
return false;
}
else
return true;

}

</script>

<?php
if($action=="searchschool")
{
?>
<form method="post" name="searchschool" action="" enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	    <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Select School </span></td>
	</tr>
	<tr>
	    <td height="25" ><span class="admin">&nbsp;&nbsp;Group</span></td>
		<td height="25" ><span class="admin"><select name="group" onchange="document.searchschool.submit();">
		<option value="">select group</option>
		<?php
		while($grp=mysql_fetch_assoc($grprs))
		{
		
		?>
		<option value="<?php echo $grp['es_groupsid'] ?>"  <?php if($group==$grp['es_groupsid']) {?> selected="selected"<?php } ?>><?php echo $grp['es_groupname']; ?></option>
		<?php
		}
		?>
		</select></span></td>
	</tr>
	<tr>
	    <td height="25" ><span class="admin">&nbsp;&nbsp;School</span></td>
		<td height="25" id="myid"><span class="admin"><select name="schoolname">
		<option value="">select school</option>
		<?php
		
		while($sch=mysql_fetch_assoc($schrs))
		{
		?>
		<option value="<?php echo $sch['school_id'] ?>" <?php if($schoolname==$sch['school_id']) {?> selected="selected"<?php } ?>><?php echo $sch['school_name']; ?></option>
		<?php
		}
		?>
		
		</select></span></td>
	</tr>
	<tr>
	    <td height="25" colspan="3" align="center" ><input type="submit" name="searchsch" id="searchsch" value="Submit" class="bgcolor_02" onclick="javascript:return valid();"/></td>
	</tr>
	<tr>
	    <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;&nbsp;</span></td>
	</tr>
</table>
<?php
}
?>

<?php
if ($action=='serchclass'){
?>
<script type="text/javascript">
function newWindowOpen(href){
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<script type="text/javascript">

	function fun()
	{ 
		 if(document.serchstudent.sm_class.value == "all"){
			alert("Select Class");		
			return false;
		}
		
		if(document.serchstudent.ac_year.value == "select"){
			alert("Select Academic year");		
			return false;
		}
		if(document.serchstudent.pre_name.value == ""){
			alert("Select First Name");		
			return false;
		}
		if(document.serchstudent.pre_motheroccupation.value == ""){
			alert("Select Last Name");		
			return false;
		}
		else
		{
		return true;
		}	   
	}
</script>
<script type="text/javascript">
function logs(MyWin,user_id,table_name,record_id,action)
    {
	winpopup=window.open(MyWin+'?user_id='+user_id+'&table_name='+table_name+'&record_id='+record_id+'&action='+action,table_name+user_id,'height=222,width=555,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">


<form action="?pid=21&action=serchclass&ssid=<?=$school_type?>&gid=<?=$group_type?>" method="post" name="serchstudent">
	 <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <tr><td height="25" colspan="3" class="bgcolor_02">Search Student Record</td></tr>
	  <tr>
		 <td width="1" class="bgcolor_02"></td>
		 <td  align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
           <tr>
             <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
               </table>
                 <table width="100%" border="0" cellspacing="5" cellpadding="0">
				 
				 
				 
				 
				 
				 
				 

                   <tr>
                     <td height="25" colspan="6" align="right" ><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font> </td>
                   </tr>
				   
				   
				   
				   
				   
				  <?php /*?> <tr>
				    
				  
				    <td width="27%" class="narmal">&nbsp;group</td>
                    
					  <td align="left" width="30%"><select name="group_type" onchange='submit();'>
					  <option value="">select</option>
                          <?php 
							  if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0)
							   { 
							  		foreach ($obj_grouplistarr as $eachrecord)
									{ ?>
                          				<option value="<?php echo $eachrecord->es_groupsId; ?>" <?php if ($group_type== $eachrecord->es_groupsId) { ?> selected="selected" <?php } ?>><?php echo $eachrecord->es_groupname; ?></option>
                          <?php } }?>
                      </select></td>
					  
					  
					  
					  
					  
					  <td width="27%" class="narmal">&nbsp;school</td>
					  
					  <td align="left" width="30%"><select name="school_type" onchange='submit();'>
					  <option value="">select</option>
                      <?php 
							  
							  if (is_array($obj_schoollistarr1) && count($obj_schoollistarr1) > 0) 
							  { 
							  	foreach ($obj_schoollistarr1 as $eachrecord1)
								{
							  
							   ?>
							   
                          <option value="<?php echo $eachrecord1->school_id; ?>" <?php if ($school_type==$eachrecord1->school_id) { ?> selected="selected" <?php }  ?>><?php echo $eachrecord1->school_name; ?></option> 
                          <?php }} ?></select>						  </td>
						  
						  
						  
						  </tr><?php */?>
						  <tr>
						  
						  
						  
						  
						    <td width="27%" class="narmal">&nbsp;class</td>
					  <td align="left" width="30%" class="narmal">
					  <!-- <select name="<?php if(isset($back)){echo $sm_class = $clid;}else{ echo 'sm_class';}?>" style="width:180px;" >-->
					  
					  
					  
					  
					  <select name="sm_class" onchange="submit();">
					  <option value="">select</option>
					  
                      <?php 
							  
							  if (is_array($obj_classlistarr) && count($obj_classlistarr) > 0) 
							  { 
							  	foreach ($obj_classlistarr as $eachrecord1)
								{
							  
							   ?>
                          <option value="<?php echo $eachrecord1->es_classesId; ?>" <?php if($sm_class == $eachrecord1->es_classesId) {?> selected="selected"<?php  }  ?>><?php echo $eachrecord1->es_classname; ?></option>  
						  	  <?php }} ?>
						  </select></td>
				   
				   			   
				   
                   
                    <?php /*?> <td width="27%" class="narmal">&nbsp;Class</td>
                     <td width="37%" align="left" class="narmal">
					<!-- <select name="<?php if(isset($back)){echo $sm_class = $clid;}else{ echo 'sm_class';}?>" style="width:180px;" >-->
					
					 <select name="sm_class" style="width:180px;" >
                         <option value="">select</option>
						
                       <?php 
				  
					  foreach($allClasses as $eachClasses) {?>
                      <option value="<?php echo $eachClasses['es_classesid']; ?>"
						 <?php echo ($eachClasses['es_classesid']==$sm_class)?"selected":""?>> <?php echo $eachClasses['es_classname']; ?></option>
                      <?php
				       }
					
				  ?>
						  </select></td><?php */?>
						  
						
				   <td width="13%" class="narmal">Student Name </td>
                     <td colspan="2" align="left" class="narmal"><?php //echo $_SESSION['eschools']['student_prefix'];?>
                       <input type="text" name="pre_name" id="pre_name" value="<?php if(isset($pre_name) && $pre_name!=''){echo $pre_name;}if(isset($back));?>" size="20" /></td>
                   </tr>
                   <tr>
				   
				   
                     <td width="27%" align="left" class="narmal">&nbsp;Academic Year </td>
                   <td align="left" class="narmal"><select name="ac_year" style="width:180px;">
                        <!-- <option value="select" >Select Academic Year</option>-->
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                     </select></td>
					 
				  
                     <td width="13%" class="narmal">Last Name</td>
                     <td width="23%" align="left" class="narmal"><label>
                       <input type="text" name="pre_motheroccupation" value="<?php if(isset($pre_motheroccupation) && $pre_motheroccupation!=''){echo $pre_motheroccupation;}if(isset($back)); ?>" />
                     </label></td>
                   </tr> 
				   <tr>
				    <td width="21%" class="narmal">Admission Id</td>
                     <td width="23%" align="left" class="narmal"><label>
                       <input type="text" name="admission_id" id="admission_id" size="30" value="<?php if(isset($admission_id) && $admission_id!=''){echo $admission_id;} ?>" /></label></td>
					</tr>
				   
				   <?php /*?><tr>
				    <td width="13%" class="narmal">Enrollment No. </td>
                     <td width="23%" align="left" class="narmal"><label>
   <input type="text" name="enrollno" value="<?php if(isset($enrollno) && $enrollno!=''){echo $enrollno;}if(isset($back)); ?>" />
                     </label></td>
                   </tr> <?php */?>
				  <?php /*?> <tr>
                     <td width="27%" align="left" class="narmal"> </td>
                   <td align="left" class="narmal"></td>
                     <td width="13%" class="narmal"></td>
                     <td width="23%" align="left" class="narmal"></td>
                   </tr><?php */?>
				                    
                   <tr>
                     <td colspan="6" height="18"  align="center"><span class="narmal">
                     <input name="search" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer"/></td>
                   </tr>                   
				    <?php 
				     if(($nill1!="" && isset($Search)) || isset($_REQUEST['fname']) || isset($_REQUEST['lst'])){ ?>
                   <tr>
                     <td colspan="6" height="18" class="narmal" align="center">*<?php  echo $nill1; ?>! </td>
                   </tr>
                   <?php } ?>
				  
                   <tr>
                     <td colspan="6" height="10" class="narmal"><br />
                       <table width="100%" border="" class="tbl_grid" cellpadding="2">
                         <!--DWLayoutTable-->
                           <?php /*?><tr>
                             <td width="26%" rowspan="5" align="center" valign="middle"><img src="images/student_photos/<?php echo $eachrecord['pre_image']; ?>"  width="127" height="105" /> </td>
                             <td width="29%" height="23" class="narmal">Registration No </td>
                             <td width="45%" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['es_preadmissionid'];?></td>
                           </tr><?php */?>
                           <tr class="bgcolor_02">
                             <td width="405" height="25"  align="center" >Applicant Name</td>
                             <td width="56%"  align="center" >Action</td>
                           </tr>
						   <tr>
						  
						    <?php
				   
				      $i=$start;
					  if(count($es_studentList) > 0){
					  ?>
					  <pre><?php //print_r($es_studentList);?></pre>
					  <?php						
				      	foreach ($es_studentList as $eachrecord){
						$i++;
						
					$query="SELECT * FROM  es_libbookfinedet";
					$result=mysql_query($query) or die("Data Extraction Not Possible");
					$ret=mysql_fetch_array($result);
					$fine_paid=$ret['fine_paid'];
					
					if($fine_paid > 0){
					?>
					
							
					<?php
//					//$numrows=mysql_num_rows($result);
//					$es_libbookfine=0;
//						
//						
//						while($es_libbookfine > 0)
//						{	
//							
//							if($es_libbookfine % 2)
// 							$bgcolor="#000000"; 
//							else
// 							$bgcolor="#FF0000";
					    	echo "ERROR";}
	//$qry="select es_preadmissionid from es_preadmission where pre_fromdate='".$pre_fromdate."'";
//$res=mysql_query($qry);
//$ret=mysql_fetch_array($res);
//						
							?>
							
									
						
                              <td height="25" valign="top" class="narmal"><?php echo '<font color=red>'.$eachrecord['pre_name'].'</font>'?>&nbsp;<?php echo '<font color=red>'.$eachrecord['middle_name'].'</font>'?>&nbsp;<?php echo '<font color=red>'.$eachrecord['pre_lastname'].'</font>'?></td>
							  
                              <td class="narmal"><span class="narmal" style="padding:5px"><a style="text-decoration:none" target="_parent" href="?pid=21&action=editstudent&sid=<?php echo $eachrecord['es_preadmissionid'];?>&fname=<?php if(isset($pre_name) && $pre_name!="")echo $eachrecord['pre_name'];?>&clss=<?php if(isset($sm_class))echo $sm_class;?>&lst=<?php if(isset($pre_motheroccupation) && $pre_motheroccupation!="")echo $eachrecord['pre_motheroccupation'];?>&ssid=<?=$ssid?>&gid=<?=$gid?>&clid=<?php echo $eachrecord['pre_class'];?>&secid=<?php echo $eachrecord['pre_sec'] ?>" >
                              

  
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;">Edit</span> </a>
							   
							<?php //}?>
							
							
							   
							   <a target="_blank" style="text-decoration:none" href="?pid=108&action=viewprofile&ssid=<?=$ssid?>&gid=<?=$gid?>&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clid=<?php echo $eachrecord['pre_class'];?>&secid=<?php echo $eachrecord['pre_sec'];?>" >
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;"  >View Profile</span><?php //}}?> </a></span>
							   
							    <a target="_blank" style="text-decoration:none" href="?pid=27&action=stud_report&ssid=<?=$ssid?>&gid=<?=$gid?>&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clid=<?php echo $eachrecord['pre_class'];?>&secid=<?php echo $eachrecord['pre_sec'];?>" >
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;"  >Attendance</span><?php //}}?> </a></span>
							   
							    <a target="_blank" style="text-decoration:none" href="?pid=110&action=viewfeedetails&ssid=<?=$ssid?>&gid=<?=$gid?>&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clid=<?php echo $eachrecord['pre_class'];?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>"  >
                         
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;"  >Fees</span><?php //}}?> </a></span>
							   
							    <a target="_blank" style="text-decoration:none" href="?pid=111&action=classwiseviewresult&ssid=<?=$ssid?>&gid=<?=$gid?>&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clid=<?php echo $eachrecord['pre_class'];?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >
								
								
					
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;"  >Marks</span><?php //}}?> </a></span>
							   
							    <a target="_blank" style="text-decoration:none" href="?pid=112&action=view&ssid=<?=$ssid?>&gid=<?=$gid?>&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clid=<?php if($sm_class!=''){echo $eachrecord['pre_class'];}else{echo $eachrecord['pre_class'];}?>&secid='<?php if($sm_section!=''){echo $eachrecord['pre_class'];}else {echo $eachrecord['pre_class'];}?>" >
                               
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;">Status</span><?php //}}?> </a></span>	
							   
							   
							   
							   
	<!--change-->
<a href="?pid=21&action=delete&ssid=<?=$ssid?>&gid=<?=$gid?>&id=<?php echo $eachrecord['es_preadmissionid'] ?>"  onclick="if(confirm('Are you sure?')){ return true;}else{ return false; } ;"  title="Delete"><img src="images/b_drop.png" height="12" width="18"/></a>&nbsp;&nbsp;
  
    <!--change-->	   					     </td>
                           </tr>   <?php }} ?>
                       </table>                     </td>
                   </tr>
                 </table>
          <table width="100%" border="0">
                   <tr>
				  <?php if(isset($ac_year)){
				  if($es_studentList >0){
				  ?>
				   
                     <td height="15" colspan="3" align="center">
					 <?php 	
					  paginateexte($start, $q_limit, $no_rows,"&action=$action&sm_class=$sm_class&sm_section=$sm_section&ac_year=$ac_year&examstatus=$examstatus"); ?> </td>
					 
					 <?php }} ?>
                   </tr>
                   <tr>
				    <?php if(isset($ac_year)){?>
                     <td align="right" valign="middle"><div>
					 <?php /*if(in_array('5_3',$admin_permissions)){?><input name="Submit2" type="button" onclick="newWindowOpen ('?pid=21&amp;action=printsearchclass<?php echo $searchurl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer"/><?php }*/?>
                       
                     </div></td>
				  <?php } ?>
                   </tr>
               </table></td>
           </tr>
         </table></td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>

  </form>
</table>

<?php
 }
?>
			
<?php

/**
* ********Printing the students with respect to class and reg.number*******
*/
			
if($action=="printsearchclass")	{?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="" method="post" name="serchstudent">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		  <td height="25" colspan="3" class="bgcolor_02" align="center"><span class="admin">&nbsp;Students <?php if($sm_class!="" ) {echo "of class : ".classname("$sm_class"); }?></span></td>
		
	  </tr>
	  <tr>
		  <td class="bgcolor_02" width="1"/> 
		  <td  valign="top" align="left"><table width="100%" border="0" cellspacing="5" cellpadding="0">
			<?php if($nill1!=""){ ?>
				
	   <tr>
		  <td colspan="5" class="bgcolor_02" align="center"><?php  echo $nill1;  ?>
		  </td>
	   </tr>
			<?php } ?>
			
			<tr class="bgcolor_02">
                             <td width="49%"  align="center" height="20" >Applicant Name</td>
                            <!-- <td width="51%"  align="center" height="20" >Applicant Name</td>-->
                           </tr>
		<tr>
		  <td colspan="5" height="10" class="narmal" align="left">
				<?php
				$i=$start;
				  if(count(	$es_studentList) > 0){
				    	foreach ($es_studentList as $eachrecord){
						$i++;	
						$status=$db->getRows("select * from es_preadmission_details where es_preadmissionid=".$eachrecord['es_preadmissionid']." 
					                           AND pre_fromdate<='".$from_finance."'");
						            if(count($status)==1){
									$value="New Admitted";
									}else{
									$value="Promoted";
									}			 		
				?>
				<table width="100%" border="1" class="tbl_grid">
                  
				   
				  
                  <tr>
                    <td width="49%" height="25" class="narmal"><?php echo $eachrecord['pre_name'];?></td>
                    
                  </tr>
                  
                
				   
                </table>
			  <?php }} ?>
			</td>
		 </tr>
	</table>
   </td>
		<td class="bgcolor_02" width="1"/>
 </tr>
	  <tr>
     <td height="1" colspan="3" class="bgcolor_02"></td>
     </tr>
	 
</form>
</table>
<?php

/**
* ********End of Printing the students with respect to class and reg.number*******
*/

}
?>	
			
<?php

/**
* ********Student Editing*****************************
*/
			
if($action=="editstudent" && $back=="")
{
 //foreach ($es_studentview as $eachrecord1){
 
?>


 <script>
 
function checkAge()
{

if(document.getElementById('pre_dateofbirth').value!='')
{


myDOB = document.getElementById('pre_dateofbirth').value.split('/');

myDate = myDOB[0];
myMonth= myDOB[1];
myYear = myDOB[2];

var age;
var now = new Date();
var todayDate = now.getDate();
var todayMonth = now.getMonth();
var todayYear = now.getFullYear();
if(todayYear < myYear)
{
alert('Eneter Valid Date');
return false;
}
else
{
if(myMonth > todayMonth+1)
{
age=todayYear-myYear-1;

month=12-myMonth+todayMonth+1;
}
else
{

age=todayYear-myYear;

month=todayMonth-myMonth+1;
}

document.getElementById('pre_age').value=age+'.'+month;

}
}
}

 </script>	


<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');

}
</script>	
<script type="text/javascript">
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
			url="?pid=55&action=classwisebatch&cid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				//document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
			}
		}
</script>			
<form method="post" name="preadmission" action="" enctype="multipart/form-data">













<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
        <tr>
           <td height="6" colspan="3" class="error_message" align="center"></td>
    </tr>
        
         <tr>
            <td height="19" colspan="3" class="bgcolor_02"><a href="#" class="admin"> &nbsp;&nbsp;Pre Admission</a></td>
    </tr>
           
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td width="956" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
			 
			 
			 
			 
             <td width="1" class="bgcolor_02"></td>
          </tr> 
		  
		  
		  
		  
		  
		  
          <tr>
             <td height="410" class="bgcolor_02"></td>
             <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			 
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">STUDENT UID(Aadhar Card) No. </span></td>
                 <td align="left">:</td>
                   <td align="left"><input name="aadharno" type="text" size="15" value="<?php echo $eachrecord1['aadharno']; ?>" /></td>
				   
                   <td align="left"><span class="narmal"></span></td>
                   <td align="left"></td>
                   <td align="left">
                   
                  <?php /*?><input name="pre_lastname" type="text" size="15" value="<?php if($eachrecord1['pre_lastname']!='') {echo $eachrecord1['pre_lastname']; } else { echo $pre_lastname;} ?>" />  <?php */?>               </td>
               </tr>
			 
			 
			 
			 
               <!--DWLayoutTable-->
			    
			 <tr>
                   <td width="13" height="30">&nbsp;</td>
                   <td width="275" align="left"><span class="narmal">Title</span></td>
                 <td width="9" align="left">:</td>
                   <td width="229" align="left"> 
									   
									  <?php
								if(isset($pre_serialno) && $pre_serialno=="Master" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Master") 
								{
								$sel_gend_mr= "selected='selected'"; }else{$sel_gend_mr = ""; 
								}
								if(isset($pre_serialno) && $pre_serialno=="Miss" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=='Miss') 
								{
								$sel_gend_miss = "selected='selected'";}else{$sel_gend_miss = ""; }
	    if(isset($pre_serialno) && $pre_serialno=="Mrs" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mrs") 
								{
								$sel_gend_mrs = "selected='selected'";}else{$sel_gend_mrs = "";
								}
								?>
                                      <select name="pre_serialno"  id="pre_serialno" style="width:120px;">
                                        <option value="" >Select Tittle</option>
                                        <option  value="Master" <?php echo $sel_gend_mr; ?> >Master</option>
                                        <option  value="Miss" <?php echo $sel_gend_miss; ?>>Miss</option>
										<?php /*?><option  value="Mrs" <?php echo $sel_gend_mrs; ?>>Mrs</option><?php */?>
                                      </select>	</td>		
									  
									  
                   <td width="173" align="left"><span class="narmal">First Name</span></td>
                   <td width="8" align="left">:</td>
                   <td width="249" align="left">
                   
                  <input name="pre_name" type="text" size="15" value="<?php echo htmlentities($eachrecord1['pre_name']); ?>"  />                 </td>
               </tr>
			 
			 
			 
				   
				   
               <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Middle Name </span></td>
                 <td align="left">:</td>
                   <td align="left"><input name="middle_name" type="text" size="15" value="<?php echo $eachrecord1['middle_name']; ?>" /></td>
				   
                   <td align="left"><span class="narmal">Last Name</span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                  <input name="pre_lastname" type="text" size="15" value="<?php if($eachrecord1['pre_lastname']!='') {echo $eachrecord1['pre_lastname']; } else { echo $pre_lastname;} ?>" />                 </td>
               </tr>
			   
			   <?php
			   $query="SELECT * FROM es_preadmission";
			   $result=mysql_query($query) or die("Data Extraction Not Possible");
		       //$numrows=mysql_num_rows($result);
		       $ret=mysql_fetch_array($result);
			   
			   
			   ?>
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Gender </span></td>
                   <td align="left">:</td>
                   <td align="left">
				   <?php
						   
						  
								if(isset($pre_gender) && $pre_gender=="male" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=="male") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_gender) && $pre_gender=="female" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=='female') 
								{$sel_gend_fm = "selected='selected'";}else{$sel_gend_fm = ""; }
								?>
                                      <select name="pre_gender"  id="pre_gender" style="width:120px;">
                                        <option value="" >Select Gender </option>
                                        <option  value="male" <?php echo $sel_gend_m; ?> >Male</option>
                                        <option  value="female" <?php echo $sel_gend_fm; ?>>Female</option>
                                      </select></td>
                   <td align="left"><span class="narmal">Academic From</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_fromdate" type="text" size="15" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_fromdate']);?>" readonly/><font color="#FF0000">&nbsp;*</font></td>
               </tr>
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Admission Date</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="admission_date" type="text" id="admission_date" size="10" value="<?php echo formatDBDateTOCalender($eachrecord1['admission_date']);
									 ?>" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                   
				   <td align="left"><span class="narmal">Academic To </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_todate" type="text" size="15" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_todate']);?>" readonly /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   
                 <tr>
                   <td height="40">&nbsp;</td>
                   <td align="left"><span class="narmal">Date&nbsp;Of&nbsp;Birth </span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                   <table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="10" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly /></td>
                                        <td width="70%">
                                        
                                        <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe></td>
                                      </tr>
                     </table>
                   
                   
               </td>
                 
				   <td align="left"><span class="narmal">Class</span></td>
                   <td align="left">:</td>
                   <td align="left">
                <?php /*?><select name="pre_class" style="width:120px;" onchange="this.form.submit();"><?php */?>
				<select name="pre_class" style="width:120px;" >
                <option value="">Select Class</option>
             	<?php 
								$classlist = getallClasses();
								foreach($classlist as $indclass) 
								{
								if(($es_enquiryList[0]->pre_class == $indclass['es_classesid']) || ($indclass['es_classesid']==$clid) || ($indclass['es_classesid']==$pre_class))
								{ 
								$sel_cl = "selected='selected'"; 
								}
								else 
								{ 
								$sel_cl  ="";
								}
								?>
<option <?php echo $sel_cl; ?> value="<?php echo $indclass['es_classesid']; ?>" ><?php echo $indclass['es_classname']; ?></option>
                     <?php } ?>
                               </select>&nbsp;<font color="#FF0000"><b>*</b></font>					           </tr>
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							
                               </select>&nbsp;<font color="#FF0000"><b>*</b></font>					           </tr>
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
                                 <?php /*?> <tr>
                                   <font color="#FF0000"><b>*</b></font></td>
                                    <td align="left">Subjects</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($pre_class) && $pre_class>=1){ ?>
									<select name="scat_id" >
                                      <option value="">Select Subject</option>
                                   <?php 
									
									if(isset($pre_class) && $pre_class>=1){
									
									$sub_cat_arr = $db->getrows("SELECT * FROM subjects_cat WHERE classid='".$pre_class."'");
									}
									
									
									if(count($sub_cat_arr)>0){
									foreach($sub_cat_arr  as $each){
									?>
                                    <option value="<?php echo $each['scat_id'];?>" <?php 
									if($scat_id==$each['scat_id']){echo "selected='selected'";}?>><?php echo $each['scat_name']; ?></option>
                                    <?php
									}
									}
									
									
									?>
                                    </select><?php } elseif($es_enquiryList[0]->scat_id!='')  {?><?php ?><input type="text" name="scat_id" value="<?php 
									$online_sql="select * from subjects_cat where scat_id	=".$es_enquiryList[0]->scat_id;
 $online_row=$db->getRow($online_sql);
									
									
									if($online_row['scat_name']!='') { echo $online_row['scat_name'];} else { echo "---";}?>" readonly="readonly" style="width:110px;"/> <?php } ?> 	<font color="#FF0000"><b>*</b></font></td>
                                  </tr><?php */?>
								 
								 
								 
								 
								 <?php /*?> <tr>
                                   <?php /*?> <td height="30" align="left">Branch</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="es_branch" type="text" id="es_branch" size="15" value="<?php echo $es_branch;?>"  />
                                    <font color="#FF0000"><b>*</b></font></td>
                                  </tr>
								  <tr>									
									<td class="narmal" align="left" height="30">Level</td>
									<td>:</td>
									<td><select name="pre_contactname2" id="pre_contactname2" style="width:150px;"/>
									<option value="" >Select Level </option>
									<option value="PG"<?php if($pre_contactname2=="PG") {	echo "selected";} ?> >PG
									</option>
									<option value="UG"<?php if($pre_contactname2=="UG") {	echo "selected";} ?> >UG
									</option>
									
									</select>
									</td>
							   </tr> <?php */?>
				  </td>
               </tr>
			   
			   
			 <!--change-->
			 
			 <tr>
                  <td height="40">&nbsp;</td>
                   <td align="left"><span class="narmal"></span></td>
                   <td align="left"></td>
                   <td align="left">
                   
                   <table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><!--<input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="10" value="<?php  formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly="readonly" /> --></td>
                                        <td width="70%">
                                        
                                        </td> 
                                      </tr>
                     </table>
                   
                   
              
			  
			   <?php /*?>    
                   <input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="15"  value="<?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly />
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe><?php */?></td>
                   <td align="left"><span class="narmal"></span></td>
                   <td align="left"></td>
                   <td align="left"><?php /*?><select name="pre_sec" style="width:120px;" ><?php */?>
								<?php	
								if(isset($clid))
								{
									$que1="select * from es_sections where class_id=".$clid; 
								}elseif(isset($pre_class))
								{
									$que1="select * from es_sections where class_id=".$pre_class;
								}else
								{
									$que1="select * from es_sections where class_id=".$eachrecord1['pre_class']."";
								}
										$rs=mysql_query($que1);
				?>
                                      <!--<option value="">Select Section</option>-->
                                      <?php 
								while($sec=mysql_fetch_assoc($rs)) {
								if( ($sec['section_name']==$eachrecord1['pre_sec']) || ($sec['section_name']==$secid)) 
								{ 
								$sel_cl = "selected='selected'"; 
								}
								else
								{ $sel_cl  ="";
								}
								?>
                <option <?php //echo $sel_cl ?> value="<?php //echo $sec['section_name']; ?>" ><?php //echo $sec['section_name']; ?></option>
                    <?php } ?>
                               </select>&nbsp;<font color="#FF0000"><b></b></font>					           </tr>
                                 <?php /*?> <tr>
                                   <font color="#FF0000"><b>*</b></font></td>
                                    <td align="left">Subjects</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($pre_class) && $pre_class>=1){ ?>
									<select name="scat_id" >
                                      <option value="">Select Subject</option>
                                   <?php 
									
									if(isset($pre_class) && $pre_class>=1){
									
									$sub_cat_arr = $db->getrows("SELECT * FROM subjects_cat WHERE classid='".$pre_class."'");
									}
									
									
									if(count($sub_cat_arr)>0){
									foreach($sub_cat_arr  as $each){
									?>
                                    <option value="<?php echo $each['scat_id'];?>" <?php 
									if($scat_id==$each['scat_id']){echo "selected='selected'";}?>><?php echo $each['scat_name']; ?></option>
                                    <?php
									}
									}
									
									
									?>
                                    </select><?php } elseif($es_enquiryList[0]->scat_id!='')  {?><?php ?><input type="text" name="scat_id" value="<?php 
									$online_sql="select * from subjects_cat where scat_id	=".$es_enquiryList[0]->scat_id;
 $online_row=$db->getRow($online_sql);
									
									
									if($online_row['scat_name']!='') { echo $online_row['scat_name'];} else { echo "---";}?>" readonly="readonly" style="width:110px;"/> <?php } ?> 	<font color="#FF0000"><b>*</b></font></td>
                                  </tr><?php */?>
								 
								 
								 
								 
								 <?php /*?> <tr>
                                   <?php /*?> <td height="30" align="left">Branch</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="es_branch" type="text" id="es_branch" size="15" value="<?php echo $es_branch;?>"  />
                                    <font color="#FF0000"><b>*</b></font></td>
                                  </tr>
								  <tr>									
									<td class="narmal" align="left" height="30">Level</td>
									<td>:</td>
									<td><select name="pre_contactname2" id="pre_contactname2" style="width:150px;"/>
									<option value="" >Select Level </option>
									<option value="PG"<?php if($pre_contactname2=="PG") {	echo "selected";} ?> >PG
									</option>
									<option value="UG"<?php if($pre_contactname2=="UG") {	echo "selected";} ?> >UG
									</option>
									
									</select>
									</td>
							   </tr> <?php */?>
				   
			 </td>
               </tr>
			   
			   
			 <!--change-->
			   
			  <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Mother Tongue</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_alerge" type="text" size="15" value="<?php echo htmlentities($eachrecord1['pre_alerge']); ?>" /></td>
                   <td align="left" valign="top"><span class="narmal">Educational Gap(if Any) </span></td>
                   <td align="left" valign="top"></td>
                   <td align="left" valign="top"><input name="edugap" type="text" size="15"  value="<?php  if($eachrecord1['edugap']!='') { echo $eachrecord1['edugap']; } else { echo $edugap;}?>"/></td>
               </tr>
			   
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Place of birth</span></td>
                   <td align="left">:</td>
				    <td align="left" valign="top"><input name="pre_placeofbirth" type="text" size="15"  value="<?php  if($eachrecord1['pre_placeofbirth']!='') { echo $eachrecord1['pre_placeofbirth']; } else { echo $pre_placeofbirth;}?>"/></td>
                  
                   <td align="left" valign="top"><span class="narmal">Religion </span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left" valign="top"><input name="test2" type="text" size="15"  value="<?php  if($eachrecord1['test2']!='') { echo $eachrecord1['test2']; } else { echo $test2;}?>"/></td>
               </tr>
			   
			    <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Nationality</span></td>
                   <td align="left">:</td>
                 <td align="left" valign="top"><input name="test1" type="text" size="15"  value="<?php  if($eachrecord1['test1']!='') { echo $eachrecord1['test1']; } else { echo $test1;}?>"/>
				 </td> <td align="left" valign="top"><span class="narmal">Caste </span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left" valign="top"><input name="test3" type="text" size="15"  value="<?php  if($eachrecord1['test3']!='') { echo $eachrecord1['test3']; } else { echo $test3;}?>"/></td>
               </tr>
			   
			   
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Blood Group</span></td>
                   <td align="left">:</td>
                 <td align="left" valign="top"><input name="pre_blood_group" type="text" size="15"  value="<?php  if($eachrecord1['pre_blood_group']!='') { echo $eachrecord1['pre_blood_group']; } else { echo $pre_blood_group;}?>"/>
				 </td> <td align="left" valign="top"><span class="narmal">Medium </span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left" valign="top"><input name="pre_weight" type="text" size="15"  value="<?php  if($eachrecord1['pre_weight']!='') { echo $eachrecord1['pre_weight']; } else { echo $pre_weight;}?>"/></td>
               </tr>
			    <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Mark Sheet Joined or Not</span></td>
                   <td align="left">:</td>
                 <td align="left"><select name="es_econbackward3">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward3']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="No" <?php if($eachrecord1['es_econbackward3']=='No') { echo "selected='selected'"; } ?>>No</option>
					
					</select>  
					</td>
				 <td align="left" valign="top"><span class="narmal">Admission Type</span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left"><select name="es_econbackward4">
				   
					<option value="General" <?php if($eachrecord1['es_econbackward4']=='General') { echo "selected='selected'"; } ?>>General</option>
					<option value="Underprivilaged" <?php if($eachrecord1['es_econbackward4']=='Underprivilaged') { echo "selected='selected'"; } ?>>Underprivilaged</option>
					<option value="Weaker" <?php if($eachrecord1['es_econbackward4']=='Weaker') { echo "selected='selected'"; } ?>>Weaker</option>
					
				</td>
               </tr>
			   
			    <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal"></span></td>
                   <td align="left"></td>
                 <td align="left"> 
					</td>
				 <td align="left" ><span class="narmal">Reason( if Weaker )</span></td>
                   <td align="left" >:</td>
                   <td align="left"><input type="text" name="reason" />
				   			
				</td>
               </tr>
			   
			   
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Date Of Birth Certificate Joined or Not</span></td>
                   <td align="left">:</td>
                 <td align="left"><select name="es_econbackward1">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward1']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="No" <?php if($eachrecord1['es_econbackward1']=='No') { echo "selected='selected'"; } ?>>No</option>
					
					</select>  
					</td>
				 <td align="left" valign="top"><span class="narmal">Cast Certificate joined or Not</span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left"><select name="es_econbackward2">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward2']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="No" <?php if($eachrecord1['es_econbackward2']=='No') { echo "selected='selected'"; } ?>>No</option>
					
					
					</td>
               </tr>
			   
			   
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Physical Handicaped </span></td>
                   <td align="left">:</td>
                 <td align="left"><select name="es_econbackward5">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward5']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="No" <?php if($eachrecord1['es_econbackward5']=='No') { echo "selected='selected'"; } ?>>No</option>
					
					</select>  
					</td>
				<td align="left" valign="top"><span class="narmal">Board  </span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left" valign="top"><input name="board" type="text" size="15"  value="<?php  if($eachrecord1['board']!='') { echo $eachrecord1['board']; } else { echo $board;}?>"/></td>
               </tr>
			   
			   
			   
			   
			   
			    <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Previous School Attend</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="es_home" type="text" size="15" value="<?php echo htmlentities($eachrecord1['es_home']); ?>" /></td>
                   <td align="left" valign="top"><span class="narmal">Class In Which Was Studying  </span></td>
                   <td align="left" valign="top">:</td>
                   <td align="left" valign="top"><input name="pre_hobbies" type="text" size="15"  value="<?php  if($eachrecord1['pre_hobbies']!='') { echo $eachrecord1['pre_hobbies']; } else { echo $pre_hobbies;}?>"/></td>
               </tr>
			   
			   
			   
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Date Of Leaving That School </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_dateofbirth1" type="text" id="pre_dateofbirth1" size="10" value="<?php  echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth1']);
									 ?>" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth1);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                   <td align="left"><span class="narmal"> Category</span></td>
                   <td align="left"></td>
                   <td align="left"><select name="caste_id">
                                   
                                    <?php 
									$caste_arr = $db->getrows("SELECT * FROM es_caste");
									if(count($caste_arr)>0){
									foreach($caste_arr  as $each){
									?>
                                    <option value="<?php echo $each['caste_id'];?>" <?php if($eachrecord1['caste_id']==$each['caste_id']){echo "selected='selected'";}?>><?php echo $each['caste']; ?></option>
                                    <?php
									}
									}
									?>
                                    </select></td><font color="#FF0000">&nbsp;</font></td>
               </tr> 
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
                 
			   
            
               
               
			   
		
									
									<tr>
                   <td height="30">&nbsp;</td>
                  <!-- <td align="left"><span class="narmal">Caste Category </span></td>-->
				   <td align="left"><span class="narmal">Status </span></td>
                   <td align="left">:</td>
                   <td align="left"><select name="pre_status">
				   
					<option value="Active" <?php if($eachrecord1['pre_status']=='Active') { echo "selected='selected'"; } ?>>Active</option>
					<option value="Inactive" <?php if($eachrecord1['pre_status']=='Inactive') { echo "selected='selected'"; } ?>>Inactive</option>
					<option value="Terminated" <?php if($eachrecord1['pre_status']=='Terminated') { echo "selected='selected'"; } ?>>Terminated</option>
					<option value="Temporary stop" <?php if($eachrecord1['pre_status']=='Temporary stop') { echo "selected='selected'"; } ?>>Temporary stop</option>
					</select>  
					</td>
						
						
									
									
                   <td rowspan="2" align="left" valign="top">Transfer Certificate is enclosed</td>
                   <td rowspan="2" align="left" valign="top">:</td>
                    <td rowspan="2" align="left" valign="top"><select name="es_econbackward">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="No" <?php if($eachrecord1['es_econbackward']=='No') { echo "selected='selected'"; } ?>>No</option>
					
               </tr>
			   
			   
			   
			   
			   
              <!--  <tr>                <td height="5"></td>
                                    <td rowspan="2" align="left">Religion</td>
                                    <td rowspan="2" align="left">:</td>
                                    <td rowspan="2" align="left"><input name="pre_contactno2" type="text" size="15" value="<?php 
									if(!isset($pre_contactno2)){$pre_contactno2 = $eachrecord1['pre_contactno2'];}
									echo $pre_contactno2;  ?>"  /></td>
               </tr>-->
                <tr>
                  <td height="30"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                </tr>
                
                
                
                
                
                
                                
                                  <?php /*?><tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Old Balance </td>
                                    <td align="left">:</td>
                                    <td align="left">
									<input name="ann_income" type="text" size="15" value="<?php 
									if(!isset($ann_income)){$ann_income = $eachrecord1['ann_income'];}
									echo $ann_income;  ?>"  />									</td>
                                    <td align="left">Enrollment No.</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="fee_concession" type="text" size="15" value="<?php 
									if(!isset($pre_age)){$pre_age = $eachrecord1['pre_age'];}
									echo $pre_age;  ?>"  /></td>
                                  </tr><?php */?>
                 
				 
				 
				 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Photo </span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_image" type="file" />
                     <input type="hidden" name="photo" value="<?php echo $eachrecord1['pre_image']; ?>"  /></td>
                   <td colspan="2" rowspan="4" align="left"><img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="0"/></td>
               </tr>
                 <!--<tr>
                   <td height="50">&nbsp;</td>
                   <td align="left"><span class="narmal">Student ID</span></td>
                   <td align="left">:</td>
<td colspan="2" align="left"><input name="pre_hobbies" type="text" size="15" value="<?php if($eachrecord1['pre_hobbies']!='') {echo $eachrecord1['pre_hobbies'];} else { echo $pre_hobbies; }?>"  /></td>
									
									<?php /*?>&nbsp;&nbsp;<input name="pre_hobbies1" type="text" size="3" value="<?php 
									if(!isset($pre_hobbies1)){$pre_hobbies1 = $eachrecord1['pre_hobbies1'];}
									echo $pre_hobbies1;  ?>"  />&nbsp;&nbsp;<input name="pre_hobbies2" type="text" size="3" value="<?php 
									if(!isset($pre_hobbies2)){$pre_hobbies2 = $eachrecord1['pre_hobbies2'];}
									echo $pre_hobbies2;  ?>"  /><?php */?>
               </tr>-->
                 <tr>
                   <td height="2"></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
                 <tr>
                  <!-- <td height="50"></td>
                   <td align="left">Reserve Category</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><?php
								if(isset($es_rcat) && $es_rcat=="Yes" || isset($eachrecord1['es_rcat']) && $eachrecord1['es_rcat']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_rcat) && $es_rcat=="No" || isset($eachrecord1['es_rcat']) && $eachrecord1['es_rcat']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_rcat"  id="es_rcat" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                      </select></td>-->
                 </tr>
                 <tr>
                                 
								  
								     <tr>
								      
									 <td height="20"></td>
								      <td td height="30" align="left">Username</td>
                                    <td align="left" valign="top">:</td>
                                      <td align="left" valign="top"><input name="pre_student_username" type="text" size="15" value="<?php if($eachrecord1['pre_student_username']!='') {echo $eachrecord1['pre_student_username'];} else { echo $pre_student_username; }?>"  /></td>
			                         <td align="left" valign="top"><span class="narmal">Password</span></td>
                     <td align="left" valign="top">:</td>
                   <td align="left" valign="top"><input name="pre_student_password" type="text" size="15" value="<?php echo $eachrecord1['pre_student_password']; ?>" /></td>
                </tr>
			   
			   
			   
			   
			   
			   
			   
			   <?php /*?>	<tr>
                   <td height="30">&nbsp;</td>
                  
				   <td align="left"><span class="narmal">Date Of Birth Certificate Joined or Not </span></td>
                   <td align="left">:</td>
                   <td align="left"> <select name="es_econbackward1">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward1']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="NO" <?php if($eachrecord1['es_econbackward1']=='No') { echo "selected='selected'"; } ?>>No</option>
					
					</select>  
					</td>
						
						
									
									
                   <td rowspan="2" align="left" valign="top">Cast Certificate joined or Not</td>
                   <td rowspan="2" align="left" valign="top">:</td>
<td rowspan="2" align="left" valign="top"><select name="es_econbackward2">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward2']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="No" <?php if($eachrecord1['es_econbackward2']=='No') { echo "selected='selected'"; } ?>>No</option>
					</select>  
					</td>
					
               </tr>
			   <?php */?>
			   
			   
			   
			   <?php /*?>
			   	<tr>
                   <td height="30">&nbsp;</td>
                  
				   <td align="left"><span class="narmal">Mark Sheet Joined or Not </span></td>
                   <td align="left">:</td>
                   <td align="left"><select name="es_econbackward3">
				   
					<option value="Yes" <?php if($eachrecord1['es_econbackward3']=='Yes') { echo "selected='selected'"; } ?>>Yes</option>
					<option value="NO" <?php if($eachrecord1['es_econbackward3']=='No') { echo "selected='selected'"; } ?>>No</option>
					
					</select>  
					</td>
						
						
									
									
                   <td rowspan="2" align="left" valign="top">Admission Type</td>
                   <td rowspan="2" align="left" valign="top">:</td>
<td rowspan="2" align="left" valign="top"><select name="es_econbackward4">
				   
					<option value="General" <?php if($eachrecord1['es_econbackward4']=='General') { echo "selected='selected'"; } ?>>General</option>
					<option value="Underprivilaged" <?php if($eachrecord1['es_econbackward4']=='Underprivilaged') { echo "selected='selected'"; } ?>>Underprivilaged</option>
					<option value="Weaker" <?php if($eachrecord1['es_econbackward4']=='Weaker') { echo "selected='selected'"; } ?>>Weaker</option>
					</select>  
					</td>
					
               </tr><?php */?>
			   
			   
			    
			 
			   
			 
			   
								
								  
								  
             </table></td>
			 
			 
					 
					  
                      <tr>
                       
                        
			 
			 
			 
             <td class="bgcolor_02"></td>
          </tr>
          <tr>
            <td height="20" class="bgcolor_02"></td>
            <td>&nbsp;</td>
            <td class="bgcolor_02"></td>
          </tr>          
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Present Address</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><textarea name="pre_address1" type="text" size="15"><?php echo $eachrecord1['pre_address1']; ?></textarea><font color="#FF0000">&nbsp;*</font></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                
				  <td height="30" align="left"><span class="narmal">Area</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><input name="pre_country1" type="text" size="15" value="<?php if($eachrecord1['pre_country1']!='') {echo $eachrecord1['pre_country1'];} else { echo $pre_country1; } ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_state1" type="text" id="pre_state1" value="<?php  if($eachrecord1['pre_state1']!='') {echo $eachrecord1['pre_state1']; } else { echo $pre_state1; }?>" size="15" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Post Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_pincode1" type="text" size="15" value="<?php  if($eachrecord1['pre_pincode1']!='') {echo $eachrecord1['pre_pincode1']; } else { echo $pre_pincode1; }?>" /></td>
                 <td align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
				 
                 <td align="left"><input name="pre_city1" type="text" size="15" value="<?php  if($eachrecord1['pre_city1']!='') {echo $eachrecord1['pre_city1']; } else { echo $pre_city1; }?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Residance No</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno1" type="text" size="15" value="<?php  if($eachrecord1['pre_phno1']!='') {echo $eachrecord1['pre_phno1'];} else { echo $pre_phno1; } ?>" /></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_mobile1" type="text" size="15"  value="<?php echo $eachrecord1['pre_mobile1']; ?>"/><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Home Landline Ph. no.</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno" type="text" size="15" value="<?php  if($eachrecord1['pre_phno']!='') {echo $eachrecord1['pre_phno'];} else { echo $pre_phno; } ?>" /></td>
                 <td align="left"><span class="narmal">Fathers Phone No. </span></td>
                 <td align="left">:</td>
                    <td align="left"><input name="pre_contactno" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno']!='') {echo $eachrecord1['pre_contactno'];} else { echo $pre_contactno; } ?>" /></td>
				 </tr>
				 
				 
				   <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Mothers Phone No.</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_contactno3" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno3']!='') {echo $eachrecord1['pre_contactno3'];} else { echo $pre_contactno3; } ?>" /></td>
                 <td align="left"><span class="narmal">Guardians Phone No.</span></td>
                 <td align="left">:</td>
                    <td align="left"><input name="pre_resno2" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno']!='') {echo $eachrecord1['pre_resno2'];} else { echo $pre_resno2; } ?>" /></td>
				 </tr>
			   
			   
               <tr>
                 <td>&nbsp;</td>
                 <td align="left">&nbsp;</td>
                 <td align="left">:</td>
                 <td align="left">&nbsp;</td>
                 <td colspan="3" align="left"><span style="color:#FF0000">(All future SMS messages will be sent to this number)</span></td>
               </tr>
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent  Address</span><span class="admin">             
					<input type="checkbox" name="sameaddress" id="sameaddress" value="0" onclick="javascript:getfieldvalues()" />
				Same as Above </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><textarea name="pre_address"><?php if($eachrecord1['pre_address']!='') { echo $eachrecord1['pre_address'];} else {echo $pre_address;} ?></textarea></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Area</span></td>
                 <td align="left">:</td>
                <td width="30%" align="left"><input name="pre_country" type="text" size="15"  value="<?php  if($eachrecord1['pre_country']!='') { echo $eachrecord1['pre_country'];} else {echo $pre_country;} ?>"/></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_state" type="text" size="15"  value="<?php  if($eachrecord1['pre_state']!='') { echo $eachrecord1['pre_state'];} else {echo $pre_state;} ?>"/></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pincode </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_pincode" type="text" size="15" value="<?php  if($eachrecord1['pre_pincode']!='') { echo $eachrecord1['pre_pincode']; } else {echo $pre_pincode;}?>" /></td>
                 <td align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
				 <td  align="left"><input name="pre_city" type="text" size="15"  value="<?php  if($eachrecord1['pre_city']!='') { echo $eachrecord1['pre_city']; } else {echo $pre_city;}?>"/></td>
                 
               </tr>
			   
			   
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Residance No</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno" type="text" size="15"  value="<?php  if($eachrecord1['pre_phno']!='') { echo $eachrecord1['pre_phno'];} else {echo $pre_phno;} ?>"/></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_mobile" type="text" size="15"  value="<?php  if($eachrecord1['pre_mobile']!='') { echo $eachrecord1['pre_mobile']; } else {echo $pre_mobile;}?>"/></td>
               </tr>
			   
			   
			   <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Home Landline Ph. no.</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno" type="text" size="15" value="<?php  if($eachrecord1['pre_phno']!='') {echo $eachrecord1['pre_phno'];} else { echo $pre_phno; } ?>" /></td>
                 <td align="left"><span class="narmal">Fathers Phone No. </span></td>
                 <td align="left">:</td>
                    <td align="left"><input name="pre_contactno" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno']!='') {echo $eachrecord1['pre_contactno'];} else { echo $pre_contactno; } ?>" /></td>
				 </tr>
				 
				 
				   <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Mothers Phone No.</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_contactno3" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno3']!='') {echo $eachrecord1['pre_contactno3'];} else { echo $pre_contactno3; } ?>" /></td>
                 <td align="left"><span class="narmal">Guardians Phone No.</span></td>
                 <td align="left">:</td>
                    <td align="left"><input name="pre_resno2" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno']!='') {echo $eachrecord1['pre_resno2'];} else { echo $pre_resno2; } ?>" /></td>
				 </tr>
			   
			   
			   
			   
			   
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Mother's Details </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Mother Name(full)</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_mothername" type="text" size="15" value="<?php  if($eachrecord1['pre_mothername']!='') { echo $eachrecord1['pre_mothername'];} else {echo $pre_mothername;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Educational Qualification </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactname2" type="text" size="15" value="<?php  if($eachrecord1['pre_contactname2']!='') { echo $eachrecord1['pre_contactname2'];} else {echo $pre_contactname2;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Age</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_prev_tcno" type="text" size="15" value="<?php if($eachrecord1['pre_prev_tcno']!=''){echo $eachrecord1['pre_prev_tcno'];}else{echo $pre_prev_tcno;} ?>" /></td>
                 <td width="23%" align="left"><?php /*?><span class="narmal">Department </span><?php */?></td>
                 <td width="1%" align="left"><!--:--></td>
                 <td width="23%" align="left"><?php /*?><input name="pre_current_class1" type="text" size="15" value="<?php  if($eachrecord1['pre_current_class1']!='') { echo $eachrecord1['pre_current_class1'];} else {echo $pre_current_class1;} ?>" /><font color="#FF0000">&nbsp;*</font><?php */?></td>
               </tr>
			   
			    <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Occupation</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_motheroccupation" type="text" size="15" value="<?php  if($eachrecord1['pre_motheroccupation']!='') { echo $eachrecord1['pre_motheroccupation'];} else {echo $pre_motheroccupation;} ?>" /></td>
                 <?php /*?><td width="23%" align="left"><span class="narmal">Designation </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_motheroccupation2" type="text" size="15" value="<?php  if($eachrecord1['pre_motheroccupation2']!='') { echo $eachrecord1['pre_motheroccupation2'];} else {echo $pre_motheroccupation2;} ?>" /><font color="#FF0000">&nbsp;*</font></td><?php */?>
               </tr>
			   
			   
			   
			    <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Office Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_percentage1" type="text" size="15" value="<?php  if($eachrecord1['pre_current_percentage1']!='') { echo $eachrecord1['pre_current_percentage1'];} else {echo $pre_current_percentage1;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Monthly Income </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_current_result1" type="text" size="15" value="<?php  if($eachrecord1['pre_current_result1']!='') { echo $eachrecord1['pre_current_result1'];} else {echo $pre_current_result1;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   
			  <?php /*?> <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Date Of Birth </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_dateofbirth3" type="text" id="pre_dateofbirth3" size="10" value="<?php  if($eachrecord1['pre_dateofbirth3']!='0000-00-00'){
									if(!isset($pre_dateofbirth3)){$pre_dateofbirth3 = func_date_conversion("Y-m-d","d/m/Y",$eachrecord1['pre_dateofbirth3']);echo $pre_dateofbirth3; }} else { echo "---";}
									 ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth3);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                   <td align="left"><span class="narmal"> </span></td>
                   <td align="left"></td>
                   <td align="left"><?php ?><input name="pre_todate" type="text" size="15" value="<?php //echo formatDBDateTOCalender($eachrecord1['pre_todate']);?>" readonly /> <font color="#FF0000">&nbsp;</font></td>
             </tr> <?php */?>
               
             </table></td>
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Father's Details </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Father Name(Full)</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_fathername" type="text" size="15" value="<?php  if($eachrecord1['pre_fathername']!='') { echo $eachrecord1['pre_fathername'];} else {echo $pre_fathername;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Educational Qualification </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactname1" type="text" size="15" value="<?php  if($eachrecord1['pre_contactname1']!='') { echo $eachrecord1['pre_contactname1'];} else {echo $pre_contactname1;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Age</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_prev_acadamicname" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_acadamicname']!='') { echo $eachrecord1['pre_prev_acadamicname'];} else {echo $pre_prev_acadamicname;} ?>" /></td>
                 <?php /*?><td width="23%" align="left"><span class="narmal">Department </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_prev_class" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?>" /><font color="#FF0000">&nbsp;*</font></td><?php */?>
               </tr>
			   
			    <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Occupation</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_fathersoccupation" type="text" size="15" value="<?php  if($eachrecord1['pre_fathersoccupation']!='') { echo $eachrecord1['pre_fathersoccupation'];} else {echo $pre_fathersoccupation;} ?>" /></td>
                 <?php /*?><td width="23%" align="left"><span class="narmal">Designation </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_fathersoccupation2" type="text" size="15" value="<?php  if($eachrecord1['pre_fathersoccupation2']!='') { echo $eachrecord1['pre_fathersoccupation2'];} else {echo $pre_fathersoccupation2;} ?>" /><font color="#FF0000">&nbsp;*</font></td><?php */?>
               </tr>
			   
			   
			   
			    <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Office Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_prev_university" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_university']!='') { echo $eachrecord1['pre_prev_university'];} else {echo $pre_prev_university;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Monthly Income </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_prev_percentage" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_percentage']!='') { echo $eachrecord1['pre_prev_percentage'];} else {echo $pre_prev_percentage;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   
			 <?php /*?>  <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Date Of Birth </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_dateofbirth2" type="text" id="pre_dateofbirth2" size="10" value="<?php  if($eachrecord1['pre_dateofbirth2']!='0000-00-00'){
									if(!isset($pre_dateofbirth2)){$pre_dateofbirth2 = func_date_conversion("Y-m-d","d/m/Y",$eachrecord1['pre_dateofbirth2']);echo $pre_dateofbirth2; }} else { echo "---";}
									 ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth2);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                   <td align="left"><span class="narmal"> </span></td>
                   <td align="left"></td>
                   <td align="left"><input name="pre_todate" type="text" size="15" value="<?php //echo formatDBDateTOCalender($eachrecord1['pre_todate']);?>" readonly /><font color="#FF0000">&nbsp;</font></td>
               </tr> <?php */?>
               
             </table></td>
			 
			 
			 
			 
<?php /*?> Start edit Guardian's Details................................................................. 	<?php */?>	 
			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Guardian's Details   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Name Of Gaurdian </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_class2" type="text" size="15" value="<?php  if($eachrecord1['pre_current_class2']!='') { echo $eachrecord1['pre_current_class2'];} else {echo $pre_current_class2;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Office Phone </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_resno" type="text" size="15" value="<?php  if($eachrecord1['pre_resno']!='') { echo $eachrecord1['pre_resno'];} else {echo $pre_resno;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Residential Address Of Gaurdian</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_percentage2" type="text" size="15" value="<?php  if($eachrecord1['pre_current_percentage2']!='') { echo $eachrecord1['pre_current_percentage2'];} else {echo $pre_prev_acadamicname;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal"> </span></td>
                 <td width="1%" align="left">     </td>
                 <td width="23%" align="left"><?php /*?><input name="pre_prev_class" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?>" /><?php */?><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   			  
               
             </table></td>
			 
			 
			 
			 
			 
<?php /*?> Start edit family's Details................................................................. 	<?php */?>	 
			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Family Details   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
               <tr>
                
				 
				 
				 
				 
                 <td width="5%" height="30" align="left"><span class="narmal">Sr. No. </span></td>
				  <td width="20%" height="30" align="left"><span class="narmal">Name of Family Members </span></td> 
				  <td width="15%" height="30" align="center"><span class="narmal">Age </span></td>
				   <td width="20%" height="30" align="left"><span class="narmal">Relation With Student </span></td>
				    <td width="20%" height="30" align="left"><span class="narmal">&nbsp;&nbsp;Education </span></td>
					<td width="20%" height="30" align="left"><span class="narmal">&nbsp;&nbsp;Occupation </span></td>
               </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">1 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_family1" type="text" size="15" value="<?php  if($eachrecord1['pre_family1']!='') { echo $eachrecord1['pre_family1'];} else {echo $pre_family1;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="age1" type="text" size="15" value="<?php  if($eachrecord1['age1']!='') { echo $eachrecord1['age1'];} else {echo $age1;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="relation1" type="text" size="15" value="<?php  if($eachrecord1['relation1']!='') { echo $eachrecord1['relation1'];} else {echo $relation1;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="eduation1" type="text" size="15" value="<?php  if($eachrecord1['eduation1']!='') { echo $eachrecord1['eduation1'];} else {echo $eduation1;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="occupation1" type="text" size="15" value="<?php  if($eachrecord1['occupation1']!='') { echo $eachrecord1['occupation1'];} else {echo $occupation1;} ?>" /></td>
                 </tr>
				 
				 
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">2 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_family2" type="text" size="15" value="<?php  if($eachrecord1['pre_family2']!='') { echo $eachrecord1['pre_family2'];} else {echo $pre_family2;} ?>" /></td> 
				  <td width="15%" height="30" align="center"><input name="age2" type="text" size="15" value="<?php  if($eachrecord1['age2']!='') { echo $eachrecord1['age2'];} else {echo $age2;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="relation2" type="text" size="15" value="<?php  if($eachrecord1['relation2']!='') { echo $eachrecord1['relation2'];} else {echo $relation2;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="eduation2" type="text" size="15" value="<?php  if($eachrecord1['eduation2']!='') { echo $eachrecord1['eduation2'];} else {echo $eduation2;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="occupation2" type="text" size="15" value="<?php  if($eachrecord1['occupation2']!='') { echo $eachrecord1['occupation2'];} else {echo $occupation2;} ?>" /></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">3 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_family3" type="text" size="15" value="<?php  if($eachrecord1['pre_family3']!='') { echo $eachrecord1['pre_family3'];} else {echo $pre_family3;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="age3" type="text" size="15" value="<?php  if($eachrecord1['age3']!='') { echo $eachrecord1['age3'];} else {echo $age3;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="relation3" type="text" size="15" value="<?php  if($eachrecord1['relation3']!='') { echo $eachrecord1['relation3'];} else {echo $relation3;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="eduation3" type="text" size="15" value="<?php  if($eachrecord1['eduation3']!='') { echo $eachrecord1['eduation3'];} else {echo $eduation3;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="occupation3" type="text" size="15" value="<?php  if($eachrecord1['occupation3']!='') { echo $eachrecord1['occupation3'];} else {echo $occupation3;} ?>" /></td>
                 </tr>
				 
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">4 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_family4" type="text" size="15" value="<?php  if($eachrecord1['pre_family4']!='') { echo $eachrecord1['pre_family4'];} else {echo $pre_family4;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="age4" type="text" size="15" value="<?php  if($eachrecord1['age4']!='') { echo $eachrecord1['age4'];} else {echo $age4;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="relation4" type="text" size="15" value="<?php  if($eachrecord1['relation4']!='') { echo $eachrecord1['relation4'];} else {echo $relation4;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="eduation4" type="text" size="15" value="<?php  if($eachrecord1['eduation4']!='') { echo $eachrecord1['eduation4'];} else {echo $eduation4;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="occupation4" type="text" size="15" value="<?php  if($eachrecord1['occupation4']!='') { echo $eachrecord1['occupation4'];} else {echo $occupation4;} ?>" /></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">5 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_family5" type="text" size="15" value="<?php  if($eachrecord1['pre_family5']!='') { echo $eachrecord1['pre_family5'];} else {echo $pre_family5;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="age5" type="text" size="15" value="<?php  if($eachrecord1['age5']!='') { echo $eachrecord1['age5'];} else {echo $age5;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="relation5" type="text" size="15" value="<?php  if($eachrecord1['relation5']!='') { echo $eachrecord1['relation5'];} else {echo $relation5;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="eduation5" type="text" size="15" value="<?php  if($eachrecord1['eduation5']!='') { echo $eachrecord1['eduation5'];} else {echo $eduation5;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="occupation5" type="text" size="15" value="<?php  if($eachrecord1['occupation5']!='') { echo $eachrecord1['occupation5'];} else {echo $occupation5;} ?>" /></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">6 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_family6" type="text" size="15" value="<?php  if($eachrecord1['pre_family6']!='') { echo $eachrecord1['pre_family6'];} else {echo $pre_family6;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="age6" type="text" size="15" value="<?php  if($eachrecord1['age6']!='') { echo $eachrecord1['age6'];} else {echo $age6;} ?>" /></td>
				 
				   <td width="20%" height="30" align="left"><input name="relation6" type="text" size="15" value="<?php  if($eachrecord1['relation6']!='') { echo $eachrecord1['relation6'];} else {echo $relation6;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="eduation6" type="text" size="15" value="<?php  if($eachrecord1['eduation6']!='') { echo $eachrecord1['eduation6'];} else {echo $eduation6;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="occupation6" type="text" size="15" value="<?php  if($eachrecord1['occupation6']!='') { echo $eachrecord1['occupation6'];} else {echo $occupation6;} ?>" /></td>
                 </tr>
				 <tr><td>&nbsp;</td></tr>
				 
				 
				 
                
			   			  
               
             </table></td>
			 
			 			 
			 
			 
			 
<?php /*?> Start Previous school details................................................................. 	<?php */?>	 
			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Previous School Details   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
               <tr>
                
				 
				 
				 
				 
                 <td width="5%" height="30" align="left"><span class="narmal">Sr. No. </span></td>
				  <td width="20%" height="30" align="left"><span class="narmal">Name of School & Address </span></td> 
				  <td width="15%" height="30" align="left"><span class="narmal">Enrollment No. </span></td>
				   <td width="20%" height="30" align="left"><span class="narmal">From Year </span></td>
				    <td width="20%" height="30" align="left"><span class="narmal">Year Upto </span></td>
					<td width="20%" height="30" align="left"><span class="narmal">Reason Of Leaving</span></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">1 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_schl1" type="text" size="15" value="<?php  if($eachrecord1['pre_schl1']!='') { echo $eachrecord1['pre_schl1'];} else {echo $pre_schl1;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="enrlno1" type="text" size="15" value="<?php  if($eachrecord1['enrlno1']!='') { echo $eachrecord1['enrlno1'];} else {echo $enrlno1;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="yearfrom1" type="text" size="15" value="<?php  if($eachrecord1['yearfrom1']!='') { echo $eachrecord1['yearfrom1'];} else {echo $yearfrom1;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="yearupto1" type="text" size="15" value="<?php  if($eachrecord1['yearupto1']!='') { echo $eachrecord1['yearupto1'];} else {echo $yearupto1;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="reason1" type="text" size="15" value="<?php  if($eachrecord1['reason1']!='') { echo $eachrecord1['reason1'];} else {echo $reason1;} ?>" /></td>
                 </tr>
				 
				 
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">2 </span></td>
				  <td width="20%" height="30" align="left"><input name="pre_schl2" type="text" size="15" value="<?php  if($eachrecord1['pre_schl2']!='') { echo $eachrecord1['pre_schl2'];} else {echo $pre_schl2;} ?>" /></td> 
				  <td width="15%" height="30" align="left"><input name="enrlno2" type="text" size="15" value="<?php  if($eachrecord1['enrlno2']!='') { echo $eachrecord1['enrlno2'];} else {echo $enrlno2;} ?>" /></td>
				   <td width="20%" height="30" align="left"><input name="yearfrom2" type="text" size="15" value="<?php  if($eachrecord1['yearfrom2']!='') { echo $eachrecord1['yearfrom2'];} else {echo $yearfrom2;} ?>" /></td>
				    <td width="20%" height="30" align="left"><input name="yearupto2" type="text" size="15" value="<?php  if($eachrecord1['yearupto2']!='') { echo $eachrecord1['yearupto2'];} else {echo $yearupto2;} ?>" /></td>
					<td width="20%" height="30" align="left"><input name="reason2" type="text" size="15" value="<?php  if($eachrecord1['reason2']!='') { echo $eachrecord1['reason2'];} else {echo $reason2;} ?>" /></td>
                 </tr>
				 
						 
			 </table></td>
			 
			 
			 
			 
			 
			 
			 
			 
<?php /*?> Start edit Other Information Details................................................................. 	<?php */?>			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Other Information   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Any Relationship with Hiigher Personality </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_result2" type="text" size="15" value="<?php  if($eachrecord1['pre_current_result2']!='') { echo $eachrecord1['pre_current_result2'];} else {echo $pre_current_result2;} ?>" /></td>
                 <td width="23%" align="left">Health problem if any </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_current_class3" type="text" size="15" value="<?php  if($eachrecord1['pre_current_class3']!='') { echo $eachrecord1['pre_current_class3'];} else {echo $pre_current_class3;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Extra Curricular Interest</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_percentage3" type="text" size="15" value="<?php  if($eachrecord1['pre_current_percentage3']!='') { echo $eachrecord1['pre_current_percentage3'];} else {echo $pre_current_percentage3;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal"> </span></td>
                 <td width="1%" align="left">     </td>
                 <td width="23%" align="left"><?php /*?><input name="pre_prev_class" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?>" /><?php */?><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   			  
               
             </table></td>
			 
			 
			 
<?php /*?> Start edit Class Of Your Other Children Details.................................................<?php */?>			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Class Of Your Other Children In This School   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">1st Child Admi. No. </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_result3" type="text" size="15" value="<?php  if($eachrecord1['pre_current_result3']!='') { echo $eachrecord1['pre_current_result3'];} else {echo $pre_current_result3;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">2nd Child Admi. No. </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_physical_status" type="text" size="15" value="<?php  if($eachrecord1['pre_physical_status']!='') { echo $eachrecord1['pre_physical_status'];} else {echo $pre_physical_status;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">3rd Child Admi. No.</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_special_care" type="text" size="15" value="<?php  if($eachrecord1['pre_special_care']!='') { echo $eachrecord1['pre_special_care'];} else {echo $pre_special_care;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal"> </span></td>
                 <td width="1%" align="left">     </td>
                 <td width="23%" align="left"><?php /*?><input name="pre_prev_class" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?>" /><?php */?><font color="#FF0000">&nbsp;*</font></td>
               </tr>
             </table></td>
			 
			 
			 
			 
<?php /*?> Start edit "Withdrawal Details".................................................<?php */?>			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Withdrawal Details   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Date of Leaving </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="admission_date1" type="text" size="15" value="<?php  echo formatDBDateTOCalender($eachrecord1['admission_date1']);
									 ?>" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date1);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                 <td width="23%" align="left"><span class="narmal">Class from which left </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_emailid" type="text" size="15" value="<?php  if($eachrecord1['pre_emailid']!='') { echo $eachrecord1['pre_emailid'];} else {echo $pre_emailid;} ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Reason</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_emailid2" type="text" size="15" value="<?php  if($eachrecord1['pre_emailid2']!='') { echo $eachrecord1['pre_emailid2'];} else {echo $pre_emailid2;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal"> </span></td>
                 <td width="1%" align="left">     </td>
                 <td width="23%" align="left"><?php /*?><input name="pre_prev_class" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?>" /><?php */?><font color="#FF0000">&nbsp;*</font></td>
               </tr>
             </table></td>
			 
			 
			 
<?php /*?> Start edit "ALUMINI LOGIN".................................................<?php */?>			 
			 
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; ALUMINI LOGIN   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
													  <td width="17%" height="30" align="left"> Login Id </td>
                                                      <td width="2%" align="left">:</td>
                                    <td width="30%" align="left"><?php echo $reg_No; ?> <!--<input name="ann_income" type="text" size="15" value="<?php //echo $ann_income;?>" />--></td>
                                    <td width="17%" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="2%" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="32%" align="left">&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td width="17%" height="30" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="2%" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="30%" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="17%" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="2%" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="32%" align="left">&nbsp;</td>
												  </tr>
			   
			   
             </table></td>			 
			 
			 
			 
			 
			 
			 
             <td class="bgcolor_02"></td>
          </tr>  
          
         
         
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;TRANSPORT</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="28%" height="30" align="left">School Bus Transport </td>
                 <td width="2%" align="left">:</td>
                 <td width="69%" align="left">
                 		 <?php
					 $allote_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND `type`='student' ORDER BY id DESC LIMIT 0,1";
						 $allote_exe=mysql_query($allote_sql);
						 $allote_num=mysql_num_rows($allote_exe);
						 if($allote_num>=1){
							 $allote_row=mysql_fetch_array($allote_exe);
						 }
						 ?>
                         <input type="checkbox" name="transport" value="YES" <?php if(isset($allote_row['status']) && $allote_row['status']=='Active'){?> checked="checked"<?php }?> /></td>
               </tr>
                <tr>
                                                       <td width="1%">&nbsp;</td>
                                                       <td><span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
                  <td>:</td>
                                                       <td><select name="tr_place_id">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$trplaces_arr = $db->getrows("SELECT * FROM es_transport_places");
									if(!isset($tr_place_id)){$tr_place_id=$eachrecord1['tr_place_id'];}
									if(count($trplaces_arr)>0){
									foreach($trplaces_arr  as $each){
									?>
                                    <option value="<?php echo $each['tr_place_id'];?>" <?php if($tr_place_id==$each['tr_place_id']){echo "selected='selected'";}?>><?php echo ucwords($each['place_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>                                    </td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"> Route / Board </td>
                 <td align="left">:</td>
                 <td align="left">
           <?php /*?>      <?php
				 $allote_row['board_id'];
				 $board_row['id'];
				  $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                   $route_exe=mysql_query($route_sql);
                   while($route_row=mysql_fetch_array($route_exe)){
                   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
                   $board_exe=mysql_query($board_sql);
                   while($board_row=mysql_fetch_array($board_exe)){
					    $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND student_staff_id=".$sid;
					   $query_exe=mysql_query($query_sql);
					   $query_num=mysql_num_rows($query_exe);
					   
					  $ww=mysql_fetch_array($query_exe);
				
					   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id'])
					   			{
					   
					   					 $board_row['board_title']; 
										  $allote_row['board_id'];
										 echo $board_row['id'];
										 }
					   }}
                 ?><?php */?>
                   <select name="boardid">
                   <option value="">Select Route/Board</option>
                   <?php
                   $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                   $route_exe=mysql_query($route_sql);
                   while($route_row=mysql_fetch_array($route_exe)){
				   $new_word =substr($route_row['route_Via'], 0, 25);
				   ?>
                   <optgroup label="<?php echo $route_row['route_title']." -(".$new_word.")"; ?>">
                   <?php
                   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
                   $board_exe=mysql_query($board_sql);
                   while($board_row=mysql_fetch_array($board_exe)){
					   $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND board_id=".$board_row['id'];
					   $query_exe=mysql_query($query_sql);
					   $query_num=mysql_num_rows($query_exe);
					   
					   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id']){
			   
                       ?>													   
                   <option value="<?php echo $board_row['id']; ?>" <?php if($boardid==$board_row['id'] || $allote_row['board_id']==$board_row['id']){?> selected="selected"<?php }?>><?php echo $board_row['board_title']; ?></option>
                   <?php }}?>
                   </optgroup>
                   <?php }?>
                   </select>                 </td>
               </tr> 
			   
			  
			  
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="28%" height="30" align="left">Other Transport </td>
                 <td width="2%" align="left">:</td>
                 <td width="69%" align="left"><input type="text" name="pre_physical_details" value="<?php echo $eachrecord1['pre_physical_details'];?>"/>
                 		 </td>
               </tr>
                <tr>
				
				
                                                       <td width="1%">&nbsp;</td>
                                                       <td><span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
                  <td>:</td>
                                                       <td> <textarea cols="25" rows="5" name="pre_height"><?php echo $eachrecord1['pre_height'];?></textarea>                       </td>
               </tr>
			   
			               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td align="center" height="40px"><input name="update" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer" />&nbsp;<input name="Submit" type="button" class="bgcolor_02" style="cursor:pointer" onclick="newWindowOpen ('?pid=21&amp;action=printstudent&amp;print_class=<?php echo $eachrecord1['pre_class']; ?><?php echo $studentUrl;?>');" value="Print Registration Form"/></td>
             <td class="bgcolor_02"></td>
          </tr>  
</table>
</form>	
<?php

/**
* ********End of edit Student*********************************
*/
 //}
  } ?>	
		
<?php

/**
* ********Print option for Student*****************************
*/

 if($action=="printstudent")
{
?>	
<style>

body{
margin:0px;
}
.main-border{
border:#666666 1px solid;
}
.right-border{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
padding-left:10px;
border-right:#999999 1px solid;
border-right-style:dotted;
}

.right-border2{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
border-right:#999999 1px solid;
border-right-style:dotted;
}

.form-tex1{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
color:#333333;
padding-left:10px;

}

.form-tex5{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
padding-left:10px;
padding-right:10px;
text-align:justify;
line-height:25px;
border-bottom:#666666 1px solid;
border-bottom-style:dotted;
}


.form-tex2{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
font-weight:bold;
}


.form-tex3{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
}

.form-tex4{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:10px;
color:#333333;
}


.form-inner-border{
border-bottom:#666666 1px solid;
border-bottom-style:dotted;
}

.sig-border{
border:#333333 1px solid;
}

</style>
<table width="630" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  align="left" valign="top" class="form-inner-border">
        <table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
          <tr>
            <td  align="left" valign="middle" class="form-tex1">
          TODAY'S DATE        </td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo date("d-m-Y")  ?></td>
          </tr>
          
          
            <td width="278"  align="left" valign="middle" class="form-tex1">
         CLASS        </td>
            <td width="24" align="center" valign="middle" class="form-tex2">:</td>
            <td width="328" align="left" valign="middle"><?php 
			$online_sql="select * from es_classes where es_classesid=".$eachrecord1['pre_class'];
	                                    $online_row=$db->getRow($online_sql);
			echo ($online_row['es_classname']); ?></td>
          </tr>
          
          
          
          <tr>
            <td  align="left" valign="middle" class="form-tex1">
            CANDIDATE'S NAME
            <br />
            (IN CAPITAL LETTER'S)            </td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_name']); ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="form-tex1">FATHER'S NAME</td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_fathername']); ?></td>
          </tr>
          <tr>
            <td  align="left" valign="middle" class="form-tex1">MOTHER'S NAME</td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_mothername']); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top" class="form-inner-border">
        
        <table width="630" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="295" align="left" valign="middle" class="right-border">
           
              <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="36%"  rowspan="2" align="left" valign="middle">DATE&nbsp;OF&nbsp;BIRTH&nbsp;</td>
                <td width="64%"  align="left" valign="middle" colspan=2>
                
                <?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?> </td>
                
              </tr>
            </table></td>
            <td width="335" align="right" valign="middle" >
            
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                
                <td width="42%"  align="center" valign="middle" class="right-border">SEX</td>
                <td width="58%" align="center" valign="middle" class="form-tex1">Category</td>
              </tr>
              <tr>
                <td align="center" valign="middle" class="right-border2">
                <?php echo strtoupper($eachrecord1['pre_gender']); ?></td>
               <td width="58%" align="center" valign="middle" class="form-tex4">
            <?php
			$cat=$db->getRow("SELECT * FROM es_caste WHERE caste_id=".$eachrecord1['caste_id']);
			echo strtoupper($cat['caste']);
			?>
			 </td>
              </tr>
            </table></td>
          </tr>
        </table>        </td>
      </tr>
      <tr>
        <td align="left" valign="top" class="form-inner-border">
        <table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="202"  rowspan="2" align="left" valign="middle" class="form-tex1">NAME OF PREVIOUS SCHOOL</td>
            <td width="19" rowspan="2" align="center" valign="middle" class="form-tex2">:</td>
            <td width="214" rowspan="2" align="left" valign="middle" class="right-border2"><?php 
			if($eachrecord1['pre_current_class1']!='')
			{
			$cat1=$db->getRow("SELECT * FROM es_institutes WHERE inst_id=".$eachrecord1['pre_current_class1']);
			echo strtoupper($cat1['inst_name']); 
			}
			?>
			
			</td>
            <td width="195"  align="center" valign="middle" class="form-tex1">STATE OF RESIDENCY</td>
          </tr>
          <tr>
            <td align="center" valign="middle" class="form-tex1">
            
            RURAL 
            <input type="radio" name="res" / /> 
            URBAN
            
            <input type="radio" name="res" / />            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-inner-border">
		<table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="460"  align="left" valign="middle">
			<table width="460" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="360"  rowspan="2" align="left" valign="top">
				<table width="360" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="171" align="left" valign="middle" class="form-tex1">PREVIOUS CLASS</td>
                    <td width="10" height="35" align="center" valign="middle" class="form-tex2">:</td>
                    <td width="179" align="left" valign="middle"><span class="narmal"><?php echo $eachrecord1['pre_prev_class']; ?></span></td>
                    </tr>
                  <tr>
                    <td  align="left" valign="middle" class="form-tex1">MEDIUM OF INSTRUCTION</td>
                    <td  align="center" valign="middle" class="form-tex2">:</td>
                    <td align="left" valign="middle">
					<textarea rows="1"></textarea>
					</td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle" class="form-tex1">NAME OF BOARD</td>
                    <td align="center" valign="middle" class="form-tex2">:</td>
                    <td align="left" valign="middle"><span class="narmal"><?php echo $eachrecord1['pre_prev_university']; ?></span></td>
                    </tr>
                    
                  <tr>
                    <td  align="left" valign="middle" class="form-tex1">COMPARTMENT MENTION SUBJECT</td>
                    <td  align="center" valign="middle" class="form-tex2">:</td>
                    <td align="left" valign="middle"> <input type="text" size="3" maxlength="4" />&nbsp;<textarea rows="1"></textarea></td>
                    </tr>
                </table></td>
                <td width="100"  align="center" valign="top" class="form-tex1">RESULT</td>
              </tr>
              <tr>
                <td align="center" valign="top" class="form-tex4"><?php echo strtoupper($eachrecord1['pre_current_result1']); ?></td>
              </tr>
            </table></td>
            <td width="170" align="center" valign="middle" class="form-tex1">
           <img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="1"/></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-inner-border"><table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="100" align="left" valign="top" class="form-tex1">ADDRESS :</td>
            <td width="230" align="left" valign="top"><?php echo $eachrecord1['pre_address']; ?><br>
              <?php echo $eachrecord1['pre_city1']; ?><br>
            <?php echo $eachrecord1['pre_pincode']; ?></td>
            <td width="300" rowspan="2" align="left" valign="middle"><table width="300" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td width="116"  align="left" valign="top" class="form-tex1">TELEPHONE</td>
                <td width="16" align="center" valign="top" class="form-tex2">:</td>
                <td width="168" align="left" valign="top"><?php echo $eachrecord1['pre_phno']; ?></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="form-tex1">STATE</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top"><?php echo $eachrecord1['pre_state']; ?></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="form-tex1">COUNTRY</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top"><?php echo $eachrecord1['pre_country']; ?></td>
              </tr>
                 <tr>
                <td align="left" valign="top" class="form-tex1">Nationality</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top">  <input type="text" size="4" maxlength="8" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="form-tex1">Income</td>
            <td width="230" align="left" valign="top"><?php echo $eachrecord1['ann_income']; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-inner-border"><table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="445"  align="left" valign="top">
			
			<table width="445" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td  colspan="2" align="center" valign="middle" class="form-tex1">SUBJECTS TO BE OPTED</td>
              </tr>
				<?php
				$subs=$db->getRow("SELECT subject_id_array FROM es_preadmission_details EPD,es_preadmission EP,subjects_cat SC WHERE EPD.es_preadmissionid=EP.es_preadmissionid AND EPD.pre_class=EP.pre_class AND SC.scat_id=EPD.scat_id AND EP.es_preadmissionid='".$eachrecord1['es_preadmissionid']."'");
				$subject_list=str_replace('@#@#@',',',$subs['subject_id_array']);
				if($subject_list!='')
				{
				$subjectslist=$db->getRows("SELECT * FROM es_subject WHERE es_subjectid IN(".$subject_list.")");
				$i=0;
				foreach($subjectslist as $each_subject)
				{
				if($i%2==0)
				{
				?>
              <tr>
			  <?php } ?>
                <td width="228"  align="center" valign="middle"><?php echo $each_subject['es_subjectname'];?></td>
             <?php 
			 $i++;
			  if($i%2==0)
				{
				?>
              <tr>
			  <?php } 
			  }
			  }
			  ?>
            </table>
			</td>
            <td width="185" align="center" valign="middle" class="form-tex1">
           <input type="text" size="3" maxlength="5" />% AGE IN  PREVIOUS EXAM
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-tex5" >
        
        <span class="form-tex2">DECLARATION :  </span>
        
        <br />
        
        I <?php echo $eachrecord1['pre_name']; ?> here by admit that all the entries made above are correct of my knowledge and i undertake to fully abide by rules and regulations of the school. 
        In all matters the decision of management committe shall be final and binding upon us.
        
        
        
        </td>
      </tr>
      <tr>
        <td  align="center" valign="middle" class="form-inner-border"><table width="600" border="0" cellspacing="0" cellpadding="2">
        
        
        <tr>
            <td  align="center" valign="middle" class="form-tex3" >Signature of Father / Guardian</td>
            <td>&nbsp;</td>
            <td align="center" valign="middle" class="form-tex3">Students Signature</td>
          </tr>
          <tr>
            <td width="255" class="sig-border">&nbsp;</td>
            <td width="88">&nbsp;</td>
            <td width="257" class="sig-border">&nbsp;</td>
          </tr>
          
        </table></td>
      </tr>
      <tr>
        <td height="200" align="left" valign="middle"><table width="630" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="210" align="left" valign="top" class="right-border2">
            
            
            
            <table width="210" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td align="center" valign="middle" class="form-tex1">Documents Attached</td>
              </tr>
              <tr>
                <td  align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
              <tr>
                <td  align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
              <tr>
                <td  align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
            </table></td>
            <td width="224" align="left" valign="top" class="right-border2">
            
            
            
            <table width="230" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td height="30" colspan="2" align="center" valign="middle" class="form-tex1">For Office Use Only</td>
              </tr>
              <tr>
                <td width="107"  align="left" valign="middle" class="form-tex1">Admission No:</td>
                <td width="117" align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="form-tex1">Fee Receipt No:</td>
                <td align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td  align="left" valign="middle" class="form-tex1">Amount Deposited:</td>
                <td align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="form-tex1">Remarks:</td>
                <td><input type="text" size="6"  width="20"/></td>
              </tr>
              <tr>
                <td  colspan="2" align="center" valign="middle"><table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td  align="center" valign="middle" class="form-tex1">Checker's Signature</td>
                  </tr>
                  <tr>
                    <td class="sig-border">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="196" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  align="center" valign="middle" class="form-tex2">Principal Signature With Seal</td>
              </tr>
              <tr>
                <td height="130"  class="sig-border">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
</table>
</form>
<?php
/**
* ********End of Print option for Student*************************
*/

 }
 ?>
		
		
<?php

/**
* ********Students search with respect to class and reg.number*******
*/
?>
<?php
 if(($action=='classrecards')) {?>
 	  
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Update class record</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<?php if (isset($error1) && $error1!="") { ?>
							<tr>
								<td height="25" colspan="3" align="center" ><strong>&nbsp;<?php echo $error1; ?></strong></td>
							</tr>
							<?php  }  ?>
				<form name="promotion" action="" method="post">
				<tr>
                  <td height="25" colspan="6" align="right" >
			                <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :* denotes mandatory&nbsp;</font></td>
                 </tr>
				  
				 <tr>
                    <td height="25" colspan="6" align="center" >
			        </td>
                 </tr>
				<tr>
					<td width="10%" class="narmal">Class : </td>
				  <td width="32%"  class="narmal"><select name="sm_class" style="width:180px;">
                         <option value="" >Select</option>
                       <?php 
					     if (count($allClasses)>0){
					      foreach($allClasses as $eachClass){
					   ?>
                         <option value="<?php echo $eachClass['es_classesid']; ?>"  <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
                         <?php }} ?>
                     </select>
				     <font color="#FF0000"></font></td>
					<td width="15%" class="narmal">Reg.No.: </td>
				    <td width="29%" class="narmal">
				  <input type="text" name="regnum" id="regnum" value="<?php if(isset($regnum)&& $regnum!='') echo $regnum; ?>" size="8" /></td>
					<td width="14%" class="narmal">
					
					<input name="classserch" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer"/></td>
				</tr>
				<tr><td height="10" colspan="3"></td></tr>
				</form>	
			</table>
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top" >	
        <?php if(isset($es_studentList) && $es_studentList!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			<form action="" method="post" name="updatestudents" >
			<input type="hidden" name="sm_class" value="<?php echo $sm_class; ?>" />
			<?php if (is_array($es_studentList)&&count($es_studentList)>0){?>
				<tr class="bgcolor_02">
					<td width="47"  align="center" height="25" >Sr.No.</td>
					<td width="88"  align="center">Reg.No.</td>
					<td width="245"  align="center">Name</td>
					<td width="185"  align="center">Class</td>
					<td width="212"  align="center">Academic Year</td>
					<td width="146"  align="center">Result</td>
					<!--<td width="146"  align="center">Status</td>-->
				</tr>
		<?php
		
			$i = $start;			
			foreach ($es_studentList as $eachrecord){
				$i++ ;
			$zibracolor = ($i%2==0)?"even":"odd";
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i ; ?>
						<input type="hidden" value="<?php echo $eachrecord['es_preadmissionid'] ; ?>" name="updatestudentid[]" />
					</td>
					<td align="center" valign="middle" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['es_preadmissionid'] ; ?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>
					<td align="center" valign="middle" class="narmal">
					<select name="up_class[]" style="width:100px;" >
						<option value="" >Select Class</option>
			      <?php 
				  if (count($allClasses)>0){
					  foreach($allClasses as $eachClass) {?>					  
		<option <?php if($eachrecord['pre_class']==$eachClass['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $eachClass['es_classesid']; ?>" > <?php echo $eachClass['es_classname']; ?></option>
				  <?php
	     		     }
					}
				  ?></select> 				
					</td>					
					<td align="center" valign="middle" class="narmal"><select name="ac_year[]" style="width:180px;">
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid'].$each_record['fi_ac_startdate'].$each_record['fi_ac_enddate']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                     </select>
					</td>



					<td align="center" valign="middle" class="narmal"><select name="stustatus[]">
					<option value="pass" <?php if($eachrecord['status']=='pass') { echo "selected='selected'"; } ?>>P</option>
					<option value="fail" <?php if($eachrecord['status']=='fail') { echo "selected='selected'"; } ?>>F</option>
					<option value="resultawaiting" <?php if($eachrecord['status']=='resultawaiting') { echo "selected='selected'"; } ?>>R.A</option>
					<option value="inactive" <?php if($eachrecord['status']=='inactive') { echo "selected='selected'"; } ?>>T</option>
					</select>  
					</td>
					
					
					<!--<td align="center" valign="middle" class="narmal"><select name="pre_status[]">
					<option value="Active" <?php //if($eachrecord['pre_status']=='Active') { echo "selected='selected'"; } ?>>Active</option>
					<option value="Inactive" <?php //if($eachrecord['pre_status']=='Inactive') { echo "selected='selected'"; } ?>>Inactive</option>
					<option value="Terminated" <?php //if($eachrecord['pre_status']=='Terminated') { echo "selected='selected'"; } ?>>Terminated</option>
					<option value="Temporary stop" <?php //if($eachrecord['pre_status']=='Temporary stop') { echo "selected='selected'"; } ?>>Temporary stop</option>
					</select>  
					</td>-->
					
					
					
				</tr>                         
<?php 
	}
 ?>
				<tr>
				
				
				
					<td colspan="6" align="center" valign="middle" >
	              <?php //echo paginateexte($start, $q_limit, $no_rows, "action=$action&sm_class=$sm_class&regnum=$regnum&classserch=$classserch"); ?> 
					</td>                           
				</tr>
				<tr>
				       <?php if((isset($sm_class) && $sm_class!="") || (isset($regnum) && $regnum!="")){?>
					<td colspan="6" align="center" valign="middle" style="padding-top:10px;padding-bottom:10px;">
					<?php if(in_array('5_2',$admin_permissions)){?>
					<input name="updatestudents" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" />
					
					<?php }?></td>
						<?php } ?>                           
				</tr>
				<tr>
				  <td colspan="7"><font color="#FF0000">*</font>P = Promoted&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>F = Fail &nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>R.A = Result Awaited
				&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>T = Transferred</td>
				</tr>
					
	      <?php }else{
	
	              echo "<tr class='narmal' >
							<td height='20' align='center' colspan='6' >No records found</td>
						</tr>
						";
							
		  } ?>				
			  </form>
			</table>
            <?php } ?>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>
<script type="text/javascript">
function getfieldvalues(){
		if (document.getElementById('sameaddress').checked){
	//alert("checked");
			document.preadmission.pre_address.value=document.preadmission.pre_address1.value;
			document.preadmission.pre_city.value=document.preadmission.pre_city1.value;
			document.preadmission.pre_pincode.value=document.preadmission.pre_pincode1.value;
			document.preadmission.pre_phno.value=document.preadmission.pre_phno1.value;			
			document.preadmission.pre_state.value=document.preadmission.pre_state1.value;
			
document.preadmission.pre_country.value=document.preadmission.pre_country1.value;
			document.preadmission.pre_mobile.value=document.preadmission.pre_mobile1.value;
			
		}else{
			document.preadmission.pre_address.value="";
			document.preadmission.pre_city.value="";
			document.preadmission.pre_pincode.value="";
			document.preadmission.pre_phno.value="";			document.preadmission.pre_state.value="";
			
	document.preadmission.pre_country.value="";
			document.preadmission.pre_mobile.value="";
		
		
		}
		}
</script>		
			
<?php

/**
* ********Students search with respect to class and reg.number*******
*/

 if($action=='malefemalestudents') {?>
 
 
                    
		  
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Class wise students</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<form name="promotion" action="" method="post">
				 <tr>
                    <td height="25" colspan="6" align="center" >
			        </td>
                 </tr>
				<tr>
					<td width="10%" class="narmal">&nbsp;&nbsp;Class : </td>
					<td width="28%"  class="narmal"><select name="sm_class" style="width:130px;">
                      <option value="all">-- All --</option>
                      <?php 
				  if (count($allClasses)>0){
					  foreach($allClasses as $eachClass) {?>
                      <option value="<?php echo $eachClass['es_classesid']; ?>"
						 <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>> <?php echo $eachClass['es_classname']; ?></option>
                      <?php
				       }
					}
				  ?>
					  </select></td>
					<td width="10%" class="narmal">&nbsp;Academic&nbsp;Year:</td>
				  <td width="38%" class="narmal">
				  <select name="ac_year" style="width:180px;">
                       
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                  </select></td>
					<td width="14%" class="narmal">
					
					<input name="searchclasswise" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer"/></td>
				</tr>
				<tr><td height="10" colspan="3"></td></tr>
				</form>	
			</table>
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
        <?php if(isset($searchclasswise) && $searchclasswise!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			
				<?php if (is_array($result_details)&&count($result_details)>0){?>
				<tr class="bgcolor_02">
					<td width="47"  align="center" height="25" >S&nbsp;NO</td>
				
					<td width="245"  align="center">Class</td>
					<td width="185"  align="center"> Total Males </td>
					<td width="212"  align="center"> Total Females </td>
					<td width="146"  align="center">Total Strength</td>
				</tr>
		<?php
			$malegrandtotal=0;
			$femalegarndtotal=0;
		
			foreach ($result_details as $eachrecord){
				$i++ ;
			
			$zibracolor = ($i%2==0)?"even":"odd";
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i;?></td>
					
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_classname'];?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['maletotal']; $malegrandtotal+=$eachrecord['maletotal'];?></td>					
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['femaletotal']; $femalegarndtotal+=$eachrecord['femaletotal'];
					$subtotal=($eachrecord['maletotal']+$eachrecord['femaletotal']);?></td>

					<td align="center" valign="middle" class="narmal"><?php echo $subtotal;?></td>
				</tr>                         
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle"></td>
					
					<td align="center" valign="middle" class="narmal">Grand Total</td>
					<td align="center" valign="middle" class="narmal"><?php echo $malegrandtotal;?></td>					
					<td align="center" valign="middle" class="narmal"><?php echo $femalegarndtotal;?></td>

					<td align="center" valign="middle" class="narmal"><?php echo ($malegrandtotal+$femalegarndtotal);?></td>
				</tr> 
				
				<tr>
					<td colspan="6" align="center" valign="middle" >&nbsp;</td>                           
				</tr>
							
			<?php }?>
			</table>
			<?php }?>
      </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } 

 if($action=='studentlist2') {?>
		  
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="4" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="4" class="bgcolor_02">&nbsp;&nbsp;Students List</td>
	</tr>
	<tr><td height="1" colspan="4" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
		<form name="promotion" action="" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		
				 <tr>
                    <td height="20" colspan="6" align="center" ></td>
                 </tr>
				<tr>
					<td width="14%" align="left" valign="middle" class="narmal">&nbsp;&nbsp;Class:</td>
					<td width="28%" align="left" valign="middle"  class="narmal"><select name="sm_class" style="width:110px;">
                      <option value="">Select</option>
					  <option value="All" <?php echo ($sm_class=="All")?"selected":""?>>All</option>
                      <?php 
				  if (count($allClasses)>0){
					  foreach($allClasses as $eachClass) {?>
                      <option value="<?php echo $eachClass['es_classesid']; ?>"
						 <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>> <?php echo $eachClass['es_classname']; ?></option>
                      <?php
				       }
					}
				  ?>
				  </select></td>
				  
				  <?php 
				  $get_section="SELECT * FROM `es_sections`";
				  $get_rows=$db->getrows($get_section)
				  
				  ?>
				<?php /*?> <td width="14%" align="left" valign="middle" class="narmal">&nbsp;Section:</td>
				  <td width="28%" align="left" valign="middle" class="narmal"><select name="section" style="width:100px;">
				  <option value="">-- Select --</option>
                       
                         <?php  foreach($get_rows as $each_record) { ?>
                         <option value="<?php echo $each_record['section_id']; ?>" <?php if ($each_record['section_id']==$section) { echo "selected"; }?>><?php echo $each_record['section_name']; ?> </option>
                         <?php } ?><?php */?>
                  </select></td>
				  <td width="16%" align="left" valign="middle" class="narmal">&nbsp;&nbsp; <input name="searchstudentlist" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer; height:22px;"/></td>
				  <td></td>
				</tr>
				<tr><td height="10" colspan="6"></td></tr>
				
	  </table>
	  </form>	
	  </td>
	  <td></td>
		<td width="1" class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td colspan="2">&nbsp;
		<?php 
		if((isset($searchstudentlist) && $searchstudentlist!="") || $_REQUEST['sm_class']!="")
		{ 
		if(is_array($result_details)&&count($result_details)>0)
		{
		?>
		 Academic Year :  <?php   if($result_details[0]['pre_fromdate']!=''){echo displayDate($result_details[0]['pre_fromdate']);}?> To <?php if($result_details[0]['pre_fromdate']!=''){ echo displayDate($result_details[0]['pre_todate']);}}}?>		  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td> &nbsp;
		<?php 
	
		if((isset($searchstudentlist) && $searchstudentlist!="") || $_REQUEST['sm_class']!="")
		{ 
		if(is_array($result_details)&&count($result_details)>0)
		{
		?>
		Class : <?php echo classname($result_details[0]['pre_class']); }}?> </td>
		<td align="right">
		<?php if(isset($searchstudentlist) && $searchstudentlist!=""){
		if(is_array($result_details)&&count($result_details)>0){
		 ?>
		<a href="?pid=21&action=exportreport&sm_class=<?php echo $result_details[0]['pre_class']; ?>&section=<?php echo $section; ?>" class="bgcolor_02" style="padding:2px; text-decoration:none;">Export List</a> 
		 <?php }}?>
		 &nbsp;
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>						
	<tr><td width="1" class="bgcolor_02"></td>
	  <td colspan="2"  align="center" valign="top" style="padding-top:8px;">	
        <?php if((isset($searchstudentlist) && $searchstudentlist!="") || $_REQUEST['sm_class']!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			
				<?php if (is_array($result_details)&&count($result_details)>0){?>
				<tr class="bgcolor_02">
					<td width="66"  align="center" height="25" >Sr.No</td>
				
					<!--<td width="122"  align="center">Roll No </td>
					<td width="99"  align="center">Section</td>-->
					<td width="93"  align="center">Reg.No</td>
					<td width="228"  align="left">Name</td>
                    <td width="205"  align="left">Father Name </td>
					<td width="150"  align="left">Mobile No </td>
					<td width="200"  align="left">Action</td>
				</tr>
				<pre><?php //print_r($result_details);?></pre>
		<?php
			$malegrandtotal=0;
			$femalegarndtotal=0;
			
			//array_print($result_details);
		
			foreach ($result_details as $eachrecord)
			{
				$i++ ;
				$zibracolor = ($i%2==0)?"even":"odd";
		?>
		
		<?php 		
/*		   $get_sec= "SELECT * FROM `es_sections_student` WHERE student_id = '".$eachrecord['es_preadmissionid']."' ";
		  $res_sec=mysql_query($get_sec);
		  $row_sec=mysql_fetch_array($res_sec);
		  $get_rollno=$row_sec['roll_no'];
		   $get_sec=$row_sec['section_student_id'];
		   */
		    $eachrecord['roll_no'];
		  	$eachrecord['section_id'];
		   
		  	 /*?>$get_sec1= "SELECT * FROM `es_sections` WHERE section_id = '".$eachrecord['section_id']."'";
		  	$res_sec1=mysql_query($get_sec1);
		  	$row_sec1=mysql_fetch_array($res_sec1);
		   	$get_sec1=$row_sec1['section_name'];<?php */
		
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i;?></td>
					
					<!--<td align="center" valign="middle" class="narmal"><?php if($eachrecord['roll_no']!=''){echo $eachrecord['roll_no'];}else{echo '---';}?></td>
					<td align="center" valign="middle" class="narmal"><?php if($get_sec1!=''){echo $get_sec1;}else{echo '---';}?></td>-->
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_preadmissionid']; ?></td>					
					<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>

					<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_fathername']; ?></td>
					<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_mobile1'];?></td>
					<td align="left" valign="middle" class="narmal"><a style="text-decoration:none" target="_blank" href="?pid=21&action=editstudent&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clss=<?php echo $sm_class;?>&clid=<?php if($sm_class!=''){echo $eachrecord['pre_class'];}else{echo $eachrecord['pre_class'];}?>&action1=studentlist2&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >
                              

  
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;">Edit</span> </a><a target="_blank" style="text-decoration:none" href="?pid=112&action=view&sid=<?php echo $eachrecord['es_preadmissionid'];?>&clid=<?php if($sm_class!=''){echo $eachrecord['pre_class'];}else{echo $eachrecord['pre_class'];}?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >
                               
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="" style="width:50px;padding:2px; text-decoration:none;">Status</span><?php //}}?> </a></span>	
							   
							   
							   
							   
	<!--change-->
<a href="?pid=21&action=delete&action1=studentlist2&id=<?php echo $eachrecord['es_preadmissionid'] ?>"  onclick="if(confirm('Are you sure?')){ return true;}else{ return false; } ;"  title="Delete"><img src="images/b_drop.png" height="12" width="18"/></a>&nbsp;&nbsp;</td>
				</tr>                         
<?php 
	}
 ?>	
				<tr>
					<td colspan="9" align="center" valign="middle" >&nbsp;</td>                           
				</tr>
							
			<?php }
			
			else
			{
			?>
			<tr>
					<td height="26" colspan="9" align="center" valign="middle">No Records Found</td>
			</tr>
			
			<?php }
			?>
		</table>
			<?php }?>      </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1"class="bgcolor_02" ></td><td height="20" colspan="2" >&nbsp;</td><td width="1"class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="4"class="bgcolor_02" ></td></tr>
</table>
<?php } 

?>

<?php

/**
* ********Student View Profile*****************************
*/
			
if($action=="viewprofile" && $back=="")
{
 //foreach ($es_studentview as $eachrecord1){
 
?>


 <script>
 
function checkAge()
{

if(document.getElementById('pre_dateofbirth').value!='')
{


myDOB = document.getElementById('pre_dateofbirth').value.split('/');

myDate = myDOB[0];
myMonth= myDOB[1];
myYear = myDOB[2];

var age;
var now = new Date();
var todayDate = now.getDate();
var todayMonth = now.getMonth();
var todayYear = now.getFullYear();
if(todayYear < myYear)
{
alert('Eneter Valid Date');
return false;
}
else
{
if(myMonth > todayMonth+1)
{
age=todayYear-myYear-1;

month=12-myMonth+todayMonth+1;
}
else
{

age=todayYear-myYear;

month=todayMonth-myMonth+1;
}

document.getElementById('pre_age').value=age+'.'+month;

}
}
}

 </script>	


<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');

}
</script>	
<script type="text/javascript">
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
			url="?pid=55&action=classwisebatch&cid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				//document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
			}
		}
</script>			
<form method="post" name="preadmission" action="" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
        <tr>
           <td height="6" colspan="3" class="error_message" align="center"></td>
    </tr>
        
         <tr>
            <td height="25" colspan="3" class="bgcolor_02"><a href="#" class="admin"> &nbsp;&nbsp;Pre Admission</a></td>
    </tr>
           
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td width="956" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
             <td width="1" class="bgcolor_02"></td>
          </tr> 
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <!--DWLayoutTable-->
			 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Tittle</span></td>
                 <td align="left">:</td>
                   <td align="left"> 
									   
									  <?php
								if(isset($pre_serialno) && $pre_serialno=="Mr" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mr") 
								{$sel_gend_mr= "selected='selected'"; }else{$sel_gend_mr = ""; }
								if(isset($pre_serialno) && $pre_serialno=="Miss" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=='Miss') 
								{$sel_gend_miss = "selected='selected'";}else{$sel_gend_miss = ""; }
	    if(isset($pre_serialno) && $pre_serialno=="Mrs" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mrs") 
								{$sel_gend_mrs = "selected='selected'";}else{$sel_gend_mrs = ""; }
								?>
                                      <select name="pre_serialno"  id="pre_serialno" style="width:120px;">
                                        <option value="" >Select Tittle</option>
                                        <option  value="Mr" <?php echo $sel_gend_mr; ?> >Mr</option>
                                        <option  value="Miss" <?php echo $sel_gend_miss; ?>>Miss</option>
										<option  value="Mrs" <?php echo $sel_gend_mrs; ?>>Mrs</option>
                                      </select>	</td>		
									  
									  
                   <td width="232" align="left"><span class="narmal">First Name</span></td>
                   <td width="34" align="left">:</td>
                   <td width="182" align="left">
                   
                  <?php echo htmlentities($eachrecord1['pre_name']); ?>               </td>
               </tr>
			 
			 
               <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Middle Name </span></td>
                 <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['pre_fathername']); ?></td>
                   <td align="left"><span class="narmal">Last Name</span></td>
                   <td align="left">:</td>
                   <td align="left">
                 <?php if($eachrecord1['pre_fathersoccupation']!='') {echo $eachrecord1['pre_fathersoccupation']; } else { echo $pre_fathersoccupation;} ?>                </td>
               </tr>
			   
			   
			   
			   <?php
			   $query="SELECT * FROM es_preadmission";
			   $result=mysql_query($query) or die("Data Extraction Not Possible");
		       //$numrows=mysql_num_rows($result);
		       $ret=mysql_fetch_array($result);
			   
			   
			   ?>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Gender </span></td>
                   <td align="left">:</td>
                   <td align="left">
				   <?php
						   
						  
								if(isset($pre_gender) && $pre_gender=="male" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=="male") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_gender) && $pre_gender=="female" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=='female') 
								{$sel_gend_fm = "selected='selected'";}else{$sel_gend_fm = ""; }
								?>
                                      <select name="pre_gender"  id="pre_gender" style="width:120px;">
                                        <option value="" >Select Gender </option>
                                        <option  value="male" <?php echo $sel_gend_m; ?> >Male</option>
                                        <option  value="female" <?php echo $sel_gend_fm; ?>>Female</option>
                                      </select></td>
                   <td align="left"><span class="narmal">Academic From</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_fromdate']);?></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Admission Date</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php  if($eachrecord1['admission_date']!=0000-00-00) {
									if(!isset($admission_date)){$admission_date = func_date_conversion("Y-m-d","d/m/Y",$eachrecord1['admission_date']);echo $admission_date; }} else { echo "---";}
									 ?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ></a></td>
                   <td align="left"><span class="narmal">Academic To </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_todate']);?></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Date&nbsp;Of&nbsp;Birth </span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                   <table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?></td>
                                        <td width="70%">
                                        
                                        <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ></a><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe></td>
                                      </tr>
                     </table>
                   
                   
               <?php /*?>    
                   <input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="15"  value="<?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly />
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe><?php */?></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <?php /*?><td align="left"><span class="narmal">Programme</span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                   <select name="es_program" onChange="" 
				                         style="width:150px;" >
								<option value="">-Select-</option>
									<?php foreach($getgrplist as $eachrecord) { ?>
									<option value="<?php echo $eachrecord[es_groupsid];?>" <?php echo ($eachrecord[es_groupsid]==	$st_department)?"selected":""?>  ><?php echo $eachrecord[es_groupname];?></option>
					           <?php } ?>
		             </select>                   </td><?php */?>
               </tr>
			   
			  
			   
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Class</span></td>
                   <td align="left">:</td>
                   <td align="left">
				  <?php
								if(isset($pre_class) && $pre_class=="1st Sem" || isset($eachrecord1['pre_class']) && $eachrecord1['pre_class']=="1st Sem") 
								{$sel_gend_fsem= "selected='selected'"; }else{$sel_gend_fsem="";}
								if(isset($pre_class) && $pre_class=="3rd Sem" || isset($eachrecord1['pre_class']) && $eachrecord1['pre_class']=='3rd Sem') 
								{$sel_gend_tsem = "selected='selected'";}else{$sel_gend_tsem = ""; }
				
								?>
                                      <select name="pre_class"  id="pre_class" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="1st Sem" <?php echo $sel_gend_fsem; ?> >1st Sem</option>
                                        <option  value="3rd Sem" <?php echo $sel_gend_tsem; ?>>3rd Sem</option>
                                      </select>				   </td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <?php /*?> <td align="left"><span class="narmal">Level</span></td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php
								if(isset($pre_contactname2) && $pre_contactname2=="PG" || isset($eachrecord1['pre_contactname2']) && $eachrecord1['pre_contactname2']=="PG") 
								{$sel_gend_pg= "selected='selected'"; }else{$sel_gend_pg="";}
								if(isset($pre_contactname2) && $pre_contactname2=="UG" || isset($eachrecord1['pre_contactname2']) && $eachrecord1['pre_contactname2']=='UG') 
								{$sel_gend_ug = "selected='selected'";}else{$sel_gend_ug = ""; }
				if(isset($pre_contactname2) && $pre_contactname2=="Diploma" || isset($eachrecord1['pre_contactname2']) && $eachrecord1['pre_contactname2']=='Diploma') 
								{$sel_gend_diploma = "selected='selected'";}else{$sel_gend_diploma = ""; }
								?>
                                      <select name="pre_contactname2"  id="pre_contactname2" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="PG" <?php echo $sel_gend_pg; ?> >PG</option>
                                        <option  value="UG" <?php echo $sel_gend_ug; ?>>UG</option>
										<option  value="Diploma" <?php echo $sel_gend_diploma; ?>>Diploma</option>
                                      </select>									                                   </td><?php */?>
               </tr>
			   
              
               
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Father's Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['pre_fathername']); ?></td>
                   <!--<td align="left"><span class="narmal">Branch</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php //echo htmlentities($eachrecord1['es_branch']); ?></td>-->
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Mother's Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php  if($eachrecord1['pre_mothername']!='') { echo $eachrecord1['pre_mothername']; } else { echo $pre_mothername;}?></td>
                   <td align="left"><span class="narmal">Email</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo $eachrecord1['pre_emailid']; ?></td>
               </tr>
			   
			   
			   
			   
			   
			   
                <tr>                <td>&nbsp;</td>
                                    <td height="30" align="left">Category</td>
                                    <td align="left">:</td>
                                    <td align="left"><select name="caste_id">
                                   
                                    <?php 
									$caste_arr = $db->getrows("SELECT * FROM es_caste");
									if(count($caste_arr)>0){
									foreach($caste_arr  as $each){
									?>
                                    <option value="<?php echo $each['caste_id'];?>" <?php if($caste_id==$each['caste_id']){echo "selected='selected'";}?>><?php echo $each['caste']; ?></option>
                                    <?php
									}
									}
									?>
                                    </select></td>
                                    <td align="left">Document Deposited</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<input type="checkbox" name="document_deposited" value="YES" <?php
									if(!isset($document_deposited)){$document_deposited=$eachrecord1['document_deposited'];}
									 if($document_deposited=="YES"){?> checked="checked"<?php }?> /><textarea name="es_branch"><?php echo $eachrecord1['$es_branch']; ?></textarea></td>
               </tr>
                                  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Religion</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php 
									if(!isset($pre_contactno2)){$pre_contactno2 = $eachrecord1['pre_contactno2'];}
									echo $pre_contactno2;  ?></td>
                                    <td align="left">Tuition Fee Concession</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php 
									if(!isset($fee_concession)){$fee_concession = $eachrecord1['fee_concession'];}
									echo $fee_concession;  ?></td>
                                  </tr>
                                  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Old Balance </td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php 
									if(!isset($ann_income)){$ann_income = $eachrecord1['ann_income'];}
									echo $ann_income;  ?>									</td>
                                    
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Photo </span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_image" type="file" />
                     <?php echo $eachrecord1['pre_image']; ?></td>
                   <td colspan="2" rowspan="3" align="left"><img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="0"/></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="50" align="left"><span class="narmal">Student ID</span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_hobbies" type="text" size="4" value="<?php 
									if(!isset($pre_hobbies)){$pre_hobbies = $eachrecord1['pre_hobbies'];}
									echo $pre_hobbies;  ?>"  />&nbsp;&nbsp;<input name="pre_hobbies1" type="text" size="3" value="<?php 
									if(!isset($pre_hobbies1)){$pre_hobbies1 = $eachrecord1['pre_hobbies1'];}
									echo $pre_hobbies1;  ?>"  />&nbsp;&nbsp;<input name="pre_hobbies2" type="text" size="3" value="<?php 
									if(!isset($pre_hobbies2)){$pre_hobbies2 = $eachrecord1['pre_hobbies2'];}
									echo $pre_hobbies2;  ?>"  /></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="50" align="left">Econ Backward</td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><?php
								if(isset($es_econbackward) && $es_econbackward=="Yes" || isset($eachrecord1['es_econbackward']) && $eachrecord1['es_econbackward']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_econbackward) && $es_econbackward=="No" || isset($eachrecord1['es_econbackward']) && $eachrecord1['es_econbackward']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_econbackward"  id="es_econbackward" style="width:120px;">
                                        <option value="" >Select Type</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                   </select></td>
               </tr>
                 <tr>
                                  <td height="30">&nbsp;</td>
                                    <td align="left">Reserve Category</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php
								if(isset($es_rcat) && $es_rcat=="Yes" || isset($eachrecord1['es_rcat']) && $eachrecord1['es_rcat']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_rcat) && $es_rcat=="No" || isset($eachrecord1['es_rcat']) && $eachrecord1['es_rcat']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_rcat"  id="es_rcat" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                      </select>									</td>
                                    
                                    <td colspan="3" rowspan="2" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
               </tr>
								  
								  <tr>
                                  <td height="30">&nbsp;</td>
                                    <td align="left">Is Physically Handicapped</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($es_phandcaped) && $es_phandcaped=="Yes" || isset($eachrecord1['es_phandcaped']) && $eachrecord1['es_phandcaped']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_phandcaped) && $es_phandcaped=="No" || isset($eachrecord1['es_phandcaped']) && $eachrecord1['es_phandcaped']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_phandcaped"  id="es_phandcaped" style="width:120px;">
                                        <option value="" >Select Type</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                      </select>									</td>
                                  </tr>
								  
								  
								  
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>          
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Present Address</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><?php echo $eachrecord1['pre_address1']; ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><?php if($eachrecord1['pre_city1']!='') {echo $eachrecord1['pre_city1'];} else { echo $pre_city1; } ?></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_state1']!='') {echo $eachrecord1['pre_state1']; } else { echo $pre_state1; }?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_pincode1']!='') {echo $eachrecord1['pre_pincode1']; } else { echo $pre_pincode1; }?></td>
                 <td align="left"><span class="narmal">Country</span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_country1']!='') {echo $eachrecord1['pre_country1']; } else { echo $pre_country1; }?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Phone No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_phno1']!='') {echo $eachrecord1['pre_phno1'];} else { echo $pre_phno1; } ?></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php echo $eachrecord1['pre_mobile1']; ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td align="left">&nbsp;</td>
                 <td align="left">:</td>
                 <td align="left">&nbsp;</td>
                 <td colspan="3" align="left"><span style="color:#FF0000">(All future SMS messages will be sent to this number)</span></td>
               </tr>
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent  Address</span><span class="admin">             
					<input type="checkbox" name="sameaddress" id="sameaddress" value="0" onclick="javascript:getfieldvalues()" />
				Same as Above </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Addres</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><?php if($eachrecord1['pre_address']!='') { echo $eachrecord1['pre_address'];} else {echo $pre_address;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_city']!='') { echo $eachrecord1['pre_city']; } else {echo $pre_city;}?></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_state']!='') { echo $eachrecord1['pre_state'];} else {echo $pre_state;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_pincode']!='') { echo $eachrecord1['pre_pincode']; } else {echo $pre_pincode;}?></td>
                 <td align="left"><span class="narmal">Country</span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_country']!='') { echo $eachrecord1['pre_country'];} else {echo $pre_country;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Phone No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_phno']!='') { echo $eachrecord1['pre_phno'];} else {echo $pre_phno;} ?></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_mobile']!='') { echo $eachrecord1['pre_mobile']; } else {echo $pre_mobile;}?></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Contact Person Details </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Name</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_contactname1']!='') { echo $eachrecord1['pre_contactname1'];} else {echo $pre_contactname1;} ?></td>
                 <td width="23%" align="left"><span class="narmal">Contact No </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_contactno1']!='') { echo $eachrecord1['pre_contactno1'];} else {echo $pre_contactno1;} ?></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          
          <tr>
             <td class="bgcolor_02"></td>
             <td></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
               <tr class="bgcolor_02" height="22">
                 <td width="33%" height="25" align="center" class="admin">Institution</td>
                 <td width="33%" align="center" class="admin">Percentage</td>
                 <td width="34%" align="center"class="admin">Result</td>
              </tr></table></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellpadding="3" cellspacing="0">
											 
													<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_current_class1']!='') { echo $eachrecord1['pre_current_class1']; } else {echo $pre_current_class1;}?>													  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_current_percentage1']!='') { echo $eachrecord1['pre_current_percentage1']; } else {echo $pre_current_percentage1;}?>														</td>
														<td align="center" valign="top">
			   <?php  if($eachrecord1['pre_current_result1']!='') { echo $eachrecord1['pre_current_result1']; } else {echo $pre_current_result1;}?>													  </td>
													</tr>
													
								<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_current_class2']!='') { echo $eachrecord1['pre_current_class2']; } else {echo $pre_current_class2;}?>								  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_current_percentage2']!='') { echo $eachrecord1['pre_current_percentage2']; } else {echo $pre_current_percentage2;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_current_result2']!='') { echo $eachrecord1['pre_current_result2']; } else {echo $pre_current_result2;}?>												  </td>
			   </tr>					
													<tr>
														<td align="center" valign="top">
												 <?php  if($eachrecord1['pre_current_class3']!='') { echo $eachrecord1['pre_current_class3']; } else {echo $pre_current_class3;}?>												  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_current_percentage3']!='') { echo $eachrecord1['pre_current_percentage3']; } else {echo $pre_current_percentage3;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_current_result3']!='') { echo $eachrecord1['pre_current_result3']; } else {echo $pre_current_result3;}?>													  </td>
													</tr>		
													<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_physical_details']!='') { echo $eachrecord1['pre_physical_details']; } else {echo $pre_physical_details;}?>													  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_height']!='') { echo $eachrecord1['pre_height']; } else {echo $pre_height;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_weight']!='') { echo $eachrecord1['pre_weight']; } else {echo $pre_weight;}?>													  </td>
													</tr>		
													<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_alerge']!='') { echo $eachrecord1['pre_alerge']; } else {echo $pre_alerge;}?>													  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_physical_status']!='') { echo $eachrecord1['pre_physical_status']; } else {echo $pre_physical_status;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_special_care']!='') { echo $eachrecord1['pre_special_care']; } else {echo $pre_special_care;}?>												  </td>
													</tr>		
													<?php /*?><tr>
														<td align="center" valign="top">
                                                        <select name="pre_current_class2">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr2 = $db->getrows("SELECT * FROM es_institutes");
									if(count($inst_arr2)>0){
									foreach($inst_arr2  as $each){
									?>
                                    <option value="<?php echo $each['inst_id'];?>" <?php if($pre_current_class1==$each['inst_id']){echo "selected='selected'";}?>><?php echo ucwords($each['inst_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>
																											  </td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_percentage2" value="<?php echo $pre_current_percentage2;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_result2" value="<?php echo $pre_current_result2;?>"/>													  </td>
													</tr>
													<tr>
														<td align="center" valign="top">
                                                        <select name="pre_current_class3">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr3 = $db->getrows("SELECT * FROM es_institutes");
									if(count($inst_arr3)>0){
									foreach($inst_arr3  as $each){
									?>
                                    <option value="<?php echo $each['inst_id'];?>" <?php if($pre_current_class1==$each['inst_id']){echo "selected='selected'";}?>><?php echo ucwords($each['inst_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>
																											  </td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_percentage3" value="<?php echo $pre_current_percentage3;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_result3" value="<?php echo $pre_current_result3;?>" />													  </td>
													</tr><?php */?>
													
													<tr>
													  <td colspan="3" align="center" valign="top" height="10px"></td>
												  </tr>
										  </table></td>
             <td class="bgcolor_02"></td>
          </tr>
         
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;TRANSPORT</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="28%" height="30" align="left"> Transport </td>
                 <td width="2%" align="left">:</td>
                 <td width="69%" align="left">
                 		 <?php
					 $allote_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND `type`='student' ORDER BY id DESC LIMIT 0,1";
						 $allote_exe=mysql_query($allote_sql);
						 $allote_num=mysql_num_rows($allote_exe);
						 if($allote_num>=1){
							 $allote_row=mysql_fetch_array($allote_exe);
						 }
						 ?>
                         <input type="checkbox" name="transport" value="YES" <?php if(isset($allote_row['status']) && $allote_row['status']=='Active'){?> checked="checked"<?php }?> /></td>
               </tr>
                <tr>
                                                       <td width="1%">&nbsp;</td>
                                                       <td><span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
                  <td>:</td>
                                                       <td><select name="tr_place_id">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$trplaces_arr = $db->getrows("SELECT * FROM es_transport_places");
									if(!isset($tr_place_id)){$tr_place_id=$eachrecord1['tr_place_id'];}
									if(count($trplaces_arr)>0){
									foreach($trplaces_arr  as $each){
									?>
                                    <option value="<?php echo $each['tr_place_id'];?>" <?php if($tr_place_id==$each['tr_place_id']){echo "selected='selected'";}?>><?php echo ucwords($each['place_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>                                    </td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"> Route / Board </td>
                 <td align="left">:</td>
                 <td align="left">
           <?php /*?>      <?php
				 $allote_row['board_id'];
				 $board_row['id'];
				  $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                   $route_exe=mysql_query($route_sql);
                   while($route_row=mysql_fetch_array($route_exe)){
                   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
                   $board_exe=mysql_query($board_sql);
                   while($board_row=mysql_fetch_array($board_exe)){
					    $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND student_staff_id=".$sid;
					   $query_exe=mysql_query($query_sql);
					   $query_num=mysql_num_rows($query_exe);
					   
					  $ww=mysql_fetch_array($query_exe);
				
					   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id'])
					   			{
					   
					   					 $board_row['board_title']; 
										  $allote_row['board_id'];
										 echo $board_row['id'];
										 }
					   }}
                 ?><?php */?>
                   <select name="boardid">
                   <option value="">Select Route/Board</option>
                   <?php
                   $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                   $route_exe=mysql_query($route_sql);
                   while($route_row=mysql_fetch_array($route_exe)){
				   $new_word =substr($route_row['route_Via'], 0, 25);
				   ?>
                   <optgroup label="<?php echo $route_row['route_title']." -(".$new_word.")"; ?>">
                   <?php
                   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
                   $board_exe=mysql_query($board_sql);
                   while($board_row=mysql_fetch_array($board_exe)){
					   $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND board_id=".$board_row['id'];
					   $query_exe=mysql_query($query_sql);
					   $query_num=mysql_num_rows($query_exe);
					   
					   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id']){
			   
                       ?>													   
                   <option value="<?php echo $board_row['id']; ?>" <?php if($boardid==$board_row['id'] || $allote_row['board_id']==$board_row['id']){?> selected="selected"<?php }?>><?php echo $board_row['board_title']; ?></option>
                   <?php }}?>
                   </optgroup>
                   <?php }?>
                   </select>                 </td>
               </tr>             
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td height="40px">&nbsp;</td>
             <td class="bgcolor_02"></td>
          </tr>  
</table>
<?php

/**
* ********End of View Student Profile*********************************
*/
 //}
  } ?>	
</form>	
<?php
if($action=="stud_status")
{
?>
	<form name="searchfrm" method="post" action="">
	<table width="100%">
		<tr>
			
	  <td height="25" colspan="8" class="bgcolor_02">&nbsp;&nbsp;Students List</td>
	
		</tr>
		<tr>
			<td width="28%" align="left" valign="middle"  class="narmal" colspan="4">
			Class :
			<select name="sm_class" style="width:110px;">
                      <option value="">Select</option>
					  
                      <?php 
				  if (count($allClasses)>0){
					  foreach($allClasses as $eachClass) {?>
                      <option value="<?php echo $eachClass['es_classesid']; ?>"
						 <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>> <?php echo $eachClass['es_classname']; ?></option>
                      <?php
				       }
					}
				  ?>
				  </select>
				  <input name="searchstudentlist" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer; height:22px;"/>
				  </td>
		</tr>
		
		
		
		<?php if(isset($searchstudentlist))
		{ 
		
		?> 
		<tr class="bgcolor_02">
					<td width="47"  align="center" height="25" >Sr.No.</td>
					<td width="88"  align="center">Reg.No.</td>
					<td width="245"  align="center">Name</td>
					<td width="185"  align="center">Class</td>
					<td width="212"  align="center">Academic Year</td>
				
					<td width="146"  align="center">Status</td>
				</tr>
		
		<?php
			
			$i = $start;
			
				  $sql_stud=mysql_query("select * from es_preadmission p,es_student_status s where p.pre_class='".$sm_class."' AND p.es_preadmissionid=s.student_id");	
			
			while($eachrecord=mysql_fetch_assoc($sql_stud))
			{		
			
				$i++ ;
			$zibracolor = ($i%2==0)?"even":"odd";
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i ; ?>
						<input type="hidden" value="<?php echo $eachrecord['es_preadmissionid'] ; ?>" name="updatestudentid[]" />
					</td>
					<td align="center" valign="middle" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['es_preadmissionid'] ; ?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>
					<td align="center" valign="middle" class="narmal">
					<?php
					 $sql_class=mysql_query("select * from es_classes where es_classesid='".$sm_class."'");
					$class_list=mysql_fetch_assoc(($sql_class));
					?>
					<input type="hidden" name="class[]" value="<?php echo $class_list['es_classesid'];?>" />	<?php echo $class_list['es_classname'];?>		
					</td>					
					<td align="center" valign="middle" class="narmal"><select name="ac_year[]" style="width:180px;">
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid'].$each_record['fi_ac_startdate'].$each_record['fi_ac_enddate']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                     </select>
					</td>



					
					
					
					<td align="center" valign="middle" class="narmal"><select name="pre_status[]">
					<option value="Active" <?php if($eachrecord['status1']=='Active') { echo "selected='selected'"; } ?>>Active</option>
					<option value="Inactive" <?php if($eachrecord['status1']=='Inactive') { echo "selected='selected'"; } ?>>Inactive</option>
					<option value="Terminated" <?php if($eachrecord['status1']=='Trerminated') { echo "selected='selected'"; } ?>>Terminated</option>
					<option value="Temporary stop" <?php if($eachrecord['status1']=='Temporary Stop') { echo "selected='selected'"; } ?>>Temporary stop</option>
					</select>  
					</td>
					
					
					
				</tr>                         
<?php 
	}}
 ?>
	<tr><?php if(isset($searchstudentlist)){?>
		<td align="center" valign="middle" class="narmal" colspan="6"><input type="submit" name="subBtn" id="" value="Submit" class="bgcolor_02" /></td><?php }?>
	</tr>	
		
	</table>
	</form>
<?php
	if(isset($_POST['subBtn']))
	{ 
		for($j = 0; $j<count($updatestudentid); $j++)
		 { 
		 	$status_date=mysql_query("SELECT * FROM es_student_status WHERE student_id='".$updatestudentid[$j]."'");
			$status_list=mysql_fetch_assoc($status_date);
			
		 	if($pre_status[$j]=="Active")
			{
		
		      $sql_update="update es_student_status set status1='Active',
		 											active_on='".date('Y-m-d')."',
													inactive_on='".$status_list['inactive_on']."',
													terminated_on='".$status_list['terminated_on']."',
													tem_stop='".$status_list['tem_stop']."'
													where student_id ='".$updatestudentid[$j]."'";
		 
		 	}
			if($pre_status[$j]=="Inactive")
			{
		
		 		 $sql_update="update es_student_status set status1='Inactive',
		 											active_on='".$status_list['active_on']."',
													inactive_on='".date('Y-m-d')."',
													terminated_on='".$status_list['terminated_on']."',
													tem_stop='".$status_list['tem_stop']."'
													where student_id ='".$updatestudentid[$j]."'";
		 	}
			if($pre_status[$j]=="Terminated")
			{
		 
		 $sql_update="update es_student_status set status1='Trerminated',
		 											active_on='".$status_list['active_on']."',
													inactive_on='".$status_list['inactive_on']."',
													terminated_on='".date('Y-m-d')."',
													tem_stop='".$status_list['tem_stop']."'
													where student_id ='".$updatestudentid[$j]."'";
		 	}
			
			if($pre_status[$j]=="Temporary stop")
			{
		 
		 $sql_update="update es_student_status set status1='Temporary Stop',
		 											active_on='".$status_list['active_on']."',
													inactive_on='".$status_list['inactive_on']."',
													terminated_on='".$status_list['terminated_on']."',
													tem_stop='".date('Y-m-d')."'
													where student_id ='".$updatestudentid[$j]."'";
		 	}
			
			mysql_query($sql_update);
				 
		 }	
}
?>	
<?php


}
?>
