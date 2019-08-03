<?php
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
* ********Displaying the students with respect to class and reg.number*******
*/

if ($action=='serchclass'){
?>
<script type="text/javascript">
function newWindowOpen(href){
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<?php /*?><script type="text/javascript">

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
		else
		{
		return true;
		}	   
	}
</script>
<?php */?><script type="text/javascript">
function logs(MyWin,user_id,table_name,record_id,action)
    {
	winpopup=window.open(MyWin+'?user_id='+user_id+'&table_name='+table_name+'&record_id='+record_id+'&action='+action,table_name+user_id,'height=222,width=555,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>
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
             <td width="956" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
             <td width="1" class="bgcolor_02"></td>
          </tr> 
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <!--DWLayoutTable-->
			 <tr>
                  <td width="19" height="30">&nbsp;</td>
                   <td width="239" align="left"><span class="narmal">STUDENT-UID (Aadhar-Card) No.</span></td>
                 <td width="9" align="left">:</td>
                   <td width="201" align="left"> <?php echo $eachrecord1['aadharno']; ?> </td></tr>
				   <tr>
				  
				   <td height="30">&nbsp;</td>
				   <frameset cols="80%","20%">
				   <frame />
                   <td align="left"><span class="narmal">Tittle</span></td>
                 <td width="9" align="left">:</td>
                   <td width="201" align="left"><?php echo $eachrecord1['pre_serialno']; ?>&nbsp;<?php echo $eachrecord1['pre_name']; ?> </td></frameset>	
									  
									  
                   <td width="221" align="left"><span class="narmal">Admission No.</span></td>
                   <td width="39" align="left">:</td>
                   <td width="230" align="left"><?php echo $eachrecord1['admission_id']; ?>
                   
                                 </td>
               </tr>
			 
               <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Middle Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['middle_name']); ?></td>
                   <td align="left"><span class="narmal">Last Name</span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                 <?php if($eachrecord1['pre_lastname']!='') {echo $eachrecord1['pre_lastname']; } else { echo $pre_lastname;} ?>                </td>
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
				   <?php echo $eachrecord1['pre_gender']; ?></td>
                   <td align="left"><span class="narmal">Academic From</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_fromdate']);?></td>
               </tr>
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Admission Date</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['admission_date']);?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ></a></td>
                   <td align="left"><span class="narmal">Academic To </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_todate']);?></td>
               </tr>
                 <tr>
                   <td height="36">&nbsp;</td>
                   <td align="left"><span class="narmal">Date&nbsp;Of&nbsp;Birth </span></td>
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
                   
				   
				   <td align="left"><span class="narmal">Class</span></td>
                   <td align="left">:</td>
				  <td align="left"> <?php
								//$q="select * from es_groups where es_groupsid='".$eachrecord1['es_program']."'";
								//$r=mysql_query($q);
								//$ret=mysql_fetch_array($r);
								//$es_groupname=$ret['es_groupname'];
								//echo $es_groupname;
								?>		
                   <?php //echo $es_groupname;?>
				   
				     <?php
								$q="select * from es_classes where es_classesid='".$eachrecord1['pre_class']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								$es_classname=$ret['es_classname'];
								echo $es_classname;
								?>  
								<?php
								/*$q="select * from es_classes where es_classesid='".$eachrecord1['pre_class']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								$es_classname=$ret['es_classname'];*/
								//echo $es_groupname;
								?>		
                   <td align="left"><?php /*echo $es_classname;*/ ?></td>
				   
					</td>
					</tr>
			   
			  
			   
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left">Nationality</td>
                   <td align="left">:</td>
								<?php
								$q="select * from es_classes where es_classesid='".$eachrecord1['pre_class']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								$es_classname=$ret['es_classname'];
								//echo $es_classname;
								?>         
                   <td align="left"><?php echo $eachrecord1['test1']; ?></td>
                   <td align="left"><span class="narmal">Blood Group</span></td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php echo $eachrecord1['pre_blood_group'];?> </td>
               </tr>
			   
              
               
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left">Religion</td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['test2']); ?></td>
				   
				   
				   
                   <td align="left" valign="top"><span class="narmal">Category</span></td>
                   <td align="left">:</td>
				   <?php
								$q="select * from es_caste where caste_id='".$eachrecord1['caste_id']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								//$caste=$ret['caste'];
								//echo $caste;
								?>       
								
				   <td align="left" valign="top"><?php echo htmlentities($ret['caste']); ?></td>
               </tr>
			   
			   
			   
			   
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left">Caste </td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['test3']); ?></td>
                   <td align="left" valign="top">Mother Tongue</td>
                   <td align="left">:</td>
                   <td align="left" valign="top"><?php echo htmlentities($eachrecord1['pre_alerge']); ?>&nbsp;</td>
               </tr>
			  
			   
			   
			   
			   
			     <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left">Physical Handicaped </td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['es_econbackward5']); ?></td>
                   <td align="left" valign="top">Reason(if Weaker)</td>
                   <td align="left">:</td>
                   <td align="left" valign="top"><?php echo htmlentities($eachrecord1['reason']); ?>&nbsp;</td>
               </tr>
			   
			   
			   
			   <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left">Educational Gap(if Any) </td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['edugap']); ?></td>
                   <td align="left" valign="top">Board</td>
                   <td align="left">:</td>
                   <td align="left" valign="top"><?php echo htmlentities($eachrecord1['board']); ?>&nbsp;</td>
               </tr>
			   
			    
			   
			   
			   
			   
                <tr>                <td height="30">&nbsp;</td>
                                    <td align="left">Previous School Attended</td>
                                    <td align="left">:</td>
									<?php
								$q="select * from es_caste where caste_id='".$eachrecord1['caste_id']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								$caste=$ret['caste'];
								//echo $caste;
								?>       
                                    <td align="left"><?php echo htmlentities($eachrecord1['es_home']); ?></td>
                                    <td align="left" valign="top">Medium</td>
                  <td align="left">:</td>
                                    <td align="left" valign="top"><?php echo htmlentities($eachrecord1['pre_weight']); ?></td>
               </tr>
                                  <tr>
                                  <td height="30">&nbsp;</td>
                                    <td align="left">Class In Which Was Studying </td>
                                    <td align="left">:</td>
                                    <td align="left"><?php echo htmlentities($eachrecord1['pre_hobbies']); ?></td>
                                    <td align="left">Date Of Leaving That School </td>
                                    <td align="left">:</td>
                                    <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth1']); ?></td>
                                  </tr>
                                  <tr>
								  
								  <tr>
                                  <td height="30">&nbsp;</td>
                                    <td align="left">Date Of Birth Certificate Joined or Not  </td>
                                    <td align="left">:</td>
                                    <td  align="left" valign="middle"><?php echo htmlentities($eachrecord1['es_econbackward1']); ?></td>
									 
                                    <td align="left">Cast Certificate joined or Not </td>
                                    <td align="left">:</td>
                                    <td  align="left" valign="middle"><?php echo htmlentities($eachrecord1['es_econbackward2']); ?></td>
                                  </tr>
                                  <tr>
								  
								  <tr>
								   <td height="30">&nbsp;</td>
								  
								  
								  <td height="30">&nbsp;</td>
								  </tr>
								  
								  
								    <tr>
                                  <td height="30">&nbsp;</td>
                                    <td align="left">Mark Sheet joined or Not  </td>
                                    <td align="left">:</td>
                                    <td  align="left" valign="middle"><?php echo htmlentities($eachrecord1['es_econbackward3']); ?></td>
									 
                                    <td align="left">Admission Type </td>
                                    <td align="left">:</td>
                                    <td  align="left" valign="middle"><?php echo htmlentities($eachrecord1['es_econbackward4']); ?></td>
                                  </tr>
								  
								  
								  
								  
                                  <?php /*?><td height="30">&nbsp;</td>
								  <td align="left">Enrollment No.</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php 
									echo $eachrecord1['pre_age'];?></td>
                                    <td align="left">Old Balance </td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php 
									echo $eachrecord1['ann_income'];?></td><?php */?>
                 <tr>
                   <td height="50">&nbsp;</td>
                   <td align="left">Transfer Certificate is enclosed </td>
                   <td align="left">:</td>
                   <td colspan="2" align="left" valign="middle"><?php echo htmlentities($eachrecord1['es_econbackward']); ?></td>
                   <td colspan="2" rowspan="3" align="left"><img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="0"/></td>
               </tr>
                 
			   
			   <?php /*?> <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Roll No.</span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><?php 
				echo $eachrecord1['es_preadmissionid'];?></td>
               </tr>
			   
                 <tr>
                   <td height="40">&nbsp;</td>
                   <td align="left"><span class="narmal">University Roll No.</span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><?php echo $eachrecord1['test2']; ?></td>
               </tr><?php */?>
                 <tr>
                   <td height="0"></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
							      <tr><td height="30">&nbsp;</td>
                                    <?php /*?><td align="left">Residence</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php echo $eachrecord1['es_home'];	?>                                    </td><?php */?>
                                    <td align="left">Username</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php echo htmlentities($eachrecord1['pre_student_username']); ?></td>
               </tr>
								  
								  <tr>
                                  <td height="30">&nbsp;</td>
                                    <td align="left">Password</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php echo $eachrecord1['pre_student_password'];?></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								  
								   <?php /*?><tr>
                                  <td height="30">&nbsp;</td>
								   <td align="left">Building</td>
                                    <td align="left">:</td>
									<?
								$q="select * from es_hostelbuld where es_hostelbuldid='".$eachrecord1['pre_building']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								$buld_name=$ret['buld_name'];
								//echo $buld_name;
								?>         
                                    <td align="left"><? echo $buld_name; ?> </td> 
                                    <td align="left">Room</td>
                                    <td align="left">:</td><?
								$q="select * from es_hostelroom where es_hostelroomid='".$eachrecord1['pre_room']."'";
								$r=mysql_query($q);
								$ret=mysql_fetch_array($r);
								$room_no=$ret['room_no'];
								//echo $room_no;
								?>         
                                    <td align="left"><?php echo $room_no;?></td>
                                  </tr><?php */?>
								 
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
                 <td width="21%" height="50" align="left"><span class="narmal">Residential Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><?php echo $eachrecord1['pre_address1']; ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">Area</td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><?php if($eachrecord1['pre_country1']!='') {echo $eachrecord1['pre_country1'];} else { echo $pre_country1; } ?></td>
                 <td width="23%" align="left"><span class="narmal">City</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_city1']!='') {echo $eachrecord1['pre_city1']; } else { echo $pre_city1; }?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">State</td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_state1']!='') {echo $eachrecord1['pre_state1']; } else { echo $pre_state1; }?></td>
                 <td align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_pincode1']!='') {echo $eachrecord1['pre_pincode1']; } else { echo $pre_pincode1; }?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Home Landline Ph. no. </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_phno1']!='') {echo $eachrecord1['pre_phno1'];} else { echo $pre_phno1; } ?></td>
                 <td align="left"><span class="narmal">SMS Mobile No. </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php echo $eachrecord1['pre_mobile1']; ?></td>
               </tr>
			   <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Father Ph. no. </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_contactno']!='') {echo $eachrecord1['pre_contactno'];} else { echo $pre_contactno; } ?></td>
                 <td align="left"><span class="narmal">E-mail </span></td>
                 <td align="left">:</td>
                 
				 <td align="left"><?php  if($eachrecord1['pre_resno2']!='') {echo $eachrecord1['pre_resno2'];} else { echo $pre_resno2; } ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td align="left">&nbsp;</td>
                 <td align="left"></td>
                 <td align="left">&nbsp;</td>
                 <td colspan="3" align="left">&nbsp;</td>
               </tr>
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent  Address</span></td>
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
                 <td height="30" align="left">Area</td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_country']!='') { echo $eachrecord1['pre_country']; } else {echo $pre_country;}?></td>
                 <td width="23%" align="left">City</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_city']!='') { echo $eachrecord1['pre_city'];} else {echo $pre_city;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">State</td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_state']!='') { echo $eachrecord1['pre_state']; } else {echo $pre_state;}?></td>
                 <td align="left"><span class="narmal">Pin Code</span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_pincode']!='') { echo $eachrecord1['pre_pincode'];} else {echo $pre_pincode;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">Home Landline Ph. no.</td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_phno']!='') { echo $eachrecord1['pre_phno'];} else {echo $pre_phno;} ?></td>
                 <td align="left">SMS Mobile No.</td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_mobile']!='') { echo $eachrecord1['pre_mobile']; } else {echo $pre_mobile;}?></td>
               </tr>
               
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Mother's Ph. no. </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_contactno3']!='') {echo $eachrecord1['pre_contactno3'];} else { echo $pre_contactno3; } ?></td>
                 <td align="left"><span class="narmal">Father's Ph. no. </span></td>
                 <td align="left">:</td>
				 <td align="left"><?php  if($eachrecord1['pre_contactno']!='') {echo $eachrecord1['pre_contactno'];} else { echo $pre_contactno; } ?></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Father's Details </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Father Name(Full)</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_fathername']!='') { echo $eachrecord1['pre_fathername'];} else {echo $pre_fathername;} ?></td>
                 <td width="23%" align="left">Educational Qualification</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_contactname1']!='') { echo $eachrecord1['pre_contactname1'];} else {echo $pre_contactname1;} ?></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Age</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_prev_acadamicname']!='') { echo $eachrecord1['pre_prev_acadamicname'];} else {echo $pre_prev_acadamicname;} ?></td>
                 <td width="23%" align="left">Occupation</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_fathersoccupation']!='') { echo $eachrecord1['pre_fathersoccupation'];} else {echo $pre_fathersoccupation;} ?></td>
               </tr>
			   <tr>
                 <?php /*?><td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Designation </td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_fathersoccupation2']!='') { echo $eachrecord1['pre_fathersoccupation2'];} else {echo $pre_fathersoccupation2;} ?></td>
                 <td width="23%" align="left">Department</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?></td><?php */?>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Office Address</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_prev_university']!='') { echo $eachrecord1['pre_prev_university'];} else {echo $pre_prev_university;} ?></td>
                 <td width="23%" align="left">Monthly Income </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_prev_percentage']!='') { echo $eachrecord1['pre_prev_percentage'];} else {echo $pre_prev_percentage;} ?></td>
               </tr>
                
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"></td>
                 <td width="1%" align="left"></td>
                 <td width="30%" align="left"><?php /*?><?php  if($eachrecord1['pre_dateofbirth2']!='') { echo $eachrecord1['pre_dateofbirth2'];} else {echo $pre_dateofbirth2;} ?><?php */?></td>
                 <td width="23%" align="left"> </td>
                 <td width="1%" align="left"></td>
                 <td width="23%" align="left"><?php /*?><?php  if($eachrecord1['pre_prev_percentage']!='') { echo $eachrecord1['pre_prev_percentage'];} else {echo $pre_prev_percentage;} ?><?php */?></td>
               </tr>
             </table>
             </td>
             <td class="bgcolor_02"></td>
          </tr>  
		  <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Mother's Details  </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Mother Name(full)</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_mothername']!='') { echo $eachrecord1['pre_mothername'];} else {echo $pre_mothername;} ?></td>
                 <td width="23%" align="left">Educational Qualification</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_contactname2']!='') { echo $eachrecord1['pre_contactname2'];} else {echo $pre_contactname2;} ?></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Age</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_prev_tcno']!='') { echo $eachrecord1['pre_prev_tcno'];} else {echo $pre_prev_tcno;} ?></td>
                 <td width="23%" align="left">Occupation</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_motheroccupation']!='') { echo $eachrecord1['pre_motheroccupation'];} else {echo $pre_motheroccupation;} ?></td>
               </tr>
			 <?php /*?>  <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Designation </td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_motheroccupation2']!='') { echo $eachrecord1['pre_motheroccupation2'];} else {echo $pre_motheroccupation2;} ?></td>
                 <td width="23%" align="left">Department</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_current_class1']!='') { echo $eachrecord1['pre_current_class1'];} else {echo $pre_current_class1;} ?></td>
               </tr><?php */?>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Office Address</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_current_percentage1']!='') { echo $eachrecord1['pre_current_percentage1'];} else {echo $pre_current_percentage1;} ?></td>
                 <td width="23%" align="left">Monthly Income </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_current_result1']!='') { echo $eachrecord1['pre_current_result1'];} else {echo $pre_current_result1;} ?></td>
               </tr>
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"></td>
                 <td width="1%" align="left"></td>
                 <td width="30%" align="left"><?php /*?><?php  if($eachrecord1['pre_dateofbirth3']!='') { echo $eachrecord1['pre_dateofbirth3'];} else {echo $pre_dateofbirth3;} ?><?php */?></td>
                 <td width="23%" align="left"> </td>
                 <td width="1%" align="left"></td>
                 <td width="23%" align="left"><?php /*?><?php  if($eachrecord1['pre_current_result1']!='') { echo $eachrecord1['pre_current_result1'];} else {echo $pre_current_result1;} ?><?php */?></td>
               </tr>
             </table>
            </td>
             <td class="bgcolor_02"></td>
          </tr>  
		  <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Guardian's Details</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Name Of Gaurdian</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_current_class2']!='') { echo $eachrecord1['pre_current_class2'];} else {echo $pre_current_class2;} ?></td>
                 <td width="23%" align="left">Office Phone </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_resno']!='') { echo $eachrecord1['pre_resno'];} else {echo $pre_resno;} ?></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Residential Address Of Gaurdian </td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_current_percentage2']!='') { echo $eachrecord1['pre_current_percentage2'];} else {echo $pre_current_percentage2;} ?></td>
                 <td width="23%" align="left">&nbsp;</td>
                 <td width="1%" align="left"></td>
                 <td width="23%" align="left"><?php /*?><?php  if($eachrecord1['pre_resno1']!='') { echo $eachrecord1['pre_resno1'];} else {echo $pre_resno1;} ?><?php */?></td>
               </tr>
			   
			   
			   </table>
            </td>
			
			
			  <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp; Family Details   </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
               <tr>
                
				 
				 
				 
				 
                 <td width="5%" height="30" align="center"><span class="narmal">Sr. No. </span></td>
				  <td width="20%" height="30" align="center"><span class="narmal">&nbsp;&nbsp;Name of Family &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Members </span></td> 
				  <td width="15%" height="30" align="center"><span class="narmal">&nbsp;&nbsp;&nbsp;Age </span></td>
				   <td width="20%" height="30" align="center"><span class="narmal">&nbsp;&nbsp;&nbsp;Relation With  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Student </span></td>
				    <td width="20%" height="30" align="center"><span class="narmal">&nbsp;&nbsp;&nbsp;&nbsp;Education </span></td>
					<td width="20%" height="30" align="center"><span class="narmal">&nbsp;&nbsp;Occupation </span></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="center"><span class="narmal">1 </span></td>
				  <td width="20%" height="30" align="center"><?php  if($eachrecord1['pre_family1']!='') { echo $eachrecord1['pre_family1'];} else {echo $pre_family1;} ?> </td> 
				  <td width="15%" height="30" align="center"><?php  if($eachrecord1['age1']!='') { echo $eachrecord1['age1'];} else {echo $age1;} ?></td>
				   <td width="20%" height="30" align="center"><?php  if($eachrecord1['relation1']!='') { echo $eachrecord1['relation1'];} else {echo $relation1;} ?></td>
				    <td width="20%" height="30" align="center"><?php  if($eachrecord1['eduation1']!='') { echo $eachrecord1['eduation1'];} else {echo $eduation1;} ?></td>
					<td width="20%" height="30" align="center"><?php  if($eachrecord1['occupation1']!='') { echo $eachrecord1['occupation1'];} else {echo $occupation1;} ?></td>
                 </tr>
				 
				 
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="center"><span class="narmal">2 </span></td>
				  <td width="20%" height="30" align="center"><?php  if($eachrecord1['pre_family2']!='') { echo $eachrecord1['pre_family2'];} else {echo $pre_family2;} ?></td> 
				  <td width="15%" height="30" align="center"><?php  if($eachrecord1['age2']!='') { echo $eachrecord1['age2'];} else {echo $age2;} ?></td>
				   <td width="20%" height="30" align="center"><?php  if($eachrecord1['relation2']!='') { echo $eachrecord1['relation2'];} else {echo $relation2;} ?></td>
				    <td width="20%" height="30" align="center"><?php  if($eachrecord1['eduation2']!='') { echo $eachrecord1['eduation2'];} else {echo $eduation2;} ?> </td>
					<td width="20%" height="30" align="center"><?php  if($eachrecord1['occupation2']!='') { echo $eachrecord1['occupation2'];} else {echo $occupation2;} ?></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="center"><span class="narmal">3 </span></td>
				  <td width="20%" height="30" align="center"><?php  if($eachrecord1['pre_family3']!='') { echo $eachrecord1['pre_family3'];} else {echo $pre_family3;} ?></td> 
				  <td width="15%" height="30" align="center"><?php  if($eachrecord1['age3']!='') { echo $eachrecord1['age3'];} else {echo $age3;} ?></td>
				   <td width="20%" height="30" align="center"><?php  if($eachrecord1['relation3']!='') { echo $eachrecord1['relation3'];} else {echo $relation3;} ?></td>
				    <td width="20%" height="30" align="center"><?php  if($eachrecord1['eduation3']!='') { echo $eachrecord1['eduation3'];} else {echo $eduation3;} ?></td>
					<td width="20%" height="30" align="center"><?php  if($eachrecord1['occupation3']!='') { echo $eachrecord1['occupation3'];} else {echo $occupation3;} ?></td>
                 </tr>
				 
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="center"><span class="narmal">4 </span></td>
				  <td width="20%" height="30" align="center"><?php  if($eachrecord1['pre_family4']!='') { echo $eachrecord1['pre_family4'];} else {echo $pre_family4;} ?></td> 
				  <td width="15%" height="30" align="center"><?php  if($eachrecord1['age4']!='') { echo $eachrecord1['age4'];} else {echo $age4;} ?></td>
				   <td width="20%" height="30" align="center"><?php  if($eachrecord1['relation4']!='') { echo $eachrecord1['relation4'];} else {echo $relation4;} ?></td>
				    <td width="20%" height="30" align="center"><?php  if($eachrecord1['eduation4']!='') { echo $eachrecord1['eduation4'];} else {echo $eduation4;} ?></td>
					<td width="20%" height="30" align="center"><?php  if($eachrecord1['occupation4']!='') { echo $eachrecord1['occupation4'];} else {echo $occupation4;} ?></td>
                 </tr>
				 
				<?php /*?> <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="left"><span class="narmal">5 </span></td>
				  <td width="20%" height="30" align="left"><?php  if($eachrecord1['pre_family5']!='') { echo $eachrecord1['pre_family5'];} else {echo $pre_family5;} ?></td> 
				  <td width="15%" height="30" align="left"><?php  if($eachrecord1['age5']!='') { echo $eachrecord1['age5'];} else {echo $age5;} ?></td>
				   <td width="20%" height="30" align="left"><?php  if($eachrecord1['relation5']!='') { echo $eachrecord1['relation5'];} else {echo $relation5;} ?></td>
				    <td width="20%" height="30" align="left"><?php  if($eachrecord1['eduation5']!='') { echo $eachrecord1['eduation5'];} else {echo $eduation5;} ?></td>
					<td width="20%" height="30" align="left"><?php  if($eachrecord1['occupation5']!='') { echo $eachrecord1['occupation5'];} else {echo $occupation5;} ?></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
               <td width="10%" height="30" align="left"><span class="narmal">6 </span></td>
				  <td width="20%" height="30" align="left"><?php  if($eachrecord1['pre_family6']!='') { echo $eachrecord1['pre_family6'];} else {echo $pre_family6;} ?></td> 
				  <td width="15%" height="30" align="left"><?php  if($eachrecord1['age6']!='') { echo $eachrecord1['age6'];} else {echo $age6;} ?></td>
				   <td width="20%" height="30" align="left"><?php  if($eachrecord1['relation6']!='') { echo $eachrecord1['relation6'];} else {echo $relation6;} ?></td>
				    <td width="20%" height="30" align="left"><?php  if($eachrecord1['eduation6']!='') { echo $eachrecord1['eduation6'];} else {echo $eduation6;} ?></td>
					<td width="20%" height="30" align="left"><?php  if($eachrecord1['occupation6']!='') { echo $eachrecord1['occupation6'];} else {echo $occupation6;} ?></td>
                 </tr>
				 <tr><td>&nbsp;</td></tr><?php */?>
				 
				 
				 
                
			   			  
               
             </table></td>
			 
			 
			 
			 
			 
			 <tr>
			 <td>
			 
			 </td>
			 <td>
			 
			 </td>
			 </tr>
			 
			 
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
                
				 
				 
				 
				 
                 <td width="5%" height="30" align="center"><span class="narmal">Sr. No. </span></td>
				  <td width="20%" height="30" align="center"><span class="narmal">Name of School & &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address </span></td> 
				  <td width="15%" height="30" align="center"><span class="narmal">Enrollment No. </span></td>
				   <td width="20%" height="30" align="center"><span class="narmal">From Year </span></td>
				    <td width="20%" height="30" align="center"><span class="narmal">Year Upto </span></td>
					<td width="20%" height="30" align="center"><span class="narmal">Reason Of &nbsp;Leaving</span></td>
                 </tr>
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="center"><span class="narmal">1 </span></td>
				  <td width="20%" height="30" align="center"><?php  if($eachrecord1['pre_schl1']!='') { echo $eachrecord1['pre_schl1'];} else {echo $pre_schl1;} ?></td> 
				  <td width="15%" height="30" align="center"><?php  if($eachrecord1['enrlno1']!='') { echo $eachrecord1['enrlno1'];} else {echo $enrlno1;} ?></td>
				   <td width="20%" height="30" align="center"><?php  if($eachrecord1['yearfrom1']!='') { echo $eachrecord1['yearfrom1'];} else {echo $yearfrom1;} ?></td>
				    <td width="20%" height="30" align="center"><?php  if($eachrecord1['yearupto1']!='') { echo $eachrecord1['yearupto1'];} else {echo $yearupto1;} ?></td>
					<td width="20%" height="30" align="center"><?php  if($eachrecord1['reason1']!='') { echo $eachrecord1['reason1'];} else {echo $reason1;} ?></td>
                 </tr>
				 
				 
				 
				 <tr>
                
				 
				 
				 
				 
                 <td width="10%" height="30" align="center"><span class="narmal">2 </span></td>
				  <td width="20%" height="30" align="center"><?php  if($eachrecord1['pre_schl2']!='') { echo $eachrecord1['pre_schl2'];} else {echo $pre_schl2;} ?></td> 
				  <td width="15%" height="30" align="center"><?php  if($eachrecord1['enrlno2']!='') { echo $eachrecord1['enrlno2'];} else {echo $enrlno2;} ?></td>
				   <td width="20%" height="30" align="center"><?php  if($eachrecord1['yearfrom2']!='') { echo $eachrecord1['yearfrom2'];} else {echo $yearfrom2;} ?></td>
				    <td width="20%" height="30" align="center"><?php  if($eachrecord1['yearupto2']!='') { echo $eachrecord1['yearupto2'];} else {echo $yearupto2;} ?></td>
					<td width="20%" height="30" align="center"><?php  if($eachrecord1['reason2']!='') { echo $eachrecord1['reason2'];} else {echo $reason2;} ?></td>
                 </tr>
				 
						 
			 </table></td>
			
			
			
			
			
			
             <td class="bgcolor_02"></td>
          </tr>  
		  <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Other Information</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Any Relationship with Higher Personality </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_current_result2']!='') { echo $eachrecord1['pre_current_result2'];} else {echo $pre_current_result2;} ?></td>
                 <td width="23%" align="left"><span class="narmal">Health Problem If Any </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_current_class3']!='') { echo $eachrecord1['pre_current_class3'];} else {echo $pre_current_class3;} ?></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Extra Curricular Interest </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_current_percentage3']!='') { echo $eachrecord1['pre_current_percentage3'];} else {echo $pre_current_percentage3;} ?></td>
                 <td width="23%" align="left">&nbsp;</td>
                 <td width="1%" align="left">&nbsp;</td>
                 <td width="23%" align="left">&nbsp;</td>
               </tr>
               
             </table>
            </td>
             <td class="bgcolor_02"></td>
          </tr>  
		  
          
          <tr>
             <td class="bgcolor_02"></td>
             <td></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
               <tr class="bgcolor_02" height="22">
                 <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;
Name &amp; Class Of Your Other Children In This School </span></td>
              </tr></table></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellpadding="3" cellspacing="0">
											 
													<tr>
														<td colspan="2" align="center" valign="top"><strong>1st Child Admi. No. </strong></td>
														<td colspan="3" align="center" valign="top"><strong>2nd Child Admi. No.</strong></td>
														<td width="24%" align="center" valign="top"><strong>3rd Child Admi. No.</strong></td>
													</tr>
													
								<tr>
														<td colspan="2" align="center" valign="top">
												<?php  if($eachrecord1['pre_current_result3']!='') { echo $eachrecord1['pre_current_result3']; } else {echo $pre_current_result3;}?>								  </td>
														<td colspan="3" align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_physical_status']!='') { echo $eachrecord1['pre_physical_status']; } else {echo $pre_physical_status;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_special_care']!='') { echo $eachrecord1['pre_special_care']; } else {echo $pre_special_care;}?>	
														
														
														
														
														
																  </td>
																  </table>
            </td>
             <td class="bgcolor_02"></td>
          </tr>  
		  <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Withdrawal Details</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			   					
													<tr>
														<td width="23%" align="center" valign="top">Date of Leaving</td>
														<td width="4%" align="center" valign="top">:</td>
														<td width="26%" align="center" valign="top">
                                                        
														<?php  if($eachrecord1['admission_date1']!='') { echo formatDBDateTOCalender($eachrecord1['admission_date1']); } else {echo formatDBDateTOCalender($admission_date1);}?>														</td>
														<td width="22%" align="center" valign="top">Class from which left </td>
														<td width="1%" align="center" valign="top">:</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_emailid']!='') { echo $eachrecord1['pre_emailid']; } else {echo $pre_emailid;}?>													  </td>
													</tr>		
													<?php /*?><tr>
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
													</tr>		<?php */?>
													
													<tr>
													  <td colspan="6" align="center" valign="top" height="10px"></td>
												  </tr>
										  </table>
                                          </td></tr>
             <td class="bgcolor_02"></td>
          </tr>
        <?php /*?>
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;&nbsp;TRANSPORT</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
           	 <td>
<?php
		if($eachrecord1['tr_place_id'] != 0)
		{
?>
           
            	<table width="100%">
                	<tr>
                    	<td>Pick-up Point</td>
                    	<td>:</td>
                    	<td><?php echo ucwords($db->getOne("SELECT place_name FROM es_transport_places WHERE tr_place_id=".$eachrecord1['tr_place_id'])); ?></td>
                    </tr>
                	<tr>
                    	<td>Route/Board</td>
                    	<td>:</td>
                    	<td></td>
                    </tr>
                	<tr>
                    	<td>Other Transport</td>
                    	<td>:</td>
                    	<td></td>
                    </tr>
                	<tr>
                    	<td>Other Transport Description</td>
                    	<td>:</td>
                    	<td></td>
                    </tr>
                </table>
            
<?php
		}
		else
		{
			echo "No transport taken";
		}
?>          </td></tr><?php */?>
          </form>	
<?php
  } ?>	

