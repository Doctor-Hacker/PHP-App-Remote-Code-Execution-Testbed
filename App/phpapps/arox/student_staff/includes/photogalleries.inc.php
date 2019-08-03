<?php

sm_registerglobal('pid', 'action','emsg','addphoto','image_path','title','id','status','start','hiddenimage','updatephoto','actionedit','album_cover','new_album_cover','addalbum','addphototoalbm','addalbums','apid','backtoalbum','starttwo','back');

/**
* Only Admin users can view the pages
*/
checkuserinlogin();
//
$all_albarray   = "SELECT * FROM es_photogallery  WHERE pid=0 and status!='Deleted'"; 
	$rs_all_albumsarray = $db->getRows($all_albarray);
	foreach($rs_all_albumsarray as $albm){
	
	$albmarray[$albm['id']]= ucfirst($albm['title']);
	
	
	
	}
	
$html_obj =new html_form();

if(isset($addalbums)&& $addalbums!==""){
header('location: ./?pid=41&action=addalbum');
exit;

}

if(isset($backtoalbum)&& $backtoalbum!==""){
header("location: ./?pid=41&action=albumlist&start=$starttwo");
exit;

}

if(isset($back)&& $back!==""){
header("location: ./?pid=41&action=albumlist");
exit;

}

if(isset($addphototoalbm)&& $addphototoalbm!==""){
header('location: ./?pid=41&action=add');
exit;

}

if(isset($addalbum)&& $addalbum!=""){

if($title==""){
$errormessage['title']='Enter Album Title';
}
if(count($errormessage)==0){
$today=date("Y-m-d");

$album_array = array(
							'pid' 	=> 0,
							'title' 		=> stripslashes($title),
							'status' 		=> 'Active',
							'created_on' 	=> $today
						 );
						
			$db->insert('es_photogallery',$album_array);
			header("location:?pid=41&action=albumlist&emsg=1");
			exit;

}

}


if($action=="updatestatus"){
 if($status == 'Active'){$newstatus='Inactive';}else{$newstatus='Active';}
		$db->update('es_photogallery', "status ='" . $newstatus ."'  ",'id=' . $id); 
		header("location:?pid=41&action=gallerylist&emsg=33");
			exit;

}
if($action=="delete"){

$updir = "images/student_photos/";
 $editphoto   = "SELECT * FROM  es_photogallery  WHERE id=".$id; 
$rs_editphoto  = $db->getRow($editphoto );
unlink($updir.$rs_editphoto['image_path']);
		$db->delete('es_photogallery','id=' . $id); 
		header("location:?pid=41&action=gallerylist&emsg=3&apid=$apid&start=$start&starttwo=$starttwo");
			exit;

}

if($action=="deletealbum"){
		$db->delete('es_photogallery','id=' . $id); 
		header("location:?pid=41&action=albumlist&emsg=3&start=$start");
			exit;

}
if(isset($addphoto)&& $addphoto!=""){

if($apid==""){
$errormessage['apid']='Select Album ';
}



if($title==""){
$errormessage['title']='Enter Photo Title';
}





$image = $_FILES['image_path']['name'];
if($image==""){
$errormessage['image_path']='Upload Image';
}

$extention=fileextension($_FILES['image_path']['name']);

$allowed_formats = array("jpg", "png", "jpeg", "gif","bmp");
				if ($_FILES['image_path']['tmp_name']!=""){
					if (!in_array($extention, $allowed_formats)){
						$errormessage['image_path']='Upload Image';

					}
				}

if(count($errormessage)==0){


if(is_uploaded_file($_FILES['image_path']['tmp_name'])) {	
			$ext=explode(".",$_FILES['image_path']['name']);
			$str=date("mdY_hms");
			$new_thumbname = "gallery_".$str."_".$ext[0].".".$ext[1];
			$updir = "images/student_photos/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['image_path']['tmp_name'],$uppath);
			$imagepath=$new_thumbname;
			
		} else {
			$imagepath = "userphoto.gif";
		}
		
	$today=date("Y-m-d");
	
 $photo_array = array(
							'pid' 	=> $apid,
							'title' 		=> stripslashes($title),
							'image_path' 	=> $imagepath,
							'status' 		=> 'Active',
							'created_on' 	=> $today
						 );
						
			$db->insert('es_photogallery',$photo_array);
			header("location:?pid=41&action=albumlist&emsg=1");
			exit;

}

}

if(isset($updatephoto)&& $updatephoto!=""){

if($title==""){
$errormessage['title']='Enter image Title';
}

if($album_cover==""){
$errormessage['album_cover']='Select Album ';
}



if($hiddenimage==""){
		if ($_FILES['image_path']['name']==""){
			 $errormessage['image_path']='Upload Image';
		
		}
		}
		
$allowed_formats = array("jpg", "png", "jpeg", "gif","bmp");
			if ($_FILES['image_path']['tmp_name']!=""){
				$extention=fileextension($_FILES['image_path']['name']);
					if (!in_array($extention, $allowed_formats)){
						$errormessage['image_path']='Upload Image';
					
				}
			}


if(count($errormessage)==0){
		if(is_uploaded_file($_FILES['image_path']['tmp_name'])) {	
			$ext=explode(".",$_FILES['image_path']['name']);
			$str=date("mdY_hms");
			$new_thumbname = "student_".$str."_".$ext[0].".".$ext[1];
			$updir = "images/student_photos/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['image_path']['tmp_name'],$uppath);
			unlink($updir.$hiddenimage);
			$imagepath=$new_thumbname;
		} else{
		$imagepath = $hiddenimage; 
		}
	
	if($album_cover=="others"){
	
	$insert_cover = ucwords(strtolower($new_album_cover));
	} else {
	
	$insert_cover = $album_cover;	
	}
		
	$update_arr = array($title, $imagepath);
	$db->update('es_photogallery', "album_cover ='" . $insert_cover ."' , title ='" . $title ."' , image_path ='" . $imagepath ."' ",'id=' . $id); 
	header("location:?pid=41&action=gallerylist&emsg=2&start=".$start);
	exit;

}

}
if($actionedit=="edit"){
 $editphoto   = "SELECT * FROM  es_photogallery  WHERE id=".$id; 
$rs_editphoto  = $db->getRow($editphoto );
}

if($action=="gallerylist"  || $action=='print_photo'){
$no_photos  = sqlnumber("select * from es_photogallery where pid=".$apid." and status !='Deleted'");
 	$q_limit     =15;
	$orderby     = 'id';
	$start = (isset($start))?$start:0;	
	
   $allphotos   = "SELECT * FROM  es_photogallery  WHERE  pid=".$apid." and status!='Deleted' ORDER BY  " . $orderby . " DESC  LIMIT " . $start . ", " . $q_limit . ""; 
     $photo_arr  = $db->getRows($allphotos );
	
	 $albumname=$db->getRow("select * from es_photogallery where id=".$apid);

	
}

if($action=="albumlist" || $action=='print_album'){
$no_albums  = sqlnumber("select * from es_photogallery where pid=0 and status !='Deleted'");
 	$q_limit     = 15;
	$orderby     = 'id';
	$start = (isset($start))?$start:0;	
	
 $all_albums   = "SELECT * FROM  es_photogallery  WHERE pid=0 and status!='Deleted' ORDER BY  " . $orderby . " DESC  LIMIT " . $start . ", " . $q_limit . ""; 
	$rs_all_albums  = $db->getRows($all_albums );

	
}
if($action=='print_photo_single'){

$photo_det = $db->getrow("SELECT * FROM es_photogallery WHERE id=".$id);

}

?>