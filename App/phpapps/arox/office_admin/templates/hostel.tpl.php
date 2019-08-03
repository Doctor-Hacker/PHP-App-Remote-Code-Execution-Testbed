<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>
<script type="text/javascript" language="javascript">
 function onSelection(id,val)
            {
            	var code_id = "hostel_itemcode["+id+"]";
                  var name_id = "hostel_itemname["+id+"]";
                  document.getElementById(code_id).value = val;
                  document.getElementById(name_id).value = val;
            }
					
			
			 function validateissue()
            {
                
                  for ( idno=1; idno<=i; idno++ )
            	{
                        var cdid = "hostel_itemcode["+idno+"]";
                        var nmid = "hostel_itemname["+idno+"]";
                        var qtyid = "quantity["+idno+"]";
                        if(document.getElementById(cdid).value=="" || document.getElementById(nmid).value=="") {
                              alert("Please Select Item");
                              document.getElementById(nmid).focus();
                              return false;
                        }
                        else if(document.getElementById(qtyid).value == "") {
                              alert("Please Enter Quantity");
                              document.getElementById(qtyid).focus();
                              return false;
                        }
                        else if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
                        {
                              alert("Invalid Quantity Format");
                              document.getElementById(qtyid).focus();
                              return false;
                        }
                  }
            }
         
            var i = 1;
            function changeIt(totrow){
            	
            	var ele_length = eval("document.inv_orders.elements.length");
            	ele_id_array = new Array(ele_length);
            	ele_val_array = new Array(ele_length);
            	
            	for ( k=0; k < ele_length; k++ )
            	{
            		ele_id_array[k] = document.inv_orders.elements[k].id;
            		ele_val_array[k] = document.inv_orders.elements[k].value;
            	}
            	if(totrow > i)
            	{
            	     i = totrow;
            	     i++;
            	     //alert("if"+i);
            	} else {
                        ++i;
                        //alert("eee"+i);
                  }
            	 
                document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='6%' align='center'>"+i+"</td><td width='25%' align='center'><select name='hostel_itemcode["+i+"]' id='hostel_itemcode["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
                foreach($in_itemsList as $item){
                    echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                    }
                ?></select></td><td width='25%' align='center'><select name='hostel_itemname["+i+"]' id='hostel_itemname["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php 
            		foreach($in_itemsList as $item)
                                                                              {
                                                                                    echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                              }
                                                                        ?></select></td><td width='25%' align='center'><select name='hostel_itemtype["+i+"]' id='hostel_itemtype["+i+"]' style='width:100%;' ><option value='Returnable'>Returnable</option><option value='Non-Returnable'>Non-Returnable</option></select></td><td width='25%' align='left'><input name='hostel_itemqty["+i+"]' id='hostel_itemqty["+i+"]' value='' style='width:97%;' onKeyup='isInteger(this.value)'/></td></tr></table>";
            	
            	
            	
            	var len_v = ele_val_array.length;
            	for ( n=0; n<len_v; n++ )
            	{
            		var dyn_id = ele_id_array[n];
            		var dyn_val = ele_val_array[n];
            		document.getElementById(dyn_id).value = dyn_val;
            	}
            	
            }
            function DeleteRow(delrw)
            {
                  var ele_length = eval("document.inv_orders.elements.length");
            	ele_id_array = new Array(ele_length);
            	ele_val_array = new Array(ele_length);
            	
            	for ( k=0; k<ele_length; k++ )
            	{
            		ele_id_array[k] = document.inv_orders.elements[k].id;
            		ele_val_array[k] = document.inv_orders.elements[k].value;
            	}
            	  
            	var j = --i;
                  if(i<delrw)
                        i = delrw-1;
                  
                  
                  document.getElementById("my_div").innerHTML = "";
                  
                  if(i < delrw) {
                        alert("You can not delete more Rows.");
                        return false;
                  }
                  
                  if(i>=delrw)
                  {
                        i=delrw;
                        while(i<=j)
                        {
                              document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='6%' align='center'>"+i+"</td><td width='25%' align='center'><select name='hostel_itemcode["+i+"]' id='hostel_itemcode["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
							  foreach($in_itemsList as $item)
							  {
							  	echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
								}
								?></select></td><td width='25%' align='center'><select name='hostel_itemname["+i+"]' id='hostel_itemname["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php
                                                                                    foreach($in_itemsList as $item)
                                                                                    {
                                                                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                                                                    }
                                                                              ?></select></td><td width='25%' align='center'><select name='hostel_itemtype["+i+"]' id='hostel_itemtype["+i+"]' ><option value='Returnable'>Returnable</option><option value='Non-Returnable'>Non-Returnable</option></select></td><td width='25%' align='center'><input name='hostel_itemqty["+i+"]' id='hostel_itemqty["+i+"]' value='' style='width:97%;' onKeyup='isInteger(this.value)' /></td></tr></table>";
                        
                              if(i==j)
                              {
                                    break;
                              }
                              else {
                                    i++;
                              }
                        }
                  }
                  
            	var len_v = ele_val_array.length - 6;
            	for ( n=0; n<len_v; n++ )
            	{
            		var dyn_id = ele_id_array[n];
            		var dyn_val = ele_val_array[n];
            		document.getElementById(dyn_id).value = dyn_val;
            	}
            }
		///////functon for  checking only numbers/////////////
		function isInteger(s)
{
     var i;
       s = s.toString();
     for (i = 0; i < s.length; i++)
     {
        var c = s.charAt(i);
        if (isNaN(c))
          {
               alert("Not a valid Quantity");
               return false;
          }
     }
     return true;
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
		    
			url="?pid=55&action=getrooms&bid="+countryid+"&selval="+selval;
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
		
		
	
	
	
</script>

<?php if($action=='addbuilding'|| $action=='deletebuilding'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
         <td height="3" colspan="3"></td>
	 </tr>
          <tr>
				<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Create  Building/Hall </span></td>
          </tr>
          <tr>
				<td class="bgcolor_02"></td>
				<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               			  <tr>
                  				<td colspan="4" valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
          					 </tr>
          					<tr>
                 				<td align="left" valign="middle" class="narmal">&nbsp;Building Name </td>
                 				<td align="left" valign="middle" class="narmal">:</td>
							  <td valign="middle" class="narmal"><input type="text" name="buld_name" /><?php if (isset($error_buld) &&$error_buld!=""){echo '<div class="error_message">' . $error_buld . '</div>';	}?>	<font color="#FF0000">*</font></td>
								 <td width="40%" align="left" valign="middle">&nbsp;</td>
            				</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>				
                			<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td width="39%" align="left" valign="middle">&nbsp;
							  
							<?php if(in_array('19_1',$admin_permissions)){?>

 <input name="Submit" type="submit" class="bgcolor_02" value="Submit" />


<?php } ?>  
							 
							  </td>
       				    </tr>
   				  </form>
       			  </table></td>
           			 <td class="bgcolor_02"></td>
  			  </tr>
			  <tr>
					<td class="bgcolor_02"></td>
					<td height="5" align="left" valign="top"></td>
					<td class="bgcolor_02"></td>
        	  </tr>		
         	  <tr>
					<td width="1" height="106" class="bgcolor_02"></td>
					<td  align="left" valign="top">
					
					<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" >
					
                      <?php if(count($es_buldList) > 0 ){ ?>
                      <tr class="bgcolor_02">
                        <td width="18%" height="25" align="left" >&nbsp;Buld No</td>
                        <td width="17%" align="left" >&nbsp;Building Name </td>						
                        <td width="17%" align="left" >&nbsp;Created on </td>		
                        <td width="14%" align="left" class="order">&nbsp;<strong>Action</strong></td>  
                      </tr>	
                      <?php 
							$rownum = 1;	
							foreach ($es_buldList as $eachrecord){
						    $zibracolor = ($rownum%2==0)?"even":"odd";
													
					   ?> <tr class="<?php echo $zibracolor;?>">
						    <td  class="narmal" align="left">&nbsp;<?php echo $rownum; ?></td>             
                            <td class="narmal" align="left">&nbsp;<?php echo $eachrecord->buld_name; ?></td>
						    <td class="narmal" align="left">&nbsp;<?php echo displaydate($eachrecord->createdon); ?></td>
                            <td  class="narmal" align="left">
						<?php if(in_array('19_2',$admin_permissions)){?>

	&nbsp;<a title="Edit" href="?pid=19&action=editbuilding&es_buldid=<?php echo $eachrecord->es_hostelbuldId; ?>"><?php echo editIcon(); ?></a>
						


<?php } ?>	
							
					<?php if(in_array('19_3',$admin_permissions)){?>


	
							<a title="Delete" href="?pid=19&action=deletebuilding&es_buldid=<?php echo $eachrecord->es_hostelbuldId; ?>" onclick="javascript: return confirm('Are you sure want to delete?');"><?php echo deleteIcon(); ?></a></td>						
                       

<?php } ?>		
							
						 </tr>
                         <?php   $rownum++; }	?>
                         <tr>
                            <td colspan="5" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>                        </td>
                         </tr>
                     
					  <?php
					    }else {?>
						<tr class="bgcolor_02">
                        <td width="18%" height="25" align="left">&nbsp;Buld No</td>
                        <td width="17%" align="left" >&nbsp;Building Name </td>						
                        <td width="17%" align="left" >&nbsp;Created on </td>		
                        <td width="14%" align="left" class="order">&nbsp;<strong>Action</strong></td>  
                      </tr>
					   <tr>
					       <td align='center' colspan="4" class='normal'>&nbsp;</td>
						 </tr>	
					 <tr>
					       <td align='center' colspan="4" class='normal'>No records found</td>
						 </tr>
						<?php } 
                       ?>
                    </table>
			  </td>
            <td width="1" class="bgcolor_02"></td>
          </tr>
          <tr>
            <td height="1" colspan="3" class="bgcolor_02"></td>
          </tr>
</table>

<?php }?>
<?php if($action=='editbuilding' ){ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
         <td height="3" colspan="3"></td>
	 </tr>
          <tr>
				<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Update Building </span>								                </td>
          </tr>
          <tr>
				<td class="bgcolor_02"></td>
				<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               			    <tr>
                  				<td colspan="4" valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
          					</tr>
          					<tr>
                 				<td align="left" valign="middle" class="narmal">&nbsp;Building Name </td>
                 				<td align="left" valign="middle" class="narmal">:</td>
							    <td valign="middle" class="narmal">
								<input name="buld_name" type="text" id="buld_name" value="<?php if(isset($buld_name) ){echo $buld_name ;} else{ echo $es_buldDetails[0]->buld_name;}?>" />
								 <?php if (isset($error_buld) &&$error_buld!=""){echo '<div class="error_message">' . $error_buld . '</div>';	}?>	<font color="#FF0000">*</font></td>
								 <td width="40%" align="left" valign="middle">&nbsp;</td>
            				</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>				
                			<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td width="39%" align="center" valign="middle"> <input name="updateb" type="submit" class="bgcolor_02" value="update" /> <input type="button" name="back" id="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" /> </td>
       				        </tr>
   				  </form>
       			  </table></td>
           			 <td class="bgcolor_02"></td>
  			</tr>
			<tr>
					<td class="bgcolor_02"></td>
					<td height="5" align="left" valign="top"></td>
					<td class="bgcolor_02"></td>
        	 </tr>
         	 <tr>
					<td width="1" height="10" class="bgcolor_02"></td>
					<td  align="left" valign="top">
				    </td>
                    <td width="1" class="bgcolor_02"></td>
          </tr>
          <tr>
            <td height="1" colspan="3" class="bgcolor_02"></td>
          </tr>
</table>
<?php } ?>

<?php if($action=='addroom'|| $action=='deleteroom'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
         <td height="3" colspan="3"></td>
	 </tr>
          <tr>
				<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Add Room </span></td>
          </tr>
          <tr>
				<td class="bgcolor_02"></td>
				<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="narmal">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               			     <tr>
                  				<td colspan="4" valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
          					 </tr>
							 <tr>
                 				<td align="left" valign="middle" class="narmal">&nbsp;Select Building </td>
                 				<td align="left" valign="middle" class="narmal">:</td>
						       <td valign="middle" class="narmal">
							  	<select name="es_buldname">
			<option value="">-Select-</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord[es_hostelbuldid];?>" <?php if($es_buldname==$eachrecord[es_hostelbuldid]){?> selected="selected" <?php } ?>><?php echo $eachrecord[buld_name] ;?></option>
			<?php } ?>
			</select>
						  	   &nbsp;<font color="#FF0000">*</font></td>
								 <td width="40%" align="left" valign="middle">&nbsp;</td>
            				</tr>
          					<tr>
                 				<td align="left" valign="middle" class="narmal">&nbsp;Room No </td>
                 				<td align="left" valign="middle" class="narmal">:</td>
							    <td valign="middle" class="narmal"><input type="text" name="room_no" value="<?php echo $room_no; ?>"/><?php if (isset($error_room) &&$error_room!=""){echo '<div class="error_message">' . $error_room . '</div>';	}?>	<font color="#FF0000">*</font></td>
								 <td width="40%" align="left" valign="middle">&nbsp;</td>
            				</tr>
                			<tr>
								  <td align="left" valign="middle" class="narmal">&nbsp;Room Type </td>
								  <td align="left" valign="middle" class="narmal">:</td>
							      <td valign="middle" class="narmal"><input type="text" name="room_type" value="<?php echo $room_type; ?>"/>
				  				<?php if (isset($error_type) &&$error_type!=""){echo '<div class="error_message">' . $error_type . '</div>';	}?>				  				  <font color="#FF0000">*</font></td>
                  				  <td align="left" valign="middle">&nbsp;</td>
       				       </tr>				
               			  
							<tr>
								  <td width="20%" align="left" valign="middle" class="narmal">&nbsp;Room Capacity                                  </td>
								  <td width="1%" align="left" valign="middle" class="narmal">:</td>
							      <td width="39%" valign="middle" class="narmal"><input type="text" name="room_capacity" value="<?php echo $room_capacity; ?>"/>
							     <?php if (isset($error_capacity) &&$error_capacity!=""){echo'<div class="error_message">' . $error_capacity . ' </div>';}?>  <font color="#FF0000">*</font></td>
								 <td align="left" valign="middle">&nbsp;</td>
                			</tr>	
							 <tr>
								  <td width="20%" align="left" valign="middle" class="narmal">&nbsp;Room Rate</td>
								  <td width="1%" align="left" valign="middle" class="narmal">:</td>
							      <td width="39%" valign="middle" class="narmal"><input type="text" name="room_rate" value="<?php echo $room_rate; ?>"/><font color="#FF0000">*</font></td>
								 <td align="left" valign="middle">&nbsp;</td>
                			</tr>			
							<tr>
								<td colspan="4">&nbsp;</td>
							</tr>				
                			<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td width="39%" align="left" valign="middle">
							  <?php if(in_array('19_4',$admin_permissions)){?>

  &nbsp;<input name="Submit" type="submit" class="bgcolor_02" value="Submit" />


<?php } ?>
							  </td>
							    <td>&nbsp;</td>
       				        </tr>
   				  </form>
       			  </table></td>
           			 <td class="bgcolor_02"></td>
  			 </tr>
        	 <tr>
					<td class="bgcolor_02"></td>
					<td height="5" align="left" valign="top"></td>
					<td class="bgcolor_02"></td>
        	  </tr>
         	  <tr>
					<td width="1" height="106" class="bgcolor_02"></td>
					<td  align="left" valign="top">
					<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" >
                      <?php if(count($es_roomList) > 0 ){ ?>
                      <tr class="bgcolor_02">					 
                        <td width="10%" height="25" align="left">&nbsp;Room No </td>
                        <td width="13%" align="left">&nbsp;Room type</td>						
                        <td width="10%" align="center">&nbsp;Capacity </td> 
						<td width="12%" align="center">&nbsp;Vacancy</td>
						<td width="12%" align="center">&nbsp;Rate</td>
						<td width="23%" align="left">&nbsp;Building Name</td>		
                        <td width="20%"  class="order" align="center">&nbsp;<strong>Action</strong></td>  
                      </tr>				  
					  
					       <?php 
								$rownum = 1;	
								foreach ($es_roomList as $eachrecord){
						        $zibracolor = ($rownum%2==0)?"even":"odd";
													
							?>
					  <tr class="<?php echo $zibracolor;?>">									
                        <td height="25" class="narmal" align="left">&nbsp;<?php echo $eachrecord['room_no']; ?></td>
                        <td class="narmal" align="left">&nbsp;<?php echo $eachrecord['room_type']; ?></td>
                        <td class="narmal" align="center">&nbsp;<?php echo $eachrecord['room_capacity']; ?> </td>
						<td class="narmal" align="center">&nbsp;<?php echo $eachrecord['room_vacancy']; ?> </td>
						<td class="narmal" align="center">&nbsp;Rs:<?php echo $eachrecord['room_rate']; ?> </td>
						<?php //Fetch the Bulding Name
							   $query = "SELECT * FROM `es_hostelbuld` WHERE `es_hostelbuldid` ='".$eachrecord['es_hostelbuldid']."' ";
							   $equery = mysql_query($query);
							   $bname = mysql_fetch_assoc($equery);
						?>
						<td class="narmal" align="left">&nbsp;<?php echo $bname['buld_name'];  ?> </td>						
                        <td align="center" class="narmal">
						<?php if(in_array('19_5',$admin_permissions)){?>
	<a title="Edit" href="?pid=19&action=editroom&es_roomid=<?php echo $eachrecord['es_hostelroomid']; ?>&build_name=<?php echo $bname['buld_name'];?>"><?php echo editIcon(); ?></a>
					
<?php } ?>
<?php if(in_array('19_6',$admin_permissions)){?>

	<a title="Delete" href="?pid=19&action=deleteroom&es_roomid=<?php echo $eachrecord['es_hostelroomid']; ?>"  onclick="javascript: return confirm('Are you sure want to delete?');"><?php echo deleteIcon(); ?></a>
					
<?php /*?><a title="issueitems" href="?pid=19&action=additems&es_roomid=<?php echo $eachrecord['es_hostelroomId']; ?>"><?php echo viewIcon(); ?> </a><?php */?></td>						
                      

<?php } ?>
						
						
						</tr>
					     <?php   $rownum++; }	?>
                     
                      <tr>
                        <td colspan="7" align="center" ><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>                        </td>
                      </tr>
                      <?php
					  
					 }else {?>
					  <tr class="bgcolor_02">					 
                        <td width="10%" height="25" align="left">&nbsp;Room No </td>
                        <td width="13%" align="left">&nbsp;Room type</td>						
                        <td width="10%" align="center">&nbsp;Capacity </td> 
						<td width="12%" align="center">&nbsp;Vacancy</td>
						<td width="12%" align="center">&nbsp;Rate</td>
						<td width="23%" align="left">&nbsp;Building Name</td>		
                        <td width="20%"  class="order" align="center">&nbsp;<strong>Action</strong></td>  
                      </tr>	
					    <tr>
					     <td align='center' colspan="7" class="normal">&nbsp;</td>
						   </tr>
					       <tr>
					     <td align='center' colspan="7" class="normal">No records found</td>
						   </tr>
					<?php } 
                     ?>
                    </table>
			   </td>
            <td width="1" class="bgcolor_02"></td>
          </tr>
          <tr>
            <td height="1" colspan="3" class="bgcolor_02"></td>
          </tr>
</table>
<?php }?>

<?php if($action=='editroom' ){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
         <td height="3" colspan="3"></td>
	 </tr>
          <tr>
				<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Add A Room </span></td>
          </tr>
          <tr>
				<td class="bgcolor_02"></td>
				<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">               			 
         	 				 <tr>
                  				<td colspan="4" valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
          					 </tr>
							 <tr>
                 				<td align="left" valign="middle" class="narmal">&nbsp;Building </td>
                 				<td align="left" valign="middle" class="narmal">:</td>
							    <td valign="middle" class="narmal">
								<?php echo ucwords($build_name) ;?></td>
								 <td width="40%" align="left" valign="middle">&nbsp;</td>
            				</tr>
          					<tr>
                 				<td align="left" valign="middle" class="narmal">&nbsp;Room no </td>
                 				<td align="left" valign="middle" class="narmal">:</td>
							    <td valign="middle" class="narmal">								 
								 <input name="room_no" type="text" id="room_no" value="<?php echo $es_roomDetails[0]->room_no;?>" />
								 <?php if (isset($error_room) &&$error_room!=""){echo '<div class="error_message">' . $error_room . '</div>';	}?>	<font color="#FF0000">*</font></td>
								 <td width="40%" align="left" valign="middle">&nbsp;</td>
            				</tr>
                			<tr>
								  <td align="left" valign="middle" class="narmal">&nbsp;Room Type </td>
								  <td align="left" valign="middle" class="narmal">:</td>
							      <td valign="middle" class="narmal">
								  <input name="room_type" type="text" id="room_type" value="<?php echo $es_roomDetails[0]->room_type;?>" />
				  				<?php if (isset($error_type) &&$error_type!=""){echo '<div class="error_message">' . $error_type . '</div>';	}?>				  				  <font color="#FF0000">*</font></td>
                  					<td align="left" valign="middle">&nbsp;</td>
       				        </tr>				
               				 <tr>
								  <td width="20%" align="left" valign="middle" class="narmal">&nbsp;Room Capacity                                  </td>
								  <td width="1%" align="left" valign="middle" class="narmal">:</td>
							      <td width="39%" valign="middle" class="narmal">
								  <input name="room_capacity" type="text" id="room_capacity" value="<?php echo $es_roomDetails[0]->room_capacity;?>" />								  
							     <?php if (isset($error_capacity) &&$error_capacity!=""){echo'<div class="error_message">' . $error_capacity . ' </div>';}?>  <font color="#FF0000">*</font></td>
                			</tr>
							 <tr>
								  <td width="20%" align="left" valign="middle" class="narmal">Room Rate                               </td>
								  <td width="1%" align="left" valign="middle" class="narmal">:</td>
							      <td width="39%" valign="middle" class="narmal">
								  <input name="room_rate" type="text" id="room_rate" value="<?php echo $es_roomDetails[0]->room_rate;?>" /><font color="#FF0000">*</font></td>
                			</tr>					
							<tr>
								<td>&nbsp;</td>
							</tr>				
                			<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td width="39%" align="center" valign="middle"> <input name="update" type="submit" class="bgcolor_02" value="update" /> <input type="button" name="back" id="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" /> </td>
       				    </tr>
   				  </form>
       			  </table></td>
           			 <td class="bgcolor_02"></td>
  			  </tr>
        	  <tr>
					<td class="bgcolor_02"></td>
					<td height="5" align="left" valign="top"></td>
					<td class="bgcolor_02"></td>
        	  </tr>
         	 <tr>
					<td width="1" height="10" class="bgcolor_02"></td>
					<td width="954" align="left" valign="top">
			        </td>
                    <td width="5" class="bgcolor_02"></td>
          </tr>
          <tr>
            <td height="1" colspan="3" class="bgcolor_02"></td>
          </tr>
</table>
<?php } ?>

<?php if($action=='additems') { ?>
<FORM action="" name="inv_orders" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> RoomItems </span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="450" align="left" valign="top">
					          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="64%" height="20" colspan="0" class="narmal"><strong>&nbsp;Room No: &nbsp;<?php echo $es_roomDetails->room_no;?></strong></td>
                                        <td width="36%" class="narmal" align="right"><strong>Room Type: &nbsp;<?php echo $es_roomDetails->room_type;?> </strong></td>
                                    </tr>
									<tr>
                                        <td height="20" colspan="3" class="narmal"><strong>&nbsp;</strong></td>
                                    </tr>
                                    <tr>
                                       <td height="20" colspan="3" class="narmal">
                                         <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                                          <tr class="bgcolor_02">
                                            <td width="6%"  height="20" align="center"><strong>S.No</strong></td>
                                            <td width="25%" height="25" align="center"><strong>Item Code</strong></td>                                            
                                            <td width="25%" align="center"><strong>Item Name</strong></td>
											<td width="25%" align="center"><strong>Item Type</strong></td>
                                            <td width="25%" align="center"><strong>Quantity</strong></td>
                                          </tr>
                                          <?php
                                               $cn = 1;
                                                                         
                                             if($Ord_itemList!="")
                                               {
                                                  foreach($Ord_itemList as $orIt)
                                                   {
                                            ?>
                                          <tr>
                                            <td align="center" ><?php echo $cn;?></td>
                                            <td align="center"  ><select name="select" id="select" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);" >                          <option value="">.....Select Item Code.....</option>
                                         <?php
                                         foreach($in_itemsList as $item)
                                         {
                                          if($item->es_in_item_masterId == $orIt['es_in_item_masterid'])
                                             $sel = "selected";
                                          else
                                             $sel = "";
                                          echo "<option value='$item->es_in_item_masterId' $sel>$item->in_item_code</option>";
                                         }
                                        ?>
                                        </select></td>
                                           <td align="center"><select name="hostel_itemname[<?php echo $cn;?>]" id="hostel_itemname[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);">
										                                        <option value="" >.....Select Item Name.....</option>
                                         <?php
                                         foreach($in_itemsList as $item)
                                         {
                                         if($item->es_in_item_masterId == $orIt['es_in_item_masterid'])
                                            $sel = "selected";
                                         else
                                            $sel = "";
                                         echo "<option value='$item->es_in_item_masterId' $sel>$item->in_item_name</option>";
                                          }
                                         ?>
                                         </select></td>
										<td class="narmal">
										<select name="hostel_itemtype[1]" id="hostel_itemtype[1]">
                                        <option value="Returnable">Returnable</option>
                                        <option value="Non-Returnable">Non-Returnable</option>
                                        </select></td>
                                        <td align="center"><input name="quantity[<?php echo $cn;?>]" id="quantity[<?php echo $cn;?>]" value="" style="width:97%;" onKeyup="isInteger(this.value)" /></td>
                                     </tr>
									<?php
										 $cn++;
										  }
										  }
										  else
										  {
									 ?>
                                      <tr>
                                        <td align="center" width="6">1</td>
                                        <td align="center"><select name="hostel_itemcode[1]" id="hostel_itemcode[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
                                        <option value="">.....Select Item Code.....</option>
                                       <?php
                                         foreach($in_itemsList as $item)
                                           {
                                            echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                           }
                                        ?>
                                       </select></td>
                                       <td align="center">
                                       <select name="hostel_itemname[1]" id="hostel_itemname[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
                                       <option value="">.....Select Item Name.....</option>
                                       <?php
                                       foreach($in_itemsList as $item)
                                        {
                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                        }
                                        ?>
                                       </select>                                       </td>
										<td class="narmal"><select name="hostel_itemtype[1]" id="hostel_itemtype[1]">
                                        <option value="Returnable">Returnable</option>
                                        <option value="Non-Returnable">Non-Returnable</option>
                                        </select></td>
									   <td align="center"><input name="hostel_itemqty[1]" id="hostel_itemqty[1]" value="" style="width:97%;" onKeyup="isInteger(this.value)"/></td>
                                     </tr>
                                       <?php } ?>
                                      </table>
                                      <div id="my_div"></div>                                    </td>
                                   </tr>
                                    <tr>
                                       <td height="20" colspan="3" align="right"><p><input type="button" name="addrow2" id="addrow2" class="bgcolor_02" value="Add More Row" onclick="changeIt('<?php echo $cn-1;?>')" />
&nbsp;&nbsp;
                                      <input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="DeleteRow('<?php if($Ord_itemList !="") echo $cn; else echo $cn+1;?>')"></p>
                                      </td>
									 </tr>
									 <tr>
                                          <td colspan="2" align="right"><p>
                                          <input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Add To Room" /> <input type="button" name="back" id="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" />              </p></td>
                                 </tr>
					    </table></td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table></FORM><?php } ?> 
  
  <?php if($action=='personitems') { 
  
  if($es_persontype=='student')
  {
  	$query="SELECT * FROM es_preadmission WHERE es_preadmissionid='".$es_pid."'";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	$name=$row['pre_name'];
	
  }
  elseif($es_persontype=='staff')
  {
 	 $query="SELECT * FROM es_staff WHERE es_staffid='".$es_pid."'";
 	$res=mysql_query($query);
	$row=mysql_fetch_array($res);
	$name=$row['st_firstname'].' '.$row['st_lastname'];
  }
  ?>
<FORM action="" name="inv_orders" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">		 
			  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin"> Person Items </span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>								  			 
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="450" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td height="20" colspan="2" class="narmal"><strong>Room No: <strong><?php echo $room_details['room_no'];?></strong></strong></td>
                    <td width="46%" class="narmal" align="right"><strong>Room Type:<strong><?php echo $room_details['room_type'];?></strong> </strong></td>
				  </tr>
				  <tr>
					 <td height="20" colspan="3" class="narmal"><strong>Person ID: <strong><?php echo $es_pid; ?></strong></strong></td>
                  </tr>
                   <tr>
					 <td height="20" colspan="3" class="narmal"><strong>Person Name: <strong><?php echo $name; ?></strong></strong></td>
                  </tr>
                  
                  
				  <tr>
				     <td height="20" colspan="3" class="narmal">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                                 <tr class="bgcolor_02">
                                     <td width="6%"  height="20" align="center"><strong>S.No</strong></td>
                                     <td width="25%" height="25" align="center"><strong>Item Code</strong></td>
                                     <td width="25%" height="25" align="center"><strong>Item Name</strong></td>
								     <td width="25%" align="center"><strong>Item Type</strong></td>
                                     <td width="25%" align="center"><strong>Quantity</strong></td>
                              </tr>
									<?php
										  $cn = 1;
										
										  
										  if($Ord_itemList!="")
										  {
												foreach($Ord_itemList as $orIt)
												{
									?>
                                  <tr>
                                     <td align="center" ><?php  echo $cn;?></td>
                                     <td align="center"  ><select name="hostel_itemcode[<?php echo $ocn;?>]" id="hostel_itemcode[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);" >
                                      <option value="">.....Select Item Code.....</option>
                                       <?php
                                      foreach($in_itemsList as $item)
                                       {
                                        if($item->es_in_item_masterId == $orIt['es_in_item_masterid'])
                                            $sel = "selected";
                                        else
                                            $sel = "";
                                        echo "<option value='$item->es_in_item_masterId' $sel>$item->in_item_code</option>";
                                       }
                                       ?>
                                       </select></td>
                                       <td align="center"><select name="hostel_itemname[<?php echo $cn;?>]" id="hostel_itemname[<?php echo $cn;?>]" style="width:100%;" onchange="javascript:onSelection(<?php echo $cn;?>,this.value);" onblur="javascript:onSelection(<?php echo $cn;?>,this.value);">
                                       <option value="" >.....Select Item Name.....</option>
                                     <?php
                                      foreach($in_itemsList as $item)
                                      {
                                         if($item->es_in_item_masterId == $orIt['es_in_item_masterid'])
                                             $sel = "selected";
                                         else
                                             $sel = "";
                                         echo "<option value='$item->es_in_item_masterId' $sel>$item->in_item_name</option>";
                                      }
                                     ?>
                                    </select></td>
									   <td class="narmal"><select name="hostel_itemtype[1]2" id="hostel_itemtype[1]2" style="width:100%">
                                         <option value="Returnable">Returnable</option>
                                         <option value="Non-Returnable">Non-Returnable</option>
                                       </select></td>
								    <td align="left" valign="middle"><input name="hostel_itemqty[1]2" id="hostel_itemqty[1]2" value="" style="width:90%;" onkeyup="isInteger(this.value)" /></td>
                                  </tr>
									<?php
										 $cn++;
										  }
										  }
										  else
										  {
									?>
                                   <tr>
                                      <td align="center" width="33">1</td>
                                      <td align="center"><select name="hostel_itemcode[1]" id="hostel_itemcode[1]"style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
                                     <option value="">.....Select Item Code.....</option>
                                     <?php
                                       foreach($in_itemsList as $item)
                                        {
                                          echo "<option value='$item->es_in_item_masterId'>$item->in_item_code</option>";
                                        }
                                      ?>
                                     </select></td>
                                     <td align="center">
                                     <select name="hostel_itemname[1]" id="hostel_itemname[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
                                     <option value="">.....Select Item Name.....</option>
                                      <?php
                                         foreach($in_itemsList as $item)
                                          {
                                            echo "<option value='$item->es_in_item_masterId'>$item->in_item_name</option>";
                                          }
                                       ?>
                                     </select>                                     </td>
									 <td class="narmal"><select name="hostel_itemtype[1]" id="hostel_itemtype[1]" style="width:100%">
                                     <option value="Returnable">Returnable</option>
                                     <option value="Non-Returnable">Non-Returnable</option>
                                     </select></td>
									 <td align="left" valign="middle"><input name="quantity[<?php echo $cn;?>]2" id="quantity[<?php echo $cn;?>]2" value="" style="width:100%;" onkeyup="isInteger(this.value)"/></td>
                                   </tr>
                                      <?php } ?>
                                </table>
                    <div id="my_div"></div>                              </td>
                          </tr>
                           <tr>
                               <td height="20" colspan="3" align="right"><p>
							   <?php if($Ord_itemList!=''){$x=$cn;}else{$x=$cn+1;}?>
							   <input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onclick="javascript:changeIt(<?php echo $cn-1;?>)" />&nbsp;&nbsp;
                                <input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="javascript:DeleteRow(<?php echo $x;?>)"></p>
                               </td>
							</tr>
							<tr>
							    <td colspan="2" align="right">
								<input type="hidden" name="raid" value="<?php echo $raid;?>" />
                                <p><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Add To Person" />
                                <input type="button" name="back" id="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" />
                                </p></td>
                               </tr>
						</table></td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table></FORM><?php } ?>
  
  <?php if($action=='student_roomallotment') { ?>

  			<form action="" method="post" name="roomalocform" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Room Allocation to a Person </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="4" align="left" valign="top">&nbsp;</td>
                  </tr>                 
				  <tr>
                    <td width="33%" align="left" valign="top" class="narmal">&nbsp;Select Building                
                      <select name="es_buldname123" onchange="JavaScript:document.roomalocform.submit();" >
			<option value="">-Select-</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord[es_hostelbuldid];?>" <?php echo ($eachrecord[es_hostelbuldid]==$es_buldname123)?"selected":""?>  ><?php echo $eachrecord[buld_name];?></option>
			<?php } ?>
			</select></td>
			
					  <td width="32%" align="left" valign="top" class="narmal">&nbsp;Select Room No                    
					    <select name="selectroom" onchange="JavaScript:document.roomalocform.submit();">
                          <option value="select" >Select</option>
                          <?php if(count($es_roomList) > 0 ){
					   foreach ($es_roomList as $eachrecord){ ?>
					     <option value="<?php echo $eachrecord->es_hostelroomId;?>" <?php echo ($eachrecord->es_hostelroomId==$selectroom)?"selected":""?>  ><?php echo $eachrecord->room_no;?></option>
					<?php    } }?>
                    </select></td>
					<td width="27%" align="left" valign="top">&nbsp;</td>
                  </tr>
				  <tr>
				     <td>&nbsp;</td>
				  </tr>
				<?php if($selectroom!=0 && isset($es_buldname123)){ ?>
				    
				  <tr>
                    <td width="33%" align="left" valign="top" class="narmal">&nbsp;</td>
                    <td width="32%" align="right" valign="middle" class="narmal"><?php if(isset($selectroom) && $selectroom!='')
{   if (count($errormessage)==0){	?> &nbsp;Room Type : 
                    <?php } }?></td>
                    <td width="27%" align="left" valign="middle" class="narmal"><?php if(isset($selectroom) && $selectroom!='')
{   if (count($errormessage)==0){	?><?php echo $es_roomDetails->room_type;?><?php } }?></td>
                    <td width="8%" align="left" valign="top">&nbsp;</td>
                  </tr>				  
				    <tr>
                    <td width="33%" align="left" valign="top" class="narmal">&nbsp;</td>
                    <td width="32%" align="right" valign="middle" class="narmal"><?php if(isset($selectroom) && $selectroom!='')
{ if (count($errormessage)==0){?>&nbsp;Room Capacity  :<?php } }?></td>
                    <td width="27%" align="left" valign="middle" class="narmal"><?php if(isset($selectroom) && $selectroom!='')
{   if (count($errormessage)==0){	?><?php echo $es_roomDetails->room_capacity;?><?php    } }?> </td>
                    <td width="8%" align="left" valign="top">&nbsp;</td>
                  </tr> 
				   <tr>
                    <td width="33%" align="left" valign="top" class="narmal">&nbsp;</td>
                    <td width="32%" align="right" valign="middle" class="narmal"><?php if(isset($selectroom) && $selectroom!='')
{ if (count($errormessage)==0){ ?>&nbsp;Room No  :<?php } }?></td>
                    <td width="27%" align="left" valign="middle" class="narmal"><?php if(isset($selectroom) && $selectroom!='')
{   if (count($errormessage)==0){	?><?php echo $es_roomDetails->room_no;?><?php    } }?>
                     <input type="hidden" name="studentroomid" value="<?php echo $es_roomDetails->es_hostelroomId;?>" /></td>
                    <td width="8%" align="left" valign="top">&nbsp;</td>
                  </tr> 
				  
                  <tr>
                    <td colspan="4" align="left" valign="top">
                      <?php if(isset($selectroom) && $selectroom!='') {
					  if (count($errormessage)==0){	
					   ?>
                    
                       <ul><b><u>NOTE:</u></b>
				<li>Students/Staff who are displayed in Red are Transferred/Ex Staff.</li>
				
			</ul>

                
					
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php 
					 $alloted_students = count($allotedstudentlist);
					  $available_rooms = $es_roomDetails->room_capacity-$alloted_students;
					  $i=0;
					if($available_rooms == 0) { ?> 
						<tr height="25">
						<td colspan="8" class="adminfont" align="center">This room is filled</td>
						</tr>
						<?php } ?>
                      <tr>
                        <td width="4%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
						<td width="8%" height="25" align="center" class="bgcolor_02"><strong>Person Type</strong></td> 
						<td width="11%" class="bgcolor_02" align="center"><strong>RegNo / Emp No</strong></td>
                        
						<td width="21%" align="center" valign="middle" class="bgcolor_02"><strong>Name</strong></td> 
						<td width="13%" align="center" valign="middle" class="bgcolor_02"><strong>Allocated On</strong></td> 
						<td width="17%" align="center" valign="middle" class="bgcolor_02"><strong>Dep/Class</strong></td>                    
                        <td width="10%" align="center" valign="middle" class="bgcolor_02"><strong>&nbsp;&nbsp;Action</strong></td>
                      </tr>
					  <?php						 
					  foreach($allotedstudentlist as $eachrecord)
					  { 
					  if($eachrecord->es_persontype == 'student')
					  {
					  $stud_details = get_studentdetails($eachrecord->es_personid);
					  }
					  if($eachrecord->es_persontype == 'staff')
					  {
					   $staff_details = get_staffdetails($eachrecord->es_personid);					  
					  }
					  
					  $zibracolor = ($i%2==0)?"even":"odd";
					  ?>
					   <tr class="<?php echo $zibracolor;?>">
                        <td align="center" valign="top" class="narmal"><?php echo ++$i ; ?></td>
						<td align="center" valign="top" class="narmal"><?php echo $eachrecord->es_persontype;?></td>
                        
                        
   <?php    
                         if($eachrecord->es_persontype == 'student')
  {
  	                   
     $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='". $eachrecord->es_personid."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
?>

                        <td align="center" valign="top" class="narmal"><?php echo $eachrecord->es_personid;?></td>
 <?php }else{?>
 
  			<td align="center" bgcolor="#FF0000" valign="top" class="narmal"><?php echo $eachrecord->es_personid;?></td>
           
	<?php
  }
  }
  elseif($eachrecord->es_persontype == 'staff')
  {
	 $query_trasfor="SELECT * FROM es_staff WHERE es_staffid='".$eachrecord->es_personid."' AND tcstatus!='notissued'";
  	$trans=sqlnumber($query_trasfor);
	if($trans==0){
  ?>
 	  <td align="center" valign="top" class="narmal"><?php echo $eachrecord->es_personid;?></td>
 <?php }else{?>
 
  			<td align="center" bgcolor="#FF0000" valign="top" class="narmal"><?php echo $eachrecord->es_personid;?></td>
 <?php }
 }?>                
                        
       
            
            
            
            
            

						<td align="center" valign="top" class="narmal"><?php  if($eachrecord->es_persontype == 'student')
					  { echo $stud_details['pre_name'];}
					   if($eachrecord->es_persontype == 'staff')
					  {
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?></td>
					   <td align="center" valign="top" class="narmal"><?php if($eachrecord->alloted_date!="" && $eachrecord->alloted_date!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord->alloted_date);} ?></td>
					    <td align="center" valign="top" class="narmal"><?php  if($eachrecord->es_persontype == 'student')
					  { echo classname($stud_details['pre_class']); }
					   if($eachrecord->es_persontype == 'staff')
					  {
					   echo deptname($staff_details['st_department']);
					  }
					  ?></td>  
					                                   
                      <td align="left" valign="top" class="narmal">
					 <?php if(in_array('19_12',$admin_permissions)){?>

  <a href="?pid=19&action=personitems&es_pid=<?php echo $eachrecord->es_personid;?>&es_persontype=<?php echo $eachrecord->es_persontype;?>&raid=<?php echo $eachrecord->es_roomallotmentId; ?>">Issue Items</a>
					  
					   <br /> 


<?php } ?> <?php if(in_array('19_13',$admin_permissions)){?>


 <a href="?pid=19&action=Health_record&es_pid=<?php echo $eachrecord->es_personid;?>&es_persontype=<?php echo $eachrecord->es_persontype;?>">Health&nbsp;Record</a> <br /> 
						

<?php } ?>
					
               <?php if(in_array('19_14',$admin_permissions)){?>
 <a href="?pid=19&action=deallocate_room&es_pid=<?php echo $eachrecord->es_personid;?>&es_persontype=<?php echo $eachrecord->es_persontype;?>&raid=<?php echo $eachrecord->es_hostelroomid; ?>&ralotid=<?php echo $eachrecord->es_roomallotmentId; ?>">De-allocate</a>
<?php } ?>        
						
				<?php if(in_array('19_15',$admin_permissions)){?>		
						<a href="?pid=19&amp;action=Report&amp;raid=<?php echo $eachrecord->es_roomallotmentId; ?>&es_buldname123=<?php echo $es_buldname123;?>&selectroom=<?php echo $selectroom;?>">Report </a> <br />
                <?php } ?>        
				    
					
					   </td>
                      </tr>
					  <? }				 
					  for($i=0;$i<$available_rooms;$i++) { ?>
					  
                      <tr>
                        <td class="narmal"><?php echo $alloted_students+$i+1; ?></td>
						<td class="narmal"><select name="persontype[]">
						<option value="student">Student</option>
						<option value="staff">Staff</option>
						</select></td>
						<td class="narmal"><input name="personid[<?php echo $i;?>]" id="personid[<?php echo $i;?>]" type="text" size="7" /></td>
						<td class="narmal" colspan="2" align="center"><input name="allocate_date_<?php echo $i;?>" id="allocate_date_<?php echo $i;?>" type="text" size="10" /><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.roomalocform.allocate_date_<?php echo $i;?>);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
						<td colspan="3" align="center" valign="middle" class="narmal">Assign Person to this room</td>
                      </tr>
					  <?php } ?> 
                    </table>
					
                    <?php } } ?> </td>
                  </tr>
				  	<?php if(isset($selectroom) && $selectroom!='') { 
					if (count($errormessage)==0){	
					?>	
						<?php if($available_rooms != 0) { ?> 				
				  <tr>
                    <td colspan="4" align="center" >
					<?php if(in_array('19_7',$admin_permissions)){?>

<input name="Submit" type="submit" class="bgcolor_02" value="Submit" onclick="return validate_date()" />    


<?php } ?>
					     </td>
					
                  </tr>
				  <?php } else {?>
				  <tr>
                    <td colspan="4" align="center" ><input type="button" name="back" id="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" />        </td>
					
                  </tr>
				  <?php } }?>
				  	<?php } } ?>
					<tr>
                    <td colspan="4" align="center" >&nbsp;        </td>
					
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
</form>
  <script language="javascript" type="text/javascript">
  function validate_date(){
        
		if(document.getElementById("personid[0]").value ==""){
			alert("Please Enter Student / staff Reg.No");
			return false;
		}
  		<?php for($i=0;$i<$available_rooms;$i++) {?>
		
		if(document.getElementById("personid[<?php echo $i;?>]").value !=""){
		if(document.getElementById("allocate_date_<?php echo $i;?>").value ==""){
			alert("Please Select Date");
			return false;
		}
		}
		<?php }?>
  
  }
  </script>
<?php } ?>


<?php if($action=='buildreport'){ ?>

<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Rooms Availability</strong></span></td>
              </tr>
			   <tr>
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
								 <td class="bgcolor_02"></td>
          					 </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="" method="post" name="build_report" id="build_report" >
					  <tr>								  
                         <td width="17%" class="narmal">Select Building</td>
                         <td width="83%" class="narmal"><select name="es_buldname" ><option value="">-Select-</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['buld_name'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select><font color="#FF0000">*</font></td>
                      </tr>		
				     <tr>								  
                         <td>&nbsp;</td>
					     <td>&nbsp;</td>                    
                      </tr>				  
				     <tr>				
					  <td align="right"></td>
					     <td align="left">&nbsp;<input type="submit" name="submit" value="Search" class="bgcolor_02" /></td>
				    </tr>
					<tr>
					     <td>&nbsp;</td>
						 <td>&nbsp;</td>
					</tr>
					</form> 
				</table></td>
                  </tr>
                  <?php if (count($es_roomList1)>0) { ?>
				  <tr>
                    <td height="25" align="left" valign="middle" width="100%">Buiding Name  :  <b><?php 
					$query = "SELECT * FROM `es_hostelbuld` WHERE `es_hostelbuldid` ='".$es_buldname."' ";
							   $equery = mysql_query($query);
							   $bname_aaa = mysql_fetch_assoc($equery);
					echo strtoupper($bname_aaa['buld_name']);?></b>
                      </td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="middle" width="100%"><table width="100%" height="47" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
						
					  <tr class="bgcolor_02">
                        <td height="18" align="left" valign="middle" ><strong>&nbsp;S.No</strong></td>
                        <td height="25" align="left" valign="middle"><strong>&nbsp;Room No</strong></td>
                        <td  align="left" valign="middle"><strong>&nbsp;Room type</strong></td>
                        <td align="left" valign="middle"><strong>&nbsp;Capacity</strong></td>
						<td  align="left" valign="middle"><strong>&nbsp;Vacancy</strong></td>
						<td  align="left" valign="middle"><strong>&nbsp;Rate</strong></td>
                      </tr>
<?php						
		 $rw = 1;
         $slno = $start+1;
foreach ($es_roomList1 as $eachrecord)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
	
?>                   <tr class="<?php echo $rowclass;?>">
                        <td height="20" align="left" class="narmal">&nbsp;<?php echo $slno;?></td>
                        <td align="left" class="narmal">&nbsp;<?php echo $eachrecord->room_no; ?></td>
						<td align="left" class="narmal">&nbsp;<?php echo $eachrecord->room_type; ?></td>
						<td align="left" valign="middle" class="narmal">&nbsp;<?php echo $eachrecord->room_capacity;?></td>
						<td align="left" class="narmal">&nbsp;<?php echo $eachrecord->room_vacancy; ?></td>
						<td align="left" class="narmal">&nbsp;Rs:<?php echo $eachrecord->room_rate; ?></td>
					</tr>
<?php                  
					  $rw++;
                      $slno++;
				 }
?>   <tr>
			<td colspan="6" align="center" class="narmal"><?php  paginateexte($start, $q_limit, $no_rows, "action=buildreport");?></td>
		  </tr>

				  </table>
                      <table width="100%" height="33" border="0">
					  
					   <tr>
<td align="center" valign="middle">
<?php if(in_array('19_11',$admin_permissions)){?>
<input name="submit" type="submit" onClick="newWindowOpen('?pid=19&action=printreport<?php echo $buildUrl;?>');" class="bgcolor_02" value="print" />
<?php } ?>

</td>
</tr>
<?php 
}
 elseif($cnt_rec_atnd == 0  && $submit == 'Search') {
						echo "<tr class='bgcolor_02'>
								<td height='20' align='center' colspan='7' class='narmal'><b>No Data Found for this Search</b></td>
							</tr>
							<tr>
								<td height='20' ></td>
							</tr>";
					}
?>
					  </table></td>
                  </tr>
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
        
		    </table>

<?PHP }?>
  <?php if($action=='printreport') {
  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelroom','HOSTEL','ROOM AVAILABILITY','".$es_roomid."','ROOM AVAILABILITY PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
   ?>

<form action="" method="post" name="printreport">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Rooms Availability </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                 
                    <td colspan="4" align="left" valign="top">&nbsp;</td>
                  </tr>
				   <tr>
				<td>&nbsp;</td>
				</tr>
				<tr>
                    <td height="25" align="left" valign="middle" width="100%">Buiding Name  :  <b><?php 
					$query = "SELECT * FROM `es_hostelbuld` WHERE `es_hostelbuldid` ='".$es_buldname."' ";
							   $equery = mysql_query($query);
							   $bname_aaa = mysql_fetch_assoc($equery);
					echo strtoupper($bname_aaa['buld_name']);?></b>
                      </td>
                  </tr>				  
                  <tr>
                    <td colspan="4" align="left" valign="top">
					
					  <table width="97%" border="0" cellspacing="0" cellpadding="0">	
                      <tr>
					   
                        <td width="10%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
						<td width="15%" height="25" align="center" class="bgcolor_02">Room No</td> 
						<td width="16%" class="bgcolor_02" align="center">Room type</td>
                        
						<td width="16%" class="bgcolor_02" align="center">Capacity</td> 
						<td width="16%" class="bgcolor_02" align="center">Vacancy</td>  
						<td width="16%" class="bgcolor_02" align="center">Rate</td>                   
                      </tr>
					  
			<?php						
		 $rw = 1;
         $slno = $start+1;
foreach ($es_roomList1 as $eachrecord)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
	
?>                   <tr class="<?php echo $rowclass;?>">
                        <td align="center" class="narmal"><?php echo $slno;?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord->room_no; ?></td>
						<td align="center" class="narmal"><?php echo $eachrecord->room_type; ?></td>
						<td align="center" class="narmal"><?php echo $eachrecord->room_capacity;?></td>
						<td align="center" class="narmal"><?php echo $eachrecord->room_vacancy; ?></td>
						<td align="center" class="narmal">Rs:<?php echo $eachrecord->room_rate; ?></td>
					</tr>
<?php                  
					  $rw++;
                      $slno++;
				 }
?>
				  
			   </table>
			      </td>
                  </tr>				  
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>	
</form>
<?php } ?>

  <?php if($action=='Health_record') { ?>
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Health Record </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="21%" class="narmal">&nbsp;</td>
                    <td width="2%" class="narmal">&nbsp;</td>
                    <td width="77%" class="narmal">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                 </tr>
                  <tr>
                    <td class="narmal">Reg No/Emp No</td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"> <input type="text" name="health_regno" value="<?php echo $es_pid?>" readonly="readonly" /><font color="#FF0000">*</font></td>
                  </tr>
				  
				    <tr>
                    <td class="narmal">Person Type</td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><input type="text" name="es_persontype" value="<?php echo $es_persontype?>" readonly="readonly" /><font color="#FF0000">*</font></td>
                  </tr>
                  <tr>
                    <td class="narmal">Name </td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><input type="text" name="health_name" value="<?php echo $prsn_name;?>" readonly="readonly" /><font color="#FF0000">*</font></td>
                  </tr>
                  <tr>
                    <td class="narmal"><?php echo $prsn_fld_txt;?></td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal">
					<input type="hidden" name="health_class" value="<?php echo $prsn_dpt_cls;?>" />
					<input type="text" name="" value="<?php echo $prsn_dpt_cls;?>" readonly="readonly" /><font color="#FF0000">*</font></td>
                  </tr>
                  <tr>
                    <td class="narmal">Problem Defination </td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><textarea name="health_problem" cols="16" ><?php echo $health_problem; ?></textarea><font color="#FF0000">*</font></td>
                  </tr>
                  <tr>
                    <td class="narmal"><p>Ref. Doctor Name </p></td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><input type="text" name="health_doctorname" value="<?php echo $health_doctorname; ?>"/><font color="#FF0000">*</font></td>
                  </tr>
                  <tr>
                    <td class="narmal">Address</td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><textarea name="health_address" cols="16"><?php echo $health_address;?></textarea></td>
                  </tr>
                  <tr>
                    <td class="narmal">Contact No </td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><input type="text" name="health_contactno" value="<?php echo $health_contactno; ?>"/></td>
                  </tr>
				  <tr>
                    <td class="narmal">Doctors Prescription </td>
                    <td align="center" class="narmal">:</td>
                    <td class="narmal"><textarea name="health_prescription" cols="16"><?php echo $health_prescription; ?></textarea></td>
                  </tr>
                  <tr>
                    <td class="narmal">
                    <td align="center" class="narmal">&nbsp;</td>
                    <td height="30" class="narmal"><input name="Submit" type="submit" class="bgcolor_02" value="Add" />
                    <input type="button" name="back" id="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" /></td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
</form>
<?php } ?>
				
<?php if($action=='Report') {



?>				
				
<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Record  </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="88%">					
					<table width="100%" border="0" cellspacing="5" cellpadding="0">
                    
                        <tr>
                          <td width="17%" align="left" valign="top" class="narmal">Room No</td>
                          <td width="17%" align="left" valign="top" class="narmal"><input name="textfield2222" type="text" size="15" value="<?php echo $room_details['room_no'];?>" readonly="" /></td>
                          <td width="20%" align="left" valign="top" class="narmal">&nbsp;&nbsp;Room Type </td>
                          <td width="17%" align="left" valign="top" class="narmal"><input name="textfield2223" type="text" size="15" value="<?php echo $room_details['room_type'];?>" readonly=""/></td>
                          <td width="29%" align="left" valign="top">&nbsp;</td>
                        </tr>
						
                        <tr>
                          <td align="left" valign="top" class="narmal">Reg No</td>
                          <td align="left" valign="top" class="narmal"><input name="textfield2222" type="text" size="15" value="<?php echo $rommallotdetails['es_personid']; ?>" readonly=""/></td>
                          <td width="20%" align="left" valign="top" class="narmal">&nbsp; Name </td>
                          <td width="17%" align="left" valign="top" class="narmal"><input name="textfield2224" type="text" size="15" value="<?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo $stud_details['pre_name']; } if($rommallotdetails['es_persontype'] == 'staff')
					  { echo $staff_details['st_firstname']." ".$staff_details['st_lastname'] ;}?>" readonly="" /></td>
                          <td width="29%" align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" class="narmal">Person type </td>
                          <td align="left" valign="top" class="narmal"><input name="textfield22222" type="text" size="15" value="<?php echo $rommallotdetails['es_persontype']; ?>" readonly=""/></td>
                          <td width="20%" align="left" valign="top" class="narmal">&nbsp; <?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo "Class"; }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo "Department";}?></td>
                          <td width="17%" align="left" valign="top" class="narmal"><input name="textfield2224" type="text" value="<?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo classname($stud_details['pre_class']); }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo deptname($staff_details['st_department']);}?>" size="15"  readonly=""/></td>
                          <td width="29%" align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="40" colspan="5" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;Item Issued </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="24%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="32%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="20%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="17%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
                        </tr>
						<?php 
						if(count($es_roomDetails)>0){
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal" align="center"><?php echo ++$i;?></td>
                          <td class="narmal" ><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal" ><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal" ><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal" ><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
                        </tr>
						<?php } } else {?>   
						
						<tr>
                          <td class="narmal" colspan="5" align="center" height="40">No records found</td>
                        </tr> 
						<?php }?>                   
                    </table></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="adminfont">&nbsp;&nbsp;Health Record </span></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr class="bgcolor_02">
						   <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="23%" height="25" class="bgcolor_02"><strong>&nbsp;&nbsp;Problem Defiction </strong></td>
                          <td width="29%" class="bgcolor_02" ><strong> &nbsp;&nbsp;Ref Doctor </strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;Prescription </strong><strong>&nbsp;&nbsp;</strong></td>
						  <td width="29%" class="bgcolor_02"><strong>&nbsp;CreatedOn </strong><strong>&nbsp;&nbsp;</strong></td>
                        </tr>
						
						<?php 
						$i=0;
						if(count($es_roomDetail)>0){
						foreach($es_roomDetail as $eachrecord) { ?>
                        <tr>
						 <td class="narmal" align="center"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_problem;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_doctorname;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_prescription;?></td>
						   <td class="narmal"><?php echo displaydate($eachrecord->es_createdon);?></td>
                        </tr>
                  
							<?php  } } else { ?> 
							
							<tr>
                          <td class="narmal" colspan="5" align="center" valign="middle" height="40">No records found</td>
                        </tr>
						<?php }?>  
                    </table></td>
                  </tr>
				  <tr>
				  <td>&nbsp; </td>
				  </tr>
				   <tr>
                          <td height="25" align="center" valign="top">
						  <input type="hidden" name="es_buldname123" value="<?php echo $es_buldname123;?>" />
						  <input type="hidden" name="selectroom" value="<?php echo $selectroom?>" />
                          <input name="back" id="back" type="submit" class="bgcolor_02" value="Back" style="cursor:pointer"/>
                          &nbsp;&nbsp;<input name="Submit" type="button" onclick="newWindowOpen ('?pid=19&action=printviewrecord<?php echo $ridurl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer"/> 
                          &nbsp;&nbsp;</td>
                  </tr>                 
                </table></td>                                            

                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
</form>
<?php } ?>

<?php if($action=='printviewrecord') { ?>		

<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" align="center"><strong>&nbsp;&nbsp;Hostel  Record   </strong></td>
              </tr>
			 
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="88%"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" class="narmal"><strong>Reg No</strong></td>
					
                        <td align="left" valign="top" class="narmal"><?php echo $rommallotdetails['es_personid']; ?></td>
                        <td width="17%" align="left" valign="top" class="narmal"><strong>Room Type</strong></td>
                        <td width="26%" align="left" valign="top" class="narmal"><?php echo $room_details['room_type'];?></td>
                       
                      </tr>
                      <tr>
                        <td width="26%" align="left" valign="top" class="narmal"><strong>Name</strong> </td>
                        <td width="22%" align="left" valign="top" class="narmal"><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo $stud_details['pre_name']; } if($rommallotdetails['es_persontype'] == 'staff')
					  { echo $staff_details['st_firstname']." ".$staff_details['st_lastname'] ;}?></td>
                        <td width="17%" align="left" valign="top" class="narmal"><strong>Room No</strong></td>
                        <td width="26%" align="left" valign="top" class="narmal"><?php echo $room_details['room_no'];?></td>
                       
                      </tr>
                      <tr>
                        <td height="24" align="left" valign="top" class="narmal"><strong>Person type </strong></td>
                        <td align="left" valign="top" class="narmal"><?php echo $rommallotdetails['es_persontype']; ?> </td>
                        
                        <td width="17%" align="left" valign="top"><strong><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo "Class"; }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo "Department";}?></strong></td>
						 <td width="26%" align="left" valign="top"><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo classname($stud_details['pre_class']); }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo deptname($staff_details['st_department']);}?></td>
					
                      </tr>
                   
				      <tr>
                        <td height="40" colspan="5" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="24%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="32%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="16%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="21%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
                        </tr>
						<?php 
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
                        </tr>
						<?php } ?>                       
                    </table></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="adminfont">&nbsp;&nbsp;<strong>Health Record </strong> </span></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr class="bgcolor_02">
						  <td width="8%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="23%" height="20" class="bgcolor_02"><strong>&nbsp;&nbsp;Problem Defiction </strong></td>
                          <td width="25%" class="bgcolor_02"><strong> &nbsp;&nbsp;Ref Doctor </strong></td>
                          <td width="20%" class="bgcolor_02"><strong>&nbsp;Prescription </strong></td>
						  <td width="24%" class="bgcolor_02"><strong>&nbsp;CreatedOn </strong></td>
                        </tr>
						
						<?php 
						$i=0;
						foreach($es_roomDetail as $eachrecord) { ?>
                        <tr>
						        <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_problem;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_doctorname;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_prescription;?></td>
						     <td class="narmal"><?php echo displaydate($eachrecord->es_createdon);?></td>
                        </tr>
                  
							<?php  } ?>  
                    </table></td>
                  </tr>
				  <tr>
				  <td>&nbsp; </td>
				  </tr>
				 </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
</form>
<?php } ?>
<?php if($action=='deallocate_room') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Room  De-Allocation</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Buidling Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucfirst($room_det['buld_name']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($room_det['room_no']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($es_persontype);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Registration No</td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo $es_pid;?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Name</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php  if($es_persontype == 'student')
					  { 
					    $stud_details = get_studentdetails($es_pid);
					  echo $stud_details['pre_name'];}
					   if($es_persontype == 'staff')
					  {
					   $staff_details = get_staffdetails($es_pid);
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Allocate On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							  $date_det = "SELECT * FROM es_roomallotment WHERE es_roomallotmentid =".$ralotid." AND status ='allocated' ";
							  $date_rs = $db->getrow($date_det);
							  echo func_date_conversion("Y-m-d","d/m/Y",$date_rs['alloted_date']);?></td>
							</tr>
													
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">De-allocate Date</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><input name="deallocate_date" id="deallocate_date" type="text" size="15" readonly="readonly" /><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.de_allocate_room_form.deallocate_date);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
							</tr>
							<tr>
							     <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle">
								<input type="hidden" name="raid" value="<?php echo $raid;?>" />
								<input type="hidden" name="ralotid" value="<?php echo $ralotid;?>" />
								<input type="hidden" name="allocated_date" value="<?php echo $date_rs['alloted_date'];?>" />
								<input type="submit" name="de_allocate" value="De-Allocate" class="bgcolor_02" /></td>
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
<?php } ?>
<?php if($action=='prepare_bill'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Prepare Hostel Bills</strong></span></td>
              </tr>
			   <tr>
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
								 <td class="bgcolor_02"></td>
          					 </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="" method="post" name="prepare_bill" id="prepare_bill" >
					  <tr>								  
                         <td width="23%" class="narmal">Select Building</td>
                         <td width="77%" class="narmal"><select name="es_buldname"><option value="">-Select-</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select><font color="#FF0000">*</font></td>
                      </tr>
					  <tr class="narmal">
			
			<td align="left" class="narmal" width="23%">Select Year            </td>
			<td align="left" class="narmal" width="77%"><select name="selyear">
			  <option <?php if($selyear==2006) { echo "selected='selected'"; } ?> value="2006">2006</option>
			  <option <?php if($selyear==2007) { echo "selected='selected'"; } ?> value="2007">2007</option>
              <option <?php if($selyear==2008) { echo "selected='selected'"; } ?> value="2008">2008</option>
              <option <?php if($selyear==2009) { echo "selected='selected'"; } ?> value="2009">2009</option>
              <option <?php if($selyear==2010) { echo "selected='selected'"; } ?> value="2010">2010</option>
              <option <?php if($selyear==2011) { echo "selected='selected'"; } ?> value="2011">2011</option>
              <option <?php if($selyear==2012) { echo "selected='selected'"; } ?> value="2012">2012</option>
              <option <?php if($selyear==2013) { echo "selected='selected'"; } ?> value="2013">2013</option>
              <option <?php if($selyear==2014) { echo "selected='selected'"; } ?> value="2014">2014</option>
              <option <?php if($selyear==2015) { echo "selected='selected'"; } ?> value="2015">2015</option>
              <option <?php if($selyear==2016) { echo "selected='selected'"; } ?> value="2016">2016</option>
              <option <?php if($selyear==2017) { echo "selected='selected'"; } ?> value="2017">2017</option>
              <option <?php if($selyear==2018) { echo "selected='selected'"; } ?> value="2018">2018</option>
            </select></td>
			
		  </tr>	
		   <tr>								  
                         <td align="left" class="narmal" width="23%">Select Month</td>
			<td align="left" class="narmal" width="77%"><select name="selmonth" >
              <option <?php if($selmonth=='01') { echo "selected='selected'"; } ?> value="01">January</option>
			  <option <?php if($selmonth=='02') { echo "selected='selected'"; } ?> value="02">Febuary</option>
			  <option <?php if($selmonth=='03') { echo "selected='selected'"; } ?> value="03">March</option>
			  <option <?php if($selmonth=='04') { echo "selected='selected'"; } ?> value="04">April</option>
			  <option <?php if($selmonth=='05') { echo "selected='selected'"; } ?> value="05">May</option>
			  <option <?php if($selmonth=='06') { echo "selected='selected'"; } ?> value="06">June</option>
			  <option <?php if($selmonth=='07') { echo "selected='selected'"; } ?> value="07">July</option>
			  <option <?php if($selmonth=='08') { echo "selected='selected'"; } ?> value="08">August</option>
			  <option <?php if($selmonth=='09') { echo "selected='selected'"; } ?> value="09">September</option>
			  <option <?php if($selmonth=='10') { echo "selected='selected'"; } ?> value="10">October</option>
			  <option <?php if($selmonth=='11') { echo "selected='selected'"; } ?> value="11">November</option>
			  <option <?php if($selmonth=='12') { echo "selected='selected'"; } ?> value="12">December</option>
            </select></td>                    
                      </tr>		
				     <tr>								  
                         <td>&nbsp;</td>
					     <td>&nbsp;</td>                    
                      </tr>				  
				     <tr>				
					  <td align="right"></td>
					     <td align="left">
					<?php if(in_array('19_9',$admin_permissions)){?>
 &nbsp;<input type="submit" name="preparebill" value="Submit" class="bgcolor_02" />
<?php } ?>	 
						 
						</td>
				    </tr>
					<tr>
					     <td>&nbsp;</td>
						 <td>&nbsp;</td>
					</tr>
					</form> 
				</table></td>
                  </tr>
				
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
        
		    </table>
<?php }?>
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
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.de_allocate_room_form.eq_paymode.value;
				if (ch=='cash'){
					document.getElementById("patiddivdisp").style.display="none";
				}else{
				document.getElementById("patiddivdisp").style.display="block";
				}
			}		  
</script>
<?php if($action=='viewdetails'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Hostel Charges Details</strong></span></td>
              </tr>
			   <tr>
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="right"></td>
								 <td class="bgcolor_02"></td>
          					 </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="?pid=19&action=viewdetails" method="post" name="prepare_bill" id="prepare_bill" >
					  <tr>								  
                         <td width="23%" class="narmal">Select Building</td>
						 <td>:</td>
                         <td width="77%" class="narmal"><select name="es_buldname" ><option value="">-- Select --</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select></td>
                      </tr>
					  <tr class="narmal">
			
			<td align="left" class="narmal" width="23%">Select Year            </td>
			<td>:</td>
			<td align="left" class="narmal" width="77%"><select name="selyear" style="width:100px;">
			  <option value="">-- Select --</option>
			  <option <?php if($selyear==2006) { echo "selected='selected'"; } ?> value="2006">2006</option>
			  <option <?php if($selyear==2007) { echo "selected='selected'"; } ?> value="2007">2007</option>
              <option <?php if($selyear==2008) { echo "selected='selected'"; } ?> value="2008">2008</option>
              <option <?php if($selyear==2009) { echo "selected='selected'"; } ?> value="2009">2009</option>
              <option <?php if($selyear==2010) { echo "selected='selected'"; } ?> value="2010">2010</option>
              <option <?php if($selyear==2011) { echo "selected='selected'"; } ?> value="2011">2011</option>
              <option <?php if($selyear==2012) { echo "selected='selected'"; } ?> value="2012">2012</option>
              <option <?php if($selyear==2013) { echo "selected='selected'"; } ?> value="2013">2013</option>
              <option <?php if($selyear==2014) { echo "selected='selected'"; } ?> value="2014">2014</option>
              <option <?php if($selyear==2015) { echo "selected='selected'"; } ?> value="2015">2015</option>
              <option <?php if($selyear==2016) { echo "selected='selected'"; } ?> value="2016">2016</option>
              <option <?php if($selyear==2017) { echo "selected='selected'"; } ?> value="2017">2017</option>
              <option <?php if($selyear==2018) { echo "selected='selected'"; } ?> value="2018">2018</option>
            </select></td>
			
		  </tr>	
		   <tr>								  
                         <td align="left" class="narmal" width="23%">Select Month</td>
						 <td>:</td>
			<td align="left" class="narmal" width="77%"><select name="selmonth" style="width:100px;">
			  <option value="">-- Select --</option>
              <option <?php if($selmonth=='01') { echo "selected='selected'"; } ?> value="01">January</option>
			  <option <?php if($selmonth=='02') { echo "selected='selected'"; } ?> value="02">Febuary</option>
			  <option <?php if($selmonth=='03') { echo "selected='selected'"; } ?> value="03">March</option>
			  <option <?php if($selmonth=='04') { echo "selected='selected'"; } ?> value="04">April</option>
			  <option <?php if($selmonth=='05') { echo "selected='selected'"; } ?> value="05">May</option>
			  <option <?php if($selmonth=='06') { echo "selected='selected'"; } ?> value="06">June</option>
			  <option <?php if($selmonth=='07') { echo "selected='selected'"; } ?> value="07">July</option>
			  <option <?php if($selmonth=='08') { echo "selected='selected'"; } ?> value="08">August</option>
			  <option <?php if($selmonth=='09') { echo "selected='selected'"; } ?> value="09">September</option>
			  <option <?php if($selmonth=='10') { echo "selected='selected'"; } ?> value="10">October</option>
			  <option <?php if($selmonth=='11') { echo "selected='selected'"; } ?> value="11">November</option>
			  <option <?php if($selmonth=='12') { echo "selected='selected'"; } ?> value="12">December</option>
            </select></td>                    
                      </tr>
					  <tr>								  
                         <td>Person Type</td>
						 <td>:</td>
					     <td><select name="persontype" style="width:100px;">
						 <option value="">-- Select --</option>
						<option value="student" <?php if($persontype=='student') { echo "selected='selected'"; } ?>>Student</option>
						<option value="staff" <?php if($persontype=='staff') { echo "selected='selected'"; } ?>>Staff</option>
						</select></td>                    
                      </tr>	
					  <tr>								  
                         <td>Payment Status</td>
						 <td>:</td>
					     <td><select name="balance" style="width:100px;">
						 <option value="">-- Select --</option>
						<option value="paid" <?php if($balance=='paid') { echo "selected='selected'"; } ?>>Paid</option>
						<option value="unpaid" <?php if($balance=='unpaid') { echo "selected='selected'"; } ?>>Unpaid</option>
						</select></td>                    
                      </tr>	
					  <tr>								  
                         <td>Registration No.</td>
						 <td>:</td>
					     <td><input type="text" name="es_personid" value="<?php echo $es_personid;?>" /></td>                    
                      </tr>				
				     <tr>								  
                         <td>&nbsp;</td>
					     <td>&nbsp;</td> 
						   <td>&nbsp;</td> 
						                    
                      </tr>				  
				     <tr>				
					  <td align="right"></td>
					    <td>&nbsp;</td> 
					     <td align="left">&nbsp;<input type="submit" name="search_hostel_charges" value="Search" class="bgcolor_02" />&nbsp;&nbsp;&nbsp;&nbsp;<input name="export_hostel_charges" style="cursor:pointer"   type="submit" class="bgcolor_02" value="Export to Excel Sheet" /></td>
				    </tr>
					<tr>
					     <td>&nbsp;</td>
						 <td>&nbsp;</td>
						   <td>&nbsp;</td> 
					</tr>
					</form> 
				</table></td>
                  </tr>
				  
				   <tr>
                    <td align="left" valign="top"><table width="100%" border="0" class="admin">
													  <tr>
														<td width="83%" align="right" valign="middle">Total Dues </td>
														<td width="2%" align="left" valign="middle">:</td>
														<td width="15%" align="left" valign="middle"><?php if($amounts_arr['totaldues']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amounts_arr['totaldues'], 2, '.', '');}else{echo "---";}?></td>
													  </tr>
													  <tr>
														<td align="right" valign="middle">Amount Received</td>
														<td align="left" valign="middle">:</td>
														<td align="left" valign="middle"><?php if($amounts_arr['totalamountreceived']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amounts_arr['totalamountreceived'], 2, '.', '');}else{echo "---";}?></td>
													  </tr>
													  <tr>
														<td align="right" valign="middle">Deductions Allowed</td>
														<td align="left" valign="middle">:</td>
														<td align="left" valign="middle"><?php if($amounts_arr['totaldeduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amounts_arr['totaldeduction'], 2, '.', '');}else{echo "---";}?></td>
													  </tr>
													  <tr>
														<td align="right" valign="middle"><font color="#FF0000">Balace</font></td>
														<td align="left" valign="middle"><font color="#FF0000">:</font></td>
														<td align="left" valign="middle"><?php if($amounts_arr['totalbalance']>0){echo '<font color="#FF0000">'.$_SESSION['eschools']['currency']."&nbsp;".number_format($amounts_arr['totalbalance'], 2, '.', '').'</font>';}else{echo "---";}?></td>
													  </tr>
                                                      
                                                      
                                                      
                                                      
                                                       <tr>
														<td align="left" colspan="3" align="right">	<ul><b><u>NOTE:</u></b>
				<li>Students/Staff who are displayed in Red are Transferred/Ex Staff.</li>
				
			</ul></td>
														
													  </tr>
                                                      
                                                      
                                                      
													</table>
					</td>
                  </tr>
				  
				   <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr height="25" class="bgcolor_02">
					 		<td align="center" valign="middle">S.No</td>
							
							<td align="center" valign="middle">Building Name<br />
					   Room Type/<br />Number</td>
							<td align="center" valign="middle">Person Name<br />
					   [Person Type]</td>
							
							<td align="center" valign="middle">Month</td>
							<td align="center" valign="middle">Bill Amount</td>
							<td align="center" valign="middle">Waived</td>
							<td align="center" valign="middle">Paid Amount</td>
							<td align="center" valign="middle">Action</td>
					 
					 </tr> 
					 <?php if(count($charges_details)>0){
					$irow=$start;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					foreach($charges_details as $eachrecord){
					$irow++;
					if($irow%2==0)
						$rowclass = "even";
						else
						$rowclass = "odd";
					
					 ?>
                    <tr height="25" class="<?php echo $rowclass;?>">
                      <td width="4%" align="left" valign="top" class="narmal">&nbsp;<?php echo $irow; ?></td>
                   
                      <td width="15%" align="left" valign="top" class="narmal"><?php echo $eachrecord['buidingname'].'<br>'.$eachrecord['room_type'].'<br>'.$eachrecord['room_no']; ?></td>
                      
                      
                      
                      
                      
											<?php    
                                             if($eachrecord['es_persontype'] == 'student')
                      {
                                           
                         $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='". $eachrecord['es_personid']."' AND status ='inactive'";
                        $trans=sqlnumber($query_trasfor);
                        if($trans==0){
                    ?>
                    
                                              <td width="13%" align="left" valign="top" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?><br /> 
                        [<?php echo $eachrecord['es_personid']; ?>]<br />
                      [<?php echo strtoupper($eachrecord['es_persontype']); ?>]</td>
                     <?php }else{?>
                     
                                  <td width="13%" bgcolor="#FF0000" align="left" valign="top" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?><br /> 
                        [<?php echo $eachrecord['es_personid']; ?>]<br />
                      [<?php echo strtoupper($eachrecord['es_persontype']); ?>]</td>
                               
                        <?php
                      }
                      }
                      elseif($eachrecord['es_persontype']== 'staff')
                      {
                         $query_trasfor="SELECT * FROM es_staff WHERE es_staffid='".$eachrecord['es_personid']."' AND tcstatus!='notissued'";
                        $trans=sqlnumber($query_trasfor);
                        if($trans==0){
                      ?>
                             <td width="13%" align="left" valign="top" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?><br /> 
                        [<?php echo $eachrecord['es_personid']; ?>]<br />
                      [<?php echo strtoupper($eachrecord['es_persontype']); ?>]</td>
                     <?php }else{?>
                     
                                  <td width="13%" bgcolor="#FF0000" align="left" valign="top" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?><br /> 
                        [<?php echo $eachrecord['es_personid']; ?>]<br />
                      [<?php echo strtoupper($eachrecord['es_persontype']); ?>]</td>
                     <?php }
 }?>                


                      
             <?php /*?>         <td width="13%" align="left" valign="top" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?><br /> 
                        [<?php echo $eachrecord['es_personid']; ?>]<br />
                      [<?php echo strtoupper($eachrecord['es_persontype']); ?>]</td><?php */?>
					  
					  <td width="10%" align="left" valign="top" class="narmal"><?php if($eachrecord['due_month']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['due_month']); }?></td>
					  <td width="14%" align="right" valign="top" class="narmal"><?php if($eachrecord['room_rate']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['room_rate'], 2, '.', '');}?></td>
					  <td width="13%" align="right" valign="top" class="narmal"><?php if($eachrecord['deduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction'], 2, '.', '');}?></td>
					  <td width="19%" align="right" valign="top" class="narmal"><?php if($eachrecord['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['amount_paid'], 2, '.', '');}?></td>
                      <td width="12%" align="center" valign="top" class="narmal">
                       
					<?php if(in_array('19_17',$admin_permissions)){?>


  <a href="?pid=19&action=view_allotment_details&chgid=<?php echo $eachrecord['es_hostel_charges_id']; ?>&start=<?php echo $start.$PageUrl;?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>&nbsp;
					

<?php } ?>   
					   
					<?php if(in_array('19_10',$admin_permissions)){?>
  <?php if( $eachrecord['balance']!=0){?>
					  <a href="?pid=19&action=payamount&chgid=<?php echo $eachrecord['es_hostel_charges_id']; ?>&start=<?php echo $start.$PageUrl;?>" ><img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" /></a>&nbsp;
					



<?php } ?>
		
		<?php if(in_array('19_18',$admin_permissions)){?>


 <?php }if( $eachrecord['balance']==0){?><a href="javascript: void(0)" onclick="popup_letter('?pid=19&action=receipt&chgid=<?php echo $eachrecord['es_hostel_charges_id']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }?>
					 

<?php } ?>					  </td>
                    </tr>       
                    
					<?php 
					$total_room_rate += $eachrecord['room_rate'];
					$total_deduction += $eachrecord['deduction'];
					$total_amount_paid +=$eachrecord['amount_paid'];
					}?>
					<tr height="25" class="admin">
					 		<td align="center" valign="middle"></td>
							
							<td align="center" valign="middle"></td>
							<td align="center" valign="middle">Total</td>
							
							<td align="center" valign="middle"></td>
					  <td align="right" valign="middle"><?php if($total_room_rate>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_room_rate, 2, '.', '');}?></td>
					  <td align="right" valign="middle"><?php if($total_deduction>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_deduction, 2, '.', '');}?></td>
					  <td align="right" valign="middle"><?php if($total_amount_paid>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount_paid, 2, '.', '');}?></td>
							<td align="left" valign="middle"></td>
					 
					 </tr>
					
					<tr height="25">
                      <td align="center" colspan="10"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
                    </tr>
					<tr height="25">
                      <td align="right" colspan="10" style="padding:10px"></td>
                    </tr>
					
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="10">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
				</table></td>
                  </tr>
				  
				
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
        
		    </table>
<?php }?>
<?php if($action=='payamount') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Hostel Charges</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Buidling Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Registration No</td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Name</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
					  { 
					    $stud_details = get_studentdetails($payamount_details['es_personid']);
					  echo ucwords($stud_details['pre_name']);}
					   if($payamount_details['es_persontype'] == 'staff')
					  {
					   $staff_details = get_staffdetails($payamount_details['es_personid']);
					  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
					  ?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['alloted_date']);?></td>
							</tr>
							<?php if($payamount_details['dealloted_date']!="" && $payamount_details['dealloted_date']!='0000-00-00'){?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">De-allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['dealloted_date']);?></td>
							</tr>
							<?php }?>
							<tr>
							    <td height="25" align="center" valign="middle" colspan="4">
									<table width="100%" cellpadding="3" cellspacing="3">
										<tr class="admin">
										        <td width="5%" align="center" valign="middle"></td>
												<td width="33%" align="center" valign="middle">Due Amount</td>
												<td width="4%" align="center" valign="middle"></td>
												<td width="32%" align="center" valign="middle"> Amount Received </td>
												<td width="2%" align="center" valign="middle"></td>
												<td width="21%" align="center" valign="middle">Waived Amount </td>
												<td width="3%"></td>
										</tr>
										<tr>
										        <td  align="center" valign="middle"></td>
												<td align="center" valign="middle" class="admin"><font color="#FF0000"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['dueamount'], 2, '.', '');?></font></td><td align="center" valign="middle"></td>
										  <td align="center" valign="middle"><input type="text" name="amount_paid" value="<?php echo $amount_paid;?>"  /></td><td align="center" valign="middle"></td>
										  <td align="center" valign="middle"><input type="text" name="deduction" value="<?php echo $deduction;?>"  /></td><td></td>
										</tr>
								  </table>
								</td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Amount In words</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><textarea name="remarks"><?php echo stripslashes($remarks); ?></textarea></td>
							</tr>
							<tr>
							    <td height="25" align="center" valign="middle" colspan="4">
									<table width="100%" border="0" cellspacing="3" cellpadding="0" >
											
											<tr>
                                       		  <td width="15%" align="left" valign="middle" class="admin">&nbsp;&nbsp;</td>
                                       		  <td width="19%" align="left" valign="middle" class="admin">Payment Mode</td>
                                       		  <td width="3%" align="left" valign="middle" class="admin">:</td>
                                       		  <td width="63%" align="left" valign="middle" class="admin"><select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();" >
											  <option value="">-- Select --</option>
                                                <option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                                   		    </tr>
											<tr>
											<td height="25" class="admin">&nbsp;</td>
											<td height="25" align="left" valign="middle" class="admin">Voucher&nbsp;Type</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle" class="narmal"><select name="vocturetypesel" style="width:150px;">
											<option value="">-- Select --</option>
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; }?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
										    </tr>
                                            <tr>
												<td height="25" class="narmal">&nbsp;</td>
												<td height="25" align="left" valign="middle" class="admin">Ledger&nbsp;Type</td>
												<td align="left" valign="middle" class="admin">:</td>
												<td align="left" valign="middle" class="narmal"><select name="es_ledger" style="width:150px;">
												<option value="">-- Select --</option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
											  </select>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="middle" colspan="4"><div  id="patiddivdisp"  style="display:none;" >
																<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="admin" >Bank Name </td>
																		<td align="center"  width="4%" class="admin">:</td>
																		<td align="left"  width="74%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin"> Account Number</td>
																		<td align="center" class="admin">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Cheque / DD Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Teller Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Pin </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
																	</tr>
																</table>	
																</div></td>
                                   		    </tr>
								  </table>
								</td>
							</tr>
							
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle">
								<input type="hidden" name="dueamount" value="<?php echo $payamount_details['dueamount'];?>" />
								<input type="submit" name="receive_amount" value="Pay Amount" class="bgcolor_02" /></td>
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
<?php } ?>
<?php if($action=='receipt') { 

// insert logs
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_charges','HOSTEL','View Details','".$chgid."','RECEIPT PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Hostel Charges Receipt</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				   <table width="100%" border="0">
					  <tr>
						<td>
								<table width="100%" border="0">
								  <tr>
									<td width="50%"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['es_hostel_charges_id']?></td>
										  </tr>
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Buidling&nbsp;Name</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
										  </tr>
										  <tr>
										
											<td height="25" align="left" valign="middle" class="admin">Room&nbsp;No</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Room&nbsp;Type</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
										</tr>
										</table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php if($payamount_details['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['paid_on']);}?></td>
										  </tr>
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Person&nbsp;Type</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Person&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
											  { 
												$stud_details = get_studentdetails($payamount_details['es_personid']);
											  echo ucwords($stud_details['pre_name']);}
											   if($payamount_details['es_persontype'] == 'staff')
											  {
											   $staff_details = get_staffdetails($payamount_details['es_personid']);
											  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
											  ?></td>
										</tr>
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Due for the Month</td>
								<td align="left">Due Amount</td>
								<td align="left">Amount Waived</td>
								<td align="left">Amount Received</td>
							  </tr>
							  <tr>
								<td align="left"><?php if($payamount_details['due_month']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['due_month']);} ?></td>
								<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['dueamount'], 2, '.', '');?></td>
								<td align="left"><?php if($payamount_details['deduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['deduction'], 2, '.', '');}?></td>
								<td align="left"><?php if($payamount_details['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['amount_paid'], 2, '.', '');}?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle"><b>Rupees : </b><?php echo $payamount_details['remarks'];?></td>
							  </tr>
							</table>
						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="right" valign="middle" class="admin">Authorised Signature</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
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
<?php } ?>
<?php if($action=='collect_items'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Collect Returnable Items</strong></span></td>
              </tr>
			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="?pid=19&action=collect_items" method="post" name="" id="" >
					  <tr>								  
                         <td width="17%" class="narmal">Select Building</td>
                         <td width="83%" class="narmal"><select name="es_buldname" ><option value="">-Select-</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select><font color="#FF0000">*</font></td>
                      </tr>		
				     <tr>								  
                         <td>&nbsp;</td>
					     <td>&nbsp;</td>                    
                      </tr>				  
				     <tr>				
					  <td align="right"></td>
					     <td align="left">&nbsp;<input type="submit" name="issued_items" value="Search" class="bgcolor_02" /></td>
				    </tr>
					<tr>
					     <td>&nbsp;</td>
						 <td>&nbsp;</td>
					</tr>
					</form> 
				</table></td>
                  </tr>
                  
 
            <?php if (count($all_issued_items)>0) { ?>
             <tr>
                    <td height="25" align="right" valign="middle" width="35%">&nbsp;               </td>
                    <td align="left" valign="middle" width="65%"><ul><b><u>NOTE:</u></b>
				<li>Students who are displayed in Red are Transferred Students.</li>
			</ul></td>
             </tr>
                  
				  <tr>
                    <td height="25" colspan="2" align="left" valign="middle">Buiding Name  :  <b><?php echo strtoupper($all_issued_items[0]['buld_name']);?></b></td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="left" valign="middle"><table width="100%" height="47" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
						
					  <tr class="bgcolor_02">
                        <td height="18" align="left" valign="middle" ><strong>&nbsp;S.No</strong></td>
                        <td height="25" align="left" valign="middle"><strong>&nbsp;Room No</strong></td>
						<td height="25" align="left" valign="middle"><strong>&nbsp;Registration No</strong></td>
                        <td  align="left" valign="middle"><strong>&nbsp;Person Name <br />[Person type]</strong></td>
                        <td align="left" valign="middle"><strong>&nbsp;Qty. Issued</strong></td>
						<td  align="left" valign="middle"><strong>&nbsp;Status</strong></td>
						<td  align="left" valign="middle"><strong>&nbsp;Action</strong></td>
                      </tr>
<?php						
		 $rw = 1;
         $slno = $start+1;
		 
foreach ($all_issued_items as $eachrecord)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		//if($prev_personid!= $eachrecord['personid'] && $prev_persontype != $eachrecord['es_persontype']  && $prev_item_name != $eachrecord['in_item_name'] ){
		
	
?>                   <tr class="<?php echo $rowclass;?>">
                        <td height="20" align="left" class="narmal">&nbsp;<?php echo $slno;?></td>
						
                        <td align="left" class="narmal">&nbsp;<?php echo $eachrecord['room_no']; ?></td>
                         <?php    
                         if($eachrecord['es_persontype'] == 'student')
  {
  	                   
     $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='".$eachrecord['personid']."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
?>                 





<td align="left" class="narmal">&nbsp;<?php echo $eachrecord['personid']; ?></td>
 <?php }else{?>
 
  			<td align="left" bgcolor="#FF0000" class="narmal">&nbsp;<?php echo $eachrecord['personid']; ?></td>
           
	<?php  }
  }
  elseif($eachrecord['es_persontype'] == 'staff')
  {
	 $query_trasfor="SELECT * FROM es_staff WHERE es_staffid='".$eachrecord['personid']."' AND tcstatus!='notissued'";
  	$trans=sqlnumber($query_trasfor);
	if($trans==0){
  ?>
 	 <td align="left" class="narmal">&nbsp;<?php echo $eachrecord['personid']; ?></td>
 <?php }else{?>
 
  			<td align="left" bgcolor="#FF0000" class="narmal">&nbsp;<?php echo $eachrecord['personid']; ?></td>
 <?php }
 }?>                

                        
                        
                        
                        
                        
                        
						<?php /*?><td align="left" class="narmal">&nbsp;<?php echo $eachrecord['personid']; ?></td><?php */?>
						<td align="left" valign="middle" class="narmal">&nbsp;<?php  if($eachrecord['es_persontype'] == 'student')
											  { 
												$stud_details = get_studentdetails($eachrecord['personid']);
											  echo ucwords($stud_details['pre_name']).'<br>['.$eachrecord['es_persontype'].']';}
											   if($eachrecord['es_persontype'] == 'staff')
											  {
											   $staff_details = get_staffdetails($eachrecord['personid']);
											  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']).'<br>['.$eachrecord['es_persontype'].']' ;}
											  ?></td>
						<td align="left" class="narmal">&nbsp;<?php 
						$total_items = $db->getrow("SELECT SUM(hostelperson_itemqty) AS total FROM es_hostelperson_item WHERE es_personid=".$eachrecord['personid']." AND es_persontype = '".$eachrecord['es_persontype']."' AND hostelperson_itemtype='Returnable' AND es_roomallotmentid='".$eachrecord['es_roomallotmentid']."'");
						echo $total_items['total'];
						?></td>
						
						<td align="left" class="narmal">
						<?php if(in_array('19_16',$admin_permissions)){?>
		&nbsp;<?php if($eachrecord['itemstatus']=='issued'){echo "Issued";} if($eachrecord['itemstatus']=='issuereturn'){echo "Returned";} ?>
				



<?php } ?>						</td>
						<td align="left" class="narmal">
					<?php if(in_array('19_8',$admin_permissions)){?><a href="javascript: void(0)" onclick="popup_letter('?pid=19&action=view_item_details&raid=<?php echo $eachrecord['es_roomallotmentid']; ?>')" title="View Dertails"><?php echo viewIcon(); ?></a>
		<?php } ?>				
			<?php if(in_array('19_16',$admin_permissions)){?><a href="?pid=19&action=return_items&raid=<?php echo $eachrecord['es_roomallotmentid']; ?>&bid=<?php echo $eachrecord['es_hostelbuldid'];?>&start=<?php echo $start;?>"><img src="images/return_items_16.png" border="0" title="Return Items" align="Return Items" /></a>
					


<?php } ?>						</td>
						
					</tr>
<?php                
					  $rw++;
                      $slno++;
					 
					  
				 }
?>

				   <tr>
						<td align="center" valign="middle"></td>
				   </tr>
<?php 
}
 else{
						echo "<tr class='bgcolor_02'>
								<td height='20' align='center' colspan='8' class='narmal'><b>No Records Found </b></td>
							</tr>
							<tr>
								<td height='20' colspan='8'></td>
							</tr>";
					}
?>
					  </table></td>
                  </tr>
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
        
		    </table>
<?php }?>
<?php if($action=='view_item_details') { ?>		
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
             
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" align="center"><strong>&nbsp;&nbsp;Returnable Items  Record   </strong></td>
              </tr>
			
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="88%"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" class="narmal"><strong>Reg No</strong></td>
					
                        <td align="left" valign="top" class="narmal"><?php echo $rommallotdetails['es_personid']; ?></td>
                        <td width="17%" align="left" valign="top" class="narmal"><strong>Room Type</strong></td>
                        <td width="26%" align="left" valign="top" class="narmal"><?php echo $room_details['room_type'];?></td>
                       
                      </tr>
                      <tr>
                        <td width="26%" align="left" valign="top" class="narmal"><strong>Name</strong> </td>
                        <td width="22%" align="left" valign="top" class="narmal"><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo ucwords($stud_details['pre_name']); } if($rommallotdetails['es_persontype'] == 'staff')
					  { echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}?></td>
                        <td width="17%" align="left" valign="top" class="narmal"><strong>Room No</strong></td>
                        <td width="26%" align="left" valign="top" class="narmal"><?php echo $room_details['room_no'];?></td>
                       
                      </tr>
                      <tr>
                        <td height="24" align="left" valign="top" class="narmal"><strong>Person type </strong></td>
                        <td align="left" valign="top" class="narmal"><?php echo $rommallotdetails['es_persontype']; ?> </td>
                        
                        <td width="17%" align="left" valign="top"><strong><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo "Class"; }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo "Department";}?></strong></td>
						 <td width="26%" align="left" valign="top"><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo classname($stud_details['pre_class']); }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo deptname($staff_details['st_department']);}?></td>
					
                      </tr>
                   
				      <tr>
                        <td height="40" colspan="5" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="5%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="21%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="11%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
						   <td width="26%" class="bgcolor_02"><strong>&nbsp;&nbsp;Returned On </strong></td>
                        </tr>
						<?php 
						if(count($es_roomDetails)>=1){
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
						  <td class="narmal"><?php if($eachrecord['return_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['return_on']);}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Items Issued</td></tr>
						<?php }?>                       
                    </table></td>
                  </tr>
                  <tr>
				  <td>&nbsp; </td>
				  </tr>
				 </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
  </table>
</form>
<?php } ?>
<?php if($action=='view_allotment_details') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Hostel Charges</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Buidling Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Registration No</td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Name</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
					  { 
					    $stud_details = get_studentdetails($payamount_details['es_personid']);
					  echo ucwords($stud_details['pre_name']);}
					   if($payamount_details['es_persontype'] == 'staff')
					  {
					   $staff_details = get_staffdetails($payamount_details['es_personid']);
					  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
					  ?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['alloted_date']);?></td>
							</tr>
							<?php if($payamount_details['dealloted_date']!="" && $payamount_details['dealloted_date']!='0000-00-00'){?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">De-allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['dealloted_date']);?></td>
							</tr>
							<?php }?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Amount Due</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['dueamount'], 2, '.', '');?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Paid Amount </td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php if($payamount_details['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['amount_paid'], 2, '.', '');}else{echo "---";}?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Waived Amount </td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php if($payamount_details['deduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['deduction'], 2, '.', '');}else{echo "---";}?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Balance</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><font color="#FF0000"><?php if($payamount_details['balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['balance'], 2, '.', '');}else{echo "---";}?></font></td>
							</tr>
							<tr>
                             <td height="40" colspan="4" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                           </tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle">
							 		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="5%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="21%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="11%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
						   <td width="26%" class="bgcolor_02"><strong>&nbsp;&nbsp;Returned On </strong></td>
                        </tr>
						<?php 
						if(count($es_roomDetails)>=1){
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
						  <td class="narmal"><?php if($eachrecord['return_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['return_on']);}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Items Issued</td></tr>
						<?php }?>                       
                    </table>
							 </td>
                           </tr>
							
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								
								<td align="left" valign="middle">
								
								<a href="?pid=19&action=viewdetails&start=<?php echo $start.$PageUrl;?>" class="bgcolor_02" style="padding:3px; text-decoration:none;">Back</a></td>
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
<?php } ?>
<?php if($action=='view_persons'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Hostel Persons </strong></span></td>
              </tr>
			   <tr>
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="right"></td>
								 <td class="bgcolor_02"></td>
          					 </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"> <form action="?pid=19&action=view_persons" method="post" name="prepare_bill" id="prepare_bill" >
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
                    
					  <tr>								  
                         <td width="23%" class="narmal">Select Building</td>
						 <td>:</td>
                         <td width="77%" class="narmal"><select name="es_buldname" onChange="getsubjects(this.value,'');" ><option value="">-- Select --</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select></td>
                      </tr>
					  <tr>								  
                         <td width="23%" class="narmal" >Select Room</td>
						 <td>:</td>
                         <td width="77%" class="narmal" id="subjectselectbox"><select name="es_hostelroomid" id="s_submodule" style="width:150px;">
             <option value="">-- Select --</option>
			        
           </select></td>
                      </tr>
					  <?php if($es_buldname!=""){
					
					 ?>
<script type="text/javascript">
getsubjects('<?php echo $es_buldname; ?>','<?php echo $es_hostelroomid;?>');
</script>
<?php } ?>	
		   
					  <tr>								  
                         <td>Person Type</td>
						 <td>:</td>
					     <td><select name="persontype" style="width:100px;">
						 <option value="">-- Select --</option>
						<option value="student" <?php if($persontype=='student') { echo "selected='selected'"; } ?>>Student</option>
						<option value="staff" <?php if($persontype=='staff') { echo "selected='selected'"; } ?>>Staff</option>
						</select></td>                    
                      </tr>	
					  	
					  <tr>								  
                         <td>Registration No.</td>
						 <td>:</td>
					     <td><input type="text" name="es_personid" value="<?php echo $es_personid;?>" /></td>                    
                      </tr>				
				     <tr>								  
                         <td>&nbsp;</td>
					     <td>&nbsp;</td> 
						   <td>&nbsp;</td> 
						                    
                      </tr>				  
				     <tr>				
					  <td align="right"></td>
					    <td>&nbsp;</td> 
					     <td align="left">&nbsp;<input type="submit" name="search_hostel_charges" value="Search" class="bgcolor_02" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
				    </tr>
					
					
				</table></form> </td>
                  </tr>
                  
                  <tr>
                    <td align="left" valign="top">
				  
				  	<ul><b><u>NOTE:</u></b>
				<li>Students/Staff who are displayed in Red are Transferred/Ex Staff.</li>
				
			</ul>
            </td>
            </tr>
            
				  
				   <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr height="25" class="bgcolor_02">
					 		<td align="center" valign="middle">S.No</td>
							<td align="center" valign="middle">Building Name</td>
					        <td align="center" valign="middle">Room Type</td>
							<td align="center" valign="middle">Room Number</td>
							<td align="center" valign="middle">Person Id</td>
							<td align="center" valign="middle">Person Name</td>
							<td align="center" valign="middle">Person Type</td>
							<td align="center" valign="middle">Class / Department</td>
							<td align="center" valign="middle">Allotted On</td>
							<td align="center" valign="middle">De Allocated On</td>
							<td align="center" valign="middle">Action</td>
					 
					 </tr> 
					 <?php if($no_rows>0){
					$irow=$start;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					foreach($allotment_details as $eachrecord){
					$irow++;
					if($irow%2==0)
						$rowclass = "even";
						else
						$rowclass = "odd";
					
					 ?>
                    <tr height="25" class="<?php echo $rowclass;?>">
                      <td width="3%" align="center" valign="middle" class="narmal">&nbsp;<?php echo $irow; ?></td>
                   
                      <td width="11%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['buidingname']; ?></td>
					  <td width="7%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_type']; ?></td>
					  <td width="7%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_no'];?></td>
                      
                      
                      
                      
                        <?php    
                         if($eachrecord['es_persontype'] == 'student')
  {
  	                   
     $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='". $eachrecord['es_personid']."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
?>

                        <td width="5%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_personid']; ?></td>
 <?php }else{?>
 
  			<td width="5%" bgcolor="#FF0000" align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_personid']; ?></td>
           
	<?php
  }
  }
  elseif($eachrecord['es_persontype']== 'staff')
  {
	 $query_trasfor="SELECT * FROM es_staff WHERE es_staffid='".$eachrecord['es_personid']."' AND tcstatus!='notissued'";
  	$trans=sqlnumber($query_trasfor);
	if($trans==0){
  ?>
 	  <td width="5%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_personid']; ?></td>
 <?php }else{?>
 
  			 <td width="5%" bgcolor="#FF0000" align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_personid']; ?></td>
 <?php }
 }?>                
                      
                      
                      
					  <td width="5%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_personid']; ?></td>
					  
                      <td width="18%" align="center" valign="middle" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?></td>
					  <td width="11%" align="center" valign="middle" class="narmal"><?php echo strtoupper($eachrecord['es_persontype']); ?></td>
					  <td width="11%" align="center" valign="middle" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   
					  echo classname($stud_details['pre_class']);}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  
					  echo deptname($staff_details['st_department'])."<br>[ ".postname($staff_details['st_post']).']';}
					  ?></td>
					  <td width="15%" align="center" valign="middle" class="narmal"><?php if($eachrecord['alloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['alloted_date']);}?></td>
					  <td width="13%" align="center" valign="middle" class="narmal"><?php if($eachrecord['dealloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['dealloted_date']);}?></td>
					  
                      <td width="10%" align="center" valign="middle" class="narmal"><?php if (in_array("19_101", $admin_permissions)) {?>
                      <a href="javascript: void(0)" onclick="popup_letter('?pid=19&action=person_allotment_details&chgid=<?php echo $eachrecord['es_roomallotmentid']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }?></td>
                    </tr>       
                    
					<?php 
					
					}?>
					
					
					<tr height="25">
                      <td align="center" colspan="11"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
                    </tr>
					<tr height="25">
                      <td align="right" colspan="11"><?php if (in_array("19_102", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=19&action=print_hostel_persons<?php echo $PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
                    </tr>
					<tr height="25">
                      <td align="right" colspan="11" style="padding:10px"></td>
                    </tr>
					
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="11">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
				</table></td>
                  </tr>
				  
				
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
        
		    </table>
<?php }?>
<?php if($action=='person_allotment_details') { 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_roomallotment','Hostel','View Hostel Persons','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Hostel Charges</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Buidling Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Registration No</td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Name</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
					  { 
					    $stud_details = get_studentdetails($payamount_details['es_personid']);
					  echo ucwords($stud_details['pre_name']);}
					   if($payamount_details['es_persontype'] == 'staff')
					  {
					   $staff_details = get_staffdetails($payamount_details['es_personid']);
					  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
					  ?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['alloted_date']);?></td>
							</tr>
							<?php if($payamount_details['dealloted_date']!="" && $payamount_details['dealloted_date']!='0000-00-00'){?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">De-allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['dealloted_date']);?></td>
							</tr>
							<?php }?>
							
							<tr>
                             <td height="40" colspan="4" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                           </tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle">
							 		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="9%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="22%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="14%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
						   <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Returned On </strong></td>
                        </tr>
						<?php 
						if(count($es_roomDetails)>=1){
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
						  <td class="narmal"><?php if($eachrecord['return_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['return_on']);}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Items Issued</td></tr>
						<?php }?>                       
                    </table>
							 </td>
                           </tr>
						   <tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								
								<td align="left" valign="middle"></td>
							</tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Payment Details</strong></td>
                           </tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle">
							 		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="9%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="15%" class="bgcolor_02"><strong>&nbsp;&nbsp;Month</strong></td>
                          <td width="22%" class="bgcolor_02"><strong>&nbsp;Bill Amount </strong></td>
                          <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Waived Amount</strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;&nbsp;Paid Amount </strong></td>
						   <td width="17%" class="bgcolor_02"><strong>&nbsp;&nbsp;Paid On </strong></td>
                        </tr>
						<?php 
						if(count($payment_det)>=1){
						$i=0;
						foreach($payment_det as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['due_month']);?></td>
                          <td class="narmal"><?php if($eachrecord['room_rate']>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['room_rate'], 2, '.', '');}?></td>
                          <td class="narmal"><?php if($eachrecord['amount_paid']>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['amount_paid'], 2, '.', '');}?></td>
                          <td class="narmal"><?php if($eachrecord['deduction']>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction'], 2, '.', '');}?></td>
						  <td class="narmal"><?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']);}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Records Found</td></tr>
						<?php }?>                       
                    </table>
							 </td>
                           </tr>
							
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								
								<td align="left" valign="middle"></td>
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
<?php } ?>
<?php if($action == 'print_hostel_persons'){

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_roomallotment','Hostel','View Hostel Persons','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Hostel Persons</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr height="25" class="bgcolor_02">
					 		<td align="center" valign="middle">S.No</td>
							<td align="center" valign="middle">Building Name</td>
					        <td align="center" valign="middle">Room Type</td>
							<td align="center" valign="middle">Room Number</td>
							<td align="center" valign="middle">Person Id</td>
							<td align="center" valign="middle">Person Name</td>
							<td align="center" valign="middle">Person Type</td>
							<td align="center" valign="middle">Class / Department</td>
							<td align="center" valign="middle">Allotted On</td>
							<td align="center" valign="middle">De Allocated On</td>
							
					 
					 </tr> 
					 <?php if($no_rows>0){
					$irow=$start;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					foreach($allotment_details as $eachrecord){
					$irow++;
					if($irow%2==0)
						$rowclass = "even";
						else
						$rowclass = "odd";
					
					 ?>
                    <tr height="25" class="<?php echo $rowclass;?>">
                      <td width="4%" align="center" valign="middle" class="narmal">&nbsp;<?php echo $irow; ?></td>
                   
                      <td width="11%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['buidingname']; ?></td>
					  <td width="8%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_type']; ?></td>
					  <td width="11%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_no'];?></td>
					  <td width="6%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_personid']; ?></td>
					  
                      <td width="20%" align="center" valign="middle" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   $stud_details = get_studentdetails($eachrecord['es_personid']);
					  echo $stud_details['pre_name'];}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  $staff_details = get_staffdetails($eachrecord['es_personid']);	
					  echo $staff_details['st_firstname']." ".$staff_details['st_lastname'];}
					  ?></td>
					  <td width="9%" align="center" valign="middle" class="narmal"><?php echo strtoupper($eachrecord['es_persontype']); ?></td>
					  <td width="12%" align="center" valign="middle" class="narmal"><?php  if($eachrecord['es_persontype'] == 'student')
					  { 
					   
					  echo classname($stud_details['pre_class']);}
					   if($eachrecord['es_persontype']== 'staff')
					  {
					  
					  echo deptname($staff_details['st_department'])."<br>[ ".postname($staff_details['st_post']).']';}
					  ?></td>
					  <td width="9%" align="center" valign="middle" class="narmal"><?php if($eachrecord['alloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['alloted_date']);}?></td>
					  <td width="10%" align="center" valign="middle" class="narmal"><?php if($eachrecord['dealloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['dealloted_date']);}?></td>
					  
                      
                    </tr>       
                    
					<?php 
					
					}?>
					
					
					<tr height="25">
                      <td align="right" colspan="10" style="padding:10px"></td>
                    </tr>
					
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="10">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
				</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>

<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>