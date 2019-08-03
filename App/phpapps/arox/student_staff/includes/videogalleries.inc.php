<?php

sm_registerglobal('pid', 'action','emsg','addphoto','image_path','title','id','status','start','hiddenimage','updatephoto','actionedit');

/**
* Only Admin users can view the pages
*/
checkuserinlogin();
//
$html_obj =new html_form();

if($action=="updatestatus"){
 if($status == 'Active'){$newstatus='Inactive';}else{$newstatus='Active';}
		$db->update('es_videogallery', "status ='" . $newstatus ."'  ",'id=' . $id); 
		header("location:?pid=32&action=gallerylist&emsg=33");
			exit;

}
if($action=="delete"){
		$db->delete('es_videogallery','id=' . $id); 
		header("location:?pid=32&action=gallerylist&emsg=3");
			exit;

}
if(isset($addphoto)&& $addphoto!=""){

if($title==""){
$errormessage['title']='Enter Video Title';
}


if($image_path==""){
$errormessage['image_path']='Enter Embed Code';
}



if(count($errormessage)==0){
	 $today=date("Y-m-d");
	 $photo_array = array(
								'title' 	=> stripslashes($title),
								'image_path' 	=> $image_path,
								'status' 		=> 'Active',
								'created_on' 	=> $today
							 );
			$db->insert('es_videogallery',$photo_array);
			header("location:?pid=32&action=gallerylist&emsg=1");
			exit;

}

}

if(isset($updatephoto)&& $updatephoto!=""){

if($title==""){
$errormessage['title']='Enter image Title';
}

if($image_path==""){
$errormessage['image_path']='Enter Embed Code';
		}


if(count($errormessage)==0){
		
		
	$db->update('es_videogallery', "title ='" . $title ."' , image_path ='" . $image_path ."' ",'id=' . $id); 
	header("location:?pid=32&action=gallerylist&emsg=2&start=".$start);
	exit;

}

}


if($action=="gallerylist"){
if($actionedit=="edit"){

 $editphoto   = "SELECT * FROM  es_videogallery  WHERE id=".$id; 
$rs_editphoto  = $db->getRow($editphoto );
}

$no_rows  = sqlnumber("select * from es_videogallery where status !='Deleted'");
 	$q_limit     = 20;
	$orderby     = 'id';
	$start = (isset($start))?$start:0;	
	
 $allphotos   = "SELECT * FROM  es_videogallery  WHERE  status!='Deleted' ORDER BY  " . $orderby . " DESC  LIMIT " . $start . ", " . $q_limit . ""; 
	$rs_photos  = $db->getRows($allphotos );

}
?>