<?php if($action == 'know_category' || $action == 'edit_category' ||$action=='view_category' || $action == 'category_sub_view') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong class="admin"><?php if($action == 'edit_category' ){ echo "Edit Category"; }elseif($action == 'view_category'){ echo "View Category"; } else { echo "Create Category"; }?></strong></td>
              </tr>
              <?php 
	if (isset($viewcategory) && count($viewcategory)>0 && $action == 'know_category' ||$action=='view_category') {
	?>
      <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left">
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
						<tr>
							<td width="20%" align="left" valign="middle" class="narmal">Category </td>
							<td width="2%" align="left" valign="middle">:</td>
							<td width="39%" align="left" valign="middle"><?php echo $viewcategory->kb_category;?>							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="20%" align="left" valign="middle" class="narmal">Description</td>
							<td width="2%" align="left" valign="middle">:</td>
							<td colspan="2" align="left" valign="middle"><?php echo $viewcategory->kb_description;?>							</td>
						</tr>
						<tr>
							<td align="left" valign="middle" class="narmal">&nbsp;</td>
							<td align="left" valign="middle">&nbsp;</td>
						  <td align="left" valign="middle"><input type="submit" name="back" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
							<td>&nbsp;</td>
						</tr>
			  </table>
		</td>
			<td class="bgcolor_02" width="1"/>
		</tr>
		

<?php 
	} else{

	?>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  
				  <tr>
                    <td align="right" valign="top">
					<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
					<table width="100%" border="0" cellspacing="5" cellpadding="0">
                     <form action="" name="category_know" method="post" >
					  <tr>
                        <td width="26%" align="left" valign="middle" class="narmal">&nbsp;Category  </td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><input name="kb_category" type="text" value="<?php
										          if (isset($kb_category)){ 
														 echo $_POST['kb_category'];
													}elseif (isset($getcategory->kb_category)){
														
															echo $getcategory->kb_category;
													} 
											
											?>" />&nbsp;<font color="#FF0000">*</font></td>
                       </tr>
                      <tr>
                        <td align="left" valign="middle" class="narmal">&nbsp;Description </td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><textarea name="kb_description"><?php
										          if (isset($kb_description)){ 
														 echo $_POST['kb_description'];
													}elseif (isset($getcategory->kb_description)){
														
															echo $getcategory->kb_description;
													} 
											
											?></textarea>
                        <font color="#FF0000">*</font></td>
                       </tr>
                      <tr>
					  <td>&nbsp;</td>
                        <td height="34" colspan="4" align="left" valign="middle" class="narmal">&nbsp;<input type="hidden" name="edit_id" value="<?php echo $getcategory->es_knowledge_baseId;?>"><input name="cateorySubmit" type="submit" class="bgcolor_02" value="Submit" /></td>
                       </tr>
                   </form>
				    </table>
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
                   <?php if(is_array($categoryList)&&count($categoryList) > 0 ){ ?>
				    <tr class="bgcolor_02">
                      <td width="6%" height="25" align="center" ><strong>S.No</strong></td>
                      <td width="15%" align="center"><strong><?php 
					  if( $action == 'category_sub_view'){echo "Sub&nbsp;Category&nbsp;Name";}else{echo "Category&nbsp;Name";}
					  
					  ?></strong></td>
					    <td width="21%" height="25" align="center"><strong>Created&nbsp;By</strong></td>
                      <td width="21%" height="25" align="center"><strong>Created&nbsp;on</strong></td>
                      <td width="19%" align="center"><strong>Action</strong></td>
					  <td width="11%" align="center"><strong>Articles</strong></td>
                    </tr>
<?php						
			 $rw = 1;
			$slno = $start+1;
	  foreach ($categoryList as $es_knowledge_base)
		 {  
			if($rw%2==0)
				$rowclass = "even";
				else
				$rowclass = "odd";
?>
				    <tr class="<?php echo $rowclass;?>">
                      <td align="center" class="narmal"><?php echo $slno;?></td>
                      <td align="center" class="narmal"><?php echo $es_knowledge_base->kb_category;?></td>
					  <td align="center" class="narmal"><?php if($es_knowledge_base->created_by > 0){$query = get_staffdetails($es_knowledge_base->created_by);
	echo $query['st_firstname']." ".$query['st_lastname'].'&nbsp;[Staff]';}else{echo "Admin";}?></td>
                      <td height="25" align="center" class="narmal"><?php echo displaydate($es_knowledge_base->kb_date);?></td>
                     <td align="center"><?php /*?><a title="Edit Category" href="<?php echo buildurl(array('pid'=>18, 'action'=>'edit_category', 'uid'=>$es_knowledge_base->es_knowledge_baseId));?>#editcategory"><?php echo editIcon(); ?></a>&nbsp; 
										<a title="Delete Category" href="<?php  echo buildurl(array('pid'=>18, 'action'=>'delete_category', 'uid'=>$es_knowledge_base->es_knowledge_baseId));?>#deletecategory" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>&nbsp;<?php */?>
                                  <a title="View Category" href="<?php  echo buildurl(array('pid'=>18, 'action'=>'view_category', 'uid'=>$es_knowledge_base->es_knowledge_baseId));?>#viewcategory" ><?php echo viewIcon(); ?></a></td>
                     <td align="center" class="narmal"><a title="Add Article" href="<?php  echo buildurl(array('pid'=>18, 'action'=>'know_article','uid'=>$es_knowledge_base->es_knowledge_baseId));?>" class="video_link">Add</a></td>
                    </tr>
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                                  <?php  if($subid=="") { ?>
								  <tr>
                                        <td colspan="5" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>										</td>
                      </tr>
					  <tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=18&action=print_category&start=<?php echo $start; ?>',null,'width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
                    <?php 
					}
					} 
                    	
                          else {
					       echo "<tr>";
					       echo "<td align='center' class='narmal'>No records found</td>";
						   echo "</tr>";
					} 
                    
                    
                    
                    ?>
                  </table>
					</td>
                  </tr>
                  </table>
				  <?php } ?>
				  
				  
				  </td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>
<?php if ($action == 'print_category') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong class="admin">Create Sub Category </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                   <?php if(is_array($categoryList)&&count($categoryList) > 0 ){ ?>
				    <tr class="bgcolor_02">
                      <td width="6%" height="25" align="center" ><strong>S.No</strong></td>
                      <td width="15%" align="center"><strong><?php 
					  if( $action == 'category_sub_view'){echo "Sub&nbsp;Category&nbsp;Name";}else{echo "Category&nbsp;Name";}
					  
					  ?></strong></td>
					    <td width="21%" height="25" align="center"><strong>Created&nbsp;By</strong></td>
                      <td width="21%" height="25" align="center"><strong>Created&nbsp;on</strong></td>
                     
                    </tr>
<?php						
			 $rw = 1;
			$slno = $start+1;
	  foreach ($categoryList as $es_knowledge_base)
		 {  
			if($rw%2==0)
				$rowclass = "even";
				else
				$rowclass = "odd";
?>
				    <tr class="<?php echo $rowclass;?>">
                      <td align="center" class="narmal"><?php echo $slno;?></td>
                      <td align="center" class="narmal"><?php echo $es_knowledge_base->kb_category;?></td>
					  <td align="center" class="narmal"><?php if($es_knowledge_base->created_by > 0){$query = get_staffdetails($es_knowledge_base->created_by);
	echo $query['st_firstname']." ".$query['st_lastname'].'&nbsp;[Staff]';}else{echo "Admin";}?></td>
                      <td height="25" align="center" class="narmal"><?php echo displaydate($es_knowledge_base->kb_date);?></td>
                     
                    </tr>
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                                  <?php  if($subid=="") { ?>
								  
                    <?php 
					}
					} 
                    	
                          else {
					       echo "<tr>";
					       echo "<td align='center' class='narmal'>No records found</td>";
						   echo "</tr>";
					} 
                    
                    
                    
                    ?>
                  </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>

<?php if ($action == 'know_sub_category') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong class="admin">Create Sub Category </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <form action="" method="post" name="sub_category_know" >
					  <tr>
                        <td width="26%" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><input type="hidden" name="parent_id" value="<?php echo $uid; ?>"/>&nbsp;</td>
                        </tr>
					  <tr>
                        <td width="26%" align="left" valign="middle" class="narmal">&nbsp;Category  </td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><input name="kb_category" type="text" />&nbsp;</td>
                        </tr>
                      <tr>
                        <td align="left" valign="middle" class="narmal">&nbsp;Description </td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><textarea name="kb_description"></textarea></td>
                        </tr>
                      <tr>
					    <td>&nbsp;</td>
                        <td height="34" colspan="4" align="left" valign="middle" class="narmal">&nbsp;<input name="subcategorySubmit" type="submit" class="bgcolor_02" value="Submit" /></td>
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
<?php } ?>
<?php if($action == 'know_article') { ?>
<?php  include("includes/js/fckeditor/fckeditor.php") ;?>


<script language="javascript" type="text/javascript">
	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong class="admin">Create Article </strong></td>
              </tr>
               <tr>
               <td class="bgcolor_02" width="1">
                <td height="25" align="right" > <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                 <td class="bgcolor_02" width="1">
              </tr>
             
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="" method="post" name="article_know" >
					  <tr>
                        <td width="26%" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><input type="hidden" name="kb_category_id" value="<?php echo $uid; ?>"/>&nbsp;</td>
                       </tr>
					  <tr>
                        <td width="26%" align="left" valign="middle" class="narmal">&nbsp;Article  </td>
                        <td colspan="4" align="left" valign="middle" class="narmal"><input name="kb_article_name" type="text" />&nbsp;<font color="#FF0000">*</font></td>
                       </tr>
                      <tr>
                        <td align="left" valign="middle" class="narmal">&nbsp;Description </td>
                        <td colspan="4" align="left" valign="middle" class="narmal"></td>
                      </tr>
                      <tr>
                        
                        <td colspan="5" align="left" valign="middle" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															   
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Value		= html_entity_decode($ContentData['blogDesc']) ;
															  $oFCKeditor->Create() ;
														?>	<font color="#FF0000">*</font></td>
                      </tr>
                     <td>&nbsp;</td>
                        <td height="34" colspan="4" align="left" valign="middle" class="narmal">&nbsp;<input name="articleSubmit" type="submit" class="bgcolor_02" value="Submit" /></td>
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
<?php } ?>	
<?php if($action == 'know_categ') { ?>
<script type="text/javascript">
function know_search() {
      
	     if(document.getElementById("searchkey").value =="") {
                        document.getElementById("searchkeyviewerror").innerHTML = "Enter Search Criteria";
                        document.getElementById("searchkey").focus();
                        return false;
         }
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Knowledge Base </span> </td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      </table><table width="100%" border="0" cellspacing="5" cellpadding="0">
                       <form name="categ_know" action="" method="post" >
					   <tr>
                        <td width="26%" class="narmal"><input name="searchkey" id="searchkey" type="text" /></td>
                        <td colspan="2" class="narmal"><select name="search_category">
                          <option value=""selected="selected">Any Subject</option>
<?php 
$categories = get_know_categories();
foreach($categories as $eachcategories) {
?>                           
						  
                          <option value="<?php echo $eachcategories['kb_category']; ?>" <?php if($_POST['search_category'] == $eachcategories['kb_category'] ) {
						  																		
																									echo "Selected";

																							  }
						  
						   ?> ><?php echo $eachcategories['kb_category']; ?></option>
<?php } ?>                        
						</select>
                        </td>
                        <td width="55%" class="narmal"><input name="categorySearch" type="submit" class="bgcolor_02" value="Search" onclick="return know_search();" /></td>
                       </tr>
					   <tr>
					     <td id="searchkeyviewerror" class="error_message" height="17" align="right" style="padding-right:10px;"></td>
					     <td colspan="2" class="narmal">&nbsp;</td>
					     <td class="narmal">&nbsp;</td>
					     </tr>
                      </form>
<?php if(isset($searchkey)) {
?>
<tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
<?php
if(is_array($searchcriteria)) { 
foreach($searchcriteria as $eachsearchcriteria) { 
?>                   
					    <tr>
                             <td align="left" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" /><?php echo $eachsearchcriteria['kb_article_name']; ?></td>
                           </tr>
						       <tr>
                             <td align="left" valign="middle" class="justify">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  stripslashes($eachsearchcriteria['kb_article_desc']); ?></td>
                           </tr>

<?php 
}
}						   
else {
	   echo "<tr>";
	   echo "<td align='center'  class='narmal'>No records found</td>";
	   echo "</tr>";
	} 
 } 
else {
 ?>
					   <tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
<?php 
$category = get_know_categories();
if(is_array($category)) {
foreach($category as $eachcategory) {
?>                         <tr>
                             <td width="47%" align="left" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" />&nbsp;<a title="Category" href="<?php echo buildurl(array('pid'=>18, 'action'=>'know_subcategory', 'uid'=>$eachcategory['es_knowledge_baseid']));?>" class="video_link" ><?php echo $eachcategory['kb_category']; ?></a></td>
                           </tr>
<?php }

 }
else {
	   echo "<tr>";
	   echo "<td align='center' class='narmal'>No records found</td>";
	   echo "</tr>";
	} 
}	
?>
						 
						   <tr>
                             <td align="left" valign="middle">&nbsp;</td>
                             <td align="left" valign="middle">&nbsp;</td>
                           </tr>
                         </table></td>
                       </tr>
                      </table>
                  </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>
<?php if($action == 'know_subcategory') { ?>
<script type="text/javascript">
function know_search() {
      
	     if(document.getElementById("searchkey").value =="") {
                        document.getElementById("searchkeyviewerror").innerHTML = "Enter Search Criteria";
                        document.getElementById("searchkey").focus();
                        return false;
         }
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Knowledge Base </span> </td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      </table><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <form name="categ_know" action="" method="post" >
					   <tr>
                        <td width="26%" class="narmal"><input name="searchkey" type="text" /></td>
                        <td colspan="2" class="narmal"><select name="search_category">
                         <option value=""selected="selected">Any Subject</option>
<?php 
$categories = get_know_categories();
foreach($categories as $eachcategories) {
?>                           
						  
                          <option value="<?php echo $eachcategories['kb_category']; ?>" <?php if($_POST['search_category'] == $eachcategories['kb_category'] ) {
						  																		
																									echo "Selected";

																							  }
						  
						   ?> ><?php echo $eachcategories['kb_category']; ?></option>
<?php } ?>                        
						</select>
                        </td>
                        <td width="55%" class="narmal"><input name="categorySearch" type="submit" class="bgcolor_02" value="Search" onclick="return know_search();"/></td>
                       </tr>
					    <tr>
					     <td id="searchkeyviewerror" class="error_message" height="17" align="right" style="padding-right:10px;"></td>
					     <td colspan="2" class="narmal">&nbsp;</td>
					     <td class="narmal">&nbsp;</td>
					     </tr>
                      </form>
<?php if(isset($searchkey)) {
?>
<tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
<?php

if(is_array($searchcriteria)) { 
foreach($searchcriteria as $eachsearchcriteria) { 
?>                   
					    <tr>
                             <td align="left" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" /><?php echo $eachsearchcriteria['kb_article_name']; ?></td>
                           </tr>
						       <tr>
                             <td align="left" valign="middle" class="justify">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  stripslashes($eachsearchcriteria['kb_article_desc']); ?></td>
                           </tr>

<?php 
}
}						   
else {
	   echo "<tr>";
	   echo "<td align='center' class='narmal'>No records found</td>";
	   echo "</tr>";
	} 
 } 
else {
?>					  
                       
					   <tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">                      
						   <tr>
                             <td height="23" colspan="3" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Articles</strong></td>
                             </tr>
                           <tr>
                             <td colspan="3" align="left" valign="middle" class="admin">&nbsp;</td>
                             </tr>
<?php 
$article = get_know_category_article($uid);
if(is_array($article)) {
foreach($article as $eacharticle) {
$artid=$eacharticle['es_knowledge_articlesid'];
?>                            
						   <tr>
                               <td align="center" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" /></td>
                             <td colspan="2" align="left" valign="middle" ><a title="Article" href="<?php echo buildurl(array('pid'=>18, 'action'=>'know_article_details', 'uid'=>$uid,'artid'=>$artid));?>" class="video_link" ><?php echo stripslashes($eacharticle['kb_article_name']); ?></a> </td>
                           
						   </tr>
						   
<?php } 
}
else {
		   echo "<tr >";
		   echo "<td height='23' colspan='3' align='left' valign='middle' class='narmal'>No records found</td>";
		   echo "</tr>";
					
	} 
}					
                    
?>						   					   
						<tr>
						   <td colspan="7"align="center"><input type="submit" align="center" onclick="javascript:history.go(-1)" value="back"class="bgcolor_02"/>&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=18&action=print_subcat&uid=<?php echo $uid; ?>&artid=<?php echo $artid;?>',null,'width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
						  </tr>
</table></td>
                       </tr>
                      </table>
                  </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
</table>
<?php } ?>	
<?php 
if($action == 'know_article_details' || $action=='print_notices_det') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Knowledge Base </span> </td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      </table><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                           <tr>
                             <td align="left" valign="middle">&nbsp;</td>
                           </tr>
                           
<?php 

$article = get_know_category_article1($uid,$artid);

if(is_array($article)) {
foreach($article as $eacharticle) {
?>						   <tr>
                             <td align="left" valign="middle" class="admin"><?php echo stripslashes($eacharticle["kb_article_name"]); ?></td>
                              </tr>
                           <tr>
                             <td width="69%" align="left" valign="middle"><strong><a href="#" class="admin">
                             </a></strong></td>
                             </tr>
                           <tr>
                             <td align="left" valign="middle"><?php echo stripslashes($eacharticle['kb_article_desc']); ?></td>
                            </tr>
							<tr>
                             <td align="left" valign="middle">Created On :<?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y",$eacharticle['kb_article_date']); ?></td>
                            </tr>
							<?php if($eacharticle['person_type']!=''){?>
							<tr>
                             <td align="left" valign="middle">Created By : <?php 
							 if($eacharticle['person_type']=='Staff'){
					   $staff_arr =  get_staffdetails($eacharticle['created_by']);
					   
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eacharticle['person_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eacharticle['created_by']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo  $from_name.'&nbsp;[ '.$eacharticle['person_type'].' ]';
							 
							 ?></td>
                            </tr>
							<?php }?>
<?php } 
}
?>                           
						    <tr>
                             <td align="left" valign="middle" class="admin">&nbsp;</td>
                           </tr>	
						   <?php if($action!='print_notices_det'){?>					   
					   <tr>
						   <td align="center"><input type="submit" onclick="javascript:history.go(-1)" value="back"class="bgcolor_02"/>&nbsp;<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=18&action=print_notices_det&uid=<?php echo $uid; ?>&artid=<?php echo $artid;?>',null,'width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
						   </tr>
						   <?php }?>
                           
                           
                         </table></td>
                       </tr>
                      </table>
                  </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>
<?php 
if($action=='print_subcat') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Knowledge Base </span> </td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellspacing="3" cellpadding="0">                      
						   <tr>
						     <td height="23" align="left" valign="middle" class="bgcolor_02">S.No</td>
                             <td height="23" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Category</strong></td>
							 <td height="23" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Articles</strong></td>
                             </tr>
                           <tr>
                             <td colspan="3" align="left" valign="middle" class="admin">&nbsp;</td>
                             </tr>
<?php 
$article = get_know_category_article($uid);
$category = $db->getone("SELECT kb_category FROM es_knowledge_base WHERE es_knowledge_baseid=".$uid);
if(is_array($article)) {
$i=0;
foreach($article as $eacharticle) {
$i++;
$artid=$eacharticle['es_knowledge_articlesid'];
?>                            
						   <tr>
                               <td align="center" valign="middle" class="admin"><?php  echo $i;?></td>
                               <td  align="left" valign="middle" ><?php echo stripslashes($category); ?></td>
							   <td  align="left" valign="middle" ><?php echo stripslashes($eacharticle['kb_article_name']); ?></td>
                           
						   </tr>
						   
<?php } 
}

				
                    
?>						   					   
						
</table>
				</td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>		
		