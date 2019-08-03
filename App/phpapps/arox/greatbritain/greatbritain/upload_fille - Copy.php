<?php
include "../includes/config.php";
$adid=$_POST['txtadmin'];
if($_POST['txtdocname']=="")
{
	//header("location:import_stud.php");
	echo "<script>window.location='import_stud.php'</script>";
}
//echo $_POST['btnsubmit'];
//session_start();
//include "session_check.php";
//$adminid=$_SESSION['adminid'];
//$link=mysql_connect("localhost","root","") or die("Problem with Connection");
//mysql_select_db("online_exam") or die("problem with database selection");
//error_reporting(0);

//coding of uploading excel file
if($_POST['btnsubmit']!="")
{

	foreach($_FILES['txtdocname'] as $txtdocname)
	{
	 $txtdocname;
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
			 if(!$handle = fopen($photodestfile, 'r+')){echo "error";}
			 else
			 {
			 	/*echo"<script language='javascript'>alert('Successfully Uploaded');</script>";*/
			 	echo"<center><font color='#ff0000'>Successfully Uploaded</font></center>";
				echo"<center><font color='#0E64C8'><a href='import_stud.php'> Back</a></font></center>";
				
			 }	
	
		//$data = fgetcsv($handle, filesize($photodestfile), ","));
			 $i=1;
			 while (($data = fgetcsv($handle, filesize($photodestfile), ",")) != FALSE)
				{				
						if($i!=1)
						{
						 $srno=addslashes($data[0]);
						 //$es_preadmissionid=addslashes($data[1]);
						 $preserialno=addslashes($data[1]);
						 $pre_number=addslashes($data[2]);
						 //$prestudentusername=addslashes($data[4]);
						 //$prestudentpassword=addslashes($data[5]);
						 $predateofbirth=addslashes($data[3]);							 
						 $prefathername=addslashes($data[4]);
						 $middle_name=addslashes($data[5]);
						 $premothername=addslashes($data[6]);
						 $prefathersoccupation=addslashes($data[7]);
						 $pre_fathersoccupation2=addslashes($data[8]);
						 $premotheroccupation=addslashes($data[9]);
						 $pre_motheroccupation2=addslashes($data[10]);
						 $precontactname1=addslashes($data[11]);
						 $precontactno1=addslashes($data[12]);
						 $precontactno2=addslashes($data[13]);
						 $precontactname2=addslashes($data[14]);
						 $preaddress1=addslashes($data[15]);
						 $precity1=addslashes($data[16]);
						 //$remark=addslashes($data[14]);
						 $prestate1=addslashes($data[17]);
						 $precountry1=addslashes($data[18]);
						 $prephno1=addslashes($data[19]);
						 $premobile1=addslashes($data[20]);
						 $preprevacadamicname=addslashes($data[21]);
						 $preprevclass=addslashes($data[22]);
						 $preprevuniversity=addslashes($data[23]);
						 $preprevpercentage=addslashes($data[24]);
						 $preprevtcno=addslashes($data[25]);
						 $precurrentacadamicname=addslashes($data[26]);
						 $precurrentclass1=addslashes($data[27]);
						 $precurrentpercentage1=addslashes($data[28]);
						 $precurrentresult1=addslashes($data[29]);
						 $precurrentclass2=addslashes($data[30]);
						 $precurrentpercentage2=addslashes($data[31]);
						 $precurrentresult2=addslashes($data[32]);
						 $precurrentclass3=addslashes($data[33]);
						 $precurrentpercentage3=addslashes($data[34]);
						 $precurrentresult3=addslashes($data[35]);
						 $prephysicaldetails=addslashes($data[36]);
						 $preheight=addslashes($data[37]);
						 $preweight=addslashes($data[38]);
						 $prealerge=addslashes($data[39]);
						 $prephysicalstatus=addslashes($data[40]);
						 $prespecialcare=addslashes($data[41]);
					     $preclass=addslashes($data[42]);
						 $presec=addslashes($data[43]);
						 $prename=addslashes($data[44]);
						 $preage=addslashes($data[45]);
						 $preaddress=addslashes($data[46]);
						 $precity=addslashes($data[47]);
						 $prestate=addslashes($data[48]);
						 $precountry=addslashes($data[49]);
						 $prephno=addslashes($data[50]);
						 $premobile=addslashes($data[51]);
						 $preresno=addslashes($data[52]);
						 $preresno1=addslashes($data[53]);
						 //$preimage=addslashes($data[54]);
						 $test1=addslashes($data[54]);
						 $test2=addslashes($data[55]);
						 $test3=addslashes($data[56]);
						 $prepincode1=addslashes($data[57]);
						 $prepincode=addslashes($data[58]);
						 $preemailid=addslashes($data[59]);
						 $prefromdate=addslashes($data[60]);
						 $pretodate=addslashes($data[61]);
						 //$status=addslashes($data[62]);
						 //$prestatus=addslashes($data[63]);
						 //$esusertheme=addslashes($data[64]);
						 $prehobbies=addslashes($data[62]);
						 $prebloodgroup=addslashes($data[63]);
						 $pregender=addslashes($data[64]);
						 //$admissionstatus=addslashes($data[68]);
						 $casteid=addslashes($data[65]);
						 $trplaceid=addslashes($data[66]);
						 $annincome=addslashes($data[67]);
						 $admissiondate=addslashes($data[68]);
						 $admissiondate1=addslashes($data[69]);
						 $documentdeposited=addslashes($data[70]);
						 $feeconcession=addslashes($data[71]);
						 $pre_dateofbirth1=addslashes($data[72]);
						 $es_home=addslashes($data[73]);
						 $es_econbackward=addslashes($data[74]);
						 $admission_id=addslashes($data[75]);
						 $school_id=addslashes($data[76]);
						 
						 
					$query="insert into es_preadmission (pre_serialno,pre_number,pre_dateofbirth,	pre_fathername,middle_name,pre_mothername,pre_fathersoccupation,pre_fathersoccupation2,pre_motheroccupation,pre_motheroccupation2,pre_contactname1,pre_contactno1,pre_contactno2,	pre_contactname2,pre_address1,pre_city1,pre_state1,pre_country1,pre_phno1,pre_mobile1,	pre_prev_acadamicname,pre_prev_class,pre_prev_university,pre_prev_percentage,pre_prev_tcno,	pre_current_acadamicname,pre_current_class1,pre_current_percentage1,pre_current_result1,pre_current_class2,	pre_current_percentage2,pre_current_result2,pre_current_class3,	pre_current_percentage3,pre_current_result3,	pre_physical_details,pre_height,pre_weight,pre_alerge,pre_physical_status,pre_special_care,pre_class,	pre_sec,pre_name,pre_age,pre_address,pre_city,pre_state,pre_country,pre_phno,pre_mobile,pre_resno,pre_resno1,test1,test2,test3,pre_pincode1,pre_pincode,pre_emailid,pre_fromdate,pre_todate,pre_hobbies,pre_blood_group,pre_gender,caste_id,tr_place_id,ann_income,admission_date,admission_date1,document_deposited,fee_concession,pre_dateofbirth1,es_home,es_econbackward,admission_id,school_id) values ('$preserialno','$pre_number','$predateofbirth','$prefathername','middle_name','$premothername','$prefathersoccupation','pre_fathersoccupation2','$premotheroccupation','pre_motheroccupation2','$precontactname1','$precontactno1','$precontactno2','$precontactname2','$preaddress1','$precity1','$prestate1','$precountry1','$prephno1','$premobile1','$preprevacadamicname','$preprevclass','$preprevuniversity','$preprevpercentage','$preprevtcno','$precurrentacadamicname','$precurrentclass1','$precurrentpercentage1','$precurrentresult1','$precurrentclass2','$precurrentpercentage2','$precurrentresult2','$precurrentclass3','$precurrentpercentage3','$precurrentresult3','$prephysicaldetails','$preheight','$preweight','$prealerge','$prephysicalstatus','$prespecialcare','$preclass','$presec','$prename','$preage','$preaddress','$precity','$prestate','$precountry','$prephno','$premobile','$preresno','$preresno1','$test1','$test2','$test3','$prepincode1','$prepincode','$preemailid','$prefromdate','$pretodate','$prehobbies','$prebloodgroup','$pregender','$casteid','$trplaceid','$annincome','$admissiondate','admission_date1','$documentdeposited','$feeconcession','$pre_dateofbirth1','$es_home','$es_econbackward','$admission_id','$school_id')";				
				$result=mysql_query($query) or die(mysql_error());
						
				//$query1="insert into es_preadmission_details (es_preadmissionid,pre_class ,pre_fromdate,pre_todate) values('srno','$class','$acyears','$acyeare')";				
//				$result1=mysql_query($query1) or die(mysql_error());
//						
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