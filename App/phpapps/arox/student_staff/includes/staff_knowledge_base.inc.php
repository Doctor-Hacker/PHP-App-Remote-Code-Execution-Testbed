<?php   
        sm_registerglobal('pid', 
						  'action',
						  'uid', 
						  'status',
						  'edit_id',
						  'start',
						  'column_name',
						  'emsg',
						  'kb_category',
						  'kb_description',
						  'kb_date',
						  'status',
						  'parent_id',
						  'cateorySubmit',
						  'articleSubmit',
						  'kb_article_name',
						  'kb_article_desc',
						  'kb_category_id',
						  'subcategorySubmit',
						  'categorySearch',
						  'searchkey',
						  'search_category',
						  'blogDesc',
						  'artid',
						  'subid','update_article','searchkey'
						  );
/**
* Only Admin users can view the pages
*/
checkuserinlogin();
/**End of the permissions    **/

	  

      $q_limit  = PAGENATE_LIMIT;
	  
	 
	  $es_knowledge_base = new es_knowledge_base();
if(isset($cateorySubmit) &&  $cateorySubmit!="") {

		$vlc    = new FormValidation();		
		if (empty($kb_category)) {
		$errormessage[0]="Enter Category";	  
		}else{
		    $condition = "";
			
		    if (isset($edit_id) && $edit_id !=""){ $condition = " AND es_knowledge_baseid!='".$edit_id."'";}
			$no_rows = $db->getone("SELECT COUNT(*) FROM es_knowledge_base WHERE kb_category = '".$kb_category."' ".$condition."");
			if($no_rows>=1){$errormessage[0]="Category Already Exists";	 }
		}
	/*	if (empty($kb_description)) {
		$errormessage[1]="Enter Description";	  
		}		
		*/
			 
		 if(isset($kb_category)) {
		  
		        $es_knowledge_base->kb_category =  $kb_category;
		  
			}
		  if(isset($kb_description)) {
		  
		        $es_knowledge_base->kb_description =  $kb_description;
		  
			}
	          $es_knowledge_base->kb_date =  date('Y-m-d h:i:s');
			  $es_knowledge_base->status =  'active';
				
				if(count($errormessage)==0)
				{
			       if (isset($edit_id) && $edit_id !=""){
					   $db->update("es_knowledge_base", "kb_category             = '$kb_category',
														  kb_description          = '$kb_description'","es_knowledge_baseid=$edit_id"); 
					   
					   

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','KNOWLEDGE BASE','CREATE CATEGORY','".$edit_id."','EDIT KNOWLEDGE CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

	header("location: ?pid=$pid&action=$action&emsg=2");
						exit;
				  } 
				   else{
				   $id=$es_knowledge_base->save();
				    if(isset($id) && $id!="") {
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','KNOWLEDGE BASE','CREATE CATEGORY','".$id."','CREATE KNOWLEDGE CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
				 
				       header("location:?pid=$pid&action=$action&emsg=1");
					   exit;
					   }
			        }
			   }
	  
}	  
if (isset($action) && $action=='edit_category') {

 $getcategory = $es_knowledge_base->Get($uid);   //gets Category
      
}


if (isset($action) && $action=='view_category') {

 $viewcategory = $es_knowledge_base->Get($uid);   //gets Category
 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','KNOWLEDGE BASE','CREATE CATEGORY','".$uid."','VIEW CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

 
 
      
}
if (isset($action) && $action=='delete_category') {
$db->delete("es_knowledge_base", "es_knowledge_baseid=".$uid);
$db->delete("es_knowledge_base", "parent_id=".$uid);
    // $db->update("es_knowledge_base", "status='deleted'", "es_knowledge_baseid=$uid"); 
	// $db->update("es_knowledge_base", "status='deleted'", "	parent_id=$uid"); 
     $action = "know_category";
	
	
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_base','KNOWLEDGE BASE','CREATE CATEGORY','".$uid."','DELETE CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
 
	 
	  header("location:?pid=$pid&action=$action&emsg=3");
}
if($action=='delete_article'){
$db->delete("es_knowledge_articles", "es_knowledge_articlesid=".$artid);

// $db->update("es_knowledge_articles","status='deleted'","es_knowledge_articlesid=".$artid);
  header("location:?pid=$pid&action=know_subcategory&emsg=3&uid=$uid");
}
if($action=='edit_article'){
    $artcle_det = $db->getrow("SELECT * FROM es_knowledge_articles WHERE es_knowledge_articlesid=".$artid."");
}

if(isset($action) && $action == "edit_category" || $action == "know_category" || $action == "category_sub_view" || $action=='print_category'  ){

  
  if($subid!="") {
  if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_knowledge_base->GetList(array(array("es_knowledge_baseid", ">", 0),array("status", "=", "active"), array("parent_id", "=", "$subid")) ));
	
		$orderby_array = array('orb1'=>'es_knowledge_baseid', 'orb2'=>'tr_transport_type', 'orb3'=>'in_short_name' ,'orb4'=>'DESC');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
			
		}else{
			$orderby = "es_knowledge_baseid";
		}
		if (isset($asds_order) && $asds_order=='DESC'){
			$order = false;
		}else{
			$order = true;
		}

	$categoryList = $es_knowledge_base->GetList(array(array("status", "=", "active"), array("es_knowledge_baseid", ">", "0"), array("parent_id", "=", "$subid")));
	
}
else{
if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_knowledge_base->GetList(array(array("es_knowledge_baseid", ">", 0),array("status", "=", "active"), array("parent_id", "=", "0")) ));
	
		$orderby_array = array('orb1'=>'es_knowledge_baseid', 'orb2'=>'tr_transport_type', 'orb3'=>'in_short_name');
	
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_knowledge_baseid";
			
			
		}
		/*if (isset($asds_order) && $asds_order=='DESC'){
			
			$order = false;
		}else{
			$order = true;
		}*/
		$order = false;

 $categoryList = $es_knowledge_base->GetList(array(array("status", "=", "active"),array("es_knowledge_baseid", ">", "0"), array("parent_id", "=", "0")), $orderby, $order,$asds_order,  "$start , $q_limit" );

}
}

/**code for add subcategory page
*/
if(isset($subcategorySubmit) && $subcategorySubmit!="") {
$kb_category=stripslashes($kb_category);
	if (empty($kb_category) || $kb_category=='') {
		$errormessage[0]="Enter Category";	  
		}
		if (empty($kb_description)) {
		$errormessage[1]="Enter Description";	  
		}
		
		if(isset($parent_id)) {
		  
		        $es_knowledge_base->parent_id =  $uid;
		  
			} 
		
		 if(isset($kb_category)) {
		  
		        $es_knowledge_base->kb_category =  $kb_category;
		   
			}
		  if(isset($kb_description)) {
		  
		        $es_knowledge_base->kb_description =  $kb_description;
		  
			}
	          $es_knowledge_base->kb_date =  date('Y-m-d h:i:s');
			  $es_knowledge_base->status =  'active';
				
				if(count($errormessage)==0) {
			       if ($es_knowledge_base->save()) {
				       header("location:?pid=$pid&action=know_category&emsg=1");
					   exit;
			        }
			   }
	  
}	 


$es_knowledge_articles = new es_knowledge_articles();
if(isset($articleSubmit) && $articleSubmit!="") {


		if (empty($kb_article_name)) {
		$errormessage[0]="Enter Article";	  
		}else{
		    $condition = "";
		    
			$no_rows = $db->getone("SELECT COUNT(*) FROM es_knowledge_articles WHERE kb_article_name = '".$kb_article_name."' AND kb_category_id = ".$kb_category_id."");
			if($no_rows>=1){$errormessage[0]="Article Already Exists";	 }
		}
		if (empty($blogDesc)) {
		$errormessage[1]="Enter Description";	  
		}
		
		 if(isset($kb_category_id)) {
		  
		        $es_knowledge_articles->kb_category_id =  $kb_category_id;
		  
			}
		  if(isset($kb_article_name)) {
		  
		        $es_knowledge_articles->kb_article_name =  $kb_article_name;
		  
			}
	  
		  if (isset($blogDesc)){
					
				$es_knowledge_articles->kb_article_desc = $blogDesc;
		     }
		  
			  $es_knowledge_articles->kb_article_date =  date('Y-m-d h:i:s');
			  $es_knowledge_articles->status =  'active';
			  $es_knowledge_articles->created_by =$_SESSION['eschools']['admin_id'];  
			  $es_knowledge_articles->person_type = 'admin';
				
				if(count($errormessage)==0) {
				    $id=$es_knowledge_articles->save();
				    if(isset($id) && $id!="") {
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_knowledge_articles','KNOWLEDGE BASE','CREATE CATEGORY','".$id."','CREATE KNOWLEDGE ARTICALS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
				  
				  
				  
				 
				       header("location:?pid=$pid&action=know_category&emsg=1");
					   exit;
			        }
			   }
	  
}
if(isset($update_article) && $update_article!=""){
		
		if (empty($kb_article_name)) {
		$errormessage[0]="Enter Article";	  
		}else{
		    $condition = "";
		    $no_rows = $db->getone("SELECT COUNT(*) FROM es_knowledge_articles WHERE kb_article_name = '".$kb_article_name."' 
										AND kb_category_id = ".$uid." AND es_knowledge_articlesid!=".$artid);
			if($no_rows>=1){$errormessage[0]="Article Already Exists";}
		}
		if (empty($blogDesc)) {
		$errormessage[1]="Enter Description";	  
		}
		if(count($errormessage)==0){
			$db->update("es_knowledge_articles","kb_article_name='".$kb_article_name."',kb_article_desc='".$blogDesc."'","es_knowledge_articlesid=".$artid);
			header("location:?pid=18&action=know_subcategory&uid=$uid&emsg=2");
			exit;
		}
}


if (isset($categorySearch) && $categorySearch !="") {
 $PageUrl = "&categorySearch=Search&searchkey=$searchkey";
	if($search_category=="")
	{
	$sel_classes    = "SELECT cat. *, art. * FROM es_knowledge_base cat, es_knowledge_articles art WHERE cat.status = 'active' AND  cat. es_knowledge_baseid = art.kb_category_id AND  (cat.kb_category like '%$searchkey%' or cat.kb_description like '%$searchkey%' or art.kb_article_name like '%$searchkey%' or art.kb_article_desc like '%$searchkey%')";
	}
	else
	{
	 $sel_classes    = "SELECT cat. *, art. * FROM es_knowledge_base cat, es_knowledge_articles art WHERE cat.status = 'active' AND   cat.kb_category like '%$search_category%' AND cat. es_knowledge_baseid = art.kb_category_id AND  (cat.kb_category like '%$searchkey%' or cat.kb_description like '%$searchkey%' or art.kb_article_name like '%$searchkey%' or art.kb_article_desc like '%$searchkey%' )";
	}
	$searchcriteria = getamultiassoc($sel_classes);

}
?><?php if($action == 'know_categ') { 
if(isset($categorySearch) && $categorySearch!=""){

if (empty($searchkey)) {
		$errormessage[1]="Please enter any keyword";	  
		}
		if ($errormessage==0)
		{
		
		}}
}
?>
<?php if($action == 'know_subcategory') { 
if(isset($categorySearch) && $categorySearch!=""){

if (empty($searchkey)) {
		$errormessage[1]="Please enter any keyword";	  
		}
		if ($errormessage==0)
		{
		
		}}
}
?>