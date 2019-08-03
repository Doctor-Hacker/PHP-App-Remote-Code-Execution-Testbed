<?php 
sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addchapter','unit_id','classesid','subjectid','searchunit','uid','chapter_name','chid','chapter_id','tut_desc','file_path','title','tutid','downloadfile','addtutorial','summary','lesson','old_file','updatetutorial');
$html_obj =new html_form();
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
/**End of the permissions   **/
if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("../office_admin/images/tutorials/".$downloadfile);
}
if($classesid){
	$pageurl="&classesid=".$classesid;
	}
	if($subjectid){
	$pageurl.="&subjectid=".$subjectid;
	}
	if($unit_id){
	$pageurl.="&unit_id=".$unit_id;
	}if($chapter_id){
	$pageurl.="&chapter_id=".$chapter_id;
	}


if(isset($addtutorial)&& $addtutorial!==""){
header('location: ./?pid=36&action=add');
exit;

}
if($action=="deletetutorial"){
$viewtutorial=$db->getRow("select * from es_tutorials where tut_id=".$tutid);
if($viewtutorial['file_path']!=""){
unlink('images/tutorials/'.$viewtutorial['file_path']);
}	
			$db->delete('es_tutorials','tut_id=' . $tutid); 
			header("location:?pid=36&action=list&emsg=3&classesid=".$classesid."&subjectid=".$subjectid."&unit_id=".$unit_id."&chapter_id=".$chapter_id);
			exit;
}

if($action=="viewtutorial" || $action=='print_view'){
	
	
	$viewtutorial = $db->getRow("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_tutorials` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' and t.tut_id='".$tutid."'");
	
	if($viewtutorial['user_type']=="staff"){
	
	$viewuserinfo=$db->getRow("select * from es_staff where es_staffid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['st_firstname']	;	
	}	
	if($viewtutorial['user_type']=="admin"){
	$viewuserinfo=$db->getRow("select * from es_admins where es_adminsid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['admin_fname'];
	}	
}
if($action=='createnew' && !$_POST){
	$viewtutorial = $db->getRow("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_tutorials` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' and t.tut_id='".$tutid."'");
	$es_classesid = $viewtutorial['es_classesid'];
	$es_subjectid = $viewtutorial['es_subjectid'];
	$unit_id = $viewtutorial['unit_id'];
	
	$chapter_id = $viewtutorial['chapter_id'];
	$tut_desc = $viewtutorial['tut_desc'];
	$lesson = $viewtutorial['lesson'];
	$summary = $viewtutorial['summary'];
	
}


	if(isset($addchapter) && $addchapter!=""){
	
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($unit_id)) {
		$errormessage[2]="Select Unit";	  
		}
		if (empty($chapter_id)) {
		$errormessage[3]="Select Chapter";	  
		}
		if (empty($title)) {
		$errormessage[4]="Enter Title";	  
		}
		
		if ($_FILES['file_path']['tmp_name']=="" && $tut_desc=="") {
		$errormessage[5]="Please Upload Document (OR) Enter Description";	  
		}
		if($_FILES['file_path']['tmp_name']!=""){
		$extention=fileextension($_FILES['file_path']['name']);
}
      $allowed_formats = array("doc", "pdf", "xdoc", "docx");
				if ($_FILES['file_path']['tmp_name']!=""){
					if (!in_array($extention, $allowed_formats)){
						$errormessage['5']='Invalid File Format';

					}
				}
				if($es_classesid!="" && $es_subjectid!="" && $unit_id!="" && $chapter_id !="" && $title!=""){
		$count=$db->getOne("select * from es_tutorials where chapter_id=".$chapter_id." AND  title ='".$title." '");
		if($count>0){
		$errormessage[9]="Title Already Exist";	  
		}
		}
		
		if(count($errormessage)==0){
		 //$newname = filename($upldfile['name'])."_".date("YmdHis").rand(5, 15).".".fileextension($upldfile['name']);
		
		if(is_uploaded_file($_FILES['file_path']['tmp_name'])) {	
			$ext=explode(".",$_FILES['file_path']['name']);
			$str=date("YmdHis").rand(5, 15);
			$new_thumbname =$ext[0]."_".$str.".".$extention;
			$updir = "../office_admin/images/tutorials/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['file_path']['tmp_name'],$uppath);
			$file_path=$new_thumbname;
		}elseif(isset($old_file) && $old_file=="YES"){
		$filepath = $db->getRow("SELECT * FROM  `es_tutorials`  WHERE tut_id='".$tutid."'");
		$file_path = $filepath['file_path'];
		} 
		$today=date("Y-m-d");
		 $tutorials_array = array(
							'chapter_id' 	=> $chapter_id,
							'title' 	=> $title,	
							'file_path' => $file_path,
							'user_id'   =>$_SESSION['eschools']['user_id'],
							'user_type' =>'staff',
							'tut_desc' 	=> $tut_desc,
							'lesson' 	=> $lesson,
							'summary' 	=> $summary,							
							'status' 	=> 'Active',
							'created_on'	=> $today,
							
						 );
			$tutorials_array = stripslashes_deep($tutorials_array);
			$db->insert('es_tutorials',$tutorials_array);
			header("Location:?pid=36&action=list&emsg=1");
	 		exit;
	}
	}
	
	
	
	
	if(isset($updatetutorial) && $updatetutorial!=""){
	
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($unit_id)) {
		$errormessage[2]="Select Unit";	  
		}
		if (empty($chapter_id)) {
		$errormessage[3]="Select Chapter";	  
		}
		if (empty($title)) {
		$errormessage[4]="Enter Title";	  
		}
		if(!isset($old_file) && $_FILES['file_path']['tmp_name']==""){
		if ($_FILES['file_path']['tmp_name']=="" && $tut_desc=="" && $lesson=="" && $summary=="") {
		$errormessage[5]="Please Upload Document (OR) Enter Notes";	  
		}
		}
		if($_FILES['file_path']['tmp_name']!=""){
		$extention=fileextension($_FILES['file_path']['name']);
}
      $allowed_formats = array("doc", "pdf", "xdoc", "docx");
				if ($_FILES['file_path']['tmp_name']!=""){
					if (!in_array($extention, $allowed_formats)){
						$errormessage['5']='Invalid File Format';

					}
				}
		$count=$db->getOne("select * from es_tutorials where chapter_id=".$chapter_id." AND  title ='".$title." ' AND tut_id!=".$tutid);
		if($count>0){
		$errormessage[9]="Title Already Exist";	  
		}
		
		if(count($errormessage)==0){
		 //$newname = filename($upldfile['name'])."_".date("YmdHis").rand(5, 15).".".fileextension($upldfile['name']);
		
		if(is_uploaded_file($_FILES['file_path']['tmp_name'])) {	
			$ext=explode(".",$_FILES['file_path']['name']);
			$str=date("YmdHis").rand(5, 15);
			$new_thumbname =$ext[0]."_".$str.".".$extention;
			$updir = "images/tutorials/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['file_path']['tmp_name'],$uppath);
			$file_path=$new_thumbname;
			
		}elseif(isset($old_file)){
		
		$file_path = $old_file;
		}  
		$today=date("Y-m-d");
		
		 $db->update('es_tutorials', "chapter_id ='" . $chapter_id . "',title ='" . $title . "',tut_desc ='" . $tut_desc . "',lesson ='" . $lesson . "',summary ='" . $summary . "',file_path ='" . $file_path . "'", 'tut_id =' . $tutid);
			header("Location:?pid=36&action=list&emsg=2&searchunit=Submit".$pageurl);
	 		exit;

	}
	}
if($action=='edit' && !$_POST){
	$viewtutorial = $db->getRow("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_tutorials` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' and t.tut_id='".$tutid."'");
	$es_classesid = $viewtutorial['es_classesid'];
	$es_subjectid = $viewtutorial['es_subjectid'];
	$unit_id = $viewtutorial['unit_id'];
	$title=$viewtutorial['title'];
	$chapter_id = $viewtutorial['chapter_id'];
	$tut_desc = $viewtutorial['tut_desc'];
	$lesson = $viewtutorial['lesson'];
	$summary = $viewtutorial['summary'];
	$old_file=$viewtutorial['file_path'];
}
	
	if($action=='list' || $action=='print_list'){
	if(isset($searchunit) && $searchunit!=""){
	$PageUrl = "&searchunit=Submit";
	if (empty($classesid)) {
		$errormessage['classesid']="Select Class";
		 
		}
		$PageUrl .= "&classesid=$classesid";	 
		
		if (empty($subjectid)) {
		$errormessage['subjectid']="Select Subject";
			  
		}
		$PageUrl .= "&subjectid=$subjectid";
		if (empty($unit_id)) {
		$errormessage['unit_id']="Select Unit";	  
		
		}
		$PageUrl .= "&unit_id=$unit_id";
		if (empty($chapter_id)) {
		$errormessage['chapter_id']="Select Chapter";	
		
		}
		$PageUrl .= "&chapter_id=$chapter_id";  
		if(count($errormessage)==0){
	if($subjectid !="" && $classesid!="" && $unit_id!="" && $chapter_id!="" ){
	
	$unitsarr = $db->getRows("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_tutorials` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' and c.status!='deleted' ORDER BY `tut_id` ASC");
		}
		}
		}

}
$classlistarr = $db->getRows("SELECT * FROM `es_classes` ORDER BY `es_classesid` ASC");
?>