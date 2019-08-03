<?php
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','es_staffid','subject','message','submit_staff','submit_student','es_classesid','es_preadmissionid','es_adminsid','keyword','search','admin_phoneno','st_prmobno','pre_mobile1','sms_date', 'hw_class', 'hw_homework', 'sendHomework', 'a_text', 'sendtoall');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}


$obj_classlist    = new es_classes();
$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
$class_list['all'] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}

$allstaff = $db->getrows("SELECT * FROM  es_staff  where st_prmobno!='' AND status='added' AND selstatus='accepted' AND tcstatus='notissued' ORDER BY es_staffid Desc");
$staff_list=array(""=>"Select");
if(count($allstaff)>0){
foreach($allstaff as $each_staff){
$staff_list[$each_staff['st_prmobno']]= $each_staff['st_firstname'].'&nbsp;&lt;'. $each_staff['es_staffid'] . '&gt;';
}
}


$alladmins = $db->getrows("SELECT * FROM es_admins ORDER BY es_adminsid ASC");
if(count($alladmins)>0){

foreach($alladmins as $each_admin){
$alladmins_arr[$each_admin['admin_phoneno']]= $each_admin['admin_fname'].'&nbsp;&lt;'. $each_admin['admin_username'] . '&gt;';
}
}
//array_print($alladmins_arr);

if($action=='smstoadmin'){
	if(isset($submit_staff) && $submit_staff!=''){
	    if($admin_phoneno==''){ $errormessage['admin_phoneno'] = "Select Name";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		if(count($errormessage)==0){

	   	$smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
    $api = $_POST['api'];
	$uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$msg = $_POST['message'];
    $authkey = $_POST['authkey'];
	$text = $message;
// The word we want to replace
$oldWord = "&";
// The new word we want in place of the old one
$newWord = " and ";
// Run through the text and replaces all occurrences of $oldText
$text1 = str_replace($oldWord , $newWord , $text);
// Display the new text
$count=strlen($text1);
for($i=0;$i<$count;$i++){
	if(ord($text1[$i])== 32)
	{
	$text1[$i]='$';
	}
	$finalword.=$text1[$i];
}
 $text3 = str_replace('$' , '%20' , $finalword);



$j=0;
for($i=0;$i<count($admin_phoneno);$i++){

	if($i==0){
	$numbers_arr[$j] =  "91".$admin_phoneno[$i];
	continue;
	}

		if($i%100 == 0){
			$j++;
			$numbers_arr[$j] =  "91".$admin_phoneno[$i];
		} else {
			$numbers_arr[$j] =  $numbers_arr[$j].",91".$admin_phoneno[$i];
		}

}

for($k=0;$k<count($numbers_arr);$k++){

 //echo $url = "http://api.mVaayoo.com/mvaayooapi/MessageCompose?UserName=".MOBILE_USERNAME."&password=".MOBILE_PASSWORD."&MobileNo=".$numbers_arr[$k]."&SenderID=".MOBILE_SENDER_ID."&CDMAHeader=".CDMA_HEADER."&Message=".$text3."&isFlash=false";
/* if(function_exists('curl_init')){
*/	/*	$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$request_result = curl_exec ($curl);
        $request_result;
		curl_close ($curl);*/
	/*
$ch = curl_init();
echo curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=mVaayoo&receipientno=919849558211&msgtxt=".$text3."&state=4");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$sender
ID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{  }
curl_close($ch);

	*/	/*}*/

 $ch = curl_init();
curl_setopt($ch,CURLOPT_URL,  "http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=evanshss&password=evanshss@1234&msisdn=".$numbers_arr[$k]."&sid=EVANSH&msg=".$text3."&fl=0&gwid=2");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "authkey=".$smsdetails[authkey]."&mobiles=".$numbers_arr[$k]."&message=".$text3."&sender=".$smsdetails[senderid]."&route=2");
  //curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
  $buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{  }
curl_close($ch);

}
				header("location:?pid=62&action=$action&emsg=34");
				exit;

		}
	}


}

if($action=='smstostaff'){
	if(isset($submit_staff) && $submit_staff!=''){


		if(count($st_prmobno)>0){
	$mess=0;
	foreach($st_prmobno as $key=>$value){
	if($value==""){
	$mess++;
	}
	}
	}
 if(count($st_prmobno)==0)
 {
  $errormessage['st_prmobno'] = "Select Staff";
 }
 if($mess>0){
  $errormessage['st_prmobno'] = "Select Staff";
 }
	if($message==''){ $errormessage['message'] = "Enter Message";}
		if(count($errormessage)==0){

	$smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
    $api = $_POST['api'];
	$uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$msg = $_POST['message'];
    $authkey = $_POST['authkey'];
	$text = $message;
// The word we want to replace
$oldWord = "&";
// The new word we want in place of the old one
$newWord = " and ";
// Run through the text and replaces all occurrences of $oldText
$text1 = str_replace($oldWord , $newWord , $text);
// Display the new text
$count=strlen($text1);
for($i=0;$i<$count;$i++){
	if(ord($text1[$i])== 32)
	{
	$text1[$i]='$';
	}
	$finalword.=$text1[$i];
}
 $text3 = str_replace('$' , '%20' , $finalword);

$j=0;
for($i=0;$i<count($st_prmobno);$i++){

	if($i==0){
	$numbers_arr[$j] =  "91".$st_prmobno[$i];
	continue;
	}

		if($i%100 == 0){
			$j++;
			$numbers_arr[$j] =  "91".$st_prmobno[$i];
		} else {
			$numbers_arr[$j] =  $numbers_arr[$j].",91".$st_prmobno[$i];
		}

}
for($k=0;$k<count($numbers_arr);$k++){

  $ch = curl_init();
curl_setopt($ch,CURLOPT_URL,  "http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=evanshss&password=evanshss@1234&msisdn=".$numbers_arr[$k]."&sid=EVANSH&msg=".$text3."&fl=0&gwid=2");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "authkey=".$smsdetails[authkey]."&mobiles=".$numbers_arr[$k]."&message=".$text3."&sender=".$smsdetails[senderid]."&route=2");
  //curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
  $buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{  }
curl_close($ch);
/* $url = "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=mVaayoo&receipientno=919849558211&msgtxt=".$text3."&state=4";
  if(function_exists('curl_init')){
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$request_result = curl_exec ($curl);
        $request_result;
		curl_close ($curl);
		}*/
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','SMS','TO STAFF','','SMS TO STAFF(".$numbers_arr[$k].")','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);

}

			 	/*for($k=0; $k<count($st_prmobno); $k++){
					echo  $st_prmobno[$k]."<br>";
				}
				*/

				header("location:?pid=62&action=$action&emsg=34");
			exit;
		}
	}

}

if($action=='smstostudents'){
$students_list=array(""=>"Select Student");

	if($es_classesid!="") {
	    if($es_classesid=='all'){
		$sel_stds = "SELECT *  FROM es_preadmission  WHERE  pre_status!= 'inactive' and  pre_mobile1!='' AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."'";
		$allstudents = $db->getRows($sel_stds);
if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['pre_mobile1']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['es_preadmissionid'].'&gt;';
}
}
//array_print($students_list);

		}else{
	    $sel_stds = "SELECT * FROM es_preadmission  WHERE pre_class = $es_classesid AND pre_status!= 'inactive' and pre_mobile1!='' AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."' ";
		$allstudents = $db->getRows($sel_stds);


if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['pre_mobile1']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';

}
}
	//array_print($students_list);

		}
	}
	if(isset($submit_student) && $submit_student!=''){
	if(count($pre_mobile1)>0){
	$mess=0;
	foreach($pre_mobile1 as $key=>$value){
	if($value==""){
	$mess++;
	}
	}
	}
	if($es_classesid==''){ $errormessage[0] = "Select Class";}
 if(count($pre_mobile1)==0)
 {
  $errormessage[1] = "Select Students";
 }


		if($mess>0){
			 $errormessage[1] = "Select Students";
		}
		if($message==''){ $errormessage[2] = "Enter Message";}


			if(count($errormessage)==0){
           	$smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
    $api = $_POST['api'];
	$uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$msg = $_POST['message'];
    $authkey = $_POST['authkey'];
	$text = $message;
// The word we want to replace
$oldWord = "&";
// The new word we want in place of the old one
$newWord = " and ";
// Run through the text and replaces all occurrences of $oldText
$text1 = str_replace($oldWord , $newWord , $text);
// Display the new text
$count=strlen($text1);
for($i=0;$i<$count;$i++){
	if(ord($text1[$i])== 32)
	{
	$text1[$i]='$';
	}
	$finalword.=$text1[$i];
}
 $text3 = str_replace('$' , '%20' , $finalword);

$j=0;
/*for($i=0;$i<count($pre_mobile1);$i++){
	if($i==0){
	$numbers_arr[$j] =  "91".$pre_mobile1[$i];
	continue;
	}
		if($i%100 == 0){
			$j++;
			$numbers_arr[$j] =  "91".$pre_mobile1[$i];
		} else {
			$numbers_arr[$j] =  $numbers_arr[$j].",91".$pre_mobile1[$i];
		}
}*/

for($i=0;$i<count($pre_mobile1);$i++){
	if($i==0){
	$numbers_arr[$j] =  "".$pre_mobile1[$i];
	continue;
	}
		if($i%100 == 0){
			$j++;
			$numbers_arr[$j] =  "".$pre_mobile1[$i];
		} else {
			$numbers_arr[$j] =  $numbers_arr[$j].",".$pre_mobile1[$i];
		}
}

for($k=0;$k<count($numbers_arr);$k++){

 /*$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=HIMALYAN&receipientno=".$numbers_arr[$k]."&msgtxt=".$text3."&state=1");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "user=himalyanpublicschool@rediffmail.com&senderID=HIMALYAN&receipientno=".$numbers_arr[$k]."&msgtxt=".$text3."");
 //curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
  $buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{  }
curl_close($ch);*/

//$sms_url = "".$smsdetails[apilink]."authkey=".$smsdetails[authkey]."&mobiles=".$numbers_arr[$k]."&message=".$text3."&sender=".$smsdetails[senderid]."&route=5";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=evanshss&password=evanshss@1234&msisdn=".$numbers_arr[$k]."&sid=EVANSH&msg=".$text3."&fl=0&gwid=2");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For HTTPS
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // For HTTPS
curl_exec($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);


 /*
 $ch = curl_init();
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=HIMALYAN&receipientno=".$numbers_arr[$k]."&msgtxt=".$text3."&state=1");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "user=himalyanpublicschool@rediffmail.com&senderID=HIMALYAN&receipientno=".$numbers_arr[$k]."&msgtxt=".$text3."");
 //curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
  $buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{  }
curl_close($ch);*/
 /*  if(function_exists('curl_init')){
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$request_result = curl_exec ($curl);
        $request_result;
		curl_close ($curl);
		}*/
/*echo  $url = "http://122.166.5.17/desk2web/SendSMS.aspx?UserName=".MOBILE_USERNAME."&password=".MOBILE_PASSWORD."&MobileNo=".$numbers_arr[$k]."&SenderID=".MOBILE_SENDER_ID."&CDMAHeader=".CDMA_HEADER."&Message=".$text3."&isFlash=false";*/
 /* if(function_exists('curl_init')){
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$request_result = curl_exec ($curl);
        $request_result;
		curl_close ($curl);
		}*/
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','SMS','TO STUDENT','','SMS TO STUDENTS(".$numbers_arr[$k].")','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);

}
				/*for($i=0; $i<count($pre_mobile1); $i++){
					//echo $pre_mobile1[$i]."<br>";
					}*/

		header("location:?pid=62&action=$action&emsg=34");

				}
			}



}

if($action=='enquirylist'){
    sm_registerglobal('schedu_time','phone_number','uid');
    $sql_qry = "SELECT * FROM es_enquiry WHERE es_preadmissionid<1 ORDER BY es_enquiryid DESC";

	$es_enquiryList = $db->getrows($sql_qry);
	foreach($es_enquiryList as $eachrecord){
		$students_arr[$eachrecord['eq_mobile']]=$eachrecord['eq_wardname'];
   }

    $vlc = new FormValidation();
	if($submit_student=="Send"){

		 if(count($pre_mobile1)<1){
		  $errormessage['phone_number'] = "Select Student";
		 }


		 if($message==""){
		  $errormessage['message'] = "Enter Message";
		 }
		 if(count($errormessage)==0){

		$smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
    $api = $_POST['api'];
	$uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$msg = $_POST['message'];
    $authkey = $_POST['authkey'];
	$text = $message;
// The word we want to replace
$oldWord = "&";
// The new word we want in place of the old one
$newWord = " and ";
// Run through the text and replaces all occurrences of $oldText
$text1 = str_replace($oldWord , $newWord , $text);
// Display the new text
$count=strlen($text1);
for($i=0;$i<$count;$i++){
	if(ord($text1[$i])== 32)
	{
	$text1[$i]='$';
	}
	$finalword.=$text1[$i];
}
 $text3 = str_replace('$' , '%20' , $finalword);

$j=0;
for($i=0;$i<count($pre_mobile1);$i++){
	if($i==0){
	$numbers_arr[$j] =  "91".$pre_mobile1[$i];
	continue;
	}
		if($i%100 == 0){
			$j++;
			$numbers_arr[$j] =  "91".$pre_mobile1[$i];
		} else {
			$numbers_arr[$j] =  $numbers_arr[$j].",91".$pre_mobile1[$i];
		}
}

for($k=0;$k<count($numbers_arr);$k++){

 $ch = curl_init();
 

curl_setopt($ch,CURLOPT_URL,  "http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=evanshss&password=evanshss@1234&msisdn=".$numbers_arr[$k]."&sid=EVANSH&msg=".$text3."&fl=0&gwid=2");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "authkey=".$smsdetails[authkey]."&mobiles=".$numbers_arr[$k]."&message=".$text3."&sender=".$smsdetails[senderid]."&route=2");
  //curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
  $buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{  }
curl_close($ch);
 /* $url = "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=mVaayoo&receipientno=919849558211&msgtxt=".$text3."&state=4";
   if(function_exists('curl_init')){
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$request_result = curl_exec ($curl);
        $request_result;
		curl_close ($curl);
		}*/
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','SMS','ENQIRY LISTS','','SMS TO ENQIRY LISTS(".$numbers_arr[$k].")','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);

}


					header("location:?pid=62&action=$action&emsg=34");

				}
	 }
}

?>

<?php
if($action == "smshomework")
{
	if(isset($sendHomework))
	{
		if($hw_class == 0)
			$errormessage[0] = "Please select the class";
		if(trim($hw_homework) == "")
			$errormessage[1] = "Nothing to send, empty textarea";

		if(count($errormessage) == 0)
		{
          $smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
    $api = $_POST['api'];
	$uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$msg = $_POST['message'];
    $authkey = $_POST['authkey'];
           $smsloop = $db->getRows("SELECT * FROM es_preadmission_details WHERE pre_class=".$hw_class." AND pre_fromdate='".$_SESSION['fi_startdate']."'");
			foreach($smsloop as $s)
			{
				$phone_no1 = $db->getOne("SELECT pre_mobile FROM es_preadmission WHERE es_preadmissionid=".$s['es_preadmissionid']);
                $phone_no = $phone_no1['pre_mobile'];
				$stu_name = $db->getOne("SELECT pre_name FROM es_preadmission WHERE es_preadmissionid=".$s['es_preadmissionid']);
				$hw_classname = $db->getOne("SELECT es_classname FROM es_classes WHERE es_classesid=".$hw_class);
				$message_text = "HOMEWORK(".date("d/m/Y").") ".$stu_name."(STD-".$hw_classname.") ".$hw_homework;


			    /*$sms_url = $smsdetails[apilink];
                $sms_url .= "authkey=".$smsdetails[authkey];
				$sms_url .= "&mobiles=".$phone_no;
				$sms_url .= "&message=".urlencode($message_text);
                $sms_url .= "&sender=".$smsdetails[senderid];
				$sms_url .= "&route=5";*/

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=evanshss&password=evanshss@1234&msisdn=".$phone_no."&sid=EVANSH&msg=".$message_text."&fl=0&gwid=2");
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For HTTPS
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // For HTTPS
				curl_exec($ch);
				$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

				curl_close($ch);
			}
			header("location: ?pid=62&action=smshomework&emsg=28");
		}
	}
}
?>



<?php
if($action == "smstoall")
{
	if(isset($sendtoall))
	{
		if(trim($a_text) == "")
			$errormessage[0] = "Nothing to send, empty textarea";

		if(count($errormessage) == 0)
		{
		  $smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
    $api = $_POST['api'];
	$uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$msg = $_POST['message'];
    $authkey = $_POST['authkey'];
			$smsloop = $db->getRows("SELECT * FROM es_preadmission");
			foreach($smsloop as $sms)
			{
				$phone_no = $sms['pre_mobile'];
				$message_text = $a_text;

			   	/*$sms_url = $smsdetails[apilink];
                $sms_url .= "authkey=".$smsdetails[authkey];
				$sms_url .= "&mobiles=".$phone_no;
				$sms_url .= "&message=".urlencode($message_text);
                $sms_url .= "&sender=".$smsdetails[senderid];
				$sms_url .= "&route=5";*/

				echo "Message text: --".$message_text."--";
				//exit;

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://cloud.smsindiahub.in/vendorsms/pushsms.aspx?user=evanshss&password=evanshss@1234&msisdn=".$phone_no."&sid=EVANSH&msg=".$message_text."&fl=0&gwid=2");
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For HTTPS
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // For HTTPS
				curl_exec($ch);
				$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

				curl_close($ch);
			}
			header("location: ?pid=62&action=smstoall&emsg=28");
		}
	}
}
?>