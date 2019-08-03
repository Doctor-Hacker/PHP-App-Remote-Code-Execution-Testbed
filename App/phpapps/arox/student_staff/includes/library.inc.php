<?php 
include_once (INCLUDES_CLASS_PATH . DS .'class.es_candidate.php');
sm_registerglobal('pid','action','update',
'lib_category','libcat_desc','asds_order',
'categoryname','upadtesubaddcategory',
'purcahsedate',
'fromacno',
'toacno',
'categoryname',
'statusofbook',
'start',
'frombookno',
'serid',
'tobookno',
'bookclassno',
'book_author',
'scategoryname',
'serchrecardinbook',
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
'updatefinesubmit',
'bookstatus',
'bkserch',
'book_placepublisher',
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
'sub_catname','sub_catdesc','Search','dc1','dc2','upadtecategory','reservebook','userid','utype','rbook_id' ,'catid','subbookcatid','bkname','bkauthor');
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
$es_categorylibrary = new es_categorylibrary();
$es_subcategory		= new es_subcategory();
$es_libbook			= new es_libbook();
$es_staff			= new es_staff();
$es_libstaffadd		= new es_libstaffadd();
$es_bookissue		= new es_bookissue();
$es_search = new es_preadmission();
$es_libstudentadd=new es_libstudentadd();
/*echo $up="update es_book_reservation set status='inactive' where expired_on < '".date("Y-m-d")."'";
mysql_query($up);*/



// student books list
 /*if($action=='studentrecard1')
	  {
		  $studentviewdetiles =$es_search->Get($serid);

	  }*/
if($action=='studentrecard1')
{

  $q_limit  = 20;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	
	
	  $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'student' AND bki_id =".$_SESSION['eschools']['user_id'];
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid LIMIT ".$start .", ".$q_limit.""; 
		
		
	$es_studentbookList = $db->getrows($qry);
	$studentUrl = "&serid=$serid";
	
	
}

// resreved books

if($action=='books_avialability')
{

$q_limit  = 25;
if ( !isset($start) ){
		$start = 0;
	   }

$condition=" AND 0<(select count(*) from es_book_reservation where book_id=lb.es_libbookid and expired_on >='".date("Y-m-d")."' AND status='active' and staff_or_student_id=".$_SESSION['eschools']['user_id'].")";

$totalcount=sqlnumber("SELECT  * from  es_libbook lb where lb.status='active' ".$condition." ORDER BY lb.es_libbookid DESC");
$book_availabilitylist=$db->getRows("SELECT * from es_libbook lb  where lb.status='active' ".$condition." ORDER BY lb.es_libbookid DESC LIMIT ".$start." , ".$q_limit."");
 
} 


//student prnt

if ($action == 'student_record_print') {
		 $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'student' AND bki_id =".$_SESSION['eschools']['user_id'];
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid"; 
	$es_studentbookList = $db->getrows($qry);
	$studentUrl = "&serid=$serid";
		
		
		}
		
		
// staff books

if($action=='facultyrecard1')
{

	$q_limit  = 20;
	if ( !isset($start) ){
		$start = 0;
	   }
	   
	   $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'staff' AND bki_id =".$_SESSION['eschools']['user_id'];
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid LIMIT ".$start .", ".$q_limit.""; 
	$es_facultybookList = $db->getrows($qry);
	$facultyUrl = "&serid=$serid";

}
// faculty print

if ($action == 'faculty_record_print') 
{


 $qry= "SELECT * FROM `es_bookissue` WHERE issuetype = 'staff' AND bki_id =".$_SESSION['eschools']['user_id'];
    $count = sqlnumber($qry);
    $qry .=" ORDER BY es_bookissueid"; 
	$es_facultybookList = $db->getrows($qry);
						
}

if (isset($bkserch) || $action=='serchbooks')
{


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

$q_limit  = 20;
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

// book reservation

if($action=="reservebook"){
$twodays  = mktime(0, 0, 0, date("m")  , date("d")+2, date("Y"));
$enddate=date("Y-m-d",$twodays);
//echo $enddate;
//exit;
$res_array = array(
							'staff_or_student_id' => $userid,
							'book_id' => $rbook_id,
							'reservetype' => $utype,
							'reserved_on' => date("Y-m-d"),
							'expired_on' => $enddate
						 );
				$res_array = stripslashes_deep($res_array);
				$db->insert("es_book_reservation",$res_array);
header("location: ?pid=15&start=$start&action=serchbooks");


}



if (isset($submitprint)){
	$es_libstaffadd = new es_libstaffadd();
	$sview          = $es_libstaffadd->Get1($sid);
?>

<html>
	<head></head>
	<body onLoad="window.print(); return false;">
<form action="" name="f">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
	<tr>
		<td width="150" class="narmal">Staff</td>
		<td width="450" class="narmal">&nbsp;</td>
	</tr>
	<tr>
		<td class="narmal">Employee Id </td>
		<td class="narmal">stf_<?php echo $sview->staffadd_id; ?></td>
	</tr>
	<tr>
		<td class="narmal">Name</td>
		<td class="narmal"><?php echo $sview->staffadd_name; ?></td>
	</tr>

	<tr>
		<td class="narmal">Designation</td>
		<td class="narmal"><?php echo $sview->staffadd_designation; ?></td>
	</tr>
	<tr>
		<td class="narmal">Department</td>
		<td class="narmal"><?php echo $sview->staffadd_deaprtment; ?></td>
	</tr>
	<tr>
		<td class="narmal">Duration</td>
		<td class="narmal">Form <?php echo $sview->staffadd_issuedfromdate ; ?> To <?php echo $sview->staffadd_issuedtodate ; ?> <input type="hidden" name="vaule1" value="<?php echo $sview->staffadd_id; ?>" ></td>
	</tr>
</table>
</form>
</body>
</html>
<script language="JavaScript">
var id=document.f.vaule1.value;
//alert(id);
window.location.href=" ?pid=32&action=studentrecard1&serid="+id;
</script>
<?php
}


?>
