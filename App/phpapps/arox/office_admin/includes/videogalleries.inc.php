<?php

sm_registerglobal('pid', 'action','emsg','addphoto','image_path','title','id','status','start','hiddenimage','updatephoto','actionedit');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
//
$html_obj =new html_form();

if($action=="updatestatus"){
 if($status == 'Active'){$newstatus='Inactive';}else{$newstatus='Active';}
		$db->update('es_videogallery', "status ='" . $newstatus ."'  ",'id=' . $id); 
		
		
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_videogallery','VIDEOS',' ','".$id."','STATUS OF VIDEOS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
		
		
		header("location:?pid=56&action=gallerylist&emsg=33");
			exit;

}
if($action=="delete"){
		$db->delete('es_videogallery','id=' . $id); 
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_videogallery','VIDEOS',' ','".$id."','DELETE VIDEOS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
		header("location:?pid=56&action=gallerylist&emsg=3");
			exit;

}
if(isset($addphoto)&& $addphoto!=""){

if($title==""){
$errormessage['title']='Enter Video Title';
}


if($image_path==""){
$errormessage['image_path']='Enter Video Path';
}



if(count($errormessage)==0){

		$image_path_explode1 = explode('<embed src=\"',$image_path);
		
		$image_path_explode2 = explode('\" type=\"application/x-shockwave-flash\"',$image_path_explode1[1]);
		
	$today=date("Y-m-d");
 $photo_array = array(
							'title' 	=> stripslashes($title),
							'image_path' 	=> $image_path_explode2[0],
							'status' 		=> 'Active',
							'created_on' 	=> $today
						 );
						 $photo_array = stripslashes_deep($photo_array);
			$id=$db->insert('es_videogallery',$photo_array);
			
					
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_videogallery','VIDEOS',' ','".$id."','ADD VIDEOS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
		
			
			header("location:?pid=56&action=gallerylist&emsg=1");
			exit;

}

}

if(isset($updatephoto)&& $updatephoto!=""){

if($title==""){
$errormessage['title']='Enter image Title';
}

if($image_path==""){
$errormessage['image_path']='Enter Video Path';
		}


if(count($errormessage)==0){
		
		
	$db->update('es_videogallery', "title ='" . $title ."' , image_path ='" . $image_path ."' ",'id=' . $id); 
	header("location:?pid=56&action=gallerylist&emsg=2&start=".$start);
	exit;

}

}


if($action=="gallerylist"){
if($actionedit=="edit"){

 $editphoto   = "SELECT * FROM  es_videogallery  WHERE id=".$id; 
$rs_editphoto  = $db->getRow($editphoto );
}

$no_rows  = sqlnumber("select * from es_videogallery where status !='Deleted'");
 	$q_limit  = PAGENATE_LIMIT;
	$orderby     = 'id';
	$start = (isset($start))?$start:0;	
	
   $allphotos   = "SELECT * FROM  es_videogallery  WHERE  status!='Deleted' ORDER BY  " . $orderby . " DESC  LIMIT " . $start . ", " . $q_limit . ""; 
	$rs_photos  = $db->getRows($allphotos );
   
}
?>