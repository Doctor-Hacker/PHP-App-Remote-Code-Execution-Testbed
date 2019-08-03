<?php 
include_once (INCLUDES_CLASS_PATH . DS .'class.es_candidate.php');
sm_registerglobal('pid','action','update',
'lib_category','libcat_desc','asds_order',
'categoryname','upadtesubaddcategory',
'purcahsedate',
'fromacno',
'toacno',
'statusofbook',
'start',
'frombookno',
'serid',
'editupbooks',
'tobookno',
'bookclassno',
'book_author',
'scategoryname',
'serchrecardinbook',
'serchrecardinbook1',
'bookfrom',
'submitprint',
'bookto',
'selectstt',
'booktitle',
'bwid',
'book_publishername',
'book_lacepublisher',
'booksubject',
'refcheck',
'bbokedition',
'booktod',
'updatefinesubmit',
'bookstatus',
'bkserch',
'book_placepublisher',
'student_classh',
'bkname',
'bksubject',
'bkauthor',
'bkkeyword',
'bookyear',
'booknopages',
'submitlib',
'bookcast',
'bookvolume',
'booksource',
'fineamountcal',
'listofserckbooks',
'sc_bill',
'additinalinfofbook',
'staffid',
'empname',
'empsex',
'empqulification',
'empaddress',
'empphoneno',
'empprimarysubject',
'empdesigantion',
'empdepartment',
'empaditinalinfo',
'empisuuedfrom',
'empisuedto',
'addbooks',
'bookstatus',
'studentlib',
'studentid',
'student_name',
'gender',
'student_fathername',
'student_class',
'student_sec',
'student_adress',
'student_phoneno',
'student_aditinalinfo',
'studentisuuedfrom',
'finesubmit',
'fineselect',
'fine_nodays',
'fineamount',
'fineduration',
'publishername',
'publisheradress',
'pubcity',
'pubstate',
'pubcountry',
'pubphoneno',
'pubmobileno',
'pubfax',
'pubemail',
'pubaditinalinfo',
'publisherupdate',
'bookissueforstudent112',
'serchbookname',
'serchauthor',
'bookserchstudent',
'bookserchstaff',
'publisheradd',
'stuisuedto',
'bid',
'emsg','uid','AddCategory','sid','admin','takainterview','stafftcserch','tcupdatestudent','staffading','count','checkbox','smail','updateemail','staffsearch','candidateading','Offerupdate','action1','update','emailnotification','updateading','selectionserch','updateinterview','back',
'addnew','subaddcategory','sub_catname','sub_catdesc',
'sub_catname','sub_catdesc','Search','dc1','dc2','upadtecategory',
'bookdetails_print',
'book_analysis_print','studentprint','cancel',
'searchcategory',
'uid','dc1','dc2',
'PubOrSup','serchstaffid',
'pid', 'action','action1','update', 'start', 'column_name', 'asds_order', 'uid', 'sid','admin','transport','boardid',
 'reg_search', 'sm_section', 'Search', 'update', 'pre_student_username', 'pre_student_password', 'pre_dateofbirth', 'pre_fathername', 'pre_mothername', 'pre_fathersoccupation', 'pre_motheroccupation', 'pre_contactname1', 'pre_contactno1', 'pre_contactno2', 'pre_contactname2', 'pre_address1', 'pre_city1', 'pre_state1', 'pre_country1', 'pre_phno1', 'pre_mobile1', 'pre_prev_acadamicname', 'pre_prev_class', 'pre_prev_university', 'pre_prev_percentage', 'pre_prev_tcno', 'pre_current_acadamicname', 'pre_current_class1', 'pre_current_percentage1', 'pre_current_result1', 'pre_current_class2', 'pre_current_percentage2', 'pre_current_result2', 'pre_current_class3', 'pre_current_percentage3', 'pre_current_result3', 'pre_physical_details', 'pre_height', 'pre_weight', 'pre_alerge', 'pre_physical_status', 'pre_special_care', 'pre_class', 'pre_sec', 'pre_name', 'pre_age', 'pre_address', 'pre_city', 'pre_state', 'pre_country', 'pre_phno', 'pre_mobile', 'pre_resno', 'pre_resno1', 'pre_image', 'pre_pincode1', 'pre_pincode', 'newpreadmission', 'pre_emailid', 'pre_pincode', 'pre_sec', 'test1', 'test2', 'photo', 'back', 'clid', 'secid', 'pre_todate', 'action2', 'pre_fromdate', 'cl_class', 'cl_section', 'classserch', 'updatestudentid', 'stustatus', 'updatestudents', 'emsg', 'submit','sm_class','regnum','classserch','pre_blood_group','pre_hobbies','pre_gender','print_class','studentserch','ac_year','curnt_year','prev_class','up_class','batch_id','batchid','examstatus','searchclasswise','search_bookstudent','sm_class','search_bookavailability','issuestatus','eq_paymode','remarks','amount_paid','deduction','vocturetypesel','es_ledger','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','receive_amount','fineamount','chgid','type','payment_stafforstudent','search_allpayments','catid','subbookcatid','bkname','bkauthor','Submit42','subbookcatid','es_categorylibraryid');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
//array_print($_POST);

/*echo $up="update es_book_reservation set status='inactive' where expired_on < '".date("Y-m-d")."'";
mysql_query($up);*/

if(isset($catid) && $catid!=""){
$pageurl="&catid=$catid";
}
if(isset($subbookcatid) && $subbookcatid!=""){
$pageurl.="&subbookcatid=$subbookcatid";
}

if(isset($bkname) && $bkname!=""){
$pageurl.="&bkname=$bkname";
}

if(isset($bkauthor) && $bkauthor!=""){
$pageurl.="&bkauthor=$bkauthor";
}

$paymentsearchtypearray=array("student"=>"Student","staff"=>"Staff");

$es_categorylibrary = new es_categorylibrary();
$es_subcategory     = new es_subcategory();
$es_libbook         = new es_libbook();
$es_staff			= new es_staff();
$es_libstaffadd		= new es_libstaffadd();
$es_bookissue		= new es_bookissue();
$es_fine			= new es_libfine();
$es_libaraypublisher=new es_libaraypublisher();
$es_classes			= new es_classes();


$allpublishers = $es_libaraypublisher->GetList(array(array("status", "=", active)));

if(is_array($allpublishers) && count($allpublishers) > 0) {
	foreach ($allpublishers as $pblsh) {
		$publishersArr[$pblsh->es_libaraypublisherId] = $pblsh->library_publishername;
	}
}

$allsuppliers = $es_libaraypublisher->GetList(array(array("status", "=", inactive)));

if(is_array($allsuppliers) && count($allsuppliers) > 0) {
	foreach ($allsuppliers as $sply) {
		$suppliersArr[$sply->es_libaraypublisherId] = $sply->library_publishername;
	}
}

$listallclasses = $es_classes->GetList();

if(is_array($listallclasses) && count($listallclasses) > 0) {
	foreach ($listallclasses as $clsrec) {
		$classesArr[$clsrec->es_classesId] = $clsrec->es_classname;
	}
}



if ($action=='addcategoty'||$action=='editcategory' || $action=='print_list_category'){
	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$no_rows = count($es_categorylibrary->GetList(array(array("status", "=", active))));
	$orderby_array = array('orb1'=>'es_categorylibraryid');
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_categorylibraryid";
	}
	if (isset($asds_order)&&$asds_order=='ASC'){
		$order = true;
	}else{
		$order = false;
	}
	$categoryview =$es_categorylibrary ->GetList(array(array("status", "=", active)),$orderby, $order,  "$start , $q_limit");
	$PageUrl="&start=$start";
}

if ($action=='addsubcategoty'||$action=='editsubcategory' || $action=='print_list_subcategory'){
	$categoryview = $es_categorylibrary ->GetList(array(array("status", "=", active)));
	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$orderby_array = array('orb1'=>'es_subcategoryid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_subcategoryid";
	}
	if (isset($asds_order)&&$asds_order=='ASC'){
		$order = true;
	}else{
		$order = false;
	}
	$no_rows = count($es_subcategory ->GetList(array(array("subcat_status", "=", active)) ));
	$subcategoryview =$es_subcategory ->GetList(array(array("subcat_status", "=", active)),$orderby, $order,  "$start , $q_limit" );
	$PageUrl="&start=$start";
}
//$subcategoryview =$es_subcategory ->GetList(array(array("subcat_status", "=", active)));
if(isset($AddCategory)){
	
	$errormessage = array();
	$vlc    = new FormValidation();	 
	
	if (trim($lib_category) == "") {
		$errormessage[0]="Enter Category Name";	  
	}else{
		$rows = $db->getone("SELECT COUNT(*) FROM es_categorylibrary WHERE lb_categoryname='".$lib_category."'");
		if($rows>=1){$errormessage[0]="Category Name Already Exists";	  }
	
	}		
	if ($libcat_desc == "") {
		$errormessage[1]="Enter Description";	  
	}		
	if (count($errormessage)==0){
		if (isset($lib_category)){
			$es_categorylibrary->lb_categoryname = $lib_category;
		}
		if (isset($libcat_desc)){
	        $satus='active';		
			$es_categorylibrary->lb_catdesc = $libcat_desc;
			$es_categorylibrary->status=$satus;
		}
		$rec_id=$es_categorylibrary ->Save();
		if (isset($rec_id)){
		
		// logs inserting
		
		
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_categorylibrary','LIBRARY','CATEGORY','".$rec_id."','ADDED LIBRARY CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
		
		
   			header('location: ?pid=32&action=addcategoty&emsg=1');
		}
	}
}

if (isset($back)){
	header('location: ?pid=32&action=first');
}

if ($action=='editcategory'){
	$editcat = $es_categorylibrary->Get($sid);
//	array_print($editcat);
}
if ($action=='deletecategory'){

$sql="select count(*) from es_subcategory where subcat_catname=$sid and subcat_status='active'";
$subcount=$db->getOne($sql);

if($subcount==0){

	$db->update('es_categorylibrary',
				"status='inactive'", 
				'es_categorylibraryid ='. $sid);
				
				// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_categorylibrary','LIBRARY','CATEGORY','".$sid."','DELETED LIBRARY CATAGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
				
	header('location: ?pid=32&action=addcategoty&emsg=3');
	}
	else{
		header('location: ?pid=32&action=addcategoty&emsg=62');
		exit;

	}
}
if (isset($upadtecategory)){
if (trim($lib_category) == "") {
		$errormessage[0]="Enter Category Name";	  
	}else{
		$rows = $db->getone("SELECT COUNT(*) FROM es_categorylibrary WHERE lb_categoryname='".$lib_category."' AND es_categorylibraryid!=".$sid);
		if($rows>=1){$errormessage[0]="Category Name Already Exists";}
	
	}		
	if ($libcat_desc == "") {
		$errormessage[1]="Enter Description";	  
	}		
	if (count($errormessage)==0){

	$db->update('es_categorylibrary',
		"lb_categoryname = '$lib_category', 
		lb_catdesc		 = '$libcat_desc'",
		'es_categorylibraryid ='. $sid);
		
		// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_categorylibrary','LIBRARY','CATEGORY','".$sid."','UPDATED LIBRARY CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
			header('location: ?pid=32&action=addcategoty&emsg=2');
			exit;

		}
	
}

if ($action=='addsubcategoty'){
	if (isset($subaddcategory)){
		$vlc    = new FormValidation();	 
		if ($sub_catname=="") {
			$errormessage[0]="Enter Sub Category Name";	  
		}else{
		$rows = $db->getone("SELECT COUNT(*) FROM es_subcategory WHERE subcat_scatname='".$sub_catname."' AND  subcat_catname='".$categoryname."' AND subcat_status!='inactive'");
		if($rows>=1){$errormessage[0]="Sub Category Name Already Exists";}
	
	}			
		if ($sub_catdesc=="") {
			$errormessage[1]="Enter Description";	  
		}		
		if (count($errormessage)==0){
			if (isset($categoryname)){
				$es_subcategory ->subcat_catname = $categoryname;
			}
			if (isset($sub_catname)){
				$es_subcategory ->subcat_scatname=$sub_catname;
			}
			if (isset($sub_catdesc)){
				$satus='active';		
				$es_subcategory->subcat_scatdesc=$sub_catdesc;
				$es_subcategory->subcat_status=$satus;
			}
			$rec_idsub=$es_subcategory ->Save();
			if (isset($rec_idsub) && $rec_idsub!=""){
			
			
			// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_subcategory','LIBRARY','SUB CATEGORY','".$rec_idsub."','ADDED LIBRARY SUB CATAGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
   				header('location: ?pid=32&action=addsubcategoty&emsg=1');
			}
		}
	}
}

if ($action=='editsubcategory'){
	$editsubcat =$es_subcategory ->Get($sid);
}
if ($action=='deletesubcategory'){

$sql="select count(*) from es_libbook where lbook_booksubcategory=$sid and status='active'";
$subcount=$db->getOne($sql);

if($subcount==0){
	$db->update('es_subcategory',
		"subcat_status='inactive'",
		'es_subcategoryid ='. $sid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_categorylibrary','LIBRARY','SUB CATEGORY','".$sid."','DELETED LIBRARY SUB CATAGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
	header('location: ?pid=32&action=addsubcategoty&emsg=3');
	
	}else{
	header('location: ?pid=32&action=addsubcategoty&emsg=63');
	exit;
	}
}
if	(isset($upadtesubaddcategory)){
$vlc    = new FormValidation();	 
		if ($sub_catname=="") {
			$errormessage[0]="Enter Sub Category Name";	  
		}else{
		$rows = $db->getone("SELECT COUNT(*) FROM es_subcategory WHERE subcat_scatname='".$sub_catname."' AND  subcat_catname='".$categoryname."' AND es_subcategoryid!='".$sid."'");
		if($rows>=1){$errormessage[0]="Sub Category Name Already Exists";}
	
	}				
		if ($sub_catdesc=="") {
			$errormessage[1]="Enter Description";	  
		}		
		if (count($errormessage)==0){
	$db->update('es_subcategory',
		"subcat_catname ='$categoryname', 
		 subcat_scatname='$sub_catname', 
		 subcat_scatdesc ='$sub_catdesc'",
		'es_subcategoryid ='. $sid);
		
		
		// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_subcategory','LIBRARY','SUB CATEGORY','".$sid."','UPDATED LIBRARY SUB CATAGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	header('location: ?pid=32&action=addsubcategoty&emsg=2');
	exit;
	}
}
if($action=='deletebook'){
	if ( !isset($start) || $start==""){
		$start = 0;
	}

	$issuests = $db->getOne("SELECT issuestatus FROM es_libbook WHERE es_libbookid = '".$sid."' ");
	
	if($issuests=='notissued'){
		//$db->update('es_libbook',
		//"status='inactive'",
		//'es_libbookid ='. $sid);
		
	

		 $sql_query1="update es_libbook set status= 'inactive' where es_libbookid =". $sid;
		mysql_query($sql_query1);
		
		
		
		$sql_query="delete from es_book_reservation where book_id=".$sid;
		mysql_query($sql_query);
		
	header("location: ?pid=32&action=addbook&emsg=3&start=$start");
	}else{
		//$message[] = "Book issued";
		header("location: ?pid=32&action=addbook&emsg=24&start=$start");
	}
}
//To insert the book
if ($action=='addbook'||$action=='editbook'){
	$categoryview =$es_categorylibrary ->GetList(array(array("status", "=", active)));
	$q_limit  = 25;
	if ( !isset($start) || $start==""){
		$start = 0;
	}	
	$orderby_array = array('orb1'=>'es_libbookid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{	$orderby = "es_libbookid";}
	if (isset($asds_order)&&$asds_order=='ASC'){
		$order = true;
	}else{
		$order = false;
	}
	
	$no_rows = count($es_libbook ->GetList(array(array("status", "=", active))));
	$bookview =$es_libbook ->GetList(array(array("status", "=", active)),$orderby, $order,  "$start , $q_limit");
	
	if ($addbooks!=""){
		$vlc    = new FormValidation();	 
		if ($purcahsedate=="") {
			$errormessage[0]="Enter Purchased Date";	  
		}
		if ($sc_bill=="") {
			$errormessage[9]="Enter Bill Number";	  
		}
		
		if ($categoryname=="") {
			$errormessage[10]="Select Category";	  
		}
		
	   if ($scategoryname=="") {
			$errormessage[11]="Select Sub Category";	  
		}
	
	
	
		
		
		/*if (!$vlc->is_nonNegNumber($fromacno)) {
			$errormessage[1]="Enter valid Accession Number ";	
			  
		}*/
		/*if ($vlc->is_nonNegNumber($fromacno)) {
		$sql="SELECT es_libbookid FROM es_libbook WHERE lbook_aceesnofrom='".$fromacno."' AND lbook_category='".$categoryname."' AND lbook_booksubcategory='".$scategoryname."' AND lbook_publishername='".$book_publishername."'";
		$sql_num=sqlnumber($sql);
		if($sql_num>0){
		$errormessage[1]="Accession Number already exists ";
		}
		}*/
		
		/*if (!$vlc->is_nonNegNumber($frombookno)) {
			$errormessage[2]="Enter valid From Book Number";	  
		}*/
		if (!$vlc->is_nonNegNumber($tobookno)) {
			$errormessage[3]="Enter valid Number of Books";	  
		}
		if ($book_author=="") {
			$errormessage[4]="Enter Author";	  
		}
		if ($booktitle=="") {
			$errormessage[5]="Enter Title";	  
		}
		if ($book_publishername=="") {
			$errormessage[6]="Select Publishers Name";	  
		}
		/*if ($booksubject=="") {
			$errormessage[8]="Enter Subject";	  
		}*/
		
		if (count($errormessage)==0){
			$count = $tobookno - $frombookno;
			$fromacno = $fromacno;
			for ( $i=0; $i<$count; $i++){
				$es_libbook->es_libbookId = 0;
				$frombookno1 = $frombookno + $i;
				if (isset($purcahsedate)){
					$purcahsedate1=formatDateCalender($purcahsedate);
					$es_libbook->lbook_dateofpurchase = $purcahsedate1;
				}	
				
				if (isset($fromacno)){
				
					$es_libbook->lbook_aceesnofrom=$fromacno;
				}
				
				if (isset($categoryname) && $scategoryname!=""){
					$es_libbook->lbook_category=$categoryname;
				}
				if (isset($bookclassno)){
					
					$es_libbook->lbook_class=$bookclassno;
				}
				if (isset($book_author)){
					
					$es_libbook->lbook_author=$book_author;
				}
				if (isset($scategoryname)&&$scategoryname!=""){
					
					$es_libbook->lbook_booksubcategory=$scategoryname;
				}
				if (isset($booktitle)){
					
					$es_libbook ->lbook_title=$booktitle;
				}
				if (isset($book_publishername)){
					
					$es_libbook->lbook_publishername=$book_publishername;
				}
				if (isset($book_placepublisher)){
					
					$es_libbook->lbook_publisherplace=$book_placepublisher;
				}
				if (isset($booksubject)){
					
					$es_libbook->lbook_booksubject=$booksubject;
				}
				if (isset($refcheck)&& $refcheck!=''){
					
					$es_libbook->lbook_ref=$refcheck;
				}
				else 
				{
					$refcheck='norefarence';
					$es_libbook->lbook_ref=$refcheck;
				}
				if (isset($bbokedition)){
					
					$es_libbook->lbook_bookedition=$bbokedition;
				}
				if (isset($bookstatus)){
					
					$es_libbook->lbook_statusstatus=$bookstatus;
				}
				if (isset($bookyear)){
					
					$es_libbook->lbook_year=$bookyear;
				}
				if (isset($booknopages)){
					
					$es_libbook->lbook_pages=$booknopages;
				}
				if (isset($bookcast)){
					
					$es_libbook->lbook_cost=$bookcast;
				}
				if (isset($bookvolume)){
					
					$es_libbook->lbook_volume=$bookvolume;
				}
				if (isset($booksource)){
					
					$es_libbook->lbook_sourse=$booksource;
				}
				if (isset($additinalinfofbook)){
					
					$es_libbook->lbook_aditinalbookinfo=$additinalinfofbook;
				}
				if (isset($sc_bill)){
					
					$es_libbook->lbook_bilnumber=$sc_bill;
				}
				
				$satus = 'active';
				$es_libbook->lbook_bookstatus=$bookstatus;
				$es_libbook->issuestatus='notissued';
				$es_libbook->status=$satus;
				
				$es_libbook->lbook_bookfromno=$frombookno;
				$es_libbook->lbook_booktono=$tobookno;
				$es_libbook->lbook_accessnoto = $frombookno1;
				if($action=="addbook"){
				$fromacno=$fromacno+1;
				}
			$bookins=$es_libbook->Save();
				if (isset($bookins) && $bookins!=""){
				// insert logs
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libbook','LIBRARY','BOOKS','".$bookins."','BOOK ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
	
					header('location: ?pid=32&action=addbook&emsg=1');
				}
	
			}
		}
	}
	
	
}
//To view the books available in the library
if($action=='booksavailable' || $action=='print_list_booksavailable'){
	$categoryview =$es_categorylibrary ->GetList(array(array("status", "=", 'active')));
	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$orderby_array = array('orb1'=>'es_libbookid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{	$orderby = "es_libbookid";}
	if (isset($asds_order)&&$asds_order=='ASC'){
		$order = true;
	}else{
		$order = false;
	}
	
	
	$dc11 = formatDateCalender($dc1); 
	$dc21 = formatDateCalender($dc2);
	
	$conditon = array();
	$conditon[] = array("status", "=", 'active');
	
	if (isset($categoryname)&& isset($scategoryname) && $scategoryname!=""){
		$conditon[]= array("lbook_booksubcategory","=","$scategoryname");
	}
	if (isset($dc1)&& $dc1!="" && isset($dc2)&&$dc2!="" ){ 
		$conditon[] = array("lbook_dateofpurchase", "between", "$dc11 AND $dc21");
	}
	elseif (isset($dc1)&&$dc1!="" ){
	$conditon[]=array("lbook_dateofpurchase",">=",$dc11);
	}
	elseif (isset($dc2)&&$dc2!=""){
	$conditon[]=array("lbook_dateofpurchase","<=",$dc21);
	}
	$no_rows = count($es_libbook->GetList($conditon,$orderby, $order));
	$bookview = $es_libbook->GetList($conditon,$orderby, $order,  "$start , $q_limit");
    }

// To view the book details
if($action=='viewbook'){ 
   $book_sql = "SELECT * FROM  es_libbook WHERE es_libbookid ='" . $uid . "'";
   $bookview = getarrayassoc($book_sql);
   
   	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','ALL BOOKS','".$uid."','VIEW BOOK DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
   
  
}
//To edit the book
if ($action=='editbook'){
	$libbookview =$es_libbook ->Get($sid);
	if(!$_POST){
	
	$purcahsedate=formatDBDateTOCalender($libbookview->lbook_dateofpurchase);
	 $sc_bill=$libbookview->lbook_bilnumber;
	  $fromacno=$libbookview->lbook_aceesnofrom;
	 $book_author=$libbookview->lbook_author;
	 $booktitle=$libbookview->lbook_title;
	  $booksubject=$libbookview->lbook_booksubject;
	   $bbokedition=$libbookview->lbook_bookedition;
	   $bookyear=$libbookview->lbook_year;
	  $booknopages= $libbookview->lbook_pages;
	  $bookcast=$libbookview->lbook_cost;
	   $bookvolume=$libbookview->lbook_volume;
	  $additinalinfofbook=$libbookview->lbook_aditinalbookinfo;
	   $libbookview->lbook_publishername;
	   $sel_publisher = $libbookview->lbook_publishername;
	}
	
	
	
	
	
	
	
}
// To update the book
if (isset($editupbooks)&&$editupbooks!=""){
	$pdate = formatDateCalender($purcahsedate);
	
	$vlc    = new FormValidation();	 
	if ($purcahsedate=="") {
		$errormessage[0]="Enter Purchased Date";	  
	}
	if ($sc_bill=="") {
		$errormessage[9]="Enter Bill Number";	  
	}
	if (!$vlc->is_nonNegNumber($fromacno)) {
		$errormessage[1]="Enter valid Accession Number ";	  
	}
	if ($book_author=="") {
		$errormessage[4]="Enter Author";	  
	}
	if ($booktitle=="") {
		$errormessage[5]="Enter Title";	  
	}
	if ($book_publishername=="") {
		$errormessage[6]="Select Publishers Name";	  
	}
	/*if ($booksubject=="") {
		$errormessage[8]="Enter Subject";	  
	}*/
	
	if (count($errormessage)==0){
	
		$db->update('es_libbook',
				"lbook_dateofpurchase 	 ='$pdate',
				 lbook_aceesnofrom       ='$fromacno',
				 lbook_author            ='$book_author',
				 lbook_title             ='$booktitle',
				 lbook_publishername     ='$book_publishername',
				 lbook_publisherplace    ='$book_placepublisher',
				 lbook_booksubject       ='$booksubject',
				 lbook_bookedition       ='$bbokedition',
				 lbook_year              ='$bookyear',
				 lbook_cost              ='$bookcast',
				 lbook_sourse            ='$booksource',
				 lbook_aditinalbookinfo ='$additinalinfofbook',
				 lbook_bookstatus        ='$bookstatus',
				 lbook_category          ='$categoryname',
				 lbook_class             ='$bookclassno',
				 lbook_booksubcategory  ='$scategoryname',
				 lbook_ref               ='$refcheck',
				 lbook_statusstatus      ='$bookstatus',
				 lbook_pages             ='$booknopages',
				 lbook_volume            ='$bookvolume',
				 lbook_bilnumber         ='$sc_bill'",
				'es_libbookid =' . $sid);




// insert logs
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libbook','LIBRARY','BOOKS','".$sid."','UPDATED BOOK','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
	

		header('location: ?pid=32&action=addbook&emsg=2');
	}
}



if (isset($submitlib)){
	$vlc    = new FormValidation();
	if ($staffid==" ") {
		$errormessage[0]="Enter valid id";	  
	}	
	if (!$vlc->is_alpha($empname)) {
		$errormessage[1]="Enter valid Employ Name ";	  
	}
	if (!$vlc->is_alpha($empsex)) {
		$errormessage[2]="Enter valid gender";	  
	}
	if ($empaddress=="") {
		$errormessage[3]="Enter valid Address";	  
	}
	if (!$vlc->is_alpha($empqulification)) {
		$errormessage[11]="Enter valid qulification";	  
	}
	if (!$vlc->is_nonNegNumber($empphoneno)) {
		$errormessage[4]="Enter valid phoneno";	  
	}
	if (!$vlc->is_alphacoma($empprimarysubject)) {
	$errormessage[5]="Enter valid primary subject";	  
	}
	if (!$vlc->is_alpha($empdesigantion)) {
	$errormessage[6]="Enter valid desigantion";	  
	}
	if (!$vlc->is_alpha($empdepartment)) {
	$errormessage[7]="Enter valid department name ";	  
	}
	if ($empaditinalinfo=="") {
	$errormessage[8]="Enter valid Aditinal information";	  
	}
	if ($empisuuedfrom=="") {
	$errormessage[9]="Enter valid issued From Date";	  
	}
	if ($empisuedto=="") {
	$errormessage[10]="Enter valid issued To Date";	  
	}
		
	if (count($errormessage)==0){
	
	   if (isset($staffid)){
		   $es_libstaffadd->staffadd_id=$sid;
		}
		if (isset($empname)){
			
			$es_libstaffadd->staffadd_name=$empname;
		}
		if (isset($empsex)){
			
			$es_libstaffadd->staffadd_sex=$empsex;
		}
		if (isset($empaddress)){
			
			$es_libstaffadd->staffadd_adress=$empaddress;
		}
		if (isset($empphoneno)){
			
			$es_libstaffadd->staffadd_phone=$empphoneno;
		}
		if (isset($empprimarysubject)){
			
			$es_libstaffadd->staffadd_subject=$empprimarysubject;
		}
		if (isset($empdesigantion)){
			
			$es_libstaffadd->staffadd_designation=$empdesigantion;
		}
		if (isset($empdepartment)){
			
			$es_libstaffadd->staffadd_deaprtment=$empdepartment;
		}
		if (isset($empaditinalinfo)){
			
			$es_libstaffadd->staffadd_addtinalinfo=$empaditinalinfo;
		}
		if (isset($empisuuedfrom)){
			$empisuuedfrom1=formatDateCalender($empisuuedfrom,"Y-m-d");
			
			$es_libstaffadd->staffadd_issuedfromdate=$empisuuedfrom1;
		}
		if(isset($empqulification))
		{
			$es_libstaffadd->staffadd_qulification=$empqulification;
		}
		if (isset($empisuedto)){
			$empisuedto1=formatDateCalender($empisuedto,"Y-m-d");
			$status='active';
			$es_libstaffadd->staffadd_issuedtodate=$empisuedto1;
			$es_libstaffadd->staffadd_status=$status;
			
		}
		if ($es_libstaffadd->Save()){
		
		header('location: ?pid=32&action=values&emsg=1&sid='.$sid);
			}
	}
	
}
//$es_libfacultyadd=new es_libfacultyadd();
$allClasses = getallClasses();
$es_search1 = new es_staff();
$es_search = new es_preadmission();
$es_libstudentadd=new es_libstudentadd();




if (isset($studentlib)){

	 $vlc    = new FormValidation(); 
 if ($studentid==" ?pid=32&action=addtostudentinlibrary") {
	$errormessage[0]="Enter valid id";	  
	}	
	if (!$vlc->is_alpha($student_name)) {
	$errormessage[1]="Enter valid Employ Name ";	  
	}
	if (!$vlc->is_alpha($gender)) {
	$errormessage[2]="Enter valid gender";	  
	}
	if (!$vlc->is_alpha($student_fathername)) {
	$errormessage[3]="Enter Father name";	  
	}
	
	if ($student_adress=='') {
	$errormessage[5]="Enter valid Address";	  
	}
	if (!$vlc->is_nonNegNumber($student_phoneno)) {
	$errormessage[6]="Enter valid phoneno";	  
	}
	if ($student_aditinalinfo=='') {
	$errormessage[7]="Enter valid department name ";	  
	}
	if ($studentisuuedfrom=="") {
		

	$errormessage[8]="Enter valid issued from Date";	  
	}
	if ($stuisuedto=="") {
	$errormessage[9]="Enter valid issued To Date";	  
	}
	if (count($errormessage)==0){
		
		if (isset($studentid)){
			
			$es_libstudentadd->student_id=$sid;
		}
		if (isset($student_name)){
			
			$es_libstudentadd->student_name=$student_name;
		}
		if (isset($gender)){
			
			$es_libstudentadd->student_sex=$gender;
		}
		if (isset($student_fathername)){
			
			$es_libstudentadd->student_fathername=$student_fathername;
		}
		if (isset($student_class)){
			
			$es_libstudentadd->student_classname=$student_classh;
		}
		if (isset($student_sec)){
			
			$es_libstudentadd->student_section=$student_sec;
		}
		if (isset($student_adress)){
			
			$es_libstudentadd->student_adress=$student_adress;
		}
		if (isset($student_phoneno)){
			
			$es_libstudentadd->student_phoneno=$student_phoneno;
		}
		if (isset($student_aditinalinfo)){
			
			
			$es_libstudentadd->student_aditinalinfo=$student_aditinalinfo;
		}
		if (isset($studentisuuedfrom)){

			$studentisuuedfrom1=formatDateCalender($studentisuuedfrom, $format = 'Y-m-d');
			$es_libstudentadd->student_issuedfrom=$studentisuuedfrom1;
		}
		if(isset($stuisuedto))
		{
			$stuisuedto1=formatDateCalender($stuisuedto,$format = 'Y-m-d');
			$status='active';
			$es_libstudentadd->student_issuedto=$stuisuedto1;
			$es_libstudentadd->status=$status;
		}
		
		if ($es_libstudentadd->Save())
			{
		header('location: ?pid=32&action=valuestudent&emsg=1&sid='.$sid);
			}
	
	}
}



if($action=='finedetailes'||$action=='editfine')
{  

	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	$orderby_array = array('orb1'=>'es_libfineid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_libfineid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
$no_rows = count($es_fine ->GetList(array(array("status", "=", active))));
$fineview =$es_fine ->GetList(array(array("status", "=", active)),$orderby, $order,  "$start ,$q_limit");
}
	if(isset($finesubmit))
	{
	 $vlc    = new FormValidation();
	 
	 if (!$vlc->is_nonNegNumber($fine_nodays) || !$vlc->is_numberonly($fine_nodays) ) {
		$errormessage[0]="Enter valid no of days ";	  
		}	
		if (!$vlc->is_nonNegNumber($fineamount)) {
		$errormessage[1]="Enter valid fine amount ";	  
		}
		if (!$vlc->is_nonNegNumber($fineduration) || !$vlc->is_numberonly($fineduration)) {
		$errormessage[2]="Enter Duration";	  
		}
	
		if(count($errormessage)==0)
	{
	           if (isset($fineselect)){
					
					$es_fine->es_libfinefor=$fineselect;
				}
				if (isset($fine_nodays)){
					
					$es_fine->es_libfinenoofdays=$fine_nodays;
				}
				if (isset($fineamount)){
					
					$es_fine->es_libfineamount=$fineamount;
				}
				if (isset($fineduration)){
					$status='active';
					$es_fine->es_libfineduration=$fineduration;
					$es_fine->status=$status;
				}
				 $no_rows = count($es_fine ->GetList(array(array("es_libfinefor", "=", $fineselect))));
				if($no_rows!=1)
				{	
				$lf_id=$es_fine->Save();			
				if (isset($lf_id)&& $lf_id!="")
					{
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libfine','LIBRARY','LIBRARY FINE','".$lf_id."','ADDED LIBRARY FINE','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
				header('location: ?pid=32&action=finedetailes&emsg=1');
							
			        }
				}
						else
					{
						/*if($fineselect=='Student'){
							$sid=2;
						}
						else
						{
							$sid=1;
						}*/
						
					$db->update('es_libfine',
					"es_libfinenoofdays     ='$fine_nodays',
					 es_libfineamount       ='$fineamount',
					 es_libfineduration     ='$fineduration',
					  status     ='active'",
					"es_libfinefor   = '$fineselect'");
					
				
					}
	
	}
	}



if($action=='editfine')
{
//$fineview =$es_fine ->GetList(array(array("status", "=", active)) );	
$editfinecat =$es_fine ->Get($sid);
	
}
if(isset($updatefinesubmit))
{
$vlc    = new FormValidation();
	 
	if (!$vlc->is_nonNegNumber($fine_nodays) || !$vlc->is_numberonly($fine_nodays) ) {
		$errormessage[0]="Enter valid no of days ";	  
		}	
		if (!$vlc->is_nonNegNumber($fineamount)) {
		$errormessage[1]="Enter valid fine amount ";	  
		}
		if (!$vlc->is_nonNegNumber($fineduration) || !$vlc->is_numberonly($fineduration)) {
		$errormessage[2]="Enter Duration";	  
		}
	
		if(count($errormessage)==0)
	{

$db->update('es_libfine',
"es_libfinenoofdays 	='$fine_nodays',
 es_libfineamount       ='$fineamount',
 es_libfineduration     ='$fineduration'",
'es_libfineid ='. $sid);
// insert logs

	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libfine','LIBRARY','LIBRARY FINE','".$sid."','EDITED LIBRARY FINE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
					header('location: ?pid=32&action=finedetailes&emsg=2');
header('location: ?pid=32&action=finedetailes&emsg=2');
	}
}
	
if($action=='deletefine')
{
$db->update('es_libfine',
"status 	='inactive'",
'es_libfineid ='. $sid);

// insert logs

	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libfine','LIBRARY','LIBRARY FINE','".$sid."','DELEETD LIBRARY FINE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
header('location: ?pid=32&action=finedetailes&emsg=3');
}

if($action=='addpublisher'||$action=='editpublisher' ||$action=='print_list_publishers')
{
$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	$orderby_array = array('orb1'=>'es_libaraypublisherid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_libaraypublisherid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
$no_rows = count($es_libaraypublisher ->GetList(array(array("status", "!=",'deleted'))));
$publisherview =$es_libaraypublisher ->GetList(array(array("status", "!=",'deleted')),$orderby, $order,  "$start ,$q_limit" );
$PageUrl = "&start=$start";	
	//echo $es_libaraypublisher->pog_query;
	if(isset($publisheradd))
	{
		 $vlc    = new FormValidation();
		 $errormessage = array();
	 
		if ($publishername=="") {
			$errormessage[0]="Enter Name";	  
		}else{
		$rows = $db->getone("SELECT COUNT(*) FROM es_libaraypublisher WHERE library_publishername='".$publishername."'");
		if($rows>=1){$errormessage[0]="Name Already Exists";}
	
	}			
		/*if ($publisheradress=='') {
		$errormessage[1]="Enter Address ";	  
		}
		if (!$vlc->is_alpha($pubcity)) {
		$errormessage[2]="Enter valid city";	  
		}
		if (!$vlc->is_alpha($pubstate)) {
		$errormessage[3]="Enter valid state";	  
		}
		if (!$vlc->is_alpha($pubcountry)) {
		$errormessage[4]="Enter valid country";	  
		}
		
		if (!$vlc->is_nonNegNumber($pubphoneno)) {
		$errormessage[5]="Enter valid phoneno";	  
		}
		if (!$vlc->is_nonNegNumber($pubmobileno)) {
		$errormessage[6]="Enter valid mobile no";	  
		}
		if (!$vlc->is_alpha_numeric($pubfax)) {
		$errormessage[7]="Enter valid fax no";	  
		}
		if (!$vlc->is_email($pubemail)) {
			 $error_email = $vlc->ERROR;
		$errormessage[8]="Enter valid email id ";	  
		}
		if ($pubaditinalinfo=="") {
		$errormessage[9]="Enter valid Aditinal information";	  
		}
		*/
						
				
	if(count($errormessage)==0)
	{
		
		if (isset($publishername)){
					
					$es_libaraypublisher->library_publishername=$publishername;
				}
				if (isset($publisheradress)){
					
					$es_libaraypublisher->library_pulisheradress=$publisheradress;
				}
				if (isset($pubcity)){
					
					$es_libaraypublisher->library_city=$pubcity;
				}
				if (isset($pubstate)){
					$status='active';
					$es_libaraypublisher->libaray_state=$pubstate;
					$es_libaraypublisher->status=$status;
				}
				if (isset($pubcountry)){
					
					$es_libaraypublisher->libarary_country=$pubcountry;
				}
				if (isset($pubphoneno)){
					
					$es_libaraypublisher->libaray_phoneno=$pubphoneno;
				}
				if (isset($pubmobileno)){
					
					$es_libaraypublisher->librray_mobileno=$pubmobileno;
				}
				
				if (isset($pubfax)){
					
					$es_libaraypublisher->library_fax=$pubfax;
				}
				
				if (isset($pubemail)){
					
					$es_libaraypublisher->libarary_email=$pubemail;
				}
				
				if (isset($pubaditinalinfo)){
					
					$es_libaraypublisher->libarary_aditinalinformation=$pubaditinalinfo;
				}
				
				if (isset($PubOrSup)){
					
					$es_libaraypublisher->status=$PubOrSup;
				}
				
					$es_libaraypublisher->status=$PubOrSup;
					
					$pubid=$es_libaraypublisher->Save();
					
		     	if (isset($pubid) && $pubid!=""){
				
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libaraypublisher','LIBRARY','PUBLISHER OR SUPPLIER','".$pubid."','ADDED PUBLISHER OR SUPPLIER','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
				
					header("location:?pid=$pid&action=$action&emsg=1");
					exit;
				}
	}
	}
}
if($action=='editpublisher')
{

if(!$_POST){
	$pulishercat =$es_libaraypublisher ->Get($sid);
	$publishername=$pulishercat->library_publishername;
	$publisheradress=$pulishercat->	library_pulisheradress; 
	$pubcity=$pulishercat->library_city;
	$pubstate=$pulishercat->libaray_state; 
	$pubcountry=$pulishercat->libarary_country;
	$pubphoneno=$pulishercat->libaray_phoneno ;
	$pubmobileno=$pulishercat->librray_mobileno;
	$pubfax=$pulishercat->library_fax;
	$pubemail=$pulishercat->libarary_email;
	$pubaditinalinfo=$pulishercat->libarary_aditinalinformation;
	}
	
}
if($action=='deletepublisher')
{

$sql="select count(*) from es_libbook where lbook_publishername=".$sid." and status='active'";
$cont=$db->getOne($sql);
if($cont>0){
header('location: ?pid=32&action=addpublisher&emsg=63');
exit;

}else{
mysql_query("delete from es_libaraypublisher where  es_libaraypublisherid=".$sid);
// insert logs
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libaraypublisher','LIBRARY','PUBLISHER OR SUPPLIER','".$sid."','DELEETD PUBLISHER OR SUPPLIER','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
	
header('location: ?pid=32&action=addpublisher&emsg=3');
exit;
}



}
if(isset($publisherupdate))
{
if ($publishername=="") {
			$errormessage[0]="Enter Name";	  
		}else{
		$rows = $db->getone("SELECT COUNT(*) FROM es_libaraypublisher WHERE library_publishername='".$publishername."' AND es_libaraypublisherid!='".$sid."'");
		if($rows>=1){$errormessage[0]="Name Already Exists";}
	
	}	
if(count($errormessage)==0)
	{
$db->update('es_libaraypublisher',
"library_publishername 	      ='$publishername',
 library_pulisheradress       ='$publisheradress',
 library_city                 ='$pubcity',
 libaray_state                ='$pubstate',
 libarary_country             ='$pubcountry',
 libaray_phoneno              ='$pubphoneno',
 librray_mobileno             ='$pubmobileno',
 library_fax                  ='$pubfax',
 libarary_aditinalinformation ='$pubaditinalinfo',
 status 					  ='$PubOrSup',
 libarary_email               ='$pubemail'",
'es_libaraypublisherid ='. $sid);


// insert logs
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libaraypublisher','LIBRARY','PUBLISHER OR SUPPLIER','".$sid."','UPDATED PUBLISHER OR SUPPLIER','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
	
header('location: ?pid=32&action=addpublisher&emsg=2');
}
	
}

/*if(isset($bookserchstudent))
{*/

		$q_limit  = 25;
		if ( !isset($start) ){
			$start = 0;
		}	
	
	
		$orderby_array = array('orb1'=>'es_libbookid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_libbookid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$conditon =array();
		$conditon[]=array("status","=","active");
		if (isset($serchbookname)&&$serchbookname!=''&&isset($serchauthor)&& $serchauthor!=''){
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
			$conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
					
		}elseif(isset($serchbookname)&& $serchbookname!=''){
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
        	
        }
        elseif (isset($serchauthor)&& $serchauthor!='')
        {  
           $conditon[] = array("lbook_author", "LIKE","'%".$serchauthor."%'");
        }
		if(isset($Submit42) && $Submit42!=""){
		$conditon[] = array("lbook_category", "=",$es_categorylibraryid);
		$conditon[] = array("lbook_booksubcategory", "=",$subbookcatid);
		
		 }
	$status='notissued';
	$conditon[] = array("issuestatus", "=",$status);
	
	$no_rowsbooks = count($es_libbook ->GetList($conditon, $orderby, $order));
    $es_bookList  = $es_libbook->GetList($conditon, $orderby, $order, " $start, $q_limit ");
	//echo $es_libbook->pog_query;
	
/*}*/
		if($no_rowsbooks=='0'){
		 $nill1="No records found" ;
	
		}

if($action=='bookissueforstudent')
{     $swise_sql = "SELECT * FROM es_preadmission WHERE status!='inactive' AND pre_status='active'";
	$es_staffview = $db->getrows($swise_sql);
	//$es_search->GetList(array(array("pre_status", "=", 'active'),array("status", "!=", 'inactive')) );
	
}


if($action=='bookissueforstudent1')
{
	$es_staffview = $db->getrows("SELECT * FROM es_preadmission WHERE status!='inactive' AND pre_status='active' AND es_preadmissionid LIKE '%".$serid."%'");
	//$es_search->GetList(array(array("pre_status", "=",'active'),array("status", "!=", 'inactive'),array("es_preadmissionid", "like","%$serid%")) );
	$bookstudentview = $db->getrow("SELECT * FROM es_preadmission WHERE  es_preadmissionid='".$sid."'");
	//$es_search->Get($sid);
	$es_givenbook = $es_bookissue->GetList(array(array("bki_id", "=", "$sid"),
		                       array("status", "=", 'active'),array("issuetype", "=", 'student')) );
	$countbook=count($es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active'),array("issuetype", "=", 'student'))));
	
}

if($action=='issuelibrary')
{
	
	           if (isset($sid)){
					
					$es_bookissue->bki_id=$sid;
				}
				
				if (isset($bid)){
					$issuedate=date('Y-m-d');
					$issuedpersan='student';
					$status='active';
					$es_bookissue->bki_bookid=$bid;
					$es_bookissue->issuedate=$issuedate;
					$es_bookissue->issuetype=$issuedpersan;
					$es_bookissue->status=$status;
				}
			
			$isbid=$es_bookissue->Save();
		     	if (isset($isbid) && $isbid!=""){
				
				// insert logs
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','ISSUE OR RETURN BOOKS TO STUDENT','".$isbid."','BOOK ISSUED TO STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
				
		        }
		     $db->update('es_libbook',
"issuestatus 	= 'issued'",
'es_libbookid ='. $bid);
// change the status of the book  to inactive 
$db->update('es_book_reservation',
"status 	= 'inactive'",
'book_id ='. $bid);

header('location: ?pid=32&action=bookissueforstudent1&sid='.$sid.'&serchbookname='.$serchbookname.'&serchauthor='.$serchauthor.'&emsg=60');

	
}
if($action=='bookissueforstudent12')
{    $swise_sql = "SELECT * FROM es_preadmission WHERE status!='inactive' AND pre_status='active'";
	$es_staffview = $db->getrows($swise_sql);
	//$es_search ->GetList(array(array("pre_status", "=", 'inactive'),array("status", "!=", 'inactive')) );
	
	$es_givenbook = $es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active')) );
	$countbook=count($es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active')) ));
	$bookstudentview = $db->getrow("SELECT * FROM es_preadmission WHERE  es_preadmissionid='".$sid."'");
	//$es_search->Get($sid);
	
	
	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	
		$orderby_array = array('orb1'=>'es_libbookid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_libbookid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$conditon =array();
		
		if (isset($serchbookname)&&$serchbookname!=''&&isset($serchauthor)&& $serchauthor!=''){
			
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
			$conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
					
		}elseif(isset($serchbookname)&& $serchbookname!=''){
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
        	
        }
        elseif (isset($serchauthor)&& $serchauthor!='')
        {  
      		$conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
        }
		$status='notissued';
		$conditon[] = array("issuestatus", "=",$status);
		$conditon[] = array("status", "=","active");
		if(isset($Submit42) && $Submit42!=""){
		$conditon[] = array("lbook_category", "=",$es_categorylibraryid);
		$conditon[] = array("lbook_booksubcategory", "=",$subbookcatid);
		
		 }
		$no_rowsbooks = count($es_libbook ->GetList($conditon, $orderby, $order));
		$es_bookList = $es_libbook->GetList($conditon, $orderby, $order, " $start, $q_limit ");
	
		}
		if($no_rowsbooks=='0'){
		 $nill1="No records found" ;
}


$es_libbookfinedet=new es_libbookfinedet();
        if($action=='reissue')
			{
$curdate=date("Y-m_d");
			$db->update('es_bookissue',
"issuedate 	='$curdate'",
'es_bookissueid ='. $bwid);

if (isset($sid)){
					
					$es_libbookfinedet->es_libbooksid=$sid;
				}
				
				if (isset($bwid)){
					
					$es_libbookfinedet->es_libbookbwid=$bwid;
				}
				
				if (isset($fineamountcal)){
					$curadte=date("Y-m-d");
					$status='active';
					$student='student';
					$reissue='reissue';
					$es_libbookfinedet->es_libbookfine=$fineamountcal;
					$es_libbookfinedet->es_libbookdate=$curadte;
					$es_libbookfinedet->status=$status;
					$es_libbookfinedet->es_type=$student;
					$es_libbookfinedet->es_issuetype=$reissue;

				}
				if ($es_libbookfinedet->Save()){
				
			        }

header('location: ?pid=32&action=bookissueforstudent1&sid='.$sid);

           }

if($action=='return')
			{
			$curdate1=date("Y-m-d");
			
           $curdate=date("Y-m_d");
			$db->update('es_libbook',
"issuestatus 	='notissued'",
'es_libbookid ='. $bid);

			$db->update('es_bookissue',
"status ='inactive'",
'es_bookissueid ='. $bwid);

$news_array = array(
							'book_id' 	=> $bid,
							'return_date' 	=> date('Y-m-d')
						);
			$news_array = stripslashes_deep($news_array);
			$db->insert("es_bookreturns",$news_array);


if (isset($sid)){
					
					$es_libbookfinedet->es_libbooksid=$sid;
				}
				
				if (isset($bwid)){
					
					$es_libbookfinedet->es_libbookbwid=$bwid;
				}
				
				if (isset($fineamountcal)){
					$curadte=date("Y-m-d");
					$status='active';
					$student='student';
					$reissue='retuned';
					$es_libbookfinedet->es_libbookfine=$fineamountcal;
					$es_libbookfinedet->es_libbookdate=$curadte;
					$es_libbookfinedet->status=$status;
					$es_libbookfinedet->es_type=$student;
					$es_libbookfinedet->es_issuetype=$reissue;
					$es_libbookfinedet->returnedon=$curdate1;
					
					

				}
				
				$rt=$es_libbookfinedet->Save();
				if (isset($rt) && $rt!=""){
				
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','ISSUE OR RETURN BOOKS TO STUDENT','".$rt."','BOOK RETURN(STUDENT)','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
				
			        }

header('location: ?pid=32&action=bookissueforstudent1&sid='.$sid.'&emsg=61');
			}
 //if(isset($bookserchstaff))
 // {
	   $q_limit  = 25;
	   if ( !isset($start) )
		   {
		$start = 0;
	        }	
	
	
		$orderby_array = array('orb1'=>'es_libbookid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_libbookid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$conditon =array();
		
		if (isset($serchbookname)&&$serchbookname!=''&&isset($serchauthor)&& $serchauthor!=''){
			$status='notissued';
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
			$conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
			$conditon[] = array("issuestatus", "=",$status);
		
					
		}elseif(isset($serchbookname)&& $serchbookname!=''){
			$status='notissued';;
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
        	$conditon[] = array("issuestatus", "=",$status);
			
        }
        elseif (isset($serchauthor)&& $serchauthor!='')
        {  
    	   $conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
        }
		$status='notissued';
		$conditon[] = array("issuestatus", "=",$status);
		$conditon[] = array("status", "=", "active");
		if(isset($Submit42) && $Submit42!=""){
		$conditon[] = array("lbook_category", "=",$es_categorylibraryid);
		$conditon[] = array("lbook_booksubcategory", "=",$subbookcatid);
		
		 }
	   $no_rowsbooks = count($es_libbook ->GetList($conditon, $orderby, $order ));
	   $es_bookList = $es_libbook->GetList($conditon, $orderby, $order, " $start, $q_limit ");
   
//}
		
		if($no_rowsbooks=='0'){
		 $nill1="No records found" ;
	
}

if($action=='bookissueforstaff')
{
$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=", 'notissued')) );
}
if($action=='bookissueforstaff1')
{
	$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("es_staffid", "like","%$serid%"),array("tcstatus", "=", 'notissued')) );
	$staffview =$es_staff ->Get($sid);
	$es_givenbook = $es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active'),array("issuetype", "=", 'staff')) );
	$countbook=count($es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active'),array("issuetype", "=", 'staff'))));
}

if ($action=='issuelibrarystaff'){
	if (isset($sid)){
		$es_bookissue->bki_id=$sid;
	}
	if (isset($bid)){
		$issuedate = date('Y-m-d');
		$issuedpersan = 'staff';
		$status       = 'active';
		$es_bookissue->bki_bookid = $bid;
		$es_bookissue->issuedate  = $issuedate;
		$es_bookissue->issuetype  = $issuedpersan;
		$es_bookissue->status     = $status;
	}
	$ids=$es_bookissue->Save();
	if (isset($ids) && $ids!=""){
	
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','ISSUE OR RETURN BOOKS TO STAFF','".$ids."','BOOK ISSUED TO STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
	
	
	
	}
	$db->update('es_libbook', "issuestatus='issued'", 'es_libbookid ='.$bid );
	$db->update('es_book_reservation',
"status 	= 'inactive'",
'book_id ='. $bid);
	header('Location: ?pid=32&action=bookissueforstaff1&sid=' . $sid . '&serchbookname=' . $serchbookname . '&serchauthor=' . $serchauthor.'&emsg=60');
}
if ($action=='bookissueforstaff12'){
	$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=", 'notissued')) );
	$staffview =$es_staff ->Get($sid);
	$es_givenbook = $es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active'),array("issuetype", "=", 'staff')) );
	$countbook=count($es_bookissue ->GetList(array(array("bki_id", "=", "$sid"),array("status", "=", 'active'),array("issuetype", "=", 'staff'))));

	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$orderby_array = array('orb1'=>'es_libbookid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{ 
		$orderby = "es_libbookid"; 
	}
	
	if (isset($asds_order)&&$asds_order=='ASC'){
		$order = true;
	}else{
			$order = false;
		}
		$conditon =array();
		
		if (isset($serchbookname)&&$serchbookname!=''&&isset($serchauthor)&& $serchauthor!=''){
			$status='notissued';
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
			$conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
			$conditon[] = array("issuestatus", "=",$status);
		
					
		}elseif(isset($serchbookname)&& $serchbookname!=''){
			$status='notissued';;
			$conditon[] = array("lbook_title", "LIKE", "'%".$serchbookname."%'");
        	$conditon[] = array("issuestatus", "=",$status);
			
        }
        elseif (isset($serchauthor)&& $serchauthor!='')
        {  
           $conditon[] = array("lbook_author", "LIKE", "'%".$serchauthor."%'");
        }
	$status='notissued';
		$conditon[] = array("issuestatus", "=",$status);
		$conditon[] = array("status", "=", "active");
		if(isset($Submit42) && $Submit42!=""){
		$conditon[] = array("lbook_category", "=",$es_categorylibraryid);
		$conditon[] = array("lbook_booksubcategory", "=",$subbookcatid);
		
		 }
	$no_rowsbooks = count($es_libbook ->GetList($conditon, $orderby, $order, " $start, $q_limit "));
    $es_bookList  = $es_libbook->GetList($conditon, $orderby, $order, " $start, $q_limit ");
		}
		if($no_rowsbooks=='0'){
		 $nill1="No records found" ;
}
if ($action=='reissuestaff') {
	$curdate = date("Y-m_d");
	$db->update('es_bookissue', "issuedate='$curdate'", 'es_bookissueid ='. $bwid);

if (isset($sid)){
					
					$es_libbookfinedet->es_libbooksid=$sid;
				}
				
				if (isset($bwid)){
					
					$es_libbookfinedet->es_libbookbwid=$bwid;
				}
				
				if (isset($fineamountcal)){
					$curadte=date("Y-m-d");
					$status='active';
					$student='staff';
					$reissue='reissue';
					$es_libbookfinedet->es_libbookfine=$fineamountcal;
					$es_libbookfinedet->es_libbookdate=$curadte;
					$es_libbookfinedet->status=$status;
					$es_libbookfinedet->es_type=$student;
					$es_libbookfinedet->es_issuetype=$reissue;

				}
				$ids=$es_libbookfinedet->Save();
				if (isset($ids) && $ids!=""){
				
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','ISSUE OR RETURN BOOKS TO STAFF','".$ids."','BOOK RETURN(STAFF)','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
				
			        }

header('location: ?pid=32&action=bookissueforstaff1&sid='.$sid);

           }

if($action=='returnstaff')
			{
           $curdate=date("Y-m_d");
			$db->update('es_libbook',
"issuestatus 	='notissued'",
'es_libbookid ='. $bid);

			$db->update('es_bookissue',
"status ='inactive'",
'es_bookissueid ='. $bwid);
$news_array = array(
							
							'book_id' 	=> $bid,
							'return_date' 	=> date('Y-m-d')
						);
			$news_array = stripslashes_deep($news_array);
			$db->insert("es_bookreturns",$news_array);


if (isset($sid)){
					
					$es_libbookfinedet->es_libbooksid=$sid;
				}
				
				if (isset($bwid)){
					
					$es_libbookfinedet->es_libbookbwid=$bwid;
				}
				
				if (isset($fineamountcal)){
					$curadte=date("Y-m-d");
					$status='active';
					$student='staff';
					$reissue='retuned';
					$es_libbookfinedet->es_libbookfine=$fineamountcal;
					$es_libbookfinedet->es_libbookdate=$curadte;
					$es_libbookfinedet->status=$status;
					$es_libbookfinedet->es_type=$student;
					$es_libbookfinedet->es_issuetype=$reissue;

				}
				$ids=$es_libbookfinedet->Save();
				if (isset($ids) && $ids!=""){
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','ISSUE OR RETURN BOOKS TO STAFF','".$ids."','BOOK RETURN (STAFF)','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
			        }

header('location: ?pid=32&action=bookissueforstaff1&sid='.$sid.'&emsg=61');

           	}
// *********************** To view the bookdetails **********************///			
if (isset($listofserckbooks) || $action=='bookdetailes'){


           
    $q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	 $dc3 = changejsdate1($bookfrom);
	 $dc4 = changejsdate1($booktod);
	$orderby_array = array('orb1'=>'es_bookissueid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_bookissueid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	
	
	$conditon =array();
	if(isset($dc3) && $dc4=='--'&& $dc3!='--'){
		$dt=date('Y-m-d');
		
		$conditon[] = array("issuedate", "between", $dc3."'  and  '".$dt);
		//$conditon[]=array("status", "=", $selectstt);
		$bookDetailsUrl .="&bookfrom=$dc3";
	}
	if(isset($dc4) && $dc3=='--'&& $dc4!='--'){
		$dt=date('Y-m-d');
		$conditon[] = array("issuedate", "<=", $dc4);
		//$conditon[]=array("status", "=", $selectstt);
		$bookDetailsUrl .="&booktod=$dc4";
	}
	if( $dc4!='--' &&  $dc3!='--')
	{
		$conditon[] = array("issuedate", "between", $dc3."'  and  '".$dc4);
		//$conditon[]=array("status", "=", $selectstt);
		$bookDetailsUrl .="&bookfrom=$dc3&booktod=$dc4";
	}
	if(isset($selectstt))
	{
	   $bookDetailsUrl .="&selectstt=$selectstt";
		if($selectstt!='all')
		{
			$conditon[]=array("status", "=", $selectstt);
			$bookDetailsUrl .="&listofserckbooks=$listofserckbooks";
		}
	}
	//$bookDetailsUrl="&bookfrom=$dc3&booktod=$dc4&selectstt=$selectstt&listofserckbooks=$listofserckbooks";
	
    $no_rowsbooks = count($es_bookissue ->GetList($conditon,$orderby, $order));
			if(isset($Submit42) && $Submit42!=""){
		$conditon[] = array("lbook_category", "=",$es_categorylibraryid);
		$conditon[] = array("lbook_booksubcategory", "=",$subbookcatid);
		
		 }
    $es_bookList = $es_bookissue->GetList($conditon,$orderby, $order,  "$start , $q_limit");

	 
  }
//************* To print the bookdetails *********************//  
if ($action == 'bookdetails_print') {
				
				$dc3 = $bookfrom;
				$dc4 = $booktod;
								
				$orderby_array = array('orb1'=>'es_bookissueid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
				
				if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
					$orderby = $orderby_array[$column_name];
				}else{
					$orderby = "es_bookissueid";
				}
				if (isset($asds_order)&&$asds_order=='ASC'){
					$order = true;
				}else{
					$order = false;
				}
				$conditon =array();
				
	if(isset($dc3) && $dc4=='--'&& $dc3!='--'){
		$dt=date('Y-m-d');
		
		$conditon[] = array("issuedate", "between", $dc3."'  and  '".$dt);
		//$conditon[]=array("status", "=", $selectstt);
		
	}
	if(isset($dc4) && $dc3=='--'&& $dc4!='--'){
		$dt=date('Y-m-d');
		$conditon[] = array("issuedate", "<=", $dc4);
		//$conditon[]=array("status", "=", $selectstt);
		
	}
	if( $dc4!='--' &&  $dc3!='--')
	{
		$conditon[] = array("issuedate", "between", $dc3."'  and  '".$dc4);
		//$conditon[]=array("status", "=", $selectstt);
		
	}
	if(isset($selectstt)&& $selectstt=='active' ||$selectstt=='inactive')
	{
	   $conditon[]=array("status", "=", $selectstt);
	}
	if(isset($Submit42) && $Submit42!=""){
		$conditon[] = array("lbook_category", "=",$es_categorylibraryid);
		$conditon[] = array("lbook_booksubcategory", "=",$subbookcatid);
		
		 }
	
//$no_rowsbooks = count($es_bookissue ->GetList($conditon,$orderby, $order));
$es_bookList = $es_bookissue->GetList($conditon,$orderby, $order);
		
	}
  
      if($no_rowsbooks=='0'){
		 $nill1="No records found" ;
      }
	  if($action=='studentrecard1')
	  {
		  $studentviewdetiles =$db->getrow("SELECT * FROM es_preadmission WHERE  es_preadmissionid='".$serid."'");
		 
		  //$es_search->Get($serid);
		  

	  }
	 /* if ($action == 'student_report_print') {
	  		$studentviewdetiles =$es_search->Get($serid);	
	  }*/
if(isset($serchrecardinbook) || $action=='studentrecard1')
{
  $q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	
	
	  $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'student' AND bki_id =".$serid;
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid LIMIT ".$start .", ".$q_limit.""; 
		
		
	$es_studentbookList = $db->getrows($qry);
	$studentUrl = "&serid=$serid";
	
	/*$orderby_array = array('orb1'=>'es_bookissueid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_libbookfinedetid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$studentUrl = "&serid=$serid";
	$es_studentbookList = $es_libbookfinedet->GetList(array(array("es_libbooksid", "=", $serid)),$orderby, $order,  "$start , $q_limit");
	
	$count=count($es_libbookfinedet->GetList(array(array("es_libbooksid", "=", $serid)),$orderby, $order));*/

}

		if ($action == 'student_record_print') {
		 $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'student' AND bki_id =".$serid;
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid limit $start , $q_limit "; 
	$es_studentbookList = $db->getrows($qry);
	$studentUrl = "&serid=$serid";
		
		
		} //array_print($es_studentbookList);
if (isset($statusofbook) || $action=='issueandreturn'){


	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	}	

		if(isset($statusofbook) && $statusofbook!=""){
			$PageUrl = "&statusofbook=$statusofbook";
			if(isset($bookfrom) && $bookfrom!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$bookfrom);}
			if(isset($bookto) && $bookto!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$bookto);}
			
			if($from!="" && $to!=""){
				$condition .= " AND issuedate BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&bookfrom=$bookfrom&bookto=$bookto";
			}
			if($from!="" && $to==""){
				$condition .= " AND issuedate >= '".$from."' ";
				$PageUrl .="&bookfrom=$bookfrom";
			}
			if($from=="" && $to!=""){
				$condition .= " AND issuedate <= '".$to."' ";
				$PageUrl .="&bookto=$bookto";
			}
		
		
		if($from!="" && $to!=""){
				$condition2 .= " AND return_date BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&bookfrom=$bookfrom&bookto=$bookto";
			}
			if($from!="" && $to==""){
				$condition2 .= " AND return_date >= '".$from."' ";
				$PageUrl .="&bookfrom=$bookfrom";
			}
			if($from=="" && $to!=""){
				$condition2 .= " AND return_date <= '".$to."' ";
			$PageUrl .="&bookto=$bookto";
			}
		
		
		}
		
 $reacrds=$db->getOne("select count(*) from es_libbook where status='active'");

 $es_bookList=$db->getRows("select * from es_libbook where status='active' order by es_libbookid DESC limit $start,$q_limit");


}

 

		if ($action == 'book_analysis_print') {
		
				$q_limit  = 25;
				if ( !isset($start) ){
					$start = 0;
				}	
				 $dc3  = formatDateCalender($bookfrom);
				 $dc4  = formatDateCalender($bookto);
				$orderby_array = array('orb1'=>'es_bookissueid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
					
					if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
						$orderby = $orderby_array[$column_name];
					}else{
						$orderby = "es_bookissueid";
						$orderby1 = "es_libbookid";
					}
					if (isset($asds_order)&&$asds_order=='ASC'){
						$order = true;
					}else{
						$order = false;
					}
				$es_bookList = $es_libbook ->GetList(array(array("status", "=", 'active')),$orderby1, $order,  "$start , $q_limit");
				//$reacrds=count($es_bookList = $es_libbook ->GetList(array(array("status", "=", 'active')),$orderby1, $order,  "$start , $q_limit"));
		
		}



if (isset($bkserch) || $action=='serchbooks'){

$condition="";
if(isset($catid) && $catid!=""){
$condition.=" AND lbook_category=".$catid;

}
if(isset($subbookcatid) && $subbookcatid!=""){
$condition.=" AND lbook_booksubcategory=".$subbookcatid;
}

if(isset($bkname) && $bkname!=""){
$condition.=" AND lbook_title like '%".$bkname."%'";
}

if(isset($bkauthor) && $bkauthor!=""){
$condition.=" AND lbook_author like '%".$bkauthor."%'";
}

$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	$sql="select * from es_libbook where status='active'".$condition;
	$tes=$db->getrows($sql);
	$no_rowsbooks=count($tes);
	
	$sql_query= $sql." Order by es_libbookid DESC LIMIT $start,$q_limit";
	
	$es_bookdet=$db->getRows($sql_query);
	
//echo $es_libbook->pog_query;
		}
		if($no_rowsbooks=='0'){
		 $nill1="No records found" ;
}


if(isset($submitprint))
{

$es_libstaffadd= new es_libstaffadd();
$sview=$es_libstaffadd->Get1($sid);
$ufrom=formatDateCalender($empisuuedfrom, $format = 'Y-m-d');
$uto=formatDateCalender($empisuedto, $format = 'Y-m-d');
$db->update('es_libstaffadd',
"staffadd_name          =  '$empname', 
staffadd_sex            =  '$empsex',
staffadd_qulification   =  '$empqulification',
staffadd_adress         =  '$empaddress',
staffadd_phone          =  '$empphoneno',
staffadd_subject        =  '$empprimarysubject',
staffadd_designation    =  '$empdesigantion',
staffadd_deaprtment     =  '$empdepartment',
staffadd_addtinalinfo   =  '$empaditinalinfo',
staffadd_issuedfromdate =  '$ufrom',
staffadd_issuedtodate   =  '$uto'",
'staffadd_id ='. $sid);

header('location: ?pid=32&action=values&emsg=2&sid='.$sid);
}
if(isset($cancel))
{
header('location: ?pid=32&action=first');
}
if(isset($studentprint) && $studentprint!='')
{
$sufrom=formatDateCalender($studentisuuedfrom, $format = 'Y-m-d');
$suto=formatDateCalender($stuisuedto, $format = 'Y-m-d');
$db->update('es_libstudentadd',
"student_name           =  '$student_name', 
student_sex             =  '$gender',
student_fathername      =  '$student_fathername',
student_classname       =  '$student_classh',
student_adress          =  '$student_adress',
student_phoneno         =  '$student_phoneno',
student_aditinalinfo    =  '$student_aditinalinfo',
student_issuedfrom      =  '$sufrom',
student_issuedto        =  '$suto'",
'student_id ='. $sid);

header('location: ?pid=32&action=valuestudent&emsg=2&sid='.$sid);
}

if($action=='lstudent'){

$q_limit  = 25;
$orderby='es_libstudentaddid ';
	if ( !isset($start) ){
		$start = 0;
	   }
	   if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	
	$count=count($es_libstudentadd ->GetList(array(array("status", "=", active))));
	$studentlib =$es_libstudentadd ->GetList(array(array("status", "=", active)),$orderby,$order, " $start, $q_limit ");
	//GetList(array(array("status", "=", active)),$orderby, $order,  "$start , $q_limit");
}

if($action=='lstaff')
{
$q_limit  = 25;
$orderby='es_libstaffaddid ';
	if ( !isset($start) ){
		$start = 0;
	   }
	   if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	
	$count=count($es_libstaffadd ->GetList(array(array("staffadd_status", "=", active))));
	$stafflib =$es_libstaffadd ->GetList(array(array("staffadd_status", "=", active)),$orderby,$order, " $start, $q_limit ");
}
if($action=='printlstudent'){

	$q_limit  = 25;
$orderby='es_libstudentaddid ';
	if ( !isset($start) ){
		$start = 0;
	   }
	   if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	
	$count=count($es_libstudentadd ->GetList(array(array("status", "=", active))));
	$studentlib =$es_libstudentadd ->GetList(array(array("status", "=", active)),$orderby,$order, " $start, $q_limit ");
}


if($action=='plstaff')
{
$q_limit  = 25;
$orderby='es_libstaffaddid ';
	if ( !isset($start) ){
		$start = 0;
	   }
	   if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	
	$count=count($es_libstaffadd ->GetList(array(array("staffadd_status", "=", active))));
	$stafflib =$es_libstaffadd ->GetList(array(array("staffadd_status", "=", active)),$orderby,$order, " $start, $q_limit ");
}



if(isset($sm_class)){
$pageurl="&sm_class=$sm_class";
}

if(isset($search_bookstudent) && $search_bookstudent!="" ){
$pageurl="&sm_class=$sm_class";
header("location: ?pid=32&action=books_issuedstudent&start=$start".$pageurl);



}

if($action=='books_issuedstudent' || $action=='print_list_books_issuedstudent')
{
$q_limit  = 50;
if ( !isset($start) ){
		$start = 0;
	   }

$condition="";
if(isset($sm_class) && $sm_class!=""){
if($sm_class=="all"){
$condition="";
}else{
$condition=" AND pa.pre_class=$sm_class";
}
}

$totalcount=sqlnumber("SELECT isb . * , pa.pre_name, pa.pre_class
FROM es_bookissue isb, es_preadmission pa
WHERE pa.es_preadmissionid = isb.bki_id
AND isb.issuetype = 'student'".$condition."
GROUP BY isb.bki_id
ORDER BY isb.es_bookissueid");


$issue_book_stude=$db->getRows("SELECT isb . * , pa.pre_name, pa.pre_class, pa.es_preadmissionid
FROM es_bookissue isb, es_preadmission pa
WHERE pa.es_preadmissionid = isb.bki_id
AND isb.issuetype = 'student'".$condition."
GROUP BY isb.bki_id
ORDER BY isb.es_bookissueid
LIMIT ".$start." , ".$q_limit."");
 }
  
  





if($action=='books_issuefaculty' || $action=='print_list_books_issuefaculty')
{
$q_limit  = 50;
if ( !isset($start) ){
		$start = 0;
	   }

$condition="";


$totalcount=sqlnumber("SELECT *
FROM es_bookissue isb, es_staff pa
WHERE pa.es_staffid = isb.bki_id
AND isb.issuetype = 'staff'
GROUP BY isb.bki_id
ORDER BY isb.es_bookissueid");


$issue_book_staff=$db->getRows("SELECT *
FROM es_bookissue isb, es_staff pa
WHERE pa.es_staffid= isb.bki_id
AND isb.issuetype = 'staff'
GROUP BY isb.bki_id
ORDER BY isb.es_bookissueid
LIMIT ".$start." , ".$q_limit."");



 }
  
  

// books availability

// status array


$books_avalabile_array=array("all"=>"All Books","notissued"=>"Available Books","issued"=>"Issued Books","reserved"=>"Reserved Books",);

if(isset($issuestatus)){
$pageurl="&issuestatus=$issuestatus";
}

if(isset($search_bookavailability) && $search_bookavailability!="" ){

$pageurl="&issuestatus=$issuestatus";
if(isset($es_categorylibraryid) && $es_categorylibraryid>=1){

$pageurl .= "&es_categorylibraryid=$es_categorylibraryid";
 }

 if(isset($subbookcatid) && $subbookcatid>=1){

$pageurl .= "&subbookcatid=$subbookcatid";
 }
header("location: ?pid=32&action=books_avialability&start=$start".$pageurl);



}

if($action=='books_avialability' || $action=='print_list_books_avialability')
{
$q_limit  =25;
if ( !isset($start) ){
		$start = 0;
	   }

$condition="";
if(isset($issuestatus) && $issuestatus!=""){
if($issuestatus=="all"){
$condition = "";
}
if($issuestatus!="reserved" && $issuestatus!="all"){
$condition=" AND lb.issuestatus='".$issuestatus."'";
}

if($issuestatus=="reserved"){ 
$condition=" AND 0<(select count(*) from es_book_reservation where book_id=lb.es_libbookid and expired_on >='".date("Y-m-d")."' AND status='active')";
}
if(isset($es_categorylibraryid) && $es_categorylibraryid>=1){
$condition .= " AND lbook_category='".$es_categorylibraryid."'";

 }
 if(isset($subbookcatid) && $subbookcatid>=1){
$condition .= " AND lbook_booksubcategory='".$subbookcatid."'";

 }

}


$totalcount=sqlnumber("SELECT  * from  es_libbook lb where lb.status='active' ".$condition." ORDER BY lb.es_libbookid DESC");

$book_availabilitylist=$db->getRows("SELECT * from es_libbook lb  where lb.status='active' ".$condition." ORDER BY lb.es_libbookid DESC LIMIT ".$start." , ".$q_limit."");
 }

if($action=='facultyrecard')
{
  $facultyviewdetiles =$es_search1->Get($serid);}
  
  
if($action=='facultyrecard1')
{
	
 		$facultyviewdetiles =$es_search1->Get($serid);	


}


//array_print($rows );

if($action=='facultyrecard1' && isset($serid))
{
	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	   }
	   
	   $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'staff' AND bki_id =".$serid;
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid LIMIT ".$start .", ".$q_limit.""; 
	$es_facultybookList = $db->getrows($qry);
	$facultyUrl = "&serid=$serid";

}
if ($action == 'faculty_record_print') {

 $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'staff' AND bki_id =".$serid;
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid"; 
	$es_facultybookList = $db->getrows($qry);
						
}
						
if ($action == 'facultyrecard11') {
				  $qry= "SELECT * FROM `es_libbookfinedet` WHERE es_type = 'staff' AND es_libbooksid =".$serid;
    $qry .=" ORDER BY es_libbookfinedetid "; 
			$es_facultybookList = $db->getrows($qry);
				
						}

						
						
						


/*if (isset($statusofbook) || $action=='issueandreturn'){
	$q_limit  = 25;
	if ( !isset($start) ){
		$start = 0;
	}	
	$dc3  = changejsdate1($bookfrom);
	$dc4  = changejsdate1($bookto);
	$orderby_array = array('orb1'=>'es_bookissueid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_bookissueid";
			$orderby1 = "es_libbookid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;

		}
		$reacrds=count($es_bookList = $es_libbook ->GetList(array(array("status", "=", 'active')),$orderby1, $order));
$es_bookList = $es_libbook ->GetList(array(array("status", "=", 'active')),$orderby1, $order,  "$start , $q_limit");


}*/
if($action == 'viewreserved_details'){
$sql_res="select * from es_book_reservation where book_id= ".$bid." AND status='active'";

$sql_rs=$db->getRow($sql_res);

if($sql_rs['reservetype']=="staff"){
$sql_stf="select st_firstname as name,st_department,st_lastname from es_staff where es_staffid= ".$sql_rs['staff_or_student_id'];
$result_res=$db->getRow($sql_stf);


}
if($sql_rs['reservetype']=="student"){
$sql_stf="select pre_name as name , pre_class from es_preadmission where es_preadmissionid= ".$sql_rs['staff_or_student_id'];
$result_res=$db->getRow($sql_stf);


}




}


// pay amount for lib
if($action=='payamount_lib' || $action=='receipt_lib') { 

 $sql_qry = "SELECT * from es_libbookfinedet where es_libbookfinedetid=".$chgid;
	$finedet = $db->getrow($sql_qry);
	
if($finedet['es_type']=="staff"){
$sql_stf="select st_firstname as name,st_department,st_lastname from es_staff where es_staffid= ".$finedet['es_libbooksid'];
$result_res=$db->getRow($sql_stf);
}
if($finedet['es_type']=="student"){
$sql_stf="select pre_name as name , pre_class from es_preadmission where es_preadmissionid= ".$finedet['es_libbooksid'];
$result_res=$db->getRow($sql_stf);

}
}
	
	
	
     if(isset($receive_amount) && $receive_amount!=''){
	        //array_print($_POST);
			$vlc    = new FormValidation();	
			if(isset($amount_paid) && $amount_paid!="" ){
				if(!$vlc->is_nonNegNumber($amount_paid) ){
					$errormessage[0]="Enter valid amount";
				}
			}
			if(isset($deduction) && $deduction!="" ){
				if(!$vlc->is_nonNegNumber($deduction) ){
					$errormessage[1]="Enter valid waived amount";
				}
			}
			$total_receive = $amount_paid+$deduction;
			if($fineamount!=$total_receive){$errormessage[2]="Total Amount + Deduction should be equal to Due Amount";}
				if ($eq_paymode!="cash"){
			if (!$vlc->is_alpha_numeric($es_checkno)) {
			$errormessage[4]="Enter Check Number";	  
		}	
		if (!$vlc->is_alpha_numeric($es_bankacc)) {
			$errormessage[5]="Enter Account Number";	  
		}
		
		
			
	}
	if($eq_paymode==""){
		$errormessage[6]="Select Payment Mode";	
	}
	if($vocturetypesel==""){
		$errormessage[7]="Select Voucher Type";	
	}
	if($es_ledger==""){
		$errormessage[8]="Select Ledger Type";	
	}
	
	
	
			if(count($errormessage)==0){
$sql="select * from es_voucher where es_voucherid=".$vocturetypesel;
	$vocher_details=$db->getRow($sql);
	$es_vouchertype=$vocher_details['voucher_type'];
	$es_vouchermode=$vocher_details['voucher_mode'];
	$db->update('es_libbookfinedet', "fine_paid ='" . $amount_paid . "',fine_deducted ='" . $deduction . "', remarks='" . $remarks . "', paid_on='" . date("Y-m-d") . "'", 'es_libbookfinedetid =' . $chgid);
	
	$es_receiptno="libbookfineid".$chgid;
	$vocher_array = array(
							'es_vouchertype' 	=> $es_vouchertype,
							'es_receiptno' => $es_receiptno,
							'es_receiptdate' => date("Y-m-d"),
							'es_paymentmode' => $eq_paymode,
							'es_bankacc' => $es_bankacc,
							'es_particulars' => $es_ledger,
							'es_amount' => $amount_paid,
							'es_narration' => $es_narration,
							'es_vouchermode' => $es_vouchermode,
							'es_checkno' => $es_checkno,
							'es_teller_number' => $es_teller_number,
							'es_bank_pin' => $es_bank_pin,
							'es_bank_name' => $es_bank_name,
							've_fromfinance' => $_SESSION['eschools']['from_finance'],
							've_tofinance' => $_SESSION['eschools']['to_finance']
						 );
				$vocher_array = stripslashes_deep($vocher_array);
				$inid=$db->insert("es_voucherentry",$vocher_array);
				
				if($type=="student"){
				// insert logs
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','LIBRARY','STUDENT REPORT','".$inid."','PAY AMOUNT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
				
			header("location: ?pid=32&action=studentrecard1&serid=$serid&start=$start&emsg=50".$pageurl);
			

exit;
}	else{

// insert logs
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','LIBRARY','STAFF REPORT','".$inid."','PAY AMOUNT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	

			header("location: ?pid=32&action=facultyrecard1&serid=$serid&start=$start&emsg=50".$pageurl);
exit;		
}
			}
			}

if(isset($search_allpayments) && $search_allpayments!=""){
$pageurl="payment_stafforstudent=$payment_stafforstudent";
}

if($action=='finepayments')
{
$q_limit  =25;
if ( !isset($start) ){
		$start = 0;
	   }

$condition="";

if($payment_stafforstudent!="" && isset($payment_stafforstudent)){

if($payment_stafforstudent=="all"){
$condition="";
}else{
 $condition =" AND es_type='".$payment_stafforstudent."'";
}
}


/*echo "SELECT  sum(es_libbookfine) as totalfine ,sum(fine_paid) as paidam, sum(fine_deducted) as waived ,es_libbooksid,es_type from es_libbookfinedet where status='active' and es_libbookfine!='0' ".$condition." GROUP BY es_libbooksid,es_type  order by es_libbookfinedetid DESC LIMIT ".$start." , ".$q_limit."";*/

$totalcount=sqlnumber("SELECT  sum(es_libbookfine) as totalfine ,sum(fine_paid) as paidam, sum(fine_deducted) as waived ,es_libbooksid,es_type from es_libbookfinedet where status='active' and es_libbookfine!='0' ".$condition." GROUP BY es_libbooksid,es_type  order by es_libbookfinedetid DESC");


$book_fineamount=$db->getRows("SELECT  sum(es_libbookfine) as totalfine ,sum(fine_paid) as paidam, sum(fine_deducted) as waived ,es_libbooksid,es_type from es_libbookfinedet where status='active' and es_libbookfine!='0' ".$condition." GROUP BY es_libbooksid,es_type  order by es_libbookfinedetid DESC LIMIT ".$start." , ".$q_limit."");

$pageurl="&payment_stafforstudent=$payment_stafforstudent";
 }


if($action=='allpayprints')
{
$condition="";
if($payment_stafforstudent!="" && isset($payment_stafforstudent)){
if($payment_stafforstudent=="all"){
$condition="";
}else{
 $condition =" AND es_type='".$payment_stafforstudent."'";
}
}


/*echo "SELECT  sum(es_libbookfine) as totalfine ,sum(fine_paid) as paidam, sum(fine_deducted) as waived ,es_libbooksid,es_type from es_libbookfinedet where status='active' and es_libbookfine!='0' ".$condition." GROUP BY es_libbooksid,es_type  order by es_libbookfinedetid DESC LIMIT ".$start." , ".$q_limit."";*/


$book_fineamount=$db->getRows("SELECT  sum(es_libbookfine) as totalfine ,sum(fine_paid) as paidam, sum(fine_deducted) as waived ,es_libbooksid,es_type from es_libbookfinedet where status='active' and es_libbookfine!='0' ".$condition." GROUP BY es_libbooksid,es_type  order by es_libbookfinedetid DESC");
$pageurl="&payment_stafforstudent=$payment_stafforstudent";
 }

?>
