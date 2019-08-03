<?php

sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addunit','unit_name','classesid','subjectid','searchunit','uid','book_name','book_file','book_desc','addbooklet','addbookletnew','bookletid','downloadfile','old_file','updatebooklet','subject_id');
$html_obj =new html_form();
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if(isset($addbookletnew)&& $addbookletnew!==""){
header('location: ./?pid=61&action=add');
exit;

}
if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("images/tutorials/".$downloadfile);
}
if($es_classesid!=""){
	$pageurl="&classesid=".$es_classesid;
	}
	if($es_subjectid!=""){
	$pageurl.="&subjectid=".$es_subjectid;
	}
if($action=="deletebooklet"){
$viewtutorial=$db->getRow("select * from es_booklets where booklet_id=".$bookletid);
if($viewtutorial['book_file']!=""){
unlink('images/tutorials/'.$viewtutorial['book_file']);
}	

			$db->delete('es_booklets','booklet_id=' . $bookletid); 
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booklets','TUTORIALS','ADD BOOKLET','".$bookletid."','BOOKLET DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
			header("location:?pid=61&action=list&emsg=3&classesid=".$classesid."&subjectid=".$subjectid."&searchunit=Submit");
			exit;
}

if($action=="viewbooklet" || $action=='print_view'){
	
	
	$viewbooklet = $db->getRow("SELECT b.*,c.es_classname,s.es_subjectname FROM `es_classes` c, `es_booklets` b, `es_subject` s WHERE b.subject_id=s.es_subjectid AND s.es_subjectshortname=c.es_classesid AND s.es_subjectid='".$subjectid."' AND c.es_classesid='".$classesid."' and b.booklet_id=".$bookletid);
	
	if($viewbooklet['user_type']=="staff"){
	
	$viewuserinfo=$db->getRow("select * from es_staff where es_staffid=".$viewbooklet['user_id']);
	$username=$viewuserinfo['st_firstname']	;	
	}	
	if($viewbooklet['user_type']=="admin"){
	$viewuserinfo=$db->getRow("select * from es_admins where es_adminsid=".$viewbooklet['user_id']);
	$username=$viewuserinfo['admin_fname'];
	}	
	
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booklets','TUTORIALS','ADD BOOKLET','".$bookletid."','BOOKLET VIEWED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
}


	if(isset($updatebooklet) && $updatebooklet!=""){
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($book_name)) {
		$errormessage[2]="Enter Title";	  
		}
		if ($old_file==0 && $_FILES['book_file']['tmp_name']=="" && $book_desc=="") {
		$errormessage[3]="Please Upload Document (OR) Enter Notes";	  
		}
		
		if($es_classesid!="" && $es_subjectid!="" && $book_name!=""){
		$count=$db->getOne("select * from es_booklets where subject_id =".$es_subjectid." AND book_name ='".$book_name."' AND booklet_id!=".$bookletid);
		if($count>0){
		$errormessage[4]="Book Name Already Exist";	  
		}
		}
		if($_FILES['book_file']['tmp_name']!=""){
		$extention=fileextension($_FILES['book_file']['name']);
}
      $allowed_formats = array("doc", "pdf", "docx");
				if ($_FILES['book_file']['tmp_name']!=""){
					if (!in_array($extention, $allowed_formats)){
						$errormessage['3']='Invalid File Format';

					}
				}
		
		if(count($errormessage)==0){
		
		if(is_uploaded_file($_FILES['book_file']['tmp_name'])) {	
			$ext=explode(".",$_FILES['book_file']['name']);
			$str=date("YmdHis").rand(5, 15);
			$new_thumbname =$ext[0]."_".$str.".".$extention;
			$updir = "images/tutorials/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['book_file']['tmp_name'],$uppath);
			$book_file=$new_thumbname;
			$con=",book_file ='" . $book_file . "'";
		} 
		$today=date("Y-m-d");
		$db->update('es_booklets', "subject_id 	 ='" . $es_subjectid 	 . "',book_name ='" . $book_name . "',book_desc ='" . $book_desc . "'".$con, 'booklet_id  =' . $bookletid);
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booklets','TUTORIALS','ADD BOOKLET','".$bookletid."','BOOKLET UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
			header("Location:?pid=61&action=list&emsg=2&searchunit=Submit".$pageurl);
	 		
	 		exit;
	}
	
	}
if($action=="edit" && !$_POST){
$bookletedit=$db->getRow("select * from es_booklets where booklet_id=".$bookletid);
$book_name=$bookletedit['book_name'];
$book_desc=$bookletedit['book_desc'];
$old_file=$bookletedit['book_file'];
}
	if(isset($addbooklet) && $addbooklet!=""){
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($book_name)) {
		$errormessage[2]="Enter Title";	  
		}
		if($es_classesid!="" && $es_subjectid!="" && $book_name!=""){
		$count=$db->getOne("select * from es_booklets where subject_id =".$es_subjectid." AND book_name ='".$book_name."'");
		if($count>0){
		$errormessage[4]="Book Name Already Exist";	  
		}
		}
		
		if ($_FILES['book_file']['tmp_name']=="" && $book_desc=="") {
		$errormessage[3]="Please Upload Document (OR) Enter Notes";	  
		}
		if($_FILES['book_file']['tmp_name']!=""){
		$extention=fileextension($_FILES['book_file']['name']);
}
      $allowed_formats = array("doc", "pdf", "docx");
				if ($_FILES['book_file']['tmp_name']!=""){
					if (!in_array($extention, $allowed_formats)){
						$errormessage['3']='Invalid File Format';

					}
				}
		
		if(count($errormessage)==0){
		
		if(is_uploaded_file($_FILES['book_file']['tmp_name'])) {	
			$ext=explode(".",$_FILES['book_file']['name']);
			$str=date("YmdHis").rand(5, 15);
			$new_thumbname =$ext[0]."_".$str.".".$extention;
			$updir = "images/tutorials/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['book_file']['tmp_name'],$uppath);
			$book_file=$new_thumbname;
		} 
		$today=date("Y-m-d");
		 $booklet_array = array(
							'subject_id' 	=> $es_subjectid,							
							'book_name' 	=> $book_name,
							'book_file' 	=> $book_file,
							'book_desc' 	=> $book_desc,
							'book_name' 	=> $book_name,
							'user_id'=>$_SESSION['eschools']['admin_id'],
							'user_type'=>'admin',
							'status' 	=> 'active',
							'created_on'	=> $today
						 );
			
			$booklet_array = stripslashes_deep($booklet_array);
			$rec_id=$db->insert('es_booklets',$booklet_array);
			
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booklets','TUTORIALS','ADD BOOKLET','".$rec_id."','BOOKLET ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
			header("Location:?pid=61&action=list&emsg=1");
	 		exit;
	}
	
	}

	
	if($action=='list' || $action=='print_list'){
	
	if(isset($searchunit) && $searchunit!=""){
	if (empty($classesid)) {
		$errormessage['classesid']="Select Class";	  
		}
		
		if (empty($subjectid)) {
		$errormessage['subjectid']="Select Subject";	  
		}
		if(count($errormessage)==0){

	if($subjectid !="" && $classesid!=""){
				
$unitsarr = $db->getRows("SELECT b.*,c.*,s.* FROM `es_classes` c, `es_booklets` b, `es_subject` s WHERE b.subject_id=s.es_subjectid AND s.es_subjectshortname=c.es_classesid AND s.es_subjectid='".$subjectid."' AND c.es_classesid='".$classesid."' ORDER BY `booklet_id` ASC");
		}
}
}
}
$classlistarr = $db->getRows("SELECT * FROM `es_classes` ORDER BY `es_classesid` ASC");

?>