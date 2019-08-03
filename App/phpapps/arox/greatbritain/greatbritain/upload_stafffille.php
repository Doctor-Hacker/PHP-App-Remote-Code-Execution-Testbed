<?php
ob_start();
include "../includes/config.php";
//$adid=$_POST['txtadmin'];
//session_start();
//include "session_check.php";
//$adminid=$_SESSION['adminid'];
//$link=mysql_connect("localhost","root","") or die("Problem with Connection");
//mysql_select_db("online_exam") or die("problem with database selection");
//error_reporting(0);
//coding of uploading excel file
if(isset($_REQUEST['btnsubmit']))
{
	/*foreach($_FILES['txtdocname'] as $txtdocname)
	{
	 	$txtdocname;
	}*/
	$txtdocname=$_FILES['txtdocname']['name'];
	if($txtdocname=="")
	{
		header("location:import_staff.php");
		exit;
	}
	//echo $txtdocname;

///////////////////////////Xcel File Opening////////////
	if(!empty($txtdocname))
	{
	
		if($txtdocname!= "")
		{
		
			$file1= $_FILES['txtdocname']['name'];			 
			$tmpfile1  = $_FILES['txtdocname']['tmp_name'];
			$fileSize = $_FILES['txtdocname']['size'];							
			list($pic1,$pic2)= explode(".",$file1);					
			$filepath1 = "upload_data/".$file1;
			$tmpfile1=move_uploaded_file($_FILES['txtdocname']['tmp_name'],$filepath1);					
			//$date1=date('Y-m-d h:i:s');			
			//$sql="insert into excel_files(fld_excel_name,fld_excel_date) Values ('$file1','$date1')";
			//$result=mysql_query($sql);
			
		}
		
	}
	
		
			$photodestfile='upload_data/'.$file1;			
			 if(!$handle = fopen($photodestfile,'r+'))
			 {
			 	echo "error";
			 }
			 else
			 {
			 	/*echo"<script language='javascript'>alert('Successfully Uploaded');</script>";*/
				//echo $handle;
			 	echo"<center><font color='#ff0000'>Successfully Uploaded</font></center>";
				echo"<center><font color='#0E64C8'><a href='import_staff.php'> Back</a></font></center>";
				
			 }	
	
		//$data = fgetcsv($handle, filesize($photodestfile), ","));
			 $i=1;
			 while (($data = fgetcsv($handle, filesize($photodestfile), ",")) != FALSE)
				{
									
						if($i!=1)
						{
						 $srno=addslashes($data[0]);
						 $stpostaplied=addslashes($data[1]);
						 $stfirstname=addslashes($data[2]);
						 $stlastname=addslashes($data[3]);
						 $stgender=addslashes($data[4]);							 
						 $stdob=addslashes($data[5]);
						 $stprimarysubject=addslashes($data[6]);
						 $stfatherhusname=addslashes($data[7]);
						 $stnoofdughters=addslashes($data[8]);
						 $stnoofsons=addslashes($data[9]);
						 $stemail=addslashes($data[10]);
						 $stmobilenocomunication=addslashes($data[11]);
						 
						 $stexamp1=addslashes($data[12]);
						 
						 $stexamp2=addslashes($data[13]);
						 $stexamp3=addslashes($data[14]);
						 //$remark=addslashes($data[14]);
						 $stborduniversity1=addslashes($data[15]);
						 $stborduniversity2=addslashes($data[16]);
						 $stborduniversity3=addslashes($data[17]);
						 $styear1=addslashes($data[18]);
						 $styear2=addslashes($data[19]);
						 $styear3=addslashes($data[20]);
						 $stinsititute1=addslashes($data[21]);
						 $stinsititute2=addslashes($data[22]);
						 $stinsititute3=addslashes($data[23]);
						 $stposition1=addslashes($data[28]);
						 $stposition2=addslashes($data[29]);
						 $stposition3=addslashes($data[30]);
						 $stperiod1=addslashes($data[31]);
						 $stperiod2=addslashes($data[32]);
						 $stperiod3=addslashes($data[33]);
						 $stpradress=addslashes($data[34]);
						 $stprcity=addslashes($data[35]);
						 $stprpincode=addslashes($data[36]);
						 $stprphonecode=addslashes($data[37]);
						 $stprstate=addslashes($data[38]);
						 $stprresino=addslashes($data[39]);
						 $stprcountry=addslashes($data[40]);
						 $stprmobno=addslashes($data[41]);
						 $stpeadress=addslashes($data[42]);
						 $stpecity=addslashes($data[43]);
					     $stpepincode=addslashes($data[44]);
						 $stpephoneno=addslashes($data[45]);
						 $stpestate=addslashes($data[46]);
						 $stperesino=addslashes($data[47]);
						 $stpecountry=addslashes($data[48]);
						 $stpemobileno=addslashes($data[49]);
						 $strefposname1=addslashes($data[50]);
						 $strefposname2=addslashes($data[51]);
						 $strefposname3=addslashes($data[52]);
						 $strefdesignation1=addslashes($data[53]);
						 $strefdesignation2=addslashes($data[54]);
						 $strefdesignation3=addslashes($data[55]);
						 $strefinsititute1=addslashes($data[56]);
						 $strefinsititute2=addslashes($data[57]);
						 $strefinsititute3=addslashes($data[58]);
						 $strefemail1=addslashes($data[59]);
						 $strefemail2=addslashes($data[60]);
						 $strefemail3=addslashes($data[61]);
						 $status=addslashes($data[62]);
						 $stperviouspackage=addslashes($data[63]);
						 $stbasic=addslashes($data[64]);
						 $stdateofjoining=addslashes($data[65]);
						 $stpost=addslashes($data[66]);
						 $stdepartment=addslashes($data[67]);
						 $stremarks=addslashes($data[68]);
						 $intdate=addslashes($data[69]);
						 $image=addslashes($data[70]);
						 $selstatus=addslashes($data[71]);
						 $tcstatus=addslashes($data[72]);
						 $stusername=addslashes($data[73]);
						 $stpassword=addslashes($data[74]);
						 $sttheme=addslashes($data[75]);
						 $stclass=addslashes($data[76]);
						 $stsubject=addslashes($data[77]);
						 $stqualification=addslashes($data[78]);
						 $stmarks1=addslashes($data[79]);
						 $stmarks2=addslashes($data[80]);
						 $stmarks3=addslashes($data[81]);
						 $stpermissions=addslashes($data[82]);
						 $stbloodgroup=addslashes($data[83]);
						 $teachnonteach=addslashes($data[84]);
						 $stemailsend=addslashes($data[85]);
						 $terminationdate=addslashes($data[86]);
						 $hrdsid=addslashes($data[87]);
						 $stmail=addslashes($data[88]);
						 
						 
						 /*$paytype=addslashes($data[20]);
						 $gradepayamount=addslashes($data[21]);
						 $dacategory=addslashes($data[22]);
						 $tacategory=addslashes($data[23]);
						 $styear3=addslashes($data[24]);
						 $title=addslashes($data[89]);
						 $middlename=addslashes($data[90]);
						 $stdoa=addslashes($data[91]);
						 $branch_name=addslashes($data[92]);
						 $ifsc=addslashes($data[93]);
						 $nationalpublication=addslashes($data[94]);
						 $patent=addslashes($data[95]);
						 $pfno=addslashes($data[96]);
						 $bankaccountno=addslashes($data[97]);
						 $grosspay=addslashes($data[98]);
						 $da=addslashes($data[99]);
						 $hra=addslashes($data[100]);
						 $allowances=addslashes($data[101]);  */
						 
						/* $handi=addslashes($data[100]);
						 $minority=addslashes($data[101]);
						 $fyteacher=addslashes($data[102]);
						 $fycst=addslashes($data[103]);
						 $fycs=addslashes($data[104]);
						 $commitee=addslashes($data[105]);
						 $aicte=addslashes($data[106]);
						 $staffstatus=addslashes($data[107]);
						 $sem=addslashes($data[108]);
						 $noofleaves==addslashes($data[109]);
						 $incharge=addslashes($data[110]);
						 $addincharge=addslashes($data[111]);*/
						
						 
					 $query="insert into es_staff (st_postaplied,st_firstname,st_lastname,st_gender,	st_dob,st_primarysubject,st_fatherhusname,st_noofdughters,st_noofsons,st_email,st_mobilenocomunication,	st_examp1,st_examp2,st_examp3,st_borduniversity1,st_borduniversity2,st_borduniversity3,st_year1,	st_year2,st_year3,st_insititute1,st_insititute2,st_insititute3,st_position1,st_position2,st_position3,st_period1,st_period2,	st_period3,st_pradress,st_prcity,st_prpincode,st_prphonecode,st_prstate,st_prresino,st_prcountry,st_prmobno,st_peadress,st_pecity,st_pepincode,st_pephoneno,	st_pestate,st_peresino,st_pecountry,st_pemobileno,st_refposname1,st_refposname2,st_refposname3,st_refdesignation1,st_refdesignation2,st_refdesignation3,st_refinsititute1,st_refinsititute2,st_refinsititute3,st_refemail1,st_refemail2,st_refemail3,status,st_perviouspackage,st_basic,st_dateofjoining,st_post,st_department,st_remarks,intdate,image,selstatus,tcstatus,st_username,st_password,st_theme,st_class,st_subject,st_qualification,st_marks1,st_marks2,st_marks3,st_permissions,st_bloodgroup,teach_nonteach,st_emailsend,terminationdate,hrdsid,st_mail) values ('$stpostaplied','$stfirstname','$stlastname','$stgender','$stdob','$stprimarysubject','$stfatherhusname','$stnoofdughters','$stnoofsons','$stemail','$stmobilenocomunication','$stexamp1','$stexamp2',
'$stexamp3','$stborduniversity1','$stborduniversity2','$stborduniversity3','$styear1','$styear2','$styear3','$stinsititute1','$stinsititute2','$stinsititute3','$stposition1','$stposition2','$stposition3','$stperiod1','$stperiod2','$stperiod3','$stpradress','$stprcity','$stprpincode','$stprphonecode','$stprstate','$stprresino','$stprcountry','$stprmobno','$stpeadress','$stpecity','$stpepincode','$stpephoneno','$stpestate','$stperesino','$stpecountry','$stpemobileno','$strefposname1','$strefposname2','$strefposname3','$strefdesignation1','$strefdesignation2','$strefdesignation3','$strefinsititute1','$strefinsititute2','$strefinsititute3','$strefemail1','$strefemail2','$strefemail3','$status','$stperviouspackage','$stbasic','$stdateofjoining','$stpost','$stdepartment','$stremarks','$intdate','$image','$selstatus','$tcstatus','$stusername','$stpassword','$sttheme','$stclass','$stsubject','$stqualification','$stmarks1','$stmarks2','$stmarks3','$stpermissions','$stbloodgroup','$teachnonteach','$stemailsend','$terminationdate','$hrdsid','$stmail')";				
				$result=mysql_query($query) or die(mysql_error());
				
						 
						
				//$query="insert into es_trans_board_allocation_to_student (board_id,student_staff_id,type,status,status,	created_on,deallocated) values ('','$srno','$prefromdate','$pretodate','$status','$admissionstatus','$id')";				
//				$result=mysql_query($query) or die(mysql_error());
				
				
						}
					$i++;	
					
						
					}//*************************While Close************************************	
		
					fclose($handle);
				
	}//closing of if loop
				
		//exit;
//}//closing of if loop


//header('location:upload.php');

//*******************if Close******************************
?>