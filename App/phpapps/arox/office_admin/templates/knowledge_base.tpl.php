<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	
	if($action == 'know_category' || $action == 'edit_category' ||$action=='view_category' || $action == 'category_sub_view') { ?>
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
							<td width="16%" align="left" class="narmal">Category </td>
						  <td width="2%" align="left">:</td>
						  <td width="43%" align="left"><?php echo stripslashes($viewcategory->kb_category);?>							</td>
						  <td width="39%">&nbsp;</td>
					  </tr>
						<tr>
							<td width="16%" align="left" class="narmal">Description</td>
						  <td width="2%" align="left">:</td>
						  <td colspan="2" align="left"><?php echo stripslashes($viewcategory->kb_description);?>							</td>
					    </tr>
						<tr>
							<td align="left" class="narmal">&nbsp;</td>
						  <td align="left">&nbsp;</td>
						  <td align="left"><input type="submit" name="back" onclick="javascript:history.go(-1);" id="back" style="font-size:13px;cursor:pointer; height:20px;" value="back" class="bgcolor_02"/></td>
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
                    
                    <?php if (in_array("30_1", $admin_permissions)) {?>
					<table width="100%" border="0" cellspacing="5" cellpadding="0">
                     <form action="" name="category_know" method="post" >
					  <tr>
                        <td width="16%" align="left" class="narmal">&nbsp;Category:</td>
                        <td width="84%" colspan="4" align="left" class="narmal"><input name="kb_category" type="text" value="<?php
										          if (isset($kb_category)){ 
														 echo stripslashes($_POST['kb_category']);
													}elseif (isset($getcategory->kb_category)){
														
															echo stripslashes($getcategory->kb_category);
													} 
											
											?>" />&nbsp;<font color="#FF0000">*</font></td>
                       </tr>
                   <?php /*?>   <tr>
                        <td align="left" class="narmal">&nbsp;Description:</td>
                        <td colspan="4" class="narmal" align="left"><textarea name="kb_description" rows="4" cols="23"><?php
										          if (isset($kb_description)){ 
														 echo $_POST['kb_description'];
													}elseif (isset($getcategory->kb_description)){
														
															echo $getcategory->kb_description;
													} 
											
											?></textarea>
                        <font color="#FF0000">*</font></td>
                       </tr><?php */?>
                      <tr>
					  <td></td>
                        <td height="34" colspan="4" align="left" valign="middle" class="narmal"><input type="hidden" name="edit_id" value="<?php echo $getcategory->es_knowledge_baseId;?>"><input name="cateorySubmit" type="submit" class="bgcolor_02" value="Submit" style="font-size:13px;cursor:pointer; height:20px;" /></td>
                       </tr>
                   </form>
				    </table>
                    <?php }?>
				
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
                   <?php if(is_array($categoryList)&&count($categoryList) > 0 ){ ?>
				    <tr class="bgcolor_02">
                      <td width="7%" height="25" align="center" ><strong>S No</strong></td>
                      <td width="29%" align="left"><strong>
					  <?php if($action=="category_sub_view"){echo "Sub&nbsp;Category&nbsp;Name";}else{echo "Category";}?>
					  </strong></td>
					  <td width="19%" height="25" align="center"><strong>Created&nbsp;By</strong></td>
                      <td width="15%" align="center"><strong>Created&nbsp;on</strong></td>
                      <td width="14%" align="center"><strong>Action</strong></td>
					  <td width="16%" align="center"><strong>Articles</strong></td>
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
                      <td align="left" class="narmal"><?php echo stripslashes($es_knowledge_base->kb_category);?></td>
					  <td align="center" class="narmal"><?php if($es_knowledge_base->created_by > 0){$query = get_staffdetails($es_knowledge_base->created_by);
	echo $query['st_firstname']." ".$query['st_lastname'].'&nbsp;[Staff]';}else{echo "Admin";}?></td>
                      <td align="center" class="narmal"><?php echo displaydate($es_knowledge_base->kb_date);?></td>
                     <td align="center">
                     
                     <?php if (in_array("30_2", $admin_permissions)) {?><a title="Edit Category" href="<?php echo buildurl(array('pid'=>30, 'action'=>'edit_category', 'uid'=>$es_knowledge_base->es_knowledge_baseId));?>#editcategory"><?php echo editIcon(); ?></a> &nbsp;<?php }else{ echo "-"; }?>
                     
                     
										<?php if (in_array("30_3", $admin_permissions)) {?><a title="Delete Category" href="<?php  echo buildurl(array('pid'=>30, 'action'=>'delete_category', 'uid'=>$es_knowledge_base->es_knowledge_baseId));?>#deletecategory" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>&nbsp;<?php }else{ echo "-"; }?>
                                        
                                        
                                  <?php /*?><?php if (in_array("30_5", $admin_permissions)) {?><a title="View Category" href="<?php  echo buildurl(array('pid'=>30, 'action'=>'view_category', 'uid'=>$es_knowledge_base->es_knowledge_baseId));?>#viewcategory" ><?php echo viewIcon(); ?></a><?php }else{ echo "-"; }?><?php */?>
                                  
                                  
                                  
                      </td>
                     <td align="center" class="narmal">
                     
                     
                     <?php if (in_array("30_4", $admin_permissions)) {?><a title="Add Article" href="<?php  echo buildurl(array('pid'=>30, 'action'=>'know_article','uid'=>$es_knowledge_base->es_knowledge_baseId));?>" class="video_link">Add</a><?php }else{ echo "-"; }?>&nbsp;|&nbsp; <?php if (in_array("30_5", $admin_permissions)) {?><a title="View Article" href="?pid=30&action=know_subcategory&uid=<?php echo $es_knowledge_base->es_knowledge_baseId;?>" class="video_link">View</a><?php }else{ echo "-"; }?>
                     
                     
                     </td>
                    </tr>
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                                  <?php  if($subid=="") { ?>
								  <tr>
                                        <td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>										</td>
                      </tr>
								   <tr height="25">
                   <td align="right" colspan="6" style="padding-right:5px;"><?php if (in_array("30_6", $admin_permissions)) {?><input type="button" style="cursor:pointer; height:20px;" value="Print" onclick="window.open('?pid=30&action=print_category&start=<?php echo $start; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
                </tr>
                    <?php 
					}
					} 
                    	
                          else if($action!='know_category')
						  {
					       echo "<tr class='narmal'>";
					       echo "<td align='center'>No records found</td>";
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
<?php if ($action == 'know_sub_category') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong class="admin">Create</strong><strong class="admin"> Sub Category </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <form action="" method="post" name="sub_category_know" >
					  <tr>
                        <td width="26%" class="narmal">&nbsp;</td>
                        <td colspan="4" class="narmal"><input type="hidden" name="parent_id" value="<?php echo $uid; ?>"/>&nbsp;</td>
                        </tr>
					  <tr>
                        <td width="26%" align="left" class="narmal">&nbsp;Category  </td>
                        <td colspan="4" class="narmal"><input name="kb_category" type="text" />&nbsp;</td>
                        </tr>
                      <tr>
                        <td align="left" class="narmal">&nbsp;Description </td>
                        <td colspan="4" class="narmal"><textarea name="kb_description"></textarea></td>
                        </tr>
                      <tr>
                        <td height="34" colspan="5" align="center" valign="middle" class="narmal">&nbsp;<input name="subcategorySubmit" type="submit" class="bgcolor_02" value="Submit" /></td>
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
<?php if($action == 'know_article' || $action=='edit_article') { ?>
<?php  include("includes/js/fckeditor/fckeditor.php") ;?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong class="admin">Add / Edit Article </strong></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="" method="post" name="article_know" >
					  <tr>
                        <td width="10%" class="narmal">&nbsp;</td>
                        <td width="100%" colspan="4" class="narmal"><input type="hidden" name="kb_category_id" value="<?php echo $uid; ?>"/>&nbsp;</td>
                       </tr>
					  <tr>
                        <td width="10%" align="left" class="narmal">&nbsp;Article: </td>
                        <td colspan="4" align="left" class="narmal">
                     
                        
                        
                        <input name="kb_article_name" type="text" style="width:465px;" value="<?php if($artcle_det['kb_article_name']!="" && !$_POST){echo stripslashes ($artcle_det['kb_article_name']);} else { echo stripslashes($kb_article_name);}?>" />&nbsp;<font color="#FF0000">*</font></td>
                       </tr>
					   <tr><td height="10px"></td></tr>
                      <tr>
                        <td align="left" class="narmal">&nbsp;Description: </td>
                        <td colspan="4" class="narmal" >  </td>
                      </tr>
                       <tr>
                        
                        <td colspan="5" align="left" class="narmal" >
					                                                                   
						
						<?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															   
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Value		= html_entity_decode(stripslashes($artcle_det['kb_article_desc'])) ;
															  $oFCKeditor->Create() ;
														?>
                         <font color="#FF0000">*</font></td>
                      </tr>
                      <tr>
                        <td height="34" colspan="5" align="center" valign="middle" class="narmal"><?php if($action == 'know_article'){?>
						<input name="articleSubmit" type="submit" class="bgcolor_02" value="Submit" style="font-size:13px;cursor:pointer; height:20px;"/>
						<?php } if($action=='edit_article'){?>
						<input name="update_article" type="submit" class="bgcolor_02" value="Update" />
						<?php }?>
						</td>
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

/*		
function know_search() {
    
	     if(document.getElementById("searchkey").value =="") {
                        document.getElementById("searchkeyviewerror").innerHTML = "Please enter any keyword";
                        document.getElementById("searchkey").focus();
                        return false;
         }
}*/
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
                        <td width="48%" align="left" class="narmal">Enter any keyword&nbsp;
                         <input name="searchkey" id="searchkey" type="text" />&nbsp;<font color="#FF0000">*</font></td>
                        <td colspan="2" align="left" class="narmal"><select name="search_category">
                          <option value=""selected="selected">Select Category</option>
<?php 
$categories = get_know_categories();
foreach($categories as $eachcategories) {
?>                           
						  
                          <option value="<?php echo $eachcategories['kb_category']; ?>" <?php if($_POST['search_category'] == $eachcategories['kb_category'] ) {
						  																		
																									echo "Selected";

																							  }
						  
						   ?> ><?php echo $eachcategories['kb_category']; ?></option>
<?php } ?>                        
						</select>                        </td>
                        <td width="15%" align="left" class="narmal">&nbsp;&nbsp;
                         <input name="categorySearch" style="font-size:13px;cursor:pointer; height:20px;" type="submit" class="bgcolor_02" value="Search"  /></td>
                       </tr>
					   <tr>
					     <td id="searchkeyviewerror" class="error_message" height="10" align="right" style="padding-right:10px;"></td>
					     <td colspan="2" class="narmal">&nbsp;</td>
					     <td class="narmal">&nbsp;</td>
					     </tr>
                      </form>
<?php if(isset($searchkey) && $searchkey!="") {


?>
<tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
<?php
if(is_array($searchcriteria)) { 
foreach($searchcriteria as $eachsearchcriteria) { 
?>                   
					    <tr>
                             <td align="left" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" /><?php echo stripslashes($eachsearchcriteria['kb_article_name']); ?></td>
                           </tr>
						       <tr>
                             <td align="left" valign="middle" class="justify"><?php echo  stripslashes($eachsearchcriteria['kb_article_desc']); ?></td>
                           </tr>

<?php 
}
if($action!='print_search'){?>
 <?php /*?><tr>
                             <td align="left" valign="middle" class="justify"><?php if (in_array("30_8", $admin_permissions)) {?>
<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=30&action=print_search<?php echo $PageUrl; ?>&artid=<?php echo $artid;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
                           </tr><?php */?>
<?php
}
}						   
else {
	   echo "<tr class='narmal'>";
	   echo "<td align='center'>No records found</td>";
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
                             <td width="94%" align="left" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" />&nbsp;<a title="Category" href="<?php echo buildurl(array('pid'=>30, 'action'=>'know_subcategory', 'uid'=>$eachcategory['es_knowledge_baseid']));?>" class="video_link" ><?php echo stripslashes($eachcategory['kb_category']); ?></a></td>
                             <td width="6%"  align="center"></td>
                           </tr>
<?php }

 }
else {
	   echo "<tr class='narmal'>";
	   echo "<td align='center'>No records found</td>";
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
<?php /*?><script type="text/javascript">
function know_search() {
      
	     if(document.getElementById("searchkey").value =="") {
                        document.getElementById("searchkeyviewerror").innerHTML = "Enter Search Criteria";
                        document.getElementById("searchkey").focus();
                        return false;
         }
}
</script><?php */?>
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
                      </table><table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <form name="categ_know" action="" method="post" >
					   <tr>
                        <td width="48%" height="25" align="left" class="narmal">Enter any keyword 
                         <input name="searchkey" type="text" />&nbsp;<font color="#FF0000">*</font></td>
                        <td colspan="2" align="left" class="narmal"><select name="search_category">
                         <option value=""selected="selected">Select Category</option>
<?php 
$categories = get_know_categories();
foreach($categories as $eachcategories) {
?>                           
						  
                          <option value="<?php echo $eachcategories['kb_category']; ?>" <?php if($_POST['search_category'] == $eachcategories['kb_category'] ) {
						  																		
																									echo "Selected";

																							  }
						  
						   ?> ><?php echo $eachcategories['kb_category']; ?></option>
<?php } ?>                        
						</select>                        </td>
                        <td width="15%" align="left" class="narmal">&nbsp;&nbsp;
                         <input name="categorySearch" type="submit" style="font-size:13px;cursor:pointer; height:20px;" class="bgcolor_02" value="Search" /></td>
                       </tr>
					    <tr>
					     <td id="searchkeyviewerror" class="error_message" height="17" align="right" style="padding-right:10px;"></td>
					     <td colspan="2" class="narmal">&nbsp;</td>
					     <td class="narmal">&nbsp;</td>
					     </tr>
                      </form>
<?php if(isset($searchkey) && $searchkey!="") {
?>
                         <tr>
                         <td colspan="4" class="narmal">
						 <table width="100%" border="0" cellspacing="3" cellpadding="0">
<?php

if(is_array($searchcriteria)) { 
foreach($searchcriteria as $eachsearchcriteria) { 
?>                   
					    <tr>
                             <td align="left" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" /><?php echo $eachsearchcriteria['kb_article_name']; ?></td>
                           </tr>
						       <tr>
                             <td align="left" valign="middle" class="narmal"><?php echo  stripslashes($eachsearchcriteria['kb_article_desc']); ?></td>
                           </tr>

<?php 
}
}						   
else {
	   echo "<tr class='narmal'>";
	   echo "<td align='center'>No records found</td>";
	   echo "</tr>";
	} 
 } 
else {
?>					  
                       
					   <tr>
                         <td colspan="4" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">                          
                          
						  
 
                         
						    <tr>
                             <td colspan="3" align="left" valign="middle">&nbsp;</td>
                             </tr>
 
                         
						   <tr>
                             <td height="25" colspan="2" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Articles</strong></td>
							 <td align="center" valign="middle" class="bgcolor_02"><strong>Action</strong></td>
                             </tr>
                          
<?php 
$article = get_know_category_article($uid);
if(is_array($article)) {
foreach($article as $eacharticle) {
$artid=$eacharticle['es_knowledge_articlesid'];
?>                            
						   <tr>
                               <td width="10%" align="right" valign="middle" class="admin"><img src="images/topic.gif" width="16" height="16" /></td>
                             <td width="76%"  align="left" valign="middle" ><a title="Article" href="<?php echo buildurl(array('pid'=>30, 'action'=>'know_article_details', 'uid'=>$uid,'artid'=>$artid));?>" class="video_link" ><?php echo stripslashes($eacharticle['kb_article_name']); ?></a> </td>
							 <td align="center" width="14%"><a href="?pid=30&action=edit_article&artid=<?php echo $artid; ?>&uid=<?php echo $uid;?>"><img src="images/b_edit.png" border="0" /></a>&nbsp;
							 
				<a title="Delete Category" href="?pid=30&action=delete_article&artid=<?php echo $artid; ?>&uid=<?php echo $uid;?>" onclick="return confirm('Are you sure you want to delete this Article?');"><img src="images/b_drop.png" border="0" /></a>
							 
							 </td>
                           
						   </tr>
						   
<?php } 
}
else {
		   echo "<tr >";
		   echo "<td height='23' colspan='3' align='center' valign='middle' class='narmal'>No records found</td>";
		   echo "</tr>";
					
	} 
}					
                    
?>						   					   
						<?php /*?><tr>
						   <td colspan="7"align="center"><?php ?><input type="submit" style="font-size:13px;cursor:pointer; height:20px;" align="center" onclick="javascript:history.go(-1)" value="back"class="bgcolor_02"/><?php ?>&nbsp;&nbsp;<?php if (in_array("30_7", $admin_permissions)) {?><input type="button" style="cursor:pointer; height:20px;" value="Print" onclick="window.open('?pid=30&action=print_subcat&uid=<?php echo $uid; ?>&artid=<?php echo $artid;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
						  </tr><?php */?>
</table></td>
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
<?php 
if($action == 'know_article_details'  || $action=='print_notices_det') { ?>

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
                             <td align="left" valign="middle"></td>
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
                             <td align="left" valign="middle" class="narmal"><?php echo stripslashes($eacharticle['kb_article_desc']); ?></td>
                            </tr>
							<tr><td height="10px"></td></tr>
							<tr>
                             <td align="left" valign="middle" class="narmal">Created On:&nbsp;<?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y",$eacharticle['kb_article_date']); ?></td>
                            </tr>
							<?php if($eacharticle['person_type']!=''){?>
							<tr>
                             <td align="left" valign="middle" class="narmal">Created By:&nbsp;<?php 
							 if($eacharticle['person_type']=='Staff'){
					   $staff_arr =  get_staffdetails($eacharticle['created_by']);
					   
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eacharticle['person_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eacharticle['created_by']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo  $from_name;
							 
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
						   <td align="center"><input type="submit" onclick="javascript:history.go(-1)" style="font-size:13px;cursor:pointer; height:20px;" value="back"class="bgcolor_02"/>&nbsp;<?php if (in_array("30_8", $admin_permissions)) {?>
                           
                           
                           <input type="button" style="cursor:pointer; height:20px;" value="Print" onclick="window.open('?pid=30&action=print_notices_det&uid=<?php echo $uid; ?>&artid=<?php echo $artid;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
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
<?php if ($action == 'print_category') { 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','Knowledge Base','Create Category','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong class="admin">Category List </strong></td>
              </tr>
			   <tr>
                <td height="20" colspan="3" ></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                   <?php if(is_array($categoryList)&&count($categoryList) > 0 ){ ?>
				    <tr class="bgcolor_02">
                      <td width="10%" height="25" align="center" ><strong>S No</strong></td>
                      <td width="36%" align="left"><strong><?php 
					  if( $action == 'category_sub_view'){echo "Sub&nbsp;Category&nbsp;Name";}else{echo "Category";}
					  
					  ?></strong></td>
					    <td width="33%" height="25" align="left"><strong>Created&nbsp;By</strong></td>
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
                      <td align="left" class="narmal"><?php echo stripslashes($es_knowledge_base->kb_category);?></td>
					  <td align="left" class="narmal"><?php if($es_knowledge_base->created_by > 0){$query = get_staffdetails($es_knowledge_base->created_by);
	echo $query['st_firstname']." ".$query['st_lastname'].'&nbsp;[Staff]';}else{echo "Admin";}?></td>
                      <td height="20" align="center" class="narmal"><?php echo displaydate($es_knowledge_base->kb_date);?></td>
                     
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
<?php 
if($action=='print_subcat') {

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','Knowledge Base','Search Articles','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
 ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Knowledge Base </span> </td>
              </tr>
			  <tr>
			  <td width="1" class="bgcolor_02"></td>
                <td height="20"></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellspacing="3" cellpadding="0">                      
						   <tr>
						     <td width="7%" height="23" align="center" valign="middle" class="bgcolor_02"><strong>S No</strong></td>
                             <td width="27%" height="23" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Category</strong></td>
					
							 <td width="50%" height="23" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Article</strong></td>
							  <td width="16%" height="23" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Created By</strong></td>
                  </tr>
                           
<?php 
$article = get_know_category_article($uid);
$category = $db->getrow("SELECT * FROM es_knowledge_base WHERE es_knowledge_baseid=".$uid);
if(is_array($article)) {
$i=0;
foreach($article as $eacharticle) {
$i++;
$artid=$eacharticle['es_knowledge_articlesid'];
?>                            
						   <tr>
                               <td align="center" valign="middle" class="admin"><?php  echo $i;?></td>
                               <td  align="left" valign="middle" >&nbsp;<?php echo stripslashes($category['kb_category']); ?></td>
							  
							   <td  align="left" valign="middle" > &nbsp;<?php echo stripslashes($eacharticle['kb_article_name']); ?></td>
							   <td  align="left" valign="middle" >&nbsp;<?php 
							 if($eacharticle['person_type']=='Staff'){
					   $staff_arr =  get_staffdetails($eacharticle['created_by']);
					   
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eacharticle['person_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eacharticle['created_by']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  if($from_name!=''){
					  echo  ucwords($from_name);
					  }else{echo "Admin";}
							 
							 ?></td>
                           
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

<?php 
if($action=='print_search') { 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','Knowledge Base','Search Articles','','Print Article','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>

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
				
<table width="100%" border="0">
<?php
if(is_array($searchcriteria)) { 
foreach($searchcriteria as $eachsearchcriteria) {
?>   
  <tr>
    <td width="14%" align="left" class="admin">Article</td>
	<td width="1%" align="center" class="admin">:</td>
    <td width="85%" align="left" class="admin"><?php echo stripslashes($eachsearchcriteria['kb_article_name']); ?></td>
  </tr>
  <tr>
    <td align="left"></td>
	<td align="center" class="admin"></td>
    <td align="left"><p><?php echo  stripslashes($eachsearchcriteria['kb_article_desc']); ?></p></td>
  </tr>
  <tr>
                             <td align="left" valign="middle">Created On </td>
							 <td align="center" class="admin">:</td>
							 <td align="left"><?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y",$eachsearchcriteria['kb_article_date']); ?></td>
                </tr>
							<?php if($eachsearchcriteria['person_type']!=''){?>
							<tr>
                             <td align="left" valign="middle">Created By </td>
							 <td align="center" class="admin">:</td>
							 <td align="left"> <?php 
							 if($eachsearchcriteria['person_type']=='Staff'){
					   $staff_arr =  get_staffdetails($eachsearchcriteria['created_by']);
					   
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachsearchcriteria['person_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachsearchcriteria['created_by']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo  $from_name.'';
							 
							 ?></td>
                            </tr>
							<?php }?>
  <?php }}?>
</table>

				</td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>	