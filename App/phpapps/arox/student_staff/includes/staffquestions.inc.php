<?php

sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addchapter','unit_id','classesid','subjectid','searchunit','uid','chapter_name','chid','chapter_id','tut_desc','file_path','question','choice_1','choice_2','choice_3','choice_4','answer','tutid','downloadfile','addtutorial','feed_dis','correct_ans','wrong_ans','updatequestion');
$html_obj =new html_form();

/**
* Only Admin users can view the pages
*/
checkuserinlogin();

if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("./images/tutorials/".$downloadfile);
}
if($es_classesid!=""){
	$pageurl="&classesid=".$es_classesid;
	}
	if($es_subjectid!=""){
	$pageurl.="&subjectid=".$es_subjectid;
	}
	if($unit_id!=""){
	$pageurl.="&unit_id=".$unit_id;
	
	}if($chapter_id!=""){
	$pageurl.="&chapter_id=".$chapter_id;
	}
if(isset($addtutorial)&& $addtutorial!==""){
header('location: ./?pid=39&action=add');
exit;

}

if($action=="deletetutorial"){
$viewtutorial=$db->getRow("select * from es_questionbank where q_id=".$tutid);
if($viewtutorial['file_path']!=""){
unlink('images/tutorials/'.$viewtutorial['file_path']);
}	
			$db->delete('es_questionbank','q_id=' . $tutid); 
			header("location:?pid=39&action=list&emsg=3&classesid=".$classesid."&subjectid=".$subjectid."&unit_id=".$unit_id."&chapter_id=".$chapter_id);
			exit;
}

if($action=="viewtutorial" || $action=='print_view'){
	
	
	$viewtutorial = $db->getRow("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_questionbank` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' and t.q_id='".$tutid."'");
	
	if($viewtutorial['user_type']=="staff"){
	
	$viewuserinfo=$db->getRow("select * from es_staff where es_staffid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['st_firstname']	;	
	}	
	if($viewtutorial['user_type']=="admin"){
	$viewuserinfo=$db->getRow("select * from es_admins where es_adminsid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['admin_fname'];
	}	
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
		if (empty($question)) {
		$errormessage[4]="Enter Question";	  
		}
		if($question!="" && $chapter_id!=""){
		$count=$db->getOne("select * from es_questionbank where chapter_id=".$chapter_id." AND question ='".$question."'");
		if($count>0){
		$errormessage[9]="Question already exist in this chapter";	  
		}
		}
		if (empty($choice_1)) {
		$errormessage[5]="Enter Answer A";	  
		}
		if (empty($choice_2)) {
		$errormessage[6]="Enter Answer B";	  
		}
		if (empty($choice_3)) {
		$errormessage[7]="Enter Answer C";	  
		}
		if (empty($choice_4)) {
		$errormessage[8]="Enter Answer D";	  
		}
		
		
		
		if(count($errormessage)==0){
		//array_print($_POST); exit;
		
		
		$today=date("Y-m-d");
		 $tutorials_array = array(
							'chapter_id'=> $chapter_id,
							'question' 	=> $question,	
							'choice_1' 	=> $choice_1,
							'choice_2' 	=> $choice_2,
							'choice_3' 	=> $choice_3,
							'choice_4' 	=> $choice_4,
							'answer' 	=> $answer,
							'feed_dis' 	=> $feed_dis,
							'correct_ans' 	=> $correct_ans,
							'wrong_ans' 	=> $wrong_ans,
							'user_id'   =>$_SESSION['eschools']['user_id'],
							'user_type' =>'staff',
							'status' 	=> 'Active',
							'created_on'=> $today
						 );
			$tutorials_array = stripslashes_deep($tutorials_array);
			$db->insert('es_questionbank',$tutorials_array);
			header("Location:?pid=39&action=list&emsg=1");
	 		exit;
	}
	}
	
	if(isset($updatequestion) && $updatequestion!=""){
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
		if (empty($question)) {
		$errormessage[4]="Enter Question";	  
		}
		if($question!="" && $chapter_id!=""){
		$count=$db->getOne("select * from es_questionbank where chapter_id=".$chapter_id." AND question ='".$question."' and q_id!=".$tutid);
		if($count>0){
		$errormessage[9]="Question already exist in this chapter";	  
		}
		} 
		if (empty($choice_1)) {
		$errormessage[5]="Enter Answer A";	  
		}
		if (empty($choice_2)) {
		$errormessage[6]="Enter Answer B";	  
		}
		if (empty($choice_3)) {
		$errormessage[7]="Enter Answer C";	  
		}
		if (empty($choice_4)) {
		$errormessage[8]="Enter Answer D";	  
		}
		if(count($errormessage)==0){
		if($feed_dis=="No"){
		$correct_ans="";
		$wrong_ans="";
		}
	$db->update('es_questionbank', "chapter_id ='" . $chapter_id . "',question ='" . $question . "',choice_1 ='" . $choice_1 . "',choice_2 ='" . $choice_2 . "',choice_3 ='" . $choice_3 . "',choice_4 ='" . $choice_4 . "',answer ='" . $answer . "',feed_dis ='" . $feed_dis . "',correct_ans ='" . $correct_ans . "',wrong_ans ='" . $wrong_ans . "'", 'q_id =' . $tutid);
		header("Location:?pid=39&action=list&emsg=2&searchunit=Submit".$pageurl);
	 	exit;
	}
	}
if($action=="edit" && !$_POST){
	$rs_editphoto=$db->getRow("select * from es_questionbank where q_id=".$tutid);
	$feed_dis=$rs_editphoto['feed_dis'];
	$answer=$rs_editphoto['answer'];
	}
	if($action=='list' || $action=='print_list'){
	if(isset($searchunit) && $searchunit!=""){
	if (empty($classesid)) {
		$errormessage['classesid']="Select Class";	  
		}
		
		if (empty($subjectid)) {
		$errormessage['subjectid']="Select Subject";	  
		}
		if (empty($unit_id)) {
		$errormessage['unit_id']="Select Unit";	  
		}
		if (empty($chapter_id)) {
		$errormessage['chapter_id']="Select Chapter";	  
		}
		$PageUrl = "&searchunit=Submit&classesid=$classesid&subjectid=$subjectid&unit_id=$unit_id&chapter_id=$chapter_id";
		if(count($errormessage)==0){
	if($subjectid !="" && $classesid!="" && $unit_id!="" && $chapter_id!="" ){
	
	$unitsarr = $db->getRows("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_questionbank` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' ORDER BY `q_id` DESC");
		}
		}}

}
$classlistarr = $db->getRows("SELECT * FROM `es_classes` ORDER BY `es_classesid` ASC");
?>