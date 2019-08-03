<?php

sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addchapter','unit_id','classesid','subjectid','searchunit','uid','chapter_name','chid','chapter_id','tut_desc','file_path','question','choice_1','choice_2','choice_3','choice_4','answer','tutid','downloadfile','addtutorial','start','q_id','submit_question','searchunit','qans','qid');
$html_obj =new html_form();

/**
* Only Admin users can view the pages
*/
checkuserinlogin();

if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("./images/tutorials/".$downloadfile);
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

if($action=="viewtutorial"){
	
	
	$viewtutorial = $db->getRow("SELECT c.*,u.*,t.* FROM `es_chapters` c,`es_units` u, `es_questionbank` t  WHERE c.unit_id=u.unit_id  AND c.chapter_id=t.chapter_id AND c.unit_id='".$unit_id."' AND t.chapter_id='".$chapter_id."' and t.q_id='".$tutid."'");
	
	if($viewtutorial['user_type']=="staff"){
	
	$viewuserinfo=$db->getRow("select * from es_staff where es_staffid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['st_username']	;	
	}	
	if($viewtutorial['user_type']=="admin"){
	$viewuserinfo=$db->getRow("select * from es_admins where es_adminsid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['admin_username'];
	}	
}




	
	if($action=='list'){
		//array_print($_POST);
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
		if(count($errormessage)==0){
		if($subjectid !="" && $classesid!="" && $unit_id!="" && $chapter_id!="" ){	
			$_SESSION['eschools']['exam']['chapter']= $chapter_id;
			unset($_SESSION['eschools']['exam']['question']);	
			unset($_SESSION['eschools']['exam']['correctanswer']);		
			header("Location:?pid=40&action=chapterexam");
			exit;
		}
		//array_print($_SESSION['eschools']['answer']);	
		}
		}
	}
	$classlistarr = $db->getRows("SELECT * FROM `es_classes` ORDER BY `es_classesid` ASC");

// Exam 
	if($action=='chapterexam' && $_SESSION['eschools']['exam']['chapter']!=""){
	if(!isset($start)){$start=0;}
		$q_limit = 1;
		$tot_sel_qst = "SELECT count(*) FROM `es_classes` c, `es_subject` s, `es_units` u, `es_chapters` ch, `es_questionbank` qb
						WHERE c.es_classesid = s.es_subjectshortname
						AND s.es_subjectid = u.es_subjectid
						AND u.unit_id = ch.unit_id
						AND ch.chapter_id = qb.chapter_id
						AND qb.chapter_id = '".$_SESSION['eschools']['exam']['chapter']."'
						ORDER BY `q_id` ASC";
		$tot_questions = $db->getOne($tot_sel_qst);
		$sel_qst = "SELECT qb.*,c.es_classname,s.es_subjectname,u.unit_name,ch.chapter_name
					FROM `es_classes` c, `es_subject` s, `es_units` u, `es_chapters` ch, `es_questionbank` qb
					WHERE c.es_classesid = s.es_subjectshortname
					AND s.es_subjectid = u.es_subjectid
					AND u.unit_id = ch.unit_id
					AND ch.chapter_id = qb.chapter_id
					AND qb.chapter_id = '".$_SESSION['eschools']['exam']['chapter']."'
					ORDER BY `q_id` ASC LIMIT ".$start.",".$q_limit."";
		
		$no_records = sqlnumber($sel_qst);
		$unitsarr = $db->getRow($sel_qst);
		
		//echo $start;
			if(isset($submit_question) && $submit_question!=""){
			
			$nextquesstart = $start+1;
			
			
				if(isset($answer) && $answer!=""){
				
					$answer_arr[$q_id] = $answer;
					$qb_question_id = $unitsarr['q_id'];
					$_SESSION['eschools']['exam']['question'][$qb_question_id] = $answer;
					$_SESSION['eschools']['exam']['correctanswer'][$qb_question_id] = $unitsarr['answer'];
					
									
				}
				if($nextquesstart==$tot_questions){
				header("Location:?pid=40&action=showresult");
				exit;
				}
				header("Location:?pid=40&action=chapterexam&start=".$nextquesstart);
				exit;
			}
	}
	
	if($action=='showresult' || $action=='printresult' || $action=='printresult1'){
	if(!isset($start)){$start=0;}
		$q_limit = 1;
		$tot_sel_qst = "SELECT count(*) FROM `es_classes` c, `es_subject` s, `es_units` u, `es_chapters` ch, `es_questionbank` qb
						WHERE c.es_classesid = s.es_subjectshortname
						AND s.es_subjectid = u.es_subjectid
						AND u.unit_id = ch.unit_id
						AND ch.chapter_id = qb.chapter_id
						AND qb.chapter_id = '".$_SESSION['eschools']['exam']['chapter']."'
						ORDER BY `q_id` ASC";
		$tot_questions = $db->getOne($tot_sel_qst);
		$sel_qst = "SELECT qb.*,c.es_classname,s.es_subjectname,u.unit_name,ch.chapter_name
					FROM `es_classes` c, `es_subject` s, `es_units` u, `es_chapters` ch, `es_questionbank` qb
					WHERE c.es_classesid = s.es_subjectshortname
					AND s.es_subjectid = u.es_subjectid
					AND u.unit_id = ch.unit_id
					AND ch.chapter_id = qb.chapter_id
					AND qb.chapter_id = '".$_SESSION['eschools']['exam']['chapter']."'
					ORDER BY `q_id` ASC LIMIT ".$start.",".$q_limit."";
		
		$no_records = sqlnumber($sel_qst);
		$unitsarr = $db->getRow($sel_qst);
		$correct_answers = 0;
		
		if(count($_SESSION['eschools']['exam']['question'])>0){
		foreach($_SESSION['eschools']['exam']['question'] as $each_key=>$each_value){	
			
			if($_SESSION['eschools']['exam']['correctanswer'][$each_key] == $each_value){
			$correct_answers++;
			}
			}
		}
		
		$tot_fed_sql = "SELECT qb.*,c.es_classname,s.es_subjectname,u.unit_name,ch.chapter_name
						FROM `es_classes` c, `es_subject` s, `es_units` u, `es_chapters` ch, `es_questionbank` qb
						WHERE c.es_classesid = s.es_subjectshortname
						AND s.es_subjectid = u.es_subjectid
						AND u.unit_id = ch.unit_id
						AND ch.chapter_id = qb.chapter_id
						AND qb.chapter_id = '".$_SESSION['eschools']['exam']['chapter']."'
						AND qb.feed_dis = 'Yes'
						ORDER BY `q_id` ASC";
		$tot_fed_questions = $db->getRows($tot_fed_sql);
		
	}

?>