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
		function ajax_fun(es_classesid,selval)
		{   
			url="?pid=55&action=assign_section&id="+es_classesid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(classess);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function classess()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("sections").innerHTML=xmlHttp.responseText
			}
		}

</script>

<?php if($action=="assign_section"){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="23" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Sections / Roll Numbers</span></td>
  </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				<form method="post" action="" enctype="multipart/form-data">
				<table width="100%" border="0">
				 <tr>
					<td width="21%" class="narmal" >&nbsp;</td>
					<td width="14%" align="left" class="narmal" >Select Class&nbsp;:</td>
					<td width="65%" align="left">
					<select name="es_classesid" id="es_classesid" class="input_field" style="width:150px" onchange="javascript: ajax_fun(this.value,''); ">
                       <option value="">Select Class</option>
                       <?php foreach($class_res as $each_class) {?>
                       <option value="<?php echo $each_class['es_classesid'];?>" <?php if(isset($class_id) && $class_id == $each_class['es_classesid'] ){echo "selected='selected'";}?>><?php echo $each_class['es_classname'];?></option>
                       <?php }?>
                     </select>
					 </td>
				  </tr>
				  <tr>
					<td colspan="3">
					<div id="sections">
					<?php /*?><table width="100%" border="0">
						<tr>
						<td colspan="8">&nbsp;</td>
				      </tr>
					   <tr class="bgcolor_02 admin" height="25">
						<td align="center" valign="middle">S.No</td>
						<td width="24%" align="center" valign="middle">Reg No </td>
						<td width="22%" align="center" valign="middle">Student Name </td>
						
						<td width="19%" align="center" valign="middle">Roll No </td>
						
					    <td width="19%" align="center" valign="middle">Assign Section </td>
					  </tr>
				 	<?php if(count($all_sem_det)>0){
					$irow=$start;
					foreach($all_sem_det as $eachrecord){
					$irow++;
					 ?>
					  
					  <tr>
						<td align="center" valign="middle">&nbsp;<?php echo $irow; ?></td>
						<td align="center" valign="middle">&nbsp;<?php echo $eachrecord['es_preadmissionid']; ?><input type="hidden" value="<?php echo $eachrecord['es_preadmissionid']; ?>" name="sudent_id[]" /></td>
						<td align="center" valign="middle">&nbsp;<?php echo $eachrecord['pre_student_username']; ?></td>
							<td align="center" valign="middle"><?php echo $html_obj->draw_inputfield('roll_no[]',$eachrecord['ROLL_NO'],'','class="input_field" width:"50px;"');?></td>
					        <td align="center" valign="middle">
							<select name="section_id[]" class="input_field" style="width:120px" >
							<option value="0">Select Section</option>
							<option value="1" <?php if($eachrecord['SECTION'] == 1) { ?> selected="selected" <?php } ?> >Section-A</option>
							<option value="2" <?php if($eachrecord['SECTION'] == 2) { ?> selected="selected" <?php } ?> >Section-B</option>
							<option value="3" <?php if($eachrecord['SECTION'] == 3) { ?> selected="selected" <?php } ?> >Section-C</option>
							</select>
							</td>
					  </tr>
					    <?php }?>
					  <tr>
						<td colspan="8"  align="center"><input type="submit" name="submit" value="Submit" class="bgcolor_02" /></td>
					  </tr>
					  <?php }else{?>
					  <tr>
						<td colspan="8" class="admin" align="center">No Records Found</td>
					  </tr>
					  <?php }?>
					</table><?php */?>	
					</div>
					</td>
				  </tr>
                  <tr><td></td></tr>
				</table>
				 </form>
						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }?>

<?php if($action=="print_sectionwise"){ 
$year_sql="SELECT fi_startdate, fi_enddate FROM es_finance_master WHERE es_finance_masterid=".$_SESSION['eschools']['es_finance_masterid'];
$year_res=$db->getRow($year_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left">
<?php echo 'Academic Year : '.func_date_conversion('Y-m-d','d-m-Y',$year_res['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$year_res['fi_enddate']); ?>
</td>
<td align="right">
<?php echo 'Date : '.date('d-m-Y'); ?>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Sections / Roll Numbers</td>
  </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				
					<table width="100%" border="0">
						<tr>
						<td colspan="8" align="left">
						<?php
						echo '<b>CLASS : '.$student_det[0]['es_classname'].'</b>';
						?>
						</td>
				      </tr>
					   <tr class="bgcolor_02 admin" height="25">
						<td width="16%" align="center" valign="middle">S.No</td>
						<td width="20%" align="center" valign="middle">Reg No </td>
						<td width="26%" align="left" valign="middle">Student Name </td>
						
						<td width="19%" align="center" valign="middle">Roll No </td>
						
					    <td width="19%" align="center" valign="middle">  Section </td>
					  </tr>
				 	<?php if(count($student_det)>0){
					$irow=$start;
					foreach($student_det as $eachrecord){
					$irow++;
					 ?>
					  
					  <tr>
						<td align="center" valign="middle">&nbsp;<?php echo $irow; ?></td>
						<td align="center" valign="middle">&nbsp;<?php echo $eachrecord['es_preadmissionid']; ?></td>
						<td align="left" valign="middle">&nbsp;<?php echo $eachrecord['pre_name']; ?></td>
							<td align="center" valign="middle">&nbsp;<?php echo $eachrecord['roll_no'];?></td>
					        <td align="center" valign="middle">&nbsp;<?php foreach($sect_det as $sect) { if($sect['section_id'] == $eachrecord['section_id']) { echo ucfirst($sect['section_name']); } }?></td>
					  </tr>
					    <?php }?>
					  
					  <?php }?>
					  
				  </table>	
					
						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }?>

